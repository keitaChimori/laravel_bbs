<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * 掲示板トップを表示
     * 
     * @return view
     */ 
    public function showBoard()
    {
        $all_data = Message::AllData();
        // dd($all_data);
        return view('boardtop',compact('all_data'));
    }

    /**
     * 新規投稿実行
     * 
     * @return view
     */ 
    public function addBoard(MessageRequest $request)
    {
        $input_message = $request->all();
        // dd($input_message);
        DB::beginTransaction();
        try{
            // 投稿をDBへ登録
            Message::create($input_message);
            DB::commit();
        }catch(Throwable $e){
            // エラー
            DB::rollback();
            abort(500);
        }
        return redirect(route('showBoard'))->with('message','ひとことメッセージを投稿しました');
    }

    /**
     * 管理者ログインページを表示
     * 
     * @return view
     */ 
    public function showLogin()
    {
        return view('adminlogin');
    }

    /**
     * 管理者ログインチェック
     * 
     * @return view
     */ 
    public function loginCheck(LoginRequest $request)
    {
        $input_password = $request->all();
        // dd($input_password);
        $password = '$2y$10$yJObvGXT7b7a7w7HDa86WOoqEDipbkSYIm2NBoM06L5dLCDDDxgai'; // パスワード定義adminpassword
        if(Hash::check($input_password['password'] , $password)){
        // ログイン成功
            $request->session()->put('LoginSession',true);//session発行
            return redirect(route('showAdmin'));
        }
        // ログイン失敗
        return back()->with('message','パスワードが違います');
    }

    /**
     * ログアウト
     * 
     * @return view
     */ 
    public function logout()
    {
        session()->forget('LoginSession');
        return redirect(route('showLogin'));
    }


    /**
     * 管理者ページを表示
     * 
     * @return view
     */ 
    public function showAdmin()
    {
        $all_data = Message::AllData();
        // dd($all_data);
        return view('admintop',compact('all_data'));
    }

    /**
     * 編集ページを表示
     * @param int $id
     * @return view
     */ 
    public function showEdit($id)
    {
        $edit_data = Message::findOrFail($id);
        // dd($edit_data);
        return view('adminedit',compact('edit_data'));
    }

    /**
     * 編集実行
     * 
     * @return view
     */ 
    public function editDone(MessageRequest $request)
    {
        $input_editmessage = $request->all();
        // dd($input_editmessage);
        DB::beginTransaction();
        try{
            // 編集内容をDBへ登録
            Message::find($input_editmessage['id'])
            ->fill([
                'name' => $input_editmessage['name'],
                'message' => $input_editmessage['message'],
            ])
            ->save();
            DB::commit();
            return redirect(route('showAdmin'))->with('message','ひとことメッセージを編集しました');
        }catch(Throwable $e){
            // エラー
            DB::rollback();
            abort(500);
        }
    }

     /**
     * 削除ページを表示
     * @param int $id
     * @return view
     */ 
    public function showDelete($id)
    {
        $delete_data = Message::findOrFail($id);
        // dd($edit_data);
        return view('admindelete',compact('delete_data'));
    }

    /**
     * 削除実行
     * 
     * @return view
     */ 
    public function deleteDone(Request $request)
    {
        $input_deleteid = $request->all();
        // dd($input_deleteid);
        DB::beginTransaction();
        try{
            // 編集内容をDBへ登録
            Message::find($input_deleteid['id'])
            ->delete();
            DB::commit();
            return redirect(route('showAdmin'))->with('message','ひとことメッセージを削除しました');
        }catch(Throwable $e){
            // エラー
            DB::rollback();
            abort(500);
        }
    }
}
