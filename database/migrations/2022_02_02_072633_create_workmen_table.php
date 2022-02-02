<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workmen', function (Blueprint $table) {
            $table->id();
            $table->string('employed_id')->unique();
            $table->string('fio', 100)->index();
            $table->string('phone', 100)->index();
            $table->string('comment', 100)->nullable();
            $table->integer('year_birth');
            $table->string('passport', 100);
            $table->string('inn', 100);
            $table->string('bank_card', 100);
            $table->softDeletes();
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
        Schema::dropIfExists('workmen');
    }
}
