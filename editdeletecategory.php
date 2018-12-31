<?php
include('inc_session.php');
include('function.php');
if(isset($_GET['id'])&&isset($_GET['action']))
{
    //do something
    $id=$_GET['id'];
    $action=$_GET['action'];
        if($action=='edit')
        {
            editcategory($id);
            //echo "edit";
        }
        elseif($action=='delete')
        {
        	$res=deleteCategory($id);
        	if($res==1)
        	{
            	header("Location: allcategories.php?message='Delete success'");
        	}
        	else
        	{
            	header("Location: allcategories.php?message='Delete fail'");
        	}
    	}
    	else
    	{
        	header("Location: allcategories.php");
    	}
}
else
{
    header("Location: allcategories.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit or Delete</title>
</head>
<body>

</body>
</html>