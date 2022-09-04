<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Http\Requests\BranchRequest;
use App\Models\PermissionGroup;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Branch\BranchTrait;
use App\Traits\User\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

//use Illuminate\Validation\Validator;
use Spatie\Permission\Models\Permission;


class BranchController extends Controller
{
    use  ActivityLog;
    use  BranchTrait;


    public function index() //getAllBranches
    {
        $parameters = ['id' => null];


        $branches = Branch::where('is_active', true)->whereNot('id', 'branch_id')->select('id', 'name', 'code', 'branch_id')->get(); // auto complete


        $branchesWithUsers = Branch::whereNull('branch_id')->with('branches', 'users')->select('id', 'name', 'code', 'branch_id')->get();// for tree
        $groupPermissions = PermissionGroup::select('name', 'caption_' . Config::get('app.locale') . ' as caption', 'id')->with(['permissions'])->get();
        $this->callActivityMethod('getAllBranches', $parameters);

        // return $branches;
        return inertia('BranchAndUser/Index', compact('branches', 'branchesWithUsers', 'groupPermissions'));
    }

//    public function store(BranchRequest $request)
//    {
//        $id = Branch::orderBy('id', 'desc')->first()->id + 1;
//        $parameters = ['request' => $request, 'id' => $id];
//        //insert to Database
//        $storeBranch = Branch::create($request->all());
//        $this->callActivityMethod('store', $parameters);
//        return $data = 'store is successfully';
////        return redirect()->back()->with(['store is successfully']);
////         return Inertia::render('Branches/Index',compact($data));
//    }

//    public function store(Request $request)
//    {
//        $id = Branch::orderBy('id', 'desc')->first()->id + 1;
//        $parameters = ['request' => $request, 'id' => $id];
//
//        $request->validate([
//            'name' => 'required,unique',
//            'code' => 'required,unique',
//        ]);
//        $branch = Branch::create($request->all());
//
//
//        $this->callActivityMethod('store', $parameters);
//        $response = [
//            'Branch' => $branch,
//            'message' => '$token',
//        ];
////        return response($response);
//        return response()->json(['response' => $response], 200);;
//
////      return  response(['message' => 'Logout Done successfully ']);
//
//    }


    public function codeName($id)
    {
        $branch = Branch::find($id);
        $branchNameCode = $branch->branch['code'] . ' - ' . $branch->branch['name'];
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $branch = Branch::find($id);
        if ($branch) {
            $this->callActivityMethod('show', $parameters);
            return $branch;
//            return inertia('BranchAndUser/Index', compact('branch', 'branchNameCode'));
        }

        redirect()->route('branch.index')->with('message', __('branch.branch show'));
    }

    public function update(UpdateBranchRequest $request, $id)
    {
        $old_data = Branch::find($id)->toJson();
        $parameters = ['request' => $request, 'id' => $id, 'old_data' => $old_data];
        $branch = Branch::find($id);
        if ($this->isRootBranch($id)) {
            $Branch = $branch->update($request->except('branch_id'));
        } else
            $Branch = $branch->update($request->all());
        $this->callActivityMethod('update', $parameters);
        return redirect()->route('branch.index')->with('message', __('common.update'));
        // return __('common.update');
    }

