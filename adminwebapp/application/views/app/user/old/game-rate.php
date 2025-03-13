<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include('include/allcss.php'); ?>
</head>
<body class='sc5'>
    <!-- preloader area start -->
    <?php include('include/loader.php'); ?>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>
    <style>
   
    .single-page-area {
        padding-top: 50px;
    }
    .profile-details {
        margin-top: 24px;
        border-radius: 0;
    }
    .profile-list-inner li .single-profile-wrap 
    {
        background: #5b0100;
    }


.scrollable-table {
  max-height: 100%; /* Set the height limit for the scrollable area */
  overflow-y: auto; /* Enable vertical scrolling */
  overflow-x: auto; /* Enable horizontal scrolling if needed */
  border: 1px solid #ccc;
  border-radius: 8px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background-color: #f8f8f8;
  position: sticky;
  top: 0; /* Keeps header visible while scrolling */
  z-index: 1;
}

th, td {
    padding: 5px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 12px;
    color: black;
    font-weight: 700;
}

th {
        font-size: 14px;
  font-weight: bold;
}

tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

tbody tr:hover {
  background-color: #f1f1f1;
}

.my-profile-detail .title {
    text-align: center;
}
</style>
    
    <div class="single-page-area">
        <div class="title-area">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">Game Rate</h3>
        </div>

       

                
        <div class="container">

          <div class="scrollable-table mt-4">
            <table>
              <thead>
                <tr>
                  <th>S No.</th>
                  <th>Game Name</th>
                  <th>Jodi Rate</th>
                  <th>Harup Rate</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>1</td>
                  <td>GOA KING</td>
                  <td>100</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>DELHI BAZAR</td>
                  <td>100</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>FARIDABAD</td>
                  <td>100</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>GAZIABAD</td>
                  <td>100</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>GALI</td>
                  <td>100</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>DISAWAR</td>
                  <td>100</td>
                  <td>10</td>
                </tr>

                
                
              </tbody>
            </table>
          </div>  


        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>
</body>
</html>