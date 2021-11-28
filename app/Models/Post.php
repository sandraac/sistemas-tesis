<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'status',
        'excerpt',
        'body',
        'category_id',
        'iframe',
        'published_at',
    ];
    protected $dates = ['published_at'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function my_store($request){
        $post = self::create($request->all()+[
            'slug' => Str::slug($request->title, '_'),
        ]);
        return $post;
    }
    public function my_update($request){
      
        if ($request->published_at) {
            $this->update($request->all()+[
                'slug' => Str::slug($request->title, '_'),
            ]);
        }else{
            $request->merge([
                'published_at' => Carbon::now(),
            ]);
            $this->update($request->all()+[
                'slug' => Str::slug($request->title, '_'),
            ]);
        }
        
        $this->tags()->sync($request->get('tags'));
    }
    public function status(){
        switch ($this->status) {
            case 'DRAFT':
                return [
                    'color' => 'secondary',
                    'text' => 'borrador'
                ];
            case 'PUBLIC':
                return [
                    'color' => 'success',
                    'text' => 'público'
                ];
            case 'HIDDEN':
                return [
                    'color' => 'warning',
                    'text' => 'oculto'
                ];
            case 'PROGRAM':
                return [
                    'color' => 'primary',
                    'text' => 'programado'
                ];
            
            default:
                # code...
                break;
        }
    }
}
