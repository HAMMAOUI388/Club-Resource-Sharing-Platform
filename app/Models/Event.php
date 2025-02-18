<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // You can explicitly define the table name if it’s different from the plural of the model name
    protected $table = 'events';

    // Make sure to specify which fields are mass assignable
    protected $fillable = ['title', 'description', 'date', 'photo'];
}

