<?php
 function read_all_dir ( $dir )
    {
        $result = array();
        $handle = opendir($dir);
        if ( $handle )
        {
            while ( ( $file = readdir ( $handle ) ) !== false )
            {
                if ( $file != '.' && $file != '..')
                {
                    $cur_path = $dir . DIRECTORY_SEPARATOR . $file;
                    if ( is_dir ( $cur_path ) )
                    {
                        $result['dir'][$cur_path] = read_all_dir ( $cur_path );
                    }
                    else
                    {
                    	//广告删除开始
                    //	var_dump($cur_path);

                    	if($cur_path==$dir."\\12358.png"){
                    		$res=unlink($cur_path);
                    		if($res){
                    			echo "删除成功<br/>";
                    		}
                    	}
                    	if($cur_path==$dir."\\源码说明_.txt"){
                    		$res=unlink($cur_path);
                    		if($res){
                    			echo "删除成功<br/>";
                    		}
                    	}
                    		if($cur_path==$dir."\\logo2.png"){
                    		$res=unlink($cur_path);
                    		if($res){
                    			echo "删除成功<br/>";
                    		}
                    	}
                    	if(preg_match('/.*\.url/',$cur_path)){
                    		echo "删除成功<br/>";
                    		unlink($cur_path);
                    	}
                    	if(preg_match('/.*\.lnk/',$cur_path)){
                    		echo "删除成功<br/>";
                    		unlink($cur_path);
                    	}
                    	 	if(preg_match('/.*_\.txt/',$cur_path)){
                    		echo "删除成功<br/>";
                    		unlink($cur_path);
                    	}
                    	/*广告删除结束*/
                        $result['file'][] = $cur_path;
                    }
                }
            }
            closedir($handle);
        }
        return $result;
    }
    //print_r(read_all_dir('./'));
    read_all_dir('./');
