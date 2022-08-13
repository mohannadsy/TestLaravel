<?php

namespace App\Traits\CostCenter;

use App\Models\CostCenter;

trait  CostCenterTrait {


    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'cost_centers',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }


    public function numOfSubCostCenters($id)
    {
        $SubCostCenters = CostCenter::where('center_id', $id)->get();
        return count($SubCostCenters);
    }

    public function isRootCostCenters($id)
    {
        return $id == 1;
    }

    public function isNotRootCostCenters($id)
    {
        return !$this->isRootCostCenters($id);
    }


}
