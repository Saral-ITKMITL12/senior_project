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
  		'email' => 'saral.itkmitl@gmail.com',
      'password' => bcrypt('123456'),
      'fname' => 'สรัล',
      'lname' => 'แขดวง',
      'address' => 'หอ FBT',
      'year' => '2557',
      'faculty' => 'เทคโนโลยีสารสนเทศ',
      'degree' => 'ตรี',
      'line_id' => 'saral012',
      'studentcard_id' => '57070123',
      'donate_point' => '0',
      'accept_status' => '1',
  		'created_at' => date('Y-m-d H:i:s'),
      'image_id' => 'storage/image/57070123/CardID_57070123.jpg',
      'image_profile' => 'storage/image/57070123/ProfilePic_57070123.jpg'
      ]);
      DB::table('users')->insert([
  		'gender' => 'หญิง',
  		'email' => 'supannada@kmitl.ac.th',
      'password' => bcrypt('123456'),
      'fname' => 'สุพัณณดา',
      'lname' => 'โชติพันธ์',
      'address' => 'ชั้น 6 คณะเทคโนโลยีสารสนเทศ',
      'year' => '2557',
      'faculty' => 'คณะวิศวกรรมศาสตร์',
      'degree' => 'ตรี',
      'line_id' => 'supannada',
      'studentcard_id' => '40100123',
      'donate_point' => '0',
      'accept_status' => '1',
  		'created_at' => date('Y-m-d H:i:s'),
      'image_id' => 'storage/image/57070123/CardID_57070123.jpg',
      'image_profile' => 'storage/image/100510.png'
  		]);

      DB::table('users')->insert([
  		'gender' => 'หญิง',
  		'email' => 'nutticha.39@gmail.com',
      'password' => bcrypt('123456'),
      'fname' => 'ณัฐณิชา',
      'lname' => 'จันทร์สนอง',
      'address' => 'หอพักเอนจอยเพลส',
      'year' => '2558',
      'faculty' => 'คณะวิทยาศาสตร์',
      'degree' => 'ตรี',
      'line_id' => 'nutnicha',
      'studentcard_id' => '58900105',
      'donate_point' => '0',
      'accept_status' => '2',
  		'created_at' => date('Y-m-d H:i:s'),
      'image_id' => 'storage/image/57070123/CardID_57070123.jpg',
      'image_profile' => 'storage/image/100510.png'
  		]);

      DB::table('users')->insert([
  		'gender' => 'ชาย',
  		'email' => 'krittinut@gmail.com',
      'password' => bcrypt('123456'),
      'fname' => 'กิตติณัฐ',
      'lname' => 'เอี่ยมสำอางค์',
      'address' => 'หอป๊าม๊า RNP',
      'year' => '2559',
      'faculty' => 'เทคโนโลยีสารสนเทศ',
      'degree' => 'ตรี',
      'line_id' => 'kridsada-01',
      'studentcard_id' => '59700153',
      'donate_point' => '0',
      'accept_status' => '3',
  		'created_at' => date('Y-m-d H:i:s'),
      'image_id' => 'storage/image/57070123/CardID_57070123.jpg',
      'image_profile' => 'storage/image/100510.png'
  		]);

      DB::table('users')->insert([
      'gender' => 'ชาย',
      'email' => 'pasin@gmail.com',
      'password' => bcrypt('123456'),
      'fname' => 'พศิน',
      'lname' => 'ชื่นชูจิตต์',
      'address' => 'หอ a&j RNP',
      'year' => '2560',
      'faculty' => 'คณะครุศาสตร์อุตสาหกรรม',
      'degree' => 'ตรี',
      'line_id' => 'kridsada-01',
      'studentcard_id' => '60500081',
      'donate_point' => '0',
      'accept_status' => '0',
      'created_at' => date('Y-m-d H:i:s'),
      'image_id' => 'storage/image/57070123/CardID_57070123.jpg',
      'image_profile' => 'storage/image/100510.png'
      ]);
      // $this->call(UsersTableSeeder::class);
      DB::table('auction_products')->insert([
  		'title' => 'โวลท์มิเตอร์',
  		'description' => 'โวลท์มิเตอร์ มีมาตรฐาน มอก. วัดไฟสูงสุดได้ 5 โวล์ท',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-27 01:59:00',
      'category' => 'อุปกรณ์การเรียนเฉพาะทาง',
      'bid_step' => '50',
      'start_price' => '20',
      'price' => '20',
      'images' => '["3327.jpg","3355.jpg"]',
      'user_id' => '1'
  		]);

      DB::table('auction_products')->insert([
      'title' => 'ล้อหมุนออกกำลังกาย',
      'description' => 'ล้อหมุนสำหรับออกกำลังกาย เสริมสร้างกล้ามเนื้อช่วงไหล่และหน้าท้อง',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-27 05:59:00',
      'category' => 'อุปกรณ์กีฬา',
      'bid_step' => '50',
      'start_price' => '70',
      'price' => '70',
      'images' => '["12333557.jpg"]',
      'user_id' => '1'
      ]);

      DB::table('auction_products')->insert([
      'title' => 'เราท์เตอร์ไวฟาย',
      'description' => 'เราท์เตอร์ไวฟาย มีเสาอากาศ 2 ข้าง',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-27 23:59:00',
      'category' => 'อุปกรณไอที',
      'bid_step' => '50',
      'start_price' => '100',
      'price' => '100',
      'images' => '["12337297.jpg"]',
      'user_id' => '2'
      ]);

      DB::table('auction_products')->insert([
      'title' => 'รองเท้าโอนิสึกะ',
      'description' => 'รองเท้าโอนิสึกะ สีขาวดำ เบอร์ 7',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-28 23:59:00',
      'category' => 'อื่นๆ',
      'bid_step' => '50',
      'start_price' => '80',
      'price' => '80',
      'images' => '["12335450.jpg"]',
      'user_id' => '2'
      ]);

      DB::table('auction_products')->insert([
      'title' => 'หนังสือเตรียมสอบ toeic',
      'description' => 'หนังสือภาษาอังกฤษสำหรับสอบ toeic ของสำนักพิมพ์ barron',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-28 23:59:00',
      'category' => 'อื่นๆ',
      'bid_step' => '30',
      'start_price' => '200',
      'price' => '200',
      'images' => '["toeic.jpg"]',
      'user_id' => '3'
      ]);

      DB::table('auction_products')->insert([
      'title' => 'ตู้เย็นยี่ห้อ aj ขนาดเล็ก',
      'description' => 'ตู้เย็นขนาดเล็ก ใช้มา2ปี สภาพดี',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-28 23:59:00',
      'category' => 'อื่นๆ',
      'bid_step' => '50',
      'start_price' => '1000',
      'price' => '1000',
      'images' => '["post-16447-0.jpg"]',
      'user_id' => '4'
      ]);



      DB::table('donate_items')->insert([
  		'title' => 'หนังสือ data structure & .asp',
  		'description' => 'data structure และ .asp book สำหรับผู้เริ่มต้น',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-29 23:59:00',
      'category' => 'หนังสือเรียนและชีทสรุป',
      'condition' => 'ต้องศึกษาในคณะที่เกี่ยวข้องกับหนังสือ',
      'images' => '["d1.jpg","d2.jpg"]',
      'user_id' => '1'
  		]);

      DB::table('donate_items')->insert([
  		'title' => 'ฮาร์ดดิสสำหรับ PC',
  		'description' => 'ฮาร์ดดิส SATA Kingston 500 GB',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-27 03:59:00',
      'category' => 'อุปกรณ์ไอที',
      'condition' => 'ไม่มี',
      'images' => '["12339282.jpg"]',
      'user_id' => '1'
  		]);

      DB::table('donate_items')->insert([
      'title' => 'โต๊ะดราฟท์',
      'description' => 'โต๊ะดราฟท์ สำหรับออกแบบ มีหลอดไฟในตัว',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-27 13:59:00',
      'category' => 'อุปกรณ์การเรียนเฉพาะทาง',
      'condition' => 'ต้องเรียนอยู่คณะสถาปัตย์',
      'images' => '["todraft.jpg"]',
      'user_id' => '3'
      ]);

      DB::table('donate_items')->insert([
      'title' => 'ไม้กลองยี่ห้อ NUG',
      'description' => 'ไม้กลองไม่ได้ใช้แล้ว หาคนต้องการใช้',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-28 23:59:00',
      'category' => 'เครื่องดนตรี',
      'condition' => 'ต้องเล่นดนตรีเป็น',
      'images' => '["ca06d2c0-ac5e.jpg"]',
      'user_id' => '4'
      ]);

      DB::table('donate_items')->insert([
      'title' => 'แรม 4 GB ยี่ห้อ Kingmax',
      'description' => 'แรม 4 GB DDR คอมเสียเลยไม่ได้ใช้ อยากเอามาแจก',
      'open_time' => '2018-03-15 23:59:00',
      'close_time' => '2018-04-27 00:59:00',
      'category' => 'อุปกรณไอที',
      'condition' => 'ต้องมีคอม',
      'images' => '["auction.jpg"]',
      'user_id' => '4'
      ]);

      DB::table('chats')->insert([
      'auction_product_id' => '1',
      'user_id' => '1',
      'user_name' => 'สรัล',
      'message' => 'test1',

      ]);

      DB::table('chats')->insert([
      'auction_product_id' => '1',
      'user_id' => '2',
      'user_name' => 'สุพัณณดา',
      'message' => 'test2',

      ]);
      // factory(App\AuctionProduct::class, 10)->create();

    }

}
