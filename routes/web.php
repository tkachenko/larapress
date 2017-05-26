<?php

Route::get('/', 'PostsController@index');
Route::get('category/{slug}', 'PostsController@category')->name('category');
Route::get('tag/{slug}', 'PostsController@tag')->name('tag');

// SEO url's
Route::get('robots.txt', 'SeoController@robotsTxt');
Route::get('sitemap.xml', 'SeoController@sitemapIndex');
Route::get('sitemap-{slug}.xml', 'SeoController@sitemapItems')->name('sitemapitems');

Route::get('search', 'PostsController@search')->name('search');
Route::get('feed', 'PostsController@feed')->name('feed');

// by default non routed path is single post/page
Route::get('{post_name}', 'PostsController@show')->name('post');