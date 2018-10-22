<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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
        /*if ($this->input('status') == 0) {
            return [
                'title' => [
                    'required',
                    'max:255',
                    Rule::unique('books')->ignore($this->book, 'id')
                ],
                'author' => 'required|max:255',
                'price' => 'nullable|numeric',
                'url' => 'nullable|url',
                'email1' => [
                    'required',
                    'email',
                    // Check If input email exists on users table => OK
                    Rule::exists('users')->where(function ($query) {
                        $query->where('email', $this->input('email'));
                    })
                ],
                'email2' => [
                    'required',
                    'email',
                    Rule::exists('users')->where(function ($query) {
                        $query->where('email', $this->input('email2'));
                    })
                ],
                'returned_at' => 'date:Y-m-d'
            ];
        }*/

        return [
            'title' => [
                'required',
                'max:255',
                Rule::unique('books')->ignore($this->book, 'id')
            ],
            'author' => 'required|max:255',
            'price' => 'nullable|numeric',

            'email' => [
                'required',
                'email',
                // Check If input email exists on users table => OK
                Rule::exists('users')->where(function ($query) {
                    $query->where('email', $this->input('email'));
                })
            ],
            'status' => [
                'required',
                Rule::in([0,1,2,3,4]),
            ],
        ];
    }
}
