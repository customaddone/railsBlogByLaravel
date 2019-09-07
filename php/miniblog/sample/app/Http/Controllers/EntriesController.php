<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EntriesRequest;

class EntriesController extends Controller
{
    public function index()
    {
        return view('entries.index', ['entries' => Entry::selectEntries()]);
    }

    public function show($id)
    {
        $entry = Entry::find($id);
        return view('entries.show', [ 'entry' =>  $entry ]);
    }

    public function create()
    {
        $user_id = Auth::id();
        return view('entries.new', [ 'user_id' => $user_id ]);
    }

    public function store(EntriesRequest $request)
    {
        $entry = new Entry;
        $form = $request->all();
        unset($form['_token']);
        $entry->fill($form)->save();
        return redirect('/entries');
    }

    public function edit($id)
    {
        $entry = Entry::find($id);
        return view('entries.edit', [ 'entry' => $entry ] );
    }

    public function update(EntriesRequest $request)
    {
        if ( $request->user_id == Auth::id() )
        {
            $entry = Entry::find($request->id);
            $form = $request->all();
            unset($form['_token']);
            $entry->fill($form)->save();
        }

        return redirect('/entries');

    }

    public function destroy($id)
    {
        $entry = Entry::find($id)->delete();
        return redirect('/entries');
    }
}
