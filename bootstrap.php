<?php

// $this->module("emailonsave")->extend([
//     "tablename" => "emailonsave",

//     "save" => function($data) use($app) {
//         $app->module("datastore")->save_entry($this->tablename, $data);
//     },

// ]);

// $this->module("datastore")->extend([
//     "get_datastore" => function($name) use($app) {
//         $datastore = $this->get_datastore($name);
//         if (!$datastore) {
//             $datastore = [
//                 "name"     => $name,
//                 "modified" => time()
//             ];
//             $datastore["created"] = $datastore["modified"];
//             $app->db->save("common/datastore", $datastore);
//         }
//         return $datastore;
//     }
// ]);

// ADMIN
if (COCKPIT_ADMIN && !COCKPIT_API_REQUEST) {
    include_once(__DIR__ . '/admin.php');
}

// ACTIONS
include_once(__DIR__ . '/actions.php');