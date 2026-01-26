<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    use HasUuids;//UUID
    protected $primaryKey = 'id';
    protected $keyType = 'string';//UUID - Universal Unique Identifier
    public $incrementing = false;//UUID
    protected $table = 'tag';
    //use HasFactory;

    protected $fillable = ['title']; //fields that can be update

    protected $guarded = ['id']; //cannot be update/assigned (readonly)
public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
