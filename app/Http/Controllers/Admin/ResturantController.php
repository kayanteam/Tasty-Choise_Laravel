<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProvidersDataTables;
use App\DataTables\ResturantDataTables;
use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResturantDataTables $dataTable)
    {
        return $dataTable->render('admin.Restaurants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Restaurant = new Restaurant();
        return view('admin.Restaurants.create', compact('Restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Restaurant::create($request->except('code'));
        return redirect()->route('Restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Restaurant = Restaurant::find($id);

        return view('admin.Restaurants.show', compact('Restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Restaurant = Restaurant::find($id);
        return view('admin.Restaurants.edit', compact('Restaurant'));
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
        $Restaurant = Restaurant::find($id);
        $Restaurant->update($request->except('image_remove'));
        return redirect()->route('Restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Restaurant = Restaurant::find($id);
        $Restaurant->delete();
        return response()->json(['status' => 'success', 'message' =>  __('dashboard.deleted_success')]);
    }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = Restaurant::find($id);
        return updateModelStatus($info);
    }
}
