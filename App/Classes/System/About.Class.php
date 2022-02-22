<?php 


class About

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


	private function ValidateAboutInformation()

	{

		$Commons = [
						/*About us block*/
						'Mission',
						'Vision',
						'CoreValues',
						'Achievements',
						/*Contact block*/
						'Email1','Email2',
						'Contact1','Contact2',
						'FacebookHandle',
						'TwitterHandle',
						'InstagramHandle',
						'LinkedinHandle',
						/*Bank account information block*/
						'BankName', 
						'BankBranch', 
						'BankAccountName', 
						'BankAccountNumber',
						/*Momo account information block*/
						'MTNHolderName',
						'MTNNumber',
						'VodaHolderName',
						'VodaNumber',
						'AirtelTigoHolderName',
						'AirtelTigoNumber'
					];

		foreach($Commons as $Field)
		{
			$this->Passport->Use( $Field )->Through();
		}

	}



	private function ValidateName()

	{

		$this->Passport->Use( 'BoardMemberName' )
					   ->Required( "Name is required")
					   ->Length(2,100, "Name should be between 2 to 100 character");
	}


	private function ValidateContact($Model)

	{

		$this->Passport->Use( 'BoardMemberContact' )
					   ->Required( "Contact is required")
					   ->Length(10,10, "Contact should be 10 numbers")
					   ->Regex("/[0-9]/", "Contact should be number only")
					   ->Exists( $Model, "BoardMemberContact",$this->Passport->OutputAsJson()->BoardMemberContact." already exist");
	}

	private function ValidateEditContact()

	{

		$this->Passport->Use( 'BoardMemberContact' )
					   ->Required( "Contact is required")
					   ->Length(10,10, "Contact should be 10 numbers")
					   ->Regex("/[0-9]/", "Contact should be number only");
	}


	private function ValidateEmail($Model)

	{

		$this->Passport->Use( 'BoardMemberEmail' )
					   ->Required( "Email is required")
					   ->Mail("Wrong email supplied")
					   ->Exists( $Model, "BoardMemberEmail",$this->Passport->OutputAsJson()->BoardMemberEmail." already exist");
	}

	private function ValidateEditEmail()

	{

		$this->Passport->Use( 'BoardMemberEmail' )
					   ->Required( "Email is required")
					   ->Mail("Wrong email supplied");
	}

	private function ValidateProfile()

	{

		$this->Passport->Use( 'BoardMemberProfile' )->Required("Profile cannot be empty")->Through();

	}



	/*
	*
	* Preparing and binding validations to modules
	*
	*/


	/*
	*
	* Processing modules
	*
	*/


	private function CreateBoardValidation($Model)

	{

		$this->ValidateProfile();
		$this->ValidateEmail($Model);
		$this->ValidateContact($Model);
		$this->ValidateName();

	}

	/*
	* About information
	*
	*/

	public function SaveAbout($Document='')

	{

		$this->ValidateAboutInformation();

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();
			$Data['CreatedBy'] = Session::get("Auth")->UserID;
			$Data['UpdatedBy'] = Session::get("Auth")->UserID;
			$Data['AttachedDocument'] = $Document;
			$Data['Category'] = 'A';

			$Result = @$this->Table->Where(['Category'=>'A'])->Get(1)[0];

			if(empty($Result))
			{
				$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Insert();
			}
			else
			{
				$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Where(['Category'=>'A'])->Update();
			}
			
			return "About us information saved!";
		}

		return $this->Passport->Errors();

	}




	/*
	*
	* Save board memeber
	*
	*/

	public function SaveBoard($Model, $Image="")

	{

		$this->CreateBoardValidation($Model);

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();
			if( !empty($Image) ) {$Data['BoardMemberProfilePicture'] = $Image ;} 
			$Data['Category'] = "B";
			$Data['UpdatedBy'] = Session::get("Auth")->UserID;
			$Data['CreatedBy'] = Session::get("Auth")->UserID;
			$Data['DateUpdated'] = Date::DateTimeNow();
			$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Insert();
			return $Data['BoardMemberName']." details updated !";
		}

		return $this->Passport->Errors();	

	}


	/*
	*
	* Editing board member
	*
	*/

	public function SaveBoardChanges($Model,$ID, $Image="")

	{

		$Result = $this->Table->Where(['AboutID'=>$ID])->Get();

		if( !empty($Result) )
		{
			$this->ValidateName();
			$this->ValidateProfile();

			if( $Result[0]->BoardMemberContact == $_POST['BoardMemberContact']){
				$this->ValidateEditContact();
			}
			else{
				$this->ValidateContact($Model);
			}

			if($Result[0]->BoardMemberEmail == $_POST['BoardMemberEmail']){
				$this->ValidateEditEmail();
			}else{
				$this->ValidateEmail($Model);
			}

			if(!$this->Passport->AnyErrors())
			{
				$Data = $this->Passport->Output();
				if( !empty($Image) ) {$Data['BoardMemberProfilePicture'] = $Image ;} 
				$Data['UpdatedBy'] = Session::get("Auth")->UserID;
				$Data['DateUpdated'] = Date::DateTimeNow();
				$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Where(['AboutID'=>$ID])->Update();
				return $Result[0]->BoardMemberName." details updated !";
			}
			return $this->Passport->Errors();
		}

	}




		/*
	*
	* Deleting board member
	*
	*/

	public function Remove($ID)

	{

		$Result = $this->Table->Where(['AboutID'=>$ID])->Get();

		$this->Table->Where(['AboutID'=>$ID])->Delete();

		return $Result[0]->BoardMemberName." deleted !";

	}




	/*
	* Get all board members
	*
	*/

	public function All()

	{

		return @$this->Table->Get();

	}




}



