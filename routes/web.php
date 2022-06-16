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

//----------------- Dashboard

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');



//----------------- Departments

Route::get('/departements/', [App\Http\Controllers\DepartementController::class, 'index'])->name('departement_list');
Route::get('/departements/add', [App\Http\Controllers\DepartementController::class, 'add'])->name('departement_add');
Route::post('/departements/save', [App\Http\Controllers\DepartementController::class, 'store'])->name('departement_store');
Route::get('/departements/modifier/{id}', [App\Http\Controllers\DepartementController::class, 'edit'])->name('departement_edit');
Route::post('/departements/update/{id}', [App\Http\Controllers\DepartementController::class, 'update'])->name('departement_update');
Route::post('/departements/delete/{id}', [App\Http\Controllers\DepartementController::class, 'delete'])->name('departement_delete');

//----------------- Employees

Route::get('/employees/', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee_list');
Route::get('/employees/add', [App\Http\Controllers\EmployeeController::class, 'add'])->name('employee_add');
Route::post('/employees/save', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employee_store');
Route::get('/employees/modifier/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee_edit');
Route::post('/employees/update/{id}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employee_update');
Route::post('/employees/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'delete'])->name('employee_delete');



//----------------- Business

Route::get('/business/', [App\Http\Controllers\BusinessController::class, 'index'])->name('business_list');
Route::get('/business/add', [App\Http\Controllers\BusinessController::class, 'add'])->name('business_add');
Route::post('/business/save', [App\Http\Controllers\BusinessController::class, 'store'])->name('business_store');
Route::get('/business/modifier/{id}', [App\Http\Controllers\BusinessController::class, 'edit'])->name('business_edit');
Route::post('/business/update/{id}', [App\Http\Controllers\BusinessController::class, 'update'])->name('business_update');
Route::post('/business/delete/{id}', [App\Http\Controllers\BusinessController::class, 'delete'])->name('business_delete');



//----------------- Nationality

Route::get('/nationalities/', [App\Http\Controllers\NationalityController::class, 'index'])->name('nationality_list');
Route::get('/nationalities/add', [App\Http\Controllers\NationalityController::class, 'add'])->name('nationality_add');
Route::post('/nationalities/save', [App\Http\Controllers\NationalityController::class, 'store'])->name('nationality_store');
Route::get('/nationalities/modify/{id}', [App\Http\Controllers\NationalityController::class, 'edit'])->name('nationality_edit');
Route::post('/nationalities/update/{id}', [App\Http\Controllers\NationalityController::class, 'update'])->name('nationality_update');
Route::post('/nationalities/delete/{id}', [App\Http\Controllers\NationalityController::class, 'delete'])->name('nationality_delete');




//----------------- Contract type

Route::get('/contracts_type/', [App\Http\Controllers\ContractTypeController::class, 'index'])->name('contract_type_list');
Route::get('/contracts_type/add', [App\Http\Controllers\ContractTypeController::class, 'add'])->name('contract_type_add');
Route::post('/contracts_type/save', [App\Http\Controllers\ContractTypeController::class, 'store'])->name('contract_type_store');
Route::get('/contracts_type/modifier/{id}', [App\Http\Controllers\ContractTypeController::class, 'edit'])->name('contract_type_edit');
Route::post('/contracts_type/update/{id}', [App\Http\Controllers\ContractTypeController::class, 'update'])->name('contract_type_update');
Route::post('/contracts_type/delete/{id}', [App\Http\Controllers\ContractTypeController::class, 'delete'])->name('contract_type_delete');


//----------------- Contract

Route::get('/contracts/', [App\Http\Controllers\ContractController::class, 'index'])->name('contract_list');
Route::get('/contracts/add', [App\Http\Controllers\ContractController::class, 'add'])->name('contract_add');
Route::post('/contracts/save', [App\Http\Controllers\ContractController::class, 'store'])->name('contract_store');
Route::get('/contracts/modifier/{id}', [App\Http\Controllers\ContractController::class, 'edit'])->name('contract_edit');
Route::post('/contracts/update/{id}', [App\Http\Controllers\ContractController::class, 'update'])->name('contract_update');
Route::post('/contracts/delete/{id}', [App\Http\Controllers\ContractController::class, 'delete'])->name('contract_delete');



//----------------- position

Route::get('/positions/', [App\Http\Controllers\PositionController::class, 'index'])->name('position_list');
Route::post('/positions/ajouter', [App\Http\Controllers\PositionController::class, 'store'])->name('position_store');
Route::get('/positions/modifier/{id}', [App\Http\Controllers\PositionController::class, 'edit'])->name('position_edit');
Route::post('/positions/update/{id}', [App\Http\Controllers\PositionController::class, 'update'])->name('position_update');
Route::post('/positions/delete/{id}', [App\Http\Controllers\PositionController::class, 'delete'])->name('position_delete');


//----------------- Assignment

Route::get('/assignments/', [App\Http\Controllers\AssignmentController::class, 'index'])->name('assignment_list');
Route::get('/assignments/add', [App\Http\Controllers\AssignmentController::class, 'add'])->name('assignment_add');
Route::post('/assignments/save', [App\Http\Controllers\AssignmentController::class, 'store'])->name('assignment_store');
Route::get('/assignments/modifier/{id}', [App\Http\Controllers\AssignmentController::class, 'edit'])->name('assignment_edit');
Route::post('/assignments/update/{id}', [App\Http\Controllers\AssignmentController::class, 'update'])->name('assignment_update');
Route::post('/assignments/delete/{id}', [App\Http\Controllers\AssignmentController::class, 'delete'])->name('assignment_delete');


//----------------- experience

Route::get('/experiences/', [App\Http\Controllers\ExperienceController::class, 'index'])->name('experience_list');
Route::post('/experiences/ajouter', [App\Http\Controllers\ExperienceController::class, 'store'])->name('experience_store');
Route::get('/experiences/modifier/{id}', [App\Http\Controllers\ExperienceController::class, 'edit'])->name('experience_edit');
Route::post('/experiences/update/{id}', [App\Http\Controllers\ExperienceController::class, 'update'])->name('experience_update');
Route::post('/experiences/delete/{id}', [App\Http\Controllers\ExperienceController::class, 'delete'])->name('experience_delete');


//----------------- study

Route::get('/studies/', [App\Http\Controllers\StudyController::class, 'index'])->name('study_list');
Route::post('/studies/ajouter', [App\Http\Controllers\StudyController::class, 'store'])->name('study_store');
Route::get('/studies/modifier/{id}', [App\Http\Controllers\StudyController::class, 'edit'])->name('study_edit');
Route::post('/studies/update/{id}', [App\Http\Controllers\StudyController::class, 'update'])->name('study_update');
Route::post('/studies/delete/{id}', [App\Http\Controllers\StudyController::class, 'delete'])->name('study_delete');



//----------------- FAMILY

Route::get('/families/', [App\Http\Controllers\FamilyController::class, 'index'])->name('family_list');
Route::post('/families/ajouter', [App\Http\Controllers\DepartementController::class, 'store'])->name('family_store');
Route::get('/families/modifier/{id}', [App\Http\Controllers\DepartementController::class, 'edit'])->name('family_edit');
Route::post('/families/update/{id}', [App\Http\Controllers\DepartementController::class, 'update'])->name('family_update');
Route::post('/families/delete/{id}', [App\Http\Controllers\DepartementController::class, 'delete'])->name('family_delete');


//----------------- vaccine

Route::get('/vaccines/', [App\Http\Controllers\VaccinController::class, 'index'])->name('vaccine_list');
Route::post('/vaccines/ajouter', [App\Http\Controllers\VaccinController::class, 'store'])->name('vaccine_store');
Route::get('/vaccines/modifier/{id}', [App\Http\Controllers\VaccinController::class, 'edit'])->name('vaccine_edit');
Route::post('/vaccines/update/{id}', [App\Http\Controllers\VaccinController::class, 'update'])->name('vaccine_update');
Route::post('/vaccines/delete/{id}', [App\Http\Controllers\VaccinController::class, 'delete'])->name('vaccine_delete');


//----------------- Apartement
Route::get('/apartment/', [App\Http\Controllers\ApartmentController::class, 'index'])->name('apartment_list');
Route::get('/apartment/add', [App\Http\Controllers\ApartmentController::class, 'add'])->name('apartment_add');
Route::post('/apartment/save', [App\Http\Controllers\ApartmentController::class, 'store'])->name('apartment_store');
Route::get('/apartment/modifier/{id}', [App\Http\Controllers\ApartmentController::class, 'edit'])->name('apartment_edit');
Route::post('/apartment/update/{id}', [App\Http\Controllers\ApartmentController::class, 'update'])->name('apartment_update');
Route::post('/apartment/delete/{id}', [App\Http\Controllers\ApartmentController::class, 'delete'])->name('apartment_delete');
