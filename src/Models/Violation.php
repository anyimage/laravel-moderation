<?php

namespace AnyImage\Moderation\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{

    public $timestamps = true;
    protected $table = 'moderation__violations';
    protected $guarded = [];

    public function rule()
    {
        return $this->belongsTo('AnyImage\Moderation\Models\Rule');
    }

    public function field()
    {
        return $this->belongsTo('AnyImage\Moderation\Models\Field');
    }

    public function whitelist_request()
    {
        return $this->hasOne('AnyImage\Moderation\Models\WhitelistRequest');
    }

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

}
