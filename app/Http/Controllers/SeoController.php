<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SeoController extends DefaultController
{

    public function robotsTxt(){
        return view('seo/robotstxt');
    }

    public function sitemapIndex(){

        $items = [
            ['url'=> $this->siteurl.'sitemap-items.xml'],
            ['url'=> $this->siteurl.'sitemap-tags-categories.xml'],
        ];

        return view('seo/sitemapIndex',[
            'items'=>$items
        ]);

    }

    public function sitemapItems($type = false){
        $items = [];

        switch ($type){
            case 'tags-categories':
                foreach($this->tags AS $tag){
                    $item['url'] = route('tag', ['slug' => $tag->slug]);
                    $item['lastmod'] = date("Y-m-d");
                    $item['priority'] = '0.8';

                    $items[] = $item;
                }

                foreach($this->categories AS $category){
                    $item['url'] = route('category', ['slug' => $category->slug]);
                    $item['lastmod'] = date("Y-m-d");
                    $item['priority'] = '0.8';

                    $items[] = $item;
                }
            break;
            case 'pages':
                $pages = Post::getPages([], 10000);

                foreach($pages AS $post){
                    $item['url'] = route('post', ['post_name' => $post->post_name]);
                    $item['lastmod'] = date("Y-m-d", strtotime($post->post_date));
                    $item['priority'] = '0.8';

                    $items[] = $item;
                }
            break;
            default:
                // by default show posts
                $item['url'] = $this->siteurl;
                $item['lastmod'] = date("Y-m-d");
                $item['priority'] = '1.0';
                $items[] = $item;

                $posts = Post::getArticles([], 10000);

                foreach($posts AS $post){
                    $item['url'] = route('post', ['post_name' => $post->post_name]);
                    $item['lastmod'] =date("Y-m-d", strtotime($post->post_date));
                    $item['priority'] = '0.8';

                    $items[] = $item;
                }

        }
        if($type == 'tags-categories'){

        }else{



        }



        return $this->renderSitemap($items);
    }

    public function sitemaphtml(){

        $genres = Genre::getAppsGenres();
        $collections = Collections::where('ctype',1)->get();

        return view('main/sitemaphtml',
            [
                'title'=>'Sitemap',
                'genres'=>$genres,
                'collections'=>$collections,
            ]);
    }

    private function renderSitemap($items){
        return view('seo/sitemapList',[
            'items'=>$items
        ]);
    }

}
