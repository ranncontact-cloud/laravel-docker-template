<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function create()
    {
        return view('todo.create');
    }

    public function index()
    {
        // 追加
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
    // $content = $request->input('content');
    $inputs = $request->all(); // 変更
    // dd($inputs); // 追記

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
       $todo = new Todo(); 
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    // $todo->content = $content;
    // $todo->content = $inputs['content']; // 変更
       $todo->fill($inputs); 
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
       $todo->save();

    return redirect()->route('todo.index');
    }
}

// use Illuminate\Http\Request;

// class TodoController extends Controller
// {
//     public function index()
//     {
//         return view('todo.index');
//     }
// }
