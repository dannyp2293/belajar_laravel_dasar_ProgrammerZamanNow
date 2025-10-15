<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_upload_image_post(): void
    {
        // 1️⃣ Siapkan storage palsu (agar tidak menulis file nyata)
        Storage::fake('public');

        // 2️⃣ Buat user palsu dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // 3️⃣ Siapkan file palsu (fake upload)
        $file = UploadedFile::fake()->image('contoh.jpg');

        // 4️⃣ Kirim POST request ke route `posts.store`
        $response = $this->post('/posts', [
            'caption' => 'Foto pertama saya!',
            'image' => $file,
        ]);

        // 5️⃣ Cek redirect berhasil
        $response->assertRedirect('/home');

        // 6️⃣ Cek file benar-benar disimpan
        Storage::disk('public')->assertExists('images/post/' . $file->hashName());

        // 7️⃣ (Opsional) Cek database post tercatat
        // Misal kamu punya relasi post
        // $this->assertDatabaseHas('posts', [
        //     'caption' => 'Foto pertama saya!',
        // ]);
    }
}
