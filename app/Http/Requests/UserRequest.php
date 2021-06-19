<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    "name" => "required",
                    "email" => ["required", 'email:rfc,dns', 'unique:users,email'],
                    "password" => ["required",
                        'min:10',             // must be at least 10 characters in length
                        'regex:/[a-z]/',      // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[0-9]/',      // must contain at least one digit
                        'regex:/[@$!%*#?_&]/' // must contain a special character],
                    ],
                    "password_confirmation" => [
                        "required",
                        "same:password"
                    ]
                ];
            }
            case 'PUT':
            {
                return [
                    "name" => "required",
                    "email" => ["required", 'email:rfc,dns', 'unique:users,email,' . $this->route('user')->id],
                    "password" => ["nullable",
                        'min:10',             // must be at least 10 characters in length
                        'regex:/[a-z]/',      // must contain at least one lowercase letter
                        'regex:/[A-Z]/',      // must contain at least one uppercase letter
                        'regex:/[0-9]/',      // must contain at least one digit
                        'regex:/[@$!%*#?_&]/' // must contain a special character],
                    ],
                    "password_confirmation" => [
                        "nullable",
                        "same:password"
                    ]
                ];
            }
            default:
            {
                return [];
            }

        }

    }

}
