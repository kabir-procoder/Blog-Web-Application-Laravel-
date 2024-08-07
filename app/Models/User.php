<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Get Single By Id
    static public function getSingle($id)
    {
        return self::find($id);
    }

    // Get All Admin Record
    static public function allAdminRecord()
    {
        $return = self::select('users.*')
                ->where('isRole', '=', 1)
                ->where('isDelete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(5);
        return $return;
    }

    // Get All Register Record
    static public function allRegisterRecord()
    {
        $return = self::select('users.*')
                ->where('isRole', '=', 0)
                ->where('isDelete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(5);
        return $return;
    }

    // Get All Soft-Delete Record
    static public function allSoftdeleteRecord()
    {
        $return = self::select('users.*')
                ->where('isDelete', '=', 1)
                ->orderBy('id', 'desc')
                ->paginate(2);
        return $return;
    }




}
