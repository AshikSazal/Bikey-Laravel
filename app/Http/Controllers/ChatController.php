<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use Exception;

class ChatController extends Controller
{
    public function saveMessage(Request $request)
    {
        try{
            $this->validate($request,[
                'sender_id'=>'required',
                'receiver_id'=>'required',
                'message'=>'required'
            ]);
            $chat = Chat::create([
                "sender_id"=>$request->sender_id,
                "receiver_id"=>$request->receiver_id,
                "message"=>$request->message
            ]);
            $chat->save();
            event(new MessageSentEvent($chat));
            return ['chat'=>$chat];
        }catch(Exception $exp){
            return response()->json([
                'error' => $exp->getMessage(),
            ],404);
        }
    }
}
