<?php
namespace Common\Model;
use Think\Model;

/**
 * Class CollectModel
 * @package Common\Model
 * 采集模型
 */
class CollectModel extends Model{
    /**
     * 采集成功
     */
    public function collect($id){
        header("Content-type:text/html;charset=utf-8");
        $collect_info = $this->find($id);
        if($collect_info['collect_id'] == 1){
            $content = file_get_contents($collect_info['url']);
            preg_match('/<div class="cp_body_left">(.*)<span class="authors_copy_right">/iUs', $content,$array);
            $content = strip_tags($array[1],'<img>');
            //下载图片
            $this->loadImages($content);
            //把图片路径全部改成 文件存在的路径
            $content = preg_replace('/src="http:\/\/(.*)\/([^\/]*)"/iUs', 'src="/Public/KindEditor/image/'.date('Ymd',time()).'/\2"',$content);
            $data = array('title' => $collect_info['title'],
                        'cate_id' => $collect_info['cate_id'],
                        'content' => $content,
                        'newstime' => date('Y-m-d',time()),
                        'author' => D('User')->where(array('user_id' => session('user_id')))->getField('nickname'),
                        'status' => '0'
            );
            $article_model = D('Article');
            $result = $article_model->add($data);
        }

        //如果数据采集成功, 删掉采集表的信息
        if($result){
            $this->delete($id);
            return true;
        }else{
            return false;
        }






    }

    /**
     * 下载图片并且存放到 自定目录下  /Public/KindEditor/image/20170515
     * @param string $content 采集的内容
     */
    public function loadImages($content){
        //先匹配出内容中的图片
        preg_match_all('/src="(.*)"/iUs', $content, $array);
        $arr_images = $array[1];
        foreach($arr_images as $val){
            $this->getImage($val);
        }
    }

    /**
     * 下载保存图片
     * @param $url  图片url
     * @param string $save_dir
     * @param string $filename
     * @param int $type
     * @return array|bool
     */
    public function getImage($url,$save_dir='',$filename='',$type=0){
        if(trim($url) == ''){
            return false;
        }

        if(trim($save_dir) == ''){
            $save_dir='./Public/KindEditor/image/'.date('Ymd', time().'/');
        }

        if(trim($filename)==''){//保存文件名
            $filename = strrchr($url,'/');
        }

        //创建保存目录
        if(!file_exists($save_dir)) mkdir($save_dir,0777,true);

        //获取远程文件所采用的方法
        if($type){
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
            $img = curl_exec($ch);
            curl_close($ch);
        }else{
            ob_start();
            readfile($url);
            $img = ob_get_contents();
            ob_end_clean();
        }
        //文件大小
        $fp2= @fopen($save_dir.$filename,'a');
        fwrite($fp2,$img);
        fclose($fp2);
        unset($img,$url);
        return true;
    }



}