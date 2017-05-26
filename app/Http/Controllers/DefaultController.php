<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Term;
use App\Models\Option;
use View;
use Config;
use App;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    public function __construct(Request $request)
    {

        $this->options = App\Models\Option::all()->keyBy('option_name');
        $this->themefolder = 'themes/solid/';
        $this->title = $this->options['blogname']->option_value;
        $this->description = $this->options['blogdescription']->option_value;
        $this->posts_per_page = 2;//$this->options['posts_per_page']->option_value;

        $this->siteurl = $this->options['siteurl']->option_value;

        $this->categories = Term::getCategories();
        $this->tags = Term::getTags();

        $this->pages = Post::getPages();

        $this->last_posts = [];

        View::share('themefolder', $this->themefolder);
        View::share('blogname',  $this->title);
        View::share('siteurl',  $this->siteurl);

        View::share('categories', $this->categories);
        View::share('tags',  $this->tags);
        View::share('last_posts',  $this->last_posts);
        View::share('pages',  $this->pages);

        if(isset($_GET['page'])){
            $this->skip = $this->posts_per_page * (intval($_GET['page'])-1);
        }else{
            $this->skip = 0;
        }

    }
}