<?php

namespace AnyImage\Moderation\Models;

use Illuminate\Database\Eloquent\Model;

class Severity extends Model
{

    public $timestamps = true;
    protected $table = 'moderation__severities';
    protected $guarded = [];

    public function rules()
    {
        return $this->hasMany('AnyImage\Moderation\Models\Rule');
    }

}
