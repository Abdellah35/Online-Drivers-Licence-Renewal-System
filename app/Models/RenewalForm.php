<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'fname','lname','phone','email','issueby','issuedate','expire','birth','address','licence','photo','medical','status'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function schedule(){
        return $this->hasOne(Schedule::class);
    }

}
