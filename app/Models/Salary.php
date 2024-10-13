<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_employees',
        'salary',
        'bonus',
        'date',
        'total',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'id_employees', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_users', 'id');
    }

    public static function countSal()
    {
        // Mendapatkan id pengguna yang sedang login
        $userId = Auth::guard('emp')->user()->id;
    
        // Mendapatkan tanggal awal dan akhir bulan ini
        $startDate = now()->startOfMonth();
        $endDate = now()->endOfMonth();
    
        // Menghitung total gaji yang diproses pada bulan ini
        $totalSalaries = Salary::where('id_employees', $userId)
                               ->whereBetween('date', [$startDate, $endDate])
                               ->sum('total');
    
        return $totalSalaries;
    }
    
}
