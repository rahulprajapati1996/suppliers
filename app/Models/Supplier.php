<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['name', 'latter', 'country_id', 'contact_number', 'status', 'email_address', 'complete_url', 'terminate_url', 'quotafull_url', 'security_term_url', 'panel_size'];
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
}
