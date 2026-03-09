<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class AdminController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('review')->latest()->paginate(10);

        return view('admin.feedbacks.index', compact('feedbacks'));
    }
}