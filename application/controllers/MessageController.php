<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MessageController extends CI_Controller {

    public function __construct(){
        parent::__construct();
            $this->load->model(array('MessageModel'));
        $this->load->helper(array('DataStructure', 'Validation'));
    
    }

    public function sendMessage(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->MessageModel->sendMessage($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function getNotRead(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->MessageModel->getNotRead($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function changeStatus(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->MessageModel->changeStatus($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }

      public function getMessage(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->MessageModel->getMessage($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function getDetailMessage(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->MessageModel->getDetailMessage($this->input->get());
          echo json_encode(array('data' => $data));
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
      public function deleteMessage(){
        try{
          $this->SecurityModel->userOnlyGuard(TRUE);
          $data = $this->input->post(); 
          var_dump($data);
          $this->MessageModel->deleteMessage($data);
           
          
          echo json_encode('succes');
        } catch (Exception $e) {
          ExceptionHandler::handle($e);
        }
      }
}
?>