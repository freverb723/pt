<?php
require_once 'Database.php';

class Holiday extends Database{

    public function ShowHoliday($id){
        $sql="SELECT holiday_data.holiday_id, 
                     holiday_data.holiday_date, 
                     holiday_data.holiday_name,
                     holiday_data.holiday_type,
                     timerecord.date,
                     timerecord.status
                     FROM holiday_data LEFT OUTER JOIN timerecord ON holiday_data.holiday_id = timerecord.holiday_id
                     ORDER BY holiday_data.holiday_date ASC";
        $result =$this->conn->query($sql);
        
        $rows = array();
        while ($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
    return $rows;
    }
}
?>