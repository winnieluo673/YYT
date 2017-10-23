<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../css/news.css" media="all" />
<title>无标题文档</title>
</head>

<body>
<?php
	//连接数据库的参数  
     $host = "localhost";  
     $user = "root";  
     $pass = "wenny673";  
     $db = "yyt_info";  
     //创建一个mysql连接  
     $connection = mysqli_connect($host, $user, $pass,$db) or die("Unable to connect!");   
     //开始查询  
     $query = "SELECT name FROM inha_info WHERE nickname='{$_SESSION['username']}'"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_row($result)){
			 $uname=$row[0];
		 }
	 }
?>
<blockquote class="layui-elem-quote">
		<div class="layui-inline">
		    <div class="layui-input-inline">
		    	<input type="text" value="" placeholder="请输入关键字" class="layui-input">
		    </div>
		    <a class="layui-btn">查询</a>
		</div>
        </blockquote>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
				<col width="20%">
				<col width="80%">
                 </colgroup>
         <thead>
				<tr>
					<th>项目</th>
					<th>内容</th>
				</tr> 
		    </thead>
<?php
		    //开始查询  
     		$query = "SELECT doc_ID FROM doc_inha WHERE inha_name='{$uname}'"; 
     		//执行SQL语句  
     		$result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 		if(mysqli_num_rows($result)>0){  
         	//如果返回的数据集行数大于0，则开始以表格的形式显示   
         		while($row=mysqli_fetch_row($result)){
					$uID=$row[0];
				}
			}
			
			$query = "SELECT * FROM docter_info WHERE doc_ID='{$uID}'"; 
     		//执行SQL语句  
     		$result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 		if(mysqli_num_rows($result)>0){  
         	//如果返回的数据集行数大于0，则开始以表格的形式显示   
         		while($row=mysqli_fetch_row($result)){
?>
		    <tbody>
			 <tr>
			 <td>医生编号</td><td><?php echo $row[0];?></td>
             </tr>
             <tr>
			 <td>医生姓名</td><td><?php echo $row[1];?></td>
             </tr> 
			 <tr>
			 <td>性别</td><td><?php echo $row[2]?></td>
             </tr>
             <tr>
			 <td>年龄</td><td><?php echo $row[3];?></td>
             </tr>
			 <tr>
			 <td>电话</td><td><?php echo $row[4];?></td>
             </tr>
             <tr>
			 <td>擅长科目</td><td><?php echo $row[5];?></td>
             </tr> 
			 <tr>
			 <td>曾获荣誉</td><td><?php echo $row[6];?></td>
             </tr>
             <tr>
			 <td>管辖区域</td><td><?php echo $row[7];?></td>
             </tr>
			 <tr>
			 <td>签约人数</td><td><?php echo $row[8];?></td>
             </tr>
             <tr>
			 <td>注册昵称</td><td><?php echo $row[9];?></td>
             </tr>
<?php
         }  
         echo "</table>";  
     }  
     else{  
         echo "记录未找到！";  
     }  
     //释放记录集所占用的内存  
     mysqli_free_result($result);  
     //关闭该数据库连接  
     mysqli_close($connection);  
 ?>
            </tbody>
		</table>
</body>
</html>