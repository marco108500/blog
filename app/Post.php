<?php

namespace App;
use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        Comment::create([
            'user_id' =>  auth()->id(),
            'body' => $body,
            'post_id' => $this->id
        ]);

    }

    public function scopeFilter($query, $filters)
    {
        if($month = $filters['month']??false)
        {
            $query->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if($year = $filters['year']??false)
        {
            $query->whereYear('created_at',$year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('Year(created_at) year  ,monthname(created_at) month   ,count(*) published')
            ->groupby('year','month')
            ->orderbyRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
