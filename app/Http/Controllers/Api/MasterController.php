<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterPackages;

class MasterController extends Controller
{
    public function getMasterPackages(Request $request) {
        try {
            $m_packages = MasterPackages::all();

            return response()->json([
                'status' => 200,
                'data' => $m_packages,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
