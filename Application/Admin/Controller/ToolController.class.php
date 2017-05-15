<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;

class ToolController extends CommonController{
    /**
     * 采集 URl
     */
    public function collectUrl(){
        header("Content-type:text/html;charset=utf-8");
        $collect_model = D('Collect');
        $cate_id = '7'; //美食7
        $origin = '美食杰';
        $collect_id = 1;

        $i = I('get.page');
        if($i > 56) exit('采集完毕');

            //美食杰
            $url = "http://www.meishij.net/chufang/diy/jiangchangcaipu/?&page={$i}";
            $content = file_get_contents($url);
//         echo $content;
            preg_match('/<div class="listtyle1_list clearfix" id="listtyle1_list">(.*)<!-- listtyle1_list end -->/iUs', $content ,$array);
//        print_r($array);
            preg_match_all('/href="(.*)" title="(.*)"/iUs',$array[0], $array_info);
//        print_r($array_info);
            $dataList = array();
            foreach($array_info[1] as $key => $value){
                $dataList[] = array('title' => $array_info[2][$key], 'cate_id' => $cate_id, 'url' => $value, 'origin' => $origin, 'collect_id' => $collect_id);
            }
            $collect_model->addAll($dataList);
            echo "<script>location.href='".U('Tool/collectUrl',array('page' => ++$i))."'</script>";
    }





}