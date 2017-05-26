<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostsController extends DefaultController
{

    public function index(){

        $articles  = Post::getArticles([],  $this->posts_per_page, $this->skip);

        $articles_count = Post::getArticlesCount();

        $pager = new LengthAwarePaginator([], $articles_count,  $this->posts_per_page, null, ['path'=>'/', ]);

        $title = $this->title;

        return view($this->themefolder.'articles',
            [
                'articles'=>$articles,
                'title'=>$title,
                'pager'=>$pager,
                'head_title'=> $this->title,
                'head_about'=> $this->description

            ]);

    }
    public function category($slug){

        $category = Term::getCategoryBySlug(urlencode($slug));
        if(!$category)
            return redirect('/');

        $articles = Post::getArticles(['term_id'=>$category->term_id], $this->posts_per_page, $this->skip );

        $articles_count = Post::getArticlesCount(['term_id'=>$category->term_id]);

        $pager = new LengthAwarePaginator([], $articles_count, $this->posts_per_page, null, ['path'=>'/category/'.$slug]);

        return view($this->themefolder.'articles',
            [
                'articles'=>$articles,
                'title'=>$category->name,
                'pager'=>$pager,
                'head_title'=> $category->name,
                'head_about'=> $category->description

            ]);

    }

    public function tag($slug){

        $tag = Term::getTagBySlug(urlencode($slug));
        if(!$tag)
            return redirect('/');

        $articles = Post::getArticles(['term_id'=>$tag->term_id], $this->posts_per_page, $this->skip );

        $articles_count = Post::getArticlesCount(['term_id'=>$tag->term_id]);

        $pager = new LengthAwarePaginator([], $articles_count, $this->posts_per_page, null, ['path'=>'/tag/'.$slug]);

        return view($this->themefolder.'articles',
            [
                'articles'=>$articles,
                'title'=>$tag->name,
                'pager'=>$pager,
                'head_title'=> $tag->name,
                'head_about'=> $tag->description

            ]);

    }

    public function show($post_name){

        $post_name  = urlencode($post_name);
        $article = Post::getArticleByName($post_name);

        if(!$article)
            return redirect('/');

        $image = Post::where('post_type', 'attachment')->where('post_parent', $article->ID)->first();
        if(isset($article['image'])){
            $og_image = $article['image'];
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

        $articles = Post::getArticles(['q'=>$q], $this->posts_per_page, $this->skip );

        $articles_count = Post::getArticlesCount(['q'=>$q]);

        $pager = new LengthAwarePaginator([], $articles_count, $this->posts_per_page, null, ['path'=>'/search?q='.$q]);

        return view($this->themefolder.'articles',
            [
                'articles'=>$articles,
                'title'=>'Search results',
                'pager'=>$pager
            ]);
    }

    public function feed(){
        $articles  = Post::getArticles([],  $this->posts_per_page);
        return view($this->themefolder.'feed',
            [
                'articles'=>$articles,
                'title'=>'Search results',
            ]);
    }
}
