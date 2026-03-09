<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HospitalFeedbackController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/saran-kritik');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/keluhan', [AdminController::class, 'index'])->name('admin.feedbacks.index');
});

Route::get('/saran-kritik', [HospitalFeedbackController::class, 'createFeedback'])->name('feedback.create');
Route::post('/saran-kritik', [HospitalFeedbackController::class, 'storeFeedback'])->name('feedback.store');

Route::get('/ulasan/{feedback_id}', [HospitalFeedbackController::class, 'createReview'])->name('review.create');
Route::post('/ulasan/{feedback_id}', [HospitalFeedbackController::class, 'storeReview'])->name('review.store');

Route::get('/terima-kasih', [HospitalFeedbackController::class, 'success'])->name('feedback.success');