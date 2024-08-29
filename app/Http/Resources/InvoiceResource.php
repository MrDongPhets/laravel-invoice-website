<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return[
        'id' => $this->id,
        'status' => $this->status,
        'invoice' => $this->invoice,
        'customer' => $this->customer,
        'amount' => $this->amount,
        'due' => $this->due,
        'issued' => $this->issued,
       ];
    }
}
