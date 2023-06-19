<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace'=>'Post'], function (){
    Route::get('/posts', 'IndexController')->name('posts.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
    Route::get('/posts/update', 'UpdateController');
    Route::get('/posts/delete', 'DestroyController');
});



Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware' => 'admin'], function(){

    Route::get('users/export/', [\App\Http\Controllers\Export\UserExportController::class, 'export'])->name('export.users');
    Route::get('salary/export/', [\App\Http\Controllers\Export\SalaryByTimeExportController::class, 'export'])->name('export.salary');


    Route::group(['namespace' => 'Position', 'prefix' => 'position'], function(){

        Route::get('/positions', 'IndexController')
            ->name('positions.index');

        Route::get('/create', 'CreateController')
            ->name('position.create');

        Route::post('/positions', 'StoreController')
            ->name('position.store');

        Route::get('/position/{position}/edit', "EditController")
            ->name('admin.position.edit');

        Route::patch('/position/{position}', 'UpdateController')
            ->name('admin.position.update');

    });

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

    Route::group(['namespace'=>'Employee','prefix'=>'employee'],function (){

        Route::get('/employees', "IndexController")
            ->name('admin.employee.index');

        Route::get('/{employee}', "ShowController")
            ->name('admin.employee.show');

        Route::get('/employee/{employee}/edit', "EditController")
            ->name('admin.employee.edit');

        Route::patch('/employee/{employee}', 'UpdateController')
            ->name('admin.employee.update');

        Route::delete('/employee/{employee}', 'DestroyController')
            ->name('admin.employee.delete');
    });

    Route::group(['namespace' => 'Service', 'prefix' => 'service'], function (){

        Route::get('/create', 'CreateController')
            ->name('admin.service.create');

        Route::post('/services', 'StoreController')
            ->name('service.store');

        Route::get('/services', 'IndexController')
            ->name('admin.service.index');

        Route::get('/{service}/edit', 'EditController')
            ->name('admin.service.edit');

        Route::patch('/services/{service}', 'UpdateController')
            ->name('admin.service.update');
    });

    Route::group(['namespace' => 'Rebuke', 'prefix' => 'rebuke'],function (){

        Route::post('/store', 'StoreController')
            ->name('admin.rebuke.store');

        Route::get('/create/{employee}', "CreateController")
            ->name('admin.rebuke.create');

        Route::delete('/{rebuke}', 'DestroyController')
            ->name('admin.rebuke.delete');

    });

    Route::group(['namespace' => 'Job', 'prefix' => 'jobs'], function (){
        Route::get('/view', 'IndexController')
            ->name('admin.job.index');

        Route::get('/view/filtered', 'IndexFilterableController')
            ->name('admin.job.index.filterable');

        Route::get('/{job}', 'ShowController')
            ->name('admin.job.show');

        Route::delete('/delete/{job}', 'DestroyController')
            ->name('admin.job.delete');

    });

    Route::group(['namespace' => 'Statistic', 'prefix' => 'statistic'], function (){

        Route::get('/view', 'IndexController')->name('admin.statistic.index');

        Route::get('/view/month', 'IndexFilterableController')
            ->name('admin.statistic.filterable.index');


        Route::get('/view2', 'Index2Controller')
            ->name('admin.statistic.index2');

        Route::get('/view2/month', 'Index2FilterableController')
            ->name('admin.statistic.filterable.index2');

        Route::get('/positions', 'PositionPieChartController')->name('admin.statistic.PieChartPositions');

        Route::get('/services', 'ServicePieChartController')->name('admin.statistic.PieChartServices');

        Route::get('/services/filtered', 'ServicePieChartFilterableController')
            ->name('admin.statistic.PieChartServices.filterable');


        Route::get('/income', 'IncomeController')->name('companyIncomeStatistic');
        Route::get('/jobs', 'JobsController')->name('companyJobsStatistic');
    });
});


Route::group(['namespace'=>'User', 'prefix' => 'user'], function (){

    Route::get('/profile','IndexController')->name('user.profile');

    Route::group(['namespace'=>'Job','prefix' => 'job'],function (){

        Route::get('/create', 'CreateController')->name('user.job.create');

        Route::post('/jobs', 'StoreController')->name('job.store');

        Route::get('/{job}', 'ShowController')
            ->name('user.job.show');
    });
});



Auth::routes();
Route::group(['middleware' => 'admin'],function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


//Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
