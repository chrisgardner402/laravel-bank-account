<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountTransaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'transaction_id' => $this->transaction_id,
            'deposit' => $this->deposit,
            'withdraw' => $this->withdraw,
        ];
    }
}
