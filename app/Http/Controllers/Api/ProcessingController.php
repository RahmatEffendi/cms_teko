<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\JobPublishs;

class ProcessingController extends Controller
{
    public function post_information(Request $request) {
        try {
            $job_package_id = $request->job_package_id;
            $types = $request->types;
            $name = $request->name;
            $age = $request->age;
            $descriptions = $request->descriptions;
            // $photos = $request->photos;

            $j = new JobPublishs;
            $j->job_package_id = $job_package_id;
            $j->type = $types;
            $j->name = $name;
            $j->age = $age;
            $j->descriptions = $descriptions;
            $j->status = 'Pending';
            $j->status_id = 1;
            $j->save();

            return response()->json([
                'status' => 200,
                'message' => 'Sukses',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function get_information(Request $request) {
        try {
            $job = JobPublishs::whereBetween('status_id', [2, 3])->get();

            return response()->json([
                'status' => 200,
                'data' => $job
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 404,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}