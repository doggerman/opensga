<?php
/**
 *App Controller
 * 
 * @copyright     Copyright 2010-2011, INFOmoz (Informática-Moçambique) (http://infomoz.net)
 ** @link          http://opensga.com OpenSGA  - Sistema de Gestão Académica
 * @author		  Elisio Leonardo (elisio.leonardo@gmail.com)
 * @package       opensga
 * @subpackage    opensga.core.controller
 * @since         OpenSGA v 0.1.0

 * 
 */

 /**
  * Vamos tentar carregar as opcoes globais aqui, comecando pelo modelo config
  */
	App::import('Model','Config');
	App::import('Model','User');
	App::import('Model','Feriado');
    App::uses('AuditableConfig', 'Auditable.Lib');
	App::uses('Controller','Controller');
	
/**
 * Classe Mae para todos os Controllers
 * 
 * @package opensga
 * @subpackage opensga.core.controller
 * @author Elisio Leonardo <elisio.leonardo@infomoz.net>
 */  
class AppController extends Controller {
   //var $components = array( 'Auth', 'Session');
   
   
   var $components = array(
       'Security','Acl','Auth', 'Session','RequestHandler','DebugKit.Toolbar');
   var $helpers = array('Html','Form','Session','Js' => array('MyJquery'),'EventsCalendar','Javascript','Ajax');

	 public $pdfConfig = array(
		'engine' => 'CakePdf.Tcpdf',
	);
    
    //public $pdfConfig = array('engine' => 'Tcpdf');

    function beforeFilter() {
        parent::beforeFilter();
       
        
        Configure::write('Config.language', $this->Session->read('Config.language'));
		setlocale (LC_ALL, 'ptb');
        if($this->Auth->loggedIn()) {
            AuditableConfig::$responsibleId = $this->Auth->user('id');
        }
        
        // Caso deseje usar o modelo padrão, utilize como abaixo, caso contrário você pode usar qualquer modelo
        AuditableConfig::$Logger =& ClassRegistry::init('Auditable.Logger');
			 
        //Configure AuthComponent
        Security::setHash('md5');
        //$this->Auth->allow('*');
        //$this->Auth->authorize = 'actions';
        $this->Auth->authorize = array(
            'Actions' => array(
                'actionPath' => 'controllers'
            )
        );

        if($this->request->is('ajax')){
            
            $this->Security->csrfCheck = false;
            $this->Security->validatePost = false;
        }
		$this->Auth->autoRedirect = false;
        $this->Auth->loginError = "Nome de Usuário ou senha incorrectas";
		$this->Auth->authError = "Não possui permissão para aceder ao sistema";
        $this->Auth->flash = array('element'=>'default','key'=>'auth','params'=>array('class'=>'alert error'));
		
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array(array('controller'=>'pages','action'=>'display','home'));
    }



  /** 
     * Builds up a selected datetime for the form helper 
     * @param string $fieldname 
     * @return null|string 
     */  
    function process_datetime($fieldname) {  
        $selected = null;  
        if(isset($this->params['named'][$fieldname])) {  
            $exploded = explode('-',$this->params['named'][$fieldname]);  
            if(!empty($exploded)) {  
                $selected = '';  
                foreach($exploded as $k=>$e) {  
                    if(empty($e)) {  
                        $selected .= (($k==0) ? '0000' : '00');  
                    } else {  
                        $selected .= $e;  
                    }  
                    if($k!=2) {$selected.='-';}  
                }  
            }  
        }  
    return $selected;  
    } 
	
	/**
 * uploads files to the server
 * @params:
 *		$folder 	= the folder to upload the files e.g. 'img/files'
 *		$formdata 	= the array containing the form files
 *		$itemId 	= id of the item (optional) will create a new sub folder
 * @return:
 *		will return an array with the success of each file upload
 */
function uploadFiles($folder, $formdata, $itemId = null) {
	// setup dir names absolute and relative
	$folder_url = WWW_ROOT.$folder;
	$rel_url = $folder;
	
	// create the folder if it does not exist
	if(!is_dir($folder_url)) {
		mkdir($folder_url);
	}
		
	// if itemId is set create an item folder
	if($itemId) {
		// set new absolute folder
		$folder_url = WWW_ROOT.$folder.'/'.$itemId; 
		// set new relative folder
		$rel_url = $folder.'/'.$itemId;
		// create directory
		if(!is_dir($folder_url)) {
			mkdir($folder_url);
		}
	}
	
	// list of permitted file types, this is only images but documents can be added
	$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
	
	// loop through and deal with the files
	foreach($formdata as $file) {
		// replace spaces with underscores
		$filename = str_replace(' ', '_', $file['name']);
		// assume filetype is false
		$typeOK = false;
		// check filetype is ok
		foreach($permitted as $type) {
			if($type == $file['type']) {
				$typeOK = true;
				break;
			}
		}
		
		// if file type ok upload the file
		if($typeOK) {
			// switch based on error code
			switch($file['flasherror']) {
				case 0:
					// check filename already exists
					if(!file_exists($folder_url.'/'.$filename)) {
						// create full filename
						$full_url = $folder_url.'/'.$filename;
						$url = $rel_url.'/'.$filename;
						// upload the file
						$success = move_uploaded_file($file['tmp_name'], $url);
					} else {
						// create unique filename and upload file
						ini_set('date.timezone', 'Europe/London');
						$now = date('Y-m-d-His');
						$full_url = $folder_url.'/'.$now.$filename;
						$url = $rel_url.'/'.$now.$filename;
						$success = move_uploaded_file($file['tmp_name'], $url);
					}
					// if upload was successful
					if($success) {
						// save the url of the file
						$result['urls'][] = $url;
					} else {
						$result['errors'][] = "Error uploaded $filename. Please try again.";
					}
					break;
				case 3:
					// an error occured
					$result['errors'][] = "Error uploading $filename. Please try again.";
					break;
				default:
					// an error occured
					$result['errors'][] = "System error uploading $filename. Contact webmaster.";
					break;
			}
		} elseif($file['error'] == 4) {
			// no file was selected for upload
			$result['nofiles'][] = "No file Selected";
		} else {
			// unacceptable file type
			$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
		}
	}
return $result;
}


  


}
?>
