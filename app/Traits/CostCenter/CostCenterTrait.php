<?php

namespace App\Traits\CostCenter;

use App\Models\CostCenter;

trait  CostCenterTrait {

    public  function numOfSubCostCenters($id)
    {
        $SubCostCenters=CostCenter::where('center_id',$id)->get();
        return count($SubCostCenters);
    }
}
