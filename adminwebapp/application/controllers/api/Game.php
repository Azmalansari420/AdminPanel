<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller 
{
     
    public function __construct()
    {
        parent::__construct();
    }
   


/*game bet ---jodi--*/

    public function jodi_place_bet()
    {
        $request_id = time();
        $user_id = $this->session->userdata("user")['id'];        
        $game_id = $this->input->post('game_id');
        $game_type = 1;
        $game_type_name = "Jodi";
        $numbers = $this->input->post('number');
        $amounts = $this->input->post('amount'); 
        $date = date("Y-m-d");
        $time = date("H:i:s");

        // Check if user exists
        $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
        if (empty($user)) {
            echo json_encode(["status" => 400, "message" => "Account Closed By Admin.", "data" => []]);
            return;
        }

        // Get the user's wallet balance
        $wallet_amount = $this->crud->wallet($user_id);
        $total_bet_amount = array_sum($amounts);
        if ($total_bet_amount > $wallet_amount) 
        {
            echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
            return;
        }
        /*bets*/
        $bets = [];
        foreach ($numbers as $key => $number) {
            $amount = $amounts[$key];
            $bets[] = [
                'request_id' => $request_id,
                'user_id' => $user_id,
                'game_id' => $game_id,
                'game_type' => $game_type,
                'game_type_name' => $game_type_name,
                'number' => $number,
                'amount' => $amount,
                'date' => $date,
                'time' => $time,
                'addeddate' => date('Y-m-d H:i:s'),
            ];
        }
        /*insert*/
        $this->db->insert_batch('game_bet', $bets);

        $user_id = $user_id;
        $add_type = 1;
        $type = "debit";
        $amount = $total_bet_amount;
        $message = 'Jodi Game Play in '.gamename($game_id);

        $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message, );

        $update_wallet_amount = $this->crud->wallet($user_id);

        $result = [
            "status" => 200,
            "message" => "Bet placed successfully.",
            "data" => [
                "bet_details" => $bets,
                "update_wallet_amount" => $update_wallet_amount,
            ],
        ];
        echo json_encode($result);
    }


/*game bet ---------harup-----------*/
    public function harup_place_bet()
    {
        $request_id = time();
        $user_id = $this->session->userdata("user")['id'];        
        $game_id = $this->input->post('game_id');
        $game_types = $this->input->post('game_type');
        $game_type_name = "Harup (Ander - Bahar )";
        $numbers = $this->input->post('number');
        $amounts = $this->input->post('amount'); 
        $date = date("Y-m-d");
        $time = date("H:i:s");

        // Check if user exists
        $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
        if (empty($user)) {
            echo json_encode(["status" => 400, "message" => "Account Closed By Admin.", "data" => []]);
            return;
        }

        // Get the user's wallet balance
        $wallet_amount = $this->crud->wallet($user_id);
        $total_bet_amount = array_sum($amounts);
        if ($total_bet_amount > $wallet_amount) 
        {
            echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
            return;
        }
        /*bets*/
        $bets = [];
        foreach ($numbers as $key => $number) {
            $amount = $amounts[$key];
            $game_type = isset($game_types[$key]) ? $game_types[$key] : null;
            $bets[] = [
                'request_id' => $request_id,
                'user_id' => $user_id,
                'game_id' => $game_id,
                'game_type' => $game_type,
                'game_type_name' => $game_type_name,
                'number' => $number,
                'amount' => $amount,
                'date' => $date,
                'time' => $time,
                'addeddate' => date('Y-m-d H:i:s'),
            ];
        }
        /*insert*/
        $this->db->insert_batch('game_bet', $bets);

        $user_id = $user_id;
        $add_type = 1;
        $type = "debit";
        $amount = $total_bet_amount;
        $message = 'Harup Game Play in '.gamename($game_id);

        $this->crud->wallet_credit_debit($request_id,$user_id, $type, $add_type,$amount, $message, );
        $update_wallet_amount = $this->crud->wallet($user_id);

        $result = [
            "status" => 200,
            "message" => "Bet placed successfully.",
            "data" => [
                "bet_details" => $bets,
                "update_wallet_amount" => $update_wallet_amount,
            ],
        ];
        echo json_encode($result);
    }


