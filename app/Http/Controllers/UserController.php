<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountList as AccountListResource;
use App\Services\AccountService;
use App\Services\LogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected LogService $logService;
    protected AccountService $accountService;

    public function __construct(LogService $logService, AccountService $accountService)
    {
        $this->logService = $logService;
        $this->accountService = $accountService;
    }

    /**
     * Return a resource collection for a list of accounts.
     *
     * @param Request $request
     * @param int $userid
     * @return JsonResponse
     */
    public function getAccounts(Request $request, int $userid): JsonResponse
    {
        $this->logService->logRequest($request);

        $validator = Validator::make(['$userid' => $userid], [
            '$userid' => 'required|integer|digits:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error'
            ], 400);
        }

        $accounts = $this->accountService->getAccountList($userid);

        return response()->json(array(
            'data' => AccountListResource::collection($accounts)
        ));
    }
}
