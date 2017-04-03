<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\AttachmentMime;

class CrmAttachmentMimeSeeder extends Seeder
{
    public function run()
    {
        AttachmentMime::insert([
            ['resource_id' => 'crm-customer', 'mime' => 'image/jpeg'],
            ['resource_id' => 'crm-customer', 'mime' => 'image/png'],
            ['resource_id' => 'crm-customer', 'mime' => 'text/plain'],
            ['resource_id' => 'crm-customer', 'mime' => 'application/pdf'],
            ['resource_id' => 'crm-customer', 'mime' => 'application/msword'],
            ['resource_id' => 'crm-customer', 'mime' => 'application/msexcel'],
            ['resource_id' => 'crm-customer', 'mime' => 'application/zip'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CrmAttachmentMimeSeeder"
 */