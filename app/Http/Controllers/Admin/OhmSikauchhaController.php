<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OhmSikauchha;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use Illuminate\Http\Request;

class OhmSikauchhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sikauchha = OhmSikauchha::oldest('name')->paginate(20);
        return view('admin.sikauchha.index', compact('sikauchha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sikauchha.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $sikauchha =  OhmSikauchha::create($input);
        $sikauchha->update(['slug' => $slug]);

        return redirect()->route('sikauchha.edit', $sikauchha->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OhmSikauchha $sikauchha)
    {
        return view('admin.sikauchha.edit', compact(['sikauchha']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, OhmSikauchha $sikauchha)
    {
        $input = $request->all();
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $sikauchha->update($input);

        return redirect()->route('sikauchha.edit', $sikauchha->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OhmSikauchha $sikauchha)
    {
        $sikauchha->delete();
        return redirect()->route('sikauchha.index')->with('message', 'Delete Successfully');
    }
}
