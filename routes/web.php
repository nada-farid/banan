 <?php
 use Illuminate\Support\Facades\Route;
 
Route::as('frontend.')->namespace('Frontend')->group(function () {
   Route::get('/', 'HomeController@index')->name('home');
   Route::get('/about', 'HomeController@about')->name('about');
   Route::get('/managers', 'HomeController@managers')->name('managers');
   Route::get('/partners', 'HomeController@partners')->name('partners');
   Route::get('/awards', 'HomeController@awards')->name('awards');
   Route::get('/employment', 'HomeController@employment')->name('employment');
   Route::post('/employment', 'HomeController@storeEmployment')->name('employment.store');
   Route::get('/license', 'HomeController@license')->name('license');  
   Route::get('/programs', 'ProgramController@index')->name('programs.index');
   Route::get('/program/{slug}', 'ProgramController@show')->name('program.show');
   Route::get('/contact', 'ContactController@contact')->name('contact');
   Route::post('/contact', 'ContactController@store')->name('contact.store');
   Route::get('/policies', 'HawkmaController@policies')->name('policies');
   Route::get('/reports', 'HawkmaController@reports')->name('reports');
   Route::get('/news', 'NewsController@index')->name('news.index');
   Route::get('/news/{slug}', 'NewsController@show')->name('news.show');
   Route::get('/media', 'MediaController@index')->name('media');
   Route::get('/run', 'HomeController@run')->name('run');

});
