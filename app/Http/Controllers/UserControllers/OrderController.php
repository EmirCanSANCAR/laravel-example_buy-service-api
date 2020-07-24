<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Service;

class OrderController extends Controller
{
    public function getOrder(Request $request)
    {
        $per_page = $request->input('per_page', 20);

        $query = auth()->user()->orders()->query();

        // TODO
        // if(Date > x) {

        // }

        $payload = $query->paginate((int) $per_page);
        return response()->json($payload);
    }

    public function postOrder(Request $request, $serviceId)
    {
        $service = Service::findOrFail($serviceId);

        $order = auth()->user()->orders()->create([
            'service_provider_id' => $service->service_provider_id,
            'service_id' => $service->id,
            'amount' => $service->amount,
        ]);

        return response()->json($order);
    }
}
