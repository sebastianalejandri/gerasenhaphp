<?php
$alpha = "abcdefghijklmnopqrstuvwxyz";
$alpha_upper = strtoupper($alpha);
$numeric = "0123456789";
$special = ".-+=_,!@$#*%<>[]{}";
$chars = "";
 
if (isset($_POST['length'])){
    // if you want a form like above
    if (isset($_POST['alpha']) && $_POST['alpha'] == 'on')
        $chars .= $alpha;
     
    if (isset($_POST['alpha_upper']) && $_POST['alpha_upper'] == 'on')
        $chars .= $alpha_upper;
     
    if (isset($_POST['numeric']) && $_POST['numeric'] == 'on')
        $chars .= $numeric;
     
    if (isset($_POST['special']) && $_POST['special'] == 'on')
        $chars .= $special;
     
    $length = $_POST['length'];
}else{
    // default [a-zA-Z0-9]{9}
    $chars = $alpha . $alpha_upper . $numeric;
    $length = 8;
}
 
$len = strlen($chars);
$pw = '';
 
for ($i=0;$i<$length;$i++)
        $pw .= substr($chars, rand(0, $len-1), 1);
 
// the finished password
$pw = str_shuffle($pw);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gera senha</title>
</head>
<body>

<div align="center">
<h1>Gerador de senha</h1>
      
      <form method="post" action="gerasenha.php">
<h3 style="margin: 20px 0;">Characters</h3>
	 <input  checked="checked" type="checkbox" name="alpha" /> Lowercase A-Z<br>
     <input checked="checked" type="checkbox" name="alpha_upper" /> Uppercase A-Z<br>
     <input checked="checked" type="checkbox" name="numeric" /> Numbers (0-9)<br>
     <input  type="checkbox" name="special" /> Special Characters (.-+=_,!@$#*%<>[]{})<br>
     

<h3 style="margin: 20px 0;">Password Length</h3>

	<input type="text" name="length" size="2" maxlength="2" value="8" /><br>
	
	<input type="submit" value="Generate" /><br>
    

	<div style="padding: 30px 0;width:400px;">
				<div>Your Password:</div>

			   <div style='border:1px black solid; font-size: 30px; font-family: monospace; padding:3px; color:#000; background-color: #D2E0E6; margin: 0;'><?php echo $pw; ?></div>
	</div>

    </form>
</div>

</body>
</html>