<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Resource;

class CrmResourceSeeder extends Seeder {

    public function run()
    {
        Resource::insert([
            ['id' => 'crm',             'name' => 'CRM Package',    'package_id' => '9'],
            ['id' => 'crm-customer',    'name' => 'Customers',      'package_id' => '9'],
            ['id' => 'crm-group',       'name' => 'Groups',         'package_id' => '9'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmResourceSeeder"
 */