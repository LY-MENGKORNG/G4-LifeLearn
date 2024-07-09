<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notification;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Contracts\Role;

class RelationshipModel extends Model
{

    // Belongs to relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function score(): BelongsTo
    {
        return $this->belongsTo(Score::class);
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class);
    }
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    public function calendar(): BelongsTo
    {
        return $this->belongsTo(Calendar::class);
    }

    /// BelongsToMany relationships
    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class);
    // } 

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
    public function class():BelongsTo {
        return $this->belongsTo(Classes::class);
    }
}