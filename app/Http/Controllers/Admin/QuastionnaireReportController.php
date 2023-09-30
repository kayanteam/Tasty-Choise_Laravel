<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmployeeDataTables;
use App\DataTables\QuastionnaireDataTables;
use App\DataTables\QuastionnaireReportDataTables;
use App\DataTables\SalonDataTables;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Quastionnaire as MainModel;
use App\Models\Employee;
use App\Models\Partner;
use App\Models\Quastion;
use App\Models\Quastionnaire;
use App\Models\QuastionnaireQuastion;
use App\Models\User;
use Illuminate\Http\Request;


class QuastionnaireReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QuastionnaireReportDataTables $dataTable)
    {
        $employees = Employee::get();
        $compaines = Company::get();
        if(auth()->user()->company_id != null)
        {
            $compaines = Company::where('id' , auth()->user()->company_id)->get();
            $employees = Employee::whereHas('Category' , function($q){
                $q->where('company_id' , auth()->user()->company_id);
            })->get();
        }
        return $dataTable->render('admin.report.index' , compact('employees' , 'compaines'));
    }



    //get Quastionnaire by employee
    public function getQuastionnaireByEmployee($id)
    {
        // $this->validate($request, array(
        //     'employee_id' => 'required|exists:employees,id',
        // ));

        $quastionnaires = Quastionnaire::where('employee_id' , $id)->get();
        $html = '<option value="">اختر الاستبيان</option>';
        foreach ($quastionnaires as $quastionnaire) {
            $start_date_format = date('d-m-Y', strtotime($quastionnaire->start_date));
            $end_date_format = date('d-m-Y', strtotime($quastionnaire->end_date));
            $html .= '<option value="' . $quastionnaire->id . '">' . $start_date_format . ' الى ' . $end_date_format . '</option>';
        }
        return response()->json(['html' => $html]);
    }
}
