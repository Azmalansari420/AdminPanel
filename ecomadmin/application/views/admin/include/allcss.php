<?php
$user = $this->crud->fetchdatabyid('1','site_setting');
?>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta content="Azmal Ansari" name="description" />
      <meta content="Azmal Ansari" name="author" />

      <link rel="icon" href="<?php echo base_url(); ?>media/uploads/site_setting/<?php echo $user[0]->logo; ?>" type="image/png" />

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

      <link href="<?php echo base_url(); ?>media/admin/css/vendor.min.css" rel="stylesheet" />

      <link href="<?php echo base_url(); ?>media/admin/css/default/app.min.css" rel="stylesheet" />

      <link href="<?php echo base_url(); ?>media/admin/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />

      <link href="<?php echo base_url(); ?>media/admin/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

      <link href="<?php echo base_url(); ?>media/admin/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />

      <link href="<?php echo base_url(); ?>media/admin/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />


      <link href="<?php echo base_url(); ?>media/admin/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/font-awesome.min.css"> -->
      

      <link href="<?php echo base_url(); ?>media/admin/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
      <style>
      .app-sidebar .menu .menu-item .menu-link {
    border-top: 1px solid #3d4852;
    border-bottom: 1px solid #3d4852;
}
</style>