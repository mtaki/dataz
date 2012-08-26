<?php
/*
 * @author Mohamed Manja <mohamedmanja@gmail.com>
 */
class ActiveRecordControl extends CActiveRecord

{

   public static $dbcontrol;
	public function tableName()
	{
		return 'ccaconfig';
	}
   public function getDbConnection()

   {

      if(self::$dbcontrol!==null)

         return self::$dbcontrol;

      else

      {

         self::$dbcontrol= Yii::app()->dbcontrol;

                 //echo self::$dbcontrol->connectionString;

                 

         if(self::$dbcontrol instanceof CDbConnection)

         {

            self::$dbcontrol->setActive(true);

            return self::$dbcontrol;

         }

         else

            throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));

      }

   }



}

?>


