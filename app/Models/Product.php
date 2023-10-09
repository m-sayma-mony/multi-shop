<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public static $product, $image, $path, $imageName;

    public static function saveProduct($request){
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->description = $request->description;
        self::$product->price = $request->price;
        self::$product->image = self::getImage($request);
        
        self::$product->save();
    }

    public static function getImage($request){
        self::$image = $request->file('image');
        self::$path = 'assets/product-images';
        self::$imageName = time().rand().'.'.self::$image->getClientOriginalExtension();

        self::$image->move(self::$path, self::$imageName);
        self::$product->image = self::$path.self::$imageName;

        return self::$product->image;
    }
}
