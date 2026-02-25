<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'fee_head_id',
        'month',
        'amount'
    ];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function feeHead()
    {
        return $this->belongsTo(FeeHead::class);
    }
}
