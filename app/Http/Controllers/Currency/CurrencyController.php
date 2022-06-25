<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Currency\CurrencyTrait;
use Inertia\Inertia;

class CurrencyController extends Controller
{
    use CurrencyTrait ,ActivityLog ;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'currencies',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Currency::all();
    }

    public function store(CurrencyRequest $request)
    {
        $id = Currency::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $input = $request->validated();
        Currency::create($input);
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('', compact('input'));;
    }

    public function update(CurrencyRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $input = $request->validated(); //   $input = $request->all();
        $currency = Currency::find($id)->update($input);
        $currency->update($input);
        $this->callActivityMethod('update', $parameters);
    }

    public function delete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotDefaultAccuracy($id)) {
            $currency = Currency::find($id);
            return $currency ? $currency->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Currency not Found';
        }
        return "Default Bounds Can not be Deleted";
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $currency = Currency::find($id);
        return $currency ? $currency && $this->callActivityMethod('show', $parameters) : 'Currency not Found';
    }
}
