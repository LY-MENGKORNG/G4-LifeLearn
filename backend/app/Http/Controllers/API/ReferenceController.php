<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function store(Request $request)
    {
        $reference = Reference::store($request);
        return response()->json([
            'message' => 'Request sent successfully!',
            'data' => $reference
        ], 200);
    }
}
