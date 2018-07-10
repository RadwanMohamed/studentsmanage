<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\user;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {
    

        switch ($this->method()) {
            case 'POST': {
                return [    
            'file_number' => 'required|numeric|unique:users',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
           
            'nationality' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'gender' => 'required|boolean',
            'graduation_degree' => 'required|string|max:255',
            'personal_photo' =>'required|image|mimes:jpeg,bmp,png|max:2048',
            'passport_photo' =>'required|image|mimes:jpeg,bmp,png|max:2048',
            'graduation_photos'=>'required',
            'graduation_photos.*'=>'image|mimes:jpeg,bmp,png|max:2048'
        ];
                }

            case 'PUT':
            case 'PATCH': {
        return [          
            'file_number' => 'required|numeric|unique:users,file_number,'.$request['id'],
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'gender' => 'required|boolean',
            'graduation_degree' => 'required|string|max:255',
            
             ];
            }
            default:break;
        }
    }
}

/**
 *  
 */