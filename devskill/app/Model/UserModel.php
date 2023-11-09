<?php 

namespace App\Model;
use DevSkill\Supports\Model;

class UserModel extends Model 
{
    protected string $table = 'users';
    protected array $fields = [
        "name", "email", "phone"
    ];
}