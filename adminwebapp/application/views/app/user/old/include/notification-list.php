
<?php
                    $this->db->select('n.*, ns.status as read_status');
                    $this->db->from('notification n');
                    $this->db->join('notification_status ns', 'n.id = ns.notification_id AND ns.user_id = '.$full_detail->id, 'left');
                    $this->db->order_by('n.id desc');
                    $notifications = $this->db->get()->result();

                    foreach($notifications as $data) { ?>
<div class="notification-card">
                    <div class="details">
                        <h6> You Won</h6>
                        <p>Congratulations to our winners. Next confirmed 100% Matches are...</p>
                        <span>15 min ago.</span>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="jodiCutCheckbox">
                    </div>
                </div>
<?php } ?>