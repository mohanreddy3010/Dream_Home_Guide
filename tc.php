<html> 



<?php
include_once('connect.php');
$area=$_GET['area'];
$nof=$_GET['nof'];

//water tank
$wt=$_GET['litres'];
$wtc=$wt*6;


//cement
$a=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='CEM'");
$my_array1=mysqli_fetch_assoc($a);
$hc=$my_array1['Type1'];
$b=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='CEM'");
$my_array2=mysqli_fetch_assoc($b);
$mc=$my_array2['Type2'];
$c=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='CEM'");
$my_array3=mysqli_fetch_assoc($c);
$lc=$my_array3['Type3'];
$c=$_GET['cement'];
if(strval($c)=='High'){
#echo "CEMENT :<br>";
#echo "Total bags : ".($area*0.45*$nof);
#echo "<br>Total cost : ".($area*0.45*$hc*$nof);
$ficem=($area*0.45*$hc*$nof);
}
elseif(strval($c)=='Medium')
{
#echo "CEMENT :<br>";
#echo "Total bags: ".($area*0.45*$nof);
#echo "<br>Total cost : ".($area*0.45*$mc*$nof);
$ficem=($area*0.45*$mc*$nof);
}
else{
#echo "CEMENT :<br>"	;
#echo "Total bags : ".($area*0.45*$nof);
#echo "<br>Totalcost : ".($area*0.45*$lc*$nof);
$ficem=($area*0.45*$lc*$nof);
}




//steel
$s1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='STE'");
$my_arrs1=mysqli_fetch_assoc($s1);
$hs=$my_arrs1['Type1'];
$s2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='STE'");
$my_arrs2=mysqli_fetch_assoc($s2);
$ms=$my_arrs2['Type2'];
$s=$_GET['steel'];
if(strval($s)=='High'){
#echo "<br>STEEL :<br>";
#echo "Total kgs : ".($area*2.5*$nof);
#echo "<br>Total cost : ".($area*2.5*$hs*$nof);
$fiste=($area*2.5*$hs*$nof);
}
else
{
#echo "<br>STEEL:<br>";
#echo "Total kgs: ".($area*2.5*$nof);
#echo "<br>Total cost : ".($area*2.5*$ms*$nof);
$fiste=($area*2.5*$ms*$nof);
}


//sand
$sand1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='SAN'");
$arr_sand=mysqli_fetch_assoc($sand1);
$hsand=$arr_sand['Type1'];
#echo "<br> SAND :<br>";
#echo " Total Cost (for cfts): ".($area*2*$hsand*$nof); 
$fisan=($area*2*$hsand*$nof);



//aggregate
$a1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='AGR'");
$my_arr1=mysqli_fetch_assoc($a1);
$h_agg=$my_arr1['Type1'];
#echo "<br>AGGREGATE :<br>"	;
#echo "Total cost : ".($area*1.5*$nof*$h_agg);
$fiagg=($area*1.5*$nof*$h_agg);



//brick
$b1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='BRI'");
$bri_arr1=mysqli_fetch_assoc($b1);
$hb=$bri_arr1['Type1'];
$b2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='BRI'");
$bri_arr2=mysqli_fetch_assoc($b2);
$mb=$bri_arr2['Type2'];
$b3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='BRI'");
$bri_arr3=mysqli_fetch_assoc($b3);
$lb=$bri_arr3['Type3'];
$br=$_GET['brick'];
if(strval($br)=='High'){
#echo "<br>BRICK :<br>";
#echo "Total number of bricks : ".($area*20*$nof);
#echo "<br>Total cost : ".($area*20*$hb*$nof);
$fibri=($area*20*$hb*$nof);
}
elseif(strval($br)=='Medium')
{
#echo "<br>BRICK :<br>";
#echo "Total number of bricks: ".($area*20*$nof);
#echo "<br>Total cost : ".($area*20*$mb*$nof);
$fibri=($area*20*$mb*$nof);
}
else{
#echo "<br>BRICK:<br>"	;
#echo "Total number of bricks : ".($area*20*$nof);
#echo "<br>Totalcost : ".($area*20*$lb*$nof);
$fibri=($area*20*$lb*$nof);
}


