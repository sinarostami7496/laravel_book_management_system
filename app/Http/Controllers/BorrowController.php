<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\User;
use App\Book;
use App\Borrow;
use App\Preference;


class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function getDiffDays()
    {

    }
    public function index()
    {

    }

    /**
     * 借书
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'uid' => 'required|exists:users,id',
            'bid' => [
                'required',
                'exists:books,id',
                // 若图书不存在则中断后续的验证
                'bail',
                // 验证书是否已被借出
                function ($attribute, $value, $fail) {
                    $is_store = Book::find($value)->is_store;

                    if (!$is_store) {
                        return $fail('书已经被借走了');
                    }
                }
            ],
        ]);

        $preferences = Preference::find(1);

        $user = User::find($request->uid);
        $book = Book::find($request->bid);
        $book->is_store = 0;
        $book->save();

        $borrow = new Borrow;

        $borrow->book_id = $request->bid;
        $borrow->user_id = $request->uid;

        $borrow->save();


        $expected_return_date = $borrow->created_at;
        $expected_return_date->day += $preferences->init_borrow_days;

        return [
            'code' => 200,
            'borrow' => [
                'user' => $user,
                'book' => $book,
                'expected_return_date' => $expected_return_date->toDateTimeString(),
                'penalty' => 0
            ]
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
     * 还书
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $bid)
    {
        $request['bid'] = $bid;

        $request->validate([
            'bid' => 'exists:borrows,book_id'
        ]);

        $borrow = Borrow::where('book_id', $bid);

        $book = Book::find($bid);

        $book->is_store = false;
        $book->save();

        $extended_days = $borrow->extendedDays();

        $borrow->delete();


        $now = Carbon::now();
        
        // return $now;
        return [
            'code' => 200,
            'extended_days' => $extended_days
        ];
    }
}
