<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;


class TodoController extends Controller
{
    private $todo; // 追記

    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
       // TODO: 第1引数を指定
        return view('todo.create'); // 追記
    }

    public function store(Request $request) // 追記
    {
        $inputs = $request->all(); // 変更

        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
}