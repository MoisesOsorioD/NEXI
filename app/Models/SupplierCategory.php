<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_profile_id',
        'category_id',
    ];

  // RELACIONES

    public function supplierProfile()
    {
        return $this->belongsTo(SupplierProfile::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}