<?php
header("Pragma: public");
header("Expires: 0");
header("Content-Type: application/rtf");
header("Content-Disposition: attachment;filename=network-service-licence.rtf");
$id= $_REQUEST['id'];

/*$sql="SELECT EFFECTIVE_DATE,ISSUE_DATE,LICENCE_APPLICATION.DURATION AS D2 ,OPERATOR.NAME,LICENCE_FEE.DURATION AS D1 FROM LICENCE_APPLICATION,LICENCE_FEE,OPERATOR  WHERE OPERATOR.ID=LICENCE_APPLICATION.OPERATOR_ID  AND LICENCE_FEE.LICENCE_CATEGORY_ID=LICENCE_APPLICATION.LICENCE_CATEGORY_ID AND LICENCE_FEE.MARKET_SEGMENT_ID=LICENCE_APPLICATION.MARKET_SEGMENT_ID AND LICENCE_APPLICATION.ID=$id";*/
$las=LicenceApplication::model()->with('applicant','licenceCategory')->findAll('t.id='.$id);
foreach ($las as $la)
	$licenceApplication=$la;

$name=$licenceApplication->applicant->name;
if (!empty($licenceApplication->duration)){
	$duration=$licenceApplication->duration;
}else{
	$lfs=LicenceFee::model()->findAll('licence_category_id='.$la->licence_category_id.' and market_segment_id='.$la->market_segment_id);
	foreach ($lfs as $lf)
		$duration=$lf->duration;
}

if (!empty($la->issue_date)){
	$issue_time=strtotime($la->issue_date);
	$issue_date=date('d M Y',$issue_time);
	$issue_day=date('d',$issue_time);
	$issue_month=date('M',$issue_time);
	$issue_year=date('Y',$issue_time);
}else {
	$issue_time='';
	$issue_date='';
	$issue_day='';
	$issue_month='';
	$issue_year='';
}
if (!empty($la->effective_date)){
	$effective_date=date('d M Y',strtotime($la->effective_date));
}else
	$effective_date='';

$fee=$la->getFee();
if ($fee->annual_fee_is_percentage == 1)
	$annualFee="$fee->annual_fee% of the Gross Annual Turnover}{\f\insrsid5050383\charrsid6388653  as Royalty.";
else 
	$annualFee="USD ".number_format($fee->annual_fee,2)."}{\f\insrsid5050383\charrsid6388653  as Annual Fee.";
?>
{\rtf1\ansi\ansicpg1252\uc1\deff0\stshfdbch0\stshfloch0\stshfhich0\stshfbi0\deflang1033\deflangfe1033{\fonttbl{\f0\froman\fcharset0\fprq2{\*\panose 02020603050405020304}Times New Roman;}{\f35\fswiss\fcharset0\fprq2{\*\panose 020b0604030504040204}Tahoma;}
{\f36\fswiss\fcharset0\fprq2{\*\panose 020f0502020204030204}Calibri{\*\falt Century Gothic};}{\f172\froman\fcharset238\fprq2 Times New Roman CE;}{\f173\froman\fcharset204\fprq2 Times New Roman Cyr;}{\f175\froman\fcharset161\fprq2 Times New Roman Greek;}
{\f176\froman\fcharset162\fprq2 Times New Roman Tur;}{\f177\froman\fcharset177\fprq2 Times New Roman (Hebrew);}{\f178\froman\fcharset178\fprq2 Times New Roman (Arabic);}{\f179\froman\fcharset186\fprq2 Times New Roman Baltic;}
{\f180\froman\fcharset163\fprq2 Times New Roman (Vietnamese);}{\f522\fswiss\fcharset238\fprq2 Tahoma CE;}{\f523\fswiss\fcharset204\fprq2 Tahoma Cyr;}{\f525\fswiss\fcharset161\fprq2 Tahoma Greek;}{\f526\fswiss\fcharset162\fprq2 Tahoma Tur;}
{\f527\fswiss\fcharset177\fprq2 Tahoma (Hebrew);}{\f528\fswiss\fcharset178\fprq2 Tahoma (Arabic);}{\f529\fswiss\fcharset186\fprq2 Tahoma Baltic;}{\f530\fswiss\fcharset163\fprq2 Tahoma (Vietnamese);}{\f531\fswiss\fcharset222\fprq2 Tahoma (Thai);}}
{\colortbl;\red0\green0\blue0;\red0\green0\blue255;\red0\green255\blue255;\red0\green255\blue0;\red255\green0\blue255;\red255\green0\blue0;\red255\green255\blue0;\red255\green255\blue255;\red0\green0\blue128;\red0\green128\blue128;\red0\green128\blue0;
\red128\green0\blue128;\red128\green0\blue0;\red128\green128\blue0;\red128\green128\blue128;\red192\green192\blue192;}{\stylesheet{\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 
\fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 \snext0 \styrsid5050383 Normal;}{\s1\qc \li0\ri0\sl360\slmult1\keepn\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp20 \brdrr
\brdrtnthtnmg\brdrw60\brsp80 \aspalpha\aspnum\faauto\outlinelevel0\adjustright\rin0\lin0\rtlgutter\itap0 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext0 \styrsid5050383 heading 1;}{\*\cs10 \additive \ssemihidden 
Default Paragraph Font;}{\*\ts11\tsrowd\trftsWidthB3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tscellwidthfts0\tsvertalt\tsbrdrt\tsbrdrl\tsbrdrb\tsbrdrr\tsbrdrdgl\tsbrdrdgr\tsbrdrh\tsbrdrv 
\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs20\lang1024\langfe1024\cgrid\langnp1024\langfenp1024 \snext11 \ssemihidden Normal Table;}{\s15\qc \li0\ri0\sl360\slmult1
\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext15 \styrsid5050383 Title;}{\s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 
\f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext16 \styrsid5050383 Body Text;}{\s17\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 
\sbasedon0 \snext17 \styrsid5050383 Body Text Indent;}{\s18\qj \li1440\ri0\widctlpar\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext18 \styrsid5050383 
Body Text Indent 2;}{\s19\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0 \f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext19 \styrsid5050383 Body Text Indent 3;}{
\s20\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext20 \styrsid5050383 Body Text 2;}{\*\cs21 \additive \fs16 \sbasedon10 \ssemihidden \styrsid5050383 
annotation reference;}{\s22\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs20\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext22 \ssemihidden \styrsid5050383 annotation text;}{\s23\ql \li0\ri0\widctlpar
\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 \sbasedon0 \snext23 \styrsid5050383 footer;}{\*\cs24 \additive \sbasedon10 \styrsid5050383 page number;}{
\s25\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs16\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 \sbasedon0 \snext25 \ssemihidden \styrsid5050383 Balloon Text;}}{\*\latentstyles\lsdstimax156\lsdlockeddef0}
{\*\listtable{\list\listtemplateid58995994{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\ulnone\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel
\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\ulnone\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\ulnone\fbias0 \fi-1080\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\ulnone\fbias0 \fi-1440\li3600\jclisttab\tx3600\lin3600 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\ulnone\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\ulnone\fbias0 \fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\ulnone\fbias0 \fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\ulnone\fbias0 \fi-2520\li7560\jclisttab\tx7560\lin7560 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\ulnone\fbias0 \fi-2880\li8640\jclisttab\tx8640\lin8640 }{\listname ;}\listid100299806}{\list\listtemplateid1204698802{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat3\levelspace0\levelindent0{\leveltext\'02\'00.;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2
\levelspace0\levelindent0{\leveltext\'04\'00.\'01.;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'06\'00.\'01.\'02.;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'08\'00.\'01.\'02.\'03.;}{\levelnumbers
\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0a\'00.\'01.\'02.\'03.\'04.;}{\levelnumbers\'01\'03\'05\'07\'09;}
\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0c\'00.\'01.\'02.\'03.\'04.\'05.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0e\'00.\'01.\'02.\'03.\'04.\'05.\'06.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'10\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'12\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08.;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li2520\jclisttab\tx2520\lin2520 }{\listname ;}\listid519703196}{\list\listtemplateid7734058{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0
{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 
\fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid658075248}
{\list\listtemplateid1035922328{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat5\levelspace0\levelindent0{\leveltext\'02\'00.;}{\levelnumbers\'01;}\b0\cf1\fbias0 \fi-405\li405\jclisttab\tx405\lin405 }{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat3\levelspace0\levelindent0{\leveltext\'04\'00.\'01.;}{\levelnumbers\'01\'03;}\b0\cf1\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'06\'00.\'01.\'02.;}{\levelnumbers\'01\'03\'05;}\b0\cf1\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0
\levelindent0{\leveltext\'08\'00.\'01.\'02.\'03.;}{\levelnumbers\'01\'03\'05\'07;}\b0\cf1\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0a\'00.\'01.\'02.\'03.\'04.;}{\levelnumbers\'01\'03\'05\'07\'09;}\b0\cf1\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0c\'00.\'01.\'02.\'03.\'04.\'05.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\b0\cf1\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0e\'00.\'01.\'02.\'03.\'04.\'05.\'06.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\b0\cf1\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'10\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\b0\cf1\fbias0 \fi-2520\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0
\levelindent0{\leveltext\'12\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\b0\cf1\fbias0 \fi-2520\li2520\jclisttab\tx2520\lin2520 }{\listname ;}\listid855002858}{\list\listtemplateid1414282102
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\'02\'00.;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'04\'00.\'01.;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'06\'00.\'01.\'02.;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'08\'00.\'01.\'02.\'03.;}{\levelnumbers
\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0a\'00.\'01.\'02.\'03.\'04.;}{\levelnumbers\'01\'03\'05\'07\'09;}
\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0c\'00.\'01.\'02.\'03.\'04.\'05.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0e\'00.\'01.\'02.\'03.\'04.\'05.\'06.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'10\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'12\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08.;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li2520\jclisttab\tx2520\lin2520 }{\listname ;}\listid1100100241}{\list\listtemplateid-2046815174{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat5\levelspace0\levelindent0
{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat0\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 
\fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid1945847020}
{\list\listtemplateid1999388440{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat6\levelspace0\levelindent0{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\ulnone\fbias0 \fi-750\li750\jclisttab\tx750\lin750 }{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\b0\ulnone\fbias0 \fi-750\li1470\jclisttab\tx1470\lin1470 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\ulnone\fbias0 \fi-1080\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0
\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\ulnone\fbias0 \fi-1080\li3240\jclisttab\tx3240\lin3240 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\ulnone\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\ulnone\fbias0 \fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\ulnone\fbias0 \fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\ulnone\fbias0 \fi-2160\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\ulnone\fbias0 \fi-2520\li8280\jclisttab\tx8280\lin8280 }{\listname ;}\listid1983271142}{\list\listtemplateid-726599376\listhybrid{\listlevel
\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid-458712810\'03(\'00);}{\levelnumbers\'02;}\fbias0 \fi-360\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0
\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\leveltemplateid1150568410\'02\'01.;}{\levelnumbers\'01;}\fbias0 \fi-360\li3240\jclisttab\tx3240\lin3240 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'02.;}{\levelnumbers\'01;}\fi-180\li3960\jclisttab\tx3960\lin3960 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\leveltemplateid67698703\'02\'03.;}{\levelnumbers\'01;}\fi-360\li4680\jclisttab\tx4680\lin4680 }{\listlevel\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698713
\'02\'04.;}{\levelnumbers\'01;}\fi-360\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'05.;}{\levelnumbers\'01;}\fi-180\li6120
\jclisttab\tx6120\lin6120 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698703\'02\'06.;}{\levelnumbers\'01;}\fi-360\li6840\jclisttab\tx6840\lin6840 }{\listlevel
\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698713\'02\'07.;}{\levelnumbers\'01;}\fi-360\li7560\jclisttab\tx7560\lin7560 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'08.;}{\levelnumbers\'01;}\fi-180\li8280\jclisttab\tx8280\lin8280 }{\listname ;}\listid1986279671}}{\*\listoverridetable{\listoverride\listid100299806
\listoverridecount0\ls1}{\listoverride\listid1100100241\listoverridecount0\ls2}{\listoverride\listid1986279671\listoverridecount0\ls3}{\listoverride\listid1983271142\listoverridecount0\ls4}{\listoverride\listid1945847020\listoverridecount0\ls5}
{\listoverride\listid855002858\listoverridecount0\ls6}{\listoverride\listid658075248\listoverridecount0\ls7}{\listoverride\listid519703196\listoverridecount0\ls8}}{\*\rsidtbl \rsid810145\rsid2952303\rsid3357100\rsid3820554\rsid4269828\rsid5050383
\rsid5194610\rsid5256540\rsid5927355\rsid6388653\rsid7760478\rsid8521293\rsid8526072\rsid10623340\rsid10748263\rsid14231525\rsid14247757\rsid14311224\rsid14819372\rsid15273744\rsid15285721\rsid15865641}{\*\generator Microsoft Word 11.0.5604;}{\info
{\title    }{\author user}{\operator Mohamed Manja}{\creatim\yr2010\mo2\dy26\hr11\min51}{\revtim\yr2010\mo2\dy27\hr8\min50}{\version5}{\edmins7}{\nofpages9}{\nofwords1399}{\nofchars7975}{\*\company tcra}{\nofcharsws9356}{\vern24689}}\margt900\margb1080 
\widowctrl\ftnbj\aenddoc\pgnstart0\noxlattoyen\expshrtn\noultrlspc\dntblnsbdb\nospaceforul\hyphcaps0\formshade\horzdoc\dgmargin\dghspace180\dgvspace180\dghorigin1800\dgvorigin900\dghshow1\dgvshow1
\jexpand\viewkind1\viewscale100\pgbrdrhead\pgbrdrfoot\splytwnine\ftnlytwnine\htmautsp\nolnhtadjtbl\useltbaln\alntblind\lytcalctblwd\lyttblrtgr\lnbrkrule\nobrkwrptbl\snaptogridincell\allowfieldendsel\wrppunct
\asianbrkrule\rsidroot5050383\newtblstyruls\nogrowautofit \fet0{\*\ftnsep \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\insrsid4269828 \chftnsep 
\par }}{\*\ftnsepc \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\insrsid4269828 \chftnsepc 
\par }}{\*\aftnsep \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\insrsid4269828 \chftnsep 
\par }}{\*\aftnsepc \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\insrsid4269828 \chftnsepc 
\par }}\sectd \pgnrestart\pgnstarts0\linex0\endnhere\titlepg\sectlinegrid360\sectdefaultcl\sectrsid5050383\sftnbj {\footer \pard\plain \s23\ql \li0\ri0\widctlpar
\tqc\tx4320\tqr\tx8640\pvpara\phmrg\posxc\posy0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\field{\*\fldinst {\cs24\insrsid5050383 PAGE  }}{\fldrslt {
\cs24\lang1024\langfe1024\noproof\insrsid3820554 8}}}{\cs24\insrsid5050383 
\par }\pard \s23\ql \li0\ri0\widctlpar\tqc\tx4320\tqr\tx8640\pvpara\phmrg\posxr\posy0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\cs24\insrsid5050383 
\par }\pard \s23\ql \li0\ri360\widctlpar\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin360\lin0\itap0\pararsid5050383 {\insrsid5050383 
\par }}{\*\pnseclvl1\pnucrm\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl2\pnucltr\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl3\pndec\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl4\pnlcltr\pnstart1\pnindent720\pnhang {\pntxta )}}
{\*\pnseclvl5\pndec\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl6\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl7\pnlcrm\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl8
\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl9\pnlcrm\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}\pard\plain \s15\qc \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp160 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb
\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp440 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid5050383 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b0\fs24\insrsid5050383    }{
\b0\fs24\insrsid5050383\charrsid6388653 
\par }{\b0\fs20\insrsid5050383 THE}{\b0\fs20\insrsid5050383\charrsid6388653  UNITED REPUBLIC OF TANZANIA
\par }{\fs24\insrsid5050383\charrsid6388653 TANZANIA COMMUNICATIONS REGULATORY AUTHORITY}{\b0\fs24\insrsid5050383\charrsid6388653 
\par }\pard\plain \qc \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp160 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp440 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\insrsid5256540\charrsid6388653 {\*\shppict
{\pict{\*\picprop\shplid1025{\sp{\sn shapeType}{\sv 75}}{\sp{\sn fFlipH}{\sv 0}}{\sp{\sn fFlipV}{\sv 0}}{\sp{\sn pibFlags}{\sv 2}}{\sp{\sn fLine}{\sv 0}}{\sp{\sn fLayoutInCell}{\sv 1}}{\sp{\sn fLayoutInCell}{\sv 1}}}
\picscalex25\picscaley19\piccropl0\piccropr0\piccropt0\piccropb0\picw14993\pich14993\picwgoal8500\pichgoal8500\jpegblip\bliptag-1949911779{\*\blipuid 8bc6b51d929834575ecee364e2643d80}
ffd8ffe000104a4649460001010100c800c80000ffdb0043000a07070807060a0808080b0a0a0b0e18100e0d0d0e1d15161118231f2524221f2221262b372f26
293429212230413134393b3e3e3e252e4449433c48373d3e3bffdb0043010a0b0b0e0d0e1c10101c3b2822283b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b
3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3bffc000110800e1012703012200021101031101ffc4001f0000010501010101010100
000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a10823
42b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a
838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1
f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b5110002010204040304070504040001027700
0102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a43444546474849
4a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4
c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f66a28a2800a28a2800a28a2800a28a280
0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a280
0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a280
0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a2a39678e15dcee00f7aac2f269ff00e3da0665fefb7cabff00d7fc29a4d817690b01dc554fb3dd
49feb6e0203da35fea7fc286d320703cc699c8efe6b2e7f2228b2ee22692ea085774b3220f566005539bc43a4c0c15ef632c7a05f9b3f954ada3698df7f4fb67
cf52f10627f3a41a269201034bb300f50205ff000a3425f3f4b1426f17e9711233231fa01fd735049e34b445c881fe8cd83f962b49bc3da330ff009065b2fba4
614fe62a9bf82f426ce2d64427b89dcff326a6cfb98c957e8d19ede3c8f7616c4f3df7ff00f5a9ff00f09cc4b21492cc82a704efff00eb5127802c725a1bebb4
39c80db580fd07f3aa175e03d437b3c17f6f29273891193f96ea9b4bb98bfad2fe91b0be32b22bb9a1936f72a4301fe15661f14e9930277bae3ae573fc89ae32
5f0cf882cc97164640bfc50c8a7f4e0fe954a4b79c48b1cd673db4edf743c4503fd33ffeaa4f9d11edebc7747a5c1ace9b70bba3bd888f76dbfceae8208c8208
f515c1699e1f92e02c97f3aedff9e60e5ffefaed5d45a5bc365188ed86c1f5c93f53debcbad9b51a72e54aefc8efa2aacd5e6ac6b5154bed863fbe47e35325cf
983e489cfbe303f3aeac363e8e21da17bf9a3571689e9338a8f3311ced41f9d529ef74f8d8acfa8a6e1d504833f90e6bbd2b925f3222f5602a36bdb74fbd2a8f
c6b15f5bd0e2cec8e6b83e9e4bb7fe8550af8b2d22245b6877d9f689141ffc7ab554a4fa0ae6e1d4ed01c79ca7e94ab7f0b7dd0e73d30a6b0d7c5974e7e4d06e
7fe052014a3c51a877d02503da61fe14fd8cbb7e2857370dec6bcb2c83ea8699fda9680e0ca14fbf158c3c5f2a1fdf6877a07fb055bf99152278d34cff0096f0
de5b7fd74809ff00d0734bd94bb05d1b49796f27dd954fe3528653d08359b6faa687aa48a22b9b49a523846c07fc8f3561b4e8c730492427afcad91f91fe950e
36d1e832e5159cf3de590cce82688759231c8fa8ff00f5d5c82e23b88c3c6c181f4a971b6a325a28a29005145140051451400514557b9bb8ed9327258f0140c9
27da9a57025791635cb1000aa7f699eece2d5709de56e9f87ad45308d206bdd5a648608c6ed8ed8551fed1eff4fe75ce5e78cef75190db7876d76c7f77ed73a7
eaa9f972df95691837b7fc026524b73ab16d6f6ca67b890315e4c929185fe82b36ebc6de1fb63b45fadc37616ea65cfe2063f5ae753c3173a9ca2e358bc9af1c
1c81237caa7d8741f856cdb681636aa36c0a7db14dfb35bbb99f3be88864f1fc047fa2e917f29ec5d5501fd49fd2a3ff0084df506194f0e4847bdce3ff0065ad
4fb2c6bf76351f8531e11dc66a7da43f97f125ce4670f1bea19c3787987d2e81ff00d969c9e3f4438b9d16f53feb9157fe6455c30aaae7032781559e043d5452
f690fe5fcc975268923f883a231fdfade5b7bc96e4ff00e839abf078bfc3d70015d5ed933d3cd7f2cffe3d8ac196ca16eb1a9fc2a93e896f72db12dc3b1ec052
73a5bb4d0bdbcbb1e810cf0dc2078654954f4646047e952579fc3e01b7120b891cdbbaf23ca3861f8f6ab22c359b695a2d2b57bc95fb891fcd0bff007de40ac1
62284a5cb095fe474c5c9abb563b7a4c5655849a869ba7b4de20d46cdb68ff0058a9e585fab1383f801f8d66cde3ed2d26222b6bdb8854733c7100bff8f107f4
adac3b9bb26996528e6d914e73941b0fe63151a69102485bcc9994f442fc0febfad655a7c41f0bddb6cfed58e07ee2e14c607fc088dbfad6f5b5ddb5e4625b5b
88a78cff00144e187e62b3a98683d670fbd0d3ec417693dadb6fd36ca09e61c0496531e47fbdb5abcf75fd63e25c6e42e9ff00658467e6b1844c587b9f988fc8
57a7d15ac1a82b24819f3d0d7b598ee835e6a17570e849f2eea46700fd1ba57a07867c6ba25d14b7d42d92d263c0703287fc3fcf4aefaeac6d2fa311de5ac372
80e42cd18703f0358579f0fbc2f7aceeda62c2edfc503b47b7e8a0edfd2a9cefd446e450dac91ac912c6c8c32acb8208f6a904110e88bf9560699e149b430134
dd6aecc59cb457416553f4c6dc1f7ad7ff004f43d21907aee2a7f2c7f5a9f981644683a28fca9762ff0074555fb5dc27facb3907bae1bf91a3fb4e05ff0059ba
3ff7d4aff3a3958164c519ea83f2a8a4b2b79061a253f852a5edbc9f76553f8d48258cf471f9d2d50cc9bcf0be9976a43dba73ed59c746d5b47f9b4abf93cb5c
7ee253be3c0ec01e9f862ba8f313fbc2a196f2de2525e451f8d691a93db715919fa36bc35090da5dc3f66bd41931e72ae3d54ff4ed4cb9ff00895ead0b45c417
5905474571e9f5fe86922b26bcd660bf58cc514193b9860be411803d39eb55351bf4d4f5eb7b2b42244b462d348bc8dfd3683edce7ff00ad56a29cb4dada8ba1
d303900d14883080515ce50ea28a2800a28a82eee52da0691ce0014d2b80cbcbc5b750aa0b48c70aa3a93542f6eed741b27d535493320e15579393d1507727fc
7a0ab5650119bdbaf96461901bfe59aff8fad7057776de2ad74de485bec36e4adac7d323bb9faff2c56b14b5becb7339cf955c76dd47c5b782f352fdddb21cc5
6c0fc91fb9f56f7fe5d2ba7b1b282d902c4838ef8aaf6ca155540000e80568c1dab29d472f439e3abbb2d45167935388b34c42071e95306a93a12442f10f4aae
f1f38abac735095c938e4d0c1a28cab93501899db6aa927d056a0b307973f80a942c70a70028ae79d551d84a937b99b1695bbe69db03fbabfe35334b05a62282
3cbb744419269c649af58a5b7ca838694f41f4f53531165a3da4973348b1468374934a79fc4ff4ac1509d6779bd3b1ac63186c4496135c7cf78e557fe7921fe6
7fc3f3ac7d47c5905b6eb2d0a18ee644fbd2f4863fc47de3f4e3dfb573bad78b2e3c4129b6b35921d3f383ced69bfde3e9fecfe7e833a6223cc0514a21c05048
1f90aef8d18d18da2b515ee4b7da824b379f7f70fa9dd0fba18e228fe83a7e439f5ac8bfbeb8bd1b6570231f76341851f87f8d4f2343de13f83d56736fff003c
a4ff00bf83fc2972eb77ab19992dbc6dd54536d2d02ce7ecf23c13107cb92362ac0fd455e716c7fe7aa7e4dfe150ed855c324ecaca720b4781fa135b2a938ecc
5644d69e2cf1569c816df5bb875073b6e31367db2e09fd6b76cfe2e6b3031fb7e956972b8e3c96688e7dc9dc0fe42b9dbab6533178a58f6c9f32a96dbc1faf15
51ad27e4888b8f54f9bf9557b5bfc493158f4bb2f8bba14db16f6d6f6cdcfde250488bf8a9c9ff00be6ba0b3f1af866f8810eb56a09e8b2bf944fd03e335e18e
801c32e08ec69e96f1dcc0d1151e620de87d4771fd68bd27d1a1ea7d151cb1cd1892275746e8ca720d3ebe6a804d672192cee26b673fc50c850fe62b62cfc6be
2bb0dab1eb53ca83b4e16527f1604feb47241ed2fbc2efb1efb45791db7c56d7edc892eac2caeedfa131068dc1f739207e55d7e97e3d8efecd6e25d26e9031c7
ee0ac807d49dbfca97b1974d42e8ea1eda090ee786363eaca0d46da7da31ff005217fdd257f9573b2f8835cd46431e95a6adb479ff005d73f33118fee8e01cfb
9a41e1ad4f50c36a9abdcca31ca2bec43ff015c0fd2a9536be295857ec6addcba1d8645dddc3091fc325c1cfe59c9ace7f15e9113634cb19af25c7cad143b067
d0b360fe201ab367e0fd2ad000b6ea71ea2b5a1d3ed60188e151f8517a6bbb0d4e69ff00e122d7c9495869d68dd63849dec3d0bf5fcb15b9a4e8b6da54023850
0c77ad1000e8314b512a8dab2d10d20a28a2b318514514008781594dfe9fab0889fdd5b8dee3d4ff0008febf85694cdb6263e82a8686a1ade69fab4b3373ec38
1fc8fe7571d1362667f8eafdecbc38f144db64bc716e08f4392dff008e83f9d73da4c02ded917be2adf8f98cdab6936c5b0aa2491b3ea7681fc8fe74d81d5140
41ff000234aa3b412ee715795e76346007af41ea6afc2c146739c564c721272c726afc3bdc2a2296279205637b0419a0920f41532b96e064d450da3000ca7f01
56d5428c28c0acdd68f43ae317d4411e7ef1fc29e000300628cd324916242eec1547526b3751b344ac1248b1a9663802a8c6926a6fb89296a0f6e0c9f4f6f7a8
e06fed998b027ec719c16ff9e87d07b7ad6b80114000000703b0ad69d2b6b2dc1b21b8b8b5d36c9e79dd20b78172cc780a2bcc358d5aefc5d7a1dc3c3a6c4d98
603fc5fed37a9fe5f9936fc43acbf8a75116d6cc7fb2ed9b83ff003d9c7f17d076fcfe8d11ac5185500015dffc25fdefc88dcae90a45b5540001a86f3fe3e24f
f78d5866c30fad4d1689a96ab70ed696cc632ffeb5fe54eb8ce4f5fc33586aca30e5aab2577707c3c95d7377a8aa37f7628f70fcc91fcaaa7897c31a0f877486
bcb8bcbd794fc90c7e620f31fd3eef4ee7da84aeec80e1e4aaefd6a5dfb941a5b6b3bad42e45bd95bc97129e7646b92067193e839eb45806cb87b389fba3143f
cc7f33548921b20e0d753ac7852ef40f0dfdb3509a359659d156dd4ee2bc1c927a67e99fad72ca1a4915114b3b90aaaa32493d00a2cc07fdae700032161e8ff3
0fc8d2a5d224ab235baee53905095ff11fa5757a3fc33d63518d26bd9134e898642baef9318c8f978c7d09047a56378bbc3f17863538ac56fbed4f245e637eeb
66c19207739e868b3033ee2da1f37f753850e0328718183c8c1ff1c55592096200ba10a7a30e41fc7a54d21f32c627ef1b143f4ea3fad5dd1343d6356940d3e1
611b1c191f88cff8fd066a2528c15e4ec066432b42f95c1046194f461e86bd07e1bbdda5e32456d24ba6ce0e59ba44c3b73d7f0ec6b5347f877616fe5cf7b6ff
006a9bb8236440ff00b84e4ff9e2bad8ece68c2a22c2918e30a4fca3d862b86a62ab36951a6df9bd3f3d4b515d59756345fbaa053aab5c4e6d2dccd2c8a55700
f18ea7152c3289a30ebd0d7a1adae412514514005145140051451400514514010dd02d0301e959be1b9d64b096207e68277461e87ef7f235aec372915c0c5a95
c681e2cba9441249633b959f6293b30c70dc7a7a7a1ab8b4e2e2672972b43bc78857c41a64a7a3c2ea3f020ff51496914b3b04890bb7a0ad6f165bdb6a363a7e
a08e258e29861d1b82ac3079fa85ad5b28e38ed90431845c7402b831d8af64a292bb33787f6936dbd0a369a31186b97ff802ff00535ad1c691284450a076140c
fa50eeb1a97760aa3a92702bc975ea54f88eb8d38c361f9a1a45452cec1547524e05625e788563ca5a40f2b7f7d94851fe358d3de5e5dbee9bcc6f418e07e15d
d470f525acb440da3a3b8d6e143b601e61fef1e0564335d6bdaa7d8c48e2253995c7445f4fa9edff00d6aca9e692250446e49200007535d9e87a67f665805703
ed129df3375f98f6fa0e9ffebaf4e9d28d357443772f430c76f0a431204441b5547615c878ef5c7545d06cdf135cae6e181e5233fc3f56fe5f5aea752bf8b4cd
3a7be9cfeee042e467afa01ee4f1f8d797d8a5d5f5ccfaa5da334f72e5db00e07a01ec071f856f4d5af37d3f325f62d5adba5adbaa28c6054b0c1717d702ded6
232ca46703b0f527b0a92d2c6eb51bb5b5810a93cb3b0e107a9ff0ad2f126a9178434b8f4cd254b6a37433e61505957fbe7f50074ebe952939c87b197a8dce9d
e1c9440563d4f54079439f260fa8fe23edfcbbe1ea1ad788efa7767d5ae6100e02c1218801f45c54367a7cc8449247233b1c9620926acddc3299e42b1391b8e0
85ab7350d2204be0d3acaf88a3964d6aec585aa3cd74259d9a3d801ec4e3938f7ea7b564f89b5b9bc53afbddb656d20ca5ac67b2e7ef1f73d7f21da9f2457c22
9618cdc245363cc45242be3a6477aac2ca74181049ff007c9a6eaf5ea161f6375a5598964d4acee2f0a81e5431ca23463df73751dba57a7f807568358d0649ed
f4a8b4d48e768fcb8882af800eee839e71cfa75af2796d2e5c855b695998e15421249f4af6bf0f6969a1f87ed6c4ed530c7994e78de79639fa93595d72eda81c
578f5aebc47e238b40b00a22b180cd773b9c47116e46f6c718519f7dded5ce7fc249a6f854b5bf86e04bebd1f2c9a9dcaf19c72225ec3dcf5f718a9fc5be2a93
5fd42e74fd1e2f2b4cdccd3491a6d379205c6e63dc7000cf5c03e98c9d23c25ab6a64186d5a38bbcd28da83fc7f0ad2ace14609cf4b024dec41378bfc5b73319
5f5dba527b46422fe400152e9fa0f883c597f25f32c970ef8f36ee621506001c9f60074aee34ff000468da1db8bed65cdc91f75186379f454eff008fd78ad10d
7baced8c462dad17ee4318c0fc7d4d7156c7a8c399ab2f4febfae8528ea62e9fe1ad0f478cadd336b170482517e58548f7efd4d6dc7a86b171710dad9a45631c
8e17f7518c81ebce7a0fe55a96ba5436c8494e71dead69f1279925eb9091a02aa4f031dcff009f7af268632a626ba8c169d59a38a48e6ae34dd61b509ad9f5bb
b3b0e015999720f23807d2abcbe1b96001a4d56e90f6c4cd9fc39a58b589f53d62eef2d55840ef88db1c950300fb6719aba56563b983127a935ea47078af6cdc
aa72c7b2dffafbcc255629592d434ad0ee6edcfda751bbb98d1832acf3b38cfae09aebe084431041dab1b402c27756040da4f3f515bd5d952ebdd083bab85145
15994145145001451450014514500159d75690c81d4c6a03124e075cf7ad1aa57d3456a8d34d22c51a8c9663815e666716e8dd7465c37307fb05a112c56f332d
bcdcbc2795278e71d8f039f6ad5468ac6d333cab1a20e59db005731a978f20c345a3a09e61fc526554ff00ba3a9fd3f1ae2efb56bed4a6df7b70f2303c29e02f
d07415c54f098ac425ed9d92fbff00af52af18ec777a8f8deda2263d3e3f3dbfe7a3f0bf80ea7f4ac1d4b53b9bcbb63713b38072a3b0fa0ae7925ab93499f2df
fbf18fcc71fd2bd7a386a7457ba8cdc9b2fa4def5289fdeb2d66f7a592e76464935d4b511d3f84ecff00b535c33c8bba0b201b9e85cfddfcb93f80af41ae7fc1
5606cbc3703c83125d6676ff00817ddffc7715d0554f7b7612382f891a96f7b2d16327321f3e6c7f7470a3f1393ff01158284aa2451a967621555464b13c002a
1d7350fed2f18ea371fc1149e447f44e0fe6413f8d6a783a217be29883608b78da620fb6147eac0fe15a4f44a3d84bb9dae9b636de1cd1649a720324665b993b
9c0c9fc0738ffebd792c97b36b7ab5cead72bb5e77caa673b17f857f018af4cf8892cb0f826fbcac8de63466071852ea0fe638fc6bcbed8848401e94a2f960df
563ea5cdff003281ea2a3bd93fd2a5ff0078d43e680e327bd6e47a35b5b6fd5fc4729b4d3f7931c27896e8f5c28eb83ebe9e839ac926c6436ba5c10f85afb5cd
4be58d97cab24dd82f2138ddef8e7f263dab9bf3372d5bf10788aebc4b7685a316d636e36dbdaafdd41d327d4ff2a934df0eea5a9c7e64301483bcd27cabf87a
fe14eb4a14a3793b02d4d6f87da38d57c442ea51982c00908c7de73f707e84ff00c06ba7f8897f7d736f178734b3b66be19b897760243d31ff00023c7d01f5ad
8f0e69307857c37b269065434f71263be39e3d8003f0ac3d0a29353d42e357b84c3dc3ee00ff000af451f800057362714b0d4dd4edb7a8d46eec41e1bf01699a
4c427bb1f6b9f6ff0018f907fc07bfe39aea77c16d6526a17784b68572ab8ea3e9df3d00a50be7dda5b0fbb8dcff00ee8ff207e3597e38b90b158589e12794bb
63b84038fcd87e55e56069d4c53facd6f79f445cda8e88a36c975e20be37f78084cfeee2cf083d07f5f5adf2f6f63180cc178e077359115f186dc470288d40eb
de9ab12988de5fcff67b41c991fef49eca3a935a7f6556c554e7c4cb95765bff005f799fb64b481a76d34dab4cc91a98ad53fd6487a9f61eff00caad6b5a3c9a
bd8258c57cd676adc4cb1265a45c7dd0d9e07af073f9e79337b71e2cbe8744b189acf4707338070f2463aee23a6781f8f24d74de29d54683e1e77b640b2be20b
655e02b11c1fc00271ed5ed52c2430dcb0a2acff00addff562799c95d9cb88ec6c35096c2c1de54b73b1ddc83961d4703b74fae6ad3b845dc6b2f42b116f6ea3
19622aedf93e5ac3110d34ac117d013c0af41af7ac733d59bfa14821997cc1b4cd1074f704ff00f5aba1ac0d7215d3edb4d787205bc8b08e7f84afff00622b72
07df0ab7a8ae2a9afbc74c55b424a28a2b22828a28a0028a28a0028a28a002b9ff0019e98da8e84ef11c4d6c7cd4fc3aff008fe15d0521008c1a00f009d31fbe
45c213865fee3771fe14f4bbdc02cca2503b93861f8ff8d6ff008d3437d03566b88630d6773cedc71f4fc3fc2b9a92350be6c24b459efd57d8d005a558df98a6
00ff00764f94fe7d3f955822516587420c4dc67b83ff00d7fe75941fd6ad59dd186500b911b70de9cf7a009966a47df732456d17fac99d635fa9381fce9af3ec
91a39e0466538240da7f4e3f4ab7a0f91378a34a51bd4fdae33838607073ede9574fe213d8f6b862482148631848d42a8f61c52b30542c7a019a5aafa8eefecc
bad982de4bedcf4ced352b5633c32c6732879dbacac5cfe2735b5e18d7a0d0bc491dd5d9db6d2c6d0c8f8276024107f351f866b9db15916d5331b818ee2aea69
f77790b491dbbb46382f8c0fceb69b5ed1dc4b63db37586b360e8b243796b3a6d6d8e19581f715c66a5e15f07e965deef5b7b3524e226b94c8f60082c71f89af
397f0acf723cd164cca4e01c0e7e957f49f006a17cca56d45bc59e649be51f80ea6a64e8c23794b4f40d4d697c57e1cd21c2786f4a6bdba5e05f5ee48073f782
9eff0082e3dea9c5a07887c59a93dddd34920271e7ce76a019e8a3d3d80c576ba2f80f49d282cb2afdae61cef907ca3e8bd3f3cd74c40538e0578989ce2cad86
83f57fa1aaa7fcc735a3781b4bd2c2c970bf6c9c7f1483e507d97fc735b6ef09b85fb43c71dbc23739760abc741fe7d2ad707b8fceb3753b2b59d099f903b0e4
d78946ad6a9898ceaa72346928e851f136bb6da9da2699a5dd4770679009da26dc150738c8e3938fc3357acc41a759aabb0071d075acb5b28ecf1e440b006e41
6c063f4a708e591b011998fb66be92ae0258cb3aaf962ba75ff25f89caeaf2fc25ed3759b75d6245b87581644c46646c0241e99f5ab1e203a05ddbc4da96a304
1e4b6e8dc4ca1b38e40cf5cfa7b0ac3bfd312e2358a655e073922b317c23651480b228279000e6bd6a386a34a2a307648cdd46f72dbebba4c2db74a825d41fb4
9723118fa2e013f8e2aa490de6a73fda75099a56ed9e83e83a0fc2b521d2a2b50152139fc054f1a3339558c00a32d81dbf1ae8e68af84cdb7b1368373a5e8765
2dcdf5e416c646c2abc8012a3d075ea4fe55435cf1af86f538d6d52c6e355f2dc3a615a240dd3ef1c1e84f406a2bbd156e5fcc9a3c9f7a48f4bb7b56dbe50523
b62a5469df99dee573b4ad6214d4ef6f916316b0d9db29044512e3a67049ea4e0d69f87eccdf6b42675cc7683773d379e07f53f80aad37ee5551232f2c842c71
81cb13d2ba8b0b783c3fa2b3dcc806d0659e43ddbbff00403f0a552568e8b7082e677650f14c9e7dd69da7af2cd2999bd828207fe85fa56fdbaec8557d05731a
14536afa9cdacdd215f338890ff020e83fafd49aeac715cf53dd4a1d8dd77168a28ac461451450014514500145145001451450052d5b4ab6d674f92cee5728e3
83dd4fad78a6b5a45ef86b537b794103f85baabaff00515ef159bae68567af58b5b5d273fc120ea86803c3008ae398c88a4ff9e6c7e53f43dbe86a36dd1b9475
2ac3a822b4bc43e1abef0f5d18ee232623f7251d18566a5d305092012c63a2b76fa1ea2802cb3fda6dc480e64886187aaf63f874a9bc3f7021f14e93231007da
e3524fbb01fd6aac46312092097cb71fc12f43ed9e9f9e2a3d42d9e155b88959149caf3f71bebfc8d694fe213d8fa1e8232083dea8e89a9c7ace8b69a8c4c0ad
c4418e3b37461f81047e157ea1ab3b0cf9ede29b4bbfbab02cc8d6d334640247438ad34d1357d7aee3babad3af2eac628152df6aa308dbf88ec91941cf5dc3d0
0fa7a1ebde1fb2b7d7d7c40d6893799b5262c3211870ad8e9d3033ec2b1b59975ad63c5377a7e8d7ed0ac1a6c6ca05db42a92333e1ce11b7f6e38c8ef594f172
8d6928da2ad76dedba5d1afcc147431aebc17a81b8965b3d22195134a58e28ef218bef972595402551f04e1b919fad4d77e18ba8f59b578748b9b9b1b7d2a2b5
8bed36d6f74e8c18b1043ba80467191c75038ad4d2bc4434ef166aba778835e8505a5b5a4686795634790c5991941f53cfb66b2b56f15ebf75712f8834a49bfb
16ca41e4a2c88ab751213e6bb29f98e7b11d02f4a8a753319d4e5f76d6566ef67749a4b5dffe08df22468eb1e19d4fc5970b652451699a4585b88eda29a00de6
48c982e111c05d8385e481e86ab6b9a4deeafe0bb28b55d2617d72296286591c23486357e583f5c11c9fa9a354d6b56975db6b5d1f57db65afc7e62339dd25aa
a00cc633d06f53c673839e9c566df6b1a8b5d6a5656fabdc465b59b6b18642db9910a9dd827af4cd74e1b098a7c8ea49251b3492775d1ddf9bdf7d56844a71d6
c5ad734a90eafa9c9a4694905acba2359c290aa22b48d212460631d73559347d5ec25d274d861371a5c17f05eabbb0dd6a501dd1f3f7949391e9c8e69c9e24d6
3fb44d8b4046a1a7585c492c2a331dcc9f288dd4770739c7ae45361d6f6c5a3c8fad4fa8de5edc451dc41fda1e5b42edf781b7098d80e73d3b7d6bd5a7095382
8a5fafceff00a98b6dea42ba75fc1a5dd7da3421a86b524cecd7773043711ce3276fccee194631c638c74ae8f543aa4da54761a72b47757804535d71b6d63c7c
ec39e5bb0c7bf238aa7af5edff00f6d691a769f3ba79b1cf24d1a5c987780176e582b11839edcf359fadeb5a8695737902dfcc9f67d03cd189b7ed9da70a0ee2
064e0f5c0e3b53f7a6d3d05b973c3fa55ee85a95c58ec8df4e9a359627850a24720f959769666c9001ce4f35269867b0f136af7536977b24777751b45243e595
daab8c9cb823f2acbb9d6ee2dfc29a9de47ada4d7715ac614c3a91b82accea09c6c5dbd7d4f5357f5af105aa69da7258788214f3351822ba9edee065632ac5b2
474e9d686a6dbbadf4fc82c66f86f469ad5a35d47465ded3c8f217b181c61b381e697df8e47f0fb559b6d235368d3c31776e5745b6ba695a7f3013711021a384
8eb8049ce7fba00c62afe8d793cfe21b88acf50b8d4f4a8ed94fda67f99567ddf751c81b86de7bf35ba762f24973f90a99d49296a26da392d274a9a3d7ef2e2e
748e26d564b98e4367049b232c0a9f359c32818ce02f1db93563c3d2cda45bdd4377a6dd472cf7b34c2526331aab1c8fe2cf6f4adf96e0b32c48a5dd8e163419
24fd2b52d34bb7d2a23aaeb72c6863e5509cac67b7fbcde98fc33512aba7bcb71abc89343d2fecc1b57d4c88df6964121c794b8e59b3d0e3f2154269e7f175fa
a44ac9a5c0d95c8c199bfbc7dbd07e27d877bef17dc28647b6d31482b11e1a4f76ff000aea6cece2b3856389400076ae694b91ddfc5f91b25a590fb6b74b6856
3400002a6a28ae57a9614514500145145001451450014514500145145001451450057bdb1b6d42d9adaee159626eaadfd3d2bcc7c4bf0daeacd9ee748cdc43d4
c5fc6bf877fc3f4af56a2803e6f74789ca48a55875045745e1ff000b6b7a9159638bc8b56eaf3f0ac3d97a9faf4f7af5eb8d0f4bb9bc5bc9ac607b85e4485012
0fafd7dfad48f6ccbf77e615e6e3abe26946f4617f3ff805c545ee731e1a41e149bfb2a694b5a5c3ee8e46000490f6e3a03fcfeb5d9561ea3a7477b034522672
31cd66da78865d0245b2d61da4b61c4770016641e8c07247bf5fad2cbb1cf15ee4fe3fcc538f2fa1d6ba2c88c8ea195860823208ac29ec6eb48dd25a2bdcdaf5
f257974fa7f787ebf5adb8678ae6159a095258dc655d1810c3d88a7d76d6a14eb4796a2b8936b63916d70ddae202231dff00bdff00d6a80b12724924f726ba7b
dd1acafd8bcb11497fe7ac676b7e7dff001cd654de1cbe88ff00a2de472aff007675c11f88073f90ae9c352c3d08f2d28f2ff5dcc26a72776ee6683f30fad2ca
7f7adf5a91ecf56806e974f2403d630aff00a0e7f4a8e69278c9692d268d73d5e023f522baf7d8cacd0de68e4f1cd423518b38f3947e94e17d1b71f6818eff00
3702aacc44e91313f30217b934ac096c96551d86738fcaabfdb2297f770ee907fb2324d4a21bc760ab617393dcc4c07e6452b771d85ca0eaccdfa53f7f963254
03d8753f8d4d1e91aabb616d9223fdf96418fc02e6ad43e177721af2f58e792b0ae3f539cfe42a1ca2b765284bb18d35caa9dd23e49ab569a3ea37e41286d613
fc728f98fd17afe78ada91744f0e422794c56e4e40773ba46f61d49fa0ac99b59d5f5d630e950bd95b1e0cf20fde30f61d17f53f4a149cbe1565dd94a9a5b962
7bcd2bc2e0c36d1b5dea0e3fd586cc8dfef1fe11d3fa03556d746bfd72ed6fb5a7dc1798e05e123fa0f5f73cd69e8fe1ab5d386f65f325639676e493ea4d6d80
00c0acdd451f877ee6a911c16f1dbc61235000f4a968a2b9ca0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2801af1ab
82186735917be1ab3bb56c1652debc8ad9a288fbaef1dc4d27b9c47fc231ace892b4da25eec0c72d16728df553c7e3d6aec1e2ebdb43e5eb7a3cd111c19ed86f
4fa953c8fc335d55472411ca30e808f715bbaca5f1abfe64a8db62958788349d4caada5fc2eec32232db5ffef9383fa568d63de78634dbc07ccb75e7dab3ff00
e114b8b550ba7ea7776c8bf763495820ff0080f4a5cb4decec3bb3a8a2b9836de2b85b29a9a4c07f0c90260fe40506f7c5a8706db4f6fa46e3ff0066a5ecbb34
3b9d351815cd7f6878af1ff1e5639fa3ff00f1549f6cf173f020d3e3cf7f2dc91ff8f53f64fba0b9d350582a92c4003a935cb7d87c55720acdac794add445122
e3e87191f9d2af8312e191b51bcb8bc64fbbe7ca5f1f4c9a3d9c56f2fb82ecbd77e2dd1ad4ed4b9fb5c9da3b51e613ed91f28fc48ace6d63c43ab9d96168ba7c
27fe5a49f3c87f0e83f5adab4d0ac2cc01140a31ed5a0a8a830a00a39a9c7e157f5159b39cb0f08c2937daafa57bab83d64958b13f89ae8628238542a28007a5
494544a7296ec695828a28a818514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514
005252d140098a314b45001451450014514500145145001451450014514500145145001451450014514500145145001451450014514500145145001451450014
51450014514500145145001451450014514500145145001451450014514500145145001451450014514500145145001451450014514500145145001451450014
51450014514500145145001451450014514500145145001451450014514500145145001451450014514500145145001451450014514500145145001451450014514500145145007fffd9}}{\nonshppict{\pict\picscalex100\picscaley100\piccropl0\piccropr0\piccropt0\piccropb0
\picw3747\pich2858\picwgoal2124\pichgoal1620\wmetafile8\bliptag-1949911779\blipupi200{\*\blipuid 8bc6b51d929834575ecee364e2643d80}
010009000003b667010000009167010000000400000003010800050000000b0200000000050000000c026d008f00030000001e00040000000701040091670100
410b2000cc00d8001c01000000006c008e0000000000280000001c010000d80000000100180000000000e0ce020000000000000000000000000000000000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffff
f7fffffffff7f7fffff7fff7effff7efffefefffefefffefe7ffefefffefeffff7efffefefffefefffefeffff7efffefeffff7efffefeffff7f7ffefeffff7ef
ffefeffff7f7ffefeffff7f7fff7f7fffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7
fffffffff7f7fff7f7ffefe7ffefefffefe7ffefefffe7deffe7def7dedef7dedeefd6d6efd6d6efceceefcecee7ceceefceceefceceefceceefceceefd6d6ef
ceceefceceefceceefceceefcecef7d6d6f7d6d6f7d6d6f7d6d6f7dedef7dedeffe7e7ffe7e7ffefefffe7efffefefffefeffff7f7fff7f7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffeffffff7fffffffffffffffffffffffffffffffffffffffffffff7ff
fffffffff7fffff7ffefeffff7efffefe7ffe7e7ffdedeffdedef7d6d6f7ceceefc6c6efc6c6e7bdbde7bdbdd6adadd6adadd6a5a5d6a5a5ce9c9cce9c9cc69c
9cce9c9cc69494c69c9cc6949cce9c9cc69c9cce9c9cc6949cc69c9cc69494ce9c9cce9c9cd6a5a5ce9c9cd6a5a5d6adade7b5b5e7b5b5efbdbdefbdbdf7c6ce
efc6cef7d6d6f7d6d6ffdedef7e7e7ffefefffefeffff7f7fff7f7fffffffffff7fffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffeffffff7ffffffff
fffffffffffffffffff7fffff7fff7f7fff7efffefe7ffefe7ffdedeffd6d6f7cecef7cecee7bdbde7b5b5deadaddeadadd6a5a5ce9c9cc69494bd8c94b5848c
b5848ca57373ad7b7ba57373ad7b7ba57373ad7b7bad7b7bad7b7bad7b7bb57b84b57b84b58484ad7b84b57b84ad7b7bad7b7bad737bad7b7ba57373a57373a5
7373ad7b7bad737bbd7b84c6848cd6949cd6949cd69c9cce9ca5deb5b5deb5bde7c6c6e7cecef7dedef7dedef7e7e7f7e7e7fff7f7fff7f7fffff7fffff7ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7fffff7ffffeffffffffffffffff7fffff7ffefefffefe7ffe7deffdedef7d6d6efcecee7bdbddeb5b5d6ada5d6a5a5ce9c94c6948cb58484ad
7b7ba57373a57b7ba57373a57b7bad7b7bbd8c94c69c9cceadb5ceadadceb5b5ceb5b5d6bdbdceb5bdd6bdbdd6bdbddebdc6d6bdbddebdc6d6bdc6dec6c6d6bd
bdd6bdc6d6bdbdd6bdbdceb5b5ceb5b5ceb5b5ceb5b5c6a5a5ce9ca5bd8484bd7b84ad6b73a56b73a56b6ba57373a5737bad8484b58c94bd9c9cc6a5a5d6b5ad
d6bdbde7cec6e7cecef7ded6f7e7deffefefffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fff7efffefe7f7dedef7ded6e7cec6e7c6c6d6b5b5d6b5adc6a59cc69c
94b58c84ad7b7b9c6b6ba57373ad7b7bc69494ceadadd6bdbdcebdbdd6c6c6d6c6c6e7d6d6efdedeffefefffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7e7dee7cecedebdbdceb5b5d6bdbdce
b5b5bd9494a57373946b6b9c6b6ba57b7bad7b7bbd8c8cc69494d6ada5deadadefbdbdf7c6c6ffd6d6ffded6ffe7e7ffefeffff7f7fff7f7ffffffffffffffff
fffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffefe7ffe7e7ffded6ffd6d6e7c6c6debdbd
ceada5c6a59cb5948cad8c849c7373946b6b9c736bc69c94ceb5add6bdbdd6c6bde7ceceefd6d6fff7f7fffffffffffffffffffffffffffffffffffffffff7ff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7fffff7f7e7dee7cececebdbdd6c6bdd6b5b5c694949c6b6b9c6363ad7373c68484c68484de9c9ce7a5a5efbdb5
efc6bdffd6ceffded6ffefe7ffefe7fff7f7f7fff7fffffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffff7efffefe7ff
ded6ffd6d6f7c6c6efb5b5d69c9cb58c8cad84849c7b738c6b639c7b73bd9c94d6bdb5d6c6bddececef7e7defffff7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7dedee7ceced6
bdbde7bdbdc68c8cad6b6bad6363b57b7bc68c8cce9c9cd6ada5e7bdb5efcec6efd6d6efdedeffefe7f7f7effffff7fffff7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7
f7fffff7fff7effff7eff7ded6e7cec6deb5b5deadadd69c9cc68c8cb57373a563638c5a52ad8484cea5a5debdbddececef7e7e7fff7f7ffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffff7ffffff
fffff7fffffffffffffffffffffff7fffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffefeff7dedee7cec6e7bdbdc69494a5736b8c5a5a9c7373b58c8cbd9c94c6a5a5debdb5e7cec6f7ded6
ffe7deffefe7ffefe7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7fffff7fffff7fff7efefd6cee7c6bde7bdb5d6adadc69494bd8c84a56b6b8c5a5a8c5252bd8484deb5ade7ceceefdedefff7f7ff
f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefefe7d6d6decec6b5
9c948c6b638c6363a57b73bd8c84d6a59ce7adadf7c6c6ffd6ceffe7defff7effffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7fff7eff7efdef7efdeefdecedec6b5ceada5d6ada5c69494b5847bad73739c5a5a844a4aa57373cea5
a5e7ceceefe7e7fff7f7fff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffeffffff7fffff7ff
fff7fffff7fffffffffffffffffffff7fff7eff7efefe7d6d6d6b5b5b58c8c9c6b63945a5ab57b7bd69494f7adade7b5b5e7cecee7decef7efe7fff7efffffff
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffff7fffff7fff7e7ffe7deefd6c6e7cebdd6bdadceb5a5c6a594bd948cad7b73
a56b639c635a9c6363bd8484efbdbdf7e7e7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7fffffffffff7fffff7ffffeffffff7ffffeffffff7fffff7fffffffffffffffffffffffffffffffffffff7efffefe7efceced6a5a5ad7373a56b63ad
7373c68c8cceada5d6bdb5e7cec6f7dedeffe7defff7effff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffefffffefffffe7ffefe7f7efdeefdee7e7d6ded6c6e7cebddebdadde
b5a5d6ad9cce9c8cb58473b58473a5736b9463529c635ac6948cefcec6ffefeffffff7fffffffff7f7fffffffffffffffffff7f7f7ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ffffeffffff7fffff7fffffffffff7ffffffffffffff
fffffffffffffffffffffff7eff7dededeb5adb58c84946b6ba57b73b58c84cea59cdeb5adefcec6f7d6d6ffe7e7ffefeffff7f7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffefffffe7ffffdeffefd6f7
e7c6decec6d6bdbdbdadcebdadd6b5a5d6ad9cd69c8cce8c7bce846bbd7363945a429c6352cea594f7e7defff7effffffffffffffffffff7fff7ffffffffffff
fffffffffffffffffff7fffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefdee7cec69c736bad736ba5736bb5847bc69c94deb5b5ef
c6c6f7ded6ffe7e7fff7f7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffefffffe7ffff
d6ffffd6ffffceffffceffffbdfff7b5f7efade7dea5dece9cc6b5a5bdadb5b5a5c6ad9cc69484c68473b57363a563529c5a52d69c94f7e7d6fffff7fffff7ff
fff7fffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffff
f7fff7efefc6bdbd8c849c6363a56b6bb58484ce9c9cdeb5b5f7ceceffd6deffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7ffffefffffe7ffffd6ffffa5ffff94ffff8cffff8cffff84ffff7bffff7bffff84ffff84f7f78cefe784c6bd94ada5a5948cb58473ad6b5a9c63
5aad8c84efded6fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ff
efdef7d6c6debdadcead9cb59c8cbd9c8cb59484b59484ad9484b59c8cb59484b59c8cad9484b59484b59c8cc6a594c6a594bda594b5948cad9484ad948cbd9c
94bd9c94ceada5d6bdadefd6c6f7e7d6fffff7fffff7fffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffff7fffffffffff7fffffffffffffffffffffffff7f7f7d6debd848c9c5a63a5636bce8c94de9ca5e7b5b5f7ceceffe7e7f7efe7fffff7f7
fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7fffffffffffffff7ffffdeffffd6ffffc6ffffb5ffff9cffff7bffff63ffff63ffff5affff5affff5affff5affff5af7f763efef
6bdede8cded68cada5847b7394635a9c635ad6adadffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7ffffeffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffff7fff7effffff7fffff7fff7efe7ce
bdc6a59cad9484bd9c94b59484bd9484bd9484c69c8cc69c8ccea594cea58cd6a594cea58ccea58ccea58cd6ad94d6ad94deb59cdeb59cdeb59cd6ad94dead9c
d6ad94deb59cdeb59ce7bda5d6ad94d6ad94cea594cea594cea594cead94cea594cea594bd9c84bd9c84ad8c7bb59484bd9c84d6b5a5dec6b5f7efe7fffff7ff
f7f7ffeff7fffffffffffffffffffff7fffffffffffffffffffffffffffffffff7ffffffffffeff7f7fffffffffffffffffffffffffff7f7f7ced6c68c8c945a
5aad7373c68c8cc69c94d6ada5efdecef7e7defff7e7fffff7fffffffffffffffffffffff7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7ffffeffffffffffffffffffffffffffffffffffff7ffffefffffd6ffffbdffffa5ffff94ffff7bffff73ffff63ffff63ffff5a
ffff52ffff52ffff5affff52f7f763efef6be7de7bcece6ba59c7b948c948c84c6a59cf7ded6fffffffffffffffffffff7ffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffffffffffffffffffffffffff7fffff7fff7f7
fffff7decec6ceb5a5b59c8cad9484ad9484b59c8cc6a594d6bda5debdadd6b5a5d6b59cdeb5a5d6b59cdeb5a5d6b59ce7bda5e7bda5e7bda5debda5e7bda5e7
bda5e7c6ade7bda5efc6ade7bda5efc6ade7bda5e7bda5e7bda5efc6adf7ceb5f7ceb5e7bdade7bda5d6b59cdeb5a5d6ad9cd6ad9ccead9cdebdadd6b5a5d6b5
a5cead94cead94cead94d6b5a5c6a59cbd9c94b5948cbda59cceb5adefd6d6ffefe7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffe7f7ef
f7ffffffffffffffffffffffffffffffffffefcecead84849c736bb58484ce9c9cd69c9cf7bdbdffd6ceffe7e7ffefe7fffffffffffffffffffffff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeffffff7fffff7ffffefffffefffffefffffdeffffd6ffffbdffffa5ffff8cff
ff7bffff63fff75affff52ffff5affff5affff52ffff52ffff52ffff52f7ef5aefe75ad6d66bc6bd6ba5a573948c848484bdb5adf7efe7ffffffffffffffffff
fffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7
fff7eff7effffff7f7efe7e7cec6c69c94b58c84b58c7bb59484ad9484bda594c6ad9cd6b5a5ceb5a5d6b5a5d6b5a5e7c6b5debdaddebdaddebda5e7bdaddebd
a5debda5debda5e7c6ade7bda5e7c6addebda5e7bda5debda5e7bda5deb59ce7bda5e7bda5efc6addebda5e7bda5e7bda5efc6adf7cebdefcebde7bdade7bdad
debda5e7c6ade7bdade7bdadcead9cdeb5a5debda5debdadd6b5a5d6b59ccead94debda5debdaddebdadcead9cbda594ad9484b5948cb59c8cbda59cdec6bdf7
f7e7f7f7effff7efffefe7fffff7fffffffffffff7fffff7fffff7fffff7fff7f7f7effffffffffffffff7efceb5ad9c7373a56b6bc6848cd68c94efa5adf7c6
c6ffd6d6ffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffff
deffffbdffffadffff94ffff84ffff73ffff63ffff52ffff52ffff42ffff4affff52ffff5affff52ffff52ffff52fff75af7ef5aded66bc6bd6ba59c738c8c8c
948cd6d6cefffffffffffffff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ff
fff7fffffffffffffffffffffffffff7fffff7f7efe7e7d6cebdad9cad9484b59484cead9cd6b59cd6b59cd6b5a5d6bdadd6b5a5d6bdadd6bda5d6bda5d6bda5
e7c6adefd6bdefceb5debda5dec6a5debda5e7c6ade7c6ade7c6addebda5e7bda5debda5e7c6addebda5e7c6ade7c6ade7c6ade7bda5e7c6ade7c6ade7c6ade7
c6ade7c6ade7c6adefcebdefceb5efcebde7c6b5e7c6addebdade7c6b5e7c6ade7c6ade7c6adefc6b5e7c6ade7c6ade7c6adefc6b5debda5debda5e7c6adf7d6
bdefceb5dec6adceb59ccead94c6ad94b59c8ca58c73b59c8cd6bdadffe7d6f7f7e7ffffeffffff7fffffffffffffffffff7fffff7ffffeffff7ffffffffffff
ffffffffefefd6adadad6b6bbd7373ce7b84dea5a5e7bdbdf7d6d6f7ded6ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffeff7f7d6f7f7bdf7f7adffff94ffff7bffff63fff75affff4affff42ffff42ffff42ffff42ffff42ffff4affff52ffff4af7
ef52f7e75ae7d663cebd63a59c6b948c8c948cded6d6fffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffeffffff7ffffeff7f7fff7f7f7efefe7d6cec6ada5b5948cb59484cea594cead9cd6b59cceb59cd6bda5d6bda5de
c6addebda5dec6ade7c6ade7ceb5dec6ade7c6ade7ceb5f7d6bde7ceb5e7ceb5e7ceade7ceb5dec6a5dec6addec6ade7c6ade7c6ade7c6ade7c6ade7c6addec6
ade7c6ade7c6ade7c6addebda5debda5debda5e7c6addebda5dec6add6bda5e7c6b5e7ceb5efcebde7c6b5e7c6add6bda5debdade7c6adefc6b5e7bdade7c6ad
debdade7bdaddeb5a5e7bda5debda5debda5debda5efceadefceadefceaddebda5d6b59cd6b59cdebda5d6b59cc6a58cb5947bbd9c84c6ad94efd6ceefded6ff
f7effffff7f7fff7efffefeffff7effff7f7fffffffff7fffffffff7ffffd6dece949cb5737ba56b73bd8c8cd6adadefc6c6efd6d6ffefeffff7f7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffefe7efc6c6ce849c9c7badad7bcece7befe773f7f76bffff52ffff52ffff4affff
42ffff42ffff42ffff39ffff4affff52fff752efef5aded663cec663ad9c63948494a59cefefe7fffffffffffffffffffffffff7ffffffffffffffffffffffff
fffffffffffffffffffffffff7f7fffffffffffffffffffffffffffffffffffffffffffffffff7f7f7fff7f7f7efe7decec6c6ada5bd948cd6a594dead9cefbd
a5efbda5f7c6b5efceb5efd6bde7d6b5efdebdf7d6bdf7d6bdefcebdf7d6bdefceb5efd6b5efd6bdffdec6efd6bdefd6bdefd6b5f7dec6f7debdefdebdefd6b5
efd6bdefceb5efd6b5efceb5efd6b5e7ceb5efceb5e7ceadefceb5e7ceb5e7ceb5e7c6adefceb5e7ceade7ceb5dec6addec6addec6ade7ceb5efcebdefd6bde7
c6b5dec6addebda5e7c6addebdade7c6ade7c6adefceb5efc6adefc6adefc6adefceb5e7c6a5dec6a5debd9cefceadefceadf7d6b5efc6ade7c6a5d6b59cdeb5
9cd6b59cd6b59cd6ad94d6ad9cc6948cce9c94deb5adf7ded6f7efe7fffff7fffffffffffffffffffffffffffffffff7f7fffffffff7ffe7c6c6bd8c94a57373
ad847bc69c9ce7bdbde7cecef7dedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7c6c6c69494946b737352636b21424a21
5a5a4a94946bc6ce6bdee773ffff63ffff52ffff4affff4affff39ffff42ffff4affff52f7f75adede63cec663ada563948494a59cefefe7fffff7ffffffffff
fffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efded6e7c6bd
bd9c8cbd9484cea58ce7b5a5efbda5f7c6adefc6adf7ceadefc6adefc6addec6addec6add6bda5e7c6addebda5e7c6addec6a5e7c6addebda5dec6a5e7c6adef
d6bde7ceaddec6add6bda5d6c6a5d6bda5dec6addec6ade7c6ade7c6ade7ceb5e7ceadefceb5e7ceb5efd6b5e7ceb5efceb5efd6b5f7d6bdefd6bdefd6bde7ce
b5e7ceb5dec6ade7ceb5e7ceb5efd6bde7ceb5e7ceb5dec6addec6ade7c6ade7c6addebdade7bdaddebda5e7bdade7bda5e7c6a5debd9ce7c6a5dec6a5e7c6a5
debda5e7c6ade7ceadf7d6bde7c6ade7bda5debda5e7c6addebda5debda5dead9ce7ad9ce7a59cd69c94bd9484c6ad9cdecec6efe7def7efe7fffff7ffffffff
ffffffffffffffffffffffffffffefd6d6c6ada594736b9c7373b58c8cceadaddeb5bdffdedeffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7dede
dea5adad6b7b7b5263634a525a424a4a424a52394a52394a5a315a63528c946bbdc67beff773f7f763ffff52ffff52ffff4affff5affff63e7e76bd6d673bdb5
6b948c8ca59cefefe7fffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffefefefd6cebdc69c8cce9484ce9c8cd6a58ce7b59ce7bd9ce7c6a5e7c69cefc6a5e7c6a5e7ceade7c6a5e7c6addebdade7c6ade7c6ade7c6
ade7c6a5e7c6addec6a5e7c6a5dec6a5efceb5efd6b5e7ceb5d6c6a5dec6add6c6a5dec6add6c6a5dec6addec6ade7ceaddec6ade7c6addec6ade7ceaddec6ad
e7c6addec6ade7c6addec6addec6addec6ade7ceb5e7ceade7ceb5e7ceb5efd6bdefd6bdefd6bdefd6bdefd6bde7ceb5efceb5e7ceb5efceb5e7c6adefc6ade7
c6ade7c6addec6addec6add6c6a5dec6addec6a5dec6addebda5dec6adefceb5efd6bdefceb5efceb5e7c6ade7c6addebdadefbdadefb5a5f7bda5efb5a5e7b5
a5d6a594c6a594bd9c8cd6bdadefdecefff7effffff7fffffffffffffffffffffffffffffffff7f7dec6c6b594949c736bb58484d69ca5e7b5b5ffced6ffdede
ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffdededebdbdbd8484845a6b6b425a5a42525239424a4a424a4a424a524a524a42524a4a52314252315a6b4a8c9c6bc6c663dee76b
f7f76bf7f763f7f76bf7ef73ded66bb5b573a59c84948ce7e7defffff7fffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffd6dede9cadad948c84b59484d6ad8cdeb59ce7bda5debd9ce7c69ce7c69ce7c6a5dec6a5e7c6a5
dec6a5e7c6addebda5dec6ade7c6ade7c6addebda5e7c6a5dec6a5e7c6a5debd9cdec6ade7ceadefd6bddec6addec6a5d6bda5dec6add6bda5d6c6add6c6a5de
c6addec6a5dec6addec6a5dec6addec6a5dec6addec6a5dec6add6bda5dec6a5debda5dec6addec6a5dec6addec6addec6add6c6a5dec6ade7c6adefd6b5efce
b5efd6bdefceb5f7d6bdefceb5efcebdefceb5efceb5e7c6ade7c6add6c6addec6add6c6a5dec6add6c6a5dec6add6bda5dec6addec6b5efd6bdefcebde7c6b5
debdaddebdaddeb5a5efbdadefbda5f7bdade7b59ce7ad9cd6a594d6ad9cc69c8cc69c94ceb5a5e7d6ceefe7defffff7fffff7fffffffffff7fffff7fffff7ff
efefc6a5a5b57b7bb5737bc68484de9ca5f7c6c6f7dedeffe7e7ffefeffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffefefefcecece9494946b6b6b5a5a5a4a5252425252424a4a4a4a52524a4a5a4a525a4a525a4a
5252425252525a394a52214a5218525a428c9463bdc673d6d673e7de84e7e773bdbd73a59c7b948cd6d6d6ffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffe7f7f7b5d6d684adad84adad94b5adb5bdadbdbda5cec6a5ce
c6a5deceaddec6a5e7cea5e7c6a5e7c6a5e7c6a5e7c6addec6a5dec6add6bdaddec6b5dec6ade7c6ade7c6a5e7ceade7c6a5e7c6a5dec6a5efceb5efd6bde7ce
b5d6c6a5dec6addec6addec6add6c6a5dec6addec6ade7c6addec6a5e7c6addec6ade7c6addec6a5e7c6addec6a5dec6addec6a5e7c6addec6ade7c6addec6ad
dec6addec6a5dec6add6bda5dec6ade7ceadefd6bdefd6b5dec6addec6ade7ceade7c6adefceb5efceb5f7d6bdefd6b5e7d6bde7ceb5e7ceb5dec6b5deceb5de
c6addec6b5d6bda5dec6addec6b5e7cebde7cebde7cebddec6b5dec6addec6a5e7c6ade7c6adefc6ade7bda5efbda5e7b5a5efb5a5dea59cce9c94bd948ccead
a5decec6f7efe7fffff7fffff7fffff7fffffffff7f7ffffffe7c6c6bd8c8ca56b6bbd848cce949cdeb5b5efcecef7e7e7fff7efffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7d6d6d6a5a5a57b7b7b6363635252524a4a4a4a4a4a
4a4242524a4a4a4a4a524a5252424a524a524a4a4a524a5242424a424a5242525239525221424a3963635a8c8c84bdbd7bb5b58cb5ad7b948cb5bdbdffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7ffffefffffc6e7e78cbdbd6bad
ad84cece8cdede94dede9ce7d6a5e7cea5d6bdadceb5b5bda5c6c6add6c6a5e7c6ade7c6a5efc6ade7c6a5e7c6add6c6add6c6adcebda5dec6addec6a5e7c6a5
dec6a5e7c6addebda5e7c6ade7ceadefd6bddec6addec6add6bda5dec6add6bdaddec6add6bda5dec6addebda5dec6addebda5dec6addebda5dec6addebda5e7
c6addec6a5e7c6addec6a5e7c6addec6a5e7c6addec6a5dec6addec6a5dec6add6bda5dec6ade7ceb5efd6bde7ceade7c6addebda5dec6addebda5dec6addec6
a5e7ceaddeceade7ceb5deceb5e7ceb5deceb5e7ceb5e7ceb5e7cebdd6c6add6bdadd6bdade7cebde7cebde7cebdd6bdadd6c6a5cec6a5dec6a5dec6a5e7c6ad
e7bda5efbda5e7b5a5efb5a5e7b5a5dead9cc69c8cbda58cceb5a5ded6c6fff7e7fffff7fffff7fffff7fff7f7fffff7ffe7e7c6a59c9c6b6bad7b7bbd8c8cce
adaddec6c6f7dedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7c6c6c694
94947373735252525252524a4a4a524a4a4a424a5a4a4a524a4a524a524a4a4a4a4a4a424a4a4a5252424a4a42524a394a4a4a52524a4a4a4a5252525a5a6b73
6b6b736b63736b737b739ca59cefefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7ffffefffffb5d6de73adb55aadad73d6d673e7e77bf7f773f7f773fff77bfff78cf7ef94e7d69cd6c6a5c6b5c6c6b5cec6addec6ade7c6ade7c6ade7
c6ade7ceb5d6c6add6c6addec6ade7ceaddec6a5e7ceaddec6a5e7c6addec6adefceb5efd6bde7ceb5dec6addec6addec6addec6addec6addec6addebda5e7c6
addec6a5e7c6addebda5e7c6addec6a5e7c6addec6a5e7c6ade7c6ade7c6addec6a5e7c6addec6a5dec6addec6a5e7c6addec6addec6addec6ade7ceb5e7ceb5
efd6bde7ceaddec6add6bda5dec6addec6addec6add6c6a5dec6add6c6a5e7ceaddec6ade7ceb5e7ceb5efd6bde7cebde7cebde7ceb5e7cebde7cebde7d6bde7
ceb5e7ceb5cec6a5d6c6a5cec69cdec6a5dec6a5e7c6ade7c6a5efc6ade7bda5e7bda5deb59cdeb59ccead94cea594bd9c8cd6bdb5efded6fffff7fffff7ffff
fffffff7fffff7fffff7d6bdbdad8c84947373ad8484d6adade7bdbdffd6deffe7effff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7
f7ffffffffffffffffffd6d6d6bdbdbd7b7b7b6b6b6b4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a524a4a524a4a524a4a4a4a4a4a4a4a424a4a4a5252424a4a42524a
42524a4a524a4242424a4a4a635a527b73738c7b737b635a6b524a735a5aded6cefffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7ffffe7ffffa5cece7bb5b563b5b56bd6d663e7e75af7ef52f7f75affff4affff52ffff63ffff7bffff8cef
ef9ce7d69ccebdb5ceb5c6c6adcec6add6bda5e7c6ade7c6a5e7c6ade7c6a5e7c6addec6a5dec6addec6ade7c6addebda5dec6ade7ceb5f7d6bde7c6addec6ad
debdade7c6b5debdaddec6addebdade7c6addebda5e7c6addec6a5e7c6addebda5e7c6addebda5e7c6addebda5e7c6addec6a5e7c6addebda5debda5debda5de
c6a5debda5dec6addec6a5e7c6addec6a5e7ceade7ceb5e7ceb5dec6a5dec6add6c6a5deceaddec6addec6addebda5dec6a5debda5dec6a5dec6a5dec6addec6
a5dec6ade7c6adefd6bde7ceb5e7ceb5e7ceb5efd6bdefd6bde7ceaddecea5d6c6a5d6c69cdec6a5dec6a5dec6a5debd9cdebda5debd9cdebda5debd9cdebd9c
d6ad94cead94b5948cbda59cd6bdb5f7e7defff7effffffffffff7fffffffffff7e7d6ceb59c9c9c7373a57373de9c9cefb5b5efc6ceefdee7f7f7f7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffd6d6d69c9c9c7373735a5a5a4a4a4a4a4a4a4a4a4a5252524a4a4a5252524a4a4a5252524a
4a4a4a4a4a4a4a4a4a52524a524a4a524a424a4a525252525a525a5a5a6b6b63847b737b736b846b637b524a6b3939ad8c8cfffff7fffffffffffff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffb5d6de73adad73bdbd84d6de84efef73ffff52ffff
4affff42ffff42ffff4affff6bffff7bffff8cffff9cf7efb5efe7bddececed6c6ceceb5ceceb5d6c6ade7c6adf7c6adffc6b5f7c6ade7c6addec6ade7ceadef
c6adefc6addec6ade7d6bdf7d6bdf7ceb5efbdadefc6b5e7c6b5e7c6b5e7bdade7c6b5e7c6ade7c6ade7c6adefc6adefc6adefc6ade7c6adefc6ade7c6adefc6
b5efc6adf7c6b5efc6adefc6ade7bda5e7c6addec6a5e7c6addec6a5e7c6ade7c6ade7c6addec6a5efceb5e7ceb5efceb5e7c6ade7c6addec6ade7ceade7c6ad
f7ceadefc6adefceade7c6a5efc6ade7c6adefc6ade7c6adefceb5e7c6ade7ceb5e7c6b5efcebdf7cebdffd6bdf7d6bdf7d6b5e7ceade7c6a5dec6a5dec6a5de
c6a5dec6a5d6c6a5dec6a5dec6a5e7c6addebda5dec6a5deb59cd6ad9cc69c94b59c8cc6ada5decec6fffff7fffffffffff7fffffffffff7ffefefceb5b5b57b
7bad6b73d68c94deadade7cecee7dedefff7f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefbdbdbd8c8c8c6363635252524a4a4a4a4a4a4a4a
4a5252524a4a4a4a4a4a4a4a4a525252524a4a4a4a4a4a4a4a5252524a524a4a4a4a424a4a525a5a63636373736b7b737394847b7b736b63524a634a42633939
5a3131efdedefffff7fffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffa5c6ce73
b5b563adad9cdede84a5ad426b6b5ad6ce5affff42fff742ffff52fff76bdede396b734a6b734273734a6b6b5a6b6373636384635aadad9cbdd6bdb5ceadc6bd
a5f7c6b5bd6b6394524adea594dec6adcead94a55a4aad6352deceadd6ceadefc6b5c67b6bbd5a52ef948cdea59c84524abd8473efc6ade7c6addead9cb5736b
944a42d68c7bf7b5a5f7bdadd69c8cad73639c524aa55a4a9c4a42944a42ad7363efc6addec6addec6addebda5ad846b845a4abd947befc6ade7bdade7bdadef
c6adb58c7b8c6352bd9484c694848c5a4a94524a9c524a94524a945a4ab58473e7b5a5b56b639c4a42945a4a8c5242845242946b5acea5948452429c5a4aa55a
52a56352ad7363ce9484efc6adf7d6bde7bda5dec6addec6addec6add6c6a5dec6addec6a5dec6a5d6bd9cdebda5debda5debda5c69c8cc69c8cc69c8cdebdb5
f7ded6fffffffffff7fffffffffff7fff7f7e7cec6ad8484946363c68c8cdea5a5efc6c6f7d6d6ffefe7f7f7f7fffffff7ffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e7b5b5b5
8484846363635252524a4a4a4a4a4a4a4a4a5252525252525252524a4a4a525252524a4a5252525252525252524a4a4a4a52525a5a5a73737b737373736b737b
7373948c8484736b6b52525a42396b4a4a5a3939947b7bffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7fffff7ffffffffffc6d6de73adad63bdb57bdede9cdede9c949c1808185aada584ffff6bfff76bfff78cffff9cc6bd4208186331399494948c8c8c
ad949494636b632929736b63add6bdbddec6dedec6dead9c8431297b2929efb5ade7ceb5deb59c7b2110842110efdebddedec6f7cebda5524a841010e77373d6
a59c5a21189c5a4affcebdefbda5b57b6b732118731008bd6363ffb5b5c67b7b844239843939bd7373ce8c8cce94947b2921631818f7c6b5e7bdaddec6adf7d6
bdb58c734a1810a5735affc6b5f7bdadffc6b5f7c6b5ad7b734a1008ad7b6bbd8c84732121943939c67373c67373c67b73ce8c84f7c6bd8c3131730808bd6363
c6847bad6b63ce9484e7b5ad4a0808842921ce7b73bd6b63944a426b2921a56b63e7b5adffd6c6efcebdefceb5dec6addec6addec6a5dec6addec6a5dec6a5de
c6a5dec6add6bd9ce7bda5e7b59cdead94ce9484dead9ce7cebdfffff7fff7e7fffffffffffffff7f7efdedec6a5a59c636bc67b7be7a5a5efc6bdefd6cef7f7
eff7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7f7f7dedede9c9c9c7373735a5a5a5252524a4a4a4a4a4a5252525252524a4a4a4a4a4a4a4a4a5252524a4a4a5252524a4a4a5252525252
52636b63737b7b7b7b7b63636b636363635a5a8473738473736b52525a42396b4a425a393963424ae7ced6ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdee7ef94adb55aa5a55acec673efe79ce7e7d6b5c64210297b949cbdf7f7adf7efad
fff7b5fff7bdbdbd630810844a52cededecef7efe7f7f7e7dede84636b39292173635a9c847b9c736b8c42396b1010ad736bceada5e7cebdf7e7d66b18187b21
18f7d6c6d6c6adffe7d6945a52731818ce7b73debdad5a29188c5242ffc6adde8c7b8429217b29187b2118bd6b63f7a5a59442425a1810bd8c84f7cec6ffe7de
ffe7d67b3931520800f7c6b5e7b5a5ffd6bdefbdadd69c8c521808ad6b5af7b5a5ffc6b5ffc6b5ffcec6bd84844a0000a56b6bd69c947b2121b55252f7b5adff
cec6ffbdb5ffcec6ffded69442426b0800efa59cffd6ceffcebdffcec6ffd6ce4a10089c4a42ffd6ceffd6d6deada59c5a525a1810a57363efc6b5efcebde7c6
b5e7ceb5deceaddeceadd6c6a5dec6a5d6c6a5dec6a5d6bd9cd6c6a5debda5efc6ade7b59cdea594c69484c69c94cebdadfff7e7fffff7fffffffffff7ffffff
f7e7e7ceadadad6b6bbd847bc69494debdbdefd6cef7e7e7f7f7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6d6d69c9c9c6b6b6b5252525252524a4a4a5252524a4a4a525252525252525252525252
5252525252525252524a4a4a635a5a73736b7b7b7b7373736b6b736363635a5a5a525252737373847b7b6b635a634a4a6b524a6342395231317b6363ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefa5b5b57ba5a563c6bd5ae7d663f7
e7a5fff7dec6d64208185a525a424a4a5a5a5a526363a5c6c6d6c6c67b2131734a52a5e7e7a5fff7b5ffffc6fff7b5c6c65a42425a1821944a4aad5a5a732121
632921c6b5adced6cee7d6cebd948c5a10086b2118ad736bf7cebdf7d6ce9c736b632121bd8484dec6bd6b3929844a39efa5949c31299c4239c67b73844239a5
635aefa59c8c4239631818ce9c94f7deceb5a5947363524221085a1808f7ad9cefb5a5ffd6bdffc6b5e7a5946318106b2118944a397b3931ad635af7c6b5c69c
94520800a57373efb5b59c42396b1810844239844a427b4a39b58c84ffdecea5635a6b1008ce8c84ffd6cef7c6b5f7cebdffd6ce4a18108c3931ffd6ceffc6bd
ffded6cea59c4a1008845a4af7cebde7c6adefceb5e7ceb5efd6bde7d6b5e7d6b5e7ceade7ceaddec6a5dec6a5d6c6a5dec6a5debda5e7bda5e7b5a5deb5a5ce
ad94ad9484bdad9cefe7defffff7fffff7fffff7ffffffffefefdebdb5b58484a57b7bbd9494debdb5e7cec6ffefe7fff7f7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefcecece8c8c8c6b6b6b52525252525252525252
52524a4a4a5252524a4a4a5252525252525252524a4a4a5252526363637373737b737373736b6363635a5a5a4a52524a52524a4a52736b737b7b7b73636b5a4a
4a6b5252634a4a5a39315a3939bda5a5fffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffff
efffffbdd6d684a59c7bb5b56bcec663efe76bffefa5ffffcec6d6310810736373cec6ceb5adb52110184a5252deced66318315a4a5a8cefef7bffff84fff7a5
ffffb5f7f7948c8c6b2129c67384b5636b6321218c7b73bdefe7bdf7efdebdc66b21217b21217b21186b1818f79c9cffd6d6bd7b7b5a1018ad6b6be7c6bd7339
31842921a54a427b3129ce9484efc6b5845242845242e7ada59c5a5a5a1008c68c84debdade7d6c6cebda5cead9cd6a594ffbdadf7c6adefb5a5ffcebdefc6b5
5a10008c4239deb5a5dea59ce7ada5ffc6bdc6847b631810a5736bf7bdb59c4a427b3129bd7b73deb5adcea594debdadf7d6cea5635a520808bd8c7be7bdb5ef
bdadffd6c6ffe7d63910006b2921ffc6bdffc6bdffcebdce9c944210088c5a4aefc6b5e7c6ade7c6addec6addec6ade7ceb5e7ceb5efd6b5e7ceade7ceadd6c6
a5d6cea5d6c6a5dec6a5debda5e7c6addeb5a5ceb59cbdad94ad9c8cad9c8cded6c6fffff7fffff7fff7effffff7fff7efe7c6c6ad8484a57373bd8c8ce7b5b5
efceceffe7e7f7efeffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7cece
ce8c8c8c6363635252525252525252525252524a4a4a5252525252525a5a5a4a4a4a4a4a4a4a4a4a5a5a5a6b6b6b7b7b7b7b73736b63635a5a525a5a5a525252
525252525252636b6b7b7b7b736b6b5a52526352525a4242634a42634242523931f7dedeffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffeffff7def7ef7b9c9c739c9c84c6bd8cefe773f7ef73ffff94fff7e7eff73118214a4a52948c948c737b2110184252
5aceced64a2939294a525adede5afff763fff76bf7ef9cffffcee7ef84636b632931522129423139a5cec6a5fff7a5f7f742424a521821d6a5a5efd6d6631818
842931efa5adc67b845a1018b57373e7b5b58c4a426b10087b3121a5846befd6c6e7ceb58c6b5a7b4a39e7bdb5dea59c732929632118845a4aa58473c6ad94a5
846bad7363f7bdadf7ceb5efbdadffd6c6efcebd4a1008733121c68c7bb57b73b57b73e7b5adc69c94521810a56b63efb5ad9442426b2921a56b63a57b6b9c7b
6b9c8473efd6c6ad7b6b5a2118a57b6bd6b5a5e7bdadffd6cef7d6c6522921521810bd8473ad7363945a526329216b3929bd9484f7d6c6e7ceb5dec6a5d6bda5
dec6a5d6c6a5e7ceade7ceadefd6b5efd6b5e7d6b5ded6ade7d6b5dec6addec6addebda5debda5d6b5a5d6bdadbdad9cb5a594b5a594dec6bdfff7e7ffffffff
fff7fffffffff7f7e7cecebd8c8cb57b7bbd848cdeadadefcecef7e7e7f7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffefefefc6c6c68484846363634a4a4a5252525252525252524a4a4a5252524a4a4a4a4a4a4a4a4a5252525a5a5a7373737b7b7b73
73735a5a5a52525252524a5252524a4a4a4a4a4a4a4a4a63636b7b7b7b736b6b524a525a52525a524a5242395a42396b524a523931ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffb5b5b54a4a4a4252526b948c84d6ce8cffef63efde94ffff
e7ffff635a635a636b7373736b525a73737b8cb5bdb5dee763848c42949442d6ce63ffff63ffff6bffff7bf7f7a5ffff94c6ce638484526b7373a5a594efe794
ffff5abdbd39737b638c8cbdefe7cefff7bdc6bd635a5a9c8484b5848ca55263d68c94f7c6cec68c849c6b5a9c846bceceb5ceceb5deceb5b59484ad7b6be7b5
a5ffded6efcec6c69484844a39733929845a426b4229946b52f7ceb5d6b59cefcebdefc6b5f7cebd946b5a946b5a8c5a4a8c6352947363cea594cead9c8c6352
bd9484f7c6bdb57b73945a52946352946b5a8c6b5a947b6bd6c6adc69c8c845242b59484debdadf7c6bdefbdb5f7d6c69c7b6b84524a8c524a8c52429c6352a5
7363c69c8cefc6ade7c6b5f7debdefd6b5deceaddec6a5dec6a5d6bd9cdec6a5e7c6a5e7ceade7ceade7d6b5deceade7ceb5debda5debda5debda5e7c6b5debd
a5cead9ccead9cbd9c8cad8c84e7cebdffffeffffff7fffff7fffffffff7f7f7d6dece9494ad6b73b57b84d6adade7c6c6f7e7def7efeffffff7fffff7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7cecece8c8c8c6363635252525252525252525252524a4a4a5252525252525252
524a4a4a5a5a5a7373738484847373736363634a4a4a5252525252525a5a525a52525252525252526363636b73737b7b7b635a635a5252524a4a6352526b5252
5239315a39319c847bfffffffffffffff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f78c7b7b4a
3939524a4a424a4a396b6b63b5ad8cffef8cf7efd6ffffc6dedecef7f7bdefe7def7efc6efefadf7f7a5ffffa5f7ff7befef6bffff5afff76bffff6bffff7bff
ff73fff78cffff94f7f79cf7f78cffef84ffff8cffff8cf7ff8cf7f78cf7ef8cfff78cffff9cfff7b5f7efc6e7e7f7f7f7e7c6ceefc6ceffdedeffded6efcebd
e7d6c6c6c6b5ceceb5efdec6ffd6c6f7bdadffcebdffcebdffdeceffcec6f7e7d6efe7cef7d6c6efd6c6f7ceb5debda5e7ceb5debdadf7d6c6f7d6c6ffdecef7
decef7deceefd6c6efd6bdefd6c6ffe7d6efcebdefd6c6ffdeceffded6f7deceffdecef7ded6efd6c6dec6b5efdecef7ded6f7cebddec6b5e7c6b5efbdadffc6
bdffe7d6ffdecef7decef7e7d6f7d6c6ffdecef7d6c6f7ceb5efc6ade7c6ade7c6adefd6bddec6ade7ceade7c6a5e7c6ade7c6a5efc6ade7c6a5e7ceaddec6ad
efd6b5efd6bdf7d6bde7c6ade7bda5e7bda5e7bda5e7bdadd6b59ccead94cead94b58c7bdebdadfffff7ffffffffffffffffffffffffffdedece9c9cad737bbd
848cd6adade7c6c6ffe7e7fff7effffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7c6c6c67373735a5a5a525252525252
5252524a4a4a4242425252525252525252525252526363637b7b7b7373735a5a5a5252524a4a4a5252525252525252524a4a4a5252525252525252527373737b
7b7b5a5a635a5a5a5252525a5252635252634a4a5a3939422921e7cec6ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffbdadad6b4a4a63424263424a6b5a5a4a5252396363297b7363bdb5a5e7e7adefe794ffef8cfff78cffef84ffef7bfff78cffff
7bfff76bf7f773ffff73ffff6bf7f77bffff6bfff763ffff5afff773ffff7bffff7bffff6bfff77bffff94ffff94ffff8cffff6bfff752ffef63ffff6bffefa5
ffffb5fff7adefe7a5ceceb5bdbdd6c6bdf7cec6efbdb5e7c6b5debdadf7c6bdf7c6b5f7c6b5efb5adffc6b5f7c6b5f7c6b5f7d6bdefcebdf7d6bdefceb5e7bd
a5efc6ade7c6b5debdade7c6b5f7cebdefc6b5debdade7c6b5dec6adcebda5d6c6ade7d6bde7ceb5e7c6b5ffd6c6f7cebdf7ceb5e7bdadf7c6b5f7c6b5dec6ad
d6bdade7c6b5ffcebde7c6b5debdadf7b5a5ffb5adf7cebdefc6b5f7cebdefc6b5ffcebdffc6b5f7c6b5e7bda5efc6ade7bdaddebda5f7d6bdefceb5debda5e7
c6a5e7c6adefc6ade7bda5efc6ade7bda5efceb5e7c6a5efc6b5e7bda5ffdec6ffcebde7b59cefbdadf7bdadefb5a5e7ad9cdead9cce9c8cbd9484ceb5a5ffff
f7fffffffffff7fffffffff7f7fff7f7b5949c94636bb58484d6a5a5efc6c6ffefe7f7efe7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7
f7f7c6c6c68484846363635252525252524a4a4a4242425252526363634a4a4a4a4a4a5a5a5a8484848484846b6b6b5a5a5a5252524a4a4a5252525252525252
5252524a5a52525252525a5a5a6b6b6b7b7b7b6b6b6b5a5a635252525a525a5a4a526b5a5a634a4a634a4a523931ffefe7ffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ad8c846342396339396b4a4a6b525a5a52524a5a5a295a5a185a5231635a8c
c6bd94efde63d6bd73dece6bdece7be7de84efef7befe75acece73efe78cefefa5f7f77bd6de73e7e763e7de73efe76bded663cec663cece6bded673dede84de
ef73b5bd94dee78cffff5affef4afff763fff78cefe784cece7bded6a5ffefb5e7deb5b5adb5948cf7c6bdefbdb5f7c6bde7ada5d69c8cefb5a5efb5add6a594
dead9ce7bdaddeb59ce7c6adcead94bd947befbdadf7c6ade7b5a5efbdade7b5a5c69484d6a594d6a594d6ad9cdebdadefd6bdd6bdadd6bda5c6ad94c6a58cde
b5a5ffd6c6ffc6b5f7c6b5ffc6b5efb5a5c69c8cceb59ce7bdaddeb59cdebda5deb59cde9c8cf7ad9cdea594bd947bc69c8ce7b5a5ce9484d69c8cc68c7be7b5
9ccea58ccea594e7bda5e7c6adf7cebddeb5a5cea58cdead9cdeb59cf7ceb5f7bdade7b5a5d6a58cce9c8cc69484dead9cc68c7bffd6c6ffd6c6efad9cd69484
de9c8cd69c8cd69c8cc68c7bd6a594bd9484c6b5a5ffefeffffffffffffffffffffffffffff7ffc69ca5ad737bbd8484d6a5a5e7c6bdfffff7e7e7d6fffff7ff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7f7f7cecece8484845a5a5a5252524a4a4a4a4a4a5252525252524a4a4a3939395a5a5a7b7b7b8c8c8c6b6b6b5a5a5a
5252525252524a4a4a5252525252525a5a5a5252525252525a52525a5a525a5a5a8484847373735a5a5a5252525252525252525a5252635252634a4a634a426b
524af7f7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefd6d6a57373733939734a4a6352
4a635a5a5a52525a5a5a425a5a4a63638c737b42212929101831181831181831292921393994adb5738484213942638c94c6dee763637308182973949cadbdc6
42394218101829212929293110182121525a52849439293952424aadefe78cfff76bffe78cf7ef52525a31313963b5ad8ce7de9cdece526b5a523931bd9c94de
c6bdc6ada58c5a525a2118c6847bc6847b6b3929945a4ae7b5a5ffc6b5c684736321105a1810844a39efb5a5ffbdb56318104a08087329216321186318104a10
005a2918b58c7bf7ceb5efc6b5c694845a29188c4a39dea594ffc6b5ffbdb5ffc6b58c4a424a18089c7b63f7cebdffcebdf7d6bd9c73635208085a00006b2918
4a18086b4231946b5a7339295210005a21104a10085221107b4a39c69484e7bdaddeb5a57b4a394210004a1808ad7b6befb5a5ffc6b5efb5a57339295210005a
2110522110632918521808ffcebd9c524a5208005a1008733121632918844a39b58473c69c8cb59484decebdfff7effffffffffff7ffffffffffffffeff7bd8c
94a56b73bd8c8cd6adadceb5adffffefefefdeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffcecece8c8c8c6b6b6b52525252525252525252525252525252525252
52526b6b6b8484848484846363635252524a4a4a5252525252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a52525a5a5a5a5a5a7373737b7b7b6b6b6b5252525a5a
5a525252635a5a635252635a525a4242634a427b5a52fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffdebdbd9452527b3939734a42635252525a525a5a525a5a5a525252847b7b73424a4a08106b2931f7cecef7b5bdf7dedeefe7e7f7e7efad848c39
212984848c9c949c39213173737be7eff7f7d6e79c526b844252debdc6f7deefffeff7d6ffffdeffff846373421018737373b5e7deb5efe7adc6c63100104a31
42a5efe7adffffa5e7de526b63422929a59c94d6e7deced6ce7b5a5a522118c6948cefb5ad7b3931945a4ae7a594f7a59c9439317318185200008c4a42ffbdb5
8c4239520808ef9494ffdedeffe7e7f7c6bdb5736b632121d69c8cffcebdffd6c6ffe7d6bd9484521008ad635af7bdadf7b5ade7948c7b31296b3929deb5a5e7
bdade7bdadf7d6c6b58c73731810d6736bffefdeffe7d6ffdeceefcebd521000843931ffc6b5ffe7def7deceffcebdffc6b5f7bdb5ad7b6b5a29186b39295a29
217b4239dea594ffcebdffc6bd6b29296b2921e7d6ceffe7def7deceffd6c6ffd6c6b56b5a6b2110c68473ffdeceffd6c6f7bdadefc6addeb59ccea594ad8c84
d6c6b5fff7efffffffffffffffffffffffffffffffbd9494a57373b58c8cd6b5addec6bdffefe7fff7efffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdedede9c9c9c6b6b6b5252
525252525252525252524a4a4a4a4a4a5a5a5a7b7b7b8484846b6b6b4a4a4a4a4a4a5252525a5a5a5252525252525252525a5a5a5252525252525252525a5a5a
5252526b636384847b6b6b6b5252525a5a5a5252525a525a5a5252635a5a635252634a4a5a4239846b63fff7f7ffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffcea5a5944a4a7b31317b4a4a6352525a5a5a635252735a63736b6ba594945221293908089473
738c73738c7373736b638c8c84bda5a5b58c8c5229295a4a52524a5252424aa5adaddeefefffdee79c4a5a5a102173424a8c5a636352526b9c9cadefefceced6
6b39424218184a18184a21215210214a21298c9c9ca5ffff94fff7a5ded6636b635239319ca59ccefff7d6f7ef84847b421818bd8484f7b5ad8c4242944a42e7
a59c8c3129841010e7ada58c39316b2118ffd6c6732121731010ffada5ffc6bdf7a5a5a5524a7329217b3931ce9484efbdadf7c6b5ffd6c6efc6b5a563526318
085a10106b18106b1808631000bd8473efc6addeb59cefc6b5ffe7cec69484731808ad4a42ffcebdf7c6b5efd6bdefcebd8c42396310088c39319c52428c4239
a56352ffbdb5efb5ad945a52632918ceada5b594846b2921ad6b63f7bdb5ffefe78c4a4a4a00008c4242844a39844a42ce948cffc6bdce847b631808ad6b5aff
e7d6ffd6c6ffcebddebda5d6ad9ccea594c69c8cb59484ded6c6fffff7fffffffffffffffffffffffffff7f7a5848494736bbd948cdeb5adefcec6ffe7e7fff7
f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffe7e7e7a5a5a57373735252525252524a4a4a5252524a4a4a5a5a5a6b6b6b8484847373735a5a5a4a4a4a5252525252525a5a5a5252525a5a5a52
52525a5a5a5252525a5a5a5252525a5a5a5a5a5a63636373736b8484845a5a5a52525a5a5a5a5a5a635a525a635a5a635a5a6b5a5a634a4a634a4a947b73ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffbd9c9c84424284424273524a5a635a4a5a52
635a5a735a5a735a5abd9ca5a5636b4a10106b42427352527b6b63635a52736b63ad948cad73735a1818a5737be7cece9c8c8c2921216b6363debdc694525a4a
1818ad8484c6a59cad9c949ccece9cefe7deffffbdb5b54a1818bd6b73f7ced6630818423939b5e7e79cf7efadffffceefe7948484522121ad9c94d6f7efcef7
ef737b7b311818ad7b73ffc6c69c524a944239943931731818de8484ffe7de843931631810f7cec69442396b1010e78c84ffadadffc6bdef9c94efada5d69c94
dead9cefc6b5efc6b5ffcebdffe7d6d6ad9c7b3929a55a52f7ad9c9c4a398c3129d69484efbdadf7ceb5efc6b5f7d6bdd6ad94731810ad4239ffc6b5efc6b5de
ceb5ffd6c6a5524a731810b5635ae79c94c6847bce8c84ffc6bdd69c947331298c524ae7b5adffe7de945a525a1010c68c84ffdede8439395a1010c68c84d69c
94c68c8cbd847bffd6cede948c4a08089c524affc6bdffcebdefceb5e7c6addebda5deb59cd6ad94c6a594bd9c94efded6ffffffffffffffffffffffffffffff
fff7f7ad8484a57373d69c94e7adadefd6d6f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffe7e7e7adadad7373735252524a4a4a4a4a4a5252525252525a5a5a6b6b6b7b7b7b6b6b6b5a5a5a4a4a
4a5a5a5a5252525252524a4a4a5a5a5a5252525a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a63635a736b6b8484846b6b6b5a5a5a5252525a5a5a5a5a5a5a5a5a
5a5a5a6b5a5a635252634a4a634a42a58484fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffff9c84846339316342395a5a52426352396b5a52635a7363638c7373c6949cf7adb57329294a08107342428c63638c6b638c736bc6948cc673737310189c4a
52debdbdb59c9c5a4242634a4ad6bdbd946b6b4a2921a59494d6c6bdd6c6bdb5ceceadefe7c6fff7e7fff7947373520810bd5263521018739494b5fff7b5f7f7
9cceceb5bdbd8c636b6318189c636bc6c6cebdcece7b8484212118a58c8cffcec6944a4a5a08086318109c635aefd6c6ffefde734239520808f7e7e7d6949473
2121732921d6948cdebdb5e7bdaddeb5addeb5a5deb5a5efceb5e7c6addebda5efd6bdffefdeb58c736b2918843929943929c67363f7bdade7bdadf7ceb5deb5
a5f7d6bdd6a594631008943121ffc6b5deb5a5d6c6ade7c6b5944a42731818d68484deb5addeb5ade7ada5efb5ada5635a5a1818ad847bffdedeffded6d69c9c
7331298c4239e7bdbd8431394a0000ceb5b5deadaddeb5add6a59cffd6cece8c844a08088c5242f7bdade7b5a5efcebde7ceb5efd6bddebda5d6ad94cea58cbd
948cc6a59cf7e7e7fffffffffffff7ffffffffffffffffffefefad7b7bbd7373d69494e7bdbde7d6d6fff7f7ffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7bdbdbd8c8c8c5a5a5a5252525252525a5a5a525252
6363637b7b7b8484846363635252525252525a5a5a5252525252525a5a5a5a5a5a5252525a5a5a5a5a5a5a5a5a5252526363635a5a5a5a5a5a63635a84848484
847b6363635a5a5a636363525a5a5a63635a5a5a636363635a5a635252634a4a634a42a58484fffff7ffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7f79c8484634239735a526b6b636384735a84737b8c8484847b948484bd9c9cefc6c6f7c6ce844a525a3131
5231315239314a393184635ace94948431397b31396b3131633939523131a58c8cf7e7e79c8c8c424242394a39394a42395a4a214a4a94dee79cf7f7c6ffffce
dee7634a526339425a525abdfff7a5ffff8cded6296b63294a4a4242425a3942524a4a314a4a5a84845a7b7b294a4a8ca5a5dedee7847b7b5242427b736bc6c6
c6ced6cee7efe773635a6b4242efc6c6fff7eff7bdb584524a6b31317342317b4a396342317b5a4ae7c6adefcebde7ceb5e7ceb5efd6bdf7dec6f7d6bda57b63
7b42398c4a42dead9cf7ceb5e7ceb5debda5e7c6b5efd6bde7bda5844239a56352f7c6addebda5d6ceb5efdec6a56b638439397b39317b42397339318c5a4aa5
736384524294635adeada5efbdadffd6c6ffefe7ad847b733931e79c9cad6363844242733131734239734239633931ffcebdd6a59c734231ad7b6befbdaddebd
a5dec6addec6b5e7ceb5f7debdefc6addead9cd6a594bd948cd6b5adfff7f7fffffffffffffffffffffffffff7f7f7cecebd7b84bd7b7bcea5a5e7c6c6f7e7e7
fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffcecece8c
8c8c6363635252524a4a4a5252525252526b6b6b7373737373735a5a5a5252525252525a5a5a5252525a5a5a5252525a5a5a5252525a5a5a5252526363635a5a
5a5a5a5a5a5a5a5a5a5a5252527373738484846b6b635a5a5a5a63635a5a5a5a5a635a5a5a635a635a5a5a635a5a6352526b5a5a523931a58c84fff7f7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7dede9473738452528c636384736b73736b6b7373636b6b6b
6b6b636363736b6b8c7b7bbda5adcebdbdc6b5b5a59c9c94948c7b847b949494b5a5a5ceb5b5c6a5adbd9ca5b5a5a5b5a5adada5a5bdbdbdc6d6d6c6efe7b5ef
e7b5f7ef9cf7ef84f7f77bf7ff8cffff94f7ffb5f7ffbdf7ffc6f7ffadeff7adffff94ffff94ffff8cf7f794f7f79cf7f7adf7f79cf7ef94fff78cf7f794fff7
94f7f7a5f7ffa5f7f7adf7ffa5f7ffa5f7ff9cefefa5efefade7e7bddedec6ceced6c6c6efcec6ffe7d6f7e7d6f7deced6bdadd6bdadd6c6ade7ceb5e7c6b5ef
cebde7ceb5e7cebddeceb5e7dec6efe7ceffefd6ffdecef7decee7cebde7cebddec6b5deceb5dec6adf7d6c6ffdec6ffdec6efc6b5dec6adcec6a5d6d6b5ded6
bdf7ded6f7d6cef7d6ceefd6bdefd6bdefcebdf7d6bdefd6bdefceb5e7c6addebdade7c6adffdeceffe7d6f7d6c6ffceceffd6d6ffceceffd6cef7cec6f7cec6
efc6bdefcebdffdecef7d6c6e7c6b5e7bdaddebda5debdaddebdaddec6ade7ceadf7d6bde7bda5e7b59cce948cc6948ce7cec6fffff7fffff7ffffffffffffff
fff7ffffffdebdbd9c7373b58484d6a5a5f7ceceffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffdededea5a5a57373735a5a5a5252525252525a5a5a7373737373737373735a5a5a5a5a5a5252525a5a5a5252525a5a5a5a5a5a
5a5a5a5a5a5a5a5a5a5a5a5a6363635a5a5a5a5a5a5a5a5a6363635a5a5a6b6b6b7b7b7b7b7b7b63635a5a5a5a5a5a5a5a63635a5a5a63636363636363636363
5a5a635a5a6b5a5a634a42a58484fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7d6d68c6b
6b6b39397b5252735a5a7363636363636363635a6363636b6b5a6363636363736b6b8484848c84848c8c84848484737b7b636b6b737b7b848484948c8c8c7b84
847b7b736b736b6b6b5a736b6b948c84b5ad9cded69cefe79cfff77bffff7bffff7bffff7bffff7bf7ff8cffff8cffff8cffff8cffff8cffff84ffff84ffff7b
ffff84ffff7bffff7bffff73ffff7bffff7bffff84ffff84ffff84ffff84ffff7bffff7bffff84ffff8cffff9cf7ff9ce7e7a5d6dea5c6c6c6c6bdd6cebdded6
c6ded6c6e7dec6e7d6c6e7d6c6e7c6b5e7c6b5e7c6ade7c6b5dec6addec6add6c6addeceb5e7d6bdf7deceefdec6efdec6decebde7d6bde7cebdefd6bdefceb5
ffd6c6ffd6c6f7d6bde7ceb5e7ceb5d6ceaddeceb5e7cebde7d6c6decebde7d6bddeceb5e7d6b5e7d6b5e7d6b5deceaddec6add6bda5dec6adefd6bdf7dec6ef
cebdefcec6efcebdefcec6efcebdefcebde7cebde7ceb5dec6b5efd6bde7ceb5dec6add6bda5dec6addec6addec6add6bda5deceade7ceade7c6adefbdade7ad
9cc68c84d6a594f7ded6fffff7fffffffffffffffffffffffffff7f7c6adada56b6bce948cdeadadffe7e7f7e7e7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefb5b5b57373736363634a4a4a5252525a5a5a7373737373737373735a5a5a5a
5a5a5252525a5a5a5252525a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5252525a5a5a5a5a5a6363637373738484846b636363635a5a5a
5a6363635a5a635a63635a5a5a636363635a636b63636b5a5a7b6b636b524aa58484fff7efffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffdecece7b5a5a6b3939734a4a735a5a635a526363635a63636363635a63636363635a5a5a6b63636b63636b63636b63636b
6b636363635a5a5a525252635a63635a5a6b5a5a635252635a5a5a5a5a525a5a425a52426b634a7b736bada57bcec684f7f773f7ff73ffff63ffff63ffff63ff
ff63ffff63ffff73ffff73ffff7bffff73ffff73ffff6bffff6bffff63ffff6bffff63ffff73ffff73ffff73ffff6bffff6bffff5affff5affff5affff6bffff
7bfff78cfff78ce7e79ce7d69ccebdadcebdadc6b5b5c6b5c6c6b5d6c6bddebdb5e7bdade7bdade7bdade7bdade7bdaddebda5e7c6addebda5e7c6ade7c6b5ef
cebddec6b5dec6add6bdade7c6addebdade7c6adefc6adf7c6b5efc6adf7c6b5efc6b5efceb5e7c6b5e7c6bddec6bde7cebddec6b5dec6add6bda5dec6addec6
a5e7ceaddec6a5dec6add6bda5dec6addec6ade7cebdd6bdadd6c6add6c6add6c6b5d6c6add6c6add6bda5d6c6a5d6bda5d6c6a5d6c6a5d6c6add6c6a5decead
d6c6a5d6ceadd6c6a5dec6a5e7c6a5f7ceb5efbda5d6a594b58c7bd6b5adf7efe7ffffffffffffffffffffffffffffffefdedebd8c8ca56b6bd6a5a5e7bdbdf7
e7e7ffeff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6d6d68c8c8c6b6b6b4a4a4a5a5a
5a5a5a5a7b7b7b7b7b7b6b6b6b5a5a5a5a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a6363635a5a5a5a5a5a5a5a5a6363635a5a5a
6363636b6b6b8484847b7b7b6b6b6b63635a6363635a6363636b6b636b6b7373737373737b737b7b7373847b738c73737b63639c847bfff7f7ffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffcebdc6845a5a6b42427b5a527b5a5a7363636363636b6b6b636b6b636b
6b636363736b6b73636373636b6b5a5a7363636b5a5a7363636b5a5a735a5a6b525a6b52526b4a5273525a6b5252635252635a5a63635a4a52524252524a635a
527b7b5aadad63cece6befef73ffff5affff52ffff52ffff63ffff63ffff6bffff6bffff6bffff63ffff63ffff5affff5affff5affff63ffff63ffff6bffff63
ffff5affff52ffff52ffff4affff4affff4afff763fff773f7ef84f7ef8cefe78cefde94e7ce9cdecea5c6b5b5bdb5ceb5ade7bdb5efbdb5f7bdb5efbdadefc6
b5efc6adefc6ade7c6ade7c6ade7bda5efceb5f7cebdefcebde7bdaddebdaddeb5a5e7bda5deb59ce7b5a5e7ad9ce7ad9ce7ad9cf7bdadf7bdadf7c6b5e7c6b5
efcebdefcebdefcebdefceb5efceb5e7ceade7ceaddec6a5dec6addec6a5dec6add6bda5e7ceb5efd6bddeceb5cec6a5cec6adcebda5cebda5cebd9cd6bd9cce
bd9cd6bda5d6bd9cdec6a5d6c6a5decea5d6c6a5deceadd6cea5d6cea5d6c69ce7c6adefc6adefc6b5e7b5a5cea594b59c8ce7d6cefffff7ffffffffffffffff
ffffffffffffffefcec6a57373b58c8ccea5a5efd6d6ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffefefef9c9c9c7373735252524a4a4a6363637373737373737373735a5a5a5a5a5a5a5a5a5a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a
5a5a5a5a5a6363635252526363636363635a5a5a5a5a5a7373738484847373735a5a5a6363636b6b6b737b7b737b7b7b84847b84848484847b7b7b847b7b7b6b
6b7b6363634a427b635affefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6cece845a5a734242
73524a7b5a5a6b635a6b6363636363636b6b6363636b636b6b6363736363735a63736363735a5a735a5a7b52527b525273424a7b4a4a7342427b424a73424273
424a6b4242734a4a6b4a4a6b5252634a4a635252525252395a5a3173734aa5a563cece6bf7ef63fff763ffff52f7f763ffff5affff63ffff5affff5affff52ff
ff52ffff52ffff5affff5affff63ffff5affff5affff52ffff4affff42ffff42ffff39fff742ffef4aefde5ae7de6bded673dece63dece73dece7bd6c69cd6c6
adc6bdc6bdb5d6b5b5efbdb5efb5adf7bdb5efbdadefc6ade7bda5e7c6addebda5e7bda5efbda5f7ceb5f7c6b5efbdadd6ad94d6ad94d6a594d6a58cce9484ce
9484ce9484de9c8cde948cefa594e7a59ce7ad9cdeada5e7bdadefbdadefc6b5efc6adefceb5efceadefceb5e7ceade7ceb5dec6addec6addec6a5e7ceb5d6c6
a5cec6a5c6b59cc6b594c6ad8ccead94cead8cd6ad94d6b594deb594d6b594debd9cd6bd94dec69cd6c69cdec6a5d6c69cdec6a5debd9ce7bda5e7bda5efc6b5
d6b5a5b5948cb5a59cefefe7fffff7fffffffffffffffffffffffffff7f7d6adad946b6bb59494dec6c6f7dedefff7f7fff7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffc6c6c68484846363635a5a5a6363637373737b7b7b6b6b6b5252525a5a5a5a5a5a6363635252525a5a
5a5a5a5a6363635a5a5a6363635a5a5a6363635a5a5a6363635a5a5a6363635a5a5a6363636363636b6b6b7b7b7b8c8c8c7b7b7b7b7b7b7b7b7b848c84848484
848484737b7b7373736b6b6b6b6b6b6b63636b63636b5a526b524a7b5a5afffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffe7d6d68c6b6b6b39397b52527b5a5a7363636b63636b6b6b63636b6b6b6b736b6b7b6b6b7b63637b636b7b6363735a5a734a4a8452
527b42427b39427331397b39427331397331396b31317339396b3139733939733939734242734242734a525a4a4a4252523952524a73735a9c9c73c6c67be7e7
7bfff773ffff6bffff5affff5affff52ffff5affff52ffff5affff5affff63ffff5affff5affff52ffff52ffff4affff42ffff39ffff42fff742efe752e7de52
cec663c6bd63b5ad73bdbd6bbdb57bc6bd8ccec69cdecea5cec6adcebdbdc6b5d6c6b5debdade7c6b5e7bdadefc6ade7c6ade7ceade7bda5f7c6adf7c6b5f7c6
b5e7b59cdea594c69484c69484b58473b57b73b57b6bbd7b73c67b73ce7b73ce7b73d68c84d6948cd6a594dea594e7b5a5e7b5a5efbda5e7bda5efceadefceb5
f7d6b5efceb5efceb5e7ceade7ceb5e7ceb5e7ceadd6bd9cceb594c6a584c69c84c6947bce947bce947bd69c84d69c84dea58cdea58cdeb594deb594e7bd9cde
bd9cdec69cdec6a5e7c6a5e7bda5efc6ade7bdaddebdadc6a594a58c84cec6bdfff7f7ffffffffffffffffffffffffffffffffefef947373b59494bda5a5efd6
d6ffefeffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e79494946b6b6b5252525a5a5a7b7b7b7373736b6b6b
5a5a5a5252525252525a5a5a5252525a5a5a5252525a5a5a5a5a5a6363635a5a5a6363635a5a5a6363635a5a5a6363636363635a5a5a6363637b7b7b7b7b7b8c
8c8c8c8c8c84848484847b7b7b7b6b6b6b636b6b636363636b6b6363636b6b6b6b636b6b63636b5a5a735a5a6b524a735252f7efefffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7dede8c6b6b6b42397b52527b6363736363736b6b6b636b6b6b6b6b636b7b6b6b
73636b7b6363735a637b5a636b52526b4a4a7339397339396329295a21215218185221215218185218215218185a21216329296b31316b29297331317331396b
424263424263424a5a4a4a5a52525a6363739c9c7bc6c694f7f773f7f76bffff5affff5affff5affff5affff5affff5affff5affff5affff5affff5affff52ff
ff4affff42ffff42ffff42efef4ae7de52cec65abdb563a59c6b9c9c738c94738c946394946bb5ad6bc6b573d6c67bd6c694decea5d6bdb5cebdc6c6add6c6b5
d6c6addec6addebda5e7bdadefbda5f7c6b5efb5a5dea594c69484b584739c6b5a946352845a4a8c5a4a8c524a945a529c5a52ad635ab56b63bd7b73bd8473ce
9484d69c8cdead94dead94e7bda5deb59ce7bda5e7bda5e7c6ade7c6adefceb5e7ceb5e7ceb5e7c6ade7bda5d6a58cc6947bb57b6bb57b63b57363c67363bd73
63c67b6bce8473d6947bd6947bde9c8cdea58cdead94d6b594debd9cdeb59ce7bda5e7bda5e7bda5deb5a5d6b5a5b5948cad9c8cefdedeffffffffffffffffff
fffffffffffffffff7d6bdbd8c736bb59494debdbdf7dedeffeff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7bdbdbd73
73736363635252527373737b7b7b6b6b6b5252525a5a5a5a5a5a5a5a5a5252525a5a5a5a5a5a6363635252526363636363636363635a5a5a6363636363636363
636363637b7b7b7373737b7b7b8484848c8c8c8c8c8c7b7b7b73736b6b6b6b636b636b6b6b6363636b6b6b636b6b636b6b63636b736b6b6b636373636373635a
735a526b4a42ffe7e7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7e7e79473736b4242845a5a7b
635a7b6b6b736b6b7373736b6b6b736b6b7b6b6b7b6b6b735a5a846b6b6b52526b52525a4239634242846363a58484ad8c8cb59c94ad9494b59c94ad9c94ad8c
8c9c7373946b6b734a4a5a29295a29296b31317339396b313173313984424a7b424a7b525a6b5a6363737b7bb5b573cece73efef73ffff6bffff6bffff6bffff
6bffff63ffff5affff5affff63ffff52ffff52ffff52ffff52ffff4af7ff52efef5adede84dede84c6c68cadad7384845a636b5a6b73526b6b5a84846bada563
b5ad73d6c673e7ce7befd684efce94e7c69cd6bdbdceb5cec6addebdade7bdade7bdade7b5a5e7b5adce948cb58473ad7b6bbd8c84b58c84b59484ad847bad8c
7b9c6b637b4a428442429c5a52a56352ad7363b57b6bc68c7bce947bd6a58cdead94dead9cd6ad94e7bda5e7bda5e7c6addec6a5e7c6addebda5e7c6addeb59c
efbdadd69c8cb57b6ba55a52a55a529c524aa5524aad5a52b56b5abd7363c67b73c67b6bd6947bd69c84d6ad94d6ad94dead94e7b59ce7bda5deb59ce7bda5de
b5a5cead9cad9484d6bdb5fff7f7fffffffff7ffffffffffffffffffffffefefb59494a58484d6b5b5efd6d6ffefefffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffe7e7e78c8c8c6b6b6b5252526b6b6b7b7b7b7373735a5a5a5a5a5a5252525a5a5a5a5a5a5a5a5a5252525a5a5a5a5a5a636363
5a5a5a5a5a5a5a5a5a6363636363636b6b6b7b7b7b8484847b7b7b7b7b7b7b7b7b8484848c8c8c8484846363636b6b6b6363636b6b63636363636b6b63636b6b
6b6b636b6b6b6b6b6b6b6b736b6b7363637b63636b52526b4a42e7cec6fffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffeff79c7b7b7342427b52527b635a7b6b637b7373736b6b736b6b736b6b73636b7b636b735a5a6b5252634a4a5a4242846b6bb5ada5ded6d6
efe7e7fffff7fffffffffffffffff7fffffffff7eff7efe7e7ded6d6c6c6bdada5ad8c8c84635a6b39396b29297b31397b29318431397b394273424a735a6373
73844a737b5a9ca56bc6c684eff784ffff84ffff73ffff5affff52ffff5affff5affff5affff4affff52ffff52ffff52ffff5aefef73e7e794e7e7c6eff7d6e7
e7c6bdc6adb5bda5adb5848c94848c94637b846b9c9c63b5ad6bdece5aefd663ffde6bffde7bf7d694dec6b5d6bdcec6b5d6c6b5ceb5a5ceb5a5c6a59cbd9484
c69c8cdebdb5efd6cef7e7def7e7def7e7deefded6e7d6cec6ada5c6a59cad7b73945a4a9c6352ad7363ad7b63b58473bd8c73ce9c84cea58cd6ad94d6ad94de
b59cdeb59cdebda5debd9cdebda5d6b59cdeb5a5ffcec6f7ded6e7c6bddeb5adce8c84bd7373944a4a8c42427b31318c42429c5a52b56b63ad6b63bd8473bd8c
73ce9c84ce9c84dead94deb59ce7bda5dead94deb59ccea594c69c94b5948cf7dedeffffffffffffffffffffffffffffffffffffdebdbd9c7b7bc69c9cf7ced6
f7dedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffb5b5b58484845a5a5a6b6b6b7b7b7b7373735a5a5a5a5a5a5a5a5a5a5a5a5a
5a5a6363635a5a5a6363635a5a5a6363635a5a5a6363635a5a5a6b6b6b7373738c8c8c8484848484847373737373736363636b6b6b7373738c8c8c7373736b6b
6b6363636b6b6b636b636b6b6b636b6b6b6b6b636b6b6b73736b6b6b736b6b736b6b7b6b6b7363637b5a5a6b4a42bda5a5ffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7a584847342428452527b635a7b6b6b7b6b6b737373736b737b737b6b63638473737b
6363634a4a735a5aa58484dececefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efe7e7d6d6ceb5b5b58c
8c84524a6329296b313173424a63313984525a846b73635a634a525a42636b5294947bcece84e7e784ffff6bffff63ffff63ffff63ffff5affff5affff52ffff
52ffff52ffff5af7f76be7e784d6d6cef7fffffffffff7ffffffffe7e7f7efefefced6de7b8c94638c8c63ada56bcebd6befd66bf7e773ffef7bffef84ffe78c
efd69ce7cea5cebdadbdb5b5b5a5ad9c94b59c94efd6cefff7effffffffffff7fffffffffffffffffffffffffffffffff7efefcec6d6bdb5d6a594b57b6bad7b
6bad7b6bbd8c7bb58473bd8c84c69484cea594d6ad94deb59cdeb59cdebd9cd6b59cd6b5a5d6b5a5debdb5fff7effffffffffff7ffe7e7f7d6d6dec6c6ceadb5
bd8c8c945a5a7b4a4a84524a8c5252a56b63b57b6bb5846bc6947bc69484d6a58cdead94e7b59ce7b59cdead94cea594bd9484d6b5adfffff7ffffffffffffff
fffffffffffffffff7dedea57b7bc6949ce7bdbdffdedefff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e79494946b6b6b5a5a5a7b7b
7b7373735a5a5a5a5a5a5252525a5a5a5a5a5a6363635a5a5a6363635a5a5a5a5a5a5a5a5a6363636b6b6b7b7b7b8484848484847b7b7b737373636363636363
6363636363636363637b7b7b8484847373736363636363636b6b636b6b6b6b6b636b6b6b6b6b6b6b73736b6b6b7373736b6b6b7b73737b6b6b7b6363735a5a6b
524a8c736bffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffad8c8c7342427b524a8463637b63
637b7373736b737b737b736b7373636b73636b736363634a527b636befded6fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7f7ffffffefd6d6dececebdada5735a5a4a31316339426b424a94636b6b4a526b4a52524a524a63634273734a94945ac6bd6b
f7ef6bf7f76bffff63ffff63ffff5affff52ffff4affff52ffff5af7f76befef6bc6ceb5e7efe7f7fffffffffff7fffffffffffffff7ffff9cb5b54a6b6b639c
9c6bb5ad6bd6ce73efe76bffef73fff76bffef6bfff76bf7e784e7d694cebd9cbdb59ca59cbdb5b5f7efe7fffffffff7f7fffff7fffffff7fff7fffff7fffff7
fffff7fffffffff7e7fff7efffefdeefdeced6b5a5bd8c84ad7b6bb58473b5847bbd8c84bd8c7bc69484c69c8cd6ad94dead94deb59ccead9cc6ad9cb5a594ff
f7effffff7fffffffff7ffffffffffffffffffffffe7efe7d6d6d6bdbdc6ada5946b639c6b639c635aa56b5ab58473bd947bbd947bce9c84dead94e7b59cdead
94d6a594c69c8cbd948cf7e7e7fffff7fffffffffffff7fff7ffffffffefefbd9494b58484e7b5b5f7d6d6fff7effff7f7ffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffbdbdbd7b7b7b6363637373738484846363635252525a5a5a5a5a5a5252526363635a5a5a6363635a5a5a6363636363637373738484848c8c8c7b
7b7b7373736363636363636b6b6b6b6b6b6363636b6b6b6b6b6b6b6b6b8c8c8c8484846b6b6b6b6b6b6b6b6373736b6b6b6b7373736b6b6b7373736b73737373
737373737373737b73738473737b6b6b846b63735252735a52ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffbda5a57b4a42845252846363846b6b7b73737b737b7b7b7b7b737b736b6b736b6b6b5a5a6b5a5a9c8c8cffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fff7f7fffffffffffffffff7ffffffffffffefefefded6d6c6b5b5735a5a6b4a527b52527342
4a73424a6b4a52524a52525a5a42635a397b7339948c6bd6ce84f7ef8cffff73ffff6bffff5affff52ffff4affff63ffff6bf7f77bdede94deded6fffff7ffff
ffffffffffffffffffffffffd6e7e74a6b6b5a948c5aada56bcece63e7d663f7ef5affef63ffff5affff6bffff7bfff78cefe784cec694bdbdb5cec6f7f7f7ff
fffffffffffff7f7fffffff7fff7fffff7fffff7fffffffff7efffffeffff7effffff7fffff7fff7efefded6e7bdb5bd948cad8473ad7b73b5847bb58c7bc694
84c69c84d6ad94d6ad94cead9cbdad9cbdad9cf7efdefffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefd6d6e7c6c6d69c9cb5847b
b5847bad8473bd9c84bd9c84d6ad94dead94efbda5dea594d6a594b58c7be7cec6ffffeffffffff7ffffeffff7ffffffffffffe7b5bdad7b7bdeadadf7ceceff
efe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7f7f78c8c8c7373736363638484846b6b6b5a5a5a5252525a5a5a5a5a5a6363635a5a5a5a5a5a5a5a
5a6b6b6b7373738484848484847b7b7b6363636363636b6b6b6b6b6b6363636363636363636b6b6b6363637373737b7b7b9494947373736b6b6b6b6b6b737373
6b6b6b73736b6b736b7373736b737373737373737373737b737373847b7b7b6b6b8473737b63637b5a5a634a42efe7e7ffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffc6adad8c52527b4a4a8463637b6b63847b7b7373737b7b7b7b7b7b7b7373736b6b7363636352
52efe7e7fffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ffd6c6c69c848c947b8494848c8c7b84948c8c8c8484848484b5b5b5f7ffff
f7ffffffffffffffffe7d6d6b59c9c7b5a5a6b42426b42426339396b4a4a63524a5a524a42525239635a39736b52949473c6bd8cf7f784ffff6bffff5affff52
ffff5affff63f7ef73e7e77bd6d6b5efefeffffff7ffffffffffffffffffffffeff7f79ca5ad4a73735a9c9c52bdbd5aded652efe75afff752ffff5affff5aff
ff6bffff73f7ef7be7de7bc6c6add6d6e7f7f7ffffffffffffffffffffffffffffffeff7e7ffffffc6b5adc6ada5c6ada5d6bdadc6b5a5cebdade7cebdffefde
ffefe7f7e7e7d6b5adb58484b5847bb58c7bb58473bd8c7bc6947bce9c84cead94c6a594b59c8ccebdb5fff7effffff7fffffffffffff7ffffffffffffffffff
fffffffffffffff7fff7f7fffff7ffefe7f7deded6b5adbd9c8cb59c84c6a58cd6ad94deb59ce7b59ce7b59cce9c84bd9c84bd9c8cffffeffffff7f7ffffe7f7
f7fffffffff7f7f7dedead7373dea5a5e7bdbdffe7e7fff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6d6d68484846b6b6b8484847373735a5a5a5a5a5a
6363635252526363636363635a5a5a6363637b7b7b8484848484847373736b6b6b6b6b6b6b6b6b6363636363636363636b6b6b6b6b6b6b6b6b6363636363636b
6b6b8c8c8c8c8c8c7373736b6b6b7373737373737373737373737b7b73737373737b7b7373737b7b7b7373737b7b7b847b7b7b73738c7373846b6b7b635a735a
52cebdbdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdec6c6945a5a84524a845a5a846b6b847b7b
7b7b7b7b7b7b7b7b7b736b6b7b6b736b63635a5252fffffffffffffffffffffffffffffffffffffffffffffffffff7ffdeced694848c7363636b5a63736b6b63
6363636b6b6b73735a6b635a5a6363636b847b7b94848cb5a5a5fff7f7fffffffff7f7ded6d68c7b735239395a42396342426b42396b42427b5a525a524a5a5a
5a526363527373528c9463c6c673f7ef73ffff6bffff6bffff63f7f77bf7f773d6d69cdedecef7f7effffff7ffffffffffffffffffffffded6de6b737b638c94
63b5b552cece5aefef52f7f752ffff52ffff52ffff4af7f75afff76befe773d6d69cd6dee7ffffffffffffffffffffffffffffffffffffffffefded6947b73a5
847bc6a59cc6ad9cc6b59cc6ad9cd6bdaddec6bdf7ded6fff7effff7f7efd6ced6a59cad736bad7b6bbd847bce9484c68c7bce9c8cbd9484c6a594bda594fff7
effffffffffffff7fffffffffffffffffffffffffffff7e7e7bd9c94bd9c94cea5a5ffdedefffff7fff7eff7e7d6deceb5bdad94cead94deb59ce7bd9ce7b59c
d6ad94c69c8ca58c7be7deceffffffeffffff7fffffffffffffffff7e7efb57b7bce9c9cefc6bdffe7defff7f7ffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7ffffa5
bdbd637b7b526b6b7b8c8c5a63635a5a5a5a5a5a5a5a5a5a6363525a525a5a5a6b6b6b848484847b7b7b7b7b6b6b6b6363635a635a636b636363636b6b6b6363
636363636363636b6b6b6b6b6b7373736b6b6b7373739494948484847373737373736b6b6b737373737373737373737373737b7b737373737b7b737373737373
7b7b7b847b7b73636b8c7b7b7b6363846b63735a5aad949cfff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffe7c6c69c63637b4a4a84635a7b6363847b7b7373737b7b7b737373847b84736b73736b6b635a5afffffffffffffffffff7ffffffffffffffffffffffffff
ffefe7ef9c8c94635a5a6b5a636b63636363636b737363737363736b5a6b6b73737b63636373636b736363846b6b8c6b73b5a5a5fff7f7fffff7efe7e7c6b5ad
6b52525a3939734a427b42427342397b524a6b4a4a6b525252525a425a6331737339949452c6c67bffff73fff77bffff7bf7f784efe76bc6c69ce7ded6ffffef
fffff7fffffffffffffffff7eff79c949c637b84639ca55abdc652d6d64aefef4af7ff52ffff4affff4affff4afff75af7ef63d6d69ce7e7d6fffff7ffffffff
ffffffffffffffffffffffffff9c8c848c6b6bbd8c8cc69c94ceb5a5ceb5a5d6bdadceb5a5d6b5a5ceb5a5d6bdb5e7decefffff7ffefdeefcebdc6948cad7b6b
a57363bd8473bd8473c68c73ce9c8cbd9c8cefd6ceffffffffffffffffffffffffffffffffffffffffffe7c6bd845a529c6b63b5847bc69494deb5ade7c6bdff
efdee7d6c6ceb59cd6bd9ce7c6a5deb594deb59ce7bda5c6a58ca58473c6ad9cfff7eff7fffff7fffffffffffff7ffffefefad7373c6948ce7bdbdffe7deffef
efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffff
ffffffffffffffffffffffffffefffffdeffffadeff784d6d64a9c9c427b7b525a5a636363525a5a525a5a4a5a5a63736b7b84848c8c8c7b73737b6b6b6b6363
736b636b6363636b635a6363636b6b636b636b6b6b6b6b63736b6b6b6b6b73736b736b6b7b73737b7b7ba59c9c7b7b7b7373736b6b7373737b737373737b7b73
7373737b7b7373737b7b7b737b7b7b7b7b7b7b7b847b84847b7b847b7b8473738473737b636b7b63638c6b6bffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffe7e7a57373734a427b5a5a84736b7b6b6b847b84847b7b847b84847b7b7b73736b63636b6363ffffff
ffffffffffffffffffffffffffffffffffffffffffbdb5b55a4a4a6352526b63636b6b6373736b6b736b7373736b7373737373737373736b736b636b736b6b73
636373636373636b8c8484c6bdbdffffffffffffe7dede9473735231316342426b4a42734a42734a4a7352526b52525a5a5a526363395a5a316b6b4a8c8c73ce
c68cf7ef9cffff84efe773ded67bd6cee7ffffe7f7f7fffffff7ffffffffffffffffdeced66b6b6b7394946bb5ad63d6d64ae7e752ffff4affff4affff4affff
52ffff5af7f76be7e773c6c6c6f7f7effffff7ffffffffffffffffffffffffffff7b5a5aa57b73c68c84dea59ce7b59ce7bda5e7bda5e7c6a5d6bda5d6c6a5c6
bd9cc6c6a5d6ceb5f7f7deffffefffe7decea59cad847bad7b73bd7b73bd7b6bb58473ad847bb5948cfffff7fffffffff7f7ffffffffffffffffffffffffe7d6
d67b4a4aa5736bb5847bce948cd6a594e7b5a5debda5dec6addec6adefd6b5e7c6addec6a5deb59cd6b59cd6ad9cbd9484ad8473ffe7deffffffffffffffffff
fffffffff7f7bd9c9cbd9c94e7c6c6ffdedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fffff7fffff7ffffffffffffffffffffffffffffe7ffffbdffffa5ffff84ffff6be7e75ab5bd527b7b4a5a5a4a6363526b6b6b
7b7b738484737b7b6b6b6b6b63636b5a5a6b6363635a5a63635a6363636b7373636b63636b63636b636b6b6b6b6b6b736b6b736b6b737373736b6b847b849c94
9c7b7b7b6b6b73737373737373737b7b6b7373737b7b737373737b7b737b7b7b7b7b7b7b7b847b7b7b7b7b847b7b847b7b847b7b7b73737b6b6b7363638c6363
ffe7e7fffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efad847b6b4a427b5a527b6b637b7373847b7b84
7b84847b84847b7b7b73737b6b6b635a5afffffffffff7fffffffffffffffffffffffffffffffff7f7bda5a55a4a426b5a526b635a736b6b736b6b7373737373
737b7373736b6b7373736b6b6b736b6b6b6b6b6b6b6b6b6363736b6b736b6b9c94948c7b84e7dedefffffff7eff7bda5a55a424a5a39396b42426b4a426b4242
6b4a427b63636352525a5a5a52635a42635a3163634a8c8c6bc6bd8cefe77befe784ded6c6e7e7fffffff7fffff7fffff7ffffffffffefdede8c848463737373
a5a563c6bd5adede52f7f74affff4affff4affff4affff5afff763e7de7bd6ceade7e7e7ffffeffffffffffffffffffffffffffff77b635a9c7b73bd8c8cce9c
94deb59cdeb59cdec6a5dec6a5dec6add6c6a5cec6a5bdb594bdb594cec6adefe7cefff7effffff7e7cec6ad8484a56b63b5736bb57b6bb5847bad847bd6b5b5
ffefeffffffffff7ffffffffffffffffffffefd6d6a573739c635abd7b73ce8c84dea594dead94e7b59cdeb5a5e7c6addec6ade7ceb5e7ceade7c6add6b59cde
ad9cc69484bd847bffcec6fffffffffffffffffffffffffff7f7ad9494bda59cdec6bdffe7defff7efffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffd6ffffb5ffff94ffff94ff
ff84ffff8cffff94efef7bc6c64a8484527b7b7b8c947b848c6b636b6b636b635a5a6b63636b6b6b7373736b6b6b6b6b6b63635a6b6b63636b636b736b6b6b6b
737373736b6b73737373736b7b73738c84849c9c9c737b73737373737b7b737b7b737b737b7b7b737b7b7b847b7b7b7b7b84847b7b7b848484847b7b84848484
7b7b8c84848c7b848c7b847b7373846b73845a5ad6adadffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffb594947b524a73524a846b6384737394848c847b7b8c84847b73738c7b84847b7b6b6363fff7effffffffffffffffffffffffffffffffffffff7e7efad8c8c
634a426b524a7b6b637b6b6b7b737373736b7b7b7b7373737373737373737373736b6b6b7373736b6b6b736b6b736b6b847b7b9c9494736363736b6be7d6d6ff
f7f7ffffffd6cece7b635a5a39316342396b4a426b4a4a6b4a4a6b52526b5a5a5a5a5a4a5252425a6331635a316b6b39848463b5b58cceceb5c6ceffffffffff
fff7ffffffffffffffffffffffc6bdbd63736b63948c63b5b55acece5aefef4af7ef52ffff4affff52ffff5affff6befef84dee79cd6d6def7f7ffffffffffff
fffffffff7efffffff7b7b738c847ba59c94b5ad9cbdb5a5c6c6adc6c6a5cec6adcec6addeceaddec6a5e7c6ade7bda5deb5a5cea594e7cebdfff7efffffffef
e7debd9c8ca57363b57363ad635aa56b6bad8484fffffffffffffffffff7fffff7ffffffffffffefefce9494a54a4ac66b63ce8c7bd69c8cdead9cdeb59ce7bd
a5debda5dec6ade7ceadefd6b5efceb5e7c6addeb59cce9c8cbd8c7bdeada5fffffffffffffffffffffffff7efefad9494bda59ce7ceceffe7e7fffff7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffff
fffffffffffff7ffffd6ffffadffff94ffff7bffff7bffff73f7f784ffff8cfff7adffff8cced652848c4263634a5a63525a636b6b7363636363636363636363
6b6b6363636b6b6b636b636b736b6b6b636b736b6b6b6b737373736b6b7373737373739494948c948c7373736b737373847b6b7b7b737b7b737b7b7b847b737b
7b7b84847b7b7b8484847b7b7b848484847b7b8c8484847b848c84848c7b7b847b7b846b73846363947373ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffdec6bd845a5a6b4a4a7b63638c7b7b8c7b7b9484848c8484847b7b847b7b847b7b6b6363c6c6bdffffffff
fffffffffffffffffffffffffffff7e7e7ad8c8c5a393973525273635a7b6b6b7b736b7b737373737373737b6b73737373736b6b6b6b73737373737373736b6b
6b7b73737b7b7b9c9494847b7b73636b6b5a63bdadb5fff7f7ffffffdecece8c736b5a3939634242634a426b4a4a634a4a6b525263525a6363635a63634a5a63
31525229525a316363527b7b848c94ded6defffffff7ffffffffffffffffffffffe7e7e77b8c845a7b7b639c9c63c6c65adede52efef42f7f74affff4affff5a
ffff63efef84efef8ccececeefeff7fffffffffffffffffffff7fffff79cada5637b6b8cad9c94b5a59ccebda5cebdadceb5adbdadbdc6adcebdaddec6ade7bd
adefbdade7b5a5e7b5a5cead9cd6c6b5f7e7d6fffff7ffffefd6b5a5b57363b56b63ad6b63734a4abdb5adfffffff7ffffefffffe7fff7fffffffffff7f7cec6
b55a63b55a52bd736bce9484d6a58cdeb59cdeb59cdebda5d6bda5dec6a5d6c6a5efceb5efceb5efc6add6a594c69484ad7b73fff7f7fffffffffffffffffff7
efe7a58c84c6ada5e7ceceffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7fffffffffffffffffffffffffffff7ffffceffffadffff8cffff7bffff73ffff73ffff73f7f784ffff7bffff8cffff8cf7f76bbd
bd4a848c4a7373525a6b63636b6b636b736b7363636b636b6b6373736b73736b736b6b736b6b736b7373737373737b7b737373737b7b7b949c948c8c8c6b7373
737b7b73847b73847b737b737b84847b7b7b7b84847b7b7b8484848484848484848484848c84848c84848c848c8c84848c848c8c7b7b8c7b7b8c6b6b7b635af7
e7e7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefef9c7b736b4a42846b6b8c7b7b8c7b7b9484849484
8c9484848c7b84847b7b847b7b94948cffffffffffffffffffffffffffffffffffffffffffb5a5a56339397b5252846363846b6b8473737b73737b7b7b73737b
737b7b7373737373736b73737373736b7373737373737373848484948c94847b7b635a5a736b73736363a5949cf7efefffffffefded6a58c8c5239395a39396b
4a526b4a52634a4a6b525a63525a635a5a5a5a5a5a636b525a634a5a6342525a5a525a847384fff7fffffffffffffff7ffffffffffeff7f7b5bdbd5a6b6b7394
9473b5b56bd6d65aefe752fff742ffff4affff52ffff6bffff7be7ef94dee7addedeefffffffffffffffffffffffffffffc6ded64a7b6b63a59473c6b573dece
84e7d694e7d6addeceb5cebdcecebdd6c6b5dec6b5d6bdaddebdaddebdaddebdadcead9ce7bdb5ffded6ffffefffffefffe7d6ad8473ad6b6b8c4a4a946b6bff
fffffffffff7fffff7fffff7fffffffffffff7efdeadad8c524aad6b63bd8473ce9c8cd6ad94e7bda5debda5dec6add6bda5debda5dec6a5efceb5efc6ade7b5
a5ce9c8ca57b6bffe7deffffffffffffffffffefd6d6ad9c94ceb5b5f7dedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffffffffffffffffe7ffffc6ffff9cffff84ffff73ffff73ffff
6bffff73ffff63ffff73ffff6bffff6bf7f77bf7f78cf7f773bdc65a8c9452737b5a6b735a6b6b636b735a636b5a636b636b6b6b736b6b736b7373736b736b73
7b737373737b7b737b7b7b9ca59c7b847b737b73737b737b847b737b7b7b847b7b7b7b7b84847b847b8484848484848484848484848c84848484848c84848c84
84948c8c8c84848c84848c7b7b947b7b735a5aceb5b5fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
a5948c7352527b635a947b738473739c8c8c9484849c8c94847b7b847b7b8c848484847bfffff7fffffff7ffffffffffffffffffffffffffffc6b5b55a393973
4a4a7b5a528c6b6b846b6b8473737b7373737b7b6b7373737b736b73737373736b73737373736b6b6b7373737b7b7b9c94947b737b736b6b5a5a5a6b636b6b63
639c9494efe7e7ffffffe7dedea58c8c5a42395231316b4a4a7352526b4a4a6b52526b525a6b5a6363525a5a5a5a52525a5a5a63524a525a4a52cec6c6ffffff
fffffff7fffff7fffff7ffffd6dede7b8484737b847b9ca56bbdbd6be7e752f7ef4affff42ffff52ffff5affff6beff784e7ef94d6deceeff7ffffffffffffff
ffffffffffe7fff75284734a947b52b5a55ad6ce63e7d684f7e794efe7a5efdeaddeceb5d6c6b5c6b5c6c6b5c6bdadd6bdadd6b5a5deb5a5e7ada5efbdb5f7e7
cef7efd6ffffeffffff7cea594a5635a8c4a4ad6a5a5fffffffffffff7fffffffffffffff7ffffffded6d694736b946352b57b6bbd8c7bcea58cd6b59cdec6a5
debda5dec6addec6a5debda5debda5e7bdaddeb5a5dead9cb5847bd6bdb5fffffffffffffff7f7cebdb5b59c9cd6c6bdf7dedefff7f7ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffff7
ffffe7ffffbdffff9cffff7bffff73ffff6bffff6bffff63ffff63ffff52f7ff63ffff73ffff7bffff73f7f784ffff7befef63c6c64a94944a7b84526b73636b
7b6b6b737373736b7373737b73737373737b7b7373737b7b7b7b7b738c8c84a5a59c84847b7b7b737b847b7b847b7b847b7b847b848484848484848c8c848484
8c8c8c8484848c8c8c8c8c8c948c8c8c8c8c948c8c948c8c948c8c8c8484948484947b7b846b6b9c8484fff7f7ffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffd6c6bd84635a7b5a5a8c7373947b7b9c84849c8c8c9c94948c84848484848c848484847bded6d6ffffffffff
fff7ffffffffffffffffffffffdecece8463636b4242845a5a8c63638c7373847373847b7b737b7b737b7b6b7b73737b7b6b7373737b7b6b7373737373737373
8484849c9c9c6b63638484847b73736b6363737373635a5a9c9494efdedeffffffefe7e7a58c8c5a39426b4a4a6b4a527b5a5a73525a6b525a6352526b5a636b
5a63635a63524a52635a63634a528c7b84fff7fffffffff7fffff7fffff7fffff7f7f7b5adb57b73737b8c8c7bb5b56bcece5aefe74af7f74affff4affff52ff
ff63ffff7bf7ff84dee7a5e7e7def7ffffffffffffffffffffefffff8cada5427b7352a59c4abdbd52d6d663efe773fff773ffef7bffef84efde94ded69ccebd
bdcebdcec6b5e7c6bdefbdb5efb5ade7ad9ccead9cefe7d6ffffefffffeffffff7f7c6bd9c525a7b4242ffdedefffffffffffffffffffffffff7fff7e7f7efb5
ad9c8c6352a56b63bd8c73c69c84d6ad9cdebd9cdec6a5debda5e7ceb5debda5debda5e7bda5deb5a5deb59cc69c8cad8c84fffffffffff7fff7f7b59c9cceb5
b5e7ceceffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7fffffffffffffffffffffffffffff7ffffd6ffffb5ffff8cffff84ffff73ffff73ffff63ffff5affff5affff63ffff63ffff6bffff6bffff73ffff
6bffff73ffff7bffff84efef6bbdc65a949c5a737b6b737b6373736b73736373736b7b736b7373737b7b7373737b7b7b8c8c84a5a59c7b7b7384847b7b847b84
847b7b7b73848484848484848c8c8484848c8c8c8c84848c8c8c8c8c8c948c8c8c8c8c948c8c948c8c948c94948c8c948c8c94848494847b8c737384736be7de
d6fffffffff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efded69473736b4a4a8c6b6b9c7b7ba584849c84849c9494
8c8c848c8c8c7b7b7b8c8484ada5adfffffff7fffff7fffff7fff7ffffffffffffffefefad8c8c734a428452528c5a638c636b8c73737b73737b7b7b6b7b7b73
7b7b737373737b7b737373737b7b6b7373737b737b8484a5a5a57373736363637373736b6b6b6363636b6b6b6b6363b5a5a5efe7e7ffffffe7d6d69c7b845a39
4263394263424a6b52526b525a6b5a6363525a635a635a525a635a635a4a526b5a635a424ae7dedefffffff7ffffefffffeffffff7fff7ded6d6846b737b7b7b
7b9c9c73bdbd5ad6d652efef52f7f74affff42f7f75affff63f7f773f7f77bdedeb5efefe7fffff7ffffffffffffffffbdcec65a7b734a948c42adad42c6c652
dede52efe75afff763fff76bfff77bffef8cf7e78cdec6a5cebdbdc6b5d6bdb5deb5ade7bdadcead9cceb5a5decebdffffeffffff7fff7f7f7cece8c6363c6a5
a5fffffffffffffffffffffffff7ffffeffff7d6d6ce946b639c6b5aad7b6bbd9484c6a58cd6b59cd6bd9cdebda5dec6addec6a5debda5e7c6add6ad94dead9c
c69c8ca58c7bfff7effffff7efe7e7b5a59cd6c6bdf7e7defff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffdeffffb5ffff8cffff7bffff7bffff6bffff6bffff63
ffff63ffff63ffff6bffff6bffff6bffff63ffff63ffff63ffff6bffff73ffff8cffff94efef84c6ce6b949c638484637b7b6b7b7b6373736b7b7b6b73737b7b
7b7b84849c9c9c949494948c8c84847b84847b84847b8c8c848484848c8c8c8484848c8c8c8c8c8c9494948c8c8c949494948c8c949494948c8c949494948c8c
9c9494948c949c94949484849c8c84846b6bad9c9cfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f79c
84847b5252845a5a9c7373a58484a58c8c9c8c8c9c94948c8c849494947b7b7b948c8cefe7e7fffffff7fffffffffffffffffffffffff7f7c6adad7342428452
528452528c636b94737b8c7b7b7b7b7b7b8484737b7b7b847b737b7b737b7b737b7b737b7b737b738c8c8c949c9c7b7b7b6b6b6b7373736b6b6b6b6b6b6b6b6b
736b6b736363b5a5adfff7f7ffffffc6b5b57b5a6363424a6b52526b52526b5a5a635a5a635a635a5a5a5a5a635a5a5a5a525a6b5a636352526b5a63ffffffef
f7f7f7ffffefffffffffffffffffd6bdc673636b7b8c8c73adad6bcec663e7de5af7f752ffff52ffff4affff5affff63fff773f7f77bd6d6bdf7f7e7fffff7ff
fffffffff7f7f7949c945a8484429ca542b5bd52ced663efef5aefef5afff75afff75afff75affef73fff784f7e794decea5c6bdc6c6bdcebdb5d6bdb5c6ad9c
deb5adf7d6cefffff7fffffffffffffff7f7fff7f7fffffffffffffffffff7ffffeffff7fffffffffff7dec6bd9c6b5aad7b73bd9484cea594d6b59cdebda5de
bda5dec6a5dec6a5e7c6ade7bda5debda5d6ad94d6ad9cbd9c8cffe7deffffefceb5add6bdb5e7ded6f7e7e7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffceff
ffa5ffff84ffff7bffff6bffff73ffff6bffff63ffff6bffff73ffff73fff76bf7f763f7f763fff763fff76bffff6bffff73ffff7bffff8cffff8cf7f794efef
7bbdbd7ba5a563848c638484637b8473848c6b7b7b737b7b9ca5a59494948484848c84848c84848c8c8c84847b8c84848c84848c8c8c8c8c8c948c8c8c8c8c94
9494948c8c949494948c8c949494948c949c9494948c949c94949c94949c8c8c9484848473738c7b73f7e7deffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7c6adad73524a845a52946b6b9c7b73a58c8ca59494948c8c8c8c84949494948c8c7b6b73ada5a5f7f7f7f7ffff
ffffffffffffffffffffffffdecec684635a7342428c5a5a8c5a639473738c737b7b7b7b737b7b737b7b7b7b7b7b7b7b7373737b7b7b737373737b7b8484849c
9c9c737b7b6b73736b6b6b6b6b6b6b6b6b736b6b6b636373636b8c7b7bd6c6cefff7f7ffffff9c8c8c6b5252635252635a5a63525a635a635a5a5a5a6363525a
5a5a63635252526b5a5a5a4a4a6b5a63c6c6c6ffffffeffffff7ffffffffffffffffe7d6de8c7b7b52525a6b8c8c7bbdb573dede63e7e763f7f75affff52ffff
52ffff5affff5aefef6be7de84dedebdeff7efffffffffffffffffe7d6de73737b528c944a9ca55abdc65aced663efef52f7ef4afff742ffef4afff752fff76b
fff77bf7e78cefde94decea5d6c69cbdadbdbdb5bda5a5c6a5a5efded6fffffffffffffffffffffffffffffff7f7f7f7fffff7fffffffffffffff7fffff7ffef
e7d6ad9cad7b6bbd9484c69c84d6b59cd6b59cd6bd9cdebda5e7c6addebda5e7c6a5deb59cdeb59ccead94c6a594efd6c6ffefdec6b5a5decec6f7e7defff7ef
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffefffffceffff9cfff78cffff7bffff73ffff73ffff7bffff73fff77bffff6bf7ef73efef73efe784f7f773efef73efef73
f7f77bffff73ffff73ffff73ffff7bffff84ffffa5ffffa5e7e78cc6c66b9ca55a8c8c5a8484638484738484a5adb5949c9c848c8c8484848c8c8c948c8c9494
94948c8c948c948c8c8c9494949494949494949494949c9c9c9494949c9c9c9494949c9c9c9c94949c9c9c9c9494a59c9c9c9494a594948473738c7373c6adad
fffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7de8c6b63845252946b6b9c7373a58c8c9c948c9c9c948c
8c8c9c9c9c9c949c8c84848c8484d6d6d6ffffffffffffffffffffffffffffffffefefad8c8c6b39397b4a4a8c5a5a8c636b947b7b847b7b7b7b847b7b7b8484
847b7b7b7b7b7b7b7b7b7b7b7b7373738c8c8c9c9c9c7b84846b73737373736b6b6b7373736b6b6b736b6b7363637b6b6b9c8c8cefdee7ffffffc6bdbd73636b
635a5a635a5a6363635a63635a636352635a526363525a5a636363635a5a6352526b5a5a8c8484fffffffffffffffffffffffffffffffff7f7b5a5a54a424242
4a4a6b848473adad7bd6de7befef73fff763fff75affff5affff63ffff6bf7f773e7de8cdeded6fffff7fffffffffffff7ffcebdc66b7b847394a55a9ca55abd
c65adede52efe742efe74afff74afff752ffff5afff763ffff6bfff76bffef63efde84e7d694cec6a5bdb5adada5c6b5b5efdedefffffffffffffffff7ffffff
f7ffffeffff7fffffffffffffffffffffff7fffff7efd6cec6948cbd9484cead94d6b59cdec6a5debda5dec6a5dec6a5e7c6addec6a5e7c6a5debd9cdeb5a5ce
a594e7c6b5efcec6d6bdadefded6fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffc6fff79cffff8cffff7bffff6bffff7bffff7bfff77bfff773ef
de7be7de7bd6ce84d6ce7bcece84d6d67bd6de7befef73f7f773ffff6bffff6bffff63ffff73ffff8cffffa5ffffadffffa5efef84c6c66ba5ad5a8c946b8c94
8ca5ad8c9c9c7b8c8c848c8c84848c8c8c8c8c8c8c9494948c8c8c949494948c8c9494949494949c94949494949c94949494949c9c9c9494949c9c9c9c94949c
9c9c9c94949c9494a5949494847b947b7b9c8484f7e7e7fffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffff7ffffffb594
94845a528c5a5aa57b739c847b9c8c849c9c949c9c948c8c8c9c94949c8c949c8c8ca59c9cf7f7f7f7fffffffffff7fff7fffffffffff7decec6845a5a734242
844a5294636b8c6b738c7b7b7b7b7b8484847b7b7b8484847b7b7b8484847373737b7b7b8484849c9c9c7b7b7b7373736b73737373736b6b6b737373736b6b7b
6b6b6b5a6373636bada5a5f7eff7e7dede8c8484635a5a635a635a5a5a6363635a635a5a6363525a5a52635a5a5a5a5a5a5a5a5252635a5a635a5aded6d6ffff
fffffffffffffffffffffff7f7e7dede736b6b3929294a424252636b5a94947bc6c684e7de84fff77bffff73ffff5afff763fff773f7ef73dede94dededeffff
f7f7fffffffff7eff7a5a5a573848c6b949c63adad5abdbd5ad6d65aefef4af7ef52ffff4afff74affff42fff74affff4affff52fff76bffef7befe784ded69c
cecea5adadc6b5bdefdee7fffffff7fff7f7ffffefffffeff7f7c6c6bdd6cec6efdedefff7effff7efffefe7e7bdb5cea594d6ad9cd6ad9cd6b59cdec6a5debd
a5dec6a5dec6a5e7c6addebda5debda5debda5deb5a5debda5e7c6b5dec6b5f7e7defffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffceffffa5ffff
8cffff73fff773ffff7bf7ff73efef73e7d673dece7bc6bd84b5ad8cadad94b5b58cbdbd84d6ce73e7de73f7f763ffff6bffff6bffff7bffff7bffff8cffff8c
ffff94ffff9cffffa5ffff9ceff78cd6d67bb5b58cbdbd7b9c9c7b8c947b8c8c8c9494848c8c8c8c8c8c8c8c9494949494949c94949494949c9c9c9c94949c9c
9c9c94949c9c9c9c9c9c9c9c9c9c9c9ca59c9c9c9c9ca59c9c9c9c94a59c949c948ca58c8c947373d6bdbdffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffefd6d68c5a5a8c5a5a9c736ba58c849c8c849c9c949ca59c9494948c8c8ca5949c9c848c9c8c8ccebdc6fff7fff7
fffff7fffff7fffffffffffff7efbd9c9c7b4a4a8452528c5a638c6b6b8c737b8c7b7b847b7b8484848484848484848484847b7b7b7b73738c8c8c9c9c9c8484
847373737b7b7b7373737373737373737b7373737373736b6b6b6363847b7bcec6c6efe7e7948c8c6b63636363636b6363636363636b636363635a63635a5a5a
636363525a5263635a5a52525a52529c8c8cfff7ffffffffffffffffffffffffffffffffcebdbd6342425229294231314252525a737373a5a584cece94fff784
ffff73fff763fff76bffff73f7ef73d6d6adf7f7deffffe7f7f7ffffffd6dede94a5a5738c8c739c9c63a5a573cece6bdede5aefef52f7f74affff42ffff42ff
ff39ffff42ffff4affff5affff6bffff73fff77be7e7a5d6deadbdc6cec6ceefefefffffffeffffff7ffffe7e7e79c8c84846363b5948cd6adaddebdb5e7c6bd
e7c6bdd6ad9cdeb5a5d6b5a5e7c6ade7c6ade7c6addec6a5e7c6ade7c6a5e7c6a5dec6a5e7c6ade7bda5e7bdade7c6b5efd6c6f7e7d6ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffefffffbdf7f7a5ffff8cffff73fff76bf7f77beff76bd6ce73c6bd73b5a56b9c9473948c9cb5adb5cece94bdbd73bdbd73ded66bef
e76bffff6bffff73ffff7bffff84ffff73ffff7bffff7bffff84ffff8cffff9cffffa5ffffb5f7ffa5dede94bdbd7b9c9c7b94947b8c94848c94848c8c949494
948c8c9c94949494949c949c9c94949c9c9c9c9c9c9c9c9c9c9c9c9c9c9c9c9c9ca59c9c9c9c9ca59c9c9c9c9ca5a59c9c948cad9c9c9c84849c8484a58c8cf7
efeffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffff7fff7f7ad7b7b8c52528c635a947b739c8c848c8c849ca59c9c9c
9c9c9494a5949ca58c949c848ca59494cececef7ffffeffff7f7fffffffff7ffffffdec6c69c6b6b7b424a84525a845a638c737384737b847b7b848484848484
847b7b8484847b7b7b7b7b7b8c8484a5a5a58484847b7b7b7373737373737373737373736b6b6b736b73737373736b736b636b948c8cb5adad847b7b635a5a6b
63636b63636b63636b63636b6363635a5a6363635a5a5a5a635a5a635a5a5a5a5a4a4a736363dec6cefffffffffffffffffff7ffffffffffefe7dead84846329
295a29314a31314a4242424a52527b7b6badad84dede7bf7f773ffff52f7ef6bffff6befef7be7dea5efefcef7ffeffffff7ffffced6ce849494638c8473adad
5aa5ad52bdc65ad6de52e7ef4aeff752ffff4affff4affff4affff4affff4affff52ffff63ffff7bffff84efef9ce7e7add6d6a5c6c6d6efefefffffeff7efff
fff7efe7deb5848484524a8c5a5aa5736bbd8c84c69c94d6ad9ccead9cdebda5dec6a5e7c6addec6a5e7c6a5debda5e7c6a5dec6a5e7c6addebda5e7c6ade7bd
a5e7c6b5e7cebdefded6fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffade7de8ce7de94fff77befe773efe773d6de73bdbd73a5947b9c8c7b948c
c6d6cecee7dec6e7de7badad73bdb573d6d684f7ef7bffff84ffff84ffff8cffff84ffff7bffff73ffff73ffff7bffff8cffff94ffffa5ffffadffffbdffffb5
efefaddede9cbdbd8ca5a5738c9484949c8c9c9c949c9c9494949c9c9c9c9c9ca59c9c9c9c9ca5a5a5a59c9ca5a5a5a59c9ca5a5a5a5a5a5a5a5a59ca5a5a5a5
a59ca59cada5a5ada59cad9494a58c8c9c8484c6b5b5fffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7deb5ad
94635a8c5a5294736ba58c8494948c9c9c94a5a5a59c949cad9ca5a58c94ad949c94848ca5a5a5ced6cef7fffff7fffffffffffffffffff7efbd9c9c844a5273
424a8c636384636b8c737b847b7b8c84848484848c84848484848484847b7b7b948c8ca5a5a58c84847b73737b7b7b7373737b7b7b7373737373736b6b6b7373
73736b737373736b6b6b7b737b736b6b6b63636b6363736b6b736363736b6b6b63636b6363635a5a63635a6363635a635a63635a5a52526b5a5ab5949cfff7f7
fffffffffffff7fffff7ffffffffffefd6d69c63636321216331316339395a424242424a4a636b5294945abdbd63dede6bf7f76bfff773ffff6be7e784e7e7ad
f7f7c6f7f7f7fffff7fff7bdd6ce84adad5a9c94529c9c52adb55ac6ce5ad6de63e7ef63eff763f7ff63ffff63ffff5affff52ffff4affff5affff6bffff73ff
ff7bfff784efef84ceceaddedee7f7f7fffff7fffffffffffff7d6d6bd8484945252a5736bb58484c6948cd6ad9cdebdaddebda5dec6addec6a5e7ceaddec6a5
dec6a5dec6a5e7c6ade7c6ade7c6ade7bda5e7c6ade7c6adefd6c6e7d6ceffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffff7fff7a5c6b58cc6ad9cdec69c
dec694d6c68cc6bd739c947b94849ca59cced6c6f7fff7effff7a5c6bd6b9c946bbdb584dede84f7f78cffff8cffff94ffff94ffff9cffff8cffff84ffff84ff
ff8cffff8cffff94ffff9cffffa5ffffb5ffffbdffffb5ffffb5f7f79cd6d68cc6c67bb5ad8cadad94adada5adada5adadb5adb5b5adadbdadb5b5adadbdadb5
b5adadbdb5b5b5adadb5b5b5adb5adadbdb5adb5b5adb5adb5b5adbdb5adbdada5b5a59ca58c8cb59c9cefe7deffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffff7f7ffefe79c73738c635a9c6b6bb58c84b59c9cb5ada5adada5adada5b5adb5b5a5adb5a5adad9c9c9c9494adadb5e7ef
efffffffffffffffffffffffffefdede9473737b4a52845a5a946b6b9c737b9c848c9c8c8ca594949c94949c9494948c8c9494949c9c9cadadad8c948c8c8c8c
8c8c8c8c948c8c8c8c8c8c8c8c84848c848c8484848c848c8c84848c848c7b7b7b848484848484848484847b7b848484847b7b847b7b84737b847b7b7b7b737b
7b7b6b6b6b847b7b736b6b7b6b6b9c8c8cf7e7e7fffffffffffff7ffffffffffffffffffffffd6adad8c4a526b31317339396b394273525a736b6b63737b4a73
735a9c9c73c6c684e7e78cf7f78cffff84f7f78cf7f794dededeffffefffffefffffbdded67b9c9c638c9473a5ad6badb57bc6c673ced673e7ef6befef6bf7f7
63f7ff6bffff52ffff5affff5affff5affff63ffff6bffff6befef84efef94d6d6bde7e7f7fffffffffffffffffff7ffefc6cead7373a55a63c68484c68c84d6
ad9cdec6addec6add6cea5ded6add6ceadded6addeceade7ceb5e7c6b5efceb5efc6b5f7ceb5efc6adefceb5efcebdefdeceffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ff
fff7fffffffffffffff7b5c6a5b5bd9c9cad84949c849ca58c848c73848c7bb5bdade7efdefffff7ffffffdef7e79cbdb56ba59c84cece84e7e78cf7ff84ffff
94ffff94ffff9cffff9cffff9cffff94ffff9cffff9cffff9cffff9cffffa5ffffa5ffffadffffa5ffffadffffadffffb5ffffa5f7f79cefe794d6ce9cc6bd9c
b5ad9cadada5adadb5b5b5bdadb5bdb5b5bdadadc6b5b5bdb5b5bdbdb5b5b5b5b5bdb5adb5b5adbdb5b5b5b5bdbdb5b5b5adc6bdb5b5ada5a59494ad9494d6c6
c6fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffceb5b58c635aa56b6bb57b73c69494bda5a5bdb5ada5ada5
b5b5b5a5ada5adadadb5adadada5a59c9c9cbdbdbdefefe7fffffffffffffffffffffff7dec6c6946b6b7b52528c63639c73739c7b849c8c8ca59494a59c9c9c
94949c94949494949c9c9ca5ada5949c948c948c949c9c8c948c8c948c8c8c8c948c8c8c848c948c8c8c84848c8c8c8c848c84848c7b84848484847b84848484
847b7b7b8484847b7b7b847b84847b7b847b7b7b73737b7b7b847b7b7373736b6363847b7bb5adadfffffffffffffffffffffffffffffffffffffff7f7cea5a5
7b42426b31317b424a734a4a7b5a5a8c737b7b737363636b63737b638c9473b5b584d6de94f7f784f7f794efefade7e7d6f7f7e7ffffe7ffffc6dedea5b5b57b
8c94849c9c7badad84c6c67bcece73e7de63efe76bfff763fff75affff5affff5affff5affff5affff63ffff73ffff7bf7f784dede9cd6d6d6eff7ffffffffff
ffffffffffeff7d6a5adad636bbd6b73ce8c8cd6a59cd6bda5d6c6a5d6d6add6d6added6added6ade7d6b5e7ceb5efcebdefcebdf7cebdf7ceb5f7ceadefceb5
efd6c6e7d6ceffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fffff7fffff7fffffffffff7fff7ffffefadb58cc6c69c847b5a847b5a736b4a847b63bdbdadf7f7effffffffffffffffff7de
e7de8ca59c7bada57bcec684e7e784f7f784ffff84ffff8cffff8cffff94ffff94ffff94ffff94ffff9cffff94ffff9cffff9cffffa5ffffa5ffffa5ffff9cff
ffa5ffffa5ffffadffffadffffadf7f7a5ded6a5c6c68cadad8ca5a58c9c9c9ca5a5ada5a5ada5a5ada5a5b5a5adada5a5ada5a5a5a5a5a5ada5a5ada5adadad
adada5adada5ada5a5b5a5a59c8c8c9c8484ad9c9cefdee7fffffffffffffffffffffffff7fff7fffffffffffffffffffffffff7fffff7fffffffffff7efe79c
73738c5252b57373a56b6bbd9c94ad9c9ca5a5a59c9c9c9ca5a59c949ca5a5a59c9c9c949494949494bdbdbdefefefffffffffffffffffffffefefbd9c9c7352
4a7b4a4a7b52528c6b6b8c7373947b7b8c7b848c84848c84848c8c84848c84a5a5a5848c847b84847b7b7b737b7b737b737b7b7b7373737b737b7b6b737b7373
736b6b736b6b6b6b6b6b6b736b6b6b6b6b6b636b6b6b6b6b6363636b6b6b6363636b6b6b635a5a6363636363636363635a5a5a5a5252524a4a737373e7e7e7ff
ffffffffffffffffffffffffffffffffffffefefad847b6331315a2929633939633939947373634a4a5a4a524a4a5242525a395a63427b8452a5a573d6d68ce7
ef9cefe79cdedec6f7f7d6ffffe7ffffcee7e794b5b563948c6ba59c6badad6bbdbd5ac6c663dede5aefe752f7ef52f7ef5afff752fff75affff5affff63ffff
63ffff73fff77be7ef84d6de9cd6d6defffff7ffffffffffffffffffdedec68484a56363b57b73bd948cbda58cceb59ccebd9cdec6a5e7c6a5efc6a5e7c6a5e7
c6addec6addec6b5dec6ade7c6addebda5e7c6ade7ceb5e7d6c6ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffff7ffffefbdbd9cadad8484845a7b735a736b
52b5b59cffffefffffffffffffffffffffffffd6d6ce849c947bada58cd6ce8cefe78cffff84ffff84ffff7bffff8cffff8cffff8cffff8cffff94ffff94ffff
94ffff94ffff9cffff9cffffa5ffffa5ffffa5ffffa5ffffa5ffffa5ffffadffffb5ffffbdffffbdf7f7b5efe7a5cece94b5b58ca5a59cadada5adadadadadad
a5a5adadadada5a5adadadadadadb5b5b5adadadbdb5b5b5adadb5adadbdadadb5a5a5a58c8ca59494c6adb5ffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7fff7ffffffc6ada58452529c635aad7b73bd9494ad9494ada5a5a5a5a59ca5a5ada5ad9c949ca59c9c9c9c9c949494949494
c6c6c6efefefffffffffffffffffffefe7e7a58484734a4a845a5a8463638c6b6b8c73738c7b7b8c7b7b9484848c8c8c9c9494adada58c948c7b7b7b7b848473
7b7b7b847b7b7b7b7b7b7b7b73737b7373737373736b6b6b6363736b6b6b6b6b736b6b6b636b736b6b6b636b6b6b6b6363636b6b6b6363636363636363636363
635a5a5a63636363635a5a5a5a5a5a5ab5adadfffffffffffffffffffffffffffffffffffffffffff7e7e794736b5a313152313163394284636363424a5a424a
5a4a524a5252395252214a522963633984845aadad7bcece9cefe79cdedebdefefcef7f7ceffffc6efef94cec663a59c5aa5a552ada55abdbd52cec652ded652
e7de5aefef63f7ef63fff75afff763ffff5affff5affff5afff773ffff6bdede84dedeb5efefeffffffffffffffffffff7ffe7c6c69c6b6b9c736bad8c84c6a5
94d6b59cdebda5e7b59cf7c6adf7c6a5f7c6ade7bda5dec6a5cec6a5d6ceaddec6a5e7c6a5dec6ade7cebde7d6c6ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffff
ffffefffffe7c6bd9ca59c7b7b7352736b52a59c84f7f7defffff7fffffffffffffffffffff7f7cecec67b8c8494bdad9cdece9cf7ef8cfff784ffff73ffff73
ffff73ffff84ffff84ffff8cffff8cffff8cffff8cffff94ffff94ffff9cffff94ffffa5ffffa5ffffa5ffffa5ffffa5ffffa5ffffadffffadffffb5ffffb5f7
f7b5f7f7ade7e7a5cece8cb5b594b5b59cadada5adadadadadb5b5b5b5adb5bdb5b5ada5a5b5adadbdb5b5bdb5b5b5a5a5bdadadbda5adb5a5a5ad9494ad9c9c
e7d6d6fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fff7ef94736b734242ad7373b58484a58484b5a5a5a5a5a5a5
a5a5a5a5a5ada5a5a59c9ca59c9c949494949c9c949494bdbdbdf7efefffffffffffffffffffe7cece9c7373734a4a7b5a5a7b5a638c6b6b8c7373947b7b8473
7b8c8484948c8cadadad8484847b847b7b7b7b7b84847b7b7b7b7b7b7373737b7373736b6b7b7373736b6b7b6b7373636b6b63636b5a637363636b63636b6363
6b63636b6b6b6363636363635a6b635a6b63525a5a5a5a5a5a5a5a635a5a5a52525a52528c8484fff7f7fffffffffffff7fffffffffff7fffffffffffff7f7e7
d6ce7b63634a31314a29297b5a5a6b4a4a63424a5a424252424a4a4a4a42525a395252315252215252397b7b5294948ccec694d6ceade7e7cefff7e7ffffceef
ef9ccec66ba5a5529c9c52ada55abdb55ac6bd63cece63d6d66be7e763efef6bf7f763f7f763ffff52ffff52ffff52fff752efe763dede8cdedecef7fff7ffff
ffffffffffffefe7deada5948c7b73ad948cb59c8cceada5deb5a5e7bdade7bda5efc6adefc6adefc6addebda5dec6a5dec6a5e7ceaddebda5dec6b5e7cebde7
deceffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffe7bdb594a59c7b8473528c846bf7f7defffff7fffffffffffffffffffffffffff7efb5ad9c7b84
7394b59ca5decea5f7e79cffff8cffff7bffff73ffff7bffff7bffff84ffff84ffff8cffff8cffff94ffff94ffff94ffff94ffff9cffff9cffffa5ffff9cffff
a5ffffa5ffffadffffadffffadffffa5ffffadffffb5ffffc6ffffb5f7f7b5efefa5cecea5c6c69cb5b5a5adb5adadb5bdb5b5bdadb5bdadb5b5adadc6bdbdbd
b5b5bdadadbdadadbdadadbda5adbdadadad949cbdadadf7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7ce
ce734a4a9c6363ad7373bd8c8cb59c9cadada5a5ada5a5a5a5ada5a5ada5a59c9c9ca5a5a59c9c9c94949494948cbdbdb5efefe7fffffffff7effff7f7d6bdb5
8c6b6b734a527b525a846363947b7b947b7b947b7b8c7b849c9494ada5a58c8c8c7b7b7b8484847b7b7b7b847b737b737b7b7b7b73737b737373636b7363636b
5a5a6b5a5a6b5a5a736363736363736363736363736b6b6b6b6b6b6b6b5a636363736b5263635a63635a63636363635a52526352526352527b7373ded6d6ffff
ffffffffffffffffffffffffffffffffffffffffffffe7cece8463636342426b4a4a6b42425a31396342425a424a5a4a4a4a4a4a4a4a52424a4a395252294a4a
295a5a397373639c949cc6bdc6e7ded6efefefffffdef7f7bde7e78cbdbd6badad63a5a56badb56bb5b56bc6ce63ced66bdee763e7e76beff763ffff5affff4a
ffff4afff74afff752e7e76bded6ade7e7effffffffffffffffff7fff7b5c6bd84948c9ca59cadb5adb5b5adc6bdb5c6bdb5d6bdb5d6bdade7c6ade7c6adefc6
adefc6a5efcea5e7c6addec6addec6b5efdecee7ded6ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efffffefad9c849c8c738c7b5acec6adfffff7fff7ef
fffffffff7ffffffffffffffe7ded6948c7373735a849c7b8cbd9c9ce7c694f7de94fff784ffff84ffff84ffff84ffff84ffff8cffff84ffff8cffff8cffff94
ffff94ffff9cffff9cffff9cffff9cffff9cffff9cffffa5ffffa5ffffa5ffff9cffffa5ffffa5ffffa5ffffa5fff7b5ffffb5ffffbdf7f7b5e7e7add6d6a5bd
bda5b5bdadadb5bdb5bdbdb5bdbdb5b5bdb5b5bdb5b5b5adadc6b5b5bdadadbdadadc6adb5b5a5a59c8c8cd6c6c6fff7f7ffffffffffffffffffffffffffffff
fffffffffffffffff7fffffff7fff7fffffffffff7a58c847b42429c5a63b58484ad8c8ca59c94a5a5a5a5a5a5a5a59ca5a59cadadada5a5a59c9c9c949c9c9c
9c9c949494bdb5b5efefefffffffffffffffefefdec6c6946b73734a527b525a845a638c6b738c7373947b7b948484ada5a5948c8c8c848484848484847b7b7b
7b7b847b7373737b7373736b6b6b6363736363846b6b6b525273525a6b525273525a6b5a5a7363636b5a636b63636363635a636352635a52635a525a5a636363
635a5a6352526352526b5252634a52ad9c9cfff7f7fffffffffffffffffff7fffff7fff7fffff7fffffffff7f7efdede7b5a5a7b52526339396b424263394263
42425242395a42425242425a4a4a4a5252395252315252314a4a4a5252526363738484adc6c6c6dedee7fff7e7ffffdeefefadc6c68cadad7b9ca573adad63b5
b563bdc663bdc663ced663d6de6befef52efef4af7ef42fff74afff74ae7de63ded684cecedefffffffffffffffff7ffffbddece6b9c947bbdb584cec694ded6
8ccecea5ceceadc6bdc6c6bdcebdade7bdadefbda5f7c6adefbda5e7c6adcebda5deceb5e7d6c6efe7d6ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ef
decec6ad9c94846b94846bfff7effffffffffffffffffffffffffffffffffff7ded6c68473528c845a8c9c6b8cb58484bd948ce7bd94f7de94ffef94fff794ff
ff94ffff8cffff8cffff8cffff8cffff94ffff94ffff9cffff94ffff9cffff9cffffa5ffffa5ffffadffffa5ffffadffffa5ffffa5ffff9cffffa5ffffa5ffff
adffffa5ffffb5ffffb5ffffc6ffffc6f7ffc6efefb5d6d6b5c6c6adb5bdb5b5bdb5b5bdbdbdbdb5b5b5bdbdbdc6bdbdc6b5bdbdb5b5cebdbdbdadada59494ad
9c9ce7e7e7fffffffffffffffffffffffff7fffffffffffffffffffffffffff7ffffffffffffffffffefd6d6845252945252b57b84ad8484ada59ca5a59cadad
a5ada5a5ada5a5a5a5a5a5ada59ca5a59ca5a5949c949c9c9c9c9c9cb5b5ade7dedeffffffffffffffffffbd9c9c9c6b737b525a7b525a8463638c7373947b7b
9c8c8cad9c9c948c8c8c7b7b8c84847b7b7b847b7b847b7b847b7b7b73737b73737b6b6bc6b5b5efd6d6bd9ca57b5a63735252735252735a63735a637363636b
63636b6b6b6363635a6b6b5a6b63636363635a5a6b5a5a6b52527352526b4a4a6b4a4a846b6bffefeffffffffffffff7ffffffffffffffffe7e7e7847b7bd6bd
bdffffffefe7e7a584846b39425a31316339395a3939634a42634242634a425a4a425a524a424a4a4a4a52524a4a524a4a4a4a4a525a5252635a7b948cadc6bd
d6e7e7eff7f7f7ffffced6de9cb5bd7ba5ad6badb55aadb563b5bd63b5bd73cece6bd6de63e7e74ae7de4af7ef42efe75af7ef5ad6d684d6d6c6efefffffffff
fffff7ffffb5dede73bdb55abdb563ded663efe77bf7f784efef94e7e7a5cecebdc6bdcec6b5e7ceb5efc6adefc6ade7ceb5d6c6b5decebdefe7d6efe7deffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffefe7f7decebda594846b52efdecefffffff7f7effffffff7f7fffffffffffffffffff7cec6ad7b6b428c84529ca56b
9cb57b94c68c7bc6947bcea57bd6b58cefd69cf7e7adffff9cffff94ffff8cffff94ffff94ffff9cffff94ffff9cffff9cffffa5ffff9cffffa5ffffa5ffffa5
ffffa5ffffadffffa5ffffadffffa5ffffa5ffffa5ffffa5ffffa5ffffadffffb5ffffc6ffffc6ffffd6ffffceefefbdd6deadbdc6adbdbdadb5bdbdbdc6b5bd
bdbdbdc6bdbdbdc6bdbdc6bdbdcebdbdada5a59c8c8cc6b5b5fffffffffff7fffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ad84848452529c6363a57b7b9c8484b5ada5ada59cb5ada5ada5a5adada5a5a59ca5a5a59ca59c9c9c9c9c9c9c9ca59c8c8c84a59c9ce7d6d6ffffffffffffff
f7f7ceadad8c636b7b525a7b5a63845a638c6b73947b84ad94949484848c7b7b8473738c7b7b847b7b847b7b7b73737b73737b737384736bad9494f7dedef7e7
e7a584846b424a734a526b52526b52526b5a5a736b6b635a5a6363635a63635a63635a5a527363636352527352526342426b42426339426b4a52bdadadffffff
fffffffffffff7fffffffffffff7f78473735a3939ceadadffefeff7efef946b6b6339396342394a29295a42395a42394a39316342395a42395a424252424a52
52524a4a4a4a524a424a42424a424a4a4a52635a6b7b7badc6c6d6f7f7deffffdef7f7b5d6d67badb563a5ad63a5ad7bb5bd73b5bd73bdc663bdc652c6c64ad6
d64aded652ded663d6ce73c6c69ccecee7fffff7ffffdeffffb5e7e76bb5b563cece52d6d652e7ef5affff5affff63f7f784f7f794e7dea5d6c6b5bdadcebdad
debdadd6c6b5d6cebdded6c6e7d6cefff7effffff7fffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefefefd6c6c6a5949c7b6bffffeffffff7fffff7fffffffffffff7
ffffffffffffffefcec6a57b6b39948c52a5a563adbd7b9cc68494c68c84c6948ccea58cd6b5a5e7c6a5efd6adfff7a5ffffa5ffffa5ffff9cffff9cfff7a5ff
ffadffffadffffa5ffffadffffa5ffffadffffa5ffffadffffadffffb5ffffadffffadffffadffffadffffa5ffffadffffadffffb5ffffb5ffffc6ffffceffff
d6ffffceffffcef7f7bdced6bdced6b5c6c6b5bdc6b5bdbdbdc6c6c6c6cecececec6c6c6b5b5b5a59c9cad9c9cc6bdbdfffff7ffffffffffffffffffffffffff
fffffffffffffffffffffff7ffffffffffffffffffefef946363945a5a9c7373ad948cad9494b5a5a5b5a5a5b5adadada5a5adada5a5a5a5a5ada59ca59ca5a5
a5a5a5a59c9c9c948c8cada59ccec6c6fff7f7fffffffff7f7d6b5b58463637b5a5a8463638c6b6b846b6b947b848c7b7b8473739484848c84848c7b84847b73
8c7b7b8c7b738c7373846b6b7b6363c6b5b5ffffffe7cece946b6b6b4a4a634a4a7352526b5a5a6b5a5a7b6b6b6b635a6b6b6b636363635a5a635a5a6b525273
52527b5252734a52633942633939ad949cffffffffffffffffffffffffffffffffffffbda5a56342425a3131b5848cf7e7e7ffe7efcea5a55231315239315a42
395239314a3129634a426342426339425a42424a3939424242424239524a4a5a524a5a52524a4a4a4252524a6b637b9c9cadcecee7f7ffe7ffffd6ffffa5dede
84bdbd7ba5ad7394a573a5ad7bb5bd6bbdc65abdc652c6c652cec663cec673c6c684b5bdc6e7e7efffffefffffb5e7e784c6ce73d6de63e7ef4ae7ef4af7ff42
f7ff52ffff5af7f77bf7ef94efdeadded6b5cebdc6c6b5c6c6b5d6cebdd6cebdf7e7defffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffe7dee7cebdbd9c
94c6ad9cfffff7fffffffffff7fffffff7fffffffffffffffffff7e7bdad8c7b6b39948c4aadad63adb56ba5c67b9cc68494ce8c8cc68c94ce9494ce9c9ccea5
94debd9cefdeadffefbdffffadfff7adfff7adfff7b5ffffadffffadffffadffffadffffa5ffffadffffa5ffffb5ffffb5ffffb5ffffb5ffffb5ffffadffffad
ffffadffffb5ffffadffffb5ffffb5ffffbdffffc6ffffceffffd6ffffdeffffceefefc6dee7b5ceceb5c6c6b5bdbdbdc6c6c6c6c6c6ceceb5b5b5b5adad948c
8c9c9494ded6d6fffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffdeb5b5734242946b63a5847ba58c84ad9494b5a5a5
b5a5a5b5ada5ada5a5adada5a5a59ca5a5a59c9c9c9c9c9c9c9c9c9c9c9c8c8c8c9c9494bdadadf7efeffffffffffffff7dede8c6b7373525a8463638c6b739c
84848c6b73846b6b846b738c7373846b6b8473738c73738c7373735a5a8c6b6b8463639c7b7be7d6d6fff7f7ceadad63424a634242634a4a6b4a4a735a5a735a
5a736b63635a5a6b6b6b635a5a634a526b525263424a5a31315a31395a31395a31398c6b73ffefeffffffffffffff7efeffff7f7fffffffff7f77b5a5a522121
7b4242ce9c9cffe7e7fffff7f7ded64a39313129214a42395242395a39395231316b42426b39427342426b39426342425239394a39393931314242394a424239
393939393952525a737b84b5cececef7ffdeffffceeff7c6e7e794adb58ca5ad6b949c6b9ca5529ca55aadad4a9c9c63b5b56badad73a5ad9cbdc6f7ffffefef
f7b5ced67badb563c6ce5ad6de4ae7ef42e7ef4aeff74ae7ef5ae7ef6be7e784efe78cefde8ce7d68cd6bdbdcec6cebdb5c6bdb5decec6f7efe7ffefeffff7f7
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffefefffe7e7dec6bdc6a59cefcec6fffffffffffffffffffffffffffffffffffffffffff7efdeb5a584846b399c9452adad63adbd73ad
bd7ba5ce849cce8ca5ce8c9cc68ca5ce949cc69494cea58cceb59ce7c6adf7dec6ffefc6fff7c6ffffb5fff7b5fff7b5ffffb5ffffadffffadffffadffffb5ff
ffb5ffffbdffffbdffffbdffffb5ffffb5ffffb5ffffb5ffffb5ffffb5ffffb5ffffbdffffbdffffbdffffbdffffceffffd6ffffdeffffd6ffffcef7f7bddede
bdd6d6b5c6c6bdcecec6cecebdc6c6b5b5b5b5adada59c9cbdb5adefefe7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7a5847b734a4a9c6b6ba5847bb59494b59c9cbdada5b5ada5b5adadadada5adada5a5a5a5a5a5a59c9c9c9c9c9ca5a5a5ada5a59c949494848cad9c9cdece
cefff7ffffffffffefef94737b6b4a528c6b739473737b5a637352527b63637b63637b63637b6363846b6b845a5a8c63637b5a5a7b52526b4a4ac6b5b5ffffff
ffffff947b7b6342425231396b4a4a8463636b4a4a7b6363736363635a5a6b5a5a8c7b7befd6d6debdc694737b5a39395231394221299c8484ffffffffffffff
f7f7fffffffffffffffff7ffffff9c84846b42427b42427339428c5a5ae7cec6fffffffff7ef8c84844a39393929214a29295229295a29316329316321296b29
316b31316b39395a39395a42425242425a4a4a5239395a42425a4a4a4a424a4a525a7b8c94adcecedef7f7efffffeff7ffcee7e79cb5bd84a5ad84b5bd6ba5a5
63a5a5639c9c639c9c6394948cadade7eff7e7e7efa5b5bd84adb563adb55abdc64ac6ce4aced64aced65ad6de63d6de6bdede6bd6ce6bdece6bdece8ce7d6ad
c6bdc6bdb5b5ada5cebdb5e7d6d6ffefe7ffefeffffff7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefeff7dedee7c6bdbd9c94ffe7d6fffff7fffffffffffff7fffff7ffffffffffffff
f7efefdea59473847342948c52adad6badb573a5c67b9cc67b9cce8c9cce84a5ce8cadce8cadd694a5ce9c9ccea594c69c9cceada5debdbdf7d6c6ffefcefff7
bdfff7bdffffb5ffffb5ffffadffffadffffadffffb5ffffb5ffffbdffffb5ffffbdffffb5ffffbdffffb5ffffb5ffffb5ffffbdffffbdffffc6ffffc6ffffc6
ffffc6ffffc6ffffceffffd6ffffd6ffffd6ffffceefefcee7efc6dedecededebdc6c6b5b5b5c6bdbdb5adad9c948ccebdbdfff7efffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7fffffff7efe784635a845252a57373a58484b59c94b5a5a5bdada5b5a5a5adada5a5a5a5a5a5a5a5a5a5a5adad
9c9c9c9c9c9c9c949ca59ca59c9494948c948c8484a59c9cf7efeffff7f7ffffffd6bdbd8c6b6b94737b7b5a5a7352527b525a845a63735252735252734a4a7b
4a4a7b52527b52525a3131523131947373efdedefffffff7e7de7352525a39395231317352527b52527352526b5a5a6b63636b6363847373e7d6d6ffffffffff
ffffefefdececef7e7e7fffffffffffffffffffffffffffffffffffffffffffffffff7e7e77b52527b424a84525a6b3942634a4ab5a5a5fffff7ffffffd6cec6
7b63636339426b39426b29316b29296b29316329296b29316329296329295a21215a29295229295a39395a4242634a525a424a52424a4242425a6363737b7bad
bdbddeefefefffffdeffffd6f7ff9cbdc67ba5a584adad739c946b8c8c73948c7b9c9c9cadad848c946b7b84738c8c6b949463949c639ca5529ca552a5ad52a5
a55aadad52a5a552ada552a59c5aada56bada594a59cada59cad9c94ad9c9ccebdbddec6c6e7cecee7d6ceffefeffff7f7ffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefffe7e7e7c6bdc6a59cffe7de
fffffffffffffffffff7ffffffffffffffffffffffefe7d6a59473846b429c9463a5a56badbd7ba5c684a5ce849cce84a5d68ca5ce84add68cb5d68cb5d69cad
ce9cadd6a5a5cea5a5cea5a5ceadb5e7cebdf7dec6fff7c6fff7c6ffffbdffffb5ffffadffffb5ffffb5ffffbdffffbdffffbdffffbdffffc6ffffbdffffc6ff
ffc6ffffceffffc6ffffc6ffffbdffffc6ffffc6ffffceffffbdffffc6ffffc6ffffd6ffffd6ffffdeffffdeffffdeffffd6e7e7ced6d6c6c6c6c6bdbdb5ada5
ad9c9cad9c94e7d6cefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdebdb58c52528c5a5aa57b7bad8c8cbda59cb5
a5a5b5ada5ada5a5adada5a5a5a5a5ada5a5a5a5adadada5a5a5a59ca59c9c9ca5a5a59c9c9c9c9c9c949494948c8ce7d6d6ffefeffffffffff7f7bd949ca57b
84845a637b5252734a4a734a5273424a7b4a4a7339426b31395a29316339395231318c7373e7ded6ffffffffffffd6bdbd6b4a4a5a31316339398c5a63734a52
6b5a5a736b6b6b6363524a4a736b6b948c8cd6cecef7f7f7fffffff7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffff8c737373424a73
4a4a6b424a5239395a52525a5a5aefefeffffffffffffff7ced6ad7b847339426b31395221295221215221215a29296329296b29296b31316331315231314a31
314229315a424a634a525a424a4a42424242424a5a528ca5a5adc6ceceefefdeffffe7ffffdeffffe7ffffbdd6d6a5bdbd8c9c9c7b9494738484738c8c637b7b
738c8c637b7b6384846384846384845a84846384845a7b7b6384846384846384845a7b7b5a73736b736b847b737b736b947b7bad9494c6adaddebdbdf7dedef7
dee7ffeff7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffeff7f7dedee7c6bdbd9c9cffefe7fffff7fffffffffffff7fffff7ffffffffffffffffefe7de9c8473846b4a9c8c63a5a573a5b57b9cc68c94c6
849cce8c94ce84a5d684a5d684b5d68cadce8cbdce9cbdd6a5bdd6adadcea5a5ceada5ceada5d6bdade7ceb5f7e7bdfff7bdffffb5ffffb5ffffadffffb5ffff
b5ffffb5ffffb5ffffbdffffbdffffc6ffffc6ffffceffffceffffceffffc6ffffceffffc6ffffc6ffffbdffffc6ffffbdffffc6ffffc6ffffceffffceffffde
ffffdeffffe7ffffdeefe7dee7e7cecec6c6bdbdbdadadb59c9cbda5a5efd6d6fff7f7fffffff7fffffffffffffffffffffffffffffffffffffffffffffffff7
effffff7c6948c8c524a8c63639c7b7bad8c8cb59c9cb5a59cb5ada5ada5a5adada5a5a5a5a5a5a5a5a5a5adadada5a5a5a59ca59494949ca59c9494948c948c
9494947b7373a59494e7cecef7f7f7ffffffffeff7e7c6c6b58c94946b7384525a7b4a527339427b42427342426339396339397b6363ceb5b5fff7f7ffffffff
f7f7ffffffa58c8c6342426331317342427b52526b5a5a6363635a5a5a6b636363635a636363525a526b736bb5bdb5dededef7f7f7fffffffffff7ffffffffff
fff7ffffeffff7fffffffff7f7debdbd8c6363734a4a6342425a4a4a4a42425252524a4a4ad6cecef7eff7fff7ffffffffffffffe7d6d6bdada59c8484947b73
9c7b73ad8c84bd9c94ceadad7b5a5a4a29314a31315242424a42424a42425a42425a4a4a524a42424a425a7b734a736b5a848484adadbddededef7ffe7f7f7f7
fffff7ffffefffffe7f7efcededea5b5b59cb5ad849c946b8c8463847b6b847b6373736b736b736b6b7b6b6b7b636384636b7b636b84636b735a63736b6b6b63
637b6b6b8c7b7b9c8c849c847bbd9c9cdec6c6f7d6deffe7e7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffe7e7debdbdc6a5a5ffefe7fffffffffffffffffff7ffffffffffffffffffffffefe7de
a58c7b846b4a9c94639ca56ba5bd849cc6849cce8c94ce8c9cd68c9cd68cadd68cb5d68cbdd69cbdce9cbdd69cb5ce9cbdd6a5b5d6adb5d6b5a5ceada5d6b5ad
dec6bdf7e7c6ffefc6fff7c6fff7c6ffffbdffffbdffffbdffffc6ffffc6ffffc6ffffc6ffffceffffceffffceffffceffffd6ffffd6ffffd6ffffceffffceff
ffc6ffffc6ffffc6ffffceffffceffffd6ffffd6ffffe7ffffe7ffffefffffeffff7e7f7efd6dedec6ceceb5adadad9c9cc6adadf7efefffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7efef9463638c5a5a9c6b6bad8c84ad9c94b5a5a5ada5a5adadada5ada5b5b5adadadadada5a59c
9c9ca5a5a5a59ca5a5a5a5949c9c9ca59c9ca59c9c9c9c9c9494948c8c9c8c8cbda5a5f7dee7fff7f7ffffffffffffffffffffffffffffffffefefe7bdc6efce
d6fff7f7fffffffffffffffffffffffffffffffffffffffffff7e7e78c636b5a31396b3939734a526b5a5a635a5a63636373736b6363636363636363635a5a5a
5252525a5a5a949c94deded6f7f7f7fffffffffffffffffff7ffffffffffffffffd6c6c694737b6b4a525a424a524a4a5a52524a4242635a5a5242429c848cef
dee7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffb5a5a55239424231314239394a424252424a634a4a5a42426352525252527b8c
84395252314a4a315252739494a5c6c6adc6c6d6efefe7ffffdeffffdeffffe7fffff7fffff7fffff7ffffeffffff7fffff7fffff7ffffded6d6dececee7cece
e7c6cedebdbde7bdc6efc6d6f7dee7ffffffffffffffffffffffffffefefc6b5b5ad9494d6bdbdefd6d6ffe7effff7f7ffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7dec6c6bda5a5ffe7e7fffff7ff
fffffffffffffffff7fffffffffffffffff7e7dead94849473529c8c5aada56badbd7ba5c68494ce849cd68c9cd68ca5d694adce94b5ce94b5ce9cbdd69cb5ce
9cbdd69cb5d69cbdd6adb5d6a5bddeadbddeb5bde7c6bddebdbde7c6bde7ced6ffded6ffefd6fff7c6ffffceffffc6ffffceffffc6ffffceffffceffffceffff
ceffffd6ffffceffffd6ffffd6ffffd6ffffceffffd6ffffceffffd6ffffceffffd6ffffd6ffffdeffffd6ffffdeffffdeffffe7ffffdeffffdeffffcee7e7bd
d6d6adadadad9ca5bdb5b5efefeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7dede9c52529c5252a5736bb59494a594
94a5ada5a5ada5a5ada5a5a5a5ada5a5ada5a5ada5a5a59ca5a5a5a5949c9c9c9c9c949c9c9c9c9c9c94949c9494948c8c9c9494a59494ad9c9cad9ca5efdede
efe7effffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffffffdec6ce73525a6342426b4a4a63525263
5a5a635a5a6b63636363636b6363635a5a636363635a5a636363525252524a4a8c8c8cded6d6efe7e7fffffffffffffffffffffffff7efef9484845a4a4a5242
4a524a4a5a5252524a4a52424a63525a4239396b5a5abdb5b5e7e7e7fffffffffffffffffffffffffff7f7ffffffffffffffffffffefef9484843931314a3939
4a424a4a42425242425a4a4a5242426b63637b73734a4a4a424a4a314a4a214239395a5a63948c8cc6bd94d6ce94e7d6adf7efceffffd6f7f7e7ffffefffffff
ffffeffffff7fffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7fffffffff7f7fffffff7e7e7bdadadcebdbdefd6def7e7
e7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7f7ffefefe7d6cebda5a5ffe7e7fffffffffffffffffffffffffffffffffffffffffff7efdebda58c8c7352a59463b5ad73b5c684a5ce849cce8494ce84
9cd694a5ce94b5d69cbdce9cbdd6a5b5d69cbdd6a5bdd69cbddea5bdd6a5bddeadbdd6adc6e7b5c6e7bdceefc6c6e7bdc6e7c6ceefc6d6f7d6cef7decefff7ce
ffffd6ffffceffffd6ffffceffffd6ffffceffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffdeffffd6ffffdeffffd6ffffdeffffd6ffffdeffffd6ffffdeff
ffdeffffdeffffdeffffdeffffdeffffd6ffffceefefcededec6c6c6bdb5b5c6bdc6f7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7f7dea5ad9452529c63639c7b7ba5948ca59c9cada5a5adada5adadadada5a5b5adadada5a5ada5ada5a5a5a5a5a59c9c9c9c9c9c9c9c9c9c9c9c9c
94949c9494949494a59c9cb5adb5847b848c7b84a5949ccec6c6efe7e7f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7ffceb5bd6b4a526b52526b5a5a635a5a6b63636b63636b636b6363636b6363635a636363635a52526b6b6b635a5a5a5a5a635a5a8c8484c6bdc6
efe7effff7f7ffffffffffffad9ca55a52525a4a52524a4a635a5a524a4a524a4a635252524a4a4a42426b5a63635a5aded6d6e7e7e7fff7f7ffffffffffffff
fffffffffffffffffff7ffa59c9c524a4a4a3942524a4a4a4242524a4a5242425a4a52736b6b7b7373524a4a525252394a4a425252294a42214a4229635a529c
8c7bc6bd94e7de8ce7d694dedea5efe7c6ffffceffffd6ffffd6f7f7e7ffffe7ffffefffffeffffff7fffff7ffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7ffd6c6c6e7d6deefdee7ffeff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7e7e7efdedebda5a5efdedefffffffffffffffff7fffffff7fffffffffffffffffff7efbda58c84
6b4aa58c5abdb57bb5c684b5ce8ca5ce849cd68c9cce8ca5ce94adce94bdd6a5b5ce9cbdd69cbdd69cbddea5bdd6a5c6deadbdd6adbddeadbdd6adcee7bdcee7
c6cee7c6bddebdc6debdc6dec6c6efd6bdefdec6f7efceffefd6ffffcefff7d6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffdeffff
d6ffffdeffffd6ffffdeffffd6ffffdeffffd6ffffdeffffd6ffffdeffffdeffffdeffffd6ffffdeffffdef7f7dee7e7bdbdbdb5b5b5ced6d6f7f7f7ffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7e7e7c69c948452528c63639c7b7bad948cad9c9cada5a5ada5a5adada5a5a5a5a5a5a5a5a5
a5a5a5a5a59c9ca5a5a59c9c9c9c9c9c9494949c94949494949c94949c9c9cb5adad948c8c9c94948c8484847b7b8c8484ada5a5d6cecee7dedee7e7e7f7f7f7
f7fff7fffffff7fffffffffffffffffffffffffffffffffffffffffff7f7a5848c634a5263525a6363636363636b63636363636b6363635a636b6363635a5a63
5a5a6b6363635a5a525252524a4a524a4a635a5a847b84c6c6c6e7e7e7ffffffa59c9c5a5252525252524a4a5252525a5252524a4a5a52525a5252524a4a4a42
425a5252524a4a847b7bc6bdc6ded6d6efe7e7ffffffffffffffffffffffffc6c6c66b63634a4242424242524a524a4a4a4a424a524a4a7b7b7b636363524a4a
4a42424a4a4a394a42394a42294a42294a4a184a4229635a52948c6bcec663e7de73f7ef7befef7be7e77bded694e7e7adf7f7bdffffbdf7f7c6ffffcef7f7d6
f7f7d6eff7eff7fff7fffffffffffffffffffffffffffffffffffff7f7e7dedeefe7e7ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeff7efdedec6b5b5dec6c6ffffffffffffffff
ffffffffffffffffffffffffffffffefcebda5735a399c8c5aada573bdc684b5ce8cb5de94a5d694a5d694a5ce94b5d69cb5ce9cb5d69cb5ce9cbdd6a5bdd6a5
c6deadbddeadc6deb5c6deb5c6deb5c6e7bdd6efcecee7c6cee7c6c6debdcee7cec6e7cebde7d6c6efdecef7e7cef7efd6fff7d6fff7e7ffffdeffffdeffffde
ffffdeffffd6ffffdeffffd6ffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffd6ffffdeffffdeffffe7ff
ffdef7f7dee7efc6ceceb5bdbdced6d6fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffff7e7e7ad8484845252946363ad8484
b59494b59c9cb5a5a5a5a5a5a5ada59ca5a5a5a5a5a59c9ca5a5a5a59c9c9ca5a59c9c9c9c9c9c9494949c9494949494a5a5a5b5b5b59494948c8484948c8c94
8c8c8c848c7b7b7b847b84848484a59c9cbdbdbdd6d6d6d6dededee7e7dee7e7eff7f7fffffffffffffffffffffffffffffff7e7ef8c737b6b63636363636b6b
6b6b63636b636b6363636b63636b63636b6363635a5a6363635a52526b6363636363635a5a5a5a5a635a5a5a5a5a8c8c8ccececea59c9c5a5252635a5a524a4a
5252525a52525a52524a4a4a5a52525a52525a52524a42424a4a4a524a4a5a5a5a636363a59c9cc6c6c6d6cecececececececeada5a56b636b4a42424a4a4a4a
4a4a4a52524242425a5a5a7b8484635a5a4a4a4a524a4a524a4a5a5252424242394a42394a4a39524a314a42294a4a21635a319c945acece84efef84f7f78cff
ff8cffff84fff773efef73efef73e7ef84efef84dee78cd6dea5deefd6ffffe7f7f7f7fffffffffff7f7f7ffffffffffffefe7e7fff7f7fff7f7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffefeff7dedeceb5b5ceb5b5fffffffffffffffffffffffffffffffffffffffffffffff7cec6ad735a428c7b52a59c6badb57bb5ce8cadd68cadde9cadde9cb5
dea5b5d69cb5d69cb5ce9cbdd69cb5ce9cbdd6a5bdd6a5c6deadbddeadc6deb5c6deb5cee7bdcee7c6ceefc6cee7c6cee7c6cee7c6ceefcec6e7cecee7d6c6e7
d6ceefded6f7e7deffefdefff7e7ffffdeffffe7ffffdeffffdeffffdeffffdeffffd6ffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffd6ffffdeffff
deffffdeffffd6ffffd6ffffd6ffffdeffffd6fff7deffffd6f7f7d6e7e7b5c6c6bdc6c6dededeffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7ffffffe7d6ce9c7373844a4aa56b6bb57b84b59494ad9c9cada5a5a5a5a5a5ada59ca59ca5a5a5a59c9ca5a5a5949c9c9c9c9c949c9c9c9c9c9494
949c9c9c9c9c9cadadad949494948c8c8c84848c8c8c848484848484847b7b847b847b73737b7b7b7b737b7b84848484848c9494a5a5a5c6c6c6c6c6c6cec6ce
cec6c6d6cececec6c6a5949c6b63636b636b6b63636b636b6363636b6363635a636b6363636363635a5a5a5a5a635a5a5a52525a52525a5a5a5a5a5a635a5a63
5a5a5a52528c84847373735a5a5a5252525a5a5a524a4a5252525252524a4a4a4a4a4a5a52524a4a4a5a5252525252524a4a4a4a4a4a4a4a4242424a4a4a5252
525a525a524a4a524a4a4242424a4a4a524a524a4a4a424a4a424a4a5a63637b7b7b524a4a524a4a4a42425a4a4a4239395a4a52524a524a4a4a393939424a42
394242394a4a31525a4a7b846ba5ad84ced67be7e773f7f763f7f75affff4afff752ffff5affff6bffff73eff784f7ff9cf7ffceefefe7efefeff7f7eff7efff
f7f7fff7f7fffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7f7f7dededececebda5a5fff7f7fffff7fffffffffffffffffffffffffffffffff7f7ded6c6846b4a8c7b
529c9463adb57badbd84adce8cadd694b5dea5b5dea5bddea5bdd6a5c6dea5bdd6a5bddea5bdd6a5c6deadc6deadc6e7b5c6deb5cee7bdcee7bdd6efc6d6efc6
d6efcecee7c6d6efced6e7ced6efd6d6efd6d6efd6d6efd6d6efded6f7dedef7efdeffefe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffdeffffe7ffffde
ffffdeffffdeffffe7ffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffd6ffffd6ffffd6ffffceefefd6efefbdcecebdc6c6e7e7e7ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7e7bdbda56b6b9c5a5aad7373ad7b84b59494ad9c9cadadada5ada5a5ada59ca59c
a5a5a59ca59c9ca5a5949c9c9ca5a5949c9c949c9c949494a5a5a5adadad9c9c9c8c8c8c8c8c8c8c84848c8c8c8484848c8484847b7b8c8484847b7b847b7b7b
7b7b7b7b7b7373736b6b6b6b6b6b7373736b63637b7373736b6b635a5a7b7373736b6b6b636b736b6b6b63636b6b6b6363636b63636363636b6363635a5a6363
63635a5a635a635a525a635a5a5252525a63635a5a5a5a5a5a7b7b7b7373735a5a5a5a5a5a5a5a5a5252524a4a4a5252525252525a5a5a5252524a5252525252
4a4a4a4a4a4a5252524a4a4a4a52524a4a4a5252525252525252524a4a4a4a4a4a4a4a4a525252424a42424a4a4a52526b73736b6b6b5252524a4a4a524a4a5a
4a4a5a525252424252424a524242524a4a524a4a635a636b636b73737b636b7352637339636b428c945abdbd73efef6bffff63ffff52ffff52ffff5affff6bff
ff6bffff8cf7ffcefffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7e7cecec6adade7d6d6ffffffffffffffffff
ffffffffffffffffffffffffded6ce947b63846b4a9c9463a5a573adbd84adc684adce94add694b5d69cb5dea5bddeadc6deadc6e7adbddea5c6deadbdd6a5c6
deadc6deadcee7b5c6deb5cee7bdcee7c6deefced6efced6efcecee7c6d6efced6e7cedeefd6deefd6deefd6d6efd6deefded6efdedef7e7def7e7e7fff7e7ff
f7efffffe7ffffe7ffffe7ffffe7ffffdeffffe7ffffdeffffe7ffffdeffffdeffffdeffffdeffffd6ffffdeffffdeffffdeffffdeffffdeffffd6ffffd6ffff
ceffffd6fff7ceefefcedee7bdcecec6c6cee7e7e7fffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffff7f7d6adad9c63638c525aa5
7373ad8484b59494ad9c9cada5a59ca59ca5a59c9ca59c9ca5a5949c9c9c9c9c949c9c9c9c9c9494949c9c9c9c9c9cadadad949494848c8c8c8c8c8c8c8c8484
848c8c8c8c84848c8484847b7b847b847b73737b7b7b7373737b7b7b7373737373737373737373736b6b6b736b6b6b63637373736b63636b6b6b6b636b6b6b6b
6363636b63636363636b6363635a5a636363635a5a635a5a635a5a635a5a5a5a5a5a5a5a5252525a5a5a5a5a5a7b84846363635a5a5a52525252525252525252
52524a4a4a5252525252525252524a4a4a4a52524a4a4a5252524a52525252524a4a4a4a52524a4a4a4a52524a4a4a4a4a4a4a4a4a4a4a4a424a4a4a4a4a424a
42525a5a737b7b5a635a4a4a4a524a4a4a42425a4a4a5a4a4a52424a5242426352526b5a5a73636373636373636b63525a524a5242424a394252294a5231636b
398c8c5abdbd6bdee773ffff6bffff63ffff6bffff73ffff84ffffd6fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
efeff7e7e7c6b5b5d6bdbdfffffffffffffffffffffffffffffffffffffffffff7efe7ad94847b6b4a948c63ada573adb584b5c68cadce8cadd694add694bdde
a5bddea5c6e7adc6deadcee7b5c6e7b5cee7b5c6deb5cee7bdc6deb5cee7bdcedebdd6efc6d6efcedef7d6d6efcedeefd6dee7cee7efd6e7efd6e7f7dee7efd6
e7f7dedeefdee7f7e7deefe7e7f7e7e7f7efeffff7e7fff7efffffefffffefffffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffdeffffe7ffffe7ffffe7ffffde
ffffe7ffffdeffffdeffffdeffffd6ffffceffffd6ffffd6ffffd6f7f7d6efefd6e7e7bdc6c6c6c6cee7e7e7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffefefc69c9c8c5a5a945a5aa57373ad8484bd9c9cad9c9ca5a59ca5a5a59ca5a59ca59c9ca5a59c9c9c9ca5a5949c9c9c9c9c949c9c
a5a5a5b5b5b5949c9c8484848c94948c8c8c848c8c8484848c8c8c8c84848c84848484848484847b7b7b7b7b7b7373737b7b7b7373737b7b7b737373736b6b73
73737b7b7b6b6363736b6b6b6b6b736b6b6b6b6b6b6b6b6363636b636b636363636363635a5a636363635a5a635a5a5a52526363635a5a5a5a5a5a5252527373
73848c8c6363634a4a4a5a5a5a5252525a5a5a5252524a52524a4a4a5252524a52525252524a4a4a5a5a5a4a52524a4a4a4a4a4a4a4a4a424a4a5252524a4a4a
525252424a4a5252524a4a4a4a4a4a424a4a424a4a636b6b737b7b5252525252524a4a4a4a4a4a524a4a524a4a635a5a736b6b736b6b7b7373736b6b635a5a4a
4a4a4a4a4a4a424a4a4a4a4a4a4a4a4a52394a4a294a5231636b4a949463bdbd8ceff784f7f784ffff8cffffa5ffffdeffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7f7ffefe7d6bdbdc6adadffefeffffff7fffffffffffffffffffffffffffffffffff7c6b5a5736342948463
9c9c6bb5b584b5bd8cb5ce94adce94b5d69cadd69cb5d69cb5d6a5bddeadc6deadcee7b5cee7b5d6efbdcee7bdcee7bdcee7bdd6e7c6cee7c6deefcedeefcede
efd6d6e7cedeefd6e7efd6eff7d6e7efd6eff7dee7efdeeff7dee7efdee7f7e7e7efe7e7f7efdeefe7e7f7f7e7f7f7efffffe7ffffefffffe7ffffefffffe7ff
ffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffdeffffdeffffdeffffdeffffceffffceffffc6ffffd6ffffd6ffffdeffffd6e7efd6dee7bdc6c6c6cece
dededefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7dee7bd9494945a5a8c5252ad7373ad7b84ad9494a59c9c9ca59c94a59c9c
a5a59c9c9c9c9c9c9c9c9c9c9c9c9494949c9c9c9c9c9cadb5b58c94948c8c8c8c8c8c848c8c848484848c8c8484848c8484847b7b848484847b7b847b7b7b73
737b7b7b737373737b7b7373737373736b6b6b7373736b6b6b6b6b6b6b6b6b736b6b6b63636b6b6b6363636b63636363636363636363636363635a5a5a635a5a
5a5a5a5a5a5a5a5a5a5a5a5a525a5a525a5a6b6b6b7b84845a5a5a5252525252525252525252525252524a4a4a4a52524a4a4a5252524a4a4a4a4a4a4a4a4a52
52524a4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a52524a4a4a4a4a4a4242424a4a4a4242424a4a4a393939737b7b6b6b6b525252524a4a4a4a4a5a52526b6b6b6363
636b6b6b6b6b6b6363634a4a4a4a4a4a424a4a424a4a394a42424a4a4242424a4a4a4a4242524a4a4a4a4a424a52294242396b6b6ba5ad84c6ce94dee7b5ffff
c6ffffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefefe7d6ced6bdbddecec6ffffffffffffffffffff
ffffffffffffffffffffffd6cebd84735a847b52a59c73adad7bbdc68cb5c694bdd69cb5d694b5de9cadd69cbddea5bdd6a5c6deadc6deadcee7bdcee7bdd6ef
c6d6efc6deefced6efc6deefcedeefcee7f7d6deefd6e7efd6e7efd6eff7deefefd6eff7deeff7deeff7e7eff7deeff7e7eff7e7eff7efe7f7e7e7f7efe7f7ef
eff7f7e7f7f7effff7effff7efffffefffffefffffefffffefffffefffffefffffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffdeffffdeffffceffffceffffce
ffffdeffffdeffffdeffffd6efefd6e7efbdc6c6bdc6c6e7e7e7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7e7e7bd9494945a
5a94525aa56b6bad8484ad94949c948c9ca59c9ca59ca5a5a59c9c9ca5a5a59c9c9c9c9c9c9c9c9ca5a5a5adadad9494948c8c8c8c9494848c8c848c8c848484
8c8c8c8c84848c8484847b7b8484847b7b7b7b7b7b7373737b7b7b737373737b7b6b73737373736b6b6b6b73736b6b6b7373736b6b6b6b6b6b6b63636b6b6b63
63636363636363636363636363636363635a5a5a6363635a5a5a5a5a5a5a5a5a5a5a5a5a5a5a7b7b7b737b7b6363635252525a5a5a5252525252525252525252
524a52525252525252525252524a4a4a5252524a52525252524a4a4a4a52524a4a4a5252524a4a4a4a52524a4a4a4a4a4a4a4a4a4a52524a4a4a6363637b7b7b
6363635252526b6b6b6b6b6b7373736b6b6b636363525a5a525252424a4a394a42394242424a4a394a424252424a524a52524a4a4242524a4a524a4a52524a42
4a4a394a4a5a7373527b7b4a737373a5a5b5dedee7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7
e7ffe7e7d6c6c6c6b5adfff7effffffffffffffffffffff7fffffffffff7f7e7e7d694846b7b6b52948c63ada573b5b584bdc694b5ce94b5d69cadd69cb5dea5
b5d6a5bddeadbdd6a5c6deadc6deadcee7b5cee7bdd6efc6d6e7c6deefcedeefcee7efd6deefd6e7f7d6deefd6e7efd6e7efd6eff7dee7efd6eff7deefefdeef
f7e7eff7e7eff7efeff7e7eff7efe7f7efeff7efe7f7efeff7f7e7f7efeffff7e7ffefefffffeffffff7ffffefffffefffffefffffefffffe7ffffefffffe7ff
ffe7ffffe7ffffe7ffffd6ffffd6ffffceffffd6ffffd6ffffdeffffd6ffffdeffffd6efefd6e7e7bdcecebdceced6dedef7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffefd6d6b58484945a5a945a5a9c73739c7b7ba5948c9c9c94a59c9c9c9c9ca59c9c9c9c9c9c9c9c9494949c9c9ca5a5a5b5
b5b59494948c8c8c8c8c8c848c8c848484848c8c8484848c84848484848484847b7b7b7b7b7b7b7b7b7b7b7b7373737373737373737373736b6b6b6b73736b6b
6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6363636363636363636363635a5a5a6363635a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a525252636363848484737373
5a5a5a5a5a5a5252525252524a52525252524a52525252524a4a4a5252524a4a4a5252524a4a4a4a52524a4a4a4a4a4a4a4a4a5252524a4a4a4a4a4a4a4a4a52
52524a4a4a4a52524242424242426b6b6b8484847373737373736b6b6b6363635a5a5a525a5a424a42424a4a394242394a4a394a4a42524a394a42394a42424a
424a52424a4a42524a42524a42524a4a4a424252524a5a63636b7b7b425a5a395252637b7bcee7e7efffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffff7f7ffefefefd6d6c6adade7d6d6fffffffffffffffffffffffffffffffffffff7f7e7b5ad9473634a948463a5
946bbdb584bdc68cbdce9cb5d69cb5dea5add69cbddeadbddeadc6deadc6deadc6deb5c6deb5cee7bdcee7bdd6efc6d6e7c6deefd6deefd6e7f7d6e7efd6eff7
deeff7deeff7deeff7deeff7e7eff7e7eff7e7eff7e7f7ffefeff7eff7ffefeff7eff7fff7efffeff7fff7eff7f7f7fff7efffefeffff7effff7effff7effff7
f7ffffeffffff7ffffefffffefffffefffffefffffefffffefffffe7ffffe7ffffdeffffdeffffd6ffffdeffffd6ffffdeffffd6ffffd6ffffd6f7f7cee7e7b5
cecebdcececededef7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7dedead8484845a52845a5a9c73739c7b7bad948ca59494a59c
9ca59c9ca59c9c9c94949c94949c949cada5a5b5adad9c9c9c8c8c8c8c94948484848c8c8c8484848484848484848484848484848484847b7b7b7b7b7b7b7b7b
7b7b7b7373737b7b7b7373737373736b6b6b7373736b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6363636363636363636363635a5a5a6363635a5a5a5a5a5a5a
5a5a5a5a5a5a5a5a5a5a5a6b6b6b8c8c8c6b6b6b5a5a5a5a5a5a5a5a5a5252525252525252525252525252525252524a4a4a5252524a4a4a5252525252525252
52524a4a4a4a4a4a4a4a524a4a4a4a4a4a4a4a4a4a4a5a52525a5a5a6b6b6b7373738484847373736b6b6b6363635252524a4a4a4a4a4a424a4a4a5252424a4a
394a42394242424a4a424a4a42524a39524a31524a314a423952424a4a42524a42524242635252736363847b735252525252526b7373adbdb5effff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7eff7dededec6c6bdadadfff7f7ffffffffffffffff
fffffffffffffffffff7cec6ad8473528473529c8c6bada573bdbd8cb5c68cb5d69cadd69caddea5b5d6a5bddeadbdd6adc6deb5c6deb5cee7bdcedeb5cee7bd
cedebdd6e7c6d6e7cedeefd6e7efd6eff7dee7efdeeff7e7e7f7e7eff7e7eff7e7efffe7eff7e7f7ffefeff7efefffefeff7eff7ffefeff7eff7fff7eff7eff7
fff7eff7eff7fff7efffefeffff7eff7efeffff7effff7f7ffffeffffff7ffffeffffff7ffffefffffefffffefffffefffffe7ffffe7ffffdeffffdeffffd6ff
ffd6ffffceffffd6ffffd6ffffcef7f7ceefefceefe7bdcecebdc6c6ced6d6f7f7f7fffffffffffffffffffffffffffffffffffffffffffffffffff7f7efd6d6
9c7b7b8452527b4a4a9c6b63ad7b7bad8c949c8c94a5949ca59c9ca59c9c9494949c9c9ca59ca5b5b5b59494948c8c8c8c8c8c8c8c8c848484848c8c84848484
84847b847b7b84847b7b7b7b7b7b7373737b7b7b7373737b7b7b7373737373736b6b6b7373736b6b6b6b6b6b6b6b6b6b6b6b6363636b6b6b6363636363636363
636363636363636363635a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a7373737b7b7b6363635a52525a5a5a5252525a52525252525252524a4a4a524a4a
4a4a4a5252524a4a4a525252525252525252524a4a5252524a4a4a5252525252526363636363637373737373737373736b6b6b737373737b7b5a5a5a424a4a42
4a423942424a524a424a4a424a4a394242424a4a4a4a4a4a5252424242424242394242314a42294a4231524a394a4a424a424239395a4a4a7b63638473736b5a
63524a4a635a5a949494dededef7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7
ffefefefd6d6cebdb5e7d6d6fffffffffffffffffffffffffffffffffff7efe7d6a5947b84735294845aada573b5b584bdc694b5ce94b5de9cadde9cb5dea5bd
d6a5c6deadbddeadcee7bdcee7bdd6e7c6cee7c6d6e7c6d6e7c6deefcedeefd6e7efdee7efdeeff7e7eff7e7efffefeff7e7efffefeff7eff7ffeff7ffeff7ff
f7eff7eff7fff7f7ffeff7fff7f7ffeff7fff7f7ffeff7fff7f7fff7fffff7f7ffeff7fff7eff7eff7fff7effff7efffffeffffff7ffffeffffff7ffffefffff
f7ffffefffffefffffe7ffffe7ffffdeffffdeffffceffffd6ffffceffffd6ffffd6ffffdeffffd6f7f7cee7e7c6d6d6c6cececed6d6f7f7ffffffffffffffff
fffffffffffffffffffffffffff7fffffffffff7efe7dea5847b84524a9c5252ad6b6b9c7b7b9c8c8c9c8c94a59c9c9c94949c94949c9494ada5a5b5adad9c94
948c8c8c9494948c8c8c8c8c8c848484848c8c7b84848484847b847b7b84847b7b7b7b7b7b7373737b7b7b7b73737b7b7b737373737373736b6b7373736b6b6b
6b73736b6b6b6b6b6b6363636b6b6b6363636363636363636363635a63636363635a5a5a5a63635a5a5a5a5a5a5a5a5a6363637b7b7b7b73736363635a5a5a5a
52525a5a5a5a52525a5a5a525252525252524a4a5a52525252525a5252524a4a5a52525252525a5a5a635a5a736b6b7b73737b7b7b736b6b6b6b6b635a5a5a5a
5a524a4a635a637373736b6b6b4a52524a5252424a4a4a524a525252424a4a424a4a424a4a4a4a42524a4a4a4a4a4a4a4a4a4242524a4a4a4a4a4a4a4a4a4a4a
524a524a424a5a5252635a637373735a6363424a4a424a4a737b73b5b5b5fff7fffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffefeff7e7e7decececebdbdf7efeffffffffffffffffffffff7f7fffffffffff7c6bda5846b529c7b63ad94
73bdad84b5bd8cb5ce94add69caddea5b5d6a5bddeadbddeadc6deb5c6deb5cee7bdcee7bdd6e7c6d6e7c6deefcedeefcee7efd6deefcee7f7dee7f7deeff7e7
e7efdee7f7e7e7efe7eff7efeff7e7eff7efeff7eff7fff7f7ffeff7fff7f7fff7fffff7f7ffeff7fff7f7ffeffffff7f7ffeffffff7f7fff7f7fff7eff7efef
f7f7e7f7efeff7f7eff7f7efffffeffffff7ffffefffffefffffefffffefffffe7ffffe7ffffd6ffffd6ffffceffffceffffceffffceffffcefff7d6ffffd6f7
f7ceefefbdd6d6bdcecec6ceceeff7f7fffffffffffffffffffffffffffffffffffff7fff7fffffffffffff7e7deb584848c4a4a8c4a4a946b6b8c73739c8484
9c8c8c9c9494948c8c9c9494a59c9cb5b5ad949494948c8c8c8c8c8c8c8c8c84848c8c8c8484848484847b84847b8484737b7b7b7b7b737b7b7b7b7b73737373
7373737373737373736b6b736b736b6b6b736b6b6b6b6b6b6b6b6b6b6b6b6b6b6363636363635a63636363635a5a5a5a63635a5a5a5a5a5a525a5a5a5a5a525a
5a5a5a5a5a5a5a7b8484636b6b6363635252525252525a5a5a5a5a5a5252525252524a4a4a5252525252525a5a5a635a5a736b737b7373847b7b7b737b7b7373
6b63636363635a5a5a5a5a5a524a525252524a4a4a4a4a4a5a52527b7b7b5a5a5a4a4a4a4a5252424a4a424a4a52525239424252525242424a4a4a4a4a42424a
4a4a4a424a524a4a5242425a424a5a394263424a5239425a4a4a73636b7b737b525252394242424a4a636b6b949494e7dedef7e7e7ffeff7ffdedeffefefffef
effff7f7ffefeffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7e7e7cebdbddec6ceffffffffffffffffff
ffffffefffffffffffe7e7d6a58c7b946b5abd8c73c69c84c6b58cb5c694bde7a59cd69caddea5b5deadc6deb5c6deb5cedeb5cedeb5dee7c6dee7cedee7cede
e7cee7efd6deefcedef7d6def7d6e7ffdee7f7e7efffefeff7e7eff7efeff7e7f7ffefeff7eff7ffeff7ffeffffff7f7fff7fffff7f7fff7fffff7f7fff7ffff
fffffff7fffffffffff7fffffff7fff7fffff7f7fff7f7fff7eff7f7eff7f7eff7efeffff7effff7f7ffffeffffff7ffffe7ffffe7ffffdeffffdeffffd6ffff
d6ffffd6ffffd6ffffceffffd6ffffceffffd6ffffc6f7f7c6efefbddedebdd6cec6d6d6e7efeff7fffffffffff7ffffffffffffffffffffffffffffffffffff
ffffffe7e7bd94947b5252845a5a7b5a5a94736bad8c8ca58c8c9c8c849c8c8ca59c9cb5adad9c94948c84848c8c8c8c8484948c8c94848c948c8c847b7b8484
847b7b7b7b7b7b737b7b737b7b737373737b7b6b73737373737373737b7373736b6b7b6b73736b6b736b6b6b6b6b736b6b6b6b636b6b6b636363636b6363635a
6363635a635a6363635a635a6363635a5a5a5a5a5a4a5252636b6b73847b636b6b525a5a525a5a4a5252525a5a525a5a5a6363636363737373737b737b84847b
7b7b847b7b736b6b73636b6b5a5a6b5a5a5a52525a5252524a4a524a4a524a4a5a5252524a4a524a4a5252527373736b6b6b5252524a4a4a5252524a4a525252
524a4a524a4a524a4a4a424a4a424a4a4a4a5242424a4a4a4a42424a4a4a4a524a4a634a4a5a39396b52527b63638c7373735a5a5a4242524242735a52947b73
ceadadf7ceceffcecef7bdbdefbdbdefc6bdefc6c6f7d6ceffe7deffefe7fff7f7fff7effffffffffff7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7fff7e7e7deced6d6bdbdefd6d6fffff7ffffffeffff7efffffeffffff7fff7c6ada594635aa56b5ac6947bc6a584bdbd8cadce94a5de9caddea5bddeadbdde
adc6deb5cedeb5d6debdd6debddee7c6dedec6dee7cedee7cedeefd6d6efd6def7d6def7d6e7ffe7eff7e7eff7e7eff7e7eff7eff7f7eff7ffefeff7eff7fff7
f7ffeffffff7f7fff7fffff7f7fff7fffffff7fff7fffffffffff7fffffff7f7f7fffff7f7f7f7fffff7f7f7f7f7fff7eff7efeff7efeff7eff7ffefefffefef
fff7e7fff7efffffe7ffffe7ffffdeffffdeffffd6ffffd6ffffceffffd6ffffceffffceffffc6ffffc6ffffbdf7f7c6f7f7bde7e7bdd6d6b5cececee7dee7f7
f7f7fffff7fffff7fffff7fffffffffffffff7fffffffffff7efe7e7bda5a57b52528c6b6384635a84635a947b739c8c849c948ca5a59cb5adad949494948c8c
8c8c8c948c8c847b7b847b7b847b7b8c848c8484848484847b7b7b7b7b7b737b73737b7b6b7373737b736b7373737373736b737b73737b6b6b7b6b736b63636b
6b6b6b63636b6b636b63636b6b6363635a6363636363636363635a5a525a5a52525a525a5a5a525a525a635a6b73737b8484636b6b636b6b6b73737b847b848c
847b847b737b737373736b6b6b636b635a5a5a525252524a4a635a5a5a52525a4a52524a4a524a52524a4a524a524a424a524a52525252524a4a424242636363
7373736363635252525252524a4a4a4a4a4a4242424a4a4a4a4a4a524a524a4a4a4a4a4a4a424a4a4a4a4242424242424242425242425a42426b52527b635a7b
635a6342425a39316339396b42427b4a4aa57373c69494d69c9cc68c8cc68c8cd69494ce9494ce9c94d6a5a5d6ada5e7c6bdf7d6ceffe7deffe7defff7effff7
f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7ffefdee7e7ceced6b5b5ffefeffffffffffffff7fffff7fffffffffff7e7dead847b946352ad7b6b
cead8cbdb58cadc68cadd69cb5deadbddeadc6deb5c6deb5d6e7bdd6e7bdd6e7c6d6dec6dee7cedee7cedeefd6deefcedef7d6def7d6e7ffdee7f7e7f7ffefef
f7eff7ffeff7f7eff7fff7f7ffeff7fff7f7fff7fffff7f7fff7fffffff7fff7fffffffffffffffffffffffffffffffffff7fffffffffff7fffffff7fff7ffff
f7f7fff7f7fff7f7ffeff7fff7efffeff7ffefeff7efeffff7e7fff7efffffe7ffffefffffe7ffffe7ffffd6ffffd6ffffceffffd6ffffceffffceffffc6ffff
ceffffc6ffffcef7f7c6e7e7b5ded6b5cececededee7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffceb5ad84635a846363846b6384
736b8c73739484849c948cadada59c9c948c8484948c8c948c8c948c8c8c8c8c948c8c847b7b8c7b84847b7b7b7b7b7373737373736b73737373736b73736b73
736b6b6b7373736b6b6b736b6b6b636b736b6b6b6b6b736b6b6b63636b6b6b6b63636b636363635a63635a5a5a5a635a5a6363637373737b7b7b848484847b7b
8c8c8c948c8c8c8484847b7b7b7b7b6b63636b63636363636363635a5a5a5a52525252525a525252524a525252424a4a4a525242524a4a52524a52524a52524a
4a4a4a52524a4a4a525252424a4a4a52527373736b7373525a5a4a4a4a424a424a524a4a4a4a52524a524a4a5a4a4a524a4a5242425239395a42425a42426342
4a5a39426339425a39396b4a4a7352527b5a5a6b4a425a39315229295a31316b4242845a5a9c6b6bad847b9c7373946363946363ad7b7b8c635aa57b739c7373
b58c8cbd9c94d6ada5e7c6c6efceceffdedeffe7e7ffe7e7ffefeffff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efdedee7c6c6dec6c6f7efeffffffff7
fffff7fff7fffffffffff7e7cec694635a8c6352ad9473bdad8cbdc694bdce9cb5ce9cbdd6a5bdd6a5c6deb5cedeb5d6e7bdcee7bdd6e7c6d6e7c6d6e7ced6e7
cedeefd6d6efd6def7dedef7deefffe7eff7e7f7ffefeff7eff7ffeff7f7eff7fff7f7fff7fffff7f7fff7fffff7f7fff7fffffff7fff7fffffffffff7ffffff
fffff7fffffffffff7fffffff7f7f7f7fff7f7fff7f7fff7eff7eff7ffefeff7eff7ffefeff7e7e7f7efdeefe7def7efdef7efe7fff7e7fff7e7ffffdeffffde
ffffd6ffffd6ffffceffffceffffceffffceffffc6ffffc6ffffbdf7f7c6ffffc6eff7bde7e7adc6cebdcecedee7e7ffffffffffffffffffffffffffffffffff
fffffffffffffffff7f7e7cece846b6384736b8c736b84736b847b73948484ada5a5948c8c8484847b7b7b7b84847b7b7b7b84847b7b7b847b84847b7b8c7b84
847b7b847b7b7b7b7b847b7b7373737373736b73737373736b736b6b73736b6b6b6b73736b636b736b6b7b7373847b7b8c8484948c8c948c8c9c94949c949494
94948c8c8c8c8c8c7b7b7b7373736b6363847b7b9484848473737363636b63636352525a52525a4a4a5a5252524a4a524a4a4a4a4a524a4a524a4a5a52524a52
5242524a39524a39525239524a425252394a4a42524a424a4a42524a424a4a4a4a4a5a5a5a7b7b7b5a5a5a4a4a4a4a4a424a4a424a4a42524a42524242524242
4a39315239316342426342425a31315a31315a29296b31316b31317342426b4a4a6342425229294a29295229295a3939523131523131634a429c7b7bd6b5b5f7
e7e7f7efeffff7f7f7f7effff7efdebdbd7b5a5a7b5a5a8c6b6b8c6b63b5948cbd9494d6adaddebdb5f7ceceffd6d6ffe7e7ffe7e7ffefefffefeffffff7ffff
f7fffffffffff7fffffffffffffffffffffffffffffff7fffffffffff7fffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7fffff7f7f7deded6c6bdded6d6fffffffffffffffffffffffffffffffff7efbda5947b5a42846b52ad9c7bcec69ccece9cced6a5c6d6a5c6deadc6dead
cee7b5cedebdd6efc6cee7c6d6e7ced6e7cedeefd6d6efd6deefdedeefdeeff7e7eff7e7f7ffefeff7eff7fff7f7ffeffffff7f7fff7fffffffffff7ffffffff
fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7fff7fffff7f7ffeff7ffefeff7eff7fff7efffefefffefe7f7e7e7f7
e7deefe7def7e7deefe7e7f7efdeffefe7fff7defff7e7ffffdeffffdeffffd6ffffd6ffffceffffceffffc6ffffc6ffffbdffffc6ffffc6f7f7c6e7efbdced6
c6ced6dedee7fffffffffffffffffffff7f7fffffffffffffffffffffffffffffff7efe784736b7b63639c8c849c8c8ca59c949c948c94948c8c8c8c8c94948c
94948c9c947b948c8c94949c9494a5949c9c94949c94949c94949c94949494949c9c9c9c9c9c9ca59c949c9c949c9c8c9c948c9c9c8c9494a59ca5a594949c94
948c8484847b7b736b6b736b6b6363635a5a5a5a52526363636363636363635a5a5a5a5a5a7b73738c7b7b6b5a5a635252635252635a5a635a5a736363635a5a
635a5a5252525a52525252525252524a4a4a4a5252425a52425a52395252425a5242524a42524a424a4a4a524a4a4a4a524a4a5a52527b7373736b635a525252
42425a524a5a4a425a4a395242315a4a39634a396b4a426b4a425a31296331316b39316b31316b31316b31297339316b39396b39395229314a21215229298463
63c6a5a5f7dedefff7f7fffffffff7f7fffff7ffffffffffffffffffffffffffffffffffffffefefffefefc6a5a5845a5a846363946b6bad847bc69494ce9c9c
dea5a5e7adadffc6c6ffceceffded6f7dedeffefe7ffefeffff7effff7effffff7fffff7fffffffffffffffffffffffffffffff7fffffffffff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefe7e7ded6cec6c6ded6cefffffffffffffffffffffffffffff7efe7d69c84736b52398c
735aad946bceb594cece9cd6deadcedeadcedeb5c6deb5cee7b5c6e7bdceefc6cee7c6d6efced6e7ced6efd6deefd6e7efdee7efdeeff7e7eff7e7f7ffeff7f7
eff7fff7f7f7eff7fff7f7fff7fffffff7fff7fffffff7fff7fffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7fff7fffff7f7f7efeff7ef
eff7e7eff7efeff7e7efffefeff7e7eff7efe7f7e7e7f7e7deefdedeefded6efd6d6efded6efe7d6f7e7d6ffefdefff7d6ffffdeffffd6ffffd6ffffceffffce
ffffbdffffc6ffffbdffffc6f7ffceeff7ceeff7bdced6b5c6cec6ced6e7efeffffffffffffffffffffffffffffffffffffffffffffffff7fffff79c8c8c735a
5a94847b947b7bad94949c94949c9c94949c948c9c9c8c9c9c94ada594a59c949494948c8c948c94948c8c948c8c8c84848c84847b7b7b7b7b7b7373736b7373
6373736373735a6b6b6373736b636373636b6b63636b636b6b63636b6363635a636b63636363636363635a5a5a635a6352525a5a5a5a5a5a5a847b7b7b73736b
6363635a5a635a5a5a52525a52524a4a4a52524a524a4a525252524a4a525252525252525a524a524a4a52524a524a4a524a4a4a4a4a524a4a4a4a5a524a524a
425a4a4a5a4a4a73635a846b6b6b52525a39396342425a39396342395a39315a39315a31295a31294a29185221185229215a29215221185221185221186b3931
8c5252b58484deb5bdffdedeffeff7fffffffffffffffffffffffffff7fffff7f7fffffffffffffffffffffffffffffffff7f7ffffffffffffffffffffffffff
ffffffdedeefceceb594947b52528c6363a57373ad7373bd7b7bce8c8cde9c9cd6a5a5deb5b5e7bdbdefcecef7d6ceffdedeffe7deffefefffefeffff7effff7
f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7effff7f7dececed6c6ceefe7e7ffff
ffffffffffffffffffffffffffd6cebd947b6b7b5a429c735ab59473cebd94cece9cd6deb5d6e7b5d6e7bdc6deb5cee7bdc6e7bdceefc6ceefced6efd6d6efd6
e7efdee7efdeeff7e7efefe7eff7eff7f7eff7fff7f7f7f7f7fff7f7fff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7fffff7f7fff7f7fff7eff7eff7ffefeff7e7eff7efeff7e7efffefeff7e7eff7e7e7f7dee7f7dedeefd6deefd6d6e7d6d6efdeceefded6f7
e7cef7e7d6fff7d6fff7deffffd6ffffd6ffffceffffbdffffc6ffffc6ffffbdf7ffc6ffffc6f7ffc6eff7b5d6deadc6ceadc6cedeefefeffffff7ffffeff7ff
fffffffffffffffff7ffffffffffffffffffb5a59c6b52529c8484a59494ad9c9ca59c9c9494947b84846b847b63847b7384847384847b8484737b7b7b7b7b7b
73737b7373736b737b7373736b737373736b6b6b6b7373636b6b5a736b5a6b6b6b6b6b6b636b6b6b6b6b63636b636b63636363636363636363636b5a5a635a63
63525a5a525a5a525a5a6b73737b7b7b6b736b4a52524a5252424a424a52525a635a5a635a525a52525a524a524a5252524a524a5252524a4a4a524a4a5a4a42
63524a634a4a634a4a5a42426b4a426342426b4a426b42427b4a4a845a5a8452526b39396b39396b31316b39316b31296331296329216331296331296b39315a
31295a3931845a52bda594efcec6ffefe7ffffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffdedece9c9ca573738c5a5a9c6363a56b6bad7373b57b7bc68c8cce9494
d6a5a5deadade7bdbdefc6bdf7cecef7ceceffded6ffe7deffefeffff7effff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7efeff7e7efdececed6c6c6efdedefffffffffffffffffffffff7fffff7bdad9c84634a946b52b5846bb59c7bc6bd94cecea5dedeb5cedeb5ce
e7b5c6e7b5ceefc6c6e7bdceefced6efcedeefd6deefd6e7efdeefefe7eff7e7e7efe7f7f7eff7f7eff7fff7f7f7eff7fff7f7fff7fffffff7fff7ffffffffff
fffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7f7fff7f7fff7f7ffeff7fff7eff7e7eff7e7e7efe7eff7e7e7f7e7eff7e7e7efd6e7f7d6
e7efd6e7efd6deefd6deefd6d6e7ced6efd6c6e7cecee7d6c6efded6f7e7d6ffefdefff7d6fff7d6ffffc6ffffbdffffbdffffbdffffbdffffbdffffb5f7f7bd
f7f7ade7e7a5d6d69cc6c6bdd6d6deeff7f7fffff7fffffffffffffffffffffffff7f7ffffffffffffefd6d68c6b6b7b6363947b7bad9c9cada5a59ca5a58494
94738c84637b7b6b847b6b7b7b737b7b6b7373737b7b7373737b7373736b6b7b7373736b6b737373636b6b636b6b636b6b636b6b6363636b636b6363636b636b
6363636363635a636363636352525a525a5a5a5a5a5a5a635252525a63636b7b736b7b734a5a524a5a5252635a52635a525a5252635a4a524a525a524a524a52
524a4a4a4a52524a524a4a524a4a5a4a426b4a427342427342426b42397342426b39396b39396b39396b39397b4242844a4a6331316331316329296b31316b31
316b31316b31317b4242946b63c69c9cefc6c6ffe7e7fffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffff7ff
efefefcec6ceada5a573739c6363a56b6bad7373ad7373b57b7bb58484c68c8cce9c9cd6a5a5deb5adefc6bdf7c6c6ffd6d6ffded6ffe7e7ffefeffff7f7fff7
f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeff7f7e7e7dec6cedececeefe7e7fffffffffffffffffffffff7fffff7bda59c8c5a
4a9c6352ad8c6ba59c73bdb58ccecea5dee7bddeefc6d6efc6c6deb5cee7c6cee7c6d6efcedeefd6e7efdee7efdeeff7e7efefe7eff7efeff7eff7fff7f7fff7
fffff7f7fff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7f7ffeff7fff7f7ffeff7ffefef
f7e7eff7e7e7f7e7eff7e7e7f7e7eff7deeff7d6eff7d6e7efcee7f7d6deefcedeefd6d6efd6d6f7deceefd6cee7d6bde7cec6efdeceefdedeffefd6fff7ceff
ffc6ffffc6ffffbdffffb5ffffadffffadffffa5fff7a5fff7a5f7efa5e7e79cceceadced6cedee7eff7fff7ffffffffffffffffffffffffffffffffffffffff
fff7f79c848c94737b847373948c8ca5a5a5adbdb59cadad849c9c6b84846b8c84637b736b7b736b73737373737373737b7373736b73737373736b6b7373736b
6b6b736b6b6b6b6b6b6b6b636363636b6b6363636363635a5a635a63635a5a5a5a5a63525a5a5a6363525a5a525a5a636b6b7b848463736b52635a4a5a525a63
5a525a52525a5252524a5a5a525a524a5a524a5a4a42635252634a4a634a425a42426b42427339397b39397331317339396b31316b31316b29316b31316b3131
7b42427342426b39396b3939845a5a9c7373ce9ca5efbdc6ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efffded6d6b5adbd9494a57b7ba573739c6b6ba57373a57373b58484c68c8c
d69c9cd69c9cf7bdb5ffcec6ffd6d6ffdedeffefeffff7effffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffffffffeff7f7dededec6cedecece
efe7e7fffffffffff7fffff7fffff7fffff7bd9c947b524284634aa58c6bad9c7bbdb594cecea5d6deb5d6e7bddeefc6d6e7bdd6efc6d6e7c6dee7cedee7d6e7
efdee7e7deefefe7efefe7eff7efeff7e7f7ffeff7ffeffffff7f7fff7fffff7f7fff7fffffff7fff7fffffffffffffffffffffffffffffffffff7fffff7f7ff
f7fffff7f7ffeff7fff7eff7eff7ffefeff7e7eff7e7e7efdee7f7e7e7f7deeff7e7e7efd6eff7d6e7efcee7f7d6deefcedeefced6e7ced6efd6d6e7cecee7ce
c6e7cec6e7cec6decec6e7d6c6e7d6ceefded6ffefcefff7c6fff7bdfff7adfff7a5ffff9cffff9cffff9cfff7a5ffffa5f7efade7e7a5ced6b5ced6b5c6ced6
efefdef7f7efffffffffffffffffffffffffffffffffffffffffcebdbd8c737b7b6b6b8c8484949494a5ada59cb5ad94b5ad6b8c8c6b8c84637b7b6373736b7b
7b737b7b6b6b6b7373737b73737b737b736b6b6b63636b6363736b6b636363636b6b5a63636363635a63636363635a5a5a5a63635a5a5a5a5a5a5a5a5a525a5a
5252526b6b6b7b7b7b636b6352524a5a5a5252524a5a524a5a524a6352525a4a4a634a4a6342426b42425a39396331316331316b39396b39397331397331316b
31316329296b31316b31317342427b52528c6b6b9c7373bd9c9ce7c6c6fff7efffffffffffffffefeffff7ffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffff7ffffffffffffff
fff7f7dedee7c6c6bd9c94a584849c7373a57373ad7373b57b7bbd8484c69494d6a5a5e7bdb5efc6c6f7d6d6ffdedefff7effff7efffffffffffffffffffffff
fffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffeff7efdee7d6ceceded6d6efefe7fffff7fffff7fffffffffff7fff7f7bd9c947b6352735a42a59473ada57bb5ad84c6cea5d6de
b5d6e7bde7efc6deefc6deefcedeefcee7efd6e7efdee7efe7e7efdeeff7e7eff7e7eff7efeff7effffff7f7fff7fffff7f7fff7fffff7f7fff7fffff7fffff7
fffffffffffffffffffffff7fffff7fffff7fffff7f7ffeff7fff7f7f7eff7ffefeff7e7efffefeff7e7eff7e7e7efdeeff7e7e7f7deeff7dee7f7d6e7f7d6de
efcee7efd6deefcedeefd6d6efced6efcecee7ced6efcecee7cecee7cec6dec6c6e7cec6dec6c6e7d6c6efdeceffefc6fff7bdffffa5fff7a5ffff94fff79cff
ff9cffffadffffb5f7f7b5efefadd6deadced69cc6c6bde7ded6f7f7effffff7fffffffffffffffffffffffff7fffffffff7efefa5949c7b6b6b84847b8c8c84
949c9c9cb5adadc6c694b5ad849c946b847b63737363737373847b7373736b6b6b6b6b6b7b73737b73737b6b736b63636b6b6b636b63636b6b5a6363636b6363
6363636363635a5a635a5a5a5a5a635a5a635a5a736b6b847b7b847b7b6b5a5a6b5a526b52526b52526b4a4a735252734a4a6339396339317342426b39396b31
316b31317b3939733131632929632931734a4a84525a845a63946b73c6a5a5efd6d6fffffffffffffffffffffffffffffffffffffffffffff7f7ffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7ffffffff
fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6bdb5a584849c7b7ba57b7b946b6bad7b7bb58484c69c9cd6adad
efcecef7dedeffefefffefeffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeff7efe7e7d6ceced6cec6efe7e7fffffffffffffffffffff7f7fffff7
ad948c8c7363735a42947b63b5ad8cb5ad8cbdbd94d6d6addee7bde7e7c6deefc6e7efd6deefcedeefd6deefd6e7efdee7efdeeff7dee7efdeeff7e7eff7e7f7
ffeff7ffeff7fff7f7ffeff7fff7f7ffeffffff7f7ffeffffff7f7fff7fffff7f7ffeffffff7f7ffeff7ffefeff7eff7ffefeff7e7eff7e7e7efdeeff7e7e7ef
dee7f7dedeefdee7f7dee7efd6e7f7dedeefd6deefd6deefcedeefced6e7c6d6efcecee7c6d6e7cecee7c6cee7c6cee7c6cee7c6c6debdc6dec6bdd6bdbddec6
bde7cebdf7deb5ffe7b5ffefa5ffefa5fff79cfff7a5ffffa5fff7b5ffffb5f7f7b5f7f7ade7efa5dede94cec69ccecebde7dedef7f7efffffffffffffffffff
fffffffffffffffffff7f7d6cece847b7b73736b6b7373848c8c8c9c9ca5bdb5adc6c6a5bdb57b948c6b847b63737363736b636b6b6b6b6b6b6b6b736b6b7363
6b736b6b63636363636363635a636363635a5a63635a635a5a6b635a6b5a5a6b5a5263524a6b5a527b63638c7373735a5a6b4a4a6b42426b42426b42396b4242
6339316b39396331315a29296329296b31316331317b42428c525a9463638c636bad8c8cd6bdbdfff7f7ffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7fffffffffff7fffff7ffffeffffff7fffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ff
fff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7fffffffffffffffffffffff7fffff7fffff7fffff7fffff7fff7f7fffff7fffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffff
ffffefd6d6b59c9cad8c84a57b7b9c7373a5847bb59494ceadaddebdbdf7d6d6f7e7e7fff7effff7f7fffffff7fffffffffff7ffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7de
cecee7ced6f7e7e7fffffffffffffffffffffffffff7efb5a5948c73637b634a947b5aad9c7bc6b58cc6bd9cd6d6addedeb5e7e7c6e7efcee7efd6deefd6e7f7
dee7efdee7f7dee7efdeeff7e7eff7e7f7ffe7eff7e7f7ffeff7ffeff7ffeff7ffeff7fff7f7ffeff7fff7f7ffeffffff7fffff7fffff7f7ffeffffff7f7f7ef
f7ffefeff7e7f7ffefeff7e7eff7e7e7efdeeff7e7e7efdee7efdedeefd6e7f7dedef7d6def7dedeefd6deefd6d6e7ced6efced6e7c6deefced6e7c6d6e7c6ce
e7c6d6e7c6cee7c6d6e7c6cedebdcee7bdbddeb5b5deb5addeb5b5e7c6b5f7d6b5ffe7b5ffefbdffffb5ffffb5ffffadffffadffffa5ffffadffff9cefefa5ef
e79cded694cece9ccececeefefdef7f7f7fffff7fffffffffffffffffffffffffffff7efefb5adad948c8c7373737b7b7b848c8c94a5a5a5bdb5b5cec694adad
7b94946b847b637b735a6b6b636b6b6b6b6b6b6b6b636363736b636b635a736b636b635a6b635a6b5a52735a5a735a52735a5a6b4a4a7352527352528c63638c
63637b52526b39397342396b39397342426b39395a29295a29296b4242946363946b6b845a5a9c7373d6b5adffefefffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7f7f7fffffffffffffffffffffffffffffffffffffffffffffffffff7efd6bdbdb59c949c7b7b9c7373a57b7bc69c9cdeb5b5efcecef7dedefff7f7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffefefffefefdec6cedec6cee7dedefffffffffffffffffffffff7fffff7cebdad8c735a735a39947b5ab59c7bb5a584
c6b594d6cea5d6d6b5dee7c6dee7cedeefd6deefd6e7f7dee7efd6e7f7dee7efd6eff7deeff7deeff7e7eff7e7f7ffefeff7e7f7ffefeff7e7f7ffefeff7eff7
ffefeff7efffffeff7f7eff7ffefeff7eff7f7efeff7e7eff7e7e7efdee7f7e7e7efdee7f7e7e7efdee7efdedeefd6deefd6deefd6def7ded6efd6d6efd6d6e7
ced6e7ced6e7c6d6e7ced6e7c6d6e7c6cee7c6d6e7c6cedebdcedebdcedeb5cee7bdc6e7b5c6e7b5bddeadbddeb5b5d6b5b5debdaddec6b5efd6b5f7e7b5fff7
adfff7adffffa5ffff9cffff9cffff9cffff9cf7ef9cefe794e7de94d6d68cc6c6add6d6cee7e7e7fff7effffffffffffffffffffffffffffffffff7ded6d6ad
a5a58c7b7b7373737b7b7b8c9c9c8ca5a59cbdb59cc6bd94b5b57b94946b847b5a6b6b636b6b5a63636363636b635a73635a6b5a52735a526b52526b52526b4a
4a734a4a6b4242734242734a4a84524a844a4a844a4a6331316329296329296b39397b4a4a8c63638c63639c7b7bad9494efd6d6ffefefffffffffffffffffff
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffeff7ffeff7f7e7eff7e7ef
efe7e7efefefefe7e7efefe7efe7e7f7efefefefe7f7efeff7efeffffffffffffffffffffffffffffffffffffffffffffffff7fffffffff7efe7d6cebd9c9ca5
7b7ba57373bd848cce9ca5e7bdbdf7d6d6ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefffe7e7efd6d6d6c6cedededef7ffffffffffffffffff
fff7fffff7decebda58c7384634a8c7352a58463bda57bbdad8ccec6a5ceceadd6debdd6e7c6deefd6deefd6e7f7dee7efdee7f7dee7efdeeff7deeff7deefff
e7eff7e7f7ffefefffe7f7ffefeff7e7f7ffefeff7eff7ffeff7f7eff7ffefeff7e7eff7efeff7e7eff7e7e7efdeeff7e7e7efdee7f7e7e7efdee7f7dedeefd6
e7efdedeefd6deefdedeefd6def7ded6efd6d6efd6d6e7ced6e7ced6e7c6d6e7c6d6e7c6d6e7c6d6e7bdd6e7bdcedebdd6e7bdcedeb5cee7b5c6deadcee7b5c6
deb5c6deb5bdd6b5bdd6b5b5d6bdb5deceade7d6adf7e7adfff7a5ffff9cffff9cffff9cffffa5ffff9cfff79cf7ef94efe7a5efe79cd6d69ccec6bde7ded6ef
efeffff7fffffffffffffffffffffffffffffffff7f7e7d6d6a5949c7b7b7b6b73736b84847b9c948cb5ad94bdb5a5c6bd94b5ad8494946373735a6b63636363
735a5a735a52735a526b524a73524a6b42427342426b42396b39396b31317339396b31317b39428c52529c63639463639c7373b59494dec6c6ffe7e7fffff7ff
fffffffffffffffffffffffffffffffffff7fff7fffffff7fffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efffefeff7e7e7f7efe7efe7e7f7efeff7
e7e7f7e7e7f7dedef7d6deefced6efced6e7c6cee7c6cedec6cee7d6d6e7ced6e7d6d6dececedececedececee7dedeefe7e7efe7efefe7e7f7efeffff7f7ffff
fffffff7fffffffffff7fffffffffff7ffffffefd6cec69c9ca57373b57b7bc6949ce7bdbdf7d6d6ffefeffff7f7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7
f7ffefefe7d6d6cec6cedededefffffffffffffffffffffff7fffffff7e7d6b59c8c84634a8c634a9c7b5aad8c73b59c7bc6bd9ccec6a5ded6bddedebde7efce
dee7cedeefd6e7efd6eff7dee7efdee7f7dee7efdeeff7e7e7f7e7eff7e7e7f7e7eff7e7e7f7e7eff7efe7f7e7eff7e7e7efe7e7f7e7e7efdee7f7e7deefdee7
f7dedeefdee7f7dedeefd6deefdedeefd6deefd6d6efcedeefd6dee7d6deefd6dee7d6deefd6d6e7ced6e7cecedec6dee7ced6debdd6e7c6d6debdd6e7bdd6de
bdd6e7bdcedeb5cedeb5cedeadcedeb5ced6adcedeadced6adced6b5c6ceadbdceb5adceadadd6bda5d6bda5e7cea5efdeadffefa5ffefa5ffff94ffff94ffff
94fff79cffff94f7f794efe78cded694cece9cceceb5deded6efe7effff7fffffffffffffffffffffffffffffffffff7d6cece9ca59c737b7b5a6b6b637b737b
948c94a59ca5b5ad9cada5949c94737b736b6363734a4a844a427b42427b4242733939733939632929633131734242845252946b6bad8484b58c94d6b5b5efd6
d6fff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7fffff7ffffeffffffffffff7fffffffffff7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7f7f7efefe7e7efe7e7e7dedeefe7e7efde
dee7dededececedececedececee7d6d6deced6e7d6d6e7d6d6efd6deefd6def7dee7f7dee7ffe7eff7e7e7f7efefefe7e7f7e7e7efe7e7f7e7e7efe7e7efe7e7
e7d6dee7d6d6dececedececedececeefd6d6f7dedeefe7e7f7efe7fffffffffff7fffff7fffff7ffffffffefefe7c6c6ad7b84ad737bce949cefbdbdf7ceceff
efeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7f7ffefefded6d6deced6ded6d6f7f7f7fffffffffffffffffffffffffff7efdec6b59c736b845a4a8c
6b52a5846bbd9c84c6ad8ccebd9cdeceaddedebddee7ced6dec6deefd6e7efdeeff7e7e7f7deeff7e7e7f7dee7f7e7e7f7e7e7f7e7e7efe7e7f7e7deefe7e7f7
e7e7efdee7f7dedef7dee7f7dedeefdee7f7dedeefd6e7f7dedeefd6def7dedeefd6def7d6d6efced6efced6e7cedeefd6dee7d6e7efd6deefd6deefd6d6dec6
d6e7c6d6e7cedee7c6d6debdd6e7c6cedebdd6e7bdcedeb5d6debdcedeb5d6deb5d6d6add6deb5ced6add6deb5ced6adced6adbdceadbdd6adadcea5a5cea59c
cea5a5deb5adefc6b5f7d6a5ffe79cffff94ffff94ffff8cfff794ffff94ffff94f7f794efef94dede8ccecea5cecebdded6e7f7eff7fff7ffffffffffffffff
fffffffffffffff7f7efd6d6d6a5a5a57b7b7b6b6b6b7b7b7384847b94948c94948c8c8c8484736b8c52528442397b31317b31318c4a4a9c6363b57b7bad8c8c
c6a5add6bdc6f7e7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7efeff7efefefdedeefdee7e7dede
efdedee7d6d6e7d6d6dececedeced6ded6d6e7dedee7dedeefe7e7efe7e7f7efeff7efeffff7f7f7efeffff7f7fff7f7fff7f7fff7f7fffffffff7fffffffff7
fff7fffffff7fff7fffffff7fff7fffffffffff7fff7f7ffefefffefefffe7e7ffe7e7f7d6d6f7ced6e7cec6ded6cee7ded6f7efeffffff7ffffffffffffffff
ffffffffe7c6cebd848cc6848cd6949cefbdbdefded6fff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7ffefefe7d6d6d6c6c6d6cecef7eff7ffff
fffffffffffff7fffffffff7efefded6b59c8c8c6b5a735a4294735aad8c73bd947bcead8cd6c6adceceadd6d6bdd6dec6e7e7cee7e7cee7efd6e7efd6e7efde
e7efdeeff7e7e7f7dee7f7e7deefdedeefdedee7d6e7efdee7efd6e7f7dee7efd6e7efd6e7efd6e7efd6deefd6e7efd6deefcee7efd6dee7cedeefced6e7c6de
e7ced6e7ced6efcecee7ced6efd6d6efcecee7cec6e7c6ceefc6c6debdc6e7bdc6e7bdc6e7bdc6deb5c6e7b5c6deb5c6e7b5c6deadc6deadc6deadc6deadbdd6
a5bdd6a5bdd6a5bdd6a5adce9cadd6a5a5ce9ca5d69c9cce9c9cd6a594d6a594e7c68cefd69cffef9cffef9cfff794fff794fff78cf7f79cf7f79cefef9ce7de
94cec69cc6bda5c6bdbdd6c6d6ded6fffff7fffff7fffffffffffffffffffffff7fff7f7cecec6b5adad8c84846b6b635a5a526b6363736b6b7b736b947b73ad
8484b58c8cbd9c9cceadadefd6ceffefeffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffff7f7f7f7efefe7dedee7dedee7d6dee7
d6dedeced6e7d6d6dececee7d6d6dececee7d6d6e7d6def7e7e7f7e7e7ffefefffefeffff7f7f7efeffff7f7fff7f7fffffffff7ffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fff7f7ffe7e7ffe7e7
ded6ced6c6bdd6c6bdefdedefff7effffffffffffffffffffff7f7f7cecec6848cbd7b84deadade7cec6efe7deffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7f7efdedee7ced6dec6cef7e7e7fffffffffffffffffffffffffffff7ffffefcec6b5a594847b634a8c63529c735abd947bbd9c84c6b59cce
bda5deceb5deceb5e7dec6e7dec6e7e7cee7e7ceeff7d6eff7deeff7deeff7deeff7dee7efd6e7efdee7efd6eff7dee7efd6efefd6e7efd6efefd6e7efd6e7ef
d6e7efcee7efd6e7efcee7efcedee7c6e7efcedee7c6d6efcec6e7c6ceefceceefcecef7d6c6efcec6efc6bde7bdbde7bdbde7b5bde7bdbde7b5bde7b5b5e7b5
bde7b5b5e7adb5e7adb5deadb5e7adb5dea5b5dea5add6a5b5dea5add69cadd6a5add69caddea5a5d69c9cd69c94ce9494ce948cce9c8cd6ad8cdeb59cefcea5
f7deadffefa5ffef9cf7efa5f7efa5efe79cdedea5d6ce94bdbd94b5ad8ca59c9ca5a5b5b5addeded6f7f7f7fffffffffffffffffffffff7fffffffffff7e7de
debdb5b5adada5b5ada5c6bdbdc6c6bdd6ded6dee7def7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffff7efefe7e7e7ded6d6ded6
d6ded6d6e7dedee7ded6ded6d6dececee7d6dee7dedeefe7e7efe7e7f7efefffefeffff7f7fff7f7fffffffff7f7fffffffff7f7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7f7f7efe7efe7dee7cececeb5ade7cecef7efeffffffffffffffffffffff7f7e7bdc6bd848cce9c9ce7c6bdf7e7
defff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7e7e7efd6dedec6c6ded6d6fff7f7fffffffffffffffffffffff7fffff7f7ef
decebdada58473845a4a8c63529c7363a5846bb5947bc6a58cd6b59cdec6ade7d6b5e7d6b5efdec6e7dec6efe7cee7e7ceefefd6e7efceeff7d6e7f7d6e7f7d6
deefcedeefd6deefcedeefd6d6e7cedeefced6e7c6deefced6e7c6deefced6e7c6deefc6d6e7c6d6e7c6cee7c6cee7c6cee7bdcee7c6ceefc6d6efcecee7bdc6
e7bdc6deb5c6e7b5c6deb5c6e7b5c6deadc6e7b5bddeadbde7adaddea5ade7a5a5de9cadde9ca5d69cadde9cadd694add69cadce94add69cadce94adce94a5ce
8ca5ce8c9cc684a5bd8c9cbd849cbd949cbd94a5cea5a5d6b5ade7ceade7d6a5d6ce9ccec69cc6c694b5ad94a5a5849494848c8c737b736b6b6373736b94948c
c6c6c6fff7f7fffffffffffffffffffffffffffffffffffff7f7efffffffffffffffffffefffffefffffeffffff7fffff7fffff7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7d6ceceb5adad
b5adadd6ceceded6d6e7d6d6ded6d6e7d6d6ded6d6e7dedee7dedeefe7e7f7efefffefeff7efeffff7f7fff7f7fff7f7fff7f7fffffffff7f7ffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7effff7eff7dededebdbdc6adaddec6c6fff7f7ffffff
ffffffffffffffefefcea5a5b58484debdb5f7ded6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffe7efe7d6ded6cece
ded6d6efe7e7fffffffffffffffffffffff7fffffffff7eff7efdecebdb5ad8c84845a52946352946b52a57b63ad8c73bd9c84cead94debda5dec6addeceb5de
d6b5e7debde7debdefefc6efefcef7ffd6deefd6def7d6d6efcedef7d6d6efced6efced6efced6efcecee7c6d6efc6cee7c6d6efc6cee7c6d6efc6cee7c6d6ef
c6d6e7bddee7c6d6e7bddeefc6deefc6deefc6d6deb5d6e7bdcedeb5d6e7b5cedeadd6e7b5cedeadcedeadbddea5b5dea5adde9cadde9cadd69cb5de9cb5d69c
b5d69cb5ce94b5ce94b5c68cb5c68cb5c68cb5c68cadbd84b5bd84b5b57bbdad7bb5a573ada5739c9c73949c7b8c9c8494a59494a59c94a59c8c94948c8c9484
84847b7b7b6b636b6b63637b73739c9c94bdbdb5e7e7def7f7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffeffffff7ff
fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7e7c6
bdbd948c8c8c7b7b8c8484948484948c8c948c8cbdadadded6d6efe7e7efe7e7f7efefffefeffff7f7fff7f7fffffffff7f7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ff
e7e7ffe7e7f7c6ced6a5adc6a5adfff7f7ffffffffffffffffffffffffdec6c6c69494d6a5a5ffded6fff7efffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffff7f7fff7f7f7efeff7efefdeced6cec6c6ded6d6fffffffff7f7fffffffffffffffff7fff7f7ffffffefe7dedec6bdcea594a57363845a
428c634a94735aa5846bad8c73bda584bda58cceb59ccebd9cd6c6addeceade7debddedebdd6e7c6cee7c6d6efcecee7c6d6efced6e7c6d6efcecee7c6cee7c6
cee7bdcee7c6cee7bdcee7bdc6e7bdcee7bdcedeb5d6e7bdd6debdd6e7bdd6deb5dee7bdd6e7bdd6e7b5cedeadcedeb5ced6adcedeadc6d6a5c6d6a5c6d6a5c6
d6a5bdce9cbdd69cbdce94bdce94b5c68cbdc68cbdbd8cbdbd8cb5b584bdb584b5ad7bb5ad7bada573ada56bad9c63bd9c63b58c5aad84529c7b52947b52846b
527b6b52736b5a736b63635a5a6b6363847b7bb5a5a5cebdbdd6c6cecec6cededed6efefe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffff
fff7efefc6bdbd9c9494847373847b7b7b6b6b6b5a5a4a4242524a4a6352527b6b6ba5949ce7d6d6f7efeffff7f7fff7f7fffffffff7f7ffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ff
fffffffffffffffffffff7fffffffffffffff7ffefe7ffd6d6efb5bdc6949cceadadfff7f7ffffffeffffffffffffff7f7ffe7e7ceada5d6a5a5f7ceceffefef
fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7f7e7e7e7d6d6e7cecedec6cefff7f7fff7ffffffffffffff
fffffffffffffffffffffff7fff7efefdecedebdb5b594848c63527352428c6b5a9473639c846ba58c73b59c84bda58cc6b594ceb594cebda5ceceadced6b5ce
ceb5ced6bdced6b5d6debdd6debddee7c6dee7c6dee7c6d6e7bdd6e7bdd6deb5d6debdced6b5d6deb5ced6b5d6debdced6add6d6b5d6deb5dee7bdd6deb5ced6
adc6d6a5ced6adc6cea5c6cea5bdce9cc6ce9cc6c694c6bd94c6bd8cc6bd8cbdad84bdad84b5a57bbda57bb59c73b59c73ad946bad946ba58c63a5845a9c7b52
9c7b529c6b429c6b428c5a39845a39734a317b5a42947b6bbdad9ccebdbdd6cec6d6cecee7dee7f7efefffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7f7cec6c6a59c9c8c8484847b7b736b6b6b5a5a524a4a4a42424a39395242424a4242635a5a736b6b9c9494d6cecef7efeffff7f7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efffe7deffced6dea5a5c69494ceadb5fffffff7fffff7fffff7
fffffffffff7e7e7d6adaddeadadffd6d6ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ff
efeff7dedeefd6d6dec6c6efdedeffeff7fffffffffffffffffff7fffffffffffffff7fffff7fff7eff7efe7e7d6cecebdadad94847b63526b52427b6352846b
5a947363947363a58473ad8c7bbda58cbda58cc6ad94c6ad94c6ad9cc6ad94d6bda5d6bda5dec6addec6a5e7ceaddeceade7ceb5dec6addeceadd6c6a5cec6a5
c6bd9cc6c69cc6bd9ccec6a5cec69ccecea5c6bd94c6bd94bdb58cb5b58cb5ad84b5ad84adad84b5ad84b59c7bbd9c7bb59473b58c73a58463a584639c735a94
73528c6b4a946b528c634a8463427352397b52397352399c7b63b5947bceb59cdec6added6c6ded6c6efe7def7efefffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffdededeb5adad9484847b7373736363635a5a524a4a4a42424a39394a42424a4242524a4a4a42424a4a4a5252526b63638484
84bdb5b5e7e7e7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efefe7d6d6e7cec6dead
b5ce8c94c68c8ce7c6cefffffff7ffffe7fff7efffffffffffffe7e7cea5a5d6ada5f7d6d6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7e7e7efdededeced6ded6d6efe7e7ffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7f7fff7efe7ded6decec6c6a59ca5847b84635a7b5a52845a528c635a8c63529c6b63a57b6bb58c7bb58c7bbd8c7bb58473bd8c7bbd8c7bc69484c6
9c84d6a58cd6a58cd6ad94cea58cd6ad94c6ad94c6ad94bda58cc6ad8cbda58cbda58cbda584bda584ad947bad9473a58c6ba58c6b9484639c84639c7b5a9c73
5a9c6b5a9463528c5a4a845a4a7b52427b52427b5242946b5aa58473bd9c8ccead9ce7c6b5e7d6c6efe7d6efe7d6fff7effff7f7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffefdedead9c9c847b736b635a5a52525a4a4a5242424a42424a42424239394a4242524a4a524a4a524a4a
5252524a4242524a4a5a5a527b7b7badada5d6d6d6f7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffff7ff
fff7fffff7f7ffeff7efd6d6decec6d6bdb5bd8c8cb57b7be7bdbdffefeffffffff7ffffefffffefffffffffffe7d6d6ceadaddeb5b5ffded6fff7f7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7ffefefefe7e7e7cececed6ceceded6def7
efeffff7fffffffff7f7f7fffffffffffffffffffffffffffffffffffffffffffffff7fff7f7f7efe7efe7e7efcec6d6adadbd948cad7b7394635a84524a734a
398452428c5a4a9c6b5a946b5a9c6b639c6b5a9c73639c6b5a9c73639c6b5a9c735a9c6b5a9c73639c6b5a9c735a9c6b5a9c73639c735aa57b63946b5a946b5a
8c63528c634a8452428452427b523984524a8c635a946b63a57b73b5948cc6a59cdec6bde7d6ceefded6efe7def7efe7f7f7effffff7ffffeffffff7fffff7ff
fffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7ffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7fffffffffffffffffffffff7fff7e7e7e7c6cec6adad9c7b7b7b5a5a634242633942634242634a4a5239395a4a4a5242425a
4a4a5242424a42424a4242524a4a4a42424a4a4a4a424263636373736b9c9c9ccececef7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffffffffffffffff
ffffffffffffffffffffffffffffffeff7ffe7e7ffdee7ffdee7e7c6ceceb5b5ad9c949c8484ad8484deb5b5ffe7e7fffffffffffff7fffff7ffffffffffffff
ffcebdbdc6a59cefc6c6f7ded6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ff
ffefffffefffffeffff7eff7f7dededed6cecedececef7e7e7fff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7fff7ff
fffffffff7fffff7f7f7efeffff7eff7e7def7dedeefcec6d6b5adad8c849c7b7394736b9c7b6b946b638c6b6384635a8c635a8463528c6352845a528c635a8c
635a946b5a946b63a5736b9c736bad8473ad847bc69c8cd6ad9cefc6b5f7d6cef7efdef7efe7f7efeff7efefffefeffff7f7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefdee7c6adad845a635a31396b424a6331395a29316339
396331396339396339395a39395239394a39394a39395242425242425a5252524a4a4a42425a52527b7373948c8ccececef7f7efffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefe7ffe7e7ffefefffdedeefceced6adadc69c9cad94948c7b7394847bdec6c6fff7f7
fffffffffffffffffff7ffffffffffffffffffefefceb5b5ceadadefd6d6ffefe7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7fffff7fffffff7f7efdedeefd6d6e7cecee7dedeefefeffffff7ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffff7fffff7fff7effffff7f7f7effff7eff7f7
effff7eff7f7e7fff7eff7f7effff7eff7f7e7fff7eff7f7efffffeff7f7effffff7fff7effff7effff7effffff7fffff7ffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffeff7ffefffffeffffff7fffff7fffffffffff7fffff7fffff7ffffffffffffffffffffff
fff7f7f7eff7f7e7efb58c947b525a6331395221295221295a29296b3942633942523939523942634a4a5a4242524242524242635252736363948c8cbdb5b5ef
efeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fff7effff7efffe7e7ffe7e7ffdedef7d6d6debdbddeb5b5cea5a5ad
8484946b6b9c847bb5a59cf7efe7fffff7fffffffffffffffffff7ffffffffffffffffffffffdecececeadadd6bdb5f7e7def7f7efffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7e7
dedececed6cec6d6d6cef7efe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffffffffffffffff7f7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7fffffff7fffff7ffffe7ffffe7ffffdeffffcefff7a5d6d68cbdbd84b5b59cced6bd
efefd6ffffdeffffefffffeffffff7fffffffffffffffffffffffffffffff7f7fff7f7ffefefe7bdc68c63635231314a29295231395239394a31314a29315231
39523939735a5a8c737bb5a5a5e7d6d6ffefefffefeffffffffffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffff7fff7effff7efffe7e7ffe7e7f7d6d6f7d6
ceefc6c6d6adadcea5a5bd9494a57b7b9c7373946b6bbd9c9cf7e7defffff7fffffffffffffffff7fffffffffffffffffffffffffffffff7dee7d6adb5d6b5b5
f7dedef7efe7f7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7fffff7fff7effffff7f7efe7e7d6cedecec6e7ded6f7efe7fffff7ffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffe7fff7defff7bdefde94cec66bb5
ad6bbdb563c6bd63cec663cec66bded66bded66be7de63d6ce84d6d6a5e7dec6fff7d6ffffe7ffffefffffffffffffffffffffffffffffffffffffffffffffff
fffff7f7e7e7c6b5b56b4a525a31395a39396b424a845a639c7b84c6a5addebdc6e7cecedececeefd6d6e7d6d6f7e7e7ffeff7ffefefffefeffff7f7ffefefff
f7f7fff7f7fffffffffffffffffffff7f7fff7f7fff7f7fffffffff7f7fffffffffffffffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fff7f7fff7f7fff7f7f7efeff7efefefdee7efdee7
efd6d6f7d6ceefc6c6e7bdbddeb5add6adadc69494bd8c8cb58484ad7b7b845a5a94736be7c6c6fffff7fffff7fffffffffff7fff7effffff7ffffffffffffff
fffff7fffff7fffff7e7e7e7c6c6deadb5f7ceceffefe7f7fff7effff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fff7efffefe7e7d6cedececeded6cef7ef
e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7ffeffffff7effff7
add6c684bdb57bbdb573c6bd73cec663cec66bded663e7e763efe763efe763f7ef5af7ef63f7ef5af7ef6bf7ef73efe78cf7ef94efef94e7e794dedeb5f7f7c6
ffffd6ffffdeffffeffffff7fffffffffffffffffffffffffffffffffffffffffffffffff7fff7dee7c6adadad9494b59c9cbda5a5b5a5a5ceb5b5c6b5b5ceb5
bdcebdbddec6c6dececedececee7cecef7dedeefd6d6efd6d6efd6d6f7dee7f7dedeffdee7f7dedeffe7e7ffe7e7ffe7e7ffe7e7ffefefffe7e7ffefeff7efe7
ffefefffefeffff7f7fff7effff7f7fff7f7fff7f7fff7f7fffff7fff7f7fff7f7fff7f7fff7f7ffefeffff7efffefefffefefffefe7ffefeff7e7e7ffe7e7f7
dedef7dedeefd6d6efd6d6e7cecedec6c6d6bdbdd6b5b5cea5a5ce9c9cbd8c8cb58c8ca57b7b9c73738c6363946b6bd6bdb5fff7f7fffff7ffffffffffffffff
fffffffffffff7ffffffffffffffffffffffffffffffffffffefefefd6c6c6d6b5bdf7d6d6ffe7e7fff7f7f7fff7f7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7fff7f7efe7e7e7deded6ceced6ceceded6d6f7efeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ffffefffffe7eff7d6f7
f7deefefd6c6d6b58c9c7b84946b94ad7ba5cead84d6bd6bdece6bded663e7e75aefe752f7f74af7f74affff42f7f74affff52ffff5affff5af7f76bffff73ff
ff7bffff73ffff73ffff6bf7f773f7f76befe773e7e77be7de94efefa5efefc6ffffdefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7efefe7dedec6b5bdada5a5a59494ad9c9cb5a5a5bdadadc6a5a5c6a5a5c69c9cc6a5a5cea5a5d6adadd6adaddeadb5deadaddeb5b5deadb5e7
b5b5e7b5b5efbdbdefbdbdefc6c6e7c6c6e7c6c6e7c6c6efceceefcecef7d6d6efcecef7d6d6efd6cef7d6d6f7d6d6f7d6d6f7d6d6f7d6d6efcecef7cecef7ce
c6f7ceceefc6c6efc6c6e7bdbde7bdbddeb5b5deb5add6ada5d6a5a5c69c94bd9494b58c84b58484ad7b7bad7b7ba573739c6b73946b73b59494dec6c6fff7f7
fff7f7fffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffff7f7e7d6d6d6c6c6cebdbde7d6def7e7effff7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efeff7efefefdee7e7d6d6cec6c6dececef7e7e7fff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffeffff7e7ffff
e7f7f7deeff7dedee7ceced6ada5b58c949c737384526b7b4a6b844a7b945a7b945a8cad6b94c68c73cead6bdece7bffef73ffef63fff74af7f74affff4affff
4affff42ffff4affff4affff5affff63ffff6bffff63ffff52ffff52ffff52ffff52fff75affff5af7f76bfff77bf7ef8cf7ef9ce7e7b5e7e7cee7efe7f7f7ff
f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeff7efdee7dec6cec6adadbd9c9cbd9c9cb59494bd94
94b58c8cb58c8cad8484bd8c8cad7b7bad7b7bad7b7bbd8484bd848cc68c94bd8c8cc68c8cbd8c8cc69494ce9494d6a5a5d6a5a5deadaddea5a5deadaddea5a5
deadaddea5a5deadaddea5a5dea5a5ce9c94ce9c94c69494c69494bd8c8cbd948cb58c84b58c84ad7b73ad847ba57b73ad7b73a57373a57b739c7373b58484ce
a5a5efc6ceffdee7fff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7efe7ced6d6c6
c6d6c6c6efdee7f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efef
f7e7e7f7e7efe7d6d6d6c6ced6c6c6efdedef7efeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7effffffffffff7fffff7
f7f7eff7f7efe7e7dee7e7dededec6c6ceada5ad848c946b7384527384526b7b4a738452738c527b945a738c4a73944a7b9c5294bd738cb56b6b9c5a5aa56b63
bd8c73d6ad8cffd684ffef73fff75affef4afff742fff74affff4affff52ffff4affff52ffff4affff4affff39ffff39ffff39ffff42ffff4affff5affff63ff
f77bffff8cfff7a5f7f7b5efefceeff7deefefefeff7efefefeff7f7eff7eff7f7f7f7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7f7ffefeff7dedeefcecedebdbdd6b5b5b59494ad8c8ca57b7ba57b7b9c7b7ba57b7b9c6b73a57373ad7373b57373b57373bd
737bb57373bd7b7bbd737bbd7b7bb57373bd737bbd737bbd7b7bbd737bbd7b7bb57b7bad847b9c7b739c7b739c73739c737394736b947373947373ad8c84ad94
8cc6a5a5d6bdb5f7d6ceffe7defff7efffefeffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7ffffffffffff
fff7fffffffff7efefe7d6d6cebdbdd6c6c6deced6f7e7efffeff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7efe7e7efdee7e7d6d6ded6d6d6cecee7d6d6efe7e7fff7f7f7f7f7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffeffffff7ff
ffefffffefeff7deeff7dedee7cedee7c6c6ceadb5bd9c9ca58484946b6b7b52737b4a6b844a738c4a738c4a7b945a7b9c5a849c5a7b945284a55a7ba5528cad
6394bd6b9cce738cb56384ad5a73a55263a5525aa55a63b57363c68c73dead73efc673ffe76bffef63ffff52ffff52ffff4affff52ffff52ffff52ffff4affff
4affff4affff52ffff52ffff63ffff6bffff84ffff94ffffb5ffffc6ffffdeffffe7fffff7ffffeff7f7f7f7f7efefefeff7f7efefeff7f7f7f7f7f7ffffffff
f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffff7f7fff7
f7ffefefffe7e7f7d6d6efc6c6efbdbdefc6c6e7bdb5e7bdb5deb5b5e7b5b5d6ada5d6a5a5d6a5a5d6ada5d6a5a5deadadd6adaddeb5b5ceb5b5d6bdb5d6bdbd
e7d6ceefded6ffefe7fff7effffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7f7f7efefded6d6d6c6c6cec6c6e7dedef7e7e7fff7f7fff7f7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7f7efe7e7f7e7e7
e7d6d6dececed6c6c6dececee7d6d6f7e7e7f7efefffefeffff7f7fffffffffffffffffffff7f7fffffffffffffffffffffffffffffffff7fffffffffff7ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffff7f7ff
eff7ffefeff7deefefcedee7b5d6e7adcedea5cedea5b5ce8ca5bd7b94ad6b849452738c42738c42738c427b944a7b944a849c527b9c4a84a5527b9c5284a552
7b9c4a7ba5527ba5527bad5273a54a7bad528cbd5a94c66b84b55a7bad5273a54a7bad5273ad4a73ad5263a55252a5524aa5635ac68c73e7bd84ffe77bf7ef6b
fff75afff75affff5affff5affff52ffff63ffff6bfff773ffff7bffff8cffff8cffffa5ffffadffffc6ffffceffffdeffffefffffffffffffffffffffffffff
fffffffff7f7f7f7fffff7f7f7f7f7f7efefeff7eff7f7efeffff7f7f7f7f7fff7f7fff7f7fffffffff7f7fffffffffffffffffffffff7ffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffff7ff
fffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7eff7f7e7efefd6dee7d6d6cebdbddececee7dedef7e7e7efe7e7fff7f7fff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7f7fff7f7ffefefffefeff7e7e7efdededececedeced6e7d6d6efdedef7e7e7f7e7e7efdedeefe7e7e7dedef7ef
effff7f7fffff7fffff7fffffffffffffffffffffff7fffffffffff7fffff7fffff7fffffffffff7fffff7ffffeffffff7ffffeffffff7ffffefffffeff7f7de
eff7d6dee7c6d6debdd6d6b5d6deb5ced6adc6d6a5bdc694b5bd8c94ad6b849c526b84396b8c396b8c397394427b9c4a8ca55294b5638cad527b9c4a84a54a7b
a54a84a54a84a54a84a54a739c427ba54a7ba54a7bad4a7ba54a7bad527bad528cbd6394c66b94ce6b84b55a7bad5273ad4a73ad526ba54273ad4273ad4273b5
5273b55a6bbd6b63bd7b63c68c5ac69c63d6b573efd68cfff784ffff7bffff73fff784ffff94ffffadffffb5ffffbdffffc6ffffd6ffffd6ffffe7ffffefffff
f7fffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffff7efeff7efefefe7e7efe7e7efe7e7f7efeff7
efeff7f7efefefeff7f7eff7f7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efeff7efeff7dedeefd6d6dec6c6e7ceceefd6d6efe7e7ef
e7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7fffff7f7ffeff7f7e7e7efe7e7
efdedee7deded6c6c6cebdbdc6b5b5c6b5b5cec6bdd6d6c6cecebdd6d6bdd6d6bddedec6d6d6bdd6d6bdceceb5d6d6b5ced6add6debdd6debddedebdd6d6b5ce
d6adc6cea5c6d6a5c6d6a5c6d6a5b5c694b5c68ca5bd8494a56b73844a738c427384427b944a7b944a7b944a7b944a7b9c5273944a73944a7b9c527ba5527394
4a7ba55284ad5a9cc66b84a5527ba54a7ba54a84a5527ba54a84ad5284ad5284b5527bad4a7bad4a73ad4a7bb5527bb5528cc6638cc66384bd5a73ad4a73ad52
73ad4a6bad4a6ba54a7bb55273b5527bbd5a7bbd5a84c66b7bbd6b73b5735aa56b5aa57b5aad8c7bc6b58cded6a5f7efa5f7f7adffffadffffceffffe7fffff7
ffffeffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffff7eff7f7efefefe7e7e7e7e7d6ceced6ceced6cecededed6dededeefefe7efefe7efefefefe7e7efefe7efefe7fff7f7fff7f7ffffff
fffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7f7f7f7efefe7efefefefe7e7efefe7e7dededed6d6d6c6
c6dececeefdedef7e7e7ffe7e7ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fff7f7f7efeff7f7eff7efefefe7d6d6d6bdceceb5bdbda5bdbd9cadad8c9ca5848c946b8c94
6b8c94638c946b8c94638c946b8c9463949c6b8c9c63849c637b945a7b9452738c527b94527b9c5284a5638cad6394b56384ad5a84ad527ba54a84a54a7ba54a
84a54a7ba5527ba5527ba55284ad5a7ba5527ba5527ba5528cbd639cce7384b56373a54a7bad527bad527bad5273a54a7bad5273a54273ad4a7bad5284bd5a8c
bd6394c66b8cbd6b84b55a73ad5273ad5a73a5527bb55a84bd6384bd6b7bb5638cc66b8cc66b8cc67384bd6b84b5737bad7384b58494bd94add6bda5cebdb5de
d6c6efefd6ffffd6ffffdeffffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7efeff7efefefe7e7e7e7e7deded6deded6de
d6d6d6d6ced6ceceded6d6e7dedeefe7e7efefe7f7efeff7efe7f7efeff7e7e7f7efeff7e7e7f7efeff7efe7ffefeff7efe7fff7effff7effffff7fff7f7ffff
f7fffff7fffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7efeff7efefefefefefefefefe7e7efefefefe7e7efefefefefe7e7e7e7ded6d6
d6cececececed6d6d6ded6d6e7dedee7dedef7efefffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffefffffef
ffffe7ffffe7f7f7deefefced6d6bdced6b5ceceadced6adc6c69cb5b58c9ca57b9ca5739ca57ba5b5849cbd849cbd7b8cad738cad6b84ad638cad637ba55a8c
ad638cb56394bd638cb5638cb55a84ad5284ad527ba54a7bad5273a5527bad5a73a55273a55273a54a7bad527bad5a9cce737bad5a73a55273a54a7bad5273a5
527bad5273ad5284b55a84b5638cbd6b8cbd6b8cbd7384b5637bad637bad6384b56b7bad6b8cbd738cbd7b9cce8494c68494bd7b84ad6b8cbd7b9cc68cb5d69c
bddeadcedebdcedebdd6e7ceefffe7f7fff7f7fffff7fffff7fffff7ffffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7f7fffffffff7f7fff7f7f7efeffff7f7f7efeff7efefefe7e7efe7e7e7dedee7dededed6d6e7d6d6e7d6d6efd6d6e7cecee7cecee7ceceefcece
e7ceceefceceefd6d6f7dedef7dedef7dedef7dedeffe7e7f7e7e7f7efefefefeff7efefefe7e7efe7e7e7dedee7dededed6d6ded6ded6d6d6d6d6d6cec6ced6
ceced6ceced6ced6d6ceceded6d6ded6d6efdedeefdedef7efeff7efeff7f7f7fff7f7fffff7fff7f7ffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ffffeffffff7ffffefffffe7e7efd6e7e7ced6d6bdd6d6bdc6d6b5bdd6
adadce9cadce9c9cbd8ca5c68c9cbd849cbd848cb57394b57394bd7ba5c6849cc67b9cc67b94bd6b8cb56b84ad6384b5637bad5a7bad5a73a55273ad527bad52
84b56394c67384b56373ad527bad5a7bb55a84b56384b5638cbd7394bd7b9cce849cc68494bd7b8cb5738cb57b94bd7b9cc68c94bd849cc694a5ce94b5d6a5b5
deadbde7b5bddeadcee7bdd6e7bde7f7d6eff7deffffe7ffffeffffff7fffff7fffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7fffff7f7fff7f7ff
f7f7fff7f7ffefefffefeff7e7e7ffefeff7e7e7ffefefefdedef7e7e7f7e7e7f7e7e7efdedef7e7e7efe7e7f7e7e7efdedeefe7e7efe7e7efe7e7efe7e7efe7
e7efe7e7efe7e7efe7e7efe7e7efe7e7f7e7efefe7e7f7eff7f7efeffff7f7ffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7fffffffffff7f7ffefe7f7dedeefd6d6e7cecee7cec6dec6cee7c6c6debdc6deb5b5d6adbdd6adb5d6a5b5d6a5adce9cadce9ca5c68c9c
c6848cbd738cbd7384b56b84b56b84b5638cb56b8cbd6b9cc67b8cbd738cbd738cbd7394c67b94bd739cce84a5ce8cadd69cadce9cb5d6a5b5d6a5bddeadbdde
adc6e7bdc6debdcee7c6cee7c6d6efd6def7deefffe7e7ffe7f7ffeffffff7fffff7fffff7fffffffffff7fffffffffff7ffffffffffffffffffffffffffffff
fffffffffffff7fffff7ffffeffffff7ffffeffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffff7f7f7fffff7f7f7f7fffffff7f7f7ffffff
f7f7f7fff7f7fff7f7fff7fffff7f7fffffffff7f7fffffffff7f7fffffffff7f7fffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffff7fff7f7fff7efffefefff
efe7f7e7e7f7e7deefdedeefdedeefd6def7d6d6efc6d6efc6cee7bdceefbdc6e7bdc6e7bdc6deb5c6e7bdc6e7bdcee7bdc6e7bdceefc6ceefc6d6efc6d6efc6
def7d6def7d6e7f7dee7f7deefffe7efffe7f7ffefefffeff7fff7f7ffeffffff7f7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7fffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7fff7fffffff7fffffffffff7fff7f7fffff7fff7f7fff7eff7eff7
fff7f7fff7fffffff7fff7fffffff7fffffffffff7fff7fffff7fffff7fffffff7fff7fffff7fffff7fffffff7fff7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffefff
fff7fffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff040000002701ffff030000000000}}}{
\b\f35\insrsid5050383\charrsid6388653 
\par LICENCE GRANTED UNDER 
\par 
\par THE TANZANIA COMMUNICATIONS ACT, 1993 AND THE TANZANIA COMMUNICATIONS REGULATORY AUTHORITY ACT, 2003
\par 
\par BY THE TANZANIA COMMUNICATIONS REGULATORY AUTHORITY
\par 
\par 
\par TO
\par 
\par 
\par }{\b\f35\fs36\insrsid10748263 <?php echo $name; ?>}{\b\f35\fs36\insrsid5050383\charrsid14231525 
\par }{\b\f35\insrsid5050383\charrsid6388653 FOR
\par 
\par 
\par THE PROVISION OF }{\b\f35\insrsid5050383 NATIONAL }{\b\f35\insrsid5050383\charrsid6388653 NETWORK SERVICES IN THE 
\par UNITED REPUBLIC OF TANZANIA
\par 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp160 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp440 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 
\par }\pard \qc \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp160 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp440 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid5050383 {
\b\f35\insrsid5050383 DATE: }{\b\f35\insrsid10748263 <?php echo $issue_date; ?>}{\b\f35\insrsid5050383 
\par 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp160 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp440 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid5050383 {
\b\f35\insrsid5050383 
\par }{\b\f35\insrsid5050383\charrsid6388653 
\par }\pard\plain \s16\qj \li0\ri0\sl440\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid10748263 
\par }{\b\fs24\insrsid5050383\charrsid6388653 LICENCE GRANTED BY TANZANIA COMMUNICATIONS REGULATORY AUTHORITY TO }{\b\fs24\insrsid3820554 <?php echo $name; ?>}{\b\fs24\insrsid5050383\charrsid6388653  FOR PROVISION OF }{\b\fs24\insrsid5050383 NATIONAL }{
\b\fs24\insrsid5050383\charrsid6388653 NETWORK SERVICES IN THE UNITED REPUBLIC OF TANZANIA
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\lang2057\langfe1033\langnp2057\insrsid5050383 
\par }{\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 1.0\tab}}\pard \qj \fi-720\li720\ri0\sl360\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\b\f35\ul\insrsid5050383\charrsid6388653 DEFINITION
\par }\pard\plain \s16\qj \li720\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 
In this licence, unless stated otherwise or the context otherwise requires:-
\par }\pard \s16\qj \fi-720\li720\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\*\atrfstart 255023708}{\listtext\pard\plain\s16 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 1.1\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 \'93Acts\'94}{\fs24\insrsid5050383\charrsid6388653  means the Tanzania Communications Regulatory Authority Act }{
\cs21\v\fs24\insrsid5050383\charrsid6388653 {\*\atrfend 255023708}{\*\atnid U}{\*\atnauthor User}\chatn {\*\annotation{\*\atnref 255023708}{\*\atndate -2131753000}\pard\plain 
\s22\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs20\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cs21\fs16\insrsid5050383 \chatn }}}{\fs24\insrsid5050383\charrsid6388653 
No.12 of 2003 and the Tanzania Communications Act No.18 of 1993;
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s16 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 1.2\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 \'93Application Fees\'94 }{\fs24\insrsid5050383\charrsid6388653 
means a fee paid by an applicant when applying for a licence;
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s16 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 1.3\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 \'93Authority\'94}{\fs24\insrsid5050383\charrsid6388653  means the Tanzania Communications Regulatory Authority;
\par }\pard\plain \s17\qj \li1440\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s16 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 1.4\tab}}\pard\plain \s16\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid5050383\charrsid6388653 \'93Initial Licence Fees\'94 }{
\fs24\insrsid5050383\charrsid6388653 means the once off fee paid to the Authority for the grant of the Licence;
\par }\pard \s16\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s16 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 1.5\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 \'93Licence\'94 }{\fs24\insrsid5050383\charrsid6388653 
means authority to construct, provide, own and make available Network Facilities;}{\fs24\ul\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\ul\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \li0\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\cs21\v\fs24\insrsid5050383\charrsid6388653 {\*\atnid U}{\*\atnauthor User}\chatn {\*\annotation{\*\atndate -2131753000}\pard\plain 
\s22\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs20\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cs21\fs16\insrsid5050383 \chatn }}}{\fs24\insrsid5050383\charrsid6388653 1.6}{
\b\fs24\insrsid5050383\charrsid6388653 \tab \'93Licensee\'94}{\fs24\insrsid5050383\charrsid6388653  means }{\b\fs24\insrsid3820554 <?php echo $name; ?>}{\b\fs24\insrsid5050383\charrsid5194610 
\par 
\par }\pard \s16\qj \fi-720\li720\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 1.7}{\b\fs24\insrsid5050383\charrsid6388653 \tab \'93Network Services\'94}{
\fs24\insrsid5050383\charrsid6388653 
 means a service for the carrying of information in the form of speech or other sound, data, text or images, by means of guided or unguided electromagnetic energy but does not include services provided solely on the customer side of the network boundary;

\par }\pard \s16\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \fi-720\li720\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\cs21\v\fs24\insrsid5050383\charrsid6388653 {\*\atnid U}{\*\atnauthor User}\chatn {\*\annotation{\*\atndate -2131753000}
\pard\plain \s22\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs20\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cs21\fs16\insrsid5050383 \chatn }{\insrsid5050383 1}}}{
\fs24\insrsid5050383\charrsid6388653 1.8}{\b\fs24\insrsid5050383\charrsid6388653 \tab }{\b\fs24\insrsid5050383 \'93}{\b\fs24\insrsid5050383\charrsid6388653 Royalty\'94}{\fs24\insrsid5050383\charrsid6388653 
 means a charge paid to the Authority for providing licensed services.
\par }\pard \s16\qj \li0\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 2.0\tab}}\pard\plain \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin720\itap0\pararsid5050383 
\fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\b\f35\ul\insrsid5050383\charrsid6388653 SCOPE OF THE LICENCE
\par }\pard \qj \li720\ri0\widctlpar\jclisttab\tx1440\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 2.1.\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls2\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 In accordance with Section 6 of the Tanzania Communications Regulatory Authority Act, 2003 and Section 11 of the Tanzania Communications Act, 1993, the Authority hereby grants a }{\f35\insrsid5050383 L}{
\f35\insrsid5050383\charrsid6388653 icence to}{\b\f35\insrsid5050383\charrsid6388653  }{\b\f35\insrsid3820554 <?php echo $name; ?>}{\b\f35\insrsid5050383\charrsid6388653  }{\f35\insrsid5050383  to provide National Network S}{\f35\insrsid5050383\charrsid6388653 
ervices in the United Republic of Tanzania as contained in }{\b\f35\insrsid5050383\charrsid6388653 Appendix I \endash  Roll out Plan }{\b\f35\insrsid5050383 for }{\b\f35\insrsid5050383\charrsid6388653 National }{\b\f35\insrsid5050383 Network }{
\b\f35\insrsid5050383\charrsid6388653 Services.}{\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383 \hich\af35\dbch\af0\loch\f35 2.2\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls7\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383 T}{
\f35\insrsid5050383\charrsid6388653 he Licensee shall be required to submit annually to the Authority updated roll out plans on the provision of its services.}{\f35\insrsid5050383 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\f35\insrsid5050383\charrsid6388653 3.0.\tab }{\b\f35\ul\insrsid5050383\charrsid6388653 DURATION AND RENEWAL OF THE LICENCE

\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard\plain \s19\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 \f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 3.1\tab 
This Licence is granted on }{\b\fs24\insrsid3820554 <?php echo $effective_date; ?>}{\fs24\insrsid5050383\charrsid6388653  (the Effective Date) for a period of <?php echo $duration;?> years (\'93the licence period\'94).
\par }\pard \s19\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard\plain \s20\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid5050383\charrsid6388653 3.2.\tab 
The Authority shall renew the licence in accordance with the Tanzania Communications Reg
ulatory Authority Act, 2003, on substantially the same terms and conditions as those applicable to the Licensee during the preceding licence period provided that the licensee has not been in the material breach of the licence conditions.
\par 
\par }{\insrsid5050383 3.3\tab The L}{\insrsid5050383\charrsid6388653 icence terminates upon expiry of the licence term if it is not renewed.
\par }\pard\plain \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \li0\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\f35\insrsid5050383\charrsid6388653 4.0\tab }{\b\f35\ul\insrsid5050383\charrsid6388653 OWNERSHIP AND CORPORATE OBLIGATION
\par }\pard\plain \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \fi-720\li720\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 4.1. \tab The Licensee\rquote s shareholding structure is as contained in }{
\b\fs24\insrsid5050383\charrsid6388653 Appendix II.}{\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \fi-720\li720\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 4.2.\tab The Licensee shall comply with the following conditions on ownership:-
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \fi-2160\li1620\ri0\sl260\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ilvl2\adjustright\rin0\lin1620\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 \tab 4.2.1.\tab 
to notify the Authority in writing of any changes to its ownership and control structure.
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \fi-900\li1620\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1620\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 4.2.2.\tab to notify the Authority of any joint venture into which it enters with any:}{
\fs24\insrsid5050383 -}{\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 (a)\tab}}\pard \s16\qj \fi-900\li2520\ri0\sl260\slmult0\widctlpar
\jclisttab\tx2160\aspalpha\aspnum\faauto\ls3\adjustright\rin0\lin2520\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 person; or 
\par }\pard \s16\qj \li1080\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1080\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s16\qj \fi-1620\li1620\ri0\sl260\slmult0\widctlpar\jclisttab\tx1080\aspalpha\aspnum\faauto\ilvl2\adjustright\rin0\lin1620\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 \tab \tab (b) }{\fs24\insrsid5050383  }{
\fs24\insrsid5050383\charrsid6388653 entity holding a licence issued by the Authority. }{\fs24\insrsid5050383 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s16 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 5.0\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls5\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 LICENCE FEES
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\cf1\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 5.1\tab}}\pard\plain \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls5\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 
\fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\cf1\insrsid5050383\charrsid6388653 The Licensee shall in respect of the National Network Services Licence be required to pay Authority the following:
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\cf1\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\cf1\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 5.1.1\tab}}\pard \qj \fi-720\li1440\ri0\widctlpar\aspalpha\aspnum\faauto\ls5\ilvl2\adjustright\rin0\lin1440\itap0\pararsid5050383 {
\f35\cf1\insrsid5050383\charrsid6388653 Application fee of }{\b\f35\cf1\insrsid5050383\charrsid6388653 USD <?php echo number_format($fee->application_fee,2); ?> }{\f35\cf1\insrsid5050383\charrsid6388653 ;
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\cf1\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\cf1\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 5.1.2\tab}}\pard \qj \fi-720\li1440\ri0\widctlpar\aspalpha\aspnum\faauto\ls5\ilvl2\adjustright\rin0\lin1440\itap0\pararsid5050383 {
\f35\cf1\insrsid5050383\charrsid6388653 Initial licence fee of }{\b\f35\cf1\insrsid5050383 USD <?php echo number_format($fee->initial_fee,2); ?>;
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\cf1\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 5.1.3\tab}}\pard \qj \li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls5\ilvl2\adjustright\rin0\lin720\itap0\pararsid5050383 {
\b\f35\insrsid5050383\charrsid6388653 <?php echo $annualFee;?>}{\f\cf1\insrsid5050383\charrsid3357100 
\par }\pard\plain \s18\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s18\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 5.2\tab The royalty shall comprise of income r
eceived from licenced services during the operating year and shall exclude interconnection charges payable to other operators.
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\cf1\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\cf1\insrsid5050383\charrsid3357100 \hich\af35\dbch\af0\loch\f35 5.3.\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls6\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\cf1\insrsid5050383\charrsid3357100 The royalty fee shall be paid quarterly in arrears. Any royalty fee delayed for }{\f35\insrsid5050383\charrsid3357100 more than thirty (30) days shall attract an interest at prevailing official bank lending rate.}{
\b\f35\insrsid5050383\charrsid3357100  
\par }\pard\plain \s18\qj \fi-840\li2280\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin2280\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid5050383\charrsid3357100  }{
\fs24\insrsid5050383\charrsid3357100 
\par {\listtext\pard\plain\s18 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383 \hich\af35\dbch\af0\loch\f35 6.0\tab}}\pard \s18\qj \fi-750\li750\ri0\widctlpar\jclisttab\tx750\tx2280\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 
{\b\fs24\ul\insrsid5050383 AUDITED }{\b\fs24\ul\insrsid5050383\charrsid6388653 ACCOUNTS
\par }\pard \s18\qj \li750\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin750\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }{\fs24\insrsid5050383 The Licensee shall be required to prepare and submit to the Authority audited accounts on an annual basis within ninety (90) days immediately after the end of the financial year of the Licensee.
\par }\pard \s18\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s18 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 7.0\tab}}\pard \s18\qj \fi-750\li750\ri0\widctlpar
\jclisttab\tx750\tx2280\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 REQUIREMENT TO PROVIDE INFORMATION}{\b\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s18\qj \fi-720\li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 7.1\tab The Licensee sha
ll be required to maintain financial records in accordance with good accounting practices and shall make the books and records of accounts available for inspection by the Authority.
\par }\pard \s18\qj \li750\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin750\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s18\qj \fi-720\li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 7.2\tab The Licensee shall be required to submit to the Authority on an annua
l basis within 90 days immediately after the end of the financial year of the Licensee the following information:
\par }\pard \s18\qj \li750\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin750\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par }\pard \s18\qj \fi-720\li1440\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid5050383 {\fs24\insrsid5050383 7.2.1   }{\fs24\insrsid5050383\charrsid6388653 annual reports;
\par }{\fs24\insrsid5050383 7.2.2   }{\fs24\insrsid5050383\charrsid6388653 audited financial statements,
\par }{\fs24\insrsid5050383 7.2.3   }{\fs24\insrsid5050383\charrsid6388653 geogr}{\fs24\insrsid5050383 aphical and population coverage.}{\fs24\insrsid5050383\charrsid3357100 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s18 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid15285721 \hich\af35\dbch\af0\loch\f35 8.0\tab}}\pard \s18\qj \fi-750\li750\ri0\widctlpar
\tx720\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid15285721 QUALITY OF SERVICE
\par }\pard \s18\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid810145 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 The Lice
nsee shall also be required to comply with Quality of Services as provided in the Regulations issued under the Acts.}{\b\fs24\ul\insrsid5050383\charrsid6388653  }{\b\fs24\ul\insrsid5050383 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s18 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 9.0\tab}}\pard \s18\qj \fi-750\li750\ri0\widctlpar
\jclisttab\tx750\tx2280\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 SPECTRUM REQUIREMENTS
\par }\pard \s18\qj \li720\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 
\par }{\fs24\insrsid5050383\charrsid6388653 The Authority will assign frequencies to the Licensees in accordance with the Regulations issued under the Acts and as specified in the Appendix to the Licence for Radio Frequency Spectrum Resource.}{
\fs24\insrsid5050383 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s18 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 10.0\tab}}\pard \s18\qj \fi-750\li750\ri0\widctlpar
\tx720\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 MODIFICATION
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s18 \f35\lang2057\langfe1033\langnp2057\insrsid5050383 \hich\af35\dbch\af0\loch\f35 10.1\tab}}\pard \s18\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\fs24\insrsid5050383 M}{\fs24\insrsid5050383\charrsid6388653 odification of the terms and conditions of this Licence together with the Appendices shall only be made by written agreement between the Licensee and the Authority. 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s18 \f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 10.2\tab}}\pard \s18\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid7760478 {\fs24\insrsid5050383\charrsid6388653 The Licensee and the Authority shall give due consideration to any proposal for modification made by the other party.}{
\fs24\insrsid5050383 
\par }\pard \s18\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid7760478 {\fs24\insrsid7760478 
\par }\pard \s18\qj \li1440\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid7760478 {\fs24\insrsid7760478 
\par }{\fs24\insrsid7760478\charrsid3357100 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s18 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 11.0\tab}}\pard \s18\qj \fi-750\li750\ri0\widctlpar
\jclisttab\tx750\tx2280\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 COMPLIANCE WITH THE LAW}{\b\fs24\insrsid5050383\charrsid6388653 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 The Licensee shall comply with the provision of the Acts and other laws of the United Republic of Tanzania.}{
\f35\insrsid5050383 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 12.0\tab}}\pard \ql \fi-750\li750\ri0\sl360\slmult0\widctlpar\tx720\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 {
\b\f35\ul\insrsid5050383\charrsid6388653 COMPLIANCE WITH REGULATORY REQUIREMENTS
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 The Licensee shall comply wi
th all conditions stipulated in this licence and other regulatory requirements provided under Regulations and Rules issued under the Acts.}{\f35\insrsid5050383 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 13.0\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid5050383 {
\b\f35\ul\insrsid5050383\charrsid6388653 INDEMNITY
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard\plain \s17\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 
The Licensee shall indemnify the Authority against any claims or proceedings arising from any breach or failings on the part of the Licensee in relation to this licence.
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 14.0\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid5050383 {
\b\f35\ul\insrsid5050383\charrsid6388653 SAFETY MEASURES
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
The Licensee shall in respect of services operated, maintained or offered under this licence take proper and adequate safety measures to safeguard life or property
, including exposure to any electrical emissions or radiations emanating from equipment or installation from such operations.
\par }\pard\plain \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s17 \b\f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 15.0\tab}}\pard \s17\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid5050383 {\b\fs24\ul\insrsid5050383\charrsid6388653 PROVISION OF NETWORK SERVICES
\par }\pard \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s17 \f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 15.1\tab}}\pard \s17\qj \fi-750\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
The Licensee shall provide network services in accordance with the applicable recommendations of the International Telecommunication Union, other International standardisation bodies and any relevant regulations.}{\fs24\insrsid5050383 
\par }\pard \s17\qj \li-30\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin-30\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s17 \f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 15.2\tab}}\pard \s17\qj \fi-750\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 The Licen}{\fs24\insrsid5050383 see shall provide }{\fs24\insrsid5050383\charrsid6388653 Network Services}{
\fs24\insrsid5050383  as contained in Appendix I }{\fs24\insrsid5050383\charrsid6388653 within a maximum period of six (6) months from the effective date of this licence.
\par }\pard \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s17 \f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 15.3\tab}}\pard \s17\qj \fi-750\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 The Licensee shall not be required to provide network services where in the Authority\rquote 
s view it is not reasonable to require the Licensee to provide the services, including, but not limited to the following circumstances.
\par }\pard \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s17 \f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 15.3.1\tab}}\pard \s17\qj \fi-1800\li2520\ri0\widctlpar
\jclisttab\tx1620\aspalpha\aspnum\faauto\ls4\ilvl2\adjustright\rin0\lin2520\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 where it is beyond the Licensee\rquote s control;
\par }\pard \s17\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\s17 \f35\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 15.3.2\tab}}\pard \s17\qj \fi-900\li1620\ri0\widctlpar
\jclisttab\tx1620\aspalpha\aspnum\faauto\ls4\ilvl2\adjustright\rin0\lin1620\itap0\pararsid5050383 {\fs24\insrsid5050383\charrsid6388653 where it would expose any person engaged in provision of the Network services to undue risk to health or safety; or}{
\fs24\insrsid5050383  }{\fs24\insrsid5050383\charrsid6388653 where it is not reasonably practicable.
\par }\pard \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\insrsid5050383 
\par 
\par }{\fs24\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 16.0\tab}}\pard\plain \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid5050383 
\fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\b\f35\ul\insrsid5050383\charrsid6388653 CONFIDENTIALITY OF CUSTOMER INFORMATION
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard\plain \s19\qj \li720\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 \f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid5050383\charrsid6388653 
The Licensee shall not disclose any information about any of its customers to any third party except to the extent that such information is required:-
\par }\pard\plain \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 16.1\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 for the purposes of debt collection by the Licensee from the customer concerned,
\par }\pard \qj \li720\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 16.2\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 for statistical or research purpose provided the information is in such a way that it does not link to a particular customer; 
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 16.3\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 by the Licensee\rquote s auditors for the purpose of auditing the Licensee\rquote s accounts,
\par }\pard \qj \li720\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 16.4\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 by the Licensee\rquote s attorney(s) in connection with any potential, threatened or actual litigation between the Licensee and the customer concerned,
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 16.5\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 by the Authority for the purpose of performing its functions under the Acts,
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 16.6\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 by an order of the court in respect of legal proceedings between the customer and another party pending in court.}{\b\f35\insrsid5050383\charrsid2952303 
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\f35\ul\insrsid5050383 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 17.0\tab}}\pard \qj \fi-750\li750\ri0\sl320\slmult0\widctlpar\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin750\itap0\pararsid5050383 {
\b\f35\ul\insrsid5050383\charrsid6388653 UNIVERSAL SERVICE OBLIGATION}{\b\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
The Licensee shall comply with the Universal Service/access obligations as may be provided for under the laws of the United Republic of Tanzania.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\b\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 18.0\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx750\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid5050383 {
\b\f35\ul\insrsid5050383\charrsid6388653 HUMAN RESOURCE DEVELOPMENT
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 18.1\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 The Licensee shall submit to the Authority the Human Resource Development Plan outlining strategies towards empowerment of its local staff.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653  
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 18.2\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
The Licensee shall annually furnish the Authority the report of implementation of the Human Resource Development Plan.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par {\listtext\pard\plain\f35\insrsid5050383\charrsid6388653 \hich\af35\dbch\af0\loch\f35 18.3\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid5050383 {
\f35\insrsid5050383\charrsid6388653 The Licensee shall facilitate participation of its technical staff in training within or outside the United Republic of Tanzania.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383\charrsid6388653 
\par }\pard\plain \s18\qj \li0\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\cf1\insrsid5050383 19}{
\b\fs24\cf1\insrsid5050383\charrsid8521293 .0   }{\b\fs24\ul\cf1\insrsid5050383 MAJORITY OWNERSHIP
\par }{\fs24\cf1\insrsid5050383 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\cf1\insrsid5050383 The Majority Shareholder of the Licensee shall not transfer, assign any beneficial
 interest in dispose of or in any manner alienate its share ownership in the Licence for a period of five (5) years after the commencement of the licensed services without the prior written consent of the Regulatory Authority.
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\fs24\cf1\insrsid5050383 
\par }{\b\fs24\cf1\insrsid5050383 20}{\b\fs24\cf1\insrsid5050383\charrsid8521293 .0   }{\b\fs24\ul\cf1\insrsid5050383 GUARANTEE OF PERFORMANCE
\par }{\fs24\cf1\insrsid5050383 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid5050383 {\fs24\cf1\insrsid5050383 
The Majority shareholder hereby guarantees the performance of the Licensee in accordance with the terms and conditions of this Licence, for the duration of the Licence and shall execute a guarantee agreement with the Authority.
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 \fs24\lang1033\langfe1033\cgrid\langnp1033\langfenp1033 {\f35\insrsid5050383 
\par }{\f35\insrsid5050383\charrsid6388653 
\par }{\b\f35\insrsid5050383\charrsid6388653 ISSUED AT DAR ES SALAAM}{\b\f35\insrsid5050383  }{\b\f35\insrsid5050383\charrsid6388653 ON THIS }{\b\f35\insrsid3820554 <?php echo $issue_day; ?>}{\b\f35\insrsid5050383\charrsid6388653  DAY OF}{\b\f35\insrsid5050383  }{
\b\f35\insrsid3820554 <?php echo $issue_month; ?>, <?php echo $issue_year; ?>}{\b\f35\insrsid5050383\charrsid6388653 
\par 
\par 
\par 
\par }{\b\f35\insrsid5050383 \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85
\par PROF. JOHN S. NKOMA}{\b\f35\insrsid5050383\charrsid6388653 
\par DIRECTOR GENERAL
\par TANZANIA COMMUNICATIONS REGULATORY AUTHORITY
\par 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\f35\insrsid5050383 
\par }{\f35\insrsid5050383\charrsid6388653 
\par }{\b\f35\insrsid5050383\charrsid5194610 
\par }{\b\f35\insrsid5050383 \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85}{\b\f35\insrsid5050383\charrsid5194610 
\par IN THE PRESENCE OF THE SECRETARY TO THE BOAR}{\b\f35\insrsid5050383 D}{\f35\insrsid5050383 
\par 
\par }{\b\f35\insrsid5050383 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par }{\b\f35\insrsid5050383\charrsid15865641 
\par }\pard \ql \fi-1800\li1800\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1800\itap0\pararsid5050383 {\b\f35\insrsid5050383 
\par 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\b\insrsid5050383 APPENDIX I: }{\b\insrsid7760478  \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85.}{\b\insrsid5050383  ROLL OUT PLAN \endash 
 NETWORK SERVICES
\par 
\par }{\i\fs16\insrsid5050383 
\par }\trowd \irow0\irowband0\ts11\trgaph108\trrh968\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\b\insrsid5050383 Services}{\b\f36\fs22\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }{
\b\insrsid5050383 Status}{\b\f36\fs22\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }{\b\insrsid5050383 *Capacity (subscribers)}{\b\f36\fs22\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\qc \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\b\insrsid5050383 Plan/Timeframe}{\b\f36\fs22\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\b\insrsid5050383 Area}{\b\f36\fs22\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs20\insrsid5050383 \trowd \irow0\irowband0\ts11\trgaph108\trrh968\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr
\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\row }\trowd \irow1\irowband1\ts11\trgaph108\trrh1173\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\fs18\insrsid5050383 Fixed / Mobile Voice}{\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 
\par }{\fs18\insrsid5050383 
\par }{\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell \cell }\pard \qr \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {
\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard \qc \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {
\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard \ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {
\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs20\insrsid5050383 \trowd \irow1\irowband1\ts11\trgaph108\trrh1173\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 
\trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\row }\trowd \irow2\irowband2\ts11\trgaph108\trrh1074\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\fs18\insrsid5050383 Fixed / Mobile Data}{\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 
\par }\pard \ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid7760478 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\qr \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\qc \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs20\insrsid5050383 \trowd \irow2\irowband2\ts11\trgaph108\trrh1074\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr
\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\row }\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\fs18\insrsid5050383 Leased Lines}{\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 
\par \cell \cell }\pard \qr \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\qc \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs20\insrsid5050383 \trowd \irow3\irowband3\ts11\trgaph108\trrh1074\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr
\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\row }\trowd \irow4\irowband4\lastrow \ts11\trgaph108\trrh1434\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\fs18\insrsid5050383 VPN}{\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 
\par \cell \cell }\pard \qr \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\qc \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\pvpara\phmrg\posy237\dxfrtext180\dfrmtxtx180\dfrmtxty0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid5050383 {\f36\fs18\lang2057\langfe1033\langnp2057\insrsid5050383\charrsid7760478 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs20\insrsid5050383 \trowd \irow4\irowband4\lastrow \ts11\trgaph108\trrh1434\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb
\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\tpvpara\tphmrg\tposy237\tdfrmtxtLeft180\tdfrmtxtRight180\trftsWidth3\trwWidth9852\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 
\clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3118\clshdrawnil \cellx3005\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth942\clshdrawnil \cellx3947\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1572\clshdrawnil \cellx5519
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7415\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2332\clshdrawnil \cellx9744\row }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {
\i\f36\fs16\lang2057\langfe1033\langnp2057\insrsid5050383 
\par }{\i\fs16\insrsid5050383 
\par }{\fs22\insrsid5050383 
\par }{\insrsid5050383 
\par \page 
\par }\pard \qj \fi-2880\li2880\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin2880\itap0\pararsid5050383 {\b\f35\insrsid5050383 
\par 
\par }\pard \ql \fi-2700\li2700\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin2700\itap0\pararsid5050383 {\b\insrsid5050383             }{\b\insrsid5050383\charrsid5927355 APPENDIX II: }{\b\insrsid5050383  }{\b\insrsid7760478 \'85\'85\'85\'85\'85
\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85.}{\b\insrsid5050383\charrsid10623340  SHAREHOLDING STRUCTURE}{\insrsid5050383\charrsid15273744 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid5050383 {\insrsid5050383 
\par }{\insrsid5050383\charrsid8526072 
\par }{\f35\insrsid5050383\charrsid3357100 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par }{\f35\insrsid5050383 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par }\pard \qj \li0\ri0\widctlpar\faauto\rin0\lin0\itap0\pararsid5050383 {\b\f35\insrsid5050383 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 {\insrsid5050383 
\par }}
