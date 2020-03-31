<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Model\User;
use App\Model\User;

class loginController extends Controller
{
    public function register(){
        return view('login/register');
    }
    public function registerto(){
        $data = $_POST;
        unset($data['_token']);
        if ($data['password'] != $data['password2']){
            dd('密码不一致');
        }else{
            unset($data['password2']);
            $data['password'] = md5($data['password']);
        }
        $res=User::insert($data);
        if ($res){
            return redirect("/login/login");
        }else{
            return redirect("/login/register");
        }

    }
    public function login(){
        return view('login/login');
    }
    public function Loginto(){
        $data=\request()->all();
        $name=\request()->post("name");
//        dd($data);
        unset($data['_token']);
        $res=User::where('name',$data['name'])->first();
        if ($res){
            if ($res['password']==md5($data['password'])){
                return view("/Index/index",['name'=>$name]);
            }else{
                return redirect("/login/login");
            }
        }else{
            return redirect("/login/login");
        }

    }
}