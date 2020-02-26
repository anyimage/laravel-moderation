<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ModerationDatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $this->call('SeverityTableSeeder');
        $this->call('FieldTableSeeder');
        $this->call('RuleTableSeeder');

        $fields = \AnyImage\Moderation\Models\Field::all();
        $rules = \AnyImage\Moderation\Models\Rule::all();
        foreach ($rules as $rule) {
            $rule->fields()->sync($fields);
        }

        $this->call(WhitelistSeeder::class);
    }
}
