<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable;


class Lead extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = ['name', 'email', 'telephone', 'date', 'time_landing', 'time', 'aktion', 'quelle', 'call_to_action', 'page', 'url', 'status', 'guid' ];
    protected $auditEvents = [
        'deleted',
        'restored',
        'updated',
    ];
}
