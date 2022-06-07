<?php

namespace Database\Seeders;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            [
                'id' => 1,
                'title' => 'Джонни Депп выиграл суд против Эмбер Херд',
                'description' => json_encode('Толпа фанатов Джонни Деппа у здания суда в Вирджинии радостно скандирует его имя. Знаменитый актёр выиграл дело о клевете против своей бывшей жены Эмбер Херд. Ему присудили более 14 миллионов евро компенсации.

Депп написал в соцсетях, что "наконец-то вернулся к жизни" после шести недель гремевшего на весь мир разбирательства по поводу обвинений в домашнем насилии.

Эмбер Херд же заявила, что "крайне разочарована" решением суда, назвав его "фиаско для всех женщин".

Впрочем, суд обязал бывшего супруга выплатить ей почти два миллиона евро компенсации ущерба по встречному иску - из-за того, что адвокат Деппа назвал обвинения актрисы в насилии "мистификацией".', true),
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'id' => 2,
                'title' => '94-я церемония вручения премии «Оскар»: коротко о главном',
                'description' => json_encode('«Дюна» получает награды за лучший монтаж, работу художника-постановщика и оригинальный саундтрек (Ханс Циммер)

Лучший короткометражный фильм — «Долгое прощание».

Лучший документальный короткометражный — «Королева баскетбола».

Лучший анимационный короткометражный — «Стеклоочиститель».

В номинации «лучший короткометражный мультфильм» также выдвигался мультфильм российского режиссера Антона Дьякова «Боксбалет».

Статуэтка за лучший грим и прически уходит к «Глаза Тэмми Фэй». В этой номинации были также представлены «Дом Gucci», «Дюна», «Круэлла» и «Поездка в Америку 2»«Лучшая актриса второго плана» — Ариана ДеБос («Вестсайдская история» Стивена Спилберга)

Приз получает оператор Грег Фрейзер «Лучшие визуальные эффекты» — «Дюна».

«Лучший анимационный фильм» — «Энканто» (Disney).

«Лучшая мужская роль второго плана» — Трой Коцур, сыгравший трогательного отца в «CODA: Ребенок глухих родителей».

«Лучший иностранный фильм» — «Сядь за руль моей машины» (реж. Рюсукэ Хамагути, Япония).

Приз за лучшие костюмы получает «Круэлла».

«Лучший оригинальный сценарий» — «Белфаст» (режиссер и сценарист Кеннет Брана).

«Лучший адаптированный сценарий» — «CODA: Ребенок глухих родителей» (Сиан Хедер).

«Лучший документальный фильм» — «Лето Соула».

«Лучшая песня» — Билли Айлиш и Финнеас О’Коннелл / No time to die (саундтрек к фильму «Не время умирать»).

«Оскар» за лучшую режиссуру получает Джейн Кэмпион («Власть пса»).

«Лучшая мужская роль» — Уилл Смит, сыгравший отца и первого тренера теннисисток Винус и Серены Уильямс.', true),
                'created_at' => Carbon::now()->addDay(),
            ],
            [
                'id' => 3,
                'title' => 'Сандра Баллок объявила об уходе из кино',
                'description' => json_encode('Популярная голливудская актриса Сандра Баллок намерена на время оставить кинематограф. Такое признание она сделала в беседе с корреспондентами издания ET Canada. По словам Баллок, она намерена сосредоточиться на своих детях, и быть «в том месте, где она чувствует себя наиболее счастливой».

«Я очень серьезно отношусь к своей работе, — сказала она, посетовав, что профессия занимает все ее время. — А я хочу быть 24 часа в сутки и семь дней в неделю со своей семьей».

Сандра Баллок также отметила, что является «сумасшедшей мамочкой», когда речь заходит о процедурах безопасности, связанных с пандемией. «Все родители знают, что их дети вернутся без COVID, когда приходят в наш дом», — добавила актриса.

Напомним, что у Баллок двое детей — 12-летний сын Луи и 10-летняя дочь Лейла. Оба ребенка приемные.

В 2022 году поклонники таланта актрисы смогут оценить ее новую работу в приключенческой комедии под названием «Затерянный город», в котором ее партнером по съемочной площадке был Ченнинг Татум. Баллок особо отметила, что ей было очень комфортно сниматься с ним. Также она появится в боевике «Быстрее пули», который выйдет летом.', true),
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'title' => 'Саша Барон Коэн снимется в триллере Альфонсо Куарона',
                'description' => json_encode('Известный голливудский актер и продюсер Саша Барон Коэн ведет переговоры об участии в сериале «Все совпадения случайны», который снимет для Apple TV+ Альфонсо Куарон. В предстоящем телепроекте, основанном на одноименном романе Рене Найт, главные роли исполняют утвержденные ранее Кейт Бланшетт и Кевин Клайн. Куарон совмещает обязанности автора сценария, режиссера и исполнительного продюсера.

В прошлом году Барон Коэн получил две номинаций на премию «Оскар» — за лучшую мужскую роль второго плана в фильме Аарона Соркина «Суд над чикагской семеркой» и за лучший адаптированный сценарий к фильму «Борат 2». Недавний сериал Netflix «Шпион», в котором Барон Коэн исполнил главную роль, был высоко оценен профессиональными критиками.

В качестве операторов в проекте примут участие Эммануэль Любецки («Гравитация») и Бруно Дельбоннель («Макбет»).

В центре сюжета сериала — успешная тележурналистка Кэтрин Равенскрофт (Бланшетт), построившая свою карьеру на разоблачении уважаемых институтов. Когда на ее прикроватном столике появляется интригующий роман, написанный вдовцом, которого играет Клайн, она с ужасом осознает, что является ключевым персонажем в истории, которая, как она надеялась, давно похоронена в прошлом и которая раскрывает ее самую страшную тайну. Роль Барона Коэна не раскрывается.', true),
                'created_at' => Carbon::now()->subMonth(),
            ],
            [
                'id' => 5,
                'title' => 'Приквел "Безумного Макса 4" будет драмой',
                'description' => json_encode('Фантастический фильм «Фуриоса» студии Warner Bros. будет скорее драмой, а не фильмом о погоне, как «Безумный Макс 4: Дорога ярости». Такое заявление сделал помощник режиссера и продюсер предстоящей картины П.Дж. Вотен, в частности сказав: ««Фуриоса» — это, скорее, традиционная драма из трех актов. Если люди ожидают увидеть еще один фильм о погоне, то это будет не так».

Джордж Миллер, перезапустивший в 2015 году собственную франшизу фильмом «Безумный Макс 4: Дорога ярости», вывел на первый план женский персонаж — Фуриосу в исполнении Шарлиз Терон. В готовящемся приквеле роль героини исполнит звезда мини-сериала «Ход королевы» Аня Тейлор-Джой. Компанию ей составит Крис Хемсворт, который по неподтвержденной официально информации, сыграет злодея по имени Доктор Дементус.

Также стало известно о некоторых местах, где будет происходить действие. По словам менеджера по производству, зрители увидят Газтаун и Свинцовую Ферму. Они упоминались в «Дороге ярости», но не были показаны. Поскольку «Фуриоса» — это приквел, локации должны быть в том виде, в каком они существовали до событий оригинального фильма. Предположительно, будет показана родина героини, «Зеленые Земли», которую ее жители покинули после того, как некогда плодородное место превратилось в маслянистое болото, кишащее воронами.

Новая дата премьеры фильма — май 2024 года.', true),
                'created_at' => Carbon::now()->addDays(2),
            ],
            [
                'id' => 6,
                'title' => 'Paramount официально запустила в работу «Звёздный путь 4» с Крисом Пайном и Закари Куинто',
                'description' => json_encode('Студия Paramount объявила о возвращении франшизы «Звёздный путь» с четвёртым фильмом. В ленте будет сниматься оригинальный актёрский состав, включая Криса Пайна (капитан Кирк), Закари Куинто (Спок) и Зои Салдану (Ухура).

Новую ленту анонсировали во время ежегодного Дня инвесторов Paramount. «Звёздный путь» представил режиссёр фильмов Джей Джей Абрамс: «Мы рады сообщить, что усердно работаем над четвёртым фильмом, съёмки которого стартуют ближе к концу года с оригинальным кастом и новыми персонажами».

В прошлом году на пост режиссёра фильма заступил Мэтт Шекман (сериал «Ванда/Вижн»). Среди актёров также вернутся Карл Урбан, Саймон Пегг и Джон Чо. Работа над продолжением велась несколько лет: в 2018 году к проекту была приписана режиссёрка С. Дж. Кларксон, а сюжет должен был включать отца Кирка, которого мог воплотить Крис Хемсворт. Однако сделку с актёром заключить не удалось.

Одно время к проекту проявлял интерес Квентин Тарантино, от чего впоследствии отказался.

Новая франшиза «Звёздный путь» стартовала в 2009 году и была продолжена двумя сиквелами, «Стартрек: Возмездие» (2013) и «Бесконечность» (2016).', true),
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'id' => 7,
                'title' => '«Бэтмен» станет самым продолжительным фильмом о супергерое DC',
                'description' => json_encode('Студия Warner Bros. подтвердила хронометраж фильма "Бэтмен", который снял режиссер Мэтт Ривз. Зрителям предстоит запастись терпением, так как в зале им предстоит провести не менее двух часов сорока семи минут, или двух часов пятидесяти шести минут вместе с титрами.

Таким образом, “Бэтмен” оказался самым продолжительным сольным проектом, посвященным супергерою DC, превзойдя в том числе 165-минутную экранизацию Кристофера Нолана "Темный рыцарь 2: Возрождение легенды". Более того, он станет одним из самых длинных фильмов о супергероях, из когда-либо снятых, продолжительнее, чем театральная версия "Бэтмен против Супермена: На заре справедливости".

Напомним, что "Бэтмен" Мэтта Ривза был запущен в производство после неудачной попыткой Warner Bros. создать новую франшизу о Бэтмене с участием Бена Аффлека, поскольку изначально предполагалось, что актер сыграет главную роль и станет постановщиком.

Ожидается, что Аффлек появится в предстоящем фильме "Флэш", но действие фильма Ривза разворачивается не во взаимосвязанной вселенной DC, так что “Бэтмен” - это в значительной степени новое начало. Релиз картины запланирован на начало марта 2022 года.', true),
                'created_at' => Carbon::now()->subDays(3),
            ],
            [
                'id' => 8,
                'title' => 'Marvel возобновит съемки «Черной пантеры 2»',
                'description' => json_encode('Киностудия Marvel возобновляет съемки фантастического боевика «Черная пантера 2: Ваканда навсегда», которые были прерваны осенью 2021 года после того, как исполнительница одной из главных ролей Летишиа Райт получила ранения на съемочной площадке.

Утверждается, что актриса прошла необходимый курс лечения и готова вернуться к работе, которая продлится в течение следующих четырех недель в Атланте. «Летишиа восстанавливается в Лондоне с сентября после травм, полученных на съемках «Черной пантеры 2», и с нетерпением ждет возвращения к работе в начале 2022 года. Летишиа любезно просит вас упоминать ее в своих молитвах», - говорится в заявлении представителя актрисы.

Инсайдеры утверждают, что задержки в производстве не должны повлиять на заявленный ранее прокатный график. «Черная пантера 2» должна выйти в прокат в ноябре 2022 года.

Первая часть не только была очень успешна в прокате, собрав в общей сложности более 1,3 миллиарда долларов, но и претендовала на множество профессиональных наград, в том числе семь премий Американской Киноакадемии. Это была первая экранизация комиксов, которая выдвигалась на соискание главного трофея в номинации «лучший фильм.', true),
                'created_at' => Carbon::now()->subDays(2),
            ],
            [
                'id' => 9,
                'title' => 'Брюс Уиллис объявил об уходе из кино',
                'description' => json_encode('Дочь Брюса Уиллиса Рамер сделала официальное заявление от имени их семьи, сообщив, что ее знаменитый отец вынужден отказаться от актерской деятельности после того, как ему был поставлен диагноз «афазия», расстройства, вызванного повреждением головного мозга, которое влияет на способность общаться.

«Мы хотели бы поделиться с удивительными поклонниками тем, что наш любимый Брюс испытывает некоторые проблемы со здоровьем, и недавно ему поставили диагноз афазия, которая влияет на его когнитивные способности. В результате этого и с большим сожалением Брюс отказывается от карьеры, которая так много для него значила. Это действительно сложное время для нашей семьи, и мы так благодарны вам за вашу неизменную любовь, сострадание и поддержку. Мы проходим через это как крепкая семья и хотели бы держать поклонников в курсе происходящего, потому что мы знаем, как много он значит для вас, как и вы для него. С любовью, Эмма, Деми, Рамер, Скаут, Таллула, Мейбл и Эвелин», - говорится в заявлении по этому поводу.

Отметим, что в последние годы у актера был довольно плотный график, он оказался задействован в основном в малобюджетных боевиках и триллерах. Его усилия были отмечены «Золотой малиной».', true),
                'created_at' => Carbon::now()->subDays(4),
            ],
        ];
        News::insert($news);
    }
}