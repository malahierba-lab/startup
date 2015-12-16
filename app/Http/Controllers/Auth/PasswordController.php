<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Malahierba\Token\Token;

//Facades
use App;
use Auth;
use Config;
use Lang;
use Mail;
use Redirect;
use Session;
use URL;
use View;

//Models
use App\Models\User;

class PasswordController extends Controller
{
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

        $this->middleware('verify.password_reset_token', ['only' => [
            'getReset',
            'postReset',
        ]]);

        $this->middleware(
            'request_attemps_limiter:email,'
            . Config::get('auth.password_reset_request.max_attemps')
            . ',' . Config::get('auth.password_reset_request.max_attemps_time_window'),
            ['only' => [
                'postResetRequest',
            ]
        ]);
    }

    /**
     * Display the Password Reset Request Form
     *
     * @return void
     */
    public function getResetRequest()
    {
        $title = Lang::get('auth.password_reset_request_browser_title');

        return View::make('auth.password_reset_request', compact('title'));
    }

    /**
     * Send the Password Reset link to User's Email
     *
     * @return void
     */
    public function postResetRequest(UserRequest $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        $token = new Token(
            $user,
            'password reset',
            Config::get('auth.password_reset_token.expire_in'),
            Config::get('auth.password_reset_token.length')
        );

        $token_str = $token->get();

        $data = [
            'title'          => Lang::get('auth.password_reset_request_email_title'),
            'link'           => URL::route('password_reset', [
                'user_email'            => urlencode($user->email),
                'password_reset_token'  => $token_str,
            ]),
        ];

        Mail::queue('auth.emails.password_reset_request', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name);
            $message->subject(Lang::get('auth.password_reset_request_email_subject'));
        });

        return Redirect::route('password_reset_request')->with('password_reset_email', $user->email);
    }

    /**
     * Display the Password Reset Form
     *
     * @return void
     */
    public function getReset($user_email, $password_reset_token)
    {

        $title = Lang::get('auth.password_reset_browser_title');

        return View::make('auth.password_reset', compact('title', 'user_email', 'password_reset_token'));
    }

    /**
     * Save the new Password (finish the password reset lifecicly)
     *
     * @return void
     */
    public function postReset($user_email, $password_reset_token, UserRequest $request)
    {
        $user = App::make('password_reset_user');

        $user->password = $request->input('password');
        $user->save();

        Auth::login($user);

        return Redirect::route('frontpage')->with('alert.success', Lang::get('auth.password_reset_success_alert'));
    }

    /**
     * Display the Password Reset Invalid Token Msg
     *
     * @return void
     */
    public function getInvalidToken()
    {
        if (! Session::get('password_reset_invalid_token'))
            return Redirect::route('frontpage');

        $title = Lang::get('auth.password_reset_invalid_token_browser_title');

        return View::make('auth.password_reset_invalid_token', compact('title'));
    }
}