//labour rate
#echo "<br> LABOUR RATE PER PERSON (APPROX) : 270 rs.(minimum)";
$lbc=$area*270;


//ceramics
$cer1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='CER'");
$cer_arr1=mysqli_fetch_assoc($cer1);
$hcer=$cer_arr1['Type1'];

$cer2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='CER'");
$cer_arr2=mysqli_fetch_assoc($cer2);
$mcer=$cer_arr2['Type2'];

$ceramic=$_GET['ceremics'];
if(strval($ceramic)=='High'){
#echo "<br>CERAMIC :";
#echo "<br>Total cost : ".($area*30*$hcer*$nof);
$ficer=($area*30*$hcer*$nof);
}
else
{
#echo "<br>CERAMIC:";
#echo "<br>Total cost : ".($area*20*$mcer*$nof);
$ficer=($area*30*$mcer*$nof);
}


//electrification
$e1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='ELEC'");
$ele_arr1=mysqli_fetch_assoc($e1);
$hele=$ele_arr1['Type1'];

$e2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='ELEC'");
$ele_arr1=mysqli_fetch_assoc($e2);
$mele=$ele_arr1['Type2'];

$e3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='ELEC'");
$ele_arr1=mysqli_fetch_assoc($e3);
$lele=$ele_arr1['Type3'];

$elect=$_GET['electrification'];
if(strval($elect)=='High'){
#echo "<br>ELECTRIFICATION:";
#echo "<br>Total cost : ".($hele*$nof);
$fiele=($hele*$nof);
}
elseif(strval($elect)=='Medium')
{
#echo "ELECTRIFICATION :";
#echo "<br>Total cost : ".($mele*$nof);
$fiele=($mele*$nof);
}
else{
#echo "ELECTRIFICATION:"	;
#echo "<br>Totalcost : ".($lele*$nof);
$fiele=($lele*$nof);
}


//foreceiling
$f1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='FCEIL'");
$fore_arr1=mysqli_fetch_assoc($f1);
$hfore=$fore_arr1['Type1'];

$f2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='FCEIL'");
$fore_arr2=mysqli_fetch_assoc($f2);
$mfore=$fore_arr2['Type2'];

$f3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='FCEIL'");
$fore_arr3=mysqli_fetch_assoc($f3);
$lfore=$fore_arr3['Type3'];

$fore=$_GET['fceil'];
if(strval($fore)=='High'){
#echo "<br>FORE CEILING:";
#echo "<br>Total cost : ".(0.6*$area*$hfore*$nof);
$fifor=(0.6*$area*$hfore*$nof);
}
elseif(strval($fore)=='Medium')
{
#echo "<br>FORE CEILING:";
#echo "<br>Total cost : ".(0.6*$area*$mfore*$nof);
$fifor=(0.6*$area*$mfore*$nof);
}
else{
#echo "<br>FORE CEILING:"	;
#echo "<br>Totalcost : ".(0.6*$area*$lfore*$nof);
$fifor=(0.6*$area*$lfore*$nof);
}


//granite
$g1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='GRAN'");
$gra_arr1=mysqli_fetch_assoc($g1);
$hgra=$gra_arr1['Type1'];

$g2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='GRAN'");
$gra_arr2=mysqli_fetch_assoc($g2);
$mgra=$gra_arr2['Type2'];

$g3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='GRAN'");
$gra_arr3=mysqli_fetch_assoc($g3);
$lgra=$gra_arr3['Type3'];

