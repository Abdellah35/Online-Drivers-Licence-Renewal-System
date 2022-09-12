<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'applicant', 'email','detail','schedule','renewal_form_id',
    ];
    public function appointment(){
        return $this->belongsTo(RenewalForm::class);
    }
}
