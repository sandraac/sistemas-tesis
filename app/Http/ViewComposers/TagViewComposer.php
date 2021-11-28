<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Tag;

class TagViewComposer{

    public function compose(View $view){
        $web_tags_products = Tag::
        whereHas('taggables', function($query){
            $query->where('taggable_type','App\Models\Product');
        })
        ->get(['name', 'slug',]);
        $view->with (['web_tags_products' => $web_tags_products]);
    }

}


