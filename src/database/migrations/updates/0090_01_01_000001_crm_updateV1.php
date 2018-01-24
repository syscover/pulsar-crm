<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrmUpdateV1 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(Schema::hasColumn('crm_customer', 'cp'))
        {
            Schema::table('crm_customer', function (Blueprint $table) {
                $table->renameColumn('cp', 'zip');
            });
        }

        if(Schema::hasColumn('crm_address', 'cp'))
        {
            Schema::table('crm_address', function (Blueprint $table) {
                $table->renameColumn('cp', 'zip');
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