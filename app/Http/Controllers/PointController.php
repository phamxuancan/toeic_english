<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/16/2015
 * Time: 3:40 PM
 */
    namespace App\Http\Controllers;
    use App\Http\Controllers;
    use App\Models\Point;
    use App\User;
    use Illuminate\Http\Request;

    class PointController extends Controller{
        public function getMaxPoint(Request $request){
            try{
                $points = array();
                $result     =   Point::getInstance()->getMaxPoint();
                if(count($result)){

                    foreach($result as $point){
                        $user_id = $point->user_id;
                        try{
                            $user = User::find($user_id);
                            $point->username = $user->username;
                            array_push($points,$point);
                        }catch (\Exception $e){
                            continue;
                        }

                    }
                }
                return array("points"=>$points);
            }catch (\Exception $e){
                return response()->json(array("message"=>$e->getMessage(),"error"=>1));
            }
        }

        public function add(Request $request){
            try {
                $user_id = $request->get('user_id', '');
                $point = $request->get('point', '');
                $time = $request->get('time', '');
                $point_user = Point::getInstance()->getObjectsWheres(array('user_id'=>$user_id));
                if(count($point_user)>0){
                    if($point > $point_user[0]->point){
                        $point = array(
                            'point'=>$point,
                            'updated_at' =>date('Y-m-d h:i:s')
                        );
                    }else{
                        $point = array(
                            'updated_at' =>date('Y-m-d h:i:s')
                        );
                    }
                    Point::getInstance()->update($point,array('user_id'=>$user_id));
                    return response()->json(array("message"=>"update point Success!","error"=>0));
                }else{
                    $point_info = array(
                        "user_id" => $user_id,
                        "point" => $point,
                        "time"  => $time,
                        "created_at" => date('Y-m-d h:i:s'),
                        "updated_at" => date('Y-m-d h:i:s')
                    );

                    $result = Point::getInstance()->insert($point_info);

                    if($result > 0){
                        return response()->json(array("message"=>"Add point Success!","error"=>0));
                    }else
                        return response()->json(array("message"=>"Add point fail!","error"=>1));

                }
            }catch (\Exception $e){
                return response()->json(array("message" => $e->getMessage(), "error" => 1));
            }
        }
    }