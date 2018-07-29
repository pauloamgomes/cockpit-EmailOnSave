<?php

// ACL.
$this("acl")->addResource('EmailOnSave', ['manage.emailonsave']);

/*
 * add menu entry if the user has access to group stuff
 */
$this->on('cockpit.view.settings.item', function () {
  if ($this->module('cockpit')->hasaccess('EmailOnSave', 'manage.emailonsave')) {
    $this->renderView("emailonsave:views/partials/settings.php");
  }
});

$app->on('admin.init', function () use ($app) {
  // Bind admin routes /settings/email-on-save.
  $this->bindClass('EmailOnSave\\Controller\\Admin', 'settings/email-on-save');
});
