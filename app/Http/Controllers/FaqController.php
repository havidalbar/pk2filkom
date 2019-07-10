<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('panel-admin.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel-admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $faq = new Faq;
        $faq->tanya = $request->tanya;
        $faq->jawab = $request->jawab;
        $faq->save();

        return redirect()->route('panel.faq.index')->with('alert-success', 'FAQ berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO : Halaman FAQ [Fadhil]
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        return view('panel-admin.faq.edit', compact('faq', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FaqRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::find($id);

        if ($faq) {
            $faq->tanya = $request->tanya;
            $faq->jawab = $request->jawab;
            $faq->save();

            return redirect()->route('panel.faq.index')->with('alert-success', 'FAQ berhasil diubah');
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);

        if ($faq) {
            $faq->delete();

            return redirect()->route('panel.artikel.index')->with('alert-success', 'Artikel berhasil dihapus');
        } else {
            abort(404);
        }
    }
}
