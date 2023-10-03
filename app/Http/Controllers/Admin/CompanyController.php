<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CompanyDataTables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company as MainModel;
use App\Models\Employee;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyDataTables $dataTable)
    {
        $data = MainModel::get();
       
        return $dataTable->render('admin.company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new MainModel();
        return view('admin.company.create', compact('data'));
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
            'description.*' => 'nullable|max:2000',
            // 'status' => 'required',
        ));


        //store in the database
        $data = MainModel::create([
            'name' => $request->name,
            'description' => $request->description ?? '--',
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
        return view('admin.company.edit', compact('data'));
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
            'description.*' => 'nullable|max:2000',
            'status' => 'required',
        ));


        //store in the database
        $data = MainModel::findorfail($id);
        $data->update($request->all());

        //redirect to another page
        return redirect()->route('company.index')->with('success', 'تم تعديل القسم بنجاح');
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
        if ($data->Category->count() > 0) {
            return response()->json(['status' => 'error', 'message' => 'لا يمكن حذف هذا القسم لانه مرتبط باقسام وموظفين']);
        }
        $data->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);
    }



    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = MainModel::find($id);
        return Controller::updateModelStatus($info);
    }


    public function getEmployees($company_id)
    {
        $data = MainModel::find($company_id);
        $employees = $data->Employees()->get();
        return response()->json(['status' => 'success', 'data' => $employees]);
    }


    //get Category
    public function getCategories($company_id)
    {
        $data = Category::where('company_id', $company_id)->get();

        $html = '';
        foreach ($data as $key => $value) {
            $html .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        // $categories = $data->Category()->get();
        return response()->json(['status' => 'success', 'html' => $html]);
    }

}
