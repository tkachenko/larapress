<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'wp_posts';
    const CREATED_AT = 'post_date';
    const UPDATED_AT = 'post_modified';
    protected  $primaryKey = 'ID';

    public static function getTopArticles($filters=[], $limit = 10){
        $articles = self::where('post_status', 'publish')
            ->where('post_date', '>', date('Y-m-d H:i:s', strtotime('-15 days')))
            ->where('post_type', 'post')
            ->take($limit);

        if(isset($filters['order']))
            $articles->orderBy($filters['order'], 'DESC');

        if(isset($filters['q'])){
            $articles->where('post_content', 'like', '%'.$filters['q'].'%');
        }


        $articles =$articles->get();

        $articles = $articles->keyBy('ID');

        foreach($articles AS $ID=>$article){

            $image = self::where('post_type', 'attachment')->where('post_parent', $ID)->first();


            $articles[$ID]['image'] = 'http://placehold.it/350x150';
            if(isset($image->guid))
                $articles[$ID]['image'] = $image->guid;


            if(isset($filters['locale']) AND $filters['locale'] =='ru'){

                $post_title = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_title')
                    ->first();

                if($post_title)
                    $article->post_title = $post_title->meta_value;


                $post_content = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_text')
                    ->first();


                if($post_content)
                    $article->post_content = $post_content->meta_value;
            }

            $articles[$ID]['post_intro'] =  str_limit(strip_tags(explode('<!--more-->', $article->post_content)[0]), 200);


        }
        return $articles;
    }

    public static function getArticlesCount($filters=[]){
        $articles = self::where('post_status', 'publish')
            //->where('post_date', '>', '')
            ->where('post_type', 'post');

        if(isset($filters['term_id'])){
            $articles->leftJoin('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_posts.ID');
            $articles->where('term_taxonomy_id', $filters['term_id']);
        }

        if(isset($filters['q'])){
            $articles->where('post_content', 'like', '%'.$filters['q'].'%');
        }

        return $articles->count();
    }

    public static function getArticles($filters=[], $limit = 10, $skip = 0){
        $articles = self::where('post_status', 'publish')
            //->where('post_date', '>', '')
            ->where('post_type', 'post')
            ->skip($skip)
            ->take($limit);

        if(isset($filters['term_id'])){
            $articles->leftJoin('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_posts.ID');
            $articles->where('term_taxonomy_id', $filters['term_id']);
        }

    // TODO : add more cool search
        if(isset($filters['q'])){
            $articles->where('post_content', 'like', '%'.$filters['q'].'%');
        }

        if(isset($filters['order'])){
            $articles->orderBy($filters['order'], 'DESC');
        }else{
            $articles->orderBy('post_date', 'DESC');
        }

        $articles =$articles->get();

        $articles = $articles->keyBy('ID');

        foreach($articles AS $ID=>$article){

            $image = self::where('post_type', 'attachment')->where('post_parent', $ID)->first();


            $articles[$ID]['image'] = '';
            if(isset($image->guid))
                $articles[$ID]['image'] = $image->guid;


            if(isset($filters['locale']) AND $filters['locale'] =='ru'){

                $post_title = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_title')
                    ->first();

                if($post_title)
                    $article->post_title = $post_title->meta_value;


                $post_content = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_text')
                    ->first();


                if($post_content)
                    $article->post_content = $post_content->meta_value;
            }

            $articles[$ID]['post_intro'] =  str_limit(strip_tags(explode('<!--more-->', $article->post_content)[0]), 200);


        }
        return $articles;
    }

    public static function getArticleByName($post_name){
       return self::where('post_name', $post_name)
            ->where('post_status', 'publish')
            ->first();
    }

    public static function getArticlesByID($ids, $filters=[]){

        $articles = self::whereIn('ID', $ids)
            ->where('post_status', 'publish')
            ->where('post_type', 'post')
            ->orderBy('ID', 'desc')
            ->get();

        $articles = $articles->keyBy('ID');

        foreach($articles AS $ID=>$article){

            $image = self::where('post_type', 'attachment')->where('post_parent', $ID)->first();


            if(isset($filters['locale']) AND $filters['locale'] =='ru'){

                $post_title = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_title')
                    ->first();

                if($post_title)
                    $article->post_title = $post_title->meta_value;


                $post_content = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_text')
                    ->first();


                if($post_content)
                    $article->post_content = $post_content->meta_value;
            }

            $articles[$ID]['post_intro'] =  str_limit(strip_tags(explode('<!--more-->', $article->post_content)[0]), 200);


            $articles[$ID]['image'] = 'http://placehold.it/350x150';
            if(isset($image->guid))
                $articles[$ID]['image'] = $image->guid;

        }
        return $articles;
    }

    public static function getPages($filters=[], $limit = 10){
        $articles = self::where('post_status', 'publish')
            ->where('post_type', 'page')
            ->take($limit);

        if(isset($filters['term_id'])){
            $articles->leftJoin('wp_term_relationships', 'wp_term_relationships.object_id', '=', 'wp_posts.ID');
            $articles->where('term_taxonomy_id', $filters['term_id']);
        }

        if(isset($filters['order'])){
            $articles->orderBy($filters['order'], 'DESC');
        }else{
            $articles->orderBy('post_date', 'DESC');
        }

        if(isset($filters['q'])){
            $articles->where('post_content', 'like', '%'.$filters['q'].'%');
        }

        $articles =$articles->get();

        $articles = $articles->keyBy('ID');

        foreach($articles AS $ID=>$article){

            $image = self::where('post_type', 'attachment')->where('post_parent', $ID)->first();


            $articles[$ID]['image'] = '';
            if(isset($image->guid))
                $articles[$ID]['image'] = $image->guid;


            if(isset($filters['locale']) AND $filters['locale'] =='ru'){

                $post_title = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_title')
                    ->first();

                if($post_title)
                    $article->post_title = $post_title->meta_value;


                $post_content = Postmeta::where('post_id',$article->ID)
                    ->where('meta_key', 'ru_text')
                    ->first();


                if($post_content)
                    $article->post_content = $post_content->meta_value;
            }

            $articles[$ID]['post_intro'] =  str_limit(strip_tags(explode('<!--more-->', $article->post_content)[0]), 200);


        }
        return $articles;
    }

}
