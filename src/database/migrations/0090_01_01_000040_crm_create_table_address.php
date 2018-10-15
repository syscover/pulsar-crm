<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrmCreateTableAddress extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('crm_address'))
        {
            Schema::create('crm_address', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                // type:
                // 1 - billing address
                // 2 - shipping address
                $table->integer('type_id')->unsigned();
                $table->integer('customer_id')->unsigned();
                $table->string('alias')->nullable();
                $table->string('lang_id', 2)->nullable();
                $table->string('company')->nullable();
                $table->string('tin')->nullable();
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->string('email', 150)->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();

                // geolocation data
                $table->string('country_id', 2)->nullable();
                $table->string('territorial_area_1_id', 6)->nullable();
                $table->string('territorial_area_2_id', 10)->nullable();
                $table->string('territorial_area_3_id', 10)->nullable();
                $table->string('zip')->nullable();
                $table->string('locality')->nullable();
                $table->string('address')->nullable();
                $table->decimal('latitude', 17, 14)->nullable();
                $table->decimal('longitude', 17, 14)->nullable();

                $table->boolean('favorite')->default(false);

                // data
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('type_id', 'fk01_crm_address')
                    ->references('id')
                    ->on('crm_address_type')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('customer_id', 'fk02_crm_address')
                    ->references('id')
                    ->on('crm_customer')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('country_id', 'fk03_crm_address')
                    ->references('id')
                    ->on('admin_country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id', 'fk04_crm_address')
                    ->references('id')
                    ->on('admin_territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id', 'fk05_crm_address')
                    ->references('id')
                    ->on('admin_territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id', 'fk06_crm_address')
                    ->references('id')
                    ->on('admin_territorial_area_3')
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
        Schema::dropIfExists('crm_address');
    }
}