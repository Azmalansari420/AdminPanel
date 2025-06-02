<?php

use App\Http\Controllers\admin_con\AdminAuthController;
use App\Http\Controllers\admin_con\Profile_update;
use App\Http\Controllers\admin_con\Site_setting;
use App\Http\Controllers\admin_con\Slider;
use App\Http\Controllers\admin_con\Contact;
use App\Http\Controllers\admin_con\Testimonials;
use App\Http\Controllers\admin_con\Multipleimage;
use App\Http\Controllers\admin_con\Blog;
use Illuminate\Support\Facades\Route;

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index']);
    Route::post('/', [AdminAuthController::class, 'adminlogin'])->name('admin.adminlogin');
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin/dashboard');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin/logout');
});

/*-----------------------------profile update-------------------------------*/
Route::prefix('admin/profile')->group(function () {
    Route::get('/form', [Profile_update::class, 'loadForm'])->name('admin/profile_update');
    Route::post('/form', [Profile_update::class, 'submitForm'])->name('admin/profile_form');
});

/*-------------------------site settings---------------------------*/
Route::prefix('admin/site_setting')->group(function () {
    Route::get('/edit/{id}', [Site_setting::class, 'loadForm'])->name('admin/site_setting/edit');
    Route::post('/edit/{id}', [Site_setting::class, 'submitForm'])->name('admin.site_setting.update');
});


/*------------------------slider----------------------*/
Route::prefix('admin/slider')->group(function () {
    Route::get('/', [Slider::class, 'listing'])->name('admin/slider/list');
    Route::post('/table', [Slider::class, 'getTableData'])->name('admin/slider/table');
    /*------add------*/
    Route::get('/add', [Slider::class, 'add_page_url'])->name('admin/slider/add');
    Route::post('/', [Slider::class, 'datastore_in_database'])->name('admin_con/slider/add_data');
    /*------upadte------*/
    Route::get('/edit/{id}', [Slider::class, 'edit_page_url'])->name('admin/slider/edit');
    Route::post('/edit/{id}', [Slider::class, 'dataupdate_in_database'])->name('admin_con/slider/update_data');
    /*------status------*/
    Route::post('/update_status', [Slider::class, 'updateStatus'])->name('admin/slider/update_status');
    /*------delete------*/
    Route::delete('/delete_data/{id}', [Slider::class, 'delete_data'])->name('admin_con/slider/delete_data');
    Route::delete('/multiple_delete_data', [Slider::class, 'multiple_delete_data'])->name('admin_con/slider/multiple_delete_data');
});


/*------------------------contact----------------------*/
Route::prefix('admin/contact')->group(function () {
    Route::get('/', [Contact::class, 'listing'])->name('admin/contact/list');
    Route::post('/table', [Contact::class, 'getTableData'])->name('admin/contact/table');
    /*------View------*/
    Route::get('/view/{id}', [Contact::class, 'view_page_url'])->name('admin/contact/view');
    /*------delete------*/
    Route::delete('/delete_data/{id}', [Contact::class, 'delete_data'])->name('admin_con/contact/delete_data');
    Route::delete('/multiple_delete_data', [Contact::class, 'multiple_delete_data'])->name('admin_con/contact/multiple_delete_data');
});



/*------------------------testimonials----------------------*/
Route::prefix('admin/testimonials')->group(function () {
    Route::get('/', [Testimonials::class, 'listing'])->name('admin/testimonials/list');
    Route::post('/table', [Testimonials::class, 'getTableData'])->name('admin/testimonials/table');
    /*------add------*/
    Route::get('/add', [Testimonials::class, 'add_page_url'])->name('admin/testimonials/add');
    Route::post('/', [Testimonials::class, 'datastore_in_database'])->name('admin_con/testimonials/add_data');
    /*------upadte------*/
    Route::get('/edit/{id}', [Testimonials::class, 'edit_page_url'])->name('admin/testimonials/edit');
    Route::post('/edit/{id}', [Testimonials::class, 'dataupdate_in_database'])->name('admin_con/testimonials/update_data');
    /*------status------*/
    Route::post('/update_status', [Testimonials::class, 'updateStatus'])->name('admin/testimonials/update_status');
    /*------delete------*/
    Route::delete('/delete_data/{id}', [Testimonials::class, 'delete_data'])->name('admin_con/testimonials/delete_data');
    Route::delete('/multiple_delete_data', [Testimonials::class, 'multiple_delete_data'])->name('admin_con/testimonials/multiple_delete_data');
});


/*------------------------multipleimage----------------------*/
Route::prefix('admin/multipleimage')->group(function () {
    Route::get('/', [Multipleimage::class, 'listing'])->name('admin/multipleimage/list');
    Route::post('/table', [Multipleimage::class, 'getTableData'])->name('admin/multipleimage/table');
    /*------add------*/
    Route::get('/add', [Multipleimage::class, 'add_page_url'])->name('admin/multipleimage/add');
    Route::post('/', [Multipleimage::class, 'datastore_in_database'])->name('admin_con/multipleimage/add_data');
    /*------upadte------*/
    Route::get('/edit/{id}', [Multipleimage::class, 'edit_page_url'])->name('admin/multipleimage/edit');
    Route::post('/edit/{id}', [Multipleimage::class, 'dataupdate_in_database'])->name('admin_con/multipleimage/update_data');
    /*------status------*/
    Route::post('/update_status', [Multipleimage::class, 'updateStatus'])->name('admin/multipleimage/update_status');
    /*------delete------*/
    Route::delete('/delete_data/{id}', [Multipleimage::class, 'delete_data'])->name('admin_con/multipleimage/delete_data');
    Route::delete('/multiple_delete_data', [Multipleimage::class, 'multiple_delete_data'])->name('admin_con/multipleimage/multiple_delete_data');
    /*addmore single*/
    Route::post('/load_more_singleimage', [Multipleimage::class, 'load_more_singleimage'])->name('admin/multipleimage/load_more_singleimage');
    /*add morre multiple*/
    Route::post('/load-more-multiple-image', [Multipleimage::class, 'load_more_multiimage'])->name('admin/multipleimage/load_more_multiimage');
});


/*------------------------blog----------------------*/
Route::prefix('admin/blog')->group(function () {
    Route::get('/', [Blog::class, 'listing'])->name('admin/blog/list');
    Route::post('/table', [Blog::class, 'getTableData'])->name('admin/blog/table');
    /*------add------*/
    Route::get('/add', [Blog::class, 'add_page_url'])->name('admin/blog/add');
    Route::post('/', [Blog::class, 'datastore_in_database'])->name('admin_con/blog/add_data');
    /*------upadte------*/
    Route::get('/edit/{id}', [Blog::class, 'edit_page_url'])->name('admin/blog/edit');
    Route::post('/edit/{id}', [Blog::class, 'dataupdate_in_database'])->name('admin_con/blog/update_data');
    /*------status------*/
    Route::post('/update_status', [Blog::class, 'updateStatus'])->name('admin/blog/update_status');
    /*------delete------*/
    Route::delete('/delete_data/{id}', [Blog::class, 'delete_data'])->name('admin_con/blog/delete_data');
    Route::delete('/multiple_delete_data', [Blog::class, 'multiple_delete_data'])->name('admin_con/blog/multiple_delete_data');
});

