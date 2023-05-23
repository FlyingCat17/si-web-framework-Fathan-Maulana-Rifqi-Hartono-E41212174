<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Week6Controller extends Controller
{
    // fungsi loginCreate dibawah ini untuk menampilkan halaman login
    // menggunakan method GET
    public function loginCreate()
    {
        return view('week6.auth.login');
        // return redirect()->route('week_6.auth.register-create');
    }

    // fungsi loginStore dibawah ini untuk mengirim data dari halaman login dan melakukan validasi
    // menggunkan method POST
    public function loginStore(Request $request)
    {
        $request->validate([
            'username' => 'required', // <== required : dibutuhkan
            'password' => 'required', // <== required : dibutuhkan
        ]);

        try {
            $credentials = $request->only('username', 'password');
            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();
                return $this->redirectWithSuccess('week_6.dashboard', 'Berhasil login');
            }

            return $this->redirectWithDanger('week_6.auth.login-create', 'Username atau password salah');
        } catch (\Throwable $th) {
            return $this->redirectWithDanger('week_6.auth.login-create', 'Username atau password salah');
        }
    }

    // fungsi registerCreate dibawah ini untuk menampilkan halaman register
    // menggunakan method GET
    public function registerCreate()
    {

        return view('week6.auth.register');
    }
    
    
    // fungsi registerCreate dibawah ini untuk megirim data dari halaman register dan melakukan validasi data yang selanjutnya akan dimasukkan ke dalam database
    // menggunakan method POST
    public function registerStore(Request $request)
    {
        
        // Validasi request POST dari halaman register
        $request->validate([
            'name' => 'required|max:255', // <== required : dibutuhkan, max: maksimal 255 karakter
            'email' => 'required|max:255|email|unique:users,email', // <== email : harus berupa email, unique:users,email : email harus unik di dalam tabel users
            'username' => 'required|max:255|unique:users,username', // <== unique:users,username : username harus unik di dalam tabel users
            'password' => 'required|max:255|min:8|confirmed', // <== confirmed : harus sama dengan field password_confirmation
        ],[
            // Bisa menggunakan custom message untuk validasi
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.max' => 'Email maksimal 255 karakter',
            'email.email' => 'Email harus berupa email',
            'email.unique' => 'Email sudah terdaftar',
            'username.required' => 'Username harus diisi',
            'username.max' => 'Username maksimal 255 karakter',
            'username.unique' => 'Username sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.max' => 'Password maksimal 255 karakter',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
        ]
    );
        // Jika kita ingin menampilkan kembali value data pada saat validasi error, kita bisa menggunakan fungsi old({nama_field})

        // Jika validasi berhasil, maka akan masuk ke dalam blok ini
        // Kita akan membuat data baru di dalam tabel users
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                // Kita akan mengenkripsi password menggunakan bcrypt atau Hash::make()
                'password' => Hash::make($request->password),
            ]);

            return $this->redirectWithSuccess('week_6.auth.login-create', 'Berhasil mendaftar, silahkan login');
        } catch (\Throwable $th) {
            return $this->redirectWithDanger('week_6.auth.register-create', 'Gagal mendaftar, silahkan coba lagi'.$th);
        }
    }
}
