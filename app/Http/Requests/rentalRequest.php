<?php

namespace vacantrentals\Http\Requests;

use vacantrentals\Http\Requests\Request;

class rentalRequest extends Request
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
        return ['title'=>'required|unique:rentals',
                'description'=>'required|min:6',
                'price'=>'required',
                'image'=>'required|image|mimes:jpg,jpeg,png,bmp,gif,svg'
                ];
    }
}
