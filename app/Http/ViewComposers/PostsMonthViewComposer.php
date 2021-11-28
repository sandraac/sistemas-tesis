<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostsMonthViewComposer{
    public function compose(View $view){
        $months = Post::where('status', 'PUBLIC')->select(
            DB::raw("count(*) as count"),
            DB::raw("DATE_FORMAT(published_at,'%M %Y') as date")
        )->groupBy('date')
        ->orderBy('published_at','DESC')
        ->get();
        $view->with (['months' => $months]);
    }
}

