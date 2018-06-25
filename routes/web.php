<?php

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

use Illuminate\Http\Request;

Route::get('/', 'User\HomeController@index')->name('home');


//User authentication routes
Route::get('/authentication', 'User\AuthenticationController@authentication')->name('user.login.register');
Route::post('/user/authentication', 'User\AuthenticationController@registerUser')->name('user.submit');
Route::get('/verify/{token}', 'User\VerifyController@verify')->name('verify');
Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
Route::get('/logout', 'User\LoginController@logout')->name('user.logout');

//footer pages routes
Route::get('/faqs', 'User\HomeController@faq')->name('faq');
Route::get('/about-us', 'User\HomeController@about')->name('about.us');
Route::get('/privacy-policy', 'User\HomeController@privacy')->name('privacy.policy');
Route::get('/terms-of-use', 'User\HomeController@terms')->name('use.terms');

//Search routes
Route::get('/search', 'User\SearchController@search')->name('search');

//user stories routes
Route::get('/story/{id}', 'User\StoriesController@displayStory')->name('story.display');

//Booking routes
Route::get('/bus-details/{id}', 'User\BusController@busDetails')->name('bus.details');
Route::post('/bus-booking', 'User\BusBookingController@busBooking')->name('bus.booking');
Route::get('/make-payment/{id}', 'User\BusBookingController@makePayment')->name('make.payment');
Route::post('/process-payment', 'User\BusBookingController@processPayment')->name('process.payment');
Route::get('/payment-reciepts', 'User\BusBookingController@paymentReciept')->name('payment.reciept');

//newsletter routes
Route::post('/newsletter', 'User\NewsletterController@subscribe')->name('newsletter.subscribe');

//busroutes routes
Route::get('/routes', 'User\RoutesController@allRoutes')->name('route.listing');

//User routes
Route::group(['middleware' => 'user'], function () {
    Route::get('/user/{name}', 'User\UserProfileController@userAccount')->name('user.account');
    Route::post('/password-reset', 'User\UserProfileController@updatePassword')->name('password.reset');
    Route::post('/profile-update', 'User\UserProfileController@profileUpdate')->name('profile.update');    
    Route::post('/send-complaint', 'User\ComplaintsController@submitComplaint')->name('complait.submit');
    Route::post('/review-submit', 'User\ReviewsController@submitReview')->name('review.submit');
    Route::post('/story-submit', 'User\StoriesController@submitStory')->name('create.story.submit');
});

//Agents routes
Route::group(['middleware' => 'agent'], function () {
    Route::get('/agent/{name}', 'Agent\AgentProfileController@agentAccount')->name('agent.account');
    Route::post('/password-reset', 'Agent\AgentProfileController@updatePassword')->name('password.reset');
});

//Admin routes
Route::group(['middleware' => 'admin'], function () {
    //Dashboard
    Route::get('/admin', 'Admin\DashboardController@index')->name('admin.dashboard');

    //Staff
    Route::get('/admin/staff', 'Admin\AdminsController@getAllAdmins')->name('admin.staff');
    Route::post('/admin/staff/save', 'Admin\AdminsController@save')->name('admin.staff.save');
    Route::get('/admin/staff/create', 'Admin\AdminsController@create')->name('admin.create_new_staff');
    Route::get('/admin/staff/{id}/edit', 'Admin\AdminsController@edit')->name('admin.edit_staff_details');
    Route::post('/admin/staff/update', 'Admin\AdminsController@update')->name('admin.staff.update');

    //Users
    Route::get('/admin/users', 'Admin\UsersController@getAllUsers')->name('admin.users');

    //Companies
    Route::get('/admin/companies/create', 'Admin\CompaniesController@create')->name('admin.companies.create');
    Route::post('/admin/companies/save', 'Admin\CompaniesController@save')->name('admin.companies.save');
    Route::get('/admin/companies', 'Admin\CompaniesController@getAllCompanies')->name('admin.companies');

    //Buses
    Route::get('/admin/buses/create', 'Admin\BusesController@createBus')->name('admin.create_new_bus');
    Route::post('/admin/buses/save', 'Admin\BusesController@save')->name('admin.buses.save');
    Route::get('/admin/buses', 'Admin\BusesController@getAllBuses')->name('admin.buses');
    Route::get('/admin/buses/{id}/edit', 'Admin\BusesController@edit')->name('admin.edit_bus_details');
    Route::post('/admin/buses/update', 'Admin\BusesController@update')->name('admin.bus.update');
    Route::post('/admin/buses/upload-image', 'Admin\BusesController@uploadImage')->name('admin.upload.image');
    Route::get('/admin/buses/{id}/route', 'Admin\BusesController@create_route')->name('admin.bus.route');
    Route::get('/admin/buses/{id}/delete', 'Admin\BusesController@delete')->name('admin.bus.delete');

    //Agents
    Route::get('/admin/agents/create', 'Admin\AgentsController@createAgent')->name('admin.create_new_agent');
    Route::post('/admin/agents/save', 'Admin\AgentsController@save')->name('admin.agents.save');
    Route::get('/admin/agents', 'Admin\AgentsController@getAllAgents')->name('admin.agents');
    Route::get('/admin/agents/{id}/edit', 'Admin\AgentsController@edit')->name('admin.agent.edit');
    Route::post('/admin/agents/update', 'Admin\AgentsController@update')->name('admin.agent.update');
    Route::get('/admin/agents/{id}/delete', 'Admin\AgentsController@delete')->name('admin.agent.delete');

    //Bookings
    Route::get('/admin/bookings', 'Admin\BookingsController@getAllBookings')->name('admin.bookings');

    //Routes
    Route::get('/admin/routes', 'Admin\RoutesController@getAllRoutes')->name('admin.routes');
    Route::get('/admin/routes/create', 'Admin\RoutesController@create')->name('admin.routes.create');
    Route::post('/admin/routes/save', 'Admin\RoutesController@save')->name('admin.routes.save');

    //Parks
    Route::get('/admin/parks', 'Admin\ParksController@getAllParks')->name('admin.parks');

    //Payments
    Route::get('/admin/payments', 'Admin\PaymentsController@runDepositFunds')->name('admin.payments');


});

//Admin authentication
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', 'Admin\AdminLoginController@login');
Route::get('/admin/logout', 'Admin\AdminLoginController@logout');

