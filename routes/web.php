<?php

use App\CustomerUser;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Product Routes
Route::match(['get','post'],'/','IndexController@index');
Route::match(['get','post'],'/products/{id}','IndexController@product');
Route::get('get-product-price','IndexController@getPrice');
Route::get('get-product-stock','IndexController@getStock');
Route::match(['get','post'],'/rookiesadmin','AdminController@login');
Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard')->middleware('auth');
Route::match(['get','post'],'/admin/add-product','ProductController@addProduct')->middleware('auth');
Route::match(['get','post'],'/admin/view-products','ProductController@viewProduct')->middleware('auth');
Route::match(['get','post'],'/admin/edit-product/{id}','ProductController@editProduct')->middleware('auth');
Route::match(['get','post'],'/admin/delete-product/{id}','ProductController@deleteProduct')->middleware('auth');
Route::get('/logout','AdminController@logout');

//header details
Route::match(['get','post'],'/admin/header-details','HeaderDetailController@index')->middleware('auth');
//aboutUs
Route::match(['get','post'],'/admin/about-us','AboutUsController@index')->middleware('auth');
//faq
Route::match(['get','post'],'/admin/faq','FaqController@index')->middleware('auth');
//Terms and condition
Route::match(['get','post'],'/admin/terms-and-conditions','TermsAndConditionController@index')->middleware('auth');
//Policies
Route::match(['get','post'],'/admin/policies','PolicyController@index')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/admin/update-product-status',"ProductController@updateStatus");
Route::post('/admin/update-product-featured-status',"ProductController@updateProductFeaturedStatus");
Route::post('/admin/update-day-deal-status',"ProductController@updateDayDealStatus");

//Auth Routes
Auth::routes();



//Banners
Route::match(['get','post'],'/admin/banners','BannerController@banner')->middleware('auth');
Route::match(['get','post'],'/admin/add-banner','BannerController@addBanner')->middleware('auth');
Route::match(['get','post'],'/admin/edit-banner/{id}','BannerController@editBanner')->middleware('auth');
Route::match(['get','post'],'/admin/delete-banner/{id}','BannerController@deleteBanner')->middleware('auth');
Route::post('/admin/update-banner-status',"BannerController@updateStatus");

//Side-Banners
Route::match(['get','post'],'/admin/side-banners','SideBannerController@banner')->middleware('auth');
Route::match(['get','post'],'/admin/edit-side-banner/{id}','SideBannerController@editBanner')->middleware('auth');
Route::match(['get','post'],'/admin/add-side-banner','SideBannerController@addBanner')->middleware('auth');
Route::match(['get','post'],'/admin/delete-side-banner/{id}','SideBannerController@deleteBanner')->middleware('auth');

//category routes
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory')->middleware('auth');
Route::match(['get','post'],'/admin/view-categories','CategoryController@viewCategory')->middleware('auth');
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory')->middleware('auth');
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory')->middleware('auth');
Route::post('/admin/update-category-status',"CategoryController@updateStatus");
Route::get("/categories/{category_id}","IndexController@categories");
//Product Attributes
Route::match(['get','post'],'/admin/add-attributes/{id}','ProductController@addAttributes')->middleware('auth');
Route::match(['get','post'],'/admin/delete-attribute/{id}','ProductController@deleteAttribute')->middleware('auth');
Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductController@editAttributes')->middleware('auth');
Route::match(['get','post'],'/admin/add-images/{id}','ProductController@addImages')->middleware('auth');
Route::match(['get','post'],'/admin/delete-attribute-image/{id}','ProductController@deleteImages')->middleware('auth');

//cart
Route::match(['get','post'],'/add-to-cart','CartController@addToCart');
Route::match(['get','post'],'/cart','CartController@cart');
Route::match(['get','post'],'/delete-cart-item/{id}','CartController@deleteCart');
Route::match(['get','post'],'/update-quantity/{id}/{qunatity}','CartController@updateQuantity');

//coupons

Route::match(['get','post'],'/admin/add-coupons','CouponController@addCoupons')->middleware('auth');;
Route::match(['get','post'],'/admin/edit-coupons/{id}','CouponController@editCoupons')->middleware('auth');
Route::match(['get','post'],'/admin/delete-coupons/{id}','CouponController@deleteCoupons');
Route::match(['get','post'],'/admin/view-coupons','CouponController@viewCoupons')->middleware('auth');;
Route::post('/admin/update-coupon-status',"CouponController@updateStatus")->middleware('auth');;
Route::post('/apply-coupons',"CouponController@applyDiscount");

//user login and register
Route::match(['get','post'],'/auth','UserController@auth');
Route::post('/user-register','UserController@register');
Route::post('/user-login','UserController@login');
Route::get('/user-logout','UserController@logout');
Route::match(['get','post'],'/user-account','UserController@userAccount')->middleware('frontLogin');
Route::match(['get','post'],'/user-change-password','UserController@changePassword')->middleware('frontLogin');
Route::match(['get','post'],'/user-change-details','UserController@changeDetails')->middleware('frontLogin');
Route::match(['get','post'],'/checkout','UserController@checkout')->middleware('frontLogin');
//login page from sign-in button
Route::match(['get','post'],'/login-register','IndexController@auth');
//order-review
Route::match(['get','post'],'/order-review','OrderController@orderReview')->middleware('frontLogin');
Route::match(['get','post'],'/order','OrderController@placeOrder')->middleware('frontLogin');
Route::match(['get','post'],'/thanks','OrderController@thanks')->middleware('frontLogin');
Route::match(['get','post'],'/user-orders','OrderController@userOrders')->middleware('frontLogin');
Route::match(['get','post'],'/user-orders/{id}','OrderController@userOrdersDetails')->middleware('frontLogin');

