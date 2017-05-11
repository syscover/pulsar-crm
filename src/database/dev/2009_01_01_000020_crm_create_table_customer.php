<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrmCreateTableCustomer extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('customer'))
        {
            Schema::create('customer', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();
                $table->string('lang_id', 2)->nullable();
                $table->string('remember_token')->nullable();
                $table->integer('group_id')->unsigned();
                $table->integer('date');
                $table->string('company')->nullable();
                $table->string('tin')->nullable();
                $table->tinyInteger('gender_id')->nullable();
                $table->tinyInteger('treatment_id')->unsigned()->nullable();
                $table->tinyInteger('state_id')->unsigned()->nullable();
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->string('avatar')->nullable();
                $table->integer('birth_date')->nullable();
                $table->string('email', 150);
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();

                // access
                $table->string('user', 150);
                $table->string('password');
                $table->boolean('active');
                $table->boolean('confirmed');

                // geolocation data
                $table->string('country_id', 2)->nullable();
                $table->string('territorial_area_1_id', 6)->nullable();
                $table->string('territorial_area_2_id', 10)->nullable();
                $table->string('territorial_area_3_id', 10)->nullable();
                $table->string('cp')->nullable();
                $table->string('locality')->nullable();
                $table->string('address')->nullable();
                $table->string('latitude')->nullable();
                $table->string('longitude')->nullable();

                // customs fields
                $table->integer('field_group_id')->unsigned()->nullable();

                // data
                $table->json('data')->nullable();


                $table->unique('user', 'ui01_customer');

                $table->foreign('group_id', 'fk01_customer')
                    ->references('id')
                    ->on('group')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('country_id', 'fk02_customer')
                    ->references('id')
                    ->on('country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id', 'fk03_customer')
                    ->references('id')
                    ->on('territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id', 'fk04_customer')
                    ->references('id')
                    ->on('territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id', 'fk05_customer')
                    ->references('id')
                    ->on('territorial_area_3')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('lang_id', 'fk06_customer')
                    ->references('id')
                    ->on('lang')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('field_group_id', 'fk07_customer')
                    ->references('id')
                    ->on('field_group')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('customer');
    }
}