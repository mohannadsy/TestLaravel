<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Traits\ActivityLog\ActivityLog;
use Inertia\Inertia;

class AccountController extends Controller
{
    use ActivityLog;

    public function callActivityMethod($method, $parameters)
    {
        $this->makeActivity([
            'table' => 'accounts',
            'operation' => $method,
            'parameters' => $parameters
        ]);
    }

    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Account::all();
    }

    public function store(AccountRequest $request)
    {
        $id = Account::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        $account = Account::create($request->all());
        $this->callActivityMethod('store', $parameters);
        return Inertia::render('', compact('account'));;
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $account = Account::find($id);
        if ($account) {
            $this->callActivityMethod('show', $parameters);
            return $account;
        }
        return 'Account not Found';
    }

    public function update(AccountRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $account = Account::find($id)->get();
        $account->update($request->all());
        $this->callActivityMethod('update', $parameters);
    }

    public function destroy($id)
    {
        $parameters = ['id' => $id];
        $account = Account::find($id);
        return $account ? $account->delete() && $this->callActivityMethod('delete  ', $parameters) : 'Account not Found';
    }
}
