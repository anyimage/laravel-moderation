<?php

namespace AnyImage\Moderation\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{

    public $timestamps = true;
    protected $table = 'moderation__rules';
    protected $guarded = [];

    public function apply($text)
    {
        return preg_match($this->toRegex(), $text);
    }

    public function toRegex()
    {
        return $this->regex ? $this->pattern : '~\b' . preg_quote($this->pattern) . '\b~ims';
    }

    public function fields()
    {
        return $this->belongsToMany('AnyImage\Moderation\Models\Field', 'moderation__field_rule');
    }

    public function severity()
    {
        return $this->belongsTo('AnyImage\Moderation\Models\Severity');
    }

    public function violations()
    {
        return $this->hasMany('AnyImage\Moderation\Models\Violation');
    }

}
