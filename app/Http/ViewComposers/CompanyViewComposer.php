<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Business;

class CompanyViewComposer{
    public function compose(View $view){
        $web_company = Business::where('id', 1)
        ->firstOrFail();
        $view->with (['web_company' => $web_company]);
    }
}

