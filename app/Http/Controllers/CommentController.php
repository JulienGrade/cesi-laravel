<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Permet d'enregistrer un commentaire
     * @return RedirectResponse
     */
    public function new(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|max:400'
        ]);

        $product = Product::find($id);
        if(Auth::check()){
            $comment = new Comment();
            $comment->content = $request->input('content');
            $comment->product_id = $product->id;
            $comment->user_id = Auth::id();
            $comment->save();
            return redirect()->back();
        }
        return redirect('/connexion');
    }
}
