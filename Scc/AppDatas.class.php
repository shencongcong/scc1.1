<?php
/*2016-4-25*/
namespace Scc;

class  AppDatas
{
	static public function output_datas($code,$message='',$data = array(),$type='json')
	{
		if(!empty($_GET['type'])){
			$type = $_GET['type'];
		}
		
		return self::$type($code,$message,$data);
	}
	
	static private function json($code,$message='',$data = array())
	{
		if(!is_numeric($code))
		{
			return false;
		}
		$datas = array(
			'code' => $code,
			'message' => $message,
			'data' => $data,
		);
		return json_encode($datas);
	}
	
	static private  function xml($code,$message='',$data = array())
	{
		if(!is_numeric($code))
		{
			return false;
		}
		$datas = array(
				'code' => $code,
				'message' => $message,
				'data' => $data,
		);
        header('content-type:text/xml');
        //拼接xml
        $xml = '';
        $xml.="<?xml version='1.0' encoding='UTF-8' ?>";
        $xml.='<root>';
        $xml.=self::xmlToEncode($datas);   //获取组装好的xml数据
        $xml.='</root>';
 
        echo $xml;
        exit;
	}
	static private function xmlToEncode($arr)
	{
		$xml = '';
		//将这个数组的键，作为节点名称，值作为内容
		foreach ($arr as $key => $value) {
			
			/*约定一个规则，如果键是数字的话，格式为<item id='5'>aaa</item>*/
			$attr  = '';
			if(is_numeric($key)){
				$attr   =   " id='{$key}'";//属性的值需要带上引号，不然报错
				$key    =   'item';
			}
		
			$xml .="<{$key}{$attr}>";
			//如果$value的值是个多维数组的话，需要递归遍历
			$xml .=is_array($value) ? self::xmlToEncode($value) : $value;
			$xml .="</{$key}>";
		}
		return $xml;
	}
}