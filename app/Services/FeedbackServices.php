<?php

namespace App\Services;

use App\Feedback;

class FeedbackServices
{
    // đếm số phản hồi
    public function count()
    {
        $feedback = Feedback::count();
        return $feedback;
    }

    // lấy tất cả feedback
    public function all()
    {
        $feedbacks = Feedback::all();
        return $feedbacks;
    }
}
