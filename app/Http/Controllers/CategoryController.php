<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
  public function addCategory(Request $request){
      if($request->isMethod('post')){
          $data = $request->all();
          $category = new Category();
          $category->name = $data['category_name'];
          $category->parent_id = $data['parent_id'];
          $category->url = $data['category_url'];
          $category->description = $data['category_description'];
          $category->save();
          return redirect('/admin/view-categories')->with('flash_message_success','Category added successfully');
      }
      $levels = Category::where(['parent_id'=>0])->get();
      return view('admin.category.add_category')->with(compact('levels'));
  }
  public function viewCategory(){
    $categories = Category::get();
    return view('admin.category.view_categories')->with(compact('categories'));
  }
  public function editCategory(Request $request,$id){
    if($request->isMethod('post')){
      $data = $request->all();
      Category::where(['id'=>$id])->update(['name'=>$data['category_name'],'parent_id'=>$data['parent_id'],'description'=>$data['category_description'],'url'=>$data['category_url']]);
      return redirect('/admin/view-categories')->with('flash_message_success','Category Updated !!');
    }
    $levels = Category::where(['parent_id'=>0])->get();
    $categoryDetails = Category::where(['id'=>$id])->first();
    return view('admin.category.edit_category')->with(compact('levels','categoryDetails'));
  }
  public function deleteCategory($id){
    Category::where(['id'=>$id])->delete();
    Alert::success('Delete Success', '1 category deleted');
    return redirect()->back();

  }
  public function updateStatus(Request $request){
    $data = $request->all();
    Category::where('id',$data['id'])->update(['status'=>$data["status"]]);
}
}
