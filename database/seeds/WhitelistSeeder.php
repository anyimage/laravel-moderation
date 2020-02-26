<?php

use Illuminate\Database\Seeder;

class WhitelistSeeder extends Seeder
{

    public function run()
    {
        $uid = rand(0, 1) ? rand(1000, 10000) : null;
        $d = [
            'user_id'    => $uid,
            'email'      => faker()->email,
            'phone'      => faker()->phoneNumber,
            'url'        => faker()->url,
            'first_name' => faker()->firstName,
            'last_name'  => faker()->lastName,

        ];

        \AnyImage\Moderation\Models\WhitelistRequest::create($d);

    }
}
