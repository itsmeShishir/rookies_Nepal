<?php

namespace App\Exports;

use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VendorProductExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'name',
            'code',
            'category_id',
            'color',
            'description',
            'detail',
            'price',
            'vendor_price',
            'image',
            'status',
            'featured',
            'created_at',
            'updated_at',


        ];
    }
    public function collection()
    {
        // return User::all();
        return collect(Product::where(['user_id'=>Auth::user()->id])->get());
    }
}
