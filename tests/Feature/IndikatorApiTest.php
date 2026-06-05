<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndikatorApiTest extends TestCase
{
    public function test_indikator_controller_does_not_use_database_window_function()
    {
        $controller = file_get_contents(app_path('Http/Controllers/Api/IndikatorController.php'));

        $this->assertStringNotContainsString('ROW_NUMBER(', strtoupper($controller));
        $this->assertStringNotContainsString(' OVER ', strtoupper($controller));
    }
}
