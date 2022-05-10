<?php

namespace App\Exports;

use App\Product;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection,WithHeadings
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
        return collect(Product::all());
    }
}
