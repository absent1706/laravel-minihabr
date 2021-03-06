<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Carbon\Carbon;
use App\UserFollow;
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function starred_articles()
    {
        return DB::table('articles')
                    ->join('stars', 'articles.id', '=', 'stars.article_id')
                    ->join('users', 'users.id', '=', 'stars.user_id')
                    ->where('users.id' , '=', $this->id);
    }

    public function starred($article)
    {
       return (bool)$this->starred_articles()->where('articles.id' , '=', $article->id)->count();
    }

    public function followed_users()
    {
        return $this->belongsToMany('App\User', UserFollow::getTableStatic(), 'follower_id', 'followed_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany('App\User', UserFollow::getTableStatic(), 'followed_user_id', 'follower_id');
    }

    public function follow($user)
    {
        $this->followed_users()->attach($user->id, ['created_at' => Carbon::now()]);

        Activity::create([
            'subject_id'   => $user->id,
            'subject_type' => get_class($user),
            'name'         => 'followed_users',
            'user_id'      => $this->id
        ]);
    }

    public function unfollow($user)
    {
        $this->followed_users()->detach($user->id);
    }

    public function does_follow($user)
    {
        return (bool)$this->followed_users()->find($user->id);
    }

    public function is_followed_by($user)
    {
        return (bool)$this->followers()->find($user->id);
    }

    /**
     * Get the activity timeline for the user.
     *
     * @return mixed
     */
    public function activity()
    {
        return $this->hasMany('App\Activity')
            ->with(['user', 'subject'])
            ->latest();
    }
}
