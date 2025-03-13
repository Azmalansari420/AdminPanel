
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>vertical-split</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> 
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
  <h1 data-heading="WELCOME">WELCOME</h1>  
</body>

</html>
