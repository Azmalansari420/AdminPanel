<!DOCTYPE html>
<html>
<head>
  <title>{{$EDITDATA[0]->name}}</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #eef2f7;
      margin: 0; padding: 0;
    }
    .container {
      width: 90%;
      max-width: 800px;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    h1 {
      font-size: 28px;
      margin-bottom: 10px;
    }
    .meta {
      font-size: 13px;
      color: #888;
      margin-bottom: 20px;
    }
    iframe {
      width: 100%;
      height: 400px;
      border-radius: 8px;
      border: none;
      margin-bottom: 20px;
    }
    .description {
      font-size: 16px;
      line-height: 1.6;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>{{$EDITDATA[0]->name}}</h1>
    <div class="meta">Published on {!! date('d M, Y',strtotime($EDITDATA[0]->addeddate)) !!} by <?=env('website_name') ?></div>
    
    
    <div class="description">
      {!! $EDITDATA[0]->content !!}
    </div>
  </div>

</body>
</html>
