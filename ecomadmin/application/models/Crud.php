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





}