/*game bet crossing--------*/

    public function crossing_place_bet()
{
    $request_id = time();
    $user_id = $this->session->userdata("user")['id'];        
    $game_id = $this->input->post('game_id');
    $game_type = 1;
    $game_type_name = "Number to Number";

    // Get the numbers and amounts from the request
    $numbers = $this->input->post('numbers');
    $amounts = $this->input->post('amounts');
    
    // Ensure that numbers and amounts are not empty
    if (empty($numbers) || empty($amounts)) {
        echo json_encode(["status" => 400, "message" => "Numbers and amounts are required.", "data" => []]);
        return;
    }

    // Decode the JSON data
    $numbers = json_decode($numbers, true); 
    $amounts = json_decode($amounts, true); 

    // Check if JSON data decoding is successful
    if ($numbers === null || $amounts === null) {
        echo json_encode(["status" => 400, "message" => "Invalid data format.", "data" => []]);
        return;
    }

    $date = date("Y-m-d");
    $time = date("H:i:s");

    // Check if user exists
    $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
    if (empty($user)) {
        echo json_encode(["status" => 400, "message" => "Account Closed By Admin.", "data" => []]);
        return;
    }

    // Get the user's wallet balance
    $wallet_amount = $this->crud->wallet($user_id);
    $total_bet_amount = array_sum($amounts);
    if ($total_bet_amount > $wallet_amount) {
        echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
        return;
    }

    // Insert bet data into database
    $bets = [];
    foreach ($numbers as $key => $number) {
        $amount = $amounts[$key];
        $bets[] = [
            'request_id' => $request_id,
            'user_id' => $user_id,
            'game_id' => $game_id,
            'game_type' => $game_type,
            'game_type_name' => $game_type_name,
            'number' => $number,
            'amount' => $amount,
            'date' => $date,
            'time' => $time,
            'addeddate' => date('Y-m-d H:i:s'),
        ];
    }

    // Insert the bets into the database
    $this->db->insert_batch('game_bet', $bets);

    // Wallet Debit
    $add_type = 1;
    $type = "debit";
    $message = 'Number to Number Game Play in '.gamename($game_id);
    $this->crud->wallet_credit_debit($request_id, $user_id, $type, $add_type, $total_bet_amount, $message);

    // Get the updated wallet balance
    $update_wallet_amount = $this->crud->wallet($user_id);

    // Return the response with success
    $result = [
        "status" => 200,
        "message" => "Bet placed successfully.",
        "data" => [
            "bet_details" => $bets,
            "update_wallet_amount" => $update_wallet_amount,
        ],
    ];
    echo json_encode($result);
}


   


