<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrmCreateTableGroup extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('group'))
        {
            Schema::create('group', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id')->unsigned();
                $table->string('name');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('group'))
        {
            Schema::drop('group');
        }
    }
}