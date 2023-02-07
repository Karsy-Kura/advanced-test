<?php

use App\Consts\ControllerConst;
use App\Consts\RouteConst;
use App\Http\Controllers\ContactController;
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

// contact.
Route::group([RouteConst::ROUTE_PREFIX => RouteConst::ROUTE_CONTACT], function () {

  Route::get(
    RouteConst::ROUTE_ROOT,
    [ContactController::class, ControllerConst::CTRL_FUNC_INDEX]
  );
  Route::post(
    RouteConst::ROUTE_ROOT,
    [ContactController::class, ControllerConst::CTRL_FUNC_MODIFY]
  );

  Route::post(
    RouteConst::ROUTE_CONFIRM,
    [ContactController::class, ControllerConst::CTRL_FUNC_CONFIRM]
  );
  Route::post(
    RouteConst::ROUTE_CREATE,
    [ContactController::class, ControllerConst::CTRL_FUNC_CREATE]
  );
  Route::get(
    RouteConst::ROUTE_CLOSE,
    [ContactController::class, ControllerConst::CTRL_FUNC_CLOSE]
  );

  // management.
  Route::group([RouteConst::ROUTE_PREFIX => RouteConst::ROUTE_MANAGEMENT], function () {

    Route::get(
      RouteConst::ROUTE_ROOT,
      [ContactController::class, ControllerConst::CTRL_FUNC_MANAGE]
    );
    Route::get(
      RouteConst::ROUTE_SEARCH,
      [ContactController::class, ControllerConst::CTRL_FUNC_SEARCH]
    );
    Route::post(
      RouteConst::ROUTE_DELETE,
      [ContactController::class, ControllerConst::CTRL_FUNC_DELETE]
    );
  });
});
