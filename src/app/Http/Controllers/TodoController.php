<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;//追加
use App\Todo;
// use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function create()
    {
        return view('todo.create');
    }

    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function store(TodoRequest $request)
    {
    // $content = $request->input('content');
        $inputs = $request->all(); // 変更
    // dd($inputs); // 追記

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    //    $todo = new Todo(); 
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    // $todo->content = $content;
    // $todo->content = $inputs['content']; // 変更
        $this->todo->fill($inputs);
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $this->todo->save(); // 変更

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = $this->todo->find($id);
        return  view('todo.edit',['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
        // TODO: リクエストされた値を取得
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo -> fill($inputs) -> save();

        return redirect()->route('todo.show', $todo->id);
    }

    public function delete($id)
    {
        $todo = $this -> todo -> find($id);
        $todo->delete();
        
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
