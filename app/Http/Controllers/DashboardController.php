<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentReceiptDataTables;
use App\DataTables\PullRequestDataTables;
use App\Models\Estate;
use App\Models\Order;
use App\Models\User;
use App\Models\Agent;
use App\Models\Category;
use App\Models\Communication;
use App\Models\Complaint;
use App\Models\Driver;
use App\Models\PaymentReceipt;
use App\Models\PullRequest;
use App\Models\ReportMissing;
use App\Models\WalletTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //

    public function index()
    {

       
        return view('dashboard'
        // , 
        // compact(
        //     'orders',
        //     'drivers',
        //     'users',
        //     'categories',
        //     'reportmissing',
        //     'complaint',
        //     'communication',
        //     'ordersToday',
        //     'pullrequests',
        //     'paymentreceipts',
        //     'todayAmount',
        //     'totalAmount'
        // )
    );


    }
}
