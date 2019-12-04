<?php

use Illuminate\Database\Seeder;

class PhotoLibraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $display_status_id = config('contants.display_status_display');
        $photos = [
            // danh muc 1
            [
                'image' => 'img-nail-1.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-2.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-3.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-4.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-5.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-6.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-7.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-8.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            [
                'image' => 'img-nail-9.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 1,
            ],
            // danh muc 2
            [
                'image' => 'img-mi-1.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-2.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-3.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-4.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-5.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-6.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-7.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-8.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            [
                'image' => 'img-mi-9.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 2,
            ],
            //danh muc 3
            [
                'image' => 'img-long-may-1.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-2.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-3.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-4.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-5.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-6.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-7.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-8.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            [
                'image' => 'img-long-may-9.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 3,
            ],
            //danh muc 4
            [
                'image' => 'img-moi-1.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-2.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-3.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-4.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-5.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-6.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-7.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-8.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
            [
                'image' => 'img-moi-9.png',
                'display_status_id'  => $display_status_id,
                'type_of_service_id'   => 4,
            ],
        ];

        DB::table('photo_library')->insert($photos);
    }
}
