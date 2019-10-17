<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockListItem;
use App\StockList;
use App\Http\Resources\StockList as StockListResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StockListItem(Auth()->user()->stockLists()->get());
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
        $stockList = new StockList();
        $stockList->name = $request->name;
        $stockList->user_id = Auth()->user()->id;
        $stockList->save();

        return new StockListResource($stockList);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new StockListResource(StockList::FindOrFail($id));
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
        $stockList = StockList::findOrFail($id);
        $stockList->name = $request->name;
        $stockList->user_id = Auth::user()->id;
        $stockList->save();

        return new StockListResource($stockList);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stockList = StockList::findOrFail($id);
        $stockList->delete();

        return new StockListResource($stockList);
    }
}
