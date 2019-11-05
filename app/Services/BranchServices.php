<?php

namespace App\Services;

use App\Branch;

class BranchServices
{
    // lấy tất cả branch
    public function all()
    {
        $branch = Branch::all();
        return $branch;
    }

    // lấy số lượng tất cả branch
    public function count()
    {
        $branch = Branch::count();
        return $branch;
    }

}
