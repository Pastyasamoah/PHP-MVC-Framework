<?php 


class User

{

	private $Data;
	
	
	private $Table = "";

	
	private $Passport = "";


	/*
	*
	* Constructor
	*
	*/

	public function __construct(PDB $Table)

	{

		$this->Passport = new Passport();

		$this->Table = $Table;

	}


	/*
	*
	* Validation Rules
	*
	*/


	private function ValidateLoginEmail()

	{

		$this->Passport->Use( 'Email' )
					   ->Required( "Email is required")
					   ->Mail("Wrong email supplied");
	}

	private function ValidateLoginPassword()

	{

		$this->Passport->Use( 'Password' )
				 ->Required( "Enter your password")
				 ->Length(4,100, "An error occured");
	}



	private function ValidateName()

	{

		$this->Passport->Use( 'Name' )
					   ->Required( "Name is required")
					   ->Length(2,100, "Name should be between 2 to 100 character");
	}


	private function ValidateContact($Model)

	{

		$this->Passport->Use( 'Contact' )
					   ->Required( "Contact is required")
					   ->Length(10,10, "Contact should be 10 numbers")
					   ->Regex("/[0-9]/", "Contact should be number only")
					   ->Exists( $Model, "COntact",$this->Passport->OutputAsJson()->Contact." already exist");
	}

	private function ValidateEditContact()

	{

		$this->Passport->Use( 'Contact' )
					   ->Required( "Contact is required")
					   ->Length(10,10, "Contact should be 10 numbers")
					   ->Regex("/[0-9]/", "Contact should be number only");
	}

	private function ValidateEmail($Model)

	{

		$this->Passport->Use( 'Email' )
					   ->Required( "Email is required")
					   ->Mail("Wrong email supplied")
					   ->Exists( $Model, "Email",$this->Passport->OutputAsJson()->Email." already exist");
	}
	private function ValidateEditEmail()

	{

		$this->Passport->Use( 'Email' )
					   ->Required( "Email is required")
					   ->Mail("Wrong email supplied");
	}

	private function ValidatePassword()

	{
		$this->Passport->Use( 'Password' )
				 ->Required( "Password is required")
				 ->Length(4,100, "Password must be between 4 and 100 characters");
	}

	private function ValidatePrivilege()

	{
		$this->Passport->Use( 'PrivilegeID' )
				 ->Required( "Sorry an error occured")
				 ->Regex("/[0-9]/", "Select privilege");
	}

	private function ValidateStatus()
	{
		$this->Passport->Use( 'Active' )
			 ->Required( "Sorry an error occured")
			 ->Regex("/[0-1]/", "Select status");
	}

	/*
	*
	* Preparing and binding validations to modules
	*
	*/


	/*
	* Login validations
	*/

	private function LoginValidations()

	{

		$this->ValidateLoginEmail();
		$this->ValidateLoginPassword();

	}

	/*
	* create account validations
	*/

	private function CreateValidations($Model)

	{

		$this->ValidatePrivilege();
		$this->ValidatePassword();
		$this->ValidateEmail($Model);
		$this->ValidateContact($Model);
		$this->ValidateName();

	}




	/*
	*
	* Processing modules
	*
	*/

	/*
	* Account Login
	*
	*/

	public function Login()

	{

		$this->LoginValidations();

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();

			$Data['Password'] = md5( sha1( md5( $Data['Password'] ) ) ); 

			return @$this->Table->Where( $Data, ['AND'] )->Get(1)[0];
		}

		return $this->Passport->Errors();
	}


	/*
	*
	* User account creation
	*
	*/


	public function Save($Model)

	{

		$this->CreateValidations($Model);

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();
			$Data['Password'] = md5( sha1( md5( $Data['Password'] ) ) ); 
			$Data['CreatedBy'] = Session::get("Auth")->UserID;
			$Data['UpdatedBy'] = Session::get("Auth")->UserID;

			$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Insert();
			
			return $Data['Name']." added!";
		}

		return $this->Passport->Errors();

	}


	/*
	*
	* Editing User
	*
	*/

	public function SaveChanges($Model,$ID)

	{

		$Result = $this->Table->Where(['UserID'=>$ID])->Get();

		if( !empty($Result) )
		{
			$this->ValidateName();
			$this->ValidatePrivilege();
			$this->ValidateStatus();

			if($_POST['Password']!=""){$this->ValidatePassword();}

			if( $Result[0]->Contact == $_POST['Contact']){
				$this->ValidateEditContact();
			}
			else{
				$this->ValidateContact($Model);
			}

			if($Result[0]->Email == $_POST['Email']){
				$this->ValidateEditEmail();
			}else{
				$this->ValidateEmail($Model);
			}

			if(!$this->Passport->AnyErrors())
			{
				$Data = $this->Passport->Output();
				$Data['UpdatedBy'] = Session::get("Auth")->UserID;
				$Data['DateUpdated'] = Date::DateTimeNow();
				if($_POST['Password']!=""){$Data['Password'] = md5( sha1( md5( $Data['Password'] ) ) ); }
				$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Where(['UserID'=>$ID])->Update();
				return $Result[0]->Name." details updated !";
			}
			return $this->Passport->Errors();
		}

	}



	/*
	*
	* Updating profile
	*
	*/

	public function SaveProfileChanges($Model,$Image="")

	{
		
		$ID = Session::get("Auth")->UserID;

		$Result = $this->Table->Where(['UserID'=>$ID])->Get();

		if( !empty($Result) )
		{
			$this->ValidateName();

			if($_POST['Password']!=""){$this->ValidatePassword();}

			if( $Result[0]->Contact == $_POST['Contact']){
				$this->ValidateEditContact();
			}
			else{
				$this->ValidateContact($Model);
			}

			if($Result[0]->Email == $_POST['Email']){
				$this->ValidateEditEmail();
			}else{
				$this->ValidateEmail($Model);
			}

			if(!$this->Passport->AnyErrors())
			{
				$Data = $this->Passport->Output();
				if($Image!=""){$Data['ProfilePicture'] = $Image;}
				$Data['UpdatedBy'] = Session::get("Auth")->UserID;
				$Data['DateUpdated'] = Date::DateTimeNow();
				if($_POST['Password']!=""){$Data['Password'] = md5( sha1( md5( $Data['Password'] ) ) ); }
				$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Where(['UserID'=>$ID])->Update();
				return $Result[0]->Name." details updated !";
			}
			return $this->Passport->Errors();
		}

	}

	/*
	* Get all users
	*
	*/

	public function All()

	{

		return @$this->Table->WhereCondition( ["CreatedBy"=>0], ["!="] )->Get();

	}

	/*
	*
	* Get logged in user details
	*
	*/

	public function Get()

	{

		return @$this->Table->Where( [ "UserID"=>Session::get('Auth')->UserID ] )->Get(1)[0];

	}


	public function GetById($ID)

	{
		return @$this->Table->Where( [ "UserID"=>$ID ] )->Get(1)[0];

	}




	public static function IsLoggedIn()

	{
		$Auth = @Session::get('Auth');

		return ( empty($Auth) || !is_object($Auth) ) ? false:true;

	}



}



