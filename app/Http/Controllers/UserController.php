<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/16/2015
 * Time: 3:40 PM
 */
    namespace App\Http\Controllers;
    use App\Http\Controllers;
    use App\Models\File;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;

    class UserController extends Controller{
        public function index(){
            return view('user.home');
        }

        public function login(){
                if(Auth::check()){
                    return redirect()->to('users');
                }
                return view('user.login');
        }
        public function authentication(Request $request){
            if($request->isMethod('post')){
				try{
					$input = $request->all();
					if(Auth::attempt($input)){
                        return redirect()->to('/');
					}else{
						return view('errors.503');
					}
				}catch (\Exception $e){
                    return view('errors.503');
				}
			}else return view('user.login');
        }

        public function signup(Request $request){
            if($request->isMethod('post')) {
                try {
                    $permission = $request->get('permission','user');
                    $username = $request->get('username', '');
                    $password = $request->get('password', '');
                    $email = $request->get('email', '');
                    $filename = '';
                    if($username == ''){
                        return response()->json(array("message" => 'Bạn hãy nhập tên người dùng!', "error" => 1));
                    }
                    if($password == ''){
                        return response()->json(array("message" => 'Bạn hãy nhập password!', "error" => 1));
                    }
                    $user = User::getInstance()->getObjectsWheres(
                        array('username'=> $username,
                            'password'=> md5($password),
                            'permission'    => $permission
                        )
                    );
                    if(count($user) > 0){
                        return response()->json(array("message" => 'Người dùng đã tồn tại!', "error" => 1));
                    }
                    if ($request->hasFile('avatar')) {
                        $avatar = $request->file('avatar');
                        $extension = $avatar->getClientOriginalExtension();
                        $filename = time() . "_" . rand(0, 10000000) . "." . $extension;
                        $avatar->move('uploads/avatar/', $filename);
                    }
                    if($permission == 'admin'){
                        $encode_password = md5($password);
                    }else{
                        $encode_password = Hash::make($password);
                    }
                    $user_infor = array(
                        "username" => $username,
                        "password" => $encode_password,
                        'email'    => $email,
                        "created_at" => date('Y-m-d h:i:s'),
                        "avatar" => $filename,
                        'permission'=>$permission
                    );
                    $user_id = User::getInstance()->insert($user_infor);

                    if ($user_id && $permission == 'user') {
                        Auth::attempt(array('username'=>$username,'password'=>$password));
                        return redirect()->to('/');
                    }elseif($user_id && $permission == 'admin'){
                        return response()->json(array("message" =>'Add User success', "error" => 0));
                    }
                } catch (\Exception $e) {
                    return response()->json(array("message" => $e->getMessage(), "error" => 1));
                }
            }else return view('user.register');
        }
        public function logout(){
            Auth::logout();
            return redirect()->to('users');
        }
    }