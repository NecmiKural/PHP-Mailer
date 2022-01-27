<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $datae = array();
            $datae[] = array(
                'Name' => $_POST['name'],
                //'Branch' => $_POST['branch'],
                //'College' => $_POST['college'],
            );
            $datae= array_unique($datae);

        $name = "gfg";
        $file_name = $name . '.json';
        $dosya = 'gfg.json';

        if (file_exists($dosya)) {
            
        $inp = file_get_contents('gfg.json');
        $tempArray = json_decode($inp);
        
        
        array_unique(array_push($tempArray, $datae));
        //$tempArray= array_unique($tempArray);
        $jsonData = json_encode($tempArray);
        file_put_contents('gfg.json', $jsonData);
        header('Location: http://bestenbeauty.com/'); exit();
        
        } else {
        //$datae= array_unique($datae);
        $datae = json_encode($datae);
        header('Location: http://bestenbeauty.com/'); exit();
        
            if(file_put_contents(
                "$file_name", $datae)) {
                // echo $file_name .' file created';
                header('Location: http://bestenbeauty.com/'); exit();
                }
            else {
                // echo 'There is some error';
                header('Location: http://bestenbeauty.com/'); exit();
        }
        }

    }
?>