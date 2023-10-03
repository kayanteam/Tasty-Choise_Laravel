<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmployeeDataTables;
use App\DataTables\GeneralQuastionnaireDataTables;
use App\DataTables\QuastionnaireDataTables;
use App\DataTables\SalonDataTables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Quastionnaire as MainModel;
use App\Models\Employee;
use App\Models\Partner;
use App\Models\Quastion;
use App\Models\Quastionnaire;
use App\Models\QuastionnaireFile;
use App\Models\QuastionnaireQuastion;
use App\Models\User;
use Illuminate\Http\Request;


class QuastionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuastionnaireDataTables $dataTable)
    {
        return $dataTable->render('admin.quastionnaire.index');
    }



    public function Genealindex(GeneralQuastionnaireDataTables $dataTable)
    {
        return $dataTable->render('admin.quastionnaire.general.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new MainModel();
        $employees = Employee::select('id' , 'name')->get();
        $companies = Company::get();
        if(auth()->user()->company_id != null)
        {
            $companies = Company::where('id' , auth()->user()->company_id)->get();
        }
        return view('admin.quastionnaire.create', compact('data' , 'employees' , 'companies'));
    }


    public function createGeneralQuastionnaire()
    {
        $data = Quastionnaire::with('AllQuastions')->where('type' , 'general')->first();
        $GeneralQuastionArray = QuastionnaireQuastion::where('quastionnaire_id' , $data->id)->pluck('quastion_id')->toArray();
        $AllQuastions  = Quastion::get();
        $employees = Employee::select('id' , 'name')->get();
        $companies = Company::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }


        // $data = Quastionnaire::where('type' , 'general')->first();
        // $employees = Employee::select('id' , 'name')->get();
        // $companies = Company::get();
        // if(auth()->user()->company_id != null)
        // {
        //     $companies = Company::where('id' , auth()->user()->company_id)->get();
        // }
        // return view('admin.quastionnaire.create2', compact('data' , 'employees' , 'companies'));
        return view('admin.quastionnaire.create2', compact('data' , 'employees' , 'companies' , 'AllQuastions' ,'GeneralQuastionArray'));

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
                'employee_id' => 'required',
                'quastion' => 'required|array',
                'quastion.*' => 'required|numeric|exists:quastions,id',
                'start_date' => 'required',
                'end_date' => 'required',
            ]
        );
    
        $quastionnaire = MainModel::create([
            'employee_id' => $request->employee_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'type' => 'specific' ,
        ]);

        foreach($request->quastion as $key => $quastion){
            QuastionnaireQuastion::create([
                'quastionnaire_id' => $quastionnaire->id,
                'quastion_id' => $quastion,
                'point' => $request->points[$key],
            ]);
        }
        return redirect()->route('quastionnaires.index')->with('success', 'تم اضافة بيانات الاستبيان بنجاح');

    }



    public function storeGenral(Request $request)
    {
    
        $request->validate(
            [
                'quastion' => 'required|array',
                'quastion.*' => 'required|numeric|exists:quastions,id',
                'start_date' => 'required',
                'end_date' => 'required',
            ]
        );
        
        $quastionnaire = MainModel::where('type' , 'general')->first();
        if($quastionnaire)
        {
            $quastionnaire->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        }else{
            $quastionnaire = MainModel::create([
                'employee_id' => $request->employee_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'type' => 'general',
            ]);
        }
      
        $old = QuastionnaireQuastion::where('quastionnaire_id' , $quastionnaire->id)->get();
        foreach($old as $old){
            $old->delete();
        }

        foreach($request->quastion as $key=>$quastion){
            QuastionnaireQuastion::create([
                'quastionnaire_id' => $quastionnaire->id,
                'quastion_id' => $quastion,
                'point' => $request->points[$key],
            ]);
        }
        return redirect()->back()->with('success', 'تم تعديل بيانات الاستبيان بنجاح');

    }



    public function createNegativeQuastionnaire()
    {
        $data = Quastionnaire::with('AllQuastions')->where('type' , 'negative')->first();
        $NegativeQuastionArray = QuastionnaireQuastion::where('quastionnaire_id' , $data->id)->pluck('quastion_id')->toArray();
        $AllQuastions  = Quastion::get();
        $employees = Employee::select('id' , 'name')->get();
        $companies = Company::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }
        return view('admin.quastionnaire.create3', compact('data' , 'employees' , 'companies' , 'AllQuastions' ,'NegativeQuastionArray'));
    }


    public function storeNigative(Request $request)
    {
    
        $request->validate(
            [
                'quastion' => 'required|array',
                'quastion.*' => 'required|numeric|exists:quastions,id',
                'start_date' => 'required',
                'end_date' => 'required',
            ]
        );
        

        $quastionnaire = MainModel::where('type' , 'negative')->first();
        if($quastionnaire)
        {
            $quastionnaire->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        }else{
            $quastionnaire = MainModel::create([
                'employee_id' => $request->employee_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'type' => 'general',
            ]);
        }
      
        $old = QuastionnaireQuastion::where('quastionnaire_id' , $quastionnaire->id)->get();
        foreach($old as $old){
            $old->delete();
        }

        foreach($request->quastion as $key=>$quastion){
            QuastionnaireQuastion::create([
                'quastionnaire_id' => $quastionnaire->id,
                'quastion_id' => $quastion,
                'point' => $request->points[$key],
            ]);
        }
        return redirect()->back()->with('success', 'تم تعديل بيانات الاستبيان بنجاح');

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

        $data = MainModel::findOrFail($id);
        $employees = Employee::select('id' , 'name')->get();
        $companies = Company::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
        }
        return view('admin.quastionnaire.edit', compact('data' , 'employees' , 'companies'));
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
                'employee_id' => 'required',
                'quastion' => 'required|array',
                'quastion.*' => 'required|numeric|exists:quastions,id',
                'start_date' => 'required',
                'end_date' => 'required',
            ]
        );

        $quastionnaire = MainModel::findOrFail($id);
        $quastionnaire->update([
            'employee_id' => $request->employee_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        if($request->quastion)
        {
            QuastionnaireQuastion::where('quastionnaire_id' , $quastionnaire->id)->delete();

            foreach($request->quastion as $quastion){
                QuastionnaireQuastion::create([
                    'quastionnaire_id' => $quastionnaire->id,
                    'quastion_id' => $quastion,
                ]);
            }
        }
      
      
        return redirect()->route('quastionnaires.index')->with('success', 'تم تعديل بيانات الاستبيان بنجاح');
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


   
 


    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = User::find($id);
        return Controller::updateModelStatus($info);
    }


    public function getQuastions(Request $request)
    {
        $quastionnaire = $request->quastionnaire_id ?? null;

        $employee = Employee::findOrFail($request->employee_id);
        $quastions = Quastion::where('category_id' , $employee->category_id)->get();

        if($quastionnaire)
            $old_quastions = Quastionnaire::where('id' , $quastionnaire)->first()->AllQuastions->pluck('id')->toArray();

            
        foreach($quastions as $quastion){
            $quastion->checked = false;
            if($quastionnaire){
                if(in_array($quastion->id , $old_quastions))
                    $quastion->checked = true;
            }
        }

        // return $quastions;


        return response()->json(['status' => 'success', 'data' => $quastions]);
    }


    public function getAllQuastions(Request $request)
    {
        $quastionnaire = $request->quastionnaire_id ?? null;

        // $employee = Employee::findOrFail($request->employee_id);
        $quastions = Quastion::get();

        if($quastionnaire)
            $old_quastions = Quastionnaire::where('id' , $quastionnaire)->first()->AllQuastions->pluck('id')->toArray();

            
        foreach($quastions as $quastion){
            $quastion->checked = false;
            if($quastionnaire){
                if(in_array($quastion->id , $old_quastions))
                    $quastion->checked = true;
            }
        }

        // return $quastions;


        return response()->json(['status' => 'success', 'data' => $quastions]);
    }

    public function getQuastionnaireFile(Request $request)
    {
        $employee_id = $request->employee_id;
        $quastionnaire_id = $request->id;
        $quastionnaire =QuastionnaireFile::where('employee_id' , $employee_id)->where('quastionnaire_id' , $quastionnaire_id)->first();
        if($quastionnaire)
            return response()->json(['status' => 'success', 'file' => asset('storage/' . $quastionnaire->file)]);
        else
            return response()->json(['status' => 'failed', 'data' => null]);
    }
}
