<?php
$tab=array(1,5,10,4,5,13,13,2,13,7,6,5,14,7,5,12,6,9,12,13,0,7,8,14,1,0,3,11,4,3,5,13,0,12,7,9,7,2,0,9,11,11,4,11,6,14,1,6,5,0,13,1,1,5,1,6,10,9,5,13,9,4,0,1,4,1,6,3,4,4,10,6,9,4,5,14,13,2,14,5,6,6,0,3,5,5,3,3,0,8,2,
7,6,12,6,6,9,14,1,8,5,0,3,3,3,10,10,4,13,9,1,8,1,14,13,7,6,7,9,3,13,14,10,3,4,12,0,2,9,9,12,11,3,6,7,5,0,4,2,7);
$i=928316;
$lotto = "7921817649";
function x($wejscie,$haszt)
{	
	$ia=928316;
	$check = array_fill(0,139,0);
	$lotto = "7921817649";
	$time = rand(1000000000, 9999999999);
	$no_hash = $time.rand(1,100).rand(1,10000).rand(1,10000000);
	$server_seed = hash('sha256', $no_hash);
	if($wejscie==1)
	{
		return $server_seed;
	}
	if($wejscie==2)
	{
		for($spr=0;$spr<140;$spr++)
		{
			$hash2 = hash("sha256", "$haszt" . "-" . $lotto . "-" . "$ia");
			$check[$spr]+=1;
			$ia=$ia+1;
			return $check;
		}
		
	}
}
for(;;)
{
	$xd=x(1,0);
	$hash = hash("sha256", "$xd" . "-" . $lotto . "-" . "$i");
	for($seed_check=0;$seed_check<1089;$seed_check++)
	{
		if((hexdec(substr($hash, 0, 8)) % 15)==$tab[$seed_check]);
        {
			$wynik=x(2,$xd);
			if($wynik[139]==1)
			{
				echo "wlaszciwy seed to $xd";
				break;
			}
		}
        if((hexdec(substr($hash, 0, 8)) % 15)!=$tab[$seed_check]);
        {
			$i=916069;
			break 1;
        }
	}

}
?>