//orders in admin

Route::match(['get','post'],'/admin/orders','OrderController@adminOrders')->middleware('auth');
Route::match(['get','post'],'/admin/orders/new','OrderController@newOrders')->middleware('auth');
Route::match(['get','post'],'/vendor/orders','OrderController@vendorOrders')->middleware('auth');
Route::match(['get','post'],'/admin/orders/{id}','OrderController@adminOrdersDetails')->middleware('auth');
Route::match(['get','post'],'/vendor/orders/{id}','OrderController@vendorOrdersDetails')->middleware('auth');
Route::match(['get','post'],'/admin/update-order-status','OrderController@updateOrderStatus')->middleware('auth');
Route::match(['get','post'],'/vendor/update-order-status','OrderController@updateVendorOrderStatus')->middleware('auth');
Route::match(['get','post'],'/cancel-order/{id}','OrderController@cancelOrder')->middleware('frontLogin');

//invoice
Route::get('admin/order-invoice/{id}','OrderController@orderInvoice');
Route::get('/order-invoice/{id}','OrderController@downloadInvoice');

//vendor
//vendor register
Route::match(['get','post'],'/vendor/register','VendorController@registerVendor');
Route::match(['get','post'],'/admin/vendor/register','VendorController@adminRegisterVendor');
//vendor-display in admin dashboard
Route::match(['get','post'],'/admin/vendors','AdminController@vendors')->middleware('auth');
//update-vendor status
Route::post('/admin/update-vendor-status',"VendorController@updateVendorStatus");
Route::post('/admin/update-user-status',"UserController@updateUserStatus");

//brands
Route::match(['get','post'],'/admin/brands','BrandController@index');
Route::match(['get','post'],'/admin/add-brands','BrandController@addBrands');
Route::match(['get','post'],'/admin/edit-brand/{id}','BrandController@editBrand');
Route::match(['get','post'],'/admin/delete-brand/{id}','BrandController@deleteBrand');
Route::post('/admin/update-brand-status',"BrandController@updateStatus");

Route::match(['get','post'],'/admin/registered-users','AdminController@registeredUsers')->middleware('auth');
Route::match(['get','post'],'/admin/vendor/{id}','ProductController@vendorProducts')->middleware('auth');

//social login
Route::get('login/google', 'SocialLoginController@redirectToProvider');
Route::get('login/google/callback', 'SocialLoginController@handleProviderCallback');

//contact-us
Route::match(['get','post'],'/contact-us','ContactTrioplusController@contactUs');
Route::get('/contact-us/thanks','ContactTrioplusController@thanks');
Route::get('/admin/feedbacks','ContactTrioplusController@adminFeedbacks');
Route::get('/admin/delete-feedback/{id}','ContactTrioplusController@adminFeedbackDelete');

//search
Route::get('/search','ProductController@search');

//info section about page , polices page , terms and conditions page    
Route::get('/about','InfoController@about');
Route::get('/policies','InfoController@policies');
Route::get('/terms-and-conditions','InfoController@termsAndConditions');
Route::get('/faqs','InfoController@faqs');

//wishlist
Route::match(['get','post'],'/add-to-wishlist/{id}','WishListController@addToWishList');
Route::match(['get','post'],'/auth-for-wishlist/{id}','WishListController@auth');
Route::match(['get','post'],'/delete-wish-list-item/{id}','WishListController@deleteWishList');

//exports
Route::match(['get','post'],'/export-vendor-list','ExportController@exportVendorList');
Route::match(['get','post'],'/export-customer-list','ExportController@exportCustomerList');
Route::match(['get','post'],'/export-product-list','ExportController@exportProductList');
Route::match(['get','post'],'/export-vendor-product-list','ExportController@exportVendorProductList');

//news letter
Route::match(['get','post'],'/add-newsletter-subscriber','NewsLetterController@addSubscriber');
Route::match(['get','post'],'/success/newsletter','NewsLetterController@addSubscriber');
Route::match(['get','post'],'/admin/newsletters','NewsLetterController@showSubscribers');
Route::match(['get','post'],'/admin/delete-newsletter-subscriber/{id}','NewsLetterController@deleteSubscriber');

//day deals
Route::match(['get','post'],'/day-deals','IndexController@dayDeals');

//user-wishlist
Route::match(['get','post'],'/user/wishlist/{id}','WishListController@userWishList');

//admins profile 
Route::match(['get','post'],'/admin/profile','AdminController@profile');
Route::match(['get','post'],'/admin/profile/change-password','AdminController@changePassword');

//reviews
Route::match(['get','post'],'/review-add','ReviewController@add');

//pages
Route::match(['get','post'],'/admin/pages','PageController@view');
Route::match(['get','post'],'/admin/add-page','PageController@add');
Route::match(['get','post'],'/admin/pages/edit/{id}','PageController@edit');
Route::match(['get','post'],'/admin/pages/delete/{id}','PageController@delete');
Route::match(['get','post'],'/{link}','PageController@pageView');

//ckeditor upload
Route::post('ckeditor/upload','ProductController@upload')->name('ckeditor.upload');