<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'image',
        'title',
        'content',
        'active'
    ];


    public static function getTitle(string $key): self | null
    {
        $widget = self::where('key', $key)->where('active', 1)->first();

        if ($widget) {
            return $widget;
        }
    }
}
