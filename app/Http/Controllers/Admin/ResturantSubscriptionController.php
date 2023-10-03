<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BoatTypeDataTables;
use App\DataTables\CategoryDataTables;
use App\DataTables\ResturantSubscriptionDataTables;
use App\DataTables\SubscriptionDataTables;
use App\Http\Controllers\Controller;
use App\Models\Boat_type;
use App\Models\Category;
use App\Models\RestauarntSubscription;
use App\Models\Subscription;
use Illuminate\Http\Request;

class ResturantSubscriptionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResturantSubscriptionDataTables $dataTable)
    {
        return $dataTable->render('admin.resturantSubscription.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resturantSubscription = new RestauarntSubscription();

        return view('admin.resturantSubscription.create', compact('resturantSubscription'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except('image_remove');

        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }
        RestauarntSubscription::create($data);
        return redirect()->route('resturantSubscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resturantSubscription = RestauarntSubscription::find($id);
        return view('admin.resturantSubscription.edit', compact('resturantSubscription'));
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
        $resturantSubscription = RestauarntSubscription::find($id);
        $data = $request->except('image_remove');
        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }

        $resturantSubscription->update($data);
        return redirect()->route('resturantSubscription.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resturantSubscription = RestauarntSubscription::find($id);
        $resturantSubscription->delete();
        return response()->json(['status' => 'success', 'message' =>  __('dashboard.deleted_success')]);
    }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = RestauarntSubscription::find($id);
        return Controller::updateModelStatus($info);
    }
}
