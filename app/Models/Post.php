<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['category', 'author']; //this autoloads the author&category relationships
    //laravel uses the fillable to protect agains mass assignement vulnerabilites
    //the fillable var holds the attributes that can be modified using mass assignement i.e:
    // php artisan tinker
    // Post::create(['title' => 'a post', 'excerpt' => 'post excerpt', 'body' => 'post body'])
    // if another attribute is used we'll get an error
//    protected $fillable = ['title', 'excerpt', 'body'];
    //another way is to use the guarded variable which holds the attributes that can't be changed
    protected $guarded = ['id'];

    //either one can be used

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query
            ->where(fn($query) => $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) => $query
            ->whereHas('category', fn($query) => $query
                ->where('slug', $category))
        //it uses the category fn(relationship) below
        // (Eloquent query constraint and comes down to the same thing as the whereExists)
//            ->whereExists(fn($query) => $query //matches sql (like pure sql)
//                ->from('categories')
//                ->whereColumn('categories.id', 'posts.category_id') //if we use where the 'posts.category_id' is parsed as a string
//                ->where('categories.slug', $category))
        );
        $query->when($filters['author'] ?? false, fn($query, $author) => $query
            ->whereHas('author', fn($query) => $query
                ->where('username', $author))
        );
    }

    public function category()
    {
        //hasOne , hasMany , belongsTo , benlongsToMany (relationship type)
        return $this->belongsTo(Category::class,'category_id');
    }

    public function author()
    {
        //hasOne , hasMany , belongsTo , benlongsToMany (relationship type)
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        //hasOne , hasMany , belongsTo , benlongsToMany (relationship type)
        return $this->hasMany(Comment::class);
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
