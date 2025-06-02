<!DOCTYPE html>
<html>
<head>
  <title>All Blog Posts</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0; padding: 0;
      background: #f0f0f5;
      color: #333;
    }
    .container {
      width: 95%;
      max-width: 1200px;
      margin: 30px auto;
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .blog-card {
      background: #fff;
      width: 100%;
      max-width: 350px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      overflow: hidden;
      transition: transform 0.3s ease;
    }
    .blog-card:hover {
      transform: translateY(-5px);
    }
    .blog-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .blog-content {
      padding: 15px;
    }
    .blog-content h3 {
      font-size: 20px;
      margin: 0 0 10px;
    }
    .blog-content p {
      font-size: 14px;
      color: #666;
      line-height: 1.5;
    }
    .blog-content .meta {
      font-size: 12px;
      color: #999;
      margin-top: 10px;
    }
    .blog-content a {
      display: inline-block;
      margin-top: 10px;
      color: #007BFF;
      text-decoration: none;
      font-size: 14px;
    }
    .blog-content a:hover {
      text-decoration: underline;
    }
    h1.title {
      text-align: center;
      padding-top: 20px;
    }
  </style>
</head>
<body>

  <h1 class="title">Latest Blog Posts</h1>

  <div class="container">

    @php
    $blog = DB::Table('blog')->where('status',1)->get();
    @endphp
    @foreach($blog as $data)

    <div class="blog-card">
      <img src="{{url('public/media/uploads/blog/'.$data->image)}}" alt="Blog Image">
      <div class="blog-content">
        <h3>{{$data->name}}</h3>
        <div class="meta">Posted on {!! date('d M, Y',strtotime($data->addeddate)) !!}</div>
        <a href="{{$data->slug}}">Read More →</a>
      </div>
    </div>
    @endforeach


  </div>

</body>
</html>
