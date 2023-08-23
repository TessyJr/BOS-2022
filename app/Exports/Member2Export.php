<?php

namespace App\Exports;

use App\Models\Member2;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Member2Export implements FromCollection, WithHeadings
{
    public $region = "%%";

    // ref: https://docs.laravel-excel.com/3.1/architecture/objects.html#constructor
    public function __construct($region = "%%")
    {
        $this->region = $region;
    }

    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'lnt_course',
            'linkedinUrl',
            'githubUrl',
            'created_at',
            'updated_at',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member2::whereHas('user', function($query){
            $query->where('campus_region','like',$this->region)->where('role','=',0);
        })->get();
    }
}
