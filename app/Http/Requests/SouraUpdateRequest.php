<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SouraUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
//    protected function failedValidation(Validator $validator)
//    {
//        if($this->is('api/*'))
//        {
//            $response = ApiResponse::sendResponse(422,'validation errors' , $validator->errors());
//            throw new ValidationException($validator,$response);
//        }
//    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:3|max:500',
            'file' => ['nullable','mimes:mpga,wav,mp3,acc','max:3000'],
            'category_id' => 'required'
        ];
    }
}
