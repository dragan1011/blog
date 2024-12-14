<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('blogs', function (Blueprint $table) {
        $table->id(); // Create the primary key column (auto-incrementing)
        $table->string('title'); // Add the title column
        $table->text('content'); // Add the content column
        $table->timestamps(); // Add created_at and updated_at columns
    });

}

public function down()
{
    Schema::dropIfExists('blogs');
}

};
