<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadingRow,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function headings(): array
    {
        return [
            'id',
            'name',
            'role',
            'status',
            'email',
            'email_verified_at',
            'phone',
            'district',
            'address',
            'city',
            'area',
            'password',
            'remember_token',
            'created_at',
            'updated_at',


        ];
    }
    public function collection()
    {
        // return User::all();
        return collect(User::where(['role'=>2])->get());
    }
}
