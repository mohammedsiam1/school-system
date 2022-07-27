<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomsRrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
            switch ($this->method()){
                case 'POST':
                    return [
                        'List_Classes.*.Name' => 'required',
                        'List_Classes.*.Name_class_en' => 'required',
                    ];
                    break;
                case 'PATCH':
                case 'PUT':
                return [
                    'List_Classes.*.name' => 'required',
                    'List_Classes.*.Name_class_en' => 'required',
                ];
                break;
                default:
                    break;
            }

    }
}
