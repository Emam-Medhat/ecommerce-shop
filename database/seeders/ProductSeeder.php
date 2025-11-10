<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $subCategories = Category::whereNotNull('parent_id')->get();

        // روابط صور مجانية وصحيحة (Pexels)
        $images = [
            'laptops' => [
                'https://images.pexels.com/photos/18105/pexels-photo.jpg',
                'https://images.pexels.com/photos/374074/pexels-photo-374074.jpeg',
                'https://images.pexels.com/photos/276452/pexels-photo-276452.jpeg',
                'https://images.pexels.com/photos/1181263/pexels-photo-1181263.jpeg',
                'https://images.pexels.com/photos/159888/laptop-office-computer-desk-159888.jpeg'
            ],
            'mobile phones' => [
                'https://images.pexels.com/photos/607812/pexels-photo-607812.jpeg',
                'https://images.pexels.com/photos/274973/pexels-photo-274973.jpeg',
                'https://images.pexels.com/photos/1092671/pexels-photo-1092671.jpeg',
                'https://images.pexels.com/photos/404280/pexels-photo-404280.jpeg',
                'https://images.pexels.com/photos/607812/pexels-photo-607812.jpeg'
            ],
            'headphones' => [
                'https://images.pexels.com/photos/339466/pexels-photo-339466.jpeg',
                'https://images.pexels.com/photos/159732/headphones-on-hand-159732.jpeg',
                'https://images.pexels.com/photos/374777/pexels-photo-374777.jpeg',
                'https://images.pexels.com/photos/1579732/pexels-photo-1579732.jpeg',
                'https://images.pexels.com/photos/1648532/pexels-photo-1648532.jpeg'
            ],
            'men' => [
                'https://images.pexels.com/photos/428340/pexels-photo-428340.jpeg',
                'https://images.pexels.com/photos/428347/pexels-photo-428347.jpeg',
                'https://images.pexels.com/photos/1704488/pexels-photo-1704488.jpeg',
                'https://images.pexels.com/photos/1036623/pexels-photo-1036623.jpeg',
                'https://images.pexels.com/photos/842811/pexels-photo-842811.jpeg'
            ],
            'women' => [
                'https://images.pexels.com/photos/3775533/pexels-photo-3775533.jpeg',
                'https://images.pexels.com/photos/207983/pexels-photo-207983.jpeg',
                'https://images.pexels.com/photos/2529148/pexels-photo-2529148.jpeg',
                'https://images.pexels.com/photos/2983464/pexels-photo-2983464.jpeg',
                'https://images.pexels.com/photos/3775529/pexels-photo-3775529.jpeg'
            ],
            'kids' => [
                'https://images.pexels.com/photos/1001910/pexels-photo-1001910.jpeg',
                'https://images.pexels.com/photos/325697/pexels-photo-325697.jpeg',
                'https://images.pexels.com/photos/35537/pexels-photo-35537.jpeg',
                'https://images.pexels.com/photos/1181361/pexels-photo-1181361.jpeg',
                'https://images.pexels.com/photos/3661260/pexels-photo-3661260.jpeg'
            ],
            'novels' => [
                'https://images.pexels.com/photos/46274/pexels-photo-46274.jpeg',
                'https://images.pexels.com/photos/27411/pexels-photo-27411.jpeg',
                'https://images.pexels.com/photos/256541/pexels-photo-256541.jpeg',
                'https://images.pexels.com/photos/590493/pexels-photo-590493.jpeg',
                'https://images.pexels.com/photos/348917/pexels-photo-348917.jpeg'
            ],
            'educational books' => [
                'https://images.pexels.com/photos/159832/book-159832.jpeg',
                'https://images.pexels.com/photos/375965/pexels-photo-375965.jpeg',
                'https://images.pexels.com/photos/267586/pexels-photo-267586.jpeg',
                'https://images.pexels.com/photos/290576/pexels-photo-290576.jpeg',
                'https://images.pexels.com/photos/256541/pexels-photo-256541.jpeg'
            ],
            'self-development books' => [
                'https://images.pexels.com/photos/375965/pexels-photo-375965.jpeg',
                'https://images.pexels.com/photos/267586/pexels-photo-267586.jpeg',
                'https://images.pexels.com/photos/256541/pexels-photo-256541.jpeg',
                'https://images.pexels.com/photos/290576/pexels-photo-290576.jpeg',
                'https://images.pexels.com/photos/348917/pexels-photo-348917.jpeg'
            ],
            'kitchen' => [
                'https://images.pexels.com/photos/273614/pexels-photo-273614.jpeg',
                'https://images.pexels.com/photos/298310/pexels-photo-298310.jpeg',
                'https://images.pexels.com/photos/374816/pexels-photo-374816.jpeg',
                'https://images.pexels.com/photos/331950/pexels-photo-331950.jpeg',
                'https://images.pexels.com/photos/410648/pexels-photo-410648.jpeg'
            ],
            'decor' => [
                'https://images.pexels.com/photos/1571450/pexels-photo-1571450.jpeg',
                'https://images.pexels.com/photos/1866149/pexels-photo-1866149.jpeg',
                'https://images.pexels.com/photos/267883/pexels-photo-267883.jpeg',
                'https://images.pexels.com/photos/291127/pexels-photo-291127.jpeg',
                'https://images.pexels.com/photos/273624/pexels-photo-273624.jpeg'
            ],
            'lighting' => [
                'https://images.pexels.com/photos/329435/pexels-photo-329435.jpeg',
                'https://images.pexels.com/photos/296895/pexels-photo-296895.jpeg',
                'https://images.pexels.com/photos/279568/pexels-photo-279568.jpeg',
                'https://images.pexels.com/photos/273614/pexels-photo-273614.jpeg',
                'https://images.pexels.com/photos/298310/pexels-photo-298310.jpeg'
            ]
        ];

        // بيانات منتجات حقيقية تقريبًا بدون علامات تجارية
        $productsData = [
            'laptops' => [
                ['Ultra-Slim Laptop 14"', 'كمبيوتر محمول خفيف بحجم شاشة 14 بوصة، سعة تخزين 512 GB، ووزن تقريبي 1.3 كجم', 1200],
                ['High-Performance Laptop 15"', 'جهاز محمول بحجم 15 بوصة مع معالج قوي، بطارية تدوم طوال اليوم، وتصميم معدني أنيق', 1650],
                ['Everyday Laptop 13"', 'كمبيوتر محمول اقتصادي مقاس 13 بوصة، مناسب للدراسة والتصفح، بذاكرة 8 GB وتخزين 256 GB', 799],
                ['Portable Laptop 15"', 'جهاز محمول متوسط الحجم، أداء جيد للمهام اليومية، سعة تخزين 512 GB', 999],
                ['Business Laptop 14"', 'كمبيوتر محمول بحجم 14 بوصة، أداء مناسب للعمل والمكاتب، عمر بطارية طويل', 1350],
            ],
            'mobile phones' => [
                ['Smartphone Max Screen', 'هاتف ذكي بشاشة كبيرة، كاميرا متعددة، دعم 5G، أداء ممتاز للمستخدم اليومي', 950],
                ['Compact Smartphone', 'هاتف مدمج بحجم مناسب للجيب، أداء جيد، كاميرا عالية، بطارية تكفي اليوم بالكامل', 650],
                ['Budget Smartphone', 'هاتف ذكي بسعر اقتصادي، مناسب للمستخدمين البسيطين أو أول جهاز ذكي', 345],
                ['Advanced Smartphone', 'هاتف بشاشة عالية الدقة، أداء قوي، كاميرا خلفية مزدوجة', 1200],
                ['Everyday Smartphone', 'هاتف ذكي مناسب للتصفح والمكالمات، بطارية تدوم طوال اليوم', 499],
            ],
            'headphones' => [
                ['Wireless Headphones Over-Ear', 'سماعات رأس لاسلكية بتقنية إلغاء الضوضاء، صوت عالي الجودة وراحة طويلة', 249.99],
                ['Sport Earbuds True Wireless', 'سماعات أذن رياضية بلاسلكية بالكامل، مقاومة للعرق، وقت تشغيل طويل', 159.99],
                ['Classic Over-Ear Headphones', 'سماعات رأس كلاسيكية بجودة صوت جيدة، تصميم مريح', 129.99],
                ['Noise Cancelling Headphones', 'سماعات بعزل الضوضاء الخارجية، مناسبة للعمل والدراسة', 199.99],
                ['Portable Bluetooth Headphones', 'سماعات لاسلكية خفيفة الوزن، سهلة الحمل والاستخدام اليومي', 89.99],
            ],
            'men' => [
                ['Classic Men’s Jacket', 'جاكيت رجال كلاسيكي، خامة قطن/بوليستر، تصميم عصري يناسب الاستخدام اليومي', 199.99],
                ['Casual Men’s Shirt', 'قميص رجال كاجوال، خامة قطنية مريحة، متوفر بألوان متعددة', 49.99],
                ['Men’s Jeans', 'جينز رجالي كلاسيكي، خامة متينة، تصميم عصري', 69.99],
                ['Men’s T-Shirt', 'تي شيرت رجالي بسيط، خامة قطنية، متوفر بعدة ألوان', 29.99],
                ['Men’s Hoodie', 'هودي رجالي مريح للارتداء اليومي، خامة عالية الجودة', 59.99],
            ],
            'women' => [
                ['Women’s Casual Dress', 'فستان نسائي كاجوال، تصميم بسيط، خامة مريحة، لون متعدد الخيارات', 149.99],
                ['Women’s Blouse', 'بلوزة نسائية أنيقة، خامة عالية الجودة، تصميم عصري', 69.99],
                ['Women’s Skirt', 'تنورة نسائية متوسطة الطول، خامة مريحة، متوفرة بألوان متعددة', 79.99],
                ['Women’s Jacket', 'جاكيت نسائي كلاسيكي، تصميم عصري، خامة قطنية', 129.99],
                ['Women’s T-Shirt', 'تي شيرت نسائي بسيط، خامة قطنية، متوفر بعدة ألوان', 39.99],
            ],
            'kids' => [
                ['Kids’ T-Shirt', 'تي شيرت للأطفال، خامة مريحة، ألوان جذابة', 19.99],
                ['Kids’ Shorts', 'شورت أطفال خفيف ومريح، مناسب للعب اليومي', 24.99],
                ['Kids’ Hoodie', 'هودي أطفال، خامة عالية الجودة، تصميم عصري', 34.99],
                ['Kids’ Sneakers', 'حذاء رياضي للأطفال، مريح ومتين', 44.99],
                ['Kids’ Dress', 'فستان أطفال بسيط وأنيق، خامة مريحة', 29.99],
            ],
            'novels' => [
                ['Mystery Novel', 'رواية تشويقية مليئة بالإثارة والغموض، مناسبة لمحبي الأدب', 14.99],
                ['Romantic Novel', 'رواية رومانسية خفيفة، أحداث مشوقة، سرد جميل', 12.99],
                ['Adventure Novel', 'رواية مغامرات شيقة، أحداث مشوقة وممتعة', 16.99],
                ['Historical Novel', 'رواية تاريخية مستوحاة من أحداث حقيقية، سرد جذاب', 18.99],
                ['Classic Novel', 'رواية كلاسيكية مشهورة، سرد رائع، لغة جذابة', 20.99],
            ],
            'educational books' => [
                ['Mathematics Basics', 'كتاب تعليمي لتقوية مهارات الرياضيات الأساسية', 24.99],
                ['Science for Kids', 'كتاب تعليم علوم مبسط للأطفال، رسوم توضيحية جميلة', 19.99],
                ['History Guide', 'دليل تعليمي لتاريخ العالم بأسلوب مبسط وجذاب', 29.99],
                ['Language Learning', 'كتاب لتعلم لغة جديدة، مع تدريبات وأمثلة عملية', 34.99],
                ['Computer Basics', 'دليل تعليمي للمبتدئين لتعلم أساسيات الكمبيوتر', 39.99],
            ],
            'self-development books' => [
                ['Time Management', 'كتاب لتطوير الذات في إدارة الوقت وزيادة الإنتاجية', 22.99],
                ['Goal Setting', 'دليل عملي لتحديد وتحقيق الأهداف الشخصية والمهنية', 24.99],
                ['Confidence Boost', 'كتاب لتقوية الثقة بالنفس وتطوير المهارات الشخصية', 19.99],
                ['Effective Communication', 'أساسيات التواصل الفعال وبناء العلاقات الاجتماعية', 29.99],
                ['Leadership Skills', 'كتاب لتطوير مهارات القيادة والإدارة', 34.99],
            ],
            'kitchen' => [
                ['Non-stick Pan', 'مقلاة غير لاصقة، حجم مناسب للطهي اليومي', 29.99],
                ['Knife Set', 'مجموعة سكاكين مطبخ، مصنوعة من الفولاذ المقاوم للصدأ', 49.99],
                ['Cooking Pot', 'قدر طهي عالي الجودة، حجم كبير للطهي الجماعي', 59.99],
                ['Blender', 'خلاط كهربائي متعدد الاستخدامات، تصميم عصري', 69.99],
                ['Cutting Board', 'لوح تقطيع متين، مناسب لتحضير الطعام', 19.99],
            ],
            'decor' => [
                ['Wall Frame', 'إطار حائط أنيق، مناسب للصور والديكور الداخلي', 24.99],
                ['Vase Set', 'مجموعة فازات زجاجية، تصميم عصري أنيق', 29.99],
                ['Table Lamp', 'مصباح طاولة عصري، إضاءة دافئة ومريحة', 34.99],
                ['Candle Holder', 'حامل شموع أنيق، تصميم متين', 19.99],
                ['Decorative Pillow', 'وسادة ديكور للكنبة، تصميم جميل', 14.99],
            ],
            'lighting' => [
                ['LED Ceiling Light', 'مصباح سقف LED، توفير طاقة وإضاءة جيدة', 59.99],
                ['Desk Lamp', 'مصباح مكتب بتصميم عصري، مناسب للعمل والدراسة', 39.99],
                ['Floor Lamp', 'مصباح أرضي أنيق، يضفي جوًا مريحًا', 49.99],
                ['Wall Lamp', 'مصباح حائط حديث، مناسب لغرف النوم والمكاتب', 34.99],
                ['String Lights', 'أضواء سلسلة للديكور الداخلي والخارجي، تصميم جميل', 24.99],
            ]
        ];

        foreach ($subCategories as $category) {
            $key = strtolower($category->name);
            if(!isset($productsData[$key])) continue;

            foreach ($productsData[$key] as $index => $product) {
                Product::create([
                    'name' => $product[0],
                    'description' => $product[1],
                    'price' => $product[2],
                    'discount_price' => rand(5, 50),
                    'condition' => rand(0,1) ? 'new' : 'used',
                    'favorite' => rand(0,1),
                    'image' => $images[$key][$index] ?? 'https://via.placeholder.com/300',
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
