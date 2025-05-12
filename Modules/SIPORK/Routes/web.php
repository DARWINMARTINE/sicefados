<?php
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


Route::middleware(['lang'])->group(function () {
    Route::prefix('sipork')->group(function () {
        Route::get('/index', 'SIPORKController@index')->name('cefa.sipork.index');
        Route::get('/admin/welcome', 'SIPORKController@admin')->name('sipork.admin.welcome');
        Route::get('/modules', 'SIPORKController@modules')->name('sipork.modules');

        Route::get('/liderDeUnidad/panelLider', 'SIPORKController@liderDeUnidad')->name('sipork.liderDeUnidad.panelLider');
        Route::get('/aprendiz/panelAprendiz', 'SIPORKController@aprendiz')->name('sipork.aprendiz.panelAprendiz');
        
        });
    
    });

// rutas para las funciones de los cerdos
Route::middleware(['auth'])->group(function () {
        Route::prefix('sipork')->group(function () {

            // rutas para el administrador
            Route::get('/admin', 'PigController@index')->name('sipork.admin.sipork.admin.index');
            Route::get('/admin/create', 'PigController@create')->name('sipork.admin.sipork.admin.create');
            Route::get('/admin/{id}/edit', 'PigController@edit')->name('sipork.admin.sipork.admin.edit');
            Route::get('/admin/{id}', 'PigController@show')->name('sipork.admin.sipork.admin.show');
            Route::post('/admin/store', 'PigController@store')->name('sipork.admin.sipork.admin.store');
            Route::put('/admin/{id}', 'PigController@update')->name('sipork.admin.sipork.admin.update');
            Route::delete('/admin/{id}', 'PigController@destroy')->name('sipork.admin.sipork.admin.destroy');
            // rutas para los siclos reproductivos
            Route::get('/ciclos_reproductivos', 'ReproductiveCycleController@index')->name('sipork.admin.sipork.ciclos_reproductivos.index');
            Route::get('/ciclos_reproductivos/create', 'ReproductiveCycleController@create')->name('sipork.admin.sipork.ciclos_reproductivos.create');
            Route::post('/ciclos_reproductivos/store', 'ReproductiveCycleController@store')->name('sipork.admin.sipork.ciclos_reproductivos.store');
            Route::get('/ciclos_reproductivos/{id}/edit', 'ReproductiveCycleController@edit')->name('sipork.admin.sipork.ciclos_reproductivos.edit');
            Route::put('/ciclos_reproductivos/{id}', 'ReproductiveCycleController@update')->name('sipork.admin.sipork.ciclos_reproductivos.update');
            Route::get('/ciclos_reproductivos/{id}', 'ReproductiveCycleController@show')->name('sipork.admin.sipork.ciclos_reproductivos.show');
            Route::delete('/ciclos_reproductivos/{id}', 'ReproductiveCycleController@destroy')->name('sipork.admin.sipork.ciclos_reproductivos.destroy');
            // rutas para el seguimiento del crecimiento
            Route::get('/seguimiento_del_crecimiento', 'GrowthTrackingController@index')->name('sipork.admin.sipork.seguimiento_del_crecimiento.index');
            Route::get('/seguimiento_del_crecimiento/create', 'GrowthTrackingController@create')->name('sipork.admin.sipork.seguimiento_del_crecimiento.create');
            Route::post('/seguimiento_del_crecimiento/store', 'GrowthTrackingController@store')->name('sipork.admin.sipork.seguimiento_del_crecimiento.store');
            Route::get('/seguimiento_del_crecimiento/{id}/edit', 'GrowthTrackingController@edit')->name('sipork.admin.sipork.seguimiento_del_crecimiento.edit');
            Route::put('/seguimiento_del_crecimiento/{id}', 'GrowthTrackingController@update')->name('sipork.admin.sipork.seguimiento_del_crecimiento.update');
            Route::get('/seguimiento_del_crecimiento/{id}', 'GrowthTrackingController@show')->name('sipork.admin.sipork.seguimiento_del_crecimiento.show');
            Route::delete('/seguimiento_del_crecimiento/{id}', 'GrowthTrackingController@destroy')->name('sipork.admin.sipork.seguimiento_del_crecimiento.destroy');
            // rutas para los registros de salud
            Route::get('/registros_de_salud', 'HealthRecordController@index')->name('sipork.admin.sipork.registros_de_salud.index');
            Route::get('/registros_de_salud/create', 'HealthRecordController@create')->name('sipork.admin.sipork.registros_de_salud.create');
            Route::post('/registros_de_salud/store', 'HealthRecordController@store')->name('sipork.admin.sipork.registros_de_salud.store');
            Route::get('/registros_de_salud/{id}/edit', 'HealthRecordController@edit')->name('sipork.admin.sipork.registros_de_salud.edit');
            Route::put('/registros_de_salud/{id}', 'HealthRecordController@update')->name('sipork.admin.sipork.registros_de_salud.update');
            Route::get('/registros_de_salud/{id}', 'HealthRecordController@show')->name('sipork.admin.sipork.registros_de_salud.show');
            Route::delete('/registros_de_salud/{id}', 'HealthRecordController@destroy')->name('sipork.admin.sipork.registros_de_salud.destroy');
            // rutas para los costos operativos
            Route::get('/costos_operativos', 'OperationalCostController@index')->name('sipork.admin.sipork.costos_operativos.index');
            Route::get('/costos_operativos/create', 'OperationalCostController@create')->name('sipork.admin.sipork.costos_operativos.create');
            Route::post('/costos_operativos/store', 'OperationalCostController@store')->name('sipork.admin.sipork.costos_operativos.store');
            Route::get('/costos_operativos/{id}/edit', 'OperationalCostController@edit')->name('sipork.admin.sipork.costos_operativos.edit');
            Route::put('/costos_operativos/{id}', 'OperationalCostController@update')->name('sipork.admin.sipork.costos_operativos.update');
            Route::get('/costos_operativos/{id}', 'OperationalCostController@show')->name('sipork.admin.sipork.costos_operativos.show');
            Route::delete('/costos_operativos/{id}', 'OperationalCostController@destroy')->name('sipork.admin.sipork.costos_operativos.destroy');


            // rutas para los lideres de unidad
            Route::get('/liderDeUnidad', 'PigController@index')->name('sipork.liderDeUnidad.sipork.liderDeUnidad.index');
            Route::get('/liderDeUnidad/create', 'PigController@create')->name('sipork.liderDeUnidad.sipork.liderDeUnidad.create');

            // rutas para los aprendices
            Route::get('/aprendiz', 'PigController@index')->name('sipork.aprendiz.sipork.aprendiz.index');
            Route::get('/aprendiz/create', 'PigController@create')->name('sipork.aprendiz.sipork.aprendiz.create');

            // rutas para el lenguaje
            Route::get('/set-language/{locale}', 'LanguageController@setLanguage')->name('sipork.setLanguage');
            
        });
    });
