<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $name = 'Áo sơ mi nam hàn quốc ' . $i;
            $price = 150000+($i*10000);
            DB::table('products')->insert([
                'cate_id' => '1',
                'name' => $name,
                'alias' => 'ao-somi-nam-han-quoc-' . $i,
                'desc' => 'Áo sơ mi nam công sở  được thiết kế theo phong cách thời trang,
                dáng ôm sát cơ thể, nhằm tôn lên sự phong độ, trẻ trung, nam tính của phái mạnh',
                'content' => "
                    - Form dáng chuẩn, kết hợp với chi tiết phối màu nổi bật. <br>
                    - Màu sắc nhã nhặn, dễ dàng mix cùng nhiều kiểu quần âu, jeans, kaki…  <br>
                    - Áo sơ mi nam thiết kế tay dài, cổ bẻ truyền thống tôn lên vẻ lịch lãm, sang trọng nơi công sở.  <br>
                    - Thích hợp mix cùng các kiểu quần Âu, kaki, jeans… đến công sở
                ",
                'price' => $price,
                'meta_title' => $name,
                'meta_key' => $name,
                'meta_desc' => $name

            ]);
        }
    }
}
