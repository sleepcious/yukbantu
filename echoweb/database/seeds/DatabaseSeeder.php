<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// DB::table('kategori')->insert([
			// [
				// 'name' => 'Atlet &amp; Fasilitas Olahraga',
				// 'url' => 'atlet-fasilitas-olahraga',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Balita &amp; Anak Sakit',
				// 'url' => 'balita-anak-sakit',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Bantuan Medis &amp; Kesehatan',
				// 'url' => 'bantuan-medis-kesehatan',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Beasiswa &amp; Pendidikan',
				// 'url' => 'beasiswa-pendidikan',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Bencana Alam',
				// 'url' => 'bencana-alam',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Birthday Fundraising',
				// 'url' => 'birthday-fundraising',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Difabel',
				// 'url' => 'difabel',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Family For Family',
				// 'url' => 'family-for-family',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Hadiah &amp; Apresiasi',
				// 'url' => 'hadiah-apresiasi',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Karya Kreatif (Film, Buku, dll)',
				// 'url' => 'karya-kreatif',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Kegiatan Sosial',
				// 'url' => 'kegiatan-sosial',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Lingkungan',
				// 'url' => 'lingkungan',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Menolong Hewan',
				// 'url' => 'menolong-hewan',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Modal Usaha',
				// 'url' => 'modal-usaha',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Panti Asuhan',
				// 'url' => 'panti-asuhan',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Personal Challenge',
				// 'url' => 'personal-challenge',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Produk &amp; Inovasi',
				// 'url' => 'produk-inovasi',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Rumah Ibadah',
				// 'url' => 'rumah-ibadah',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Sarana &amp; Infrastruktur',
				// 'url' => 'sarana-infrastruktur',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
		// ]);
		
		// DB::table('pages')->insert([
			// [
				// 'name' => 'FAQ',
				// 'url' => 'faq',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Syarat & Ketentuan',
				// 'url' => 'terms-and-conditions',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Kebijakan Privasi',
				// 'url' => 'privacy-policy',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'name' => 'Karir',
				// 'url' => 'karir',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
		// ]);
		
		// DB::table('payment')->insert([
			// [
				// 'name' => 'BCA',
				// 'rekening' => '0123456789',
				// 'cabang' => 'Kab. Sidoarjo',
				// 'atas_nama' => 'Niswatun Khasanah',
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
		// ]);
		
		// DB::table('campaign')->insert([
			// [
				// 'user_id' => 1,
				// 'judul' => 'Campaign Dummy',
				// 'target_dana' => 500000000,
				// 'link_campaign' => 'campaign-dummy',
				// 'deadline' => '2017-12-29 00:00:00',
				// 'kategori_id' => 1,
				// 'lokasi' => 'Kota Surabaya, Jawa Timur',
				// 'gambar' => '/campaign/1.jpg',
				// 'short_desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada-l',
				// 'long_desc' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</p>
// <p>Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ac magna. Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis.</p>
// ',
				// 'status' => 1,
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'user_id' => 1,
				// 'judul' => 'Campaign Dummy 1',
				// 'target_dana' => 250000000,
				// 'link_campaign' => 'campaign-dummy-1',
				// 'deadline' => '2017-11-29 00:00:00',
				// 'kategori_id' => 1,
				// 'lokasi' => 'Kota Surabaya, Jawa Timur',
				// 'gambar' => '/campaign/1.jpg',
				// 'short_desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada-l',
				// 'long_desc' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</p>
// <p>Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ac magna. Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis.</p>
// ',
				// 'status' => 1,
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ],
			// [
				// 'user_id' => 1,
				// 'judul' => 'Campaign Dummy 2',
				// 'target_dana' => 100000000,
				// 'link_campaign' => 'campaign-dummy-2',
				// 'deadline' => '2017-11-29 00:00:00',
				// 'kategori_id' => 1,
				// 'lokasi' => 'Kota Surabaya, Jawa Timur',
				// 'gambar' => '/campaign/1.jpg',
				// 'short_desc' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada-l',
				// 'long_desc' => '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci. Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.</p>
// <p>Fusce aliquet pede non pede. Suspendisse dapibus lorem pellentesque magna. Integer nulla. Donec blandit feugiat ligula. Donec hendrerit, felis et imperdiet euismod, purus ipsum pretium metus, in lacinia nulla nisl eget sapien. Donec ut est in lectus consequat consequat. Etiam eget dui. Aliquam erat volutpat. Sed at lorem in nunc porta tristique. Proin nec augue. Quisque aliquam tempor magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc ac magna. Maecenas odio dolor, vulputate vel, auctor ac, accumsan id, felis. Pellentesque cursus sagittis felis.</p>
// ',
				// 'status' => 1,
				// 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				// 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			// ]
		// ]);
		
		DB::table('donasi')->insert([
			[
				'user_id' => 1,
				'campaign_id' => 4,
				'nominal' => 205000000,
				'name' => 'Muhammad Sofiullah Safriansyah',
				'email' => 'muhammadsofiullah@outlook.com',
				'no_telp' => '082213888891',
				'payment_id' => 1,
				'currency' => 1,
				'anonymous' => 1,
				'status' => 2,
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			],
			[
				'user_id' => 1,
				'campaign_id' => 5,
				'nominal' => 40000000,
				'name' => 'Muhammad Sofiullah Safriansyah',
				'email' => 'muhammadsofiullah@outlook.com',
				'no_telp' => '082213888891',
				'payment_id' => 1,
				'currency' => 1,
				'anonymous' => 2,
				'status' => 2,
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			],
			[
				'user_id' => 1,
				'campaign_id' => 6,
				'nominal' => 40000000,
				'name' => 'Muhammad Sofiullah Safriansyah',
				'email' => 'muhammadsofiullah@outlook.com',
				'no_telp' => '082213888891',
				'payment_id' => 1,
				'currency' => 1,
				'anonymous' => 1,
				'status' => 2,
				'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
			],
		]);
    }
}
