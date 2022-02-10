# afisha.kz API documentation

## Навигация

### [**Регистрация/Авторизация**](auth.md#авторизация)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `POST` | [**/auth/register**](auth.md#authregister) | Регистрация |
| `POST` | [**/auth/login**](auth.md#authlogin) | Аутентификация |
| `POST` | [**/auth/logout**](auth.md#authlogout) | Завершение текущей сессии |
| `POST` | [**/auth/logout/another**](auth.md#authlogoutanother) | Завершение всех сессий кроме текущей |
| `POST` | [**/auth/password/forgot**](auth.md#authpasswordforgot) | Запрос на восстановление пароля |
| `POST` | [**/auth/password/reset**](auth.md#authpasswordreset) | Восстановление пароля |
| `POST` | [**/auth/admin/login**](auth.md#authlogin) | Аутентификация админа |

### [**Операции с авторизированным пользователем**](me.md#операции-с-авторизированным-пользователем)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `GET` | [**/me**](me.md#me) | Получение данных о текущем пользователе |
| `PUT` | [**/me**](me.md#me-2) | Обновление данных о текущем пользователе |
| `PUT` | [**/me/password**](me.md#mepassword) | Обновление пароля с последующим сбросом всех активных сессий, кроме текущей |
| `POST` | [**/me/avatar**](me.md#meavatar) | Обновление аватара пользователя |
| `DELETE` | [**/me/avatar**](me.md#meavatar) | Удаление аватара пользователя |

### [**Подтверждение данных пользователя**](confirmation.md#подтверждение-данных-пользователя)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `POST` | [**/phone-confirmation/send**](confirmation.md#phone-confirmationsend) | Отправка СМС-кода для подтверждения номера |
| `POST` | [**/phone-confirmation/confirm**](confirmation.md#phone-confirmationconfirm) | Подтвердить номер телефона |
| `POST` | [**/email-confirmation/send**](confirmation.md#email-confirmationsend) | Отправка письма для подтверждения указанной почты |
| `POST` | [**/email-confirmation/confirm**](confirmation.md#email-confirmationconfirm) | Подтвердить e-mail |

### [**Кинотеатры**](cinema.md#кинотеатры)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `GET` | [**/cinema/city/{city_id}**](cinema.md#cinemacity_id) | Получение списка кинотеатров по ID города |
| `GET` | [**/cinema/{cinema_id}/seances?**](cinema.md#cinemacinema_idseances) | Получение информации о сеансах по ID кинотеатра и по дате |
| `GET` | [**/cinema**](cinema.md#cinema) | Получение информации о кинотеатрах спонсора |
| `GET` | [**/cinema/{cinema_id}**](cinema.md#cinemacinema_id) | Получение информации о кинотеатре по ID |
| `POST` | [**/cinema**](cinema.md#cinema) | Создание кинотеатра |
| `PUT` | [**/cinema/{cinema_id}**](cinema.md#cinemacinema_id) | Редактирование кинотеатра |
| `DELETE` | [**/cinema/{cinema_id}**](cinema.md#cinemacinema_id) | Удаление кинотеатра |

### [**Кинозалы**](cinema.md#кинозалы)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `GET` | [**/cinema/{cinema_id}/cinema_hall**](cinema_hall.md#cinemacinema_idcinema_hall) | Получение информации о кинозалах по ID кинотеатра |
| `POST` | [**/cinema/{cinema_id}/cinema_hall**](cinema_hall.md#cinemacinema_idcinema_hall) | Создание кинозала |
| `PUT` | [**/cinema/cinema_hall/{cinema_hall_id}**](cinema_hall.md#cinemacinema_idseances) | Получение информации о сеансах по ID кинотеатра и по дате |
| `DELETE` | [**/cinema/cinema_hall/{cinema_hall_id}**](cinema_hall.md#cinemacinema_hallcinema_hall_id) | Удаление кинотеатра |

### [**Сеансы**](seance.md#сеансы)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `POST` | [**/seance**](seance.md#seance) | Создание сеанса |
| `PUT` | [**/seance/{seance_id}**](seance.md#seanceseance_id) | Редактирование сеанса |
| `PUT` | [**/seance/{seance_id}/seat**](seance.md#seanceseance_idseat) | Бронирование мест в кинозале |
| `DELETE` | [**/seance/{seance_id}**](cinema_hall.md#seanceseance_id) | Удаление сеанса |

### [**События в кинотеатре**](cinema_event.md#события_в_кинотеатре)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `GET` | [**/cinema/event**](cinema_event.md#cinemaevent) | Получение информации о событиях по всем кинотеатрам |
| `GET` | [**/cinema/{cinema_id}/event**](cinema_event.md#cinemacinema_idevent) | Получение информации о событиях по ID кинотеатра |
| `POST` | [**/cinema/{cinema_id}/event**](cinema_event.md#cinemacinema_idevent) | Создание событии в кинотеатре |
| `PUT` | [**/cinema/event/{event_id}**](cinema_event.md#cinemaeventevent_id) | Редактирование событии |
| `DELETE` | [**/cinema/event/{event_id}**](cinema_event.md#seanceseance_id) | Удаление событии |

### [**Общие API**](common.md#общие)

| Метод | Путь | Описание |
| ------ | ------ | ------ |
| `GET` | [**/cities**](common.md#cities) | Получения списка городов |
| `GET` | [**/today_tomorrow**](common.md#today_tomorrow) | Получение информации о событиях по ID кинотеатра |

### [**Ошибки**](errors.md#ошибки)

## Условные обозначения
| Иконка | Описание |
| ------ | ------ |
| ![](images/lock.svg) | Запрос к такому ресурсу требует авторизации. Подробно об авторизации можно узнать [**здесь**](auth.md) |
| ![](images/pagination.svg) | Запрос к этому ресурсу поддерживает пагинацию. Подробно о пагинации можно узнать [**здесь**](#пагинация-ресурсов) |

## Пагинация ресурсов

Некоторые endpoints возвращают вместе с набором данных постраничную пагинацию. Для таких ресурсов формат данных одинаковый, поэтому он был вынесен в общий раздел.

#### Query
| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| page | `number` | Нет | Текущая страница пагинации. **По умолчанию** `1` |

#### Ответ

| Параметр | Тип | Описание |
| ------ | ------ | ------ |
| data | `object` | Набор из ресурсов |
| links | `object` | Ссылки на страницы пагинации |
| links.first | `string` | URL первой страницы |
| links.last | `string` | URL последней страницы |
| links.prev | `string` `null` | URL предыдущей страницы |
| links.next | `string` `null` | URL следующей страницы |
| meta | `object` | Дополнительная информация о пагинации |
| meta.from | `number` | Порядковый номер записи, с которой начинается текущая страница |
| meta.to | `number` | Порядковый номер записи, на которой заканчивается текущая страница |
| meta.current_page | `number` | Номер текущей страницы |
| meta.last_page | `number` | Номер последней страницы |
| meta.per_page | `number` | Количество записей на одной странице |
| meta.total | `number` | Общее количество записей |
| meta.path | `string` | Базовый URL для запросов |

Пример ответа на запрос списка пользователей. В базе данных, в таблице users хранится 20 записей. 
При выполнении запроса `https://.../users?page=4`, сервер вернет следующие данные пагинации:

```json
{
  "data": [
    "..."
  ],
  "links": {
    "first": "https://.../users?page=1",
    "last": "https://.../users?page=4",
    "prev": "https://.../users?page=3",
    "next": null
  },
  "meta": {
    "from": 16,
    "to": 20,
    "current_page": 4,
    "last_page": 4,
    "per_page": 5,
    "total": 20,
    "path": "https://.../users"
  }
}
```