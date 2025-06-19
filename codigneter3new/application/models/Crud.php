<?php

class Crud extends CI_Model
{
	//-----------------------------add---------------------

	function insert($table,$data)
	{
		$result = $this->db->insert($table,$data);
		return $result;
	}


	// get data (list dekhney ke lia) dd hua data ko dikhaney ke lia(all slider)

	function get_data($table)
	{
		$data = $this->db->get($table);
		return $data->result();
	}


	//===-------------delete------------------

	function delete($table,$id)
	{
		$this->db->where('id',$id);
		return $this->db->delete($table);
	}

	function selectDataByMultipleWhere($table,$where)
	{
		$this->db->where($where);
		$data=$this->db->get($table);
		return $data->result();
	}


	//----------------------edit-----------------------------

	function update($table,$id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update($table,$data);
	}


	function fetchdatabyid($id,$table)
	{
		$this->db->where('id',$id);
		$data=$this->db->get($table);
		return $data->result();
	}

	//-----------------------pagination--------------

	function selectdatainlimit($limit, $start,$table)
	{
		$this->db->limit($limit,$start);
		$data = $this->db->get($table);
		return $data->result();
	}



	//----------api step 2/2

	function get_json($table)
	{
		$data = $this->db->get($table);
		return $data->result();
	}


	/*meta tags*/

	public function insert_slug($slug,$p_id,$table_name,$controller_name,$old_slug,$page_name)
    {
        $data = array(
          "slug"=>$slug,
          "table_name"=>$table_name,
          "page_name"=>$page_name,
          "controller_name"=>$controller_name,
          "p_id"=>$p_id,
        );
        $this->db->delete("slugs",array("table_name"=>$table_name,"p_id"=>$p_id,));
        if(empty($this->db->get_where("slugs",array("slug"=>$slug,))->result_object()))
        {
            $this->db->insert("slugs",$data);
        }
        else
        { 
            $i=1;
            while ($i <= 10)
            {
              $slug2 = $slug.'-'.$i;
              $get_data = $this->db->get_where("slugs",array("slug"=>$slug2,))->result_object();
              if(empty($get_data))
              {
                $data['slug'] = $slug2; 
                $slug = $slug2;
                $this->db->insert("slugs",$data);
                break;
              }
              $i++;
            } 
        }
        return $slug;
    }

    public function insert_meta_tags($slug,$old_slug)
    {     
        $data = array(
          "meta_title"=>$this->input->post("meta_title"),
          "meta_keyword"=>$this->input->post("meta_keyword"),
          "meta_description"=>$this->input->post("meta_description"),
          "meta_auther"=>$this->input->post("meta_auther"),
          "slug"=>$slug,
        );
        $this->db->delete("meta_tags",array("slug"=>$old_slug,));
      if(empty($this->db->get_where("meta_tags",array("slug"=>$slug,))->result_object()))
      {
          $this->db->insert("meta_tags",$data);
      }       
      else
      {
          $this->db->update("meta_tags",$data,array("slug"=>$slug,));
      }      
    }


    public function get_meta_tags()
    {
      $html = '';
      $base = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
      $base .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $url = explode($base, (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")[1];

      if(empty($url))
        $url = 'home';
      
      $meta_select ="page_name,meta_title,meta_keyword,meta_description,meta_auther";
      $meta_data = $this->db->select($meta_select)->get_where("meta_tags",array("slug"=>$url))->result_object();     


      $meta_title = '';
      $meta_keyword = '';
      $meta_description = '';
      $meta_auther = '';
      if(!empty($meta_data))
      {
        $meta_data = $meta_data[0];
         $meta_title = $meta_data->meta_title;
         $meta_keyword = $meta_data->meta_keyword;
         $meta_description = $meta_data->meta_description;
         $meta_auther = $meta_data->meta_auther;
      }else
      {
        $meta_data = $this->db->limit(1)->select($meta_select)->get_where("meta_tags",array("slug"=>'home'))->result_object();
        if(!empty($meta_data))
        {
          $meta_data = $meta_data[0];
           $meta_title = $meta_data->meta_title;
           $meta_keyword = $meta_data->meta_keyword;
           $meta_description = $meta_data->meta_description;
           $meta_auther = $meta_data->meta_auther;
        }
      }
       $html = '
            <title>'.$meta_title.'</title>
            <meta name="keywords" content="'.$meta_keyword.'">
            <meta name="description" content="'.$meta_description.'"> 
            <meta name="meta_auther" content="'.$meta_auther.'"> 
          ';
      return $html;
    }



  function activity_record()
  {

    $ip_addreass = $this->input->ip_address();
    $current_url = current_url();
    $date = date('Y-m-d');
    $time = date('H:i:s A');
    $admin_id = $this->session->userdata("adminid");
    $admin_username = $this->session->userdata("username");
    $admin_password = $this->session->userdata("password");

    $insertdata = array(
      "ip_addreass"=>$ip_addreass,
      "url"=>$current_url,
      "date"=>$date,
      "time"=>$time,
      "admin_id"=>$admin_id,
      "admin_username"=>$admin_username,
      "admin_password"=>$admin_password,
    );

    $result = $this->db->insert('activity_records',$insertdata);
    return $result;
  }














}