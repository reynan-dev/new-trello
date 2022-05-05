<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;


class ListController extends Controller
{

    public function index()
    {
        $cards = Card::with('list')->get();
        $lists = Lists::all();
        return view('lists.index', compact('lists', 'cards'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        /*  $request->validate([
            'title' => 'required|min:3|max:255',
        ]); */

        $list = [
            'title' => $request->input('title'),
            'user_id' => Auth::id(),
        ];

        $new_list = Lists::create($list);

        return redirect()->route('app.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $list = Lists::findOrFail($id);
        return view('lists.edit', compact('list'));
    }

    public function update(Request $request, $id)
    {
        /*   $request->validate([
            'title' => 'required|min:3|max:255|alpha',
        ]); */

        $list = Lists::findOrFail($id);

        $list->title = $request->input('title');
        $list->last_change = new \DateTime();

        $list->save();
        return redirect()->route('app.index');
    }

    public function destroy($id)
    {
        $list = Lists::findOrFail($id);

        $verify_cards = false;

        $cards = Card::all()->where('lists_id', $id);

        if (count($cards) === 0) {
            $verify_cards = true;
        }

        if ($verify_cards === true) {

            $list->delete();
            return redirect()->route('app.index');
        }

        return redirect()->route('app.index')   ;
    }
};