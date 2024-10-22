<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $posts = Item::all();
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new resource.
    public function createProd(Request $request)
    {
        $incommingField = $request->validate([
            'prodName' => 'required',
            'prodCat' => 'required',
            'prodDes' => 'required',
            'prodQty' => 'required',
            'prodPrice' => 'required',

        ]);
        $incommingField['prodName'] = strip_tags($incommingField['prodName']);
        $incommingField['prodCat'] = strip_tags($incommingField['prodCat']);
        $incommingField['proDes'] = strip_tags($incommingField['prodDes']);
        $incommingField['ProdQty'] = strip_tags($incommingField['prodQty']);
        $incommingField['prodPrice'] = strip_tags($incommingField['prodPrice']);
        Item::create($incommingField);
        return redirect('/');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Item::create($request->all());

        return redirect()->route('posts.index')
                        ->with('success', 'Post created successfully.');
    }

    // Display the specified resource.
    public function show(Item $post)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form for editing the specified resource.
    public function edit(Item $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Item $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
                        ->with('success', 'Post updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Item $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('success', 'Post deleted successfully.');
    }
}
