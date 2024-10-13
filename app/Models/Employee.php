<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'dob',
        'telephone',
        'username',
        'password',
        'photo',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user()
    {
        return $this->hasMany(user::class);
    }

    public function salaries()
    {
        return $this->hasMany(salary::class);
    }
    public function leave()
    {
        return $this->hasMany(leave::class);
    }

    public function isEmployee()
    {
        return true; // Atau sesuaikan logika ini sesuai dengan kebutuhan Anda
    }

    public function profileImage()
{
    // Jika pengguna memiliki gambar profil, kembalikan URL gambar tersebut
    if ($this->image) {
        return asset('images/' . $this->image);
    }

    // Jika pengguna tidak memiliki gambar profil, kembalikan URL gambar default
    return asset('images/default-profile.png'); // Ganti dengan path dan nama gambar default Anda
}
public static function countEmp()
{
    $totalEmployees = Employee::count();
    return $totalEmployees;
}


}
