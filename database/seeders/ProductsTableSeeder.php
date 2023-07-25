<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'store_id' => 0,
                'brand_id' => 1,
                'category_id' => 3,
                'subcategory_id' => 2,
                'unit_id' => 3,
                'colors_id' => '["5","6"]',
                'sizes' => '"S,M,L,XL"',
            'name' => 'Apple iPhone 14 128GB Purple (Singapore)',
                'slug' => 'apple-iphone-14-128gb-purple-singapore-',
                'sku' => 'Apple iPhone 14',
                'thumbnail' => '1689154655-1656322-apple-iphone-14-128gb-purple-singapore-.webp',
                'images' => '["1689148221-1035790-iphone-11.webp","1689148481-1484431-apple-iphone-14-128gb-purple-singapore-.jpeg"]',
            'full_description' => '<section class="description bg-white m-tb-15" id="description" style="margin: 0px 0px 20px; padding: 20px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 1px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;"><div class="section-head" style="margin: 0px; padding: 0px 0px 20px;"><h2 style="margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 26px;">Description</h2></div><div class="full-description" itemprop="description" style="margin: 0px; padding: 0px; line-height: 24px;"><h2 style="margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 26px;">Apple iPhone 14 128GB Purple (Singapore)</h2><p style="margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;">The Apple iPhone 14 is the latest model of the iPhone series, featuring the latest technology and advanced features that are designed to provide users with a seamless and unparalleled mobile experience. The device is powered by the latest A15 Bionic chip, providing exceptional performance and power efficiency. The 6.1-inch Super Retina XDR display, with ProMotion technology, delivers an immersive visual experience with incredibly vibrant colors and deep blacks. The device comes equipped with a triple-camera system, including a 12MP main and a 12MP ultra-wide, allowing users to capture stunning photos and videos.&nbsp;This iPhone 14 has a 128GB internal storage capacity, offering ample space for all your photos, videos, and apps. It has been designed for durability with Ceramic Shield. It also offers water resistance and a surgical-grade stainless steel body. The Purple color option adds a luxurious and elegant touch to the device\'s overall design.</p><h3 style="margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 24px;">Pro-level camera</h3><p style="margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;">The latest iPhone 14 from Apple comes with a dual camera system. The main camera is 12MP for up to 4x the resolution, and 12MP Telephoto for up to 2x better low-light photos. The quad-pixel sensor on the Main camera makes the most of 48 megapixels by adapting to what you’re shooting. You can also snap your sharpest, most colorful close-ups and group shots, thanks to a new TrueDepth front camera with autofocus and a larger aperture. The TrueDepth camera and A16 Bionic also power Face ID, the most secure facial authentication in a smartphone</p><h3 style="margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 24px;">Emergency SOS, Crash Detection</h3><p style="margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;">iPhone 14 can detect a severe car crash, then call emergency services and notify your emergency contacts. It can detect&nbsp;Sudden speed shifts,&nbsp;Abrupt changes in direction,&nbsp;Cabin pressure changes, and Loud sound levels of impact and then send an alert to save your life.<br style="margin: 0px; padding: 0px;"></p><h2 style="margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 26px;">Buy Apple iPhone 14 128GB Purple from the best Mobile Phone Shop in Bangladesh: Star Tech</h2><p style="margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;">In Bangladesh, you can get the original&nbsp;<a href="https://www.startech.com.bd/apple-iphone-14-pro" target="" style="margin: 0px; padding: 0px; color: rgb(239, 74, 35);">Apple iPhone 14 128GB Purple</a>&nbsp;From Star Tech. We have a large collection of the latest&nbsp;<a href="https://www.startech.com.bd/apple-iphone" target="" style="margin: 0px; padding: 0px; color: rgb(239, 74, 35);">Apple iPhones</a>&nbsp;to purchase. Order Online Or Visit your Nearest&nbsp;<a href="https://www.startech.com.bd/" target="" style="margin: 0px; padding: 0px; color: rgb(239, 74, 35);">Star Tech&nbsp;</a>Shop to get yours at the lowest price.&nbsp;It is BTRC Approved (One year Apple warranty all over the world including Bangladesh)</p></div></section><section class="latest-price bg-white m-tb-15" id="latest-price" style="margin: 0px 0px 20px; padding: 20px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 1px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;"><div class="section-head" style="margin: 0px; padding: 0px 0px 20px;"><h2 style="margin-right: 0px; margin-bottom: 5px; margin-left: 0px; padding: 0px; font-size: 20px; line-height: 26px;">What is the price of Apple iPhone 14 in Bangladesh?</h2></div><p style="margin-right: 0px; margin-left: 0px; padding: 0px; color: rgb(1, 19, 45); line-height: 26px;">The latest price of Apple iPhone 14 in Bangladesh is 128,480৳. You can buy the Apple iPhone 14 at best price from our website or visit any of our showrooms.</p></section>',
            'short_description' => '<h2 style="margin: 16px 0px; padding: 0px; font-weight: normal; font-size: 18px; line-height: 26px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;">Key Features</h2><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Trebuchet MS&quot;, sans-serif;"><li style="margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;">Model: iPhone 14</li><li style="margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;">Display: 6.1" Super Retina XDR Always-On display</li><li style="margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;">Processor: A15 Bionic chip, Storage: 128GB</li><li style="margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;">Camera: 12MP + 12MP Rear, 12MP Front</li><li style="margin: 0px; padding: 0px 0px 10px; display: block; line-height: 20px;">Features: Face ID, eSIM Support</li></ul>',
                'additional_info' => NULL,
                'quantity' => 15,
                'alert_quantity' => 5,
                'purchase_price' => 100000.0,
                'selling_price' => 110000.0,
                'discount' => 2.0,
                'discount_type' => 'percentage',
                'after_discount' => 107800.0,
                'meta_title' => 'Iphone 14',
            'meta_description' => 'Apple iPhone 14 128GB Purple (Singapore)',
                'meta_keywords' => '"iphone,iphone14,iphone 14,14"',
                'tags' => '"iphone,iphone14,14,iphone 14"',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 1,
                'created_at' => '2023-07-11 08:24:20',
                'updated_at' => '2023-07-12 09:37:35',
            ),
        ));
        
        
    }
}