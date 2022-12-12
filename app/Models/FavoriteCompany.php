<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class FavoriteCompany extends Model
{
    use HasFactory;
    
    public function company()
    {
        return $this->hasOne(Company::class, 'id','company_id');
    }
    
    public function user()
    {
        return $this->hasOne(User::class, 'user_id','id');
    }

}
