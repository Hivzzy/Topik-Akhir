<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\UserModel;
use App\Models\ProdukModel;
use Illuminate\Support\Str;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Models\PelangganModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function userLogin()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function dashboard()
    {
        $pesanan = new PesananModel();
        $data = $pesanan->getPesanan(now());
        $info_pesanan = $pesanan->getInfoPesanan();

        return view('pages.DashboardView', [
            'title' => 'Dashboard',
            'active' => 'dashboard',
            'products' => ProdukModel::count(),
            'customers' => PelangganModel::count(),
            'orders' => $data->count(),
            'order_info' => $info_pesanan, 
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password yang anda masukkan salah. Silahkan coba lagi.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function forget()
    {
        return view('forget', [
            'title' => 'Forget Password',
        ]);
    }

    public function authenticateForget(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
        ]);

        
            $user = UserModel::where("username", $credentials['username'])->first();
            if (!empty($user)) {
            $data = Str::random(8);
            Mail::to($user->email)->send(new SendEmail($data));

            $user_new = new UserModel();
            $user_new->updateUserForget($user->username, $data);

            Alert::success('Success', 'User berhasil update');
            return redirect('/login')->with('success','<strong>BERHASIL</strong>, silahkan check email anda');
        }

        return back()->withErrors([
            'username' => 'Username yang anda masukkan belum terdaftar.',
        ])->onlyInput('username');
    }
}
