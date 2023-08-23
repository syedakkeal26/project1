<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('newuser_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('newuser_id')->references('id')->on('newusers')
            ->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
            ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
