<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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




Route::get('/clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});


Route::get('/', function () {
    return redirect(app()->getLocale());
});


Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale',
], function () {

    Route::get('/', 'FrontendController@index')->name('frontend');
    Route::get('about', 'FrontendController@about')->name('about');
    Route::get('contact', 'FrontendController@contact')->name('contact');
    Route::post('contact/store', 'FrontendController@contactStore')->name('contactStore');

    Route::get('online-pharmacy', 'FrontendController@onlinepharmacy')->name('online.pharmacy');
    /**Cart */
    Route::get('online-pharmacy/add/to/cart', 'FrontendController@addToCart')->name('addToCart');
    Route::get('online-pharmacy/exist/sale/cart', 'FrontendController@existSaleCart')->name('existSaleCart');
    Route::get('online-pharmacy/remove/single/item/from/sale/cart', 'FrontendController@removeSingleItemFromSaleCart')->name('removeSingleItemFromSaleCart');
    Route::get('online-pharmacy/remove/all/item/from/sale/cart', 'FrontendController@removeAllItemFromSaleCart')->name('removeAllItemFromSaleCart');
    Route::get('online-pharmacy/update/sale/cart', 'FrontendController@updateSaleCart')->name('updateSaleCart');
    /**Cart */
    /**Order Process */
    Route::post('customer/order/process', 'Customer\OrderInvoiceController@store')->name('customerOrderProcess');
    /**Order Process */
    /**product details */
    Route::get('online-pharmacy/product/details', 'FrontendController@productDetails')->name('productDetails');
    /**product details */

    Route::get('home-care', 'FrontendController@homecare')->name('home.care');

    Route::get('telemedicine', 'FrontendController@telemedicine')->name('telemedicine');
    Route::get('telemedicine/request', 'FrontendController@telemedicinerequest')->name('telemedicine.request');
    Route::post('telemedicine/request/store', 'FrontendController@telemedicinerequeststore')->name('telemedicine.request.store');


    Route::get('medicaltourism', 'FrontendController@medicaltourism')->name('medicaltourism');

    Route::get('medicaltourism/request', 'FrontendController@medicaltourismrequest')->name('medicaltourism.request');
    Route::post('medicaltourism/store', 'FrontendController@medicaltourismstore')->name('medicaltourism.store');

    Route::get('homecare/service', 'FrontendController@homecarerequest')->name('homecare.service');
    Route::post('homecare/service/store', 'FrontendController@homecareservicestore')->name('homecareservice.store');



    Route::get('doctor/search', 'FrontendController@doctorsearch')->name('doctor.search');
    Route::post('doctor/appointment/', 'FrontendController@doctorappointment')->name('doctor.appointment');


//    registation
    Route::get('doctor/registation', 'FrontendController@doctorregistation')->name('doctor.registation');
    Route::post('doctor/registation/store', 'FrontendController@doctorregistationstore')->name('doctor.registation.store');

    Route::get('medical/registation', 'FrontendController@medicalregistation')->name('medical.registation');
    Route::post('medical/registation/store', 'FrontendController@medicalregistationstore')->name('medical.registation.store');

    Route::get('hospital/registation', 'FrontendController@hospitalregistation')->name('hospital.registation');
    Route::post('hospital/registation/store', 'FrontendController@hospitalregistationstore')->name('hospital.registation.store');

    Route::get('farmacy/registation', 'FrontendController@farmacyregistation')->name('farmacy.registation');
    Route::post('farmacy/registation/store', 'FrontendController@farmacyregistationstore')->name('farmacy.registation.store');


    Route::get('gym/registation','FrontendController@gym')->name('gym.registation');
    Route::post('gym/store','FrontendController@gymstore')->name('gym.registation.store'); 
 
    Route::get('beauty-center/registation','FrontendController@beauty_center')->name('beauty.center.registation');
    Route::post('beauty-center/store','FrontendController@beautycenterstore')->name('beauty-center.store');




    //route group and route resource use koren....

    Route::get('customer/login', 'FrontendController@customerlogin')->name('customer.login');
    Route::post('customer/login', 'FrontendController@customerLogindeshboard')->name('customer.login');

    Route::get('customer/registation', 'FrontendController@customerregistration')->name('customer.registation');
    Route::post('customer/registation/store', 'FrontendController@customerregistrationstore')->name('customer.registation.store');


    Route::get('logout', 'Customer\CustomerController@logout')->name('customer.logout');

//     for patient dashboard  -------------------------------------------------------------------------------------------------------


    Route::group(['prefix' => 'customer', 'namespace' => 'Customer', 'middleware' => ['auth', 'customer']], function () {
        Route::get('dashboard', 'CustomerController@dashboard')->name('customer.dashboard');

        Route::get('logout', 'CustomerController@logout')->name('customer.logout');
        Route::get('profile', 'ProfileController@index')->name('customer.profile');
        Route::get('profile/edit', 'ProfileController@edit')->name('customer.profile.edit');
        Route::post('profile/update', 'ProfileController@update')->name('customer.profile.update');


        Route::get('setting', 'ProfileController@setting')->name('customer.setting');

        Route::get('telemedicine', 'CustomerController@telemedicinerequest')->name('customer.telemedicine');
        Route::get('medicial/tourism/request', 'CustomerController@medicinetourism')->name('customer.medicial.tourism');
        Route::get('homecare/request', 'CustomerController@homecareservice')->name('homecare.service.request');

        Route::get('appointment', "CustomerController@appointmentlist")->name('customer.doctor.appointment');
    });


});












