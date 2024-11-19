<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdControllerTest extends TestCase
{
    public function test_can_create_ad(): void
    {
        $response = $this->postJson('/api/ads', [
            'title' => 'Test Ad',
            'description' => 'Description of test ad',
            'category' => 'Category1',
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure(['id', 'title', 'description', 'category', 'published_at']);
    }
}
