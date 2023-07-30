<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->boolean('approved')->default(false);
            $table->boolean('taxable')->default(false);
            $table->boolean('banned')->default(false);
            $table->boolean('email_verified')->default(false);
            $table->string('banned_reason', 500)->nullable();
            $table->string('balance')->default(0);
            $table->foreignId('user_group_id')->nullable()->constrained('user_group');
            $table->rememberToken();
            $table->timestamps();
        });
        // dummy usernames
        $usernames = ['jack', 'John', 'joe', 'jim', 'james', 'jane', 'jill', 'jessica', 'julie', 'jennifer', 'josh', 'jordan', 'jacob', 'jake', 'jason', 'julian', 'joseph', 'jared', 'jenna', 'juliana', 'juliet', 'julio', 'julius', 'juliana', 'juliette', 'julianne', 'julis', 'julissa', 'julietta'];

        $records = [];
        foreach ($usernames as $username) {
            $records[] = [
                'first_name' => $usernames[array_rand($usernames)],
                'last_name' => $usernames[array_rand($usernames)],
                'email' => $username . rand(101, 999) . '@mail.com',
                'password' => bcrypt($username),
                'email_verified' => true,
                'user_group_id' => 2,
                'approved' => true,
                'taxable' => true,
                'banned' => false,
                'banned_reason' => null,
                'balance' => 0,
            ];
        }

        DB::table('users')->insert($records);

        // Insert Demo Admin and Demo SelectUser
        DB::table('users')->insert(
            [
                [
                    'first_name' => 'Demo',
                    'last_name' => 'Admin',
                    'email' => 'admin@mail.com',
                    'password' => bcrypt('admin'),
                    'email_verified' => true,
                    'user_group_id' => 1,
                    'approved' => true,
                    'taxable' => true,
                    'banned' => false,
                    'banned_reason' => null,
                    'balance' => 0,
                ],
                [
                    'first_name' => 'Demo',
                    'last_name' => 'SelectUser',
                    'email' => 'user@mail.com',
                    'password' => bcrypt('user'),
                    'email_verified' => true,
                    'user_group_id' => 2,
                    'approved' => true,
                    'taxable' => true,
                    'banned' => false,
                    'banned_reason' => null,
                    'balance' => 0,
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
