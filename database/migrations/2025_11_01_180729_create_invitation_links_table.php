<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitation_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ceremony_id');
            $table->uuid('link_address')->unique();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ceremony_id')->references('id')->on('ceremonies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitation_links');
    }
};
