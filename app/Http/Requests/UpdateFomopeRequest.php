<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFomopeRequest extends FormRequest
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
            'movimiento' => ['required', 'numeric'],
            'elaboracion' => ['required'],
            'rfc' => ['required'],
            'nombre' => ['required'],
            'curp' => ['required'],
            'calle' =>'nullable',
            'numero_ext' => 'nullable',
            'numero_int' => 'nullable',
            'colonia' => 'nullable',
            'municipio' => 'nullable',
            'estado' => 'nullable',
            'codigo_postal' => 'nullable',
            'telefono' => 'nullable',
            'cuenta' => 'nullable',
            'genero' => ['required'],
            'civil' => ['required'],
            'hijos' => ['required'],
            'clave_presupuestal' => ['required'],
            'estructura' => ['required'],
            'cr' => ['required'],
            'horas' => ['required'],
            'vigencia_del' => ['required'],
            'vigencia_al' => ['nullable'],
            'empleado' => ['nullable'],
            'docto' => ['nullable'],
            'lote' => ['required'],
            'quincena' => ['required'],
            'anio' => ['required'],
            'justificacion' => ['nullable'],

         ];
        return $vals;
    }
}
