<?php
print_r($game_bet);
die;

Game type 1 data
<h2>01 </h2>
<h2>02 </h2>
<h2>03 </h2>
<h2>04 </h2>
<h2>05 </h2>


Game type 2 data
<h2>A0 </h2>
<h2>A1 </h2>
<h2>A2 </h2>
<h2>A3 </h2>
<h2>A4 </h2>


?>


<!DOCTYPE html>
<html lang="en">
   <title><?=$page_title ?></title>
   <?php $this->load->view('admin/include/allcss') ?>
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
         font-size: 12px;
         border: 1px solid #007BFF;
         border-radius: 5px;
         text-align: center;
         background-color: black;
         color: white;
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
               <div class="col-2 form-group">
                  <label>Date </label>
                  <input type="date" class="form-control" name="select_date">
               </div>

               <div class="col-2 form-group">
                  <label>Date </label>
                  <select class=" form-control" required name="game_id" >
                     <option>--Select Game--</option>
                     <?php
                     $game = $this->db->get_where('game',array('status'=>1,))->result_object();
                     foreach($game as $data)
                        { ?>
                     <option value="<?=$data->id ?>"  ><?=$data->name ?></option>
                  <?php } ?>
                  </select>
               </div>
               <div class="col-3 form-group mt-4">
                  <button type="submit" name="submit" class="btn btn-purple">Submit</button>
               </div>
            </form>

            <h1 class="page-header add-header">Jodi Details </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">
                        <div class="col-12 grid">
                           <div class="grid-item">
                              <span class="number">01</span>
                              <input type="number" name="01" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">02</span>
                              <input type="number" name="02" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">03</span>
                              <input type="number" name="03" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">04</span>
                              <input type="number" name="04" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">05</span>
                              <input type="number" name="05" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">06</span>
                              <input type="number" name="06" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">07</span>
                              <input type="number" name="07" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">08</span>
                              <input type="number" name="08" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">09</span>
                              <input type="number" name="09" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">10</span>
                              <input type="number" name="10" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">11</span>
                              <input type="number" name="11" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">12</span>
                              <input type="number" name="12" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">13</span>
                              <input type="number" name="13" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">14</span>
                              <input type="number" name="14" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">15</span>
                              <input type="number" name="15" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">16</span>
                              <input type="number" name="16" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">17</span>
                              <input type="number" name="17" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">18</span>
                              <input type="number" name="18" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">19</span>
                              <input type="number" name="19" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">20</span>
                              <input type="number" name="20" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">21</span>
                              <input type="number" name="21" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">22</span>
                              <input type="number" name="22" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">23</span>
                              <input type="number" name="23" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">24</span>
                              <input type="number" name="24" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">25</span>
                              <input type="number" name="25" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">26</span>
                              <input type="number" name="26" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">27</span>
                              <input type="number" name="27" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">28</span>
                              <input type="number" name="28" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">29</span>
                              <input type="number" name="29" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">30</span>
                              <input type="number" name="30" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">31</span>
                              <input type="number" name="31" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">32</span>
                              <input type="number" name="32" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">33</span>
                              <input type="number" name="33" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">34</span>
                              <input type="number" name="34" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">35</span>
                              <input type="number" name="35" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">36</span>
                              <input type="number" name="36" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">37</span>
                              <input type="number" name="37" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">38</span>
                              <input type="number" name="38" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">39</span>
                              <input type="number" name="39" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">40</span>
                              <input type="number" name="40" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">41</span>
                              <input type="number" name="41" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">42</span>
                              <input type="number" name="42" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">43</span>
                              <input type="number" name="43" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">44</span>
                              <input type="number" name="44" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">45</span>
                              <input type="number" name="45" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">46</span>
                              <input type="number" name="46" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">47</span>
                              <input type="number" name="47" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">48</span>
                              <input type="number" name="48" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">49</span>
                              <input type="number" name="49" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">50</span>
                              <input type="number" name="50" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">51</span>
                              <input type="number" name="51" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">52</span>
                              <input type="number" name="52" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">53</span>
                              <input type="number" name="53" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">54</span>
                              <input type="number" name="54" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">55</span>
                              <input type="number" name="55" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">56</span>
                              <input type="number" name="56" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">57</span>
                              <input type="number" name="57" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">58</span>
                              <input type="number" name="58" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">59</span>
                              <input type="number" name="59" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">60</span>
                              <input type="number" name="60" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">61</span>
                              <input type="number" name="61" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">62</span>
                              <input type="number" name="62" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">63</span>
                              <input type="number" name="63" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">64</span>
                              <input type="number" name="64" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">65</span>
                              <input type="number" name="65" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">66</span>
                              <input type="number" name="66" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">67</span>
                              <input type="number" name="67" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">68</span>
                              <input type="number" name="68" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">69</span>
                              <input type="number" name="69" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">70</span>
                              <input type="number" name="70" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">71</span>
                              <input type="number" name="71" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">72</span>
                              <input type="number" name="72" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">73</span>
                              <input type="number" name="73" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">74</span>
                              <input type="number" name="74" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">75</span>
                              <input type="number" name="75" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">76</span>
                              <input type="number" name="76" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">77</span>
                              <input type="number" name="77" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">78</span>
                              <input type="number" name="78" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">79</span>
                              <input type="number" name="79" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">80</span>
                              <input type="number" name="80" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">81</span>
                              <input type="number" name="81" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">82</span>
                              <input type="number" name="82" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">83</span>
                              <input type="number" name="83" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">84</span>
                              <input type="number" name="84" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">85</span>
                              <input type="number" name="85" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">86</span>
                              <input type="number" name="86" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">87</span>
                              <input type="number" name="87" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">88</span>
                              <input type="number" name="88" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">89</span>
                              <input type="number" name="89" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">90</span>
                              <input type="number" name="90" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                              <span class="number">91</span>
                              <input type="number" name="91" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">92</span>
                              <input type="number" name="92" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">93</span>
                              <input type="number" name="93" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">94</span>
                              <input type="number" name="94" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">95</span>
                              <input type="number" name="95" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">96</span>
                              <input type="number" name="96" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">97</span>
                              <input type="number" name="97" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">98</span>
                              <input type="number" name="98" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">99</span>
                              <input type="number" name="99" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">00</span>
                              <input type="number" name="00" placeholder="Bet" class="bet-input">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </form>
            <h1 class="page-header add-header">Harup Details </h1>
            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="game-title">
                          <p>Harup Andar (A)</p>
                        </div>

                        <div class="col-12 grid">
                           <div class="grid-item">
                              <span class="number">A0</span>
                              <input type="number" name="A0" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A1</span>
                              <input type="number" name="A1" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A2</span>
                              <input type="number" name="A2" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A3</span>
                              <input type="number" name="A3" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A4</span>
                              <input type="number" name="A4" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A5</span>
                              <input type="number" name="A5" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A6</span>
                              <input type="number" name="A6" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A7</span>
                              <input type="number" name="A7" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A8</span>
                              <input type="number" name="A8" placeholder="Bet" class="bet-input">
                           </div>
                           <div class="grid-item">
                              <span class="number">A9</span>
                              <input type="number" name="A9" placeholder="Bet" class="bet-input">
                           </div>
                        </div>

                        <div class="game-title mt-4">
                          <p>Harup Bahar (B)</p>
                        </div>

                        <div class="col-12 grid mt-2">
                           <div class="grid-item">
                            <span class="number">B0</span>
                            <input type="number" name="B0" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B1</span>
                            <input type="number" name="B1" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B2</span>
                            <input type="number" name="B2" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B3</span>
                            <input type="number" name="B3" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B4</span>
                            <input type="number" name="B4" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B5</span>
                            <input type="number" name="B5" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B6</span>
                            <input type="number" name="B6" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B7</span>
                            <input type="number" name="B7" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B8</span>
                            <input type="number" name="B8" placeholder="Bet" class="bet-input">
                          </div>
                          <div class="grid-item">
                            <span class="number">B9</span>
                            <input type="number" name="B9" placeholder="Bet" class="bet-input">
                          </div>
                        </div>

                     </div>
                  </div>
               </div>
            </form>

            <h1 class="page-header add-header">Total Details </h1>

            <form class="row" method="post" enctype="multipart/form-data" action="#">
               <div class="col-lg-12">
                  <div class="card m-b-15">
                     <div class="row card-body">

                        <div class="col-lg-4">
                           <div class="bottom-box">
                              <h5>Total Jodi</h5>
                              <h4>4500</h4>
                           </div>
                        </div>

                        <div class="col-lg-4">
                           <div class="bottom-box">
                              <h5>Harup Jodi</h5>
                              <h4>4500</h4>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="bottom-box">
                              <h5>All Total </h5>
                              <h4>4500</h4>
                           </div>
                        </div>
                        
                     </div>
                  </div>
               </div>
            </form>






         </div>
         <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      </div>
      <?php $this->load->view('admin/include/theams') ?>
      <?php $this->load->view('admin/include/allscript') ?>
   </body>
</html>