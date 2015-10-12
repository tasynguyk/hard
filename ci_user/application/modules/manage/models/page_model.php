<?php
 
class page_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
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
 
?>