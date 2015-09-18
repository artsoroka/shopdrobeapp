<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB; 

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
            
        $posts = App\Post::with(['location', 'brands', 'look', 'photos', 'post_author', 'comments', 'comments.comment_author'])
                ->where('user_id', $userId)
                ->get(); 

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
        
        return response()->json($comments); 
    }
         
    /**
     * Show all User followers  
     *
     * @return Response
     */
    public function followers($userId){
                
        if( ! App\User::find($userId) )
            throw new NotFoundHttpException('no user found'); 
        
        $followers = DB::table('followers')
            ->where('user_id', $userId)
            ->join('users', 'followers.followed_by', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->get();
    
        return response()->json($followers); 
    } 
         
    /**
     * Display User subscriptions  
     *
     * @return Response
     */
    public function following($userId){
        
        if( ! App\User::find($userId) )
            throw new NotFoundHttpException('no user found'); 
        
        $following = DB::table('followers')
            ->where('followed_by', $userId)
            ->join('users', 'followers.user_id', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->get();
            
        return response()->json($following); 
    }
    
}
