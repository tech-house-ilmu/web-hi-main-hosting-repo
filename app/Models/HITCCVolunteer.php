<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HITCCVolunteer extends Model
{
    use HasFactory;

    protected $table = 'hitcc_volunteers';

    protected $fillable = [
        'hitcc_programme_id',

        // SECTION: Information
        'hitcc_volunteer_type',
        'hitcc_volunteer_volunteer_type',
        'hitcc_volunteer_location',
        'hitcc_volunteer_duration',
        'hitcc_volunteer_program_goals',
        'hitcc_volunteer_benefit',

        // SECTION: Jobdesc
        'hitcc_volunteer_activities',
        'hitcc_volunteer_schedule_times',

        // SECTION: Qualification
        'hitcc_volunteer_qualification_list',

        // SECTION: Registration
        'hitcc_volunteer_additional_link',

        // SECTION: Additional info
        'hitcc_volunteer_facilities',
        'hitcc_volunteer_rules',
        'hitcc_volunteer_detail_information',
    ];

    public function programme()
    {
        return $this->belongsTo(HITCCProgramme::class, 'hitcc_programme_id');
    }
}
