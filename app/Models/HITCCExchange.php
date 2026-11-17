<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HITCCExchange extends Model
{
    use HasFactory;

    protected $table = 'hitcc_exchanges';

    protected $fillable = [
        'hitcc_programme_id',

        // ===== SECTION: Information =====
        'hitcc_exchange_program_desc',
        'hitcc_exchange_location',
        'hitcc_exchange_duration',
        'hitcc_exchange_type',
        'hitcc_exchange_exchange_type',
        'hitcc_exchange_benefit',

        // ===== SECTION: Requirements =====
        'hitcc_exchange_minimal_education',
        'hitcc_exchange_max_age',
        'hitcc_exchange_gpa',
        'hitcc_exchange_relevant_experience',

        // ===== SECTION: Selection criteria =====
        'hitcc_exchange_selection_criteria',

        // ===== SECTION: Registration =====
        'hitcc_exchange_documents',
        'hitcc_exchange_registration_fee',

        // ===== SECTION: Additional info =====
        'hitcc_exchange_facilities',
        'hitcc_exchange_accomodation',
        'hitcc_exchange_rules',
        'hitcc_exchange_detail_information',
    ];

    public function programme()
    {
        return $this->belongsTo(HITCCProgramme::class, 'hitcc_programme_id');
    }
}
