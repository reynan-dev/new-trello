<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lists;
use App\Models\Card;
use App\Models\User;

class CardController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('cards.create');
    }

    public function store(Request $request)
    {
        /*$request->validate([
            'title' => 'required|min:3|max:255|alpha',
            'content' => 'required',
            'cover_image' => 'image'
        ]);*/

        $card = [
            'title' => $request->input('title'),
            'lists_id' => $request->input('lists_id'),
            'user_id' => $request->input('user_id'), 
        ];

        $new_card = Card::create($card);
        return redirect()->route('app.index');
      //  return redirect()->route('cards.show', $new_card->id);
    }

    public function show($id)
    {
        $card = Card::findOrFail($id);

        $lists = Lists::all();

        $users = User::all();

        $owner = User::findOrFail($card->user_id);


        return view('cards.show', compact('card', 'lists', 'users', 'owner'));
    }

    public function edit($id)
    {
        $card = Card::findOrFail($id);
        return view('cards.edit', compact('card'));    
    }

    public function update(Request $request, $id)
    {
       /* $request->validate([
            'title' => 'required|min:3|max:255|alpha',
            'content' => ,
            'cover_image' => 'image'
        ]); */

        $card = Card::findOrFail($id);

        $img = $request->file('cover_image');

        if ($img !== null){

            $destination_path = public_path('/image/card-' . $id.'/'); // upload path

            // merda que eu fiz pra funcionar em localhost
                $dest_array = explode('/', $destination_path);
                unset($dest_array[0], $dest_array[1], $dest_array[2], $dest_array[3], $dest_array[4], $dest_array[5], $dest_array[6]);

                $new_destination = implode('/', $dest_array);
            // fim da merda que eu fiz pra funcionar em localhost
                
            // Upload Orginal Image
            $cover_img = date('YmdHis') . "." . $img->getClientOriginalExtension();
            $img->move($destination_path, $cover_img);

            // Save In Database

            $card->cover_image = $new_destination . $cover_img;
            $card->title = $request->input('title');
            $card->content = $request->input('content');
            $card->user_id = $request->input('user_id');
            $card->lists_id = $request->input('lists_id');
            $card->last_change = new \DateTime();
            $card->save();

      return redirect()->route('cards.show', $card->id);
        }

        $card->title = $request->input('title');
        $card->content = $request->input('content');
        $card->cover_image = $request->input('cover_image');
        $card->user_id = $request->input('user_id');
        $card->lists_id = $request->input('lists_id');
        $card->last_change = new \DateTime();

        $card->save();

      return redirect()->route('cards.show', $card->id);
    }

    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        $card->delete();
        return redirect()->route('app.index');
    }

    public function removeIMG(Request $request, $id)
    {
        $card = Card::findOrFail($id);

        $card->cover_image = $request->file('cover_app');
        $card->save();

        return redirect()->route('cards.show', $card->id);
    }

}
