<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * 检索图书
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //验证请求参数
        $request->validate([

            // 验证分页请求参数
            'page' => 'integer|gte:1',
            'per_page' => 'integer|gte:1',

            // 验证图书请求参数
            'sort_by' => 'in:id,isbn10,isbn13,title,publisher,is_store',

            'order' => 'in:desc,asc',

            'id' => 'exists:books,id',
            // 
            'isbn10' => ['string|size:10', Rule::unique('books', 'isbn10')->ignore($request->isbn10, 'isbn10')],
            'isbn13' => ['digits:13', Rule::unique('books', 'isbn13')->ignore($request->isbn13, 'isbn13')],
            'title' => '',
            // 'origin_title' => '',
            // 'alt_title' => '',
            // 'subtitle' => '',
            // 'image' => 'url',
            // 'images.small' => 'url',
            // 'images.medium' => 'url',
            // 'images.large' => 'url',

            // 'author' => 'array',
            // 'translator' => 'array',
            // 'publisher' => '',
            // 'pubdate' => 'date',
            // // 'rating' => 'json',
            // // TODO: min <= max
            // 'rating.max' => 'integer|between:0,10',
            // 'rating.min' => 'integer|between:0,10|lte:rating.max',
            // 'rating.numRaters' => 'integer',
            // 'rating.average' => 'numeric',

            // 'tags.*.count' => 'integer',
            // 'tags.*.name' => '',
            // 'binding' => '',
            // // 'price' => 'regex:/^[0-9]+(.[0-9]{1,2})?$/',
            // 'price' => 'string',
            // 'pages' => 'integer',
            // 'is_store' => 'boolean'
        ]);

        // 设置默认请求返回数据
        $page = $request->query('page', 1);
        $per_page = $request->query('per_page', 10);
        $sort_by = $request->query('sort_by', 'id');
        $order = $request->query('order', 'asc');

        // 设置图书默认请求
        $id = $request->query('id', '1230448');
        $isbn10 = $request->query('isbn10', '7508314182');
        $isbn13 = $request->query('isbn13', '9787508314181');


        $count = DB::table('books')->count();

        // 分页器
        $books = DB::table('books')
            ->orderBy($sort_by, $order)
            ->offset(($page - 1) * $per_page)
            ->limit($per_page)
            ->get();

        // 将特殊数据进行解码
        foreach ($books as $book) {
            $book->images = json_decode($book->images);
            $book->author = json_decode($book->author);
            $book->translator = json_decode($book->translator);
            $book->rating = json_decode($book->rating);
            $book->tags = json_decode($book->tags);
        }
        return [
            'code' => '200 succfessful',
            'count' => $count,
            'books' => $books
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
        // 验证请求参数
        $request->validate([
            'id' => 'required|integer|unique:books,id',
            // 'isbn10' => 'required|digits:10|unique:books,isbn10',
            'isbn10' => 'required|string|size:10|unique:books,isbn10',
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
            // 'price' => 'regex:/^[0-9]+(.[0-9]{1,2})?$/',
            'price' => 'nullable|string',
            'pages' => 'integer',
            'is_store' => 'boolean'

            // 'author_intro' => '',
            // 'summary' => '',
            // 'catalog' => '',
            // 'ebook_price' => 'regex:/^[0-9]+(.[0-9]{2})?$/',
        ], [
            // 'price.*' => ''
        ]);
        // 存入数据库
        // 预处理 json
        $form = $request->only([
            'id',       // 线上环境移除 id
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
            'is_store',
        ]);
        
        // 将上传的json数据序列化才能传入数据库
        $form['images'] = json_encode($form['images']);
        $form['author'] = json_encode($form['author']);
        $form['translator'] = json_encode($form['translator']);
        $form['rating'] = json_encode($form['rating']);
        $form['tags'] = json_encode($form['tags']);

        $book = new Book;

        foreach ($form as $key => $value) {
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
    public function show(Request $request, $id)
    {
        // id 替换 book
        $request['id'] = $id;

        // 验证 id
        $request->validate([
            'id' => 'exists:books,id'
        ]);

        // 按照 id 进行限制查询

        $book = Book::find($id);
        
        // 对特殊数据解码为 json 格式
        // $book['images'] = json_decode($book['images']);
        // $book['author'] = json_decode($book['author']);
        // $book['translator'] = json_decode($book['translator']);
        // $book['rating'] = json_decode($book['rating']);
        // $book['tags'] = json_decode($book['tags']);

        foreach (['images', 'author', 'translator', 'rating', 'tags'] as $value) {
            $book[$value] = json_decode($book[$value]);
        }

        // 返回查询数据
        return [
            'code' => 200,
            'book' => $book
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
        //
        $request['id'] = $id;
        $request->validate([

            'id' => 'exists:books,id',
            // 
            'isbn10' => ['string|size:10', Rule::unique('books', 'isbn10')->ignore($request->isbn10, 'isbn10')],
            'isbn13' => ['digits:13', Rule::unique('books', 'isbn13')->ignore($request->isbn13, 'isbn13')],
            'title' => '',
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
            'pubdate' => 'date',
            // 'rating' => 'json',
            // TODO: min <= max
            'rating.max' => 'integer|between:0,10',
            'rating.min' => 'integer|between:0,10|lte:rating.max',
            'rating.numRaters' => 'integer',
            'rating.average' => 'numeric',

            'tags.*.count' => 'integer',
            'tags.*.name' => '',
            // 'binding' => '',
            // 'price' => 'regex:/^[0-9]+(.[0-9]{1,2})?$/',
            'price' => 'string',
            'pages' => 'integer',
            'is_store' => 'boolean'
        ]);

        // 
        $modi_fields = $request->only([
            'id',       // 线上环境移除 id
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
            'is_store',
        ]);

        $book = Book::find($id);
        foreach ($modi_fields as $key => $value) {
            $book->$key = $value;
        }

        // $book->title = 'lsbbd';

        $book->save();
        // Book::where('is_store', 1)->where('title', '小王子')
        // ->update(['title' => 'lsb']);

        return [
            'code' => '200 update ok',
            // 'book' => $book
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
        //
        $request['id'] = $id;

        $request->validate([
            'id' => 'exists:books,id'
        ]);

        $book = Book::find($id);
        $book->delete();

        return [
            'code' => '200 destory successful!',
            'book' => $book
        ];
    }
}
