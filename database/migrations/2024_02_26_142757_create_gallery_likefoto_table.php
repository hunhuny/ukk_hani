php artisan make:migration create_gallery_likefoto_table


Perintah ini akan membuat file migration baru di direktori database/migrations.


Menulis Schema Tabel
Buka file migration yang baru saja dibuat. Anda akan mengisi method up() untuk mendefinisikan struktur tabel dan down() untuk menghapus tabel jika migration di-rollback. Modifikasi file tersebut seperti contoh berikut:


<?php


use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;


class CreateGalleryLikefotoTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('gallery_likefoto', function (Blueprint $table) {

            $table->id('like_id'); // Membuat primary key 'like_id'

            $table->unsignedBigInteger('foto_id'); // Menentukan 'foto_id' sesuai dengan tipe di 'gallery_foto'

            $table->foreign('foto_id')->references('foto_id')->on('gallery_foto')->onDelete('cascade'); // Membuat foreign key 'foto_id' yang merujuk ke 'gallery_foto'

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Membuat foreign key 'user_id' yang merujuk ke 'users'

            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' secara otomatis

        });

    }


    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('gallery_likefoto');

    }

}