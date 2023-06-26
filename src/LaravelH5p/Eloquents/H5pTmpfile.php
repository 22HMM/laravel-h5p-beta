<?php

namespace Hareom284\LaravelH5p\Eloquents;

use Illuminate\Database\Eloquent\Model;

class H5pTmpfile extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'path',
        'nonce',
        'created_at',
    ];
}
