<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'publication_id',
    ];

  // RELACIONES

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}