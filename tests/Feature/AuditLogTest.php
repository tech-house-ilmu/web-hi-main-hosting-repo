<?php

namespace Tests\Feature;

use App\Filament\Resources\AuditLogResource;
use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuditLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_creation_records_audit_log(): void
    {
        $admin = User::create([
            'name' => 'Superadmin Tech',
            'email' => 'superadmin@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_SUPERADMIN,
            'division' => 'Tech',
            'is_active' => true,
        ]);

        $this->actingAs($admin);

        $newUser = User::create([
            'name' => 'Marketing Staff',
            'email' => 'marketing.staff@houseilmu.id',
            'password' => 'password123',
            'role' => User::ROLE_ADMIN_DIVISI,
            'division' => 'Marketing',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditLog::ACTION_CREATE,
            'subject_type' => 'User',
            'subject_id' => $newUser->id,
        ]);
    }

    public function test_user_role_change_records_audit_log(): void
    {
        $admin = User::create([
            'name' => 'Superadmin Tech',
            'email' => 'superadmin@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_SUPERADMIN,
            'division' => 'Tech',
            'is_active' => true,
        ]);

        $this->actingAs($admin);

        $targetUser = User::create([
            'name' => 'HC Member',
            'email' => 'hc@houseilmu.id',
            'password' => 'password123',
            'role' => User::ROLE_ADMIN_SUB,
            'division' => 'HC',
            'is_active' => true,
        ]);

        $targetUser->update([
            'role' => User::ROLE_ADMIN_DIVISI,
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditLog::ACTION_ROLE_CHANGE,
            'subject_type' => 'User',
            'subject_id' => $targetUser->id,
        ]);
    }

    public function test_user_status_change_records_audit_log(): void
    {
        $admin = User::create([
            'name' => 'Superadmin Tech',
            'email' => 'superadmin@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_SUPERADMIN,
            'division' => 'Tech',
            'is_active' => true,
        ]);

        $this->actingAs($admin);

        $targetUser = User::create([
            'name' => 'Prodev Member',
            'email' => 'prodev@houseilmu.id',
            'password' => 'password123',
            'role' => User::ROLE_ADMIN_DIVISI,
            'division' => 'Prodev',
            'is_active' => true,
        ]);

        $targetUser->update([
            'is_active' => false,
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditLog::ACTION_STATUS_CHANGE,
            'subject_type' => 'User',
            'subject_id' => $targetUser->id,
        ]);
    }

    public function test_approval_and_rejection_logging(): void
    {
        $admin = User::create([
            'name' => 'Superadmin Tech',
            'email' => 'superadmin@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_SUPERADMIN,
            'division' => 'Tech',
            'is_active' => true,
        ]);

        $this->actingAs($admin);

        AuditLog::logApproval('Article #10', 'Disetujui untuk publikasi');
        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditLog::ACTION_APPROVAL,
        ]);

        AuditLog::logRejection('Article #11', 'Thumbnail belum sesuai standar');
        $this->assertDatabaseHas('audit_logs', [
            'action' => AuditLog::ACTION_REJECTION,
        ]);
    }

    public function test_audit_logs_are_immutable(): void
    {
        $log = AuditLog::record('test_action', 'Test initial description');

        // Update should be blocked
        $updated = $log->update(['description' => 'Tampered description']);
        $this->assertFalse($updated);
        $this->assertEquals('Test initial description', $log->fresh()->description);

        // Delete should be blocked
        $deleted = $log->delete();
        $this->assertFalse($deleted);
        $this->assertDatabaseHas('audit_logs', ['id' => $log->id]);
    }

    public function test_superadmin_can_access_audit_logs_in_filament(): void
    {
        $admin = User::create([
            'name' => 'Superadmin Tech',
            'email' => 'superadmin@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_SUPERADMIN,
            'division' => 'Tech',
            'is_active' => true,
        ]);

        $this->actingAs($admin);
        $response = $this->get('/admin/audit-logs');
        $response->assertStatus(200);

        // Disallow create, edit, delete on AuditLogResource
        $this->assertFalse(AuditLogResource::canCreate());
        $this->assertFalse(AuditLogResource::canEdit($admin));
        $this->assertFalse(AuditLogResource::canDelete($admin));
    }

    public function test_non_superadmin_cannot_access_audit_logs(): void
    {
        $divisiAdmin = User::create([
            'name' => 'Marketing Admin',
            'email' => 'marketing@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_ADMIN_DIVISI,
            'division' => 'Marketing',
            'is_active' => true,
        ]);

        $this->actingAs($divisiAdmin);
        $response = $this->get('/admin/audit-logs');
        $response->assertStatus(403);
    }
}
