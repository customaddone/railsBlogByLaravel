<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function selectEntries()
    {
        /* OR検索でレコードを取り出す時のやり方*/
        $query = Entry::query();
        //　なぜかAuth::user()が使えない
        if (session()->has('msg')) {
            $query->where(function($query){
                $query->where('status', 'draft')->where('user_id',Auth::id())
                ->orWhere('status', 'member_only')
                ->orWhere('status', 'public');
            });
        } else {
            $query->where('status', 'public');
        }
        $entries = $query->get();

        return $entries;
    }
}
