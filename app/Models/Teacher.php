<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public $guarded = [];

    public function fullName ()
    {
        return "{$this->nume} {$this->initiala}. {$this->prenume}";
    }

    public function fullNameWithoutInitial ()
    {
        return "{$this->nume} {$this->prenume}";
    }
}
