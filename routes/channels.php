<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });


// This channel will send the message
Broadcast::channel('broadcast-message',function($user){
    try{
        if (!$user) {
            throw new Exception('Please Login First');
        }
        return $user;
    }catch(Exception $exp){
        return response()->json([
            'error' => $exp->getMessage(),
        ],404);
    }
});