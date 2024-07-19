<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getGenderAttribute($value)
    {
        switch ($value) {
            case 1:
                return '男性';
                break;
            case 2:
                return '女性';
                break;
            case 3:
                return 'その他';
                break;
        }
    }

    public function setGenderAttribute($value)
    {
        switch ($value) {
            case '男性':
                $this->attributes['gender'] = 1;
                break;
            case '女性':
                $this->attributes['gender'] = 2;
                break;
            case 'その他':
                $this->attributes['gender'] = 3;
                break;
            default:
                $this->attributes['gender'] = $value;
        }
    }

    public function scopeNameOrEmailSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (empty($gender) || $gender === '0') {
            return $query;
        }

        $query->where('gender', $gender);
    }

    public function scopeCategorySearch($query, $category)
    {
        if (!empty($category)) {
            $query->where('category_id', $category);
        }
    }

    public function scopeDateSearch($query, $date)
    {
        if (!empty($date)) {
        $query->whereDate('created_at', $date);
        }
    }
}
