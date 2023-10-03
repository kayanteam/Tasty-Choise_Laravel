<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdminsDataTables;
use App\DataTables\TransactionsDataTables;
use App\DataTables\UsersDataTables;
use App\DataTables\UserTransactionsDataTables;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Role as ModelsRole;
use App\Models\RoleUser;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminsDataTables $dataTable)
    {
       
        return $dataTable->render('admin.admins.index');
    }

    public function GetUsers()
    {
        $admins = Admin::select('id', 'name')->Active()->get();
        return response()->json($admins);
    }



    public function GetUsersSelect2(Request $request)
    {
        $admins = Admin::select('id', 'name')->Active()
            ->where('id', '!=', auth()->id())
            ->where('name', 'LIKE', '%' . $request->name . '%')
            ->get();
        return response()->json($admins);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = new Admin();
        $companies = Company::get();
        return view('admin.admins.create', compact('admin' , 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'email.unique' => __('dashboard.email_unique'),
                'email.email' => 'Invalid',
                'email.required' => __('dashboard.email_required'),
                'name.required' => __('dashboard.name_invalid'),
                'password_confirmation.same' => __('dashboard.password_must_confirm'),
            ]
        );
       

        $data = $request->except('password_confirmation', 'image_remove');
        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }

        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id'=> 2 ,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('admins.index')->with('success', __('dashboard.admin_added_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $companies = Company::get();
        return view('admin.admins.edit', compact('admin' , 'companies'));
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
        //validate data 

        $admin = Admin::findOrFail($id);

        $admin->update($request->except('image_remove'));

        return redirect()->route('admins.index')->with('success', __('dashboard.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json(['status' => 'success', 'message' => __('dashboard.deleted_success')]);
    }


    public function ChangePasswordView($id)
    {
        $admin = Admin::findOrFail(decrypt($id));
        return view('admin.admins.change-password', compact('admin'));
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
        $admin = Admin::findOrFail($id);
        $admin->update($data);
        return redirect()->back()->with('success', 'تم تعديل   كلمة المرور بنجاح');
    }


    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = Admin::find($id);
        return Controller::updateModelStatus($info);
    }
}
