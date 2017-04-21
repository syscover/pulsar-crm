<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Package;

class CrmPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => '9', 'name' => 'CRM Package', 'root' => 'crm', 'sort' => 9, 'active' => false]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmPackageSeeder"
 */