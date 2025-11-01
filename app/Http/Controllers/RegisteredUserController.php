<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class RegisteredUserController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function create(){
        dd('1');
        return view('auth.register');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $this->userRepo->create($request->all());

        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
