<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HITCCCompetition extends Model
{
    use HasFactory;

    protected $table = 'hitcc_competitions';

    protected $fillable = [
        'hitcc_programme_id',

        // ===== SECTION: Information =====
        'hitcc_competition_program_goals',
        'hitcc_competition_category',
        'hitcc_competition_competition_type',
        'hitcc_competition_prize',

        // ===== SECTION: Requirements =====
        'hitcc_competition_max_age',
        'hitcc_competition_minimal_education',
        'hitcc_competition_other_requirements',

        // ===== SECTION: Registration and timeline =====
        'hitcc_competition_fee_type',
        'hitcc_competition_venue',
        'hitcc_competition_announcement',
        'hitcc_competition_timeline',

        // ===== SECTION: Additional info =====
        'hitcc_competition_rules',
        'hitcc_competition_jury',
        'hitcc_competition_terms_condition',
    ];

    public function programme()
    {
        return $this->belongsTo(HITCCProgramme::class, 'hitcc_programme_id');
    }
}
