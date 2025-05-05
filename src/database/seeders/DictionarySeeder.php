<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dictionary;
use App\Models\User;

class DictionarySeeder extends Seeder
{
    public function run()
    {
        // 「email」からユーザーを取得する
        $user = User::where('email', 'erika@example.com')->first();

        if ($user) {
            Dictionary::create([
                'keyword' => 'りんご',
                'description' => '赤くて甘い果物です。',
                'user_id' => $user->id,
            ]);

            Dictionary::create([
                'keyword' => 'トマト',
                'description' => '赤い野菜で、サラダに使われます。',
                'user_id' => $user->id,
            ]);
        }
    }
}