Auth::routes();




Route::get('logout', 'HomeController@logout')->name('profile.logout');
Route::get('/home', 'HomeController@index')->name('home');






//for admin dashboard




Route::group(['prefix' => 'service/request', 'middleware' => ['auth', 'admin']], function () {
    Route::get('appointment', 'ServiceController@appointment')->name('service.appointment');
    Route::get('homecare', 'ServiceController@homecarerequest')->name('service.homecare');
    Route::get('telemedicine', 'ServiceController@telemedicine')->name('service.telemedicine');
    Route::get('medicialtourism', 'ServiceController@medicialtourism')->name('service.medicialtourism');
});



Route::group(['prefix' => 'application', 'namespace'=>'Backend\Application', 'middleware' => ['auth', 'admin']], function () {
    Route::get('doctors', 'ApplicationController@doctor')->name('application.doctor');
    Route::get('doctor/show/{id}', 'ApplicationController@doctorshow')->name('application.doctor.show');
    Route::get('hospitals', 'ApplicationController@hospital')->name('application.hospital');
    Route::get('hospitals/show/{id}', 'ApplicationController@hospitalshow')->name('application.hospital.show');
    Route::get('medical-centers', 'ApplicationController@medicalcenter')->name('application.medical-center');
    Route::get('medical-centers/show/{id}', 'ApplicationController@medicalcentershow')->name('application.medical-center.show');
    Route::get('pharmacy', 'ApplicationController@pharmacy')->name('application.pharmacy');
    Route::get('pharmacy/show/{id}', 'ApplicationController@pharmacyshow')->name('application.pharmacy.show');
    Route::get('gym', 'ApplicationController@gym')->name('application.gym');
    Route::get('gym/show/{id}', 'ApplicationController@gymshow')->name('application.gym.show');
    Route::get('beauty-center', 'ApplicationController@beautycenter')->name('application.beauty.center');
    Route::get('beauty-center/show/{id}', 'ApplicationController@beautycentershow')->name('application.beauty.center.show');

    Route::post('pharmacy/change/update/{id}', 'ApplicationController@pharmacychangeupdate')->name('pharmacy.change.update');
    Route::post('medical/change/update/{id}', 'ApplicationController@medicalchangeupdate')->name('medical.change.update');
    Route::post('hospital/change/update/{id}', 'ApplicationController@hospitalchangeupdate')->name('hospital.change.update');
    Route::post('doctor/change/update/{id}', 'ApplicationController@doctorchangeupdate')->name('doctor.change.update');
    Route::post('gym/change/update/{id}', 'ApplicationController@gymchangeupdate')->name('gym.change.update');
    Route::post('beauty-center/change/update/{id}', 'ApplicationController@beautycenterchangeupdate')->name('beauty.center.change.update');
});






