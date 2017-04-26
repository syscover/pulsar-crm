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
        if (! Schema::hasTable('address'))
        {
            Schema::create('address', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id')->unsigned();
                $table->integer('customer_id')->unsigned();
                $table->string('alias')->nullable();
                $table->string('company')->nullable();
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->string('email', 150)->nullable();;
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();

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

                // data
                $table->text('data')->nullable();

                $table->foreign('customer_id', 'fk01_address')
                    ->references('id')
                    ->on('customer')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('country_id', 'fk02_address')
                    ->references('id')
                    ->on('country')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_1_id', 'fk03_address')
                    ->references('id')
                    ->on('territorial_area_1')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_2_id', 'fk04_address')
                    ->references('id')
                    ->on('territorial_area_2')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('territorial_area_3_id', 'fk05_address')
                    ->references('id')
                    ->on('territorial_area_3')
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
        Schema::dropIfExists('address');
    }
}