<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // 書かないとMassAssignmentExceptionが出る
    protected $guarded = array('id');

    public function scopeVisible($query, $str)
    {
        // $queryは矢印の根元側のやつ
        return $query->orderBy($str, 'desc')->limit(5);
    }
}
