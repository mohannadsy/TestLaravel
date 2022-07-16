<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Currency;
use App\Traits\ActivityLog\ActivityLog;
use App\Traits\Image\ImageTrait;
use App\Traits\User\AdminTrait;
use App\Traits\User\UserTrait;


class ClientController extends Controller
{
    use ImageTrait, ActivityLog;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'users',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Client::select('id', 'name', 'code')->get();
    }


    public function store(ClientRequest $request)
    {
        $id = Client::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $request->photo = $this->getImageURL($request);
        $client = Client::create($request->all());
        $this->callActivityMethod('store', $parameters);

//        return Inertia::render('', compact('client'));;
    }


    public function show($id)
    {
        $parameters = ['id' => $id];
        $client = Client::find($id);
        if ($client) {
            $this->callActivityMethod('show', $parameters);
            return $client;
        }
        return 'Client Not Found';
    }

    public function update(ClientRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $url = $this->getImageURL($request);
        $request->photo = $url;
        $client = Client::find($id)->update($request);
//        $client->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }


    public function delete($id)
    {
        $parameters = ['id' => $id];
        $client = Client::find($id);
        return $client ? $client->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Client not Found';

    }
}
