<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //
    protected $table = "questions";
    // protected $fillable = ["judul", "isi"];
    protected $guarded = [];
}
