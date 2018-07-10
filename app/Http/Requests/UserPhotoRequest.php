<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UserPhotoRequest extends FormRequest
{


    public $rules=[
    ];

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
    public function rules(Request $request)
    { 

          return [
                    'img'=>'required|image|mimes:jpeg,bmp,png|max:2048'
                ];
        
    }
}