Route::group(['prefix' => 'admin/user', 'namespace' => 'Backend\User', 'middleware' => ['auth']], function () {
    Route::get('index', 'UserController@index')->name('user.index');
    Route::get('create', 'UserController@create')->name('user.create');
    Route::post('store', 'UserController@store')->name('user.store');
    Route::get('show/{id}', 'UserController@show')->name('user.show');
    Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('update/{id}', 'UserController@update')->name('user.update');
    Route::get('destroy/{id}', 'UserController@destroy')->name('user.destroy');


    Route::get('profile', 'ProfileController@index')->name('user.profile');
    Route::get('profile/edit', 'ProfileController@edit')->name('user.profile.edit');
    Route::post('profile/update', 'ProfileController@update')->name('user.profile.update');
    Route::get('setting', 'ProfileController@setting')->name('user.setting');
    Route::post('setting/update', 'ProfileController@changepassword')->name('user.setting.update');
});

// Bokul
Route::group(['prefix' => 'specialty', 'namespace' => 'Backend\Doctor', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'SpecialtyController@index')->name('specialty.index');
    Route::get('create', 'SpecialtyController@create')->name('specialty.create');
    Route::post('store', 'SpecialtyController@store')->name('specialty.store');
    Route::get('destroy/{id}', 'SpecialtyController@destroy')->name('specialty.destroy');
    Route::get('edit/{id}', 'SpecialtyController@edit')->name('specialty.edit');
    Route::post('update/{id}', 'SpecialtyController@update')->name('specialty.update');
});


Route::group(['prefix' => 'type', 'namespace' => 'Backend\TeleMedicine', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'TypeController@index')->name('type.index');
    Route::get('create', 'TypeController@create')->name('type.create');
    Route::post('store', 'TypeController@store')->name('type.store');
    Route::get('destroy/{id}', 'TypeController@destroy')->name('type.destroy');
    Route::get('edit/{id}', 'TypeController@edit')->name('type.edit');
    Route::post('update/{id}', 'TypeController@update')->name('type.update');
});

Route::group(['customer' => 'type', 'namespace' => 'Backend\Order', 'middleware' => ['auth', 'admin']], function () {
    Route::get('order/list', 'OrderInvoiceController@index')->name('order.index');
});


Route::group(['prefix' => 'country', 'namespace' => 'Backend\Country', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'CountryController@index')->name('country.index');
    Route::get('create', 'CountryController@create')->name('country.create');
    Route::post('store', 'CountryController@store')->name('country.store');
    Route::get('destroy/{id}', 'CountryController@destroy')->name('country.destroy');
});

Route::group(['prefix' => 'capital', 'namespace' => 'Backend\Country', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'CapitalController@index')->name('capital.index');
    Route::get('create', 'CapitalController@create')->name('capital.create');
    Route::post('store', 'CapitalController@store')->name('capital.store');
    Route::get('destroy/{id}', 'CapitalController@destroy')->name('capital.destroy');
});

Route::group(['prefix' => 'city', 'namespace' => 'Backend\Country', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'CityController@index')->name('city.index');
    Route::get('create', 'CityController@create')->name('city.create');
    Route::post('store', 'CityController@store')->name('city.store');
    Route::get('destroy/{id}', 'CityController@destroy')->name('city.destroy');
});

