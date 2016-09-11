<?php
namespace App\Core;

use Illuminate\Database\Eloquent\Model;
use App;
/**
 * 各Eloquent 的抽象核心
 */
abstract class Eloquent extends Model
{
    /**
     * 透過名稱直接搜尋
     */
    public static function findName($name)
    {
        $instance = new static;
        return $instance->where('name', $name)->first();
    }

    /**
     * 透過Slug直接搜尋
     */
    public static function findSlug($slug)
    {
        $instance = new static;
        return $instance->where('slug', $slug)->first();
    }
}
