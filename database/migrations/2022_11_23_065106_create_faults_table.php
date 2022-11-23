<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faults', function (Blueprint $table) {
            $table->id();
            $table->date('occured_on');
            $table->string('machine');
            $table->string('sub_category');
            $table->string('fault');
            $table->date('rectification_date');
            $table->string('rectification');
            $table->string('spares_used');
            $table->string('remark');
            $table->string('entry_done_by');
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
        Schema::dropIfExists('faults');
    }
};
