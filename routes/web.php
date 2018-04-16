<?php

Route::namespace('Front')->group(function () {
    Route::get('/', ['as' =>'front.home.index', 'uses' => 'HomeController@index']);
    Route::get('about', ['as' =>'front.home.about', 'uses' => 'HomeController@about']);

    Route::prefix('items')->group(function () {
        Route::get('/', ['as' =>'front.items.index', 'uses' => 'Item\ItemController@index']);
        Route::get('view/{item}', ['as' =>'front.items.view', 'uses' => 'Item\ItemController@view']);
        Route::get('filter', ['as' =>'front.items.filter', 'uses' =>'Item\ItemController@filter']);
    });

    Route::get('contact', ['as' =>'front.home.showContactForm', 'uses' => 'HomeController@showContactForm']);
    Route::post('contact', ['as' =>'front.home.contact', 'uses' => 'HomeController@contact']);
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('/', ['as' =>'admin.home.index', 'uses' => 'HomeController@index']);
    
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => '', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/reset', ['as' => '', 'uses' => 'Auth\ResetPasswordController@reset']);
    Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => '', 'uses' => 'Auth\RegisterController@register']);

    Route::prefix('items')->group(function () {
        Route::get('/', ['as' =>'admin.items.index', 'uses' => 'Item\ItemController@index']);
        Route::get('add', ['as' =>'admin.items.showAddForm', 'uses' => 'Item\ItemController@showAddForm']);
        Route::post('add', ['as' =>'admin.items.add', 'uses' => 'Item\ItemController@add']);
        Route::get('view/{item}', ['as' =>'admin.items.view', 'uses' => 'Item\ItemController@view']);
        Route::get('update/{item}', ['as' =>'admin.items.showUpdateForm', 'uses' => 'Item\ItemController@showUpdateForm']);
        Route::post('update/{item}', ['as' =>'admin.items.update', 'uses' => 'Item\ItemController@update']);
        Route::delete('destroy/{item}', ['as' =>'admin.items.destroy', 'uses' =>'Item\ItemController@destroy']);
    });

    Route::prefix('posts')->group(function () {
        Route::get('/', ['as' =>'admin.posts.index', 'uses' => 'Post\PostController@index']);
        Route::get('add', ['as' =>'admin.posts.showAddForm', 'uses' => 'Post\PostController@showAddForm']);
        Route::post('add', ['as' =>'admin.posts.add', 'uses' => 'Post\PostController@add']);
        Route::get('view/{post}', ['as' =>'admin.posts.view', 'uses' => 'Post\PostController@view']);
        Route::get('update/{post}', ['as' =>'admin.posts.showUpdateForm', 'uses' => 'Post\PostController@showUpdateForm']);
        Route::post('update/{post}', ['as' =>'admin.posts.update', 'uses' => 'Post\PostController@update']);
        Route::delete('destroy/{post}', ['as' =>'admin.posts.destroy', 'uses' =>'Post\PostController@destroy']);
    });

    Route::prefix('itemElements')->group(function () {
        Route::get('/', ['as' =>'admin.itemElements.index', 'uses' => 'Item\ItemElementController@index']);
        Route::get('add', ['as' =>'admin.itemElements.showAddForm', 'uses' => 'Item\ItemElementController@showAddForm']);
        Route::post('add', ['as' =>'admin.itemElements.add', 'uses' => 'Item\ItemElementController@add']);
        Route::get('view/{item_element}', ['as' =>'admin.itemElements.view', 'uses' => 'Item\ItemElementController@view']);
        Route::get('update/{item_element}', ['as' =>'admin.itemElements.showUpdateForm', 'uses' => 'Item\ItemElementController@showUpdateForm']);
        Route::post('update/{item_element}', ['as' =>'admin.itemElements.update', 'uses' => 'Item\ItemElementController@update']);
        Route::delete('destroy/{item_element}', ['as' =>'admin.itemElements.destroy', 'uses' => 'Item\ItemElementController@destroy']);
    });

    Route::prefix('autoComplete')->group(function () {
        Route::get('region', ['as' => 'regions.search', 'uses' => 'Item\ItemElementController@searchRegions']);
        Route::get('maker', ['as' => 'makers.search', 'uses' => 'Item\ItemElementController@searchMakers']);
        Route::get('variety', ['as' => 'varieties.search', 'uses' => 'Item\ItemVarietyController@searchVarieties']);
        Route::get('brand', ['as' => 'brands.search', 'uses' => 'Item\ItemElementController@searchBrands']);
        Route::get('tag', ['as' => 'tags.search', 'uses' => 'Item\ItemTagController@searchTags']);
    });
});
