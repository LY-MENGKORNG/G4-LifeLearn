<?php

namespace App\Models;

use App\Models\Notificaton;
use App\Traits\UploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends Model
{
    use HasFactory, SoftDeletes, UploadFile;
    protected $fillable = [
        'user_id',
        'school_name',
        'school_address',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function list()
    {
        return self::all();
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'reference_id', 'id');
    }

    public static function  store($request, $id = null)
    {
        return ($request->reference);
        // return $request;

        $reference = [
            'user_id' => $request->user()->id,
            'school_name' => $request->school_name,
            'school_address' => $request->school_address,
        ];
        $reference = self::updateOrCreate(['id' => $id], $reference);
        if ($request->reference) {

            if ($name = UploadFile::saveFile($request->reference)) {
                $document = [
                    'name' => $name,
                    'reference_id' => $reference->id
                ];
                Document::create($document);
            }
        }

        Notificaton::create([
            'user_id' => $request->user()->id,
            'description' => $request->description
        ]);

        // return $reference;
    }
}
