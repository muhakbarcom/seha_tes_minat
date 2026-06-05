<?php

namespace Tests\Feature;

use Tests\TestCase;

class ReportPdfTest extends TestCase
{
    public function test_report_controller_ensures_pdf_directory_before_writing_files()
    {
        $controller = file_get_contents(app_path('Http/Controllers/Api/ReportController.php'));

        $this->assertStringContainsString('ensurePdfDirectory', $controller);
        $this->assertMatchesRegularExpression(
            '/ensurePdfDirectory\(\);\s*\R\s*file_put_contents\(public_path\(\'pdf\/\' \. \$filename\), \$output\);/',
            $controller
        );
    }
}
