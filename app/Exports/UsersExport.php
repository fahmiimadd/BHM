<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
 public $start ;
 public $end ;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(dataReport($this->start,$this->end));
    }
}
