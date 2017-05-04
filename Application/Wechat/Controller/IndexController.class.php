<?php
/**
 * 微信控制器
 */
namespace Wechat\Controller;
use Think\Controller;
use Common\Model\Wechat;

class IndexController extends Controller{
    public function index(){

        $options = C('Wechat');
        $weObj = new Wechat($options); //创建实例对象
        //认证
         $weObj->valid();
        $type = $weObj->getRev()->getRevType();

        //获取接收信息的类型
        switch($type){
            case Wechat::MSGTYPE_TEXT :
                $message = trim($weObj->getRevContent());
                //抽奖
                if(strpos($message,'新驰抽奖') !== false){
                    //实例化各模型
                    //活动记录
                    $partake_model = D('Partake');
                    $business_model = D('Business');
                    $activity_model = D('Activity');

                    //先检测是否抽过奖
                    $open_id = $weObj->getRevFrom();
                    $user_info = $weObj->getUserInfo($open_id);
                    $user_name = $user_info['nickname'];

                    $partake_data = $partake_model->where(array('open_id' => $open_id, 'is_partake' => '1' ))->find();
                    if($partake_data['id'] && $partake_data['id'] > 0){
                        $weObj->text("您好，你已参与过本次抽奖,\n凭车牌号".$partake_data['voucher']."到新驰汽修门店即可兑奖。\n门店地址：奉贤区八字桥路475-479号(奉贤工业中专对面)，获取更多优惠和资讯请点击公众号下方菜单栏!")->reply();
                        exit;
                    }

                    //如果该用户没有参与过
                    $message = str_replace(' ', '', $message);
                    $preg ='/[京津冀晋蒙辽吉黑沪苏浙皖闽赣鲁豫鄂湘粤桂琼渝川贵云藏陕甘青宁新]{1}[A-Za-z]{1}[A-Za-z_0-9]{5}$/iu';
                    if(preg_match($preg,$message,$array)){
                        $plate_number = strtoupper($array[0]);
                        //判断该车牌号码是否参与过
                        $partake_data = $partake_model->where(array('voucher' => $plate_number, 'is_partake' => '1' ))->find();
                        if($partake_data['id'] && $partake_data['id'] > 0){
                            $weObj->text("您好，你已参与过本次抽奖,\n凭车牌号".$partake_data['voucher']."到新驰汽修门店即可兑奖。\n门店地址：奉贤区八字桥路475-479号(奉贤工业中专对面)，获取更多优惠和资讯请点击公众号下方菜单栏!")->reply();
                            exit;
                        }

                        //先判断奖池情况，是否还剩有机油的奖券
                        $oil_num = $partake_model->where(array('activity_id' => '1', 'result' => '泰莫斯机油一桶'))->count();
                        if($oil_num >= 3){
                            //直接送洗车卷
                            $partake_model->add(array('open_id' => $open_id,
                                                      'user_name' => $user_name,
                                                      'activity_id' => 1,
                                                        'business_id' => 1,
                                                        'is_partake' => 1,
                                                        'is_win' => 1,
                                                        'result' => '免费洗车券一张',
                                                        'voucher' => $plate_number,
                                                    ));

                            //参与并直接获奖 更新商家及活动信息
                            $business_model->where(array('user_id' => '1'))->setInc('partake_count');
                            $business_model->where(array('user_id' => '1'))->setInc('win_count');
                            $activity_model->where(array('activity_id' => '1'))->setInc('partake_count');
                            $activity_model->where(array('activity_id' => '1'))->setInc('win_count');
                            $weObj->text("恭喜您，抽中免费洗车券一张!\n凭车牌号{$plate_number}\n到新驰汽修门店即可兑奖。\n门店地址：奉贤区八字桥路475-479号(奉贤工业中专对面)，获取更多优惠和资讯请点击公众号下方菜单栏！")->reply();
                            exit;
                        }else{
                            //概率抽机油，没中送洗车券
                            $oil_probability =  mt_rand(1,500);
                            if($oil_probability == 8){
                                $partake_model->add(array('open_id' => $open_id,
                                    'user_name' => $user_name,
                                    'activity_id' => 1,
                                    'business_id' => 1,
                                    'is_partake' => 1,
                                    'is_win' => 1,
                                    'result' => '泰莫斯机油一桶',
                                    'voucher' => $plate_number,
                                ));
                                //参与并直接获奖 更新商家及活动信息
                                $business_model->where(array('user_id' => '1'))->setInc('partake_count');
                                $business_model->where(array('user_id' => '1'))->setInc('win_count');
                                $activity_model->where(array('activity_id' => '1'))->setInc('partake_count');
                                $activity_model->where(array('activity_id' => '1'))->setInc('win_count');

                                $weObj->text("恭喜您，抽中泰莫斯机油一桶!\n凭车牌号{$plate_number}\n到新驰汽修门店即可兑奖。\n门店地址：奉贤区八字桥路475-479号(奉贤工业中专对面)，获取更多优惠和资讯请点击公众号下方菜单栏！")->reply();
                                exit;
                            }else{
                                $partake_model->add(array('open_id' => $open_id,
                                    'user_name' => $user_name,
                                    'activity_id' => 1,
                                    'business_id' => 1,
                                    'is_partake' => 1,
                                    'is_win' => 1,
                                    'result' => '免费洗车券一张',
                                    'voucher' => $plate_number,
                                ));

                                //参与并直接获奖 更新商家及活动信息
                                $business_model->where(array('user_id' => '1'))->setInc('partake_count');
                                $business_model->where(array('user_id' => '1'))->setInc('win_count');
                                $activity_model->where(array('activity_id' => '1'))->setInc('partake_count');
                                $activity_model->where(array('activity_id' => '1'))->setInc('win_count');

                                $weObj->text("恭喜您，抽中免费洗车券一张!\n凭车牌号{$plate_number}\n到新驰汽修门店即可兑奖。\n门店地址：奉贤区八字桥路475-479号(奉贤工业中专对面)，获取更多优惠和资讯请点击公众号下方菜单栏！")->reply();
                                exit;
                            }
                        }

                    }else{
                        $weObj->text("您的车牌号码可能输入有误，请输入“新驰抽奖+您的车牌号”，\n如“新驰抽奖 沪C12345”进行抽奖。")->reply();
                        exit;
                    }
                }


        }
    }
}
