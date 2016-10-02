<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    protected $quiz;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
        $this->middleware('auth.admin');
    }

    public function index() {
        return view('admin.dashboard');
    }
}
