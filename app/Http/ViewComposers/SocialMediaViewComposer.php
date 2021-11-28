<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\SocialMedia;

class SocialMediaViewComposer{
    public function compose(View $view){
        $web_social_networks = SocialMedia::all(
            [
                'url',
                'name',
                'icon'
            ]);
        $view->with (['web_social_networks' => $web_social_networks]);
    }
}

