<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Exports\ProductExport;
use App\Exports\UsersExport;
use App\Exports\VendorExport;
use App\Exports\VendorProductExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportVendorList(){
        return Excel::download(new VendorExport, 'vendor_list.xlsx');
    }
    public function exportCustomerList(){
        return Excel::download(new CustomerExport, 'customer_list.xlsx');
    }
    public function exportProductList(){
        return Excel::download(new ProductExport, 'product_list.xlsx');
    }
    public function exportVendorProductList(){
        return Excel::download(new VendorProductExport, 'vendor_product_list.xlsx');
    }
}
