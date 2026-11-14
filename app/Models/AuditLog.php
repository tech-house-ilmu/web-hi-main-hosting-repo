<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditLog extends Model
{
    use HasFactory;

    public const ACTION_CREATE = 'create';
    public const ACTION_UPDATE = 'update';
    public const ACTION_DELETE = 'delete';
    public const ACTION_ROLE_CHANGE = 'role_change';
    public const ACTION_STATUS_CHANGE = 'status_change';
    public const ACTION_APPROVAL = 'approval';
    public const ACTION_REJECTION = 'rejection';

    protected $fillable = [
        'user_id',
        'user_name',
        'division',
        'action',
        'subject_type',
        'subject_id',
        'description',
        'properties',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'properties' => 'array',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Pastikan log audit tidak dapat diubah atau dihapus (immutable).
     */
    protected static function booted(): void
    {
        static::updating(function () {
            return false;
        });

        static::deleting(function () {
            return false;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Catat aktivitas ke dalam audit log.
     */
    public static function record(
        string $action,
        ?string $description = null,
        mixed $subject = null,
        ?array $properties = null,
        ?string $division = null
    ): self {
        $user = auth()->user();

        $userName = $user ? "{$user->name} ({$user->email})" : 'System';
        $userDivision = $division ?? $user?->division;

        $subjectType = null;
        $subjectId = null;
        if ($subject instanceof Model) {
            $subjectType = class_basename($subject);
            $subjectId = $subject->getKey();
        } elseif (is_string($subject)) {
            $subjectType = $subject;
        }

        return static::create([
            'user_id' => $user?->id,
            'user_name' => $userName,
            'division' => $userDivision,
            'action' => $action,
            'subject_type' => $subjectType,
            'subject_id' => $subjectId,
            'description' => $description,
            'properties' => $properties,
            'ip_address' => request()?->ip(),
        ]);
    }

    /**
     * Catat persetujuan (approval) perubahan.
     */
    public static function logApproval(mixed $subject, ?string $notes = null): self
    {
        $subjectName = $subject instanceof Model ? class_basename($subject) . " #{$subject->getKey()}" : (string) $subject;

        return static::record(
            action: self::ACTION_APPROVAL,
            description: "Menyetujui perubahan pada {$subjectName}" . ($notes ? ": {$notes}" : ''),
            subject: $subject,
            properties: ['notes' => $notes, 'status' => 'approved']
        );
    }

    /**
     * Catat penolakan (rejection) perubahan beserta alasannya.
     */
    public static function logRejection(mixed $subject, string $reason): self
    {
        $subjectName = $subject instanceof Model ? class_basename($subject) . " #{$subject->getKey()}" : (string) $subject;

        return static::record(
            action: self::ACTION_REJECTION,
            description: "Menolak perubahan pada {$subjectName}. Alasan: {$reason}",
            subject: $subject,
            properties: ['reason' => $reason, 'status' => 'rejected']
        );
    }
}
