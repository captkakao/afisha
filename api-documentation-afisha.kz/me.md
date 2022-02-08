# afisha.kz API documentation

## Операции с авторизированным пользователем

---

### ![](images/get.svg) /me [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Получение данных о текущем пользователе

#### Ответ

`200`

| Поле | Тип | Описание |
| ------ | ------ | ------ |
| id | `number` | ID пользователя |
| first_name | `string` | Имя пользователя |
| last_name | `string` | Фамилия пользователя |
| email | `string` | E-Mail |
| birthdate | `date` | Дата рождения |
| phone_number | `string` `null` | Номер телефона |
| avatar_url | `string` | Ссылка на аватар |

```json
{
  "id": 1,
  "first_name": "Fiko",
  "last_name": "Joy",
  "email": "fikojoy@gmail.com",
  "birthdate": "2021-09-11",
  "phone_number": "77777777777",
  "avatar_url": "https://..."
}
```

---

### ![](images/put.svg) /me [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Обновление данных о текущем пользователе

#### Body

| Параметр | Тип  | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| first_name | `string` | Да | Имя пользователя |
| last_name | `string` | Да | Фамилия пользователя |
| birthdate | `date` | Да | Дата рождения |

#### Пример запроса

```json
{
  "first_name": "Fiko",
  "last_name": "Joy",
  "birthdate": "2021-09-11"
}
```

#### Ответ

`200` - успешно

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных


---

### ![](images/put.svg) /me/password [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Обновление пароля с последующим сбросом всех активных сессий, кроме текущей

#### Body

| Параметр | Тип  | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| current_password | `string` | Да | Текущий пароль |
| new_password | `string` | Да | Новый пароль |

#### Пример запроса

```json
{
  "current_password": "qweqwe123",
  "new_password": "qweqwe123"
}
```

#### Ответ

`200` - пароль успешно обновлен, все сессии, кроме текущей, сброшены 

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных


---

### ![](images/post.svg) /me/avatar [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Загрузка аватара пользователя

#### Body

| Параметр | Тип  | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| avatar | `file (image: jpg, jpeg, png)` | Да | Файл аватарки |

#### Ответ

`200` - аватар успешно обновлен

```json
{
  "avatar_url": "https://..."
}
```

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---

### ![](images/delete.svg) /me/avatar [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Удаление аватара пользователя

#### Ответ

`204` - аватар успешно удален