<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department_id',
    ];

  // RELACIONES

    public function department()
    {
        return $this->belongsTo(Department::class);
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