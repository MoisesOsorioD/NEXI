<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'business_type',
        'description',
        'phone',
        'contact_email',
        'address',
        'foundation_year',
        'profile_photo',
        'department_id',
        'municipality_id',
        'user_id',
    ];

  // RELACIONES

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function supplierCategories()
    {
        return $this->hasMany(SupplierCategory::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function comparisonSuppliers()
    {
        return $this->hasMany(ComparisonSupplier::class);
    }
}