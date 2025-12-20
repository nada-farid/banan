<?php

Route::redirect('/admin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Slider
    Route::delete('sliders/destroy', 'SliderController@massDestroy')->name('sliders.massDestroy');
    Route::post('sliders/media', 'SliderController@storeMedia')->name('sliders.storeMedia');
    Route::post('sliders/ckmedia', 'SliderController@storeCKEditorImages')->name('sliders.storeCKEditorImages');
    Route::resource('sliders', 'SliderController');

    // Goals
    Route::delete('goals/destroy', 'GoalsController@massDestroy')->name('goals.massDestroy');
    Route::post('goals/media', 'GoalsController@storeMedia')->name('goals.storeMedia');
    Route::post('goals/ckmedia', 'GoalsController@storeCKEditorImages')->name('goals.storeCKEditorImages');
    Route::resource('goals', 'GoalsController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::resource('teams', 'TeamController');

    // Partner
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController');

    // Award
    Route::delete('awards/destroy', 'AwardController@massDestroy')->name('awards.massDestroy');
    Route::resource('awards', 'AwardController');

    // Job
    Route::delete('jobs/destroy', 'JobController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobController');

    // Employment
    Route::delete('employments/destroy', 'EmploymentController@massDestroy')->name('employments.massDestroy');
    Route::post('employments/media', 'EmploymentController@storeMedia')->name('employments.storeMedia');
    Route::post('employments/ckmedia', 'EmploymentController@storeCKEditorImages')->name('employments.storeCKEditorImages');
    Route::resource('employments', 'EmploymentController');

    // Hawkma Category
    Route::delete('hawkma-categories/destroy', 'HawkmaCategoryController@massDestroy')->name('hawkma-categories.massDestroy');
    Route::resource('hawkma-categories', 'HawkmaCategoryController');

    // Hawkma
    Route::delete('hawkmas/destroy', 'HawkmaController@massDestroy')->name('hawkmas.massDestroy');
    Route::post('hawkmas/media', 'HawkmaController@storeMedia')->name('hawkmas.storeMedia');
    Route::post('hawkmas/ckmedia', 'HawkmaController@storeCKEditorImages')->name('hawkmas.storeCKEditorImages');
    Route::resource('hawkmas', 'HawkmaController');

    // Report Category
    Route::delete('report-categories/destroy', 'ReportCategoryController@massDestroy')->name('report-categories.massDestroy');
    Route::resource('report-categories', 'ReportCategoryController');

    // Report
    Route::delete('reports/destroy', 'ReportController@massDestroy')->name('reports.massDestroy');
    Route::post('reports/media', 'ReportController@storeMedia')->name('reports.storeMedia');
    Route::post('reports/ckmedia', 'ReportController@storeCKEditorImages')->name('reports.storeCKEditorImages');
    Route::resource('reports', 'ReportController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Program
    Route::delete('programs/destroy', 'ProgramController@massDestroy')->name('programs.massDestroy');
    Route::post('programs/media', 'ProgramController@storeMedia')->name('programs.storeMedia');
    Route::post('programs/ckmedia', 'ProgramController@storeCKEditorImages')->name('programs.storeCKEditorImages');
    Route::resource('programs', 'ProgramController');

    // Program Timeline
    Route::delete('program-timelines/destroy', 'ProgramTimelineController@massDestroy')->name('program-timelines.massDestroy');
    Route::resource('program-timelines', 'ProgramTimelineController');

    // Program Team
    Route::delete('program-teams/destroy', 'ProgramTeamController@massDestroy')->name('program-teams.massDestroy');
    Route::resource('program-teams', 'ProgramTeamController');

    // Program Goal
    Route::delete('program-goals/destroy', 'ProgramGoalController@massDestroy')->name('program-goals.massDestroy');
    Route::resource('program-goals', 'ProgramGoalController');

    // News
    Route::delete('newss/destroy', 'NewsController@massDestroy')->name('newss.massDestroy');
    Route::post('newss/media', 'NewsController@storeMedia')->name('newss.storeMedia');
    Route::post('newss/ckmedia', 'NewsController@storeCKEditorImages')->name('newss.storeCKEditorImages');
    Route::resource('newss', 'NewsController');

    // Gallery
    Route::delete('galleries/destroy', 'GalleryController@massDestroy')->name('galleries.massDestroy');
    Route::post('galleries/media', 'GalleryController@storeMedia')->name('galleries.storeMedia');
    Route::post('galleries/ckmedia', 'GalleryController@storeCKEditorImages')->name('galleries.storeCKEditorImages');
    Route::resource('galleries', 'GalleryController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Tags
    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');
    Route::resource('tags', 'TagsController');

    // Settings
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::post('settings', 'SettingController@update')->name('settings.update');
    Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
    Route::post('settings/ckmedia', 'SettingController@storeCKEditorImages')->name('settings.storeCKEditorImages');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
