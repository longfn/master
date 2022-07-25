<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attachment;

class AttachmentSeeder extends Seeder
{
    public function run()
    {
        Attachment::factory()
            ->count(4)
            ->create();
    }
}
