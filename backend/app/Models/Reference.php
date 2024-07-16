<?php

namespace App\Models;

use App\Models\Notificaton;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reference extends RelationshipModel
{
    use HasFactory, SoftDeletes;

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

    public static function list()
    {
        return self::all();
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'reference_id', 'id');
    }

    public static function  saveFile($file, $path = 'documents')
    {
        $fileName = time() . '_' . $file->getClientOriginalName();

        $file->move(public_path($path), $fileName);

        // $image->storeAs($path,$imageName,'public');
        return $fileName;   
    }

    public static function  store($request, $id = null)
    {
        $reference = [
            'user_id' => $request->user()->id,
            'school_name' => $request->school_name,
            'school_address' => $request->school_address,
        ];
        $reference = self::updateOrCreate(['id' => $id], $reference);

        foreach ($request->reference[0] as $file) {
            if ($name = self::saveFile($file)) {
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

        return $reference;
    }
}
