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
        Schema::create('kontribusis', function (Blueprint $table) {
            $table->id();
            $table->string('sejarah_nama',100);
            $table->string('sejarah_subjudul',100);
            $table->longText('sejarah_desc');
            $table->string('sejarah_img',100);
            $table->integer('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontribusis');
    }
};
