<?php
$user = $this->crud->fetchdatabyid('1','site_setting');
?>
<head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta content name="Azmal Ansari" />
      <meta content name="Azmal Ansari" />
      <link rel="icon" href="<?php echo base_url(); ?>media/uploads/site_setting/<?php echo $user[0]->logo; ?>" type="image/png" />
      <link href="<?=base_url() ?>media/admin/css/app.min.css" rel="stylesheet" />
      <link href="<?=base_url() ?>media/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
      <link href="<?=base_url() ?>media/admin/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
      <link href="<?=base_url() ?>media/admin/plugins/summernote/dist/summernote.css" rel="stylesheet" />
      <link href="<?=base_url() ?>media/admin/plugins/summernote/dist/summernote-bs4.css" rel="stylesheet" />
      <link href="<?=base_url() ?>media/admin/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
      <link href="<?=base_url() ?>media/admin/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
   </head>