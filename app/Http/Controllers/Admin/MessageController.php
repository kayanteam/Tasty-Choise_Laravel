<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Message;
use App\Models\Partner;
use App\Models\User;
use App\Traits\FcmTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MessageController extends Controller
{
    use FcmTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.messages.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::Active()->NotMe()->get();
        return view('admin.messages.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',

        ], [
            'users.required' => 'يرجى اختيار المستخدمين المراد ارسال الرسالة اليهم',
            'users.array' => 'يرجى اختيار المستخدمين المراد ارسال الرسالة اليهم',
            'title.required' => 'يرجى ادخال عنوان الرسالة',
            'body.required' => 'يرجى ادخال نص الرسالة',
        ]);
        $users = User::where('fcm_token', '!=', null)->get();
        foreach ($users as $user) {
            $this->sendUserFcmNotifications($user->fcm_token, $request->title, $request->body);
        }

        return redirect()->back()->with('success', 'تم الارسال بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        $users = User::Active()->get();
        $message->update(['is_read' => true]);
        return view('admin.messages.show', compact('message', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
