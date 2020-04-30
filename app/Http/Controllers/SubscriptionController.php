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

        $response = $subscritionService::store(clean($request->email, 'title'));

        return redirect()->back()->with($response->type,$response->message);
    }
}
