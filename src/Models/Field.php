<?php

namespace AnyImage\Moderation\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{

    public $timestamps = true;
    protected $table = 'moderation__fields';
    protected $guarded = [];

    public function rules()
    {
        return $this->belongsToMany('AnyImage\Moderation\Models\Rule');
    }

    public function violations()
    {
        return $this->hasMany('AnyImage\Moderation\Models\Violation');
    }

}
