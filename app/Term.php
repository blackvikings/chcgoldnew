<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
	protected $fillable = [
        'name', 'slug', 'status', 'type', 'parent' , 'parent_type', 'description'
    ];
    
    public function children()
    {
    	return $this->hasMany(Term::class, 'parent');
    }

    public function parentcats()
	{
    	return $this->belongsTo(Term::class, 'parent');
	}

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
