<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FomopeRequest extends FormRequest
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

        $vals = [
            'movto' => ['required', 'numeric'],
            'mov_descr' => ['required', 'max:80'],
            'rfc' => ['required', 'max:13'],
            'nombre' => ['required'],
            'clave_presupuestal' => ['required'],
            'cr' => ['required'],
            'estructura' => ['required']
         ];
        return $vals;
    }
}
