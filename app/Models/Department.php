<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Department extends Model
{
    use SoftDeletes;


    protected $table = 'department';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];


    public function employees()
    {
        return $this->hasMany(User::class,'department_id','id')->where('type',User::$EMPLOYEE);
    }

}
