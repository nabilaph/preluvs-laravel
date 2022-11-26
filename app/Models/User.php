<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'user_username',
    //     'user_email',
    //     'user_password',
    // ];

    protected $guarded = [
        'id'
    ];
    // field mana aja yang boleh diisi

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function book(){
        return $this->hasMany(Book::class);
    }

    public static function ratingtotal($user){

        $rating = Rating::where('user_id', $user->id)
                        ->get();
        
        $meanrating = 0;
        
        if ($rating->count()) {
            $totalrow = $rating->count();
            //dd($totalrow);
            $totalrating = 0;
            
            foreach ($rating as $key => $value) {
                $totalrating = $totalrating + $value->ratingNum;
            }
    
            $meanrating = round(($totalrating / $totalrow), 2);
           
        }      


        return $meanrating;
    }
    
    // public function wishlist(){
    //     return $this->belongsToMany(Book::class, 'wishlists', 'user_id', 'book_id');
    // }
}
