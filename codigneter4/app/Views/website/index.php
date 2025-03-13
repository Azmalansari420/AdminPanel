
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?=env("website_name") ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> 
  <?=$meta_data ?>
<style>
  body {
    height: 100vh;
    background: linear-gradient(to right, white 0%, white 50%, black 0%, black 50%);
  }

  h1 {
    color: white;
    white-space: nowrap;
    font-size: 5rem;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  h1::before {
    content: attr(data-heading);
    position: absolute;
    left: 0;
    color: black;
    width: 50%;
    overflow: hidden;
  }
</style>  
  
</head>

<body translate="no">
<!-- 	<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <?php
  $slider = $db->table('slider')
 	 	->orderBy('id', 'desc')
  		->getWhere(["status"=>1,])
  		->getResult();

  foreach($slider as $data)
  	{ ?>
  <tr>
    <td><?=$data->title ?></td>
    <td><?=$data->sub_title ?></td>
    <td><?=$data->content ?></td>
    <td><a href="<?=base_url($data->slug) ?>">view</a></td>
  </tr>
  <?php } ?>
</table> -->
  <h1 data-heading="WELCOME">WELCOME</h1>  
</body>

</html>
