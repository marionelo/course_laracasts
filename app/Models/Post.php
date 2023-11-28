<?php

namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Post
{


    public static function all()
    {
        $files = File::files( resource_path( "/posts/") );

        return array_map(fn($file) =>  $file->getContents(), $files);
    }

    public static function find(string $slug = '')
    {
        if ( !file_exists( $path = resource_path( "/posts/{$slug}.html") ) ) {
            throw new ModelNotFoundException();
        }

        return Cache::remember(
            "posts.$slug",
            now()->addSeconds(10),
            fn() => file_get_contents($path)
        );
    }
}
