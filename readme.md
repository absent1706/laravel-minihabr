# Release notes

## v0.3

### backend features
Added possibilities to:
 * update/delete articles
 * delete comments
 * update users (including user passwords)

Middleware is used for checking permissions to manage resource, FormRequests are used to validate input.

### Frontend features
* Flash messages of various classes: info,success,warning, error (see shared.flash partial); info and success automatically disappear after 5 seconds (see js/app.js file)
* Use Jeffrey Way's unobtrusive JS hack to make links to DELETE http method (code taken from http://stackoverflow.com/a/28420767) + use bootbox.js (http://bootboxjs.com/) for modal confirming (like 'are you sure want to delete article?') - see layouts.parts.delete_links_hack partial
* Custom 403, 404 error pages

## v0.2.1
Сделал отдельный scope для категорий, pagination.
Параметры для отображения статей (метод сортировки и категория) теперь передаются в GET-параметрах.
Работают УРЛы типа http://localhost:8000/articles?cat=2&sort=most-commented (однако на фронтенде генерятся ссылки только для категории и только для сортировки).

Сделал pagination страниц user->articles, user->comments

## v0.2

### На что стоит обратить внимание:
1. как реализован просмотр постов и комментариев юзера (nested routes + отдельные контроллеры UserArticles, UserComments).  Так советуют гуру Ларавела.

2. в ArticlesController и CommentsController стоит middleware на проверку, авторизован ли пользователь.

3. всё реализовано по возможности в философии rest (например, когда ты включаешь форму для создания коммента, то она лежит в файле views/comments/create.blade.php)


### Свистелки-перделки:

1.  (на будущее. это свистелка-перделка, но реализация интересная)
ссылки на этой странице
https://www.dropbox.com/s/i9ds9nbv298bcn5/%D0%A1%D0%BA%D1%80%D0%B8%D0%BD%D1%88%D0%BE%D1%82%202015-11-09%2022.22.09.png?dl=0

содержат URL, на который мы хотим редиректнуться после авторизации. Типичный случай - хочу оставить комментарий , иду авторизовываться, а после авторизации меня возвращает не на дом. страницу, а на тот пост, откуда я ушёл.
Это и реализовано.

URL , на который мы хотим редиректнуться после авторизации, запоминается в middleware RememberReturnUrl.php

Интересно работает. Всё - благодаря переменной сессии url.intended и методу redirect()->intended()

2) использую gravatar пользователя. Он берётся по имейлу . Если такого нет, возвращается картинка, построенная из хэша имейла
смотри мой отзыв, ненастойчивые предложения по новым фичам №2 (http://www.evernote.com/l/ANlcvPHnZO1H9rKg3YlU1-i_x8MTHU4b5DI/)

3) передаю title страницы, когда делаю extend во вьюхе

4) использую несколько layout'ов (в поучительных целях)


### Косяки:
1. нет pagination на фронтенде (хотя если написать /articles/?page=2 заработает)
2. пагинации нет потому, что механизм фильтра по категориям и по другим scope'ам (recent, most-commented) работает по-разному. По категориям надо фильтровать так же, как и по дате или кол-ву комментариев.
ПРОСМОТР ПОСТОВ В КАТЕГОРИЯХ РЕАЛИЗОВАН КРИВО.
Буду переделывать.

Кроме того, должна быть возможность сортировать посты в категории по разным критериям. Т.е. посты должны отбираться по категории и сортироваться по выбранному критерию.

3) сущности (посты, комментарии, юзеры) только создаются и просматриваются. Ничего изменять/удалять нельзя.
Изменение/удаление не так просто, т.к. требует механизма защиты.

### Что надо заимплементить в будущем:

0. flash messaging
1. отдельный scope для категорий
2. pagination
3. update статей, юзера, комментариев - с помощью котроля доступа https://mattstauffer.co/blog/acl-access-control-list-authorization-in-laravel-5-1
4. DB seeds

5. модели rate, follow, view
6. админ-пользователи
7. аттач картинок к постам
8. удаление постов ajax-ом