$granite=$_GET['granite'];
if(strval($granite)=='High'){
#echo "<br>GRANITE";
#echo "<br>Total cost : ".(19*$hgra*$nof);
$figra=(19*$hgra*$nof);
}
elseif(strval($granite)=='Medium')
{
#echo "<br>GRANITE :";
#echo "<br>Total cost : ".(19*$mgra*$nof);
$figra=(19*$mgra*$nof);
}
else{
#echo "<br>GRANITE:"	;
#echo "<br>Totalcost : ".(19*$lgra*$nof);
$figra=(19*$lgra*$nof);
}


//kotastones
$k1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='KOTS'");
$kota_arr1=mysqli_fetch_assoc($k1);
$hkota=$kota_arr1['Type1'];

#echo "<br>KOTA STONES:";
#echo "<br>Total cost : ".($area*$hkota*$nof);
$fikot=($area*$hkota*$nof);


//marbles
$m1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='MAR'");
$mar_arr1=mysqli_fetch_assoc($m1);
$hmar=$mar_arr1['Type1'];

$m2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='MAR'");
$mar_arr1=mysqli_fetch_assoc($m2);
$mmar=$mar_arr1['Type2'];

$m3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='MAR'");
$mar_arr1=mysqli_fetch_assoc($m3);
$lmar=$mar_arr1['Type3'];

$marbles=$_GET['marble'];
if(strval($marbles)=='High'){
#echo "<br>MARBLES:";
#echo "<br>Total cost : ".($area*$hmar*$nof);
$fimar=($area*$hmar*$nof);
}
elseif(strval($marbles)=='Medium')
{
#echo "MARBLES :";
#echo "<br>Total cost : ".($area*$mmar*$nof);
$fimar=($area*$mmar*$nof);
}
else{
#echo "MARBLES:"	;
#echo "<br>Totalcost : ".($area*$lmar*$nof);
$fimar=($area*$lmar*$nof);
}

//painting

$p1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='PAINT'");
$paint_arr1=mysqli_fetch_assoc($p1);
$hpaint=$paint_arr1['Type1'];

$p2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='PAINT'");
$paint_arr1=mysqli_fetch_assoc($p2);
$mpaint=$paint_arr1['Type2'];

$p3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='PAINT'");
$paint_arr1=mysqli_fetch_assoc($p3);
$lpaint=$paint_arr1['Type3'];

$painting=$_GET['paint'];
if(strval($painting)=='High'){
#echo "<br>PAINTING:";
#echo "<br>Total cost : ".($area*$hpaint*$nof);
$fipaint=($area*$hpaint*$nof);
}
elseif(strval($painting)=='Medium')
{
#echo "PAINTING :";
#echo "<br>Total cost : ".($area*$mpaint*$nof);
$fipaint=($area*$mpaint*$nof);
}
else{
#echo "PAINTING :"	;
#echo "<br>Totalcost : ".($area*$lpaint*$nof);
$fipaint=($area*$lpaint*$nof);
}

//plumbing

#echo"<br>PLUMBING :";
#echo"<br> Totalcost :".($nof*30000);
$fiplumbing=($nof*30000);



//rooms code
if($area<'1000'){
	$bedroom = 1;
	$kitchen=1;
	$hall=1;
	$windows=3;
	$totalroom=$bedroom+$kitchen+$hall;
}
elseif($area>='1000' && $area <='2000' ){
	$bedroom=2;
	$kitchen=1;
	$hall=1;
	$windows=4;
	$totalroom=$bedroom+$kitchen+$hall;
}
else{
	$bedroom=3;
	$kitchen=1;
	$hall=1;
	$windows=4;
	$totalroom=$bedroom+$kitchen+$hall;
}


//roomdoors
$room1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='RDOO'");
$room_arr1=mysqli_fetch_assoc($room1);
$hroom=$room_arr1['Type1'];

$room2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='RDOO'");
$room_arr1=mysqli_fetch_assoc($room2);
$mroom=$room_arr1['Type2'];

