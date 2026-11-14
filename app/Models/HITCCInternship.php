<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HITCCInternship extends Model
{
    protected $table = 'hitcc_internships';

    protected $fillable = [
        'hitcc_programme_id',

        // SECTION: information
        'hitcc_internship_location',
        'hitcc_internship_duration',
        'hitcc_internship_allowance',

        // SECTION: jobdesc
        'hitcc_internship_jobdesc_detail',
        'hitcc_internship_position',
        'hitcc_internship_salary',
        'hitcc_internship_benefit',

        // SECTION: qualification
        'hitcc_internship_education',
        'hitcc_internship_major',
        'hitcc_internship_gpa',
        'hitcc_internship_language',
        'hitcc_internship_technical_non_technical_skills',

        // SECTION: registration
        'hitcc_internship_documents',
        'hitcc_internship_contact',

        // SECTION: additional info
        'hitcc_internship_facilities',
        'hitcc_internship_work_hours',
        'hitcc_internship_rules',
        'hitcc_internship_detail_information',
    ];

    public function programme(): BelongsTo
    {
        return $this->belongsTo(HITCCProgramme::class, 'hitcc_programme_id');
    }
}
