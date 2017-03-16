<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Term extends Model
{
    protected $table = 'wp_posts';
    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';
    protected  $primaryKey = 'ID';

    public static function getCategories(){

        $categories = DB::table('wp_term_taxonomy')
            ->leftJoin('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
            ->where('taxonomy', 'category')
            ->get()
            ->keyBy('term_id');
        return $categories;
    }

    public static function getCategoryBySlug($slug){

        return DB::table('wp_term_taxonomy')
            ->leftJoin('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
            ->where('taxonomy', 'category')
            ->where('slug', $slug)
            ->first();

    }

    public static function getTags(){

        $tags = DB::table('wp_term_taxonomy')
            ->leftJoin('wp_terms', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
            ->where('taxonomy', 'post_tag')
            ->get()
            ->keyBy('term_id');
        return $tags;
    }
}
