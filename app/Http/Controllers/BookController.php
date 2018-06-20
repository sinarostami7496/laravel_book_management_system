<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
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
            'page' => '',
            'per_page' => '',
            'order' => '',
            'sort_by' => '',
        ])
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证请求参数
        $request->validate([
            'id' => 'required|integer|unique:books,id',
            'isbn10' => 'required|digits:10|unique:books,isbn10',
            'isbn13' => 'required|digits:13|unique:books,isbn13',
            'title' => 'required',
            // 'origin_title' => '',
            // 'alt_title' => '',
            // 'subtitle' => '',
            'image' => 'url',
            'images.small' => 'url',
            'images.medium' => 'url',
            'images.large' => 'url',

            'author' => 'array',
            'translator' => 'array',
            // 'publisher' => '',
            'pubdate' => 'required|date',
            // 'rating' => 'json',
            // TODO: min <= max
            'rating.max' => 'required|integer|between:0,10',
            'rating.min' => 'required|integer|between:0,10|lte:rating.max',
            'rating.numRaters' => 'required|integer',
            'rating.average' => 'required|numeric',

            'tags.*.count' => 'required|integer',
            'tags.*.name' => 'required',
            // 'binding' => '',
            'price' => 'regex:/^[0-9]+(.[0-9]{1,2})?$/',
            'pages' => 'integer',
            // 'author_intro' => '',
            // 'summary' => '',
            // 'catalog' => '',
            'ebook_price' => 'regex:/^[0-9]+(.[0-9]{2})?$/',
        ], [
            // 'price.*' => ''
        ]);
        // 存入数据库
        // 预处理 json
        $form = $request->only([
            'isbn10',
            'isbn13',
            'title',
            'origin_title',
            'alt_title',
            'subtitle',
            'image',
            'images',
            'author',
            'translator',
            'publisher',
            'pubdate',
            'rating',
            'tags',
            'binding',
            'price',
            'pages',
            'author_intro',
            'summary',
            'catalog',
            'ebook_price',
        ]);
        
        // 将上传的json数据序列化才能传入数据库
        $form['images'] = json_encode($form['images']);
        $form['author'] = json_encode($form['author']);
        $form['translator'] = json_encode($form['translator']);
        $form['rating'] = json_encode($form['rating']);
        $form['tags'] = json_encode($form['tags']);
        
        $book = new Book;

        foreach($form as $key => $value) {
            $book->$key = $value;
        }

        $book->save();
        // 返回数据
        return [
            'code' => 200
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
