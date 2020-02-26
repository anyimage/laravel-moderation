<?php

namespace AnyImage\Moderation\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class WhitelistRequest extends Model
{

    public $timestamps = true;
    protected $table = 'moderation__whitelist_requests';
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approve($whole_domain = false)
    {
        $this->update(['approved' => true]);
        WhitelistEntry::firstOrCreate([
            'url'          => $this->url,
            'whole_domain' => $whole_domain,
        ]);
    }

}
