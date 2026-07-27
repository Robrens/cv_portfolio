<?php

namespace Tests\Feature;

use Tests\TestCase;

class DashboardAccessTest extends TestCase
{
    public function test_guest_is_redirected_to_dashboard_login(): void
    {
        $this->get('/dashboard')
            ->assertRedirect('/dashboard/login');
    }
}
