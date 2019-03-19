<?php
/**
 * Created by PhpStorm.
 * User: &_Mahmoud_&
 * Date: 3/17/2019
 * Time: 12:55 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
//    protected $keyType = 'string';//if your primary key not of type int
//    protected $timestamps = false; // if you don't need created at and updated at.
//    protected $dateFormat =  "U"; //to change timestamps formats
//    const CREATED_AT = 'creation_date'; //to change created_at column name;
//    const UPDATED_AT = 'last_update'; //to change updated_at column name;
//    protected $table = "myMeetings";//if your table not a snakeCase and have specified name
    use SoftDeletes;

    protected $fillable= [''];
    protected $attributes=[
        'title'=> '',
        'time'=> '1997-01-01',
        'description'=> '',
        'audits'=> 0,
        'auditsLimit'=> 0,

    ];

}