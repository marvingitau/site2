<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\skills;

use App\Http\Providers\Auth;
use Illuminate\Filesystem\Filesystem;
use Validator, Redirect, Response, File;
use App\Image;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Storage;


class Project extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');  //this makes one to be logged in to access any of project pages

        $this->middleware('auth')->except(['welcome']); // this allow access to show only when unlogged
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome()
    {
        $allItem = Projects::all();
        $allSkills = skills::all();
        // dd($allItem);
        // dd($allItem);
        // $arrOfItems=[];
        // foreach($allItem as $arr){
        // //    dd($arr->title);
        //     array_push($arrOfItems,$arr);
        // }
        // dd($arrOfItems);
        
        return view('welcome', compact(['allItem','allSkills']));
    }
    public function index()
    {
        cache()->rememberForever('admin', function () {

            return ['name' => 'el', 'passcode' => 'fjwrCFE22F_S#4'];
        });

        $data = Projects::withTrashed()->where('user_id', auth()->user()->id)->get();  // showing even soft deleted
    
        
        //    dd(auth()->user()->email);
        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('stored');
        $id = auth()->user()->id;

        $skillz=$request->input('skills');
        // dd($skillz);
        // $skillz=explode(" ",$request->input('skills'));
        // $skillz=json_encode($request->input('skills'));
        // $skillz=json_encode($request->input('product_name'));
        // dump(($skillz));
        //  dd(implode(" ",$skillz));
        // dd(explode(" ",$skillz[0]));


        // $data=$request->all();
        // $lastid=Orders::create($data)->id;


        



        // $path1 = str_replace('public/', 'storage/', Storage::disk('local')->putFile('public', $request->file('product_image')));
        // foreach ($request->product_image as $photo) {
        $attr = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            
            // 'product_image' => 'required',
            // 'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_price' => 'required'

        ]);
        // dd($photo);
        // $title= $photo->store('photos');
        // $project = Projects::create($attr + ['product_image' => $path1] + ['user_id' => auth()->user()->id]);
        $project = Projects::create($attr+ ['user_id' => auth()->user()->id]);
        // }
    

        if(count($request->skills) > 0)
        {
        foreach($request->skills as $item=>$v){
            $data2=array(
               
               
                'skill'=>$request->skills[$item],
           
            );
        skills::insert($data2+['projects_id'=>$project->id]);
          }
        }


        

        // dd($attr['product_image']);

        // dd($path);

        // Projects::create( $request ,['user_id'=> auth()->user()->id]);
        //  dd(auth()->user()->id);
        // $image = $request('product_image');



        // if ($image = $request->file('product_image')) {
        //     foreach ($image as $files) {
        //     $destinationPath = 'public/images/'; // upload path
        //     $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     $files->move($destinationPath, $profileImage);
        //     // $insert[]['image'] = "$profileImage";
        //     dd($profileImage);
        //     }
        // }

        // $check = Image::insert($insert);
        // dd($insert);






        \Mail::to(auth()->user()->email)->send(
            new ProjectCreated($project)
        );


        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects, $id)
    {

        // $this->authorize('view',$project);

        //   dd(auth()->user()->id);

        $projects = Projects::findOrFail($id);
        //   dd($projects->user_id);
        /* MBONA SIWEZI ACCESS PROJECT ID NA BOTH PROJECT ID AND USER_ID ZIKO INCLUDED  */


        // if($projects->user_id !== auth()->id() ){
        // //    abort(403);
        //    dd($projects->user_id ,(string)auth()->user()->id );
        // }

        abort_if($projects->user_id !== (string) auth()->id(), 403);

        $userData = Projects::where('id', $id)->get();
        return view('show', compact('userData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Projects::findOrFail($id);
        $this->authorize('view', $projects);
        $projectData = Projects::findOrFail($id);
        // dd(json_decode($projectData->skillz)[0]);

        return view('edit', compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $projectData = ($request->validate([
        //     'title' => ['required','min:3'],
        //     'description' => ['required']
        // ]))->save();
        // THIS IS INCORRENT SIINCE WE WANT TO ACT UPON THE DATA SO WE USE THE ELOQUENT MODEL INSTEAD
        $projectData = Projects::findOrFail($id);
        // $projectData= $request->validate(
        //     [
        //         'title' => 'required',
        //         'description' => 'required',
        //         'product_image' => 'required',
        //         'product_price' => 'required',
        //     ]
        //     );
        $projectData->title = request('title');
        $projectData->description = request('description');
        $projectData->product_image = request('product_image');
        $projectData->product_price = request('product_price');
        $projectData->skillz =json_encode($request->input('skills'));
        //implode(" ",$request->input('skills'));


        $projectData->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Projects::findOrFail($id)->delete();
        return redirect('/home');
    }

    //HARD DELETE
    public function Harddelete($id)
    {
        $del = Storage::drive('local')->delete('storage/6x7ZtvmHmZIqWf3a6DT0XzUjW6m8F0F0Xb3wuJ1G.jpeg');
        dump($del);
        Projects::findOrFail($id)->forceDelete();

        return redirect('/home');
    }
}
