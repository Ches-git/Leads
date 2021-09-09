<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;
    public $timestamps = false;

    protected $hidden = array('pivot', 'created_at', 'updated_at' );
    protected $fillable = ['name'];

    public function groupitem()
    {
        return $this->hasMany('App\Models\GroupItem');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_groups');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'user_groups');

    }
}
