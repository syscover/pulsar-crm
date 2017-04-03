<?php

use Illuminate\Database\Seeder;
use Syscover\Crm\Models\Group;

class CrmGroupSeeder extends Seeder
{
    public function run()
    {
        Group::insert([
            ['id' => 1, 'name' => 'Particular customer'],
            ['id' => 2, 'name' => 'European society'],
            ['id' => 3, 'name' => 'No European society'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmGroupSeeder"
 */