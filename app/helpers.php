<?php



function flash($message)
{
	return session()->flash('message',$message);
}



?>