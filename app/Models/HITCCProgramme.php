<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class HITCCProgramme extends Model
{
    use HasFactory;

    protected $table = 'hitcc_programmes';

    protected $fillable = [
        'hitcc_category_id',
        'slug',

        //field umum
        'title_program',
        'company_name',
        'logo_company_img',
        'bg_poster_img',
        'link_apply',
        'registration_info',
        'registration_deadline',
        'company_desc',
        'company_number',
        'company_email',
        'company_website',
        'company_social_media',
        'sort_order',
    ];

    protected $casts = [
        'registration_deadline' => 'date',
    ];

    protected static function booted()
    {
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('sort_order');
        });

        static::deleting(function ($programme) {
            // hapus file gambar utama
            if ($programme->logo_company_img) {
                Storage::delete($programme->logo_company_img);
            }
            if ($programme->bg_poster_img) {
                Storage::delete($programme->bg_poster_img);
            }

            // hapus record model spesifik jika ada
            $programme->internship()->delete();
            $programme->volunteer()->delete();
            $programme->scholarship()->delete();
            $programme->exchange()->delete();
            $programme->competition()->delete();
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(HITCCCategory::class, 'hitcc_category_id', 'id');
    }

    // relasi ke tabel turunan per kategori (akan kita isi bertahap)
    public function internship(): HasOne
    {
        return $this->hasOne(HITCCInternship::class, 'hitcc_programme_id', 'id');
    }

    public function volunteer(): HasOne
    {
        return $this->hasOne(HITCCVolunteer::class, 'hitcc_programme_id', 'id');
    }

    public function scholarship(): HasOne
    {
        return $this->hasOne(HITCCScholarship::class, 'hitcc_programme_id', 'id');
    }

    public function exchange(): HasOne
    {
        return $this->hasOne(HITCCExchange::class, 'hitcc_programme_id', 'id');
    }

    public function competition(): HasOne
    {
        return $this->hasOne(HITCCCompetition::class, 'hitcc_programme_id', 'id');
    }
}
