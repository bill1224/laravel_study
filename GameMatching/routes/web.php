<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlindController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\MoveChatingController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');

Route::resource('forum', ForumController::class);

Route::post('/forum/comment', [CommentController::class, 'create_comment'])->name('create_comment');

Route::post('/forum/additional_comment', [CommentController::class, 'create_additional_comment'])->name('create_additional_comment');

Route::POST('/forum/recommend', [ForumController::class, 'recommend']);

Route::POST('/forum/search', [ForumController::class, 'search_forum'])->name('search_forum');

Route::get('/friend/{id}', [FriendController::class, 'request']);

Route::POST('/friend/accept', [FriendController::class, 'accept']);

Route::POST('/friend/refusal', [FriendController::class, 'refusal']);

Route::get('/chating', [MoveChatingController::class, 'index']);

Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');

Route::get('/mypage/request', [MypageController::class, 'request']);

Route::get('/mypage/myforum', [MypageController::class, 'myforum']);

Route::get('/mypage/box_of_letter', [MypageController::class, 'box_of_letter'])->name('box_of_letter');

Route::get('/mypage/bookmark_list', [MypageController::class, 'bookmark_list'])->name('bookmark_list');

Route::get('/mypage/letter/filter/{num}', [MypageController::class, 'letter_filter'])->name('letter_filter');

Route::get('/letter/{id}', [LetterController::class, 'index'])->name('letter');

Route::POST('/letter/create', [LetterController::class, 'create'])->name('create_letter');

Route::get('/blind/{id}', [BlindController::class, 'add_blind'])->name('blind');

Route::get('/mypage/blind', [MypageController::class, 'blind_list'])->name('blind_list');

Route::DELETE('/blind/{id}', [BlindController::class, 'delete'])->name('delete_blind');

Route::post('/bookmark', [BookmarkController::class, 'bookmark'])->name('bookmark');

Route::DELETE('/bookmark/{List_of_bookmark}', [BookmarkController::class, 'delete'])->name('delete_bookmark');

Route::get('/user_info/{id}', [MypageController::class, 'user_info'])->name('user_info');

