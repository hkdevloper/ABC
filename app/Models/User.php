<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->type === 'Admin';
        }
        if ($panel->getId() === 'user') {
            if ($this->approved && !$this->banned) {
                return $this->type === 'user';
            }
        }
        return false;
    }

    public function canManageSettings(): bool
    {
        if($this->type === 'Admin'){
            return true;
        }
        $company = Company::where('user_id', $this->id)->orderBy('created_at', 'desc')->first();
        if($company){
            if($company->is_approved){
                return true;
            }
        }
        return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'approved',
        'taxable',
        'banned',
        'banned_reason',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'approved' => 'boolean',
        'taxable' => 'boolean',
        'banned' => 'boolean',
        'balance' => 'decimal:2',
    ];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'user_id', 'id');
    }

    public function profile() : HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function blogs() : BelongsTo
    {
        return $this->belongsTo(Blog::class, 'user_id', 'id');
    }

    public function deals() : BelongsTo
    {
        return $this->belongsTo(Deal::class, 'user_id', 'id');
    }

    public function events() : BelongsTo
    {
        return $this->belongsTo(Event::class, 'user_id', 'id');
    }

    public function forums() : BelongsTo
    {
        return $this->belongsTo(Forum::class, 'user_id', 'id');
    }

    public function jobs() : BelongsTo
    {
        return $this->belongsTo(Job::class, 'user_id', 'id');
    }

    public function products() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'user_id', 'id');
    }

    public function forumReplies() : BelongsTo
    {
        return $this->belongsTo(ForumReply::class, 'user_id', 'id');
    }

    public function delete() : bool
    {
        $this->company()->delete();
        $this->blogs()->delete();
        $this->deals()->delete();
        $this->events()->delete();
        $this->forums()->delete();
        $this->jobs()->delete();
        $this->products()->delete();
        $this->forumReplies()->delete();
        return parent::delete();
    }


}
