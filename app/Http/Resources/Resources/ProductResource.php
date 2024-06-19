<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public $status;
    public $message;
    public $resource;

    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        $productData = [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_number' => $this->product_number,
            'product_category' => $this->product_category,
            'product_price' => $this->product_price,
            'product_stock' => $this->product_stock,
            'product_description' => $this->product_description,
            'product_tag' => $this->product_tag,
            'product_weight' => $this->product_weight,
            'product_length' => $this->product_length,
            'product_breadth' => $this->product_breadth,
            'product_width' => $this->product_width,
            'images' => ImageResource::collection($this->images), // Ensure ImageResource exists
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $productData,
        ];
    }
}
