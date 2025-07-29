<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_name');
            $table->string('report_type');
            $table->uuid('created_by');
            $table->date('date_generated');
            $table->string('file_path')->nullable();
            $table->json('filters')->nullable();
            $table->timestamps();

            // Reference to admin table (uuid)
            $table->foreign('created_by')->references('id')->on('admin');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