$roomdoors=$_GET['rdoor'];
if(strval($roomdoors)=='High'){
#echo "<br>ROOM DOORS:";
#echo "<br>Total cost : ".($totalroom*$hroom*$nof);
$firoom=($totalroom*$hroom*$nof);
}
elseif(strval($roomdoors)=='Medium')
{
#echo "ROOM DOORS :";
#echo "<br>Total cost : ".($totalroom*$mroom*$nof);
$firoom=($totalroom*$mroom*$nof);
}

//tiles
$tile1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='TIL'");
$tile_arr1=mysqli_fetch_assoc($tile1);
$htile=$tile_arr1['Type1'];

$tile2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='TIL'");
$tile_arr1=mysqli_fetch_assoc($tile2);
$mtile=$tile_arr1['Type2'];

$tile3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='TIL'");
$tile_arr1=mysqli_fetch_assoc($tile3);
$ltile=$tile_arr1['Type3'];

$tiles=$_GET['tile'];
if(strval($tiles)=='High'){
#echo "<br>TILES:";
#echo "<br>Total cost : ".($area*$htile*$nof);
$fitiles=($area*$htile*$nof);
}
elseif(strval($tiles)=='Medium')
{
#echo "TILES :";
#echo "<br>Total cost : ".($area*$mtile*$nof);
$fitiles=($area*$mtile*$nof);
}
else{
##echo "TILES :"	;
##echo "<br>Totalcost : ".($area*$ltile*$nof);
$fitiles=($area*$ltile*$nof);
}

//window
$w1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='WIN'");
$window_arr1=mysqli_fetch_assoc($w1);
$hwindow=$window_arr1['Type1'];

$w2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='WIN'");
$window_arr1=mysqli_fetch_assoc($w2);
$mwindow=$window_arr1['Type2'];

$w3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='WIN'");
$window_arr1=mysqli_fetch_assoc($w3);
$lwindow=$window_arr1['Type3'];

$window_s=$_GET['window'];
if(strval($window_s)=='High'){
##echo "<br>WINDOWS:";
##echo "<br>Total cost : ".($windows*$hwindow*$nof);
$fiwindow=($windows*$hwindow*$nof);
}
elseif(strval($window_s)=='Medium')
{
##echo "<br>WINDOWS :";
##echo "<br>Total cost : ".($windows*$mwindow*$nof);
$fiwindow=($windows*$mwindow*$nof);
}
else{
##echo "<br>WINDOWS:"	;
##echo "<br>Totalcost : ".($windows*$lwindow*$nof);
$fiwindow=($windows*$lwindow*$nof);
}


//main door
$mdoor1=mysqli_query($db,"SELECT Type1 FROM mainmaterials WHERE ID='DOO'");
$mdoor_arr1=mysqli_fetch_assoc($mdoor1);
$hmdoor=$mdoor_arr1['Type1'];

$mdoor2=mysqli_query($db,"SELECT Type2 FROM mainmaterials WHERE ID='DOO'");
$mdoor_arr1=mysqli_fetch_assoc($mdoor2);
$mmdoor=$mdoor_arr1['Type2'];

$mdoor3=mysqli_query($db,"SELECT Type3 FROM mainmaterials WHERE ID='DOO'");
$mdoor_arr1=mysqli_fetch_assoc($mdoor3);
$lmdoor=$mdoor_arr1['Type3'];

$maindoo=$_GET['mdoor'];
if(strval($maindoo)=='High'){
##echo "<br>MAIN DOOR :";
##echo "<br>Total cost : ".($hmdoor);
$fimdoor=($hmdoor);
}
elseif(strval($maindoo)=='Medium')
{
##echo "<br>MAIN DOOR :";
##echo "<br>Total cost : ".($mmdoor);
$fimdoor=($mmdoor);
}
else{
##echo "<br>MAIN DOOR :"	;
##echo "<br>Totalcost : ".($lmdoor);
$fimdoor=($lmdoor);
}





