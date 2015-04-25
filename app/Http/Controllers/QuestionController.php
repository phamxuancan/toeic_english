<?php
/**
 * Created by PhpStorm.
 * User: Kudo Shinichi
 * Date: 4/19/2015
 * Time: 10:00 PM
 */
namespace App\Http\Controllers;
use App\Http\Controllers;
use App\Models\File;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller{
    const TYPE_AUDIO = 'audio';
    const TYPE_TEXT  = 'text';
        public function createQuestion(Request $request){
            try{
                $question       = $request->get('question','');
                $answer_a       = $request->get('answer_a');
                $answer_b       = $request->get('answer_b');
                $answer_c       = $request->get('answer_c');
                $answer_d       = $request->get('answer_d');
                $answer_correct = $request->get('answer_correct');
                $sound          = '';
                $type          = $request->get('type','text');
                if($request->hasFile('sound')){
                    $file = $request->file('sound');
                    $sound = File::uploadFile($file,'uploads/audio');
                }
                $input = array(
                    "question"      => $question,
                    "answer_a"      => $answer_a,
                    "answer_b"      => $answer_b,
                    "answer_c"      => $answer_c,
                    "answer_d"      => $answer_d,
                    "answer_correct"=> $answer_correct,
                    "sound"         => $sound,
                    "type"          => $type,
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
                $audio     =   Question::getInstance()->getObjectsWheres(array('type'=>self::TYPE_AUDIO));
                $text     =   Question::getInstance()->getObjectsWheres(array('type'=>self::TYPE_TEXT));
                return array("audio"=>$audio,'text'=>$text);
            }catch (\Exception $e){
                return response()->json(array("message"=>$e->getMessage(),"error"=>1));
            }

        }
    public function listQuestion(Request $request){
        $type      = $request->get('type');
        $questions = Question::getInstance()->getObjectsWheres(array('type'=>$type));
        return view('admins.content.question',array('questions'=>$questions,'type'=>$type));
    }
    public function getDataEditQuestion(Request $request){
        try{
            $question_id    = $request->get('question_id');
            $question       = Question::getInstance()->getObjectsInArrayIds('id',$question_id);
            if(count($question) > 0 ){
                return view('admins.content.editquestion',array('question'=>$question[0]));
            }else{
                return response()->json(array("message"=>"No object found!","error"=>1));
            }
        }catch (\Exception $e){
            return response()->json(array("message"=>$e->getMessage(),"error"=>1));
        }
    }
    public function editQuestion(Request $request){
        try{
            $question_id = $request->get('question_id');
            $answer_a    = $request->get('answer_a');
            $answer_b    = $request->get('answer_b');
            $answer_c    = $request->get('answer_c');
            $answer_d    = $request->get('answer_d');
            $answer_correct    = $request->get('answer_correct');
            $type        = $request->get('type');
            if($type == 'audio'){
                if($request->hasFile('audio')){
                    $audio = $request->file('audio');
                    $file_name = File::uploadFile($audio,'uploads/audio');
                    $input = array(
                        'answer_a'=> $answer_a,
                        'answer_b'=> $answer_b,
                        'answer_c'=> $answer_c,
                        'answer_d'=> $answer_d,
                        'answer_correct'=> $answer_correct,
                        'sound'   => $file_name
                    );
                }else{
                    $input = array(
                        'answer_a'=> $answer_a,
                        'answer_b'=> $answer_b,
                        'answer_c'=> $answer_c,
                        'answer_d'=> $answer_d,
                        'answer_correct'=> $answer_correct,
                    );
                }
            }else{
                $question = $request->get('question');
                $input = array(
                    'question'=> $question,
                    'answer_a'=> $answer_a,
                    'answer_b'=> $answer_b,
                    'answer_c'=> $answer_c,
                    'answer_d'=> $answer_d,
                    'answer_correct'=> $answer_correct,
                );
            }
            Question::getInstance()->update($input,array('id'=>$question_id));
        }catch (\Exception $e){
            return response()->json(array("message"=>$e->getMessage(),"error"=>1));
        }
    }
}