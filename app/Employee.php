<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     *  @var string
     */
    protected $table = 'employees';


    /**
     * @var array
     */
    protected $fillable = [
        'company_id', 'first_name', 'last_name', 'email', 'phone'
    ];

    /**
     * Company has many employees
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
