<?php
header("Pragma: public");
header("Expires: 0");
header("Content-Type: application/rtf");
header("Content-Disposition: attachment;filename=network-facility-licence.rtf");
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
{\rtf1\ansi\ansicpg1252\uc1\deff35\stshfdbch0\stshfloch0\stshfhich0\stshfbi0\deflang1033\deflangfe1033{\fonttbl{\f0\froman\fcharset0\fprq2{\*\panose 02020603050405020304}Times New Roman;}{\f35\fswiss\fcharset0\fprq2{\*\panose 020b0604030504040204}Tahoma;}
{\f36\froman\fcharset238\fprq2 Times New Roman CE;}{\f37\froman\fcharset204\fprq2 Times New Roman Cyr;}{\f39\froman\fcharset161\fprq2 Times New Roman Greek;}{\f40\froman\fcharset162\fprq2 Times New Roman Tur;}
{\f41\froman\fcharset177\fprq2 Times New Roman (Hebrew);}{\f42\froman\fcharset178\fprq2 Times New Roman (Arabic);}{\f43\froman\fcharset186\fprq2 Times New Roman Baltic;}{\f44\froman\fcharset163\fprq2 Times New Roman (Vietnamese);}
{\f386\fswiss\fcharset238\fprq2 Tahoma CE;}{\f387\fswiss\fcharset204\fprq2 Tahoma Cyr;}{\f389\fswiss\fcharset161\fprq2 Tahoma Greek;}{\f390\fswiss\fcharset162\fprq2 Tahoma Tur;}{\f391\fswiss\fcharset177\fprq2 Tahoma (Hebrew);}
{\f392\fswiss\fcharset178\fprq2 Tahoma (Arabic);}{\f393\fswiss\fcharset186\fprq2 Tahoma Baltic;}{\f394\fswiss\fcharset163\fprq2 Tahoma (Vietnamese);}{\f395\fswiss\fcharset222\fprq2 Tahoma (Thai);}}{\colortbl;\red0\green0\blue0;\red0\green0\blue255;
\red0\green255\blue255;\red0\green255\blue0;\red255\green0\blue255;\red255\green0\blue0;\red255\green255\blue0;\red255\green255\blue255;\red0\green0\blue128;\red0\green128\blue128;\red0\green128\blue0;\red128\green0\blue128;\red128\green0\blue0;
\red128\green128\blue0;\red128\green128\blue128;\red192\green192\blue192;}{\stylesheet{\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \snext0 \styrsid4986471 Normal;}{
\s1\qc \li0\ri0\sl360\slmult1\keepn\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp20 \brdrr\brdrtnthtnmg\brdrw60\brsp80 
\aspalpha\aspnum\faauto\outlinelevel0\adjustright\rin0\lin0\rtlgutter\itap0 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext0 \styrsid4986471 heading 1;}{\s2\qc \li0\ri0\sl360\slmult1\keepn\widctlpar\brdrt
\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 \aspalpha\aspnum\faauto\outlinelevel1\adjustright\rin0\lin0\rtlgutter\itap0 
\b\f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext0 \styrsid4986471 heading 2;}{\*\cs10 \additive \ssemihidden Default Paragraph Font;}{\*
\ts11\tsrowd\trftsWidthB3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tscellwidthfts0\tsvertalt\tsbrdrt\tsbrdrl\tsbrdrb\tsbrdrr\tsbrdrdgl\tsbrdrdgr\tsbrdrh\tsbrdrv 
\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs20\lang1024\langfe1024\cgrid\langnp1024\langfenp1024 \snext11 \ssemihidden Normal Table;}{\s15\qc \li0\ri0\sl360\slmult1
\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext15 \styrsid4986471 Title;}{\s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 
\f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext16 \styrsid4986471 Body Text;}{\s17\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 
\sbasedon0 \snext17 \styrsid4986471 Body Text Indent;}{\s18\qj \li1440\ri0\widctlpar\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext18 \styrsid4986471 
Body Text Indent 2;}{\s19\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0 \f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext19 \styrsid4986471 Body Text Indent 3;}{
\s20\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext20 \styrsid4986471 Body Text 2;}{\s21\ql \li0\ri0\widctlpar
\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext21 \styrsid4986471 footer;}{\*\cs22 \additive \sbasedon10 \styrsid4986471 page number;}{
\s23\ql \li0\ri0\widctlpar\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext23 \styrsid4986471 header;}}{\*\latentstyles\lsdstimax156\lsdlockeddef0}
{\*\listtable{\list\listtemplateid-301985314{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\ulnone\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel
\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\b0\ulnone\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\ulnone\fbias0 \fi-1080\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\ulnone\fbias0 \fi-1440\li3600\jclisttab\tx3600\lin3600 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\ulnone\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\ulnone\fbias0 \fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\ulnone\fbias0 \fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\ulnone\fbias0 \fi-2520\li7560\jclisttab\tx7560\lin7560 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\ulnone\fbias0 \fi-2880\li8640\jclisttab\tx8640\lin8640 }{\listname ;}\listid100299806}{\list\listtemplateid-118974178{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat7\levelspace0\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-540\li540\jclisttab\tx540\lin540 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2
\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers
\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}
\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 
\fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid422454894}{\list\listtemplateid1204698802{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat3\levelspace0\levelindent0
{\leveltext\'02\'00.;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\'04\'00.\'01.;}{\levelnumbers\'01\'03;}\fbias0 
\fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'06\'00.\'01.\'02.;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'08\'00.\'01.\'02.\'03.;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0a\'00.\'01.\'02.\'03.\'04.;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0c\'00.\'01.\'02.\'03.\'04.\'05.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0e\'00.\'01.\'02.\'03.\'04.\'05.\'06.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'10\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'12\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li2520\jclisttab\tx2520\lin2520 }{\listname ;}\listid519703196}
{\list\listtemplateid569781912{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat6\levelspace0\levelindent0{\leveltext\'04\'00.0.;}{\levelnumbers\'01;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'04\'00.\'01.;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'06\'00.\'01.\'02.;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'08\'00.\'01.\'02.\'03.;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1440\li3600\jclisttab\tx3600\lin3600 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0a\'00.\'01.\'02.\'03.\'04.;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0c\'00.\'01.\'02.\'03.\'04.\'05.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0e\'00.\'01.\'02.\'03.\'04.\'05.\'06.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'10\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2520\li7560\jclisttab\tx7560\lin7560 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'12\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li8280\jclisttab\tx8280\lin8280 }{\listname ;}\listid538510295}{\list\listtemplateid1922610718{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat3
\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers
\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}
\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 
\fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid905724179}{\list\listtemplateid1414282102{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0
{\leveltext\'02\'00.;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'04\'00.\'01.;}{\levelnumbers\'01\'03;}\fbias0 
\fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'06\'00.\'01.\'02.;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'08\'00.\'01.\'02.\'03.;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0a\'00.\'01.\'02.\'03.\'04.;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0c\'00.\'01.\'02.\'03.\'04.\'05.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0e\'00.\'01.\'02.\'03.\'04.\'05.\'06.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'10\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'12\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08.;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li2520\jclisttab\tx2520\lin2520 }{\listname ;}\listid1100100241}
{\list\listtemplateid-683356682{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat4\levelspace0\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li3240\jclisttab\tx3240\lin3240 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1440\li5040\jclisttab\tx5040\lin5040 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li6120\jclisttab\tx6120\lin6120 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li7920\jclisttab\tx7920\lin7920 }{\listname ;}\listid1522087795}{\list\listtemplateid-2035628844{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat5\levelspace0\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers
\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}
\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 
\fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid1945847020}{\list\listtemplateid-1472277406{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat16\levelspace0\levelindent0
{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat3\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 
\fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid1957562213}
{\list\listtemplateid-78203334\listhybrid{\listlevel\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid-458712810\'03(\'00);}{\levelnumbers\'02;}\fbias0 \fi-360\li1440
\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat11\levelspace0\levelindent0{\leveltext\leveltemplateid1584969232\'02\'01.;}{\levelnumbers\'01;}\b0\fbias0 \fi-360\li2160\jclisttab\tx2160\lin2160 }
{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'02.;}{\levelnumbers\'01;}\fi-180\li2880\jclisttab\tx2880\lin2880 }{\listlevel\levelnfc0\levelnfcn0\leveljc0
\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698703\'02\'03.;}{\levelnumbers\'01;}\fi-360\li3600\jclisttab\tx3600\lin3600 }{\listlevel\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\leveltemplateid67698713\'02\'04.;}{\levelnumbers\'01;}\fi-360\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\leveltemplateid67698715\'02\'05.;}{\levelnumbers\'01;}\fi-180\li5040\jclisttab\tx5040\lin5040 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698703
\'02\'06.;}{\levelnumbers\'01;}\fi-360\li5760\jclisttab\tx5760\lin5760 }{\listlevel\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698713\'02\'07.;}{\levelnumbers\'01;}\fi-360\li6480
\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'08.;}{\levelnumbers\'01;}\fi-180\li7200\jclisttab\tx7200\lin7200 }{\listname 
;}\listid1986279671}}{\*\listoverridetable{\listoverride\listid100299806\listoverridecount0\ls1}{\listoverride\listid1100100241\listoverridecount0\ls2}{\listoverride\listid1986279671\listoverridecount0\ls3}{\listoverride\listid1522087795
\listoverridecount0\ls4}{\listoverride\listid519703196\listoverridecount0\ls5}{\listoverride\listid1945847020\listoverridecount0\ls6}{\listoverride\listid538510295\listoverridecount0\ls7}{\listoverride\listid422454894\listoverridecount0\ls8}
{\listoverride\listid905724179\listoverridecount0\ls9}{\listoverride\listid1957562213\listoverridecount0\ls10}}{\*\rsidtbl \rsid223700\rsid483090\rsid686103\rsid1126752\rsid1317591\rsid1794013\rsid1860571\rsid1995783\rsid3104016\rsid3692134\rsid3936323
\rsid4926357\rsid4986471\rsid5451980\rsid5927355\rsid7738871\rsid8521293\rsid8526072\rsid8658394\rsid9729511\rsid10254463\rsid10424978\rsid10623340\rsid10713440\rsid11081836\rsid11090814\rsid11106095\rsid11235215\rsid11342076\rsid11695322\rsid12125030
\rsid12602421\rsid12674341\rsid14170310\rsid14563356\rsid14575816\rsid15273744\rsid15808461\rsid16341212\rsid16610451}{\*\generator Microsoft Word 11.0.5604;}{\info{\author user}{\operator Mohamed Manja}{\creatim\yr2010\mo2\dy26\hr11\min48}
{\revtim\yr2010\mo2\dy27\hr8\min46}{\version4}{\edmins6}{\nofpages8}{\nofwords1515}{\nofchars8640}{\*\company tcra}{\nofcharsws10135}{\vern24689}}\margr1440\margt720\margb900 
\widowctrl\ftnbj\aenddoc\pgnstart0\noxlattoyen\expshrtn\noultrlspc\dntblnsbdb\nospaceforul\hyphcaps0\formshade\horzdoc\dgmargin\dghspace180\dgvspace180\dghorigin1800\dgvorigin720\dghshow1\dgvshow1
\jexpand\viewkind1\viewscale100\pgbrdrhead\pgbrdrfoot\splytwnine\ftnlytwnine\htmautsp\nolnhtadjtbl\useltbaln\alntblind\lytcalctblwd\lyttblrtgr\lnbrkrule\nobrkwrptbl\snaptogridincell\allowfieldendsel\wrppunct
\asianbrkrule\rsidroot4986471\newtblstyruls\nogrowautofit \fet0{\*\ftnsep \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid1860571 \chftnsep 
\par }}{\*\ftnsepc \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid1860571 \chftnsepc 
\par }}{\*\aftnsep \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid1860571 \chftnsep 
\par }}{\*\aftnsepc \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid1860571 \chftnsepc 
\par }}\sectd \pgnrestart\pgnstarts0\linex0\endnhere\titlepg\sectlinegrid360\sectdefaultcl\sectrsid4986471\sftnbj {\footer \pard\plain \s21\qc \li0\ri0\widctlpar
\tqc\tx4320\tqr\tx8640\pvpara\phmrg\posxc\posy0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\field{\*\fldinst {\cs22\insrsid4986471 PAGE  }}{\fldrslt {
\cs22\lang1024\langfe1024\noproof\insrsid10254463 3}}}{\cs22\insrsid4986471 
\par }\pard \s21\ql \li0\ri360\widctlpar\tqc\tx4320\tqr\tx8640\pvpara\phmrg\posxc\posy0\aspalpha\aspnum\faauto\adjustright\rin360\lin0\itap0\pararsid4986471 {\cs22\insrsid4986471 
\par }\pard \s21\qc \fi360\li0\ri360\widctlpar\tqc\tx4320\tqr\tx8640\pvpara\phmrg\posxc\posy0\aspalpha\aspnum\faauto\adjustright\rin360\lin0\itap0\pararsid4986471 {\cs22\insrsid4986471 
\par }\pard \s21\ql \li0\ri360\widctlpar\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin360\lin0\itap0\pararsid4986471 {\insrsid4986471               }{\insrsid4986471\charrsid11342076 
\par }}{\headerf \pard\plain \s23\qc \li0\ri0\widctlpar\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid4986471\charrsid11090814 
\par }}{\*\pnseclvl1\pnucrm\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl2\pnucltr\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl3\pndec\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl4\pnlcltr\pnstart1\pnindent720\pnhang {\pntxta )}}
{\*\pnseclvl5\pndec\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl6\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl7\pnlcrm\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl8
\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl9\pnlcrm\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}\pard\plain \s15\ql \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 
\brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b0\fs24\insrsid4986471 
                                                                                                                                                                                                                                                               
 
                                                                                                                                                                                                                                                               
 
                                                                                                                                                                                                                                                               
 
                                                                                                                                                                                                                                                               
          }{\b0\fs24\insrsid4986471\charrsid4926357 
\par }\pard \s15\qc \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 {
\b0\fs20\insrsid4986471 THE UNITED REPUBLIC OF TANZANIA
\par }{\insrsid4986471 TANZANIA COMMUNICATIONS REGULATORY AUTHORITY
\par }\pard\plain \qc \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid3936323\charrsid1995783 {\*\shppict
{\pict{\*\picprop\shplid1025{\sp{\sn shapeType}{\sv 75}}{\sp{\sn fFlipH}{\sv 0}}{\sp{\sn fFlipV}{\sv 0}}{\sp{\sn pibFlags}{\sv 2}}{\sp{\sn fLine}{\sv 0}}{\sp{\sn fLayoutInCell}{\sv 1}}{\sp{\sn fLayoutInCell}{\sv 1}}}
\picscalex20\picscaley18\piccropl0\piccropr0\piccropt0\piccropb0\picw14993\pich14993\picwgoal8500\pichgoal8500\jpegblip\bliptag-897341001{\*\blipuid ca83a9b7e4c12d6b8535de20fc94d879}
ffd8ffe000104a4649460001010100c800c80000ffdb0043000a07070807060a0808080b0a0a0b0e18100e0d0d0e1d15161118231f2524221f2221262b372f26
293429212230413134393b3e3e3e252e4449433c48373d3e3bffdb0043010a0b0b0e0d0e1c10101c3b2822283b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b
3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3bffc000110800d400eb03012200021101031101ffc4001f0000010501010101010100
000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a10823
42b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a
838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1
f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b5110002010204040304070504040001027700
0102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a43444546474849
4a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4
c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f66a28a2800a28a2800a28a2800a28a280
0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a280
0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a4aaf35e22379680c921e8a
bc9a6082e67399a5f297fb91f5fc4d3b7702792e228865e451f53559f55b751945966f68a267fe42a78ed2088e56219fef3727f335351a0b531a6d76ec716fa2
5ec9eee9b2b36e3c49ada9c268d3a0fef181c81f8fff005abaca2968672849fda3cfae7c67a946db0b794dfed4617f98cd42be2dd59a367fb50241007ca3be6b
d15d15d4aba8607b119159f71e1ed1ee8112e9d073d4a26c27f118352e3e6612a157a4ce4a1f19ea3d1dd09f565183f90e2aec7e369d1b6dc5bc79f6c807f1c9
ab573e02d325c9b69ae2dcf601b7afe479fd6b39fc0f7f11d89790cf0fba9471f41c8fd6a5a92ea65c9898f5b9b36be2fb39dd524826467385da37827ea2b752
44700a9eb5ce585943a34657ec72c6c47cf2b0dd9fa91c568c330b850d02b3e7b81c7e75e3d4cc6bc6a72c6937f99e8d284b97df7a9ab49d2a94939b384cd797
50db42bd5a47000fc4e0563ffc26de1c92e7ecd06a1f6d9bb2c5c83f4270a7f3af668ca5563cce2d7a8de86fc9770c470cfcfa0e4d33ed8cdf72da56faae3f9d
50fed0d45d7169a5a463d657fe807f5aaf2ffc25329f926b4807fb31127f526ba143b93735fcebb238b5c7fbce3fa5286bd3ff002ce21f573fe158434ff143b7
cdad951e8b047ffc4d3bfb27c42391af4b9ffae71fff00134f91775f88ae6d96bd1d2388fd1cff008537cfbb5fbd6848f55606b17ec9e2a84e575549bda4813f
a0147f6b788acffe3eb4db7ba51d4c2c633f91cd3f67d9a6173686a11060b286898f67522acabab0ca9045635af89f4cbc616f721ed256e3cbba50a0fb03d0fe
75725b278332d8b6d2393113f2b7d3d3f95438d9d9e83b97e8aad65769770ef5e181c329ea0f71566a1ab0c28a28a40145148cc14649e2800660a324e0552334
b7ac5203b22070d2fafb0a8de4179be49241159c592ee4e0363af3d87a9ae56fb5ebef114a6c7462f69a72fca6751b5e51fecff757f53edd2b58c08949236eff
00c4da3686cd6c8cd7375fc50c037be7fda3d07e27f0acb6f10f89b516c5958dbd9467a193323ff41fa1ab3a57876cf4f8c058816ee715b4b6e1570001f4a1ce
0be157f533bc99cc3d9f892739b8d7675f68c2a7fe820544da4ea7d7fb775127febe187f5aea5e0c5426200e7d2a7db4fa12d339c7b6d76dcfee75dba07bef6d
ff00fa166906abe2cb5e45f41738ed3403ff0065c56d489d6ab985a46da8a589ec2a5d6975b7dc66e525b329c7e37d66df02f3478661dda094a7e841fe75a367
e3dd36e38b8b5bdb4c75678b728fc573fcaa587458d47997846073b01fe66ac0b517a9e5dbc08908e3cc2bc7e03bd72bc64672e5842efb9d14e3537932ed96b7
a5ea0c12d2fe095cff000071bbfef93cd5eae4ee2f746f0edc343a7da0bdd51861b6632bfef37f08f61f95733abf89f5649bcd3aab2dc0e160b500451fd739c9
fae7f0ae96d5d26687a9515e4769f133c476671776f6b7c83fd931b9fc471fa574567f15f4872aba859dd591600efdbe627e639fd2b5f652e9a85d16bc41f0df
4dd7a6372d7b7b14fd8bca6551f83738f60457237bf0a75bb33bec2e6deec2f4c318dff23c7eb5e93a7789f43d588163aadb4ce7a47e600fff007c9e7f4ad4a4
e525a48343cd344f10789fc3256d75ed2aee5b35e3cd09bfcb1fef0c8c7f9e2bd02c756b1d4add67b4b84911ba107a7d6ae542f696f231678232c7ab6d19fcea
741928607a1a5aa874f887fab9258ffdd7cff3cd1f67ba4fb9741bd9d3fa8a2cbb816e90807a8aab9bf4eb1c4ffeeb11fcc5027bbef66df83aff008d160197da
4da5f44526855b3ed599a47da349d50694f234b6b2216837726323f873e98cfd315ac5efa4e16148fdddb3fcab2af753b1d1a766790deea4ebb5618fa8cffe82
3dcd691bb4e3b92fb9660222f115d468d90e8aec3d1b18fe80fe35af587a0595cab4d7f7c41b9b96dcf81803b003d80c0fc2b72a2a5af61a0a28a2a0625509d9
af6e4db46c446bccac3d3d3f1a9afee7ecd6cce012dd140ea4d52bfb9fec0f0e5cddb61a58d0b13d9a43c0fc3240fa55c509b39bf135fbeb3a97f605936cb2b5
23ed4cbd1d8744fa0efeff004ad2d3eda2b68962857680319f5ac2d0adcc56a1dc9691cef766e4b13c927deba2b73d29549ebcab6471f3734ae69dba8eb56d40
c5548db000ce2a70e31508e98848a2ab48bc63d6ad619fa0fc69e230bcf535129a88f96e67a58b4872df2afeb533986ca3f95704f181c963525d5cac09d0b313
8551d49a2d6d195bcfb8c34c7a0ec83d07f8d73724ab3d762d45476228acde73e75e70a39116781fef7f85733aef8b1ae5decb4a97ca817e592e548cb7b27a0f
f6bf2f5aabe2cf12cbaa5cc9a3697215b643b6ea75ff009687ba0f6f53dfa74eb8a96e905a3aa8fe25e7f3aef8d28d18d96e2bdc8e67996130db848623f782c8
373fd4f7acc92d653d109fa1cd5a9475aa728eb5092432b4b6f2a8f9a271f553513a092d324731363f03ff00d707f3a959dd49dac47d0e2960b89599d1a42fb9
0e037cdc8191d7e94c0c99ada273ca8abb63adebba560586af750a8e8864dc83fe02d91fa523cea4fcf046dee06d3fa5467eccfde48cfbe187f4ad1559ad2e2b
23a9b6f8a1e24b2086e60b4be89867250c6dee3238fd2b76cbe30e99261750d32eed5bbb4644aa3f91fd2bcf560325bc91a3a4b8f9d369e73dc63af4fe5545d7
070c3047634f9e2f788599ee965e3af0c5fed116b102337459c9889ffbeb15bb1cb1ca81e375753d194e41af9be31111e5ccb98dbd3aa9f515de7802cadaf7cd
d3de7920b9886f8de290af9887e9d7ff00d745a9bd9b41a9e85a8f88f4bd35cc535c879c7fcb1886f7fc40e9f8e2b34f88f57be38d3b47f2d4f492e9ff00f651
fe35a1a7786f4fd387eee152ddc91c9ad55454185503e94f9a9c7657f50d4e64e97e21d4bfe3fb5468633d63b61e58fcc73fad68e99e1cb1d306638817ea58f2
4d6bd152eac9ab6c82c20181814b451598c28a28a00cdbafdfead6b01e5533230fa74fd48ac7f1fb93a5d9db2b1ccd76bb947f128563fcf6d6a46e0789b69ea6
d9b1ff007d2d6178f8badd69047dddf267eb85c7f5ad96925e86551fb8c86d5562450c7247f08ad1b790960a381ed5930127000249e8056f5869921f9e7ca0c7
ddef5c33a9186b2672525293d09a16691b0a324d68450e065ce4fa511469128545005499ae7789e6d8ef8d3b6e3aa2b89d2de2691ce0019a86e75082db219b73
819da2b334f69b5cbf371371696cd8541d1dfdfd71d7f2ad69c255357b16dd8d4b2b7777fb65c03e630f910ff00ff13585e34d7a5b489348b072b7974b9775eb
0c7d33f53c81f89f4adfd53518749d367beb83f242b9c0eac7a003dc9c0fc6bcdad3ceb99e6d4af0eeb9b96dec7d3d00f60303f0aefa71515ccf6443ec16f691
d9db88d001814921ff004793fde5feb56424b7132c1046d248fc2aaf5345d5de99a0978ee22fed4bd561be046c4511e7866ee7dba52b4a6c363361d3ef7506db
676b2cfdb28b903ea7a0a75ef85b59b3b292f6e6d5628635dcecd2a703e99ab76df11f5d5bb8208f47b230b3ac6b0c7b94f271807381f951f12fc42d7ba947a0
da3fee6d8892e987f13f65fc073f53ed57ec9df50b9c9c873c8a2c22967d4208a089e5919c6111724f3e957ec2c74c7805d6adacc3636fbf6ec505e56c633f28
1c0e7a9af518b4fd23c21a1dd5f5a5b0db040d2bc99cbca00ce377bfe559f2b19e2732949590f55241a7d9e9d7ba94be558da4d72e3a8890b63ebe95a7a7e916
fe41d67c4170d69a73b12814665ba3d4841e9eadd3fa6cdbfc56b6d2d05a691e1858ed10fca1ae36b1f72029e7f1357eca4de82b9c93dbdc697a8886f2092095
08df1c8b8383ff00d6351cb33c7234330130462bf3f5e3d0f5ab4c354f177886eaea0b59259eea42fe5af3e5af4504fa01819f6aec6cfc2ba3e9938b9d6e6fb6
5cf04dac0372ab639c9e879ac6ac9531ad4e6347f0adeebd896cd4c50670d24fc01f43fc55e99e1af0d58680236883dcdc80479ccbce3b803b0a85f5dbdb78e0
fb0e871471c8b989a56272071d0631ff00d714c3e20f15fde165658eb82adffc5579b52f52694eaa8f92ff0032d69d0ec44c9b829c827a02319a92b99d32e756
d5ae61b8bc8a2852304011670493cf5fa0ae9474af5651b102d1451520145145001451450072de29bd3a36a7a6ea7b4b223b2ca07528700fe40e7f0a778ba24d
4b49b0b9b7757885ca3f9a391b1948cfe6456cea7636f7a23f3e30fb33b41e9ce3fc2b01b4bbcb6866b381f7d9cc73e537fcb36ce415f4e474ae5a98fa70a8e9
4b4696e4fb36ef7d99aba7d85bda44a635dce472edd6af0e95563905b5a069e454545f9998e00ac0d47c65105963d386f6519f3587cbd40e077eb5e1518d4af3
76d7ccded182b23a3b9bdb7b38f7cf2841d8773f4158379e22927252df3127aff11ff0ae65b53b9b890c934ccec7b9a916f5f1f7bf4af6e8e1634f596ac872b9
a066966956de1f9a69cec5fa9ee7dabb8b1b48ec2ca2b58beec6b8c9ea4f73f89e6b94f06c0d7ba84fa849ca5b0f2e3ff7cf53f80c7fdf55d7cf3476d6f24f2b
058e252eec7b00324d77bd3420e17c71a81bed62df468dbf756d89a7c77723e51f80e7fe043d2a8c6924f2c76d6e85e473b55456659decd7335c6a337cb25d48
d230ebb72781f4038fc2bb9f0d5aa5969526b37ce177c6640cdc08e20339fc7afd3157534f757405dcc6f105ea784f4e4d3ac5f76ad7a999261d624ee47a7390
3e84f6ae52dedd62b490b72db9724fe34d6d46e357d52e7569c956b87caa9fe05e8abf80c0a9cdd4bf6790ef390cbfd689be55cabe608821bd974fbd8af2dd23
79213b9048bb941c7071edd47b8acc0ac64796562f2c8c59d8f5624e49addd1ada7d635316c6731428a649e5e3f7683a9fe9f8d62fdbe674044879a8bbe5b0c5
d374a1ad6b769a7edc89e50aff00ee7563ff007c835eb5e38b9d2ad7c3133eb019edb7a1102b6d33b83b953e848e7d81ae6be1958c9737577aacc4b2443c98b2
07de3cb1fa8181ff0002354bc416da978ebc58d0db49e4e95a731892461c3bff001b01df9181db03de875214d73d4764b50b5f638cd4aeef75ed53ed17037bb2
aac50c6bf2c6b8e1157b015d3689f0fe4963379ad4bf63b58c6e751f7b1e9ec7dbad777a4787ecf4e610daa6650a3cc9df96c631c7a67d2a84f3b6bfa879301c
69f6cd84c7490f76f7f6ff00ebd7993c7fb483abb417deff00e017cb6d08ece25780596916df62b11c1da30f2fbb1ef5a2ba4450c6a88a1a57f9573eb57775be
9d00dcc1401c0ee6a6d3c4b7086f8c7d54f908c719f727b67f97d6bcaa31af8ea9cdaa814dc63a753235fbe82c351d3ac62f99a2898941d94e0293ff007c9a82
6bb92e7ef9c2ff007474aa577a6de69fa89bfd56ee27bdbd724450e4aa2803804f61c0a9da7645dc5c815f571c1d0535552bcbbff91c739cb63a7d11b7d867fd
b3fd2b46b33437ff004478d8fceae7703d4702b4eb39fc4cd63b0514515250514514005145140114e3299f4ae5f58f16d8e9dbe1b722eeed3ac48dc2fd4ff41c
d74b7d6df6cb19edb76d32c6ca1bd091d6bc36fa192dee64dc196589f64a3a10c3a1fc7f9e6bcfad80a75aafb49edd8b526958d0d47c417fabcbbaea63b01f96
25e157f0a6dac99f317bb467f4e7fa567adc24bfeb810dff003d17afe23bd58b70d1cc922112a03c94eb8efc75aee842305cb1564416926c77a91ae76464e7a0
aa0ce6291a32795245280d753436a9f7a791631f56207f5ad22aed2133d6fc2767f63f0d59a9e5e54f398e31cbfcdfa0207e1553c7f7bf63f095caa9c3dc9581
7df71f9bff001d0d5d1a80aa1540007000ed5c27c53badb67a5d9ffcf5b8697fef95c7fecf570d67707b1cbd922cf35a5964a89e548b23a8dc40feb5dff8fa56
b4f045eac0368611c5c0e02b3aa9fd091f8d79a417cb657d6776c0b25b4f1cac17a90ac09fe55ebec74bf12e90f1ac91ddd9dca60946ff003820fe208a13b352
f303c7226090aa8f4ab3696f73a816b5b489a59a4750aabf8f27d07bd745a8f867c2fa192fa8f8899231c88415329fc0649fcab0a7f1035e5bc9a5f8534f96ce
090857947cd713f5ea7b0f61ff00d6a5cadfbcf601facea76fa1e972f8774a984d75718fed1bb8cfcbff005c94fa7507f1f538c6d3b49bdd4729690970bf79cf
0abf535d6f87fe1d040b3eaed8eff6743ffa11ff000fcebb48a1b4b478a14115b5ac1f3b745518e9faff002af2eae6709d554286afbf4ff8268a0ed765230ffc
223e074b58987dab6796a41fbd33f523d71927e8b4689649a6e94800030b55f57be875dd6acedace659ed6d8192478c82a5cf0067d4007fefaab1ab5f47058b4
517cef8c71d0572664aae22ac70d495fabff008238b515cccb7acc92587856ee653b269540627aaef217f406b22c2e52cac123b7519c72e45741a9b699aa68d2
473dec496d2a86f37cc50060820e4f1d40ae49f55d2ed3f7560e7549978572bb625f7ff6bf957b51c0d2ab1519aba8f4e9f33094e4b62ec92dbdb43fda3aabb7
93ff002ce3fe39cfa01e95a5e169aff54373acdf33224e7cbb6b756f9238d7a9c7724e724ff77d2b957b6b9bf9cdd5f486595ba67a0f61e82babb8f13f87fc3f
691dacba846ef120511c037b123d97a7e35db385a3cb05af974220d1cb497875df125d6a01b74087c9b7ff00717bfe2727f1abb711f98f05ae4869e558f8eaa0
9c66a8daea76be59b7d174936b6e78f36725e4c7b649dbfad6d7876d9aeb5a13b676daa16ff813640fd377e55b4bdd57d9222d791b1bc5b7899a251859e1590f
fbd92bfc80ad9ae7c9173e32728d916d6eb1b0f4624b7f222ba0ae19f4f43a1051451598c28a28a0028a28a002bccfe22e8cd637ebac411ee86e3e49d7b67ffa
fd7eb9af4caaba8d841a9d84b6772bba395707dbde803c164408049192d13743dc7b1f7a4490a904120fa8abdad69377e1bd525b49977467ee923e5917b55031
8914bdb92c07250fde5ff114017e4ba2f14723224808dad91c823dfaf4c559d08c13789b4a50ac87ed719c67238607fa564db481f740c7024fba4f66edfe1f8d
5ad0a7fb378a34b77e02de46ad9ed9603fad5c3e213d8f7aaf3af8acacd71a2ed52dfebfa7fc02bd12b85f8af6464d0ad2fd5496b4b8018fa238c1ff00c782d3
a7f103d8e0a3b5b9b9dca90b7ca32c586028f524f4aa8fa1492664428149c6e59970c7db9e6afd868babebd6621b4b47b8b5599649417d8ae0061804f04e4838
e991cd6cdcf81f53914fd9ac446a2c254db3b44c5e4695729d0852514e1874247350b1342935cd5127eab41d9be867689e0237370bf6e9e2b24623e4771e6b67
a6173919cf7af49d2b49d274382486cd628d90032b3302f8c7563dab9ab1d0750d37c417579168d24d6f98fecb19960236c70aa2066605c1057a83e879a5d2fc
2faae95ac43acde4d1de36a0aebab4654055dc370c64fcc1586d1edd2bc9c6b8625bbd7be9a25d5daed69faf5b171f77a1d82deda3b054bb81892000b2a9249e
83ad51d4e2b0bb8034d22488c70bb581dc7d057223469a35b164d3218e5835d6bf936055222df215191db0cbc56669de17d6b4eb5d2a089765b09e3bab90c413
04e88cbb97d436e048e795f7ad68641494b9fda356f4f32255fa1d6a2416b21b581a289fbc2ae37fe23ad4a61ca7ef36a8604286206e38edeb5cd693a4ea7663
4b8574c4856dcb7daee0794e263b48de188dfb8b119e9dc734bace85aceab792ea71810c964c174f81d038210862c5b3f2976c83ec0035efd3c3d3a7eec5a48e
66eeeecb537862c24984b27961989c0ee7d7157edecac6ccf968d16f1d54c8a08c7b66a9ea36f78dace99790e9d25c0b68a60d1ac8a8c0becc753cfdd359da76
8778356d40ea5a6b886feee79304c257cb75c004e37e71e840e7eb5b6ae3ac8474ce15a0218c7187c85cb019ee7afb566a69161bccaa61739c655c1e6b06e740
d5ef743b8b7bc48e5b8b4b4fb1582ac830cbb86e9493d199428fa2fbd5e3697b6f71a7dd0d365716f732cb246d2411b90d16c18d8157a93db3d7da850b6d20b2
369962b680bedc28e807527d2ba2b4d9e1df0fc977763f7a4799228ea5cf0a83f41fad66e8368d7ee9ab5ec7e45bc237223918dc3a927a617d7d7e94e5693c53
aaa4c030d36d5b310231e6b7f7cff4f6fad734f5767b2dff00c8d20ada97fc3367325bbde5d737172c6473ee6b769a882340aa30053ab9672e67735414514548
c28a28a0028a28a0028a28a00c7f11f876d7c45a79b7980595798a5eea7fc2bc5f57d26f742bf6b6bb8d91d4e55c7461ea0d7d0159bad68563af599b6bd8837f
71c7de43ec6803c27cf8e5e275f9bfe7a275fc477a7dd46d2c22e6070f2a1058af5e3a363f9d6bf88bc13a9e8536e58dae6d98e1248d73f811eb5a3e1df005f5
c3a5d6a4ed6718e4463fd637d7d2b1ab8aa5865cf51d86a2e5a23d4347d4a3d6347b4d462c6db8883900e769eebf81c8fc29fa8d841aa69f3d8dca868a742ac0
fe87f03cd60e86f1e8177fd92d94b499b36e59b215cf55c9f5edeff5aea2ae9d58558a9c3662b5b4679f6b16579796da6e8d1a796f6f7c3cf0aade58411c982c
14a928495ee3ad374db7baf0c6b2915d0d4b51b78f4e48d668a17914b996476e327180540c9ce00aed751d356f36cb1bf957318f924f51e87d4573979757f1cb
f67bf8cc3d9707e47fa1ef5c8b0d5e4fd846dec9ef7df7bfafe961ca6a2afd4e6a0935d1ae47ac5f233c1aa1921b8b3567636d13a8f2c1c600dbb065873f3b55
6b7b3d54c3beee7beb86835282d202f952b6892e77903ae47258f5e2ba90ac7a293f414f08fe5b0d8dd476fad7b905186a92be9f86dfe5e9b9cae726717689af
5ba5a9963ba9a0d4350496e15c92f6db6e327fe00d18191db1ef5259a6a08d62f75653dc6aaf787edb3ccb23204c9c346e1f68503036e3bf418e7aef2dff00ba
7f2a3cb6ef81f522b7f6be42e666345677373e2f9a79462ce1fb3ecf315ce7192db30c075c6720f6ae72c2df5458f4ff00ed186f182d895915a1965f9ccf237f
0bae1b695e4e783d2bbe0a117258648e31cd37283b16faf14955682ece52f26bff00ecbf105ac56fa8b5ddc5dce6d99636c7965805daddb80702b474cb778f5d
9e6b486eed34c36a10a5d120bcdbf3b9509246178cf19cd6df99e50dc70be807f5a8a213dec852d2179db3c91d07d4f4149d4ba6ac171cd2ac4a48f971fc47ad
4fa7e96da88fb55e1f26c106e258ed3201efd97dff00fd756d74ab2d2a037faddc2304e89fc00fa63ab1f6fd2ab32dff008ae51e623dae98a72b09e1a5f42ffe
1fceb1e6bedb77ff0022e30ee24b712f8a2616564a61d2622016036f9d8e831d97dbbd7516969159c0b144a1554638a2d2d22b385628902a81daa7ae69cefa2d
8d920a28a2b31851451400514514005145140051451400514514008466a192d95b95e0d4f45615b0f4abc796a2b8d36b630f57d3a2b8b475b85f971d40cd6569
9e2c6d3a5163ac17308388aec8cf1e8ffe3f9fad7618cd51bcd1ac2f90acd02f3dc0c52c0e16961538ddb4ff00014dca5aa2e452c7346b2c4eb246e32aca7208
f50689618a78cc72c6b22375561906b96ff845eff4891a5d0f5178549c981c6e8dbf0fea39a9e3f126a567f26ada4b1c7596d0ee07fe02791f99aeef677d60ef
f9937ee5a9fc2f66e775b4b2db1f453b97f23fd0d547f0eea31a958ee60972472c0a7f8d685bf8a345b8e3edf1c4dfdd9f319ffc7b15a514f14cbba295241ea8
c0d1cf523b8b922ce58e8dab2ffcbb46dfeeca3fad22e93aa67e6b3e3feba2ff008d75d48480324e00ee68f6d2ec2f651395fec5d5e56c98a18ffde93a7e40d5
88bc3776799aee243e8885bf9e2b4eeb5ed26cf227d46dd587f0870cdf90e6b2e5f1709cecd2b4eb8bb6ecee3cb4fd79fd2ad3ab2d90b9228bb0786ec233be6f
32e5bd656e3f2181f9d56bef12da5a37d8749845e5c8f94245c471fd5871f80fd2aa1d2f5bd6cffc4d6f3c9b73d6dedfe5523dfb9fc4d6e69fa3d9e9d1848225
5c77c527cabe2772d2ec63d9e8175a85d2dfeb5379d28fb9181848c7a01fe4d7491c69120545000f4a752d6529b96e34ac14514540c28a28a0028a28a0028a28
a0028a28a0028a28a0028a28a0028a28a0028a28a00298d1a38c32834fa28033ee345b0b9cf996e873ed59b2f82b4990ee10843eabc57454568aa4d6cc564736
be0db451859e7518c604adfe349ff08469acc0cbbe4c7f7d89ae968a7edaa770e5463db78634bb5c6cb64c8f6ad38ada1846238d57e82a5a2a1ce52dd8584a5a
28a91851451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051
45140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451401ffd9}}{\nonshppict{\pict\picscalex100\picscaley100\piccropl0\piccropr0\piccropt0\piccropb0
\picw2985\pich2692\picwgoal1692\pichgoal1526\wmetafile8\bliptag-897341001\blipupi200{\*\blipuid ca83a9b7e4c12d6b8535de20fc94d879}
010009000003360f01000000110f010000000400000003010800050000000b0200000000050000000c0267007200030000001e000400000007010400110f0100
410b2000cc00cc00e20000000000660071000000000028000000e2000000cc0000000100180000000000e01d020000000000000000000000000000000000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fffff7fff7f7fff7f7fff7effff7f7ffefeffff7efffefeffff7efffef
effff7f7fff7effff7efffefeffff7f7ffefeffff7efffefeffff7f7fff7f7fff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fff7f7ff
efefffefefffe7e7ffefe7ffe7e7ffe7e7ffdedeffdedef7d6d6f7d6d6f7d6d6f7d6ceefcec6f7d6cef7d6cef7d6cef7cecef7d6d6f7d6d6ffded6f7d6d6ffde
d6ffdedeffe7e7ffdedeffefefffefeffff7f7fff7f7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7fffff7fff7efffefefffe7e7ffe7e7f7ded6f7d6d6efcecef7ceceefc6bde7bdbddeadaddeadadd6a5a5d6
a5a5cea59cd6ada5cea59ccea59cce9c9cd6a5a5ce9c9cce9c9cc69c94cea59ccea59cd6a5a5d6a5a5e7b5ade7bdb5efbdbdefbdc6f7cecef7d6d6ffdedeffde
deffefefffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7efefffefe7ffdede
f7ded6efcec6e7c6c6debdb5deb5adcea5a5ce9c9cc69494c6948cb58484b58484b57b7bbd8484b57b7bad7b73b57b7bbd8484b5847bbd8c84bd8c84bd8c84b5
847bbd8c84bd8484bd8484ad7b73ad7b73ad7b73bd8484bd8484c69494ce9c9cd6a5a5d6adade7b5bde7c6c6f7d6cef7d6d6ffe7deffe7e7fff7f7fff7f7ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7f7fff7efffefe7ffe7e7f7ded6f7d6d6e7c6c6debdb5cea5a5bd9c9cb58c8cad8c84a5847ba57b7bad8484ad8c8c
ad8c8cb59494bd9494c6a5a5c6a5a5ceadadd6b5b5e7c6c6e7c6bde7c6c6efcecef7d6cee7c6c6e7c6c6debdbddebdbdd6adadceada5bd9c9cbd9c9cbd9494b5
8c8cad8484ad7b84a5737bad7b7bad8484bd9494c69c9cd6adaddeb5b5efc6c6f7ceceffdedeffe7e7fff7effff7f7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffff7fff7f7ffefe7ffe7e7ffd6d6ffce
ceefbdbde7adadd69c9cbd948cad8484ad8484a58484b5948cb59494bda5a5bdadade7cecee7d6d6f7e7e7ffefefffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7f7dee7efd6d6cebdbdc6adadbd949cb59494ad8484ad847bad
7b73bd8c84ce9494deada5efb5adffcec6ffd6ceffe7deffefe7fffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7fffffffffffffff7ffffffffefefffe7e7f7d6d6f7cecee7bdbddeadadc69494bd8c84ad847bad847bb58c84c69c9cceadaddec6c6efde
d6ffefeffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7dedee7cec6ceb5adc69c9cb58c84b5847bad7b73bd847bce948cdea5a5deb5b5e7
ceceefded6ffefe7ffefeffffff7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffffffffffffffffffffffffff7fffffffff7f7fff7efffe7deffd6d6ef
bdbddeadadc69494b584849c7373a5847bb59494ceb5add6c6bdf7e7deffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7eff7e7dedebdbdceada5b58c8cad847ba57b73b58c8cbd9c94ceada5debdb5efd6d6f7dedeffefeffff7f7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffff
efffffefffffeffffffffffffffffffffffffffff7fff7eff7e7e7efd6d6e7bdbddeadadce9494b57b7ba56b6ba56b73b58484c6ada5d6c6c6efe7def7f7efff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffff
fff7eff7e7dedec6bdc6ada5ad8484a57373a57b7bbd9494cea5a5deb5bdefceceffe7e7ffefeffff7f7fff7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffeffffffffffffffff7ffffefffefdeffe7def7d6ce
d6b5adbd9494bd8c8ca573739c6363b57b7bcea5a5d6bdbdf7dedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffff
fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefdeded6adb5c69494ad7b7b
a57b7bad8484cea5a5deb5bdf7d6d6f7dedeffeff7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7fffff7f7efe7ffe7def7d6c6f7c6b5e7ada5ce9c94b58484a56b6b946363ad847bceada5efd6ceffe7e7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7dededebdc6bd9494a57b849c737bad848cc6a5a5debdbdefceceffe7e7
ffefeffff7f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefffefdef7decef7d6
c6efbdade7b5a5d69484ce847bad6b63ad6b6bb57b7bd6b5adefded6fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7ffffefefe7ced6c6a5ad9c7b7b9c7b7bad8c8ccea5a5debdbdf7d6d6ffe7e7fff7f7fffff7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffefffffefffffe7ffffe7ffffdefff7def7efd6ded6ded6cedec6b5e7bdade7b5a5de9c94c68473bd7b6b9c6352b57b73d6a5a5efded6fff7
effffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7e7
e7e7d6ceb59c9c9c847b947373b59494ceada5e7c6bdf7d6d6ffefeffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffdeffffc6ffffbdffffadffffadfff7a5
e7deadd6c6bdbdb5d6bdaddead9cd6948cc67b73ad6b5a9c6b52d6ad9cefcec6fff7effffffffffffffffff7ffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7fffff7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffff7efefe7d6cebd9c9c946b6b9c7b73bd948ce7b5
b5f7d6cef7e7defff7effffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7ffffefffffdeffffceffffadffff9cffff84ffff84fff77bffef8cf7e794deceadc6bdbdada5bd9484b57b739c635aa5736be7
cebdf7e7d6fffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7ffffffffffffffffffffff
fffffffffffff7fffffffffffffffffffffff7fffffffffff7fffff7fff7effff7f7f7ded6f7ded6efd6ceefd6cedecec6decec6d6c6bdd6c6bdd6bdb5d6bdbd
d6bdb5d6c6bdd6bdb5dec6bdd6c6bddec6bddecebde7d6ceefded6ffefdeffefe7fffff7fffff7fffffffffff7fffffffffffffffffffffffffffffffffff7ff
fffff7fff7fffffffffffffffffffffff7fff7f7fffff7fff7f7f7e7e7e7cecead84849c7373ad8484c6a59cdec6bde7ded6f7efe7fffff7fff7f7fffff7ffff
f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffe7ffffdeffffceffffbdffff9cffff
84ffff6bffff63ffff63fff773ffff7bffef94efdea5d6c6a5a59ca5847b9c6b6bbd948cf7e7deffffeffffff7effff7f7fffff7ffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffff7fff7eff7e7dee7d6cedece
c6ceb5adc6ada5c6ad9ccead9cc6ad9ccead9cc6a59ccead9cc6a59ccead9cc6ad9cceada5c6ad9cceada5cead9cd6b5a5d6b5a5debdadc6ad9ccead9cc6ad9c
c6ad9cbda594c6ad9cbdad9cc6b5a5ceb5add6c6bde7d6c6f7e7defff7effffff7fffff7fffffffffffffffffffffffffffffffffffffffffffffff7ffffffff
fffffffffffffffff7efefceada59c737b947b73ad948cc6b5adefd6cef7e7defff7effff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7ffffe7ffffdeffffceffffc6ffffadffff9cffff8cffff7bffff5affff52ffff4affff52fff75affef6befe77bd6ce8cbdb5
949c948c7373c6a5a5f7efeffffff7fffffff7fff7f7ffffeffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffff7fffff7fffff7fff7e7decec6cebdb5b59c94bda594bd9c94c6ad9cceb5a5ceb59cc6a594cead9ccead94cead9ccead9cd6b5a5d6b5
a5debdaddebda5debda5d6b59cd6b5a5d6b59cd6b5a5d6bda5dec6addebdaddebda5d6b59cd6b59ccead9cceb59ccead9cceb59cc6ad9cc6ad9cc6ad9cceb5a5
ceb5a5cebdadcebdadcebdadded6c6fff7effffff7fffffffffff7fffff7fffff7fffffffffffffffffffffffffffffffff7f7fff7f7e7d6d6b59c9c94736b9c
847bb5948cdebdbdf7ded6ffefe7fff7effffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffe7ffffdeffffc6ffffb5ff
ff9cffff84ffff73ffff6bffff5affff52ffff4affff52ffff52fff75af7ef5ad6ce6bbdb56b9c947b8484cebdbdfff7f7fffffffffffff7fff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffefe7e7cebdceb5a5b59c8cbda594c6
a594cead9ccead9cceb59cd6b5a5e7c6b5debda5d6b5a5debda5e7ceade7c6ade7c6addebda5e7c6addebda5debda5debda5e7c6addebda5e7c6addebda5e7c6
ade7c6adefceb5efceb5efceaddebda5debda5d6bda5debda5d6b59cd6b5a5d6bda5d6bda5d6b5a5d6b5a5cead9cd6b5a5ceb5a5c6ad9cb59c94bdada5d6c6bd
f7efdefffff7fffffffffffffff7f7fffffffffffffffffffffffffffffffffffff7efefe7c6bda5847b94736bb5948cd6b5addec6bdffe7defff7f7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7ffffe7ffffdeffffbdffffadffff8cffff73ffff5affff52ffff42ffff42ffff42ffff52ffff52f7
f75aefef63ded663bdbd639c9c6b8c8cc6cecefffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffff7ffffffffff
fffffffffffffffffffffffffff7f7ffefefe7cec6d6b5adbda594bd9c8cbd9c8ccead9ccead9cd6b59cd6b59ce7bda5debda5efc6adefceb5efc6ade7bda5e7
c6a5debd9cdec6a5debda5e7c6a5dec6a5e7ceade7c6ade7c6addebd9cdec6a5dec6a5e7c6a5dec6a5e7c6a5dec6a5f7d6b5efceadefceade7c6a5e7c6a5debd
a5e7c6addec6a5e7c6addebda5debda5debda5dec6addebdade7c6b5debdadd6b5a5cead9cbda594b59c8cbda59ccebdb5efded6fffff7fffff7fff7f7ffffff
fffffffffffffffffffffff7fff7f7f7ded6cea59c9c7b73a57b73ceada5dec6bdefded6ffefe7fff7f7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7
ffffefffffd6ffffb5ffff9cffff7bffff5affff4affff39ffff31ffff39ffff4affff52ffff63f7f763dede6bc6ce63a5a5638484c6d6d6ffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffff7efefd6cec6ada5bd9c94bd9c8c
cead9cd6b59cd6b5a5d6b5a5debdaddec6ade7c6ade7c6ade7c6ade7c6adf7d6bdefceadefc6ade7c6ade7c6addec6a5e7ceade7c6a5e7c6a5dec6a5e7c6adde
c6a5e7c6ade7c6a5e7ceade7c6a5e7c6a5dec6a5e7c6a5efceadefd6b5efceade7ceaddebda5e7c6a5e7c6a5efceb5e7c6ade7c6addebdade7c6addebdade7c6
ade7c6adefceb5efc6b5e7bdadd6ada5d6b5a5c6ad9cc6a59cb59c94bda59ce7d6cefffffffffff7fffffffffffffffffffffffffffff7fffff7fff7efd6ada5
a57b7ba57b73c69c9cdebdbdf7dedef7e7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefa5b5b5849c9c84bdb5a5f7ef94ffff7bffff5affff42ffff31
ffff29ffff31ffff42ffff5af7f76be7e77bced66b9ca5637b7bc6d6d6fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7
fff7fffff7fffffffffffffff7fffff7fffff7ffffefe7d6bdcea594b59484c6b59cd6bdaddec6b5dec6ade7ceb5e7ceb5e7d6bde7d6bde7dec6e7d6bdefd6bd
efd6bdefd6bdf7e7ceefd6c6efcebdf7d6bdefceb5f7d6bdefceb5f7d6bdefceb5f7d6bdefceb5efceb5efceb5efceb5e7c6adefc6ade7c6ade7c6addebda5de
bda5e7c6adefceb5e7c6ade7c6addebdade7c6b5e7c6ade7c6addec6ade7c6addebdaddec6addebdaddebdade7c6adefceb5e7c6ade7c6addebdadd6bdadceb5
a5ceb59cbda594bd9c8cbd9c8cdebdb5ffefdefffff7fffff7fffffff7fff7eff7effff7effffff7efcecebd8484a56b6bbd8c8cdeb5b5f7d6d6f7dedefff7f7
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffded6d69c9c9c63736b425a5a295a52428c8c63bdbd7bf7f76bffff5affff39ffff39ffff42ffff5affff63efe76bd6d66badad739494ce
d6d6fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7efe7d6c6bdad9cc6ad
94d6ad94debda5d6c6a5dec6addec6ade7c6addec6addec6b5d6c6adceceadcec6addeceb5dec6ade7c6b5d6bdade7dec6d6c6ade7c6b5e7c6adefceb5e7c6ad
efceb5e7c6adefceb5e7c6adefceb5efceb5f7d6bdefcebdf7d6bdefcebdf7d6bdf7d6bdf7d6bdefceb5f7d6c6f7d6c6efd6bde7c6b5e7c6b5debdaddebdadd6
bda5debdaddebdaddec6addec6ade7c6b5dec6ade7c6adefc6adf7d6bdefceb5deceb5cebda5d6bda5d6bda5debda5d6b59cd6b59ccea58cc6a58cd6b59cffe7
ceffffeff7fff7f7fffffffffffffff7ffffffffefefd6a5a59c6363a5737bd6a5a5f7d6d6f7dedeffefefffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7c6c6c684848452525242524a314242214242
104242296b73399c9c5aced66beff76bffff5affff5affff63f7f76be7de63b5b5639c9c94adadefeff7fff7f7fffffffffffffffffff7ffffffffffffffffff
ffffffffffffffffefffffefffffefffffffffffffffffffffffffe7e7efbdbdc69c94b59484b59c8cceb5a5debda5efc6ade7bda5e7c6ade7bda5efbdade7bd
a5debda5cebda5cec6a5e7bda5efbda5efbdaddebdadd6ceb5d6c6ade7bda5efbdaddebda5dec6addec6a5e7c6addec6a5dec6addec6a5dec6add6bda5dec6a5
debda5e7c6addec6ade7ceade7c6adefceb5efceb5efd6bdefceb5efcebde7ceb5e7ceb5dec6ade7ceb5dec6ade7c6b5dec6addec6add6bda5debdaddebda5e7
c6ade7c6ade7ceb5deceadd6ceadd6c6a5dec6add6b59cdebda5deb5a5deb5a5cead94c6a58cbda58cceb5a5ffefe7fffff7fffff7fffffffffff7fffff7ffef
efdebdbda57b7bad7b84bd9494efc6c6f7dedeffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7ffffdededea5a5a56b73734a52525252524a4a4a4a5252425252315252184a4a10525a21737b52b5bd6bdee784f7ff73efef
73e7e76bcece63a5a584adaddeefeffff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffe7fffff7ffffffffffffffffe7
dee7bdb5bd9c9494b5a59cc6ada5cebdadd6bdadefc6adf7bda5f7c6ade7c6adefc6adefc6adf7c6adefc6ade7c6ade7c6adf7c6b5f7bdadf7c6b5efc6adefde
bddec6adefc6b5e7c6ade7c6addec6ade7ceaddec6addec6addec6ade7ceaddec6addec6addec6a5dec6addec6addec6addec6ade7c6addebda5e7c6ade7c6ad
efceb5efcebdf7d6bdefceb5efceb5efd6bdefd6bde7ceb5efceb5e7c6b5e7c6addec6ade7c6addebdadd6bda5d6bda5deceb5ded6bddeceb5d6c6a5e7ceb5de
c6addebda5d6bda5dec6adceb59cbdad94b59c8ccea59cefcebdffefe7fffff7ffffffffffffffffffffffffe7cecea58484ad8484bd8c94deb5b5f7dedeffe7
e7ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefd6d6d6848c8c5a63633942
424a4a4a5252524a4a4a4242424a4a4a424a4a394a52294a4a214a52215a634a848c6bb5bd94dede8cded67bbdbd6b9c94bdd6cef7ffffffffffffffffffffff
fffffffffffff7fffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffc6dee784bdc663b5b57bc6bd8cbdb5b5c6b5c6bdb5dec6b5efbdadff
bdadf7bda5e7c6a5debda5dec6a5e7bda5f7c6adf7bda5f7c6adefbdade7c6ade7c6adefc6adffcebdefc6add6c6a5d6c6add6c6a5dec6add6bda5dec6a5d6c6
a5dec6add6bda5dec6addec6addec6addec6a5dec6addec6a5dec6addebda5dec6addec6a5e7c6addec6adefceb5efceb5e7c6addebda5e7c6ade7c6ade7ceb5
e7c6adefceb5efceb5efd6bdefceb5e7c6addebda5d6c6add6c6addeceb5deceb5deceb5dec6ade7c6addebda5e7c6add6bda5d6bda5cebda5debdadd69c94ce
948cc6a59ce7decef7f7effffff7f7fff7fffffffffff7efd6d6b59494a5737bb5848cdeb5b5efc6ceffe7e7ffefefffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffefefefbdbdbd7b847b525a5a4252524a5252424a4a4a4a4a4a4a4a524a4a524a4a4a4a4a4a4a52525a
5a394a5231424a314a52527373739c9c7bada56b948ca5bdb5e7efeffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffff
fffffffffffff7ffffbdd6de7bb5bd52bdbd63e7de6bf7ef84efe794deceadcec6bdc6b5e7c6b5f7c6adefc6addec6addeceadd6c6a5deceade7c6a5ffc6adf7
bda5efc6addec6a5deceaddec6a5ffd6bdefc6a5d6ceadcec6a5deceaddec6a5e7c6addec6a5e7c6addec6a5e7c6addec6a5dec6addebda5dec6addebda5dec6
addec6a5dec6addec6a5e7c6ade7c6ade7c6ade7c6adefceb5e7c6ade7c6addebda5e7c6ade7c6adefceade7c6adefceb5efceb5efceb5efceb5efd6bde7ceb5
deceb5d6c6ade7ceb5e7d6bddec6addebda5e7c6ade7c6b5e7ceb5d6bda5d6c6a5d6bda5efbdadefb5a5cea594ad9484c6bda5e7e7d6fffff7fffff7ffffffff
ffffffefefbd9ca59c7373b5848cdea5adefceceffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdededead
adad7373734a5252424a4a4a52524a5252424a4a424242524a525a52525a525252424a524a4a524a4a5252524a4a4a52525a5a63635a6b634a5a5a737b7bced6
cefffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffff7ffffbdd6de7bb5bd5ab5bd63dee75af7f75afff7
63fff773fff784efd6a5dec6c6ceb5d6c6adcec6a5ceceaddec6a5e7c6adcec6a5d6c6ade7c6a5f7c6adefbda5e7c6a5ceceadd6ceadf7d6b5e7ceadcec6a5ce
ceaddec6a5e7c6ade7c6a5e7c6ade7bda5e7c6ade7c6a5e7c6ade7c6a5e7c6ade7c6ade7c6ade7c6a5e7c6ade7c6ade7c6a5debda5e7c6addebda5e7c6adefce
adefceb5e7c6ade7c6ade7bda5e7c6ade7c6ade7c6ade7bda5e7c6ade7bdadefc6b5efc6b5efceb5dec6b5e7ceb5e7ceb5f7d6c6f7cebdefc6b5deb5a5debda5
debda5dec6add6bda5dec6ade7bda5e7b5a5deb5a5deb5a5bda58cbdad94d6cebdf7f7e7f7fff7fffffffffffff7efefceadadad737bbd7b84d6a5a5e7bdbdff
dedeffefeffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdededea5a5a56363635252524a4a4a4a5252424a4a4a524a4a4a4a52525252
4a4a524a4a524a4a6352525a4a4a5a4a4a5a4a4a6b5a5a736b6b847b73736b63635a52ada59cfff7f7ffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffced6de8cb5b573b5bd7be7ef73f7ff5affff52ffff5affff63ffff84fff7a5ffe7c6efd6ced6bdc6ceadc6cead
dec6addec6add6ceadcec6ade7ceadefbda5f7c6adefc6addeceadd6c6a5f7debde7ceadd6ceadd6c6a5efc6adefbda5f7c6adefc6adefc6adefbda5efc6adef
bda5efc6adefbda5f7c6b5efbda5efc6ade7bda5efc6ade7c6ade7c6ade7bdadefc6ade7bda5efceb5efceb5f7ceb5e7c6adefc6ade7bdadefc6ade7bdadefc6
ade7bda5efc6adefbdadefc6ade7bdadefceb5efcebdf7cebdffcebdffd6c6ffcebdf7c6b5f7c6b5efc6b5debdaddebdadd6bdade7c6ade7c6ade7c6addeb59c
deb59ccead9cbdad94cebdadf7f7e7f7ffeffffffffffffffff7f7e7b5bdb57b84b57b84cea5a5e7bdbdffdedefff7f7ffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffd6d6d69c9c9c5a5a5a5252524a4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a4a524a52524a4a5a4a4a524a4a635252635a527363637b6b6b8c
7b7373635a5a4a426b524acebdbdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffdee7de8cadad7bb5
b584ced66bcece6beff75af7f75affff5affff52e7de5acec673cebd94cebdadc6b5a5ad94ceceb5d6c6addec6addec6b5bda58cbda58ce7bda5e7bda5d6ad94
cea58ce7ceade7ceb5ceb59cbda584debda5d6a58ce7ad9cf7c6adf7c6addea594d69c84dead94f7bdade7ad9cdead94d6a58cce9484d69c8ce7ad9cefbdadef
c6ade7c6adcea594cea58ce7bda5efc6adefc6b5efbdadce9c8cdeb59ce7b59cce9c84ce9c84ce9c84ce9c8ce7ad9cdead9cce9c8cce9c8cc69484d6a594ce9c
8cdead9cdea594dead9ce7a59cffc6b5efbdadefc6addebda5dec6addec6a5dec6a5debda5efbdade7b5a5deb5a5cea594bd9c94bdad9ce7ded6fff7efffffff
fffff7fff7f7debdbdad8484a57b7bbd9494debdbdf7e7e7ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffcecece9494945a5a5a4a4a4a4a4a4a5252524a4a4a
5252525252525a5252525252525252524a4a525252524a526363636b63637b736b8c7b738c847b6b5a525a4a425a42399c8484f7e7e7ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffefffff94b5b57badad9cd6d67badb521636b63d6d67bffff73ffff84ffff429c9c105a
52186b63397b6b526b635a5a4aad948cdecebde7cebde7bdad7342397b5242e7bdadefbdad5a2110ad6b5affc6b5f7d6bd8463428c5a42dead94945242b57363
ffc6b5de9c8ca563526b3121bd8473efb5a5c68473945a4a9c5a4a9c5a4a844a39a56352f7b5adefc6adefc6ad946352734a31f7cebdf7c6b5efbdaddeb5a56b
3929ad7b63ce9c8c7339298452399463528c5242ce9484ad73637b42318c524a8c5a4aa56b5aa56b5a7339319c5a4a945242a56352bd7b73efbdadf7cebdefce
bddebda5dec6add6bda5dec6a5e7c6a5efc6ade7bda5e7b5a5d6ad9cc6a594c6a594efd6cefff7effffffffffff7ffffffdebdbdad8c84a57b7bc6a5a5d6bdbd
efdedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7f7f7c6c6c68c8c8c5a5a5a4a4a4a4a4a4a525252424242524a4a524a4a5a5252524a4a524a4a4a424a5252525a5a63737373
6b6b6b6b6b63736b6b847b7373635a5a4a42523931634a42b5a59cfffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7ffffb5d6d663a59c84d6ce9cdede8ca5ad21424a7bced68cefef9cf7f7b5e7ef637384295a5a6bb5ad84bdb5a5bdbd5a524a6b4a42bdada5ceb5adc694
8c631818a57b6befcebdf7d6c6521810a54a42ffb5adefd6bd8c634a7b3931e7b5ad7b31298c524af7bdadb573636b2921631810ad7b73c68c7b6b2921945a52
dea59cefbdad733121843931efad9cffc6b5f7c6b5845a4a5a2918efbdade7b5a5f7c6b5debdad521808845242ce9c8c6b3121b57b6bce9484ce948ce7bdada5
736b632918b58473d6a594dead9c9c6352632110c68c84d6a59cb5736b521008a56b5affd6c6efc6b5f7d6bde7c6ade7c6add6bda5dec6a5dec6a5e7c6ade7bd
a5e7b5a5dea59cd69c94d6a594e7c6bdffefe7fffffffffff7fff7f7e7cec6ad8c8c947373b59c9cd6c6bdf7dedeffefefffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7c6c6c68c8c8c5a5a5a5252
525252525a5a5a5252524a4a4a5252525a5252524a4a524a4a5252526363636b6b6b6b7373636b6b63636b5a5a5a7b7b737b736b63524a5a42425a4a397b635a
ded6c6ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffcee7e75a9c945abdb573efe794efe79cadb53139427b
8c946b848c94949ce7d6de8c73844a636b84ded6adffffc6ffffadb5b552393173524a946b6b7339394a1818decec6cec6b5f7cec66318109c3931f7ada5efd6
c6946b5a8c4239efb5b59c524a8c524ad6948c843939944a42843931bd847b9c635a632118cea59cffded6d6a59c733129843931e7a59cf7bdb5ffd6ce946352
632921a57363ad7b6bdead9ce7c6bd4a10088c524acea594733129a55a52bd847bce948cf7c6bdad7b6b7b3931d6a594ffd6ceffcec6b5736b6b2921efbdb5ff
ded6ffded67331216b3121f7cebde7bdb5efcebdf7d6bdefceade7ceadd6c6addec6addec6ade7c6adefbda5f7bdadefb5a5d69c94c69c8cdecebdf7f7e7ffff
f7fffff7fffff7decec6ad9494947b7bbda5a5e7cecef7dedefff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7f7f7c6c6c68c8c8c5a5a5a5252524a4a4a5252524a4a4a4a4a4a4a4a4a525252524a4a5a52525a5a
5a6b6b6b6b73736b7373525a634a52524a4a526b6b6b736b6b6b6363634a4a634a425239319c8c84f7efe7fffff7ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7fffff7ffffff94b5ad63adad5acec65af7e78cf7efadbdc6392931846b7384636b73394abd84949c7b8c39525a73ded684ffff9c
ffffceffff7b7b7b4a1821b57b844218216b635ac6ded6d6e7d69c63636b1818731818ad736bd6cebd9c8473943939f7adada552527b39318c4a428c4a4ade9c
9494524aad7b7ba5736b632118ce8484ffc6c6c68c8cad736bbd7373efadadffc6b5ffd6c6a56b634a1008b5847bad736bd69c94debdad5a1810844a42d6a59c
6b21188c4a42a56b63c67b73efb5adad7b73733121d69c8cf7bdadffcebdbd847b6b2921e7ad9cffbdb5ffd6ce8c4a424a1008ffd6cedebdaddebdade7c6adef
ceade7ceade7d6b5deceaddec6addebda5e7bdadefb5a5efb5a5dead9ccea594b59c8cd6c6adf7efdefffff7fffff7ffffffefd6d6b594949c7b73c6a5a5debd
bdffe7e7fff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffce
cece8c8c8c5a5a5a5252524a4a4a525252525252525252525252525252524a4a5a5a5a6b6363737b736b73735a63634a52524a525a4a52525a63637b7b7b6b63
635a4a4a735252633939634242b5a59cfffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdeded66b84846bbdbd
73e7de73fff7a5ffff9cb5b529212984737bad94946b2939a573849c7b8c314a525ac6c67bffff7bffffadffffadc6ce633942945a6b312121a5c6bdc6ffef94
b5ad4a1818c67b84ad7b73422921a5a59494736b943939f79c9cad63635210087b3939ce948cffcec69c5a52b57b7bdea59c8c42428c4242c68c84deadadd69c
9cd6948cffbdbdffbdb5ffcec6b5736b632118d6a59cd69c94d6948ce7bdb56318109c5a52cea59c6b2118a5635adea5a5d68c84efbdb5ad7b736b2921c68c7b
f7bdb5ffc6b5ce948c5a2118bd7b73d68c84ce8c84632918734231ffe7d6e7c6b5d6bda5debda5e7c6adefceb5efceb5efd6bde7c6adefc6ade7c6ade7c6adde
bda5e7c6addebda5cead94bd9c8cd6bdadfff7e7fffffffffff7fffff7efdedeb58c8c8c6b6bd6adadefc6c6ffe7e7fff7f7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffcecece9494945a5a5a5252525252525252524a4a4a5252524a4a4a52
5252525252636363736b6b73736b636363525a5a425252425252424a52525a5a73737b7373735a4a4a634a4a6b4a4a633939734a4ac6b5adfffff7fffffff7ff
f7f7fffff7fffffffffffffffffffffffffffffffffffff7f7ffffffffffff94948c39524a5a9c9c73ced69cffffa5f7f7add6ce395a525a6b6b636363736363
bda5adb5adb54a737b5aced663ffff63ffff84ffffc6ffff9c949c7b63733963639cefe7adf7ef638c8c636363efdeded6dede52635a7b847bad948c945a5aff
b5b5ce948c8c524ab57b73f7c6bdf7c6bdbd847bbd8484ffcec6ce9c9494635a8c524aad6b6b945a52b57b7be7b5adf7bdb5ffc6bddea59c8c524aad6b6bb573
6bb57b73efb5ada55a52ad736be7b5b59c524aad635ab56b63b56b63d69c94d6a594946352ce9c8cefbdadffc6bddead9c9c5a52a5635aad6b639c6352945a52
d6a59cf7d6c6dec6b5dec6b5d6bda5dec6addebda5efc6adefc6adf7ceb5efceb5e7ceb5dec6addeceb5cebda5debda5d6b59cd6a594c69484debdb5ffefe7ff
fff7fffff7ffffffe7d6cead8c84a57b7bcea5a5efc6c6ffe7e7ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffdedede9c9c9c6b6b6b5252524a4a4a5252525252525252524a4a4a52525263636373737373736b6b6b6b5a5a5a5252524a52524a525252
525a4a5252636b6b7b7b7b635a5a5a4a526352526b52525a3939846363e7ceceffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7ef5a524a424a42316363428c8c7bd6d69cefefadf7ef8cd6d684cece84cece94d6d6b5eff7a5efef7bdede6bf7f752ffff52ffff73ffff94ffff
a5e7ef8cced66be7de7bffefadffff94d6d694ded6adf7efadffff7bd6c6b5d6d6ced6d6bdb5b5e7c6c6f7cecedeb5addebdb5efc6bdf7d6c6e7c6b5debdadf7
cebdffdeceefc6b5deb5a5d6ad9cd6ad9ccead9ce7c6bdefc6b5e7b5adffd6ceefbdb5d6ad9ce7c6b5cea594ffd6c6e7bdaddeb5a5ffdeceefc6b5e7bdade7bd
add6ad9cefc6b5f7cebde7bdaddeb5a5efc6adf7c6b5ffcebdefbdade7b5a5deb5ade7b5a5efbdadf7d6c6debda5e7cebde7ceb5dec6adefceb5e7bda5e7bda5
efc6adefc6adf7ceb5efceb5efcebdefceb5e7c6addeb5a5e7bdadd6ad94dead9cd69c94deb5adfff7effffffff7fff7ffffffefded6a57b7bad7373efb5b5ef
c6c6ffefeffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdededea5a5a56b6b6b5a5a5a4a4a4a525252
4a4a4a4a4a4a4a4a4a5a5a5a6363637373736b6b6b63635a524a4a52524a524a4a5252524a4a52525252525a5a7b7b8463636b5a525a524a4a6352525a4a4a5a
42398c736bffefeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffd6bdbd5231314a4242425252315a5a42737b5a9c
9c94e7e79cf7f794fff794ffff8cffff84f7ef8cffff7bffff73ffff63f7f76bffff73ffff7bf7f78cf7f78cffff6bfff773fff79cfff7adffff8cffff63f7ef
63fff78cffffb5ffffc6efefc6e7e7cececee7cec6e7cec6d6c6b5d6c6b5dec6b5deceb5dec6adefc6adffc6adffceb5f7d6b5ffdec6efceb5e7ceb5cebda5e7
c6b5e7bdadefcebdffd6c6efc6b5f7d6c6f7cec6efc6b5efcebde7c6b5f7d6c6efd6bde7d6b5e7ceb5efd6bde7c6adefceb5efcebdefc6b5e7bdadf7c6b5f7c6
b5f7cebdf7cebdffd6c6efbdadffdec6debda5debda5e7ceb5f7d6c6efc6b5e7bdadefbdadefc6ade7bdadf7c6b5efc6adefc6adefbdadf7cebdf7c6b5efc6ad
efbdadf7bdadefb5a5e79c94d6948cdec6b5ffffeff7ffeff7fff7ffffffdececeb57b84bd7b84deadadefcecefff7effff7efffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffefefefb5b5b57373735252524a4a4a5a5a5a5252525252524a4a4a6363636b6b6b7373736363635a5a5a525252
524a4a5252525a52524a4a4a5a5a5a5252527b84847373735a5a5a5252525a52526352525a4a4a5a4239a58c84fffff7ffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffa58c84523129634a4a635252635a6352525a5a636b73848c8cadad73a5a5528c8c4a8c8c7bc6c67bc6c64a94
947bc6c6b5f7f763adad63b5b57bcece73a5ad52848c4a9c9c39948c73adad639ca563b5b584fff763fff77bfff794d6d65a94948cd6ceadd6cead9c9c9c847b
cebdb5d6bdadbda58ca5846bcead94c68c73d68c7bf7b59cffceb5ce947bb57363c69c84efc6b5dead9cd6a594946352a573639c6b5abd8c7be7b5a5efc6b5d6
ad94a57363bd9484f7cebde7bda5efc6adce9c84b58c73cead94e7bdaddeb5a5b58473a57363ad7b6ba56b5ace9484ad7363ad7b6b9c6b5a9c7363a57b6befc6
b5efc6adefc6ad9c6b5ac69484efbdadefbdaddead9cb57b6ba56b5aad7b6bad7363dea594d69c8cb57b6ba56b5aa56b5aa55a52ce8c7bbd948ce7d6c6ffffef
fffff7fffff7ffffffe7bdc6ad737bbd8c8cdeb5b5efd6d6fff7eff7ffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7c6c6c67b7b
7b5252524a4a4a5252525252525252525252526b6b6b7373737373735a5a5a5252524a4a4a5252525252525a5a525252524a524a5252526363637b8484636363
5252525a5a5a5a52526352525242425a4a42a5948cffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b4a4a5a
39316b4a4a735a5a634a4a845a637b525a7b525a4a31315a4a4a7373737b848c94a5a584949421313194949cb5adb5524a52849494a5bdbd4a39427b5a63737b
7b63848494b5b5395a5a183931b5f7ef8cf7ef94f7e763847b214a4a7bdeceadefe7847b7b6b524acebdade7cebd9c7b6b634231b5947ba56352ad5242f7ad94
efa5948c3931732118b56b63efb5a5945242733121bd7b6bce8c7b9452426b3129efada5f7bdb5e7b5a58c4a3994524affbdb5ffc6b5efad9ca55a4a9c6352e7
b5a5efc6adefbdad8c5242844a39a5635aad7363ce8c7b6b29216b2918ad7363ad7363a57363e7b5a5f7bdb5b57b6b5a21186b3129d69c8cffc6b5d69c946b31
217b3931ad6b63b57363d6948cc6847b7b39299c5a4aad6b5aa5635ac68c7bd6ad9cb59484f7e7d6fffff7fffff7fffff7fff7f7debdbda5737bbd9494debdbd
f7ded6f7f7e7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7d6d6d68c8c8c5a5a5a4a4a4a5a5a5a4a4a4a5252525252526b6b6b7373736b6b
6b5252525252525252525a5a5a524a4a635a5a5252525a5a5a5252525a5a5a7b7b7b7373735252525a5a5a5a5a5a635a5a6352525a4a42634a4ab5a5a5ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefef5239396342396b5252635a52635a52735a52845a5a9463635221218c
6363b59c9cadada5c6c6c6a5a5a54242399484849c737b734a52d6cecedeced6733942bd7384cebdc6b5cececeefefb5cec6291018846b738c9c9c9494945a39
3952635a94ffef9cefe78c948c524a42cec6bde7d6c69c7b73523929c6ad9c94635aad5a52f7ada5ad63528c3931631810ad635ad6948c732918ce7b73f7b5ad
ffbdb5c68473632118f7b5adffc6b5ffcebdc694847b2921bd6b63c6736bad524a842118b56b63f7bdadf7c6b5f7bdad94524aa56352e7b5a5f7bdadffdece73
31215a1008efada5f7b5ade7ad9cffc6b5efb5a58c42397b3929944a429c524affcebddea5948439319c635af7c6bdefada5f7bdb5ce8c847b3129c68c84f7ce
c6e7bdade7bda5d6ad9cc6948cc6a59cfff7effffff7fffffffffffffff7f7c69c9cad7b7bc69c9ce7c6bdffefe7fffff7ffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffdedede9c9c9c6363634a4a4a5252524a4a4a5252525a5a5a7373737373736363634a4a4a5252525252525a5a5a5252525252525a5a5252524a5252
5263635a5a5a5a8c8c8c5a5a5a5252525252525a5a5a5a52526352525a4a42735a52bdadadffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffd6c6c64a31316b4a4263524a525a4a5a635a73635a8c6b639c6b6b5a29219c73738463637b736b8c8c849c9c944a42426b4a4a73424a73
3942ceadadf7d6d67b31398c3942634a4a4a6b63b5ded6e7fff794737b5a18218c525a844252632129a5adad9cffefadfff794a59c524a42c6c6bdf7efef9484
84423129b5ada5946b639c524aa563525a1810c6948c843131a55a52bd736b5a1010f7ad9cffcec6d694848c4a39632918efad9cf7b5a5ffd6c6f7c6bdad5a52
732118ad4a4a9c31319c3931de948cffc6b5f7c6b5ffcebd844a42a56352efb5a5ffcebdffd6c6843931520800a55a52844231a56352ffcebdefad9c6b2118d6
948cce9c946b2121ce8c7be7a59c8431316b29218c4a428c4a42ce948cd6a59c843931ce8c84ffcec6f7cebddebdaddeb5a5dead9cbd9484d6b5a5fffff7ffff
f7f7fff7fffff7f7e7e7bd8c8ca57373c69c9cefd6d6ffefe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7b5b5b57373735252525a5a5a52525252525263
63637373737373736363634a4a4a5252525a5a5a6363634a4a4a5252525a5a5a635a5a52524a5a5a5263636373737373737b5a5a5a525a5a5a5a5a5a5252635a
5a63525263524a735a5acebdb5ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff9c84845a42396b4a4a6b5a52526352
5a73635a524a9c847bb58c844a18186b42398463637b6363847b738c847b5a4242947373efcece8c6363523939cebdbd944a52a55263d6bdbdadbdbdcef7f7d6
f7efe7e7e74a2129944a527b394a63424ac6dedeadffffadf7efb5bdbd5a5252cec6c6fff7f79c8c8c311818b5a59c8c6b637b39396321219c5a5aefd6d68c42
42943939efb5b55a1010bd7b73ffcebdffc6b5e7bdade7bda5e7bda5efc6b5e7bdadffdececea5947b3929b56b63a5524aad635af7bdb5efbdadffcebdffd6c6
844a42844a39dea594ffbdadffdece9452425a1808dead9ce7a594e7ad9cffc6b5945a4a732921ffc6bdf7cec6944a4294524ade9c948442398c5a52e7bdb5de
9c94efb5add69c947b3931c68c84f7bdb5e7c6b5efd6bdefc6b5e7ada5ce9c94b58c84f7e7deffffffffffffffffffffffffefded6a57b7bbd8c8cd6a5a5ffde
deffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffcecece8c8c8c5252525252525252525252525a5a5a7b7b7b7373735a5a5a5252525a5a5a5252525a5a5a5252525a
5a5a5252525a5a5a5a5252635a5a5252526b6b6b8484845a5a5a525a5a5a5a5a5a5a5a635a5a635a5a635a525a4a4a73635ac6b5b5ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffff6b5a526342426b524a6b5a52636b6352635284847ba5948cc6a5a57b52524a21215a31316b524a
735a529473735a39396b4242946b6b5a3139312921c6c6c673424a7331398c7b7b738c8c4a847bbdfff7d6ffff94949c391021421829848c94bdf7f76bc6c65a
9494525a632929296b636b9c94946b525a312121a5a5a5947b7b391010522929c69c9cffe7e7844242844242efc6c6a56b63521810845242b58c7ba5846b8463
4ad6bda5dec6ade7ceb5e7c6b5f7d6c6a573635218106b3129bd7b7befbdade7bdade7bdadf7cebd7b4a427b4a42d69c8cffc6b5ffd6c694524a4a08009c6b5a
ad7363a56b5ad6a5945221108c524affcec6ffcec6c6a5945a21189c5a527b4239734231a5736ba56b63ce9484d69c946b3129bd8c84f7c6b5e7c6b5e7ceb5ef
c6b5e7b5a5e7b5a5c6948cad948cffffeffffffff7fff7f7fff7fffff7dec6c6a57373c68c94efc6c6ffe7e7ffefefffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f79494945a5a5a
5a5a5a5252525252526363637b7b7b7373735a5a5a5252525a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a6363635a5a5a5a525284847b7373735a
5a5a63636b5a5a5a6363635a5a5a6b5a63635a52635252735a5acebdb5ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ff73635a735a5a8c6b6b947b738c8484848484847373948484bda5a5d6b5bdad8484845a5a734a52946b6bad848cad84848c636b8c636b846b6b9ca5a5cee7de
b5adad8c7b7b7b9494639c94429c9494f7efadffffa5dee784949c7b949c9cdee7a5ffff7bd6de529c9c7394946b8c8c6b8c94849ca58ca5a5738c8cadcecea5
bdbd949494a5adadd6deded6d6d6ad9c94a5948cdecec6f7ded6deb5a5a57b6b8c6b5a8c735aad9484d6c6ade7debddeceb5efdec6ffe7d6efcebdb59484bd94
84deb5adefc6bdd6bdade7ceb5efcebdc6a594b58c7bdeb5a5efbdadffd6c6d6a594b58473ad7b6bad846bb58c7bd6ad9cbd9484deb5a5f7c6bdf7cebdf7cebd
bd9484b58c7bce9c94b58c7bb58c7bad8473ce9c94d6ad9ccea594cea594debdaddebdaddec6addebdadefcebdefc6adcead9cb59484ceb5a5fffff7ffffffef
fff7fffffffff7efdeadb5b5737bdea5adefcecefff7effffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffbdbdbd7373735a5a5a4a4a4a5252526b6b6b7b7b7b6b6b6b5a5a5a525252525252
5252525a5a5a5252525a5a5a5252525252525252525a5a5a5252525a5a5a6b63638c8c8c6b6b6b5a5a5a5a5a5a5a5a5a635a63636363635a5a635a525a4a4a73
5a5ac6b5adffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff735a5a634a4284635a7b63636b5a5a6b5a636b636b635a
637b73739c8c8cb59ca5bd9ca5bd9c9cad848cb58c94c69ca5c6a5adad949c9c9494637b7b84a5a5bdc6cedeefefc6f7f79cfff76bded684ffff84fff7a5ffff
9ceff79ceff78cf7ff8cffff8cf7ff94f7f7adf7f7b5ffffa5f7f7b5f7ffb5f7f79cefef9cf7f7adfff7a5efefa5f7efadfff7bdf7efadd6d6a5cec6adc6bdde
cec6f7cec6f7d6c6efcebde7cebddec6b5deceb5d6c6ade7d6bddeceb5e7d6bdefdec6f7decef7d6c6f7d6cee7cebddeceb5deceb5efd6c6e7c6b5e7c6ade7c6
b5e7c6adffd6c6f7cebdf7cebdffdec6efcebdf7dec6f7deceefcebdd6b5a5e7c6b5efcebdffe7ceefcebdefcebdffdecef7d6c6e7ceb5e7c6b5efcebdf7d6c6
e7ceb5e7c6b5e7c6b5e7bdaddebda5e7c6ade7c6b5efceb5d6b5a5c69c94b59484f7efdef7f7eff7ffffeffff7ffffffefd6debd7b84bd848cdebdbdf7dedeff
f7f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffefefef8484846363635252525252525a5a5a7b7b7b7373735a5a5a5252525a5a5a5252525252525a5a5a5a5a5a5a5a5a5a5a5a5252525a5a5a5a5a5a
6b63636363638484847373736363635252526363636363635a5a635a5a5a6b63636b5a5a6b5a527b635acebdb5ffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffff6b5252634242735252735a5a6b5a6363636b5a63635a636b525a635a63636b6b738c848484737b7b63636b525a7b63
637b6b6b736b6b5a6363526b63395a5a4a6363739c947bcece8cfff77bffff6bfff77bf7f784ffff7bffff8cffff94ffff7bf7ff7bffff73ffff7bffff7bffff
73ffff73fff77bffff63fff752fff76bfff77bffff6bfff763fff773ffef8cfff77befde84cec6b5c6bde7cec6efcec6efd6c6e7ceb5dec6b5dec6addec6add6
c6a5d6bdadd6bda5efcebdefd6c6f7decee7cebddec6b5dec6b5deceb5e7cebdf7dec6f7d6c6f7d6bde7c6b5e7c6addebda5efcebdefcebddec6add6bdaddec6
b5cebda5dec6b5d6c6addeceb5e7ceb5e7d6bddeceb5e7ceb5e7ceb5efd6bde7ceb5e7cebde7ceb5e7ceb5debdaddec6addeb5a5e7c6addec6addec6ade7c6ad
efceb5dead9cbd9484c6ad9cffffeff7fffff7ffffffffffffffffe7b5bdad737bbd9c9cefceceffefe7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefffffffadadad6b6b6b4a4a4a4a4a4a6363638484846b6b
6b5a5a5a5252525252525252525a5a5a5a5a5a5a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a6363635a525263635a948c8c73736b6363635a5a5a52525a5a6363
6363636b6b6b736b6b8473737b6b6384736bbdb5adffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b52525a42397b
5a52735a5a73636b5a52635a5a63636b73637373526363525a6352525a635a5a735a63736363635252635252635252636363636363525a5a4a52524a63633973
6b4aa5a56be7de84ffff8cffff7bffff4aefef5affff84ffff73ffff5affff5affff5affff5affff52ffff5affff5affff5affff42ffff42ffff4afff74affff
42ffef5affef6bffef7bffef84e7deadcecec6bdb5c6bdb5c6b5add6bdadd6bdaddec6add6bda5dec6a5e7c6adefceb5e7c6addebdade7c6b5e7c6b5d6b5a5d6
bdadd6bda5d6bda5debda5debda5deb5a5efc6b5f7ceb5f7cebdefcebdefcebddec6addec6add6c6addeceb5cebda5cebda5cebda5d6c6a5deceb5deceb5ceb5
9cd6bda5ceb59cd6bda5ceb59cd6bda5d6bda5dec6addebda5e7bda5e7bdaddec6adceb59cdebda5efceb5f7c6b5d6a594ad8c7befdecefffffff7ffffffffff
fff7fff7e7efbd8c94ad8484ceadadf7dedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffdedede8484845a5a5a5252526363638484847b7b7b5a5a5a4a4a4a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5252525a5a
5a5a5a5a6363635a5a5a6363635a5a5a6b63636b6b638c8c8c5a5a5a6363636b6b6b6b737373737b8484848484848c8484847b73846b6b7b6363bdada5ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b52526b4a4a7b5a5a8463636b636373636b6b636b6b636b635a636b636b6b
63636b636363525a735a6373525a735252734a527b5252734a4a6b42426b4a4a845a5a6b4a525a4a4a424a4a527b7b63adad8cefef7bffff52ffff4affff63ff
ff5af7ff5affff52ffff5affff52ffff5affff5affff5affff52ffff4affff4affff52ffff52ffff52ffff63f7ef73efe77befde9cefe7added6bdd6ceb5c6bd
bdc6bdc6c6b5d6ceb5d6c6addec6ade7c6adefceb5e7bda5e7c6ade7c6adf7d6c6e7c6b5deb5a5d6ad9cd6ad9ccea594d6a594ce9c8cd6a594e7ad9ce7ad9ce7
b5a5efbdadefc6b5efcebde7ceb5e7ceb5deceb5deceb5d6c6a5deceb5d6c6adefd6bde7ceb5d6bda5d6bda5debda5deb59cdeb59cd6b59ce7bda5e7bda5e7bd
a5e7bdade7c6addebda5debda5debda5efc6adefc6adefc6adbd9c8cb5a594fffff7fffffffffff7ffffffffffffe7ced6a58484c69c9ce7c6c6ffefeffffff7
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff8c8c8c6b6b6b52
52525a5a5a7b7b7b7373735a5a5a5252525a5a5a5252525a5a5a5252525a5a5a5252525a5a5a5a5a5a6363635a5a5a5a5a5a5a5a5a635a5a736b6b84847b8c84
846b6b6b7373738484847b848484848c7b7b7b7b7b7b736b6b736b636b5252735a52ad9c94ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffff6b5a526342427b5a5a735a5a736b6b736b737b6b736b63637363636b5a636b5a63635a5a6b5a5a635252634a4a6339397339427331397b
31318439398c4a427339396b3131844a527b525252525242636331847b5acec65aefe773ffff73ffff6bffff52ffff52ffff52ffff52ffff5affff63ffff5aff
ff52ffff42ffff52ffff52ffff4af7f74aefef63efe76bd6ce73c6c673bdbd84cec68ccec69ccec69cc6b5a5bdadb5bda5c6c6add6c6a5dec6addec6a5debda5
debda5dec6ade7c6b5e7c6b5d6ad9cd6a594c68c7bc68c7bc68473c68c7bc6847bce8c7bce9484dea594dea594dead9cefbdadefc6b5e7c6adefcebdefd6b5e7
ceb5efd6b5e7ceaddec6ade7c6adcead94cead94cea58ccea58cc69c84ce9c8cd6a58cdead94d6ad94deb59cd6b59cdebda5e7c6adefc6addeb59cdebda5debd
add6b5a5ad9484e7cec6fffff7ffffffffffffffffffefe7e7c6a5a5b58c8cd6b5b5f7dedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e77373735a5a5a5a5a5a7b7b7b7b7b7b6363634a4a4a5a5a5a5a5a5a5a5a5a5a
5a5a6363635a5a5a5a5a5a5a5a5a6363635a5a5a5a5a5a5a5a5a6b6b6b6b6b6b736b6b948c8c948c8c8c8c8c8c8c8c7b84846b73736363636b6b6b6b63636b63
636b5a5a6b5a526b524aad9c94ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b5252634a42735a5273635a636363
636b6b6b63637b6b73846b73846b73736363635a5a524a4a4a4a424a39315a39316331297b31318c29318c29297321216b31296331297b42426b393963424242
393921524a3973736b949c94c6cea5ffff8cffff73ffff5affff5affff52ffff5affff63ffff6bffff52ffff4affff52ffff63ffff52f7f752efef63dede73c6
ce6badad5aa5a5429c9452ada56bc6b594d6c6a5d6c6b5d6bdbdceadc6c6add6c6ade7d6b5e7ceb5e7ceb5d6bda5dec6add6bdadd6ad94c6847bbd736bb56b5a
ad6352a55a52b56b63ad635ac67b6bce8c7bce8c84ce8c84dead9cdead9cdeb5a5efc6ade7ceaddebda5f7d6b5efceb5efceb5f7ceb5e7bda5cea58cc6947bb5
846bbd846bbd846bc68c73ce947bd69c8ccea58cc6ad94d6ad94efbda5efbda5e7bda5d6b59cdebda5d6bda5ceb5a5bd9c94fff7effffffffffffff7ffffffff
ffefcecebd9494c69ca5f7d6d6ffefe7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffff94949c848484424a4a6b6b6b7b8484636363525252635a5a5252525a525a5a525a635a5a635a5a635a635a5a5a635a5a5a5a5a6363635a5a5a6b
6b6b7373737b7b7b8484849c9c9c736b6b6b6b6b5a5a5a6363635a6363636b635a63636b6b6b6b6363736b636b5a5a735a52a58c8cffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffff6b52526342427b5a5a73635a6b736b636b6b736b6b7363637b6363735a5a735a5a635252524a42
4242395a524a6b5a528c6363945a5aa55a5a9c52527b42426b42395a39315a31296329297342425a4242424a4a424a4a4a424a73737b8cb5b594dede8cf7ef7b
ffff63ffff5affff52ffff5affff63ffff5affff4affff52ffff5af7ff5affff5ae7e76bced66bb5b56b9c9c527b8442847b317b734a94846bb5a594d6ce9cde
cea5decea5d6bdadceb5b5c6adcec6addec6addebdadd6b5a5cead9cbd8c7bb57b6ba56b63a56b6384524a84524a8c5a5294524a9c524abd6b63c6736bce847b
d6948cdea594cea594deb5a5debda5debd9ce7c6a5e7ceaddebda5e7c6add6b59cc69c84b5846bad735a9c5a4aa5634aa56352b57363bd7b6bbd8c7bbd9484ce
a58cdea594e7ad9ce7b59ce7bda5deb59cdeb5a5deada5ce9c94efcec6fffffffffffff7fffff7ffffefe7e7bd9494bd9494debdbdffe7e7fff7f7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e78c8c8c52525a5a63638484846b6b734a5252
636363635a5a635a5a635a5a6b5a63635a5a6b6363635a5a6b6363635a5a6b6b6b737373737b7b7b7b7b848c8c7b847b9494947373736b63636b63636b636b63
63636b6b6b636b636b6b6b6b736b6b6b63736b6b7b6363735252ad8c8cfff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ff6b52526b4a427b5a52846b6b736b6b6b6b6b6b73736b6b6b736363846b6b73525a6b4a4a6b52529c9494dededef7f7f7fffffffffffffffffffff7f7f7e7de
d6c6c6a594948c6b6b734a4a6b39425a31396342425239396b4a52635252737b7b73848494bdbd94e7e773ffff63ffff63ffff5affff63ffff5affff52ffff52
ffff52ffff63f7ff6be7ef8ce7efbdeff7bdced6a5adad848c8c737b7b637b736b94947bc6bd73ded66befe77bf7f784e7de9cd6ceb5c6bdd6c6bddebdaddeb5
a5c6a594bd948ccea59cf7d6d6f7e7e7e7e7dedee7d6bdb5ad9c847ba56b63b56363c66b6bc66b6bce7b7bc68c84c6a594c6a594deb59ce7b59cdec6a5d6c6a5
cec6a5c6bda5d6c6addec6ade7bdadbd8c84b5736b9c524a9c4a4a944a4a9c5252a5635ab57b6bbd8473ce9484d69c8ce7ad9ce7b59cefb59ce7ad9ce7ada5d6
a59cbd9c94fffff7ffffffeffffff7ffffffffffd6c6bd9c847bd6b5b5ffdedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffb5b5b57373734a4a4a7b84846b6b73525a5a5a63634a52525a5a5a5a5a5a635a5a635a5a636363635a5a635a63
6363637373737b7b7b8c8484848484737b7b6b6b6b6363638484847373736363636b6b6b6b63636b6b6b6b6b6b6b6b6b636b636b73736b6b637b6b6b735a5a73
5a529c7b7bffe7e7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff846b6b6342427b5a528463638473736b6b6b7373736b6b
6b736b6b6b5a5a6b4a5284636bd6bdbdfff7f7f7ffffeffff7fffffffffffffffffffffffffffffffffffffffffffff7f7efced6ad848c84525a6b3942633939
5a3139634a4a736b6b636363636b6b5a8c8c6bcec673efe773f7f773ffff5affff52ffff4affff52ffff52ffff63f7ff6be7ef8cdee7c6f7f7f7fffff7f7f7f7
efefefe7dececece526b6b639ca563c6c663efef5af7f773fff784efe7a5dedebdc6c6cebdb5c6ad9cbda594debdb5ffefeffffff7ffffffeffff7f7ffffffff
ffffffffffded6deada5c67b73c67373bd7b73b57b73ad8c7bcea58cd6a58cdead94deb594d6bda5c6b59cc6b59ccebda5efdeceffffeffffff7ffe7deefbdbd
bd8c84a56b6b8c52528c524a94524aa56b63b57b73c68c7bc6947bd6a58ce7a594efad9ce7a59cd6a594c69c94f7e7defffff7f7fffff7ffffffffffded6ceb5
9c94cea5a5f7d6d6ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f79c94946b63
6b6b636b8c8c8c5a5a5a52525a5a63634a52525a5a5a6363635a5a5a5a5a5a5a5a5a6b6b6b737b7b8484848484847b7b7b6b6b6b6b6b6b635a5a6b6b6b847b7b
8c848c736b736b6b6b736b6b736b6b6b6b6b7373736b6b6b6b736b73737373736b736b6b7b6b637b5a5a947373e7ceceffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffff9c84846b4a427b5a528c6b6b8473737b7b7b6b7373737373736b6b735a5a7b5a5aceadb5fff7fffffffff7ffffffff
fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffe7e7b58c947b525a6b4a4a5a42426b6363524a4a4a4a4a4a5a5a52737b73adad
84dede73efef63ffff4affff42ffff42ffff5affff5af7f77bf7f784d6d6b5e7efe7ffffffffffffffffffffffffffff73737b63848c6bb5bd63dede5aefef63
ffff73ffff8cf7efa5e7deadcec6adb5ada59c94d6cec6fffffffffffffffffffffffffffff7fffffffffff7fffffffffff7ffefdee7c6b5ce9c8cb58473b584
73bd8473d69484d69c84dea594dead94deb5a5deb5a5d6b5a5decebdfffff7fffff7fffff7fffff7fffffff7e7dee7c6bdbd9494b57b739c6b5a9c7363a57b6b
b58c73ce9c84e7ad9ce7ad94efad9cde9c94cea594d6bdb5fffffffffffffffffffffffffff7efceadadc69ca5efceceffefeffffff7ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffd6c6ce8c84846b5a5a948c8c6b636b5a5a5a52525a5a6363525a5a5a6363525a
5a5a63635a63636b7373737b7b7b84846b73736b73736363636363636b63636b63636b6363948c8c7b7b7b6b6b6b6b6363737373736b6b737373736b6b6b6b6b
6b6b6b737b7373736b7b736b7b63637b6363846363cebdbdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffc6a5a56342427b
5a528463638473737b7b7b7373736b6b6b736b6b6b5a5a9c7b84f7dedeffffffffffffffffffeff7f7fffffffffffffffffffff7f7f7efefe7e7e7e7dedee7de
def7efeffff7f7ffffffffeff7decece947b846b525a6352525a4a4a5a52525a52525a5252525a5a527b8463bdbd63e7e75affff4affff4affff52ffff63ffff
7bf7ff84dee794ced6defffff7ffffffffffffffffffffffbdb5bd6b73846ba5ad6bced65aefef52fff752fff773ffff8cffef9cefde94c6bd94ad9cc6cec6ff
fffffffffffffffffffffffffffffffff7fff7eff7e7def7efdef7efdeffffefffe7d6debda5c6947bbd8473ad7b63ce947bd69484de9c8cdea594e7b5a5cea5
94d6bdadfff7e7fffffffffff7fffffffffff7fffffffffff7fffff7ffded6d6b5adbd9484b58c7bad8c73bd9484ce9c8ce7ad9cdea594e7ad9cce948cc6a59c
fff7effffffffffffffffffffffff7d6bdbdad8c8ce7bdc6ffe7e7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffffff
fffffffffffff7f7ada5a573636b847b7b847b7b635a5a5a5a5a6363635a5a5a6363635a635a636b6363736b7b84847b8484737b7b5a6b6b5a63635a63636363
63636363736b6b736b6b8473739c8c94847b7b6b6b6b736b6b7373737373737373737b73736b6b6b737b73737b737b7b737b736b84736b846363846363bdadad
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7cec66b4a4a7b5a52846b637b6b6b8c8484737373737373736b6b7363639c
8c8cfffffffffffffffffff7fffff7fffffffffffffffff7eff7d6c6c6a5a5a5948c8c84847b948c8cad9c9ccebdbdd6c6cee7dedefff7f7ffffffb5adad947b
7b6352525242425a4242734a52634a52525a5a426b6b4a9c9c52cec663f7ef5affff5affff63ffff73ffff84efef8cd6d6c6eff7f7ffffffffffffffffffffff
f7eff75a5a6b6b94a563bdc65aefef42f7ef42ffff52ffff6bffff84ffef84e7d67bbdb5bdded6fffffffffffffffffffffffffffffff7e7ded6bdb5ceada5ce
ad9cd6bdadefceb5fff7deffffe7ffdec6d6ad94b58c7bb58473bd8c7bce8c7bde948cde9c8cd6a59cceada5e7ded6fffff7f7ffffeffff7ffffffffffffffff
fffff7effffff7fff7efffefded6c6adc6a594bd9c84d6ad94deb59cdead9cefb5a5ce9c94c6948cf7ded6ffffffffffffffffffffffffd6bdbdad8484d6b5b5
ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7fffff7ffffeff7f7848c8c63636b8c8c8c5a5a5a5a5a5a5a
5a5a5a5a5a5a5a5a5a5a5a6b6b6b7373737b84846b7b73636b6b5263635a63635263635a6b6b636b636b6b6b6b6363736b6b8473739c8c947373736b6b6b6b6b
6b7b737b736b6b7b73737b7373737373737373737b73737b73847b737b6b6b846b6b7b5a5ab5a5a5ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffefef634a427b5a5284636384736b847b7b7b7b7b7b7b7b73736b6b5a5a9c848cfffffffffffffffffffffffff7ffffffffffffeff7c6
adad7b6b6b6b6363636363736b6b6b63636b63636b63637b73738c8484bdb5b5dededefff7f7ded6d6948484634a4a5a39396342426b4a4a634a525252523952
5a397b7b4aa5a563dede63f7ef73ffff6bf7f784f7f77bd6d6a5e7e7defffffffffffffffffffffffff7ff7b7b845a848c5ab5bd4ad6d64af7f739fff742ffff
4afff763fff76befe76bd6c6a5ded6f7fffffffffffffffffffff7ffffffc6ada5a5847bb58c84d6ad9cdeb5a5deb59cdebda5efe7c6f7efd6ffefd6dec6adb5
9484a57b6bbd847bce8c7bce8c84ce948ccea59cdec6c6fffff7f7fff7fffffff7ffffffffffffffffdec6bdceada5dec6b5efdeceffffeffff7deefceb5bd9c
84e7bda5d6a594e7b5a5ce9c8cc6948cd6b5adfffff7fffff7fffffffffff7d6c6c6ad8484d6b5b5f7dedefff7f7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffefffffefffffd6efef849c9c6384846b8484425a5a4a5a5a636363635a63635a5a84737b847b7b847b7b7373736b6b6b5a
635a5a6b635a6b6b636b6b5a63636b736b6b6b6b736b6b7b6b6b94848494848c7b737b6b6b6b7b7b7b7b7b7b7b73737b7373847b7b7b73737b7b7b6b736b7b7b
7b847b7b847373846b6b846b63ad9494fff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b4a4a7b52528c6b63847373
8c7b7b7b7b7b8484847373737363639c8c8cfffffffffffffffffff7fffff7ffffffffffdec6ce84636b6b5a5a6b5a5a736b6b73736b737373636b636b6b6b6b
6b6b6b6b6b636363948c8cc6b5b5fff7f7efdee7b59ca57b6363634a426342426b4a4a634a4a635a5a525a63426b6b4284845abdb573dede84f7f78cfff78cef
ef7bd6cecefffff7ffffffffffffffffffffffbdc6ce52848452adad52cece4aefe74affff4affff4affff52fff75af7ef52d6d6a5efe7efffffffffffffffff
ffffffffffffad9c94a5847bcea594dead9cf7bdadefbdaddeb59cceb594ded6b5efe7ceffffe7ded6bdc6a594ad8473b57b73bd847bc68c84bd8c8cdebdbdff
efeffffffffffffffffffffff7f7ffffff9c7b7394635ab58473d6ad9ce7ceb5f7e7cef7dec6e7c6addebda5d6b59cdeb5a5d6ad9cc6948cc6a59cfff7f7ffff
ffffffffffffffdececebd9494d6adadf7e7defff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffd6ffffc6fff7
94cece7bbdbd427b7b315a63315252636b6b6b636b7b73739484848c7b7b73636b6b5a63635a5a6b6b6b636363636b6b636b6b636b6b636b6b6b6b6b6b63637b
7373948c8c94848c7373736b73737373737b7b7b7b7373847b7b7b73737b7b7b737b73737b73737b73847b7b7b73738473737b636394847bdececeffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b524a7b5a5284635a8c73738c7b7b7b7b7b7b7b7b7b73737363639c8c94ffffffffffff
fffffffffffff7ffffffffffa58c8c734a527b5a63736b6b736b6b73736b6b6b6b6b7373636b6b63736b5a63636b736b636363736b6bc6b5b5efdee7f7e7e7ce
bdb57b63635a42395a42396b52526b5252634a525252524a5a5a426b6b5294946bbdb58ce7de8cefe773ded69ce7deefffffffffffffffffffffffe7efef426b
6b529c9c52bdbd52dede4af7ef4affff4affff4affff4aefef52dede94e7e7efffffeffffff7fffff7fff7ffffff948c84947b73bd948cd6ad9ce7b5a5efbdad
e7bda5debda5cebd9ccebda5efdecefff7e7efded6ceb5a5a57b73a5736bad7373b5847bc68c8cefd6d6fff7f7fffffffffffffffffffff7f7a5847b9c635abd
847bc69484cea594deb59cefceb5dec6ade7ceb5dec6a5dec6adcead94c69c94bd948cefded6fffff7ffffffffffffe7d6d6bd9494d6b5b5efd6d6fffff7ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7ffffd6ffffb5ffffa5ffff94efef73cec6428c8c396b6b5273737b848c847b84
7b6b737363637363636b5a63736b6b6b63636b6b6b6b63637373736b6b6b7373736b6b6b7373737373739c9c9c7b7b7b737b7b7373737b7b7b7b7373847b7b84
737b847b7b7b7b737b847b7b7b7b7b847b7b7b7b8c847b847b7384736b7b6b63c6bdbdffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff9473737352528463638c6b6b9484847b7b7b8484847b7373736b6b9c8c94fffffffffffffffffffffffffffffffff7f79c7b846b424a7b63637b6b6b
7b73737373737373736b736b6b737363736b6b7373636b6b6b7373736b6b9c8c8ca59494e7ceceffefefdec6c68c7373634a425a42396b5252634a4a6b525a6b
5a635a5a634a5a5a52737b639c9c73c6c673d6ce84d6cee7fffffffffffffffffffffff7f7ff849c9c52848463b5b55ad6d65aefef52ffff52ffff4affff52f7
ff5ae7e794efefdefffff7fffff7ffffffffffffffff9c9c948c847bada594bdad9cd6bdadd6bdade7c6b5e7bdade7bdaddeb5a5d6b5a5efd6c6fff7e7ffefde
dec6b5ad847ba5736ba56b6bb57b7bdeb5b5fff7fffffffffffffff7fff7ffffffbd9c9c9c635aad6b6bce948cd6a594deb59ce7c6ade7c6ade7ceb5e7ceb5de
ceb5ceb5a5c6a594bd948cceb5a5ffffffffffffffffffe7cecec69c9cdebdbdf7dedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7ffffdeffffbdffffa5ffff8cfff78cffff84f7f784e7de6bb5b5639c9c5a7b7b636b735a5a63635a636b5a63736b6b6b63636b636b6b6363736b6b
6b6b6b736b6b736b737373736b6b6b7b7b7b9494947b847b6b7373737b7b737373847b7b7b737b847b7b847b7b847b7b7b7b7b7b847b7b847b84847b847b7b8c
7b7b84736b7b6b63b5adadffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffbda59c6b4a427b5a5a8c6b6b8c7b7b84847b8484
847b7b7b736b6ba59494fff7fffffffffffffffffffffffffff7efef946b7373424a7b5a637b6b6b7b6b737b73736b6b6b6b737363736b6373736b73735a6b63
636b6b847b7b8c8484736363948484decec6ffefefe7d6ce8c736b5a39395a39396b4a4a6b4a526b525a63525a5a5a5a4a5a5a426363427b7b5aa59c73b5adce
e7e7ffffffffffffffffffffffffd6d6de526b7363949c63c6c65ae7e752ffff4affff52ffff5af7ff6beff784d6d6c6efefefffffffffffffffffffffff9494
9484948c94ad9c9cbdadadc6b5b5c6b5c6bdaddebdadefb5adf7bdade7ada5deb5a5efc6bdffefdeffefe7e7cec6b58484a56b63ad6b6bc68c8ce7ced6ffffff
ffffffefffffefffffefd6d6a56b63a56363c68c84dea594dea594efc6addebda5deceadd6bda5ded6b5d6c6adceb59ca58c7bc6ad9cfffff7ffffffffffffde
cecebd9494e7c6c6f7dedefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffd6ffffbdffff94ffff84ffff73ffff73ff
ff84ffff9cffff8cdede6ba5a54a737b526b6b5a6363636b636363636b6b6b6b6b6b736b6b736b6b7b7373736b6b7b7373737373737b7b7b8484949c9c737b7b
737b7b737b7b7b7b7b847b7b847b84847b7b8c848484847b84848484847b848c848484848c8c848c847b8c7b7b7b6b6bb5a5a5ffefefffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7dede6339398463638c73739484848484848c8c847b7b7b847b7ba59c9cfff7f7ffffffffffffffffffffff
ffffefef9c737b73424a8463637b6b6b8473737b73737b7373737373737b736b736b737b7b6b736b6b6b6b736b6b9494947b73737b6b6b8c7b73d6c6c6fff7ef
e7cece9473736b42426b424a6b4a4a634a526b5a5a5a5a5a526363425a5a426363426363527373849494f7fffffffffffffffffff7fff7f7f7847b846b848c6b
b5b563dede52f7ef52ffff52ffff63ffff73eff784dedeade7deefffffffffffffffffffffff9ca59c73948c84bdad84cebd94dece9cd6c6b5cebdcebdb5efbd
bdf7bdb5ffbdb5efb5a5deb5a5e7c6b5ffefe7fff7eff7d6cec6948ca56b6b945a63d6b5b5fff7f7ffffffefffffeffffffffff7c69494945a52bd7b73d69c8c
dead94efbda5e7c6a5e7c6add6c6a5deceade7d6b5ceb5a5b59484c6ad9cffffefffffffffffffd6c6c6c69c9cefc6c6ffefeffffff7ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffefffffceffffadffff94ffff7bffff6bffff6bffff7bffff7bffff94ffff8ce7e773c6c65294944a7b7b426b
634a6b63526b636373736b6b6b736b73736b6b7b73737b73737b73737b73738c8c8c8c8c8c737b7b6b7b7b737b7b7b7b7b847b7b847b7b8c8484847b7b848484
84847b848c847b8484848c848484848c8484847b7b84736b947b7bded6d6fffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffff7f76b
4a4a7b52529473739484848c8484848484848484847b7ba59494e7d6d6ffffffffffffffffffffffffffffff9c7b8473424a7b525a846b6b847373847b7b7b73
737b7b737373737373736b73736b73736b6b6b73737394948c847b7b6b63636b6363847b73d6cecefff7f7e7c6ce9c6b6b73424a63424a635252525252525a5a
4a5a5a526363525a5a52525a4a4a52525a5ad6dedefffffffffffffffffffff7f7cebdbd5a6b6b6ba5a55ac6c652efe74af7f752ffff5af7ff73f7ff84e7e79c
e7e7cef7eff7ffffffffffffffffadb5b56b848463a59c73cebd7be7ce8cefde9cdeceadcec6c6bdbdd6bdb5debdadefc6b5d6b5a5d6b5a5e7c6bdffefe7fff7
eff7d6d6bd8c8c845a5aa58484efe7defffffff7ffffefffffffffffefcec694635a9c635ac68c7bdea58ce7b59ce7bd9ce7c6add6bd9cdec6add6c6add6bda5
c69c8ccead9cefded6fffffffffff7dec6c6c69c9cf7ced6ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffce
ffffadffff8cffff84ffff73ffff6bffff6bffff7bffff7bffff7bfff77bf7f784e7e763bdb5529c94397b7342736b526b6b6373736b6b6b7b73737b7373847b
7b7b7373847b7b9494948c9494737b7b738484737b7b7b8484847b7b8c84848c84848c8484848484848c84848c848c8c8c848c848c8c8c8c8c84948c848c7b73
846b6bbdb5b5ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff94736b7b52528c6b6b9c84848c848494948c8c8c848c84848c
8484c6bdbdffffffffffffffffffffffffffffffbd949c7b424a7b525a7b63638c737b84737b847b7b7b73737b7b7b737373737b73737373737b73737b7b9494
947373736b6b6b6b6b6b6b6b6b8c8484e7d6deffeff7debdc684525a634242634a525252524a5252525a5a525a5a635a636b525a6b5a5a524a529c9ca5ffffff
ffffffffffffffffffefdee773737b6b94946bbdbd5aded65af7f752ffff5affff63f7ff7bf7f78ce7deadefe7e7ffffffffffffffffded6de6b8484639c9463
bdb573e7d67bf7e78cf7ef94e7de9cded6adcec6c6c6adcebda5d6c6adcebdadd6bdade7c6bdffefe7fffff7f7e7dea58c8c735a52bdb5adffffffffffffffff
fffffff7fffff7a5847394635ab57b6bdea594e7ad94efbda5e7c6a5e7c6addec6a5dec6addebdaddeb59cc69c8cdec6bdfffffffff7f7dec6bddeb5b5ffdede
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffdeffffc6ffffadffff94ffff7bffff73ffff63ffff63ffff5affff63
ffff63ffff6bffff73fff78cf7ef73dece5ab5a54a8c844a7b7352736b6b737373737384737b8473738473737b73739c9c9c848c8c7b8484737b7b7b84847b7b
7b8c84848c84849484848c84848c8c8c8484848c8c8c848c8c8c948c8c8c84948c8c948c849c8c84846b6bb5a5a5fff7f7fffffffffffffffffff7ffffffffff
fffffffffffffffffffffffffffff7ceadad6b4a428c6b6b8c737b948c8c8c948c8c8c8c848484847b7bad9c9cffffffffffffffffffffffffffffffdeb5bd94
5a63734a527b6363846b6b8c7b7b847373847b7b7b73737b73737b73737b7b7b7373737373738c8c8c7b7b7b6b6b6b6b6b6b6b636b73636b9c8c8cf7e7efffef
f7b59c9c634a4a634a4a5a4a4a635a5a635a5a635a5a63525a635a5a63525a634a526b5a63efeff7f7fffff7fffff7fffff7f7f7a59c9c6b7b7b6ba5a56bd6ce
5ae7e752fff74affff5affff63fff77befe78cdedecef7f7f7fffffffffff7f7ff949ca563848c63adad6bd6ce73f7e76bffef6bfff76bf7ef84f7dea5d6bdb5
ceadb5c6adc6c6adbdb59cceb5a5decebdffefe7fffff7efe7de94847b9c8c8ce7dedefff7f7fff7f7fffff7fffff7d6c6b58c6b5aa57363ce9484dead94e7b5
9ce7bd9ce7c6a5e7c6a5debda5e7bdaddead9cce9c8cceb5a5ffffffe7ded6d6b5b5efc6c6ffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffefffffdeffffc6ffffadffff94ffff84ffff73ffff73ffff6bffff63ffff5affff5affff5affff63ffff73fff78cffff8cf7ef7bdece63
ad9c5a8c845a7b736b7b7b7b7b7b847b7b7b7373847b7b9c9c9c8c8c8c7b847b7b84847b8484848484848484948c8c8c8484948c8c8c8c8c8c8c8c8c8c8c8c94
948c948c94948c94948c9c94949c8c848c7b7ba58c8cefe7e7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ded66b4a42846363
947b7b948c8c9494948c8c8c8c8c8c8c8484a5949ce7dedeffffffffffffffffffffffffffdee79c6b73734a527b5a638473738473738c7b7b847b7b847b7b7b
7373847b7b7b73737b73737b7b7b9c9c9c7b7b7b6b73736b6b6b736b6b7363637b6b73bdadadfffffff7efef9c848c63424a6b52526b52526b5a5a6b5a5a6b63
63635a5a635a5a6b4a526b4a52bdbdbdfffffff7fffff7ffffffffffd6cece5a636373949473bdbd6bdede5aefef52ffff4affff5affff73fff77be7deadefef
e7ffffffffffffffffbdb5c6738c9463949c6bbdbd63ded65af7ef52fff74affff63ffef94ffdea5e7cea5debda5c6adb5bdadbdbdadc6bdadded6c6fffff7ff
fff7f7efe7decec6ffefeffffffffff7fffffffffffffffff7ef9c8473946b5ace9484dea58cefb59ce7bd9cefc6ade7c6a5e7c6ade7bda5e7ad9cdea594e7bd
b5fff7efdececec6adadffdedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdeffffc6ffff9cffff7bffff
73ffff73ffff63ffff7bffff6bf7f784ffff63ffef5affef63ffff6bffff6bfff77bffff84fff784efe773cec663a59c52847b637b7b737b7b8484847b7b73a5
9c9c8484848484848484848c8c848484848c8c8c8c8c8c8c8c8c8c8c848c8c8c848c8c8c94948c8c8c8c949494948c9c9494948c8c9c8c8c947b7b8c737bcebd
bdfff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7735a528c6363946b6ba58c8c8c84849494949494948c8c8c7b7b7bb5b5b5
fffffffffffffffffffffffffff7f7947b7b6b4a4a845a5a8463638c7b7b7b7b73848c846b6b6b848484847b7b847b7b847373847b7b9494947b7b7b63737373
7373736b6b73636b6b63637b7373cec6c6ffffffbdb5b57363635a4a4a6b525a6b5a5a6b5a5a635a5a635a5a635a5a6b63635242427b736bffffffffffffffff
ffffffffe7e7ef848c945a6b737ba5a584cece73efef5af7ef52ffff52ffff6bffff6befef84dedeb5eff7e7ffffe7f7ffdef7f76b8c8c6b949463a5a573cece
63ded65affef39f7ef52ffff6bfff784fff78cefe794ded694cebda5c6b5adb5a5bdbda5dedec6ffffefffffeffffff7fffffffffffffff7f7fffffff7fff7ff
ffffe7d6cea5736bc68c7be7a594dead94e7bda5debda5dec6addebda5e7bda5dead9ce7a594e7b5adffe7ded6c6b5d6c6bdf7e7defff7f7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7ffffbdffff9cffff73ffff6bffff5affff73ffff8cffff84f7ef8cfff77bf7ef63f7e7
63fff763fff76bffff6bffff7bffff84ffff8cfff784e7de7bc6bd6b9c946384846b7b7b7b7b7ba5a5a58c8c8c7b7b7b8c8c848c84848c8c848c8c848c8c8c8c
8c8c8c948c8c948c8c94948c948c8c94948c94949494949494949c94949c94949c8c8c8c7373bda5adf7efefffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffa59494845252a5736ba58484a594949494948c949484848c84848c9c949cefe7e7ffffffffffffffffffffffffc6bdb57b52527b4a4a
8c636384736b84847b7b8484737b73848484847b7b8473738c7b7b847b7b9c9c9c7b7b7b6b73736b73737b7373736b6b736b6b736b6bada5a5efefefefe7e78c
7b845a5252635a5a6b6363635a5a635a5a635a5a6363635a5a52635a526b5a52f7ded6ffffffffffffffffffffffffb5bdc639424252636b84adb58cdede73ef
ef63ffff52ffff5affff73ffff73e7e794e7efc6ffffdeffffdeffffb5ced66b8c8c6b94946badad7be7de5aefde5affff39f7ef52ffff63ffff73ffff7bf7ef
94efe794decea5ceb5a5bda5bdbdade7e7d6fffff7fffff7fffffffffffffffffffffffffffffffffff7fff7efc69c94bd8c84dea594efbda5e7bda5e7c6adde
c6a5e7c6addebda5e7b5a5dead9ce7bdadefcebddec6bde7d6cefff7effffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffe7ffffbdffff94ffff73ffff63ffff63ffff63f7ef84f7ef8ce7de8ce7de73cece73ded663ded66befef73f7ff7bffff73ffff7bffff8cffff9cffff
9cf7ef94ded67badad7394946b7b7b94a59c848c8c848c8c8484848c8c8c8c8c84948c8c8c8c8c94948c8c948c9494948c948c9494948c9494949c9c94949494
9c9c949494a59c9c9c848c9c84849c8484ded6d6ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7cece6b42429463639c7b73a594
8c9c94948c8c8c8c8c94949494948c94c6b5bdfffffffffffffffffffffffff7f7ef846b6b734a4a845a5a7b6363847b7384847b7b7b7b8484847b7b7b847b7b
847373847b7b9c94947b84846b73736b73736b6b6b736b6b6363636b63637b7373c6bdbdf7f7f79c949c5a52526b5a63635a636b6363635a5a635a635a5a5a4a
524a63635a5a524a9c8484fffffffff7f7ffffffffffffe7e7e7736b7339313942525a6b949c7bd6d67bf7f76bfff76bffff5af7f76bf7ef73e7e7a5f7f7d6ff
ffeffffff7f7ffadadb5637b846b9c9c5abdbd52ded64af7e742fff742ffff4affff5affff73ffff84fff794f7e794e7ce94d6bd8cb5a5b5cebde7f7efffffff
ffffffffffffefe7e7efdedefff7f7fff7f7fffff7ffded6bd9c8ccead9cd6b59cdebda5debda5e7c6a5e7bda5e7c6addebda5deb5a5deb5a5dec6b5dec6b5ef
e7defffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffbdffffa5ffff73ffff63fff76bfff773f7
e77bded68cd6ce73b5b573adad7bc6c673cece73dee784f7ff84ffff7bffff73fff77bffff84ffff94ffffa5ffffa5f7ef9cd6d68cb5ad8cada57b94947b8c8c
8c94948c8c8c949494948c8c9c94949494949c9c9c9494949c9c9c949c949ca59c949c9c9ca5a5949c9c9ca5a59c9c9ca594949c8c8c8c7b7bc6b5b5ffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7f77b4a4a8c5a5a9c7b7ba58c8c948c84a5a5a594949c9c9c9c948c94ad9ca5ded6deffff
ffffffffffffffffffffb59c9c7352527b5a5a7b635a8c7b7b847b738c8484847b7b84847b7b7b7b847b84847b7b9c9c9c7b84847373736b7373737373737373
7373736b6b6b736b6b9c9494efe7e7a59c9c6b63636b63636b636b6363636b6363635a5a636363636b635a635a635a5a735a5affffffffffffffffffffffffff
ffffcebdc6422931393139424a524a7b846bbdbd8cf7f77bffff73ffff6bffff73f7f77be7debdeff7efffffffffffefe7ef8c949c638c8c52b5ad52cec639d6
c652ffff4affff42ffff52ffff5affff73ffff7bfff78cffef8cefde94dece84c6b5b5ded6e7fff7ffffffffffffd6cece947373b58484cea59cffd6cef7dece
ceb5a5d6bda5debda5dec6a5e7c6ade7bda5efc6ade7c6a5dec6add6bda5dec6addec6b5e7cec6f7e7deffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffefffffbdfff79cfff784fff76bffef63efd673e7d67bc6bd6b9c9c73949494b5bda5c6d673b5bd84cede84e7
f78cffff7bffff7bffff73ffff73ffff7bffff8cffff9cfff7b5ffffadefefaddede7bada56b84847b8c84848c8c8484848c8c8c9494949c9c9c9c94949c9494
9c94949c9c9c949494949c9c949c9c94a59c8c9c9c9c9c9ca59494ad94948c7b7ba59494e7dedeffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7c69494734242a5847b947b7b948484a59c9c9c949c8c8c8c948c9494848cb5adadf7eff7ffffffffffffffffffefded6846363634a427b5a5a846b
6b8c73738c7b7b8c7b7b7b7b7b7b7b7b7b7b7b7b84849494947b84847373737b737b737373737373737373736b6b6b63637b737bada5a5948c8c635a5a6b6363
6b63636b6363635a5a635a5a5a5a5a636b6b4a4a4a635a5a524a4ac6bdbdffffffffffffffffffffffffe7dee78c636b4221294a393931393942636352949484
dee78cffff84ffff73f7f773e7de94dedeceefeff7f7ffffffffc6c6ce63848463adad4ab5ad42c6bd52e7de42f7f742ffff42fff74afff752fff763ffff6bff
f77bfff784f7ef8ce7de8ccec6bde7e7e7f7f7ffffffffefefc694949452529c5a5ab5847bcea594c6a594d6bda5d6bda5e7c6a5debda5e7c6a5debd9cdec6a5
d6bda5d6c6a5d6bda5dec6b5decebdf7efdefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffb5
e7dea5f7de8cffde84ffe773e7ce5abda55a8c84849494b5bdc6e7eff7adbdce84a5b58cd6e794efff8cf7ff84ffff7bffff7bffff73ffff7bffff84ffff8cff
ff9cffffbdffffbdffffade7de94c6bd84a5a5849494849494849494949c9c9c9c9ca59ca59c9c9ca5a5a5a5a5a5a5a5a59ca5a5a5adad9ca5a59cada5a5a5a5
b5a5a5ad9c9ca594948c8484d6cecefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7dede734a42946b6ba58484a5948cad9c9ca5
9c9ca59ca5a5949c9c9494948c94d6d6d6ffffffffffffffffffffffffa5948c7352527352528c63639473739c7b8494847b8c84847b847b7b8c84738484949c
9c7b8484847b7b7b7b7b7373736b6b6b737373736b6b7b73736b636b736b6b736b6b736b6b6b6b6b736b6b6b6b6b6b6b6b636363636363525a5a525a5a5a5a5a
635a5a6b6363ffffffffffffffffffffffffffffffd6bdc663313942212163424a4a424242525a5a949c73c6ce73dede94ffff8cfff794efefa5deded6f7ffef
fffff7ffffa5bdc65a8c945294946bc6c64ac6c652e7e74af7ef5affff52ffff52ffff52ffff63ffff63ffff7bffff8cfff78cdede9cd6d6def7fff7ffffffff
ffffffffce9c94945252ad736bbd8c7bd6ad9cd6ad94e7bda5dec6a5e7c6addec6a5dec6a5d6bd9cdec6a5dec6a5dec6addebdade7cebdefe7deffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffadd6bd8ccead84d6b57bd6b584d6b5528c737b948ccececeff
fffff7eff79ca5ad84adb594deef94efff94ffff7bffff73ffff73ffff73ffff73ffff8cffff8cffff9cffffa5ffffadffffb5ffffc6ffffa5ded69ccec694b5
b58cadad8ca5a59ca5a5a5a5adadadadadadadb5adadb5adadb5b5b5adadadadb5b5adb5adb5b5b5b5adadb5adadad9ca59c8c8cada5a5efefefffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7f79c6b6b845a5a9c8484b59c9cad9c9cbdadadb5adadb5adada59ca59c9c9cada5ade7e7e7f7f7f7ff
ffffffffffefdede8c73737b52528c6363a57373a57b84a58c8c948c8c8c94947b8c8c7b948c9ca5a58c8c8c8c8484948c8c848c8c848c8c8484848c848c8c84
848c84847b7373847b7b847b7b847b7b7b73737b7b7b737373737b7b6b737373737b73737b7b737b736b73736b6be7e7e7ffffffffffffffffffffeff7ffeff7
c6949c6329316331316b4a526b5a635a6b734a73735a949c84d6ce8cefe78cf7ef8cefe794e7e7bdf7f7e7fffff7ffff849c9c73949c6ba5a56bbdbd5ac6c663
e7de63f7ef63ffff5affff5affff52ffff5affff63ffff7bf7ff8cefef9cdedec6efefe7f7f7f7f7ffffffffefc6bd9c6b63a5635ace847befa59cf7b5a5f7c6
adefceaddec6a5deceadd6cea5e7ceade7c6a5efceadefc6ade7c6bddecebdf7efdeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffb5c6ad94b59473a5846ba5845a8c6b7b9c8ce7e7deffffffffffffefe7ef7b94948cbdc68cdee794ffff8cffff84ffff7b
ffff7bffff7bffff84ffff84ffff94ffff9cffffadffffa5ffffadffffadffffc6ffffb5f7f7addede94c6c694b5bd9cadb5adb5bdadb5b5b5b5b5b5adb5bdb5
b5b5b5b5bdb5bdb5b5b5bdbdbdb5b5b5bdb5b5bdb5b5b5adada59c9ca59494d6cecefffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7
deb5b57b52529c7b7bad9494bda5adbdadadbdadadb5adadb5adb5ada5a5a5a5a5bdc6c6eff7f7ffffffffffffffffffb59c9c7b52529c6b6ba56b73b58c8ca5
8c8ca59c9c949c9c8c9c9c849c94adb5b5949c9c9c94949c94949494948c948c8c8c8c948c8c948c8c948c8c9c9494948484948c8c8c84848c8c8c8c8484848c
8c8484847b84848484847b737b7b737b736b73847b84a59c9cfffffffffffffff7ffffffffffffffe7d6d6945a6373394273424a73525a7b6b7b73737b637373
527b845aa59c8cefe784f7e784efe78ce7deceffffe7ffffefffff94a5ad7b949c73a5a573bdbd6bcece73e7e76befef63ffff5affff5affff5affff63ffff73
ffff8cffff94e7ef9cd6d6d6efeffffffffffff7ffffffc6a59cb57b6bbd736bf7a59cffb5adffc6b5f7ceb5efd6b5e7d6b5e7deb5efd6b5f7d6b5ffd6b5ffd6
bdefd6c6efd6cef7efdeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7cec6ad949473849473
5a6b4a6b735adedeceffffffffffffffffffd6dede7b9c947bc6bd84efef7bf7f784ffff7bffff7bffff7bffff84ffff84ffff94ffff94ffffa5ffff9cffffa5
ffff9cffff9cffffa5ffffb5ffffb5ffffadefef94c6c68cb5b58ca5a59cadada5a5ada5a5ada59ca5ada5a5ada5a5b5adadada5adb5adadb5adadb5adada59c
9ca59c9c9c9494bdb5b5efefefffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7e77b5a5a8463639c7b7ba58c8cb59c9cad9c9cad9c9c
9c9c9c9c9c9c949494949c9cb5bdbdeff7f7fffffffffffffffff79473737b4a4a845252a5737b8c6b6b8c7b7b7b848473847b7b8c8c94a59c8c8c8c7b73737b
73737373737b847b6b6b6b7373737b73737b73737b6b6b736b6b73636b736b6b6b63636363635a5a5a6b6b6b636363635a6373636b635a63524a525a5a5a6363
63fff7fffffffffffffffffffffffffffff7f7ceb5b56331315a292963394273525a634a52524a52424a4a31525a3173734aada57be7de84e7de94dedecef7ff
e7ffffdeeff7a5b5b5738c946b9ca573b5bd73c6ce6bdede5ae7e75af7ff52f7ff52ffff52ffff63ffff73ffff84f7f784d6d6a5e7e7d6f7f7effffffffff7ff
f7e78c6b5aad6b63d6847befa59cefa59ce7b5a5debda5dec6a5d6c6a5dec6a5e7c6a5efc6a5e7bda5debdaddec6bdf7efe7fffff7ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6c6adb5a584736342847b63cec6adfffffffffffffffffffff7f7adbdb5739c8c
8cdece7bf7e77bffff7bffff84ffff84ffff8cffff8cffff9cffff9cffffa5ffffa5ffffa5ffff9cffff9cffff94ffff9cffff9cffffa5ffffadffffbdffffad
e7e7a5c6ce94adb594a5ad9ca5adadadb5adadadb5adadb5a5adb5adadb5adadbdb5b5b5adadbdb5b5b5adad9c9494a59494efe7e7ffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7f7b594947b5a5a947373ad8c8cb59494b5a5a5ad9c9cada5a5a59c9c9c9c9c8c9494a5a5adcececef7f7f7ffffff
ffffffefd6d67b52528c525a845a5a947373947b84847b7b8484847b8484a5a5a58c848c8c7b84847b7b7b7b7b737b7b7b7b7b7b7b7b736b6b736b6b7b6b6b73
5a6373636b6b5a63736b6b6b6b6b6b6b6b6363636b636b6b5a6373636b5a525a635a635a5a5a635a5ad6cecefffffffffffffffffffffffffffffff7efe7b58c
8c6b39396331396b4a527b525a63424a63525a4a4a52314a5229635a317b736bbdbd9cefe794d6d6bde7e7efffffeff7f794a5ad7b9c9c639c9c63adb563c6ce
63dee752e7ef4af7ff4af7ff52ffff5affff6bffff73f7f77befe78ce7e7b5fff7defff7fffffffffff7bdada5a57b73ad847bce948ce7b5ade7bdade7bdadde
bdaddec6addebda5e7c6ade7c6a5e7c6addebdade7cec6f7efe7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ff
fffffffffff7efd6bda5bd947b735a39bda58cffffeffffffffff7fffffffff7f7ef738c7b73a58c8ce7c684ffe77bfff78cffff84fff784ffff8cffff94ffff
9cffffa5ffffa5ffffa5ffff9cffff9cffff94ffff94ffff94ffff9cffff9cffffadffffb5ffffbdffffb5efefb5dee7a5c6c6a5b5bd9ca5adadadadb5adb5bd
b5b5b5adadbdb5b5b5adadb5adadb5b5b5bdb5b59c94949c9494c6b5b5f7f7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffefd6d67352
529473739c7b7bb59c94b59c9cb5a5a5a59c9ca5a5a59c9c9c9494948c8c94a5a5a5cececefffff7fff7f7ffffffbd9c9c7b52527b52528463638c73738c7b7b
847b7b8c8484a59c9c8c8c8c847b7b8484847b7b7b7b7b7b736b737b737373636b7b6b6b7363637b6363735a636b63636b5a63736b6b6b6b6b5a63636363637b
636b6b525a63525a635a5a635a5a524a4a9c8c94ffffffffffffffffffffffffffffffffffffe7d6d6946b6b5a31317352526b52525239395a4242634a525242
4a4a4a52395252396b6b4a8c8473b5b59cded6cefff7efffffe7f7f79cb5b57badad63a5a563bdbd52c6c64ad6d642dede4aeff74af7f752ffff5affff63ffff
63efef6befe77be7deceffffeffff7ffffffdee7de94948c84847bada59cc6b5adcebdadceb5addebdaddebdaddec6addec6a5dec6addec6addec6b5decebdf7
efe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efd6ad94b58c6b9c7b63ffe7d6fffff7ffff
ffffeff7ffffffeff7ef63735a739c738cdeb58cf7de94fff794fff794ffff8cfff794ffff94ffffa5ffffa5ffffadffffa5ffffa5ffff9cffff9cffff94ffff
9cffff9cffffa5ffffa5ffffadffffadffffbdffffc6ffffc6f7f7b5dedeadc6c6a5b5b5adb5b5b5b5b5bdb5bdb5b5b5bdb5b5bdb5b5b5b5b5b5adadbdb5b5b5
a5a5a59c9ce7d6d6fffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefad8c8c7b5a529c7373b5948cbda59cb5a59cada5a5a5a5a5adad
ad9c9c9c9c949c9c949cada5a5e7dedefffff7fffffffff7f7947b7b7b5a5a7b5a5a8c6b738c7373947b84948484ada5a58c8484847b847b7b7b7b84847b7b7b
7b7b7b736b6b847373735a636b5a5a6b525a735a637363637363636b63636b6b6b5a636373737373636b735a5a635a636363635a525a5a5252736363ffeff7ff
fffffffffff7fffffffffffffff7ffffffdec6c68c63636b4a4a634a4a5239395a42426b424a7b525a6b4a525a4a5239424a295a5a3973735a9c948cbdbdd6ef
efefffffdef7f7a5ced67bb5b55aa5a552b5b54ac6bd4ad6d64adede4aefef52f7f75affff5af7f763f7f75ae7de63d6cec6f7f7effffff7ffffefffff7ba59c
84a59c9cbdb5adc6bdadbdb5bdc6b5c6bdb5d6c6b5d6c6b5dec6b5d6c6addec6b5dec6b5e7d6c6f7efe7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7f7f7fffff7ffefe7cead9494735ad6bda5ffffeffffffffffffffff7fffffffff7efe763634a7b946b7bb5848cdebd8cef
ce9cffe79cfff79cffff94ffff94ffff94ffff9cffff9cffffa5ffffa5ffffa5ffff9cffff9cffff94ffffa5ffffa5ffffa5ffffa5ffffadffffadffffb5ffff
bdffffc6ffffbdefefb5d6d6a5bdbda5b5b5adb5b5b5b5b5b5b5b5bdbdbdb5b5adb5b5b5c6bdbdc6b5b59c8c8cb5adadf7efeffffffffff7f7fffffffff7f7ff
fffffffffffffffffffffffff7f7e7cece7b52528c6363ad8484b59494b5a59cada59cada5a5a5a5a5a5a5a5a59ca5a59ca5948c8cb5adade7dedeffffffffff
ffe7d6d68463637b5a5a7b5a5a8c636b9473739c8484ad9c9c8c848c7b7b7b7b84847b7b7b7b7b7b7b737b7b7373736363947b7b94737b735a5a63424a735a63
6b5a636b63636b63636363636b6b6b7363636b5a5a6b63635a5a5a5a5252635252634a52d6bdc6fffffffffffff7fffff7fffffff7f7e7dedef7e7e7ceb5b58c
6b635239395a42396342426339426b394a6b424a63394a524252394a4a3152522952524a737384a59cbdd6d6d6efefcef7f7a5d6d67bbdb55aa5a55ab5b552bd
bd52cec652d6ce5ae7de5ae7e763efef63efef5aefe75acecebdefefeff7f7efffffdeffff6ba59c6bb5ad8cded684d6ce94ded69cd6c6adcebdadc6b5bdc6b5
cebdadd6c6b5dec6b5e7cebde7cec6f7efe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefe7c6
a5949c846befe7ceffffffffffffffffffffffffffffffefdece7b73528c9c6394b57b84bd9494d6b59cefcea5ffe79cfff79cffff94ffff94ffff94ffff9cff
ff9cffffa5ffffa5ffffa5ffffa5ffffadffffadffffadffffa5ffffadffffa5ffffa5ffffa5ffffb5ffffbdffffc6ffffc6f7f7c6efe7b5d6ceadc6c6adb5b5
bdbdbdbdbdbdc6c6bdbdb5b5c6bdbdc6b5bdb5adad9c8c94e7dedefff7f7fffffffffffffffffffffffffffffffffffffffffffffffff7efefad8c8c845a5a9c
7b73ad8c8cb5a59cb5ada5ada5a5a5a5a5a5a5a5ada5adad9ca5a59c9c9c8c8cb5b5addeded6ffffffffffffd6c6c67b5a5a845a5a8c5a639c6b739c737bb59c
9c8c84847b84847b84848484847373737b73738473737b636bbda5adf7dedea58c8c6b4a526b4a52736363635a5a736b6b6363636b6b6b6b5a6373636363635a
5a5a5a524a4a6b525263424aad8c94fffffffffffff7fffff7fffff7efefb59c9cb58c94ffe7e7d6bdbd84635a5231316339425a39396b424a63424a6b4a5a52
424a4a424a424a52425252314a4a42635a637b7b94adadc6e7e7deffffbdefe794c6c66bada563adad5ab5ad63c6bd63cec663d6d663d6d66be7e763e7e76bd6
d69cceceeff7fff7ffffe7ffff63a5a563c6bd73e7de73f7e77bffef84f7e784e7ce9cd6c6adc6b5cec6b5debdb5e7c6bde7cebdefd6cef7efe7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7d6cebda58cad9c8cf7f7e7f7fff7f7fffff7ffffffffffffffffe7
cebd84734aa59c639cad739cbd8c94bd9494cead8cdeb58cf7d694ffe794ffff8cffff94ffff94ffff9cffff9cffffa5ffffa5ffffadffffadffffb5ffffadff
ffadffffa5ffffa5ffffa5ffffadffffa5ffffb5ffffb5ffffc6ffffceffffc6f7f7bddedebdd6d6b5c6bdb5bdbdbdbdbdc6bdbdc6bdbdcec6c6bdadb5a5949c
b5a5a5f7efeffffffffffffffffffffffffffffffffffffff7fffffffffffffff7e7cece845a5a8c6b63a5847bb59c94ada59cadadada5a5a5ada5adad9ca5ad
9ca5ad9ca5a5949494948ca5ada5d6ded6ffffffffffffc6adad8c5a63945a638c5a6394636ba58c8c8c7b847373737b7b7b7b7b7b847b7b7b6b738473737b6b
6bb5949cefdee7decece84636363424a6352526352526b63636b63636363636b63636b5a5a5a5a52525252524a425a42426b424a73525affffffffffffffffff
f7fffffff7f7a5848c734242bd9c9cf7deded6b5ad845a5a5a31315a394252394252424a52424a5a42525a424a5a424a524242524a52394a4a314a424a5a5a84
9494b5cec6d6efefcee7e7b5d6ce8cbdb57badad6bada56bbdb563bdb563c6c663c6c663ced66bc6ce8cb5bddee7efefffffdeffff73bdbd5ac6bd63e7de5af7
e75afff75affe773f7e784e7d6addecebdc6bdd6bdb5e7bdb5efcec6e7d6c6ffefe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffefefefcec6b5948cdec6b5ffffeffffffff7ffffffffffffffffffffffceb59c8c73529c945aadb57ba5bd8c9cc69494c6948cce9c8c
d6ad94efce9cf7dea5ffefa5fff7adffffa5ffffa5ffffa5ffffadffffa5ffffadffffadffffb5ffffb5ffffadffffa5ffffadffffadffffb5ffffb5ffffbdff
ffc6ffffceffffceffffd6ffffcef7f7c6dedeb5ceceb5c6c6b5bdbdc6cececececec6bdbdb5a5a5a59494d6c6cefffffffff7f7ffffffffffffffffffffffff
fffffffffffffffffff7e7e7b594947b5a52a58484ad8c8cc6a5a5bdada5b5ada5a5a5a5a5adad9ca5a5a5a5a5a59c9ca5a5a5949494adadadded6d6fff7f7ff
ffffc6a5a5946b73845a5a8c5a63ad8c8c8c73738473737b6b6b8c73738c737b94737b8c6b6b8c6b73845a63ceb5b5ffe7efb59c9c6b4a4a634a4a634a527363
637363637363637363636b63635a52526b63634a39395a4a4a5a394263424af7efefffffffffffffffffffffffffd6bdc6734a526b4242bda59cffe7e7ceb5b5
84636b52393952424242313152394252394263424a6b39426342425a39425a4a4a524a4a4a42424a4a4a6b6b6b949c94d6ded6e7f7efd6efe7adcec694bdb57b
adad73b5ad63adad63b5b563b5b573bdc67badadc6dee7d6f7ffd6ffff73bdbd6bcece52d6d652efe74af7e75affef63f7e784f7e794e7deadded6bdc6bdcec6
c6dec6c6efd6ceffefe7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefe7e7c6bdbd9c94efded6fffff7
fffffffffffffffffffffffffff7efad948484734a9c9463a5b573a5c6849cc684a5ce8c94c68c94ce9494ce9c9cdeb5adefc6b5ffe7b5ffe7adfff7adfff7ad
ffffa5ffffa5ffffa5ffffadffffadffffadffffadffffadffffadffffb5ffffb5ffffbdffffbdffffc6ffffc6ffffceffffc6ffffceffffc6ffffc6f7f7b5d6
d6b5cecebdcececececec6bdbdc6b5bdad949cad9c9ce7dedefffffffffff7ffffffffffffffffffffffffffffffffffffffffffdecece8c6b638c6363b58484
c69494c6a5a5b5a5a5a5a5a594a5a594ada5949c9ca5a5a5a59c9ca59c9c948c8ca59c9ccec6c6f7efeffff7f7c6adad8c6b6b8463639473738c636384636394
6b6b8c63638c63638c63638c6363845a5a7b5252b59494ffefefefd6d68c6b6b5a39396b4a4a7352527b6363735a5a7b636363525a847373b5adad7b6b6b6352
524a39396b525af7e7effffffffffffffffffffffffff7e7ef9c8484523139846363b59c9cf7e7e7d6c6c68c73736342424a31315231315a31395a2931633131
6331316b39396331396339395a39395242425242395a4a4a7b7b73bdbdb5ceded6e7f7efcee7e7a5cece84b5b573a5a5639c9c63a5a5639ca56b9ca58cb5bdc6
f7f7ade7ef63adb55ab5bd5ac6c652d6ce52ded652ded65ae7de63ded67bded68cd6d69cd6d6adbdbdbdb5b5d6bdbdf7dedef7e7e7fff7f7fff7f7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7ffefe7efcec6bd9c94f7e7defffff7fffffff7fffffffffffffffffffff794846b847b529c9463
a5b57ba5c67ba5ce8ca5ce8ca5ce94a5c68ca5ce949cce9ca5deada5e7bdadf7d6adffe7b5fff7b5ffffb5ffffa5ffffadffffadffffb5ffffb5ffffb5ffffb5
ffffbdffffbdffffbdffffbdffffc6ffffc6ffffceffffc6ffffceffffc6ffffceffffceffffc6f7f7c6e7e7cee7e7ced6d6cec6cec6bdbdb5a5a5b5a5a5c6b5
b5f7f7effffffffffff7fffffffffffffffffffffffffffffffffffffff7f7bd9c9c845a5aa57373bd8c8cbd9494c6adadadada59cada594a5a59ca5a5a59ca5
ada5a5a59c9c9c9c9c9c9494ada5a5bdadadefe7e7f7e7e7decec69c847b8c6b6b7b5252845a5a845a528c5a5a845a5a845a5a7b52527b52526342428c6b6bde
d6ceffffffc6ada57352525a39397352527b5a5a7b5a5a735a637363639c848cfff7f7deced6bdadad9c8c8cbdb5b5fffffffffffffffffffffffffffffffff7
ffa594945a4a4a6b4a4a735a52ad948cf7e7e7e7cecead8c8c7352525231315229295a31315a29316331316329316331315a29295231315239315a42395a4a42
5a4a4a5a5a5a848c84adbdbdd6efefd6f7f7c6e7e7a5cece84bdbd6ba5a56b9c9c738c9484949cadc6ce8cadb56b9c9c5294945aadad52b5ad4ab5ad52bdb552
bdb563bdb56bb5b57bbdb584adad9ca5adad9ca5c6adb5d6bdbde7ced6f7dee7ffeff7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7
f7ffefe7e7c6c6c6a59cf7e7e7fffffffffffff7fffffffffffffffff7f7ef84735a84734a9c9c6ba5ad73a5c684a5c684adce8ca5ce8cadce94a5ce94a5ce9c
9cc69c9cd6ada5debdadefd6adf7debdfff7bdffffbdffffb5ffffb5ffffb5ffffb5ffffb5ffffb5ffffbdffffc6ffffbdffffc6ffffbdffffc6ffffc6ffffc6
ffffc6ffffceffffc6ffffd6ffffd6ffffd6ffffd6f7f7d6efefced6d6c6c6ceb5b5b5b5adada59c94ded6cefffffffffff7fffffffffffffff7ffffffffffff
fffffffffff7f7e7d6d69473738c6363ad847bbd9494b59c9cb5adada5a5a59cada5a5a5a5a5a5a59c9c9ca59c9c9c9c9c9c949c948c8c9c9494b5a5a5ded6d6
f7efefe7d6d6c6adad947373735252734a4a6b4242734a4a6b42426b4242634242523939634242cebdbdfffffff7efef8c6b6b5a39396342427352527b5a5a73
636373636373636bad9ca5cec6c6efe7efffeff7fff7f7fffffffffffffffffffff7ffffffffffffffc6b5bd6b52526b4a4a6342426b4a4a9c8484efded6f7e7
e7d6bdbd9c8484735a5a5231294a29294a21214a21214a21215a31315231295239315242395a42424239314a4a424a524a5a63638c9c9cbddedeceefefd6ffff
bde7e7addede9cc6cea5adb5948c9c9c949c737b847384846384846394944a8c844a8c8c4a8c84528c8c5a8c846b8c847384847b7b8484737b947b84a58c8cad
9c9cbda5ade7ced6efdee7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7efcececea5a5fff7effffffffffffff7ffffffff
ffffffffffffef7b63528c7b529c9c6badb57badc684adce8cadc684b5ce94b5d694b5d69cadce9cadd6a5a5d6a5add6b5a5d6b5ade7ceb5efdec6fff7c6fff7
c6ffffbdffffc6ffffbdffffbdffffbdffffc6ffffc6ffffc6ffffc6ffffceffffc6ffffceffffc6ffffceffffc6ffffceffffceffffd6ffffdeffffe7ffffde
ffffe7f7f7cededeced6d6adadada5a5a5adada5f7efeffffffffffffffffffffffffffffffffffffffffffffffff7fff7f7ceb5b5845a5a9c7373b58c8cb59c
9cb5a5a5b5adada5a5a5adadada5a5a5a5a5a59c9c9ca5a5a59c9c9ca59c9c9c94949c9c94a59c94cec6bdefe7deffffffdec6c6c6ada5ad8c8c8c6b6b7b5a5a
6b4a4a5a4242634a4a735a5aa58c8ce7ded6ffffffffffffcebdbd6b4a4a6342425a39397b63636b5a5a7b6b73635a5a7363637b7373ad9ca5c6bdbdefefefff
ffffffffffffffffffffffffffffffffffefe7e7a59494634a4a634a425a424263524a8c7b7bd6c6c6fff7f7fff7f7d6c6c6b59c9ca58c8ca58c8c9c7b7ba584
84ad8c8ca58c84422929523939523939524242524a4a52524a3942426373737b948c84a5a5adcececeefefd6ffffdeffffd6e7e7d6d6debdbdbdbdbdbd9c9c9c
9c9c9c7b84847b8c8c6b7b7b6b7b7b6373736b7373736b6b7b6b73846b6b8c73738c737ba58c94a59494ad9c9ccebdbdefdedeffefefffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffff7f7ffefe7efcec6ceada5f7efe7fffffffffffff7fffffffffffffffff7f7ef84735a847352a59c73adb57badc684a5c6
84adce8cadce8cb5d694b5ce94b5d69cb5ce9cb5d6a5adcea5adceadadd6b5bde7cebdefd6c6f7e7c6ffefc6fff7c6fff7c6ffffc6ffffc6ffffc6ffffceffff
c6ffffceffffc6ffffceffffc6ffffceffffc6ffffceffffc6ffffceffffceffffd6ffffd6ffffdeffffdeffffdef7f7d6efe7c6d6ceadb5b59c9c9cb5b5adff
ffffffffffffffffffffffffffffffffffffffffffffffffffffefdede9c847b7b5a5aa57b7bad8c8cbda5a5b5a5a5b5adadada5a5a5a5a5a5a5a5a5a5a59c9c
9c9ca5a59c9c9c9c9c9c94948c9c94949c9494ada5a5ded6d6fff7effff7eff7e7e7decec6d6c6c6c6b5b5bdb5adbdadadd6c6c6efe7e7ffffffffffffffffff
ffefefa58c8c5a39395a39396b52526b63636b6363635a5a6b63636b636b635a5a736b6b9c9494cec6c6efefefffffffffffffffffffffffffffffffb5adad6b
52525a4242634a4a5a42425a4a4a736b63bdb5b5f7efeffffffffffff7fff7f7ffefefffefefffefeffff7f7decece5239394231295239395242424a42424a4a
4a4a52525a6363526363425a5a6b84848cadadbddedeceefefd6f7f7deffffe7ffffe7f7f7e7e7e7dededed6ced6cecececec6c6c6bdbdc6bdbdc6b5b5ceb5bd
ceb5bdcebdc6cebdc6dececeded6d6dececebdadadc6b5b5dececef7efeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7efd6cece
a5a5fff7effffffffffffff7fffffffffffffffffffff79c846b8c7b5aa59c6bb5bd84adc684adce8cadce8cb5ce94b5ce8cbdd694b5ce94bdd69cb5d6a5bdd6
adb5d6adbdd6b5bddebdc6e7c6bde7c6c6f7debdf7e7cefff7cefff7d6ffffceffffd6ffffceffffd6ffffceffffceffffceffffceffffceffffceffffceffff
d6ffffceffffd6ffffceffffd6ffffd6ffffdeffffd6ffffe7ffffe7f7f7cededeadadad9c9494e7dedefffffffff7ffffffffffffffffffffffffffffffffff
fffffffff7cebdbd8c736b846363ad8c8cbd9c9cbda5a5bda5a5b5a5ada5a5a5adadada5a5a5a5a5a59c9c9c9ca59c9494949c9c9c8c8c8c94948c9c9494bdb5
adb5adadded6d6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7d6d67b6363634a4a6b52526b5a5a6b6b6b636363
6b6363636363635a5a5a52526b636b737373a59c9ccececefff7f7ffffffffffffffffffbdb5b56b5a5a63524a5242426352525a5252524a4a6b635aada59cd6
d6cefffffffffffffffffffffffffffffffffffff7efef8c73735239394a39395a4a4a4a4242524a4a5252526b73734a5a5a394a4a3952524a636b7394949cc6
c69cded6b5fff7b5fff7c6fff7e7ffffeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7dececec6b5bd
e7d6def7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffefefe7cec6c6a5a5f7efe7fffffffffffffffffffffffffffffffff7efad
94848c7352a59c73adbd84adc684a5c684b5ce8cadce8cb5d694b5ce94bdd69cb5d694bdd6a5bdd6a5bdd6adbdd6adc6debdcedebdc6e7c6b5dec6bde7cec6ef
ded6ffefceffefd6fff7d6fff7d6ffffd6ffffd6ffffceffffd6ffffceffffceffffceffffd6ffffceffffd6ffffceffffd6ffffc6ffffceffffceffffdeffff
d6ffffdeffffdef7f7d6dedeb5bdb5b5adb5efe7e7fffffffffffffffffffffffffffffff7f7f7fffffffffffffff7efad9c94735a5a947373b58c8cbd9494c6
a5a5b5a5a5adadada5a5a5a5a5a59c9c9ca5a5a59c9c9c949c9c949c9c8c94948c948c9c9494a5a59c9494949c9494b5ada5cec6c6f7f7efffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffb5a5a56b5252634a526b63636363636b63635a5a5a6b63636363636363635a5a5a5a5a5a5a525a7b7b7b
9c9c9cded6d6ffffffffffffc6bdbd7363635242425a524a524a425a525252524a4a4a4a52524a7b7373b5b5b5f7f7effffffffffffffffff7fffffffff7f7ce
bdbd4a3131524242524242524a4a4a4a4a636363636b6b4a5252394a4a394a4a3142423952524a6b6b5aa59c73dece8cefde94efdeb5f7efb5e7ded6fff7deff
ffe7ffffe7ffffefffffeffffff7fffff7ffffffffffffffffffffffffffffffffffded6d6d6c6c6e7dedefff7f7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffefeff7d6d6ceada5ffefeffffffffffffff7fffffffffffffffffffff7bda5948c7b5aa59c6bbdc694adce8cadd694adce8cadce94ad
ce8cb5d69cb5d69cbddea5b5d69cc6deadbddeadc6deadc6deb5d6efc6d6efc6c6e7c6bde7c6c6efd6c6efd6cef7e7cef7e7defff7deffffdeffffd6ffffdeff
ffd6ffffd6ffffd6ffffd6ffffd6ffffdeffffd6ffffd6ffffd6ffffceffffceffffd6ffffd6ffffdeffffdeffffe7ffffdef7f7dee7e7bdbdc6c6c6cef7f7ff
ffffffffffffffffffffffffffffffffffffffffffffffffe7dede947b7b7b6363a57b7bbd9494c69ca5bdadadadada5adada5a5a59ca5a5a59ca59c9ca5a594
9c949ca59c949c94949c94949494adadad9494948c8c8c8c8484948c8ca5a59cc6c6bde7dedefffffffffffffffffffffffffffffffffffffffffffffffff7ef
efa58c94635252635a5a6363636363636363636363636b6b6b6363636363635a5a5a5a5a5a5a5a5a5a63637b7b7bb5b5b5e7e7e7cec6c67b6b6b5a52525a5252
52525252524a5a5a5a4a4a4a5252524a4a4a5a635a8c8c8cc6c6c6efefefffffffffffffffffffe7d6d6735a5a52424a524a4a524242524a4a6b63636b6b6b42
4a4a4a5252424a4a314242314242315252215a52398c845ab5ad94e7de9cf7ef9cf7ef94efe79cf7f79cfff79cf7f7adfff7bdffffbdeff7deffffefffffffff
fffffffffffffffffffff7efefe7dedef7efeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7deded6b5b5f7dedeffffff
fffffff7fffffffffffffffffffff7dec6ad846b4a9c946badb584b5d694adce94add694add694add694add694b5d69cb5d69cbddea5bdd6a5c6deadc6deadce
e7b5cee7bdd6efc6c6e7c6c6e7cec6e7c6cee7cec6e7d6d6f7e7d6f7efdefff7defff7deffffd6ffffdeffffd6ffffdeffffd6ffffdeffffdeffffdeffffd6ff
ffd6ffffceffffceffffceffffceffffd6ffffdeffffdeffffe7ffffdeefefd6dedeb5bdbdd6dedef7f7f7ffffffffffffffffffffffffffffffffffffffffff
f7f7f7cebdbd7b63638c6b6bad8484c69494b59c9cb5ada5ada5a5ada5a5a59c9ca5a5a59c9c9c949c9c949c94949c948c9494949c94a5adad9494948484848c
8c8c8484848c8c8c8c8c8c9494949c9c9cbdbdbdd6d6d6efe7e7f7efefffffffffffffffffffffffffd6c6c68473736b63636363636363636363636363635a63
636363635a5a5a5a5a5a5252525a5a5a5252525a5a5a6b6b6b9c9c9c9c9c9c7b6b6b5a52525a525252524a52525252524a4a5252424a4a4a524a424a4a4a5252
5a63637b84849c9c9cadadadada5a5a594945a4a4a524242524242524a4a4a4a4a6b6b6b636363424242424a4a4a4a52394242424a4a314242294a4a184a4a29
636352949484d6d68cf7ef8cffff7bfff763efe75ae7de7bfff78cf7f794e7efa5e7efc6f7ffd6eff7f7f7f7f7f7f7fff7f7efe7eff7efeff7f7f7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffe7e7debdbde7cecefffff7ffffffffffffffffffffffffffffffefdece7b6b4a9c8c63
a5ad7badce94add69cb5de9cbde7a5b5de9cb5de9cadd694b5dea5b5dea5bddeadbdd6adc6deb5c6deb5d6e7c6d6efc6d6efcecee7ced6efcecee7ced6efd6d6
efd6d6f7e7d6f7e7defff7defff7e7ffffe7ffffe7ffffdeffffdeffffdeffffe7ffffdeffffdeffffd6ffffd6ffffd6ffffd6ffffceffffdeffffdeffffdeff
ffdeffffe7ffffd6efefc6d6deb5c6c6d6e7defffffffffffff7fffffffffffffffffffffffffffffffffff7f7efad9c9c7b52529c7373b58484bd9c9cada59c
b5ada5ada5a5ada5a5a5a5a5a5a5a59c9c9c949c9c949c94949c9c949494adb5b58c94948c8c8c8c8c8c8c84848c84848c8c8c847b7b7b7b7b7b7b7b8c8c8c8c
8c8c9c9c9ca59c9cada5a5a5a5a5ada5ad9c8c8c7b6b736b63636b6b6b6363636b6b6b6363636363635a5a5a6363635a5a5a5a5a5a5a5a5a5a5a5a5252525252
526b6b6b847b7b6b636363525a5a52525a52525252525252524a52524a5252525252525a5a4a524a424a4a3942425252525a5a5a5a52525a52524a42424a4242
5a5252524a4a525252736b6b6b6b6b424242424242424242424a4a4a4a4a424a4a42424242424a394a524a6b735a94946bbdbd73ded67bfff773ffff63fff763
fff773ffff7beff78cf7f79ceff7c6f7f7eff7f7fff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffe7e7e7c6c6cebdb5fffffffffffffffffffffffffffffffffff7f7efde735a399c946b9ca573a5bd8ca5ce94b5de9cb5dea5b5dea5b5dea5b5dea5
b5dea5b5dea5b5d6a5bddeadbdd6adc6deb5cee7bddeefced6e7c6d6e7ced6e7ced6efced6e7ced6efd6d6efd6d6efded6f7e7deffefdefff7e7ffffe7ffffe7
ffffe7ffffe7ffffdeffffe7ffffdeffffdeffffd6ffffdeffffd6ffffd6ffffd6ffffdeffffd6ffffe7ffffe7ffffdeffffcee7e7bdd6cebdcec6e7efefffff
ffffffffffffffffffffffffffffffffffffffffffffe7ded6947b7b845a5aa57b7bad8c8cad9c9cad9c9cada5a5ada59cada5a59c9c9c9c9c94949c94949c9c
8c9494949c94a5adad9494948484848c8c8c8c8c8c8c84847b7b7b8484848484847b8484737373737373737373737b7b736b6b736b73736b6b7b7373736b6b6b
6b6b636b6b6b6b6b6363636363635a5a5a5a63635a5a5a6363635a5a5a5a5a5a5252525a5a5a5a5a5a7373737b7373635a5a5a52525a5a5a524a524a52524a52
524a52524a52524a5252424a4a4a52524a52525252524a4a4a4a4a4a4a4a4a524a4a524a52525252524a4a524a4a5a5252736b6b5a5a5a4a4a4a4a4a4a4a4a4a
4239394242424242425a4a526b52637b6b736b6b73425a6329525a317b844aadad7bf7ef7bffff73ffff6bf7f77bffff84ffff9cffffc6fffff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefcececeb5b5fff7f7fffffff7ffffffff
fffffffffffffff7efde735a39948c63a5ad7ba5b584adc694adce94b5dea5b5d6a5bde7adbde7adbde7b5b5deadbddeb5bddeb5c6debdc6debdd6e7ced6e7ce
deefcedee7cedeefd6deefcedeefd6deefd6deefded6efdedef7e7def7e7e7ffefe7fff7efffffe7ffffefffffe7ffffefffffe7ffffe7ffffe7ffffe7ffffde
ffffe7ffffdeffffdeffffdeffffdeffffdeffffe7ffffdeffffd6ffffc6efe7bdded6bdceceefefefffffffffffffffffffffffffffffffffffffffffffffff
ffd6c6c6946b6b845a5aa5847ba5948cb59c9cb5a59cb5a5a5ada59ca5a59c9c9c949c9c9c949c94949c9c949494adb5b59494948c8c8c8c8c8c9494948c8484
8484847b7b7b8484847b7b7b7b8484737373737b7b7373737b7b7b7373737373736b6b6b736b6b6b6b6b6b6b6b6b6b6b6b6b6b6363636363635a5a5a6363635a
5a5a5a5a5a5a5a5a5a5a5a5a5a5a6363637373737b73735a52525a5a5a5a525a5a52524a4a4a5252524a52524a52524a4a4a5252524a52524a52524a4a4a5252
524a4a4a5252524a4a4a5a5a5a4a4a4a4a4a4a4a4a4a6b63636b6b6b5252524a4a4a5252524a4a4a4a4a4a5252526363637b6b737b6b736b5a635a525a4a424a
394a4a314a52316363428c8c6bc6c684efef94ffff8cffff8cffff94ffffcefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffefeff7dedeceb5b5efe7e7f7fffffffffffffffffffffffffff7f7f7e77b634a8c7b529c9c73adbd8ca5bd
8cb5ce94b5ce94b5d69cb5d6a5bde7adbde7b5c6e7b5bddeb5c6e7bdc6debdcee7c6cedec6d6e7cedee7cee7efd6dee7cee7efd6e7efd6e7f7dedeefd6deefde
deefdedef7e7deefe7e7f7efe7ffefeffff7e7fff7efffffefffffefffffe7ffffefffffe7ffffe7ffffe7ffffe7ffffdeffffdeffffd6ffffdeffffd6ffffd6
ffffcefff7cef7efceefe7b5cec6bdc6c6f7f7f7fffffffffffffffffffffffff7fffffffffffff7f7fff7f7bda59c7b5a5284635a9c847bad8c8cb59c9cb59c
9cb5a59ca59c9ca59c9c9c9c949c9c9c949494949c9cadadad949494848c8c8c8c8c847b7b948c8c8c848c8c84847b7b7b7b7b7b737373737b736b73736b7373
6b73737373736b6b6b6b6b6b6363636b6b6b6b6b6b6b6b6b6363636363635a5a5a6363635a5a5a5a5a5a5a5a5a6363635a5a5a5a5a5a525252737373736b735a
5a5a5252525a5a5a5252525252524a52524a52524a4a4a525a525252525252524a4a4a4a4a4a4a4a4a5252524a4a4a42424a4a4a4a4242424242425252526b6b
6b6b6b6b4a4a4a4a424a4a4242525252635a5a736b6b736b6b6b63635a52525242424a3942524a4a4a4a4a424a4a314242214a4a29636363a5a58cdedea5ffff
9cf7ffadffffcefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
e7e7dec6c6cec6c6fffffffffffffffffffffffffffffffff7e7ad947b84734a9c9c6badb584b5c694b5c694bdce9cb5ce9cbdd6a5bddea5c6e7b5c6deb5cee7
bdcee7bdd6e7cecee7c6d6e7ced6e7cee7efdee7efd6e7efd6e7efd6eff7dee7f7deeff7dee7efdeeff7e7e7f7e7e7f7e7e7f7e7e7ffefe7ffefeffff7effff7
f7ffffefffffefffffefffffefffffefffffefffffe7ffffe7ffffdeffffdeffffd6ffffd6ffffceffffd6ffffcefff7defff7c6ded6bdcec6ded6d6fff7ffff
fffffffffffffffffffffffffffffffffffff7f7ffefe7ad948c84635a8c6b63a58484ad948cb59c9cad9c9cb5a5a5a59c9ca59c9c9c9c949c9c9c94949cb5b5
b59494948c8c948c8c8c948c948c848c8c8484847b7b8484848484848484847b7b847b84846b73736b73736b6b6b7373737373737b7b7b6b6b6b736b6b6b6b6b
6b6b6b6363636363636363636b63636363636363635a5a5a5a5a5a5a5a5a6363637b7b7b7b7b7b5a525a5a5a5a5a52525a5252525252525a5a4a52524a52524a
4a4a4a4a4a4a4a4a525252524a525a52524a4a4a4a5252424a4a4a52524a4a4a525252525a5a7373735a5a5a4a4a4a5a5a5a736b6b7b73737b7373635a5a5252
4a393939424a424a524a52524a4a4242424242424a4a425252314a4a29524a426b6b6b9c9c8cbdbdbdefefdeffffefffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefefdececebdb5bdefefefffffffffffffffffffffffffff
ffefd6bda58473528c8c63adad7bb5bd8cbdce9cbdce9cbdd6a5b5ce9cbdd6adb5d6a5bdd6adc6deb5d6e7c6d6e7c6deefd6d6efd6deefd6e7efd6e7efd6dee7
d6e7efd6e7efd6eff7dee7efdee7f7deeff7e7eff7e7e7f7e7eff7efe7f7e7eff7efe7f7efeffff7effffff7ffffeffffff7ffffefffffefffffefffffefffff
deffffdeffffdeffffdeffffceffffd6ffffd6ffffdeffffcefff7def7f7cededec6c6c6ded6defffffffffffffffffffffffffffffffffffffffffffffff7f7
e7de94736b7b5a52946b6ba58c84a5948cad9c9ca59c94a59c9c9c9c949c9c9c949494949c9cadadad94949c8c848c8c8c8c8c8484948c8c8c84848484847b7b
7b7b7b84737373737b7b737373737b7b6b6b6b6b73736b73736b73736363636b6b6b6b6b6b6b6b6b636363636363636363636363635a5a5a5a5a525252635a5a
5a5a5a6363635a5a5a737373736b6b5a5a5a5a52525a5a5a4a4a4a5252525252524a52524a4a4a4a52524a52525252524a4a4a524a4a4a4a4a524a524a424a4a
4a4a4242424a4a4a4a4a525a5a5a736b736b6b6b736b737b7b7b6b636b5a5a5a4a42424a42424a42424a524a424a42424a42394239424a42424a424a4a4a3942
423942424a5a5a5a7373425a5a5a6b73adbdc6f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7efe7deded6cecee7dedefffff7fffffffffffffffffffffff7f7efde7b6b5a7b735aa5a573b5bd8cadbd8cbdd69cb5
d6a5bddeadbddeadbddeadc6deadd6e7bdd6debdd6e7c6cee7c6d6efced6efcee7f7dee7f7deeff7e7e7f7dee7f7e7e7efdeeff7e7eff7e7eff7efeff7eff7ff
efeff7eff7fff7eff7eff7fff7eff7efeffff7effff7f7fffff7fffff7ffffeffffff7ffffe7ffffe7ffffdeffffe7ffffd6ffffdeffffd6ffffdeffffd6ffff
d6ffffcef7f7d6f7f7c6dedec6ced6dedee7ffffffffffffffffffffffffffffffffffffffffffffffffe7cece9c73737b525294736ba58c84a59494ad9c94a5
9c9c9c9c94949c949c9c9c949c94b5b5b59494948c8c8c8c8c8c8c8c8c8c84848484848484848484847b7b7b7b7b7b737b7b7b7b7b7373737373736b73737373
736b736b6b6b6b6b6b6b6b6b6b6363636363636363636363636363636363635a5a5a6363635252525a5a5a5252526b6b6b7b7b7b6b63635a52525a5a5a525252
5252524a524a4a5a524a52524a525242524a4a52524a524a4a524a4a4a4a4a4a4a4a424a524a524a4242524a52525252635a636b6b6b8c8c8c736b736b63635a
525a524a524a424a4a424a4a42424a424a4a42424a4a4a4a4a4a4a4a4a4242424a42424a4242524a52424a4a737b7b636b6b424a4a7b8484ced6d6ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7ded6cec6
c6bdb5fffffffff7efffffffffffffffffffefefe78c7b737b735a9c946bbdbd8cb5c694b5ce94b5d69cadd6a5b5dea5b5d6a5cedeb5cedeb5d6e7bdd6debdd6
e7c6cee7c6ceefcedeefd6e7f7dee7efdee7f7e7e7efdeeff7e7eff7e7eff7efeff7eff7f7efeff7eff7f7f7f7f7eff7f7f7f7f7eff7f7f7eff7f7f7fff7efff
f7f7fff7effff7efffffefffffefffffe7ffffe7ffffdeffffdeffffd6ffffd6ffffd6ffffd6ffffcefff7d6ffffd6fff7ceefefbdd6d6c6ced6dedee7ffffff
fff7fffffffffffffffffffffffffffffffffffff7ceada5845a5a845a5a947b73947b7b9c948ca59c949c94949c9c94949494949c94adadad9494948c8c8c94
8c8c8484848484847b84848484847b7b7b7b7b7b737b7b7b7b7b7373737373736b73737373736b6b6b6b7373636b6b6b6b6b6363636363636363636b6b6b6363
636363636363635a5a5a5a5a5a5a5a5a5a5a5a5a5a5a6b6b6b7b7b7b5a5a5a5a5a5a5a52525a5a52525252525252424a4a42524a42524a4a524a424a42424a4a
4a4a4a5252525252525a5a5a5252526b6b6b736b737b7b7b7b737b7b7b7b635a63524a52524a52524a524a424a4a424a4a424a524a524a424a4a4a4a4242424a
4a4a4a4a4a4a4a4a4242424a42424a424a737373736b73524a4a5a5a5aadadadfff7f7fffffffff7ffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffff
f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ded6cec6bdb5f7efeffffffffffff7fffffffffffffff7efbdada5
7b6b52948463b5b584b5bd8cbdd69cb5d6a5b5dea5b5dea5c6deb5c6deb5d6e7bdd6debdd6e7c6cee7c6d6efceceefcedef7dee7efdeeff7e7e7f7e7eff7e7ef
f7e7f7ffeff7ffeff7fff7f7f7eff7fff7f7f7f7fffff7f7f7f7fffff7f7f7f7f7fff7eff7f7effff7eff7efeffff7effff7efffffefffffefffffe7ffffe7ff
ffdeffffdeffffdeffffd6ffffd6ffffd6ffffd6ffffdeffffd6ffffceefefbdced6bdced6dee7e7ffffffffffffffffffffffffffffffffffffffffffffffff
bda59c7b5a527b5a52947b739c8c8c9c948ca59c9c9c94949c9c9c949494adadad9494948c8c8c8c8c8c8c8c8c8484848484848484848484847b7b7b7b7b7b7b
7b7b7b7b7b7373737373737373737373736b6b6b6b6b6b6b6b6b6b6b6b6363636363636363636363635a5a5a6363636363636363635a5a5a6363635a5a5a7373
736b6b6b5a5a5a5a52525a52525252525a52525252525252524a52525252524a524a4a52524a524a5a5a525a5252635a5a635a5a737b7b737b7b636363525252
63636b7373735a5a5a424a4a4a4a4a42424a4a4a4a4a4a4a5252524a4a4a4a4a4a424a42424a4a394a4a4a524a424a4a424a4a4a524a5a63636b6b6b5a5a5a4a
4a4a8c8484d6ceceffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7efe7d6cec6c6bdbdfffff7fffffffffffffffffffff7f7efe7de7363529c8c63a59c73adb584bdc69cbddeadadce9cb5dea5
bddeadc6deb5cedeb5d6e7bdcedebdd6e7c6cee7ced6efd6deefd6e7f7dee7f7deeff7e7e7f7e7eff7e7eff7eff7ffefeff7eff7fff7f7f7f7fffff7f7f7f7ff
fff7f7f7f7fffff7f7f7f7f7fff7eff7efeffff7e7f7efeffff7e7f7f7efffffe7ffffe7ffffe7ffffe7ffffdeffffdeffffd6ffffdeffffd6ffffd6ffffd6ff
ffdeffffd6f7f7ceefefb5ced6bdcecedee7e7f7fffffffffffffffffffffffffffffffffffffffffffff7a58c8c735252846b638c736ba58c8ca58c8ca59494
9c94949c9494adadad9494948484848c8c8c8484848484847b7b7b8484847b7b7b7b7b7b7373737b7b7b7373737373736b6b6b7373736b6b6b6b73736363636b
6b6b6363636363635a5a5a6363635a5a5a6363635a5a5a5a5a5a5252525a5a5a5a5a5a6363637b7b7b7b7b7b5a5a5a635a635a52525a52524a4a4a4a4a4a4a4a
4a5252524a4a52525a5a5a5a5a6b6b6b7373737b73737b7373737373525a5a525a5a424a4a424a4a5a6363636b6b424a42424a4a424242424a4a424a4a4a4a4a
424a42424a4a394242394242394a4242524a394242394242424a4a6363637373735a5a5a4242396b6363ad9c9cf7e7e7f7e7e7ffefeff7efeffffff7f7f7f7ff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efe7e7bdb5adefe7
defffffffffffffffffffffffff7efe7a594848c7352ad9c73bdb58cbdce9cb5cea5b5d6a5add6a5bddeadbddeb5cee7bdcee7bdd6e7c6d6e7c6deefced6efd6
e7f7dee7efdeefffe7eff7e7eff7e7eff7e7efffefeff7eff7fff7f7fff7fffffffffff7fffffffffff7fffffffffff7fffff7f7fff7fffffff7fff7f7fff7ef
f7efeffff7e7fff7efffffe7fff7efffffe7ffffe7ffffe7ffffe7ffffdeffffdeffffd6ffffd6ffffd6ffffdeffffd6ffffcef7f7b5d6d6b5cececee7e7f7ff
fffffffffffffffffffffffffffffffffffffffff7f7b59c9c6b524a7b5a5a947373a584849c8c8ca594949c9494b5b5b59494948c8c8c848c8c8c8c8c848484
848484847b7b8484847b7b7b7b7b7b7b7b7b7b7b7b7373737373737373737373736b6b6b6b6b6b6b6b6b6b6b6b6363636363636363636b6b6b6363636363635a
5a5a6363635a5a5a5a5a5a6363637b7b7b6b6b6b5a5a5a5a5252635a5a635a5a6363636363636b6b6b6b6b6b7b7b7b7b7b7b7b7b7b6b6b6b6b63635a5252524a
5242424242524a3142424a52524a5a5a6b7b7352635a424a4a424a4a4a524a424a4a4a524a424a4a424a4a4242424a4a4a4242424a4a4a424a424242424a4a42
6b6363736b6b7363635a4a4a5a42428c7373d6bdbdf7dedef7d6d6efceceefced6e7d6d6f7e7e7ffefeffff7f7fff7f7ffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efe7e7ded6d6c6b5b5fffffffffffffffffffffffffff7efdec6b584634a9c84
63bdb58cb5b594b5c69cb5d6a5bddeadb5deadbde7b5c6deb5cee7bdcee7bdd6e7c6d6e7cedeefd6deefd6e7f7dee7f7deefffe7eff7e7eff7e7eff7e7efffef
f7f7effffff7f7f7f7fffff7fffff7fffffffff7f7fffff7f7fff7fffffff7fff7fffff7f7fff7effff7e7f7efeff7f7e7f7efeffff7e7fff7e7ffffe7ffffef
ffffe7ffffdeffffd6ffffdeffffd6ffffd6ffffceffffceffffcefff7c6f7efadd6ceb5d6ced6e7e7f7fffffffffffffffffffff7fffffffffff7ffffffffef
ef9c8484735252846363947373947b7b9c84849c9494adadad949494848c84848c8c848484848484847b7b8484847b7b7b7b7b7b7b73737b7b7b737373737373
7373737373736b6b6b736b6b6b63636b6b6b6363636363636363636363635a5a5a6363635a5a5a5a5a5a5a5a5a5a5a5a5a5a5a7373737b7b7b7373736363636b
6b6b6b6b6b7373737373737373736b6b6b6b6b6b52525a5252524a4a4a4a4a4a4a4a4a524a52524a4a5252524a5252394a4242524a5a6363636b6b525a524a4a
4a4a524a4a4a424a4a4a4a4a424a4a424242424a4a424a4242524a425242425242425242396b52527b6363735a5a4a31315a39396b4a4aa57b7bcea5a5c69c9c
bd9494bd9494c69c9ccea5addebdb5f7d6d6ffdedeffefeffff7effffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7
fffff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffefe7e7cec6c6e7ded6fffffffffffffffffffffff7f7efdea58473947352a59473bdb594bdc69cbdd6adbddeadbde7b5bddeb5c6e7
bdcee7bdd6e7c6d6e7c6deefcedeefd6e7f7dee7f7deefffe7eff7e7f7ffefefffeff7ffeff7ffeffffff7f7fff7fffff7fffff7fffffffffff7fffffffffff7
fffffffffff7fffff7f7fff7f7fff7f7fff7f7fff7eff7efeffff7e7f7f7effff7e7fff7efffffefffffefffffdeffffdeffffdeffffdeffffceffffceffffc6
ffffc6ffffc6fff7cef7f7b5ded6bdd6d6d6e7e7f7fffffffffffffffffffffffffffffff7f7fffffffff7ffa5848c8c636b946b6b8c6b6b9c7b84948c8cadad
ad8c948c848c8c848c8c8c8c8c8484848484848484848484847b7b7b7b7b7b7b737b7b7b7b7373737b7373736b73737373736b6b736b6b736b6b6b6b6b636363
6b6b6b6b6b6b6b6b6b6b6b6b6b6b6b6363636b6b6b6363637373738484848c8c8c7b7b7b7b848473737b7373736b6b6b636b6b5a5a5a52525a4a4a4a525a5a52
52525252524a4a4a524a524a4a4a525252524a4a52524a4a4a425a5a5a7373736b63634a4a424a4a424a4242524a4a524a42524a4a5242425242425242425a4a
425a424263423963393973524a7b52527b4a4a6331315a2929633131845252a57373bd8484a57373bd848cbd8c8cc68c8cb57b84c68c8cce9c9ce7b5b5f7c6c6
ffdedeffe7deffefeffff7effffff7fffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefe7dedecebdbdf7efefff
fffffff7f7fffffffff7efdec6b584634a947b63b5a58cbdc69cbdc69cbdd6a5bdd6adbde7b5bde7b5cee7bdcee7bdd6e7c6dee7cee7efd6deefd6e7f7dee7f7
e7efffefeff7e7f7ffeff7ffeff7fff7f7f7eff7fff7f7fff7fffffffffff7fffffffffff7fffffffffff7fffff7f7fff7fffff7f7f7eff7fff7eff7eff7fff7
eff7efeff7efe7f7efe7f7efe7f7efeffff7e7fff7efffffdeffffdeffffd6ffffd6ffffc6ffffc6ffffc6ffffc6ffffc6fff7c6f7efb5ded6bdd6d6cededeef
f7f7f7fffffffffff7f7f7fffffffffffffffffffff7f7a584848c63639473738c7373948484a59c9c9494947b8484848c8c8484848484848484848484847b7b
7b847b7b7b7b7b7b7b7b7b7b7b7b7b7b7b73737b737b7b73737b737b7373737b73737373737373737373737b7b7b7b7b7b7b7b7b7b7b7b8484847b7b7b7b7b7b
7373738484847373735a63635a5a5a525a5a4a52524a5252424a4a4a4a4a4a4a4a5252524a52525252524a4a525252524a4a4a4a4a524a4a4a524a4a524a4a5a
524a635a5a7b736b5a524a5a4a425a4a425a4a425a42425a4a425a42425a42425239395239395239396339396331317342427b42427342425a29295a29296b39
39845a5a946363bd948cc69c9ce7bdbdf7d6ceffe7e7efc6c6c69494b57373ad7373b57b7bce9c9cdeadade7bdbdefcecef7dedef7e7deffefeffff7effffff7
fffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efefd6cecedececefff7efffffffffffffffffffefe7d6a584738463529c8c73bd
b594ced6adc6d6adc6deadbddeadc6e7bdcee7bdd6e7c6d6e7c6e7efcee7efd6e7efdedeefd6eff7e7eff7e7f7ffeff7ffeff7fff7f7ffeffffff7f7fff7ffff
fffffffffffffffffffffffffffffffffffffffffff7fffff7f7fff7f7fff7f7f7eff7fff7eff7eff7ffefeff7efeff7efe7efe7e7efe7e7efe7e7f7efdef7f7
deffffdeffffdeffffd6ffffceffffc6ffffceffffc6ffffceffffcefff7cefff7bddedebdd6d6c6dededef7f7effffff7ffffffffffffffffffffffffffffff
efefb5949c9c7b7b947b7b9c8484a594949494948c948c8c8c8c9494948c94949494948c8c8c8c94948c8c8c8c8c8c8c84848c8c8c8c84848c8c8c8c8484948c
8c8c848c8c8c8c8c84848c8c8c8484848484847373737373736b6b6b6b6b6b6363635a5a5a6363636b6b6b7b7b7b6b6b6b525252525a5a4a5252525a5a4a5252
4a52524a52524a52524a4a525252525252525252525252525252524a4a4a525252524a4a5a4a4a6b5252846b637b635a6b4a4a6342426b4a426342396342425a
39395a39395a39315a39395231315a31315a29296b39397b42427b4a4a7b4a4a8c5a5a9c7373b59494e7c6bdf7dedefff7efffffffffffffffffffffffffffff
ffffefefefc6c6bd9494ad7b7ba57373ad8484b58c8cc6a59cd6adade7c6bdefcecef7dedeffe7deffefe7ffefeffff7f7fff7f7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7efefefdededececee7d6d6fff7effffffffffff7fffff7d6bdb5846b5a84735aad9c84bdb594ced6a5cedeadcedeb5bddeadc6deb5cedebdd6
e7cedee7cee7efd6deefd6e7efdee7efdeeff7e7eff7e7f7ffefefffeff7fff7f7fff7fffff7fffff7fffffffffffffffffffffffffffffffffff7fffff7f7ff
f7fffff7f7f7eff7fff7eff7efeff7efeff7eff7ffefe7f7e7e7f7e7e7efdee7efe7deefe7deefe7d6efe7defff7d6fff7d6ffffceffffceffffc6ffffceffff
c6fff7ceffffcefff7c6f7efb5dedeadd6d6add6ced6efefe7fffff7fffff7ffffffffffffffffffffffffefefb5949c846b739c8c8c9c94949494949494949c
a59c9494949494948c9494949c9c949494949494848c8c848c8c848484848484847b7b847b7b7b73737b7373736b736b6b6b6363636363636363636363635a5a
5a5a5a5a5a5a5a6363635252526363636b6b6b7b7b7b5a5a5a5a5a5a525252525a5a4a52524a52524a52525252524a4a4a5252524a4a4a525252524a4a525252
524a4a525252524a4a5a52526342427b5a5a7b5a526b4a425a39396342425a39395a39315a31315a31315229295229295229296339396b4242845a5a9c6b6bb5
8c8cc6a5a5e7c6c6f7ded6fff7f7fffff7fff7f7fffff7fffffffffffffffffffffffffffffffffff7fffffffffffffff7f7efd6ceceadadad8c8cad84849c73
73a57b7bb5848cce9c9cd6a5adefbdbdf7c6c6ffd6d6f7dedeffe7e7ffe7e7ffeff7ffefeffffff7ffffffffffffffffffffffffffffffffffffffffffffffff
f7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efefefdeded6c6c6efe7e7ffffff
fffffffffffff7efe7b59c8c846352947b63bdad8ccec69cd6deadcedeb5cee7b5c6deb5d6e7c6d6e7c6e7efd6e7efd6e7efdee7efdeeff7e7eff7e7f7ffeff7
ffeff7fff7f7ffeffffff7fffff7fffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7fff7fffff7f7ffeff7ffefeff7eff7ffefeff7e7eff7
e7e7efe7eff7e7e7efdee7f7e7d6e7dedeefe7d6efded6f7e7cef7efd6fff7cefff7ceffffc6fff7ceffffc6ffffceffffc6ffffc6f7f7b5e7e7a5d6d6a5d6d6
c6efe7defff7f7ffffffffffffffffffffffffffffffe7efb5a5a57b6b6b8c847b9c9494a59c9c949494848c847b84847b84847b84847b8484737b7b737b7b73
7373737b7b7373737b7373736b73736b736b6b6b736b6b6b63636b6b6b6363636b6b6b6363636363636363636363635a5a5a5a5a5a5a5a5a7b7b7b7373735a5a
5a525a5a5a5a5a525a52525a5252525252525252524a5a5252524a4a5a52525a4a4a5a4a4a524242524a4a4a4242524a4a5a42426b4a4a845a5a7b52525a3139
5a31315a31315229315229295a39396b42427b52528c6363a57b7bbd9c9cd6bdbdf7dedefff7f7fff7f7fffffffffffffffffffffffffffffffffffffffffff7
fffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffefefdec6c6c6a5adbd8c94b58484ad7373b5737bc67b84de949cde9ca5dead
b5deb5bdefcecef7d6d6ffdee7ffe7e7fff7f7fff7f7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7e7ded6d6dececef7efeffffffffffffffff7f7efded69c84737b634aa58c6bbdad8c
c6c69cd6deb5d6e7b5d6e7bdcee7bdd6e7cedee7cee7e7d6deefd6e7efdee7efdeeff7e7eff7e7f7ffeff7ffeff7fff7f7fff7fffff7fffff7ffffffffffffff
fffffffffffffffff7fff7fffff7f7fff7f7fff7f7f7eff7ffefeff7eff7f7efeff7e7eff7e7eff7e7eff7e7e7efdee7efdee7efd6e7f7ded6e7d6cee7d6c6e7
ceceefdeceefdeceffefcefff7ceffffceffffc6ffffbdfff7c6ffffbdffffbdf7f7ade7e7a5ded69cceceb5deded6f7f7f7fffff7ffffffffffffffffffffff
ffeff7bdb5b5847b738c84849c948c9c9c9c949c9484948c737b7b6b7b736b7373737b7b737373737b736b73737373736b6b6b736b6b6b6b6b736b6b6b6b6b6b
63636363636363636363636363635a5a5a6363635a5a5a5a5a5a5a5a5a6363637b7b7b6b6b6b5a5a5a5a5a5a5252525a5a525a52525a52525a4a4a5a4a4a5a4a
42634a4a5a42425a42425a42425a4a425a42425242424a39395239395a39396b42425231315229295a31316b4a4a7b5a5a947373a58484c6adaddec6c6f7e7e7
ffefeffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffefffffefffffeffffff7ffffefffffefffffeffffff7fffff7ffffff
fffffffffffffffffffffffffffffff7f7ffe7efe7c6ced6adb5ce949cce8c94bd7384b5737ba57b7bad8c8cb59494c6a5a5d6adade7bdc6efceceffdedeffe7
e7ffefeffff7effffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7f7f7e7e7d6cecedececefff7f7fffffffffffffffff7decebd94735a8c6b4aa58c6bc6b58ccecea5dee7bddee7c6d6e7c6d6e7c6deefcedee7ce
e7efdee7efdee7f7e7e7f7e7efffefeff7e7f7fff7f7fff7fffff7f7fff7fffffffffffffffffffffffffffffffffffffffffff7fff7fffff7f7ffeff7fff7ef
f7eff7ffefeff7e7eff7e7eff7e7f7f7e7eff7deeff7dee7efd6e7efdedeefd6deefd6d6e7ced6efcecee7ceceefd6c6efdecef7e7cefff7d6ffffceffffc6ff
ffbdffffbdffffb5ffffb5fff7adefefade7de9cd6ceb5dedeceefefeffffff7fffffffffffffffffffffffff7f7d6c6c694847b8c7b7b94948ca5adad94a5a5
949c9c7b8c8c73847b6b7373737b7b737b7b737b7b7373737373736b6b6b7373736b6b6b6b6b6b6363636b6b6b6363636363636363636363635a5a5a5a5a5a5a
5a5a6363636363637b7b7b5a5a5a5a5a5a525252635a5a635252635a5263524a634a4a634242634a4a6342426b42426339396339395a39315a39395231315231
314a31296b525273525a846b6b9c7b7bb5a5a5c6b5b5e7d6d6ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7fffffffffff7fffffffffff7fffffffffff7fffff7fffff7fffff7ffffeffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7ffffdee7efc6ceceadadbd9c9cad8c8ca584849c7b7bad8484bd8c8cd6a5a5deadadefc6c6f7ceceffe7e7fff7effffff7fffff7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7ded6d6d6cecedededef7ffffffff
ffffffffffefe7cead9c8c634a947352ad946bbdb58cc6cea5d6deb5cedebddee7cedee7cedee7cedee7d6e7efdedeefd6e7f7dee7f7e7efffefeff7eff7ffef
f7f7effffff7f7fff7fffffffffff7fffffffffff7fffffff7fff7f7fff7eff7eff7ffefeff7efeff7efeff7e7eff7e7e7efdeeff7e7efefdeeff7e7e7efdeef
efdedee7cedeefcedee7c6deefced6e7c6d6e7cecee7cec6e7cebddecec6efdec6f7efc6fff7bdfff7bdffffb5ffffb5ffffb5ffffb5fff7a5efe7ade7e79cd6
cea5cecec6dedeeffffff7fffffffffffffffffffffffff7f7ded6d6ad94947b7b737b848494a5a5a5b5ad9cadad7b8c8c737b7b6373736b7373636b6b6b7373
636b6b6b6b6b6363636b6b6b6363636363636363636363636363636363635a5a5a5a5a5a5a5a5a5a5a5a6363637373736b6b6b5252525252525252525a524a63
524a634a42634a426342396342396339316339396331316331315a29296331296b3939845a5a9c7373a58c8cc6b5b5d6c6c6e7d6d6fff7f7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefefdeded6c6c6ce
adadbd8c94b58484ad7373b57b7bc68c8cd6a5a5e7b5b5f7d6d6f7dedeffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7e7deded6cecedededefffffffffffffffff7f7efdebda58c8c6b4a947b5aa59c73bdbd
94c6cea5d6debddee7c6e7efd6dee7cee7efd6deefd6e7efdee7efdeeff7e7eff7e7f7ffeff7ffeff7fff7f7fff7fffff7fffff7fffffffffffffffffff7fff7
f7fff7efffeff7fff7eff7efefffefeff7e7eff7e7eff7e7eff7e7eff7deeff7e7eff7deeff7dee7efd6e7efd6dee7c6deefced6e7c6deefced6e7c6d6e7cece
e7c6c6e7ceb5deceb5e7d6b5efdebdffefbdfff7bdffffb5ffffb5ffffadfff7b5fff7b5f7efadefe7a5d6d6add6d6bddedee7f7f7f7ffffffffffffffffffff
fffffffff7e7e7ada5a5737b7b7384848c9c9c9cadadadbdb594a5a5848c8c6b73736b737363736b6b7373636b6b6b6b6b6363636b6b6b6363636b6363636363
6b6363635a5a635a5a5a5a5a635a5a5a5a5a6b63637b73736b6363524a525a52525a4a4a634a4a6342426342425a39396339315a31295a31295a292973423984
5252ad7b73b5948cceb5ade7cec6ffe7e7fff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffe7e7e7cecedeb5b5c69494b57b84ad737bbd8c8cce
a5a5e7c6bdefd6d6ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7f7f7ded6d6cececee7dedefffff7fffff7fffff7efe7d6b59c847b634a8c7b5aa59c7bbdb594c6c6a5e7debde7dec6efefcee7efd6e7efdedeef
d6e7f7dee7efdeeff7e7eff7e7efffefeff7eff7ffeff7f7eff7fff7f7f7f7f7fff7f7f7f7f7fff7eff7efefffefeff7efefffefe7f7e7eff7e7e7f7e7eff7e7
e7efdeefefdee7efdeeff7deefefd6efefd6dee7cedeefced6e7c6d6e7c6d6e7bdd6e7c6cee7bdcee7c6c6debdbde7c6b5debdb5dec6b5e7cebdf7debdf7dec6
ffefb5fff7b5ffffadfff7adfff7adfff7adf7f7a5e7de9cceceadd6d6ceefefe7f7f7fffffffffffffffffffff7f7f7efefb5bdb5848c8c6b6b6b8484849ca5
a5adbdb5a5adad8ca59c7384846373735a6b6b63736b636b63636b636363636b6b636b63637363636b5a5a6b5a5a6b5a526b5a5a6b52526b52527b63638c6b6b
7352526b4a4a6342426342425a31315a313152292952312952313173524a947373b59c94c6b5addecec6f7e7defffff7fffffffffffffffff7ffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffe7efdebdc6d6adadad7b7ba57373bd8c8cdeb5ade7c6c6ffe7deffefefffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7f7f7f7e7ded6dececef7e7defffff7ff
fff7fffff7efe7d6a594847b6b52947b63a5947bc6b594d6bda5efdec6efe7c6efefd6deefd6e7f7dee7efdee7f7dee7f7deeff7e7eff7e7f7fff7f7ffeff7ff
f7f7ffeff7fff7f7f7eff7fff7f7ffeff7fff7eff7efefffefeff7efeff7efe7f7e7eff7e7e7efdeeff7e7e7efdeefefdeefefdeefefdee7efd6e7efd6deefce
deefc6d6e7bdd6efc6d6e7bdd6e7c6c6e7bdcee7bdbddeb5bde7bdb5deb5bde7b5b5e7b5c6efc6bdf7cebdffefb5fff7b5ffffadfff7adffffa5fff7a5f7f79c
efe79cdede9cd6d6bddeded6eff7ffffffffffffffffffffffffffffffd6d6d6a5a5a57b7b737b847b949c94adb5b5a5bdb59cb5b57b9c9463847b5a6b6b636b
6b5a6363736b6b6b635a73635a6b5a52735a5a6b5a52735a5273524a73524a734a4a845a5a7b4a4a6b42396331316b31316331317342427b52529c7b73b59494
c6b5b5d6cec6f7e7e7fff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffefefe7c6cece9c9cb58484a57b73cea59cefc6c6ffdedeffe7e7fffff7ffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefefded6cedececef7e7defffff7fffff7fffff7efe7d6a594846b5a4a84735aa5947bc6
ad94ceb59ce7d6b5dee7c6deefd6d6efd6deefdedeefd6e7f7dee7efdeeff7e7eff7e7f7ffeff7f7eff7ffeff7f7eff7ffeff7f7eff7ffefeff7efefffefe7f7
e7eff7e7e7f7dee7f7e7e7efdee7efdee7efdee7efdee7efd6e7efdee7efd6e7efd6dee7cedeefced6e7c6d6e7c6cee7bdcee7c6c6e7bdc6e7bdbddeb5c6deb5
bddeb5bddeb5b5deadb5deadb5deadaddeb5a5e7c6adf7deadffefb5ffffa5fff7a5ffff9cfff79cfff79cefef94dede94ceceaddedec6e7e7e7f7f7f7ffffff
ffffffffffffffffefe7e7c6bdbd847b7b6b6b6b73847b94a5a59cb5ada5bdb58ca5a56b847b5a6363636b6363635a73635a735a52735a526b524a7352526b4a
426342395a31316b42426b42426339395a31317b4a4a9c6b6bc69494d6b5b5dececeefded6fff7efffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7efeff7efefe7de
dee7dededed6dee7dededed6d6dedededed6d6e7dedee7dedeefe7deefe7deefefefefefeff7fffffffffffffffffffffffffffffff7f7ffefefdebdbdb58c8c
9c7b73bd9c94debdbdefd6d6ffefe7fffffffffffffffff7fffffffffffff7ffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7f7f7efefe7d6d6e7d6d6f7efe7fffffffffff7fffff7efe7dead9c8c73634a8c7b63a58c73bda58ccebda5d6d6bdcedec6deefd6deefd6e7f7dee7
efdee7f7dee7f7deeff7e7eff7e7f7f7e7f7f7e7f7ffeff7f7eff7f7efeff7e7efffefe7f7e7eff7e7e7f7dee7f7e7e7efdee7f7dee7efdee7f7dedeefd6e7ef
dedeefd6e7f7dedeefd6deefd6d6e7ced6efcecee7c6cee7c6cee7bdcee7c6c6debdc6e7bdbddeb5c6e7bdbddeb5bddeb5b5d6adb5deadadd6ada5d6b59cd6bd
a5efd6a5f7e7adfff7a5ffffa5ffff94fff79cffff94f7ef9cefef94d6d69cd6d6b5d6dedef7f7f7fffffffffffffffffffffffff7f7dededeadadad737b7b6b
7b738494948ca5a5a5b5b5a5b5ad8c94946b63636b635a6b52526b4a4a6342426342425a42395a39395231315a3939735a529c7b7bb59494ceb5b5dececef7e7
deffefeffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffff7f7f7efefefe7e7dededee7dededededee7dededed6d6ded6d6ded6d6ded6deded6d6e7dedee7dedee7dedee7dedeefe7e7efdedeefde
d6e7d6d6e7ded6ded6d6dedededededee7e7e7efe7e7fff7f7fffffffffffffffffffffff7e7d6ceb5a59c9c847bbd9c9cdec6c6ffe7e7fff7f7ffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeff7ffefefe7d6d6dececeefe7defffff7
fffff7ffffefefe7dec6b5a57363527b63529c8c73b5a58cb5b59cc6c6adced6bde7e7cee7efcee7efd6e7efd6eff7dee7efd6eff7deeff7deeff7e7eff7deef
f7e7eff7deeff7e7e7f7dee7f7dedeefdee7f7dedeefd6deefdedeefd6deefd6d6efd6deefd6d6efcedeefd6d6efcedeefd6deefcedee7ced6dec6d6dec6d6de
c6d6e7c6cedebdcedebdc6d6b5cedebdc6d6b5c6deb5c6d6adc6deadbdd6a5bdd6adb5d6ada5d6b594cead94d6bd94e7ce9cffe79cfff79cffff8cffef94fff7
94f7ef9cefef9cdedea5dedea5cecebddedeefefefffffffffffffffffffffffffeff7efc6cec684948c5a6b6363737384948c949c9c8c948c8c84847b636b6b
4a4a6339395a3131522929634242846b6bb59494c6adade7ceceefe7defff7effff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeff7f7e7efefe7e7e7dedee7d6dedeced6e7d6d6ded6d6ded6d6ded6d6e7
dedee7dedeefe7e7efe7e7f7efeff7efeff7efeff7efeffff7f7fff7f7fff7f7fff7f7fff7f7fff7f7fff7f7f7efeff7e7e7e7dededededed6ceced6cecedece
cef7efeffff7f7fffffffffff7fffff7efe7debdada5947373c6adaddecec6f7e7e7fff7f7ffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efefe7d6d6dececeefe7e7fffffffffff7fffff7fff7e7decec6947b6b7b6352846b5a
a59484b5a58ccec6addecebdefe7c6e7e7ceefefd6efefd6eff7deeff7deefffe7e7f7dee7ffe7def7dee7f7dedef7dee7f7dedeefd6e7f7dedeefd6deefdede
efd6deefd6d6efcedeefd6d6efced6efd6d6efced6efced6efcedeefd6d6e7cedee7ced6dec6dedec6d6debdd6debdced6bdd6debdcedeb5cedeb5c6d6adced6
adc6d6adced6adc6d6a5c6d6adb5ceadadd6ad9ccead94d6b58cdebd94f7de9cffef9cfff79cfff7a5ffffa5fff7adfff7a5e7e79cd6d69cbdbdbdc6c6efefe7
fffffffff7f7ffffffffffffffffffe7efefc6d6ce84948c5a6363636b6384847b736b6b6b525a735252946b73b58c94d6b5bddececeefe7e7f7eff7ffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7f7e7e7
efdededececedeced6e7d6d6e7d6d6e7ced6e7d6deefd6def7e7e7f7e7effff7f7fff7f7fff7f7fff7f7fffffffff7f7fffffffff7f7ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7efe7e7e7dededecec6e7d6d6f7e7e7fffff7fffffffffffff7e7deb594
94ad8c8cceb5b5efdedefff7f7ffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7ffffeff7fff7f7ded6d6dececeefe7e7fffffffffff7fffff7ffffeff7e7dea594847b635294735aad846bbd947bcead94debda5e7d6bde7d6bdefe7ce
e7e7cee7efd6deefd6def7dedef7d6def7ded6efd6def7d6deefd6e7efd6deefd6deefd6deefcedeefd6d6e7ced6efced6e7c6d6efcecee7c6cee7c6cee7c6d6
efced6efced6e7c6cedec6cedec6cedebdcedebdcedebdcedebdc6d6b5cedeb5c6d6adc6d6adbdd6a5c6d6a5bdd69cbdd6a5b5c694b5ce9cb5ce9cadd6a594ce
9c8cc69c84cea58cdebd9cf7deadffefadffefadffefa5efe7a5e7e7a5ded6add6d6adb5b5a5a5a5b5b5b5efefeffffffffffffff7fff7fffffff7ffffe7f7ef
b5bdb5848484847b7bbdadadd6c6c6efdedeefdee7ffeff7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7efefded6d6d6cecedeced6deced6e7d6d6e7d6d6efdedeefd6def7e7e7f7e7effff7f7fff7f7ffffff
fff7f7fff7fffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7e7e7efd6d6d6c6c6d6c6c6efe7defffffffffff7fffff7e7ceceb59494b59c9cefd6d6f7e7e7ffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffeff7f7efefe7d6dedececeefe7deffff
fffffffffffffffffff7fff7efdec6b59c6b5a945a4aa5735ab5846bce9c8cd6b59cdec6addeceb5e7dec6dedec6deefcedeefcedef7ded6f7d6def7dedeefd6
e7efd6deefd6e7efd6dee7cedeefd6deefcedeefced6e7c6d6efced6e7c6d6efc6cee7bdcee7c6cee7c6d6efcec6e7c6cee7c6c6e7bdc6e7bdc6debdc6e7bdbd
deb5c6deb5bddeadc6deadbdd6a5c6deadbddea5bddea5b5d69cc6d69cbdce94bdce94b5ce94adce9c9cbd949cc69494bd9c94c6a5a5d6bdb5efd6ade7d6ade7
d69cd6ce94cec694b5ad9ca5a5949494847b7b7b7373b5adadefefefffffffffffffffffffffffffffffffeff7eff7efefffefefffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7deded6cececec6c6d6cecedeced6ded6
d6e7d6d6efdee7efdedef7e7e7f7e7effff7f7ffeff7fff7f7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7efd6d6ce
bdb5d6cec6f7f7effffffffffff7ffffffb59c9cad9494dec6c6f7e7e7ffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffeff7e7d6d6dececee7d6d6fffff7fffffffffffffff7f7fffff7f7e7d6dea594945a
4a8c52429c6b5ab58c7bbd9c84c6ad94cebda5d6ceb5d6d6bddedec6d6debddee7cee7f7d6eff7dee7efd6e7efd6e7e7cee7efcedee7c6dee7ced6e7c6d6e7c6
d6e7c6d6e7c6cee7bdcee7c6c6debdcee7bdc6e7bdcef7cebde7bdb5e7bdb5deb5b5deb5addeadb5deadaddea5b5deadadd69caddea5add69cadde9cadd694ad
d694b5ce8cbdce8cb5c684bdc68cb5bd84b5bd84adad7ba5ad84949c7b949c848c9c8494ad9c94ada58cada56b948c6b847b6b73736b6b6b635a5a736b6b948c
8cd6cecef7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7efefded6d6a59c9c7b737373636b948c8cbdb5b5ded6d6efdee7f7efefefe7e7fff7f7fff7f7fff7fffff7f7ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefeff7e7ded6bdbdbdada5e7ded6fffff7ffffffffffffdec6c6bda5a5d6
bdbdf7e7deffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7f7fff7f7e7dedee7d6d6e7ded6fff7f7ffffffffffffffffffffffffffffefffe7d6bd9c8c845a4a734a398c6b5a9c846bb59c84b59c8cc6b5
9cd6bdade7d6bde7d6bde7dec6e7dec6efefd6e7e7ceefefd6e7e7cee7e7cedee7c6e7e7ced6dec6d6e7c6d6debdd6e7c6d6e7c6d6e7c6d6e7bdd6e7c6ceefc6
c6efbdbddeb5bde7b5b5deadbddeadb5deadb5deadb5d6a5b5d6a5add69cadd69ca5ce94a5ce8c9cbd84adc684adbd7bb5b57badad73b5a573ad9c6bb5946bad
8c6b9c84638c735a7b6b526b6352636b5a5a6b635a736b6b7b739ca59cb5b5b5e7dedef7efefffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7efefcec6cea5949c736b6b635a5a4a4242524a4a736b6ba59c9cce
bdc6f7e7efffeff7fff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffff
fffffffffff7fffffffff7f7f7d6d6c6ada5c6ada5decec6fffff7fffffffffffff7dedeceb5b5cebdbdffe7e7fff7f7ffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7e7ded6dececeded6d6ff
f7efffffffffffffffffefffffeffffff7fffff7fff7debdad9c846b5a735a42846352a57b6bb58c7bbd9484bd9484d6a594deb5a5e7c6b5d6c6b5d6cebdd6ce
bdded6c6ded6bddedec6ded6bdded6bdd6d6bddedebdd6d6b5d6d6b5ced6b5ced6b5c6ceadd6deb5d6d6b5d6deb5ced6adced6a5c6ce9cc6cea5bdc69cbdc694
b5bd8cbdc694b5bd8cb5bd8ca5ad7ba5ad7b94a56b9c9c6b9c9c639c9463947b5294734a946b429c6b427b4a318452397b5a428c73639c9484c6c6bde7efe7ff
fffff7fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffff
f7e7e7c6bdbd8c84846b6363524a4a4239394a42424a4242393131524a4a7b7373b5adade7dedefff7fffffffffffffffff7ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffff7fffff7ffefe7ffefe7efcec6bd9c9cbd9c9cf7e7e7
fffffffffffffff7f7fff7f7c6b5b5d6c6bdf7e7defffff7ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7e7dedee7d6d6e7d6d6f7efe7fffff7ffffffffffffffffffefefe7ffffefff
fff7ffffefd6c6b59c7b7384635284524a8c5a4aad736bbd8473bd847bb58c7bb5a594b5a594bdad9cbdb59ccebdadcebdadd6c6add6ceb5ded6b5deceb5dece
b5d6ceadd6ceadcec6a5cec6a5d6c6a5e7ceaddec6a5d6bd9cc6b594c6ad8cbdad84bdad8cb5a57bb5a584ad9473a594739c846394845a8473527b7b52737342
6b6b426352316b5231845a39a57b5abd8c73efbda5ffd6bdfff7e7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7f7fffffffffffffffffffffffffffffffffffff7e7efd6bdc6a58c946b5a5a52424a4a3939524a4a52424a424242524a524a42424a4242
737373948c8cc6bdc6f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7fffffffffffffffffffffffffffffffff7fff7efffe7e7f7cecedeb5b5b58c8cceb5b5fffffffffffffffffffffffffff7f7cebdb5d6bdbdf7e7e7ffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffefe7e7ded6d6dececeefe7e7f7fff7f7fff7fffff7fffffffffff7fffff7fffff7fffffffffff7ffefded6b5adad847b845a5284
524a8c5a529c736b947b6b948473947b6b9c84739c8473a58c7ba58c7bad9c84ad9484b59c84b59c84bda58cb59c84bda58cbd9c84bd947bc6947bc6947bb58c
73b5846ba57b63ad7b63a573639c735a946b52946b528c5a4a8c5a4a8452427b5a4a73634a8c7b63ad9c8cdeceb5ffe7ceffffe7ffffeffffff7ffffeffffff7
fffff7fffffffffff7fffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7f7dedebda5
a5735a5a5a42425a42425239425242425242425242424a42424a42424a4a4a4239395252527373739c9494e7dedeffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffefe7ffe7e7f7d6
ced6adada58484b59494e7ded6ffffffffffffffffffffffffe7d6d6bdadadd6c6c6efe7defffffffff7f7ffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efe7e7dededed6ce
dee7def7f7effffffff7fff7fffffffffffffffffffffff7fffffffffff7fffffffffffffffff7f7dececeb5ad9c847b846b5a846352846b5a846352846b5a8c
6b5a94736394735a94736394735a94736394735a94735a94735a9c7363ad8473b58473a57b63a57363946b5a94635a8c5a528c63528c635a9c736bad847bc6a5
9cdebdb5f7d6ceffe7defffff7fffff7fffffffffff7fffff7fffff7fffffffffff7fffff7fffff7fffffffffffffffffffffffffff7fffff7ffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7efdeded6bdbda58c84735a5a4a31315231316b4a4a5a4242523939634a4a5a4a4a5a4a4a524a42524a
4a4a4242524a4a6363638c8c8cc6c6c6fff7f7f7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffe7e7f7ded6e7c6bdc6a59ca5847bbd9c94e7d6ceffffffffffffffffffffffffffff
ffcebdbdc6b5b5dececeffefefffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefefe7dedececedeced6efdedefffffffffffffffffffffff7ffffff
fffffffffffffffffffffffffffff7fffff7fffff7fffffffffff7fff7eff7decee7c6bdceada5bda594ad9484ad8c7ba58473a584739c7b6ba57b6b9c7b63a5
7b6b9c7b6b9c84739c847bad9c8cbda59cd6c6b5e7cec6f7ded6f7e7defffff7fff7f7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffff
ffffffffefffffefffffe7ffffefffffeffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7ded6ad
9494735a526342426342395a39314a29295231315231315a42395239395242394a39314a4239524a425a5a527373739c9c9cd6d6d6ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffefefff
e7e7efd6d6dec6bdc6a5a5bd9494a57b7bbd9c9cefd6d6fffffffffffffffffff7fffffffffffff7efc6b5b5c6b5b5efdedefff7efffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7f7fff7f7efd6dedececee7d6d6fff7f7fffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ffffeffffff7fffff7fffff7fffff7fffffffffff7ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffefffffe7ffffe7ffffeffffff7ffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7ffffffffffffffffffffffffffff
fffffff7ffffefffffdeffffdefff7d6f7f7deffffe7fffff7fffff7fffffffffffffffffffffffffffff7e7e7bda5a5846b6b6b4a526b424a5a31315a31395a
39396342425a39395242395a4a4a736b638c847bbdb5b5f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7ffe7efffdedef7d6d6e7c6c6ceadadad948ca58c849c847bc6ada5ffefe7ffffffff
fffffffffff7fffffffffffffffff7e7e7c6b5b5d6c6c6f7efeffffffffff7f7ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffeff7efde
e7e7d6d6d6cecee7dedef7eff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7fffff7fffff7fffff7fffff7fffffffffff7ffffe7f7ffd6f7f7c6f7f7adefef8cded66bc6bd6bc6bd84ceceade7e7
c6eff7deffffeffffffffffffffffffffffffffffffffffffff7fff7d6debd9ca594737b734a4a73424a6339395a393952393973635a9c948ccebdb5f7e7deff
e7e7ffefeffff7f7fff7f7fff7f7fff7f7fffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffff7ffefefffefefffe7e7ffe7e7
f7d6d6f7d6ceefbdbde7adb5ce9c9cbd94949c7b7b9c7b7bad9c9cded6cefffff7fffffffffff7fffffffffffffffffff7fff7efefe7cec6c6cebdbdefdedeff
f7f7fff7f7ffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefefe7e7ded6d6e7dedee7dedefff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffff
ffeffff7e7f7f7d6efefc6eff7a5dede84cece6bc6c66bd6ce63ded66be7de6be7de73e7e77be7de8ce7e79ce7e7b5eff7c6f7ffceffffd6ffffdeffffe7ffff
f7ffffffffffffffffffffffffe7efdebdbdad8c948c6b73947b7bad9494bdadadc6b5addec6bddec6c6e7ceceefd6d6f7dedef7dedeffe7e7ffe7e7ffefefff
efe7fff7efffefeffff7efffefefffefeffff7effff7f7fff7effffff7fff7effffff7fff7effffff7fffff7fffffffffff7fffffffffff7fffffffffff7ffff
f7fffff7fffff7fff7f7fffff7fff7effff7efffefe7ffe7e7f7dedeffdedef7d6d6f7d6cee7c6bdd6b5adcea59cc69494b57b84a57b7bad8484ceb5adefded6
fffff7fffffffffffffffffffffffffffffffffffffffff7fff7f7ded6d6d6c6c6e7d6d6fff7f7ffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7f7f7efefdedededed6d6ded6d6efe7e7f7eff7ffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffeff7ffefdeefd6d6e7cecedec6c6debdb5d6bd84c6b56bcec673dece6bded66be7de63e7
de6bf7ef63f7ef63f7ef63f7ef6bfff76bf7f76bf7f76befef73f7f77bf7ef8cfff79cf7f7b5ffffc6ffffdeffffe7fffff7fffffffffffffffffffffffff7f7
ffe7e7e7d6d6c6b5b5b5a5a5c6adadc6b5adc6adadc6b5b5ceb5b5d6bdbdcebdbdd6c6c6d6c6bddec6c6dec6c6e7cecee7cecee7d6d6e7d6ceefd6d6e7d6ceef
ded6efd6d6f7dedef7dedeffe7e7f7e7deffe7e7ffe7e7ffefe7ffe7e7ffefe7f7e7deffe7e7ffdedeffdedeffdedeffdedef7d6cef7ceceefc6c6efc6c6e7bd
bde7bdbdd6adadce9c9cb58c8cad8484a57b7bad847ba57b7bc69c9cdebdbdf7dedeffefeffffffffffffffffffffffffffffffffffffffffffffffff7fff7ef
decececebdbddececeffefeffff7ffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7f7efefefe7dededed6d6dededee7dee7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7eff7e7e7efd6d6
dec6cedebdb5c69c94a57b7b8c637b946394ad7b9cce9c84e7bd73f7d673f7de73ffe76bffef6bfff75afff75affff52ffff52ffff52ffff5affff4affff4aff
ff4afff75af7ef63efe773f7ef84efe79cf7efb5f7f7d6ffffe7fffff7fffffffffffffffffffffffffffffffffffffffffffff7f7e7e7e7ded6d6cec6c6b5b5
c6b5adbda5a5bda5a5b5a59cbda5a5ad9c9cad9494a5948cad9494ad9494b59c9cc6a5a5ceada5cea5a5d6ada5d6ada5deb5b5deb5b5e7bdbde7bdbdefc6bde7
bdbdefc6c6e7bdbde7bdbde7bdb5efbdb5e7adadefb5b5e7a5a5dea5a5d69c9cd69c9cc69494bd8c8cad8484b58484ad8484b58c84b5948cc6a5a5ceadadffe7
e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7e7cecedecec6e7ced6ffeff7ffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7eff7efe7e7ded6d6ded6d6ded6d6ef
e7e7f7efeffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7fffffffffff7fffff7f7ffeff7f7dededeced6d6bdc6ceadadb594949c737b8c636b8452738c52738c527b9c5a84a5638cb56b7bb56b6b
d69c63e7b573ffde73ffe76bffef5afff752fff742fff74affff42ffff42ffff31ffff39ffff31ffff42ffff52ffff73ffff7bffef84ffef8cf7efa5f7efbdf7
efcef7f7def7f7eff7f7f7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefe7e7dececed6c6c6bdb5adbdadadb5a59cad9c94
a58c8ca58c8ca58484ad8484b57b7bb57b7bad7373ad7373ad7373b57b7bb57b7bbd8484bd8484bd8484bd8484bd8484bd8484bd8484bd7b7bbd7b7bb5737bbd
7b7bb57b7bbd8484b58484bd8c8cb58c84bd9494c6a5a5debdbdefd6ceffefe7fff7f7fffffffffffffffffffffff7ffffffffffffffffffffffffffffffffff
fffffffff7efefefdedee7c6c6efcecef7d6d6ffefeffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefe7dededed6d6e7dedee7dedeefefe7f7efeffffff7ffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ffffeff7ffe7e7e7d6d6dec6c6ceadbdcea5a5b58c
8c9c737b8c5a7b8c5a738c527b945a7b94527b9c5a7b9c5284ad5a8cb56394bd6b84ad5a6ba55242a55a4ac68463dead73f7ce6bffde6bfff75affff52ffff42
ffff4affff42ffff42ffff42ffff4affff52ffff73ffff8cfff79cffffa5fff7bdffffc6ffffd6ffffdefff7e7f7f7efefeff7f7f7f7f7effff7f7fff7f7ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7efdededececedec6c6ceb5b5ceadadc6a5a5c6a5a5bd9c9c
c69c9cbd9c9cc6a59cbd9494bd9c94bd9494bd9c94bd9494c69c9cbd9494c69c9cc69c9cc6a5a5cea5a5d6b5b5debdbdefceceefd6ceffefe7fff7efffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffefe7e7e7d6d6decec6efd6d6ffdee7fff7f7fff7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7f7f7efefefe7e7e7dededed6cededed6deded6efe7deefefe7fff7f7fffff7ffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffff7fffff7fffff7ffff
f7ffffeff7f7deeff7d6d6debdced6b5bdcea5bdce9cadbd8c9cad7b7b9463738c526b8c4a73944a73944a73945273944a739c52739c4a7b9c5273a54a84b55a
8cb55a8cbd6384b55a7bb5526ba54a63ad5a52a55a52ad6b5ac68c6befc673ffe773ffff5affff5affff52ffff5affff63ffff6bffff73ffff84ffff9cffffbd
ffffceffffd6ffffdeffffefffffeffffffffffffffffffffffffff7fffff7f7f7efeff7f7f7f7f7eff7f7f7f7efeffff7f7fff7f7ffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fff7f7fff7efffefeffff7eff7efe7fff7ef
fff7effff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7f7efefe7e7ded6d6d6cec6dececef7e7e7ffefeffff7f7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7
fff7efefe7dee7e7deded6d6e7ded6e7ded6efe7dee7e7deefefe7efefe7f7f7effff7effffffffffffffffffffffffffffffffffffffffffffffff7ffffffff
fff7fffff7fffff7fffff7fffff7fffff7ffffefffffeff7ffdeeff7d6deefc6d6e7bdc6d6adbdcea5adc694adbd8c9cb57b8ca56b849c5a7b945273944a8cad
637b9c527b9c52739c4a73a54a73a5427bad4a7ba54a7bad5273a54a7bad4a7bad4a84b55a84bd5a8cc66384b55a7bad5273ad4a7bad5273ad5273a55263a563
73bd846bce9c73debd6be7d67bf7ef7bfff784ffff84ffff94ffff9cffffadffffb5ffffd6ffffe7fffff7fffff7ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7f7f7f7f7efefefefefefefefe7e7f7efeff7efeff7f7f7fff7f7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefefefe7e7e7dee7deded6d6ceded6d6e7dedef7efefff
f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fff7effff7efefe7e7efe7dee7ded6ded6ce
d6cec6d6d6ced6cec6d6cececec6bdcec6c6c6c6bdced6c6cecebdd6d6bdd6d6bddedec6dedec6dee7c6d6debdced6b5c6ceadc6ceadbdc6a5bdc69cb5bd94b5
bd949cb57b94ad7384a5637b9c5a73944a73944a6b944a739c4a73944a7ba552739c4a7ba54a94c6637bad4a73a5427bad4a73ad427bb54273ad4273ad426ba5
4273ad4a73ad4a8cc6638cc66384bd6373ad5273ad526ba54a73ad5a7bad5a94bd638cb5638cbd737bb57b63a5734a9c7b63b5a584d6cea5f7f7a5f7ffbdffff
bdffffceffffd6ffffe7ffffeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7
f7f7efefefe7e7e7dededee7dededededee7dedee7dedeefe7e7efe7e7ffefefffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffff
f7f7f7fff7f7efe7e7f7e7efefdedee7d6d6d6ceceded6d6ded6d6efe7e7f7efeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffff7f7f7eff7f7efefefe7efefe7ded6d6cecec6c6bdb5bdbdada5ad94
a5ad8c9ca584a5ad8c9ca5849cad849ca584a5ad849ca57b94a573849463848c5a7b8c528c94638c9c6b8cad6b84a55a7ba55a739c4a739c52739c4a7ba5527b
ad527ba5527bad4a7bad4a7bad4a94ce6b7bad4a73ad4273ad427bb54273ad3973b54273ad427bbd5284bd528cc66384bd6384bd6373ad5a73ad5a73a55a7bb5
6b84b56b8cbd738cbd6b94bd6b8cb56b8cb57b84ad848cb59494c6b5b5ded6cef7f7deffffdeffffe7ffffe7ffffefffffefffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efefefefe7e7e7dedee7dedee7
d6deefdedeefdedeefdedeefdedeefdee7efdedeefe7e7efe7e7f7efefffefeffff7efffefeffff7f7fff7f7fffffffff7f7ffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7efeff7efefefe7e7f7e7e7efdedeefdedeefdedee7d6d6efd6d6f7dedeefdedef7e7e7f7efef
fff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffff7f7eff7f7efefefe7e7e7ced6dec6ced6b5b5c6a5adb5949cad849ca58494a57b9cad84
9cad7b9cad7b94a57394a5738c9c6b94a56b8cad6b94b56b84ad6384ad637ba5527ba55273a5527ba55273a5527bad5273ad4a7bad528cc6637bb55273a5427b
ad4a73ad4273ad426ba5427bb55284bd5a8cbd637bb55a84b56384b56384b56b8cb57394bd8494bd8494bd848cb57b94bd8494c684adce9cbddeadceefcedeef
d6e7f7e7e7f7eff7fffff7fffffffffff7fffff7fffff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7fffff7f7fff7f7f7efeff7efefefe7e7efe7e7efdedeefd6deefd6d6ef
d6deefd6d6f7dedeefd6d6f7dedeefd6d6efdedeefd6def7dedeefdedeefdedeefdedeefe7e7e7dedee7e7e7dee7dee7e7e7dededee7dededededee7dedee7d6
d6e7d6d6e7d6d6efd6d6e7ced6efd6def7d6def7dee7f7dee7ffefefffeff7fff7fffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffff7fffff7ffffeff7ffe7e7efd6e7efced6e7c6d6debdc6d6adc6ceadb5c69cadbd94a5b584a5b58c9cb5849cb57b94bd7b
9cc6849cbd7b9cbd7b94b5738cb56b84ad6384ad63739c527bad5a7ba55a94bd737bad5a7bad5a7ba55a84b5638cbd6b9cc67394c67394c67b94bd7394bd7b8c
b57394b57b94bd84a5c69cadcea5bdd6adbddeb5c6e7bdceefced6f7d6def7d6efffe7f7ffefffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7fffffffffff7fffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fff7f7f7efeff7efeff7e7e7f7e7e7efe7e7f7e7e7ef
e7e7f7e7e7efe7e7f7e7e7efe7e7efe7e7e7e7e7efe7e7efe7e7efe7e7efe7e7f7e7e7efe7e7ffe7eff7e7e7ffefefffefefffeff7ffefeffff7f7fff7f7fff7
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffff
fffffffffffff7fffff7f7ffeff7ffefeff7deefefdee7efcee7efced6e7bdcedebdc6d6adbdd6adb5ce9cadce9ca5bd94a5bd8c9cb5849cbd8494b57b8cad7b
94b57b94b57b9cbd8c94bd8494b57b94b57b94b57badc694adce94b5ce9cb5ce9cbdd6adbdd6add6e7c6d6e7cedeefd6deefd6e7f7dee7f7def7ffefefffeff7
fff7f7fff7fffffff7fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffff
fffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fff7fffffffffffffffffffffffffffffffffffffffffff7fff7fffffff7fff7fffffff7f7f7fffffffff7f7fffffffff7f7ff
fffffff7f7fffffffff7f7fffffffff7f7fffffffff7f7fffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffff
fffffff7fffff7f7ffe7f7ffe7f7ffe7efffe7eff7deeff7dee7efdee7efd6d6e7cedeefcecedec6deefcecedec6d6efcecee7c6deefced6e7cee7f7dee7efde
eff7deeff7def7ffe7f7ffe7f7ffeff7ffeffffff7fffff7fffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffff7fffffffffff7
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffff7ff
f7fffffffffff7fffffff7fff7f7fff7f7fff7f7fff7f7ffeff7ffeff7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffff7fffff7fffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000040000002701ffff030000000000}}}{\b\insrsid4986471 
\par LICENCE GRANTED UNDER 
\par 
\par THE TANZANIA COMMUNICATIONS ACT, 1993 AND THE TANZANIA
\par }\pard \ql \fi720\li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 {\b\insrsid4986471 COMMUNICATIONS REGULATORY AUTHORITY ACT, 2003
\par }\pard \qc \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 {
\b\insrsid4986471 
\par BY THE TANZANIA COMMUNICATIONS REGULATORY AUTHORITY
\par 
\par 
\par TO
\par }\pard\plain \s1\ql \fi720\li0\ri0\sl360\slmult1\keepn\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 
\aspalpha\aspnum\faauto\outlinelevel0\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid4986471 
\par }\pard\plain \qc \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs36\insrsid10254463 <?php echo $name; ?>}{\b\fs36\insrsid4986471 
\par }{\b\fs36\insrsid4986471\charrsid11106095 
\par }\pard\plain \s2\qc \li0\ri0\sl360\slmult1\keepn\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 
\aspalpha\aspnum\faauto\outlinelevel1\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 \b\f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid4986471 FOR
\par }\pard\plain \qc \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid4986471 
\par THE PROVISION OF NATIONAL NETWORK FACILITIES IN THE 
\par UNITED REPUBLIC OF TANZANIA
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 {
\insrsid4986471 
\par 
\par 
\par 
\par 
\par 
\par }\pard \qc \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp20 \brdrl\brdrtnthtnmg\brdrw60\brsp80 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid4986471 {
\b\insrsid1317591 DATE: }{\b\insrsid10254463 <?php echo $issue_date; ?>}{\b\insrsid4986471 
\par 
\par 
\par 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }\pard\plain \s16\qj \li0\ri0\sl440\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid4986471 
LICENCE GRANTED BY THE TANZANIA COMMUNICATIONS REGULATORY AUTHORITY TO }{\b\fs24\insrsid10254463 <?php echo $name; ?>}{\b\fs24\insrsid1317591  }{\b\fs24\insrsid4986471 FOR PROVISION OF NATIONAL NETWORK FACILITIES 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid4986471 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.0\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\ul\insrsid4986471 DEFINITION
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }\pard\plain \s16\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid4986471 
In this licence, unless stated otherwise or the context otherwise requires:-
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.1\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\fs24\insrsid4986471 \'93Acts\'94}{\fs24\insrsid4986471  means the Tanzania Communications Regulatory Authority Act No.12 of 2003 and the Tanzania Communications Act No.18 of 1993;
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.2\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\fs24\insrsid4986471 \'93Application Fees\'94 }{\fs24\insrsid4986471 means a fee paid by an applicant when applying for a licence;
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.3\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\fs24\insrsid4986471 \'93Authority\'94}{\fs24\insrsid4986471  means the Tanzania Communications Regulatory Authority;
\par }\pard\plain \s17\qj \li1440\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.4\tab}}\pard\plain \s16\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid4986471 \'93Initial Licence Fees\'94 }{\fs24\insrsid4986471 
means the once off fee paid to the Authority for the grant of the Licence;
\par }\pard \s16\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.5\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\fs24\insrsid4986471 \'93Licence\'94 }{\fs24\insrsid4986471 means authority to construct, provide, own and make available Network Facilities;}{\fs24\ul\insrsid4986471\charrsid14563356 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\ul\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.6\tab}}\pard \s16\qj \fi-900\li900\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin900\itap0\pararsid4986471 {
\b\fs24\insrsid4986471 \'93Licensee\'94}{\fs24\insrsid4986471  means }{\fs24\insrsid10254463 <?php echo $name; ?>}{\b\fs24\ul\insrsid4986471\charrsid11106095 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.7\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\fs24\insrsid4986471  \'93Network Facilities\'94}{\fs24\insrsid4986471  means any element, or combination of elements of 
\par }\pard \s16\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471 \tab physical infrastructure used principally for, or in connection with, the provision of \tab 
network services, but does not include customer premise equipment;
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.8\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx0\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\fs24\insrsid4986471 \'93Network Facilities Services\'94}{\fs24\insrsid4986471  means any operation of a fixed or mobile network separate or in combination;}{\b\fs24\insrsid4986471 
\par }\pard \s16\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\b\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 1.9\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\fs24\insrsid4986471 \'93Royalty\'94}{\fs24\insrsid4986471  means a charge paid to the Authority for providing licenced services.
\par }\pard\plain \qj \li0\ri0\widctlpar\tx720\faauto\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cf1\lang1033\langfe1033\langnp1033\insrsid4986471 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 2.0\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\ul\insrsid4986471 SCOPE OF THE LICENCE
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 2.1.\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls2\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\insrsid4986471 In accordance with Section 6 of the Tanzania Communications Regulatory Authority Act, 2003 and Section 11 of the Tanzania Communications Act, 1993, the Authority hereby grants a Licence to}{\b\insrsid4986471  }{\b\insrsid10254463 <?php echo $name; ?>}{
\insrsid4986471  to provide National Network Facilities in the United Republic of Tanzania.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\insrsid4986471 2.2.\tab 
The Licensee is authorized to operate in the United Republic of Tanzania and provide National Network Facilities as contained in }{\b\insrsid4986471 Appendix I - Roll out Plan for  National Network  Facilities.}{\insrsid4986471 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 2.3\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls9\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\insrsid4986471 The Licensee shall be required to submit annually to the Authority updated roll out plans on the provision of its services.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 3.0\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\b\ul\insrsid4986471 DURATION AND RENEWAL OF THE LICENCE
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }\pard\plain \s19\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid4986471 3.1.\tab This Licence is granted on }{
\b\fs24\insrsid10254463 <?php echo $effective_date; ?>}{\b\fs24\insrsid4986471  }{\fs24\insrsid4986471 (\'93the Effective Date\'94) to the Licensee for a period of <?php echo $duration;?> years (\'93the licence period\'94).
\par 
\par {\listtext\pard\plain\s20 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 3.2.\tab}}\pard\plain \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls5\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid4986471 
One year prior to the expiry of the Licence period, the Licensee shall apply to the Authority for the renewal of this Licence.
\par }\pard \s20\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par {\listtext\pard\plain\s20 \f35\cf1\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 3.3.\tab}}\pard \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls5\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {\cf1\insrsid4986471 The Authority shall renew the L}{\cf1\insrsid4986471\charrsid1794013 icence in accordance with the Tanzania Communications Regulatory
 Authority Act, 2003}{\cf1\insrsid4986471  and the Tanzania Communications Act, 1993}{\cf1\insrsid4986471\charrsid1794013  on substantially the same terms and conditions as those applicable to the }{\cf1\insrsid4986471 L}{
\cf1\insrsid4986471\charrsid1794013 icensee during the preceding }{\cf1\insrsid4986471 L}{\cf1\insrsid4986471\charrsid1794013 i}{\cf1\insrsid4986471 cence period provided that the L}{\cf1\insrsid4986471\charrsid1794013 
icensee has not been in material breach of the }{\cf1\insrsid4986471 L}{\cf1\insrsid4986471\charrsid1794013 icence conditions}{\cf1\insrsid4986471 .}{\cf1\insrsid4986471\charrsid1794013 
\par }\pard \s20\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471  
\par {\listtext\pard\plain\s20 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 3.4.\tab}}\pard \s20\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls5\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\insrsid4986471 This Licence shall terminate upon expiry of the licence period if it is not renewed.
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid4986471 
\par }{\b\insrsid4986471 4.0\tab }{\b\ul\insrsid4986471 OWNERSHIP AND CORPORATE OBLIGATION
\par }\pard\plain \s16\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid4986471 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 4.1. \tab The Licensee\rquote s shareholding structure is as contained in }{\b\fs24\insrsid4986471 Appendix II.}{
\fs24\insrsid4986471 
\par 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 4.2\tab}}\pard \s16\qj \fi-1440\li1440\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin1440\itap0\pararsid4986471 
{\fs24\insrsid4986471 The Licensee shall comply with the following conditions on ownership:-
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 4.2.1\tab}}\pard \s16\qj \fi-720\li1440\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl2\adjustright\rin0\lin1440\itap0\pararsid4986471 {\fs24\insrsid4986471 to notify the Authority in writing of any changes to its ownership and control structure;
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 4.2.2\tab}}\pard \s16\qj \fi-720\li1440\ri0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls4\ilvl2\adjustright\rin0\lin1440\itap0\pararsid4986471 {\fs24\insrsid4986471 to notify the Authority of any joint venture into which it enters with any:-
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 (a)\tab}}\pard \s16\qj \li1440\ri0\widctlpar\jclisttab\tx1440\aspalpha\aspnum\faauto\ls3\adjustright\rin0\lin1440\itap0\pararsid4986471 {
\fs24\insrsid4986471 person; or 
\par }\pard \s16\qj \li1080\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1080\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 (b)\tab}}\pard \s16\qj \li1440\ri0\widctlpar\jclisttab\tx1440\aspalpha\aspnum\faauto\ls3\adjustright\rin0\lin1440\itap0\pararsid4986471 {
\fs24\insrsid4986471 entity holding a licence issued by the Authority.
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }{\b\fs24\insrsid4986471 5}{\b\fs24\insrsid4986471\charrsid8658394 .0\tab }{\b\fs24\ul\insrsid4986471\charrsid8658394 LICENCE FEES}{\b\fs24\insrsid4986471\charrsid8658394 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cf1\insrsid4986471\charrsid14575816 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 5.1\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls6\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\insrsid4986471 The Licensee shall in respect of the National Network Facilities Licence be required to pay the Authority the following:-}{\cf1\insrsid4986471\charrsid5451980 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\cf1\insrsid4986471\charrsid10424978 
\par }\pard\plain \s18\qj \fi-720\li1440\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid4986471 5.1.1\tab Application fee of }{
\b\fs24\insrsid4986471\charrsid10713440 USD <?php echo number_format($fee->application_fee,2); ?>} {\fs24\insrsid4986471 
\par 
\par 5.1.2\tab Initial licence fee of }{\b\fs24\insrsid4986471 USD <?php echo number_format($fee->initial_fee,2); ?>;
\par }{\fs24\insrsid4986471 
\par 5.1.3}{\b\fs24\insrsid4986471\charrsid10713440 \tab <?php echo $annualFee;?>;
\par }{\fs24\insrsid4986471\charrsid11235215 
\par }\pard \s18\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471\charrsid10424978 5.}{\fs24\insrsid4986471 2\tab }{\fs24\insrsid4986471\charrsid10424978 The royalty shall }{
\fs24\insrsid4986471 comprise of income received from licenced services during the operating year and shall exclude }{\fs24\insrsid4986471\charrsid10424978 interconnection}{\fs24\insrsid4986471 
 charges and other charges as may be agreed between the Licensee and the Authority}{\fs24\insrsid4986471\charrsid10424978 .
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cf1\insrsid4986471\charrsid14575816 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\cf1\insrsid4986471 5.3\tab }{\cf1\insrsid4986471\charrsid14575816 The above royalty fee shall be paid quarterly in arrears. Any royalty }{
\cf1\insrsid4986471 fee }{\cf1\insrsid4986471\charrsid14575816 delayed for }{\insrsid4986471 more than thirty (30) days shall attract an interest at prevailing official bank lending rate.}{\b\insrsid4986471\charrsid3104016  }{\b\insrsid4986471 
\par }{\b\insrsid4986471\charrsid3104016 
\par {\listtext\pard\plain\s18 \b\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 6.0.\tab}}\pard\plain \s18\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\tx2280\aspalpha\aspnum\faauto\ls7\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\ul\insrsid4986471 AUDITED  ACCOUNTS
\par }\pard \s18\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471 The Licensee shall be required to prepare and submit to the Authority audited accounts on an annual basis 
within ninety (90) days immediately after the end of the financial year of the Licensee.
\par }\pard \s18\qj \li750\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin750\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\b\fs24\insrsid4986471\charrsid11081836 7.0}{\b\fs24\insrsid4986471      }{\b\fs24\ul\insrsid4986471\charrsid11081836 REQUIREMENT}{
\b\fs24\ul\insrsid4986471  TO PROVIDE INFORMATION}{\b\fs24\insrsid4986471 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471\charrsid12602421 
\par }\pard \s18\qj \fi-750\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 7.1\tab }{\fs24\cf1\insrsid4986471\charrsid12602421 
The Licensee shall be required to maintain financial records in accordance with good accounting practises and shall make the books and records of accounts available for inspection by the Authority}{\fs24\cf1\insrsid4986471 .}{
\fs24\cf1\insrsid4986471\charrsid12602421 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx720\tx3675\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }\pard \s18\qj \fi-750\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471 7.2\tab The Licensee shall be required to submit to the Autho
rity on an annual basis within 90 days immediately after the end of the financial year of the Licensee the following information: -
\par }\pard \s18\qj \li750\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin750\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par {\listtext\pard\plain\s18 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 7.2.1\tab}}\pard \s18\qj \li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls8\ilvl2\adjustright\rin0\lin720\itap0\pararsid4986471 {
\fs24\insrsid4986471 annual reports
\par {\listtext\pard\plain\s18 \f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 7.2.2\tab}audited financial statements
\par }\pard \s18\qj \fi720\li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 7.2.2\tab geographical and population coverage 
\par }\pard \s18\qj \li1440\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\b\fs24\insrsid4986471\charrsid11081836 8.0    }{\b\fs24\ul\insrsid4986471 QUALITY OF SERVICES
\par }{\b\fs24\insrsid4986471\charrsid12125030 
\par }\pard\plain \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid4986471 \tab }{\insrsid4986471\charrsid12125030 T}{\insrsid4986471 
o the extent practicable, the}{\insrsid4986471\charrsid12125030  Licensee shall }{\insrsid4986471 provide net}{\insrsid4986471\charrsid12125030 work }{\insrsid4986471 facility services }{\insrsid4986471\charrsid12125030 on }{\insrsid4986471 a }{
\insrsid4986471\charrsid12125030 24 hours per day, seven (7) days per week basis, without interruption except as necessary to perform routine}{\insrsid4986471  }{\insrsid4986471\charrsid12125030 maintenance during periods likely to result in the }{
\insrsid4986471 \tab }{\insrsid4986471\charrsid12125030 minimum disruption to service, in accordance with applicable international }{\insrsid4986471 \tab }{\insrsid4986471\charrsid12125030 technological and operating standards}{\insrsid4986471 .
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }\pard\plain \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid4986471\charrsid11081836 9.0     }{\b\fs24\ul\insrsid4986471 
MODIFICATION OF THIS LICENCE
\par }{\b\fs24\ul\cf1\insrsid4986471\charrsid12602421 
\par }\pard \s18\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 9.1\tab M}{\fs24\cf1\insrsid4986471\charrsid12602421 
odification of the terms and conditions of this Licence together with its Appendices may only be made by agreement between the Licensee and the Authority}{\fs24\cf1\insrsid4986471 .}{\fs24\cf1\insrsid4986471\charrsid12602421 
\par }{\fs24\cf1\insrsid4986471 9.2\tab }{\fs24\cf1\insrsid4986471\charrsid12602421 Each party shall give due consideration to the request for an amendment by}{\fs24\cf1\insrsid4986471  the }{\fs24\cf1\insrsid4986471\charrsid12602421 other party}{
\fs24\cf1\insrsid4986471 .}{\b\fs24\cf1\insrsid4986471\charrsid12602421 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx1440\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\b\fs24\insrsid4986471  
\par 
\par 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx720\tx1440\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\b\fs24\insrsid4986471\charrsid11081836 10.0  }{\b\fs24\ul\insrsid4986471 COMPLIANCE WITH THE LAW}{\b\fs24\insrsid4986471 
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\b\fs24\ul\insrsid4986471 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471 The Licensee shall comply with the provisions of the Acts and other laws of the United Republic of Tanzania.
\par }{\insrsid4986471 
\par }\pard\plain \ql \li0\ri0\sl360\slmult0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid4986471\charrsid11081836 11.0  }{
\b\ul\insrsid4986471\charrsid686103 COMPLIANCE WITH}{\b\ul\insrsid4986471  }{\b\ul\insrsid4986471\charrsid686103 REGULATORY REQUIREMENTS
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\insrsid4986471 The Licensee shall comply with all conditions stipulated in this lice
nce and other regulatory requirements provided under Regulations and Rules issued under the Acts.
\par 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\b\insrsid4986471\charrsid11081836 12.0  }{\b\ul\insrsid4986471\charrsid686103 INDEMNITY
\par }{\insrsid4986471 
\par }\pard\plain \s17\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid4986471 
The Licensee shall indemnify the Authority against any claims or proceedings arising from any breach or failings on the part of the Licensee in relation to this licence.
\par 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid4986471\charrsid11081836 13.0  }{\b\ul\insrsid4986471 SAFETY MEASURES
\par }{\insrsid4986471 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\insrsid4986471 The Licensee shall in respect of 
services operated, maintained or offered under this licence take proper and adequate safety measures to safeguard life or property, including exposure to any electrical emissions or radiations emanating from equipment or installation from such operations.

\par 
\par }\pard\plain \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid4986471 14.0    }{\b\fs24\ul\insrsid4986471 PROVISION OF NETWORK FACILITIES

\par 
\par }\pard \s17\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\insrsid4986471 14.1\tab 
The Licensee shall provide network facilities in accordance with the applicable recommendations of the International Telecommunication Union, other International standardisation bodies and any relevant regulations.}{
\fs24\cf1\insrsid4986471\charrsid223700 
\par }\pard \s17\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471\charrsid223700 
\par }\pard \s17\qj \fi-750\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 14.2\tab }{\fs24\cf1\insrsid4986471\charrsid686103 The Licensee shall provide network facilities as}{
\fs24\cf1\insrsid4986471  contained in its }{\fs24\cf1\insrsid4986471\charrsid686103 Roll-out plan }{\fs24\cf1\insrsid4986471 \endash International Facilities as }{\fs24\cf1\insrsid4986471\charrsid686103 
contained in Appendix 1(a) within a maximum period of six (6) months from the date }{\fs24\cf1\insrsid4986471 of commencement of this licence.
\par }\pard \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 
\par }\pard \s17\qj \fi-750\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 14.3\tab }{\fs24\cf1\insrsid4986471\charrsid686103 The Licensee 
shall not be required to provide network facilities where i}{\fs24\insrsid4986471 n the Authority\rquote s view it is not reasonable to require the Licensee to provide the facilities, including, but not limited to the following circumstances: -
\par }\pard \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }\pard \s17\qj \fi720\li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 14.3.1\tab   where it is beyond the Licensee\rquote s control;
\par 
\par }\pard \s17\qj \fi-720\li1440\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid4986471 {\fs24\insrsid4986471 14.3.2\tab   where it would expose any person engaged in the provision of        
\par             Network services to undue risk to health or safety; or
\par 
\par }\pard \s17\qj \fi720\li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 14.3.3   where it is not reasonably practicable.
\par 
\par 
\par 
\par }\pard \s17\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\insrsid4986471 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid4986471\charrsid11081836 15.0   }{\b\ul\insrsid4986471 
UNIVERSAL SERVICE OBLIGATION}{\b\insrsid4986471 
\par }{\insrsid4986471 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\insrsid4986471 The Lic
ensee shall comply with the Universal Service/access obligations as may be provided for under the laws of the United Republic of Tanzania.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }{\b\insrsid4986471\charrsid223700 1}{\b\insrsid4986471 6}{\b\insrsid4986471\charrsid223700 .0\tab }{\b\ul\insrsid4986471 HUMAN RESOURCE DEVELOPMENT
\par }{\insrsid4986471 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\insrsid4986471 16.1\tab The Licensee shall submit to the Authority the Human Resource Development Plan
 outlining strategies towards empowerment of its local staff.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471  
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\insrsid4986471\charrsid12674341 1}{\insrsid4986471 6}{\insrsid4986471\charrsid12674341 .2\tab }{\insrsid4986471 
The Licensee shall annually furnish the Authority the report of implementation of the Human Resource Development Plan.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid4986471 \hich\af35\dbch\af0\loch\f35 16.3\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls10\ilvl1\adjustright\rin0\lin720\itap0\pararsid4986471 {
\insrsid4986471 The Licensee shall facilitate participation of its technical staff in training within or outside the United Republic of Tanzania.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }\pard\plain \s18\qj \li0\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\cf1\insrsid4986471\charrsid8521293 17.0   }{
\b\fs24\ul\cf1\insrsid4986471 MAJORITY OWNERSHIP
\par }{\fs24\cf1\insrsid4986471 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 
The Majority Shareholder of the Licensee shall not transfer, assign any beneficial interest in dispose of or in any manner alienate its share ownership in the L
icence for a period of five (5) years after the commencement of the licensed services without the prior written consent of the Regulatory Authority.
\par }\pard \s18\qj \li0\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 
\par }{\b\fs24\cf1\insrsid4986471\charrsid8521293 18.0   }{\b\fs24\ul\cf1\insrsid4986471 GUARANTEE OF PERFORMANCE
\par }{\fs24\cf1\insrsid4986471 
\par }\pard \s18\qj \li720\ri0\widctlpar\tx2280\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid4986471 {\fs24\cf1\insrsid4986471 The Majority shareholder hereby guarantees the performa
nce of the Licensee in accordance with the terms and conditions of this Licence, for the duration of the Licence and shall execute a guarantee agreement with the Authority.
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid4986471 
\par 
\par }{\b\insrsid4986471 ISSUED A}{\b\insrsid1317591 T DAR ES SALAAM ON THIS }{\b\insrsid10254463 <?php echo $issue_day; ?> DAY OF <?php echo $issue_month; ?>, <?php echo $issue_year; ?>}{\b\insrsid4986471 
\par 
\par 
\par 
\par \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85
\par PROF. JOHN S. NKOMA}{\b\insrsid4986471\charrsid483090 
\par }{\b\insrsid4986471 DIRECTOR GENERAL
\par TANZANIA COMMUNICATIONS REGULATORY AUTHORITY
\par 
\par 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\b\insrsid4986471 
\par \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85
\par IN THE PRESENCE OF THE SECRETARY TO THE BOARD
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par }{\insrsid4986471\charrsid15808461 
\par }{\insrsid4986471 
\par }{\b\insrsid4986471\charrsid7738871 APPENDIX I: }{\b\insrsid1317591  \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85.}{\b\insrsid4986471\charrsid7738871  ROLL OUT PLAN \endash  NETWORK FACILITY}{\b\insrsid4986471 
\par }{\b\insrsid4986471\charrsid7738871 
\par }\trowd \irow0\irowband0\ts11\trgaph108\trrh415\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\b\insrsid4986471\charrsid16610451 Facility\cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\b\insrsid4986471\charrsid16610451 Status\cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\b\insrsid4986471\charrsid16610451 *Capacity \cell Plan/Timeframe\cell Area\cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {
\b\insrsid4986471\charrsid16610451 \trowd \irow0\irowband0\ts11\trgaph108\trrh415\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv
\brdrs\brdrw10\brdrcf1 \trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb
\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\row }\trowd \irow1\irowband1\ts11\trgaph108\trrh1169\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 Switch Centres
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid4986471\charrsid16610451 
\trowd \irow1\irowband1\ts11\trgaph108\trrh1169\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\row }\trowd \irow2\irowband2\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 Microwave
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid4986471\charrsid16610451 
\trowd \irow2\irowband2\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\row }\trowd \irow3\irowband3\ts11\trgaph108\trrh710\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 Metro
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid4986471\charrsid16610451 
\trowd \irow3\irowband3\ts11\trgaph108\trrh710\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\row }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 Spurs
\par }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid1317591 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard 
\qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid4986471\charrsid16610451 \trowd \irow4\irowband4\ts11\trgaph108\trrh710\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 
\trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\row }\trowd \irow5\irowband5\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 Tower
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid4986471\charrsid16610451 
\trowd \irow5\irowband5\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\row }\trowd \irow6\irowband6\lastrow \ts11\trgaph108\trrh1016\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 VSAT connection
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {
\fs18\insrsid4986471\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid4986471 {\fs18\insrsid4986471\charrsid16341212 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid4986471\charrsid16341212 
\trowd \irow6\irowband6\lastrow \ts11\trgaph108\trrh1016\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth10031\trftsWidthB3\trftsWidthA3\trautofit1\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 
\clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2559\clshdrawnil \cellx2305\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth1163\clshdrawnil \cellx3451\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1308\clshdrawnil \cellx4856
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1888\clshdrawnil \cellx7040\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth3113\clshdrawnil \cellx9923\row }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {
\i\fs16\insrsid4986471\charrsid3692134 
\par }{\insrsid4986471 
\par }{\lang1033\langfe1033\langnp1033\insrsid4986471 
\par 
\par 
\par }{\lang1033\langfe1033\langnp1033\insrsid4986471\charrsid15273744 
\par }{\insrsid4986471 
\par }{\insrsid1317591 
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
\par }{\insrsid4986471 
\par }\pard \ql \fi-2700\li2700\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin2700\itap0\pararsid4986471 {\b\insrsid4986471             }{\b\insrsid4986471\charrsid5927355 APPENDIX II: }{\b\insrsid4986471  }{\b\insrsid1317591 \'85\'85\'85\'85\'85
\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85}{\b\insrsid4986471\charrsid10623340  SHAREHOLDING STRUCTURE}{\insrsid4986471\charrsid15273744 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid4986471 {\insrsid4986471 
\par }{\insrsid4986471\charrsid8526072 
\par }{\lang1053\langfe1033\langnp1053\insrsid4986471\charrsid14170310 
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
\par }\pard \qj \li0\ri0\widctlpar\faauto\rin0\lin0\itap0\pararsid4986471 {\b\lang1053\langfe1033\langnp1053\insrsid4986471\charrsid14170310 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 {\insrsid4986471 
\par }}
