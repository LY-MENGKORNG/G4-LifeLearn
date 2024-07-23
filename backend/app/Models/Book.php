<?php

namespace App\Models;

use App\Traits\UploadFile;
use App\Traits\uploadImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends RelationshipModel
{
    use HasFactory, SoftDeletes, UploadFile, uploadImage;

    protected $fillable = [
        'title',
        'description',
        'author',
        'user_id',
        'published_date',
        'category_id',
        'price',
        'cover',
        'file'
    ];

    public static function list()
    {
        return self::all();
    }

    public static function createOrUpdate($request, $id = null)
    {
        if (!$request->hasFile('cover') || !$request->hasFile('file')) return false;
        $cover = self::saveImage($request->cover);
        $file = self::saveFile($request->file);


        $book =  [
            'author' => $request->author ?? "Unknown",
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id ?? null,
            'cover' => $cover,
            'file' => $file,
            'published_date' => $request->published_date,
            'category_id' => $request->price == 0 ? 1 : 2,
            'price' => $request->price,
        ];

        $book = self::updateOrCreate(['id' => $id], $book);
        return true;
    }
}