##echo "<br><br>";
$tc=$wtc+$ficem+$fiste+$fiagg+$fimar+$figra+$fifor+$fikot+$fiele+$fibri+$ficer+$fisan+$lbc+$fipaint+$fitiles+$fiwindow+$fitiles+$firoom+$fiplumbing+$fimdoor;
##echo "Total cost to build your home: ",$tc; 

//in indian currency
$tc = moneyFormatIndia($tc);    
function moneyFormatIndia($num){  
    $explrestunits = "" ;  
    if(strlen($num)>3){  
        $lastthree = substr($num, strlen($num)-3, strlen($num));  
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits  
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.  
        $expunit = str_split($restunits, 2);  
        for($i=0; $i < sizeof($expunit);  $i++){  
            // creates each of the 2's group and adds a comma to the end  
            if($i==0)  
            {  
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer  
            }else{  
                $explrestunits .= $expunit[$i].",";  
            }  
        }  
        $thecash = $explrestunits.$lastthree;  
    } else {  
        $thecash = $num;  
    }  
    return $thecash; // writes the final format where $currency is the currency symbol.  
}  


?>


<style>
form{
background-color: rgb(128,128,128);
opacity: 0.8;
position: absolute;
left : 100px;
top : 60px;
right:100px;
font-size: 30px;
font-weight: bold;
padding: 30px;
border-radius: 5%;
}
div.a{
	float: left;
}	
div.b{
	float: right;
	width: 20em;
}
p{
	text-align: center;
	font-size: 50px;
	font-weight: bold;
	color: purple;

}
</style>
<body style="background-color: black;">
<form>
<div class="a">		
Area = <?php echo $area ?><br>
Number of Floors = <?php echo $nof ?><br>
Number of litres of Water Tank = <?php echo $wt ?><br>
Cost of Water Tank = <?php echo $wtc ?><br><br>
CEMENT:<br>
Total bags = <?php echo ($area*0.45*$nof) ?><br>
Total cost = <?php echo $ficem ?><br><br>
STEEL:<br>
Total kgs = <?php echo ($area*2.5*$nof) ?><br>
Total cost = <?php echo $fiste ?><br><br>
SAND:<br>
Total cost (for cfts): <?php echo $fisan ?><br><br>
AGGREGATE:<br>
Total cost = <?php echo $fiagg ?><br><br>
BRICKS:<br>
Total number of bricks = <?php echo ($area*20*$nof) ?><br>
Total cost = <?php echo $fibri ?><br><br>
LABOUR RATE:<br>
Total cost = <?php echo $lbc ?><br><br>
CEREMICS:<br>
Total cost = <?php echo $ficer ?><br><br>
ELECTRIFICATION:<br>
Total cost = <?php echo $fiele ?><br><br>
FORE CEILING:<br>
Total cost = <?php echo $fifor ?><br><br>
</div>
<div class="b">
GRANITE:<br>
Total cost = <?php echo $figra ?><br><br>
KOTA STONES:<br>
Total cost = <?php echo $fikot ?><br><br>
MARBLES:<br>
Total cost = <?php echo $fimar ?><br><br>
PAINTING:<br>
Total cost = <?php echo $fipaint ?><br><br>
PLUMBING:<br>
Total cost = <?php echo $fiplumbing ?><br><br>
ROOM DOORS:<br>
Total cost = <?php echo $firoom ?><br><br>
TILES:<br>
Total cost = <?php echo $fitiles ?><br><br>
WINDOWS:<br>
Total cost = <?php echo $fiwindow ?><br><br>
MAIN DOOR:<br>
Total cost = <?php echo $fimdoor ?><br><br>
ROOMS AS PER AREA:<br>
Total Bedrooms = <?php echo $bedroom ?><br>
Total Kitchens = <?php echo $kitchen ?><br>
Total Halls = <?php echo $hall ?><br>
Total Windows = <?php echo $windows ?><br>
Total number of rooms = <?php echo $totalroom ?><br>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<p>The total cost for the construction of the building = <?php echo $tc ?></p>
</form>

</body>
</html>
