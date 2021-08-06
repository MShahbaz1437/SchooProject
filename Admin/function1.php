<?php
class connectioninfo
{
	private $con=null;
	function __construct()
	{
		$this->con=mysql_connect("localhost","root","");
		mysql_select_db("school",$this->con);
	}
	function executequery($qry)
	{
		$status="";
		$rs=mysql_query($qry,$this->con);
		if($rs)
		{
			$status="Success";
		}
		else
		{
			$status="Fail";
		}
	}
	function readrecord($qry)
	{
		$rs=mysql_query($qry,$this->con);
		return $rs;
	}
	function table($qry,$pagename,$colname,$index)
	{
		$status="";
		$rs=mysql_query($qry,$this->con);
		$status.="<table>";
		if(mysql_num_rows($rs)>0)
		{
			$status.="<tr>";
		  $colcount=mysql_num_fields($rs);
				for($p=0;$p<$colcount;$p++)
				{
					$status.="<th>".mysql_num_fields($rs,$p)."</th>";
				}
				$status.="<th>".mysql_num_fields($rs,$p)."</th>";
			$status.="</tr>";
			$status.="<tr>";
				for($p=0;$p<$colcount;$p++)
				{
					$status.="<td>".mysql_field_name($rs,$p)."</td>";
				}
					$status.="<td>".mysql_field_name($rs,$p)."</td>";
					$status.="<td><a href='$pagename?urlname=$row[$index]'>$colname</a></td>";
			$status.="</tr>";
		}
			$status.="</table>";
	}
}
?>