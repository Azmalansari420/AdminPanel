<?php


$todaydate = date("Y-m-d");
$select_date = $this->input->get('select_date');
   $game_id = $this->input->get('game_id');
if(!empty($game_bet2))
{
   


   $bet_number_A0 = "";
   $bet_amount_A0 = "";
   $bet_number_A1 = "";
   $bet_amount_A1 = "";
   $bet_number_A2 = "";
   $bet_amount_A2 = "";
   $bet_number_A3 = "";
   $bet_amount_A3 = "";
   $bet_number_A4 = "";
   $bet_amount_A4 = "";
   $bet_number_A5 = "";
   $bet_amount_A5 = "";
   $bet_number_A6 = "";
   $bet_amount_A6 = "";
   $bet_number_A7 = "";
   $bet_amount_A7 = "";
   $bet_number_A8 = "";
   $bet_amount_A8 = "";
   $bet_number_A9 = "";
   $bet_amount_A9 = "";
   /*bahr*/
   $bet_number_B0 = "";
   $bet_amount_B0 = "";
   $bet_number_B1 = "";
   $bet_amount_B1 = "";
   $bet_number_B2 = "";
   $bet_amount_B2 = "";
   $bet_number_B3 = "";
   $bet_amount_B3 = "";
   $bet_number_B4 = "";
   $bet_amount_B4 = "";
   $bet_number_B5 = "";
   $bet_amount_B5 = "";
   $bet_number_B6 = "";
   $bet_amount_B6 = "";
   $bet_number_B7 = "";
   $bet_amount_B7 = "";
   $bet_number_B8 = "";
   $bet_amount_B8 = "";
   $bet_number_B9 = "";
   $bet_amount_B9 = "";

   foreach ($game_bet2 as $bet) 
   {
      /*A0*/
       if ($bet['number'] === '00') 
       {
         $bet_number_A0 = $bet['number'];
         $bet_amount_A0 = $bet['total_amount'];
       }
      /*A1*/
       if ($bet['number'] === '01') 
       {
         $bet_number_A1 = $bet['number'];
         $bet_amount_A1 = $bet['total_amount'];
       }
      /*A1*/
      if ($bet['number'] === '02') 
      {
         $bet_number_A2 = $bet['number'];
         $bet_amount_A2 = $bet['total_amount'];
      }
      /*A3*/
       if ($bet['number'] === '03') 
      {
         $bet_number_A3 = $bet['number'];
         $bet_amount_A3 = $bet['total_amount'];
      }
      /*A4*/
       if ($bet['number'] === '04') 
      {
         $bet_number_A4 = $bet['number'];
         $bet_amount_A4 = $bet['total_amount'];
      }
      /*A4*/
       if ($bet['number'] === '05') 
      {
         $bet_number_A5 = $bet['number'];
         $bet_amount_A5 = $bet['total_amount'];
      }
      /*A6*/
       if ($bet['number'] === '06') 
      {
         $bet_number_A6 = $bet['number'];
         $bet_amount_A6 = $bet['total_amount'];
      }
      /*A7*/
       if ($bet['number'] === '07') 
      {
         $bet_number_A7 = $bet['number'];
         $bet_amount_A7 = $bet['total_amount'];
      }
      /*A8*/
       if ($bet['number'] === '08') 
      {
         $bet_number_A8 = $bet['number'];
         $bet_amount_A8 = $bet['total_amount'];
      }
      /*A9*/
       if ($bet['number'] === '09') 
      {
         $bet_number_A9 = $bet['number'];
         $bet_amount_A9 = $bet['total_amount'];
      }
   }


   // print_r($game_bet3);
   // die;
   foreach ($game_bet3 as $bet) 
   {
      /*B0*/
       if ($bet['number'] === '00') 
         {
            $bet_number_B0 = $bet['number'];
            $bet_amount_B0 = $bet['total_amount'];
         }
         /*B1*/
          if ($bet['number'] === '01') 
         {
            $bet_number_B1 = $bet['number'];
            $bet_amount_B1 = $bet['total_amount'];
         }
         /* B2 */
          if ($bet['number'] === '02') 
         {
            $bet_number_B2 = $bet['number'];
            $bet_amount_B2 = $bet['total_amount'];
         }
         /* B3 */
          if ($bet['number'] === '03') 
         {
            $bet_number_B3 = $bet['number'];
            $bet_amount_B3 = $bet['total_amount'];
         }
         /* B4 */
          if ($bet['number'] === '04') 
         {
            $bet_number_B4 = $bet['number'];
            $bet_amount_B4 = $bet['total_amount'];
         }
         /* B5 */
          if ($bet['number'] === '05') 
         {
            $bet_number_B5 = $bet['number'];
            $bet_amount_B5 = $bet['total_amount'];
         }
         /* B6 */
          if ($bet['number'] === '06') 
         {
            $bet_number_B6 = $bet['number'];
            $bet_amount_B6 = $bet['total_amount'];
         }
         /* B7 */
          if ($bet['number'] === '07') 
         {
            $bet_number_B7 = $bet['number'];
            $bet_amount_B7 = $bet['total_amount'];
         }
         /* B8 */
          if ($bet['number'] === '08') 
         {
            $bet_number_B8 = $bet['number'];
            $bet_amount_B8 = $bet['total_amount'];
         }
         /* B9 */
          if ($bet['number'] === '09') 
         {
            $bet_number_B9 = $bet['number'];
            $bet_amount_B9 = $bet['total_amount'];
         }
   }






}

