<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrmCreateTableCustomerContact extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('crm_customer_contact'))
        {
            Schema::create('crm_customer_contact', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                
                $table->increments('id');
                $table->integer('customer_id')->unsigned();
                $table->string('name')->nullable();
                $table->string('surname')->nullable();
                $table->string('position')->nullable();
                $table->string('email', 150)->nullable();
                $table->string('phone')->nullable();
                $table->boolean('sendable')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('customer_id', 'fk01_crm_customer_contact')
                    ->references('id')
                    ->on('crm_customer')
                    ->onDelete('cascade')
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
        Schema::dropIfExists('crm_customer_contact');
    }
}
