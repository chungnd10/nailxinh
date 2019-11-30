<?php

namespace App\Services;

use App\Branch;

class BranchServices
{
    // lấy tất cả branch
    public function all()
    {
        $branch = Branch::orderby('id', 'desc')->get();
        return $branch;
    }

    // lấy số lượng tất cả branch
    public function count()
    {
        $branch = Branch::count();
        return $branch;
    }

    public function find($id)
    {
        $branch = Branch::findOrFail($id);
        return $branch;
    }

}
