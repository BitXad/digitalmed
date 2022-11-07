<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Sesion_model extends CI_Model 
{ 
    function __construct()
    {
        parent::__construct();
    }
      
    
    /*
       * function to add new sesion 
    */
    function add_sesion($params)
    {
        try{
            $this->db->insert('sesion',$params);
            return $this->db->insert_id();
        }catch (Exception $ex) {
            throw new Exception('Sesion_model model : Error in add_sesion function - ' . $ex);
        }  
    }
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      /*
        * Get sesion by sesion_id 
      */ 
      function get_sesion($sesion_id)
      {
        try{
           return $this->db->get_where('sesion',array('sesion_id'=>$sesion_id))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Sesion_model Model : Error in get_sesion function - ' . $ex);
           }  
      }
      /*
        * Get sesion by  column name
      */ 
      function get_sesionbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('sesion',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Sesion_model Madel : Error in get_sesionbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All sesion count 
      */ 
      function get_all_sesion_count()
      {
        try{
           $this->db->from('sesion');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in get_all_sesion_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join sesioncount 
      */ 
      function get_all_with_asso_sesion()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in get_all_with_asso_sesion function - ' . $ex);
           }  
      }
      /*
          * Get all sesion 
      */ 
      function get_all_sesion($params = array())
      {
        try{
              $this->db->order_by('sesion_id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('sesion')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in get_all_sesion function - ' . $ex);
           }  
      } 
      
      /* 
          * function to update sesion 
      */
      function update_sesion($sesion_id,$params)
      {
        try{
            $this->db->where('sesion_id',$sesion_id);
        return $this->db->update('sesion',$params);
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in update_sesion function - ' . $ex);
           }  
       }
     /* 
          * function to delete sesion 
      */
       function delete_sesion($sesion_id)
       {
        try{
             return $this->db->delete('sesion',array('sesion_id'=>$sesion_id));
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in delete_sesion function - ' . $ex);
           }  
       }
      /*
        * Get sesion by  column name where not in particular id
      */ 
      function get_sesionbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('sesion_id!=', $where_cond);
           return $this->db->get_where('sesion',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in get_sesionbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join sesioncount 
      */ 
      function get_all_with_asso_sesion_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in get_all_with_asso_sesion_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all sesion_by_cat 
      */ 
      function get_all_sesion_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('sesion_id', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('sesion')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Sesion_model model : Error in get_all_sesion_by_cat function - ' . $ex);
           }  
      } 
 }
