<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DDL\AdminddlController;
use App\Http\Controllers\DDL\DddRoleController;
use App\Http\Controllers\DDl\DeveloperddlController;
use App\Http\Controllers\DDL\PriorityddlController;
use App\Http\Controllers\DDL\StatusddlController;
use App\Http\Controllers\Login\LoginInfoController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DDL\QaDdlController;
use App\Http\Controllers\Transaction\AllTransaction;
use App\Http\Controllers\Transaction\EditIssueController;
use App\Http\Controllers\Transaction\HistoryController;
use App\Http\Controllers\Transaction\IssueController;
use App\Http\Controllers\Transaction\TransactionAssign;
use App\Http\Controllers\Transaction\TransactionReqDtl;
use App\Http\Controllers\Transaction\TransactionRequestor;
use App\Http\Controllers\User\UserListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::options('{any}', function (Request $request) {
//     return response('', 200)->header('Access-Control-Allow-Origin', '*')
//                             ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
//                             ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
// })->where('any', '.*');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout']);
    Route::post('/get-transaction-by-requestor', [TransactionRequestor::class, 'index']);
    Route::post('/get-transaction-by-requestor-dtl', [TransactionReqDtl::class, 'index']);
    Route::post('/get-transaction-dtl', [EditIssueController::class, 'index']);
    Route::post('/get-transaction-assign', [TransactionAssign::class, 'index']);
    Route::post('/get-transaction-history', [HistoryController::class, 'index']);
    Route::post('/get-transaction-all', [AllTransaction::class, 'index']);
    Route::post('/get-user-list', [UserListController::class, 'index']);
    Route::post('/user-register', [RegisterController::class, 'register']);
});

Route::post('/get-login-info', [LoginInfoController::class, 'index']);
Route::post('/user-login', LoginController::class);
Route::get('/role-ddl', [DddRoleController::class, 'index']);
Route::get('/user-qa-ddl', [QaDdlController::class, 'index']);
Route::get('/user-admin-ddl', [AdminddlController::class, 'index']);
Route::get('/user-dev-ddl', [DeveloperddlController::class, 'index']);
Route::get('/issue-status-ddl', [StatusddlController::class, 'index']);
Route::get('/issue-priority-ddl', [PriorityddlController::class, 'index']);
Route::post('/user-transaction', IssueController::class);





