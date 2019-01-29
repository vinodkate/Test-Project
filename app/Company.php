<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     *  @var string
     */
    protected $table = 'companies';


    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

    /**
     * Company has many employees
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id', 'id');
    }
}
