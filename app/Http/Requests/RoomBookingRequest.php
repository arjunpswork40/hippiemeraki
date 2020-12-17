<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomBookingRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
//        dd($request);
        return [
            'totalAmount' => 'required|numeric',
//            'category' => 'required|numeric',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date',
            'guestCount' => 'required|numeric',
            'roomCount' => 'required|numeric',
            'username' => 'required|string',
            'contactNumber' => 'required',
//            'email' => 'required|email',
            'idProof' => 'file'
        ];

    }
    public function messages()
    {
        return [
            'contactNumber.reuired' => 'A nice title is required for the post.',
            'username.required' => 'Please add content for the post.',
        ];
    }
}
