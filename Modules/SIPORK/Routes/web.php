<?php
use Illuminate\Support\Facades\Route;
use Modules\SIPORK\Http\Controllers\PigController;
use Modules\SIPORK\Http\Controllers\GrowthTrackingController;

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
Route::get('/desarrolladores', 'SIPORKController@devs')->name('sipork.desarrolladores');

// rutas para las funciones de los cerdos
Route::middleware(['auth'])->group(function () {
        Route::prefix('sipork')->group(function () {
            // rutas para el administrador
            // rutas para la gestion de cerdos
            Route::get('/admin', 'PigController@index')->name('sipork.admin.sipork.gestion_de_cerdos.index');
            Route::get('/admin/create', 'PigController@create')->name('sipork.admin.sipork.gestion_de_cerdos.create');
            Route::get('/admin/{id}/edit', 'PigController@edit')->name('sipork.admin.sipork.gestion_de_cerdos.edit');
            Route::get('/admin/{id}', 'PigController@show')->name('sipork.admin.sipork.gestion_de_cerdos.show');
            Route::post('/admin/store', 'PigController@store')->name('sipork.admin.sipork.gestion_de_cerdos.store');
            Route::put('/admin/{id}', 'PigController@update')->name('sipork.admin.sipork.gestion_de_cerdos.update');
            Route::delete('/admin/{id}', 'PigController@destroy')->name('sipork.admin.sipork.gestion_de_cerdos.destroy');
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
            Route::get('seguimiento_del_crecimiento/grafica/{id_pig}', [GrowthTrackingController::class, 'showChart'])->name('sipork.admin.sipork.seguimiento_del_crecimiento.chart');
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
            // rutas para los lotes
            Route::get('/lotes', 'LotController@index')->name('sipork.admin.sipork.lotes.index');
            Route::get('/lotes/create', 'LotController@create')->name('sipork.admin.sipork.lotes.create');
            Route::post('/lotes/store', 'LotController@store')->name('sipork.admin.sipork.lotes.store');
            Route::get('/lotes/{id}/edit', 'LotController@edit')->name('sipork.admin.sipork.lotes.edit');
            Route::put('/lotes/{id}', 'LotController@update')->name('sipork.admin.sipork.lotes.update');
            Route::get('/lotes/{id}', 'LotController@show')->name('sipork.admin.sipork.lotes.show');
            Route::delete('/lotes/{id}', 'LotController@destroy')->name('sipork.admin.sipork.lotes.destroy');
            // rutas para asignar cerdos a lotes
            Route::get('/asignar_cerdos_a_lotes', 'PigLotController@index')->name('sipork.admin.sipork.asignar_cerdos_a_lotes.index');
            Route::get('/asignar_cerdos_a_lotes/create', 'PigLotController@create')->name('sipork.admin.sipork.asignar_cerdos_a_lotes.create');
            Route::post('/asignar_cerdos_a_lotes/store', 'PigLotController@store')->name('sipork.admin.sipork.asignar_cerdos_a_lotes.store');
            Route::get('/asignar_cerdos_a_lotes/{id}/edit/{otherId}', 'PigLotController@edit')->name('sipork.admin.sipork.asignar_cerdos_a_lotes.edit');
            Route::put('/asignar_cerdos_a_lotes/{id}/{otherId}', 'PigLotController@update')->name('sipork.admin.sipork.asignar_cerdos_a_lotes.update');
            Route::get('/asignar_cerdos_a_lotes/{id}/{otherId}', 'PigLotController@show')->name('sipork.admin.sipork.asignar_cerdos_a_lotes.show');
            Route::delete('/asignar_cerdos_a_lotes/{id}/{otherId}', 'PigLotController@destroy')->name('sipork.admin.sipork.asignar_cerdos_a_lotes.destroy');
            // rutas para los brotes sanitarios
            Route::get('/brotes_sanitarios', 'SanitaryOutbreakController@index')->name('sipork.admin.sipork.brotes_sanitarios.index');
            Route::get('/brotes_sanitarios/create', 'SanitaryOutbreakController@create')->name('sipork.admin.sipork.brotes_sanitarios.create');
            Route::post('/brotes_sanitarios/store', 'SanitaryOutbreakController@store')->name('sipork.admin.sipork.brotes_sanitarios.store');
            Route::get('/brotes_sanitarios/{id}/edit', 'SanitaryOutbreakController@edit')->name('sipork.admin.sipork.brotes_sanitarios.edit');
            Route::put('/brotes_sanitarios/{id}', 'SanitaryOutbreakController@update')->name('sipork.admin.sipork.brotes_sanitarios.update');
            Route::get('/brotes_sanitarios/{id}', 'SanitaryOutbreakController@show')->name('sipork.admin.sipork.brotes_sanitarios.show');
            Route::delete('/brotes_sanitarios/{id}', 'SanitaryOutbreakController@destroy')->name('sipork.admin.sipork.brotes_sanitarios.destroy');
            // rutas para las dietas
            Route::get('/dietas', 'DietController@index')->name('sipork.admin.sipork.dietas.index');
            Route::get('/dietas/create', 'DietController@create')->name('sipork.admin.sipork.dietas.create');
            Route::post('/dietas/store', 'DietController@store')->name('sipork.admin.sipork.dietas.store');
            Route::get('/dietas/{id}/edit', 'DietController@edit')->name('sipork.admin.sipork.dietas.edit');
            Route::put('/dietas/{id}', 'DietController@update')->name('sipork.admin.sipork.dietas.update');
            Route::get('/dietas/{id}', 'DietController@show')->name('sipork.admin.sipork.dietas.show');
            Route::delete('/dietas/{id}', 'DietController@destroy')->name('sipork.admin.sipork.dietas.destroy');
            // rutas para alimentación
            Route::get('/alimentacion', 'FeedingController@index')->name('sipork.admin.sipork.alimentacion.index');
            Route::get('/alimentacion/create', 'FeedingController@create')->name('sipork.admin.sipork.alimentacion.create');
            Route::post('/alimentacion/store', 'FeedingController@store')->name('sipork.admin.sipork.alimentacion.store');
            Route::get('/alimentacion/{id}/edit', 'FeedingController@edit')->name('sipork.admin.sipork.alimentacion.edit');
            Route::put('/alimentacion/{id}', 'FeedingController@update')->name('sipork.admin.sipork.alimentacion.update');
            Route::get('/alimentacion/{id}', 'FeedingController@show')->name('sipork.admin.sipork.alimentacion.show');
            Route::delete('/alimentacion/{id}', 'FeedingController@destroy')->name('sipork.admin.sipork.alimentacion.destroy');
            // rutas para las bodegas
            Route::get('/bodegas', 'WarehouseSiporkController@index')->name('sipork.admin.sipork.bodegas.index');
            Route::get('/bodegas/create', 'WarehouseSiporkController@create')->name('sipork.admin.sipork.bodegas.create');
            Route::post('/bodegas/store', 'WarehouseSiporkController@store')->name('sipork.admin.sipork.bodegas.store');
            Route::get('/bodegas/{id}/edit', 'WarehouseSiporkController@edit')->name('sipork.admin.sipork.bodegas.edit');
            Route::put('/bodegas/{id}', 'WarehouseSiporkController@update')->name('sipork.admin.sipork.bodegas.update');
            Route::get('/bodegas/{id}', 'WarehouseSiporkController@show')->name('sipork.admin.sipork.bodegas.show');
            Route::delete('/bodegas/{id}', 'WarehouseSiporkController@destroy')->name('sipork.admin.sipork.bodegas.destroy');
            // rutas para los insumos alimenticios
            Route::get('/insumos_alimenticios', 'SupplyFeedingController@index')->name('sipork.admin.sipork.insumos_alimenticios.index');
            Route::get('/insumos_alimenticios/create', 'SupplyFeedingController@create')->name('sipork.admin.sipork.insumos_alimenticios.create');
            Route::post('/insumos_alimenticios/store', 'SupplyFeedingController@store')->name('sipork.admin.sipork.insumos_alimenticios.store');
            Route::get('/insumos_alimenticios/{id}/edit', 'SupplyFeedingController@edit')->name('sipork.admin.sipork.insumos_alimenticios.edit');
            Route::put('/insumos_alimenticios/{id}', 'SupplyFeedingController@update')->name('sipork.admin.sipork.insumos_alimenticios.update');
            Route::get('/insumos_alimenticios/{id}', 'SupplyFeedingController@show')->name('sipork.admin.sipork.insumos_alimenticios.show');
            Route::delete('/insumos_alimenticios/{id}', 'SupplyFeedingController@destroy')->name('sipork.admin.sipork.insumos_alimenticios.destroy');
            // rutas para los suministros
            Route::get('/suministros', 'SupplySiporkController@index')->name('sipork.admin.sipork.suministros.index');
            Route::get('/suministros/create', 'SupplySiporkController@create')->name('sipork.admin.sipork.suministros.create');
            Route::post('/suministros/store', 'SupplySiporkController@store')->name('sipork.admin.sipork.suministros.store');
            Route::get('/suministros/{id}/edit', 'SupplySiporkController@edit')->name('sipork.admin.sipork.suministros.edit');
            Route::put('/suministros/{id}', 'SupplySiporkController@update')->name('sipork.admin.sipork.suministros.update');
            Route::get('/suministros/{id}', 'SupplySiporkController@show')->name('sipork.admin.sipork.suministros.show');
            Route::delete('/suministros/{id}', 'SupplySiporkController@destroy')->name('sipork.admin.sipork.suministros.destroy');
            // rutas para las herramientas
            Route::get('/herramientas', 'ToolSiporkController@index')->name('sipork.admin.sipork.herramientas.index');
            Route::get('/herramientas/create', 'ToolSiporkController@create')->name('sipork.admin.sipork.herramientas.create');
            Route::post('/herramientas/store', 'ToolSiporkController@store')->name('sipork.admin.sipork.herramientas.store');
            Route::get('/herramientas/{id}/edit', 'ToolSiporkController@edit')->name('sipork.admin.sipork.herramientas.edit');
            Route::put('/herramientas/{id}', 'ToolSiporkController@update')->name('sipork.admin.sipork.herramientas.update');
            Route::get('/herramientas/{id}', 'ToolSiporkController@show')->name('sipork.admin.sipork.herramientas.show');
            Route::delete('/herramientas/{id}', 'ToolSiporkController@destroy')->name('sipork.admin.sipork.herramientas.destroy');
            // rutas para el uso de herramientas
            Route::get('/uso_de_herramientas', 'ToolPigController@index')->name('sipork.admin.sipork.uso_de_herramientas.index');
            Route::get('/uso_de_herramientas/create', 'ToolPigController@create')->name('sipork.admin.sipork.uso_de_herramientas.create');
            Route::post('/uso_de_herramientas/store', 'ToolPigController@store')->name('sipork.admin.sipork.uso_de_herramientas.store');
            Route::get('/uso_de_herramientas/{id}/edit', 'ToolPigController@edit')->name('sipork.admin.sipork.uso_de_herramientas.edit');
            Route::put('/uso_de_herramientas/{id}', 'ToolPigController@update')->name('sipork.admin.sipork.uso_de_herramientas.update');
            Route::get('/uso_de_herramientas/{id}', 'ToolPigController@show')->name('sipork.admin.sipork.uso_de_herramientas.show');
            Route::delete('/uso_de_herramientas/{id}', 'ToolPigController@destroy')->name('sipork.admin.sipork.uso_de_herramientas.destroy');
            // rutas para las condiciones ambientales
            Route::get('/condiciones_ambientales', 'EnvironmentalConditionController@index')->name('sipork.admin.sipork.condiciones_ambientales.index');
            Route::get('/condiciones_ambientales/create', 'EnvironmentalConditionController@create')->name('sipork.admin.sipork.condiciones_ambientales.create');
            Route::post('/condiciones_ambientales/store', 'EnvironmentalConditionController@store')->name('sipork.admin.sipork.condiciones_ambientales.store');
            Route::get('/condiciones_ambientales/{id}/edit', 'EnvironmentalConditionController@edit')->name('sipork.admin.sipork.condiciones_ambientales.edit');
            Route::put('/condiciones_ambientales/{id}', 'EnvironmentalConditionController@update')->name('sipork.admin.sipork.condiciones_ambientales.update');
            Route::get('/condiciones_ambientales/{id}', 'EnvironmentalConditionController@show')->name('sipork.admin.sipork.condiciones_ambientales.show');
            Route::delete('/condiciones_ambientales/{id}', 'EnvironmentalConditionController@destroy')->name('sipork.admin.sipork.condiciones_ambientales.destroy');
            // rutas para las medidas de bioseguridad
            Route::get('/medidas_de_bioseguridad', 'BiosecurityMeasureController@index')->name('sipork.admin.sipork.medidas_de_bioseguridad.index');
            Route::get('/medidas_de_bioseguridad/create', 'BiosecurityMeasureController@create')->name('sipork.admin.sipork.medidas_de_bioseguridad.create');
            Route::post('/medidas_de_bioseguridad/store', 'BiosecurityMeasureController@store')->name('sipork.admin.sipork.medidas_de_bioseguridad.store');
            Route::get('/medidas_de_bioseguridad/{id}/edit', 'BiosecurityMeasureController@edit')->name('sipork.admin.sipork.medidas_de_bioseguridad.edit');
            Route::put('/medidas_de_bioseguridad/{id}', 'BiosecurityMeasureController@update')->name('sipork.admin.sipork.medidas_de_bioseguridad.update');
            Route::get('/medidas_de_bioseguridad/{id}', 'BiosecurityMeasureController@show')->name('sipork.admin.sipork.medidas_de_bioseguridad.show');
            Route::delete('/medidas_de_bioseguridad/{id}', 'BiosecurityMeasureController@destroy')->name('sipork.admin.sipork.medidas_de_bioseguridad.destroy');
            // rutas para los reportes
            Route::get('/reportes', 'ReportController@index')->name('sipork.admin.sipork.reportes.index');
            Route::get('/reportes/create', 'ReportController@create')->name('sipork.admin.sipork.reportes.create');
            Route::post('/reportes/store', 'ReportController@store')->name('sipork.admin.sipork.reportes.store');
            Route::get('/reportes/{id}/edit', 'ReportController@edit')->name('sipork.admin.sipork.reportes.edit');
            Route::put('/reportes/{id}', 'ReportController@update')->name('sipork.admin.sipork.reportes.update');
            Route::get('/reportes/{id}', 'ReportController@show')->name('sipork.admin.sipork.reportes.show');
            Route::delete('/reportes/{id}', 'ReportController@destroy')->name('sipork.admin.sipork.reportes.destroy');
            

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // rutas para los lideres de unidad
            // rutas para la gestion de cerdos
            Route::get('/liderDeUnidad', 'PigController@indexlider')->name('sipork.liderDeUnidad.sipork.gestion_de_cerdos.index');
            Route::get('/liderDeUnidad/create', 'PigController@createlider')->name('sipork.liderDeUnidad.sipork.gestion_de_cerdos.create');
            Route::get('/liderDeUnidad/{id}/edit', 'PigController@editlider')->name('sipork.liderDeUnidad.sipork.gestion_de_cerdos.edit');
            Route::get('/liderDeUnidad/{id}', 'PigController@showlider')->name('sipork.liderDeUnidad.sipork.gestion_de_cerdos.show');
            Route::post('/liderDeUnidad/store', 'PigController@storelider')->name('sipork.liderDeUnidad.sipork.gestion_de_cerdos.store');
            Route::put('/liderDeUnidad/{id}', 'PigController@updatelider')->name('sipork.liderDeUnidad.sipork.gestion_de_cerdos.update');
            Route::delete('/liderDeUnidad/{id}', 'PigController@destroylider')->name('sipork.liderDeUnidad.sipork.gestion_de_cerdos.destroy');
            // rutas para condiciones ambientales
            Route::get('/condiciones-ambientales', 'EnvironmentalConditionController@indexlider')->name('sipork.liderDeUnidad.sipork.condiciones-ambientales.index');
            Route::get('/condiciones-ambientales/create', 'EnvironmentalConditionController@createlider')->name('sipork.liderDeUnidad.sipork.condiciones-ambientales.create');
            Route::post('/condiciones-ambientales/store', 'EnvironmentalConditionController@storelider')->name('sipork.liderDeUnidad.sipork.condiciones-ambientales.store');
            Route::get('/condiciones-ambientales/{id}/edit', 'EnvironmentalConditionController@editlider')->name('sipork.liderDeUnidad.sipork.condiciones-ambientales.edit');
            Route::put('/condiciones-ambientales/{id}', 'EnvironmentalConditionController@updatelider')->name('sipork.liderDeUnidad.sipork.condiciones-ambientales.update');
            Route::get('/condiciones-ambientales/{id}', 'EnvironmentalConditionController@showlider')->name('sipork.liderDeUnidad.sipork.condiciones-ambientales.show');
            Route::delete('/condiciones-ambientales/{id}', 'EnvironmentalConditionController@destroylider')->name('sipork.liderDeUnidad.sipork.condiciones-ambientales.destroy');
            // rutas para medidas_de_bioseguridad
            Route::get('/medidas-de-bioseguridad', 'BiosecurityMeasureController@indexlider')->name('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index');
            Route::get('/medidas-de-bioseguridad/create', 'BiosecurityMeasureController@createlider')->name('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.create');
            Route::post('/medidas-de-bioseguridad/store', 'BiosecurityMeasureController@storelider')->name('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.store');
            Route::get('/medidas-de-bioseguridad/{id}/edit', 'BiosecurityMeasureController@editlider')->name('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.edit');
            Route::put('/medidas-de-bioseguridad/{id}', 'BiosecurityMeasureController@updatelider')->name('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.update');
            Route::get('/medidas-de-bioseguridad/{id}', 'BiosecurityMeasureController@showlider')->name('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.show');
            Route::delete('/medidas-de-bioseguridad/{id}', 'BiosecurityMeasureController@destroylider')->name('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.destroy');
            // rutas para los costos-operativos
            Route::get('/costos-operativos', 'OperationalCostController@indexlider')->name('sipork.liderDeUnidad.sipork.costos-operativos.index');
            Route::get('/costos-operativos/create', 'OperationalCostController@createlider')->name('sipork.liderDeUnidad.sipork.costos-operativos.create');
            Route::post('/costos-operativos/store', 'OperationalCostController@storelider')->name('sipork.liderDeUnidad.sipork.costos-operativos.store');
            Route::get('/costos-operativos/{id}/edit', 'OperationalCostController@editlider')->name('sipork.liderDeUnidad.sipork.costos-operativos.edit');
            Route::put('/costos-operativos/{id}', 'OperationalCostController@updatelider')->name('sipork.liderDeUnidad.sipork.costos-operativos.update');
            Route::get('/costos-operativos/{id}', 'OperationalCostController@showlider')->name('sipork.liderDeUnidad.sipork.costos-operativos.show');
            Route::delete('/costos-operativos/{id}', 'OperationalCostController@destroylider')->name('sipork.liderDeUnidad.sipork.costos-operativos.destroy');
            // rutas para los imformes
            Route::get('/informes', 'ReportController@indexlider')->name('sipork.liderDeUnidad.sipork.informes.index');
            Route::get('/informes/create', 'ReportController@createlider')->name('sipork.liderDeUnidad.sipork.informes.create');
            Route::post('/informes/store', 'ReportController@storelider')->name('sipork.liderDeUnidad.sipork.informes.store');
            Route::get('/informes/{id}/edit', 'ReportController@editlider')->name('sipork.liderDeUnidad.sipork.informes.edit');
            Route::put('/informes/{id}', 'ReportController@updatelider')->name('sipork.liderDeUnidad.sipork.informes.update');
            Route::get('/informes/{id}', 'ReportController@showlider')->name('sipork.liderDeUnidad.sipork.informes.show');
            Route::delete('/informes/{id}', 'ReportController@destroylider')->name('sipork.liderDeUnidad.sipork.informes.destroy');


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // rutas para los aprendices
            // rutas para la alimentacion
            Route::get('/ALIMENTACION', 'FeedingController@indexaprendiz')->name('sipork.aprendiz.sipork.ALIMENTACION.index');
            Route::get('/ALIMENTACION/create', 'FeedingController@createaprendiz')->name('sipork.aprendiz.sipork.ALIMENTACION.create');
            Route::post('/ALIMENTACION/store', 'FeedingController@storeaprendiz')->name('sipork.aprendiz.sipork.ALIMENTACION.store');
            Route::get('/ALIMENTACION/{id}/edit', 'FeedingController@editaprendiz')->name('sipork.aprendiz.sipork.ALIMENTACION.edit');
            Route::put('/ALIMENTACION/{id}', 'FeedingController@updateaprendiz')->name('sipork.aprendiz.sipork.ALIMENTACION.update');
            Route::get('/ALIMENTACION/{id}', 'FeedingController@showaprendiz')->name('sipork.aprendiz.sipork.ALIMENTACION.show');
            Route::delete('/ALIMENTACION/{id}', 'FeedingController@destroyaprendiz')->name('sipork.aprendiz.sipork.ALIMENTACION.destroy');
            // rutas para las dietas
            Route::get('/DIETAS', 'DietController@indexaprendiz')->name('sipork.aprendiz.sipork.DIETAS.index');
            Route::get('/DIETAS/create', 'DietController@createaprendiz')->name('sipork.aprendiz.sipork.DIETAS.create');
            Route::post('/DIETAS/store', 'DietController@storeaprendiz')->name('sipork.aprendiz.sipork.DIETAS.store');
            Route::get('/DIETAS/{id}/edit', 'DietController@editaprendiz')->name('sipork.aprendiz.sipork.DIETAS.edit');
            Route::put('/DIETAS/{id}', 'DietController@updateaprendiz')->name('sipork.aprendiz.sipork.DIETAS.update');
            Route::get('/DIETAS/{id}', 'DietController@showaprendiz')->name('sipork.aprendiz.sipork.DIETAS.show');
            Route::delete('/DIETAS/{id}', 'DietController@destroyaprendiz')->name('sipork.aprendiz.sipork.DIETAS.destroy');
            // rutas para los insumos alimenticios
            Route::get('/INSUMOS_ALIMENTICIOS', 'SupplyFeedingController@indexaprendiz')->name('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index');
            Route::get('/INSUMOS_ALIMENTICIOS/create', 'SupplyFeedingController@createaprendiz')->name('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.create');
            Route::post('/INSUMOS_ALIMENTICIOS/store', 'SupplyFeedingController@storeaprendiz')->name('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.store');
            Route::get('/INSUMOS_ALIMENTICIOS/{id}/edit', 'SupplyFeedingController@editaprendiz')->name('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.edit');
            Route::put('/INSUMOS_ALIMENTICIOS/{id}', 'SupplyFeedingController@updateaprendiz')->name('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.update');
            Route::get('/INSUMOS_ALIMENTICIOS/{id}', 'SupplyFeedingController@showaprendiz')->name('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.show');
            Route::delete('/INSUMOS_ALIMENTICIOS/{id}', 'SupplyFeedingController@destroyaprendiz')->name('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.destroy');
            // rutas para los suministros
            Route::get('/SUMINISTROS', 'SupplySiporkController@indexaprendiz')->name('sipork.aprendiz.sipork.SUMINISTROS.index');
            Route::get('/SUMINISTROS/create', 'SupplySiporkController@createaprendiz')->name('sipork.aprendiz.sipork.SUMINISTROS.create');
            Route::post('/SUMINISTROS/store', 'SupplySiporkController@storeaprendiz')->name('sipork.aprendiz.sipork.SUMINISTROS.store');
            Route::get('/SUMINISTROS/{id}/edit', 'SupplySiporkController@editaprendiz')->name('sipork.aprendiz.sipork.SUMINISTROS.edit');
            Route::put('/SUMINISTROS/{id}', 'SupplySiporkController@updateaprendiz')->name('sipork.aprendiz.sipork.SUMINISTROS.update');
            Route::get('/SUMINISTROS/{id}', 'SupplySiporkController@showaprendiz')->name('sipork.aprendiz.sipork.SUMINISTROS.show');
            Route::delete('/SUMINISTROS/{id}', 'SupplySiporkController@destroyaprendiz')->name('sipork.aprendiz.sipork.SUMINISTROS.destroy');
            // rutas para las herramientas
            Route::get('/HERRAMIENTAS', 'ToolSiporkController@indexaprendiz')->name('sipork.aprendiz.sipork.HERRAMIENTAS.index');
            Route::get('/HERRAMIENTAS/create', 'ToolSiporkController@createaprendiz')->name('sipork.aprendiz.sipork.HERRAMIENTAS.create');
            Route::post('/HERRAMIENTAS/store', 'ToolSiporkController@storeaprendiz')->name('sipork.aprendiz.sipork.HERRAMIENTAS.store');
            Route::get('/HERRAMIENTAS/{id}/edit', 'ToolSiporkController@editaprendiz')->name('sipork.aprendiz.sipork.HERRAMIENTAS.edit');
            Route::put('/HERRAMIENTAS/{id}', 'ToolSiporkController@updateaprendiz')->name('sipork.aprendiz.sipork.HERRAMIENTAS.update');
            Route::get('/HERRAMIENTAS/{id}', 'ToolSiporkController@showaprendiz')->name('sipork.aprendiz.sipork.HERRAMIENTAS.show');
            Route::delete('/HERRAMIENTAS/{id}', 'ToolSiporkController@destroyaprendiz')->name('sipork.aprendiz.sipork.HERRAMIENTAS.destroy');
            // rutas para el uso de herramientas
            Route::get('/USO_HERRAMIENTAS', 'ToolPigController@indexaprendiz')->name('sipork.aprendiz.sipork.USO_HERRAMIENTAS.index');
            Route::get('/USO_HERRAMIENTAS/create', 'ToolPigController@createaprendiz')->name('sipork.aprendiz.sipork.USO_HERRAMIENTAS.create');
            Route::post('/USO_HERRAMIENTAS/store', 'ToolPigController@storeaprendiz')->name('sipork.aprendiz.sipork.USO_HERRAMIENTAS.store');
            Route::get('/USO_HERRAMIENTAS/{id}/edit', 'ToolPigController@editaprendiz')->name('sipork.aprendiz.sipork.USO_HERRAMIENTAS.edit');
            Route::put('/USO_HERRAMIENTAS/{id}', 'ToolPigController@updateaprendiz')->name('sipork.aprendiz.sipork.USO_HERRAMIENTAS.update');
            Route::get('/USO_HERRAMIENTAS/{id}', 'ToolPigController@showaprendiz')->name('sipork.aprendiz.sipork.USO_HERRAMIENTAS.show');
            Route::delete('/USO_HERRAMIENTAS/{id}', 'ToolPigController@destroyaprendiz')->name('sipork.aprendiz.sipork.USO_HERRAMIENTAS.destroy');
            // rutas para bodegas
            Route::get('/BODEGAS', 'WarehouseSiporkController@indexaprendiz')->name('sipork.aprendiz.sipork.BODEGAS.index');
            Route::get('/BODEGAS/create', 'WarehouseSiporkController@createaprendiz')->name('sipork.aprendiz.sipork.BODEGAS.create');
            Route::post('/BODEGAS/store', 'WarehouseSiporkController@storeaprendiz')->name('sipork.aprendiz.sipork.BODEGAS.store');
            Route::get('/BODEGAS/{id}/edit', 'WarehouseSiporkController@editaprendiz')->name('sipork.aprendiz.sipork.BODEGAS.edit');
            Route::put('/BODEGAS/{id}', 'WarehouseSiporkController@updateaprendiz')->name('sipork.aprendiz.sipork.BODEGAS.update');
            Route::get('/BODEGAS/{id}', 'WarehouseSiporkController@showaprendiz')->name('sipork.aprendiz.sipork.BODEGAS.show');
            Route::delete('/BODEGAS/{id}', 'WarehouseSiporkController@destroyaprendiz')->name('sipork.aprendiz.sipork.BODEGAS.destroy');
            // rutas para los lotes
            Route::get('/LOTES', 'LotController@indexaprendiz')->name('sipork.aprendiz.sipork.LOTES.index');
            Route::get('/LOTES/create', 'LotController@createaprendiz')->name('sipork.aprendiz.sipork.LOTES.create');
            Route::post('/LOTES/store', 'LotController@storeaprendiz')->name('sipork.aprendiz.sipork.LOTES.store');
            Route::get('/LOTES/{id}/edit', 'LotController@editaprendiz')->name('sipork.aprendiz.sipork.LOTES.edit');
            Route::put('/LOTES/{id}', 'LotController@updateaprendiz')->name('sipork.aprendiz.sipork.LOTES.update');
            Route::get('/LOTES/{id}', 'LotController@showaprendiz')->name('sipork.aprendiz.sipork.LOTES.show');
            Route::delete('/LOTES/{id}', 'LotController@destroyaprendiz')->name('sipork.aprendiz.sipork.LOTES.destroy');
            // rutas para asignar cerdos
            Route::get('/ASIGNAR_CERDOS', 'PigLotController@indexaprendiz')->name('sipork.aprendiz.sipork.ASIGNAR_CERDOS.index');
            Route::get('/ASIGNAR_CERDOS/create', 'PigLotController@createaprendiz')->name('sipork.aprendiz.sipork.ASIGNAR_CERDOS.create');
            Route::post('/ASIGNAR_CERDOS/store', 'PigLotController@storeaprendiz')->name('sipork.aprendiz.sipork.ASIGNAR_CERDOS.store');
            Route::get('/ASIGNAR_CERDOS/{id}/edit/{otherId}', 'PigLotController@editaprendiz')->name('sipork.aprendiz.sipork.ASIGNAR_CERDOS.edit');
            Route::put('/ASIGNAR_CERDOS/{id}/{otherId}', 'PigLotController@updateaprendiz')->name('sipork.aprendiz.sipork.ASIGNAR_CERDOS.update');
            Route::get('/ASIGNAR_CERDOS/{id}/{otherId}', 'PigLotController@showaprendiz')->name('sipork.aprendiz.sipork.ASIGNAR_CERDOS.show');
            Route::delete('/ASIGNAR_CERDOS/{id}/{otherId}', 'PigLotController@destroyaprendiz')->name('sipork.aprendiz.sipork.ASIGNAR_CERDOS.destroy');
            // rutas para ciclos reproductivos
            Route::get('/CICLOS_REPRODUCTIVOS', 'ReproductiveCycleController@indexaprendiz')->name('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index');
            Route::get('/CICLOS_REPRODUCTIVOS/create', 'ReproductiveCycleController@createaprendiz')->name('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.create');
            Route::post('/CICLOS_REPRODUCTIVOS/store', 'ReproductiveCycleController@storeaprendiz')->name('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.store');
            Route::get('/CICLOS_REPRODUCTIVOS/{id}/edit', 'ReproductiveCycleController@editaprendiz')->name('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.edit');
            Route::put('/CICLOS_REPRODUCTIVOS/{id}', 'ReproductiveCycleController@updateaprendiz')->name('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.update');
            Route::get('/CICLOS_REPRODUCTIVOS/{id}', 'ReproductiveCycleController@showaprendiz')->name('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.show');
            Route::delete('/CICLOS_REPRODUCTIVOS/{id}', 'ReproductiveCycleController@destroyaprendiz')->name('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.destroy');
    
            // ruta para generar PDF
            Route::get('admin/sipork/gestion_de_cerdos/pdf', [PigController::class, 'exportPdf'])->name('sipork.admin.sipork.gestion_de_cerdos.pdf');
            
            // rutas para el lenguaje           
            Route::get('/set-language/{locale}', 'LanguageController@setLanguage')->name('sipork.setLanguage');
        });
    });