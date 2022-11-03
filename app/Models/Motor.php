<?php
declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Parental\HasParent;

class Motor extends Kendaraan
{

    use HasFactory, HasParent;

}
