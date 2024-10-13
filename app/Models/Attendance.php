<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_employees',
        'id_users',
        'date',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'id_employees', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_users', 'id');
    }

    public static function countActiveA()
{
    // Memeriksa tanggal sekarang
    $today = date('Y-m-d');
    
    // Menghitung jumlah data yang diminta ('requested') dan tanggalnya belum lewat hari ini
    $data = Attendance::where('status', 'requested')
                      //->where('date', '=', $today)
                      ->count();
    
    return $data;
}


    public static function countAtt()
    {
        $data = Attendance::where('status', 'Accepted')->count();
        return $data;
        
    }

    public static function countAE()
{
    $userId = Auth::guard('emp')->user()->id;
    $data = Attendance::where('id_employees', $userId)
                      ->where('status', 'Requested')
                      ->count();
    return $data;
}


    

    
    
}


