<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\SuccessStory;

class SuccessStorySeeder extends Seeder
{
    public function run(): void
    {
        $members = Member::all();

        foreach ($members as $member) {
            $count = rand(0, 3);

            SuccessStory::factory()
                ->count($count)
                ->create([
                    'member_id' => $member->id,
                ]);
        }
    }
}
