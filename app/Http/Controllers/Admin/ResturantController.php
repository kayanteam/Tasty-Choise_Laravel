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
        return $dataTable->render('admin.resturant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resturant = new Restaurant();
        return view('admin.resturant.create', compact('resturant'));
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
        return redirect()->route('resturant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resturant = Restaurant::with('resturantSubscription')->find($id);

        return view('admin.resturant.show', compact('resturant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resturant = Restaurant::find($id);
        return view('admin.resturant.edit', compact('resturant'));
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
        $resturant = Restaurant::find($id);
        $resturant->update($request->except('image_remove'));
        return redirect()->route('resturant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resturant = Restaurant::find($id);
        $resturant->delete();
        return response()->json(['status' => 'success', 'message' =>  __('dashboard.deleted_success')]);
    }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = Restaurant::find($id);
        return updateModelStatus($info);
    }
}
