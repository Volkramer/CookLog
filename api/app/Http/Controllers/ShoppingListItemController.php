<?php

namespace App\Http\Controllers;

use App\ShoppingListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ShoppingListItem as ShoppingListItemResource;

class ShoppingListItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shoppingListItem = new ShoppingListItem();
        $shoppingListItem->product_id = $request->productId;
        $shoppingListItem->quantity = $request->quantity;
        $shoppingListItem->shopping_list_id = $request->shoppingList;
        $shoppingListItem->save();

        return new ShoppingListItemResource($shoppingListItem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ShoppingListItemResource(ShoppingListItem::FindOrFail($id));
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
        $shoppingListItem = ShoppingListItem::findOrFail($id);
        $shoppingListItem->product_id = $request->productId;
        $shoppingListItem->quantity = $request->quantity;
        $shoppingListItem->check = $request->check;
        $shoppingListItem->shopping_list_id = $request->shoppingList;
        $shoppingListItem->save();

        return new ShoppingListItemResource($shoppingListItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shoppingListItem = ShoppingListItem::findOrFail($id);
        $shoppingListItem->delete();

        return new ShoppingListItemResource($shoppingListItem);
    }
}
