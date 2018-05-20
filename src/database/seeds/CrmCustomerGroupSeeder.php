<?php

use Illuminate\Database\Seeder;
use Syscover\Crm\Models\CustomerGroup;

class CrmCustomerGroupSeeder extends Seeder
{
    public function run()
    {
        CustomerGroup::insert([
            ['id' => 1, 'name' => 'Particular customer'],
            ['id' => 2, 'name' => 'European society'],
            ['id' => 3, 'name' => 'No European society'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmCustomerGroupSeeder"
 */