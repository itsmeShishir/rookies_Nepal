<?php

namespace App\Http\Controllers;
use App\Category;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;

use Symfony\Component\Console\Input\Input;
use App\Banner;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionContextPass;

class BannerController extends Controller
{
 public function banner(){
     $bannerDetails = Banner::all();
     return view('admin.banners.banners',compact('bannerDetails'));
 } 
 public function addBanner(Request $request){
     if($request->isMethod('post')){
         $data = $request->all();
         $banner = new Banner();
         $banner->name = $data['banner_name'];
         $banner->text_style = $data['text_style'];
         $banner->sort_order = $data['sort_order'];
         $banner->content = $data['banner_content'];
         $banner->link = $data['banner_link'];
         if($request->hasFile('image')){
            $img_temp = $request->file('image');
            if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename= rand(1,10000).'.'.$extension;
                $img_path = 'uploads/banners/'.$filename;
                Image::make($img_temp)->save($img_path);
                $banner->image = $filename;
            } 
        }
        $banner->save();
        return redirect('/admin/banners')->with('flash_message_success','Banners added successfully');
     }
     return view('admin.banners.add_banner');
 }
 public function editBanner(Request $request,$id=null){
    if($request->isMethod('post')){
        $data = $request->all();
        if($request->hasFile('image')){
             $img_temp = $request->file('image');
             if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename= rand(1,10000).'.'.$extension;
                $img_path = 'uploads/banners/'.$filename;
                Image::make($img_temp)->save($img_path);
            } 
        }
        else{
         $filename=$data['current_image'];
        }
        
         Banner::where(['id'=>$id])->update(['name'=>$data['banner_name'],'text_style'=>$data['text_style'],'sort_order'=>$data['sort_order'],'content'=>$data['banner_content'],'link'=>$data['banner_link'],'image'=>$filename]);
         return redirect('/admin/banners')->with('flash_message_success','Banner has been updated');
       
        }
     $banner = Banner::where(['id'=>$id])->first();
     return view('admin.banners.edit_banner',compact('banner'));
   
    }
    public function deleteBanner($id){
        $bannerImage = Banner::where(['id'=>$id])->first();
        $image_path ='uploads/banners/';
        if(file_exists($image_path.$bannerImage->image)){
            unlink($image_path.$bannerImage->image);
        }
        Banner::where(['id'=>$id])->delete();
        Alert::success('Delete Success', '1 item deleted');
        return redirect()->back();
    }
    public function updateStatus(Request $request){
        $data = $request->all();
        // dd($data);
        Banner::where('id',$data['id'])->update(['status'=>$data["status"]]);
    }
}
