<?php

namespace App\Console\Commands;

use App\Models\Album;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Todo;

class FetchApiData extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'fetch:api-data';

    /**
     * The console command description.
     */
    protected $description = 'Fetch data from API and store in database';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $this->fetchUsers();
        $this->fetchPosts();
        $this->fetchComments();
        $this->fetchAlbums();
        $this->fetchPhotos();
        $this->fetchTodos();
    }
    private function fetchPosts()
    {
        $this->info('Fetching posts...');

        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if (!$response->successful()) {
            $this->error('Failed to fetch posts');
            return;
        }

        collect($response->json())->each(function ($post) {
            Post::updateOrCreate(
                ['id' => $post['id']],
                [
                    'user_id' => $post['userId'],
                    'title' => $post['title'],
                    'body' => $post['body'],
                ]
            );
        });

        $this->info('Posts inserted successfully!');
    }
    private function fetchUsers()
    {
        $this->info('Fetching users...');

        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        if (!$response->successful()) {
            $this->error('Failed to fetch users');
            return;
        }

        collect($response->json())->each(function ($user) {
            User::updateOrCreate(
                ['id' => $user['id']],
                [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => bcrypt('password'),
                ]
            );
        });

        $this->info('Users inserted successfully!');
    }
    private function fetchComments()
    {
        $this->info('Fetching comments...');

        $response = Http::get('https://jsonplaceholder.typicode.com/comments');
        logger($response);
        if (!$response->successful()) {
            $this->error('Failed to fetch comments');
            return;
        }

        collect($response->json())->each(function ($comment) {
            Comment::updateOrCreate(
                ['id' => $comment['id']],
                [
                    'post_id' => $comment['postId'],
                    'name' => $comment['name'],
                    'email' => $comment['email'],
                    'body' => $comment['body'],
                ]
            );
        });

        $this->info('Comments inserted successfully!');
    }

    private function fetchAlbums()
    {
        $this->info('Fetching albums...');

        $response = Http::get('https://jsonplaceholder.typicode.com/albums');

        if (!$response->successful()) {
            $this->error('Failed to fetch albums');
            return;
        }

        collect($response->json())->each(function ($album) {
            Album::updateOrCreate(
                ['id' => $album['id']],
                [
                    'user_id' => $album['userId'],
                    'title' => $album['title'],
                ]
            );
        });

        $this->info('Albums inserted successfully!');
    }
    private function fetchPhotos()
    {
        $this->info('Fetching photos...');

        $response = Http::get('https://jsonplaceholder.typicode.com/photos');

        if (!$response->successful()) {
            $this->error('Failed to fetch photos');
            return;
        }

        collect($response->json())->each(function ($photo) {
            Photo::updateOrCreate(
                ['id' => $photo['id']],
                [
                    'album_id' => $photo['albumId'],
                    'title' => $photo['title'],
                    'url' => $photo['url'],
                    'thumbnail_url' => $photo['thumbnailUrl'],
                ]
            );
        });

        $this->info('Photos inserted successfully!');
    }
    private function fetchTodos()
    {
        $this->info('Fetching todos...');

        $response = Http::get('https://jsonplaceholder.typicode.com/todos');

        if (!$response->successful()) {
            $this->error('Failed to fetch todos');
            return;
        }

        collect($response->json())->each(function ($todo) {
            Todo::updateOrCreate(
                ['id' => $todo['id']],
                [
                    'user_id' => $todo['userId'],
                    'title' => $todo['title'],
                    'completed' => $todo['completed'],
                ]
            );
        });

        $this->info('Todos inserted successfully!');
    }
}
