<?php

namespace AnyImage\Moderation;

use AnyImage\Moderation\Models\Rule;
use AnyImage\Moderation\Models\Violation;
use AnyImage\Moderation\Models\WhitelistedValue;
use AnyImage\Moderation\Models\WhitelistEntry;
use Illuminate\Contracts\Auth\Authenticatable;

class ModerationClass
{
    /**
     * @var array
     */
    protected $data;
    /**
     * @var \Illuminate\Support\Collection
     */
    protected $violations;

    /**
     * @var int
     */
    protected $user_id;

    /**
     * Create a new Moderation Instance.
     */
    public function __construct($data = [])
    {
        $this->data = $data;
        $this->violations = collect();
    }

    /**
     * @param $data array
     */
    public static function make($data)
    {
        return new self($data);
    }

    public function forUser($user = null)
    {
        if ($user instanceof Authenticatable) {
            $this->user_id = $user->id;
            return $this;
        }
        $this->user_id = $user_id ?? auth()->id();
        return $this;
    }

    public function violations()
    {
        return $this->violations;
    }

    public function fails()
    {
        return !$this->passes();
    }

    public function passes()
    {
        $this->check();

        return $this->violations->isEmpty();
    }

    public function check()
    {
        $rules = Rule::with('fields')->get();

        foreach ($rules as $rule) {
            foreach ($rule->fields->whereIn('title', array_keys($this->data))->sortByDesc('priority') as $field) {
                $matcher = app($field->matcher, [
                    'rule'  => $rule,
                    'value' => $this->data[ $field->title ],
                ]);

                $urlWhitelisted = WhitelistEntry::where('url', $this->data[ 'url' ])->exists();
                $domainWhitelisted = WhitelistEntry::where('url', 'like', '%' . (string)fix_url($this->data[ 'url' ])->getHost() . '%')->where('whole_domain', true)->exists();
                if ($urlWhitelisted || $domainWhitelisted) {
                    continue;
                }

                if ($matcher->matches()) {


                    $this->violations->push(new Violation([
                        'user_id'  => $this->user_id,
                        'rule_id'  => $rule->id,
                        'field_id' => $field->id,
                        'value'    => $this->data[ $field->title ],
                    ]));
                }
            }
        }

    }

    protected function loadWhitelist()
    {
    }
}
