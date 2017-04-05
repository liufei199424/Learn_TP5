<html>
<head>
<title>hello</title>
</head>
<body>
    {$data->id} {$data->data}
    
    {
    	if ($data->id == 1) {
    		echo "可以使用啊\n";
    	} else {
    		echo "不能用啊\n";
    	}
    }
    
    <?php
		echo "<br>" . $data->id . "= = = =" . $data->data;
	?>
</body>
</html>
