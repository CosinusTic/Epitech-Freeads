<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public function getNameAtId(Request $request)
    {
        $name = $request->input('name');
        return $name;
    }

    public function getPasswordAtName(Request $request)
    {
        $password = $request->input("name");
        return $password;
    }


}
