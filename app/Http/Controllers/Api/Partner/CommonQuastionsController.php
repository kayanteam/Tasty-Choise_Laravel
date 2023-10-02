<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CommonQuastions\QuastionsCollection;
use App\Http\Resources\Api\Complaint\ComplaintCollection;
use App\Models\CommonQuestion;
use App\Models\Complaint;
use App\Models\Driver;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class CommonQuastionsController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = $request->pageLength ?? 10 ;
        $complients = CommonQuestion::Active()->paginate($paginate);
        return new QuastionsCollection($complients);
    }

   
}
