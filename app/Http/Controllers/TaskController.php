<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Conditions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //追加


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name =  Auth::user()->name;
        $user = User::where('name', $name)->first();
        $userId = $user->id;
        $tasks = Conditions::where("user_id", $userId)->orderBy("input_date", "desc")->get();
        return view('tasks.index', ["tasks" => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // //モデルをインスタンス化
        $task = new Conditions;
        $name =  Auth::user()->name; // 検索したいユーザーネーム

        $user = User::where('name', $name)->first(); // usernameが指定した名前と一致する最初のレコードを取得
        $userId = $user->id; // ユーザーIDを取得

        $task->user_id = $userId;
        $task->temp = $request->input('temp');
        $task->sleeped = $request->input('sleeped');
        $task->eated = $request->input('eated');
        $task->condition = $request->input('condition');
        $task->point = $request->input('point');
        $task->input_date = $request->input('input_date');

        //データベースに保存
        $task->save();

        //リダイレクト
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($data_id)
    {
        $task = Conditions::find($data_id);
        return view('tasks.edit', ["task" => $task]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {

        //「編集する」ボタンをおしたとき
        if ($request->status === null) {
            $rules = [
                'task_name' => 'required|max:100',
            ];

            $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

            Validator::make($request->all(), $rules, $messages)->validate();

            $task = Task::find($id);
            $task->name = $request->input('task_name');

            $task->save();
        } else {
            $task = Task::find($id);
            $task->status = true;
            $task->save();
        }


        //リダイレクト
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($data_id)
    {
        Conditions::find($data_id)->delete();

        return redirect('/tasks');
    }
}
