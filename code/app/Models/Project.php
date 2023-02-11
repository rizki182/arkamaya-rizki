<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    
    // meta
    // ----------------------------------------------------
    protected $table = "tb_m_project";
    protected $primaryKey = "project_id";

    
    // relationships
    // ----------------------------------------------------
    public function client(){
        return $this->belongsTo(Client::class, "client_id", "client_id");
    }

    // CRUD functions
    // ----------------------------------------------------
    // get project list
    public static function list($params){

        // set current page
        $page = empty($params["page"]) ? 1 : $params["page"];
        
        // initialize base object
        $projects = DB::table("tb_m_project")
            ->selectRaw("
                project_id,
                project_name,
                tb_m_project.client_id,
                tb_m_client.client_name,
                DATE_FORMAT(project_start, '%d %b %Y') as project_start,
                DATE_FORMAT(project_end, '%d %b %Y') as project_end,
                project_status"
            )
            ->orderBy("project_name", "asc")
            ->join("tb_m_client", "tb_m_project.client_id", "=", "tb_m_client.client_id");

        // filter for project name
        if(!empty($params["filter"]["project_name"])){
            $projects = $projects->where("project_name", "like", "%".$params["filter"]["project_name"]."%");
        }
        
        // filter for client id
        if(!empty($params["filter"]["client_id"])){
            $projects = $projects->where("client_id", $params["filter"]["client_id"]);
        }
        
        // filter for project status
        if(!empty($params["filter"]["project_status"])){
            $projects = $projects->where("project_status", $params["filter"]["project_status"]);
        }

        // retrieve data with pagination
        // $projects = $projects->paginate(5, ['*'], "page", $page);

        $projects = $projects->get();

        return $projects;
    }

    // get project detail
    public static function detail($params){

        // get data
        $projects = Project::with("client")->find($params["id"]);

        return $projects;
    }

    // create new project
    public static function create($params){
        
        // insert data
        $project = new Project;
        $project->project_name = $params["project_name"];
        $project->client_id = $params["client_id"];
        $project->project_start = $params["project_start"];
        $project->project_end = $params["project_end"];
        $project->project_status = $params["project_status"];
        $project->save();

        // refresh project object
        $project->refresh();

        return $project;
    }
    
    // edit existing project
    public static function modify($params){
        
        // get existing project data into object
        $project = Project::find($params["project_id"]);

        // set new values
        $project->project_name = $params["project_name"];
        $project->client_id = $params["client_id"];
        $project->project_start = $params["project_start"];
        $project->project_end = $params["project_end"];
        $project->project_status = $params["project_status"];
        $project->save();

        // refresh project object
        $project->refresh();

        return $project;
    }
    
    // delete existing project
    public static function remove($params){
        
        // get existing project data into object
        $project = Project::find($params["project_id"]);
        $project->delete();

        return $project;
    }
    
    // delete existing project
    public static function removeBatch($params){
        
        // get existing project data into object
        $project = Project::whereIn("project_id", $params["project_id"]);
        $project->delete();

        return $project;
    }
}
