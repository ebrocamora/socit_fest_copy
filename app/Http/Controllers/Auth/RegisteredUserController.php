<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required|string|max:255',
                'middle_name' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'bail|required|string|email|max:255|unique:users|ends_with:apc.edu.ph,student.apc.edu.ph,student.nu.edu.ph,student.national-u.edu.ph',
                'username' => 'required|unique:users,username|string|alpha_num|max:255|unique:users',
                'password' => [
                    'required',
                    'confirmed',
                    'different:username',
                    'different:email',
                    'min:8',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain at least one symbol
                    Rules\Password::defaults()
                ],
                'password_confirmation' => 'bail|required|same:password',
                'referrer' => 'nullable|exists:users,username',
            ],
            [
                'email.ends_with' => 'Email must be a valid APC or National University email address.',
                'password.regex' => 'Password must contain at least one lowercase letter, one uppercase letter, one digit, and one symbol.',
                'referrer.exists' => 'The referrer with that username does not exist.',
            ]
        );

        $user = $this->createUser($request);
        $this->handleReferral($request, $user);
        $user->save();

        $this->assignAccessControl($user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    private function createUser(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password)
        ]);

        return $user;
    }

    private function handleReferral(Request $request, User $user)
    {
        if (!$request->referrer) {
            return;
        }

        $referrer = User::where('username', $request->referrer)->first();
        $referralCount = User::where('referrer_id', $referrer->id)->count();

        if ($referralCount > 5) {
            return;
        }

        // Give points to both new registrant and referrer
        $user->referrer_id = $referrer->id;
        $user->total_points += 10;
        $referrer->total_points += 10;

        $referrer->save();
    }

    private function assignAccessControl(User $user)
    {
        $user->assignRole('guest');
        $user->givePermissionTo('rewards:redeem');
        $user->givePermissionTo('rewards:read');
        $user->givePermissionTo('account:create');
        $user->givePermissionTo('account:read');
        $user->givePermissionTo('account:update');
        $user->givePermissionTo('account:delete');
    }
}
