<?php
/*
 * @author Mohamed Manja <mohamedmanja@gmail.com>
 */
class ActiveRecordData extends CActiveRecord

{

   public static $dbdata;
	public function tableName()
	{
		return 'amacct';
	}
   public function getDbConnection()

   {

      if(self::$dbdata!==null)

         return self::$dbdata;

      else

      {

         self::$dbdata= Yii::app()->dbdata;

                 //echo self::$dbdata->connectionString;

                 

         if(self::$dbdata instanceof CDbConnection)

         {

            self::$dbdata->setActive(true);

            return self::$dbdata;

         }

         else

            throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));

      }

   }



}
?>


