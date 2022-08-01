<?php

namespace App\Http\Controllers\Currency;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Models\Currency;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Currency\CurrencyTrait;
use App\Traits\Image\ImageTrait;
use Inertia\Inertia;

class CurrencyController extends Controller
{
    use CurrencyTrait, ActivityLog, ImageTrait;

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

    public function store(UpdateCurrencyRequest $request)
    {
        $id = Currency::latest()->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $request->photo = $this->getImageURL($request);
        $currency = $currency = Currency::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('', compact('currency'));;
    }

    public function update(UpdateCurrencyRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $currency = Currency::find($id)->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $currency = Currency::find($id);
        if ($currency) {
            $this->callActivityMethod('show', $parameters);
            return $currency;
        }
        return 'Currency not Found';
    }


    public function delete($id)
    {
        $parameters = ['id' => $id];
        if ($this->isNotDefaultCurrency($id)) {
            $currency = Currency::find($id);
            return $currency ? $currency->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Currency not Found';
        }
        return "Default Currency Can not be Deleted";
    }
}