Route::group(['prefix' => 'doctor', 'namespace' => 'Backend\Doctor', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'DoctorController@index')->name('doctor.index');
    Route::get('create', 'DoctorController@create')->name('doctor.create');
    Route::post('store', 'DoctorController@store')->name('doctor.store');
    Route::get('destroy/{id}', 'DoctorController@destroy')->name('doctor.destroy');
    Route::get('edit/{id}', 'DoctorController@edit')->name('doctor.edit');
    Route::post('update/{id}', 'DoctorController@update')->name('doctor.update');
});

Route::group(['prefix' => 'org_type', 'namespace' => 'Backend\Organization', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'OrganizationTypeController@index')->name('org_type.index');
    Route::get('create', 'OrganizationTypeController@create')->name('org_type.create');
    Route::post('store', 'OrganizationTypeController@store')->name('org_type.store');
    Route::get('destroy/{id}', 'OrganizationTypeController@destroy')->name('org_type.destroy');
    Route::get('edit/{id}', 'OrganizationTypeController@edit')->name('org_type.edit');
    Route::post('update/{id}', 'OrganizationTypeController@update')->name('org_type.update');
});

Route::group(['prefix' => 'org', 'namespace' => 'Backend\Organization', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'OrganizationController@index')->name('org.index');
    Route::get('create', 'OrganizationController@create')->name('org.create');
    Route::post('store', 'OrganizationController@store')->name('org.store');
    Route::get('destroy/{id}', 'OrganizationController@destroy')->name('org.destroy');
    Route::get('edit/{id}', 'OrganizationController@edit')->name('org.edit');
    Route::post('update/{id}', 'OrganizationController@update')->name('org.update');
});

Route::group(['prefix' => 'doctor/schedule', 'namespace' => 'Backend\Doctor', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'DoctorScheduleController@index')->name('doctor_schedule.index');
    Route::get('create', 'DoctorScheduleController@create')->name('doctor_schedule.create');
    Route::post('store', 'DoctorScheduleController@store')->name('doctor_schedule.store');
    Route::get('destroy/{id}', 'DoctorScheduleController@destroy')->name('doctor_schedule.destroy');
    Route::get('edit/{id}', 'DoctorScheduleController@edit')->name('doctor_schedule.edit');
    Route::post('update/{id}', 'DoctorScheduleController@update')->name('doctor_schedule.update');
});


Route::group(['prefix' => 'medical_tourism_catagory', 'namespace' => 'Backend\MedicalToursim', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'CategoryController@index')->name('medical_tourism_catagory.index');
    Route::get('create', 'CategoryController@create')->name('medical_tourism_catagory.create');
    Route::post('store', 'CategoryController@store')->name('medical_tourism_catagory.store');
    Route::get('destroy/{id}', 'CategoryController@destroy')->name('medical_tourism_catagory.destroy');
    Route::get('edit/{id}', 'CategoryController@edit')->name('medical_tourism_catagory.edit');
    Route::post('update/{id}', 'CategoryController@update')->name('medical_tourism_catagory.update');
});


Route::group(['prefix' => 'medical_tourism_service', 'namespace' => 'Backend\MedicalToursim', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'ServiceController@index')->name('medical_tourism_service.index');
    Route::get('create', 'ServiceController@create')->name('medical_tourism_service.create');
    Route::post('store', 'ServiceController@store')->name('medical_tourism_service.store');
    Route::get('destroy/{id}', 'ServiceController@destroy')->name('medical_tourism_service.destroy');
    Route::get('edit/{id}', 'ServiceController@edit')->name('medical_tourism_service.edit');
    Route::post('update/{id}', 'ServiceController@update')->name('medical_tourism_service.update');
});

Route::group(['prefix' => 'home_cat', 'namespace' => 'Backend\HomeCare', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'CategoryController@index')->name('home_cat.index');
    Route::get('create', 'CategoryController@create')->name('home_cat.create');
    Route::post('store', 'CategoryController@store')->name('home_cat.store');
    Route::get('destroy/{id}', 'CategoryController@destroy')->name('home_cat.destroy');
    Route::get('edit/{id}', 'CategoryController@edit')->name('home_cat.edit');
    Route::post('update/{id}', 'CategoryController@update')->name('home_cat.update');
});

