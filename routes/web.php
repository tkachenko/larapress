<?php

Route::get('/', 'PostsController@index');
Route::get('category/{slug}', 'PostsController@category');
Route::get('tag/{slug}', 'PostsController@category');

Route::get('search', 'PostsController@search');

// by default non routed path is single post
Route::get('{post_name}', 'PostsController@show');
