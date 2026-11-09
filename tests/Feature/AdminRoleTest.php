<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminRoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_superadmin_can_access_admin_panel(): void
    {
        $superadmin = User::create([
            'name' => 'Superadmin Tech',
            'email' => 'superadmin@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_SUPERADMIN,
            'division' => 'Tech',
            'is_active' => true,
        ]);

        $this->actingAs($superadmin);
        $response = $this->get('/admin');
        $response->assertStatus(200);

        $usersResponse = $this->get('/admin/users');
        $usersResponse->assertStatus(200);
    }

    public function test_admin_divisi_can_access_admin_panel(): void
    {
        $adminDivisi = User::create([
            'name' => 'Admin Marketing',
            'email' => 'marketing@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_ADMIN_DIVISI,
            'division' => 'Marketing',
            'is_active' => true,
        ]);

        $this->actingAs($adminDivisi);
        $response = $this->get('/admin');
        $response->assertStatus(200);

        // User management is restricted to superadmin only
        $usersResponse = $this->get('/admin/users');
        $usersResponse->assertStatus(403);
    }

    public function test_admin_sub_can_access_admin_panel(): void
    {
        $adminSub = User::create([
            'name' => 'Admin Sub Tech',
            'email' => 'subtech@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_ADMIN_SUB,
            'division' => 'Tech',
            'subrole' => 'Front End Developer',
            'is_active' => true,
        ]);

        $this->actingAs($adminSub);
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    public function test_inactive_admin_is_denied_access(): void
    {
        $inactiveAdmin = User::create([
            'name' => 'Inactive Admin',
            'email' => 'inactive@houseilmu.id',
            'password' => 'secret123',
            'role' => User::ROLE_ADMIN_DIVISI,
            'division' => 'HC',
            'is_active' => false,
        ]);

        $this->actingAs($inactiveAdmin);
        $response = $this->get('/admin');
        $response->assertStatus(403);
    }
}
