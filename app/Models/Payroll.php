<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = ['month', 'name', 'tag', 'count', 'holiday', 'late', 'salary', 'holiday_salary', 'bonus', 'total_salary', 'cut','total_transport', 'amount','note'];
    public function post()
    {
        return $this->belongsTo(Post::class, 'name', 'name');
    }
}
