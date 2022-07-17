<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengguna';
        $users = User::orderBy('name', 'asc')->get();
        return view('user.index', compact(
            'title',
            'users'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:20',
            'role' => 'required',
            
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'avatar' => 'default.png'
            ]);
            $user->save();
            return back()->with('toast_success', 'Data berhail disimpan');
        }
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
        $user = User::findorfail($id);

        $validator = Validator::make($request->all(), [
            'email' => 'required|email:dns',
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {

            if (isset($request->password)) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required|min:6|max:20',
                ]);
                if ($validator->fails()) {
                    return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
                } else {
                    $data = [
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'role' => $request->role,
                    ];
                }
            } else {
                $data = [
                    'email' => $request->email,
                    'role' => $request->role,
                ];
            }
            $user->update($data);
            return back()->with('toast_success', 'Data berhail disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findorfail($id);
            if ($user->avatar != 'default.png') {
                unlink(public_path() . '/dist/img/avatar/' . $user->avatar);
            }
            $user->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
