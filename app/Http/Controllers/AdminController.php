<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证请求参数
        $request->validate([
            'id' => 'required|integer|unique:admins,id',
            'aid' => 'required|unique:admins,aid|string',
            'name' => 'required|string',
            'password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,10}$/',
            'email' => 'required|email',
            'authority' => 'required|string',
        ]);
        // 存入数据库
        $admin = new Admin;
        $form = $request->only([
            'id',
            'aid',
            'name',
            'password',
            'email',
            'authority',
        ]);
        
        foreach($form as $key => $value) {
            $admin ->$key = $value;
        }

        $admin->save();
        // 返回数据
        return [
            'code' => '200ok successful'
        ];
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
