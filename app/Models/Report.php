<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'report_name',
        'report_type',
        'created_by',
        'date_generated',
        'file_path',
        'filters'
    ];

    protected $casts = [
        'filters' => 'array',
        'date_generated' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
