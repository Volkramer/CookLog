<?php

namespace App\Http\Controllers;

use App\StockListItem;
use Illuminate\Http\Request;
use App\Http\Resources\StockListItem as StockListItemResource;

class StockListItemController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stockListItem = new StockListItem();
        $stockListItem->product_id = $request->productId;
        $stockListItem->quantity = $request->quantity;
        $stockListItem->dlc_dluo_date = $request->dlc;
        $stockListItem->stock_list_id = $request->stockListId;
        $stockListItem->save();

        return new StockListItemResource($stockListItem);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new StockListItemResource(StockListItem::FindOrFail($id));
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
        $stockListItem = StockListItem::findOrFail($id);
        $stockListItem->product_id = $request->productId;
        $stockListItem->quantity = $request->quantity;
        $stockListItem->dlc_dluo_date = $request->dlc;
        $stockListItem->dlc_dluo_toggle = $request->dluoToggle;
        $stockListItem->stock_list_id = $request->stockListId;
        $stockListItem->save();

        return new StockListItemResource($stockListItem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockListItem = StockListItem::findOrFail($id);
        $stockListItem->delete();

        return new StockListItemResource($stockListItem);
    }
}
