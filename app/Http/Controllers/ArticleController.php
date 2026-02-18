<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public static function toBeRevisedCount(): int
{
    return self::whereNull('is_accepted')->count();
}
}
