# afisha.kz API documentation

## Общие

---

### ![](images/get.svg) /cities
`Accept: application/json`

Получения списка городов

#### Ответ
`200`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| data | `array` | Список поездок | 
| data.* | `object` | Информация о городе | 
| data.*.id | `number` | Идентификатор города | 
| data.*.name | `string` | Название города |

```json
{
  "data": [
    {
      "id": 1,
      "name": "Алматы"
    }
  ]
}
```

---

### ![](images/get.svg) /today_tomorrow
`Accept: application/json`

Получение сегодняшней и завтрашней даты

#### Ответ

`200`

| Поле | Тип | Описание | 
| ------ | ------ | ------ | 
| today | `date` | Сегодняшняя дата | 
| tomorrow | `date` | Завтрашняя дата |

```json
{
  "today": "2021-07-11 Воскресенье",
  "tomorrow": "2021-07-12 Понедельник"
}
```