# afisha.kz API documentation
## События в кинотеатре

---

### ![](images/get.svg) /cinema/event [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Получение информации о событиях по всем кинотеатрам

#### Ответ

`200`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| data | `array` | Список событии | 
| data.* | `object` | Информация о событии | 
| data.*.id | `number` | Идентификатор | 
| data.*.title | `string` | Заголовок | 
| data.*.cinema_id | `number` | Идентификатор кинотеатра в котором проводится событие |
| data.*.created_at | `datetime` | Дата создания |

```json
{
  "data": [
    {
      "id": 1,
      "title": 1,
      "cinema_id": 1,
      "created_at": "2021-11-22 15:00"
    }
  ]
}
```

---

### ![](images/get.svg) /cinema/{cinema_id}/event [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Получение информации о событиях по ID кинотеатра

#### Ответ

`200`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| data | `array` | Список событии | 
| data.* | `object` | Информация о событии | 
| data.*.id | `number` | Идентификатор | 
| data.*.title | `string` | Заголовок |  
| data.*.cinema_id | `number` | Идентификатор кинотеатра |
| data.*.created_at | `datetime` | Дата создания |

```json
{
  "data": [
    {
      "id": 1,
      "title": 1,
      "cinema_id": 1,
      "created_at": "2021-11-22 15:00"
    }
  ]
}
```

---

### ![](images/post.svg) /cinema/{cinema_id}/event [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Создание событии в кинотеатре

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| title | `string` | Да | Заголовок событий |
| description | `string` | Да | Описание событий |

#### Пример запроса

```json
{
  "title": "Какое то событие",
  "description": "Описание событии"
}
```

#### Ответ

`201`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| id | `number` | Идентификатор событий |

```json
{
  "id": 1
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/put.svg) /cinema/event/{event_id} [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Редактирование событии

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| title | `string` | Да | Заголовок событий |
| description | `json` | Да | Описание событий |

#### Пример запроса

```json
{
  "title": "Какое то событие",
  "description": "Описание событии"
}
```

#### Ответ

`200` - Данные успешно обновлены

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/delete.svg) /cinema/event/{event_id} [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Удаление событии

#### Ответ

`204` - Событие успешно удалено

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных
