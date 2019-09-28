<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShoppingListCollection;
use App\Http\Resources\ShoppingList as ShoppingListResource;
use App\ShoppingList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ShoppingListCollection(Auth()->user()->shoppingLists()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //I am not doing validation here
        $shoppingList = new ShoppingList();
        $shoppingList->user_id = Auth()->user()->id;
        $shoppingList->save();

        return new ShoppingListResource($shoppingList);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ShoppingListResource(ShoppingList::FindOrFail($id));
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
        //I am doing validation here
        $shoppingList = ShoppingList::findOrFail($id);
        $shoppingList->name = $request->name;
        $shoppingList->user_id = Auth::user()->id;
        $shoppingList->save();

        return new ShoppingListResource($shoppingList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        $shoppingList->delete();

        return new ShoppingListResource($shoppingList);
    }
}
