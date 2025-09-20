<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model {
    protected $table = 'frontuser';

    public function getPhotoBase64Attribute()
    {
        if ($this->photo) {
            // Konversi data binary ke base64
            return 'data:image/jpeg;base64,' . base64_encode($this->photo);
        }

        return null;
    }

    public static function find($slug): array{
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);
    
        if(!$post){
            abort(404);
        }
    
        return $post;
    }
};