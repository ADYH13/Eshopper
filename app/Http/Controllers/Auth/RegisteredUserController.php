<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string','min:10', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $random = Str::random(40);

       /* $user = User::create([
            'slug' => $random,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);*/

        $user = new User;
        $user->slug = $random;
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->numero = $request->numero;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
