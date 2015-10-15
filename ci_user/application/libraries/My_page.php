<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_page {
	public function __construct() {	
	}

	public function can_view($id, $resource)
        {
            //$this->load->database();
            $sql = "select * from `user_group`,`group_resource` "
                    . " where user_group.userID = $id and "
                    . " user_group.groupID = group_resource.groupID and "
                    . " group_resource.resourceID = $resource";
            return $this->ci->db->query($sql)->num_rows()>0?TRUE:FALSE;
        }
        
        public function create_page($config)
    	{
		if($config['total_row']%$config['item_per_page']==0)
		{
		    $num_page = $config['total_row']/$config['item_per_page'];
		}
		else
		{
		    $num_page = $config['total_row']/$config['item_per_page']+1;
		}
		$ret = '';
		for($i=1;$i<=$num_page;$i++)
		{
		    if($i!=$config['curpage'])
		    {
		        $ret .= "<a href='".$config['url']."/".$i."'>".$i.'</a> ';
		       // echo $ret;
		    }
		    else
		    {
		        $ret .= $i.' ';
		    }
		}
		return $ret;
    	}
}
