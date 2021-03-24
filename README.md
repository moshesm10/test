# test
test    

```jsx
const moods = ["😌", "😊", "😄", "🤣", "😰", "🥰", "🙃", "😔", "😇", "🤔", "😩", "😭", "😤", "😵", "🤒", "🤤"];
```

Выбор даты происходит через обычный `<input type="date" />`.

Авторизоваться в [API Pexels](pexels.com/ru-ru/api/). Добавить свой ключ в код для запросов. Подробнее в [документации pexels](https://www.pexels.com/ru-ru/api/documentation/).

## Описание проекта:

**Weather App** – это приложение прогноза погоды, имеющее следующие функции:

- Прогноз на 7 дней
- Прогноз на 12 часов
- Прогноз на сегодня + показатели влажности, давления, скорости ветра, видимости
- Поиск погоды по городу

## Задание №1 – Верстка приложения

Полная верстка приложения погоды по макетам в Figma – [https://www.figma.com/file/TpFrmDM3qiJ7Nn1hbkkQFA/Weather-App?node-id=0%3A1](https://www.figma.com/file/TpFrmDM3qiJ7Nn1hbkkQFA/Weather-App?node-id=0%3A1)

- Все тексты и значения брать из макета
- Верстка должна быть адаптивной и резиновой
- Изображения не должны терять пропорции и срезаться
- По клику на кнопку "Поиск города" слева плавно выезжает панель с поисковой строкой   (по нажатию на крестик – закрывается), скорость CSS анимации `transition: 0.5s`
- Нельзя использовать фреймворки, библиотеки и препроцессоры (Bootstrap, UI Kit, Sass и т.д)
- Боковая панель при скролле должна быть фиксированна, на всю высоту в планшетной ориентации

**Результат задания** – свёрстанное приложение по макету (HTML, CSS) и анимация выезжающей панели с поисковой строкой по кнопке (JS – событие `click`, на кнопке открытия панели и на крестике для закрытия)

---

## Задание №2 – Неожиданное требование заказчика

Заказчик потребовал добавить в приложение темную тему.

Ссылка на макет с темной темой: [http://link](http://link/)

Необходимо сверстать кнопку переключения темной/светлой темы (HTML, CSS).

Реализовать функционал переключения темы (JS – событие `click`). 

При клике на кнопку:

- Цветовая палитра приложения должна поменяться
- Цветовая палитра кнопки при клике тоже меняется
- Анимация плавного перемещения ползунка переключения

**Результат задания** – свёрстанная темная тема (HTML, CSS) и работающая кнопка переключения темной/светлой темы (JS).

---

## **Задание №3 – Реализация функционала приложения**

### Получение данных погоды по API

На момент загрузки данных в карточках выводится анимационный CSS loader, пример можете посмотреть тут [https://loading.io/css/](https://loading.io/css/).

Для запроса и получения названия города на русском языке необходимо воспользоваться открытым API [Nominatim.openstreetmap.org](https://nominatim.org/release-docs/develop/api/Overview/), регистрация здесь не требуется.

```jsx
`https://nominatim.openstreetmap.org/search.php?q=${query}&format=json&addressdetails=1&limit=1`
// query — это значение формы ввода поиска
```

Получаем данные погоды через API [OpenWeatherMap](https://openweathermap.org), необходимо авторизоваться и добавить свой ключ в код для запросов. Подробнее в [документации OpenWeatherMap](https://openweathermap.org/api/one-call-api) (для задания используете [One Call API](https://openweathermap.org/api/one-call-api)).

```jsx
`https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&appid=${key}&units=metric&lang=ru`
// lat, lon – долгота и широта полученные из запроса к nominatim.openstreetmap.org
// key – ключ полученный в OpenWeatherMap
```

### Таб меню переключения прогноза на неделю и на 12 часов

По нажатию на пункты меню **"на неделю"** или **"почасовой"** должны отображаться соответствующие карточки с погодой на день недели или погода на час.

### Слайдер прогноза на неделю и на 12 часов

Слева и справа от карточек должны быть кнопки прокрутки, по нажатию на кнопку карточки смещаются на 1 позицию.

У кнопки должны быть состояния активности/неактивности.

### Поиск города

В поле поиска города вводится запрос на русском языке.

В списке городов панели поиска укажите 5 городов на свой выбор, при нажатии на них  должна отображаться погода соответствующего города.

### Формат дат

Формат дат на карточках погоды должен соответствовать макету – "Пн, 15 мар".

### Иконки погоды

Иконки погоды на карточках и основной панели нужно получать по запросу к API.

Подробности в документации [API Openweathermap](https://openweathermap.org/api/one-call-api). (Возможные размеры: 2x, 4x).

### Формат давления

Давление должно быть выражено в миллиметрах ртутного столба.

### Индикатор направления ветра + аббревиатура направления

Индикатор направления ветра должен поворачиваться на значение угла полученного из запроса к API Openweathermap.

Рядом с индикатором направления ветра выводится аббревиатура направления на русском языке. Необходимо конвертировать значение угла в текстовое представление.

```jsx
// Массив направлений
const directions = ['С', 'СВ', 'В', 'ЮВ', 'Ю', 'ЮЗ', 'З', 'СЗ'];
```

**Результат задания** – Данные приходят из запросов API, таб меню переключает прогнозы на неделю и на 12 часов, слайдер прогноза прокручивает карточки по нажатию на кнопки, в панели поиска присутствуют города и по нажатию выводится погода, в результате поиска города отображается погода в данном городе, форматы данных соответствуют заданию, иконки погоды приходят по запросу к API и правильно выводятся, индикатор направления ветра вращается в зависимости от угла, выводится аббревиатура направления ветра.

---

## **Задание №4 –  Перенос приложения на React**

Для создания проекта на 

Необходимо переписать приложение на React и реализовать все функции из предыдущих заданий.

Верстка реализуется на `jsx`, то есть на React.

Разделить UI на компоненты, как минимум на 4.

### Шкала влажности

Шкала влажности должна заполняться на основании данных полученных из запроса к API Openweathermap.

### История поиска

В панели поиска должны хранятся последние 5 запросов, при нажатии на них должна отображаться погода соответствующего города.

- Поиск города
- Последние 5 запросов поиска
- Таб меню
- Слайдер погоды
- Индикаторы
- Кнопки навигации и смены темы

**Результат задания** – .