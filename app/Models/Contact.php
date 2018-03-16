<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contact
 *
 * Contacts model class
 *
 * @author Jagadeesh Battula jagadeesh@goftx.com
 * @package App
 */
class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];

}
