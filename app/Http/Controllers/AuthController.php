<?php

namespace App\Http\Controllers;

use App\Jobs\ForgotUserEmailJob;
use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth("web")->attempt($data)) {
            return redirect(route("home"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    public function logout()
    {
        auth('web')->logout();

        return redirect(route('home'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showForgotForm()
    {
        return view('auth.forgot');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' =>['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if ($user) {
            auth('web')->login($user);
        }

        return redirect(route('home'));

    }

    public function forgot(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'exists:users,email'],
        ]);

        $user = User::where(['email' => $data['email']])->first();

        $password = uniqid(); //12345 make string
        $user->password = bcrypt($password);
        $user->save();

        \App\Events\ForgotPassword::dispatch($password, $user);
        //Mail::to($user)->send(new ForgotPassword($password));
        //dispatch(new ForgotUserEmailJob($user, $password));
        //$this->dispatch(new ForgotUserEmailJob($user, $password));
        //ForgotUserEmailJob::dispatch($user, $password);


        return redirect(route('home'));
    }
}
