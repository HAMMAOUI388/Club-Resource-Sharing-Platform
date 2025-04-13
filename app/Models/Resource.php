<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'title', 'field', 'module', 'type', 'file_path', 'user_id'
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
