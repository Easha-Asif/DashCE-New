<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Permission\PermissionController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Content\ContentController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Log\LogController;
use App\Http\Controllers\Admin\Brokerage\BrokerageController;
use App\Http\Controllers\Admin\License\LicenseController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\PromoCode\PromoCodeController;
use App\Http\Controllers\Admin\Partner\PartnerController;
use App\Http\Controllers\Admin\CourseCategory\CourseCategoryController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Admin\Module\ModuleController;
use App\Http\Controllers\Admin\MiniModule\MiniModuleController;
use App\Http\Controllers\Admin\Interaction\InteractionController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Celebration\CelebrationController;
use App\Http\Controllers\Admin\Exam\ExamController;

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
Route::middleware('prevent-back-history')->group(function () {
    
    Route::get('/login', function () {
        return redirect('/login');
    })->name('home');

    Auth::routes([
    //   'register' => true, // Registration Routes...
      'reset' => true, // Password Reset Routes...
      'verify' => true, // Email Verification Routes...
    ]);

    Route::get('/home', function () {
        return redirect('/admin/dashboard');
    });


    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', function () {
            return redirect()->route('login');
        });

        // Custom Auth
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
        Route::get('/verify-otp', [RegisterController::class, 'showOtpVerificationForm'])->name('verify-otp');
        Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('verify-otp.store');

        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

        Route::group(['middleware' => 'auth'], function () {

            // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboards.index')->middleware('permission:dashboard-list');
                                            
            // Users
            Route::controller(UserController::class)->prefix('users')->group(function () {

                Route::get('/', 'index')->name('users.index')->middleware('permission:user-list');
                Route::get('/create', 'create')->name('users.create')->middleware('permission:user-create');
                Route::post('', 'store')->name('users.store')->middleware('permission:user-create');
                Route::patch('/{user}', 'update')->name('users.update')->middleware('permission:user-edit');
                Route::get('/{user}/edit', 'edit')->name('users.edit')->middleware('permission:user-edit');
                Route::get('/{user}/view', 'view')->name('users.view')->middleware('permission:user-edit');
                Route::get('/{user}/userProfile', 'userProfile')->name('users.userProfile')->middleware('permission:user-edit');
                Route::patch('{user}/update', 'userUpdateProfile')->name('users.updateProfile')->middleware('permission:user-edit');
                Route::delete('/{user}', 'destroy')->name('users.destroy')->middleware('permission:user-delete');
                Route::get('password/change', 'changePassword')->name('users.changePassword')->middleware('permission:user-edit');
                Route::post('password/change', 'updatePassword')->name('users.updatePassword')->middleware('permission:user-edit');
                // Status
                Route::get('{user}/status', 'status')->name('users.status')->middleware('permission:user-edit');
            });

            // Brokerages
            Route::controller(BrokerageController::class)->prefix('brokerages')->group(function () {

                Route::get('/', 'index')->name('brokerages.index')->middleware('permission:brokerage-list');
                Route::get('/create', 'create')->name('brokerages.create')->middleware('permission:brokerage-create');
                Route::post('', 'store')->name('brokerages.store')->middleware('permission:brokerage-create');
                Route::patch('/{brokerage}', 'update')->name('brokerages.update')->middleware('permission:brokerage-edit');
                Route::get('/{brokerage}/edit', 'edit')->name('brokerages.edit')->middleware('permission:brokerage-edit');
                Route::get('/{brokerage}/view', 'view')->name('brokerages.view')->middleware('permission:brokerage-edit');
                Route::get('/{brokerage}/brokerageProfile', 'brokerageProfile')->name('brokerages.brokerageProfile')->middleware('permission:brokerage-edit');
                Route::patch('{brokerage}/update', 'brokerageUpdateProfile')->name('brokerages.updateProfile')->middleware('permission:brokerage-edit');
                Route::delete('/{brokerage}', 'destroy')->name('brokerages.destroy')->middleware('permission:brokerage-delete');
                Route::get('password/change', 'changePassword')->name('brokerages.changePassword')->middleware('permission:brokerage-edit');
                Route::post('password/change', 'updatePassword')->name('brokerages.updatePassword')->middleware('permission:brokerage-edit');
            });

            // Students
            Route::controller(StudentController::class)->prefix('students')->group(function () {

                Route::get('/', 'index')->name('students.index')->middleware('permission:student-list');
                Route::get('/create', 'create')->name('students.create')->middleware('permission:student-create');
                Route::post('', 'store')->name('students.store')->middleware('permission:student-create');
                Route::patch('/{student}', 'update')->name('students.update')->middleware('permission:student-edit');
                Route::get('/{student}/edit', 'edit')->name('students.edit')->middleware('permission:student-edit');
                Route::get('/{student}/view', 'view')->name('students.view')->middleware('permission:student-edit');
                Route::get('/{student}/studentProfile', 'studentProfile')->name('students.studentProfile')->middleware('permission:student-edit');
                Route::patch('{student}/update', 'studentUpdateProfile')->name('students.updateProfile')->middleware('permission:student-edit');
                Route::delete('/{student}', 'destroy')->name('students.destroy')->middleware('permission:student-delete');
                Route::get('password/change', 'changePassword')->name('students.changePassword')->middleware('permission:student-edit');
                Route::post('password/change', 'updatePassword')->name('students.updatePassword')->middleware('permission:student-edit');
                // Status
                Route::get('{student}/status', 'status')->name('students.status')->middleware('permission:student-edit');
            });

            // Partners
            Route::controller(PartnerController::class)->prefix('partners')->group(function () {

                Route::get('/', 'index')->name('partners.index')->middleware('permission:partner-list');
                Route::get('/create', 'create')->name('partners.create')->middleware('permission:partner-create');
                Route::post('', 'store')->name('partners.store')->middleware('permission:partner-create');
                Route::patch('/{partner}', 'update')->name('partners.update')->middleware('permission:partner-edit');
                Route::get('/{partner}/edit', 'edit')->name('partners.edit')->middleware('permission:partner-edit');
                Route::get('/{partner}/view', 'view')->name('partners.view')->middleware('permission:partner-edit');
                Route::get('/{partner}/partnerProfile', 'partnerProfile')->name('partners.partnerProfile')->middleware('permission:partner-edit');
                Route::patch('{partner}/update', 'partnerUpdateProfile')->name('partners.updateProfile')->middleware('permission:partner-edit');
                Route::delete('/{partner}', 'destroy')->name('partners.destroy')->middleware('permission:partner-delete');
                Route::get('password/change', 'changePassword')->name('partners.changePassword')->middleware('permission:partner-edit');
                Route::post('password/change', 'updatePassword')->name('partners.updatePassword')->middleware('permission:partner-edit');
                // Status
                Route::get('{partner}/status', 'status')->name('partners.status')->middleware('permission:partner-edit');
            });

            // Roles
            Route::controller(RoleController::class)->prefix('roles')->group(function () {

                Route::get('/', 'index')->name('roles.index')->middleware('permission:role-list');
                Route::get('/create', 'create')->name('roles.create')->middleware('permission:role-create');
                Route::post('', 'store')->name('roles.store')->middleware('permission:role-create');
                Route::patch('/{role}', 'update')->name('roles.update')->middleware('permission:role-edit');
                Route::get('/{role}/edit', 'edit')->name('roles.edit')->middleware('permission:role-edit');
                Route::delete('/{role}', 'destroy')->name('roles.destroy')->middleware('permission:role-delete');
            });

            // Permissions
            Route::controller(PermissionController::class)->prefix('permissions')->group(function () {

                Route::get('/', 'index')->name('permissions.index')->middleware('permission:permission-list');
                Route::get('/create', 'create')->name('permissions.create')->middleware('permission:permission-create');
                Route::post('', 'store')->name('permissions.store')->middleware('permission:permission-create');
                Route::patch('/{permission}', 'update')->name('permissions.update')->middleware('permission:permission-edit');
                Route::get('/{permission}/edit', 'edit')->name('permissions.edit')->middleware('permission:permission-edit');
                Route::delete('/{permission}', 'destroy')->name('permissions.destroy')->middleware('permission:permission-delete');
            });

            // Contents
            Route::controller(ContentController::class)->prefix('contents')->group(function () {

                Route::get('/', 'index')->name('contents.index')->middleware('permission:content-list');
                Route::get('/create', 'create')->name('contents.create')->middleware('permission:content-create');
                Route::post('', 'store')->name('contents.store')->middleware('permission:content-create');
                Route::patch('/{content}', 'update')->name('contents.update')->middleware('permission:content-edit');
                Route::get('/{content}/edit', 'edit')->name('contents.edit')->middleware('permission:content-edit');
                Route::delete('/{content}', 'destroy')->name('contents.destroy')->middleware('permission:content-delete');
            });

            // Licenses
            Route::controller(LicenseController::class)->prefix('licenses')->group(function () {

                Route::get('/', 'index')->name('licenses.index')->middleware('permission:license-list');
                Route::get('/create', 'create')->name('licenses.create')->middleware('permission:license-create');
                Route::post('', 'store')->name('licenses.store')->middleware('permission:license-create');
                Route::patch('/{license}', 'update')->name('licenses.update')->middleware('permission:license-edit');
                Route::get('/{license}/edit', 'edit')->name('licenses.edit')->middleware('permission:license-edit');
                Route::delete('/{license}', 'destroy')->name('licenses.destroy')->middleware('permission:license-delete');
                Route::get('{license}/status', 'status')->name('licenses.status')->middleware('permission:license-edit');
            });

            // CourseCategories
            Route::controller(CourseCategoryController::class)->prefix('course-categories')->group(function () {

                Route::get('/', 'index')->name('coursecategories.index')->middleware('permission:course-category-list');
                Route::get('/create', 'create')->name('coursecategories.create')->middleware('permission:course-category-create');
                Route::post('', 'store')->name('coursecategories.store')->middleware('permission:course-category-create');
                Route::patch('/{coursecategories}', 'update')->name('coursecategories.update')->middleware('permission:course-category-edit');
                Route::get('/{coursecategories}/edit', 'edit')->name('coursecategories.edit')->middleware('permission:course-category-edit');
                Route::delete('/{coursecategories}', 'destroy')->name('coursecategories.destroy')->middleware('permission:course-category-delete');
                Route::get('{coursecategories}/status', 'status')->name('coursecategories.status')->middleware('permission:course-category-edit');
                Route::get('{coursecategories}/status', 'status')->name('coursecategories.status')->middleware('permission:course-category-edit');
            });

            // Courses
            Route::controller(CourseController::class)->prefix('courses')->group(function () {

                Route::get('/', 'index')->name('courses.index')->middleware('permission:course-list');
                Route::get('/create', 'create')->name('courses.create')->middleware('permission:course-create');
                Route::post('', 'store')->name('courses.store')->middleware('permission:course-create');
                Route::patch('/{course}', 'update')->name('courses.update')->middleware('permission:course-edit');
                Route::get('/{course}/edit', 'edit')->name('courses.edit')->middleware('permission:course-edit');
                Route::get('/{course}/view', 'view')->name('courses.view')->middleware('permission:course-edit');
                Route::delete('/{course}', 'destroy')->name('courses.destroy')->middleware('permission:course-delete');
                Route::get('{course}/status', 'status')->name('courses.status')->middleware('permission:course-edit');
                //
                Route::get('/{course}/create-course-module', 'createCourseModule')->name('courses.createCourseModule')->middleware('permission:module-create');
                Route::get('/{course}/create-course-mini-module', 'createCourseMiniModule')->name('courses.createCourseMiniModule')->middleware('permission:mini-module-create');
                Route::get('/{course}/create-course-interaction', 'createCourseInteraction')->name('courses.createCourseInteraction')->middleware('permission:interaction-create');
                Route::get('/{course}/create-course-celebration', 'createCourseCelebration')->name('courses.createCourseCelebration')->middleware('permission:celebration-create');
                Route::get('/{course}/create-course-exam', 'createCourseExam')->name('courses.createCourseExam')->middleware('permission:exam-create');
            });

            // Promo Code
            Route::controller(PromoCodeController::class)->prefix('promo-codes')->group(function () {

                Route::get('/', 'index')->name('promocodes.index')->middleware('permission:promo-code-list');
                Route::get('/create', 'create')->name('promocodes.create')->middleware('permission:promo-code-create');
                Route::post('', 'store')->name('promocodes.store')->middleware('permission:promo-code-create');
                Route::patch('/{promocode}', 'update')->name('promocodes.update')->middleware('permission:promo-code-edit');
                Route::get('/{promocode}/edit', 'edit')->name('promocodes.edit')->middleware('permission:promo-code-edit');
                Route::delete('/{promocode}', 'destroy')->name('promocodes.destroy')->middleware('permission:promo-code-delete');
                Route::get('{promocode}/status', 'status')->name('promocodes.status')->middleware('permission:promo-code-edit');
                // Status
                Route::get('{promocode}/status', 'status')->name('promocodes.status')->middleware('permission:promo-code-edit');
            });

            // Module
            Route::controller(ModuleController::class)->prefix('modules')->group(function () {

                Route::get('/', 'index')->name('modules.index')->middleware('permission:module-list');
                Route::get('/create', 'create')->name('modules.create')->middleware('permission:module-create');
                Route::post('', 'store')->name('modules.store')->middleware('permission:module-create');
                Route::patch('/{module}', 'update')->name('modules.update')->middleware('permission:module-edit');
                Route::get('/{module}/edit', 'edit')->name('modules.edit')->middleware('permission:module-edit');
                Route::delete('/{module}', 'destroy')->name('modules.destroy')->middleware('permission:module-delete');
                Route::get('{module}/status', 'status')->name('modules.status')->middleware('permission:module-edit');
                // Status
                Route::get('{module}/status', 'status')->name('modules.status')->middleware('permission:module-edit');
            });

            // miniModule
            Route::controller(MiniModuleController::class)->prefix('mini-modules')->group(function () {

                Route::get('/', 'index')->name('minimodules.index')->middleware('permission:mini-module-list');
                Route::get('/create', 'create')->name('minimodules.create')->middleware('permission:mini-module-create');
                Route::post('', 'store')->name('minimodules.store')->middleware('permission:mini-module-create');
                Route::patch('/{minimodule}', 'update')->name('minimodules.update')->middleware('permission:mini-module-edit');
                Route::get('/{minimodule}/edit', 'edit')->name('minimodules.edit')->middleware('permission:mini-module-edit');
                Route::delete('/{minimodule}', 'destroy')->name('minimodules.destroy')->middleware('permission:mini-module-delete');
                Route::get('{minimodule}/status', 'status')->name('minimodules.status')->middleware('permission:mini-module-edit');
                // Status
                Route::get('{minimodule}/status', 'status')->name('minimodules.status')->middleware('permission:mini-module-edit');
            });

            // Interaction
            Route::controller(InteractionController::class)->prefix('interactions')->group(function () {

                Route::get('/', 'index')->name('interactions.index')->middleware('permission:interaction-list');
                Route::get('/create', 'create')->name('interactions.create')->middleware('permission:interaction-create');
                Route::post('', 'store')->name('interactions.store')->middleware('permission:interaction-create');
                Route::patch('/{interaction}', 'update')->name('interactions.update')->middleware('permission:interaction-edit');
                Route::get('/{interaction}/edit', 'edit')->name('interactions.edit')->middleware('permission:interaction-edit');
                Route::delete('/{interaction}', 'destroy')->name('interactions.destroy')->middleware('permission:interaction-delete');
                Route::get('{interaction}/status', 'status')->name('interactions.status')->middleware('permission:interaction-edit');
                // Status
                Route::get('{interaction}/status', 'status')->name('interactions.status')->middleware('permission:interaction-edit');
            });

            // Celebration
            Route::controller(CelebrationController::class)->prefix('celebrations')->group(function () {

                Route::get('/', 'index')->name('celebrations.index')->middleware('permission:celebration-list');
                Route::get('/create', 'create')->name('celebrations.create')->middleware('permission:celebration-create');
                Route::post('', 'store')->name('celebrations.store')->middleware('permission:celebration-create');
                Route::patch('/{celebration}', 'update')->name('celebrations.update')->middleware('permission:celebration-edit');
                Route::get('/{celebration}/edit', 'edit')->name('celebrations.edit')->middleware('permission:celebration-edit');
                Route::delete('/{celebration}', 'destroy')->name('celebrations.destroy')->middleware('permission:celebration-delete');
                Route::get('{celebration}/status', 'status')->name('celebrations.status')->middleware('permission:celebration-edit');
                // Status
                Route::get('{celebration}/status', 'status')->name('celebrations.status')->middleware('permission:celebration-edit');
            });

            // Exam
            Route::controller(ExamController::class)->prefix('exams')->group(function () {

                Route::get('/', 'index')->name('exams.index')->middleware('permission:exam-list');
                Route::get('/create', 'create')->name('exams.create')->middleware('permission:exam-create');
                Route::post('', 'store')->name('exams.store')->middleware('permission:exam-create');
                Route::patch('/{exam}', 'update')->name('exams.update')->middleware('permission:exam-edit');
                Route::get('/{exam}/edit', 'edit')->name('exams.edit')->middleware('permission:exam-edit');
                Route::delete('/{exam}', 'destroy')->name('exams.destroy')->middleware('permission:exam-delete');
                Route::get('{exam}/status', 'status')->name('exams.status')->middleware('permission:exam-edit');
                // Status
                Route::get('{exam}/status', 'status')->name('exams.status')->middleware('permission:exam-edit');
            });

            // Company
            Route::controller(CompanyController::class)->prefix('companies')->group(function () {

                Route::get('/', 'index')->name('companies.index')->middleware('permission:company-list');
                Route::get('/create', 'create')->name('companies.create')->middleware('permission:company-create');
                Route::post('', 'store')->name('companies.store')->middleware('permission:company-create');
                Route::patch('/{company}', 'update')->name('companies.update')->middleware('permission:company-edit');
                Route::get('/{company}/edit', 'edit')->name('companies.edit')->middleware('permission:company-edit');
                Route::delete('/{company}', 'destroy')->name('companies.destroy')->middleware('permission:company-delete');
                Route::get('{company}/status', 'status')->name('companies.status')->middleware('permission:company-edit');
                // Status
                Route::get('{company}/status', 'status')->name('companies.status')->middleware('permission:company-edit');
            });

            // Logs
            Route::controller(LogController::class)->prefix('logs')->group(function () {

                Route::get('/', 'index')->name('logs.index')->middleware('permission:log-list');
                Route::post('/search', 'IndexController@logsSearch')->name('logs.search')->middleware('permission:log-list');
            });

            // Settings
            Route::controller(SettingController::class)->prefix('settings')->middleware('permission:setting-list')->group(function () {

                Route::get('', 'index')->name('settings.index')->middleware('permission:setting-list');
                Route::post('', 'store')->name('settings.store')->middleware('permission:setting-list');    
                Route::get('/updates', 'index')->name('update.index')->middleware('permission:updates-list');
                Route::get('/updates/add', 'create')->name('update.create')->middleware('permission:updates-create');
                Route::post('/updates/store', 'store')->name('update.store')->middleware('permission:updates-create');
                Route::get('/updates/edit/{id}', 'edit')->name('update.edit')->middleware('permission:updates-edit');      
                Route::post('/updates/update/{id}', 'update')->name('updates.edit')->middleware('permission:updates-edit');        
                Route::post('/updates/delete/{id}', 'destroy')->name('update.delete')->middleware('permission:updates-delete');

                // Route::get('/information', 'contactInformation')->name('settings.information');
                // Route::get('/social', 'social')->name('settings.social');
                // Route::get('/fav-logo', 'favLogo')->name('settings.favLogo');
                // Route::patch('/update-contact', 'updateContact')->name('settings.contactUpdate');
                // Route::patch('/update-social', 'updateSocial')->name('settings.socialUpdate');
                // Route::patch('/logo-favicon', 'logoFavicon')->name('settings.logoFavIconUpdate');
            });
        });
    });
});