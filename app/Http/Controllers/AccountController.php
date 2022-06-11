<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use App\Http\Resources\AccountBalance as AccountBalanceResource;
use App\Http\Resources\AccountTransaction as AccountTransactionResource;
use App\Services\LogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    protected LogService $logService;
    protected AccountService $service;

    public function __construct(LogService $logService, AccountService $accountService)
    {
        $this->logService = $logService;
        $this->service = $accountService;
    }

    /**
     * Return a resource for account balance.
     *
     * @param Request $request
     * @param string $accountId
     * @return JsonResponse
     */
    public function getBalances(Request $request, string $accountId): JsonResponse
    {
        $this->logService->logRequest($request);

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
    public function getTransactions(Request $request, string $accountId): JsonResponse
    {
        $this->logService->logRequest($request);

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
}
