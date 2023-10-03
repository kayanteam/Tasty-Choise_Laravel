<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTables;
use App\DataTables\QuastionsDataTables;
use App\Http\Controllers\Controller;
use App\Models\Quastion as MainModel;
use App\Models\Category;
use App\Models\Company;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class QuastionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuastionsDataTables $dataTable)
    {
        $data = MainModel::get();
        $compaines = Company::get();
        $categories = Category::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }
        return $dataTable->render('admin.quastions.index', compact('data', 'compaines', 'categories'));
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
        return view('admin.quastions.create', compact('data', 'compaines'));
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
            'quastion.*' => 'required|max:255',
            // 'description.*' => 'required|max:2000',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
        ));


        //store in the database
        $data = MainModel::create([
            'quastion' => $request->quastion,
            'company_id' => $request->company_id,
            'category_id' => $request->category_id,
            'points' => $request->points,
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
        $categories = Category::get();

        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }
        return view('admin.quastions.edit', compact('data', 'compaines', 'categories'));
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
            'quastion.*' => 'required|max:255',
            // 'description.*' => 'required|max:2000',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
        ));

        //store in the database
        $data = MainModel::findorfail($id);
        $data->update($request->all());

        //redirect to another page
        return redirect()->route('quastions.index')->with('success', 'تم تعديل القسم بنجاح');
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
        return Controller::updateModelStatus($info);
    }
}
