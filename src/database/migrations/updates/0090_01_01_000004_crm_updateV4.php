<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrmUpdateV4 extends Migration
{
    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('json', 'string');
    }

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(Schema::hasTable('crm_customer'))
        {
            Schema::table('crm_customer', function (Blueprint $table) {
                $table->decimal('latitude', 17, 14)->nullable()->change();
                $table->decimal('longitude', 17, 14)->nullable()->change();
            });
        }

        if(Schema::hasTable('crm_address'))
        {
            Schema::table('crm_address', function (Blueprint $table) {
                $table->decimal('latitude', 17, 14)->nullable()->change();
                $table->decimal('longitude', 17, 14)->nullable()->change();
            });
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){}
}