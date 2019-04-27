<?php

	function readFromFile(){
		$value = file_get_contents('for_wt_4.txt');
		return $value;
	}

	function incYearD($date){	//dd.mm.yy(yy)?
		$retStr = '';
		$tempArr = explode('.', $date[0]);
		$i = 0;
		foreach ($tempArr as $key) {
			$i++;
			if (($i % 3) != 0){
				$retStr .= $key;
				$retStr .= '.';
			}else {
				$retStr .= intval($key) + 1;
				$retStr .= ' ';
			}
		}
		return $retStr;
	}

	function incYearS($date){	//mm/dd/yy(yy)?
		$retStr = '';
		$tempArr = explode('/', $date[0]);

		$temp = $tempArr[0];
		$tempArr[0] = $tempArr[1];
		$tempArr[1] = $temp;

		$i = 0;
		foreach ($tempArr as $key) {
			$i++;
			if (($i % 3) != 0){
				$retStr .= $key;
				$retStr .= '.';
			}else {
				$retStr .= intval($key) + 1;
				$retStr .= ' ';
			}
		}
		return $retStr;
	}

//START::

$string0 = readFromFile();
	echo ($string0);
	echo ('<br><br><br><br>');

//	preg_replace_callback() - выполняет поиск по регулярному выражению и замену с помощью фнкции callback

	//	dd.mm.yy(yy)?
	$string0 = preg_replace_callback(
	 '/[0-9]{1,2}\.[0-9]{1,2}\.([0-9]{2}){1,2} /u',
		function ($arr){
			$arr[0] = preg_replace_callback('/([0-9]{1,2}\.[0-9]{1,2}\.([0-9]{2}){1,2} )/u',"incYearD", $arr[0]);
			return '<font color = red>'.$arr[0].'</font>';
		},
	$string0);

	//	mm/dd/yy(yy)?
	$string0 =  preg_replace_callback('/[0-9]{1,2}\/[0-9]{1,2}\/([0-9]{2}){1,2} /u',
		function ($arr){
		$arr[0] = preg_replace_callback('/([0-9]{1,2}\/[0-9]{1,2}\/([0-9]{2}){1,2} )/u', "incYearS", $arr[0]);
			return '<font color = red>'.$arr[0].'</font>';
		},
	$string0);

echo ($string0);
