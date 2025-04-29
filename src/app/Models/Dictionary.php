<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    use HasFactory;

    protected $table = 'dictionaries';

    protected $fillable = [
        'user_id',
        'keyword',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
