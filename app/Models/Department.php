<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];
    
  // RELACIONES

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function entrepreneurProfiles()
    {
        return $this->hasMany(EntrepreneurProfile::class);
    }

    public function supplierProfiles()
    {
        return $this->hasMany(SupplierProfile::class);
    }
}