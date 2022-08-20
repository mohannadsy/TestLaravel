<?php

namespace App\Http\Controllers\Unit;

use App\Http\Requests\UpdateUnitRequest;
use App\Models\Store;
use App\Models\Unit;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUnitRequest;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Unit\UnitTrait;
use Inertia\Inertia;

class UnitController extends Controller
{
    use ActivityLog, UnitTrait;


    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Unit::all();
    }

    public function store(StoreUnitRequest $request)
    {
        $id = Unit::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $request->photo = $this->getImageURL($request);
        $unit = Unit::create($request->all());
        $this->callActivityMethod('store', $parameters);
//        return Inertia::render('', compact('unit'));
        return __('common.store');
    }

    public function update(UpdateUnitRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $unit = Unit::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
        return __('common.store');
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $unit = Unit::find($id);
        if ($unit) {
            $this->callActivityMethod('show', $parameters);
            return $unit;
        }
        return __('units.unit not found');
    }


    public function delete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotDefaultUnit($id)) {
            $unit = Unit::find($id);
            return $unit ? $unit->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Unit not Found';
        }
        return __('units.default unit can not be deleted');

    }
}