    public function delete($id) //  delete - can be restored
    {

        $parameters = ['id' => $id];
        $branch = Branch::find($id);
        if ($this->isRootBranch($id))
//            return "Root Branch isn't deleted";
            return __('branch.root branch can be deleted');
        if (!$this->numOfSubBranches($id) > 0) {
            $branch->delete();
            $this->callActivityMethod('delete', $parameters);
//            return "Branch is deleted successfully";
            // return __('common.delete');
            return redirect()->route('branch.index')->with('message', __('common.delete'));
        } else
//            return "it is not possible to delete a branch that contains branches within it";

            return __('branch.branch delete error');
    }
//    public function store(Request $request)
//    {
//        $rules = $this -> getRules();
//        $messages= $this->getMessages();
//        $validator= Validator::make($request->all(),$rules,$messages);
//        if($validator->fails())
//        {
//            return redirect()->back()->withErrors($validator)->withInputs($request->all());
//        }
//         Branch::create([
//             'code'                   =>$request -> code ,
//              'name'                   =>$request -> name ,
//              'branch_id'              =>$request -> branch_id ,
//              'responsibility'          =>$request -> responsibility ,
//              'address'                =>$request -> address ,
//              'website'              =>$request -> website ,
//              'email'                  =>$request -> email ,
//              'phone'                 =>$request -> phone ,
//              'mobile'                =>$request -> mobile ,
//         ]);
//        $id = Branch::orderBy('id', 'desc')->first()->id + 1;
//        $parameters = ['request' => $request, 'id' => $id];
//        $data= 'successfully' ;
//        $this->callActivityMethod('store', $parameters);
//        return $data;
////             return Inertia::render('BranchAndUser/Index',compact('data'));
//    }
//    protected function getMessages()
//    {
//        return $messages =[
//            'code.required'          => 'رمز الفرع يجب أن يُدخل',
//            'code.unique'            => 'رمز الفرع موجود سابقاً ',
//            'code.string'            => 'رمز الفرع يجب أن يكون محارف ',
//            'name.required'          => 'اسم الفرع يجب أن يُدخل',
//            'name.max'               => 'اسم الفرع تجاوز 50 محرف ',
//            'name.unique'            => 'اسم الفرع موجود سابقاً ',
//            'name.string'            => 'اسم الفرع يجب أن يكون محارف ',
//            'branch_id.max'          => 'رمز الفرع الرئيسي تجاوز 50 رقم ',
//            'branch_id.numeric'      => 'رمز الفرع الرئيسي يجب أن يكون ارقام  ',
//            'responsibility.max'     => 'معلومات الفرع(الصفة) تجاوز 250 محرف ',
//            'responsibility.string'  => 'معلومات الفرع يجب أن يكون محارف ',
//            'address.max'            =>  'عنوان الفرع تجاوز 100 محرف ',
//            'address.string'         =>'عنوان الفرع يجب أن يكون محارف ',
//            'website.unique'         =>'الموقع الالكتروني مُدخل سابقاً لفرع آخر ',
//            'website.string'         =>'الموقع الالكتروني يجب أن يكون محارف  ',
//            'email.string'           =>' البريد الالكتروني  يجب أن يكون محارف ',
//            'email.email'            =>'ماتم إدخاله غير متوافق مع صيغة البريد الإلكتروني  ',
//            'email.unique'           =>'البريد الالكتروني مُدخل سابقاً لفرع آخر  ',
//            'phone.max'              => 'رقم الهاتف تجاوز 50 رقم ',
//            'phone.unique'           => 'رقم الهاتف مُدخل سابقاً لفرع آخر ',
//            'phone.string'           =>'رقم الهاتف يجب أن يكون محارف ',
//            'mobile.max'             => 'رقم الموبايل تجاوز 50 محرف ',
//            'mobile.unique'          => 'رقم الموبايل مُدخل سابقاً لفرع آخر ',
//            'mobile.string'          =>'رقم الموبايل يجب أن يكون محارف ',
//
//        ];
//    }

//    protected function getRules()
//    {
//        return $rules = [
//
//              'code'                   =>'required|string|unique:branches,code',
//              'name'                   =>'required|max:50|string|unique:branches,name' ,
//              'branch_id'              =>'max:50|numeric' ,
//              'responsibility'         =>'max:250|string',
//              'address'                =>'max:100|string',
//              'website'                =>'string|unique:branches,website',
//              'email'                  =>'string|email|unique:branches,email',
//              'phone'                  =>'max:50|string|unique:branches,phone',
//              'mobile'                 =>'max:50|string|unique:branches,mobile',
//        ];
//
//    }

    public function store(StoreBranchRequest $request)
    {
        $id = Branch::orderBy('id', 'desc')->first()->id + 1;
        Branch::create($request->all());
        $parameters = ['request' => $request, 'id' => $id];
        $this->callActivityMethod('store', $parameters);
//          return redirect()->route('branch.index')->with('message','Branch created successfully');

        return redirect()->route('branch.index')->with('message', __('common.store'));

        // return __('common.store');


    }

}
