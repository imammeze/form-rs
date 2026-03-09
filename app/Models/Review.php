<?php

namespace App\Models;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasUuids;

    protected $fillable = ['feedback_id', 'rating', 'review_text'];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}