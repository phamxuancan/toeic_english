<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/19/2015
 * Time: 10:00 PM
 */
namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller{
        public function createQuestion(Request $request){
            try{
                $question       = $request->get('question','');
                $answer_a       = $request->get('answer_a');
                $answer_b       = $request->get('answer_b');
                $answer_c       = $request->get('answer_c');
                $answer_d       = $request->get('answer_d');
                $answer_correct = $request->get('answer_correct');
                $sound          = $request->get('sound','');
                $input = array(
                    "question"      => $question,
                    "answer_a"      => $answer_a,
                    "answer_b"      => $answer_b,
                    "answer_c"      => $answer_c,
                    "answer_d"      => $answer_d,
                    "answer_correct"=> $answer_correct,
                    "sound"         => $sound,
                    "created_at"    => date('Y-m-d h:i:s')

                );
                $question_id = Question::getInstance()->insert($input);
                if($question_id > 0){
                    return response()->json(array("message"=>"Add question Success!","error"=>0));
                }else
                    return response()->json(array("message"=>"Add question fail!","error"=>1));
            }catch (\Exception $e){
                return response()->json(array("message"=>$e->getMessage(),"error"=>1));
            }
        }
        public function getAllQuestions(){
            try{
                $questions = array();
                $result     =   Question::getInstance()->getAllObjectInTable();
                if(count($result)){
                    $questions = $result;
                }
                return array("questions"=>$questions);
            }catch (\Exception $e){
                return response()->json(array("message"=>$e->getMessage(),"error"=>1));
            }

        }
    }