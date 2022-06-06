<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Http\Requests\StoreBranshRequest;
use App\Http\Requests\UpdateBranshRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //getAllBranches
    {
        return $Branches = Branch::all();
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
     * @param \App\Http\Requests\StoreBranshRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranshRequest $request)
    {
        //insert to Database
        Branch::create($request->all());
        return 'saved successfuly';
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Branch $bransh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Branch::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Branch $bransh
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $bransh)
    {
        // render to Vue 'branches.edit'
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBranshRequest $request
     * @param \App\Models\Branch $bransh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranshRequest $request, $id)
    {
        return $branch = Branch::find($id)->update($request->all());
        if ($branch)
            return 'updated successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Branch $bransh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->isNotMainBranch($id)) {
            Branch::find($id)->delete();
            return "Branch is deleted successfully";
        }
        return "Main Branch isn't deleted";
    }

    public function isMainBranch($id)
    {
        return $id == 1;
    }

    public function isNotMainBranch($id)
    {
        return !$this->isMainBranch($id);
    }

    public function getLastCharacterInString($string)
    {
        return $string[strlen($string) - 1];
    }

    public function isLastCharacterInStringIsNumeric($string)
    {
        return is_numeric($this->getLastCharacterInString($string));
    }


    public function generateNextCode($branch_id)
    {
        return $beanch = Branch::where('branch_id', $branch_id)->last()->code + 1;
    }
}
