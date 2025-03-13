<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?=website_name ?></title>
  <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
  <link rel="icon" href="<?=base_url() ?>/media/uploads/site_setting/<?=$sitesetting[0]->logo ?>" type="image/png" />
<style>
body {
  background: #000;
  font-family: sans-serif;
  text-transform: uppercase;
  font-family: "Bangers", cursive;
}

button {
  background: #FEC900;
  border: 10px #000 solid;
  color: #000;
  width: 200px;
  height: 60px;
  font-size: 1.5rem;
  text-transform: uppercase;
  font-weight: 700;
  position: relative;
  top: 100px;
  cursor: pointer;
  font-family: "Bangers", cursive;
  transition: all 0.2s ease;
  letter-spacing: 1px;
}
button:hover {
  background: #DA291C;
  color: #FFF;
  border: none;
  transition: all 0.2s ease;
  border-radius: 5px;
}

p {
  font-weight: 700;
}

.container {
  text-align: center;
}

.caution-tape {
  font-size: 6rem;
  width: 100%;
  border-top: 50px #000 solid;
  border-bottom: 50px #000 solid;
  background: #FEC900;
  height: 250px;
  line-height: 80px;
  position: relative;
  top: 50%;
  transform: translateY(50%);
}

.problem-text {
  color: #FEC900;
  position: relative;
  top: 60px;
  font-size: 3rem;
  letter-spacing: 3px;
}
</style>


  
</head>

<body translate="no">
  <div class="container">
  <div class="caution-tape">
    <p>404 Page not found</p>
  </div>
  <button type="button" name="back" onclick="history.back();">Go back</button>
  <p class="problem-text">Oops. Something went wrong.</p>
</div>
  
  
  
</body>

</html>
