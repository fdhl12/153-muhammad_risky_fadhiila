<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reactions', function (Blueprint $table) {
            // Drop the current foreign key constraint
            $table->dropForeign(['content_id']);

            // Add the foreign key with onDelete('cascade')
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('reactions', function (Blueprint $table) {
            // Drop the foreign key with onDelete('cascade')
            $table->dropForeign(['content_id']);

            // Add the original foreign key constraint without onDelete('cascade')
            $table->foreign('content_id')->references('id')->on('contents');
        });
    }
};
