<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class LoginController extends Controller
{
    public function register(){
        return view('Login/register');
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
            return redirect("/Login/login");
        }else{
            return redirect("/Login/register");
        }

    }
    public function Login(){
        return view('Login/login');
    }
    public function Loginto(){
        $data=\request()->all();
        $name=\request()->post("name");
        //dd($name);
        unset($data['_token']);
        $res=User::where('name',$data['name'])->first();
        if ($res){
            if ($res['password']==md5($data['password'])){
                return view("/Index/index",['name'=>$name]);
            }else{
                return redirect("/Login/login");
            }
        }else{
            return redirect("/Login/login");
        }

    }
}