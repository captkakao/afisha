# afisha.kz API documentation
## Кинотеатры

---
### ![](images/get.svg) /cinema/city/{city_id}
`Accept: application/json`

Получение списка кинотеатров по ID города

#### Ответ

`200`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| data | `array` | Список кинотеатров | 
| data.* | `object` | Информация о кинотеатре | 
| data.*.id | `number` | Идентификатор | 
| data.*.name | `string` | Название | 
| data.*.address | `string` | Адрес |

```json
{
  "data": [
    {
      "id": 1,
      "name": "Cinemax (Dostyk Plaza) Dolby Atmos",
      "address": "Самал-2, д. 111, уг.ул. Жолдасбекова, ТРЦ 'Достык Плаза'"
    }
  ]
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/get.svg) /cinema/{cinema_id}
`Accept: application/json`

Получение информации о кинотеатре по ID

#### Ответ

`200` 

| Поле | Тип | Описание | 
| ------ | ------ | ------ |  
| id | `number` | Идентификатор кинотеатра| 
| name | `string` | Название кинотеатра| 
| address | `string` | Адрес кинотеатра|
| description | `text` | Описание кинотеатра|

```json
{
  "id": 1,
  "name": "Cinemax (Dostyk Plaza) Dolby Atmos",
  "address": "Самал-2, д. 111, уг.ул. Жолдасбекова, ТРЦ 'Достык Плаза'",
  "description": "Организация является участником пилота по безопасному ведению деятельности..."
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/get.svg) /cinema/{cinema_id}/seances?datetime=2022-01-26 03:44:43
`Accept: application/json`

Получение информации о сеансах по ID кинотеатра и по дате

#### Ответ

`200`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| data | `array` | Список сеансов | 
| data.* | `object` | Информация о сеансах | 
| data.*.movie_id | `number` | Идентификатор фильма | 
| data.*.seance_id | `number` | Идентификатор сеанса | 
| data.*.time | `string` | Время показа фильма |
| data.*.hall_name | `string` | Название зала | 
| data.*.movie_language | `string` | Язык фильма | 
| data.*.price_adult | `number` | Цена билета для взрослых | 
| data.*.price_kid | `number` | Цена билета для детей | 
| data.*.price_student | `number` | Цена билета для студентов |
| data.*.price_vip | `number` | Цена билета для VIP |

```json
{
  "data": [
    {
      "movie_id": 1,
      "seance_id": 1,
      "time": "10:00",
      "hall_name": "Зал 10",
      "movie_language": "рус",
      "price_adult": 2500,
      "price_kid": null,
      "price_student": 2000,
      "price_vip": null
    }
  ]
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/get.svg) /cinema [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Получение информации о кинотеатрах спонсора

#### Ответ

`200`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| data | `array` | Список кинотеатров | 
| data.* | `object` | Информация о кинотеатре | 
| data.*.id | `number` | Идентификатор кинотеатра | 
| data.*.name | `string` | Название кинотеатра |
| data.*.description | `string` | Описание кинотеатра | 
| data.*.address | `string` | Адрес кинотеатра |

```json
{
  "data": [
    {
      "id": 1,
      "name": "Cinemax (Dostyk Plaza) Dolby Atmos",
      "description": "Организация является участником пилота по безопасному ведению деятельности...",
      "address": "Самал-2, д. 111, уг.ул. Жолдасбекова, ТРЦ 'Достык Плаза'"
    }
  ]
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных


---

### ![](images/post.svg) /cinema [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Создание кинотеатра

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| name | `string` | Да | Название кинотеатра |
| description | `string` | Да | Описание кинотеатра |
| address | `string` | Да | Адрес кинотеатра |
| city_id | `string` | Да | Идентификатор города в котором находится кинотеатр |

#### Пример запроса

```json
{
  "name": "Cinemax (Dostyk Plaza) Dolby Atmos",
  "description": "Организация является участником пилота по безопасному ведению деятельности...",
  "address": "Самал-2, д. 111, уг.ул. Жолдасбекова, ТРЦ 'Достык Плаза'",
  "city_id": 1
}
```

#### Ответ

`201`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| id | `number` | Идентификатор кинотеатра |

```json
{
  "id": 1
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/put.svg) /cinema/{cinema_id} [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Редактирование кинотеатра

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| name | `string` | Да | Название кинотеатра |
| description | `string` | Да | Описание кинотеатра |
| address | `string` | Да | Адрес кинотеатра |
| city_id | `string` | Да | Идентификатор города в котором находится кинотеатр |

#### Пример запроса

```json
{
  "name": "Cinemax (Dostyk Plaza) Dolby Atmos",
  "description": "Организация является участником пилота по безопасному ведению деятельности...",
  "address": "Самал-2, д. 111, уг.ул. Жолдасбекова, ТРЦ 'Достык Плаза'",
  "city_id": 1
}
```

#### Ответ

`200` - Данные успешно обновлены

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/delete.svg) /cinema/{cinema_id} [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Удаление кинотеатра

#### Ответ

`204` - Кинотеатр успешно удален

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных
