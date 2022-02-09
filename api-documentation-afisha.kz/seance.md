# afisha.kz API documentation
## Сеансы

---

### ![](images/post.svg) /seance [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Создание сеанса (расписание фильмов)

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| price_adult | `number` | Нет | Цена для взрослых |
| price_kid | `number` | Нет | Цена для детей |
| price_student | `number` | Нет | Цена для студентов |
| price_vip | `number` | Нет | Цена для VIP |
| show_time | `datetime` | Да | Дата и время показа сеанса |
| movie_id | `number` | Да | Идентификатор фильма |
| hall_id | `number` | Да | Идентификатор кинозала |

#### Пример запроса

```json
{
  "price_adult": 2500,
  "price_kid": 750,
  "price_student": 1200,
  "price_vip": 5000,
  "show_time": "2021-11-22 19:15",
  "movie_id": 1,
  "hall_id": 1
}
```

#### Ответ

`201`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| id | `number` | Идентификатор сеанса |

```json
{
  "id": 1
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/put.svg) /seance/{seance_id} [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Редактирование сеанса

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| price_adult | `number` | Нет | Цена для взрослых |
| price_kid | `number` | Нет | Цена для детей |
| price_student | `number` | Нет | Цена для студентов |
| price_vip | `number` | Нет | Цена для VIP |
| show_time | `datetime` | Да | Дата и время показа сеанса |
| movie_id | `number` | Да | Идентификатор фильма |
| hall_id | `number` | Да | Идентификатор кинозала |

#### Пример запроса

```json
{
  "price_adult": 2500,
  "price_kid": 750,
  "price_student": 1200,
  "price_vip": 5000,
  "show_time": "2021-11-22 19:15",
  "movie_id": 1,
  "hall_id": 1
}
```

#### Ответ

`200` - Данные успешно обновлены

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/put.svg) /seance/{seance_id}/seat [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Бронирование мест в кинозале

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| seat_config | `json` | Да | Идентификатор кинотеатра |

#### Пример запроса

```json
{
  "seat_config": "{...}"
}
```

#### Ответ

`200` - Данные успешно обновлены

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/delete.svg) /seance/{seance_id} [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Удаление сеанса

#### Ответ

`204` - Сеанс успешно удален

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных
