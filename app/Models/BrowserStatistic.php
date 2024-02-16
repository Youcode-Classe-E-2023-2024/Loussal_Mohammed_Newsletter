<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BrowserStatistic extends Model
{
    protected $table = 'browser_statistics';
    protected $fillable = ['browser', 'count'];
}

