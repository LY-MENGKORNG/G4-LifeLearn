<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Frontuser extends RelationshipModel
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions;
    public $guard = 'front';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'profile',
        'last_seen',
        'system_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    
    public static function createOrUpdate($request, $id = null)
    {
        $profile = null;
        if($request->hasFile('profile')){
            $profile = UploadedFile::saveImage($request->profile);
        }
        $user = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone ?? null,
            'profile' => $profile
        ];
        $user = self::updateOrCreate(['id' => $id], $user);
        return $user;
    }
}