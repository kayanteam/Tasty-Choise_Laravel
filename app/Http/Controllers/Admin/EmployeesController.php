<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmployeeDataTables;
use App\DataTables\SalonDataTables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Employee as MainModel;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Http\Request;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTables $dataTable)
    {
        $data = MainModel::get();
        $companies = Company::get();
        if(auth()->user()->company_id != null)
        {
            $companies = Company::where('id' , auth()->user()->company_id)->get();
        }
        return $dataTable->render('admin.employees.index' , compact('data' , 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new MainModel();
        $categories = Category::select('id' , 'name')->get();
        $companies = Company::get();
        if(auth()->user()->company_id != null)
        {
            $companies = Company::where('id' , auth()->user()->company_id)->get();
        }
        return view('admin.employees.create', compact('data' , 'categories' , 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'emp_no' => 'required|unique:employees',
                'image'=> 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
                'category_id' => 'required|numeric|exists:categories,id',
                'phone' => 'required|unique:employees',
                'address' => 'nullable|string|max:255',
                'email' => 'nullable|unique:employees',
                // 'password' => 'required|min:6|confirmed',
            ],
            [
                'name.required' => 'يجب ادخال اسم الموظف',
                'image.image' => 'يجب ان يكون الملف صورة',
                'image.mimes' => 'يجب ان يكون الملف من نوع jpg,jpeg,png,gif',
                'image.max' => 'يجب ان لا يزيد حجم الملف عن 2048 كيلو بايت',
                'phone.required' => 'يجب ادخال رقم الهاتف',
                'phone.unique' => 'رقم الهاتف موجود مسبقا',
                'team_size.numeric' => 'يجب ان يكون عدد الفريق ارقام',
                'emp_no.required' => 'يجب ادخال رقم الموظف',
                'emp_no.unique' => 'رقم الموظف موجود مسبقا',
                'category_id.required' => 'يجب اختيار القسم',
                'category_id.numeric' => 'يجب ان يكون القسم ارقام',
                'category_id.exists' => 'القسم غير موجود',
            
            ]
        );
        
        $data  = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }

        MainModel::create([
            'name' => $data['name'],
            'image' => $request->hasFile('image') ? $data['image'] : null,
            'emp_no' => $data['emp_no'],
            'category_id' => $data['category_id'],
            'phone' => $data['phone'],
            'id_number' => $data['id_number'],
            'password' => bcrypt('123456'),
            'role' => $data['role'],
            'email'=> $data['email'] ,
        ]);

        return redirect()->route('employees.index')->with('success', 'تم اضافة موظف بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MainModel::findOrFail($id);
      
        return view('admin.employees.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data = MainModel::findOrFail($id);
        $categories = Category::select('id' , 'name')->get();
        $companies = Company::get();
        return view('admin.employees.edit', compact('data' , 'categories' , 'companies'));
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
        $request->validate(
            [
                'name' => 'required',
                'emp_no' => 'required|unique:employees,emp_no,'.$id,
                'image'=> 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
                'category_id' => 'required|numeric|exists:categories,id',
                'phone' => 'required|unique:employees,phone,'.$id,
                'address' => 'nullable|string|max:255',
            ],
            [
                'name.required' => 'يجب ادخال اسم الموظف',
                'image.image' => 'يجب ان يكون الملف صورة',
                'image.mimes' => 'يجب ان يكون الملف من نوع jpg,jpeg,png,gif',
                'image.max' => 'يجب ان لا يزيد حجم الملف عن 2048 كيلو بايت',
                'phone.required' => 'يجب ادخال رقم الهاتف',
                'phone.unique' => 'رقم الهاتف موجود مسبقا',
                'team_size.numeric' => 'يجب ان يكون عدد الفريق ارقام',
            ]
        );

        $data  = $request->all();
     
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }
        $user = MainModel::findOrFail($id);
        $user->update([
            'name' => $data['name'],
            'image' => $request->hasFile('image') ? $data['image'] : $user->image,
            'emp_no' => $data['emp_no'],
            'category_id' => $data['category_id'],
            'phone' => $data['phone'],
            'id_number' =>$data['id_number'],
            'role' => $data['role'],
            'email'=> $data['email'] ,
        ]);
      
        return redirect()->route('employees.index')->with('success', 'تم تعديل بيانات الموظف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = MainModel::findOrFail($id);
        $user->delete();
        return response()->json(['status' => 'success', 'message' => 'تم الحذف بنجاح']);
    }


    public function ChangePasswordView($id)
    {
        $user = User::findOrFail(decrypt($id));
        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {

        //validate data 
        $data  = $request->validate([
            'password' => 'required|confirmed',
        ], [
            'password.required' => 'كلمة المرور مطلوبة',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
        ]);
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect()->back()->with('success', 'تم تعديل   كلمة المرور بنجاح');
    }


    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = User::find($id);
        return updateModelStatus($info);
    }
}
