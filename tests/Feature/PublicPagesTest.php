<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_public_pages_are_available(): void
    {
        $this->get('/')->assertOk()->assertSee('Secure File Transfer Made Simple');
        $this->get('/pricing')->assertOk()->assertSee('Flexible plans for every user');
        $this->get('/download')->assertOk()->assertSee('Download EZE POST');
    }
}
