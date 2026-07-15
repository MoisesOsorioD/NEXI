<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepreneurProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'birth_date',
        'profile_photo',
        'business_name',
        'business_type',
        'address',
        'description',
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

    public function comparisons()
    {
        return $this->hasMany(Comparison::class);
    }
}