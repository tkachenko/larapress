<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsController extends DefaultController
{

    public function index(){

        $articles  = Post::getArticles([],  $this->posts_per_page);

        $pager = new LengthAwarePaginator([], 10,  $this->posts_per_page, null, ['path'=>'/']);

        $title = $this->title;

        return view($this->themefolder.'articles',
            [
                'articles'=>$articles,
                'title'=>$title,
                'pager'=>$pager
            ]);

    }
    public function category($slug){

        $category = Term::getCategoryBySlug($slug);
        if(!$category)
            return redirect('/');

        $articles = Post::getArticles(['term_id'=>$category->term_id]);

        $pager = new LengthAwarePaginator([], $category->count, $this->posts_per_page, null, ['path'=>'/']);

        return view($this->themefolder.'articles',
            [
                'articles'=>$articles,
                'title'=>$category->name,
                'pager'=>$pager
            ]);

    }

    public function show($post_name){

        $article = Post::getArticleByName($post_name);

        if(!$article)
            return redirect('/');

        $image = Post::where('post_type', 'attachment')->where('post_parent', $article->ID)->first();
        if(isset($image) and $image){
            $og_image = $image->guid;
        }else{
            $og_image = false;
        }

        return view($this->themefolder.'article',
            [
                'article'=>$article,
                'og_image'=>$og_image,
                'description'=>str_limit(trim(strip_tags($article->post_content)), 150),
                'title'=>$article->post_title
            ]);
    }

    public function search(Request $request){
        $q = $request->input('q');
        if(!$q)
            return redirect('/');

        $articles = Post::getArticles(['q'=>$q]);

        $pager = new LengthAwarePaginator([], 10, $this->posts_per_page, null, ['path'=>'/']);

        return view($this->themefolder.'articles',
            [
                'articles'=>$articles,
                'title'=>'Search results',
                'pager'=>$pager
            ]);
    }
}