/*game bet number to number*/

    public function numbertonumber_place_bet()
    {
        $request_id = time();
        $user_id = $this->session->userdata("user")['id'];        
        $game_id = $this->input->post('game_id');
        $game_type = 1;
        $game_type_name = "Number to Number";

        // Get the numbers and amounts from the request
        $numbers = $this->input->post('numbers');
        $amounts = $this->input->post('amounts');
        
        if (empty($numbers) || empty($amounts)) {
            echo json_encode(["status" => 400, "message" => "Numbers and amounts are required.", "data" => []]);
            return;
        }

        // Decode the JSON data
        $numbers = json_decode($numbers, true); 
        $amounts = json_decode($amounts, true); 

        if ($numbers === null || $amounts === null) {
            echo json_encode(["status" => 400, "message" => "Invalid data format.", "data" => []]);
            return;
        }

        $date = date("Y-m-d");
        $time = date("H:i:s");

        // Check if user exists
        $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
        if (empty($user)) {
            echo json_encode(["status" => 400, "message" => "Account Closed By Admin.", "data" => []]);
            return;
        }

        // Get the user's wallet balance
        $wallet_amount = $this->crud->wallet($user_id);
        $total_bet_amount = array_sum($amounts);
        if ($total_bet_amount > $wallet_amount) {
            echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
            return;
        }

        // Insert bet data into database
        $bets = [];
        foreach ($numbers as $key => $number) {
            $amount = $amounts[$key];
            $bets[] = [
                'request_id' => $request_id,
                'user_id' => $user_id,
                'game_id' => $game_id,
                'game_type' => $game_type,
                'game_type_name' => $game_type_name,
                'number' => $number,
                'amount' => $amount,
                'date' => $date,
                'time' => $time,
                'addeddate' => date('Y-m-d H:i:s'),
            ];
        }

        // Insert the bets into the database
        $this->db->insert_batch('game_bet', $bets);

        // Wallet Debit
        $add_type = 1;
        $type = "debit";
        $message = 'Number to Number Game Play in '.gamename($game_id);
        $this->crud->wallet_credit_debit($request_id, $user_id, $type, $add_type, $total_bet_amount, $message);

        $update_wallet_amount = $this->crud->wallet($user_id);

        $result = [
            "status" => 200,
            "message" => "Bet placed successfully.",
            "data" => [
                "bet_details" => $bets,
                "update_wallet_amount" => $update_wallet_amount,
            ],
        ];
        echo json_encode($result);
    }





    /*game bet copy paste*/

    public function copypaste_place_bet()
    {
        $request_id = time();
        $user_id = $this->session->userdata("user")['id'];        
        $game_id = $this->input->post('game_id');
        $game_type = 1;
        $game_type_name = "Copy Paste";

        // Get the numbers and amounts from the request
        $numbers = $this->input->post('numbers');
        $amounts = $this->input->post('amounts');
        
        if (empty($numbers) || empty($amounts)) {
            echo json_encode(["status" => 400, "message" => "Numbers and amounts are required.", "data" => []]);
            return;
        }

        // Decode the JSON data
        $numbers = json_decode($numbers, true); 
        $amounts = json_decode($amounts, true); 

        if ($numbers === null || $amounts === null) {
            echo json_encode(["status" => 400, "message" => "Invalid data format.", "data" => []]);
            return;
        }

        $date = date("Y-m-d");
        $time = date("H:i:s");

        // Check if user exists
        $user = $this->db->get_where("users", array("id" => $user_id, 'status' => 1))->result_object();
        if (empty($user)) {
            echo json_encode(["status" => 400, "message" => "Account Closed By Admin.", "data" => []]);
            return;
        }

        // Get the user's wallet balance
        $wallet_amount = $this->crud->wallet($user_id);
        $total_bet_amount = array_sum($amounts);
        if ($total_bet_amount > $wallet_amount) {
            echo json_encode(["status" => 400, "message" => "Low balance.", "data" => []]);
            return;
        }

        // Insert bet data into database
        $bets = [];
        foreach ($numbers as $key => $number) {
            $amount = $amounts[$key];
            $bets[] = [
                'request_id' => $request_id,
                'user_id' => $user_id,
                'game_id' => $game_id,
                'game_type' => $game_type,
                'game_type_name' => $game_type_name,
                'number' => $number,
                'amount' => $amount,
                'date' => $date,
                'time' => $time,
                'addeddate' => date('Y-m-d H:i:s'),
            ];
        }

        // Insert the bets into the database
        $this->db->insert_batch('game_bet', $bets);

        // Wallet Debit
        $add_type = 1;
        $type = "debit";
        $message = 'Copy Paste Game Play in '.gamename($game_id);
        $this->crud->wallet_credit_debit($request_id, $user_id, $type, $add_type, $total_bet_amount, $message);

        $update_wallet_amount = $this->crud->wallet($user_id);

        $result = [
            "status" => 200,
            "message" => "Bet placed successfully.",
            "data" => [
                "bet_details" => $bets,
                "update_wallet_amount" => $update_wallet_amount,
            ],
        ];
        echo json_encode($result);
    }




























}