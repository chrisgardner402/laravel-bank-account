<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use App\Http\Resources\AccountBalance as AccountBalanceResource;
use App\Http\Resources\AccountList as AccountListResource;
use App\Http\Resources\AccountTransaction as AccountTransactionResource;
use Illuminate\Http\Request;
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
    public function getAccountList(Request $request, int $userid): AnonymousResourceCollection
    {
        Log::info('"GET /accounts/' . $userid . '"');
        Log::debug('headers=' . $request->headers);

        $accounts = $this->service->getAccountList($userid);

        return AccountListResource::collection($accounts);
    }

    /**
     * Return a resource for account balance.
     *
     * @param string $accountId
     * @return AccountBalanceResource
     */
    public function getAccountBalance(Request $request, string $accountId): AccountBalanceResource
    {
        Log::info('"GET /account/' . $accountId . '/balance"');
        Log::debug('headers=' . $request->headers);

        $account = $this->service->getAccountBalance($accountId);

        return new AccountBalanceResource($account);
    }

    /**
     * Return a resource collection for account transactions.
     *
     * @param string $accountId
     * @return AnonymousResourceCollection
     */
    public function getAccountTransactions(Request $request, string $accountId): AnonymousResourceCollection
    {
        Log::info('"GET /account/' . $accountId . '/transactions"');
        Log::debug('headers=' . $request->headers);

        $transactions = $this->service->getAccountTransactions($accountId);

        return AccountTransactionResource::collection($transactions);
    }
}
