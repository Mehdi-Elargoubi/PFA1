<?php

namespace App\Models;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id','title','slug','body','image'];
    protected $table='posts';
    //protected $dates = ['incident_date','declaration_date'];

    /** @return PostFactory */


    public function getRouteKeyName(){
        return 'slug';
    }
}
