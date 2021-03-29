## **Задание №3 – Реализация функционала приложения**

### Получение данных погоды по API

На момент загрузки данных в карточках должен выводится анимационный индикатор загрузки (3 точки), взять его нужно тут [https://loading.io/css/](https://loading.io/css/).

![https://s3.us-west-2.amazonaws.com/secure.notion-static.com/dfe9fd72-84a3-469a-aa3b-8f15335ed95e/Untitled.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAT73L2G45O3KS52Y5%2F20210329%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20210329T074355Z&X-Amz-Expires=86400&X-Amz-Signature=24bbda7349ec8d2e9a0d16df69b5e82feff4bb8a5eb632f3945d716cb051a7dc&X-Amz-SignedHeaders=host&response-content-disposition=filename%20%3D%22Untitled.png%22](https://s3.us-west-2.amazonaws.com/secure.notion-static.com/dfe9fd72-84a3-469a-aa3b-8f15335ed95e/Untitled.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAT73L2G45O3KS52Y5%2F20210329%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20210329T074355Z&X-Amz-Expires=86400&X-Amz-Signature=24bbda7349ec8d2e9a0d16df69b5e82feff4bb8a5eb632f3945d716cb051a7dc&X-Amz-SignedHeaders=host&response-content-disposition=filename%20%3D%22Untitled.png%22)

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

Если по запросу ничего не пришло, то должен быть текст `"Не нашел такой город, попробуйте другой"`.

### Формат дат

Формат дат на карточках погоды должен соответствовать макету – "Пн, 15 мар".

### Иконки погоды

Иконки погоды на карточках и основной панели нужно получать по запросу к API.

Подробности в документации [API Openweathermap](https://openweathermap.org/api/one-call-api). Возможные размеры иконки в запросе: 2x (для плашек прогноза на день и на час), 4x (для боковой панели).

### Формат давления

Давление должно быть выражено в миллиметрах ртутного столба.

### Индикатор направления ветра + аббревиатура направления

Индикатор направления ветра должен поворачиваться на значение угла полученного из запроса к API Openweathermap.

Рядом с индикатором направления ветра выводится аббревиатура направления на русском языке. Необходимо конвертировать значение угла в текстовое представление.

```jsx
// Массив направлений
const directions = ['С', 'СВ', 'В', 'ЮВ', 'Ю', 'ЮЗ', 'З', 'СЗ'];
```

**Результат задания** – Данные приходят из запросов API, таб меню переключает прогнозы на неделю и на 12 часов, слайдер прогноза прокручивает карточки по нажатию на кнопки, в результате поиска города отображается погода в данном городе, форматы данных соответствуют заданию, иконки погоды приходят по запросу к API и правильно выводятся, индикатор направления ветра вращается в зависимости от угла, выводится аббревиатура направления ветра.