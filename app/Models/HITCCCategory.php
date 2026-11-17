<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HITCCCategory extends Model
{
    protected $table = 'hitcc_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function programmes(): HasMany
    {
        return $this->hasMany(HITCCProgramme::class, 'hitcc_category_id');
    }
}
