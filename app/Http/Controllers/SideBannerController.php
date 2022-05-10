<?php

namespace App\Http\Controllers;
use Image;
use App\SideBanner;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use Symfony\Component\Console\Input\Input;
use App\Banner;
use App\Brand;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionContextPass;
class SideBannerController extends Controller
{
    public function banner(){
        $bannerDetails = SideBanner::orderby('sort_order','asc')->get();;
        return view('admin.sideBanners.banners',compact('bannerDetails'));
    } 
    public function addBanner(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $banner = new SideBanner();
            $banner->sort_order = $data['sort_order'];
            $banner->link = $data['banner_link'];
            if($request->hasFile('image')){
               $img_temp = $request->file('image');
               if($img_temp->isValid()){
                   $extension = $img_temp->getClientOriginalExtension();
                   $filename= rand(1,10000).'.'.$extension;
                   $img_path = 'uploads/side-banners/'.$filename;
                   Image::make($img_temp)->save($img_path);
                   $banner->image = $filename;
               } 
           }
           $banner->save();
           return redirect('/admin/side-banners')->with('flash_message_success','Banners added successfully');
        }
        return view('admin.sideBanners.add_banner');
    }
    public function editBanner(Request $request,$id=null){
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
            
             SideBanner::where(['id'=>$id])->update(['link'=>$data['banner_link'],'image'=>$filename]);
             return redirect('/admin/side-banners')->with('flash_message_success','Side Banner has been updated');
           
            }
         $banner = SideBanner::where(['id'=>$id])->first();
         return view('admin.sideBanners.edit_banner',compact('banner'));
       
        }
        public function deleteBrands($id= null){
            $brandImage = Brand::where(['id'=>$id])->first();
            $image_path ='uploads/brands/';
            if(file_exists($image_path.$brandImage->image)){
                unlink($image_path.$brandImage->image);
            }
            Brand::where(['id'=>$id])->delete();
            Alert::success('Delete Success', 'Brand deleted');
            return redirect()->back();
        }

      
}
