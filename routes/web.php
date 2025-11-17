<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\websiteController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\WithdrawlController;
use App\Http\Controllers\LedgerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!levelwaiseincome
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/clear', function(){
    Artisan::call('optimize');
      Artisan::call('cache:clear');
    return 'Optimize Done';
});


Route::get('/login', [UserController::class, 'login'])->name('front.login');
Route::post('/loginajax', [UserController::class, 'loginajax'])->name('loginajax');
//admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::post('/logincheckuser', [UserController::class, 'logincheck'])->name('logincheckuser');

Route::post('/logincheck', [AdminController::class, 'logincheck'])->name('logincheck');
Route::get('/adduser/{id}', [AddUserController::class, 'getusers'])->name('adduser');


Route::get('/paymentupload', function () {
    return view("user.paymentupload");
})->name('paymentupload');

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/product', [FrontController::class, 'product'])->name('product');
Route::get('/productdetails/{id}', [FrontController::class, 'productdetails'])->name('productdetails');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::post('/checkout', [FrontController::class, 'checkout'])->name('checkout');
Route::post('/contactstore', [FrontController::class, 'contactstore'])->name('contact.store');
Route::get('/joinnow', [FrontController::class, 'joinnow'])->name('joinnow');
Route::post('/checksponsor_id', [FrontController::class, 'checksponsor'])->name('checksponsor_id'); 
Route::post('/payout', [WithdrawlController::class, 'payout'])->name('payout');
Route::post('/otherpayout', [WithdrawlController::class, 'otherpayout'])->name('otherpayout');
Route::post('/deletedata', [AdminController::class, 'deletedata'])->name('deletedata');
Route::get('/terms', [FrontController::class, 'terms'])->name('terms');

Route::middleware(['auth.user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('front.dashboard');

    Route::get('/user/support', [SupportController::class, 'usersupport'])->name('user.support');
    Route::post('/store/support', [SupportController::class, 'store'])->name('store.support');
    Route::get('/support/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');
    Route::put('/support/{id}', [SupportController::class, 'update'])->name('support.update');
    Route::delete('/support/{id}', [SupportController::class, 'destroy'])->name('support.destroy');
    
    Route::get('/user/company', [UserController::class, 'company'])->name('front.company');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('front.profile');
    Route::post('/user/editprofile', [UserController::class, 'editprofile'])->name('editprofile');

    Route::get('/userorderlist', [UserController::class, 'orderlist'])->name('user.orderlist');
    Route::delete('/userorderlistdelete/{id}', [UserController::class, 'orderdelete'])->name('user.orderlist.delete');
    
    Route::get('/user/welcome', [UserController::class, 'welcome'])->name('front.welcome');
    
    Route::get('/user/DirectTeam', [UserController::class, 'directteam'])->name('direct_team');
    Route::post('/DirectTeamsearch', [UserController::class, 'DirectTeamsearch'])->name('DirectTeamsearch');
    Route::get('/user/LevelTeam', [UserController::class, 'levelteam'])->name('levet.team');
    Route::post('/LevelTeamsearch', [UserController::class, 'LevelTeamsearch'])->name('LevelTeamsearch');
    Route::get('/user/LevelTeamincome', [UserController::class, 'levelteamincome'])->name('levet.teamincome');
    Route::post('/LevelTeamincomesearch', [UserController::class, 'LevelTeamincomesearch'])->name('LevelTeamincomesearch');
    Route::get('/user/Tree', [UserController::class, 'tree'])->name('user.tree');
    Route::get('/user/CompleteTeam', [UserController::class, 'complateteam'])->name('user.completeteam');
    
    Route::get('/user/mypackage', [UserController::class, 'mypackage'])->name('front.package');
    
    Route::get('/user/withdrawl', [WithdrawlController::class, 'index'])->name('user.withdrawl'); 
    
    Route::get('/user/income', [UserController::class, 'income'])->name('user.income'); 
    Route::post('/incomesearch', [UserController::class, 'incomesearch'])->name('incomesearch');
      
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout'); 
    
    Route::get('/user/adduser', [AddUserController::class, 'usersindex'])->name('user.adduser');
   
    Route::get('/user/product', [AddUserController::class, 'product'])->name('user.product');
   
    Route::get('/user/ledger', [LedgerController::class, 'index'])->name('user.ledger');
    Route::post('/user/ledgersearch', [LedgerController::class, 'ledgersearch'])->name('ledgersearch');
    
});

