<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  		DB::table('admins')->insert([
  		'name' => 'admin #1',
  		'email' => 'admin@kmitl.ac.th',
      'password' => bcrypt('123456'),
  		'created_at' => date('Y-m-d H:i:s')
  		]);

      DB::table('users')->insert([
  		'gender' => 'ชาย',
  		'email' => 'saral@kmitl.ac.th',
      'password' => bcrypt('123456'),
      'fname' => 'สรัล',
      'lname' => 'แขดวง',
      'address' => 'หอ FBT',
      'year' => '2557',
      'faculty' => 'IT',
      'degree' => 'ตรี',
      'line_id' => 'saral012',
      'studentcard_id' => '57070123',
      'donate_point' => '0',
      'accept_status' => '1',
  		'created_at' => date('Y-m-d H:i:s'),
      'image_id' => 'storage/image/57070123/CardID_57070123.jpg',
      'image_profile' => 'storage/image/57070123/ProfilePic_57070123.jpg'
  		]);
      // $this->call(UsersTableSeeder::class);
      DB::table('auction_products')->insert([
  		'title' => 'volt meter',
  		'description' => 'just a ordinary volt meter',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-03-14 23:59:00',
      'bid_step' => '50',
      'price' => '20',
      'images' => '["3327.jpg","3355.jpg"]',
      'user_id' => '1'
  		]);
    }

}
