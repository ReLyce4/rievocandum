<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index() {
        $data['pageTitle'] = 'Landing Page';

        if(Auth::check()) {
            $data['user'] = Auth::user();
        }

        return view('landing', $data);
    }
}
