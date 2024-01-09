<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('layouts.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Testimonial::create($request->all());

        return redirect()->route('testimonial.index')->with('success', 'Data testimoni ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimoni = Testimonial::findOrFail($id);
        return view('layouts.testimonial.show', compact('testimoni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimoni = Testimonial::findOrFail($id);
        return view('layouts.testimonial.edit', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimoni = Testimonial::findOrFail($id);

        $testimoni->update($request->all());
        return redirect()->route('testimonial.index')->with('success', 'Data testimoni diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimoni = Testimonial::findOrFail($id);

        $testimoni->delete();
        return redirect()->route('testimonial.index')->with('success', 'Data testimoni dihapus');
    }
}
