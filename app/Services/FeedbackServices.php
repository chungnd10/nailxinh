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

    public function all()
    {
        $feedbacks = Feedback::orderby('id', 'desc')->get();
        return $feedbacks;
    }

     // lấy tất cả feedback theo trạng thái hiển thị
    public function allWithDisplayStatus($display_status_id)
    {
        $feedbacks = Feedback::where('display_status_id', $display_status_id)
            ->orderby('id', 'desc')
            ->get();
        return $feedbacks;
    }

    public function find($id)
    {
        $feedback = Feedback::find($id);
        return $feedback;
    }
}
