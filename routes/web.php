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






//----------------- Contract type

Route::get('/contracts_type/', [App\Http\Controllers\ContractTypeController::class, 'index'])->name('contract_type_list');
Route::get('/contracts_type/add', [App\Http\Controllers\ContractTypeController::class, 'add'])->name('contract_type_add');
Route::post('/contracts_type/save', [App\Http\Controllers\ContractTypeController::class, 'store'])->name('contract_type_store');
Route::get('/contracts_type/modifier/{id}', [App\Http\Controllers\ContractTypeController::class, 'edit'])->name('contract_type_edit');
Route::post('/contracts_type/update/{id}', [App\Http\Controllers\ContractTypeController::class, 'update'])->name('contract_type_update');
Route::post('/contracts_type/delete/{id}', [App\Http\Controllers\ContractTypeController::class, 'delete'])->name('contract_type_delete');


//----------------- Continents

Route::get('/continents/', [App\Http\Controllers\ContinentController::class, 'index'])->name('continent_list');
Route::get('/continents/add', [App\Http\Controllers\ContinentController::class, 'add'])->name('continent_add');
Route::post('/continents/save', [App\Http\Controllers\ContinentController::class, 'store'])->name('continent_store');
Route::get('/continents/modifier/{id}', [App\Http\Controllers\ContinentController::class, 'edit'])->name('continent_edit');
Route::post('/continents/update/{id}', [App\Http\Controllers\ContinentController::class, 'update'])->name('continent_update');
Route::post('/continents/delete/{id}', [App\Http\Controllers\ContinentController::class, 'delete'])->name('continent_delete');




//----------------- Regions

Route::get('/regions/', [App\Http\Controllers\RegionController::class, 'index'])->name('region_list');
Route::get('/regions/add', [App\Http\Controllers\RegionController::class, 'add'])->name('region_add');
Route::post('/regions/save', [App\Http\Controllers\RegionController::class, 'store'])->name('region_store');
Route::get('/regions/modifier/{id}', [App\Http\Controllers\RegionController::class, 'edit'])->name('region_edit');
Route::post('/regions/update/{id}', [App\Http\Controllers\RegionController::class, 'update'])->name('region_update');
Route::post('/regions/delete/{id}', [App\Http\Controllers\RegionController::class, 'delete'])->name('region_delete');



//----------------- Countries

Route::get('/countries/', [App\Http\Controllers\CountrieController::class, 'index'])->name('countrie_list');
Route::get('/countries/add', [App\Http\Controllers\CountrieController::class, 'add'])->name('countrie_add');
Route::post('/countries/save', [App\Http\Controllers\CountrieController::class, 'store'])->name('countrie_store');
Route::get('/countries/modifier/{id}', [App\Http\Controllers\CountrieController::class, 'edit'])->name('countrie_edit');
Route::post('/countries/update/{id}', [App\Http\Controllers\CountrieController::class, 'update'])->name('countrie_update');
Route::post('/countries/delete/{id}', [App\Http\Controllers\CountrieController::class, 'delete'])->name('countrie_delete');



//----------------- Niveaux

Route::get('/niveaus/', [App\Http\Controllers\NiveauController::class, 'index'])->name('niveau_list');
Route::get('/niveaus/add', [App\Http\Controllers\NiveauController::class, 'add'])->name('niveau_add');
Route::post('/niveaus/save', [App\Http\Controllers\NiveauController::class, 'store'])->name('niveau_store');
Route::get('/niveaus/modifier/{id}', [App\Http\Controllers\NiveauController::class, 'edit'])->name('niveau_edit');
Route::post('/niveaus/update/{id}', [App\Http\Controllers\NiveauController::class, 'update'])->name('niveau_update');
Route::post('/niveaus/delete/{id}', [App\Http\Controllers\NiveauController::class, 'delete'])->name('niveau_delete');



//-----------------  Prefectures

Route::get('/prefectures/', [App\Http\Controllers\PrefectureController::class, 'index'])->name('prefecture_list');
Route::get('/prefectures/add', [App\Http\Controllers\PrefectureController::class, 'add'])->name('prefecture_add');
Route::post('/prefectures/save', [App\Http\Controllers\PrefectureController::class, 'store'])->name('prefecture_store');
Route::get('/prefectures/modifier/{id}', [App\Http\Controllers\PrefectureController::class, 'edit'])->name('prefecture_edit');
Route::post('/prefectures/update/{id}', [App\Http\Controllers\PrefectureController::class, 'update'])->name('prefecture_update');
Route::post('/prefectures/delete/{id}', [App\Http\Controllers\PrefectureController::class, 'delete'])->name('prefecture_delete');




