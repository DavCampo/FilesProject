<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return response()->json(['message' => 'Login successful',
            'redirect' => route('dashboard')], 201);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    public function loginIndex()
    {
        return view('login');
    }
    public function registerIndex()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        try{
            $validated = $request->validated();
            $user = User::create([
                'username' => $validated['name'],
                'company' => $validated['company'] ?? null,
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Registration failed: ' . $e->getMessage()], 500);
        }
        Auth::login($user);

        return response()->json([
            'message' => 'Registration successful',
            'redirect' => route('dashboard'),
        ], 201);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
