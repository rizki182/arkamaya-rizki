<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Validator;

use App\Enums\ProjectStatus;
use App\Models\Project;
use App\Models\Client;

class ProjectController extends Controller
{
    public function index(Request $request){
        $data = [
            "projects" => Project::list($request),
            "client_combobox" => Client::combobox(),
            "project_status" => ProjectStatus::class,
            "filter" => !empty($request["filter"]) ? $request["filter"] : [],
        ];

        return view('project_list', $data);
    }
    
    public function list(Request $request){
        $data = Project::list($request);
        return response()->json($data, 200);
    }

    public function add(Request $request){
        $data = [
            "client_combobox" => Client::combobox(),
            "project_status" => ProjectStatus::class,
        ];
        return view('project_add', $data);
    }

    public function edit($id){
        $params = ["id" => $id];
        $data = [
            "project" => Project::detail($params),
            "client_combobox" => Client::combobox(),
            "project_status" => ProjectStatus::class,
        ];
        return view('project_edit', $data);
    }
    
    public function store(Request $request){
        // validate request
        $validator = Validator::make($request->all(), [
            "project_name" => "required",
            "client_id" => "required|integer",
            "project_start" => "required|date_format:Y-m-d",
            "project_end" => "required|date_format:Y-m-d",
            "project_status" => [new Enum(ProjectStatus::class)],
        ]);
        
        if ($validator->fails()) {
            $error_message = [];

            // get all error message
            $messages = $validator->messages();
            foreach ($messages->all() as $message){
                $error_message[] = $message;
            }

            return response()->json($error_message, 400);
        } else {
            $project = Project::create($request);
            return response()->json($project, 200);
        }
    }
    
    public function modify(Request $request){
        // validate request
        $validator = Validator::make($request->all(), [
            "project_id" => "required|integer",
            "project_name" => "required",
            "client_id" => "required|integer",
            "project_start" => "required|date_format:Y-m-d",
            "project_end" => "required|date_format:Y-m-d",
            "project_status" => [new Enum(ProjectStatus::class)],
        ]);
        
        if ($validator->fails()) {
            $error_message = [];

            // get all error message
            $messages = $validator->messages();
            foreach ($messages->all() as $message){
                $error_message[] = $message;
            }

            return response()->json($error_message, 400);
        } else {
            $project = Project::modify($request);
            return response()->json($project, 200);
        }
    }
    
    public function remove(Request $request){
        // validate request
        $validator = Validator::make($request->all(), [
            "project_id" => "required|integer"
        ]);
        
        if ($validator->fails()) {
            $error_message = [];

            // get all error message
            $messages = $validator->messages();
            foreach ($messages->all() as $message){
                $error_message[] = $message;
            }

            return response()->json($error_message, 400);
        } else {
            $project = Project::remove($request);
            return response()->json($project, 200);
        }
    }
    
    public function removeBatch(Request $request){
        // validate request
        $validator = Validator::make($request->all(), [
            "project_id" => "required",
            "project_id.*" => "integer"
        ]);
        
        if ($validator->fails()) {
            $error_message = [];

            // get all error message
            $messages = $validator->messages();
            foreach ($messages->all() as $message){
                $error_message[] = $message;
            }

            return response()->json($error_message, 400);
        } else {
            $project = Project::removeBatch($request);
            return response()->json($project, 200);
        }
    }
}