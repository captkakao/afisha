# afisha.kz API documentation

## Авторизация

Регистрация/Авторизация пользователей

После авторизации, клиент получает токен, необходимый для доступа к закрытым методам API. \
Для доступа полученный токен необходимо отправить в заголовке `Authorization: Bearer <token>`

---

### ![](images/post.svg) /auth/register
`Accept: application/json`

Регистрация

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| first_name | `string` | Да | Имя пользователя |
| last_name | `string` | Да | Фамилия пользователя |
| email | `string` | Да | Электронная почта |
| password | `string` | Да | Пароль |
| google_recaptcha_token | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3) |
| google_recaptcha_action | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3). `Значение: register`. Имя действия для этого запроса. Допускается произвольное значение. |

#### Пример запроса

```json
{
  "first_name": "Fiko",
  "last_name": "Joy",
  "email": "fikojoy@gmail.com",
  "password": "qweqwe123",
  "google_recaptcha_token": "eyJhbGciOiJIUzI1Ni...",
  "google_recaptcha_action": "register"
}
```

#### Ответ

`201` - пользователь успешно создан \
Для завершения регистрации пользователю необходимо перейти по ссылке, отправленной на указанный E-Mail. \
Для повторной отправки письма (кнопка "Отправить повторно") нужно использовать
endpoint [/email-confirmation/send](confirmation.md#-email-confirmationsend)

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных


---

### ![](images/post.svg) /auth/login
`Accept: application/json`

Авторизация

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| email | `string` | Да | Электронная почта |
| password | `string` | Да | Пароль |
| google_recaptcha_token | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3) |
| google_recaptcha_action | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3). `Значение: login`.  Имя действия для этого запроса. Допускается произвольное значение. |

#### Пример запроса

```json
{
  "email": "user@gmail.com",
  "password": "qwerty",
  "google_recaptcha_token": "eyJhbGciOiJIUzI1Ni...",
  "google_recaptcha_action": "login"
}
```

#### Ответ

`201` - сессия успешно создана

```json
{
  "auth_token": "eyJ0eXAiOiJKV1Q..."
}
```

`400`

| error_type | Описание |
| ------ | ------ |
| email_confirmation | Пользователь не подтвердил свою почту |

`401` - Данные пользователя введены неверно

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных


---

### ![](images/post.svg) /auth/logout [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Завершение текущей сессии

#### Body

**Пустой**

#### Ответ

`200` - Запрос успешно выполнен

---

### ![](images/post.svg) /auth/logout/another [![](images/lock.svg)](auth.md#авторизация)
`Accept: application/json`

Завершение всех сессий кроме текущей

#### Body

**Пустой**

#### Ответ

`200` - Запрос успешно выполнен

---

### ![](images/post.svg) /auth/password/forgot
`Accept: application/json`

Запрос на восстановление пароля. \
Для повторного запроса письма (кнопка "Отправить повторно") нужно отправлять запрос на этот же endpoint. \
Если пользователь введет e-mail, не найденный в базе, сервер вернет [ошибку валидации 422](errors.md#ошибка-валидации-данных)

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| email | `string` | Да | Электронная почта |
| google_recaptcha_token | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3) |
| google_recaptcha_action | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3). `Значение: password_forgot`. Имя действия для этого запроса. Допускается произвольное значение. |

#### Пример запроса

```json
{
  "email": "user@gmail.com",
  "google_recaptcha_token": "eyJhbGciOiJIUzI1Ni...",
  "google_recaptcha_action": "password_forgot"
}
```

#### Ответ

`200` - запрос успешно создан, письмо для восстановления будет отправлено на почту

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных


---

### ![](images/post.svg) /auth/password/reset
`Accept: application/json`

Восстановление пароля. \
Если будет отправлен e-mail или token, не найденный в базе, сервер вернет [ошибку валидации 422](errors.md#ошибка-валидации-данных)

#### Body

| Параметр | Тип | Обязательный | Описание |
| ------ | ------ | ------ | ------ |
| email | `string` | Да | Электронная почта |
| token | `string` | Да | Токен восстановления, отправленный через endpoint [*/auth/password/forgot*](#-authpasswordforgot)  |
| password | `string` | Да | Новый пароль |
| password_confirmation | `string` | Да | Подтверждение пароля |
| google_recaptcha_token | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3) |
| google_recaptcha_action | `string` | Да | [Google Recaptcha V3](https://developers.google.com/recaptcha/docs/v3). `Значение: password_reset`. Имя действия для этого запроса. Допускается произвольное значение. |

#### Пример запроса

```json
{
  "email": "user@gmail.com",
  "token": "eyJ0eXAiOiJKV1Q...",
  "google_recaptcha_token": "eyJhbGciOiJIUzI1Ni...",
  "google_recaptcha_action": "password_reset"
}
```

#### Ответ

`200` - Пароль успешно изменен. Все активные сессии были завершены

`422` - [ошибка валидации](errors.md#ошибка-валидации-данных) полученных данных

---
