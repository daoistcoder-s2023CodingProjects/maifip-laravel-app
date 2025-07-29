<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant', function (Blueprint $table) {
            // Add after 'recommended_interventions'
            $table->string('medical_service')->nullable()->after('recommended_interventions');
            $table->decimal('maifip_assistance_amount', 12, 2)->nullable()->after('medical_service');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicant', function (Blueprint $table) {
            $table->dropColumn(['medical_service', 'maifip_assistance_amount']);
        });
    }
};
