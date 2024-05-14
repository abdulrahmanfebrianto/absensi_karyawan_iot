<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attendance;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'tag'=> 'A1:56:78:1B',
            'name' => 'Capasitor Tech',
            'username' => 'capasitor',
            'role' => 'admin',
            'password' => bcrypt('12345678')
        ]);

        Post::create([
            'tag'=> '43:25:34:10',
            'name' => 'Intan Permatasari Kurnia',
            'address' =>'Kuala Kapuas',
            'telp' => '089671541211',
            'start' => '2024-03-05',
            'salary' => '100000',
            'holiday_salary' => '200000',
            'image' =>'post-images/p6ZX1VqTwqzM6uS7OHjYYIn3BnPrOVc92S8K2HeT.jpg'
        ]);

        User::create([
            'tag'=> '43:25:34:10',
            'name' => 'Intan Permatasari Kurnia',
            'username' => 'intan',
            'role' => 'karyawan',
            'password' => bcrypt('12345678')
        ]);
        
        User::create([
            'tag'=> '83:25:0D:FE',
            'name' => 'Yono Bakrie',
            'username' => 'yono',
            'role' => 'karyawan',
            'password' => bcrypt('12345678')
        ]);
        
        
        Post::create([
            'tag'=> '83:25:0D:FE',
            'name' => 'Yono Bakrie',
            'address' =>'Malang',
            'telp' => '086172331231',
            'start' => '2024-03-04',
            'salary' => '150000',
            'holiday_salary' => '300000',
            'image' =>'post-images/YPzFTeiZHknEnH8oNFvwpNwMasUBIpcncsmckMDu.jpg'
        ]);

        Post::create([
            'tag'=> 'C5:B1:89:12',
            'name' => 'Lesty Kejora',
            'address' =>'Jakarta',
            'telp' => '08912734190211',
            'start' => '2023-02-07',
            'salary' => '125000',
            'holiday_salary' => '110000',
            'image' =>'post-images/OukPWLNORy7s54QBrg76xGsPrObsPvG1F3WCYpIW.jpg'
        ]);
        
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-02-05',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-05',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-01',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-06',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-07',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-09',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-10',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-15',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-18',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-20',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-22',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-24',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-25',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-26',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-27',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-28',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-29',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-30',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-31',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-02',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-03',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-11',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-12',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-13',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-14',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-16',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-17',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-21',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Masuk',
            'date' => '2024-03-19',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'In',
            'status' =>'Telat',
            'date' => '2024-03-08',
            'time' => '08:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-08',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-19',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-21',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-17',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-16',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-14',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-11',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-12',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-13',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-03',
            'time' => '20:15:28',
        ]);

        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-02',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-31',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-30',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-29',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-28',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-27',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-26',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-25',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-02-05',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-05',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-07',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-01',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-06',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-07',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-09',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-10',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-15',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-18',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-20',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-22',
            'time' => '20:15:28',
        ]);
        Attendance::create([
            'tag'=> '43:25:34:10',
            'information' => 'Out',
            'status' =>'Keluar',
            'date' => '2024-03-24',
            'time' => '20:15:28',
        ]);
        Setting::create([
            'in_start'=> '08:00:00',
            'in_end' => '09:00:00',
            'out_start' =>'20:00:00',
            'out_end' => '21:00:00',
            'fine' => '3500',
            'fuel' => '10000',
        ]);
    }
}
