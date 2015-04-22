<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/21/2015
 * Time: 3:30 PM
 */
namespace App\Http\Controllers;
    use Symfony\Component\HttpFoundation\Request;

    class AdminController extends Controller{
        public function login(){
            return view('admins.content.login');
        }
        public function confirm(Request $request){
            $username = $request->get('username');
            $password = $request->get('inputPassword');
            if($username == 'admin' && $password == '123456'){
                return response()->json(array('message'=>'Đăng nhập thành công!','error'=>0));
            }else
                return response()->json(array('message'=>'Đăng nhập không thành công!','error'=>1));

        }
    }