Route::middleware(['auth.user', 'auth.user:admin'])->prefix('admin')->group(function () {
    
    Route::get('/export-testimonials', [TestimonialController::class, 'exportTestimonials'])->name('testimonial.export');
    Route::get('/export-orderlist', [AdminController::class, 'exportorderlist'])->name('orderlist.export');
    Route::get('/export-userlist', [AddUserController::class, 'exportuserlist'])->name('userlist.export');
    Route::get('/export-activeuser', [AddUserController::class, 'exportactiveuser'])->name('activeuser.export');
    Route::get('/export-inactiveuser', [AddUserController::class, 'exportinactiveuser'])->name('inactiveuser.export');
    Route::get('/export-levelwaiseincome', [AddUserController::class, 'exportlevelwaiseincome'])->name('levelwaiseincome.export');
    Route::get('/export-withdrawl', [WithdrawlController::class, 'exportwithdrawl'])->name('withdrawl.export');
    Route::get('/export-payment', [WithdrawlController::class, 'exportpaymentlist'])->name('payment.export');
    Route::get('/export-contactlist', [AdminController::class, 'exportcontactlist'])->name('contactlist.export');
    Route::get('/export-support', [SupportController::class, 'exportsupport'])->name('support.export');
    
    
    Route::get('/support', [SupportController::class, 'support'])->name('admin.support');
    Route::post('/add/support', [SupportController::class, 'store'])->name('admin.store.support');
    Route::get('/support/{id}/e', [SupportController::class, 'edit'])->name('admin.support.edit');
    Route::put('/admin/support/{id}', [SupportController::class, 'update'])->name('admin.support.update');
    Route::delete('/admin/support/{id}', [SupportController::class, 'destroy'])->name('admin.support.destroy');

    Route::post('/level/news', [NewsController::class, 'store'])->name('store.news');
    Route::patch('/news/{id}/toggle-status', [NewsController::class, 'toggleStatus'])->name('news.toggleStatus');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/level', [LevelController::class, 'index'])->name('level.setting');
    Route::post('/level/store', [LevelController::class, 'store'])->name('store.level');

    Route::get('/contactlist', [AdminController::class, 'contactlist'])->name('contactlist');
    Route::delete('/contactlistdelete/{id}', [AdminController::class, 'contactdelete'])->name('contactlist.delete');

    Route::get('/orderlist', [AdminController::class, 'orderlist'])->name('orderlist');
    Route::post('/orderlistsearch', [AdminController::class, 'orderlistsearch'])->name('orderlistsearch');
    Route::delete('/orderlistdelete/{id}', [AdminController::class, 'orderdelete'])->name('orderlist.delete');

    Route::get('/website', [websiteController::class, 'index'])->name('website.setting');
    Route::post('/level/website', [websiteController::class, 'store'])->name('store.website');
    
    Route::get('/tearms', [websiteController::class, 'tearms'])->name('tearms');
    Route::post('/update/tearms', [websiteController::class, 'update'])->name('store.tearms');

    Route::get('/news', [NewsController::class, 'index'])->name('level.news');
    Route::post('/level/news', [NewsController::class, 'store'])->name('store.news');
    Route::patch('/news/{id}/toggle-status', [NewsController::class, 'toggleStatus'])->name('news.toggleStatus');
    Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/offer', [OffersController::class, 'index'])->name('level.offer');
    Route::post('/level/offer', [OffersController::class, 'store'])->name('store.offer');
    Route::patch('/offer/{id}/toggle-status', [OffersController::class, 'toggleStatus'])->name('offer.toggleStatus');
    Route::get('/offer/{id}/edit', [OffersController::class, 'edit'])->name('offer.edit');
    Route::put('/offer/{id}', [OffersController::class, 'update'])->name('offer.update');
    Route::delete('/offer/{id}', [OffersController::class, 'destroy'])->name('offer.destroy');
    
    Route::get('/slider', [SliderController::class, 'index'])->name('level.slider');
    Route::post('/level/slider', [SliderController::class, 'store'])->name('store.slider');
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{id}/update', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('level.testimonial');
    Route::post('/level/testimonial', [TestimonialController::class, 'store'])->name('store.testimonial');
    Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('/testimonial/{id}/update', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    
    Route::get('/about', [AboutController::class, 'index'])->name('level.about');
    Route::post('/level/about', [AboutController::class, 'store'])->name('store.about');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/{id}/update', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    Route::get('/adduser', [AddUserController::class, 'index'])->name('adduser');
    Route::post('/adduser/store', [AddUserController::class, 'store'])->name('user.store');
    Route::get('/userlist', [AddUserController::class, 'userlist'])->name('userlist');
    Route::post('/userlistsearch', [AddUserController::class, 'userlistsearch'])->name('userlistsearch');
    Route::get('/profile/{id}', [AddUserController::class, 'profile'])->name('admin.profile');

    Route::get('/pendinguser', [AddUserController::class, 'pendinguser'])->name('pending.user');
    Route::get('/activeuser', [AddUserController::class, 'activeuser'])->name('active.user');
    Route::post('/activeusersearch', [AddUserController::class, 'activeusersearch'])->name('activeusersearch');
    Route::get('/inactiveuser', [AddUserController::class, 'inactiveuser'])->name('inactive.user');
    Route::post('/inactiveusersearch', [AddUserController::class, 'inactiveusersearch'])->name('inactiveusersearch');
    Route::post('/user/activate', [AddUserController::class, 'activate'])->name('user.activate');
    Route::get('/levelwaiseincome', [AddUserController::class, 'levelwaiseincome'])->name('levelwaiseincome');
    Route::post('/levelwaiseincomesearch', [AddUserController::class, 'levelwaiseincomesearch'])->name('levelwaiseincomesearch');
    
    Route::get('/levelwaiseincomeget/{id}/{limit}/{member}', [AddUserController::class, 'levelwaiseincomeget'])->name('levelwaiseincomeget');
    Route::get('/levelwaiseincomedatausers/{id}', [AddUserController::class, 'levelwaiseincomedata'])->name('levelwaiseincomedatausers');
    Route::get('/DirectUsers', [AddUserController::class, 'DirectUsers'])->name('DirectUsers');
    Route::get('/cashbacklist', [AddUserController::class, 'cashbacklist'])->name('cashbacklist');
    Route::post('/cashbacklistsearch', [AddUserController::class, 'cashbacklistsearch'])->name('cashbacklistsearch');
    Route::get('/Viewdownline', [AddUserController::class, 'Viewdownline'])->name('Viewdownline');
    Route::get('/Viewdownlinememberslist/{id}', [AddUserController::class, 'Viewdownline'])->name('Viewdownlinememberslist');
    Route::get('/ViewdownlinememberslistDirect/{id}', [AddUserController::class, 'DirectUsers'])->name('ViewdownlinememberslistDirect');

 
    Route::get('/category', [PackageController::class, 'category'])->name('category');
    Route::get('/viewreceipt/{id}', [PackageController::class, 'viewreceipt'])->name('viewreceipt');
    Route::post('/category/store', [PackageController::class, 'categorystore'])->name('store.category');
    Route::get('/categoryedit/{id}', [PackageController::class, 'categoryedit'])->name('category.edit');
    Route::put('/category/{id}/update', [PackageController::class, 'categoryupdate'])->name('category.update');
    Route::delete('/category/{id}', [PackageController::class, 'categorydestroy'])->name('category.destroy');

    Route::get('/package', [PackageController::class, 'package'])->name('package');
    Route::post('/package/store', [PackageController::class, 'packagestore'])->name('store.package');
    Route::get('/packageedit/{id}', [PackageController::class, 'packageedit'])->name('package.edit');
    Route::put('/package/{id}/update', [PackageController::class, 'packageupdate'])->name('package.update');
    Route::delete('/package/{id}', [PackageController::class, 'packagedestroy'])->name('package.destroy');

   
    Route::get('/withdrawl', [WithdrawlController::class, 'index'])->name('withdrawl');
    Route::get('/paymentlist', [WithdrawlController::class, 'paymentlist'])->name('paymentlist');
    Route::get('/Payoutreports', [WithdrawlController::class, 'Payoutreports'])->name('Payoutreports');
    Route::get('/paymenthistory/{id}', [WithdrawlController::class, 'paymenthistory'])->name('paymenthistory');
    Route::post('/Payoutsearch', [WithdrawlController::class, 'Payoutreports'])->name('Payoutsearch');
    
     Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout'); 
    
});


