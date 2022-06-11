<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use App\Http\Resources\AccountBalance as AccountBalanceResource;
use App\Http\Resources\AccountList as AccountListResource;
use App\Http\Resources\AccountTransaction as AccountTransactionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
     * @param Request $request
     * @param int $userid
     * @return JsonResponse
     */
    public function getAccountList(Request $request, int $userid): JsonResponse
    {
        $this->logRequest($request);

        $validator = Validator::make(['$userid' => $userid], [
            '$userid' => 'required|integer|digits:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error'
            ], 400);
        }

        $accounts = $this->service->getAccountList($userid);

        return response()->json(array(
            'data' => AccountListResource::collection($accounts)
        ));
    }

    /**
     * Return a resource for account balance.
     *
     * @param Request $request
     * @param string $accountId
     * @return JsonResponse
     */
    public function getAccountBalance(Request $request, string $accountId): JsonResponse
    {
        $this->logRequest($request);

        $validator = Validator::make(['$accountId' => $accountId], [
            '$accountId' => 'required|integer|digits:11'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error'
            ], 400);
        }

        $account = $this->service->getAccountBalance($accountId);

        return response()->json(array(
            'data' => new AccountBalanceResource($account)
        ));
    }

    /**
     * Return a resource collection for account transactions.
     *
     * @param Request $request
     * @param string $accountId
     * @return JsonResponse
     */
    public function getAccountTransactions(Request $request, string $accountId): JsonResponse
    {
        $this->logRequest($request);

        $validator = Validator::make(['$accountId' => $accountId], [
            '$accountId' => 'required|integer|digits:11'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error'
            ], 400);
        }

        $transactions = $this->service->getAccountTransactions($accountId);

        return response()->json(array(
            'data' => AccountTransactionResource::collection($transactions)
        ));
    }

    private function logRequest(Request $request): void
    {
        Log::info('"' . $request->method() . ' ' . $request->path() . '"');
        Log::debug('headers=' . $request->headers);
    }
}
