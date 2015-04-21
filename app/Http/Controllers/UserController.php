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
						return response()->json(array('message'=>'Login fail!','error'=>1));
					}
				}catch (\Exception $e){
					return response()->json(array('message'=>$e->getMessage(),'error'=>1));
				}
			}else return view('user.login');
        }

        public function signup(Request $request){
            if($request->isMethod('post')) {
                try {
                    $username = $request->get('username', '');
                    $password = $request->get('password', '');
                    $email = $request->get('email', '');
                    $filename = '';
                    if ($request->hasFile('avatar')) {
                        $avatar = $request->file('avatar');
                        $extension = $avatar->getClientOriginalExtension();
                        $filename = time() . "_" . rand(0, 10000000) . "." . $extension;
                        $avatar->move('uploads/avatar/', $filename);
                    }
                    $user_infor = array(
                        "username" => $username,
                        "password" => Hash::make($password),
                        "created_at" => date('Y-m-d h:i:s'),
                        "avatar" => $filename
                    );
                    $user_id = User::getInstance()->insert($user_infor);

                    if ($user_id) {
                        Auth::attempt($request->all());
                        return redirect()->to('/');
                    }
                } catch (\Exception $e) {
                    return response()->json(array("message" => $e->getMessage(), "error" => 1));
                }
            }else return view('user.register');
        }
        public function logout(){
            Auth::logout();
            return view('user.login');
        }
    }