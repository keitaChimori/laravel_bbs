<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    // テーブル名
    protected $table = 'messages';
    // 可変項目
    protected $fillable = 
    [
        'name',
        'message',
    ];

    // 投稿全データを取得
    public function scopeAllData($query)
    {
        return $query->where('deleted_at',null)
                     ->orderBy('id','desc')
                     ->get();
    }

}
