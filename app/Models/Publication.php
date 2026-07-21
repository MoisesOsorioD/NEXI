<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'reference_price',
        'unit_measure',
        'is_available',
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

    public function publicationImages()
    {
        return $this->hasMany(PublicationImage::class);
    }
}