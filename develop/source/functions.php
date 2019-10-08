<?php
	define('TESTMODE', 1);
	define('ADMIN', 0);
	define('DOCUMENT_ROOT', __DIR__ . '/..');
	ini_set('short_open_tag', 1);

	if(!isset($_REQUEST['template'])){
		$_REQUEST['template'] = 'index';
	}

	global $Settings;
	$Settings['DISABLECACHE'] = true;
	$Settings['TESTMODE'] = 1;
	
	if(isset($_REQUEST['lang'])){
		$lang = filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_STRING);
		setLang($lang);
		if(isset($_REQUEST['pageid'])){
			if($_REQUEST['pageid']==1){
				$page = '/';
			}else{
				$page = seolink($_REQUEST['pageid']);
			}
		}else{
			$page = '/';
		}
		header('Location: ' . $page);
		exit;
	}

	if(isset($_REQUEST['template']) && strlen($_REQUEST['template'])>0){
		$template = filter_input(INPUT_GET, 'template', FILTER_SANITIZE_STRING);
		if(ADMIN==1){
			
			if(substr($template, 0,4) == 'mod_'){
				$tempPath = explode("_", $template);
				$template = '';
				foreach ($tempPath as $key => $value) {
					if($key == 0){
						$template .= $value;
					}else{
						$template .= "/" . $value;
					}
				}
			}
			if(!file_exists(DOCUMENT_ROOT.'/admin/templates/'.$template.'.html')){
				if(isset($cid)){
					$template = $Core->getPage($cid);
					$template = $Core->getpageType($template['pType']);
					global $pageTitle;
					$pageTitle = $template['name'];
					$template = $template['templateadmin'];
					if(substr($template, 0,4) == 'mod_'){
						$tempPath = explode("_", $template);
						$template = '';
						foreach ($tempPath as $key => $value) {
							if($key == 0){
								$template .= $value;
							}else{
								$template .= "/" . $value;
							}
						}
					}
					if(!file_exists(DOCUMENT_ROOT.'/admin/templates/'.$template.'.html')){
						$template = 'index';
					}
				}else{
					$template = 'index';
				}
			}
		}elseif(defined('THEME') && strlen(THEME)>0){
			if(!file_exists(DOCUMENT_ROOT.'/themes/'.THEME.'/templates/'.$template.'.html')){
				$template = 'index';
			}
		}else{
			$template = 'debug';
		}
	}


	function debug($title, $message = "", $vardump=1, $override = false){
		if(intval(TESTMODE) === 1 || $override === true){
			echo "<pre><h1>".$title."</h1>";
			if($message && $vardump!==1){
				echo 'DEBUG MESSAGE:<br>';
			}
			if($vardump ===1){
				var_dump($message);
			}else{
				if(is_array($message)){
					foreach ($message as $value) {
						echo $value . "<br>";
					}
				}else{
					echo "$message";
				}
			}
			echo "</pre>";
		}
	}

	function dd($message, $title="", $vardump = 1, $override = true){
		debug($title, $message, $vardump, $override);
	}

	function showpage(){
		global $disableCache;
		global $db;
		global $template;
		global $pageid;
		global $Page;
		global $P;
		global $S;
		global $Core;
		global $Settings;
		global $pageTitle;
		global $pageHead;
		global $pageFooter;
		
		if(ADMIN==1){
			$includepage = '/admin/templates/'.$template.'.html';	
		}elseif(defined('THEME') && strlen(THEME)>0){
			if(THEME == '../install' || THEME == '../default'){
				if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/'.str_replace("../", "", THEME).'/')){
					error(THEME . ' Thema werd niet gevonden...');
				}else{
					$includepage = '/'.str_replace("../", "", THEME).'/templates/'.$template.'.html';
				}
			}else{
				if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/themes/'.THEME.'/')){
					$includepage = '/default/templates/'.$template.'.html';
				}else{
					$includepage = '/themes/'.THEME.'/templates/'.$template.'.html';	
				}
			}
		}else{
			error('Geen thema ingesteld');
		}

		if(!file_exists(DOCUMENT_ROOT . $includepage)){
			echo DOCUMENT_ROOT . $includepage . "<br>";
			error('Pagina werd niet gevonden...');
		}else{
			// GENERATE PAGE 
			ob_start();
			include DOCUMENT_ROOT . $includepage;
			$content = ob_get_clean();
			flush();
			ob_flush();

			if($Settings['TESTMODE']==1 || $Settings['DISABLECACHE'] == 1 || $Settings['DISABLECACHE'] == true || $disableCache == true || ADMIN == 1){
				$disableCache = true;
			}else{
				$disableCache = false;
			}
			
			
			if(THEME!='admin'){

				if(!$disableCache){
					// GENERATE CACHEFILE
					$cache 	= preg_replace("/[^a-zA-Z0-9]/", "_", $_SERVER['REQUEST_URI']);
					$requeststring = '_';
					foreach ($_REQUEST as $key => $value) {
						if($key == 'PHPSESSID'){
							continue;
						}
						$requeststring .= $key . '_' . $value;
					}
					$cachePath = DOCUMENT_ROOT . '/cache/' . getLang(). '_' . $cache . $requeststring .'.html';

					$php = '
							<?php
								global $disableCache;
								
								global $template;
								global $pageid;
								global $Page;
								global $P;
								global $S;
								global $Core;
								global $Settings;
								global $pageTitle;
								global $pageHead;
								global $pageFooter;
								
								$disableCache	= ' . var_export($disableCache, TRUE) . ';
								$template		= ' . var_export($template, TRUE) . ';
								$pageid			= ' . var_export($pageid, TRUE) . ';
								$P				= ' . var_export($P, TRUE) . ';
								$S				= ' . var_export($S, TRUE) . ';
								$Settings		= ' . var_export($Settings, TRUE) . ';
								$pageTitle		= ' . var_export($pageTitle, TRUE) . ';
								$pageHead		= ' . var_export($pageHead, TRUE) . ';
								$pageFooter		= ' . var_export($pageFooter, TRUE) . ';
								
								$Core 			= new Core;
								$db				= new Db;
								$Page 			= new Page;
							?>
							';

					while (strpos($content, '[i_') !== false) {
						$start = strpos($content, '[i_');
						$end = strpos($content, ']', $start);
						$inc = substr($content, $start+3, ($end-($start+3)));
						$replace = inc($inc, false, true);
						$content = str_replace('[i_'.$inc.']', $replace, $content);
					}

					$content = str_replace("[LEFFIXINCLUDE_", "[i_", $content);
					file_put_contents($cachePath, $php . $content);
				}
			}

			while (strpos($content, '[i_') !== false) {
				$start = strpos($content, '[i_');
				$end = strpos($content, ']', $start);
				$inc = substr($content, $start+3, ($end-($start+3)));
				$replace = inc($inc, false);
				$content = str_replace('[i_'.$inc.']', $replace, $content);
			}

			if(isset($_SESSION['user']['webEdit'])){
				if($_SESSION['user']['webEdit'] && ADMIN != 1){
					$editscript = file_get_contents(DOCUMENT_ROOT . '/admin/functions/web/webEdit.php') . "</body>";
					$editscript = str_replace("[PAGEID]", $pageid, $editscript);
					
					$content = str_replace("</body>", $editscript, $content);
				}
			}

			// SHOW PAGE
			// $content = \Minify_HTML::minify($content);
			echo $content;
			exit;
			
		}
		// exit;
	}

	function inc($file, $echo = true, $pagecache = false){
		global $db;
		global $pageid;
		global $Page;
		global $P;
		global $S;
		global $template;
		global $disableCache;
		global $uniquecache;
		global $Settings;

		unset($uniquecache);
		unset($disableCache);

		if($echo){
			echo '[i_'.$file.']';
			return;
		}
		
		if(ADMIN==1){
			$include = '/admin/templates/includes/'.$file.'.html';	
			$disableCache = true;
		}elseif(defined('THEME')&& strlen(THEME)>0){
			$include = '/themes/'.THEME.'/templates/includes/'.$file.'.html';	
		}elseif(defined('THEME_DEFAULT')&& strlen(THEME_DEFAULT)>0){
			$include = '/themes/'.THEME_DEFAULT.'/templates/includes/'.$file.'.html';	
		}else{
			error('Geen thema ingesteld');
		}

		if($Settings['TESTMODE']==1 || $Settings['DISABLECACHE'] == 1 || $Settings['DISABLECACHE'] == true || ADMIN==1){
			$disableCache = true;
		}else{
			$disableCache = false;
		}

		if(!$disableCache){
			$requeststring = '_';
			foreach ($_REQUEST as $key => $value) {
				$requeststring .= $key . '_' . $value;
			}

			$path = DOCUMENT_ROOT . '/cache/'.getLang().'_'.$file.$requeststring.'.html';
			if(is_file($path)){
				ob_start();
				include $path;
				$content = ob_get_contents();
				ob_end_clean();
				ob_flush();
			}else{
				ob_start();
				include DOCUMENT_ROOT.$include;
				$content = ob_get_contents();
				ob_end_clean();
				ob_flush();

				if($Settings['TESTMODE']==1 || $Settings['DISABLECACHE'] == 1 || $Settings['DISABLECACHE'] == true || $disableCache == true){
					$disableCache = true;
				}else{
					$disableCache = false;
				}
				
				if(!isset($uniquecache)){
					$uniquecache = false;
				}
				if(!$disableCache && $uniquecache == false){
					$cache = fopen($path,'w');
					fwrite($cache, $content);
					fclose($cache);
				}
				// echo $content;
			}
		}else{
			ob_start();
			include DOCUMENT_ROOT.$include;
			$content = ob_get_contents();
			ob_end_clean();
			ob_flush();
			// echo $content;
		}

		if($pagecache){
			if($disableCache == true){
				return '[LEFFIXINCLUDE_'.$file.']';
			}
		}

		if($echo){
			echo $content;
		}else{
			return $content;
		}
	}


	function getLang($all = false){
		if($all){
			return languages();	
		}
		if(isset($_REQUEST['lang'])){
			return filter_input(INPUT_GET, 'lang', FILTER_SANITIZE_STRING);
		}
		if(isset($_SESSION['web']['lang'])){
			return $_SESSION['web']['lang'];
		}else{
			return langDefault();
		}
	}

	function langDefault(){
		global $Settings;
		if(isset($Settings['languages'][0]['lang'])){
			return $Settings['languages'][0]['lang'];
		}else{
			return 'nl';
		}
	}

	function error($msg){
		echo $msg;
		exit;
	}

	function img($src, $size=null){

		if(isset(unserialize($src)['file'])){
			$file = unserialize($src)['file'];
			if(strpos($file, '/uploads') === false){
				return $file;
			}else{
				return BASE_URL . $file;
			}
		}
		return $src;
	}
	
	function imginfo($title){
		return array('caption' => $title, 'title' => $title);
	}

	function __($woord, $translationfile = null){
		return $woord;
	}

	function sluglink($in){
		return $in;
	}

	class Page { 
		function getChildrenList(){
			return array();
		}
	}

	$Page = new Page;
