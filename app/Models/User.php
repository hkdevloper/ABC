<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->type === 'Admin';
        }
        if ($panel->getId() === 'panel') {
            if (!$this->banned) {
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
        return $this->belongsTo(Company::class, 'id', 'user_id');
    }

    public function profile() : HasOne
    {
        return $this->hasOne(Profile::class, 'id', 'user_id');
    }

    public function blogs() : BelongsTo
    {
        return $this->belongsTo(Blog::class, 'id', 'user_id');
    }

    public function deals() : BelongsTo
    {
        return $this->belongsTo(Deal::class, 'id', 'user_id');
    }

    public function events() : BelongsTo
    {
        return $this->belongsTo(Event::class, 'id', 'user_id');
    }

    public function forums() : BelongsTo
    {
        return $this->belongsTo(Forum::class, 'id', 'user_id');
    }

    public function jobs() : BelongsTo
    {
        return $this->belongsTo(Job::class, 'id', 'user_id');
    }

    public function products() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'id', 'user_id');
    }

    public function forumReplies() : BelongsTo
    {
        return $this->belongsTo(ForumReply::class, 'id', 'user_id');
    }

    public function hasRated($type, $item_id) : bool
    {
        $rateReview = RateReview::where('type', $type)->where('item_id', $item_id)->where('user_id', $this->id)->first();
        if($rateReview){
            return true;
        }
        return false;
    }

    public function save(array $options = []): bool
    {
        if($this->email_verified_at){
            $this->email_verified_at = now();
        }
        return parent::save($options);
    }

    public function delete() : bool
    {
        // Don't Delete Admin
        if($this->type === 'Admin'){
            return false;
        }
        $this->company()->delete();
        $this->blogs()->delete();
        $this->deals()->delete();
        // Remove Claimed Events
        foreach (Event::all() as $item){
            $item->claimed_by = null;
            try {
                $item->saveOrFail();
            } catch (\Throwable $e) {
            }
        }

        // Remove Claimed Products
        foreach (Product::all() as $item){
            $item->claimed_by = null;
            try {
                $item->saveOrFail();
            } catch (\Throwable $e) {
            }
        }
        $this->events()->delete();
        $this->forums()->delete();
        $this->jobs()->delete();
        $this->products()->delete();
        $this->forumReplies()->delete();
        return parent::delete();
    }


    public function bookmarkCompanies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, BookmarkCompanies::class, 'user_id', 'company_id');
    }

    public function isCompanyBookmarked(Company $company): bool
    {
        return $this->bookmarkCompanies()->where('company_id', $company->id)->exists();
    }

    public function isCompanyOwner(Company $company): bool
    {
        if(auth()->check()){
            if($company->user_id === $this->company->id){
                return true;
            }
        }
        return false;
    }

}