?>


<!DOCTYPE html>
<html lang="en">
   <title><?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

   <body>
      <style>
         .grid {
         display: grid;
         grid-template-columns: repeat(10, 1fr); 
         width: 100%;
         gap: 11px; 
         justify-content: center;
         }
         .grid-item {
         display: flex;
         flex-direction: column;
         justify-content: space-between;
         align-items: center;
         height: 60px;
         border: 2px solid #007BFF;
         border-radius: 10px;
         padding: 0;
         background-color: black;
         width: 60px;
         }
         .grid-item .number {
         font-size: 14px;
         color: white;
         margin-bottom: 0px;
         }
         .grid-item input {
             width: 100%;
             padding: 5px;
             font-size: 14px;
             border: 1px solid #007BFF;
             border-radius: 5px;
             text-align: center;
             background-color: black;
             color: #f70000;
             font-weight: 800;
         }
         .grid-item input::placeholder {
         color: #888;
         }
         .number {
         text-align: center;
         font-size: 24px;
         font-weight: bold;
         color: #fff;
         margin: 0 10px;
         width: 60px;
         height: 40px;
         background: #000;
         border-radius: 9px;
         }

         .game-title {
           font-size: 16px;
           font-weight: bold;
           text-align: center;
           color: black;
         }
         .bottom-box {
             text-align: center;
             border: 1px solid black;
             padding: 12px 0;
             border-radius: 10px;
         }
      </style>
      <div id="app" class="app app-header-fixed app-sidebar-fixed">
         <?php $this->load->view('admin/include/topbar') ?>
         <?php $this->load->view('admin/include/sidebar') ?>
         <div id="content" class="app-content">

            <form class="row" method="get" enctype="multipart/form-data" action="<?=base_url('admin_con/game_bet/get_gamebet') ?>" >
               <div class="col form-group">
                  <label>Date </label>
                  <input type="date" class="form-control" name="select_date" value="<?php if(!empty($select_date)){echo $select_date;}else{ echo $todaydate;} ?>">
               </div>

               <div class="col form-group">
                  <label>Date </label>
                  <select class=" form-control" required name="game_id" >
                     <option>--Select Game--</option>
                     <?php
                     $game = $this->db->get_where('game',array('status'=>1,))->result_object();
                     foreach($game as $data)
                        { ?>
                     <option <?php if(!empty($game_id)) if($game_id==$data->id) echo 'selected'; ?> value="<?=$data->id ?>"  ><?=$data->name ?></option>
                  <?php } ?>
                  </select>
               </div>
               <div class="col-3 form-group mt-4">
                  <button type="submit" name="submit" class="btn btn-purple">Submit</button>
               </div>
            </form>

            <h1 class="page-header add-header">Jodi Details </h1>
            <?php 
             if(!empty($game_bet))
             { ?>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 grid">
                         <?php
// Loop through numbers 1 to 99 first
for ($i = 1; $i <= 99; $i++):
    $bet_amount = '';
    $formatted_number = str_pad($i, 2, '0', STR_PAD_LEFT);
    foreach ($game_bet as $bet) {
        if ($formatted_number == $bet['number']) { 
            $bet_amount = $bet['total_amount'];
            break;
        }
    }
?>
    <div class="grid-item">
        <span class="number"><?php echo $formatted_number; ?></span>
        <input 
            type="text" 
            name="<?php echo $formatted_number; ?>" 
            value="<?php echo $bet_amount; ?>" 
            placeholder="00" 
            class="bet-input" disabled>
    </div>
<?php endfor; ?>

<!-- Now add 00 at the end -->
<?php
$bet_amount = '';
$formatted_number = '00';
foreach ($game_bet as $bet) {
    if ($formatted_number == $bet['number']) { 
        $bet_amount = $bet['total_amount'];
        break;
    }
}
?>
    <div class="grid-item">
        <span class="number"><?php echo $formatted_number; ?></span>
        <input 
            type="text" 
            name="<?php echo $formatted_number; ?>" 
            value="<?php echo $bet_amount; ?>" 
            placeholder="00" 
            class="bet-input" disabled>
    </div>


                     </div>
                        

                     </div>
                  </div>
               </div>

            </form>
         <?php } ?>
            <h1 class="page-header add-header">Harup Details </h1>
            <?php
            if(!empty($game_bet2))
               { ?>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="game-title">
                          <p>Harup Andar (A)</p>
                        </div>

                        <div class="col-12 grid">
                           
                           <div class="grid-item">
                              <span class="number">A1</span>
                              <input type="text" name="A1" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A1)) echo $bet_amount_A1; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A2</span>
                              <input type="text" name="A2" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A2)) echo $bet_amount_A2; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A3</span>
                              <input type="text" name="A3" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A3)) echo $bet_amount_A3; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A4</span>
                              <input type="text" name="A4" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A4)) echo $bet_amount_A4; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A5</span>
                              <input type="text" name="A5" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A5)) echo $bet_amount_A5; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A6</span>
                              <input type="text" name="A6" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A6)) echo $bet_amount_A6; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A7</span>
                              <input type="text" name="A7" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A7)) echo $bet_amount_A7; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A8</span>
                              <input type="text" name="A8" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A8)) echo $bet_amount_A8; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A9</span>
                              <input type="text" name="A9" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A9)) echo $bet_amount_A9; ?>">
                           </div>
                           <div class="grid-item">
                              <span class="number">A0</span>
                              <input type="text" name="A0" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_A0)) echo $bet_amount_A0; ?>">
                           </div>
                        </div>

                        <div class="game-title mt-4">
                          <p>Harup Bahar (B)</p>
                        </div>

                        <div class="col-12 grid mt-2">
                           
                          <div class="grid-item">
                            <span class="number">B1</span>
                            <input type="text" name="B1" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B1)) echo $bet_amount_B1; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B2</span>
                            <input type="text" name="B2" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B2)) echo $bet_amount_B2; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B3</span>
                            <input type="text" name="B3" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B3)) echo $bet_amount_B3; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B4</span>
                            <input type="text" name="B4" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B4)) echo $bet_amount_B4; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B5</span>
                            <input type="text" name="B5" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B5)) echo $bet_amount_B5; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B6</span>
                            <input type="text" name="B6" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B6)) echo $bet_amount_B6; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B7</span>
                            <input type="text" name="B7" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B7)) echo $bet_amount_B7; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B8</span>
                            <input type="text" name="B8" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B8)) echo $bet_amount_B8; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B9</span>
                            <input type="text" name="B9" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B9)) echo $bet_amount_B9; ?>">
                          </div>
                          <div class="grid-item">
                            <span class="number">B0</span>
                            <input type="text" name="B0" placeholder="00" class="bet-input" disabled value="<?php if(!empty($bet_amount_B0)) echo $bet_amount_B0; ?>">
                          </div>
                        </div>

                     </div>
                  </div>
               </div>
            </form>
         <?php } ?>

            <h1 class="page-header add-header">Total Details </h1>
            
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-lg-4">
                           <div class="bottom-box">
                              <h5>Total Jodi</h5>
                              <?php 
                              if(!empty($total_bet_amount_gametype1))
                              {
                                 $total_bet_amount_gametype1 = $total_bet_amount_gametype1;
                              }
                              else
                              {
                                 $total_bet_amount_gametype1 = 0;
                              }
                              ?>
                              <h4><?php echo currency_simble($total_bet_amount_gametype1) ?></h4>
                           </div>
                        </div>

                        <div class="col-lg-4">
                           <div class="bottom-box">
                              <h5>Harup Jodi</h5>
                              <?php 
                              if(!empty($total_bet_amount_gametype2))
                              {
                                 $total_bet_amount_gametype2 = $total_bet_amount_gametype2;
                              }
                              else
                              {
                                 $total_bet_amount_gametype2 = 0;
                              }

                              if(!empty($total_bet_amount_gametype3))
                              {
                                 $total_bet_amount_gametype3 = $total_bet_amount_gametype3;
                              }
                              else
                              {
                                 $total_bet_amount_gametype3 = 0;
                              }
                              // $total_bet_amount_gametype2 = 0;
                              // $total_bet_amount_gametype3 = 0;
                              $totalharup = $total_bet_amount_gametype2+$total_bet_amount_gametype3;
                              ?>
                              <h4><?php if(!empty($totalharup)) echo currency_simble($totalharup); ?></h4>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="bottom-box">
                              <h5>All Total </h5>
                              <h4><?php
                              $totalamount = $total_bet_amount_gametype1+$total_bet_amount_gametype2+$total_bet_amount_gametype3 ?>
                              <?=currency_simble($totalamount) ?></h4>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </form>




            <button id="printBtn">Print Page</button>


         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      <?php $this->load->view('admin/include/theams') ?>
      <?php $this->load->view('admin/include/allscript') ?>


    <script>
        document.getElementById('printBtn').addEventListener('click', function() {
            window.print();  // Opens the browser's print dialog
        });
    </script>
   </body>
</html>