<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public const STATUS_TYPES = [
        'incomplete' => 'Incomplete',
        'pending' => 'Pending',
        'rejected' => 'Rejected',
        'verified' => 'Verified',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Gets the list of contractors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contractors()
    {
        return $this->hasMany(Contractor::class);
    }

    /**
     * Gets a list of kyc docs the user uploaded.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kycDocuments()
    {
        return $this->hasMany(KycDocument::class);
    }

    /**
     * Gets the list of proposals created by this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    /**
     * Gets the list of comments the user created.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'ASC');
    }
}