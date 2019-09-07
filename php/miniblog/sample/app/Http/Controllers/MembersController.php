<?php

namespace App\Http\Controllers;

// モデルの読み込みについてもしっかり書き込む
use Session;
use App\Member;
use App\Http\Requests\MembersRequest;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $items = Member::orderBy('number', 'asc')->get();
        return view( 'members.index', [ 'items' => $items ]);
    }

    public function create()
    {
        return view('members.new');
    }

    public function store(MembersRequest $request)
    {
        // まずMemberクラスのインスタンス生成　バリデーションはHttp/Requestsにあります
        $member = new Member;
        /* リクエストされた値を保管する値を用意します
        　　all()は全入力を「配列」として呼び出す値です */
        $form = $request->all();
        // トークンの値は使わないので除外します
        unset($form['_token']);
        /* 先ほと生成したインスタンスに値を設定して保存します
        　　直接$person->id = $request->id とすることも出来ます */
        $member->fill($form)->save();
        return redirect('/members');
    }

    public function edit($id)
    {
        $item = Member::find($id);
        return view('members.edit', [ 'item' => $item ] );
    }

    public function update(MembersRequest $request)
    {
        $member = Member::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $member->fill($form)->save();
        return redirect('/members');
    }

    public function show($id)
    {
        $item = Member::find($id);
        return view('members.show', array_merge([ 'item' =>  $item ], Member::translateCharacter($item)));
    }

    public function destroy($id)
    {
        $item = Member::find($id)->delete();
        return redirect('/members');
    }

    public function search(Request $request)
    {
        // ややこしくなりそうだったらモデルに書きましょう　
        return view('members.index', [ 'items' => Member::getSearch($request->q) ]);
    }

}
