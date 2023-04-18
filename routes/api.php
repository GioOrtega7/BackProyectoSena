<?php

use App\Http\Controllers\ActividadProyectoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\gestion_empresa\CompanyController;
use App\Http\Controllers\gestion_rol\RolController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FaseController;
use App\Http\Controllers\gestion_grupo\GrupoController;
use App\Http\Controllers\gestion_grupo\TipoGrupoController;
use App\Http\Controllers\gestion_jornada\JornadaController;
use App\Http\Controllers\gestion_mediopago\MedioPagoController;
use App\Http\Controllers\gestion_notificacion\NotificacionController;
use App\Http\Controllers\gestion_proceso\ProcesoController;
use App\Http\Controllers\gestion_rol_permisos\AsignacionRolPermiso;
use App\Http\Controllers\gestion_tipo_documento\TipoDocumentoController;
use App\Http\Controllers\gestion_tipopago\TipoPagoController;
use App\Http\Controllers\gestion_tipotransaccion\TipoTransaccionController;
use App\Http\Controllers\gestion_usuario\UserController as Gestion_usuarioUserController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\ProyectoFormativoController;
use App\Http\Controllers\TipoProgramasController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\InfraestructuraController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/user', [UserController::class, 'logged']);
    Route::post('/user_company/{idUserActive}', [UserController::class, 'setCompany']);
});

Route::resource('roles', RolController::class);
Route::get('list_companies', [CompanyController::class, 'index']);

//permisos
Route::get('permisos', [AsignacionRolPermiso::class, 'index']);
Route::get('permisos_rol', [AsignacionRolPermiso::class, 'permissionsByRole']);
Route::put('asignar_rol_permiso', [AsignacionRolPermiso::class, 'assignFunctionality']);

// notificaciones
Route::resource('notificaciones', NotificacionController::class);
Route::put('notificaciones/read/{id}', [NotificacionController::class, 'read']);

// proceso
Route::resource('procesos', ProcesoController::class);

// tipo documento
Route::resource('tipo_documentos', TipoDocumentoController::class);
// medio pagos
Route::resource('medio_pagos', MedioPagoController::class);
// tipo pagos
Route::resource('tipo_pagos', TipoPagoController::class);
// tipo transaccion
Route::resource('tipo_transacciones', TipoTransaccionController::class);
// traer listado de los usuario por empresa
Route::get('lista_usuarios', [Gestion_usuarioUserController::class, 'getUsers']);

Route::resource('usuarios', Gestion_usuarioUserController::class);

Route::put('asignar_roles', [Gestion_usuarioUserController::class, 'asignation']);

//ruta tipo_programas
Route::resource('tipo_programas', TipoProgramasController::class);
//ruta para programas
Route::resource('programas', ProgramaController::class);
//ruta para proyecto formativo
Route::resource('proyecto_formativo', ProyectoFormativoController::class);
//ruta para fases
Route::resource('fases', FaseController::class);
//ruta para actividades de proyecto
Route::resource('actividad_proyecto', ActividadProyectoController::class);


//rutas sede -> revisar y optimizar
Route::resource('sedes',SedeController::class);
Route::get('sedes/ciudad/{id}', [SedeController::class,'showByCiudad']);

//ruta de areas
Route::resource('areas',AreaController::class);

//rutas de infraestructura -> revisar y optimizar (crear un grupo de rutas como en ciudades)
Route::resource('infraestructuras',InfraestructuraController::class);
Route::get('infraestructuras/sede/{id}', [InfraestructuraController::class,'showBySede']);
Route::get('infraestructuras/area/{id}', [InfraestructuraController::class,'showByArea']);
Route::get('infraestructuras/sede/{idSede}/area/{idArea}', [InfraestructuraController::class,'showBySedeArea']);

Route::resource('grupos', GrupoController::class);

Route::resource('tipogrupos', TipoGrupoController::class);

Route::resource('jornadas', JornadaController::class);



