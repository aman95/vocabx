<?php

namespace App\Http\Controllers;

use App\Meaning;
use Illuminate\Http\Request;

use App\Http\Requests;

class MeaningController extends Controller
{

    protected $meaning;

    public function __construct(Meaning $meaning) {
        $this->meaning = $meaning;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meanings = $this->meaning->paginate(10);
        return view('admin.meaning.index', compact('meanings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meaning.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $filename = str_random(15).'.'.$image->getClientOriginalExtension();
        $path = public_path('uploads/meanings');
        $image->move($path,$filename);
        $imageURL =  url('/').'/uploads/meanings/'.$filename;
        $this->meaning->create(['word'=> $request->get('word'), 'meaning'=>$request->get('meaning'), 'image'=>$imageURL]);
        return redirect(route('admin.meanings.index'))->with('message', 'Meaning saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
