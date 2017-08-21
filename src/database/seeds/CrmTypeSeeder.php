<?php

use Illuminate\Database\Seeder;
use Syscover\Crm\Models\Type;

class CrmTypeSeeder extends Seeder
{
    public function run()
    {
        Type::insert([
            ['id' => 1, 'name' => 'Shipping'],
            ['id' => 2, 'name' => 'Billing']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmTypeSeeder"
 */