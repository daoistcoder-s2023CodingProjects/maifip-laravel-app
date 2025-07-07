<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Applicant extends Model
{
    use HasFactory;

    protected $table = 'applicant';
    protected $primaryKey = 'applicant_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'hospital_name',
        'category',
        'interview_date',
        'interview_venue',
        'interview_start_time',
        'interview_end_time',
        'informant_name',
        'informant_address',
        'relation_to_patient',
        'informant_contact_number',
        // Add other fields for next steps as needed
    ];
}
