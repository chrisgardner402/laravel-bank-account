<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountTransaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'account_id' => $this->account_id,
            'transaction_id' => $this->transaction_id,
            'deposit' => $this->deposit,
            'withdraw' => $this->withdraw,
        ];
    }
}
