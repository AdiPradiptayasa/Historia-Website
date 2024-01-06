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
        Schema::create('historys', function (Blueprint $table) {
            $table->id();
            $table->string('sjrh_nama',100);
            $table->string('sjrh_subjudul',100);
            $table->longText('sjrh_desc');
            $table->string('sjrh_img',100);
            $table->string('namespot',256);
            $table->string('coordinates',256);
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historys');
    }
};
