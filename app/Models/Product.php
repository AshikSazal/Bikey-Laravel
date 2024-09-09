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
            // Determine the current page or clear all pages
            $currentPage = request()->get('page', 1);
            $cacheKey = 'products_page_' . $currentPage;

            cache()->forget($cacheKey);
        });

        // When a product is created
        static::created(function ($product) {
            // Invalidate cache for all pages or relevant pages
            $totalPages = ceil(Product::count() / 10); // Adjust the 10 to your pagination size
            for ($page = 1; $page <= $totalPages; $page++) {
                $cacheKey = 'products_page_' . $page;
                cache()->forget($cacheKey);
            }
        });

        // When a product is deleted
        static::deleted(function ($product) {
            // Invalidate cache for all pages or relevant pages
            $totalPages = ceil(Product::count() / 10); // Adjust the 10 to your pagination size
            for ($page = 1; $page <= $totalPages; $page++) {
                $cacheKey = 'products_page_' . $page;
                cache()->forget($cacheKey);
            }
        });
    }
}
