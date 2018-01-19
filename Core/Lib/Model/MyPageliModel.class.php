<?php 

/**
 * 分页模型
 *
 */
class MyPageliModel extends Model {

    public function Pageli($url,$total=0,$psize=12,$pageid=0,$halfPage=5)
    {
        if(empty($psize))
        {
            $psize = 12;
        }
        #[添加链接随机数]
        if(strpos($url,"?") === false)
        {
            $url = $url."?pagelir=noc";
        }
        #[共有页数]
        $totalPage = intval($total/$psize);
        if($total%$psize)
        {
            $totalPage++;#[判断是否存余，如存，则加一
        }
        #[如果分页总数为1或0时，不显示]
        if($totalPage<2)
        {
            //return false;
        }
        #[判断分页ID是否存在]
        if(empty($pageid))
        {
            $pageid = 1;
        }
        #[判断如果分页ID超过总页数时]
        if($pageid > $totalPage)
        {
            $pageid = $totalPage;
        }
        #[Html]
        $array_m = 0;
        if($pageid > 1 && $totalPage > 1)
        {
            $returnlist[$array_m]["url"] = $url;
            $returnlist[$array_m]["name"] = "首 页";
            $returnlist[$array_m]["status"] = 2;

            $array_m++;
            $returnlist[$array_m]["url"] = $url."&p=".($pageid-1);
            $returnlist[$array_m]["name"] = "&lt; 上一页";
            $returnlist[$array_m]["status"] = 4;
        }
        #[添加中间项]
        for($i=$pageid-$halfPage,$i>0 || $i=0,$j=$pageid+$halfPage,$j<$totalPage || $j=$totalPage;$i<$j;$i++)
        {
            $l = $i + 1;
            $array_m++;
            $returnlist[$array_m]["url"] = $url."&p=".$l;
            $returnlist[$array_m]["name"] = $l;
            $returnlist[$array_m]["status"] = ($l == $pageid) ? 1 : 0;
        }
        #[添加select里的中间项]
        for($i=$pageid-$halfPage*100,$i>0 || $i=0,$j=$pageid+$halfPage*100,$j<$totalPage || $j=$totalPage;$i<$j;$i++)
        {
            $l = $i + 1;
            $select_option_msg = "<option value='".$l."'";
            if($l == $pageid)
            {
                $select_option_msg .= " selected";
            }
            $select_option_msg .= ">&nbsp;".$l."&nbsp;</option>";
            $select_option[] = $select_option_msg;
        }
        #[添加尾项]
        if($pageid < $totalPage)
        {
            $array_m++;
            $returnlist[$array_m]["url"] = $url."&p=".($pageid+1);
            $returnlist[$array_m]["name"] = "下一页 &gt;";
            $returnlist[$array_m]["status"] = 4;
        }
        $array_m++;
        if($pageid != $totalPage)
        {
            $returnlist[$array_m]["url"] = $url."&p=".$totalPage;
            $returnlist[$array_m]["name"] = "尾 页";
            $returnlist[$array_m]["status"] = 2;
        }
        #[组织样式]
        $msg = "<div class=\"pageli\"><ul><li class=\"to\">共 ".$totalPage." 页</li>";
        if($returnlist)
        {
            foreach($returnlist AS $key=>$value)
            {
                switch($value["status"])
                {
                    case 1:
                        $msg .= "<li class=\"on\"><a href='".$value["url"]."'>".$value["name"]."</a></li>";
                        break;
                    case 2:
                        $msg .= "<li class=\"fila\"><a href='".$value["url"]."'>".$value["name"]."</a></li>";
                        break;
                    case 3:
                        $msg .= "<li class=\"bt_on\"><a href='".$value["url"]."'>".$value["name"]."</a></li>";
                        break;
                    case 4:
                        $msg .= "<li class=\"\"><a href='".$value["url"]."'>".$value["name"]."</a></li>";
                        break;
                    default:
                        $msg .= "<li><a href='".$value["url"]."'>".$value["name"]."</a></li>";
                }
            }
            //$msg .= "<li class=\"se\"><select onchange=\"top.location='".$url."&pageid='+this.value;\">".implode("",$select_option)."</option></select></li>";
        }
        $msg .= "</ul></div>";
        unset($returnlist);
        return $msg;
    }
}