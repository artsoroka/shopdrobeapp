<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App; 
use App\Photo; 
use App\Http\Requests;
use App\Http\Controllers\Controller; 

use DB; 

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; 
use Symfony\Component\HttpKernel\Exception\FatalErrorException; 

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $photos = Photo::with([
            'post', 
            'post.post_author', 
            'post.comments'
            ])->get();  
        
        return response()->json($photos); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return [
            'file' => $request->file('hello'), 
            'name' => $request->get('name')
        ]; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) 
    {
        $photo = Photo::find($id); 
        
        if( ! $photo || count($photo) ) 
            throw new NotFoundHttpException('no photo found'); 
        
        $photo = App\Photo::with([
            'post', 
            'post.post_author', 
            'post.comments'
            ])
            ->where('id', $id)
            ->get();  
        
        return response()->json($photo); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id); 
        
        if( ! $photo ) 
            throw new NotFoundHttpException('no photo found'); 
    
        if( ! $photo->delete() )
            throw new FatalErrorException('could not delete photo'); 
        
        DB::table('photo_post')->where('photo_id', $id)->delete();
        
        return response()->json(['status' => 'photo deleted']); 
        
    }
}
