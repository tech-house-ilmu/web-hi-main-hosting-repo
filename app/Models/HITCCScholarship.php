<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HITCCScholarship extends Model
{
    use HasFactory;

    protected $table = 'hitcc_scholarships';

    protected $fillable = [
        'hitcc_programme_id',

        // ===== SECTION: Information =====
        'hitcc_scholarship_program_desc',
        'hitcc_scholarship_scholar_type',
        'hitcc_scholarship_deadline',

        // ===== SECTION: Requirements =====
        'hitcc_scholarship_requirements_scholar',

        // ===== SECTION: Benefit =====
        'hitcc_scholarship_benefit_scholar',

        // ===== SECTION: Registration =====
        'hitcc_scholarship_documents',

        // ===== SECTION: Additional info =====
        'hitcc_scholarship_company_details',
        'hitcc_scholarship_commitment_fee',
        'hitcc_scholarship_costs_covered',
        'hitcc_scholarship_selection_phase',
        'hitcc_scholarship_guidebook',
    ];

    public function programme()
    {
        return $this->belongsTo(HITCCProgramme::class, 'hitcc_programme_id');
    }
}
