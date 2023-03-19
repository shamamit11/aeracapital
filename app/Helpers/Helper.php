<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class Helper
{
    public static function youtube($video)
    {
        $pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
        preg_match($pattern, $video, $matches);
        return (isset($matches[1])) ? $matches[1] : '';
    }

    public static function getUUID()
    {
        return (string) Str::uuid();
    }

    public static function getMax($table_name, $field_name)
    {
        return DB::table($table_name)->max($field_name) + 1;
    }

    public static function encode_param($param)
    {
        return Crypt::encryptString($param);
    }

    public static function decode_param($param)
    {
        return Crypt::decryptString($param);
    }

    public static function getSlug($table_name, $field_name, $title, $id = 0, $id_name = 'id')
    {
        $slug_name = Str::slug($title);
        $slug_name = ($slug_name) ? $slug_name : time();
        $ras = DB::table($table_name)->where($id_name, '<>', $id)->where($field_name, $slug_name)->first();
        $slug = ($ras) ? $slug_name . "-" . time() : $slug_name;
        return $slug;
    }

    public static function getRatingStar($num) {
        switch($num) {
            case 1:
                $star = "★☆☆☆☆";
                break;
            case 2:
                $star = "★★☆☆☆";
                break;
            case 3:
                $star = "★★★☆☆";
                break;
            case 4:
                $star = "★★★★☆";
                break;
            case 5:
                $star = "★★★★★";
                break;
            default:
                $star = "☆☆☆☆☆";
        }
        return $star;
    }

    public static function getPageLocation($val) {
        switch($val) {
            case 'home':
                $res = "Home Page";
                break;
            case 'about':
                $res = "About Page";
                break;
            case 'service':
                $res = "Service Page";
                break;
            case 'product':
                $res = "Product Page";
                break;
            case 'blog':
                $res = "Blog Page";
                break;
            case 'contact':
                $res = "Contact Page";
                break;
            default:
                $res = "Default";
        }
        return $res;
    }
}