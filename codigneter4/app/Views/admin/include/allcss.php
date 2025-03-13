<?php
$db = \Config\Database::connect();
$siteSetting = $db->table('site_setting')->where(['id' => 1])->get()->getRow();
?>

      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta content name="Azmal Ansari" />
      <meta content name="Azmal Ansari" />
      <link rel="icon" href="<?=base_url('uploads/site_setting/'.$siteSetting->logo) ?>" type="image/png" />
      <link href="<?=base_url('public/')?>/admin/css/app.min.css" rel="stylesheet" />
      <link href="<?=base_url('public/')?>/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
      <link href="<?=base_url('public/')?>/admin/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
      <link href="<?=base_url('public/')?>/admin/plugins/summernote/dist/summernote.css" rel="stylesheet" />
      <link href="<?=base_url('public/')?>/admin/plugins/summernote/dist/summernote-bs4.css" rel="stylesheet" />
      <link href="<?=base_url('public/')?>/admin/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
      <link href="<?=base_url('public/')?>/admin/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
