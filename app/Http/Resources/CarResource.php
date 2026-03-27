<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // Ідентифікатор автомобіля
            'id' => $this->NumberPlate,

            // Дані про марку та модель із пов'язаної таблиці
            'brand' => $this->details->Brand ?? 'Інформація відсутня',
            'model' => $this->details->ModelName ?? 'Інформація відсутня',

            // Технічні характеристики
            'year' => $this->Year,
            'status' => $this->Status,
            'condition' => $this->Conditionn,

            // Вартість оренди
            'price_per_day' => number_format($this->PricePerDay, 2) . ' грн',
        ];
    }
}