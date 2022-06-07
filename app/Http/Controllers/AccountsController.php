<?php

namespace App\Http\Controllers;

use App\Account;
use App\Services\AccountService;
use App\Services\AccountServiceInterface;
use App\Transaction;
use App\Http\Resources\AccountBalance as AccountBalanceResource;
use App\Http\Resources\AccountList as AccountListResource;
use App\Http\Resources\AccountTransaction as AccountTransactionResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class AccountsController extends Controller
{
    protected AccountService $service;

    public function __construct(AccountService $accountService)
    {
        $this->service = $accountService;
    }

    /**
     * Return a resource collection for a list of accounts.
     *
     * @param int $userid
     * @return AnonymousResourceCollection
     */
    public function getAccountList(int $userid): AnonymousResourceCollection
    {
        Log::info('"GET /accounts/' . $userid . '"');

        $accounts = $this->service->getAccountList($userid);

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
        Log::info('"GET /account/' . $accountId . '/balance"');

        $account = $this->service->getAccountBalance($accountId);

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
        Log::info('"GET /account/' . $accountId . '/transactions"');

        $transactions = $this->service->getAccountTransactions($accountId);

        return AccountTransactionResource::collection($transactions);
    }
}
