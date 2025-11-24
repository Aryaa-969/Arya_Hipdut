<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultipleUploads extends Model
{
    protected $table = 'multipleuploads';

    protected $fillable = [
        'file_path',
        'file_name',
        'ref_table',
        'ref_id',
    ];
}
