<?php
	class Template{
	
		private $map = array();
	
		public function assign($key, $value){
			$key = '{$' . $key . '}'; 
			$this->map[$key] = $value;
		}
		
		public function display($documentName){
			$htmlText= file_get_contents($documentName);
			
			foreach($this->map as $key => $value){
				$htmlText = str_replace($key, $value, $htmlText);
			}
			
			echo $htmlText;
		}
		
		//Zum einfuegen in die Divs via ajax
		public function getConvertedHtml($documentName){
			$htmlText= file_get_contents($documentName);
			
				foreach($this->map as $key => $value){
					$htmlText = str_replace($key, $value, $htmlText);
				}
			
				return $htmlText;
		}
	}
?>