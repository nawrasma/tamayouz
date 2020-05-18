<?php
use Carbon\Carbon;


function flash($message)
{
	return session()->flash('message',$message);
}

function getNumItemsByAttribute($items,$attribute,$requiredVal){
	$numberOfItems=0;
	foreach ($items as  $item) {
		if($item->$attribute == $requiredVal)
			$numberOfItems +=1;		
	}
	return $numberOfItems;
}

function getNumItemsByAllAttributeArray($items,$attribute,$requiredVAlArray,$requiredValIndex)
{
	$numberOfItemsArr[][]=null;
	foreach ($requiredVAlArray as $key => $value) {
		$numberOfItemsArr[$key][0]=$value->$requiredValIndex;
		$numberOfItemsArr[$key][1]=getNumItemsByAttribute($items,$attribute,$value->$requiredValIndex);
	}
	return $numberOfItemsArr;
}



function getDifferenceDate($startDate,$finishDate){
	$sDate=Carbon::parse($startDate);
	$fDate=Carbon::parse($finishDate);
    $diff=$fDate->diff($sDate)->format('%a,%h,%i,%s');
    $dateParts=explode(',',$diff);
    if($dateParts[0]!=='0')
    	return $dateParts[0]." days ago";
    elseif ($dateParts[1]!=='0')
    	return $dateParts[1]." hours ago";
    elseif ($dateParts[2]!=='0')
    	return $dateParts[2]." minutes ago";
    elseif ($dateParts[3]!=='0')
    	return $dateParts[3]." seconds ago";
    else
    	return 'now';

}


function saveLoadedFile($folderName,$requiredFile){
	if($requiredFile){
            $file=$requiredFile;
            $file_name=time().$file->getClientOriginalName();
            $file->move($folderName,$file_name);
            return $file_name;
        }
        return 0;
}

?>