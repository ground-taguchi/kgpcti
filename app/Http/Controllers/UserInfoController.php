<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Requests\UserInfoRequest;

class UserInfoController extends Controller
{
    public function getUserInfoByTel(Request $request)
    {
        $tel = $request->input('tel');
        $userInfo = UserInfo::where('tel', $tel)->first();

        if ($userInfo) {
            // return view('user-tel-search')->with('userInfo',$userInfo);
            return view('user-tel-search', compact('userInfo'));
        } else {
            $userInfos = UserInfo::paginate(5);

            return view('all-userinfo',compact('userInfos'));
        }
    }

    public function getAllUserInfo()
    {
        $userInfos = UserInfo::paginate(5);

        return view('all-userinfo',compact('userInfos'));
    }

    public function update(Request $request, $id)
    {
        // $data = $request->only(['user_id', 'name', 'tel', 'mail_address', 'comment']);
        // $userInfo = UserInfo::findOrFail($id);
        // $userInfo->update($data);
        // $isUpdate = true;
        // return view('user-tel-search', compact('userInfo','isUpdate'));

        // リクエストデータを検証
        $validatedData = $this->validateRequest($request, $id);

        // IDに基づいてユーザー情報レコードを取得
        $userInfo = UserInfo::findOrFail($id);

        // 検証済みデータを使用してユーザー情報レコードを更新
        $userInfo->update($validatedData);

        // 更新されたユーザー情報レコードを再取得
        $userInfo = UserInfo::findOrFail($id);

        // 必要に応じて追加のフラグや変数を設定

        // 更新されたユーザー情報を含むデータをビューに返す
        return view('user-tel-search', compact('userInfo'));
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // $post = UserInfo::create($data);
        // $post = $post->getAttributes();
        // $userInfo = UserInfo::where('tel', $post['tel'])->first();
        // $isStore = true;
        // return view('user-tel-search', compact('userInfo','isStore'));

        // $validatedData = $request->validate([
        //     'user_id' => 'required|string|max:8|unique:user_infos,user_id',
        //     'name' => 'nullable|string|max:100',
        //     'tel' => 'required|string|max:20',
        //     'mail_address' => 'nullable|email|max:100',
        //     'comment' => 'nullable|string',
        // ]);
        // $userInfo = UserInfo::create($validatedData);
        // $userInfo = UserInfo::where('tel', $userInfo->tel)->first();
        // $isStore = true;
        // return view('user-tel-search', compact('userInfo', 'isStore'));

         // リクエストデータを検証
         $validatedData = $this->validateRequest($request);

         // 検証済みデータを使用して新しいユーザー情報レコードを作成
         $userInfo = UserInfo::create($validatedData);

         // 電話番号（tel）を基にユーザー情報を取得
         $userInfo = UserInfo::where('tel', $userInfo->tel)->first();

         // ビュー用のフラグを設定
         $isStore = true;

         // ビューにユーザー情報とフラグを含むデータを返す
         return view('user-tel-search', compact('userInfo', 'isStore'));
    }

    public function destroy($id){
        $data = UserInfo::findOrFail($id);
        $data->delete();

        // 削除後のリダイレクトなどの処理
        return redirect('/');
    }

    private function validateRequest(Request $request, $id = null)
    {
        $rules = [
            'user_id' => 'required|string|max:8|unique:user_infos,user_id' . ($id ? ',' . $id : ''),
            'name' => 'required|string|max:100',
            'tel' => 'required|string|max:20',
            'mail_address' => 'nullable|email|max:100',
            'comment' => 'nullable|string',
        ];

        return $request->validate($rules);
    }
}
