<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdsDataTables;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdsDataTables $dataTable)
    {
        return $dataTable->render('admin.ads.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Ads = new Ads();
        return view('admin.ads.create', compact('Ads'));
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

        Ads::create($data);
        return redirect()->route('ads.index');

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
        $Ads = Ads::find($id);
        return view('admin.ads.edit' ,compact('Ads'));
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
        $Ads = Ads::find($id);
        $data = $request->except('image_remove');
         if ($request->image) {
             $image_path = $request->file('image')->store('uploads', 'public');
             $data['image'] = $image_path;
         }

         $Ads->update($data);
        return redirect()->route('ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Ads = Ads::find($id);
        $Ads->delete();
        return response()->json(['status' => 'success', 'message' =>  __('dashboard.deleted_success')]);
       }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = Ads::find($id);
        return updateModelStatus($info);
    }
}