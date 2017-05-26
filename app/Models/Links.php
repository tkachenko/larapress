<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    public static function linkToTerm($term){
        switch ($term->taxonomy){
            case 'category':
                $link = '/category/'.$term->slug;
                break;
            case 'post_tag':
                $link = '/tag/'.$term->slug;
            break;
            default:
                $link = '';
        }
        return $link;
    }

}