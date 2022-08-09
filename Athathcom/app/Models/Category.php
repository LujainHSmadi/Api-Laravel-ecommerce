<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // One level child
    public function child() {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    // Recursive children
    public function children() {
        return $this->hasMany(Category::class, 'parent_category_id')->with('children');
    }

    // One level parent
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    // Recursive parents
    public function parents() {
        return $this->belongsTo(Category::class, 'parent_category_id')->with('parent');
    }
}
