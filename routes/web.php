<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Search;
use App\Http\Livewire\SearchResult;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\CourseMaterial;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\Translate;
use App\Http\Livewire\TranslateMaterial;
use App\Http\Livewire\Settings;
use App\Http\Livewire\Welcome;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\Courses\BranchManagement;
use App\Http\Livewire\Courses\CourseDetail;
use App\Http\Livewire\Message\MessageManage;
use App\Http\Livewire\Message\MessageInbox;
use App\Http\Livewire\Message\MessageOutbox;

use App\Http\Livewire\Collection\CollectionManage;
use App\Http\Livewire\Collection\CollectionFiles;
use App\Http\Livewire\Collection\CollectionShared;

use App\Http\Controllers\ApplicationController;

use Illuminate\Http\Request;

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

Route::get('/', Welcome::class)->name('welcome');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password');//->middleware('signed');

//Route::post('/search-result', [SearchResult::class, 'index'])->name('search-result');
Route::post('/search-result', SearchResult::class)->name('search-result');
Route::get ('/search-result', SearchResult::class)->name('search-result');

//Route::view('search-result','livewire.search-result'); 
// Route::get('/search-result', function() {
//     return view('livewire.search-result');
// })->name('search-result');

Route::middleware('auth')->group(function () {
    Route::get('/search', Search::class)->name('search');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/course-material', CourseMaterial::class)->name('course-material');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/user-profile', UserProfile::class)->name('user-profile');
    Route::get('/user-management', UserManagement::class)->name('user-management');
    Route::get('/branch-management', BranchManagement::class)->name('branch-management');
    Route::get('/course-download/{id}', CourseDetail::class)->name('course-download');
    Route::get('/message', MessageManage::class)->name('message');
    Route::get('/send-message/{email}', MessageManage::class)->name('send-message');
    
    Route::get('/collection', CollectionManage::class)->name('collection');
    Route::get('/collection-shared', CollectionShared::class)->name('collection-shared-forme');

    Route::get('/collection-files/{id}', CollectionFiles::class)->name('collection-files');
    Route::get('/collection-shares/{sharekey}', CollectionFiles::class)->name('collection-shares');

    Route::get('/translate', Translate::class)->name('translate');
    Route::get('/translate-course', TranslateMaterial::class)->name('translate-course');
    Route::post('/translate-course', TranslateMaterial::class)->name('translate-course');
    Route::get('/translate-app', Translate::class)->name('translate-app');
    Route::post('/translate-app', Translate::class)->name('translate-app');
    
    Route::get('/settings', Settings::class)->name('settings');
    
});

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
Route::get('storage/{group}/{file}', 'App\Http\Controllers\SearchController@index')->name('storage');
