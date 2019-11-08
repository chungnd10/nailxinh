<?php

namespace App\Services;

use App\Slides;

class SlideServices
{
    //lấy tất cả slide có trạng thái là hiển thị
    public function allDisplay()
    {
        $display_status_id = config('contants.display_status_display');
        $slides = Slides::where('display_status_id', $display_status_id)->orderby('id', 'desc')->get();
        return $slides;
    }

    public function all()
    {
        $slide = Slides::orderby('id', 'desc')->get();
        return $slide;
    }

    public function find($id)
    {
        $slide = Slides::find($id);
        return $slide;
    }
}
