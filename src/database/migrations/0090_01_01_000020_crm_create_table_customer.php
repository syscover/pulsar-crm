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
        if (! Schema::hasTable('crm_customer'))
        {
            Schema::create('crm_customer', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();
                $table->string('lang_id', 2)->nullable();
                $table->string('remember_token')->nullable();
                $table->integer('group_id')->unsigned();
                $table->timestamp('date');
                $table->string('company')->nullable();
                $table->string('tin')->nullable();
                $table->tinyInteger('gender_id')->nullable();
                $table->tinyInteger('treatment_id')->unsigned()->nullable();
                $table->tinyInteger('state_id')->unsigned()->nullable();
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->string('avatar')->nullable();
                $table->date('birth_date')->nullable();
                $table->string('email', 150);
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();

                // access
                $table->string('user', 150);
                $table->string('password');
                $table->boolean('active')->default(true);
                $table->boolean('confirmed')->default(false);

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

                $table->timestamps();
                $table->softDeletes();

                $table->unique('user', 'ui01_crm_customer');

                $table->foreign('group_id', 'fk01_crm_customer')
                    ->references('id')
                    ->on('crm_group')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('country_id', 'fk02_crm_customer')
                    ->references('id')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id', 'fk03_crm_customer')
                    ->references('id')
                    ->on('admin_territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id', 'fk04_crm_customer')
                    ->references('id')
                    ->on('admin_territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id', 'fk05_crm_customer')
                    ->references('id')
                    ->on('admin_territorial_area_3')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('lang_id', 'fk06_crm_customer')
                    ->references('id')
                    ->on('admin_lang')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('field_group_id', 'fk07_crm_customer')
                    ->references('id')
                    ->on('admin_field_group')
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
        Schema::dropIfExists('crm_customer');
    }
}