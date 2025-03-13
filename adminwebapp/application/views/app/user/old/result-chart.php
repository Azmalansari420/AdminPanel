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

    /*tabele*/

.my-profile-detail {
  padding: 0px 10px 14px;
/*  padding: 15px;*/
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #fff;
}

.title {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
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
    font-size: 10px;
    color: black;
    font-weight: 700;
}

th {
        font-size: 10px;
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

.pr-0 {
    padding-right: 0;
}
.pl-0 {
    padding-left: 0;
}

</style>
    
    <div class="single-page-area">
      <div class="title-area justify-content-between">
            <a class="btn back-page-btn" href="home.php"><i class="ri-arrow-left-s-line"></i></a>
            <h3 class="ps-4 text-white">Result Chart</h3>
            <div class="balance"><?=$full_detail->wallet ?> <span><img src="<?=base_url() ?>assets/coin.png" alt="img"></span></div> 
        </div>

        

                
        <div class="container">

            <form class="row mt-4" method="GET" action="">
              <input type="hidden" name="device_id" value="<?=$this->session->userdata('device_id') ?>">
              <input type="hidden" name="firebase_token" value="<?=$this->session->userdata('firebase_token') ?>">
              <div class="col-4 pr-0">
                  <select class="form-control" name="year" required>
                      <option value="">Select Year</option>
                      <?php
                      $this->db->group_by('year');
                      $this->db->order_by('year desc');
                      $year = $this->db->get_where('game_result', array('status' => 1))->result_object();
                      foreach ($year as $data) { ?>
                          <option value="<?= $data->year ?>" <?= isset($_GET['year']) && $_GET['year'] == $data->year ? 'selected' : '' ?>>
                              <?= $data->year ?>
                          </option>
                      <?php } ?>
                  </select>
              </div>
              <div class="col-4 pr-0 pl-0">
                  <select class="form-control" name="month" required>
                      <option value="">Select Month</option>
                      <?php
                      $this->db->group_by('month');
                      $this->db->order_by('month desc');
                      $month = $this->db->get_where('game_result', array('status' => 1))->result_object();
                      foreach ($month as $data) { ?>
                          <option value="<?= $data->month ?>" <?= isset($_GET['month']) && $_GET['month'] == $data->month ? 'selected' : '' ?>>
                              <?= $data->month ?>
                          </option>
                      <?php } ?>
                  </select>
              </div>
              <div class="col-4 p-0">
                  <input type="submit" class="form-control" value="Search" style="background: blue; color: white;">
              </div>
          </form>




            <div class="my-profile-detail box-xolor mt-3  mb-0">
              <div class="scrollable-table">
                <table>
    <thead>
        <tr>
            <th>Date</th>
            <?php
            $game_ids = array();
            $game_data = $this->db->get_where("game", array("status" => 1))->result_object();
            foreach ($game_data as $value) {
                $game_ids[] = $value->id; ?>
                <th><?= $value->name ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        // Get year and month from the form
        $year = isset($_GET['year']) ? $_GET['year'] : date("Y");
        $month_string = isset($_GET['month']) ? $_GET['month'] : date("M");

        // Generate dates for the month
        $month_number = date('m', strtotime("1 $month_string")); // Convert month string to number
        $list = array();
        for ($d = 1; $d <= 31; $d++) {
            $time = mktime(12, 0, 0, $month_number, $d, $year);
            if (date('m', $time) == $month_number) {
                $print_date = date('d-m-Y', $time);
                $date = date('Y-m-d', $time);

                // Fetch results for the date
                $date_for = $this->crud->selectDataByMultipleWhere('game_result', array('create_on' => $date, 'year' => $year, 'month' => $month_string));
                if (!empty($date_for)) { ?>
                    <tr>
                        <th scope="row">
                            <?= $print_date ?>
                        </th>
                        <?php
                        foreach ($game_ids as $value) {
                            $number_print = 'xx';
                            $number = $this->db->get_where("game_result", array("game_id" => $value, "create_on" => $date, "year" => $year, "month" => $month_string, "status" => 1))->result_object();
                            if (!empty($number)) {
                                $number = $number[0];
                                $number_print = $number->number;
                            } ?>
                            <td><?= $number_print ?></td>
                        <?php } ?>
                    </tr>
        <?php }
            }
        } ?>
    </tbody>
</table>

              </div>
            </div>

        </div>
          <?php include('include/menubar.php'); ?>
    </div>     

   <?php include('include/allscript.php'); ?>
</body>
</html>