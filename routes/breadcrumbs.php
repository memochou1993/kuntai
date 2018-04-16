<?php

/* Front */

// Home
Breadcrumbs::register('front.home.index', function ($breadcrumbs) {
    $breadcrumbs->push('首頁', url('/'));
});

// Home > Items
Breadcrumbs::register('front.items.index', function ($breadcrumbs) {
    $breadcrumbs->parent('front.home.index');
    $breadcrumbs->push('酒款一覽', route('front.items.index'));
});
// Home > Items > View
Breadcrumbs::register('front.items.view', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('front.items.index');
    $breadcrumbs->push($item->first_name, route('front.items.view', $item));
});

// Home > About
Breadcrumbs::register('front.home.about', function ($breadcrumbs) {
    $breadcrumbs->parent('front.home.index');
    $breadcrumbs->push('關於廣太', route('front.home.about'));
});

// Home > Contact
Breadcrumbs::register('front.home.contact', function ($breadcrumbs) {
    $breadcrumbs->parent('front.home.index');
    $breadcrumbs->push('連絡我們', route('front.home.contact'));
});

/* Admin */

// Home
Breadcrumbs::register('admin.home.index', function ($breadcrumbs) {
    $breadcrumbs->push('首頁', route('admin.home.index'));
});

// Home > Register
Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->push('首頁', route('admin.home.index'));
    $breadcrumbs->push('註冊', route('register'));
});

// Home > Items
Breadcrumbs::register('admin.items.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home.index');
    $breadcrumbs->push('品項一覽', route('admin.items.index'));
});
// Home > Items > Add
Breadcrumbs::register('admin.items.showAddForm', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.items.index');
    $breadcrumbs->push('新增', route('admin.items.showAddForm'));
});
// Home > Items > View
Breadcrumbs::register('admin.items.view', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('admin.items.index');
    $breadcrumbs->push($item->first_name, route('admin.items.view', $item));
});
// Home > Items > View > Update
Breadcrumbs::register('admin.items.showUpdateForm', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('admin.items.view', $item);
    $breadcrumbs->push('修改', route('admin.items.showUpdateForm', $item));
});

// Home > ItemElements
Breadcrumbs::register('admin.itemElements.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home.index');
    $breadcrumbs->push('品項選項一覽', route('admin.itemElements.index'));
});
// Home > ItemElements > Add
Breadcrumbs::register('admin.itemElements.showAddForm', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.itemElements.index');
    $breadcrumbs->push('新增', route('admin.itemElements.showAddForm'));
});
// Home > ItemElements > View
Breadcrumbs::register('admin.itemElements.view', function ($breadcrumbs, $item_element) {
    $breadcrumbs->parent('admin.home.index');
    $breadcrumbs->push($item_element->type, route('admin.itemElements.index', ['type' => $item_element->type]));
    $breadcrumbs->push($item_element->name, route('admin.itemElements.view', $item_element));
});
// Home > ItemElements > View > Update
Breadcrumbs::register('admin.itemElements.showUpdateForm', function ($breadcrumbs, $item_element) {
    $breadcrumbs->parent('admin.itemElements.view', $item_element);
    $breadcrumbs->push('修改', route('admin.itemElements.showUpdateForm', $item_element));
});

// Home > Posts
Breadcrumbs::register('admin.posts.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home.index');
    $breadcrumbs->push('文章一覽', route('admin.posts.index'));
});
// Home > Posts > Add
Breadcrumbs::register('admin.posts.showAddForm', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.posts.index');
    $breadcrumbs->push('新增', route('admin.posts.showAddForm'));
});
// Home > Posts > View
Breadcrumbs::register('admin.posts.view', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('admin.posts.index');
    $breadcrumbs->push($post->title, route('admin.posts.view', $post));
});
// Home > Posts > View > Update
Breadcrumbs::register('admin.posts.showUpdateForm', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('admin.posts.view', $post);
    $breadcrumbs->push('修改', route('admin.posts.showUpdateForm', $post));
});