<?php

namespace AnyImage\Moderation\Models;

use Illuminate\Database\Eloquent\Model;

class WhitelistEntry extends Model
{

    public $timestamps = true;
    protected $table = 'moderation__whitelist_entries';
    protected $guarded = [];

}
