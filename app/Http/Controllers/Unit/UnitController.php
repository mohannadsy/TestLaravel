<?php

namespace App\Http\Controllers\Unit;

use App\Models\Unit;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Unit\UnitTrait;

class UnitController extends Controller
{
    use ActivityLog, UnitTrait;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'units',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Unit::all();
    }

    public function store(UnitRequest $request)
    {
        $id = Unit::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $request->photo = $this->getImageURL($request);
        $unit = Unit::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('', compact('unit'));;
    }

    public function update(UnitRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $unit = Unit::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $unit = Unit::find($id);
        if ($unit) {
            $this->callActivityMethod('show', $parameters);
            return $unit;
        }
        return 'Unit not Found';
    }


    public function delete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotDefaultUnit($id)) {
            $unit = Unit::find($id);
            return $unit ? $unit->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Unit not Found';
        }
        return "Default Unit Can not be Deleted";
    }
}
