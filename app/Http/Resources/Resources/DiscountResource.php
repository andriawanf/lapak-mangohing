<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    public $status;
    public $message;
    public $data;

    public function __construct($status, $message, $data)
    {
        parent::__construct($data);
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function toArray(Request $request): array
    {
        $discountData = [
            'id' => $this->discount_id,
            'product_id' => $this->product_id,
            'discount_percentage' => $this->discount_percentage,
            'minimum_order' => $this->minimum_order,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => $discountData
        ];
    }
}
