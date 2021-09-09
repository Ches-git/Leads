<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroupItem extends Model


{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'group_item_id',
    ];
    protected $hidden = array('pivot', 'created_at', 'updated_at' );
    protected $primaryKey = 'group_item_id';

//    public function Groupitems()
//    {
//        return $this->hasMany('App\Models\GroupItem');
//    }

}
