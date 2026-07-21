<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}