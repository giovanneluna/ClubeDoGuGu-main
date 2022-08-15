<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
            ],
            'email' => [
                'required',
                'email',
                'unique:clients,email'
            ],
            'cpf' => [
                'required',
                'unique:clients,cpf',
                'cpf'
            ],
            'telephone' => [
                'required',
                'min:9',
                'max:11',

            ],
            'age' => [
                'required',
                'between:15,100',
                'numeric',
            ],
            'address' => [
                'required',
                'min:5',
            ],

        ];
    }
    public function messages()

    {
        return [
            //ClientId
            'client_id.required' => 'teste',
            //Name
            'name.required' => 'É necessario informar o Nome do Cliente.',
            'name.min' => 'O numero minimo de letras do cliente é de 3.',

            //Email
            'email.required' => 'É necessario informar o Email do Cliente.',
            'email.unique' => 'Esse Email ja existe.',

            //CPF
            'cpf.required' => 'É necessario informar o CPF do Cliente',
            'cpf.unique' => 'Esse CPF ja existe.',
            'cpf.min' => 'CPF invalido.O campo CPF deve ter 11 caracteres',
            'cpf.numeric' => 'É necessario utilizar números no CPF.',

            //Telephone
            'telephone.required' => 'É necessario informar o Telefone do Cliente',
            'telephone.min' => 'O Minimo é de 9 Números.',
            'telephone.max' => 'O Maximo é de 11 Números.',
            'telephone.numeric' => 'Apenas números podem ser usados.',

            //Age
            'age.required' => 'É necessario informar a Idade do Cliente.',
            'age.numeric' => 'Letras não são permitidas na Idade.',
            'age.between' => 'O Usuario não possui idade para ser cadastrado(min:15).',

            //Address
            'address.required' => 'É necessario informar o Endereço do Cliente.',
            'address.min' => 'O minimo de caracteres para endereço é de 5.'

        ];
    }
}