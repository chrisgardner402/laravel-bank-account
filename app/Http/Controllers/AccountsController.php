<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use App\Http\Resources\AccountBalance as AccountBalanceResource;
use App\Http\Resources\AccountList as AccountListResource;
use App\Http\Resources\AccountTransaction as AccountTransactionResource;

class AccountsController extends Controller
{
    /**
     * Return a resource collection for a list of accounts.
     *
     * @param int $userid
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAccountList($userid)
    {
        $accounts = Account::where('user_id', '=', $userid)->orderBy('account_id')->get();

        return AccountListResource::collection($accounts);
    }

    /**
     * Return a resource for account balance.
     *
     * @param string $accountid
     * @return App\Http\Resources\AccountBalance
     */
    public function getAccountBalance($accountid)
    {
        $account = Account::where('account_id', '=', $accountid)->first();

        return new AccountBalanceResource($account);
    }

    /**
     * Return a resource collection for account transactions.
     *
     * @param string $accountid
     * @return
     */
    public function getAccountTransactions($accountid)
    {
        $transactions = Transaction::where('account_id', '=', $accountid)->orderBy('transaction_id')->get();

        return AccountTransactionResource::collection($transactions);
    }
}
