<?php
namespace Admin\Model;
use Think\Model;

/**
 * URL模型
 * @author huajie <banhuajie@163.com>
 */

class ImportModel extends Model {
    public function __construct() {
    }


//导入excel内容转换成数组
    public function import($filePath,$index = 0){
        Vendor('PHPExcel.PHPExcel');
        $PHPExcel = new \PHPExcel();
        /**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
        $PHPReader = new \PHPExcel_Reader_Excel2007();
        if(!$PHPReader->canRead($filePath)){
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if(!$PHPReader->canRead($filePath)){
                echo 'no Excel';
                return;
            }
        }

        $PHPExcel = $PHPReader->load($filePath);
        $currentSheet = $PHPExcel->getSheet($index);  //读取excel文件中的第一个工作表
        //$allColumn = $currentSheet->getHighestColumn(); //取得最大的列号
        $allColumn = 'J';
        $allRow = $currentSheet->getHighestRow(); //取得一共有多少行
        $data = array();  //声明数组

        /**从第二行开始输出，因为excel表中第一行为列名*/
        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            $erp_orders_id = array();
            /**从第A列开始输出*/
            for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
                //echo "$currentColumn<br>";
                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/
               // if($val != ''){
                    $erp_orders_id[] = $val;
                // }
               // $erp_orders_id[] = '';
                /**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/
                //echo iconv('utf-8','gb2312', $val)."\t";
            }
            $data[$currentRow-2] = $erp_orders_id;
        }
        return $data;
    }

}
