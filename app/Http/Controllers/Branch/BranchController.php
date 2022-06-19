<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Traits\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class BranchController extends Controller
{
    use  ActivityLog;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //getAllBranches
    {
        $parameters = ['id'=> null];
        $this->callActivity('getAllBranches', $parameters);
        return $Branches = Branch::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Branches/Index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBranchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchRequest $request)
    {
        $id=Branch::latest()->first()->id+1;
        $parameters = ['request' => $request ,'id'=> $id];
        $this->callActivity('insertBranch', $parameters);
        //insert to Database
        Branch::create($request->all());
        return 'saved successfuly';
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parameters = ['id' => $id];
        $this->callActivity('showBranch', $parameters);
        $branch =Branch::find($id);
        return $this->isFindBranch($branch);

    }
    public function isFindBranch($branch)
    {
        return ($branch) ?  $branch : "branch not found";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
//         render to Vue 'branches.edit'
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBranchRequest $request
     * @param \App\Models\Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchRequest $request, $id)
    {
        $paramters = ['request' => $request, 'id' => $id];
        $this->callActivity('update', $paramters);
        return $branch = Branch::find($id)->update($request->all());
        if ($branch)
            return 'updated successfully';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function delete($id) //  delete - can be restored
    {
        $paramters = ['id' => $id];
        $this->callActivity('delete', $paramters);
        return $this->isFindBranchToDelete($id);

//        if ($this->isNotMainBranch($id)) {
//            Branch::find($id)->delete();
//            return "Branch is deleted successfully";
//        }
//        return "Main Branch isn't deleted";
    }
    public function isFindBranchToDelete($id)
    {
        $branch =Branch::find($id);
        if ($branch )
            if($this->isNotMainBranch($id))
            {
                $branch->delete();
                return "Branch is deleted successfully";
            }
            else
                return "Main Branch isn't deleted";
        return "branch not found";
    }

    public function forceDelete($id) //can not be restored
    {
        $paramters = ['id' => $id];
        $this->callActivity('forceDeleteBranch', $paramters);
        if ($this->isNotMainBranch($id)) {
            Branch::find($id)->forceDelete();
            return "Branch is deleted successfully";
        }
        return "Main Branch isn't deleted";
    }

    public function restore($id) // from recycle bin
    {
        $paramters = ['id' => $id];
        $this->callActivity('restoreBranch', $paramters);
        Branch::withTrashed()->find($id)->restore();
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


    public function generateNextCodeOfPartialBranch($branch_id)
    {
        return $branch = Branch::where('branch_id', $branch_id)->last()->code + 1;
    }

    public function getMainBranch()
    {
        return $mainBranch =  DB::table('branches')
            ->whereNull('branch_id')
            ->get();

    }

    public function generateNextCodeOfMainBranch()
    {
        return $branch = $this->getMainBranch()->last()->code + 1;
    }

    public function callActivity($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'Branch',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function TreeOfMainPage()
    {
        return $result = Branch::with(['branches', 'users'])->whereNull('branch_id')->get();
    }
}
