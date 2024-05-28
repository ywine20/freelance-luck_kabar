<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\MainCategoryController;
use App\Http\Controllers\Backend\SeriesController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\CarModelController;
use App\Http\Controllers\Backend\YearController;
use App\Http\Controllers\Backend\BrandController;    
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });
    Route::prefix('dashboard')->group(function () {
        Route::get('sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('sliders', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');

        Route::get('/main_categories', [MainCategoryController::class, 'index'])->name('main_categories.index');
        Route::get('/main_categories/create', [MainCategoryController::class, 'create'])->name('main_categories.create');
        Route::post('/main_categories', [MainCategoryController::class, 'store'])->name('main_categories.store');
        Route::get('/main_categories/{main_category}/edit', [MainCategoryController::class, 'edit'])->name('main_categories.edit');
        Route::put('/main_categories/{main_category}', [MainCategoryController::class, 'update'])->name('main_categories.update');
        Route::delete('/main_categories/{main_category}', [MainCategoryController::class, 'destroy'])->name('main_categories.destroy');

        Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
        Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');
        Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
        Route::get('/series/{series}/edit', [SeriesController::class, 'edit'])->name('series.edit');
        Route::put('/series/{series}', [SeriesController::class, 'update'])->name('series.update');
        Route::delete('/series/{series}', [SeriesController::class, 'destroy'])->name('series.destroy');

        Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
        Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
        Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
        Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
        Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
        Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
        
        Route::get('/car_models', [CarModelController::class, 'index'])->name('car_models.index');
        Route::get('/car_models/create', [CarModelController::class, 'create'])->name('car_models.create');
        Route::post('/car_models', [CarModelController::class, 'store'])->name('car_models.store');
        Route::get('/car_models/{carModel}/edit', [CarModelController::class, 'edit'])->name('car_models.edit');
        Route::put('/car_models/{carModel}', [CarModelController::class, 'update'])->name('car_models.update');
        Route::delete('/car_models/{carModel}', [CarModelController::class, 'destroy'])->name('car_models.destroy');

        Route::get('/years', [YearController::class, 'index'])->name('years.index');
        Route::get('/years/create', [YearController::class, 'create'])->name('years.create');
        Route::post('/years', [YearController::class, 'store'])->name('years.store');
        Route::get('/years/{year}/edit', [YearController::class, 'edit'])->name('years.edit');
        Route::put('/years/{year}', [YearController::class, 'update'])->name('years.update');
        Route::delete('/years/{year}', [YearController::class, 'destroy'])->name('years.destroy');

        Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');


    });
   
    