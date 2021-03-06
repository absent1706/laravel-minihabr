# MiniHabr

## !!! See full, ready-to-run app versions (with db dumps, vendors and .git folder) at https://github.com/absent1706/laravel-minihabr-full-app-releases

# Release notes

##v0.10
+ user public activity.
Show on user public activity section (on user page) next:
* user comments creation
* article create and update
* user follows
* starring articles

##v0.9
Views, stars

### Backend:
1. + article views:
 * automatically views increment when someone reads full article
 * user can see view history on user page (user can only see own views; but admins can see views of all users)
2. + adding stars to articles:
 * AJAX star/unstar link
 * user starred articles are displayed on user page

### Refactoring:
1. confirm deleting category on category management page

## v0.8
User follows feature

### Backend:
1. ++ user follows:
 * AJAX follow button
 * display followers and followed users on user page
2. * fixed articles table creation: added foreign key on user_id

### Frontend:
1. + display errors NOT attached to form field as notifications (needed if general errors occured):
 * in shared.flash partial
 * in AJAX error handler (app.s)
2. ~+ login form: always display ONE, STANDARD message if any error occured (less code, more secure)
3. + more detailly log errors in debug area (bottom of _app layout) (use getMessages() instead of all() )
4. + log DB queries in debug area (bottom of _app layout)

### Refactoring:
0. structurized and commented routes.php; removed unused passwordUpdate route
1. delete_links_hack partial:
 * renamed delete_links_hack -> crud_links_hack
 * allow links with data-method=POST to be handled with crud-links-hack
 * if data-confirm is NOT set, hack will send form without confirming (previously there was a default confirm text 'Are you sure?')


## v0.7
Added password reset, simplified user edit logic

### Backend:
1. + password reset by email; set up fake email sending by means of https://mailtrap.io
2. +~ simplified user edit logic:
 * now all fields (including email from this version) can be edited throw SINGLE request (update password request is not a different request now), but current password is always required
 * changed password update logic (it's done more clear now)
3. * after logout, redirect to root page (not back)

### Refactoring:
1. moved auth middleware registration to routes.php
2. normalized 'home' routes:
 * removed '/articles' URL.
 * now we have '/' URL with name 'articles.index' (main route) and '/home' URL named 'home' for compatibility with Laravel redirects
3. middleware: if not permitted, redirect to /, not throw 403. It's important because when I log out from user/article edit page and logout controller redirects me back (as it was in prev versions), I should NOT see 403.


### Frontend:
1. + log request params, errors and all session vars in the bottom of layout

## v0.6
Improved arcticle filtering system

### Refactoring:
1. add ability to sort articles PRESERVING current filters (category)
2. made filter system extensible: all filters are in filters array. Now the only filter is category, but in future it will be possible to add another filters

## v0.5
### Backend:
1. + is_admin flag for users;
2. + admin user can manage all articles, comments and user profiles
3. + category CRUD for admin users

### Refactoring:
1. provided default data-confirm value for put/delete links (see delete_links_hack template)
2. Renamed categories._list partial to widgets.categories

## v0.4

### Backend:
1. ~ improved CommentController: added CommentRequest; adapted controller to handle AJAX requests (store method)

2. +++ AJAX create comment:
  2.1. + main AJAX code: see comments._create view. If all's OK, then success notification appears. If there're problems,

  2.2. + frontend.allow_ajax_crud_requests option: sets whether to use AJAX for comment creating (further - for comment and post deleting too)
         note: after changing config vars, don't forget to run php artisan config:cache

  2.3. + modified app\Exceptions\Handler.php to return errors in JSON format, if request is AJAX
         if config('app.debug') is true, then additional info provided (class name, message and stack trace)

  2.4. + added default AJAX error handler (see app.js):
           - response is always logged to console
           - if it's a form validation error, then all errors are displayed as notification
           - otherwise common error message appears.

3. +++ AJAX delete comment:

### Frontend:
1. + Use pnotify.js for displaying ALL flash messages: regular and AJAX ones (see flash.blade.php)
2. ~ Removed errors_list partial. Now all forms use help-blocks to display errors (except very specific login form which uses notifications)
3. + loading indicator on AJAX requests
4. + CSS class (list-split-hr) for automatically inserting hr lines after comments and articles

### Refactoring:
1. ~ moved JS includes to the head in _app.blade.php
2. ~ moved global JS functions to app object
3. ~ beautified code in routes.php

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

