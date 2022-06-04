<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use App\Http\Resources\AccountBalance as AccountBalanceResource;
use App\Http\Resources\AccountList as AccountListResource;
use App\Http\Resources\AccountTransaction as AccountTransactionResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AccountsController extends Controller
{
    /**
     * Return a resource collection for a list of accounts.
     *
     * @param int $userid
     * @return AnonymousResourceCollection
     */
    public function getAccountList(int $userid): AnonymousResourceCollection
    {
        $accounts = Account::where('user_id', '=', $userid)->orderBy('account_id')->get();

        return AccountListResource::collection($accounts);
    }

    /**
     * Return a resource for account balance.
     *
     * @param string $accountId
     * @return AccountBalanceResource
     */
    public function getAccountBalance(string $accountId): AccountBalanceResource
    {
        $account = Account::where('account_id', '=', $accountId)->first();

        return new AccountBalanceResource($account);
    }

    /**
     * Return a resource collection for account transactions.
     *
     * @param string $accountId
     * @return AnonymousResourceCollection
     */
    public function getAccountTransactions(string $accountId): AnonymousResourceCollection
    {
        $transactions = Transaction::where('account_id', '=', $accountId)->orderBy('transaction_id')->get();

        return AccountTransactionResource::collection($transactions);
    }
}
