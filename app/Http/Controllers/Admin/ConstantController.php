<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AdsDataTables;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Setting;
use Illuminate\Http\Request;

class ConstantController extends Controller
{

    public function index()
    {
        $constant = Setting::get();
        return view('admin.constant.edit' , compact('constant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $keysArray = Setting::get()->pluck('key')->toArray();
        foreach($keysArray as $key => $value)
        {
         
            $cons = Setting::where('key', $value)->first();
            $cons->value = $request->keys[$value];
            $cons->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Ads = Ads::find($id);
        $Ads->delete();
        return response()->json(['status' => 'success', 'message' =>  __('dashboard.deleted_success')]);
       }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $info = Ads::find($id);
        return Controller::updateModelStatus($info);
    }
}
