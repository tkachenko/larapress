<?php

namespace App\Http\Controllers;

use App\Models\Posts;
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
        $this->posts_per_page = $this->options['posts_per_page']->option_value;

        $this->categories = Term::getCategories();
        $this->tags = Term::getTags();

        $this->last_posts = [];

        View::share('themefolder', $this->themefolder);
        View::share('blogname',  $this->title);

        View::share('categories', $this->categories);
        View::share('tags',  $this->tags);
        View::share('last_posts',  $this->last_posts);

    }
}