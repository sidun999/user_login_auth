<?php

/**
 * 
 */
class CommonAction extends Action  {

	public function _initialize() {
		parent::_initialize(); // RBAC 验证接口初始化
	}

	public function exportExcel($FileName,$expCellName,$expTableData,$FirstRowText){
        //$FileName = iconv('utf-8', 'gb2312', $FileName);//文件名称
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        vendor("PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1',$FirstRowText); 
		$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1')->getFont()->setBold(true);
		$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED); 
		$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1')->getAlignment()->setVERTICAL(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$objPHPExcel->setActiveSheetIndex(0)->getDefaultRowDimension()->setRowHeight(22);
        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); 
			//echo $cellName[$i];exit;
			$objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($cellName[$i])->setWidth($expCellName[$i][2]);
			// 组合： HORIZONTAL 水平；VERTICAL 垂直;LEFT,RIGHT,CNETER, 靠右；
			//水平对齐
			switch($expCellName[$i][3]){
				case 'center':
					$ShuiPing = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
					break;
				case 'right':
					$ShuiPing = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
					break;
				default:
					$ShuiPing = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
			}
			//垂直对齐
			switch($expCellName[$i][4]){
				case 'bottom':
					$ChuiZhi = PHPExcel_Style_Alignment::VERTICAL_BOTTOM;
					break;
				case 'top':
					$ChuiZhi = PHPExcel_Style_Alignment::VERTICAL_TOP;
					break;
				default:
					$ChuiZhi = PHPExcel_Style_Alignment::VERTICAL_CENTER;
			}
			$objPHPExcel->getActiveSheet()->getStyle($cellName[$i].'2')->getAlignment()->setHorizontal($ShuiPing);
			$objPHPExcel->getActiveSheet()->getStyle($cellName[$i].'2')->getAlignment()->setVERTICAL($ChuiZhi);
        }
		//背景色
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$cellName[$cellNum-1].'2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$cellName[$cellNum-1].'2')->getFill()->getStartColor()->setARGB('FF666666');
		//字体颜色
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$cellName[$cellNum-1].'2')->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$cellName[$cellNum-1].'2')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
 
        for($i=0;$i<$dataNum;$i++){
          for($j=0;$j<$cellNum;$j++){
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
			// 组合： HORIZONTAL 水平；VERTICAL 垂直;LEFT,RIGHT,CNETER, 靠右；
			//水平对齐
			switch($expCellName[$j][3]){
				case 'center':
					$ShuiPing = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
					break;
				case 'right':
					$ShuiPing = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
					break;
				default:
					$ShuiPing = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
			}
			//垂直对齐
			switch($expCellName[$j][4]){
				case 'bottom':
					$ChuiZhi = PHPExcel_Style_Alignment::VERTICAL_BOTTOM;
					break;
				case 'top':
					$ChuiZhi = PHPExcel_Style_Alignment::VERTICAL_TOP;
					break;
				default:
					$ChuiZhi = PHPExcel_Style_Alignment::VERTICAL_CENTER;
			}
			$objPHPExcel->getActiveSheet()->getStyle($cellName[$j].($i+3))->getAlignment()->setHorizontal($ShuiPing);
			$objPHPExcel->getActiveSheet()->getStyle($cellName[$j].($i+3))->getAlignment()->setVERTICAL($ChuiZhi);
          }             
        }  
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$FileName.'.xls"');
        header("Content-Disposition:attachment;filename=".$FileName.".xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
    }
	
	public function importExecl($file){ 
        if(!file_exists($file)){ 
            return array("error"=>0,'message'=>'file not found!');
        } 
        Vendor("PHPExcel.PHPExcel");
		$PHPExcel = new PHPExcel(); 
		$PHPReader = new PHPExcel_Reader_Excel2007(); 
		if(!$PHPReader->canRead($file)){ 
			$PHPReader = new PHPExcel_Reader_Excel5(); 
			if(!$PHPReader->canRead($file)){ 
				return array("error"=>2); 
			} 
		} 
		$PHPExcel = $PHPReader->load($file); 
		$SheetCount = $PHPExcel->getSheetCount(); 
		for($i=0;$i<$SheetCount;$i++){ 
			$currentSheet = $PHPExcel->getSheet($i); 
			$allColumn = CommonAction::ExcelChange($currentSheet->getHighestColumn()); 
			$allRow = $currentSheet->getHighestRow(); 
			$array[$i]["Title"] = $currentSheet->getTitle(); 
			$array[$i]["Cols"] = $allColumn; 
			$array[$i]["Rows"] = $allRow; 
			$arr = array(); 
			for($currentRow = 1 ;$currentRow<=$allRow;$currentRow++){ 
				$row = array(); 
				for($currentColumn=0;$currentColumn<$allColumn;$currentColumn++){ 
					$row[$currentColumn] = $currentSheet->getCellByColumnAndRow($currentColumn,$currentRow)->getValue(); 
					//$row[$currentColumn] = iconv('utf-8','gb2312',$currentSheet->getCellByColumnAndRow($currentColumn,$currentRow)->getValue()); 
				} 
				$arr[$currentRow] = $row; 
			} 
			$array[$i]["Content"] = $arr; 
		} 
		spl_autoload_register(array('Think','autoload'));//必须的，不然ThinkPHP和PHPExcel会冲突 
		unset($currentSheet); 
		unset($PHPReader); 
		unset($PHPExcel); 
		//unlink($file); 
		return array("error"=>0,"data"=>$array);
    }

	protected function ExcelChange($str){//配合Execl批量导入的函数 
		$len = strlen($str)-1; 
		$num = 0; 
		for($i=$len;$i>=0;$i--){ 
			$num += (ord($str[$i]) - 64)*pow(26,$len-$i); 
		} 
		return $num; 
	} 

}