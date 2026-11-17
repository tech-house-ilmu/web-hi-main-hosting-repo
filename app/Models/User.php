<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_SUPERADMIN = 'superadmin';
    public const ROLE_ADMIN_DIVISI = 'admin_divisi';
    public const ROLE_ADMIN_SUB = 'admin_sub';

    public const DIVISIONS = [
        'Marketing' => 'Marketing',
        'Partnership' => 'Partnership',
        'HC' => 'HC',
        'Prodev' => 'Prodev',
        'Tech' => 'Tech',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_active' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'role',
        'division',
        'subrole',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::created(function (User $user) {
            AuditLog::record(
                action: AuditLog::ACTION_CREATE,
                description: "Membuat akun admin baru: {$user->email} (Role: " . ($user->role ?? 'admin') . ")",
                subject: $user,
                properties: [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'division' => $user->division,
                    'subrole' => $user->subrole,
                    'is_active' => $user->is_active,
                ]
            );
        });

        static::updated(function (User $user) {
            $changes = $user->getChanges();
            unset($changes['updated_at'], $changes['remember_token'], $changes['password']);

            if (empty($changes)) {
                return;
            }

            $old = [];
            foreach ($changes as $key => $newValue) {
                $old[$key] = $user->getOriginal($key);
            }

            $action = AuditLog::ACTION_UPDATE;
            $desc = "Memperbarui informasi akun: {$user->email}";

            if (array_key_exists('role', $changes)) {
                $action = AuditLog::ACTION_ROLE_CHANGE;
                $oldRole = $old['role'] ?? '-';
                $newRole = $changes['role'] ?? '-';
                $desc = "Mengubah role {$user->email} dari '{$oldRole}' ke '{$newRole}'";
            } elseif (array_key_exists('is_active', $changes)) {
                $action = AuditLog::ACTION_STATUS_CHANGE;
                $statusText = $changes['is_active'] ? 'Aktif' : 'Nonaktif';
                $desc = "Mengubah status akun {$user->email} menjadi {$statusText}";
            }

            AuditLog::record(
                action: $action,
                description: $desc,
                subject: $user,
                properties: [
                    'old' => $old,
                    'new' => $changes,
                ]
            );
        });

        static::deleted(function (User $user) {
            AuditLog::record(
                action: AuditLog::ACTION_DELETE,
                description: "Menghapus akun admin: {$user->email}",
                subject: $user,
                properties: [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'division' => $user->division,
                ]
            );
        });
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === self::ROLE_SUPERADMIN || ((bool) $this->is_admin && empty($this->role));
    }

    public function isAdminDivisi(): bool
    {
        return $this->role === self::ROLE_ADMIN_DIVISI;
    }

    public function isAdminSub(): bool
    {
        return $this->role === self::ROLE_ADMIN_SUB;
    }

    /**
     * Determine whether the user can access the Filament panel.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->is_active === false) {
            return false;
        }

        if ($this->is_admin) {
            return true;
        }

        return in_array($this->role, [
            self::ROLE_SUPERADMIN,
            self::ROLE_ADMIN_DIVISI,
            self::ROLE_ADMIN_SUB,
        ], true);
    }
}
