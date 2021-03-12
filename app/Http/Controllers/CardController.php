<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('LoggedAdmin')) {
            $cards = Card::all();
            return view('admin.dashboard', compact('cards'));
        } else {
            return redirect()->route('admin.login');
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        // return $request->input();
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required|url',
            'url' => 'required|url',
            'description' => 'required|max:200',
        ]);
        // Insert data into database
        $card = new Card();
        $card->title = $request->title;
        $card->subtitle = $request->subtitle;
        $card->image = $request->image;
        $card->url = $request->url;
        $card->description = $request->description;

        $save = $card->save();

        if ($save) {
            return back()->with('success', 'Продуктот е успешно додаден');
        } else {
            return back()->with('fail', 'Се случи грешка, Ве молиме пробајте подоцна');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $card = Card::all();
        // return view('admin.edit', compact('card'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $card = Card::find($id);
        return view('admin.edit', compact('card'));
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
        // Validation
        // return $request->input();
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required|url',
            'url' => 'required|url',
            'description' => 'required|max:200',
        ]);
        $card = Card::find($id);
        $card->title = $request->get('title');
        $card->subtitle = $request->get('subtitle');
        $card->image = $request->get('image');
        $card->url = $request->get('url');
        $card->description = $request->get('description');
        $save = $card->save();

        if ($save) {
            return back()->with('success', 'Продуктот е успешно ажуриран');
        } else {
            return back()->with('fail', 'Се случи грешка, Ве молиме пробајте подоцна');
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
        Card::find($id)->delete();
        return redirect()->route('admin.dashboard')->with('deleted', 'Проектот е успешно избришан');
    }
}