<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');           // data creazione
            $table->string('title');            // titolo
            $table->text('text');             // testo posto
            $table->smallInteger('featured'); // post in evidenza
            $table->foreignIdFor(User::class);   // collegamento con utente che crea il post
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
