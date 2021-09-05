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

Route::group(['middleware' => 'locale'], function () {
  
    if (Auth::check()){
    Route::get('/', 'HomeController@welcome');
} 
else {
    Route::get('/', 'HomeController@index');
}
   Auth::routes();
    Route::get('/profile', 'UserController@index')->name('profile');
Route::post('/changePassword','UserController@postCredentials');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::match(['get', 'post'],'/chart', 'HomeController@chart')->name('chart');
Route::match(['get', 'post'],'/detail', 'HomeController@detail')->name('detail');
Route::match(['get', 'post'],'/container', 'HomeController@container')->name('container');
Route::get('/hyanalt/{id}', ['as' => 'home.hyanalt', 'uses' => 'HomeController@hyanalt']);
Route::post('/search', 'HomeController@search')->name('search');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/freightfill/{id?}',function($id = 0){	
				$dt=App\Freight::where('bid','=',$id)->get();
				
				return $dt;
			});
Route::get('/billfill/{id?}',function($id = 0){	
				$dt=App\Bill::where('bid','=',$id)->get();
				
				return $dt;
			});
Route::get('/transportersfill/{id?}',function($id = 0){	
				$dt=App\Transporters::where('bid','=',$id)->get();
				return $dt;
			});
Route::get('/wagonsfill/{id?}',function($id = 0){	
				$dt=App\Wagon::where('bid','=',$id)->get();
				return $dt;
			});
Route::get('/zuuchfill/{id?}',function($id = 0){	
				$dt=App\Zuuch::where('bid','=',$id)->get();
				return $dt;
			});
Route::get('setlocale/{locale}',function($locale){	
			Session::put('locale', $locale);
			return redirect()->route('home');
			});
});
Route::get('/chartfill/{id?}/{id1?}/{id2?}',function($id = 0,$id1 = 0,$id2 = 0){
    $dt=DB::select(" select  substr(t.FRIEGHTGNG,0,4) as frieghtgng, count(t.FRIEGHTGNG) as niit from OZ_IDX_X_FRIEGHT t, OZ_IDX_X_BILL b
                        where b.BID=t.BID  and TO_DATE(LOADDATE, 'yyyy-mm-dd') between TO_DATE('".$id1."', 'yyyy-mm-dd') and TO_DATE('".$id2."', 'yyyy-mm-dd')
                        and substr(t.FRIEGHTGNG,0,2)='".$id."' 
                        group by substr(t.FRIEGHTGNG,0,4)
                        order by substr(t.FRIEGHTGNG,0,4)");
    return $dt;
});