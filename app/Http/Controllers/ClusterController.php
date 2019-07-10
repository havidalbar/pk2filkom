<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClusterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Cluster::find($request->nama)) {
            return redirect()->route('panel.mahasiswa.biodata')->with('alert-error', 'Cluster sudah ada!');
        } else {
            $cluster = new Cluster;
            $cluster->nama = $request->nama;
            $cluster->save();

            return redirect()->route('panel.mahasiswa.biodata')->with('alert-success', 'Cluster berhasil ditambahkan');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $nama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nama)
    {
        $cluster = Cluster::find($nama);
        if ($cluster) {
            $existCluster = Cluster::find($request->nama);
            if ($existCluster) {
                if ($cluster->nama == $request->nama) {
                    return redirect()->route('panel.mahasiswa.biodata')->with('alert-error', 'Pilih nama lain!');
                } else {
                    return redirect()->route('panel.mahasiswa.biodata')->with('alert-error', 'Cluster sudah ada!');
                }
            } else {
                $cluster->nama = $request->nama;
                $cluster->save();

                return redirect()->route('panel.mahasiswa.biodata')->with('alert-success', 'Cluster berhasil diubah');
            }
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $nama
     * @return \Illuminate\Http\Response
     */
    public function destroy($nama)
    {
        $cluster = Cluster::find($nama);
        if ($cluster) {
            $cluster->delete();

            return redirect()->route('panel.mahasiswa.biodata')->with('alert-success', 'Cluster berhasil dihapus');
        } else {
            abort(404);
        }
    }
}
