<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __construct()
    {
    }

    public function index(): View
    {
        return view('welcome', []);
    }
}
