<?php

namespace App\Services;

use App\Slides;

class SlideServices
{
    //lấy tất cả slide có trạng thái là hiển thị
    public function allDisplay($order_by)
    {
        $display_status_id = config('contants.display_status_display');
        $slides = Slides::where('display_status_id', $display_status_id)
            ->orderby('id', $order_by)
            ->get();
        return $slides;
    }

    public function all()
    {
        $slide = Slides::orderby('id', 'desc')->get();
        return $slide;
    }

    public function find($id)
    {
        $slide = Slides::findOrFail($id);
        return $slide;
    }
}
