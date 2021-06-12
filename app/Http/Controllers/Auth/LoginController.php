<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
    */
    
    /** 2021.5.26 ララベル標準の$redirectTo = '/home'は使用しないのでコメントアウト。role毎に飛ぶ.
     * 
    protected $redirectTo = '/home';
    */
    
    /** 2021.5.26 role=1は管理者のページ(/admin)に飛ぶように、その他のユーザーは(/home)に飛ぶように設定。
    */
    
    protected function redirectTo()
    {
        $role = $this->guard()->user()->role;
        if($role == 1){
            return '/admin';
        }else{
            return '/home';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     
     /**2021.5.25 ログインIDで認証したいのでpublic function username　return 'loginid';を追記
       */
       
     public function username()
    {
        return 'loginid';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
}
