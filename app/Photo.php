<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $imageDirectory = '/images/';
    protected $fillable = ['file'];

    public function getFileAttribute($value) {
        return $this->imageDirectory . $value;
    }
}
