<?php

namespace App\Http\Controllers;

use App\HeaderDetail;
use App\Page;
use App\Traits\HeaderHelper;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
  use HeaderHelper;
  public function view(){
      $pages = Page::all();
      return view('admin.pages.view_pages')->with(compact('pages'));
  }
  public function add(Request $request){
    if($request->isMethod('POST')){
      $data = $request->all();
      $page= new Page();
      $page->link = $data['link'];
      $page->description = $data['description'];
      $page->save();
      $pages = Page::all();
      return redirect('/admin/pages')->with(compact('pages'));
    }
    return view('admin.pages.add_pages');
  }
  public function edit(Request $request,$id){
    if($request->isMethod('post')){
        $data = $request->all();
        Page::where(['id'=>$id])->update(['description'=>$data['description']]);
        return redirect()->back()->with('flash_message_success','Page Updated');
    }
    $page = Page::where(['id'=>$id])->first();
    return view("admin.pages.edit_pages")->with(compact('page'));
  }
  public function delete($id){
    Page::where(['id'=>$id])->delete();
    Alert::success('Delete Success', '1 item deleted');
    return redirect()->back();
  }
  public function pageView($link){
      //for header section categories for search and cart item for cart modal 
      $cartItems = $this->cartItems();
      $categories = $this->categoryList();
      $wishList = $this->WishList();
      $headerDetails = HeaderDetail::first();
      //end of header section
      $page = Page::where(['link'=>$link])->first();
      return view('shop.pages.page_view')->with(compact('cartItems','categories','headerDetails','page','wishList'));
  }
}
