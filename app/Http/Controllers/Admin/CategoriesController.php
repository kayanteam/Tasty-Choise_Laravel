<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTables;
use App\Http\Controllers\Controller;
use App\Models\Category as MainModel;
use App\Models\Company;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesDataTables $dataTable)
    {
        $data = MainModel::get();
        $compaines = Company::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }
        return $dataTable->render('admin.categories.index', compact('data' , 'compaines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new MainModel();
        $compaines = Company::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }
        return view('admin.categories.create', compact('data' , 'compaines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'name.*' => 'required|max:255',
            'description.*' => 'required|max:2000',
            'company_id' => 'required|exists:companies,id',
        ));


        //store in the database
        $data = MainModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'company_id' => $request->company_id,
        ]);
        //redirect to another page
        return response()->json(['status' => 'success', 'message' => 'تم الاضافة بنجاح']);
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
        $data = MainModel::findorfail($id);
        $compaines = Company::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }
        return view('admin.categories.edit', compact('data' , 'compaines'));
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
        //validation the data
        $this->validate($request, array(
            'name.*' => 'required|max:255',
            'description.*' => 'required|max:2000',
            'company_id' => 'required|exists:companies,id',

        ));

        //store in the database
        $data = MainModel::findorfail($id);
        $data->update($request->all());

        //redirect to another page
        return redirect()->route('categories.index')->with('success', 'تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MainModel::find($id);
        $data->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);
    }



    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = MainModel::find($id);
        return updateModelStatus($info);
    }
}
