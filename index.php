<?php
    include('data.php');
    $con = mysqli_connect('localhost', 'root', 'mau0954010058', 'crawler_test');
    // $con->set_charset("utf8");
    // echo '<pre>';
    // print_r($data);
    foreach ($data as $key => $value) {
        $url = $value[data][link];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $html = curl_exec($ch);
        $html = str_replace('
', '', $html);
        preg_match_all('#<article class="content_detail fck_detail width_common block_ads_connect">(.*)</p>	</article>#', $html, $save);
        $data = $value;
        $data['content'] = $save[0][0];
        saveData($data, $con);
        // break; //xoá chữ break này để nó chạy tất cả
    }
        // echo '<pre>';
        // print_r($data);

    
    function saveData($data, $con) {
        $title = $data['data']['title'];
        $img = $data['data']['image'];
        $description = $data['data']['description'];
        $content = $data['content'];
        $source = $data['data']['link'];

        
        $insert_new = "insert into news (title, img, description, content, source) values ('$title', '$img', '$description', '$content', '$source')";
        
        $a = mysqli_query($con, $insert_new);
        echo $insert_new;
        echo $a;
    }
?>