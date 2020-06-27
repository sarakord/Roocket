<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;

class Course extends Model
{
    use Sluggable;

    //protected $fillable = ['user_id', 'type', 'price', 'time', 'title', 'description', 'body','images', 'tags'];
    protected $guarded = [];
    protected $casts = [
        'images' => 'array'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function setDescriptionAttribute($value)
    {
        $this->attributes['body'] = str::limit(preg_replace('/<[^>]*>/' , '' , $value) , 200);
        $this->attributes['description'] = $value;
    }


    public function path()
    {
        return "/courses/$this->slug";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
