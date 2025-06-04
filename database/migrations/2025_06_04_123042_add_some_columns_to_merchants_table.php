<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('marchants', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
        });
    }
};
