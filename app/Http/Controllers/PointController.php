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
    use Illuminate\Http\Request;

    class PointController extends Controller{
        public function getMaxPoint(Request $request){
            try{
                $points = array();
                $result     =   Point::getInstance()->getMaxPoint();
                if(count($result)){
                    $points = $result;
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

                $point_info = array(
                    "user_id" => $user_id,
                    "point" => $point,
                    "time"  => $time,
                    "created_at" => date('Y-m-d h:i:s')
                );

                $result = Point::getInstance()->insert($point_info);

                if($result > 0){
                    return response()->json(array("message"=>"Add point Success!","error"=>0));
                }else
                    return response()->json(array("message"=>"Add point fail!","error"=>1));

            }catch (\Exception $e){
                return response()->json(array("message" => $e->getMessage(), "error" => 1));
            }
        }
    }