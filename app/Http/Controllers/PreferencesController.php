<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Preference;


class PreferencesController extends Controller
{


    /**
     * 获取系统配置
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preferences = Preference::find(1);

        return [
            'code' => 200,
            'preferences' => $preferences
        ];
    }

    /**
     * 修改系统配置
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'init_borrow_days' => 'integer',
            'renew_days' => 'integer',
            'penalty' => 'regex:/^[0-9]+(.[0-9]{1,2})?$/',
        ]);

        $form = $request->only([
            'init_borrow_days',
            'renew_days',
            'penalty'
        ]);

        $preferences = $preferences = Preference::find(1);

        foreach ($form as $key => $value) {
            $preferences->$key = $value;
        }

        $preferences->save();

        return [
            'code' => 200,
            'preferences' => $preferences
        ];
    }
}