//-----------------  Coutumes

Route::get('/coutumes/', [App\Http\Controllers\CoutumeController::class, 'index'])->name('coutume_list');
Route::get('/coutumes/add', [App\Http\Controllers\CoutumeController::class, 'add'])->name('coutume_add');
Route::post('/coutumes/save', [App\Http\Controllers\CoutumeController::class, 'store'])->name('coutume_store');
Route::get('/coutumes/modifier/{id}', [App\Http\Controllers\CoutumeController::class, 'edit'])->name('coutume_edit');
Route::post('/coutumes/update/{id}', [App\Http\Controllers\CoutumeController::class, 'update'])->name('coutume_update');
Route::post('/coutumes/delete/{id}', [App\Http\Controllers\CoutumeController::class, 'delete'])->name('coutume_delete');



//-----------------  Departement

Route::get('/departements/', [App\Http\Controllers\DepartmentController::class, 'index'])->name('departement_list');
Route::get('/departements/add', [App\Http\Controllers\DepartmentController::class, 'add'])->name('departement_add');
Route::post('/departements/save', [App\Http\Controllers\DepartmentController::class, 'store'])->name('departement_store');
Route::get('/departements/modifier/{id}', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('departement_edit');
Route::post('/departements/update/{id}', [App\Http\Controllers\DepartmentController::class, 'update'])->name('departement_update');
Route::post('/departements/delete/{id}', [App\Http\Controllers\DepartmentController::class, 'delete'])->name('departement_delete');





//-----------------  Business

Route::get('/businesses/', [App\Http\Controllers\BusinessController::class, 'index'])->name('business_list');
Route::get('/businesses/add', [App\Http\Controllers\BusinessController::class, 'add'])->name('business_add');
Route::post('/businesses/save', [App\Http\Controllers\BusinessController::class, 'store'])->name('business_store');
Route::get('/businesses/modifier/{id}', [App\Http\Controllers\BusinessController::class, 'edit'])->name('business_edit');
Route::post('/businesses/update/{id}', [App\Http\Controllers\BusinessController::class, 'update'])->name('business_update');
Route::post('/businesses/delete/{id}', [App\Http\Controllers\BusinessController::class, 'delete'])->name('business_delete');




//-----------------  Employes

Route::get('/employes/', [App\Http\Controllers\EmployeController::class, 'index'])->name('employe_list');
Route::get('/employes/add', [App\Http\Controllers\EmployeController::class, 'add'])->name('employe_add');
Route::post('/employes/save', [App\Http\Controllers\EmployeController::class, 'store'])->name('employe_store');
Route::get('/employes/modifier/{id}', [App\Http\Controllers\EmployeController::class, 'edit'])->name('employe_edit');
Route::post('/employes/update/{id}', [App\Http\Controllers\EmployeController::class, 'update'])->name('employe_update');
Route::post('/employes/delete/{id}', [App\Http\Controllers\EmployeController::class, 'delete'])->name('employe_delete');



//-----------------  Contracts

Route::get('/contracts/', [App\Http\Controllers\ContractController::class, 'index'])->name('contract_list');
Route::get('/contracts/add', [App\Http\Controllers\ContractController::class, 'add'])->name('contract_add');
Route::post('/contracts/save', [App\Http\Controllers\ContractController::class, 'store'])->name('contract_store');
Route::get('/contracts/modifier/{id}', [App\Http\Controllers\ContractController::class, 'edit'])->name('contract_edit');
Route::post('/contracts/update/{id}', [App\Http\Controllers\ContractController::class, 'update'])->name('contract_update');
Route::post('/contracts/delete/{id}', [App\Http\Controllers\ContractController::class, 'delete'])->name('contract_delete');




//-----------------  Positions

Route::get('/positions/', [App\Http\Controllers\PositionController::class, 'index'])->name('position_list');
Route::get('/positions/add', [App\Http\Controllers\PositionController::class, 'add'])->name('position_add');
Route::post('/positions/save', [App\Http\Controllers\PositionController::class, 'store'])->name('position_store');
Route::get('/positions/modifier/{id}', [App\Http\Controllers\PositionController::class, 'edit'])->name('position_edit');
Route::post('/positions/update/{id}', [App\Http\Controllers\PositionController::class, 'update'])->name('position_update');
Route::post('/positions/delete/{id}', [App\Http\Controllers\PositionController::class, 'delete'])->name('position_delete');



//-----------------  Assignments

Route::get('/assignments/', [App\Http\Controllers\AssignmentController::class, 'index'])->name('assignment_list');
Route::get('/assignments/add', [App\Http\Controllers\AssignmentController::class, 'add'])->name('assignment_add');
Route::post('/assignments/save', [App\Http\Controllers\AssignmentController::class, 'store'])->name('assignment_store');
Route::get('/assignments/modifier/{id}', [App\Http\Controllers\AssignmentController::class, 'edit'])->name('assignment_edit');
Route::post('/assignments/update/{id}', [App\Http\Controllers\AssignmentController::class, 'update'])->name('assignment_update');
Route::post('/assignments/delete/{id}', [App\Http\Controllers\AssignmentController::class, 'delete'])->name('assignment_delete');



//-----------------  Immunizations

Route::get('/immunizations/', [App\Http\Controllers\ImmunizationController::class, 'index'])->name('immunization_list');
Route::get('/immunizations/add', [App\Http\Controllers\ImmunizationController::class, 'add'])->name('immunization_add');
Route::post('/immunizations/save', [App\Http\Controllers\ImmunizationController::class, 'store'])->name('immunization_store');
Route::get('/immunizations/modifier/{id}', [App\Http\Controllers\ImmunizationController::class, 'edit'])->name('immunization_edit');
Route::post('/immunizations/update/{id}', [App\Http\Controllers\ImmunizationController::class, 'update'])->name('immunization_update');
Route::post('/immunizations/delete/{id}', [App\Http\Controllers\ImmunizationController::class, 'delete'])->name('immunization_delete');



//-----------------  Vaccine

Route::get('/vaccines/', [App\Http\Controllers\VaccineController::class, 'index'])->name('vaccine_list');
Route::get('/vaccines/add', [App\Http\Controllers\VaccineController::class, 'add'])->name('vaccine_add');
Route::post('/vaccines/save', [App\Http\Controllers\VaccineController::class, 'store'])->name('vaccine_store');
Route::get('/vaccines/modifier/{id}', [App\Http\Controllers\VaccineController::class, 'edit'])->name('vaccine_edit');
Route::post('/vaccines/update/{id}', [App\Http\Controllers\VaccineController::class, 'update'])->name('vaccine_update');
Route::post('/vaccines/delete/{id}', [App\Http\Controllers\VaccineController::class, 'delete'])->name('vaccine_delete');





//-----------------  Visa

Route::get('/visas/', [App\Http\Controllers\VisaController::class, 'index'])->name('visa_list');
Route::get('/visas/add', [App\Http\Controllers\VisaController::class, 'add'])->name('visa_add');
Route::post('/visas/save', [App\Http\Controllers\VisaController::class, 'store'])->name('visa_store');
Route::get('/visas/modifier/{id}', [App\Http\Controllers\VisaController::class, 'edit'])->name('visa_edit');
Route::post('/visas/update/{id}', [App\Http\Controllers\VisaController::class, 'update'])->name('visa_update');
Route::post('/visas/delete/{id}', [App\Http\Controllers\VisaController::class, 'delete'])->name('visa_delete');

//-----------------  permit

Route::get('/permits/', [App\Http\Controllers\PermitController::class, 'index'])->name('permit_list');
Route::get('/permits/add', [App\Http\Controllers\PermitController::class, 'add'])->name('permit_add');
Route::post('/permits/save', [App\Http\Controllers\PermitController::class, 'store'])->name('permit_store');
Route::get('/permits/modifier/{id}', [App\Http\Controllers\PermitController::class, 'edit'])->name('permit_edit');
Route::post('/permits/update/{id}', [App\Http\Controllers\PermitController::class, 'update'])->name('permit_update');
Route::post('/permits/delete/{id}', [App\Http\Controllers\PermitController::class, 'delete'])->name('permit_delete');


//----------------- task

Route::get('/tasks/', [App\Http\Controllers\TaskController::class, 'index'])->name('task_list');
Route::get('/tasks/add', [App\Http\Controllers\TaskController::class, 'add'])->name('task_add');
Route::post('/tasks/save', [App\Http\Controllers\TaskController::class, 'store'])->name('task_store');
Route::get('/tasks/modifier/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('task_edit');
Route::post('/tasks/update/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('task_update');
Route::post('/tasks/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('task_delete');


//----------------- departure

Route::get('/departures/', [App\Http\Controllers\DepartureController::class, 'index'])->name('departure_list');
Route::get('/departures/add', [App\Http\Controllers\DepartureController::class, 'add'])->name('departure_add');
Route::post('/departures/save', [App\Http\Controllers\DepartureController::class, 'store'])->name('departure_store');
Route::get('/departures/modifier/{id}', [App\Http\Controllers\DepartureController::class, 'edit'])->name('departure_edit');
Route::post('/departures/update/{id}', [App\Http\Controllers\DepartureController::class, 'update'])->name('departure_update');
Route::post('/departures/delete/{id}', [App\Http\Controllers\DepartureController::class, 'delete'])->name('departure_delete');

//----------------- arrival

Route::get('/arrivals/', [App\Http\Controllers\ArrivalController::class, 'index'])->name('arrival_list');
Route::get('/arrivals/add', [App\Http\Controllers\ArrivalController::class, 'add'])->name('arrival_add');
Route::post('/arrivals/save', [App\Http\Controllers\ArrivalController::class, 'store'])->name('arrival_store');
Route::get('/arrivals/modifier/{id}', [App\Http\Controllers\ArrivalController::class, 'edit'])->name('arrival_edit');
Route::post('/arrivals/update/{id}', [App\Http\Controllers\ArrivalController::class, 'update'])->name('arrival_update');
Route::post('/arrivals/delete/{id}', [App\Http\Controllers\ArrivalController::class, 'delete'])->name('arrival_delete');



//-----------------  Travellers

Route::get('/travelers/', [App\Http\Controllers\TravelerController::class, 'index'])->name('traveler_list');
Route::get('/travelers/add', [App\Http\Controllers\TravelerController::class, 'add'])->name('traveler_add');
Route::post('/travelers/save', [App\Http\Controllers\TravelerController::class, 'store'])->name('traveler_store');
Route::get('/travelers/modifier/{id}', [App\Http\Controllers\TravelerController::class, 'edit'])->name('traveler_edit');
Route::post('/travelers/update/{id}', [App\Http\Controllers\TravelerController::class, 'update'])->name('traveler_update');
Route::post('/travelers/delete/{id}', [App\Http\Controllers\TravelerController::class, 'delete'])->name('traveler_delete');




//-----------------  Diseases

Route::get('/diseases/', [App\Http\Controllers\DiseaseController::class, 'index'])->name('disease_list');
Route::get('/diseases/add', [App\Http\Controllers\DiseaseController::class, 'add'])->name('disease_add');
Route::post('/diseases/save', [App\Http\Controllers\DiseaseController::class, 'store'])->name('disease_store');
Route::get('/diseases/modifier/{id}', [App\Http\Controllers\DiseaseController::class, 'edit'])->name('disease_edit');
Route::post('/diseases/update/{id}', [App\Http\Controllers\DiseaseController::class, 'update'])->name('disease_update');
Route::post('/diseases/delete/{id}', [App\Http\Controllers\DiseaseController::class, 'delete'])->name('disease_delete');




//-----------------  Natures

Route::get('/natures/', [App\Http\Controllers\NatureController::class, 'index'])->name('nature_list');
Route::get('/natures/add', [App\Http\Controllers\NatureController::class, 'add'])->name('nature_add');
Route::post('/natures/save', [App\Http\Controllers\NatureController::class, 'store'])->name('nature_store');
Route::get('/natures/modifier/{id}', [App\Http\Controllers\NatureController::class, 'edit'])->name('nature_edit');
Route::post('/natures/update/{id}', [App\Http\Controllers\NatureController::class, 'update'])->name('nature_update');
Route::post('/natures/delete/{id}', [App\Http\Controllers\NatureController::class, 'delete'])->name('nature_delete');




//-----------------  Vaccines

Route::get('/vaccines/', [App\Http\Controllers\VaccineController::class, 'index'])->name('vaccine_list');
Route::get('/vaccines/add', [App\Http\Controllers\VaccineController::class, 'add'])->name('vaccine_add');
Route::post('/vaccines/save', [App\Http\Controllers\VaccineController::class, 'store'])->name('vaccine_store');
Route::get('/vaccines/modifier/{id}', [App\Http\Controllers\VaccineController::class, 'edit'])->name('vaccine_edit');
Route::post('/vaccines/update/{id}', [App\Http\Controllers\VaccineController::class, 'update'])->name('vaccine_update');
Route::post('/vaccines/delete/{id}', [App\Http\Controllers\VaccineController::class, 'delete'])->name('vaccine_delete');
