<?php

use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\Authenticate;
use Illuminate\Auth\Middleware\Authenticate as MiddlewareAuthenticate;
use Illuminate\Auth\Middleware\AdminAuth as MiddlewareAdminauth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home2', [\App\Http\Controllers\HomeController::class, 'index'])->name('home2');
    Route::resource('/niveles', App\Http\Controllers\NiveleController::class);
    Route::get('/nivelesPrint', [App\Http\Controllers\NiveleController::class, 'print'])->name('nivele.print');
    Route::resource('/contratos', App\Http\Controllers\ContratoController::class);
    Route::resource('/generadors', App\Http\Controllers\GeneradorController::class);
    Route::resource('/formularios', App\Http\Controllers\FormularioController::class);
    Route::resource('/tipos', App\Http\Controllers\TipoController::class);
    Route::resource('/formmodels', App\Http\Controllers\FormmodelController::class);
    Route::resource('/factors', App\Http\Controllers\FactorController::class);
    Route::get('/factorsPrint', [App\Http\Controllers\FactorController::class, 'print'])->name('factor.print');
    Route::resource('/competencias', App\Http\Controllers\CompetenciaController::class);
    Route::get('/competenciasPrint', [App\Http\Controllers\CompetenciaController::class, 'print'])->name('competencia.print');
    Route::resource('/selects', App\Http\Controllers\SelectController::class);
    // Route::resource('/matriz', App\Http\Controllers\MatrizController::class);
    Route::controller(App\Http\Controllers\MatrizController::class)->group(function () {
        Route::get('matriz', 'index')->name('matriz.index');
        Route::get('matriz/create', 'create')->name('matriz.create');
        Route::get('/matriz/{id}', 'show')->name('matriz.show');
        Route::get('/matrizprint/{id}', 'pdfprint')->name('matriz.pdfprint');
        Route::post('/setdata', 'setdata')->name('matriz.setdata');
        // Route::post('/matriz/store', 'store')->name('matriz.store');
        Route::post('/recieve', 'recieve')->name('matriz.recieve');
        Route::get('/matrizPrint', 'print')->name('matriz.printIndex');
    });
    Route::controller(App\Http\Controllers\CmatrizController::class)->group(function () {
        Route::get('cmatriz', 'index')->name('cmatriz.index');
        Route::get('cmatriz/create', 'create')->name('cmatriz.create');
        Route::get('/cmatriz/{id}', 'show')->name('cmatriz.show');
        Route::post('/csetdata', 'setdata')->name('cmatriz.setdata');
        Route::get('/cmatrizprint/{id}', 'pdfprint')->name('cmatriz.pdfprint');
        // Route::post('/matriz/store', 'store')->name('matriz.store');
        Route::post('/crecieve', 'recieve')->name('cmatriz.recieve');
        Route::get('/cmatrizPrint', 'print')->name('cmatriz.printIndex');
    });
    Route::resource('/departamentos', App\Http\Controllers\DepartamentoController::class);
    Route::resource('/areas', App\Http\Controllers\AreaController::class);
    Route::get('/areasPrint', [App\Http\Controllers\AreaController::class, 'print'])->name('areas.print');

    Route::resource('/unidads', App\Http\Controllers\UnidadController::class);
    Route::resource('/seccions', App\Http\Controllers\SeccionController::class);
    Route::resource('/personals', App\Http\Controllers\PersonalController::class);
    Route::resource('/jcargos', App\Http\Controllers\JcargoController::class);
    Route::resource('/arbolcargos', App\Http\Controllers\ArbolcargoController::class);

    Route::controller(App\Http\Controllers\EvalproceController::class)->group(function () {
        Route::get('evalproces', 'index')->name('evalproces.index');
        Route::get('evalproces/create', 'create')->name('evalproces.create');
        Route::get('/evalproces/{id}', 'show')->name('evalproces.show');
        Route::get('/evalproces/{id}/edit', 'edit')->name('evalproces.edit');
        Route::patch('/evalproces/{id}', 'update')->name('evalproces.update');
        Route::post('/evalproces', 'store')->name('evalproces.store');
        Route::post('/evalassign', 'evalassign')->name('evalproces.evalassign');
        Route::post('/pruebas', 'recieve')->name('evalproces.pruebas');
        Route::post('/estado', 'estado')->name('evalproces.estado');
        Route::post('/estado_abrir', 'reabrir')->name('evalproces.reabrir');
        Route::get('/vistaPrevia/{id}', 'vistaPrevia')->name('evalproces.vistaPrevia');
        Route::get('/evalPrint', 'print')->name('evalproces.print');
    });

    // Route::resource('/confirmproces', App\Http\Controllers\ConfirmproceController::class);
    
    Route::controller(App\Http\Controllers\ConfirmproceController::class)->group(function () {
        Route::get('confirmproces', 'index')->name('confirmproces.index');
        Route::get('confirmproces/create', 'create')->name('confirmproces.create');
        Route::get('/confirmproces/{id}', 'show')->name('confirmproces.show');
        Route::post('/confirmproces', 'store')->name('confirmproces.store');
        Route::post('/cinitprocess', 'cinitprocess')->name('confirmproces.confassign');
        Route::post('/cpruebas', 'recieve')->name('confirmproces.pruebas');
        Route::get('/confirmPrint', 'print')->name('confirmproces.print');
        Route::post('/creevaluar', 'reevaluar')->name('confirmproces.reevaluar');
    });
    // Route::resource('/evalproces', App\Http\Controllers\EvalproceController::class);
    // Route::resource('/assignments', App\Http\Controllers\AssignmentController::class);

    Route::controller(App\Http\Controllers\AssignmentController::class)->group(function () {
        Route::get('assignments', 'index')->name('assignments.index');
        Route::get('assignments/create', 'create')->name('assignments.create');
        Route::get('/assignments/{id}', 'show')->name('assignments.show');
        Route::post('/assignments', 'store')->name('assignments.store');
        Route::post('/reevaluar', 'reevaluar')->name('assignments.reevaluar');
        Route::post('/uassignments', 'uassignments')->name('assignments.uassignments');
        Route::post('/authUser{id}', 'authUser')->name('assignments.authUser');
        Route::get('/assignmentsPrint', 'print')->name('assignments.print');
        // Route::post('/assignments/{id}', 'edit')->name('assignments.edit');
    });
    
    Route::resource('/confirmassignments', App\Http\Controllers\ConfirmassignmentController::class);
    Route::resource('/cargos', App\Http\Controllers\CargoController::class);

    Route::post('/resultadosCargo', [App\Http\Controllers\CargoController::class, 'buscar'])->name('cargos.buscar');
    Route::get('/cargosPrint', [App\Http\Controllers\CargoController::class, 'print'])->name('cargos.print');


    Route::resource('/jerarquias', App\Http\Controllers\JerarquiaController::class);
    Route::get('/jerarquiasPrint', [App\Http\Controllers\JerarquiaController::class, 'print'])->name('jerarquias.print');

    Route::resource('/secciones', App\Http\Controllers\SeccioneController::class);
    Route::get('/seccionesPrint', [App\Http\Controllers\SeccioneController::class, 'print'])->name('secciones.print');

    Route::resource('/unidades', App\Http\Controllers\UnidadeController::class);
    Route::get('/unidadesPrint', [App\Http\Controllers\UnidadeController::class, 'print'])->name('unidades.print');
    Route::resource('/deptos', App\Http\Controllers\DeptoController::class);
    Route::get('/deptosPrint', [App\Http\Controllers\DeptoController::class, 'print'])->name('deptos.print');

    Route::controller(App\Http\Controllers\UserController::class)->group(function () {
        Route::get('users', 'index')->name('users.index');
        // Route::get('/users/{id}', 'show')->name('users.show');
        Route::get('/udelete/{id}', 'destroy')->name('users.destroy');
        Route::post('/usersedit/{id}', 'editar')->name('users.editar');
        Route::post('/users/{id}', 'actualizar')->name('users.actualizar');
        Route::post('resultadosUsuario', 'buscar')->name('users.buscar');
        Route::get('/relusers', 'relusers')->name('users.relacion');
        Route::get('/usersPrint', 'print')->name('users.print');
        Route::get('/relacionesPrint', 'printRelaciones')->name('users.relprint');
    });


    Route::controller(App\Http\Controllers\ReportevalController::class)->group(function () {
        Route::get('reporteval', 'index')->name('reporteseval.index');
        Route::post('selectprocess', 'selectprocess')->name('reporteseval.selectprocess');
        Route::get('reporteval/create', 'create')->name('reporteseval.create');
        Route::post('/getevalform', 'getForm')->name('reporteseval.getForm');
        Route::post('/seleccion', 'seleccion')->name('reporteseval.seleccion');
    });

    Route::controller(App\Http\Controllers\ReportconfController::class)->group(function () {
        Route::get('reportconf', 'index')->name('reportesconf.index');
        Route::post('selectcprocess', 'selectprocess')->name('reportesconf.selectprocess');
        Route::get('reportconf/create', 'create')->name('reportesconf.create');
    });
});

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/formularios', App\Http\Controllers\FormularioController::class);
    // Route::resource('/headresults', App\Http\Controllers\HeadresultController::class);
    // Route::resource('/bodyresults', App\Http\Controllers\BodyresultController::class);
    Route::controller(App\Http\Controllers\GenController::class)->group(function () {
        Route::post('/generateForm', 'generateForm')->name('genform.generateForm');
        Route::post('/recieveResults', 'recieveResults')->name('genform.recieveResults');
        Route::post('/respuestaForm', 'bringbackForm')->name('genform.bringbackForm');
        Route::post('/recieveAnswer', 'recieveAnswer')->name('genform.recieveAnswer');
        Route::post('/confirmForm', 'confirmForm')->name('genform.confirmacionForm');
        Route::post('/recieveConfesult', 'recieveConfresult')->name('genform.recieveConfesult');
        Route::post('/formResult', 'formresult')->name('genform.formResult');
        Route::post('/formResultPrint', 'print')->name('genform.print');

        Route::post('/cformResult', 'cformresult')->name('genform.cformResult');
        Route::post('/cformResultPrint', 'cprint')->name('genform.cprint');
    });

    Route::resource('/evalresults', App\Http\Controllers\EvalresultController::class);
    Route::resource('/evaldetailsresults', App\Http\Controllers\EvaldetailsresultController::class);
    
});


