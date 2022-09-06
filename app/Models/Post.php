<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'content', 'category_id', 'image', 'tag_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }

    /**
     * @param Request $request
     * @return string|null
     */
    public static function uploadImage(Request $request, $image = null): ?string
    {
        if ($request->hasFile('image')) {
            if (!empty($image)) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('image')->store($folder);
        }
        return null;
    }

    /**
     * Search posts
     * @param $search
     * @return mixed
     */
    public static function findS(string $search)
    {
        return static::where('title', 'LIKE', "%$search%")->with('category')->orderByDesc('id');
    }

    public function defaultImage()
    {
        if (!$this->image) {
            return asset('public/no-image.png');
        }
        return asset('public/uploads/images/' . $this->image);
    }

    /**
     * @return string
     */
    public function getPostDate(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F Y');
    }
}
