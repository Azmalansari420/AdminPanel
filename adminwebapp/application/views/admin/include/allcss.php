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
   <style>
      .toaster {
        position: fixed;
        top: 86%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #850a0e;
        border-radius: 10px;
        padding: 10px 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        display: none;
        color: white;
      }

      .toaster.success {
        background-color: #850a0e;
          color: #fff;
          font-size: 16px;
          width: max-content;
          z-index: 9999;
      }
</style>