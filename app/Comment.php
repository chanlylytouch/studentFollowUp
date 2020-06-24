<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
        return $this->belongTo(User::class);
    }
    public function studnet(){
        return $this->belongTo(Student::class);
    }
}
