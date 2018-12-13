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
Route::post('/proposals/{proposal}/comment', pascRoute(Actions\Proposal\Api\AddCommentAction::class));
Route::get('/proposals/{proposal}/{slug}', pascRoute(Actions\Proposal\ShowDetailAction::class));
Route::get('/proposals/{proposal}/{slug}/payouts/{contract}', pascRoute(Actions\Proposal\ShowPayoutsAction::class));

Route::get('/contractor/{contractor}/{slug}', pascRoute(Actions\Contractor\ShowAction::class));

Route::get('/contact', pascRoute(Actions\Contact\ShowAction::class));
Route::get('/foundation', pascRoute(Actions\Foundation\ShowAction::class));

Route::get('/profile', pascRoute(Actions\Profile\DashboardAction::class));
Route::get('/profile/login-data', pascRoute(Actions\Profile\Login\ShowAction::class));
Route::post('/profile/login-data', pascRoute(Actions\Profile\Login\Api\SaveAction::class));

Route::get('/profile/contractor/{contractor?}', pascRoute(Actions\Profile\Contractor\ShowFormAction::class));
Route::get('/profile/contractor/{contractor}/delete', pascRoute(Actions\Profile\Contractor\DeleteAction::class));
Route::get('/profile/contractors', pascRoute(Actions\Profile\Contractor\ShowListAction::class));
Route::post('/profile/contractor/{contractor?}', pascRoute(Actions\Profile\Contractor\Api\SaveAction::class));

Route::get ('/profile/proposals', pascRoute(Actions\Profile\Proposal\ShowListAction::class));
Route::get ('/profile/proposal/delete/{proposal}', pascRoute(Actions\Profile\Proposal\DeleteAction::class));
Route::get ('/profile/proposal/{proposal?}', pascRoute(Actions\Profile\Proposal\ShowFormAction::class));
Route::get ('/profile/proposal/submit/{proposal}', pascRoute(Actions\Profile\Proposal\SubmitAction::class));
Route::get ('/profile/proposal/revoke/{proposal}', pascRoute(Actions\Profile\Proposal\RevokeAction::class));
Route::post('/profile/proposal/{proposal?}', pascRoute(Actions\Profile\Proposal\Api\SaveAction::class));

Route::get ('/profile/proposals/{proposal}/documents/create', pascRoute(Actions\Profile\ProposalDocument\ShowCreateFormAction::class));
Route::get ('/profile/proposals/{proposal}/documents/{document}/delete', pascRoute(Actions\Profile\ProposalDocument\DeleteAction::class));
Route::get ('/profile/proposals/{proposal}/documents/{document}', pascRoute(Actions\Profile\ProposalDocument\ShowUpdateFormAction::class));
Route::post('/profile/proposals/{proposal}/documents', pascRoute(Actions\Profile\ProposalDocument\Api\SaveAction::class));


// contractor
// proposal
//  Route::get  ('/profile/proposal', pascRoute(Actions\Proposal\ShowListAction::class));

//Route::get  ('/profile/proposal/{proposal}', pascRoute(Actions\Proposal\ShowUpdateFormAction::class));



/*
// proposal
Route::get  ('/profile/kyc', 'KycController@proposals')->name('profile_kyc');
Route::get  ('/profile/kyc/create', 'KycController@createKyc')->name('profile_kyc_create');
Route::get  ('/profile/kyc/{kyc}', 'KycController@updateKyc')->name('profile_kyc_update');
Route::POST ('/profile/kyc', 'KycController@createUpdateKyc')->name('profile_kyc_create_update');
*/
// contractor
/*
Route::post('/profile/contact', 'IndexController@profileUpdateContact')->name('profile_update_contact');

Route::get('/transparency', 'IndexController@transparency')->name('transparency');
Route::get('/contact', 'IndexControlle

Route::get('login', '\App\Http\Actions\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', '\App\Http\Actions\Auth\LoginController@login');
Route::post('logout', '\App\Http\Actions\Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', '\App\Http\Actions\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', '\App\Http\Actions\Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', '\App\Http\Actions\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', '\App\Http\Actions\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', '\App\Http\Actions\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', '\App\Http\Actions\Auth\ResetPasswordController@reset')->name('password.update');*/

$this->get('login', '\App\Http\Actions\Auth\LoginController@showLoginForm')->name('login');
$this->post('login', '\App\Http\Actions\Auth\LoginController@login');
$this->post('logout', '\App\Http\Actions\Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', '\App\Http\Actions\Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', '\App\Http\Actions\Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', '\App\Http\Actions\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', '\App\Http\Actions\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', '\App\Http\Actions\Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', '\App\Http\Actions\Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
$this->get('email/verify', '\App\Http\Actions\Auth\VerificationController@show')->name('verification.notice');
$this->get('email/verify/{id}', '\App\Http\Actions\Auth\VerificationController@verify')->name('verification.verify');
$this->get('email/resend', '\App\Http\Actions\Auth\VerificationController@resend')->name('verification.resend');
