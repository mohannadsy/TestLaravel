<?php

namespace App\Http\Controllers\Branch;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Http\Requests\StoreBranshRequest;
use App\Http\Requests\UpdateBranshRequest;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //getAllBranches
    {
        return Branch::all();
//        if (Auth::user()) {
//            return Branch::all();
//        } else {
//            return 'you are not allowed to do this';
//        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // render to Vue 'branches.create'
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranshRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranshRequest $request)
    {
        //validate data before insert to database
        $rules=$this->rules();
        $messages=$this->messages();
        $validator=validator ::make($request->all,$rules,$messages);
        if($validator->fails()){
            return $validator->errors();
        }
        //insert
        Branch::create([
            'name'            =>$request->name   ,
            'main_branch_id'  =>$request->main_branch_id  ,
            'responsibility ' =>$request->responsibility  ,
            'address'         =>$request->address ,
            'website'         =>$request->website ,
            'email'           =>$request->email ,
            'phone'           =>$request->phone ,
            'mobile'          =>$request->mobile,
        ]);
        return 'saved successfuly';
//        return $request['main_branch_id'] = null ? $request['main_branch_id'] = '1' : $request['main_branch_id'] = $request->main_branch_id;

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $bransh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Branch::find($id);
//        if (Auth::user())
//        {
//            return Branch::find($id);
//        }
//        else
//        {
//            return 'you are not allowed to do this';
//        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $bransh
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $bransh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranshRequest  $request
     * @param  \App\Models\Branch  $bransh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranshRequest $request, Branch $bransh)
    {
        Branch::update([
            'name'            =>$request->name   ,
            'main_branch_id'  =>$request->main_branch_id  ,
            'responsibility ' =>$request->responsibility  ,
            'address'         =>$request->address ,
            'website'         =>$request->website ,
            'email'           =>$request->email ,
            'phone'           =>$request->phone ,
            'mobile'          =>$request->mobile,
        ]);
         return 'updated successfuly';
//        return $request['main_branch_id'] = null ? $request['main_branch_id'] = '1' : $request['main_branch_id'] = $request->main_branch_id;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $bransh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::find($id)->where('id', '!=', '1')->delete();

//        if (Auth::user()) {
//            Branch::find($id)->where('id', '!=', '1')->delete();
//            return ('success,Data Deleted');
//        } else {
//            return ('failed,you are not allowed to delete the main branch');
//        }

    }
}
