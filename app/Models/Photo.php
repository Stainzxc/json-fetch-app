<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'id',
        'album_id',
        'title',
        'url',
        'thumbnail_url',
    ];

    public $incrementing = false;
    protected $keyType = 'int';

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
