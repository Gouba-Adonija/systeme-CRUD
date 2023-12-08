<style>
    .container{
        display: flex;
         background-color: rgba(13,100,45,0.5);                
        padding: 20px;
    }
    .left{
        margin-right: 10%;
    }
    #nom{
        font-size: 60px;
        margin: 0;
    }
    p{
        font-size: 20px;
    }
    .right{
        display: flex;
        padding: 10px;
    }
    img{
        box-shadow: 1px 1px 1px solid black
    }
    .two{
        margin-left: 100px;
    }
    a{
        text-decoration: none;
    }
</style>

<?php
$file='user_data.json';
$datas=file_get_contents($file);
$datas=json_decode($datas);
foreach($datas as $data){
    if($data -> id == $id){
        // if(isset($data -> extension)){
?>
    <div class="container">
            <div class="left">
                <img src="images\<?=$data -> extension?>" alt="photo de profil" width="200px">
            </div>
            <div class="right">
                <div class="one">
                    <p id="nom"><strong><?=$data -> name?></strong></p>
                    <p><strong><?=$data -> name?></strong></p>
                    <p><?=$data -> email?></p>
                </div>
                <div class="two">
                    <p><a href="tel:<?=$data -> phone?>"></a> </p>
                    <p> <a href=""><?=$data -> website?></a></p>    
                </div>
            </div>
        </div>


        
<?php                      
    }        
}
