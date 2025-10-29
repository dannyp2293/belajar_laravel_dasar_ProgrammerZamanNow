<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FileControllerTest extends TestCase
{

    public function testUpload(): void
    {
        $picture = UploadedFile::fake()->image(' Danny.png');
        $this->post('/file/upload',[
             'picture' => $picture
           ])->assertSeeText("OK Danny.png");

    }
}
