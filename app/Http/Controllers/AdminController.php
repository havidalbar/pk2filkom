<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenggunaRequest;
use App\Mahasiswa;
use App\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    private static $pilihanDivisi = [
        'BPI',
        'DDM',
        'HUMAS',
        'KESTARI',
        'KOMKES',
        'PENDAMPING',
        'PIT',
        'SQC',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggunas = Pengguna::all();
        return view('panel-admin.pengguna.index', ['penggunas' => $penggunas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel-admin.pengguna.create', ['pilihanDivisi' => static::$pilihanDivisi]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaRequest $request)
    {
        $data = new Pengguna();
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        $data->divisi = $request->divisi;
        $data->save();
        return redirect()->route('panel.pengguna.index')->with('alert-success', 'Berhasil mendaftar pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $dataPengguna = Pengguna::where('username', $username)->first();
        return view('panel-admin.pengguna.edit', [
            'dataPengguna' => $dataPengguna,
            'pilihanDivisi' => static::$pilihanDivisi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PenggunaRequest  $request
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function update(PenggunaRequest $request, $username)
    {
        $dataPengguna = Pengguna::where('username', $username)->first();
        $dataPengguna->username = $request->username;
        $dataPengguna->divisi = $request->divisi;
        $dataPengguna->save();

        if (Session::get('username') == $username) {
            Session::put('username', $request->username);
            Session::put('divisi', $request->divisi);
            Session::put('is_full_access', $dataPengguna->is_full_access);
        }
        return redirect()->route('panel.pengguna.index')->with('alert-success', 'Berhasil mengedit pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $dataPengguna = Pengguna::where('username', $username)->first();
        $dataPengguna->delete();
        if (Session::get('username') == $username) {
            logout();
        } else {
            return redirect()->back()->with('alert-success', 'Berhasil menghapus pengguna');
        }
    }

    public function getLogin()
    {
        return view('login-admin');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $data = Pengguna::find($username);
        if ($data) {
            if (Hash::check($password, $data->password)) {
                Session::put('username', $data->username);
                Session::put('divisi', $data->divisi);
                Session::put('is_full_access', $data->is_full_access);

                if ($request->redirectTo) {
                    return redirect($request->redirectTo);
                } else {
                    return redirect()->route('panel.dashboard');
                }
            } else {
                return redirect()->back()->with('alert-error', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('alert-error', 'Username tidak ditemukan');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('panel.login')->with('alert', 'Anda telah keluar');
    }

    public function getGantiPassword()
    {
        return view('panel-admin.pengguna.ganti-password');
    }

    public function gantiPassword(Request $request)
    {
        $pengguna = Pengguna::find(Session::get('username'));

        if (Hash::check($request->password_lama, $pengguna->password)) {
            $pengguna->password = Hash::make($request->password_baru);
            $pengguna->save();

            return redirect()->back()->with('alert-success', 'Password berhasil diubah');
        } else {
            return redirect()->back()->with('alert-error', 'Password salah');
        }
    }

    public function getDashboard()
    {
        return view('panel-admin.isiDashboard');
    }

    public function getPK2MabaTotal()
    {
        $mahasiswas = Mahasiswa::get(['nim', 'nama']);
        return view('panel-admin.pk2maba.total', compact('mahasiswas'));
    }
}
