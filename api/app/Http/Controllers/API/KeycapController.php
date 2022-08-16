<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeycapController extends Controller
{
    //constructor
    public function __construct()
    {
        $this->middleware('auth.role:1')->only([
            'store',
            'update',
            'destroy'
        ]);
    }
}
