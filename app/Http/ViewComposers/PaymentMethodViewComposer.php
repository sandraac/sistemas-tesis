<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\PaymentPlatform;

class PaymentMethodViewComposer{
    public function compose(View $view){
        $web_payment_methods = PaymentPlatform::all(['name',
        'image']);
        $view->with (['web_payment_methods' => $web_payment_methods]);
    }
}

