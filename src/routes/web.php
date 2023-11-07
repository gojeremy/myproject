<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// main
Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [App\Http\Controllers\Main\IndexController::class,'__invoke'])->name('main.index');
    Route::get('/category/{category}', [App\Http\Controllers\Main\Category\IndexController::class,'__invoke'])->name('main.category.index');
    Route::get('/teasers-feed', [App\Http\Controllers\Main\TeaserFeed\IndexController::class,'__invoke'])->name('main.teaserfeed.index');

    Route::get('/blog', [App\Http\Controllers\Main\Blog\IndexController::class,'__invoke'])->name('main.blog.index');
});

Route::group(['namespace' => 'Post'], function () {
    Route::prefix('post')->group(function () {
        Route::get('/{post}', [App\Http\Controllers\Post\ShowController::class,'__invoke'])->name('post.show');
    });
});

// admin
Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {

    Route::get('/main', [App\Http\Controllers\Admin\Main\IndexController::class,'__invoke'])->name('admin.main.index');
    Route::get('/report', [App\Http\Controllers\Admin\Report\IndexController::class,'__invoke'])->name('admin.report.index');
    Route::get('/get-started', [\App\Http\Controllers\Admin\GetStarted\IndexController::class,'__invoke'])->name('admin.getStarted.index');

    Route::prefix('post')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Post\IndexController::class,'__invoke'])->name('admin.post.index');
        Route::get('/unpublished', [\App\Http\Controllers\Admin\Post\UnpublishedController::class,'__invoke'])->name('admin.post.unpublished');

        Route::prefix('search')->group(function () {
            # form #1 headlines by category
            Route::get('/category', [\App\Http\Controllers\Admin\Post\Search\Category\IndexController::class,'__invoke'])->name('admin.post.category.search.index');
            Route::post('/headlines/category', [\App\Http\Controllers\Admin\Post\Search\Category\SearchController::class,'__invoke'])->name('admin.post.category.search.find');
            # form #2 headlines by source
            Route::get('/source', [\App\Http\Controllers\Admin\Post\Search\Source\IndexController::class,'__invoke'])->name('admin.post.search.source.index');
            Route::post('/headlines/source', [\App\Http\Controllers\Admin\Post\Search\Source\SearchController::class,'__invoke'])->name('admin.post.search.source.find');
            # form #3 Everything
            Route::get('/everything', [\App\Http\Controllers\Admin\Post\Search\Everything\IndexController::class,'__invoke'])->name('admin.post.search.everything.index');
            Route::post('/everything', [\App\Http\Controllers\Admin\Post\Search\Everything\SearchController::class,'__invoke'])->name('admin.post.search.everything.find');
        });

        # store
        Route::post('/save', [\App\Http\Controllers\Admin\Post\SaveController::class,'__invoke'])->name('admin.post.save');
        # hand made
        Route::get('/create', [\App\Http\Controllers\Admin\Post\CreateController::class,'__invoke'])->name('admin.post.create');
        Route::post('/', [\App\Http\Controllers\Admin\Post\StoreController::class,'__invoke'])->name('admin.post.store');
        Route::get('/{post}', [\App\Http\Controllers\Admin\Post\ShowController::class,'__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [\App\Http\Controllers\Admin\Post\EditController::class,'__invoke'])->name('admin.post.edit');
        Route::patch('/{post}/edit', [\App\Http\Controllers\Admin\Post\UpdateController::class,'__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [\App\Http\Controllers\Admin\Post\DeleteController::class,'__invoke'])->name('admin.post.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\Category\IndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('/unpublished', [\App\Http\Controllers\Admin\Category\UnpublishedController::class,'__invoke'])->name('admin.category.unpublished');
        Route::get('/create', [\App\Http\Controllers\Admin\Category\CreateController::class,'__invoke'])->name('admin.category.create');
        Route::post('/', [\App\Http\Controllers\Admin\Category\StoreController::class,'__invoke'])->name('admin.category.store');
        Route::get('/{category}/show', [\App\Http\Controllers\Admin\Category\ShowController::class,'__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [\App\Http\Controllers\Admin\Category\EditController::class,'__invoke'])->name('admin.category.edit');
        Route::patch('/{category}/edit', [\App\Http\Controllers\Admin\Category\UpdateController::class,'__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [\App\Http\Controllers\Admin\Category\DeleteController::class,'__invoke'])->name('admin.category.delete');
    });

    Route::prefix('source')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Source\IndexController::class,'__invoke'])->name('admin.source.index');
        Route::delete('/{source}', [\App\Http\Controllers\Admin\Source\DeleteController::class,'__invoke'])->name('admin.source.delete');

        Route::get('/search', [\App\Http\Controllers\Admin\Source\SearchController::class,'__invoke'])->name('admin.source.search');
        Route::post('/search', [\App\Http\Controllers\Admin\Source\FindController::class,'__invoke'])->name('admin.source.find');
        Route::post('/save', [\App\Http\Controllers\Admin\Source\SaveController::class,'__invoke'])->name('admin.source.save');

    });

    Route::prefix('offer')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\Offer\IndexController::class,'__invoke'])->name('admin.offer.index');
        Route::get('/unpublished', [\App\Http\Controllers\Admin\Offer\UnpublishedController::class,'__invoke'])->name('admin.offer.unpublished');
        Route::get('/create', [\App\Http\Controllers\Admin\Offer\CreateController::class,'__invoke'])->name('admin.offer.create');
        Route::post('/create', [\App\Http\Controllers\Admin\Offer\StoreController::class,'__invoke'])->name('admin.offer.store');
        Route::get('/{offer}', [\App\Http\Controllers\Admin\Offer\ShowController::class,'__invoke'])->name('admin.offer.show');
        Route::get('/{offer}/edit', [\App\Http\Controllers\Admin\Offer\EditController::class,'__invoke'])->name('admin.offer.edit');
        Route::patch('/{offer}/edit', [\App\Http\Controllers\Admin\Offer\UpdateController::class,'__invoke'])->name('admin.offer.update');
        Route::delete('/{offer}', [\App\Http\Controllers\Admin\Offer\DeleteController::class,'__invoke'])->name('admin.offer.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\User\IndexController::class,'__invoke'])->name('admin.user.index');
        Route::get('/create', [\App\Http\Controllers\Admin\User\CreateController::class,'__invoke'])->name('admin.user.create');
        Route::post('/', [\App\Http\Controllers\Admin\User\StoreController::class,'__invoke'])->name('admin.user.store');
        Route::get('/{user}', [\App\Http\Controllers\Admin\User\ShowController::class,'__invoke'])->name('admin.user.show');
        Route::get('/{user}/edit', [\App\Http\Controllers\Admin\User\EditController::class,'__invoke'])->name('admin.user.edit');
        Route::patch('/{user}/edit', [\App\Http\Controllers\Admin\User\UpdateController::class,'__invoke'])->name('admin.user.update');
        Route::delete('/{user}', [\App\Http\Controllers\Admin\User\DeleteController::class,'__invoke'])->name('admin.user.delete');
    });
});

Auth::routes(['register' => false]);


