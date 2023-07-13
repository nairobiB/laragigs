<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags']; //so we can be able to fill these in the form(its commented because we added whats needed in the appserviceprovider) app>providers>appserviceprovider

    //function to filter once tag is clicked
    public function scopeFilter($query, array $filters)
    {
        //if its not false just move on, if there is a tag it will do what is inside
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%'); //it will search the requested tag
        }
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%'); //it will search the requested search
        }
    }
}