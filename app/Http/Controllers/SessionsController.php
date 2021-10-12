<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/* (credential 证书，认证信息; attempt 试图，尝试; ) */
/* 会话控制器 */
class SessionsController extends Controller
{
    //用 create 动作显示登录页面
    public function create()
    {
        //返回登录页面
        return view('sessions.create');
    }


    //创建 store 动作来对用户提交的数据进行验证
    public function store(Request $request)
    {
        //验证用户提交的信息格式是否正确
        $credentials = $this -> validate($request,[
            'email'=> 'required|email|max:255',
            'password'=> 'required'
        ]);

/*         if(Auth::attempt(['email'=>$email,'password'=>$password])){
            // 该用户存在于数据库，且邮箱和密码相符合
        }
        attempt 方法会接收一个数组来作为第一个参数，该参数提供的值将用于寻找数据库中的用户数据。因此在上面的例子中，attempt 方法执行的代码逻辑如下：
            1.使用 email 字段的值在数据库中查找；
            2.如果用户被找到：
                1). 先将传参的 password 值进行哈希加密，然后与数据库中 password 字段中已加密的密码进行匹配；
                2). 如果匹配后两个值完全一致，会创建一个『会话』给通过认证的用户。会话在创建的同时，也会种下一个名为 laravel_session 的 HTTP Cookie，以此 Cookie 来记录用户登录状态，最终返回 true；
                3). 如果匹配后两个值不一致，则返回 false；
            3.如果用户未找到，则返回 false
*/
        if(Auth::attempt($credentials)){
            //登录成功后的相关操作
            session()->flash('success','来了，老弟！');
            return redirect()->route('users.show',[Auth::user()]);
        }else{
            //登录失败后的相关操作
            session()->flash('danger','休想骗我，你的邮箱和密码不对');
            return redirect()->back()->withInput();
        }
    }














}
