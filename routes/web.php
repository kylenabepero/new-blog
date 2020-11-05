<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post; //always import your models to route if going to use parameters from there
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/post/{id}/{name}', function ($id,$name) {
//     return "post no: ".$id." ".$name;
// });

// Route::resource('posts','App\Http\Controllers\PostsController');
Route::get('/contact','App\Http\Controllers\PostsController@contact');

// Route::get('insert',function(){

//       //  DB::insert('insert into posts(title, content) values (?,?)',['PHP with Laravel','Laravel is a great framework']);
//         DB::insert('insert into posts(title, Content) values (?, ?)', ['kyle', 'Dayle']);
//     } 
// );

// Route::get('/readed', function(){

//     $result= DB::select('select * from posts where id=?',[1]);
//     foreach($result as $post){
//         return $post->title;
//         }
//     } 
// );

// Route::get('/change',function(){

//     $updated= DB::update('update posts set title="Updated Title" where id=?',[1]);
//     return $updated;
// }
// );

// Route::get('delete',function(){

//     $deleted= DB::delete('delete from posts where id=?',[1]);
    
//     return $deleted;
// }
// );


// eloquent

Route::get('find',function(){

    $posts=Post::find(2);
    return $posts;

}
);

// Route::get('findId',function(){

// //$posts=Post::where('id',2)->orderBy('id','desc')->take(1)->get(); same result as below
// $posts=Post::where('id',2)->get();
// return $posts;
// });
// Not functioning
// Route::get('findMore',function(){

//     $posts=Post::where('user_count','<',50)->firstOrFail();

//     return $posts;
    
// });

Route::get('basicInsert',function(){

    $post = new Post;

    $post->title= "inserted using eloquent";
    $post->content= "content insterted using eloquent";

    $post->save();
});

Route::get('basicUpdate',function(){

    $post = Post::find(3);

    $post->title= "inserted using eloquent UPDATED";
    $post->content= "New content insterted ";
    $post->save();
});

//using create method to change table in database
Route::get('create',function(){

    Post::create(['user_id'=>'3','title'=>'Create METHOD 3','content'=>'This content using create Method 3']);
});

//using update method to change table in database :eloquent
Route::get('update',function(){

    Post::where('id',2)->where('is_admin',0)->update(['title'=>'update method success','content'=>'this is the updated content using update method']);

});

Route::get('delete',function(){

    Post::destroy([3,5]);


});

Route::get('softdelete',function(){
    Post::destroy(2);
    
});


Route::get('readSoftdelete',function(){
    // $post = Post::withTrashed()->where('id',1)->get();
    //or $post = Post::onlyTrashed()->where('is_admin',0)->get();
    $post = Post::onlyTrashed()->get();
    return $post;
});

Route::get('restore',function(){
    
    $post = Post::onlyTrashed()->restore();
    //return $post;
});

Route::get('forceDelete',function(){
    
    Post::onlyTrashed()->where('is_admin',0)->forcedelete();
    //return $post;
});


//eloquent relationships

Route::get('/user/{id}/post',function($id){


   return User::find($id)->post;
    //return $id;
});

Route::get('/posts',function(){

    $user= User::find(1);
    // return $user;
    


});

