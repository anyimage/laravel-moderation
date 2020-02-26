<?php

namespace AnyImage\Moderation\Models;

use Illuminate\Database\Eloquent\Model;

class FieldRule extends Model
{

    public $timestamps = true;
    protected $table = 'moderation__field_rule';
    protected $guarded = [];

}