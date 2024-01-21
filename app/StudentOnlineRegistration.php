<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentOnlineRegistration extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'class_id',
        'session_id',
        'roll',
        'section_id',
        'group_id',
        'user_id',
        'first_name',
        'phone',
        'last_name',
        'bangla_name',
        'birthday',
        'gender',
        'blood_group',
        'religion',
        'sect',
        'address',
        'state',
        'country',
        'home',
        'image',
        'father_name',
        'father_phone_no',
        'father_occupation',
        'father_designation',
        'father_office_address',
        'father_nid',
        'mother_name',
        'mother_phone_no',
        'mother_occupation',
        'mother_designation',
        'mother_office_address',
        'mother_nid',
        'permanent_address',
        'present_address',
        'permanent_address_phone',
        'present_address_phone',
        'monthly_income_parents',
        'monthly_income_family',
        'permanent_district',
        'nick_name',
        'ssc_group',
        'ssc_session',
        'school_name',
        'school_address',
        'board',
        'center',
        'passing_year',
        'board_roll',
        'registration_number',
        'bangla',
        'english',
        'math',
        'religion_sub',
        'ict',
        'career_education',
        'physical_education',
        'physics',
        'chemistry',
        'bk',
        'higher_math',
        'biology',
        'businessEnt',
        'financeBanking',
        'accounting',
        'management',
        'generalScience',
        'civicCitizenship',
        'geography',
        'economics',
        'historyBangladesh',
        'subject_4th',
        'grade_4th_sub',
        'gpa_with_4th',
        'gpa_without_4th',
        'total_a_plus',
        'grade',
        'student_id',
        'vital_201',
        'date_of_admission',
        'application_number',
        'birth_certificate_no',
        'nationality',
        'ethnic',

        'local_guardian_name',
        'local_guardian_relation',
        'local_guardian_occupation',
        'local_guardian_designation',
        'local_guardian_phone_res',
        'local_guardian_phone_office',
        'local_guardian_nid',
        'local_guardian_organization',
        'local_guardian_address',

        'information_sent_to_name',
        'information_sent_to_relation',
        'information_sent_to_phone',
        'information_sent_to_address',

        'co_curricular_activities_sports',
        'co_curricular_activities_clubs',
        'co_curricular_activities_others',

        'vital_sports',
        'vital_sports_college_team',
        'vital_sports_inter_class',
        'vital_sports_awards',

        'serial_no',
        'admission_place',
        'elective_subject',
        'optional_subject',

        'hsc_roll',
        'hsc_year',
        'hsc_reg',
        'hsc_session',
        'hsc_gpa',
        'hsc_total_a_plus',
        'hsc_total_appeared',
        'hsc_total_passed',
        'hsc_percentage',
        'hsc_tec',
        'hsc_subject',
        'hsc_total_combined',

        'dropped_date',
        "recommendation_gives_on",
        "reason",
        "remarks",
        "scholarship_type",
        "annual_lump_grant_1st_year_tk",
        "annual_lump_grant_2nd_year_tk",
        "monthly_tk",
        "period_total_months",
        "from_year",
        "to_year",

        "tc_date",
        "field_one",
        "field_two",
        "promoted_to_class_xll",
        "science_club",
        "science_club_awards",
        "science_fair",
        "science_fair_awards",
        "com_arts_sci_club",
        "com_arts_sci_awards",
        "notre_dame_volunteers_alliance",
        "notre_dame_volunteers_alliance_awards",
        "debate_collage",
        "inter_collage",
        "inter_collage_awards",
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, "class_id");
    }

    //user.
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, "section_id");
    }

    public function electiveSubject()
    {
        return $this->belongsTo(Subject::class, "elective_subject");
    }

    public function optionalSubject()
    {
        return $this->belongsTo(Subject::class, "optional_subject");
    }
}
