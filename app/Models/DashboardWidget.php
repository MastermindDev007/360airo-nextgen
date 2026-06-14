<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DashboardWidget extends Model
{
    protected $fillable = ['user_id', 'widget_key', 'x', 'y', 'w', 'h'];
}
