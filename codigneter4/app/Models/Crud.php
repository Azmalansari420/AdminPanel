<?php

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\Database;

class Crud extends Model
{

    protected $table = 'meta_tags';
      

    public function getOldSlug($table_name,$insert_id)
    {
        $builder = $this->db->table($table_name);
        $builder->select('slug');
        $builder->where('id', $insert_id);
        $query = $builder->get();
        return $query->getRow()->slug ?? '';
    }  

    public function insertSlug($slug, $p_id, $table_name, $controller_name, $old_slug, $page_name)
    {
        $data = [
            'slug' => $slug,
            'table_name' => $table_name,
            'page_name' => $page_name,
            'controller_name' => $controller_name,
            'p_id' => $p_id,
        ];

        $this->db->table('slugs')->delete(['table_name' => $table_name, 'p_id' => $p_id]);

        if ($this->db->table('slugs')->where('slug', $slug)->countAllResults() === 0) {
            $this->db->table('slugs')->insert($data);
        } else {
            $i = 1;
            while ($i <= 10) {
                $slug2 = $slug . '-' . $i;
                if ($this->db->table('slugs')->where('slug', $slug2)->countAllResults() === 0) {
                    $data['slug'] = $slug2;
                    $slug = $slug2;
                    $this->db->table('slugs')->insert($data);
                    break;
                }
                $i++;
            }
        }

        return $slug;
    }

   public function insertMetaTags($slug, $old_slug, $postData)
    {
        $meta_title = $postData['meta_title'] ?? null;
        $meta_keyword = $postData['meta_keyword'] ?? null;
        $meta_description = $postData['meta_description'] ?? null;
        $meta_auther = $postData['meta_auther'] ?? null;

        $data = [
            'meta_title' => $meta_title,
            'meta_keyword' => $meta_keyword,
            'meta_description' => $meta_description,
            'meta_auther' => $meta_auther,
            'slug' => $slug,
        ];

        $this->db->table('meta_tags')->delete(['slug' => $old_slug]);
        if ($this->db->table('meta_tags')->where('slug', $slug)->countAllResults() === 0) {
            $this->db->table('meta_tags')->insert($data);
        } else {
            $this->db->table('meta_tags')->update($data, ['slug' => $slug]);
        }
    }

    public function updateSlug($id, $slug)
    {
        $this->db->table($this->table)->update(['slug' => $slug], ['id' => $id]);
    }








    

    // Record App User Activity
    // public function appActivityRecord()
    // {
    //     $getUser = get_user_app(); // Make sure this function exists
    //     $ip_address = service('request')->getIPAddress();
    //     $current_url = current_url();
    //     $date = date('Y-m-d');
    //     $time = date('h:i:s A');

    //     $insertData = [
    //         'ip_addreass'    => $ip_address,
    //         'url'            => $current_url,
    //         'date'           => $date,
    //         'time'           => $time,
    //         'admin_id'       => $getUser['full_detail']->id,
    //         'admin_username' => $getUser['full_detail']->mobile,
    //         'admin_password' => $getUser['full_detail']->password // Again, avoid plain-text passwords!
    //     ];

    //     return $this->insert($insertData);
    // }









}
