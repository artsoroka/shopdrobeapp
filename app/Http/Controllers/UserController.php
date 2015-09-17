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
            
        $posts = App\Post::with(['location', 'brands', 'look', 'post_author', 'comments', 'comments.comment_author'])
                ->where('user_id', $userId)
                ->get(); 
        
        if( ! $posts || ! count($posts) ) 
            throw new NotFoundHttpException("user don't have any posts yet"); 
        
        return response()->json($posts); 
    }
    
    /**
     * Display all looks by User 
     *
     * @return Response
     */
    public function looks($userId){
        
        if( ! App\User::find($userId) )
            throw new NotFoundHttpException('no user found'); 
            
        $looks = App\Post::with(['location', 'brands', 'look', 'post_author', 'comments', 'comments.comment_author'])
                ->where('user_id', $userId)
                ->where('is_look', true)
                ->get(); 
        
        if( ! $looks || ! count($looks) ) 
            throw new NotFoundHttpException("user don't have any posts looks"); 
        
        return response()->json($looks); 
    }
     
    /**
     * Display all comments by User 
     *
     * @return Response
     */
    public function comments($userId){
        
        if( ! App\User::find($userId) )
            throw new NotFoundHttpException('no user found'); 
            
        $comments = App\Comment::with('post', 'post.post_author')
                    ->where('user_id', $userId)
                    ->get(); 
        
        if( ! $comments || ! count($comments) ) 
            throw new NotFoundHttpException("user haven't commented any post yet");  
        
        return response()->json($comments); 
    }
}
