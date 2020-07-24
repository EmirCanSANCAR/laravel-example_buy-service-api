<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Service;

class ServiceProviderController extends Controller
{
    public function getServiceProviders(Request $request)
    {
        $per_page = $request->input('per_page', 20);

        $query = ServiceProvider::with('types');
        $payload = $query->paginate((int) $per_page);
        return response()->json($payload);
    }

    public function getServiceProvider(Request $request, $serviceProviderId)
    {
        $serviceProvider = ServiceProvider::with(['types', 'services'])->findOrFail($serviceProviderId);
        return response()->json($serviceProvider);
    }
}
