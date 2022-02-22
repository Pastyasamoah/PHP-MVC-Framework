<?php 


class Privilege

{

	private $Data;
	
	private $Table = "";

	private $Passport = "";

	private  $Privilege = null;


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

	private function ValidateName($Model)

	{

		$this->Passport->Use( "Name" )
					   ->Required( "Privilege name is required")
					   ->Exists( $Model, "Name",$this->Passport->OutputAsJson()->Name." already exist");


	}

	private function ValidateEditName()

	{

		$this->Passport->Use( "Name" )
					   ->Required( "Privilege name is required");


	}


	private function ValidateColumns($Columns = array())

	{

		foreach($Columns as $Column)
		{
			$Column = implode("", explode(" ", $Column) ); // values passed are obtained from an array in the App/Config file. Remove spaces and join
			$this->Passport->Use( $Column )
					   ->Required( $Column." is required")
					   ->Regex("/[A-Z]/", "Sorry an error occured");
		}
		
	}

	

	/*
	*
	* Preparing and binding validations to modules
	*
	*/

	private function CreationRules($Model,$Columns)

	{

		$this->ValidateName($Model);
		$this->ValidateColumns($Columns);

	}

	private function EditingRules($Columns)
	{
		$this->ValidateColumns($Columns);
		$this->ValidateEditName();
	}


	/*
	*
	* Processing modules
	*
	*/


	/*
	* Saving privilege
	*
	*/

	public function Save($Model,$Columns)

	{

		$this->CreationRules($Model,$Columns);

		if(!$this->Passport->AnyErrors())
		{
			$Data = $this->Passport->Output();
			$Data['CreatedBy'] = Session::get("Auth")->UserID;
			$Data['UpdatedBy'] = Session::get("Auth")->UserID;

			$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Insert();

			return $Data['Name']." added!";
		}

		return $this->Passport->Errors();
	}

	/*
	*
	* Editing privilege
	*
	*/

	public function SaveChanges($Model, $Columns, $ID, $Name)

	{

		$Result = $this->Table->Where(['PrivilegeID'=>$ID])->Get();

		if( !empty($Result) )
		{

			$Result[0]->Name == $Name ? $this->EditingRules($Columns) : $this->CreationRules($Model,$Columns);

			if(!$this->Passport->AnyErrors())
			{
				$Data = $this->Passport->Output();
				$Data['UpdatedBy'] = Session::get("Auth")->UserID;
				$this->Table->Columns( array_keys($Data))->Values( array_values($Data) )->Where(['PrivilegeID'=>$ID])->Update();
				return $Result[0]->Name." privilege updated !";
			}
			return $this->Passport->Errors();
		}

	}



	/*
	*
	* Deleting privilege
	*
	*/

	public function Remove($ID)

	{

		$Result = $this->Table->Where(['PrivilegeID'=>$ID])->Get();

		$this->Table->Where(['PrivilegeID'=>$ID])->Delete();

		return $Result[0]->Name." privilege deleted !";

	}



	/*
	*
	* Getting all privileges
	*
	*/

	public function All()

	{

		return $this->Table->Get();

	}


	/*
	*
	* Getting privilege by privilege id
	*
	*/


	public function GetPrivilege($ID)

	{

		return @$this->Table->Where(['PrivilegeID'=>$ID])->Get(1)[0];

	} 

	/*
	*
	* Privilege permissions
	*
	*/

	
	/*
	*
	* load current user privileges
	*
	*/

	public function Load($Auth)

	{

		$this->Privilege = @$this->GetPrivilege($Auth->PrivilegeID);

	}


	/*
	*
	* if current user is allowed to view a component or module
	*
	*/

	public function PermitView($Tab)

	{

		 
		 $PermissionArray = str_split( @$this->Privilege->$Tab );

		 return in_array("V", $PermissionArray) || Session::get("Auth")->UserID == 1;


	}


	/*
	*
	* if current user is allowed to create/add a component or module
	*
	*/

	public function PermitCreate($Tab)

	{

		 $PermissionArray = str_split( @$this->Privilege->$Tab );

		 return in_array("A", $PermissionArray) || Session::get("Auth")->UserID == 1;
		
	}


	/*
	*
	* if current user is allowed to edit or make changes to a component or module
	*
	*/

	public function PermitEdit($Tab)

	{

		 $PermissionArray = str_split( @$this->Privilege->$Tab );

		 return in_array("E", $PermissionArray) || Session::get("Auth")->UserID == 1;
		
	}


	/*
	*
	* if current user is allowed to edit/remove a component or module
	*
	*/


	public function PermitDelete($Tab)

	{

		 $PermissionArray = str_split( @$this->Privilege->$Tab );

		 return in_array("D", $PermissionArray) || Session::get("Auth")->UserID == 1;
		
	}






}



