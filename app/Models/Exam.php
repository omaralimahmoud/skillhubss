<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('score', 'time_mins', 'status')->withTimestamps();
    }
    public function name($lang = null)
    {
        $lang = $lang ??  App::getLocale();
        return json_decode($this->name)->$lang;
    }
    public function desc($lang = null)
    {
        $lang = $lang ??  App::getLocale();
        return json_decode($this->desc)->$lang;
    }
    public function scopeActive($query)

    {
        return $query->Where('active', 1);
    }
}
