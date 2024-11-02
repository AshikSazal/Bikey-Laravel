<?php

namespace App\Http\Controllers;

use App\Events\MessageDeleteEvent;
use App\Events\MessageSentEvent;
use App\Events\MessageUpdateEvent;
use Illuminate\Http\Request;
use App\Models\Chat;
use Exception;
use App\Models\User;

class ChatController extends Controller
{
    public function getAdminChat()
    {
        return view('pages.admin.admin-chat');
    }

    public function getUserChats($userId)
    {
        $user = User::findOrFail($userId);

        // Retrieve all chats sent or received by this user
        $chats = $user->sentChats()->with('receiver')->get()->merge($user->receivedChats()->with('sender')->get());

        return view('path.to.your.view', compact('chats'));
    }

    
    public function saveChat(Request $request)
    {
        try{
            if($request->updateChatId){
                $this->validate($request,[
                    'message'=>'required'
                ]);
                Chat::where('id',$request->updateChatId)->update(['message'=>$request->message]);
                $chat = Chat::where('id', $request->updateChatId)->first();
                $flag=2;
                event(new MessageUpdateEvent($chat));
            }else{
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
                $flag=1;
                event(new MessageSentEvent($chat));
            }
            return response()->json(['chat' =>$chat,'flag'=>$flag]);
        }catch(Exception $exp){
            return response()->json([
                'message' => $exp->getMessage(),
            ],404);
        }
    }

    public function deleteChat(Request $request)
    {
        try{
            Chat::where('id', $request->id)->delete();
            event(new MessageDeleteEvent($request->id));
            return response()->json(['chat' =>'']);
        }catch(Exception $exp){
            return response()->json([
                'message' => $exp->getMessage(),
            ],404);
        }
    }

    public function loadChats(Request $request)
    {
        try{
            $chats = Chat::where(function($query) use($request){
                $query->where('sender_id', $request->sender_id)
                ->orWhere('sender_id', $request->receiver_id);
            })->where(function($query) use($request){
                $query->where('receiver_id', $request->sender_id)
                ->orWhere('receiver_id', $request->receiver_id);
            })->get();

            return response()->json(['data' =>$chats]);
        }catch(Exception $exp){
            return response()->json([
                'message' => $exp->getMessage(),
            ],404);
        }
    }
}
