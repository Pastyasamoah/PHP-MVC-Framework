<?php 


class News

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


	private function ValidateTitle()

	{

		$this->Passport->Use( 'Title' )
					   ->Required( "Title is required")
					   ->Length(2,100, "Title should be between 2 to 255 character");
	}


	private function ValidateDescription()

	{

		$this->Passport->Use( 'Description' )->Required( "Description is required");

	}


	private function ValidateSource()

	{

		$this->Passport->Use( 'Source' )->Required( "Source is required");

	}

	private function ValidateStatus()

	{

		$this->Passport->Use( 'Status' )->Required( "Status is required")->Regex("/[0-1]/", "Sorry an error occured");

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


	private function CreateNewsValidation()

	{

		$this->ValidateSource();
		$this->ValidateDescription();
		$this->ValidateTitle();

	}


	/*
	* saving news content
	*
	*/

	public function SaveNews($Document='')

	{

		$this->CreateNewsValidation();

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();
			$Data['CreatedBy'] = Session::get("Auth")->UserID;
			$Data['UpdatedBy'] = Session::get("Auth")->UserID;
			if(!empty($Document)){$Data['Attachment'] = $Document;}
			$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Insert();
			return "News saved. Kindly publish it!";
		}

		return $this->Passport->Errors();

	}



	/*
	*
	* Editing news
	*
	*/

	public function SaveNewsChanges($ID, $Image="")

	{

		$this->CreateNewsValidation();
		$this->ValidateStatus();

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();
			if( !empty($Image) ) {$Data['Attachment'] = $Image ;} 
			$Data['UpdatedBy'] = Session::get("Auth")->UserID;
			$Data['DateUpdated'] = Date::DateTimeNow();
			$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Where(['NewsID'=>$ID])->Update();
			return $Data['Title'] ." updated !";
		}
		return $this->Passport->Errors();

	}




		/*
	*
	* Deleting board member
	*
	*/

	public function Remove($ID)

	{

		$Result = $this->Table->Where(['NewsID'=>$ID])->Get();

		$this->Table->Where(['NewsID'=>$ID])->Delete();

		return $Result[0]->Title." deleted !";

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



