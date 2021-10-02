<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->integer('age')->nullable();
            $table->string('photo')->nullable();
            $table->char('phone', 20)->nullable()->unique();
            $table->string('address')->nullable();
            $table->char('village_id')->nullable();
            $table->char('district_id')->nullable();
            $table->char('regency_id')->nullable();
            $table->char('province_id')->nullable();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('village_id')
                    ->references('id')->on('villages')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('district_id')
                    ->references('id')->on('districts')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('regency_id')
                    ->references('id')->on('regencies')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('province_id')
                    ->references('id')->on('provinces')
                    ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
