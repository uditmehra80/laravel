<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Project;

class ProjectController extends Controller
{   
    public function index(){

        $projects =  Project::all();
        return view('welcome', ['projects' => $projects]);
  
    }

    public function update(Request $request, $id)
    {   
        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
            'extras'=>'required',
        ]);

        $project = Project::find($id);
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->image = $request->input('image');
        $project->extras =  json_encode($request->input('extras'));
        $project->update();
        return redirect()->back()->with('status','project Updated Successfully');
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
            'extras'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }

        $input = $request->all();
        $input['extras'] = json_encode($request->input('extras'));
        $input['user_id'] = $request->user()->id;
        
        $pages = Project::create($input);

        $responseArray = [];
        $responseArray['name'] = $pages->name;

        return response()->json( $responseArray,200);
    }

    public function delete($id){
        Project::where('id',$id)->delete();
        return redirect('/')->with('delete','Deleted');
    }
}
