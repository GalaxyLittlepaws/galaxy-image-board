<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--email= : The email for the admin account} {--name= : The name for the admin account}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an initial admin account for the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (User::where('is_admin', true)->exists()) {
            $this->error('An admin account already exists! Use `php artisan tinker` to modify user roles.');
            return 1;
        }

        $email = $this->option('email');
        if (!$email) {
            $email = $this->ask('What is the admin email address?');
        }

        if (User::where('email', $email)->exists()) {
            $this->error("A user with email '{$email}' already exists!");
            return 1;
        }

        $name = $this->option('name');
        if (!$name) {
            $name = $this->ask('What is the admin name?');
        }

        $password = $this->secret('What is the admin password?');
        $passwordConfirm = $this->secret('Confirm the admin password');

        if ($password !== $passwordConfirm) {
            $this->error('Passwords do not match!');
            return 1;
        }

        if (strlen($password) < 8) {
            $this->error('Password must be at least 8 characters!');
            return 1;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);

        $this->info("Admin account created successfully!");
        $this->info("Email: {$user->email}");
        $this->info("Name: {$user->name}");
        $this->info("You can now log in and manage users.");

        return 0;
    }
}
