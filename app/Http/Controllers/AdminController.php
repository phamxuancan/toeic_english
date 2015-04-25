<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/21/2015
 * Time: 3:30 PM
 */
namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;

    class AdminController extends Controller{
        public function index(){
            if (Session::has('admin_user'))
            {
               return view('admins.content.index');
            }else{
                return view('admins.content.login');
            }
        }
        public function login(){
            return view('admins.content.login');
        }
        public function confirm(Request $request){
            $username = $request->get('username');
            $password = $request->get('inputPassword');
            if(md5($username) == 'f6fdffe48c908deb0f4c3bd36c032e72' && md5($password) == 'e10adc3949ba59abbe56e057f20f883e'){
                Session::put('admin_user',$username);
                return response()->json(array('message'=>'Đăng nhập thành công!','error'=>0));
            }else
                return response()->json(array('message'=>'Đăng nhập không thành công!','error'=>1));
        }
        public function user(){

        }
        public function phpinfor(){
            return md5('adminadmin');
            return phpinfo();
        }
    }