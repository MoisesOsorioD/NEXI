<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating',
        'comment',
        'entrepreneur_profile_id',
        'supplier_profile_id',
    ];

  // RELACIONES

    public function entrepreneurProfile()
    {
        return $this->belongsTo(EntrepreneurProfile::class);
    }

    public function supplierProfile()
    {
        return $this->belongsTo(SupplierProfile::class);
    }
}