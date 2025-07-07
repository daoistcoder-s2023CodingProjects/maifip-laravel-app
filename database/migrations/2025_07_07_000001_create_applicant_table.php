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
        Schema::create('applicant', function (Blueprint $table) {
            $table->uuid('applicant_id')->primary();

            // === FORM 1: Interview and Referral Details ===
            $table->string('hospital_name')->nullable();
            $table->string('category')->nullable();
            $table->date('interview_date')->nullable();
            $table->string('interview_venue')->nullable();
            $table->string('interview_start_time')->nullable();
            $table->string('interview_end_time')->nullable();
            $table->string('informant_name')->nullable();
            $table->string('informant_address')->nullable();
            $table->string('relation_to_patient')->nullable();
            $table->string('informant_contact_number')->nullable();

            // === FORM 2: Patient Information ===
            $table->string('patient_family_name')->nullable();
            $table->string('patient_first_name')->nullable();
            $table->string('patient_middle_name')->nullable();
            $table->string('patient_extension')->nullable();
            $table->date('patient_birthdate')->nullable();
            $table->integer('patient_age')->nullable();
            $table->string('patient_gender')->nullable();
            $table->string('patient_contact_number')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('living_status')->nullable();
            $table->string('highest_education')->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('monthly_income', 12, 2)->nullable();
            $table->string('philhealth_pin')->nullable();
            $table->string('philhealth_contributor_status')->nullable();

            // --- Family Composition Section ---
            $table->string('family_member_name')->nullable();
            $table->date('family_member_birthdate')->nullable();
            $table->integer('family_member_age')->nullable();
            $table->string('relationship_to_patient')->nullable();

            // === FORM 3: MSWD Classification ===
            $table->string('main_classification')->nullable();
            $table->string('sub_classification')->nullable();
            $table->string('marginalized_sector_member')->nullable();
            $table->string('mss_class')->nullable();

            // --- Monthly Expense Breakdown ---
            $table->decimal('expense_food', 12, 2)->nullable();
            $table->decimal('expense_education', 12, 2)->nullable();
            $table->decimal('expense_clothing', 12, 2)->nullable();
            $table->decimal('expense_transportation', 12, 2)->nullable();
            $table->decimal('expense_househelp', 12, 2)->nullable();
            $table->decimal('expense_medical', 12, 2)->nullable();
            $table->decimal('expense_insurance_premium', 12, 2)->nullable();
            $table->decimal('expense_electric', 12, 2)->nullable();
            $table->decimal('expense_water', 12, 2)->nullable();
            $table->decimal('expense_gas_fuel', 12, 2)->nullable();
            $table->decimal('total_monthly_expenses', 12, 2)->nullable();

            // === FORM 4: Medical Data ===
            $table->text('admitting_diagnosis')->nullable();
            $table->text('final_diagnosis')->nullable();
            $table->text('problem_duration')->nullable();
            $table->text('previous_treatment')->nullable();
            $table->text('treatment_plan')->nullable();
            $table->text('health_accessibility_issue')->nullable();
            $table->text('medical_assessment')->nullable();
            $table->text('recommended_interventions')->nullable();

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
        Schema::dropIfExists('applicant');
    }
};
