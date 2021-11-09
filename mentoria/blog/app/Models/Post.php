<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public $fillable = ['title', 'resumen', 'body'];
    protected $guarded = ['id'];
    public $with = ['category', 'author'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
         
        if ($filters['search'] ?? false) {       
                  return $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('resumen', 'like', '%' . $filters['search'] . '%');
        }
        
    }

     public function category()
    {
        return $this->belongsTo(Category::class);
    }   

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }   
}