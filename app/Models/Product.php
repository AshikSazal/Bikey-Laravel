<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'category',
        'image',
    ];

    public static function booted()
    {
        // When a product is updated
        static::updated(function ($product) {
            // Invalidate cache for all categories and all pages
            $categories = ['all', 'bike', 'parts'];
            $totalPages = ceil(Product::count() / 10); // Adjust the 10 to your pagination size

            foreach ($categories as $category) {
                for ($page = 1; $page <= $totalPages; $page++) {
                    $cacheKey = "products_page_{$page}_category_{$category}";
                    cache()->forget($cacheKey);
                }
            }
        });

        // When a product is created
        static::created(function ($product) {
            // Invalidate cache for all categories and all pages
            $categories = ['all', 'bike', 'parts'];
            $totalPages = ceil(Product::count() / 10); // Adjust the 10 to your pagination size

            foreach ($categories as $category) {
                for ($page = 1; $page <= $totalPages; $page++) {
                    $cacheKey = "products_page_{$page}_category_{$category}";
                    cache()->forget($cacheKey);
                }
            }
        });

        // When a product is deleted
        static::deleted(function ($product) {
            // Invalidate cache for all categories and all pages
            $categories = ['all', 'bike', 'parts'];
            $totalPages = ceil(Product::count() / 10); // Adjust the 10 to your pagination size

            foreach ($categories as $category) {
                for ($page = 1; $page <= $totalPages; $page++) {
                    $cacheKey = "products_page_{$page}_category_{$category}";
                    cache()->forget($cacheKey);
                }
            }
        });
    }
}
