<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>vixa 0.1</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
<div class="container">
	<div class="row" style="margin-top:20px;">

		

		<div class="col-md-12">
		
            <p class="lead">Function add_mp3();</p>
            <p>I have done some functions and I am using them to make my code as short as possible (index.php)<br />
            Ok so.. this function is included in add.php where is the form to submit the code.<br />
            <br />
            There is two a bit complex variables, please check the <strong>$www</strong> and <strong>$file</strong> varialbe<br />
            This variables takes just bits of the URL for example <strong><i>http://www78.zippyshare.com/v/frUzIotL/file.html</i></strong><br />
            I am taking only the server number after the www which is <strong>78</strong> in this case and the file number which is <strong>frUzIotL</strong><br />
            <br />
            You may ask me why do I need this variables? Well, I am taking all what I can take from the URL and then I am using it again to print all sons (players).</p>		
			<pre>
function add_mp3(){

	global $connection;

	if(isset($_POST['submit'])){
		$song_name = $_POST['song_name'];
		$song_name = mysqli_real_escape_string($connection, $song_name);
		$url = $_POST['url'];

		$pattern = "/^(?:https?:\/\/)www([\d0-9-]+)\.[a-z]+\.[a-z\.]{2,6}\/v\/([a-z0-9\/\.].+)$/";
		preg_match($pattern, $url, $matches);
		list(, $server, $file) = $matches;
		$www = $server;
		$file = rtrim($file, "/file.html");
		$file = $file;

		$author = $_POST['author'];
		$category = $_POST['category'];

		$query = "INSERT INTO songs(name,url,www,file,author,category) VALUES ('$song_name', '$url', '$www', '$file', '$author', '$category')";
		$result = mysqli_query($connection, $query);

		if(!$result){
			die("NOPE");
		}
	}
}
			</pre>
			
			<p class="lead">Categories</p>
			<p><strong>I had to add # to the <#li> and <#a> because I have to dispay it.</strong><br />
			So again how I am getting the variable $category form $_GET['category'] which is included in different file. This is imporant because later my variable $category is linked with MySQL query which allows me to print / show all data from category I want.<br />
			Now my query gives me all records from row category. Then I create a link and as I said it will change if the $_GET will be set.<br /> 'While' just show me all categories so I linked it with a li. <br />
			Well, show_category and category functions are connected and they will not work if one of them will broke because the $_GET is so imporatant, it sending information to the database which I am using later to display for example all data from the category 'House'.</p>
			
			<pre>
function show_category($category){

	global $connection;


	$query = "SELECT category FROM songs GROUP BY category";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$category = $row['category'];

			
			echo "<#li><#a href='index.php?category=" . $category . "'>" . $category . "<#/a><#/li>";
			
		}
	}
}
			</pre>
		</div>
	</div>
      </div>


</body>
</html>