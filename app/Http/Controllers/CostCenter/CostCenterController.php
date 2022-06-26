<?php

namespace App\Http\Controllers\CostCenter;

use App\Http\Requests\CostCentersRequest;
use App\Models\CostCenter;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\CostCenter\CostCenterTrait;

class CostCenterController extends Controller
{
    use  ActivityLog;
    use  CostCenterTrait;

    public function index() //getAllCostCenters
    {
        $parameters = ['id'=> null];
        $this->callActivityMethod('getAllCostCenters', $parameters);
        return    CostCenter::all();;
//        return Inertia::render('',compact());
    }
    public function store(CostCentersRequest $request)
    {
        $id=CostCenter::orderBy('id','desc')->first()->id+1;
        $parameters = ['request' => $request ,'id'=> $id];
        //insert to Database
        $storeCostCenter=CostCenter::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return $data='store is succesfully';
    }
    public function show($id)
    {
        $parameters = ['id' => $id];
        $CostCenter =CostCenter::find($id);
        return $CostCenter ? $CostCenter &&  $this->callActivityMethod('show', $parameters):"CostCenter not found" ;
    }
    public function update(CostCentersRequest $request, $id)
    {
        $paramters = ['request' => $request, 'id' => $id];
        return $CostCenter = CostCenter::find($id)->update($request->all());
        $this->callActivityMethod('update', $paramters);
        return 'updated successfully';
    }
    public function delete($id) //  delete - can be restored
    {
        $paramters = ['id' => $id];
        $CostCenter =CostCenter::find($id);
        if (!$this->numOfSubCostCenters($id)>0 )
        {
            $CostCenter->delete();
            $this->callActivityMethod('delete', $paramters);
            return "CostCenter is deleted successfully";
        }
        else
            return "it is not possible to delete a CostCenter that contains CostCenters within it";
    }

}
