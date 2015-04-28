<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/21/2015
 * Time: 3:30 PM
 */
namespace App\Http\Controllers;
    use App\Models\Point;
    use App\Models\Question;
    use App\Models\User;
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
            if(session::has('admin_user')){
                return view('admins.content.index');
            }
            return view('admins.content.login');
        }
        public function confirm(Request $request){
            $username = $request->get('username');
            $password = $request->get('inputPassword');
            // login super account
            if(md5($username) =='21232f297a57a5a743894a0e4a801fc3'  && md5($password) == 'e10adc3949ba59abbe56e057f20f883e'){
                Session::put('admin_user',$username);
                return response()->json(array('message'=>'Đăng nhập thành công!','error'=>0));
            }
            $user = User::getInstance()->getObjectsWheres(
              array('username'=> $username,
                    'password'=> md5($password),
                    'permission'    => 'admin'
              )
            );
            if(count($user) > 0){
                if($username == $user[0]->username && md5($password) == $user[0]->password){
                    Session::put('admin_user',$username);
                    return response()->json(array('message'=>'Đăng nhập thành công!','error'=>0));
                }else
                    return response()->json(array('message'=>'Đăng nhập không thành công!','error'=>1));
            }else{
                return response()->json(array('message'=>'Đăng nhập không thành công!','error'=>1));
            }

        }
        public function user(){
            $users = User::getInstance()->getAllObjectInTable();
            return view('admins.content.users',array('users'=>$users));
        }
        public function topPoint(){
            $users = User::getInstance()->getTopPointUser();
            return view('admins.content.top_point',array('users'=>$users));
        }
        public function deleteUser(Request $request){
            try{
                $user_id = $request->get('user_id');
                User::getInstance()->delete(array('id'=>$user_id));
                Point::getInstance()->delete(array('user_id'=>$user_id));
                return response()->json(array('mesage'=>'Delete success!','error'=>0));
            }catch (\Exception $e){
                return response()->json(array('mesage'=>$e->getMessage(),'error'=>1));
            }

        }
        public function deleteQuestion(Request $request){
            try{
                $question_id = $request->get('question_id');
                Question::getInstance()->delete(array('id'=>$question_id));
                return response()->json(array('mesage'=>'Delete success!','error'=>0));
            }catch (\Exception $e){
                return response()->json(array('mesage'=>$e->getMessage(),'error'=>1));
            }
        }
        public function logout(){
            session::forget('admin_user');
            return view('admins.content.login');
        }
        public function userTestInday(){
            $users = User::getInstance()->getUserTestInday();
                return view('admins.content.users_test',array('users'=>$users));
        }
        public function pointFrom(Request $request){
            try{
                $to_point = $request->get('to_point');
                $from_point = $request->get('from_point');
                $users = User::getInstance()->getUserFromPoint($to_point,$from_point);
                return view('admins.content.pointFrom',array('users'=>$users));
            }catch (\Exception $e){
                return response()->json(array('mesage'=>$e->getMessage(),'error'=>1));
            }

        }
        public function phpinfor(){
            return md5('adminadmin');
            return phpinfo();
        }
    }