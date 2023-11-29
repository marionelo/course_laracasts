<?php

namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Self_;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public function __construct(
        public string $title,
        public string $excerpt,
        public string $date,
        public string $body,
        public string $slug
    ){}

    public static function all()
    {
        return collect( File::files( resource_path( "/posts/") ))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                )
                )->sortByDesc("date");
    }

    public static function find(string $slug = '')
    {
        return static::all()->firstWhere("slug", $slug);
    }

    public static function findOrFail(string $slug = '')
    {
        $post =  static::find($slug);

        if(!$post) {
            throw new ModelNotFoundException("Model not found");
        }

        return $post;
    }
}
