<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'entrepreneur_profile_id',
    ];

  // RELACIONES

    public function entrepreneurProfile()
    {
        return $this->belongsTo(EntrepreneurProfile::class);
    }

    public function comparisonSuppliers()
    {
        return $this->hasMany(ComparisonSupplier::class);
    }
}