<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreviousExam extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'exam_name',
        'ssc_group',
        'ssc_board',
        'ssc_roll_no',
        'ssc_registration',
        'ssc_session',
        'ssc_grade',
        'ssc_point',
        'nick_name',
        'school_name',
        'school_address',
        'center',
        'ssc_passing_year',
        'bangla',
        'english',
        'math',
        'higher_math',
        'gpa_with_4th',
        'gpa_without_4th',
        'total_a_plus',
        'grade_4th_sub',
        'hsc_result_roll_no',
        'hsc_result_year',
        'hsc_result_reg_no',
        'hsc_result_session',
        'hsc_result_gpa',
        'hsc_result_num_of_a_plus',
        'hsc_result_total_appeared',
        'hsc_result_total_passed',
        'hsc_result_percentage',
        'hsc_result_total_examinees_combined',
        'hsc_result_subjects_a_plus',
        'ssc_physics',
        'ssc_chemistry',
        'ssc_biology',
        'ssc_higherMath',
        'ssc_bangladeshWorld',
        'ssc_agricultureStudies',
        'ssc_homeScience',
        'ssc_other',
        'ssc_financeBanking',
        'ssc_accounting',
        'ssc_businessEnt',
        'ssc_generalScience',
        'ssc_music',
        'ssc_geography',
        'ssc_civicCitizenship',
        'ssc_economics',
        'ssc_historyBangladesh',
        'religion',
        'section',
        'ethinic',
        'bk',
        'subject_grade',
        'application_no',
        'date_of_admission',
        'serial_no',
        'place',
        'remarks_data'
    ];
}
