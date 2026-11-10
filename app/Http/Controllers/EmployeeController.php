<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\Ward;
use App\Models\Province;
use App\Models\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = new employee();
        $employee = $obj ->index()->paginate(5);
        return view('employee.index', [
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wards = (new Ward())->index();
        $dis = (new District())->index();
        $pro = (new Province())->index();
        return view('employee.add', compact('wards', 'dis', 'pro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreemployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {   
        $employee = new employee();
        $employee->store($request);
        return redirect()->route('employee')->with('success', 'Employee added successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee, Request $request)
    {
       
        $epID = $request->id;
        $edit = $employee->edit($epID);
        $wards = (new Ward())->index();
        $dis = (new District())->index();
        $pro = (new Province())->index();
        return view('employee.edit', compact('edit', 'employee', 'wards', 'dis', 'pro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateemployeeRequest  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateemployeeRequest $request, employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employee')->with('success', 'Employee update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        //
    }
    public function login(){
        return view('auth-login-basic');
    }
    public function checkLogin(Request $request) {
        $credentials = $request->only(['email', 'password']); // Lấy thông tin đăng nhập
        $check = $request->check;
        // check = 1 -> form khách hàng, check = 0 -> form admin
        $loginRoute = $check == 1 ? 'logincus' : 'login';

        // Kiểm tra nếu đã có session đăng nhập trước đó
        if (session('admin') || session('employee')) {
            if (session('employee')) {
                session()->forget('employee');
                return Redirect::route($loginRoute)->with('error', 'An unexpected error occurred, please log in again!');
            }
            if (session('admin')) {
                session()->forget('admin');
                return Redirect::route($loginRoute)->with('error', 'An unexpected error occurred, please log in again!');
            }
            if (session('customer')) {
                session()->forget('customer');
                return Redirect::route($loginRoute)->with('error', 'An unexpected error occurred, please log in again!');
            }
        } else {
            // Thử đăng nhập
            if (Auth::attempt($credentials)) {
                $user = Auth::user(); // Lấy thông tin user đã đăng nhập
                if($check == 1 && ($user->role == 0 || $user->role == 1 )){
                    Auth::logout();
                    return Redirect::route($loginRoute)->with('error', 'Wrong account or password!');
                }elseif($check == 0 && ($user->role == 2)){
                    Auth::logout();
                    return Redirect::route($loginRoute)->with('error', 'Wrong account or password!');
                }
                // Kiểm tra role của user
                if ($user->role == 0) {
                    // Admin
                    session(['admin' => $user]);
                    return Redirect::route('home1')->with('success', 'Login successful!');
                } elseif ($user->role == 1) {
                    // Employee
                    session(['employee' => $user]);
                    return Redirect::route('home1')->with('success', 'Login successful!');
                }elseif ($user->role == 2) {
                    // Customer
                    session(['customer' => $user]);
                    return Redirect::route('index')->with('success', 'Login successful!');
                }  else {
                    // Nếu role không hợp lệ, đăng xuất và báo lỗi
                    Auth::logout();
                    return Redirect::route($loginRoute)->with('error', 'Invalid role.');
                }
            } else {
                // Đăng nhập thất bại
                return Redirect::route($loginRoute)->with('error', 'Wrong account or password!');
            }
        }
    }
    public function logincus(){
        return view('loginandsignup');
    }
    public function forgotPass(){
        return view('forgotPass');
    }
    public function newPass(Request $request){
        $request->validate([
            'email' => 'required|email|exists:user,email',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::table('user')->where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Password has been reset! Please log in.');
    }
    public function logout() {
        if(session('admin')){ 
            session()->forget('admin');
            return Redirect::route('login')->with('error', 'good bye!');
        }
        if(session('employee')){ // Đăng xuất user hiện tại
            session()->forget('employee');
            return Redirect::route('login')->with('error', 'good bye!');
        }
        if(session('customer')){ // Đăng xuất user hiện tại
            session()->forget('customer');
            return Redirect::route('index')->with('error', 'good bye!');
        }
    }
}
