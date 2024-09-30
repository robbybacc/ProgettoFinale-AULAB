<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['titolo', 'sottotitolo', 'body', 'img', 'user_id', 'category_id', 'is_accepted'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray(){
        return[
            'id' => $this->id,
            'titolo' => $this->titolo,
            'sottotitolo' => $this->sottotitolo,
            'body' => $this->body,
            'category' => $this->category,
        ];
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
