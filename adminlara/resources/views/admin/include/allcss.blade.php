@php
$currentUrl = url()->current();
$siteSetting = DB::table('site_setting')->where('id', 1)->first();
@endphp
<head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta content name="Azmal Ansari" />
      <meta content name="Azmal Ansari" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="icon" href="{{url('')}}/public/media/uploads/site_setting/{{$siteSetting->logo}}" type="image/png" />
      <link href="{{url('')}}/public/admin_assests/css/app.min.css" rel="stylesheet" />
      <link href="{{url('')}}/public/admin_assests/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
      <link href="{{url('')}}/public/admin_assests/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
      <link href="{{url('')}}/public/admin_assests/plugins/summernote/dist/summernote.css" rel="stylesheet" />
      <link href="{{url('')}}/public/admin_assests/plugins/summernote/dist/summernote-bs4.css" rel="stylesheet" />
      <link href="{{url('')}}/public/admin_assests/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
      <link href="{{url('')}}/public/admin_assests/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
</head>

