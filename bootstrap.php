<?php

// ADMIN.
if (COCKPIT_ADMIN && !COCKPIT_API_REQUEST) {
  include_once __DIR__ . '/admin.php';
}

// ACTIONS.
include_once __DIR__ . '/actions.php';