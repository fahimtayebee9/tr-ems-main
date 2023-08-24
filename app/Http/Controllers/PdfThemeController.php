<?php

namespace App\Http\Controllers;

use App\Models\PdfTheme;
use App\Http\Requests\StorePdfThemeRequest;
use App\Http\Requests\UpdatePdfThemeRequest;

class PdfThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePdfThemeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePdfThemeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PdfTheme  $pdfTheme
     * @return \Illuminate\Http\Response
     */
    public function show(PdfTheme $pdfTheme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PdfTheme  $pdfTheme
     * @return \Illuminate\Http\Response
     */
    public function edit(PdfTheme $pdfTheme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePdfThemeRequest  $request
     * @param  \App\Models\PdfTheme  $pdfTheme
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePdfThemeRequest $request, PdfTheme $pdfTheme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PdfTheme  $pdfTheme
     * @return \Illuminate\Http\Response
     */
    public function destroy(PdfTheme $pdfTheme)
    {
        //
    }
}
