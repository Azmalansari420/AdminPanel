 <?php
$current_url = basename(current_url());
// echo $current_url;
?>
<style>
      .main-footer-bottom ul li {
    
    margin: 10px 12px 8px;
}
</style>
 <div class="main-footer-bottom d-block text-center">
                <ul>
                    <li>
                        <a class="<?php if($current_url=='menu-bar.php') echo "active"; ?>" href="menu-bar.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/ticket.svg" alt="img">
                            Menu
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($current_url=='passbook.php') echo "active"; ?>" href="passbook.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/sports.svg" alt="img">
                            Passbook
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($current_url=='home.php') echo "active"; ?>" href="home.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/home.svg" alt="icon">
                            Home
                        </a>
                    </li>
                    
                    
                    <li>
                        <a class="<?php if($current_url=='user-wallet.php') echo "active"; ?>" href="user-wallet.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/document.svg" alt="img">
                            Wallet
                        </a>
                    </li>
                    <li>
                        <a class="<?php if($current_url=='help.php') echo "active"; ?>" href="help.php">
                            <img src="<?=base_url() ?>assets/img/icon/svg/profile.svg" alt="img">
                            Help
                        </a>
                    </li>
                </ul>
            </div>