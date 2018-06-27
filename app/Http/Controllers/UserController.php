<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //验证请求参数
        $request->validate([
            // 验证分页请求参数
            'page' => 'integer|gte:1',
            'per_page' => 'integer|gte:1',
            'sort_by' => 'in:id,uid,name,email,loc_id,loc_name',

            'order' => 'in:desc,asc'
        ]);

        // 设置默认请求返回数据
        $page = $request->query('page', 1);
        $per_page = $request->query('per_page', 10);
        $sort_by = $request->query('sort_by', 'id');
        $order = $request->query('order', 'asc');

        $count = User::count();

        $users = User::orderBy($sort_by, $order)
            ->offset(($page - 1) * $per_page)
            ->limit($per_page)
            ->get();

        return [
            'code' => '200 succfessful',
            'count' => $count,
            'users' => $users
        ];
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
            // 'id' => 'required|integer|unique:users',
            'uid' => 'required|string|unique:users',
            'name' => 'string',
            'email' => 'email',
            'avatar' => 'url',
            // 'loc_id' => 'required|',
            // 'loc_name' => 'required|',
            // 'desc' => 'text',
            // 密码只能是6-8位的字母和数字组合构成
            'password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,8}$/',
        ]);
        // 存入数据库
        $user = new User;

        $form = $request->only([
            // 'id',
            'uid',
            'name',
            'email',
            'avatar',
            'loc_id',
            'loc_name',
            'desc',
            'password',
        ]);

        if (!$request->name) $form['name'] = $request->uid;

        // 加密密码
        $form['password'] = bcrypt($form['password']);

        foreach ($form as $key => $value) {
            $user->$key = $value;
        }

        $user->save();

        // 返回数据
        return [
            'code' => '200ok'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request['id'] = $id;

        // 验证 id
        $request->validate([
            'id' => 'exists:users,id'
        ]);

        $user = User::find($id);

        return [
            'code' => 200,
            'user' => $user
        ];
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

        $request['id'] = $id;

        //验证请求参数
        $request->validate([
            'id' => 'exists:users,id',
            'uid' => 'string|unique:users,uid,' . $request->uid . ',uid',
            'name' => 'string|unique:users,name,' . $request->name . ',name',
            'email' => 'email|unique:users,email,' . $request->email . ',email',
            'desc' => 'string',
            'avatar' => 'url',
            'password' => 'regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,8}$/',
        ]);

        $form = $request->only([
            'uid',
            'name',
            'email',
            'avatar',
            'desc',
            'password'
        ]);

        if ($request->password)
            $form['password'] = bcrypt($form['password']);

        $user = User::find($id);

        foreach ($form as $key => $value) {
            $user->$key = $value;
        }

        $user->save();

        return [
            'code' => 200,
            'user' => $user
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request['id'] = $id;

        $request->validate([
            'id' => 'exists:users,id'
        ]);

        $user = User::find($id);
        $user->delete();

        return [
            'code' => 200,
            'user' => $user
        ];
    }
}
