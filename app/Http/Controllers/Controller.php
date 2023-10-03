<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function updateModelStatus($info)
    {
        if ($info) {
            $status = $info->status;
            if ($status == 0) {
                $info->update(['status' => 1]);
            } else {
                $info->update(['status' => 0]);
            }
            return response()->json(['status' => 'success', 'message' => trans(__('dashboard.data_updated_success')), 'type' => 'no']);
        } else {
            return response()->json(['status' => 'error', 'message' => trans(__('dashboard.not_updated_success'))]);
        }
    }
}
