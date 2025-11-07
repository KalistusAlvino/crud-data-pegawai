<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Repositories\SwalRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;

class AuthController extends Controller
{
    protected $swalRepository;
    public function __construct(SwalRepository $swalRepository)
    {
        $this->swalRepository = $swalRepository;
    }

    public function postLogin(Request $request)
    {
        try {
            $validated = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            if (Auth::attempt($validated)) {
                $request->session()->regenerate();

                $this->swalRepository::fire('Login berhasil', 'success');

                return redirect()->route('pegawai.index');
            }
            $this->swalRepository::fire('Username atau password salah', 'error');
            return redirect()->back();
        } catch (\Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat login. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            $this->swalRepository::fire('Logout berhasil', 'success');
            return redirect()->route('landing');
        } catch (Exception $e) {
            $this->swalRepository::fire('Ada kesalahan saat logout. Silahkan coba lagi', 'error');
            return redirect()->back();
        }
    }
}
