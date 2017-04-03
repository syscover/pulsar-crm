<?php

use Illuminate\Database\Seeder;
use Syscover\Pulsar\Models\Package;

class CrmPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => '9', 'name' => 'CRM Package', 'folder' => 'crm', 'sorting' => 9, 'active' => false]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmPackageSeeder"
 */