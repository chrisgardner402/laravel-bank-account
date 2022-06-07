<?php

namespace App\Services;

use App\Account;
use App\Transaction;

class AccountService
{
    public function getAccountList(int $userid)
    {
        return Account::where('user_id', '=', $userid)->orderBy('account_id')->get();
    }

    public function getAccountBalance(string $accountId)
    {
        return Account::where('account_id', '=', $accountId)->first();
    }

    public function getAccountTransactions(string $accountId)
    {
        return Transaction::where('account_id', '=', $accountId)->orderBy('transaction_id')->get();
    }
}
