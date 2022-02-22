<?php 

/**
*
* Handles files
* @package File
* @author asamoah Pasty <pastyasamoah13@gmail.com> +233 546116102
* @version 1.0
* @since 8th Jan, 2020
*
*
*/


class File

{

	private static $FieldName = null;

	private static $Details = array();

	private static $Allowed = array();

	private static $Extension = null;

	private static $Destination = null;


	// get file details

	public static function Use($FieldName)

	{

		if( isset($_FILES[$FieldName]) )

		{
			self::$FieldName = $FieldName;
			self::$Details = $_FILES[$FieldName];
			return new self;
		}
		
		die("Check if {$FieldName} was correctly spelt");
		
	}



	public static function Allow( $Allowed = ['pdf','docx', 'doc', 'jpg', 'png'] )

	{	

		self::Extension();

		if( !in_array(self::$Extension, $Allowed ) )
		
		{
			exit;

		}
		return new self;

	}



	public function GetExtension()

	{
		self::Extension();

		return self::$Extension;

	}

	private static function Extension()

	{


		self::$Extension = @strtolower( end( explode('.',self::$Details['name']) ) );
		

	}


	public static function Get()

	{


		self::$Details['extension'] = self::$Extension;

		return self::$Details;


	}


	public static function Rename($NewName)

	{

		self::$Destination = basename($NewName);
		self::$Details['new_name'] = self::$Destination;

		return new self;
		
	}


	public static function Move($To, $ReduceBy = 0)

	{

		$Info = @getimagesize(self::$Details['tmp_name']);

		$Destination = $To.''.self::$Destination;

		@move_uploaded_file(self::$Details['tmp_name'], $Destination);

		return $Destination;

	}







}


?>


<!-- <form action="" method="POST" enctype="multipart/form-data">

	<input type="file" name="my_file"><input type="submit" name="submit">
</form> -->
<?php 

		/*if(isset($_POST['submit']))
		{
			$Result = File::Use('my_file')->Allow(['jpg','png'])->Rename('issah')->Move('images/');
			echo "<pre>";
			print_r($Result);
		}
*/
?>
	





