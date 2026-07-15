<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

  // RELACIONES

    public function supplierCategories()
    {
        return $this->hasMany(SupplierCategory::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }



    public function suppliers()
    {
        return $this->belongsToMany(
            SupplierProfile::class,
            'supplier_categories'
        );
    }
}