<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComparisonSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'comparison_id',
        'supplier_profile_id',
    ];

  // RELACIONES

    public function comparison()
    {
        return $this->belongsTo(Comparison::class);
    }

    public function supplierProfile()
    {
        return $this->belongsTo(SupplierProfile::class);
    }
}