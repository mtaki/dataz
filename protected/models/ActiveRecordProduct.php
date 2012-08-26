<?php
/*
 * @author Mohamed Manja <mohamedmanja@gmail.com>
 */
class ActiveRecordProduct extends CActiveRecord

{

   public static $dbproduct;
	public function tableName()
	{
		return 'ccaconfig';
	}
   public function getDbConnection()

   {

      if(self::$dbproduct!==null)

         return self::$dbproduct;

      else

      {

         self::$dbproduct= Yii::app()->dbproduct;

                 //echo self::$dbproduct->connectionString;

                 

         if(self::$dbproduct instanceof CDbConnection)

         {

            self::$dbproduct->setActive(true);

            return self::$dbproduct;

         }

         else

            throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));

      }

   }



}

?>


