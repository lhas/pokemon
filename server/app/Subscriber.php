<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {

    protected $table = 'subscribers';
    protected $fillable = ['name', 'email', 'date_of_birth', 'localization', 'team', 'sex'];

}
