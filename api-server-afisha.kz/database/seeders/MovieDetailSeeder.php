<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\MovieDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movieDetails = [
            [
                'id' => 1,
                'movie_id' => 1,
                'description' => 'В детстве Питер Паркер был оставлен своими родителями, и поэтому воспитывался дядей и тётей. Шли годы, Питер был обычным примерным школьником, подвергался нападкам хулиганов и был влюблён в свою одноклассницу Гвен Стэйси, которая сама втайне отвечала ему взаимностью. Но после укуса генетически изменённого паука, Питер получает невероятные сверхспособности и его жизнь меняется навсегда. Однако его не перестаёт мучить вопрос о том, что случилось с его родителями. Он знакомится с давним другом и партнёром своего отца - генетиком Куртом Коннорсом, который вместе с отцом Питера разрабатывал формулу регенерации. Питер помогает её закончить, а Коннорс, всю жизнь мечтавший восстановить свою правую руку, вводит формулу себе и становится Ящером. Осознавая свою вину, Питер начинает новую жизнь в образе таинственного супергероя Человека-паука и становится грозой преступников, одновременно пытаясь найти способ остановить Коннорса.',
                'production_country_id' => 147,
                'production_year' => '2012',
                'premiere_date_kz' => '2012-07-05',
                'age_rating' => 12,
                'duration' => 131,
                'producer_id' => 2,
                'trailer_link' => 'https://youtu.be/fb7CaR89IJ0',
            ],
            [
                'id' => 2,
                'movie_id' => 2,
                'description' => 'После двух лет поисков правосудия на улицах Готэма Бэтмен становится для горожан олицетворением беспощадного возмездия. Когда в городе происходит серия жестоких нападений на высокопоставленных чиновников, улики приводят Брюса Уэйна в самые тёмные закоулки преступного мира, где он встречает Женщину-Кошку, Пингвина, Кармайна Фальконе и Загадочника. Теперь под прицелом оказывается сам Бэтмен, которому предстоит отличить друга от врага и восстановить справедливость во имя Готэма.',
                'production_country_id' => 147,
                'production_year' => '2022',
                'premiere_date_kz' => '2022-03-01',
                'age_rating' => 16,
                'duration' => 176,
                'producer_id' => 4,
                'trailer_link' => 'https://youtu.be/tZeMfF45Gmc',
            ],
            [
                'id' => 3,
                'movie_id' => 3,
                'description' => 'Медик американской армии времён Второй мировой войны Дезмонд Досс, который служил во время битвы за Окинаву, отказывается убивать людей и становится первым идейным уклонистом в американской истории, удостоенным Медали Почёта.',
                'production_country_id' => 147,
                'production_year' => '2016',
                'premiere_date_kz' => '2016-11-17',
                'age_rating' => 18,
                'duration' => 139,
                'producer_id' => 6,
                'trailer_link' => 'https://youtu.be/VxaGyCaCouY',
            ],
            [
                'id' => 4,
                'movie_id' => 4,
                'description' => 'В детстве юный наследник огромного состояния Брюс Уэйн оказался свидетелем убийства своих родителей, и тогда он решил бороться с преступностью. Спустя годы он отправляется в путешествие по миру, чтобы найти способ восстановить справедливость. Обучение у мудрого наставника боевым искусствам дает ему силу и смелость. Вернувшись в родной город, Уэйн становится Бэтменом и ведет борьбу со злом.',
                'production_country_id' => 147,
                'production_year' => '2005',
                'premiere_date_kz' => '2005-06-16',
                'age_rating' => 16,
                'duration' => 139,
                'producer_id' => 11,
                'trailer_link' => 'https://youtu.be/AejoSV6gXZw',
            ],
            [
                'id' => 5,
                'movie_id' => 5,
                'description' => 'Криминальная сага, повествующая о нью-йоркской сицилийской мафиозной семье Корлеоне. Фильм охватывает период 1945-1955 годов. Глава семьи, Дон Вито Корлеоне, выдаёт замуж свою дочь. В это время со Второй мировой войны возвращается его любимый сын Майкл. Майкл, герой войны, гордость семьи, не выражает желания заняться жестоким семейным бизнесом. Дон Корлеоне ведёт дела по старым правилам, но наступают иные времена, и появляются люди, желающие изменить сложившиеся порядки. На Дона Корлеоне совершается покушение.',
                'production_country_id' => 147,
                'production_year' => '1972',
                'premiere_date_kz' => '1972-03-14',
                'age_rating' => 16,
                'duration' => 175,
                'producer_id' => 7,
                'trailer_link' => 'https://youtu.be/HTY8zMALZP0',
            ],
            [
                'id' => 6,
                'movie_id' => 6,
                'description' => 'Демобилизовавшись, Данила Багров вернулся в родной городок. Но скучная жизнь российской провинции не устраивала его, и он решился податься в Петербург, где, по слухам, уже несколько лет процветает его старший брат. Данила нашел брата. Но все оказалось не так просто — брат работает наемным убийцей.',
                'production_country_id' => 120,
                'production_year' => '1997',
                'premiere_date_kz' => '1997-12-12',
                'age_rating' => 18,
                'duration' => 100,
                'producer_id' => 9,
                'trailer_link' => 'https://youtu.be/V0xbH91kvNE',
            ],
            [
                'id' => 7,
                'movie_id' => 7,
                'description' => 'Коржик, Карамелька и Компот вместе с родителями они отправляются отдыхать на морской курорт, где их ждут яркие события, полные весёлой суматохи и встреч с новыми друзьями.',
                'production_country_id' => 120,
                'production_year' => '2021',
                'premiere_date_kz' => '2022-06-16',
                'age_rating' => 0,
                'duration' => 65,
                'producer_id' => 13,
                'trailer_link' => 'https://youtu.be/NNgzdVPs2lo',
            ],
            [
                'id' => 8,
                'movie_id' => 8,
                'description' => 'В природе существует неразрывная связь между красотой и смертью. Туристы неустанно стремятся в Венецию — самый красивый город мира. Группа испанских туристов в Венеции борется за свою жизнь с местными жителями, которых приводит в ярость бесконечное нашествие иностранцев.',
                'production_country_id' => 130,
                'production_year' => '2021',
                'premiere_date_kz' => '2022-06-16',
                'age_rating' => 18,
                'duration' => 100,
                'producer_id' => 14,
                'trailer_link' => 'https://youtu.be/8xZhc2R8OIU',
            ],
            [
                'id' => 9,
                'movie_id' => 9,
                'description' => 'Торонто, 2002 год. Активная и неунывающая 13-летняя Мэйлинь всеми силами пытается быть первой во всём, чтобы угодить строгой гиперопекающей матери. Семья девочки живёт при храме и поклоняется Богине-прародительнице. Одним прекрасным утром Мэйлинь просыпается и вместо привычного отражения в зеркале видит красную панду — теперь, когда она волнуется, злится или испытывает другие сильные эмоции, превращается в большого зверя. Мало того, что это происходит в самые неподходящие моменты, так ещё и посещение концерта обожаемой Мэйлинь и её подружками мальчиковой группы 4-Town оказывается под угрозой.',
                'production_country_id' => 147,
                'production_year' => '2022',
                'premiere_date_kz' => '2022-06-01',
                'age_rating' => 6,
                'duration' => 100,
                'producer_id' => 15,
                'trailer_link' => 'https://youtu.be/GkLjQWlbHbQ',
            ],
        ];
        MovieDetail::insert($movieDetails);

        DB::table('movie_cast')->insert([
            [
                'movie_id' => 1,
                'cast_id' => 1,
            ],
            [
                'movie_id' => 1,
                'cast_id' => 3,
            ],
            [
                'movie_id' => 2,
                'cast_id' => 5,
            ],
            [
                'movie_id' => 3,
                'cast_id' => 1,
            ],
            [
                'movie_id' => 4,
                'cast_id' => 12,
            ],
            [
                'movie_id' => 5,
                'cast_id' => 8,
            ],
            [
                'movie_id' => 6,
                'cast_id' => 10,
            ],
        ]);

        DB::table('movie_genre')->insert([
            [
                'movie_id' => 1,
                'genre_id' => 1,
            ],
            [
                'movie_id' => 1,
                'genre_id' => 2,
            ],
            [
                'movie_id' => 1,
                'genre_id' => 43,
            ],
            [
                'movie_id' => 2,
                'genre_id' => 1,
            ],
            [
                'movie_id' => 2,
                'genre_id' => 10,
            ],
            [
                'movie_id' => 2,
                'genre_id' => 42,
            ],
            [
                'movie_id' => 2,
                'genre_id' => 43,
            ],
            [
                'movie_id' => 3,
                'genre_id' => 10,
            ],
            [
                'movie_id' => 3,
                'genre_id' => 44,
            ],
            [
                'movie_id' => 3,
                'genre_id' => 4,
            ],
            [
                'movie_id' => 3,
                'genre_id' => 15,
            ],
            [
                'movie_id' => 4,
                'genre_id' => 1,
            ],
            [
                'movie_id' => 4,
                'genre_id' => 43,
            ],
            [
                'movie_id' => 4,
                'genre_id' => 2,
            ],
            [
                'movie_id' => 4,
                'genre_id' => 10,
            ],
            [
                'movie_id' => 5,
                'genre_id' => 10,
            ],
            [
                'movie_id' => 5,
                'genre_id' => 42,
            ],
            [
                'movie_id' => 6,
                'genre_id' => 10,
            ],
            [
                'movie_id' => 6,
                'genre_id' => 42,
            ],
            [
                'movie_id' => 6,
                'genre_id' => 1,
            ],
            [
                'movie_id' => 7,
                'genre_id' => 45,
            ],
            [
                'movie_id' => 8,
                'genre_id' => 16,
            ],
            [
                'movie_id' => 8,
                'genre_id' => 38,
            ],
            [
                'movie_id' => 8,
                'genre_id' => 2,
            ],
            [
                'movie_id' => 9,
                'genre_id' => 45,
            ],
        ]);

        $logoImages = [
            [
                'id' => 1,
                'image_path' => 'seeder_images/image_21530_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 2,
                'image_path' => 'seeder_images/image_33716_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 3,
                'image_path' => 'seeder_images/image_30310_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 4,
                'image_path' => 'seeder_images/image_22432_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 5,
                'image_path' => 'seeder_images/image_17046_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 6,
                'image_path' => 'seeder_images/image_22370_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 7,
                'image_path' => 'seeder_images/image_17808_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 8,
                'image_path' => 'seeder_images/image_28266_1654493037.webp',
                'is_logo' => true,
            ],
            [
                'id' => 9,
                'image_path' => 'seeder_images/image_30534_1654493037.webp',
                'is_logo' => true,
            ],
        ];

        Image::insert($logoImages);

        $detailImages = [
            [
                'id' => 10,
                'image_path' => 'seeder_images/image_122296_1654495926.webp',
                'is_logo' => false,
            ],
            [
                'id' => 11,
                'image_path' => 'seeder_images/image_38476_1654495926.webp',
                'is_logo' => false,
            ],
        ];

        Image::insert($detailImages);

        DB::table('movie_images')->insert([
            [
                'movie_id' => 8,
                'image_id' => 1,
            ],
            [
                'movie_id' => 9,
                'image_id' => 2,
            ],
            [
                'movie_id' => 7,
                'image_id' => 3,
            ],
            [
                'movie_id' => 3,
                'image_id' => 4,
            ],
            [
                'movie_id' => 5,
                'image_id' => 5,
            ],
            [
                'movie_id' => 6,
                'image_id' => 6,
            ],
            [
                'movie_id' => 4,
                'image_id' => 7,
            ],
            [
                'movie_id' => 2,
                'image_id' => 8,
            ],
            [
                'movie_id' => 1,
                'image_id' => 9,
            ],
            [
                'movie_id' => 1,
                'image_id' => 10,
            ],
            [
                'movie_id' => 1,
                'image_id' => 11,
            ],
        ]);
    }
}
