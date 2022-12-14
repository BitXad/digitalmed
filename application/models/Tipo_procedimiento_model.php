<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Tipo_procedimiento_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get tipo_procedimiento by tipoproced_id 
      */ 
      function get_tipo_procedimiento($tipoproced_id)
      {
        try{
           return $this->db->get_where('tipo_procedimiento',array('tipoproced_id'=>$tipoproced_id))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model Model : Error in get_tipo_procedimiento function - ' . $ex);
           }  
      }
      /*
        * Get tipo_procedimiento by  column name
      */ 
      function get_tipo_procedimientobyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('tipo_procedimiento',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model Madel : Error in get_tipo_procedimientobyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All tipo_procedimiento count 
      */ 
      function get_all_tipo_procedimiento_count()
      {
        try{
           $this->db->from('tipo_procedimiento');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in get_all_tipo_procedimiento_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join tipo_procedimientocount 
      */ 
      function get_all_with_asso_tipo_procedimiento()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in get_all_with_asso_tipo_procedimiento function - ' . $ex);
           }  
      }
      /*
          * Get all tipo_procedimiento 
      */ 
      function get_all_tipo_procedimiento($params = array())
      {
        try{
              $this->db->order_by('tipoproced_id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('tipo_procedimiento')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in get_all_tipo_procedimiento function - ' . $ex);
           }  
      } 
      /*
         * function to add new tipo_procedimiento 
      */
      function add_tipo_procedimiento($params)
      {
        try{
          $this->db->insert('tipo_procedimiento',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in add_tipo_procedimiento function - ' . $ex);
           }  
      }
      /* 
          * function to update tipo_procedimiento 
      */
      function update_tipo_procedimiento($tipoproced_id,$params)
      {
        try{
            $this->db->where('tipoproced_id',$tipoproced_id);
        return $this->db->update('tipo_procedimiento',$params);
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in update_tipo_procedimiento function - ' . $ex);
           }  
       }
     /* 
          * function to delete tipo_procedimiento 
      */
       function delete_tipo_procedimiento($tipoproced_id)
       {
        try{
             return $this->db->delete('tipo_procedimiento',array('tipoproced_id'=>$tipoproced_id));
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in delete_tipo_procedimiento function - ' . $ex);
           }  
       }
      /*
        * Get tipo_procedimiento by  column name where not in particular id
      */ 
      function get_tipo_procedimientobyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('tipoproced_id!=', $where_cond);
           return $this->db->get_where('tipo_procedimiento',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in get_tipo_procedimientobyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join tipo_procedimientocount 
      */ 
      function get_all_with_asso_tipo_procedimiento_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in get_all_with_asso_tipo_procedimiento_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all tipo_procedimiento_by_cat 
      */ 
      function get_all_tipo_procedimiento_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('tipoproced_id', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('tipo_procedimiento')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Tipo_procedimiento_model model : Error in get_all_tipo_procedimiento_by_cat function - ' . $ex);
           }  
      } 
 }
