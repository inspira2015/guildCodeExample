<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoanApplicationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/loan_application');
        $response->assertStatus(200);
    }

}
