<?php 


class Comment

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


	private function ValidateComment()

	{

		$this->Passport->Use( 'Comment' )
					   ->Required( "Comment is required")
					   ->Length(2,255, "Comment should be between 2 to 255 character");
	}


	private function ValidateName()

	{

		$this->Passport->Use( 'Name' )
					   ->Required( "Name is required")
					   ->Length(2,150, "Name should be between 2 to 150 character");
	}

	private function ValidateEmail()

	{

		$this->Passport->Use( 'Email' )
					   ->Required( "Email is required")
					   ->Mail("Enter a valid email");
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


	private function CreateCommentValidation()

	{

		$this->ValidateComment();
		$this->ValidateName();
		$this->ValidateEmail();

	}


	/*
	* saving comments content
	*
	*/

	public function SaveComment()

	{

		$this->CreateCommentValidation();

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();
			$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Insert();
			return "Comment saved. Thank you!";
		}

		return $this->Passport->Errors();

	}



	/*
	*
	* Fetching comments of a particular news article
	*
	*/


	public function GetByID($ID)

	{

		return $this->Table->Where(['NewsID'=>$ID])->Get();

	}

	/*
	*
	* Deleting comment member
	*
	*/

	public function Remove($ID)

	{

		$this->Table->Where(['CommentID'=>$ID])->Delete();

		return "Comment deleted !";

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



