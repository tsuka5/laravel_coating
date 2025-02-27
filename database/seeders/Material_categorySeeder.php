<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Material_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Polysaccharides',
                'description' => '多糖類 - 化学構造に基づく分類',
                'children' => [
                    [
                        'name' => 'Linear Polysaccharides',
                        'description' => '線状多糖類',
                        'children' => [
                            [
                                'name' => 'Homopolysaccharides',
                                'description' => '均一多糖類',
                                'children' => [
                                    [
                                        'name' => 'Glucans',
                                        'description' => 'グルカン類',
                                        'examples' => 'amylose, cellulose, pullulan',
                                    ],
                                    [
                                        'name' => 'Mannans',
                                        'description' => 'マンナン類',
                                        'examples' => 'glucomannan, galactomannan',
                                    ],
                                    [
                                        'name' => 'Xylans',
                                        'description' => 'キシラン類',
                                        'examples' => 'xylan',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Heteropolysaccharides',
                                'description' => '混成多糖類',
                                'children' => [
                                    [
                                        'name' => 'Gums',
                                        'description' => 'ガム類',
                                        'examples' => 'gum arabic, guar gum, tragacanth gum',
                                    ],
                                    [
                                        'name' => 'Pectins',
                                        'description' => 'ペクチン類',
                                        'examples' => 'low methoxyl pectin',
                                    ],
                                    [
                                        'name' => 'Mucilages',
                                        'description' => '粘液質類',
                                        'examples' => 'flaxseed mucilage, opuntia ficus-indica mucilage',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Branched Polysaccharides',
                        'description' => '分岐多糖類',
                        'children' => [
                            [
                                'name' => 'Homopolysaccharides',
                                'description' => '均一多糖類',
                                'children' => [
                                    [
                                        'name' => 'Amylopectins',
                                        'description' => 'アミロペクチン類',
                                        'examples' => 'starch',
                                    ],
                                    [
                                        'name' => 'Dextrans',
                                        'description' => 'デキストラン類',
                                        'examples' => 'dextran',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Heteropolysaccharides',
                                'description' => '混成多糖類',
                                'children' => [
                                    [
                                        'name' => 'Carrageenans',
                                        'description' => 'カラギーナン類',
                                        'examples' => 'carrageenan',
                                    ],
                                    [
                                        'name' => 'Agars',
                                        'description' => 'アガー類',
                                        'examples' => 'agar',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Modified Polysaccharides',
                        'description' => '修飾多糖類',
                        'children' => [
                            [
                                'name' => 'Chemically Modified',
                                'description' => '化学修飾',
                                'children' => [
                                    [
                                        'name' => 'Carboxylated',
                                        'description' => 'カルボキシル化',
                                        'examples' => 'carboxymethyl cellulose',
                                    ],
                                    [
                                        'name' => 'Sulfated',
                                        'description' => 'スルホン化',
                                        'examples' => 'sulfated polysaccharides',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Physically Modified',
                                'description' => '物理修飾',
                                'children' => [
                                    [
                                        'name' => 'Cross-linked',
                                        'description' => '架橋結合',
                                        'examples' => 'cross-linked starch',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Proteins',
                'description' => 'タンパク質 - 化学構造に基づく分類',
                'children' => [
                    [
                        'name' => 'Primary Structure-based Proteins',
                        'description' => '一次構造に基づくタンパク質',
                        'children' => [
                            [
                                'name' => 'Homopolypeptides',
                                'description' => '単一ポリペプチド',
                                'examples' => 'poly-L-lysine',
                            ],
                            [
                                'name' => 'Heteropolypeptides',
                                'description' => '複合ポリペプチド',
                                'examples' => 'silk fibroin, collagen',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Secondary Structure-based Proteins',
                        'description' => '二次構造に基づくタンパク質',
                        'children' => [
                            [
                                'name' => 'α-Helical Proteins',
                                'description' => 'αヘリックス構造タンパク質',
                                'examples' => 'keratin',
                            ],
                            [
                                'name' => 'β-Sheet Proteins',
                                'description' => 'βシート構造タンパク質',
                                'examples' => 'silk fibroin',
                            ],
                            [
                                'name' => 'Random Coil Proteins',
                                'description' => 'ランダムコイル構造タンパク質',
                                'examples' => 'gelatin',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Tertiary Structure-based Proteins',
                        'description' => '三次構造に基づくタンパク質',
                        'children' => [
                            [
                                'name' => 'Globular Proteins',
                                'description' => '球状タンパク質',
                                'examples' => 'hemoglobin, myoglobin',
                            ],
                            [
                                'name' => 'Fibrous Proteins',
                                'description' => '繊維状タンパク質',
                                'examples' => 'collagen, elastin',
                            ],
                            [
                                'name' => 'Disordered Proteins',
                                'description' => '無秩序タンパク質',
                                'examples' => 'silk protein (precursor form)',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Quaternary Structure-based Proteins',
                        'description' => '四次構造に基づくタンパク質',
                        'children' => [
                            [
                                'name' => 'Homomeric Proteins',
                                'description' => '同種サブユニット構成タンパク質',
                                'examples' => 'actin filaments',
                            ],
                            [
                                'name' => 'Heteromeric Proteins',
                                'description' => '異種サブユニット構成タンパク質',
                                'examples' => 'hemoglobin',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Complex-based Proteins',
                        'description' => '複合体タンパク質',
                        'children' => [
                            [
                                'name' => 'Metal-binding Proteins',
                                'description' => '金属結合タンパク質',
                                'examples' => 'ferritin, metallothionein',
                            ],
                            [
                                'name' => 'Pigment-binding Proteins',
                                'description' => '色素結合タンパク質',
                                'examples' => 'carotenoprotein',
                            ],
                            [
                                'name' => 'Glycoproteins',
                                'description' => '糖タンパク質',
                                'examples' => 'mucin',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Lipids',
                'description' => '脂質 - 化学構造に基づく分類',
                'children' => [
                    [
                        'name' => 'Simple Lipids',
                        'description' => '単純脂質',
                        'children' => [
                            [
                                'name' => 'Fatty Acids',
                                'description' => '脂肪酸',
                                'children' => [
                                    [
                                        'name' => 'Saturated Fatty Acids',
                                        'description' => '飽和脂肪酸',
                                        'examples' => 'stearic acid, palmitic acid',
                                    ],
                                    [
                                        'name' => 'Unsaturated Fatty Acids',
                                        'description' => '不飽和脂肪酸',
                                        'children' => [
                                            [
                                                'name' => 'Monounsaturated Fatty Acids',
                                                'description' => 'モノ不飽和脂肪酸',
                                                'examples' => 'oleic acid',
                                            ],
                                            [
                                                'name' => 'Polyunsaturated Fatty Acids',
                                                'description' => '多価不飽和脂肪酸',
                                                'examples' => 'linoleic acid',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Glycerides',
                                'description' => 'グリセリド',
                                'children' => [
                                    [
                                        'name' => 'Monoacylglycerols',
                                        'description' => 'モノグリセリド',
                                        'examples' => 'monoolein',
                                    ],
                                    [
                                        'name' => 'Diacylglycerols',
                                        'description' => 'ジグリセリド',
                                        'examples' => 'diolein',
                                    ],
                                    [
                                        'name' => 'Triacylglycerols',
                                        'description' => 'トリグリセリド',
                                        'examples' => 'tripalmitin',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Compound Lipids',
                        'description' => '複合脂質',
                        'children' => [
                            [
                                'name' => 'Phospholipids',
                                'description' => 'リン脂質',
                                'children' => [
                                    [
                                        'name' => 'Glycerophospholipids',
                                        'description' => 'グリセロリン脂質',
                                        'examples' => 'lecithin (phosphatidylcholine)',
                                    ],
                                    [
                                        'name' => 'Sphingophospholipids',
                                        'description' => 'スフィンゴリン脂質',
                                        'examples' => 'sphingomyelin',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Glycolipids',
                                'description' => '糖脂質',
                                'examples' => 'cerebrosides, gangliosides',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Derived Lipids',
                        'description' => '誘導脂質',
                        'children' => [
                            [
                                'name' => 'Sterols and Steroids',
                                'description' => 'ステロールおよびステロイド',
                                'examples' => 'cholesterol, stigmasterol',
                            ],
                            [
                                'name' => 'Fatty Alcohols',
                                'description' => '脂肪アルコール',
                                'examples' => 'cetyl alcohol, stearyl alcohol',
                            ],
                            [
                                'name' => 'Waxes',
                                'description' => 'ワックス',
                                'examples' => 'beeswax, carnauba wax',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Complex Lipids',
                        'description' => '複雑脂質',
                        'children' => [
                            [
                                'name' => 'Lipoproteins',
                                'description' => 'リポタンパク質',
                                'examples' => 'high-density lipoprotein (HDL), low-density lipoprotein (LDL)',
                            ],
                            [
                                'name' => 'Lipopolysaccharides',
                                'description' => 'リポ多糖類',
                                'examples' => 'bacterial lipopolysaccharides',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Organic Acids',
                'description' => '有機酸 - 化学構造に基づく分類',
                'children' => [
                    [
                        'name' => 'Carboxylic Acids',
                        'description' => 'カルボン酸',
                        'children' => [
                            [
                                'name' => 'Monocarboxylic Acids',
                                'description' => '単価カルボン酸',
                                'children' => [
                                    [
                                        'name' => 'Straight-chain Monocarboxylic Acids',
                                        'description' => '直鎖単価カルボン酸',
                                        'examples' => 'acetic acid, propionic acid, butyric acid',
                                    ],
                                    [
                                        'name' => 'Branched-chain Monocarboxylic Acids',
                                        'description' => '分岐単価カルボン酸',
                                        'examples' => 'isobutyric acid',
                                    ],
                                    [
                                        'name' => 'Aromatic Monocarboxylic Acids',
                                        'description' => '芳香族単価カルボン酸',
                                        'examples' => 'benzoic acid',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Polycarboxylic Acids',
                                'description' => '多価カルボン酸',
                                'children' => [
                                    [
                                        'name' => 'Dicarboxylic Acids',
                                        'description' => '二価カルボン酸',
                                        'examples' => 'oxalic acid, malonic acid, succinic acid',
                                    ],
                                    [
                                        'name' => 'Tricarboxylic Acids',
                                        'description' => '三価カルボン酸',
                                        'examples' => 'citric acid, isocitric acid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Hydroxy Acids',
                        'description' => 'ヒドロキシ酸',
                        'children' => [
                            [
                                'name' => 'α-Hydroxy Acids',
                                'description' => 'α-ヒドロキシ酸',
                                'examples' => 'lactic acid, glycolic acid',
                            ],
                            [
                                'name' => 'β-Hydroxy Acids',
                                'description' => 'β-ヒドロキシ酸',
                                'examples' => 'β-hydroxybutyric acid',
                            ],
                            [
                                'name' => 'Polyhydroxy Acids',
                                'description' => '多価ヒドロキシ酸',
                                'examples' => 'tartaric acid, citric acid',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Keto Acids',
                        'description' => 'ケト酸',
                        'children' => [
                            [
                                'name' => 'α-Keto Acids',
                                'description' => 'α-ケト酸',
                                'examples' => 'pyruvic acid',
                            ],
                            [
                                'name' => 'β-Keto Acids',
                                'description' => 'β-ケト酸',
                                'examples' => 'acetoacetic acid',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Aromatic Acids',
                        'description' => '芳香族酸',
                        'children' => [
                            [
                                'name' => 'Monocarboxylic Aromatic Acids',
                                'description' => '単価芳香族酸',
                                'examples' => 'benzoic acid',
                            ],
                            [
                                'name' => 'Polycarboxylic Aromatic Acids',
                                'description' => '多価芳香族酸',
                                'examples' => 'phthalic acid, terephthalic acid',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Acid Anhydrides',
                        'description' => '酸無水物',
                        'children' => [
                            [
                                'name' => 'Aliphatic Acid Anhydrides',
                                'description' => '脂肪族酸無水物',
                                'examples' => 'acetic anhydride, propionic anhydride',
                            ],
                            [
                                'name' => 'Aromatic Acid Anhydrides',
                                'description' => '芳香族酸無水物',
                                'examples' => 'phthalic anhydride',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Metal Salts of Organic Acids',
                        'description' => '有機酸の金属塩',
                        'children' => [
                            [
                                'name' => 'Alkali Metal Salts',
                                'description' => 'アルカリ金属塩',
                                'examples' => 'sodium acetate, potassium citrate',
                            ],
                            [
                                'name' => 'Alkaline Earth Metal Salts',
                                'description' => 'アルカリ土類金属塩',
                                'examples' => 'calcium propionate, magnesium citrate',
                            ],
                            [
                                'name' => 'Transition Metal Salts',
                                'description' => '遷移金属塩',
                                'examples' => 'iron gluconate',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Complex Organic Acids',
                        'description' => '複合有機酸',
                        'examples' => 'hyaluronic acid, tannic acid',
                    ],
                ],
            ],
            [
                'name' => 'Extracted and Complex Natural Compounds',
                'description' => '抽出および複合天然化合物 - 化学構造に基づく分類',
                'children' => [
                    [
                        'name' => 'Terpenoids',
                        'description' => 'テルペノイド',
                        'children' => [
                            [
                                'name' => 'Monoterpenes',
                                'description' => 'モノテルペン',
                                'children' => [
                                    [
                                        'name' => 'Acyclic Monoterpenes',
                                        'description' => '非環式モノテルペン',
                                        'examples' => 'geraniol, linalool',
                                    ],
                                    [
                                        'name' => 'Cyclic Monoterpenes',
                                        'description' => '環式モノテルペン',
                                        'examples' => 'thymol, menthol',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Sesquiterpenes',
                                'description' => 'セスキテルペン',
                                'children' => [
                                    [
                                        'name' => 'Acyclic Sesquiterpenes',
                                        'description' => '非環式セスキテルペン',
                                        'examples' => 'farnesene',
                                    ],
                                    [
                                        'name' => 'Cyclic Sesquiterpenes',
                                        'description' => '環式セスキテルペン',
                                        'examples' => 'β-caryophyllene, patchoulol',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Diterpenes',
                                'description' => 'ジテルペン',
                                'examples' => 'phytol, taxadiene',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Phenolic Compounds',
                        'description' => 'フェノール化合物',
                        'children' => [
                            [
                                'name' => 'Simple Phenols',
                                'description' => '単純フェノール',
                                'examples' => 'phenol, guaiacol',
                            ],
                            [
                                'name' => 'Polyphenols',
                                'description' => 'ポリフェノール',
                                'children' => [
                                    [
                                        'name' => 'Flavonoids',
                                        'description' => 'フラボノイド類',
                                        'examples' => 'catechin, quercetin',
                                    ],
                                    [
                                        'name' => 'Tannins',
                                        'description' => 'タンニン類',
                                        'examples' => 'hydrolysable tannin, condensed tannin',
                                    ],
                                    [
                                        'name' => 'Phenolic Acids',
                                        'description' => 'フェノール酸類',
                                        'examples' => 'gallic acid, ferulic acid',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Aldehydes and Ketones',
                        'description' => 'アルデヒドおよびケトン類',
                        'children' => [
                            [
                                'name' => 'Aldehydes',
                                'description' => 'アルデヒド',
                                'examples' => 'cinnamaldehyde, vanillin',
                            ],
                            [
                                'name' => 'Ketones',
                                'description' => 'ケトン類',
                                'examples' => 'camphor, reuterin',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Alcohols',
                        'description' => 'アルコール類',
                        'children' => [
                            [
                                'name' => 'Simple Alcohols',
                                'description' => '単純アルコール',
                                'examples' => 'ethanol, geraniol',
                            ],
                            [
                                'name' => 'Polyols',
                                'description' => 'ポリオール',
                                'examples' => 'glycerol, xylitol',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ethers',
                        'description' => 'エーテル類',
                        'children' => [
                            [
                                'name' => 'Simple Ethers',
                                'description' => '単純エーテル',
                                'examples' => 'anethole',
                            ],
                            [
                                'name' => 'Complex Ethers',
                                'description' => '複合エーテル',
                                'examples' => 'artemisinin',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Carboxylic Acids and Their Derivatives',
                        'description' => 'カルボン酸および誘導体',
                        'children' => [
                            [
                                'name' => 'Simple Carboxylic Acids',
                                'description' => '単純カルボン酸',
                                'examples' => 'acetic acid, formic acid',
                            ],
                            [
                                'name' => 'Polycarboxylic Acids',
                                'description' => '多価カルボン酸',
                                'examples' => 'citric acid, malic acid',
                            ],
                            [
                                'name' => 'Carboxylic Acid Derivatives',
                                'description' => 'カルボン酸誘導体',
                                'examples' => 'tocopheryl acetate',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Complex Mixtures',
                        'description' => '複合混合物',
                        'examples' => 'agarwood bouya essential oil, rose absolute',
                    ],
                ],
            ],
            [
                'name' => 'Chemical Compounds',
                'description' => '化学化合物',
                'children' => [
                    [
                        'name' => 'Inorganic Compounds',
                        'description' => '無機化合物',
                        'children' => [
                            [
                                'name' => 'Simple Inorganic Compounds',
                                'description' => '単純無機化合物',
                                'children' => [
                                    [
                                        'name' => 'Binary Compounds',
                                        'description' => '二元化合物',
                                        'examples' => 'sodium chloride, calcium chloride',
                                    ],
                                    [
                                        'name' => 'Polyatomic Compounds',
                                        'description' => '多原子無機化合物',
                                        'examples' => 'ammonium sulfate, sodium hydroxide',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Coordination Compounds',
                                'description' => '配位化合物',
                                'examples' => 'potassium hexacyanoferrate(III)',
                            ],
                            [
                                'name' => 'Transition Metal Compounds',
                                'description' => '遷移金属化合物',
                                'examples' => 'copper sulfate, iron(III) chloride',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Organoselenium Compounds',
                        'description' => '有機セレン化合物',
                        'children' => [
                            [
                                'name' => 'Selenium-containing Simple Compounds',
                                'description' => '単純セレン化合物',
                                'examples' => 'selenium dioxide, selenous acid',
                            ],
                            [
                                'name' => 'Selenium-based Polymers',
                                'description' => 'セレン系高分子化合物',
                                'examples' => 'nano selenium',
                            ],
                            [
                                'name' => 'Organoselenium Heterocycles',
                                'description' => 'セレン含有複素環化合物',
                                'examples' => 'selenophene',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Amine-based Compounds',
                        'description' => 'アミン系化合物',
                        'children' => [
                            [
                                'name' => 'Aliphatic Amines',
                                'description' => '脂肪族アミン',
                                'children' => [
                                    [
                                        'name' => 'Primary Amines',
                                        'description' => '第一級アミン',
                                        'examples' => 'methylamine',
                                    ],
                                    [
                                        'name' => 'Secondary Amines',
                                        'description' => '第二級アミン',
                                        'examples' => 'dimethylamine',
                                    ],
                                    [
                                        'name' => 'Tertiary Amines',
                                        'description' => '第三級アミン',
                                        'examples' => 'triethanolamine',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'Aromatic Amines',
                                'description' => '芳香族アミン',
                                'examples' => 'aniline, N,N-dimethylaniline',
                            ],
                            [
                                'name' => 'Polyfunctional Amines',
                                'description' => '多官能性アミン',
                                'examples' => 'ethylenediamine',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Carboxylic Acids and Derivatives',
                        'description' => 'カルボン酸および誘導体',
                        'children' => [
                            [
                                'name' => 'Simple Carboxylic Acids',
                                'description' => '単純カルボン酸',
                                'examples' => 'acetic acid',
                            ],
                            [
                                'name' => 'Polyfunctional Organic Acids',
                                'description' => '多官能性有機酸',
                                'examples' => 'citric acid, oxalic acid',
                            ],
                            [
                                'name' => 'Carboxylic Acid Derivatives',
                                'description' => 'カルボン酸誘導体',
                                'examples' => 'tocopheryl acetate',
                            ],
                        ],
                    ],
                ],
            ],
        ];
        foreach ($categories as $category) {
            $this->insertCategoryWithChildren($category);
        }
    }

    private function insertCategoryWithChildren(array $categoryData, $parentId = null)
    {
        $categoryId = DB::table('material_categories')->insertGetId([
            'name' => $categoryData['name'],
            'parent_id' => $parentId,
            'description' => $categoryData['description'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if (!empty($categoryData['children'])) {
            foreach ($categoryData['children'] as $childCategory) {
                $this->insertCategoryWithChildren($childCategory, $categoryId);
            }
        }
    }
}
