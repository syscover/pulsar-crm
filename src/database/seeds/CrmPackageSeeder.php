<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Package;

class CrmPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 90, 'name' => 'CRM Package', 'root' => 'crm', 'sort' => 90, 'active' => true]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmPackageSeeder"
 */