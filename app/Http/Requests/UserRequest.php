<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

//Facades
use Config;
use Lang;
use Route;

class UserRequest extends Request
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
        $currentRoute = Route::currentRouteName();

        if ($currentRoute == 'signup') {

            $rules = [

                'name' => [
                    'required',
                    'max:' . Config::get('user.name_max_length'),
                ],

                'username' => [
                    'required',
                    'unique:users',
                    'regex:' . Config::get('user.username_regex'),
                    'min:' . Config::get('user.username_min_length'),
                    'max:' . Config::get('user.username_max_length'),
                ],

                'email' => [
                    'required',
                    'email',
                    'unique:users',
                    'max:' . Config::get('user.email_max_length'),
                ],

                'password' => [
                    'required',
                    'confirmed',
                    'min:' . Config::get('user.password_min_length'),
                    'max:' . Config::get('user.password_max_length'),
                ],

                'accept_disclaimer' => [
                    'required',
                    'in:accepted',
                ],

            ];

        }

        elseif ($currentRoute == 'login') {

            $rules = [

                'email' => [
                    'required',
                    'email',
                    'exists:users',
                ],

                'password' => [
                    'required',
                ],

                'remember_me' => [
                    'in:true',
                ],

            ];
        }

        elseif ($currentRoute == 'password_reset_request') {

            $rules = [

                'email' => [
                    'required',
                    'email',
                    'exists:users,email,deleted_at,NULL',
                ],

            ];
        }

        elseif ($currentRoute == 'password_reset') {

            $rules = [

                'password' => [
                    'required',
                    'confirmed',
                    'min:' . Config::get('user.password_min_length'),
                    'max:' . Config::get('user.password_max_length'),
                ],

            ];
        }

        return $rules;
    }

    /**
     * Set nice attributes names
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email'                 => Lang::get('auth.email_label'),
            'name'                  => Lang::get('auth.name_label'),
            'password'              => Lang::get('auth.password_label'),
            'username'              => Lang::get('auth.username_label'),
        ];
    }

    /**
     * Set custom messages
     *
     * @return array
     */
    public function messages()
    {
        return [
            'accept_disclaimer.required'    => Lang::get('auth.accept_disclaimer_error'),
            'accept_disclaimer.in'          => Lang::get('auth.accept_disclaimer_error'),
            'email.exists'                  => Lang::get('auth.email_error_exists'),
            'email.unique'                  => Lang::get('auth.email_error_unique'),
            'username.regex'                => Lang::get('auth.username_error_regex'),
            'username.unique'               => Lang::get('auth.username_error_unique'),
        ];
    }
}
