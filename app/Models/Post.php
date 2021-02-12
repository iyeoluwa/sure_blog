<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Post extends Model  implements Viewable
{
    use InteractsWithViews;
    use HasFactory;
   protected $fillable = [
        'content',
       'cover_image',
       'title',
       'summary'
];
   public function user(){
       return $this->belongsTo(User::class);
   }
   public function comments(){
       return $this->morphMany(Comment::class,'commentable')->whereNull('parent_id');
   }
}
