<?php

namespace App\Http\Controllers;

use App\Category;
use App\Coupon;
use App\HeaderDetail;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Traits\HeaderHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    use HeaderHelper;
   public function addProduct(Request $request){
       if($request->isMethod('post')){

           $data = $request->all();
           $request->validate([
               'category_id'=>'required',
               'product_name'=>'required|min:4|max:100',
               'product_code'=>'required|max:100',
               'product_color'=>'required|max:10',
               'description'=>'required|max:6000',
               'detail'=>'required|max:6000',
               'image'=>'required',
               'stock'=>'required'
           ]);
        //   echo "<pre>";print_r($data);die;
           
           $product = new Product();
           if(Auth::User()->role == 2){
            $product->status = 0;
            $product->vendor_price = $data['vendor_price'];
            }
            else{
                $product->price = $data['product_price'];
                $product->discounted_price = $data['discounted_price'];
                $product->tax_amount = $data['tax_amount'];
                $product->has_tax = $data['has_tax']??0;
                $product->total_price = $data['tax_amount']+$data['product_price'];
            }
            $product->user_id = Auth::user()->id;
            $product->name = $data['product_name'];
            $product->category_id = $data['category_id'];
            $product->code = $data['product_code'];
            $product->color = $data['product_color'];
            $product->stock = $data['stock'];
            
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }
            if(!empty($data['detail'])){
                $product->detail = $data['detail'];
            }
            else{
               $product->description = "";
               $product->detail= "";
            }
            
           
            if($request->hasFile('image')){
               $img_temp = $request->file('image');
               if($img_temp->isValid()){
                   $extension = $img_temp->getClientOriginalExtension();
                   $filename= rand(1,10000).'.'.$extension;
                   $img_path = 'uploads/products/'.$filename;
                   Image::make($img_temp)->resize(500,500)->save($img_path);
                   $product->image = $filename;
               } 
            }
            $product->save();
            return redirect('/admin/view-products')->with('flash_message_success','Product has been successfully added');
       }
       //categories dropdown menu code
       $categories = Category::where(['parent_id'=>0])->get();
       $categories_dropdown = "<option value='' selected disabled>Select</option>";
       foreach($categories as $cat){
           $categories_dropdown.="<option value='".$cat->id."' >".$cat->name."</option>";
           $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
           foreach($sub_categories as $sub_cat){
               $categories_dropdown.="<option value='".$sub_cat->id."' >&nbsp;--&nbsp;".$sub_cat->name."</option>";
           }
       }
       return view('admin.products.add_product')->with(compact('categories_dropdown'));
   }
   public function viewProduct(){
    //    echo "<pre>";print_r(Auth::user()->role);die;
        if(Auth::user()->role == 1){
            $role = 'admin';
            $products = Product::get();
        }
        else{
            $role = 'vendor';
            $products = Product::where(['user_id'=>Auth::user()->id])->get();
        }
        return view('admin.products.view_products')->with(compact('products','role'));
   }
   public function editProduct(Request $request,$id){
    if($request->isMethod('post')){
        $data = $request->all();
        if($request->hasFile('image')){
             $img_temp = $request->file('image');
             if($img_temp->isValid()){
                $extension = $img_temp->getClientOriginalExtension();
                $filename= rand(1,10000).'.'.$extension;
                $img_path = 'uploads/products/'.$filename;
                Image::make($img_temp)->resize(500,500)->save($img_path);
            } 
        }
        else{
         $filename=$data['current_image'];
        }
        if(empty($data['product_description'])){
             $data['product_description'] = '';
        }
        if(Auth::user()->role == 1){
         Product::where(['id'=>$id])->update(['name'=>$data['product_name'],'category_id'=>$data['category_id'],'code'=>$data['product_code'],'color'=>$data['product_color'],'description'=>$data['product_description'],'detail'=>$data['detail'],'price'=>$data['product_price'],'discounted_price'=>$data['discounted_price'],'stock'=>$data['stock'],'tax_amount'=>$data['tax_amount'],'total_price'=>$data['tax_amount']+$data['product_price'],'image'=>$filename]);
        }else{
            Product::where(['id'=>$id])->update(['name'=>$data['product_name'],'category_id'=>$data['category_id'],'code'=>$data['product_code'],'color'=>$data['product_color'],'description'=>$data['product_description'],'detail'=>$data['detail'],'vendor_price'=>$data['vendor_price'],'image'=>$filename]);
        }
         return redirect('/admin/view-products')->with('flash_message_success','product has been updated');
       
        }

        $productDetails = Product::where(['id'=>$id])->first();
        //category dropdown 
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach($categories as $cat){
            if($cat->id==$productDetails->category_id){
                $selected = "selected";
            }
            else{
                $selected="";
            }
         $categories_dropdown.="<option value='".$cat->id."'".$selected.">".$cat->name."</option>";
         $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
        
         foreach($sub_categories as $sub_cat){
             if($sub_cat->id==$productDetails->category_id){
                 $selected = "selected";
             }
             else{
                 $selected="";
             }
           
             $categories_dropdown.="<option value='".$sub_cat->id."'".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";$sub_cat->name."</option>";
         }
 
        }
        //sub category
       
        return view('admin.products.edit_product',compact('productDetails','categories_dropdown'));
    }
    public function deleteProduct($id){
        $productImage = Product::where(['id'=>$id])->first();
        $image_path ='uploads/products/';
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }
        Product::where(['id'=>$id])->delete();
        Alert::success('Delete Success', '1 item deleted');
        return redirect()->back();
    }
    public function deleteCoupons($id){
        Coupon::where(['id'=>$id])->delete();
        Alert::success('Delete Success', '1 item deleted');
        return redirect()->back();
    }
    public function updateStatus(Request $request){
        $data = $request->all();
        Product::where('id',$data['id'])->update(['status'=>$data["status"]]);
    }
    public function addAttributes(Request $request,$id = null){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>" ;print_r($data);die;
            foreach($data['sku'] as $key=>$val){
                if(!empty($val)){
                    //prevent duplicate sku record
                    $attrCountSku = ProductsAttribute::where(['sku'=>$val,'product_id'=>$id])->count();
                    if($attrCountSku>0){
                        return redirect('/admin/add-attributes/'.$id)->with('flash_message_error','SKU already exists');
                    }
                    //prevent duplicate size record
                    $attrCountSizes = ProductsAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($attrCountSizes>0){
                        return redirect('/admin/add-attributes/'.$id)->with('flash_message_error','Size already exists');
                    }
                    $attribute = new ProductsAttribute();
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                    Product::where(['id'=>$id])->update(['has_attribute'=>1]);
                 }
               }
            return redirect('/admin/add-attributes/'.$id)->with('flash_message_success','Attributes added successfully');
        }
        $productDetails =Product::with('attributes')->where(['id'=>$id])->get()->first();
        return view('admin.products.add_attributes')->with(compact('productDetails'));
    }
    public function deleteAttribute($id=null){
        ProductsAttribute::where(['id'=>$id])->delete();
        Alert::success('Delete Success', 'Attribute deleted');
        return redirect()->back();
    }
    public function editAttributes(Request $request,$id=null){
        if($request->isMethod('POST')){
            $data = $request->all();
             foreach($data['attr'] as $key=>$attr){
                 ProductsAttribute::where(['id'=>$data['attr'][$key]])->update(['sku'=>$data['sku'][$key],'size'=>$data['size'][$key],'price'=>$data['price'][$key],'stock'=>$data['stock'][$key]]);
             }
             return redirect()->back()->with('flash_message_success',"Updated the attribute values");
        }
        
    }
    public function addImages(Request $request,$id=null){
        $productDetails = Product::where(['id'=>$id])->get()->first();
        if($request->isMethod('post')){
            $data=$request->all();
            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $image = new ProductsImage();
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,9999).'.'.$extension;
                    $image_path = 'uploads/products/'.$filename;
                    Image::make($file)->save($image_path);
                    $image->image=$filename;
                    $image->product_id = $data['product_id'];
                    $image->save();
                }
                return redirect('/admin/add-images/'.$id)->with('flash_message_success','Image uploaded');
            }
        }
        $imageDetails = ProductsImage::where(['product_id'=>$id])->get();
        return view('admin.products.add_images')->with(compact('productDetails','imageDetails'));
    }
    public function deleteImages($id= null){
        $productImage = ProductsImage::where(['id'=>$id])->first();
        $image_path ='uploads/products/';
        if(file_exists($image_path.$productImage->image)){
            unlink($image_path.$productImage->image);
        }
        ProductsImage::where(['id'=>$id])->delete();
        Alert::success('Delete Success', 'Image deleted');
        return redirect()->back();
    }
    public function updateProductFeaturedStatus(Request $request){
        $data = $request->all();
        Product::where('id',$data['id'])->update(['featured'=>$data["status"]]);
    }
    public function updateDayDealStatus(Request $request){
        $data = $request->all();
        Product::where('id',$data['id'])->update(['day_deal'=>$data["status"]]);
    }
    public function search(Request $request){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        $data = $request->all();
        $searchTerm = $request->query('keyword');
        if(!($request->has('category'))){
            $searchData = Product::query()
            ->where('name', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('description', 'LIKE', "%{$searchTerm}%")
            ->orWhere('code', 'LIKE', "%{$searchTerm}%")   
            ->paginate(8);
            $searchCount = Product::query()
            ->where('name', 'LIKE', "%{$searchTerm}%") 
            ->orWhere('description', 'LIKE', "%{$searchTerm}%")
            ->orWhere('code', 'LIKE', "%{$searchTerm}%")   
            ->count();
            return view('shop.search.search')->with(compact('categories','cartItems','searchData','headerDetails','wishList','searchCount'));
        }
        else{
            $category=$request->query('category');
            $searchData = Product::query()
            ->where(['category_id'=>$category,]) 
            ->where(function($q)use($searchTerm){
                $q->where('name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                ->orWhere('code', 'LIKE', "%{$searchTerm}%") ;  
            }) 
            ->paginate(8);
            $searchCount = Product::query()
            ->where(['category_id'=>$category,]) 
            ->where(function($q)use($searchTerm){
                $q->where('name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                ->orWhere('code', 'LIKE', "%{$searchTerm}%") ;  
            }) 
            ->count();
           return view('shop.search.search')->with(compact('categories','cartItems','searchData','headerDetails','wishList','searchCount'));
        }
        
    }
    public function vendorProducts($id){
        if(Auth::user()->role == 1){
            $role = 'admin';
            $products = Product::where(['user_id'=>$id])->get();
        }
        else{
            $role = 'vendor';
            $products = Product::where(['user_id'=>Auth::user()->id])->get();
        }
        return view('admin.products.view_products')->with(compact('products','role'));
    }
    public function upload(){
        dd('vayo');
    }


    

}
