<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreRepresentationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'show_id' => ['required', 'exists:shows,id'],
            'location_id' => ['required', 'exists:locations,id'],
            'schedule_time' => ['required', 'date_format:H:i'],
            'schedule_date' => ['required', 'date_format:Y-m-d'],
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function ($validator) {
            $schedule_date = $this->input('schedule_date');
            $schedule_time = $this->input('schedule_time');
            $combinedDateTime = $schedule_date . ' ' . $schedule_time;

            $date = DateTime::createFromFormat('Y-m-d H:i', $combinedDateTime);
            if (!$date || $date->format('Y-m-d H:i') !== $combinedDateTime) {
                $validator->errors()->add('schedule', "La date et l'heure combinées ne sont pas valides.");
            }
        });
    }
}
