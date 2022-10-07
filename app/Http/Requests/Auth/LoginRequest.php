<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

//        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
//            RateLimiter::hit($this->throttleKey());
//
//            throw ValidationException::withMessages([
//                'email' => trans('auth.failed'),
//            ]);
//        }
//
//        RateLimiter::clear($this->throttleKey());


        $http = Http::asForm()->post(config('services.gatekeeper.routes.generate-token'), [
            'email' => $this->get('email', ''),
            'password' => $this->get('password', ''),
            'description' => 'Login website kategori 2'
        ]);

        if (!$http->ok()) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'email' => 'Data registrasi tidak ditemukan!',
            ]);
        }

        $user = User::whereEmail($http->json('data.user.email'))->first();

        if (!$user) {

            $userHttpData = $http->collect('data.user');

            $user = User::create([
                'name' => $userHttpData->get('name'),
                'email' => $userHttpData->get('email'),
                'school' => $userHttpData->get('school'),
                'region' => $userHttpData->get('region'),
                'is_admin' => $http->json('data.user.is_admin', false),
                'category' => $http->json('data.user.category'),
            ]);
        }

        Auth::login($user, $this->input('remember'));

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::transliterate(Str::lower($this->input('email')) . '|' . $this->ip());
    }
}
