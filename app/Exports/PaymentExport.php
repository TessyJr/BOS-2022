<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentExport implements FromCollection, WithHeadings
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
            'fullName',
            'gender',
            'birthDate',
            'placeBirth',
            'domicile',
            'address',
            "line_id",
            "whatsapp",
            'nim',
            'campus_region',
            'faculty',
            'major',
            'batch',
            'launching_schedule',
            'lnt_course',
            'email',
            'role',
            'status',
            'payment_type',
            'has_group',
            'payment_pic',
            'payment_status',
            'reregister_status',
            'reregister_schedule',
            'surat_status',
            'bnccID',
            'binus_email',
            'email_verified_at',
            'created_at',
            'updated_at',
            'instagram',
            'source',
            'agama',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('role','=',0)->where('payment_status','>=',1)->where('campus_region', 'like', $this->region)->get();
    }
}
