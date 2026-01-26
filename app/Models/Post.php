<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    use HasUuids;//UUID
    protected $primaryKey = 'id';
    protected $keyType = 'string';//UUID - Universal Unique Identifier
    public $incrementing = false;//UUID

    protected $table = 'post';
    //use HasFactory;

    protected $fillable = ['title', 'body','author', 'published']; //fields that can be update

    protected $guarded = ['id']; //cannot be update/assigned (readonly)

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
