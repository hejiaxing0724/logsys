<?php

namespace App\Model\Common;

use App\BaseModel;

class ParseCSV extends BaseModel
{

	public function exportCSV($url)
	{
		// 获取CSV文本内容
		$size = 0;
		$file = fopen($url,'r'); 
		while ($data = fgetcsv($file)) { 
			//每次读取CSV里面的一行内容
			//此为一个数组，要获得每一个数据，访问数组下标即可
			if ($size<sizeof($data)) {
				$size = sizeof($data);
			}
			if ($size == sizeof($data)) {
				$content[] = $data;
			}	
		}

 		// 获取CSV文件名
 		$split1 = explode('/',$url);
 		$split2 = explode('.',end($split1));
 		$name = $split2[0];

 		$list[] = $name;
 		$list[] = $content;
 		return $list;
	}

}