<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdditionInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'bangla_name',
        'father_designation',
        'father_nid',
        'mother_designation',
        'mother_nid',
        'mother_phone',
        'father_office_address',
        'mother_office_address',
        'permanent_address',
        'present_address',
        'permanent_address_phone',
        'present_address_phone',
        'monthly_income_parents',
        'monthly_income_family',
        'permanent_district',
        'post_office',
        'police_station',
        'progress_report_sent_to_relation',
        'progress_report_sent_to_name',
        'progress_report_sent_to_phone',
        'progress_report_sent_to_address',
        'local_guardian_name',
        'local_guardian_relationship',
        'local_guardian_nid',
        'local_guardian_profession',
        'local_guardian_phone',
        'local_guardian_office_address',
        'local_guardian_occupation',
        'local_guardian_office_phone',
        'local_guardian_designation',
        'local_guardian_address',
    ];
}