Route::group(['prefix' => 'home_care_service', 'namespace' => 'Backend\HomeCare', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'ServiceController@index')->name('home_care_service.index');
    Route::get('create', 'ServiceController@create')->name('home_care_service.create');
    Route::post('store', 'ServiceController@store')->name('home_care_service.store');
    Route::get('destroy/{id}', 'ServiceController@destroy')->name('home_care_service.destroy');
    Route::get('edit/{id}', 'ServiceController@edit')->name('home_care_service.edit');
    Route::post('update/{id}', 'ServiceController@update')->name('home_care_service.update');
});

Route::group(['prefix' => 'org_branch', 'namespace' => 'Backend\Organization', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'OrganizationBranchController@index')->name('org_branch.index');
    Route::get('create', 'OrganizationBranchController@create')->name('org_branch.create');
    Route::post('store', 'OrganizationBranchController@store')->name('org_branch.store');
    Route::get('destroy/{id}', 'OrganizationBranchController@destroy')->name('org_branch.destroy');
    Route::get('edit/{id}', 'OrganizationBranchController@edit')->name('org_branch.edit');
    Route::post('update/{id}', 'OrganizationBranchController@update')->name('org_branch.update');
});


Route::group(['prefix' => 'organization/doctor/schedule', 'namespace' => 'Backend\Organization', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'DoctorOrganizationBranchController@index')->name('organization.doctor.schedule.index');
    Route::get('create', 'DoctorOrganizationBranchController@create')->name('organization.doctor.schedule.create');
    Route::post('store', 'DoctorOrganizationBranchController@store')->name('organization.doctor.schedule.store');
    Route::get('edit/{id}', 'DoctorOrganizationBranchController@edit')->name('organization.doctor.schedule.edit');
    Route::post('update/{id}', 'DoctorOrganizationBranchController@update')->name('organization.doctor.schedule.update');
    Route::get('destroy/{id}', 'DoctorOrganizationBranchController@destroy')->name('organization.doctor.schedule.destroy');
});





Route::group(['prefix' => 'admin/category', 'namespace' => 'Backend\Products', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'CategoryController@index')->name('category.index');
    Route::get('create', 'CategoryController@create')->name('category.create');
    Route::post('store', 'CategoryController@store')->name('category.store');
    Route::get('show/{id}', 'CategoryController@show')->name('category.show');
    Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
});


Route::group(['prefix' => 'admin/sub/category', 'namespace' => 'Backend\Products', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'CategorysubController@index')->name('categorysub.index');
    Route::get('create', 'CategorysubController@create')->name('categorysub.create');
    Route::post('store', 'CategorysubController@store')->name('categorysub.store');
    Route::get('show/{id}', 'CategorysubController@show')->name('categorysub.show');
    Route::get('edit/{id}', 'CategorysubController@edit')->name('categorysub.edit');
    Route::post('update/{id}', 'CategorysubController@update')->name('categorysub.update');
    Route::get('destroy/{id}', 'CategorysubController@destroy')->name('categorysub.destroy');
});



Route::group(['prefix' => 'admin/product/brand', 'namespace' => 'Backend\Products', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'BrandController@index')->name('brand.index');
    Route::get('create', 'BrandController@create')->name('brand.create');
    Route::post('store', 'BrandController@store')->name('brand.store');
    Route::get('show/{id}', 'BrandController@show')->name('brand.show');
    Route::get('edit/{id}', 'BrandController@edit')->name('brand.edit');
    Route::post('update/{id}', 'BrandController@update')->name('brand.update');
    Route::get('destroy/{id}', 'BrandController@destroy')->name('brand.destroy');
});


