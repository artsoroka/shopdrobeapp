<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    /**
     * Display all posts by User 
     *
     * @return Response
     */
    public function posts($userId){
        
        if( ! App\User::find($userId) )
            throw new NotFoundHttpException('no user found'); 
            
        $posts = App\Post::with(['location', 'post_author', 'comments', 'comments.comment_author'])
                ->where('user_id', $userId)
                ->get(); 
        
        if( ! $posts || ! count($posts) ) 
            throw new NotFoundHttpException("user don't have any posts yet"); 
        
        return response()->json($posts); 
    }

}
