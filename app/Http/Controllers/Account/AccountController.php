<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\StoreAccountRequest;
use App\Models\Account;
use App\Traits\Account\AccountTrait;
use App\Traits\ActivityLog\ActivityLog;
use Inertia\Inertia;

class AccountController extends Controller
{
    use ActivityLog, AccountTrait;



    public function index()
    {
        $parameters = ['id' => null];
        $this->callActivityMethod('index', $parameters);
        return Account::all();
    }

    public function store(StoreAccountRequest $request)
    {
        $id = Account::orderBy('id', 'desc')->first()->id + 1;
        $parameters = ['request' => $request, 'id' => $id];
        Account::create($request->all());
        $this->callActivityMethod('store', $parameters);
//        return Inertia::render('', compact('account'));;
        return __('common.store');
    }

    public function show($id)
    {
        $parameters = ['id' => $id];
        $account = Account::find($id);
        if ($account) {
            $this->callActivityMethod('show', $parameters);
            return $account;
        }
        return __('account.account not found');
    }

    public function update(UpdateAccountRequest $request, $id)
    {
        $parameters = ['request' => $request, 'id' => $id];
        $account = Account::find($id)->get();
        $account->update($request->all());
        $this->callActivityMethod('update', $parameters);
        return __('common.update');
    }

    public function delete($id)
    {
        $parameters = ['id' => $id];
        $account = Account::find($id);
//        return $account ? $account->delete() && $this->callActivityMethod('delete  ', $parameters) : __('account.account delete error');
        $account->delete();
        $this->callActivityMethod('delete ', $parameters);
        return __('common.delete');
    }


}
