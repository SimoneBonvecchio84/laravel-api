<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $project = Project::with(['type','technologies'])->paginate(5);
        $data = [
            'result' => $project
        ];
        return response()->json($data);
    }

    public function show(string $slug) {
        $project = Project::where('slag', $slug)->first();
        if(!$project){
            return response()->json([], 404);
        }
        return response()->json([
            'reslut' =>  $project
        ]);
    }
}
