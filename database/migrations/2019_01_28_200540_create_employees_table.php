<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id'); // company id
            $table->foreign('company_id')          // foreign key relation
                  ->references('id')
                  ->on('companies')
                  ->onDelete('cascade');
            $table->string('first_name');         // employee first name
            $table->string('last_name');          // employee last name
            $table->string('email')
                  ->unique();                     // employee email
            $table->string('phone');              // employee phone
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
