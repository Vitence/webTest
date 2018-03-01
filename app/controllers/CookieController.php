<?php
class CookieController extends ControllerBase {
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }
    public function indexAction(){
        $this->view->disableLevel(\Phalcon\Mvc\View::LEVEL_ACTION_VIEW);
        $cookie = $_GET['mycookie'];
        if($cookie != ''){
            $user = json_decode(base64_decode($cookie),true);
            if(!empty($user)){
                $user = ExUsers::itemById($user['id']);
                if(!empty($user)){
                    setcookie('EXCHANGE',base64_encode(json_encode($user)),time()+60*60,'/','zdatacen.com');
                }else{
                    setcookie('EXCHANGE','',time()-60*60,'/','zdatacen.com');
                }
            }else{
                setcookie('EXCHANGE','',time()-60*60,'/','zdatacen.com');
            }
        }else{
            setcookie('EXCHANGE','',time()-60*60,'/','zdatacen.com');
        }
    }
}