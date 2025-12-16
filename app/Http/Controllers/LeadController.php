<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;

class LeadController extends Controller
{
    /**
     * Store a newly created lead in storage.
     *
     * @param  StoreLeadRequest  $request
     * @return JsonResponse
     */
    public function store(StoreLeadRequest $request): JsonResponse
    {
        $lead = Lead::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your inquiry! We will be in touch soon.'
        ]);
    }
}