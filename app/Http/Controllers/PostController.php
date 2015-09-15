<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 

use App; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator; 
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;  


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return App\Post::all(); 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer', 
            'is_look' => 'required|boolean'
        ]); 
        
        if( $validator->fails() ){
            throw new BadRequestHttpException( implode('', $validator->errors()->all()) );   
        } 
        
        $post = new App\Post(); 
        $post->user_id = $request->input('user_id');  
        $post->is_look = $request->input('is_look'); 
        
        $post->save();
        
        return response()->json($post, 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = App\Post::find($id); 
        
        if( ! $post ) 
            throw new NotFoundHttpException('no post found'); 
 
        return response()->json($post);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make( $request->all(), [
            'user_id' => 'required|integer', 
            'is_look' => 'required|boolean'
        ]); 
        
        if( $validator->fails() ){
            throw new BadRequestHttpException( implode('', $validator->errors()->all() ) );  
        } 
        
        $post = App\Post::find($id); 
        
        if( ! $post ) 
            throw new NotFoundHttpException('no post found');
        
        $post->user_id = $request->input('user_id');  
        $post->is_look = $request->input('is_look'); 
        
        $post->save(); 
        
        return response()->json($post, 200);  
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = App\Post::find($id); 
        
        if( ! $post ) 
            throw new NotFoundHttpException('no post found'); 
            
        $post->delete(); 
        
        return response()->json(['status' => 'post deleted'], 200); 
    } 
    
}
