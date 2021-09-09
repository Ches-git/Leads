<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    protected $fillable = ["image_name", "file_path", "created_at", "updated_at"];

    public $timestamps = false;
    use HasFactory;
}
