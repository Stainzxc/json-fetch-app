<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'completed',
    ];

    public $incrementing = false;
    protected $keyType = 'int';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
