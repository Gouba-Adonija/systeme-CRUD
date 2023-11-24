<?php
$file='user_data.json';
$datas=file_get_contents($file);
$datas=json_decode($datas);
foreach($datas as $data){
    if($data -> id == $id){
?>
    <table>
        <thead>
            <tr>
                <th>extension</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Website</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
        
<?php                   
            if(isset($data -> extension)){
                echo  "<td><img src='images\\".$data -> extension."' width='85px'></td>";
                
            }else{
                echo  "<td></td>";
            }
            echo  "<td>".$data -> username."</td>";
            echo  "<td>".$data -> email."</td>";
            echo  "<td>".$data -> phone."</td>";
            echo  "<td>".$data -> website."</td>";
            echo  "<td>".$data -> name."</td>";
                
    }        
        echo '</tr>
            </tbody>
        </table> '; 
}
