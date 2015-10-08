<?php
 
class time_model extends CI_Model
{
     
    public function __construct()
    {
        parent::__construct();
    }
    
    public function check_time($day, $month, $year)
    {

        if($day==0 || $month==0 || $year==0)
        {
            return false;
        }   
        $day_31 = array(1, 3, 5, 7, 8, 10, 12);
        $day_30 = array(4, 6, 9, 11);
        if($day>31)
            return false;
        if(in_array($month ,$day_30) && $day>30)
            return false;
        if(($day>29 && $month==2 && $year%4==0) || ($day>28 && $month==2 && $year%4!=0))
        {
            return false;
        }
        return true;
    }
}
 
?>