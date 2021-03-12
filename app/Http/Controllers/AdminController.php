<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        return view('admin.dashboard', compact('cards'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function check(Request $request)
    {
        // return $request->input();
        //Validation
        $request->validate([
            'login_email' => 'required|email',
            'password' => 'required',
        ]);

        $userInfo = Admin::where('email', '=', $request->login_email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'We do not recognize your email');
        } else {
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedAdmin', $userInfo->id);
                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if (session()->has('LoggedAdmin')) {
            session()->pull('LoggedAdmin');
            return redirect()->route('admin.login');
        }
    }
}