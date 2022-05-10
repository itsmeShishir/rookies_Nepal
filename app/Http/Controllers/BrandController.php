<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.brands')->with(compact('brands'));
    }
    public function addBrands(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $brand = new Brand();
            $brand->company_name = $data['company_name'];
            $brand->email = $data['email'];
            $brand->mobile = $data['mobile'];
            if($request->hasFile('image')){
               $img_temp = $request->file('image');
               if($img_temp->isValid()){
                   $extension = $img_temp->getClientOriginalExtension();
                   $filename= rand(1,10000).'.'.$extension;
                   $img_path = 'uploads/brands/'.$filename;
                   Image::make($img_temp)->save($img_path);
                   $brand->image = $filename;
               } 
           }
           $brand->save();
           return redirect('/admin/brands')->with('flash_message_success','Brand added successfully');
        }
        return view('admin.brands.add_brands');
    }
    public function editBrand(Request $request,$id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('image')){
                 $img_temp = $request->file('image');
                 if($img_temp->isValid()){
                    $extension = $img_temp->getClientOriginalExtension();
                    $filename= rand(1,10000).'.'.$extension;
                    $img_path = 'uploads/side-banners/'.$filename;
                    Image::make($img_temp)->save($img_path);
                } 
            }
            else{
             $filename=$data['current_image'];
            }
            
             Brand::where(['id'=>$id])->update(['company_name'=>$data['company_name'],'email'=>$data['email'],'mobile'=>$data['mobile'],'image'=>$filename]);
             return redirect('/admin/brands')->with('flash_message_success','Brand has been updated');
           
            }
         $brand = Brand::where(['id'=>$id])->first();
         return view('admin.brands.edit_brands',compact('brand'));
       
        }
        public function deleteBrand($id= null){
            $brandImage = Brand::where(['id'=>$id])->first();
            $image_path ='uploads/brands/';
            if(file_exists($image_path.$brandImage->image)){
                unlink($image_path.$brandImage->image);
            }
            Brand::where(['id'=>$id])->delete();
            Alert::success('Delete Success', 'Brand deleted');
            return redirect()->back();
        }
        public function updateStatus(Request $request){
            $data = $request->all();
            Brand::where('id',$data['id'])->update(['status'=>$data["status"]]);
        }

}
