<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class Motor extends Kendaraan
{

    use HasFactory, HasParent;

}