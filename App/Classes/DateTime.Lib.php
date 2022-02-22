<?php 



class Date

{


	public static function DateTimeNow()

	{

		return date("Y-m-d H:i:s");

	}

	public static function TodayDate()

	{

		return date("Y-m-d");

	}

	public static function Format($Date)

	{
		return  ucwords(date("D j F, Y", strtotime($Date)));

	}

	public static function Today()

	{

		return self::Format( self::TodayDate() );

	}


}