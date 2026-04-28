<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Instrument;
use App\Models\Rhythm;
use App\Models\Maqam;
use App\Models\GameSession;
use App\Models\GameRound;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@naway.com',
            'role' => 'admin',
        ]);

        $users = User::factory(10)->create();

        $genres = Genre::factory(10)->create();
        $artists = Artist::factory(30)->create();
        $instruments = Instrument::factory(20)->create();
        $rhythms = Rhythm::factory(10)->create();
        $maqams = Maqam::factory(20)->create();

        foreach ($users->random(5) as $user) {
            $sessions = GameSession::factory(2)->create(['user_id' => $user->id]);
            foreach ($sessions as $session) {
                GameRound::factory(5)->create([
                    'session_id' => $session->id,
                    'maqam_id' => $maqams->random()->id,
                ]);
            }
        }

        foreach ($artists as $artist) {
            $comments = Comment::factory(3)->create([
                'user_id' => $users->random()->id,
                'entity_id' => $artist->id,
                'entity_type' => Artist::class,
            ]);
            foreach ($comments as $comment) {
                $likers = $users->random(rand(0, 3));
                foreach ($likers as $liker) {
                    Like::factory()->create([
                        'user_id' => $liker->id,
                        'likeable_id' => $comment->id,
                        'likeable_type' => Comment::class,
                    ]);
                }
            }
        }

        for ($i = 0; $i < 3; $i++) {
            $userOne = $users->random();
            $userTwo = $users->where('id', '!=', $userOne->id)->random();
            
            $conversation = Conversation::firstOrCreate([
                'user_one_id' => min($userOne->id, $userTwo->id),
                'user_two_id' => max($userOne->id, $userTwo->id),
            ]);

            Message::factory(5)->create([
                'conversation_id' => $conversation->id,
                'sender_id' => rand(0, 1) ? $userOne->id : $userTwo->id,
            ]);
        }
    }
}