Route::group(['prefix' => 'admin/product/unit', 'namespace' => 'Backend\Products', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'UnitController@index')->name('unit.index');
    Route::get('create', 'UnitController@create')->name('unit.create');
    Route::post('store', 'UnitController@store')->name('unit.store');
    Route::get('show/{id}', 'UnitController@show')->name('unit.show');
    Route::get('edit/{id}', 'UnitController@edit')->name('unit.edit');
    Route::post('update/{id}', 'UnitController@update')->name('unit.update');
    Route::get('destroy/{id}', 'UnitController@destroy')->name('unit.destroy');
});



Route::group(['prefix' => 'admin/product/product', 'namespace' => 'Backend\Products', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'ProductController@index')->name('product.index');
    Route::get('create', 'ProductController@create')->name('product.create');
    Route::post('store', 'ProductController@store')->name('product.store');
    Route::get('show/{id}', 'ProductController@show')->name('product.show');
    Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('update/{id}', 'ProductController@update')->name('product.update');
    Route::get('destroy/{id}', 'ProductController@destroy')->name('product.destroy');
});



Route::group(['prefix' => 'website', 'namespace' => 'Backend\Setting', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'WebsiteSettingController@index')->name('website.setting.index');
    Route::get('create', 'WebsiteSettingController@create')->name('website.setting.create');
    Route::post('store', 'WebsiteSettingController@store')->name('website.setting.store');
    Route::get('show/{id}', 'WebsiteSettingController@show')->name('website.setting.show');
    Route::get('edit/', 'WebsiteSettingController@edit')->name('website.setting.edit');
    Route::post('update', 'WebsiteSettingController@update')->name('website.setting.update');
    Route::get('destroy/{id}', 'WebsiteSettingController@destroy')->name('website.setting.destroy');
});



Route::group(['prefix' => 'social-media', 'namespace' => 'Backend\Setting', 'middleware' => ['auth', 'admin']], function () {
    Route::get('index', 'SocialMediaController@index')->name('social.index');
    Route::get('create', 'SocialMediaController@create')->name('social.create');
    Route::post('store', 'SocialMediaController@store')->name('social.store');
    Route::get('show/{id}', 'SocialMediaController@show')->name('social.show');
    Route::get('edit/{id}', 'SocialMediaController@edit')->name('social.edit');
    Route::post('update/{id}', 'SocialMediaController@update')->name('social.update');
    Route::get('destroy/{id}', 'SocialMediaController@destroy')->name('social.destroy');
});


Route::group(['prefix' => 'contract', 'namespace' => 'Backend\Contract', 'middleware' => ['auth', 'admin']], function () {
    Route::get('list', 'ContractController@index')->name('contract.index');
});






//for doctors dashboard  -----------------------------------------------------------------------------------------------------



Route::group(['namespace' => 'Doctors','middleware' => ['auth', 'doctor']],function(){


        Route::get('doctor-dashboard','DashboardController@index')->name('doctor-dashboard');









});




//for hospital dashboard  -----------------------------------------------------------------------------------------------------




Route::group(['namespace' => 'Hospital','middleware' => ['auth', 'hospital']],function(){


        Route::get('hospital-dashboard','DashboardController@index')->name('hospital-dashboard');










});









//for medical center dashboard  -----------------------------------------------------------------------------------------------------


Route::group(['namespace' => 'MedicalCenter','middleware' => ['auth', 'medicalcenter']],function(){

    Route::get('medicalcenter-dashboard','DeshboardController@index')->name('medicalcenter-dashboard');





});

//for pharmacy  dashboard  -----------------------------------------------------------------------------------------------------


Route::group(['namespace' => 'Pharmacy','middleware' => ['auth', 'pharmacy']],function(){


    Route::get('pharmacy-dashboard','DashboardController@index')->name('pharmacy-dashboard');


});


Route::group(['namespace' => 'Gym','middleware' => ['auth', 'gym']],function(){

    Route::get('gym-dashboard','DashboardController@index')->name('gym-dashboard');

});

Route::group(['namespace' => 'Beautycare','middleware' => ['auth', 'beauty_center']],function(){

    Route::get('beautycare-dashboard','DashboardController@index')->name('beautycare-dashboard');

});




