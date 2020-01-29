<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSubscription;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(StoreSubscription $request)
    {
        $subscritionService = new SubscriptionService();

        $subscritionService::store(clean($request->email, 'title'));

        return redirect()->back()->with('success','Thanks For Subscribe');
    }
}
