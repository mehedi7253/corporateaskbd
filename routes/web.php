<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOfferController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Pages\PageServiceController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\User\ServiceorderController;
use App\Http\Controllers\Admin\OrderServiceController;
use App\Http\Controllers\Admin\ServiceProviderController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AdminBooksController;
use App\Http\Controllers\Admin\BookOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Pages\ContactCOntroller;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ManualorderController;
use App\Http\Controllers\Pages\TeampagesController;
use App\Http\Controllers\Admin\CouponCodeController;
use App\Http\Controllers\Admin\CvcheckOrderController;
use App\Http\Controllers\Pages\applyCouponController;
use App\Http\Controllers\Admin\FakeorderController;
use App\Http\Controllers\Admin\MetatageditController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductmetController;
use App\Http\Controllers\Admin\ProductPackageController;
use App\Http\Controllers\Pages\BlogpageController;
use App\Http\Controllers\Pages\BookpageController;
use App\Http\Controllers\Pages\CartController;
use App\Http\Controllers\Pages\CoursepageController;
use App\Http\Controllers\Pages\CvcheckControoler;
use App\Http\Controllers\Pages\CvcheckserviceController;
use App\Http\Controllers\Pages\FileUploadController;
use App\Http\Controllers\Pages\LikeunlikeController;
use App\Http\Controllers\Pages\PagePackageController;
use App\Http\Controllers\Pages\testServiceController;
use App\Http\Controllers\User\UserbookorderController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin
Route::group(['prefix' => 'admin','middleware' => ['admin', 'auth']], function (){
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('services', ServiceController::class);
    Route::resource('order-services', OrderServiceController::class);
    Route::resource('service-provides',ServiceProviderController::class);
    Route::resource('admin-blogs', BlogController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('messages', MessageController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('manual-orders', ManualorderController::class);
    Route::resource('coupon-codes', CouponCodeController::class);
    Route::resource('fake-order', FakeorderController::class);
    Route::get('/users/userLists',[AdminController::class,'userLists'])->name('admin.users.userLists');
    Route::get('/users/userProfile/{id}',[AdminController::class,'userProfile'])->name('admin.users.userProfile');
    Route::PUT('/users/status/{id}',[AdminController::class,'status'])->name('admin.users.status');
    Route::delete('/users/destroy/{id}',[AdminController::class,'destroy'])->name('admin.users.destroy');

    Route::resource('admin-offers', AdminOfferController::class);
    Route::resource('admin-books', AdminBooksController::class);
    Route::resource('bookorders', BookOrderController::class);
    Route::resource('cvcheck-order', CvcheckOrderController::class);

    // affilate
    Route::resource('product-category', ProductCategoryController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-packages', ProductPackageController::class);
    Route::resource('product-meta', ProductmetController::class);
    Route::resource('metatag-edit', MetatageditController::class);
});


//user
Route::group(['prefix' => 'user','middleware' => ['user', 'auth']], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');

    //profile update
    Route::get('/profile/edit',[UserController::class,'edit'])->name('user.profile.edit');
    Route::PUT('/profile/update',[UserController::class,'update'])->name('user.profile.update');
    Route::get('/profile/changePass', [UserController::class, 'changePass'])->name('user.profile.changePass');
    Route::post('/profile/store', [UserController::class, 'store'])->name('user.profile.store');
    //service orders
    Route::resource('service-orders', ServiceorderController::class);
    Route::resource('userbook-orders', UserbookorderController::class);
});



//pages
Route::get('/{name}', [PagePackageController::class, 'show'])->name('pages.show');
Route::get('service/package', [PagePackageController::class, 'index'])->name('service.package.index');
Route::resource('services-packages', PageServiceController::class);
Route::get('books', [BookpageController::class, 'index'])->name('books.index');
Route::get('books/{books_url}', [BookpageController::class, 'book_details'])->name('books.book_details');
Route::post('books/addtocart', [BookpageController::class, 'AddtoCart'])->name('books.addtocart');
Route::resource('carts', CartController::class);

Route::get('blogs/bn',[BlogpageController::class, 'index'])->name('blogsbn.index');
Route::get('/blogs/bn/{name}', [BlogpageController::class, 'show'])->name('pages.blogs.show');

Route::get('/courses-and-tutorials', [CoursepageController::class, 'index'])->name('courses-and-tutorials.index');
Route::get('/course/{tutorials}', [CoursepageController::class, 'show'])->name('courses-and-tutorials.show');
Route::get('/FAQs', function () {
    return view('pages.services.faq');
});

Route::get('/blogs', [BlogpageController::class, 'englishblog'])->name('blog.englishblog');
Route::get('/blogs/{ename}', [BlogpageController::class, 'englishshow'])->name('blog.enblogshow');

// Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');

Route::get('/Niaz-Ahmed', function () {
    return view('pages.ceo.index');
});
Route::get('/payment', function () {
    return view('payment.index');
});
Route::get('/policy', function () {
    return view('pages.policy');
});
Route::get('/about-us', function () {
    return view('pages.about_us');
});

Route::get('cv-check', [CvcheckserviceController::class, 'index'])->name('cvcheck.index');
Route::get('/cv-check/{cvcheck}', [CvcheckserviceController::class, 'cvheckShow'])->name('cvcheck.cvheckShow');
// Route::get('/{name}', [testServiceController::class, 'show'])->name('pages.show');


Route::get('/success', function () {
    return view('pages.cv_check.success');
});

Route::resource('cvchecks', CvcheckControoler::class);
Route::resource('file-upload', FileUploadController::class);

Route::get("sitemap.xml" , function () {
    return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
});

Route::post('/pay_cv', [SslCommerzPaymentController::class, 'cv_pay'])->name('pay_cv.cv_pay');


Route::resource('contact',ContactCOntroller::class);
Route::resource('our-team',TeampagesController::class);
Route::get('apply', [applyCouponController::class,'apply'])->name('apply');

//like unlike
Route::get('/visitor', [LikeunlikeController::class, 'details'])->name('visitr.destails');
Route::put('/like/{id}', [LikeunlikeController::class, 'new_like'])->name('like.new_like');
Route::delete('/unlike/{id}', [LikeunlikeController::class, 'update_like'])->name('unlike.update_like');
// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay.index');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/pay_book', [SslCommerzPaymentController::class, 'book_pay'])->name('pay.book');

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/cache-clear', function() {
   $t = Artisan::call('optimize:clear');
    return $t;
});

