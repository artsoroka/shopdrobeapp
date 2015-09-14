<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response; 

use App; 
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator; 

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
            return $this->_error($validator->errors()->all(), 400);   
        } 
        
        $post = new App\Post(); 
        $post->user_id = $request->input('user_id');  
        $post->is_look = $request->input('is_look'); 
        
        $post->save(); 
        
        return $this->_success($post, 201); 
        
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
            return $this->_error('no post found', 404); 
                  
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
            return $this->_error($validator->errors()->all(), 400);   
        } 
        
        $post = App\Post::find($id); 
        
        if( ! $post ) 
            return $this->_error('no post found', 404); 
        
        $post->user_id = $request->input('user_id');  
        $post->is_look = $request->input('is_look'); 
        
        $post->save(); 
        
        return $this->_success($post, 200); 
        
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
            return $this->_error('no post found', 404); 
            
        $post->delete(); 
        
        return $this->_success('post deleted', 200); 
    } 
    
    private function _error($message, $status){
        return $this->_json([
            'err' => $message    
        ], $status); 
    } 
    
    private function _success($message, $status){
        return $this->_json([
            'response' => $message
        ], $status); 
    }
    
    private function _json($message, $status){
        $response = new Response($message, $status); 
        $response->header('Content-Type', 'application/json'); 
    
        return $response; 
        
    }
    
}
