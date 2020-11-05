<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    //defining table is better to make sure
    protected $table = 'posts';

    protected $dates=['deleted_at'];

    //to make create method applicable on multiple columns : mass assign
    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];

}
