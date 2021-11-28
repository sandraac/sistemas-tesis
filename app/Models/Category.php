<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'category_type',
        'parent_id',
    ];


    public function getRouteKeyName(){
        return 'slug';
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function subcategories(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function has_subcategory(){
        if ($this->subcategories()->count() > 0) {
            return true;
        } else {
            return false;
        }
        
    }
    public function my_store($request){
        $this->create($request->all()+[
            'slug' => Str::slug($request->name, '_')
        ]);
    }
    public function my_update($request){
        $this->update($request->all()+[
            'slug' => Str::slug($request->name, '_')
        ]);
    }
    public function category_type(){
        switch ($this->category_type) {
            case 'PRODUCT':
                return 'Tienda';
            case 'POST':
                return 'Blog';
            default:
                # code...
                break;
        }
    }

    public function products_count(){

        // solucionar 

        $total = 0;
        $total += $this->products()->count();
        
        return $total;
    }

    public function item_numbers(){
        $total = 0;
        if ($this->category_type() == 'Tienda') {
            $total = $this->products_count();
        } else {
            $total = $this->posts->count();
        }
        return $total;
    }

    public function counter_text(){
        if ($this->category_type() == 'Tienda') {
           if ($this->item_numbers() == 1) {
               return 'Producto';
           }else {
                return 'Productos';
           }
        } else {
            if ($this->item_numbers() == 1) {
                return 'Publicación';
            }else {
                 return 'Publicaciones';
            }
        }
    }
}
