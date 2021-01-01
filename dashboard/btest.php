<?php   
    $file="./_bundles";
    function list_file($date){
        //1、首先先读取文件夹
        $temp=scandir($date);
        //遍历文件夹
        foreach($temp as $v){
            $a=$date.'/'.$v;
           if(is_dir($a)){//如果是文件夹则执行
          
               if($v=='.' || $v=='..'){//判断是否为系统隐藏的文件.和..  如果是则跳过否则就继续往下走，防止无限循环再这里。
                   continue;
               }
             
               list_file($a);//因为是文件夹所以再次调用自己这个函数，把这个文件夹下的文件遍历出来
           }else{
            echo $a,"<br/>";
           }
          
        }
    }
    list_file($file);