<?php

namespace App\Models;

use App\Scopes\TaskScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
    use SoftDeletes;
    /**
     * @var string
     */
    public static $PENDING      = 'pending';
    /**
     * @var string
     */
    public static $STARTED      = 'started';
    /**
     * @var string
     */
    public static $COMPLETED    = 'completed';

    protected $table = 'task';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['title','description','employee_id','start_at','end_at','status','created_by'];

    protected $dates = ['start_at','end_at'];

    public function employee()
    {
        return $this->belongsTo(User::class,'employee_id','id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }


    public static function booted()
    {
        self::addGlobalScope(new TaskScope());
    }

}
