<?php

// ACL
$this("acl")->addResource('EmailOnSave', ['manage.emailonsave']);

$app->on('admin.init', function() {

    // bind admin routes /emailonsave
    $this->bindClass('EmailOnSave\\Controller\\Admin', 'emailonsave');

    // add to modules menu
    $this('admin')->addMenuItem('modules', [
        'label' => 'Email On Save',
        'icon'  => 'assets:app/media/icons/email.svg',
        'route' => '/emailonsave',
        'active' => strpos($this['route'], '/emailonsave') === 0
    ]);

});