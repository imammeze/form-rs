<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasUuids;

    protected $table = 'feedbacks';

    protected $fillable = ['name', 'unit', 'photo_path', 'content'];

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}