<?php

namespace App\Exports;

use App\Subscribe;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubcribeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subscribe::select('id','email')->get();
    }
}
