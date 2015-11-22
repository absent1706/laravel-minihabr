<?php

return [
   'articles_per_page'   => 5,
   'comments_per_page'   => 10,
   'categories_per_page' => 20,

   // whether to use AJAX for doing create, update and delete requests
   // if false, CRUD will be done just throw regular HTTP requests with page reloading
   'allow_ajax_crud_requests' => true
];