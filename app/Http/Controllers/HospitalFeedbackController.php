<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Review;
use App\Mail\AdminFeedbackNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HospitalFeedbackController extends Controller
{
    public function createFeedback()
    {
        return view('feedback.create');
    }

    public function storeFeedback(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'unit' => 'required|string|max:255',
            'content' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('feedbacks', 'public');
        }

        $feedback = Feedback::create([
            'name' => $validated['name'],
            'unit' => $validated['unit'],
            'content' => $validated['content'],
            'photo_path' => $photoPath,
        ]);

        Mail::to('admin@rumahsakit.com')->send(new AdminFeedbackNotification($feedback));

        return redirect()->route('review.create', ['feedback_id' => $feedback->id]);
    }

    public function createReview($feedback_id)
    {
        $feedback = Feedback::findOrFail($feedback_id);
        return view('review.create', compact('feedback'));
    }

    public function storeReview(Request $request, $feedback_id)
    {
        $feedback = Feedback::findOrFail($feedback_id);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string',
        ]);

        $review = Review::create([
            'feedback_id' => $feedback->id,
            'rating' => $validated['rating'],
            'review_text' => $validated['review_text'],
        ]);

        return redirect()->route('feedback.success');
    }

    public function success()
    {
        return view('feedback.success');
    }
}