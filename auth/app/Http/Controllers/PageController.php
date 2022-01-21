<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Pages;

class PageController extends Controller
{   
    public function index(){

        $pages =  Pages::all();
        return view('welcome', ['pages' => $pages]);
  
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'url'=>'required',
            'extras'=>'required',
            'seo'=>'required',
            'tags'=>'required',
            'styles'=>'required',
            'type'=>'required',
            'project_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $input = $request->all();
        $input['extras'] = json_encode($request->input('extras'));
        $input['seo'] = json_encode($request->input('seo'));
        $input['user_id'] = $request->user()->id;
        $pages = Pages::create($input);

        $responseArray = [];
        $responseArray['name'] = $pages->name;

        return response()->json( $responseArray,200);
    }


    public function update(Request $request, $id)
    {   
        request()->validate([
            'name'=>'required',
            'description'=>'required',
            'url'=>'required',
            'extras'=>'required',
            'seo'=>'required',
            'tags'=>'required',
            'styles'=>'required',
            'type'=>'required',
            "project_id"=>'required'
        ]);

        $page = Pages::find($id);
        $page->name = $request->input('name');
        $page->description = $request->input('description');
        $page->url = $request->input('url');
        $page->extras = json_encode($request->input('extras'));
        $page->seo = json_encode($request->input('seo'));
        $page->tags = $request->input('tags');
        $page->styles = $request->input('styles');
        $page->type = $request->input('type');
        $page->project_id = $request->input('project_id');
        $page->update();
        return redirect()->back()->with('status','Pages Updated Successfully');
    }



    public function delete($id){
        Pages::where('id',$id)->delete();
        return redirect('/')->with('delete','Deleted');
    }
}
