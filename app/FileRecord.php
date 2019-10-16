<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toArray()
    {
        return parent::toArray() + [
            'uploadDate' => $this->created_at->format('d/m/Y')
        ];
    }
}
