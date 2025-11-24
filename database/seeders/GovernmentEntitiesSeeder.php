<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GovernmentEntities;

class GovernmentEntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entities = [
            ['name' => 'وزارة الداخلية', 'code' => 'MOI001', 'location' => 'دمشق - ساحة المرجة'],
            ['name' => 'وزارة العدل', 'code' => 'MOJ001', 'location' => 'دمشق - المرجة'],
            ['name' => 'وزارة الصحة', 'code' => 'MOH001', 'location' => 'دمشق - المزة'],
            ['name' => 'وزارة التربية', 'code' => 'MOE001', 'location' => 'دمشق - المزة'],
            ['name' => 'وزارة التعليم العالي', 'code' => 'MOHE001', 'location' => 'دمشق - الروضة'],
            ['name' => 'وزارة الكهرباء', 'code' => 'MOEL001', 'location' => 'دمشق - أبو رمانة'],
            ['name' => 'وزارة المالية', 'code' => 'MOF001', 'location' => 'دمشق - ساحة المحافظة'],
            ['name' => 'وزارة الاقتصاد والتجارة الخارجية', 'code' => 'MOET001', 'location' => 'دمشق - البرامكة'],
            ['name' => 'وزارة الإدارة المحلية والبيئة', 'code' => 'MOLA001', 'location' => 'دمشق - كفرسوسة'],
            ['name' => 'وزارة النقل', 'code' => 'MOT001', 'location' => 'دمشق - كفرسوسة'],
            ['name' => 'وزارة الاتصالات والتقانة', 'code' => 'MOCIT001', 'location' => 'دمشق - أبراج سورية'],
            ['name' => 'وزارة النفط والثروة المعدنية', 'code' => 'MOP001', 'location' => 'دمشق - العدوي'],
            ['name' => 'وزارة الأشغال العامة', 'code' => 'MOPW001', 'location' => 'دمشق - المهاجرين'],
            ['name' => 'وزارة التجارة الداخلية وحماية المستهلك', 'code' => 'MOTI001', 'location' => 'دمشق - الحميدية'],
            ['name' => 'وزارة الشؤون الاجتماعية والعمل', 'code' => 'MOSAL001', 'location' => 'دمشق - المزة'],

            ['name' => 'المؤسسة العامة للمياه', 'code' => 'GEW001', 'location' => 'دمشق - البرامكة'],
            ['name' => 'المؤسسة العامة للكهرباء', 'code' => 'GEE001', 'location' => 'دمشق - العدوي'],
            ['name' => 'المؤسسة السورية للتجارة', 'code' => 'SET001', 'location' => 'دمشق - الصالحية'],
            ['name' => 'الهيئة العامة للاتصالات', 'code' => 'TRA001', 'location' => 'دمشق - المزة أوتستراد'],
            ['name' => 'الهيئة العامة للضرائب والرسوم', 'code' => 'GTA001', 'location' => 'دمشق - ساحة المحافظة'],
            ['name' => 'مديرية الهجرة والجوازات', 'code' => 'DIG001', 'location' => 'دمشق - الزبلطاني'],
            ['name' => 'مديرية المرور', 'code' => 'DMT001', 'location' => 'دمشق - حرستا'],
            ['name' => 'مديرية المصالح العقارية', 'code' => 'DRE001', 'location' => 'دمشق - العدوي'],
            ['name' => 'مديرية النفوس (السجل المدني)', 'code' => 'DCR001', 'location' => 'دمشق - القنوات'],
            ['name' => 'مديرية المصارف الحكومية', 'code' => 'DGB001', 'location' => 'دمشق - شارع النصر'],
            ['name' => 'شركة محروقات - سادكوب', 'code' => 'SADCOP001', 'location' => 'دمشق - القابون'],
        ];

        GovernmentEntities::insert($entities);
    }
}
