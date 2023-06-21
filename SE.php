<?php
    function custom_search(){
        $mysql_query = "select * from table_name";
        if(filter){
            $mysql_query.="where column_name = filter";
        }
    }

    function fix(){
        
    }
?>