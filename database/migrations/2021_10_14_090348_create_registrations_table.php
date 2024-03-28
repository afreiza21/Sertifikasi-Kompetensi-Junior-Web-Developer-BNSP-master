<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->char('gender')->default('L');
            $table->date('dob')->nullable();
            $table->decimal('last_score')->default(0);
            $table->string('status')->default('pending')->comment('pending,diterima,cadangan,tidak_diterima');
            $table->date('verified_at')->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
