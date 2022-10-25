<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
class ProjectLink extends Model
{
    protected $fillable = [
        'project_id',
        'project_name',
        'cpi',
        'loi',
        'ir',
        'completes',
        'status',
        'country_id',
        'notes',
        'client_live_url'
    ];
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
    public function project(){
        return $this->hasOne(Project::class,'id','project_id');
    }
}
