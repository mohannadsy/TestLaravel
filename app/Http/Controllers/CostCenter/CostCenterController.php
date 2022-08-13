<?php

namespace App\Http\Controllers\CostCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCostCentersRequest;
use App\Http\Requests\StoreCostCentersRequest;
use App\Models\CostCenter;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\CostCenter\CostCenterTrait;


class CostCenterController extends Controller
{
    use  ActivityLog, CostCenterTrait;

    public function index() //getAllCostCenters
    {
        $parameters = ['id' => null];
        $costcenters = CostCenter::whereNull('center_id')->with('costCenters')->select('id', 'name', 'code', 'center_id')->get();// for tree
        $costcentersData = CostCenter::where('is_active', true)->select('id', 'name', 'code', 'center_id')->get(); // auto complete
        $this->callActivityMethod('getAllCostcenters', $parameters);
//        return $costcentersData;
        return inertia('...', compact('costcenters','costcentersData'));
    }

    public function store(StoreCostCentersRequest $request)
    {
        $id = CostCenter::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        //insert to Database
        $costCenter = CostCenter::create($request->all());
        $this->callActivityMethod('costCenter', $parameters);
        return __('common.store') ;
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $CostCenter = CostCenter::find($id);
        if ($CostCenter) {
            $this->callActivityMethod('show', $parameters);
            return $CostCenter;
        }
        return __('costCenter.costCenter show');
    }


    public function update(UpdateCostCentersRequest $request, $id)
    {
        $old_data=CostCenter::find($id)->toJson();
        $parameters = ['request' => $request, 'id' => $id,'old_data'=>$old_data];
        $costCenter = CostCenter::find($id);
        if ($this->isRootCostCenter($id))
        {
            $CostCenter = $costCenter->update($request->except('center_id'));
        }
        else
            $CostCenter=$costCenter->update($request->all());
        $this->callActivityMethod('update', $parameters);
        return __('common.update');
    }

    public function delete($id) //  delete - can be restored
    {
        $paramters = ['id' => $id];
        $CostCenter = CostCenter::find($id);
        if ($this->isRootCostCenter($id))
            return __('store.Root Store delete');
        if (!$this->numOfSubCostCenter($id) > 0) {
            $CostCenter->delete();
            $this->callActivityMethod('delete', $paramters);
            return __('common.delete');
        } else
            return __('costCenter.costCenter delete');
    }
}
