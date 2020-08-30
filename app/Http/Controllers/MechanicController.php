<?php

namespace App\Http\Controllers;

use Validator;
use App\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mechanics = Mechanic::all();
        $mechanics = Mechanic::orderBy('name')->orderBy('surname', 'desc')->get();
        // $mechanics = Mechanic::all()->sortBy('surname');


        return view('mechanic.index', ['mechanics' => $mechanics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mechanic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
            'mechanic_name' => ['required', 'min:3', 'max:64'],
            'mechanic_surname' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $mechanic = new Mechanic;
        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->portret = '';

        if ($request->hasFile('mechanic_portret')) {
            $image = $request->file('mechanic_portret');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $mechanic->portret = $name;
        }

        $mechanic->save();
        return redirect()->route('mechanic.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(Mechanic $mechanic)
    {
        return view('mechanic.show', ['mechanic' => $mechanic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        return view('mechanic.edit', ['mechanic' => $mechanic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {

        $validator = Validator::make($request->all(),
        [
            'mechanic_name' => ['required', 'min:3', 'max:64'],
            'mechanic_surname' => ['required', 'min:3', 'max:64'],
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $mechanic->name = $request->mechanic_name;
        $mechanic->surname = $request->mechanic_surname;
        $mechanic->save();
        return redirect()->route('mechanic.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        if($mechanic->mechanicTrucks->count()){
            return redirect()->route('mechanic.index')->with('info_message', 'Trinti negalima, nes turi truck\'ų.');

        }
        $mechanic->delete();
        return redirect()->route('mechanic.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
