<?php
class FileIO {

  public static function uploadPath($field){
    return realpath(APPPATH . '../uploads/' . $field) . '\\';
  }

  public static function upload($field, $bidang, $id, $allowedType = NULL, $postfix = NULL){
    $CI =& get_instance();
    $filename = $bidang . '_' . $id . ($postfix ? '_' . $postfix : '');
    $CI->load->library('upload', array(
      'upload_path' => realpath(APPPATH . '../uploads/'. $field),
      'allowed_types' => $allowedType != NULL ? $allowedType : 'jpg|jpeg|png|gif|doc|docx|pdf',
      'max_size' => '10240',
      'file_name' =>  $allowedType == 'pdfxx' ? 'temp' : $filename,
      'overwrite' => TRUE
    ));
    if(!$CI->upload->do_upload($field)){
      throw new UserException($CI->upload->display_errors(), UPLOAD_FAILED_CODE);
    } else {
      if($allowedType == 'pdfxx'){
        FileIO::genCompatPDF($field, $CI->upload->data()['file_name'], $filename . '.pdf');
        return $filename . '.pdf';
      } else {
        return $CI->upload->data()['file_name'];
      }
    }
  }

  public static function delete($field, $filename){
    $path = realpath(APPPATH . '../uploads/' . $field . '/' . $filename);
    if (!empty($filename) && file_exists($path)){
      if(!unlink($path)) {
        throw new UserException('Gagal mengahapus ' . $field, 0);
      }
    } else {
      // throw new UserException('File tidak ada', FILE_NOT_FOUND);
    }
    
    return NULL;
  }

  public static function headerDownloadxlsx($title){
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
		header('Cache-Control: max-age=0');
  }

  public static function headerDownloadxls($title){
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$title.'.xls"');
		header('Cache-Control: max-age=0');
  }

  public static function headerDownloadZip($path, $title){
    header("Content-Disposition: attachment; filename=$title");
    header("Content-length: " . filesize($path.$title));
    header("Content-type: application/zip");
    header('Cache-Control: max-age=0');
  }
  
  public static function genCompatPDF($field, $oldFilename, $filename){
    $oldFilename = "./uploads/{$field}/{$oldFilename}";
    $newFilename = "./uploads/{$field}/{$filename}";
		putenv('PATH=C:\Program Files\gs\gs9.26\bin');
    shell_exec('gswin64 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile='.$newFilename.' '.$oldFilename); 
    FileIO::delete($field, $oldFilename);
  }
}