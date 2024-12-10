<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasienRequest;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthController extends Controller
{
    //
    function index()
    {
        return view('admin.auth.login');
    }

    function doLogin(Request $request)
    {
        // $data = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if (Auth::attempt($data)) {
        //     $request->session()->regenerate();
        //     Alert::success('Success', 'Selamat Datang Admin');
        //     return redirect('/admin/dashboard');
        // }

        // return back()->with('loginError', 'Email atau Password salah!!');

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            if ($user->role === 'pasien') {
                Alert::success('Success', 'Selamat Datang, Pasien ' . auth()->user()->name);
                return redirect()->intended('/');
            } elseif ($user->role === 'dokter') {
                Alert::success('Success', 'Selamat Datang, Dokter ' . auth()->user()->name);
                return redirect()->intended('/');
            }
            Alert::success('Success', 'Selamat Datang, Admin');
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Email atau Password salah!!');
    }

    function registration()
    {
        return view('admin.auth.registration');
    }

    public function postRegistration(PasienRequest $request)
    {
        $no_rm = Pasien::generateNoRM();
        $payload = $request->validated();
        $payload['no_rm'] = $no_rm;
        $data = Pasien::create($payload);

        $user = User::create([
            'name' => $payload['nama'],
            'email' => $payload['nama'],
            'password' => bcrypt($payload['alamat']),
            'id_pasien' => $data->id,
            'role' => 'pasien'
        ]);

        Auth::login($user);

        if ($user->role === 'pasien') {
            Alert::success('Success', 'Selamat Datang, Pasien ' . $user->name);
            return redirect()->intended('/');
        } elseif ($user->role === 'dokter') {
            Alert::success('Success', 'Selamat Datang, Dokter ' . $user->name);
            return redirect()->intended('/dashboard-dokter'); 
        } else {
            Alert::success('Success', 'Selamat Datang, Admin');
            return redirect()->intended('/admin/dashboard');
        }
    }
    
    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');
    }
}
