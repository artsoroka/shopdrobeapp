<?php

namespace App;

use Validator; 
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    private $errors = [];  
    private $validationRules =  [
            'user_id' => 'required|integer', 
            'is_look' => 'required|boolean'
    ]; 
    
    public function save(array $options = []){
        if( ! $this->isValid() ) return false; 
        return parent::save($options); 
    }
    
    public function getErrors(){
        return implode('', $this->errors); 
    }
    
    private function isValid(){
        $validator = Validator::make([
            'user_id' => $this->user_id, 
            'is_look' => $this->is_look
        ], $this->validationRules);
        
        if( $validator->fails() ) {
            $this->errors = $validator->errors()->all(); 
            return false; 
        }

        return true; 

    }
    
    public function post_author(){
        return $this->user(); 
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function location(){
        return $this->belongsTo('App\Location'); 
    }
    
    public function photos(){
        return $this->hasMany('App\Photo'); 
    }
    
    public function brands(){
        return $this->hasMany('App\Brand'); 
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag'); 
    } 
    
    public function comments(){
        return $this->hasMany('App\Comment'); 
    }

    
}
