<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Events\UserSaved;


class User extends Model
{
    use HasFactory,Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'photo'
    ];

    // protected $dispatchesEvents = [
    //     'saved' => UserSaved::class,
    //     // 'updating' => UserDeleted::class,
    // ];

    // public function save(array $options = [])
    // {
    //     parent::save($options);

    //     //Send sms after save
    // }
}

//(id, name, phone, email, photo, created_at, updated_at, deleted_at)
