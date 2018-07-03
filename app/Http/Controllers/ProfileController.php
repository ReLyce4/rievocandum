<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show($name) {
        $userModel = new User();
        $data['user'] = $userModel->getInfo($name);
        if(isset($data['user'])) {
            $data['countNotes'] = $userModel->countNotes($name);
            $data['countFlashcards'] = $userModel->countFlashcards($name);
            return view('profile', $data);
        } else {
            abort('404');
        }
    }
}
