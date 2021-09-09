<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupItem extends Model
{
    use HasFactory;
    protected $fillable = ['group_id','name', 'completed'];
    public $timestamps = false;
    protected $hidden = ['created_at', 'updated_at'];

//    public function asignee()
//    {
//        return $this->belongsTo('App\Models\User');
//    }
    public function findAssignees(){
        return $this->belongsToMany(User::class, 'user_group_items');
    }
}
