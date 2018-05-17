<?php

use Illuminate\Database\Seeder;
use Syscover\Crm\Models\AddressType;

class CrmAddressTypeSeeder extends Seeder
{
    public function run()
    {
        AddressType::insert([
            ['id' => 1, 'name' => 'Shipping'],
            ['id' => 2, 'name' => 'Billing']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmTypeSeeder"
 */