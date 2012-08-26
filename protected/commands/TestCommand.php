<?php
class TestCommand extends CConsoleCommand{
	public function run($args){
		echo "Test...\n";
		//$licenceApplication=LicenceApplication::model()->find("id=29");
		//print_r($licenceApplication->getFees());
		//foreach($products as $product)
		$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'A4', true, 'UTF-8');
					$pdf->SetCreator(PDF_CREATOR);
					$pdf->SetAuthor("Mohamed Manja");
					$pdf->setPrintHeader(false);
					$pdf->setPrintFooter(false);
					$pdf->AliasNbPages();
					$pdf->AddPage();
					$pdf->Image(dirname(__FILE__)."/../../images/mawasiliano.jpg", 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
					$pdf->writeHTML("<table>
<tr>
<td background='/../../images/mawasiliano.jpg'>test
</td>
</tr>
</table>
 <br pagebreak=\"true\"/>1234"
, true, false, true, false, '');
					$pdf->Output(sys_get_temp_dir().'/test_'.date('Y_m_d_H_i_s').".pdf", "F");
	}
	
}
?>
