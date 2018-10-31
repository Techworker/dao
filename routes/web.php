<?php

use \App\Http\Actions;

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
Route::get('/', pascRoute(Actions\HomeAction::class));

Route::get('/proposals/{status}', pascRoute(Actions\Proposal\ShowListAction::class));
Route::get('/proposals/detail/{slug}', pascRoute(Actions\Proposal\ShowDetailAction::class));

Route::get('/profile/dashboard', pascRoute(Actions\Profile\DashboardAction::class));

Route::get  ('/profile/login', pascRoute(Actions\Profile\ShowLoginAction::class));
#Route::post ('/profile/login', pascRoute(Actions\Profile\Api\SaveLoginAction::class));

// contractor
Route::get  ('/profile/contractor', pascRoute(Actions\Profile\ShowContractorsAction::class));
Route::get  ('/profile/contractor/create', pascRoute(Actions\Profile\ShowCreateContractorAction::class));
Route::get  ('/profile/contractor/{contractor}', pascRoute(Actions\Profile\ShowUpdateContractorAction::class));
Route::POST ('/profile/contractor', pascRoute(Actions\Profile\Api\SaveContractorAction::class));

// proposal
Route::get  ('/profile/proposal', pascRoute(Actions\Proposal\ShowListAction::class));
Route::get  ('/profile/proposal/create', pascRoute(Actions\Proposal\ShowCreateFormAction::class));
Route::get  ('/profile/proposal/{proposal}', pascRoute(Actions\Proposal\ShowUpdateFormAction::class));
Route::POST ('/profile/proposal', pascRoute(Actions\Proposal\Api\SaveProposal::class));

Route::get('/contact', pascRoute(Actions\ContactAction::class));

/*
// proposal
Route::get  ('/profile/kyc', 'KycController@proposals')->name('profile_kyc');
Route::get  ('/profile/kyc/create', 'KycController@createKyc')->name('profile_kyc_create');
Route::get  ('/profile/kyc/{kyc}', 'KycController@updateKyc')->name('profile_kyc_update');
Route::POST ('/profile/kyc', 'KycController@createUpdateKyc')->name('profile_kyc_create_update');

// contractor
Route::get('/contractor/{slug}', 'IndexController@contractor')->name('contractor');

Route::post('/profile/contact', 'IndexController@profileUpdateContact')->name('profile_update_contact');

Route::get('/transparency', 'IndexController@transparency')->name('transparency');
Route::get('/contact', 'IndexController@contact')->name('contact');
*/
Auth::routes();
