<?php

use Illuminate\Database\Seeder;

class IntroductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $introduction = [
            [
                'title' => "<h2 style='text-align:center'>VỚI NAIL XINH<br />&ldquo;AI CŨNG C&Oacute; THỂ TRỞ N&Ecirc;N ĐẸP HƠN&rdquo;</h2><p>&nbsp;</p>",
                'content' =>'<p><span style="font-size:16px">Sở hữu c&aacute;c dịch vụ từ l&agrave;m nail, spa, waxing, phun th&ecirc;u l&ocirc;ng m&agrave;y, nối mi,&hellip; v&agrave; một kh&ocirc;ng gian cửa h&agrave;ng y&ecirc;n tĩnh, long lanh d&agrave;nh ri&ecirc;ng cho ph&aacute;i đẹp khiến Nail Xinh trở th&agrave;nh điểm đến y&ecirc;u th&iacute;ch của hơn 100.000 kh&aacute;ch h&agrave;ng trong nước. </span></p><p><span style="font-size:16px">Với đội ngũ chuy&ecirc;n vi&ecirc;n t&agrave;i năng, dễ thương c&ugrave;ng hệ thống m&aacute;y m&oacute;c, dụng cụ nhập từ H&agrave;n Quốc,&nbsp;NAIL XINH chắc chắn sẽ đem lại những xu hướng l&agrave;m đẹp mới nhất đến kh&aacute;ch h&agrave;ng</span></p>',
                'image' =>'1572532157Untitled-1-2.jpg'
            ]
        ];
        DB::table('introductions')->insert($introduction);
    }
}
