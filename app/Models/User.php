<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property-read $full_name
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    public static $ADMIN = 'admin';
    public static $EMPLOYEE = 'employee';
    public static $MANAGER = 'manager';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fname', 'lname', 'image_path','salary','manager_id','department_id','type','phone','email', 'password',];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return trim($this->fname. ' '.$this->lname);
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id')->withDefault();
    }

    public function manager()
    {
        return $this->belongsTo(User::class,'manager_id','id')->withDefault();
    }


}
