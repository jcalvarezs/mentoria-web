<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    //public $fillable = ['title', 'resumen', 'body'];

    //sin proteger ninguna propiedad
    //public $guarded = [];
    //proteger id
    //public $guarded = ['id'];
    protected $guarded = ['id'];
    public $with = ['category', 'author'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        //usando la forma when 
        $query->when(
            $filters['search'] ?? false, //corregido
            //isset($filters['search']), //esto no va!!
            fn ($query, $search) =>
            $query->where('title', 'like', "%$search%")
                    ->orWhere('resumen', 'like', "%$search%"));

        // return $query->when(
        //     $filters['category'] ?? false, //corregido
        //     fn ($query, $category) =>
        //         $query
        //             ->whereExists(function($query) {
        //             $query
        //                 ->from('categories')
        //                 ->whereColumn('categories.id', 'posts.category_id')
        //         })      ->where('categories.slug', $category)
        // );

        return $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query ->WhereHas('category', fn($query) =>
            $query ->Where('slug', $category))
        );

        //return $query;

    //    if (request('search')) {
    //     if (isset($filters['search'])) {       
    //         //agregar las condiciones de busqueda
    //         return $query->where('title', 'like', '%' . $filters['search'] . '%')
    //                 ->orWhere('resumen', 'like', '%' . $filters['search'] . '%');
    //     }
    //     }


    }


    //relation: hasone, hasMany, belongsTo, belongsToMany
    public function category()
    {
        //nombre clase la primera con mayuscula
        return $this->belongsTo(Category::class);
    }   

    //modifica de user a author, laravel supone que en bd el campo es author_id
    //para que no suceda esto, belong tiene como campo opcional paso de llave foranea
    //en este caso user_id 
    //public function user()
    public function author()
    {
        //Post pertenece a un usuario
        //return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'user_id');
    }   

}