<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BoatTypeDataTables;
use App\DataTables\CategoryDataTables;
use App\DataTables\ProductTypeDataTables;
use App\Http\Controllers\Controller;
use App\Models\Boat_type;
use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductTypeDataTables $dataTable)
    {
        return $dataTable->render('admin.productType.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productType = new ProductType();

        return view('admin.productType.create', compact('productType'));
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
        ProductType::create($data);
        return redirect()->route('productType.index');
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
        $productType = ProductType::find($id);
        return view('admin.productType.edit', compact('productType'));
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
        $productType = ProductType::find($id);
        $data = $request->except('image_remove');
        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }

        $productType->update($data);
        return redirect()->route('productType.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productType = ProductType::find($id);
        $productType->delete();
        return response()->json(['status' => 'success', 'message' =>  __('dashboard.deleted_success')]);
    }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = ProductType::find($id);
        return updateModelStatus($info);
    }
}
