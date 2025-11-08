<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\AdPublishedEvent;
use App\Events\GenericNotificationEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
        'email_verified_at',
        'phone',
        'fcm_token',
        'verified_at',
        'is_verified',
        'is_banned',
        'banned_at',
        'ban_reason',
        'followers_count',
        'following_count'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'published_at' => 'datetime',
            'password' => 'hashed',
            'verified_at' => 'datetime',
        ];
    }





    /**
     * Accessor: return full image URL if stored path exists
     */
    public function getImageAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        if (is_string($value) && (str_starts_with($value, 'http://') || str_starts_with($value, 'https://') || str_starts_with($value, '/storage/'))) {
            return $value;
        }
        return Storage::url($value);
    }

     public function follow(User $user)
    {
        if (!$this->isFollowing($user)) {
            \DB::transaction(function () use ($user) {
                $this->following()->attach($user);

                $this->increment('following_count');
                $user->increment('followers_count');

                GenericNotificationEvent::dispatch($user,'new_follower',['follower_name' => $this->name]);
            });

        }
    }


    public function unfollow(User $user)
    {
        \DB::transaction(function () use ($user) {
            $this->following()->detach($user);

            $this->decrement('following_count');
            $user->decrement('followers_count');
        });
    }

    /**
     * العلاقة مع المتابعين
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id')
                    ->withTimestamps();
    }

    /**
     * العلاقة مع المتابَعين
     */
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id')
                    ->withTimestamps();
    }

    // للتحقق إذا كان يتابع مستخدم معين
    public function isFollowing($id)
    {
        return $this->following()->where('followed_id', $id)->exists();
    }

    // العلاقة مع الحظورات
  

    // الحصول على آخر حظر فعال
    public function activeBan()
    {
        return $this->bans()->active()->latest()->first();
    }

    // التحقق إذا كان المستخدم محظورًا حالياً
    public function isBanned()
    {
        return $this->is_banned || $this->bans()->active()->exists();
    }

}
