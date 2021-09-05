<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile');
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }
    public function postCredentials(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                Session::flash('message', 'Шинэ нууц үг хоорондоо таарахгүй байна!');
                Session::flash('alert-class', 'alert-danger');

                return Redirect::to(URL::previous() . "#tab_1_3");
            }
            else
            {
                $current_password = Auth::User()->password;
                if(Hash::check($request_data['current-password'], $current_password))
                {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    Session::flash('message', 'Нууц үг солигдлоо!');
                    Session::flash('alert-class', 'alert-success');

                    return Redirect::to(URL::previous() . "#tab_1_3");
                }
                else
                {
                    Session::flash('message', 'Одоогийн нууц үг буруу байна!');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to(URL::previous() . "#tab_1_3");
                }
            }
        }
        else
        {
            return redirect()->to('/');
        }
    }

    public function update(Request $request)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', '=', $id)->delete();
        return Redirect('user');
    }
}
