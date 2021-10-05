<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    //
    public function index()
    {
        return Audit::all();
//        return lead::where('user_id', auth()->user()->id)->get();
    }
}
