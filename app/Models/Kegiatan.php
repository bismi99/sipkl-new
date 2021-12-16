<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tempat_pkl_id',
        'title',
        'description',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
