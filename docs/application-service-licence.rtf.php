<?php

header("Pragma: public");
header("Expires: 0");
header("Content-Type: application/rtf");
header("Content-Disposition: attachment;filename=application-service-licence.rtf");
$id= $_REQUEST['id'];

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

if (!empty($licenceApplication->issue_date)){
	$issue_time=strtotime($licenceApplication->issue_date);
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
if (!empty($licenceApplication->effective_date)){
	$effective_date=date('d M Y',strtotime($licenceApplication->effective_date));
}else
	$effective_date='';

$fee=$licenceApplication->getFee();
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
\red128\green128\blue0;\red128\green128\blue128;\red192\green192\blue192;}{\stylesheet{\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \snext0 \styrsid13119378 Normal;}
{\*\cs10 \additive \ssemihidden Default Paragraph Font;}{\*\ts11\tsrowd\trftsWidthB3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tscellwidthfts0\tsvertalt\tsbrdrt\tsbrdrl\tsbrdrb\tsbrdrr\tsbrdrdgl\tsbrdrdgr\tsbrdrh\tsbrdrv 
\ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \fs20\lang1024\langfe1024\cgrid\langnp1024\langfenp1024 \snext11 \ssemihidden Normal Table;}{\s15\qc \li0\ri0\sl360\slmult1
\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext15 \styrsid13119378 Title;}{\s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 
\f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext16 \styrsid13119378 Body Text;}{\s17\ql \li0\ri0\widctlpar\tqc\tx4153\tqr\tx8306\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 
\f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext17 \styrsid13119378 footer;}{\*\cs18 \additive \sbasedon10 \styrsid13119378 page number;}{\s19\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0 
\f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext19 \styrsid13119378 Body Text Indent;}{\s20\qj \li1440\ri0\widctlpar\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0 
\f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext20 \styrsid13119378 Body Text Indent 2;}{\s21\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0 
\f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext21 \styrsid13119378 Body Text Indent 3;}{\s22\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 
\f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext22 \styrsid13119378 Body Text 2;}{\s23\ql \li0\ri0\widctlpar\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 
\f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 \sbasedon0 \snext23 \styrsid13119378 header;}}{\*\latentstyles\lsdstimax156\lsdlockeddef0}{\*\listtable{\list\listtemplateid58995994{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\ulnone\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\ulnone\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers
\'01\'03\'05;}\ulnone\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}
\ulnone\fbias0 \fi-1440\li3600\jclisttab\tx3600\lin3600 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\ulnone\fbias0 
\fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\ulnone\fbias0 
\fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\ulnone\fbias0 
\fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\ulnone\fbias0 \fi-2520\li7560\jclisttab\tx7560\lin7560 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\ulnone\fbias0 \fi-2880\li8640\jclisttab\tx8640\lin8640 }{\listname ;}\listid100299806}{\list\listtemplateid711777254{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat8\levelspace0
\levelindent0{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}
\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li2520
\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li3240\jclisttab\tx3240\lin3240 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li8280\jclisttab\tx8280\lin8280 }
{\listname ;}\listid381364583}{\list\listtemplateid1215173286{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat16\levelspace0\levelindent0{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\b0\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0
\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li3240\jclisttab\tx3240\lin3240 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li8280\jclisttab\tx8280\lin8280 }{\listname ;}\listid408767127}{\list\listtemplateid1689807948{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\b0\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat5
\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\b0\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\b0\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers
\'01\'03\'05\'07;}\b0\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}
\b0\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\b0\fbias0 
\fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\b0\fbias0 
\fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\b0\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\b0\fbias0 \fi-2520\li2520\jclisttab\tx2520\lin2520 }{\listname ;}\listid1169904022}{\list\listtemplateid1922610718{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat3\levelspace0
\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat4\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}
\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid1396510173}
{\list\listtemplateid-683356682{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat4\levelspace0\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-360\li360\jclisttab\tx360\lin360 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li3240\jclisttab\tx3240\lin3240 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1440\li5040\jclisttab\tx5040\lin5040 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li6120\jclisttab\tx6120\lin6120 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li7920\jclisttab\tx7920\lin7920 }{\listname ;}\listid1522087795}{\list\listtemplateid1480200714{\listlevel\levelnfc0
\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat15\levelspace0\levelindent0{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li2520\jclisttab\tx2520\lin2520 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers
\'01\'03\'05\'07;}\fbias0 \fi-1080\li3240\jclisttab\tx3240\lin3240 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}
\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 
\fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 
\fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}
\fbias0 \fi-2160\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers
\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li8280\jclisttab\tx8280\lin8280 }{\listname ;}\listid1674062694}{\list\listtemplateid1166596320{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat6\levelspace0\levelindent0
{\leveltext\'03\'00.0;}{\levelnumbers\'01;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 
\fi-720\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-1080\li2520\jclisttab\tx2520\lin2520 }
{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li3240\jclisttab\tx3240\lin3240 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1800\li5400\jclisttab\tx5400\lin5400 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-2160\li6480\jclisttab\tx6480\lin6480 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0
\levelstartat1\levelspace0\levelindent0{\leveltext\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2520\li8280\jclisttab\tx8280\lin8280 }{\listname ;}\listid1714501012}
{\list\listtemplateid1146794580{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat15\levelspace0\levelindent0{\leveltext\'01\'00;}{\levelnumbers\'01;}\fbias0 \fi-465\li465\jclisttab\tx465\lin465 }{\listlevel\levelnfc0\levelnfcn0
\leveljc0\leveljcn0\levelfollow0\levelstartat2\levelspace0\levelindent0{\leveltext\'03\'00.\'01;}{\levelnumbers\'01\'03;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\'05\'00.\'01.\'02;}{\levelnumbers\'01\'03\'05;}\fbias0 \fi-720\li720\jclisttab\tx720\lin720 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'07\'00.\'01.\'02.\'03;}{\levelnumbers\'01\'03\'05\'07;}\fbias0 \fi-1080\li1080\jclisttab\tx1080\lin1080 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'09\'00.\'01.\'02.\'03.\'04;}{\levelnumbers\'01\'03\'05\'07\'09;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0b\'00.\'01.\'02.\'03.\'04.\'05;}{\levelnumbers\'01\'03\'05\'07\'09\'0b;}\fbias0 \fi-1440\li1440\jclisttab\tx1440\lin1440 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0d\'00.\'01.\'02.\'03.\'04.\'05.\'06;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d;}\fbias0 \fi-1800\li1800\jclisttab\tx1800\lin1800 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\'0f\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0
{\leveltext\'11\'00.\'01.\'02.\'03.\'04.\'05.\'06.\'07.\'08;}{\levelnumbers\'01\'03\'05\'07\'09\'0b\'0d\'0f\'11;}\fbias0 \fi-2160\li2160\jclisttab\tx2160\lin2160 }{\listname ;}\listid1907647335}{\list\listtemplateid1997014980\listhybrid{\listlevel
\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid-458712810\'03(\'00);}{\levelnumbers\'02;}\fbias0 \fi-360\li2160\jclisttab\tx2160\lin2160 }{\listlevel\levelnfc4\levelnfcn4\leveljc0
\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698713\'02\'01.;}{\levelnumbers\'01;}\fi-360\li2880\jclisttab\tx2880\lin2880 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2\levelfollow0\levelstartat1
\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'02.;}{\levelnumbers\'01;}\fi-180\li3600\jclisttab\tx3600\lin3600 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext
\leveltemplateid67698703\'02\'03.;}{\levelnumbers\'01;}\fi-360\li4320\jclisttab\tx4320\lin4320 }{\listlevel\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698713
\'02\'04.;}{\levelnumbers\'01;}\fi-360\li5040\jclisttab\tx5040\lin5040 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'05.;}{\levelnumbers\'01;}\fi-180\li5760
\jclisttab\tx5760\lin5760 }{\listlevel\levelnfc0\levelnfcn0\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698703\'02\'06.;}{\levelnumbers\'01;}\fi-360\li6480\jclisttab\tx6480\lin6480 }{\listlevel
\levelnfc4\levelnfcn4\leveljc0\leveljcn0\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698713\'02\'07.;}{\levelnumbers\'01;}\fi-360\li7200\jclisttab\tx7200\lin7200 }{\listlevel\levelnfc2\levelnfcn2\leveljc2\leveljcn2
\levelfollow0\levelstartat1\levelspace0\levelindent0{\leveltext\leveltemplateid67698715\'02\'08.;}{\levelnumbers\'01;}\fi-180\li7920\jclisttab\tx7920\lin7920 }{\listname ;}\listid1986279671}}{\*\listoverridetable{\listoverride\listid100299806
\listoverridecount0\ls1}{\listoverride\listid1986279671\listoverridecount0\ls2}{\listoverride\listid1522087795\listoverridecount0\ls3}{\listoverride\listid408767127\listoverridecount0\ls4}{\listoverride\listid1714501012\listoverridecount0\ls5}
{\listoverride\listid1396510173\listoverridecount0\ls6}{\listoverride\listid1674062694\listoverridecount0\ls7}{\listoverride\listid1907647335\listoverridecount0\ls8}{\listoverride\listid1169904022\listoverridecount0\ls9}{\listoverride\listid381364583
\listoverridecount0\ls10}}{\*\rsidtbl \rsid1202761\rsid2449985\rsid3556907\rsid3635960\rsid3692134\rsid4478843\rsid6177917\rsid6443863\rsid7422586\rsid7478924\rsid7488377\rsid7738871\rsid10882457\rsid11098193\rsid11229394\rsid11487367\rsid11617977
\rsid12925215\rsid13119378\rsid13637875\rsid14241816\rsid15742151\rsid15929359\rsid16599735\rsid16610451}{\*\generator Microsoft Word 11.0.5604;}{\info{\title THE UNITED REPUBLIC OF TANZANIA}{\author user}{\operator Mohamed Manja}
{\creatim\yr2010\mo2\dy26\hr11\min26}{\revtim\yr2010\mo2\dy27\hr8\min39}{\version5}{\edmins11}{\nofpages8}{\nofwords1262}{\nofchars7198}{\*\company tcra}{\nofcharsws8444}{\vern24689}}\paperw11906\paperh16838\margr1466\margt1080\margb1134 
\widowctrl\ftnbj\aenddoc\pgnstart0\noxlattoyen\expshrtn\noultrlspc\dntblnsbdb\nospaceforul\hyphcaps0\formshade\horzdoc\dgmargin\dghspace180\dgvspace180\dghorigin1800\dgvorigin1080\dghshow1\dgvshow1
\jexpand\viewkind1\viewscale100\pgbrdrhead\pgbrdrfoot\splytwnine\ftnlytwnine\htmautsp\nolnhtadjtbl\useltbaln\alntblind\lytcalctblwd\lyttblrtgr\lnbrkrule\nobrkwrptbl\snaptogridincell\allowfieldendsel\wrppunct
\asianbrkrule\rsidroot13119378\newtblstyruls\nogrowautofit \fet0{\*\ftnsep \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid14241816 \chftnsep 

\par }}{\*\ftnsepc \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid14241816 \chftnsepc 
\par }}{\*\aftnsep \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid14241816 \chftnsep 
\par }}{\*\aftnsepc \pard\plain \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid14241816 \chftnsepc 
\par }}\sectd \pgnrestart\pgnstarts0\linex0\headery709\footery709\colsx708\endnhere\titlepg\sectlinegrid360\sectdefaultcl\sectrsid13119378\sftnbj {\footer \pard\plain \s17\ql \li0\ri0\widctlpar
\tqc\tx4153\tqr\tx8306\pvpara\phmrg\posxc\posy0\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\field{\*\fldinst {\cs18\insrsid7422586 PAGE  }}{\fldrslt {
\cs18\lang1024\langfe1024\noproof\insrsid6443863 1}}}{\cs18\insrsid7422586 
\par }\pard \s17\ql \li0\ri360\widctlpar\tqc\tx4153\tqr\tx8306\aspalpha\aspnum\faauto\adjustright\rin360\lin0\itap0 {\insrsid7422586 
\par }}{\headerf \pard\plain \s23\qc \li0\ri0\widctlpar\tqc\tx4320\tqr\tx8640\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid7422586\charrsid11229394 
\par }}{\*\pnseclvl1\pnucrm\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl2\pnucltr\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl3\pndec\pnstart1\pnindent720\pnhang {\pntxta .}}{\*\pnseclvl4\pnlcltr\pnstart1\pnindent720\pnhang {\pntxta )}}
{\*\pnseclvl5\pndec\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl6\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl7\pnlcrm\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl8
\pnlcltr\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}{\*\pnseclvl9\pnlcrm\pnstart1\pnindent720\pnhang {\pntxtb (}{\pntxta )}}\pard\plain \s15\qc \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp620 \brdrl\brdrtnthtnmg\brdrw60 \brdrb
\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid13119378 \b\f35\fs28\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b0\fs20\insrsid13119378 
\par THE UNITED REPUBLIC OF TANZANIA
\par }{\insrsid13119378 TANZANIA COMMUNICATIONS REGULATORY AUTHORITY}{\b0\insrsid13119378 
\par }\pard\plain \qc \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp620 \brdrl\brdrtnthtnmg\brdrw60 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid15929359 {\*\shppict{\pict{\*\picprop\shplid1025{\sp{\sn shapeType}{\sv 75}}{\sp{\sn fFlipH}{\sv 0}}
{\sp{\sn fFlipV}{\sv 0}}{\sp{\sn pibFlags}{\sv 2}}{\sp{\sn fLine}{\sv 0}}{\sp{\sn fLayoutInCell}{\sv 1}}{\sp{\sn fLayoutInCell}{\sv 1}}}\picscalex21\picscaley19\piccropl0\piccropr0\piccropt0\piccropb0
\picw14993\pich14993\picwgoal8500\pichgoal8500\jpegblip\bliptag146169481{\*\blipuid 08b65e8972ae4e46dbd595f459d72905}ffd8ffe000104a4649460001010100c800c80000ffdb0043000a07070807060a0808080b0a0a0b0e18100e0d0d0e1d15161118231f2524221f2221262b372f26
293429212230413134393b3e3e3e252e4449433c48373d3e3bffdb0043010a0b0b0e0d0e1c10101c3b2822283b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b
3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3b3bffc000110800e100f703012200021101031101ffc4001f0000010501010101010100
000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a10823
42b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a
838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1
f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b5110002010204040304070504040001027700
0102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a43444546474849
4a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4
c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f66a28a2800a28a2800a28a2800a28a280
0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a280
0a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a29338a
af35ec71b6c406490f4541934d26c0b348580ea6aa05bd9b962b02fa7de6ff000a0e9b148b89a59a4c9ff9e857ff0041c53b21134b776f02ee9a78e31eacc055
097c49a544cc9f6a5765ea1013ff00d6ab0da3698ffeb34fb7909ea5e30c4fe269a743d20aed3a5d9e076f217fc29684be7e96335bc65a7e711a48e7f0c7e84e
2aacbe3a810e12d0bfd24ffeb56a4fe15d12e061f4f4519ce22668c7fe3a4550b8f01e9329cc32dd5bfb248187fe3c09fd6a5a7d19cf28e23a34423c728bb77d
911b8673bfff00ad5693c67645433c32007ba9040ff0fc6b2eefc0575c1b5d4637da30ab2c657f3209fe55913f8675fb125fec5e6a8ead0386cfe1d4fe553699
8b9e263ba3b68bc4fa5c89bccc6319c6597fc335a105e5b5cf105c4721c670ac09fcabcbe3b5b996e7ca8e096dee07de8e40536e7bf3dababd2b41b7b6db35c3
acd3f5caf0bf977fc6b8f138e86197bfbf637a152b5476e5d0eb28aa22e1e31f7811ef52c77624e15198faa8e3f3a8c36654710f955d33b5c1a2cd2120753519
329193b631ea79acfb9d434a8f77da3500f8eab1be48fc179af5146e41a2d3c49f79c0fc6a16d46d57accbf9d62cbe21d1e203cbd3ee6e71d0adbf3f9b914dff
0084bdce041a15e91db7955fe44d68a94bb13736d751b77fba4b7d149a71bd8d792b20faa1ac4ff84a350cf1a04d8ffaec3fc293fe12e9633fbed0ef00ff00a6
655bf9914fd94bb7e282e8d91aa5a13832807d0f153a5c4527dd707f1ac58fc65a49205c0b9b527fe7b407f9ae455f80e95a9a3496b25bcc33f33c0e320fb95e
6a25071dd343b97f39a5aa2d6d756ff35b4be6a8ff0096721e7f03fe3f9d496b7a9719520a48bc3230c106a6dd50cb54514548051451400514514005472cc90a
1776000f5a65cdca5b4659cfd077359f75716f6101d4f589961893eea37201edc7566f6154a3715cb23ed17dce5a180f4fef37f854775a9e91a1c616eaee0b6c
f2159be76fc3a9ae56e35ed73c46e62d395b4db23c799ff2d9c7d7f87f0e7dea6b0f085a42c659879b2b9dccf21dccc7d4d6ae318fc6fe48cdd4ec5d97c7fa66
48b4b4bebbf464876a9ffbe883fa557ff84e6f9ffd57876561fed5c01ffb29ad24b082250b1c2a00f6a1e118c62a39e9ada3f890e7233478defc1f9bc3cc3e97
40ff00ecb5227c41b55e2e749bf88faa2ab0fe60fe9565a1554fba327f955492de33d507e54bda43f94975268bb078f3c3d310af76f6ec7b4d0bafeb8c7eb5ad
67ab69da80ff0042bfb6b8f5114aac47e46b8e9f4fb77cee894fe1502f8260d47e6785628cff00111d7e82a27568455e4da1c6b4e4ec95cf44a2b87fec7bfd35
d62d2b56bd32018588c8645ffbe5b2a3f2adfb19efb4ad31a7f11ea56a76f4709b31ec4e70c4fa003f1a984e1515e0ce9d7a9aef1a4a852445753d558641aa72
e9168f931ab40c7bc4d8c7e1d3f4ac393e2168f13334b05ec76e0e05c3443637b819ddfa66b4b4ef16681aa90b65ab5b48edd2367d8e7fe02d83fa53951535ef
46ebef0b97e3b18614f953cc6c7590e727fa7e55c578a355f88509234ed2a1860cf125affa4c9fa8e87fdcaefa8a74e30a6ad18a07a9f3f1d7f5c8affccd42f6
ea791189686e98900f7f94f4fcabd2fc27e29d0f5855b79218ed6efa6c6fbac7d8ff004aebaeec6cefe311de5ac37280e42cd18700fd0d73d7bf0e7c37764bc5
6b2594a5b3e65b4a548fa03951f9568e77ea23a416d08e91afe54e11463a20fcab36c74dd434f8bc95d49aee35ff0057f684f9c7d5875fcaacf9d7b1e37da87f
531b83fcf1536f302d6c5fee8a431467aa0fcaab7f68c6bfeb63922f774207e752477b6d27dc994fe34598c4974fb59861e153f8563ddf846ca493ceb6dd6f3a
fdd92262acbf422b784a87a30fce832a2f5603f1a719ce3b31591cdc3aa6a7a1ccb0eacdf69b42702e71878ffdec751efd7eb5a5ace208e2d46320344caac47f
1231c63f320fe7eb4dd5192fe07b4b741348c31c745f727b553d7264b6d32d34457f36e6511ae0750a8412c7ebb71ffea35aaf79a76d7a88e8227f32256f5145
36d94a5ba29ea05158328968a28a401514f3a5bc4d23900019e6a42703359cbff130bd24f304079ff69fd3f0ebf95525dc086e2ea1b0b39359d4d8a4710ca263
246781c7f78f6fad7210c779e29d406a7aa0d9127105be7e5897fa93dcf7f61802c7892ecebbe231601b365a737cc01c8925c73ff7cf4fae6b56d542aaa81800
70076ab94b9169bbfc0e5a93bbe52f5a411c281635000ad08e218aad6f8e3daaea371589a410d6840155a48f9e2aeb1c8a85864f1d686534509579fa540b6d24
ed845cfa9ec2b516d013973f853e5962b688938551dab9aa55b691dc4a95f729c5616f6cbe64d8761dcf414f413df9fdd93141ff003d08e5bfddff001fe74f8a
d1eed84d74088faac27bfbb7f87ffaab0bc57e2e5d3d9b4bd35b75e91f3ba8c8807ff15fcbf4a9a5847525cd53566ba455916f54d72d742cd8e9f08b9bf61929
9e17fda91bf5c7f21cd717a8ea7e65cfda6fa5fed0bb19da0f10c3ec07f875f5a84ee8a301c6e328dee59892c49392c7a9fc6aa4ad0f784fe0f5d728fd95b08a
57d7135ec9bee1cb91c018c051ec3b565cd6913f5515af21b7ff009e527fdfc1fe155a45b63fc72afb6c07fa8aa8b70f8741dae360d4758d1da2934bd56eade3
29958c484c60f42361caf5f6adcb0f8a7e22b22897d6f6ba846bf79b6f95237e23e51ff7cd6298a392d0859d0f96f91b811807f0f502aa3da4c4fca824ff0071
837f2ad7dab7f12b936ec7a4e9ff00177449c22ea16b7762e7ef36df3635fc57e63ff7cd74d61e2bd0353216d357b5773d2369023ffdf2d83fa5783491e1b6ba
e0fa1144b6d14f6a1f68dd19dadee0f43fd3f2a2f49f4b0f53e90a2be71b2d4b55d2b6ff00676a9776cabd12399827fdf3d0fe55d269ff0012bc57026c69adaf
9c1c81710e091e83615e7eb9a3d9c5fc320b9ed551c96f0ca732428e7d5941ae2741f892dab2399f46990c63e6fb3c82439fa10bc7e26b467f106b1a8c9e4e91
a79b74ef3dd0cb7e0a0e07d493f4a15198b991befa7da13b8c417fdd62a3f4acbbad57c3760d896ea191c71e5a3199bfef919c7e3544784ee7503bf58d467bac
e328cd84ff00be4703f2ad6b4f0de9b6807976e991ed4fdc8ef26fd035329bc43a8ea0be4689a61b643c79f70a06dfa20e3f127f0abda3f87c5a4ad77772b5c5
dca72f239c926b69218e31844007b0a7d4ba9a5a2ac3b77128a5a2b218514514014f53b836f68eca0963c003a934c91868fa1cd31f98db40f2b7fb4402c7f5a8
b503e6ea3650671ba5ddff007c82dfd2aa78dd98784eed50e0b98d33ec5d73fa66b54b65dc96ec9b391d023716fe74c774b292eec7b93c9ae92dc1c64f03d4d6
3d86c86dd153e6200e4f4fc0568c5212724e4d61397349b3cf8bd4d889c2a8ef9ab292f1e954608e499b08385e093d0569c302c639f99bd6b39558c743b209b1
5559f93c0a902851c0a5cd35dc2296620003249ac6556e6ea361b3cc90c65dc800556b5b77b9905ddc838eb146474ff68fbff2fe515b11ab5c197ef5ac2d81e9
230fe83fcf7ab3ab6a7068fa64d7d704ec8870a3ab31e028f72702b7a549a777b89b31fc61e246d1ad96cec886d46e47eec633e52f42e47f2f53f435c3dad88b
68cb3b1795c96776392c4f524f7353db89efaee6d52f886b9b86dc7d147651ec071524a6bae6d457247e64ad752bddf48ffdcfea6b3e5ad98f4ebdd52444b2b7
694aa0dc7a2af27a93c56c5bfc3c9645cde6a0a873f7614ddfa9c7f2ac4a38292aac9debabf1968da3f8756082dee6ea5bd9cee0923a90a83b90141e4f03e87d
2b9390f069b4d00b6fc9923fefc671f51cff004aa6fd6babf0ef83b52d48adf4c3ec7648379966182eb8cfca3b8f73c7d6b9266079f4a2cc0905d4caa14c8597
fbaff30fc8d496f2c324a6278421946c2c84e39e9c1f7c7a574da1fc37d5b55896e2f1c69d0b741221690fbede31f8907dab9ff116969a06bd3e991dd1b836fb
499366ce480d8c64fa8a2c0526b52dfea5c487fb9d1c7e1dff000cd4182addc107f106acdcc6f2deed89199a62195546492c33803f1aecfc3de01bcd41165d69
5846465235ff005871d8bf41f4e4f5e958d4ab1a6b5fb96afee1a57337c113dd9f104371696ed31c85ba451c153fc5e83fc706bd9d6345fbaa07d2b2ec3475d3
6d520b1b682de31fc19e7f138393f8d5e9e63676c6591c155201e31d481fd6b2c3d5af564f9e1caba771b491668a646e2440c3a1a7d751214514500145145001
4514500636a528b6d6b4e91ce11a531e7dd9481fae2ab78e867c27727d1e23ff0091169be368a46d1d248199664995a365ea180241149f6e8fc4fe12bb8a58cc
776203e741d191c0c8383d89191fe20d6a9ad1f6326eedc0c1d3d2499112252ec4700574965a3edc3dc9c9fee03c7e2697418e14d3223020505464f73f535a83
39e95f3d5b19394dc62ac874b0d18abcb562a80a3000007614e06ab5cddc3671ef99b03b00324fd0573f7baedddc9296f13c31fae3e63fe14e853a95354743b2
37aef53b7b4ca96df27f747f5f4ac4bababad5ef61b0898af9bcb6d1c22f727ffafdf1594cf22a9628df95747e15b2296ada84cb896e400991caa0e9f9f5fcab
d8a34634d736eccdbb9b50411dac09042bb638d42a8f6ae03c59a89d675e5d3a26cda69ed97f4797bfe438fa96aecbc41aa0d1b44b9be183222e2253cee73c28
fccfe59af3ad32d2682d77babb48e4b3b104924f249ae987ba9cc97d8b6ec234c7402a56b5b7b0d3c6a9ac96481ce21b65e249cff45f7ffeb675341d251a36d5
f52c25ac00baab8e0819cb1f618ff3df90d5350bcf146aef7f24720b74f92de323eea7bfb9ea7ffac294237d5ec31751f106b97e116dae5f4db60bfbb86d098c
28cfa8e4d4fe0cb8d4ecf5a96f6f356bc6d3ace0796e564959d0f180304fdece08ee7155ee20942c61627e13070bee6a84d05e345242a2758a520ba0c857c74c
8ef8aa557a740b14efafee35bd62e756bbe1e76f9133c220fbaa3e83f5c9ef5b7a06b7a3d86aba65bc5a1bde5dcf3471c93dc4a311b3301945c638ea09e7dfbd
641b49d17020938ff64d6f78034692efc549732c6cb1d92194929c163f2a8f6ea4ff00c06939a94aed01dc78f3507b0f09dd470abc9737b8b4823404b3b3f181
8efb771fc2bce0cb63e087dc628751d7b3b846c774365dc671f79fe9d3d7d7b7f889e271a259436b651ac9aacc4b40db431b7182a641e8705947d4fa107ccecb
c3ba9ea97d22db5ac9231625a46e1467b963439469d3e69e8837625c78c7c5b7570676d6ee2324fdd8b08a3f003156b45f09eadafc92ea57727d9ede57324d79
71c076272481fc449f4e2bb0d2fc19a5e836c351d5caddc83fd5c7fc2cde8077fa9fae056ac70de6b52acd743644a311c4a30a83dab8711982853e6b69d34294
352869f069da3201a4d8fdaae55421bbb91c9c7a2f6156ae135dbcd3a3bd93549610f298f6447cb00762318ee08fcab61ad12de158e241bd8ed5fa9aa3e2bbf1
651e9fa4db7ef266612364e4845e0123dc9fd0d7160ea57c5f3b8ab76f5ff8054ad1dccc97c3974ca66b8d5aeb27ab34ed93fad59d2344b8b89b13ea377710c6
4322cd3338e38e84f14ecdc4ca0cbb9881e9d2b5bc3fb85c48ac081b33cfd457a786a35a8c2f567ccff0460ea294ac9686dc5188e3083b0a7d14551a05145140
051451400514514010dcc6b24637283b4e46474358573a41fb62de5a4ad6f70bfc69dc7a1f51ec6ba090650d72dacf8bb4ed29dad95c4f758e101c2a9ff69bb5
7878e8d75898ba3bd8d236b6a68d9c31e9965891d5234192cc7000ac4bff001a43e7adbe9cbe665803330e07d077ae2f56d7752d527ff4e90a85395897845fa0
eff5aab1cdb483d0839adf0f97d9f3d6777f809cfa23664bd9ae66696795a490f52c734f49bdeb3a67db73201d37123e94e59abd449256441a90c6fa8df5bd84
64eeb870a48ecbd58fe0326bd4238d2189228d42a2285551d001d05701e01b7fb5eb77378cb95b5882a93d998f51f829fcebd0ab49689212381f88b7de75fe9f
a4a370b9b99571f554e7fefbfd2b3f49b23aaea70d88c843f34a47641d7fa0fc4550d7ef4def8cb529bf86193c8407b6c183fae4fe35d4fc3d837a5f5f1c1cba
c2bea30327f3dcbf955cf449760445f127525b2d1ed743b6da86f0e1947f0c498e3db2768fa035c5c40431051d856cfc43676f19c41d0aaa59a04c9fbdf33e4f
f4fc2b01e4f7a53768a8813ddbf117fd731fccd4e34e8e2f09ddeb377f29924482cc138dcdb8166f7e0301f46f41535969297b02ea1a8cff0063d2a041e6dc37
56393f2a7ab1f6cff4ac8f106befe21bd8c4508b6d3ad1765adb8fe15f53ee703fcf25463d581499f2335ea7e01b08f46f09bea575fbb3720dc48cc31b6303e5
fc3196ff00815713a2f83b50d5e480ca8d6d6d230f99b8665ee547d3b9fd6bbff174cb169b6ba35b2aafda982ed00fcb12609c7e3b47d09ac555834da7a2dc76
671fa6f8667f176b971e20d719d239df31db03caa0e15491d3031d3af26bbfb5b6b681195123b7b3b7cb3e0617d4e7f99350428b61a7000630b4df13bb58f859
e157c34a5226703aee3f371ee323f1af170f29e615dd4a9ac63b2e868ed05646540d2f88b5237d302b6c8710467a2aff0089ea7ffad5b535d5bd8c7b49190385
1d6b1edaf3c8b258a01e5ae396ee7fc292596db4e805fea80956e60b6fe39cfa91d97ebffd63bacaaa62aafb4c4bb2e915bff5fd6866eb25a40e834a492e317b
70a14b03e4c7fdd5f5fa9fe5f5ae735cd220d3273a9dfea125d6a17726d8d4284403d02f24281efd48cf5abbe1417bab5fdcf88351e1997c8b58813b624e0b60
7b9dbcf5f94d61eb576759f174dc9fb3d87ee1013c6e1f7ce3ebc7fc0457bd87a31a52e4868976fc8ce6ef1bb2e2bfeef77b56be81288e6467e04f19287d70d8
fe9fad635d32dbda33be381c2ff8d6c5c4074ed1b4738c491c8ab267d59496ff00c7b15a4f556ee654d6b73a5a29b19dd1a9f514eae23a428a28a0028a28a002
8a28a0042010411907b578a788f4d6d3f56b9b323e6858b27fb519e7f3e73f8fb57b65711f11b4592e2ce3d5ed41f3ad787c7f77d7fcfb50079bc5758411c8a2
44ec0f55fa1ed53aa249cc12027fb8fc1ff03551c2ca86784018fbe83f87dc7b5303d006a4ecea226652a4a6d20fa8e3f96299e77151dbdcc86de48c10db7e75
0c01181d473f9fe14c33c2ca774250faa37f439a101e99f0d6064f0fcf72c3fe3e2e58a9f55002ff0030d5d85737f0fc2ffc21763b4920990e48c7fcb46ae89f
3b1b1d706ae7f1312d8f0986f0de4f7378df7ae66794fd5893fd6bb1f87fe23b3b196e74abd9a383ce904b03b9c0662002b93c6785c7af35c1590916d5498d80
c7522ad4da4dd5c5bacad6cde5bfdd246377d3d6b49b5ed1a60b63d7bc43e1ed235b8e2b8bf73034430b708e14ed3d893c11dff97535c35fdd7817c3f2130c93
6bd7231b615941894e7bb2803f0f9be95c82f836eda7544d3e43231c00abfcfd2bb5f0f7c35862db36aac18f5fb3c6dc7fc0987f21f9d615f1187c3c79a6dbf2
b0d26cc3962f1078e2f212620208d0048d06c8201cf41ffeb3f80aedf41f04e9fa3859a702eee473bdc7ca87d87f53fa57430c10db4090c11a451a0c2aa8000a
7641ee3f3af97c6e6389c47bb04e31f2378c122bade595a4d25ddf5d410227c8865902f3d4e33f87eb588b3a6b7e2696fe370f6b022c70b608040e49e7dc9fc0
0ab7a9e9b693c80cb1995c9e140cf354c4462062550aaa71b10f4fad7a584a352be115282e55d5bfd17f48c6735195f72eea1ab436ef095cb2472ab3b0eca0e4
e3d7a568ead3e8b7fa53a5eea16c96cf8612f9eab839c820d613dabbc0c5d08561819e2b19fc2964d279eeaa013d4735ece1303430d051836bcfb98baadee5b9
35bd2edd8c7a32c97d28e1679c7eed0fa8181b8fd78e075aa86d26ba95ef2f6469657e4b373fe7e95a76fa4c56802a4049edd0558589e58dc2c781f7781debbb
992f84c9b65e6f13681e1cd3a1b5b8bd8c4b1a61a183f7adbfa9185ce39cf5c57369e22866bc9a6d13471686790c8f71703748589c9217242f24fafe15236830
094c8f10247249ab090450a12a02aa8e4e3a528c69c75ddb29cd8cb1b57bfd42d6d1f90ce1a4cf20a8e4fe7d3f1adff1338967d36c81f9de7f371eca08fe6c29
3c336a1209754946c130c47bbf8631dff13cfd00a834966d735c9f5520f909fbbb7c8fe01dff001393f8d6727795fa2fccb82b2f53a58c6d8d47a0a7d252d719
a851451400514514005145140053248d2689e2914323a95653dc1eb4fa2803c57c5de1e9fc35ab9921ddf66949689f1f983fe7f9d62ed4b8e610164ef17aff00
bbfe15eedabe936bad69f259dd2651ba363953ea2bc53c43e1fbcf0f5f3417084c64feee40386140146299a1995c0e54f20fea29f70046ff0021cc6c3721f6ff
003c5462e164016e177fa38fbc3fc7f1fcea78e0f3e130a38900f9a32382a7b823d0fe59a101eb5f0e9c3f822c307254ca0ffdfc6ae9ebcefe126a0a6cb50d29
d889619bce553fdd6001c7d0afeb5e89573f89896c780dd432691ac5ee9f1bba8b6b878d7920950dc7e6315b7a3f87350bfd77fb4f54d36f1bceba578a631c4e
122046d1f3b865dbcf45ed919aee756d1acecfc4c9aeb5b239b80b1bbb0cec70300fe238cfb7bd7346e3c41777babea76daa34367a65f4e1f75c120c491e4c62
2d98e4e3e7dd91cf15cf5313539e718b51d16aefbbed6f3ff861a4ac6558f83755b7d2e512693e5dc9d2ee52236e234669652ca52639cbfca54a9c80391d715a
b6da36aaba049a3d8e99fd9f2df98e0b9bb367043e5c414ee27cb725c9e4738fbc7a53a3f18eff0005585ae99a8c77fe21bdb748951655678e465cbbbf3c6d19
3cf7033dea81f13eaf61a0dd99ae655d4742bb123a4f287173039caab95e09c31191d0a0f53497f68d7bf328a7cdd53f94ad7daffd306e08b377e1bbab6f096b
5a25ce9d6d77e4b349a54a235503cde59635624a6d6dddfb8aa5e22d084f7b7a34bd26386da6d360b6090aa46acdf69577e0639da3ad43ae6afad6952cd6f26b
134b74ba2fda1dc30c09dee9532a3b000e00f4a4b8f116bd6af71a7c6ad26a7a6d84ae70b95b8264895260b8c1210b1c73f30231dabd4c361aad3f7e524db6df
54afa5ddbd55fd5bd8ca52bec36e349f11c6f7b6b6fb9920d39ad6ceebcd0af2c66547d84f66daac99c0078fad6be930791ad62d7445d3b4f16db43b5b4492ee
cafcbb9198b0c0279ef4cd2b52865d74595beab2ea919b333fda1afbcd19dca30d1ed0236e4f19e9d47a558350d5658bc41a83decbe4da4b7c2ddbed8404d8ad
b1447b31c1c60eef4e2ba9f3356666177a76b571aa0f12792a2549d4436453f7ab6c0b26d0fbf682c1d9c8f5c73daafdf89e2f145a5e8d3eeae6de1b278cb41b
09dece0e30ccbc607eb593a66b57577ad476b77ac6c51058e2392f8c2cccf1297da814ef249e991cfd69ade29dde09bfbb8b5a8c6a6646318128f3635370141c
7a053f953719dd2b797de1626d3f476935dd4daff4a3e55edf5c3ac8d6b0b13138207ef776f5c8ec077f7342e9bab5ce952da6a16fbbfb32c2e2d2cd030ff489
5d5904a79e309b40cf72c78ad1d26f249bc413c565a9cda9e9896a09b895b7aa4fbfeeabe39f939c02706b70b2274f98fa9e9512a924c4db47171693730695a7
84d26556b6beb496611dac10b3ac61b71055cef3eec475f735d86990bf886758c4135b5ac67332cbb43019fbbf2923271d8f03f2a75b5b5cead7261b73850712
4c47083fa9f6abb7d7eb608ba0e83cdcf4966ebe567a927bb9fd3f2159cea3968b7fc8a8abeac76b97ada8dc8f0fe9d908302ea44e02affcf31fd7db8ee71bd6
1671d8daa431a8014554d0f458b4ab50a065cf2cc7a935ab5c5392b72c76374ba851451590c28a28a0028a28a0028a28a0028a28a002a96aba4d9eb364f697b1
078dba1eea7d455da2803c4fc4fe09bfd02532c6a67b327e591474f63e9583636777a85d25bd942f34cdd020e9efec3debe88923496368e4457461865619047b
8aa36fa3595823ad8db476e1db73045c6e3ea4d61889d48536e946ec6ad7d4e1f46d0afbc333c1acdcca249d5764f145de33d413dc8e0fa6457a2c32c73c2934
4c1e391432b0e841e86b3ee2df7c65245e08ac2875193c2b71e55c65f4d95b3c0cb424f520771ea3f11e87cecbf1f52b4dd1adf1f4ff0022a7151d56c7593c11
5cc0f0cc81e3718653deb9eb992e3415227579edb388e61fc3ecde9f5e87f4ae860b886e6159e0952589c655d1b20fe34f2030208041e0835e8d6c352af65563
7b129b5b1c74b7b25df2cff2f651d2a2cfbd6edd786a0725eca56b473fc206e43ff01edf862b325d275880e3c88ae07f7a22bfc9b1fd6bd0a4a9422a34d24bb6
c734a32bddea40e4e17fdda6734e91ae914349653a051c96b7381f8e2a0fed1881c79a14fa74ad92666c986e6e064d3c232a127863c72718155c5f4246e79c6d
1fed75a5495ee72d0c134bff005ce32dfca8b3025c28eaf9f65a7ab051bf6f1db2724d2c3a7ea332ee4b1900cffcb4213f3cf35762f0d5d4cd9bcbc541fdd806
4e3ea7a7e552e515bb2945be864cd723702cd9663800753ec2af58e83757c44979bada0ebb3fe5a37ff13fceb5245d17c3507da2529131e03b65a473e83b9fa0
ac8924d53c54de5847b1d34f54cfcf28ff00688e83d87eb4949b575a2ee5a825b8ebad59ae31a4786515225f964ba41f2afa84f53fed7f33c8d6d1342b7d26dc
055cc879663d49ab5a7e996fa740b14281401d855dac67534e58edf99b241451456230a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a280108
04608cd665fe83697db8b6e563dfad6a5142f75f32dc4d27a338aff847b5bd02769f44b9528c72f03f31bfd57d78ea39abf6be328a3222d6aca7d3a5ce37ed2f
113f50323f1181eb5d2d433d9c172a5658d581f515bbaaa7f1af9f52546db05ade5adec3e75a5c45711e71be270c33f5153d73b73e0fb17984f6fbade65fbb24
4c5587d08a87fb2bc45689b6d75a95d739c4cab21fcd813fad2e483da5f78eecea292b99375e2d8b0be5584b8ee63604fe4d4bfda1e2bc7fc7958e7e8fff00c5
52f64fba0b9d2e28ae60cfe2fb852a058dbe7f89226247e6c47e94dfec2d76f4837daddc6071b6122207ebb719fc69fb24b7920b9b9a86b3a76963fd32f2389b
19099cbb0f651c9fc0561cbe23d4f54630e8b62d0a1e3ed37239fa85ff001fcaae69fe11d32c7910866f535b51c31c43088147b0a2f4e3b2b86ace7f4ff0b2fd
a3edba94cf77747abc8738f61e83d857431c691a8545000f4a7d15129ca5b8d2b0514515030a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2
800a28a2800a28a2800a28a2800a28a280128c52d140094b45140051451400514514005145140051451400514514005145140051451400514514005145140051
4514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451400514514005145140051451401ffd9}
}{\nonshppict{\pict\picscalex100\picscaley100\piccropl0\piccropr0\piccropt0\piccropb0\picw3136\pich2858\picwgoal1778\pichgoal1620\wmetafile8\bliptag146169481\blipupi200{\*\blipuid 08b65e8972ae4e46dbd595f459d72905}
010009000003562e01000000312e010000000400000003010800050000000b0200000000050000000c026d007800030000001e000400000007010400312e0100
410b2000cc00d800ee00000000006c0077000000000028000000ee000000d80000000100180000000000205c020000000000000000000000000000000000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7fffffff7fff7ff
fff7fff7f7fffff7fff7effff7eff7efe7ffefefffefeffff7efffefeffff7efffefeffff7efffefeffff7efffefeffff7efffefeffff7effff7effffff7fff7
f7fffff7fffff7fffffff7fff7fffffffffffffffffff7fff7fffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffff
f7f7fff7f7ffefefffefefffe7e7ffe7e7f7dedeffdedef7d6d6f7d6d6efd6ceefd6cee7cec6efcecee7ceceefd6ceefceceefd6cee7ceceefd6ceefceceefd6
ceefd6cef7ded6f7d6d6f7dedef7e7deffefe7ffefe7ffefefffefeffffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7fff7efff
f7efffefe7ffefe7ffdedeffdedef7d6d6f7ceceefbdbdefbdbde7b5b5deb5b5d6a5a5cea5a5ce9c9ccea59cc69c94c69c9cc69494c69c9cc69c9cce9c9cc69c
9cc69c9cc69494c69494ce9494d6a5a5d6a5a5deadaddeadade7bdb5e7bdbdf7c6c6efc6c6f7d6ceffd6d6ffe7e7ffe7e7ffefe7ffefe7fffff7fffff7ffffff
fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffff7fffff7fffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ff
f7efffefeff7e7deffdedef7d6d6f7ceceefc6bdefbdbde7adaddeadadd69c9cd69494ce9494bd8484b58484ad847ba57373a57373a57373ad7b7ba57373ad7b
7bad7b7bb58484ad7b7bb58484ad7b7bad7b7bad7373b57373ad6b6bad7373ad7373b57b7bb57b7bbd8484c68c8cce9c9cd6a5a5e7adadefb5b5ffc6c6ffcece
ffd6d6ffe7deffefe7fff7effffff7fffff7fffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffff7ff
fff7ffefefffefe7ffe7deffded6efceceefcec6deb5b5d6adadc69c9cbd948cb58484b5847bad7373ad7373ad7373b5847bbd9494cea5a5ceadadd6b5b5cead
add6b5b5d6bdb5d6bdbdd6bdbdd6c6bdd6bdbddec6c6d6bdbdd6c6bdd6bdbddebdbdd6b5b5ceadadc6a5a5ceadadce9c9cc68c8cad7373ad7373a56b6ba56b6b
ad7373bd8484c68c94d69c9cd6a5a5e7bdbde7c6bdf7d6ceffdedeffefeffff7effffff7fffff7fffffffffffffffffffffffffffffff7fffff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7fffff7ffffffffffff
fffffffffffff7f7ffefefffdedeffd6d6f7cec6f7c6bddeb5add6a5a5bd948cb58c84a57b73a57373a57373bd8c8cceada5d6bdb5d6bdb5dec6c6decec6ffe7
e7ffefeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7f7efded6
e7ceced6b5b5debdbdd6b5b5c69c9c9c7373946b6b9c7373ad8484bd8c8cc69c94cea59cdebdb5e7c6c6f7ded6f7dedefff7effff7f7fffff7fffff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffffffffffffffffffffffffffffffffffffffff7fffff7
fffff7fffff7fffff7f7f7fff7efffe7e7ffdedef7c6c6f7bdbde7a5a5de9c9cce8c8cb57b7b9c6b63a5736bbd8c8cd6bdb5cebdbddecec6e7d6d6fff7f7ffff
fffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7fffffffffffffffffffffffffffffffffffffffffff7dededecececebdbdceb5b5bd9c9c946b6b9c6b6ba57b73ad8484bd9c94ceada5debdb5e7cec6f7
ded6f7e7defff7effff7effffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffff7fffff7fffffffff7eff7e7deefd6ceefcec6d6adadce9c9cbd8484a56b6b9c6363b58484d6a5a5dec6bddecec6f7e7defff7f7ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efe7d6c6c6dec6c6cea5a5a57b7b8c
6b639c7b7bb58c8cc6a5a5d6b5ade7c6c6efd6ceffe7deffefe7fff7f7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffff7effffffffff7efffefe7efcecee7c6bdcea5a5c69c94b58c8c9c736b7b52529c7373c6a5a5dec6bde7ceceffefefffff
f7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffff7fffffffffff7ffffffffff
f7fffffffffff7fffffffffff7fffffffffff7fffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7ffefefe7d6d6dec6c6c69c9c9c73738c6363a57b7bb58c8cd6ada5e7b5b5ffceceffdedeffefe7fff7f7fffff7fffff7fffff7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7fffff7ffefe7ffded6efc6c6f7bdb5efadadc68484bd7b7b9463638c6363ad8c8cd6c6bde7ded6fff7
f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7f7ffefefe7ceced6b5b5ad8484946b6b9c736bc69494d69c9cefb5b5ffd6ceffe7deffefe7ffff
f7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffff
fffff7fffffffffffffffffffffffffffffffffffffffffffffffffff7fff7e7efe7d6efdecedeb5addeada5ce8c8cc67b7bad6363a55a5a9c5a5ace9c9ce7d6
cef7efe7fffff7ffffffeffff7f7fffff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7dededeb5b5bd8c8c9c6b6ba57373bd84
84cea59cdebdb5e7cec6f7ded6fff7effffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7fffff7fffff7fffffffffffffffffffffffffff7fff7efffe7d6f7e7cee7d6bdd6bdadc6a594cea59cbd8c7bad6b639c5a52b56b
6bdeada5f7dedeffefeffffffffffffffffffff7fffff7ffffeffffff7ffffeffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7efe7e7c6c6b5948c9c7b7394736bad8484c6ad9cefcec6f7d6ceffe7defff7f7fffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7ffffefffffefffffe7ffffefffffe7fff7eff7efe7efdeefe7d6efd6c6e7c6b5deb59cd6ad94c69c84b58473ad7b
6b9463529c635acea59cf7ded6fff7effffff7fffff7fffff7ffffffffffffffffffeffffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7f7ffffffffffffffffffffffffff
fffffffffff7f7fffffffffffffffffffff7f7fff7efdecec6a58c8494736b9c7373ad847bd6ada5e7bdbdefceceffe7defffffffffff7ffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffe7ffffe7ffffdefff7d6f7e7cedeced6d6c6d6c6b5debda5d6ad94dea5
8cd68c73e79484ad6b5a94634aa5846bffe7d6ffffeffffffffffff7f7fff7fffffffffffff7f7f7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7eff7d6cebd8c848c5a5aa57373d6a5a5d6b5ade7c6c6f7d6d6
ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffe7ffffdeffffc6ffffbdffffb5ffffbdffffb5efe7addecea5c6
b5b5bda5bda594ce9c84ce947bc67b6ba5524aa5635af7cebdffffeffffff7f7ffeff7fff7f7fffff7fffff7ffffffffffffffffffffffffffffffffffffffff
fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffff7fffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffff7fffffffffff7fffffffffffffffffffffff7ffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7f7e7c6bda57373
7b524aad7b7bd6a5a5e7bdbdf7ceceffe7e7ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffe7ffffceffffb5ffff94ffff84ffff73ffff73ff
ff6bffff7bffff7bf7ef94efde94c6b59ca58cb58c73b573639c635acea59cffe7e7fffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffffffffffffffffffffffffffffffffffffff7fffff7ff
fff7fffff7fff7deefd6c6ceb5a5c6ad9cbda58cb59c8cad9484b59c84b59484bd9c8cad9484b59c8cbd9c8cbda594bda58cbda58cb59484ad9484b59c84c6ad
94ceb5a5efd6bdffe7d6ffffeffffff7fffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffff7f7f7f7ffffffffffffffffffffff
fffffffffffffffffffff7f7d6b5b5945a5aa56363ce8c8ce7a5a5f7c6bdffdedeffefe7fffff7fffff7fffffff7fffff7fffff7ffffffffffffffffffffffff
fffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffeffff7efffffe7ffffd6ffffbdffffadffff8cff
ff73ffff5affff52ffff42ffff4affff4af7ef6bfff76bded684cebd8c9c8c9c7b6b9c635af7cecefff7f7ffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffffffffffffff7fff7fffffffffff7fffffffff7efff
e7dec6a594cea594bd9c84bd9484bd947bc69c84bd9c84c6a58ccea58ccead8ccea58cd6ad8ccead8cd6ad94d6ad94deb59cd6ad94d6b59cd6b59ce7bda5deb5
9cdeb59ccead94d6ad94cea58ccea58cc6a58ccea58cc69c84bd9c84b5947bbda594c6b5a5efd6c6ffefdefff7effff7effffffffffff7ffffffffffffffffff
fffffffffffff7fffffffffff7fffff7fffff7fff7fffff7fff7f7ffdedece8c949c525abd7b7bd69c94efbdb5f7d6c6efdeceffffe7f7ffefefffeff7ffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffe7ffffceffffbdff
ffadffff9cffff8cffff84ffff6bffff5affff4affff4affff42f7ef63ffff6be7de6bc6bd7bada58c948c8c7363f7ded6ffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeffffff7fffff7fffffffffffffffffffffffffffffffffffffff7ffefe7ef
cebdcea59cb58c7bc68c7bc68c84cead94cead9cd6b5a5cead9cd6b59cd6b59cdebda5debda5debda5debd9ce7c6a5e7bda5e7c6a5e7bd9ce7c6a5e7bda5e7bd
a5debda5e7c6ade7c6adefceb5e7c6ade7c6add6b59cd6b59cd6ad94d6b59cd6b59cd6b59ccead94cead94c6a594c6ad94c6a594c6ad9cbda594c6b59ccebdad
efe7d6fff7effff7effff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7cece9c736ba57373ad8484ceada5efd6c6ef
d6ceffefe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffdeff
ffd6ffffbdffffadffff94fff784fff773f7ff73ffff6bffff63ffff52ffff52ffff4afff752f7ef5ae7e763cec66ba59c7b948c737b73efefe7ffffffffffff
fffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffff7fffffffffff7fffff7fffff7ffffffffffffffffffffffffe7e7ff
dededeb5adcea59cbd8c84bd9484cea58cefb5a5efb59ce7b59cd6ad9cdec6ade7c6ade7c6b5debda5debda5d6b59cdebda5debda5e7c6ade7c6a5e7c6ade7c6
a5e7c6a5debd9ce7bda5debda5debda5debda5e7c6ade7c6adefceb5e7c6ade7c6addebda5e7c6addebda5e7c6ade7c6ade7c6addebda5debda5d6b59cd6b59c
d6b59cd6bda5c6ad94bda594b59c8cb5a594bdad9cdecebdf7e7defff7efffffeffffffffffffffffffffffff7fffffffffffffffffffffffffffffff7ded6b5
948c94736ba5847bbd9494efc6bdf7d6ceffdedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ff
ffefffffefffffdeffffceffffadfff794fff784ffff73ffff63ffff5affff5affff63ffff5affff5affff52ffff52fff75aefe75acec66bada57b94948c8c8c
efefeff7fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7f7ffefeff7cecedeadadc68c84c69484ce9c8cdeb5a5debd9cdebd9cd6b594debd9cdebda5e7c6b5e7c6b5e7ceb5debda5debda5debda5e7c6addebda5e7c6
addec6a5e7c6ade7c6a5e7c6ade7c6a5e7c6ade7c6a5e7c6ade7c6ade7c6addec6a5e7c6adefceb5f7d6bde7c6ade7ceade7c6addec6addebda5e7c6addebda5
dec6a5e7c6a5e7c6a5e7bda5efceadefceadefceb5e7c6addebda5c6ad94c6a58cbd9c8cbda58cc6a594e7cebdf7efdefff7effffff7fffffffffff7ffffffff
fffffffffff7f7effffffffff7efd6bdbda57b7ba57373bd8484e7adadffceceffdee7ffefeffffffffffffffffffff7ffffffffffffffffffffffffffffffff
fffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffff7fffff7ffffd6f7efcef7f7bdf7f7a5ffff84fff76bfff75afff752ffff4affff52ffff52ffff52ffff52ffff52fff752efde5acec6
63b5ad739494949494efefeffffffff7ffffe7fffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffff
fffffff7f7fff7f7f7e7e7efcececea59cc6948cce948cdeada5e7b5a5debda5d6b59cd6c6a5d6cea5ded6adcec6a5cebd9cdec6ade7ceb5e7ceb5e7c6b5dec6
ade7c6ade7c6ade7ceb5e7ceade7ceb5e7c6ade7c6addec6a5e7c6ade7c6a5e7c6addebda5e7c6addec6addec6add6bda5e7c6ade7ceadefceb5dec6ade7c6ad
dec6a5e7c6addec6ade7c6ade7c6a5e7c6a5e7c69ce7c6a5debd9cdebd9cdebd9cefceadefc6ade7c6addebda5debda5d6ad94cea594bd9c84bd9484d6b5ade7
d6c6f7efdefffff7fffff7fffff7fffff7fffffffffff7fffffffff7f7f7d6d6b58c8cad6b73c6848ce7a5adf7bdc6ffdedeffefe7fff7f7f7fffff7fffff7ff
fffffffffffffffffffffffffffffffffffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffcededea5b5b57ba5a57bb5b58ce7e794ffff6bffff5affff4affff42ffff42ffff4affff4affff
5afff752efe75adece63bdb56b9c94949c9cefefeffffffffffffff7ffffefffffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7ffefe7e7cec6c6a59cb59484cea59cefbdadf7cebde7c6ade7ceb5e7d6b5e7debdd6d6b5d6d6b5ced6addedebde7debde7d6
bdefd6c6f7deceefd6bdefd6bdefd6b5efd6bdefd6b5efd6b5e7ceb5efd6b5e7ceb5efceb5e7ceadefd6b5e7ceade7ceb5e7ceade7ceb5dec6ade7c6addec6ad
e7ceadefd6b5efd6b5e7c6addec6addec6a5dec6addebda5dec6a5debd9ce7c6a5efceadf7d6b5efc6ade7c6a5e7c6a5f7ceb5efceb5efc6addebda5e7bda5e7
bda5deb5a5cea594c6a594b59c8cc6ad9cdecebdf7efdef7f7e7fffff7fffff7ffffffffffffffffffffffffffefefd6a5adad737bad7373d69c9ce7b5bdf7d6
d6f7e7e7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7bdbdbd8484845a636b315252295a5a4a9c9c6bcece73efef6bffff63ffff
4affff42ffff42ffff4affff52f7ef63e7de63c6bd6ba5948c9c94ded6d6fff7f7ffffffffffffefffffdefffff7fffff7ffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7efe7e7d6cec6ad9cbd9c8ccead94debda5e7bdadefc6ade7c6ade7ceadd6c6add6ceadc6c6a5ceceadcec6
add6c6adcebda5d6bda5d6c6ade7cebde7ceb5dec6add6bda5dec6add6c6a5dec6addec6ade7ceade7ceadefceb5efceb5efd6b5efd6b5efd6b5e7ceb5efd6b5
e7ceb5efceb5e7ceb5e7ceb5e7ceadefd6bde7ceb5e7ceb5dec6addec6addec6addec6addec6a5e7c6addebd9cdebda5debd9ce7c6a5e7c6a5e7c6ade7c6adef
ceb5f7ceb5efceb5e7bda5e7bda5e7bda5e7bdadd6b59cd6b59cbda594ad9c84ad9c8cd6c6b5efe7defff7effffff7fffffffffffffffffffffffffff7f7debd
c6b5848ca57373c69494deb5b5efd6d6f7e7defff7f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7e7b5a5a5847b7b6b5a634a424a424a52315252184a52
216b7342a5a56bdee76bf7f763ffff52f7ff52ffff52fff75aefe76bd6ce73b5a57b948cded6ceffffffffffffffffffffffffefffffeffffff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7dedec6adadad8c8cbd9c94cead94debd9cdebd9ce7c6a5dec6a5dec6a5d6c6a5d6ce
adcec6a5d6c6add6c6addec6ade7bdadefbdb5e7bdade7c6b5e7ceb5e7d6bddec6addec6addec6addec6addec6a5deceaddec6ade7ceaddec6a5e7ceaddec6a5
e7ceaddec6a5dec6addec6addec6addec6ade7ceb5e7ceb5efd6bdefd6b5efd6bde7d6b5efd6b5e7ceb5e7ceb5deceade7c6addec6ade7c6addec6addec6adde
bda5e7c6addec6ade7c6addebdadefcebdefcebdefcebde7c6adefc6b5e7bdaddebdadd6b5a5debda5d6bda5c6ad9cad9484c6a59cdec6b5efe7defff7efffff
ffffffffffffffffffffffffffe7d6d6b58c8c9c7373bd9494d6adadefc6c6ffdedefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefd6cece9c9494736b6b5a5252635252
5a4a524a424a39424a39525a184a5210525a297b8452b5bd63dee773ffff5af7f763f7f763ded663bdb5739c8cbdbdb5f7efeffffffffffff7fffffff7fffff7
ffffeffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffeff7f7eff7f7cececea5a5a5948c8cb5a5a5ceada5debda5e7bd9ce7c6a5e7bd
9ce7c6a5dec6a5decea5d6c6a5d6c6a5d6c6a5dec6ade7bdadf7bdb5ffb5b5f7bdb5debdade7ceb5e7ceb5dec6add6bda5dec6addec6addec6add6c6a5dec6ad
dec6a5dec6addec6a5dec6a5dec6a5dec6add6bda5dec6add6bda5dec6addec6a5dec6addec6addec6addec6ade7ceb5e7d6b5efd6bde7ceade7ceb5e7ceb5e7
cebde7ceb5e7ceb5dec6b5e7c6b5debdaddebdadd6bdaddec6addec6adefcebdefcebdefcebddebdaddebdaddebda5dec6addebda5debdaddeb5a5deb5a5cea5
94cea594bd9c8ce7c6bdefe7defffff7fffff7fffffffffff7fffff7efdedebda59ca57373bd848cd69c9cefc6c6f7d6d6ffefeff7f7f7f7fffff7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7efbdbdbd848484
6b63635a52525a4a4a5242426352525a4a52524a5242424a394a52294a4a21525a21636b398c9463cece73efe773e7de7bd6ce6ba59c94ada5e7e7deffffffff
fffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffff7ffffe7ffffadcece8cadad94adb5adbdc6adb5b5cebd
b5debda5efc6a5efc6a5f7ceadefc6a5efceade7c6a5e7c6addec6a5e7c6ade7bdadefbdb5f7b5b5ffbdbdf7bdb5e7c6b5e7ceb5e7d6bddec6addec6addec6ad
dec6addec6a5dec6addec6a5e7c6addec6a5e7c6addec6a5e7c6addec6addec6addec6a5dec6addec6a5dec6addec6a5e7c6addec6a5dec6ade7c6adefd6bde7
ceb5dec6addec6a5e7ceb5e7ceb5e7cebde7ceb5efd6bde7ceb5e7ceb5dec6ade7c6b5debdaddebdaddebdade7cebde7cebde7cebddec6addec6addec6ade7c6
ade7bda5efc6ade7bda5e7b5a5d6a594cea594bd9c8cc6ada5decec6fff7effffff7fffffffffff7ffffffffefefd6adadad7373bd7b84ce949ce7bdbdefd6d6
f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
d6d6d6adadad7373735252524a4a4a524a4a524a4a5a4a4a523942634a525a4a52524a4a42424a425252314a52294a522152523173735aa59c7bbdb573ada57b
9c94c6ceceffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffcef7f78cc6c66bb5ad7bc6
c69cdede9cdedeaddedeb5cec6cec6b5d6bdaddec6ade7c6adefc6adefc6a5e7c6a5e7c6a5e7c6addebda5e7c6ade7bdadefbdb5efb5b5efbdb5debdade7ceb5
e7ceb5dec6add6bda5dec6addec6a5dec6a5debda5dec6addebda5dec6a5dec6a5e7c6a5debda5dec6addec6addec6addec6a5dec6addec6a5dec6addebda5de
c6add6bda5dec6ade7ceb5efd6b5dec6addec6a5d6bda5dec6addec6addec6b5dec6b5e7ceb5e7ceb5e7cebde7ceb5e7cebddec6addec6addec6ade7ceb5e7ce
b5e7ceb5dec6a5dec6a5dec6a5e7c6addebda5e7b5a5e7b5a5efc6addeb59cd6ad9cbd9c8cbda594c6b5a5efe7d6fff7effffff7fffff7ffffffffefe7debdbd
ad7b7bad7373bd8c94deb5b5e7ceceffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffcecece9c949c6b6b6b5252524a4a4a4a4a4a3942424a4a4a5a5252524a425242425a52525a4a52524a524a4a4a424a52394a5239525242
5a5a5a7373637b736b7b73a5adadf7f7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffd6f7
ff84c6c65ab5b55acec673efe77bf7ef8cffff94f7f7a5efe7b5ded6bdd6c6bdc6b5cec6b5d6bdade7c6ade7c6a5efc6ade7c6a5e7c6addec6addec6addebdad
dec6b5debdaddec6b5e7ceb5efcebddec6addec6addec6ade7c6addebda5e7c6addec6a5e7c6addec6a5e7c6addec6a5e7c6a5dec6a5e7c6addec6ade7c6adde
c6ade7c6addec6ade7c6addec6addec6a5debda5efceb5efd6b5efd6bde7c6addec6addebdaddec6addebdaddec6addec6ade7ceb5e7ceb5efceb5e7ceb5efd6
bde7ceb5e7ceb5e7ceb5efd6bdefd6b5e7d6b5dec6a5dec6a5e7c6ade7c6addeb59ce7bda5efc6ade7bdaddebda5debda5cead94bd9c8cbda594e7d6c6ffefe7
fffff7fff7effffffffff7f7e7cec6ad8484ad7b7bbd8c8cd6adadefceceffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffff7f7f7c6c6c68c8c8c63636352525242424242524a42524a424a4a394a424a524a52524a5a524a524242524a4a524a4a5a
52524a4a4a4a4a4a5a63527b736b736363735a5a7b6363cec6c6fffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffdef7f79cd6d65ab5b552cec652e7de52efef63ffff5af7f76bf7f773f7f784f7ef8ce7de9cdecea5cebdbdc6b5cec6ade7c6ade7c6a5e7c6a5
e7c6a5e7c6a5d6c6a5dec6add6c6a5d6c6addec6adefcebde7ceb5e7c6b5debda5e7c6addec6ade7c6addebda5e7c6addec6a5e7c6addec6a5e7c6a5dec6a5e7
c6addebda5e7c6addec6ade7c6addec6a5e7c6addebda5e7c6addebda5dec6a5debda5e7ceb5e7ceb5e7c6addebda5e7c6addec6a5e7c6addebda5dec6addebd
a5dec6a5debda5dec6addec6ade7ceb5e7ceadefd6b5e7d6b5efdebdefd6b5e7ceadd6c6a5deceaddeceaddec6add6bd9cdebda5debda5debda5deb59cdebda5
dead9cd6ad94c69c8cceb5ade7e7d6fffff7fff7f7fff7f7fff7f7efded6bd8c94b57b7bbd8484dea5adf7c6ceffe7e7fff7efffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff7f7f7bdbdbd8484845a5a5a524a524a4a4a4a5252424a4a42525242524a42524a424a4252524a52
524a52524a524a4a52524a52524a5a5a5a6b635a847b6b8c736b845a5a6b4242ad8c8cf7e7effffffff7fffff7fffff7ffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7ffffa5cece6bb5ad6bcec66befe763fff752fff74afff752ffff5affff6bffff73fff78cffff9cf7efb5e7debdd6c6
c6cebdcec6ade7c6ade7c6a5f7ceadefc6a5e7ceaddec6a5deceaddec6ade7c6b5efcebdefd6bde7c6b5efc6adefc6adf7c6b5e7c6ade7c6ade7c6adefc6adef
c6adefc6ade7c6a5efc6ade7c6adefc6b5efc6adefceb5efc6adefc6ade7c6adefc6ade7c6adefceb5e7c6ade7bdade7c6adf7d6bdefceb5efc6adefc6adf7c6
adefc6adefc6adefc6adefc6ade7c6a5efc6adefc6adefceade7c6a5e7ceade7ceadf7d6b5f7d6b5ffdec6f7debdefd6b5dec6a5dec6a5dec6ade7ceaddec6a5
e7c6addebda5e7c6a5e7bda5efbda5e7ad9cdea594c69c8cc6ada5e7d6cefff7effffff7fffffffffffff7dedec69494bd737bbd7b84dea5adefceceffe7e7f7
f7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefb5b5b58484845a5a5a5252524242424a4a524a524a42524a39424242
524a4a524a4a52524a4a4252524a52525252524a5a5252736b6b736b6b847b737b6b63735a526342396b4a4abdadadfffffffffffffffffff7ffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffbdd6d673adad73bdb58ccece31847b4ab5ad6bffef5afff76bfff75acec6297b7339736b
4a6363636b6b6b63636b635aadad9cc6cebdd6c6b5debda5b57b639c634ad6b594e7c6ad9c735a94634af7bdadf7ceb5ceb5a57b524aad6b63e7ad9ca55a4ac6
9484e7c6addebda5ad7b6b8c5242ce9484efc6b5d6ad9cad7b6b8c5a4a8c524a8c5a4a9c6b5ae7b59cf7c6b5e7b5a5e7b5a5845a4aad7b6bf7c6b5efbda5f7bd
addea594945a4ac6847bde9c949c524a945242945a4a8c5242c68c84ce8c7b9c5a4a945a4a8c5a4a7b5242b58473ad6352a55a4a9c5a4a9463529c7363deb5a5
efceb5debdade7c6ade7c6addebda5e7bda5e7bda5efc6ade7bd9ce7b59ce7b59cdeb59cbd9c8cbda594decebdfff7e7fffff7fffffffffffff7dedece9c9cad
7373bd8484deadadefc6c6efded6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e7b5b5b58484845a5a5a5252524a4a4a4a52524a
4a4a5252525252525252524242424a4a4a525252525252525252636363737373737373736b6b848484847373735a525a42395239397b6b6bded6d6ffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffdef7ef7bada55ab5ad94dede9cc6c6294a4a396b6ba5fff78cffff
9cfff76ba59c2129296b5252b58c8cb58c8ca57b7b523129737363cecebdf7decef7cebd7b39296b2118e7c6adefc6b5844a39632110ffcebdf7cebdd6ceb539
10008c4242dea5a58c2118ad635aefc6bdb58c845a21214a0000bd7373e7adad94635a733129ad7b73bd9c948c524a5a1810e7ada5ffbdb5ffcebdf7c6b54208
0894524affcebdf7b5adffc6bdd6ada5631810a55252de9c94731010944239c67b73c67b73de9494ce736b7b18109c524aad736ba57b6bd6a59c9431318c1818
bd736bad736b7339317b4239ce9c94f7cebdffd6c6e7bdadefc6b5e7c6ade7c6addebda5e7c6a5debda5e7c6a5e7bda5deb59cc6a58cc6ad94cec6b5f7f7e7ff
fff7ffffffffffffffefefd6ada5a57373bd8c8cd6a59cf7cec6ffe7defffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7ffffffffffffffffffffffffffffffffffffe7e7e7adadad7b7b7b5a5a5a4a
4a4a4242424a4a4a4a4a4a5252524a52524a4a4a424a4a5252525252524a4a4a5a5a5a7373736b6b6b737373635a5a736b6b7b737b6b5a5a634a425a42394a39
39a59c94f7f7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffff9cc6bd52ad9c63d6c68cefe7add6d6
424a4a636b73cef7efa5f7efadf7ef94bdb5313931847373dedededef7efceded66b736b3931298c6b639c6b63ad6b6b4a1010946b63e7cebdefcebd9c524a6b
2118e7bdadefcebddeceb53918087b3939e7adad8c1818b55a5ad69c94844a42732929843129bd7b73b57373631818b57b73f7cebdffe7deb57b6b632118dea5
9cffc6b5efb5adffd6ce4208009c5a52ffbdadffbdb5f7c6b5decebd5208009c524ad69c947b2118bd6b63ffcec6ffc6bdffc6c6d68484842921bd736bffcec6
f7d6c6ffefde8439319c2929f7ada5ffcec6d6a59c632929734231f7cebdf7cebdf7cebdefceb5efceb5dec6a5dec6a5debda5dec6a5dec6a5e7c6a5debd9cde
b59cbda58cbda594cebdadf7e7defffff7fffffffffffffff7efceadad9c7373b58484d6ada5efcec6f7efe7f7f7efffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefb5
b5b57b7b7b5252525252525252525252524a4a4a5252524a4a4a4a52524a52525252524a4a4a5a5a5a7373737b7b7b6b6b6b6b6b6b524a4a6363637b7373736b
6b5a4a4a634a425a4239735a5acec6bdfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffffffffffffdee7e75a9c94
63cebd63e7d68cf7efadd6d65a525a392931524a5231524a7b9c9c9cadad394242737b7bbdf7efa5fff7b5ffffa5d6ce4a4242632929ad5a63732929391010d6
cebdc6c6bdefd6ce7329216b1010ad736befcec6e7d6c64218107b4a42e7ada5a52929b54a42b563637b3129ad63638c3931bd8484a55a5a630808ce948cffd6
c6ad7b6b7339294a1008e7ada5ffc6b5f7bdb5ffcebd5a21105218187b42317b4239ce9484debdb5521008945a52deb5ad6b1818732929844a428c524ac6948c
dea59c843131b5736be7bdb5efcebdffded6944a428c2121f7c6c6f7c6bdffefde6329214a1810ffd6c6e7bda5e7c6b5f7d6bdefceb5efceb5e7ceade7ceadde
c6a5dec6a5dec6a5e7c6add6b59cdebda5cead9cbd9c8cc6ada5f7efe7fffff7fffffffffffffff7f7ceb5ad9c7373bd8c84d6ada5efd6ceffefe7fff7f7ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffefefefb5b5b57b7b7b5252524a4a4a4a4a4a5252524a4a4a5252524242424a52524a52524a52525252526b6b6b7373736b6b6b5a5a5a5252524a4a
4a524a4a7b7373847b7b52525263524a6342395a4239847373efe7e7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7f794a59c6bb5ad5ad6c673efde9cf7efcedede73525a7b5263ceb5bd8c7b844a293194737b5a424a63737b9cefe784ffef73ffefa5ffff6b848452
1821d6848c7329316b635aceefe7ceefe78c8c84520000c6525a732118e7a5a5e7d6ce5a21217b3939f7b5b5ad31318418187b2921a56b63efbdb5a55252bd73
6bce73737b1810bd736bf7bdb5efbdadd6ada5d69c94efb5adf7bdadf7bdadffe7d64a10086b3931d6b5add6b5addeada5e7c6b55a21188c524adeada5733129
844a42dead9cc6948ce7b5a5dea59c844239946352d6b5a5d6bdadf7ded69c5a526b1010d69c94f7c6b5ffdece522118522918ffe7d6d6ad94efceb5e7c6ade7
ceb5e7ceb5efd6b5e7ceade7ceaddec6a5dec6a5d6bda5d6bd9cdeb59ce7b5a5d6a594ce9c94ceada5f7efe7fffff7fffffffff7effff7f7ceadad946b63ad84
84d6b5ade7cec6ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7f7f7b5b5b57b7b7b5a5a5a5252524a4a4a5252525252525252524a52525a5a5a4a4a4a4a5252636b637b84847373736363
635252524a4a4a5a5a5a524a4a6363638484846363635a52525a4a4a634a424a31299c8c84fff7efffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffe7cece6b737373bdb57befde84f7efb5ffffc6d6de6b52635a3142bd8c9c8452634218218c637373636b4a636b84dede6b
fff763fff773fff7bdefef5a424a6b3942290810a5cec6a5e7deb5efe71818189c636bf7c6d69439428c3942deadad6329297b3939efadb5a539425a00009442
42efb5a5ffcebda56352bd6b63ffc6b594524a5a1810845242b58c7bc69c8c946352f7c6b5ffc6bdefbdadffe7d6420808632921b58473ad7b6bc69484debdad
5a2110845242deb5a56b31217b4a39b5847bb5847bce9c94d6a59c7342398c635aceb5a5dec6b5f7dece9c635a520808a5635aad73638c63524a18088c5a4af7
cebdf7d6bde7c6ade7c6addec6a5e7ceade7ceadefd6b5e7ceadefd6b5deceadd6c6a5d6c6a5e7bda5efb5a5f7b5addea59cc6948cc6a59cf7efe7fffff7ffff
fffffffffffff7ceada5a57373ad8484d6adadefcecefff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7f7f7bdbdbd8484845a5a5a5252525252525252525252525252524a4a4a525252424a4a636363737b
7b737b7b5a5a5a525a5a5252525252525a5a5a5252525252528484846b6b6b4239394a42426b5a525a42395a3939a59c94fffffffffff7ffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7ffffe7fff7f7ffffad84846b424a63848473cec67bf7ef8cfff79cefef7ba5ad63737b63636b5a5a638c9ca5a5
cece638c8c63949c7be7e763ffff52fff76bfff7b5ffff9cadb55a6b7342737384e7de94fff763a59c4a6b6bb5c6ceeff7ffcebdbd735a5ab59c9c9c7b7b9c73
73e7c6bda5847ba5736bd69c94ffcec6efcebda5947b94846befcebdefd6c6bd9484845a4a7b52426b42319c6b5adead9ce7b5a5ffcebdffefde84524a945a4a
94635a9c635aad7b6befbdad9c6b5ab58c7bdebdad9c6b5a94635a946352845a4aad7b73cea594a57b73a58473d6bdadd6bdadf7d6c6bd847ba5635a9c5a528c
5a4a8c5a4ac69484e7b5a5f7cebdffd6bddec6a5dec6a5dec6a5debda5dec6a5dec6a5efceade7ceade7d6b5deceade7ceadefc6a5f7bdadefb5a5efada5dea5
9cb58c84b59c94f7efe7fffff7fffff7fffffffff7f7c6a5a5ad7b7bb58484d6adadf7d6d6ffefeffff7f7ffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffcecece8c8c8c5a5a5a5252524a4a4a5252524a4a4a5252525252525252
524a4a4a7373737373736b6b6b5a5a5a525a5a4a4a4a4a4a4a5252525252524a4a4a8484847373735a52525a52525a5252524242634242735252c6b5b5ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7ffffeffff77339426b31394a5252296b6b5acec67befe79cfff7a5f7f7b5
f7f7c6efefb5e7deb5fff794ffff9cf7f794e7ef7bfff763ffff52fff76bffffadffffb5f7f7a5f7f784efe77bffff7bfff7a5fff79cefef94fff7a5ffffbdff
ffbdefe7ceefe7ceded6cecec6deded6dee7d6e7d6cef7c6bde7c6b5e7d6c6e7deced6d6bdceceb5efdec6f7e7cef7decef7d6c6f7decef7cebdefbdadf7c6bd
efbdadffcebdffe7d6f7deceffdecef7cec6ffcebdffcec6ffdecef7cebdffded6f7deceffdecef7d6c6f7d6c6f7cebdffd6cef7cebde7c6b5debdade7ceb5ef
cebdffd6c6ffd6ceffd6c6f7dec6ffdeceefc6adf7ceb5efc6addebda5f7debde7ceade7c6ade7c6addec6a5e7c6ade7c6a5e7ceade7ceadf7debdefceb5efc6
a5e7b59cf7bdadf7bdadefb5a5d6a59cbd948cc6ada5fff7effffff7ffffffffffffffffffb5848cb58484bd8c8cdebdbdf7dedefff7efffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6d6d68484846363635252524a4a4a5252524a4a
4a5252524a4a4a4a4a4a636363848484737373525a5a4a4a4a5a5a5a4a52524a52525252525252524a4a4a6b6b6b848484635a5a524a4a635a5a524a4a5a4a4a
5a3939947373f7e7deffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffada5a573394273424a4a5252295a5a21
6363398c8484cecea5efefadffffa5f7efa5f7ef84f7e773fff76bfff773ffff6bffff6bfff75afff773ffff73efef94ffff9cffff84ffff63fff75afff784ff
ff6bfff74afff74afff773fff78cfff7adfff7adefe79cd6c6b5cec6c6bdb5dec6bdd6bdb5dec6bddebdb5e7c6b5dec6adc6bda5bdc6addeceb5e7c6b5ffd6c6
e7bdadf7c6b5f7c6b5efbdadefbdadefbdadf7c6b5ffcebdf7c6b5f7c6b5e7b5adf7c6bdefc6b5efc6b5ffd6c6ffd6c6ffc6b5ffcebdf7c6b5efc6b5efc6b5ef
ceb5dec6ade7c6b5e7bdadf7c6b5efbdadf7c6b5efb5a5ffd6c6efbdadf7c6b5efc6ade7bda5e7bda5f7d6bdf7d6bde7c6addebda5debda5e7bda5e7c6ade7c6
a5e7bda5e7bda5f7ceb5ffceb5ffd6bdefbdadf7c6b5e7b5a5e7b5a5c6948cc6948cdeb5adfff7f7fffff7fffffffffff7fff7f7ce9c9ca57373bd9494debdbd
efd6d6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e79c9c9c6363634a4a
4a5252524a4a4a5252525252524a4a4a5a5a5a7373737b7b7b6363635a5a5a4a52525252525252525252525252525a5a5a5252526363637373737b73735a5a5a
5a52525a5252635a5a5a4a4a6342429c7b7bfff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff846b6b63
29317b4a524a4a4a4a6363315a5a39636342636b6b8c94b5dedeaddede8cd6ce7be7de63efde5aefde5aded67befef8cf7f784f7ef63d6ce94efef84d6d673ce
c67bdede6bded663ded67befe742c6bd4affef52ffff52ffef84fff78cded67bc6bdb5ffffb5ded6c6b5adbda5a5cec6bdd6bdb5dea59cde9c94ffc6b5cead94
bdad94dec6ade7bdade7bdaddeb5a5d6a594e7b5a5ffd6c6e7b5a5d69c8ce7ada5ce948cd6a59cd6ad9ce7bdade7bdadd6a59cce9c8cefc6b5f7c6b5efb5a5ff
bdadf7b5a5dead9cdeb5a5debda5e7c6b5d6ad9cd6a594d69c8cd69c8cce9c8cefb5a5d69c8cdead94ce9c8cc69484c69484f7ceb5efc6adf7ceb5c69c84cead
94f7c6b5efc6ade7bda5dead9cdead94e7ad94d69c84d6ad94efc6addeb59cbd947bd6a58cd69c8cd69c8cce948cbd8484efcec6ffffffffffffffffffffffff
ffefefad84849c7b7bbd9c9ce7cecef7dedefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7
e7adadad6b6b6b4a4a4a4a4a4a5252524a4a4a5252524a4a4a6363637373737b7b7b636363525252424a4a525a525252524a52524a5252525a5a525252525252
7373737b7b7b5a5a5a5a5a5a525252525252635a5a5a4a4a634242a58c84fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff634a4a7339428c525a6352525a63635263634252526b5a637b525a310810310810312129183129529484528c8429393994a5ad7b949c1821
29949ca5a59ca5392131211829182931102931425a635a636b1829317bbdbda5fff7a5ffffa5dede393942395a528cffe78ccec6634a4a6b4a4abdc6b5d6c6b5
a55a5a843129d6847ba55a527b3929d69c8cf7cebd8c5a4a3908006b3129dea594f7b5ad5210085218086329185a21104210006b4231e7bdadf7cebdd6ad9c5a
2921733939ffc6b5ffc6b5ffcebdad736b521808a57b6befcebde7bdad9463525210086321185a21184a2110d69c8c5a18184a10005a21106b3121633121dead
9cf7c6b5ce9c8c4a2110522110ad7b6befbda5efbdadad73635210005a10006321105a2910ad846b9c735a5229104a21085218105a1808ce847bc68c84bd948c
f7ded6fffff7fffffffffffffffffff7efef846363a58c84b59c94dec6c6ffe7defff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffc6c6c67373735a5a5a5252525a5a5a4a4a4a5252525252526b6b6b7373737373735a5a5a525252525252525252525a5a5a5a5a4a5252
525a5a5252525252526363638c8c8c7373735a5a5a5252525a5a5a5a5252635a5a5a4a4a6b4a4aa58c8cffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffefef6342397342427b5252634a4a5a5a5a525a5a6b63637b5a635a1829944252ffbdceefc6ced6e7dec6f7ef9c9c
9c632939bd949c6b525a63525adec6d6ffd6de73424aa57b84efd6deffeff7ffeff7ffeff74229315a4a52ced6d6c6d6dea5a5a53918216b848484ffef94ded6
735a5a6b5a52c6ded6deded6a5736b732921d6a59ca55a5a9c3939e79c94bd847b6329215a21185a2110efb5ad632918521008ffd6ceffefe7f7d6c68c5a4a63
3121f7c6b5deb5a5ffdececead9c632918ad7b6bf7c6b5de8c7b944a399c5a4adead9cdebdadffd6c6b57b6b7b3121de948cffe7d6ffefd6ffefde6b29216b29
18f7cebdffdeceffcebdffcec6efbdad9c635a6331218c524a6b3131ffcebdffcec6bd84737b3121d69c94ffded6ffdeceffcebd9c735a522108ceb5a5ffefde
ffdeceefb5a5efb5adbd9484ad9484f7f7effffffffff7f7fffffffff7f7f7e7de8c6b6bb5948cc6a5a5ffded6ffefe7fffff7ffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7f7f7d6d6d68c8c8c5a5a5a4242425a5a5a4a4a4a5252525252526b6b6b7b7b7b7373735252524a4a4a5252525a5a5a
5252525a5a5a525252525a525252524a52525252527b7b7b7b7b7b6363635a52525252525a5252635a5a524a52635252634239a5948cffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7b5b56b31316b4a4a5a4a4263635a525a52525252847b7bad848c4208186b29399463
6b7b737363736b94ada5ad8c8c8429318431425a31399c848ce7dedeefdede5a39396331398c5a636352529c9c9cdeefe7a5a5a54210185a10216b29394a1821
423942bdf7ef8cfff7a5e7de7b6363636363b5f7deceffe794847b633931c6a5a5a56363943931de9494844a3973312994524a6b2118e7b5ad733129843931ff
c6bdf7b5adad73636b39296b3929efc6b5efc6b5ffd6c6e7c6b57b4a394a10086318086b1810631008b57363e7bdadefceb5f7decece9c8c732118d6847bf7bd
adf7c6b5ffefde7b39315208009c524a9c524aa56352f7b5adf7bdad6329187b4239debdb56b292194524affd6cec6948c5a10087b29219c524aa55a52deb5a5
a57b63522108c69c8cffdeceffcebdf7bdaddead9ce7b5a5c69c8cb59c8cffffeffffffffffff7fffffffffff7efcece846363c6a59cdeb5adffded6ffefe7ff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e79494946b6b6b5252525252524a4a4a5252525a5a5a7373737b7b7b6b6b6b525252
5a5a5a5252525a5a5a5252525a5a5a525252525a52525a5a5a5a5a5252526b6b6b8484847373735252526363635a5252635a63635a5a5a5252635252634a42a5
948cffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffad73737b42396b524a5a5a526b635a6b636352524a8c7b
7bad8c945a29316b29318c63637363636b6b639c8c8cb5737b942931de8c8cdebdbd5a4242524242c6bdb56b4a4a6b3131ce9ca5ad9c94a5b5adcefff7defff7
6b4242842939f7adbd6321315a7b7ba5fff7a5fff7c6e7de9c7373635252ceefe7def7ef94847b311810ada59cb57b739c31317b21186b2118deb5adc6847b63
1810efd6ce732929631810efada5ffd6cece8c84deb5a5c6948cefc6b5e7bdade7c6adffdeced6b5a56b3121b57b6bbd736b9c4a42efad9cefc6b5d6bda5efce
b5de9c8c8c3129ce736befb5a5f7cebdffe7d68439316b1810bd7b73ce8c84b5736bffbdb5ce8c846b2118dea59cffded6b57373733129e7b5adc6a5a5631010
a55a5ad68c8cc67b73dea59cb5736b5a1808ce947bf7c6adf7ceb5efc6b5efc6add6ad9cc69c8cb58c7bf7d6c6fffffffffff7fffffffffffffff7efc6a5a594
6b63cea59cefc6bdffe7defff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7f7f7fffffffffffffffffffffffff7f7f7adadad7373735252524a4a4a5252524a4a4a5a5a5a737373
7373736b6b6b5252525252525a5a5a5a5a5a525252525a5a525a5a525a52525252525a5a5252525a5a5a7373738484845a5a5a5a5a5a5a5a5a635a5a5a5a5a63
5a5a5a5252635252634a42ad9494fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7b4a4a6b393163524a635a
52735a5a7b6b6b736363847b7bbdada58463635a18216b31399463639c6b6bd69494ce6b73942129b57373decec6635a524a3931cec6c66342428c5252ceb5b5
cecec6b5cec6b5fff7c6ffffb5adad6b2931c663733921216bc6bd94fff79cd6ceb5adad945a63844a4ad6bdbdded6ce947b7b3121189c9c94b5848473101073
1818b5736bffcebdb5736b732921e7c6bdd6948c7b2921944a42dea59ce7bdaddecebddead9cefc6b5efceb5e7c6b5f7cebdefc6b59c6b5a732929ad5242b563
52efb5a5debda5dec6adefceb5d69c8c7b2921b56b5adead9cefc6b5ffdece944a425a0808d6bdb5deb5addebdb5efada57b3129733129ffc6bdffd6cedebdbd
7321219c6363bd948c5a10109c6b63deb5b5deada5f7c6bdbd736b631818c68c7bffd6bddebda5efd6bdefceb5d6b59cefc6b5ce9484b5847bf7efe7f7fff7ff
fffffffff7fffff7efe7dead8484ad847bd6a5a5efc6c6ffefe7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdedede8484846363634a4a4a4a4a4a
5252525a5a5a7373737b7b7b6363635252525a5a5a5a5a5a5252525252525a5a5a5252525a5a5a5252525a63635a5a5a5252526363638484846b6b6b5a5a5a63
63635a5a5a6363636363635a52526b6363635252735252ad9c94ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ff734a4a84524a7b635a847b737b6b639c8c8c8c8c848c8c8cb5adadd6c6c6946b736339396339395a31319c6363ce7b849439426b31314a31314a3939847b73
e7dede8473735a4a4a4a4242314a4a294a428cf7de9cfff7ceffff5a636b52424a425a639cffff6be7de397b7331424a52424a52424a52424a635a6363636339
4a5294b5b59c949c6b4a527b635acec6b5efded6bda59c6b4242e7cec6ffefdece9c94733939844a427b4a397342318c6352f7cebde7c6b5e7cebde7d6bdf7de
ced6b5a5844a39944239ce8c7bffc6b5efc6b5d6c6adefdec6d6ad94945a4ab58473e7c6addebda5ffe7d69c635a733939733931733931733931e7ada57b4239
b57b6bf7bdb5ffd6ceffcec6ce8c84a56b5ace8c847342397342397339317b3939ce948cbd847b844a31ce9c8cd6b59cdeceadd6c6adefdebde7c6adefbdade7
ad9cc69484bdad9cfffff7ffffffffffffffffffffffffefdedead7b7bbd8c84e7bdb5ffded6fff7effffff7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefefa5a5a5
5a5a5a4a4a4a4a4a4a5252525a5a5a7373737373736363635252525252525252525a5a5a5252525a5a5a5252525a5a5a525252525252525a5a5a63635a5a5a6b
6b6b8c8c8c5a5a5a5a5a5a6363635a5a5a636363635a5a635a5a5a525a635252634a42ad9494fffff7ffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7f7845a528452528c6b6b84736b8473736b6b6b636b6b5263636b73739c9c9cc6bdbdbdb5b5ad9c9c948484a58c8cc69ca5deadb5
c6a5a5b5a5a5a5a5a5a5a5a5adb5bdcededecee7e7c6f7efadefef9cf7f78cfff78cffff94ffff9cffff9cf7ff9cffff84ffff8cffff9cf7ffadf7ffadeff7b5
eff7adeff7b5eff7adeff7a5f7ff9cf7f7adf7ffadeff7b5fff7adf7e7b5efdebde7d6c6decececebde7d6c6f7e7d6ffe7deefc6bde7b5ade7bdadefcebde7ce
bddecebdd6ceb5ded6bde7dec6ffe7d6ffdeceffd6c6ffc6bdffc6b5efc6ade7c6addeceb5e7dec6e7d6bde7ceb5d6c6a5dec6adefd6bdffdecef7decef7d6c6
efcebdefd6bdf7d6c6ffdeceefceb5debdade7c6b5ffdeceffdeceffd6c6ffd6c6ffdeceefd6c6efd6c6efcebdf7cebdf7cebdf7cebddec6add6c6adcec6a5ce
c6a5cec6a5e7ceb5efceb5efbda5d69c8cad8c73e7d6bdffffffffffffffffffffffffffeff7deadb5b57b73c69c8ce7c6bdf7e7d6fffff7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffbdbdbd8484845a5a5a5252525252525a5a5a7b7b7b7373736363635252525a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a52
5a5a5a63635a5a5a5a5a5a8484848484846363635a5a5a5a5a5a6363636363636b6363635a5a635a5a6352526b524aad948cffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffff76b42427b42427b52527b635a6b635a636b635263635a63635a63636b73737373738c848c8c8484
8c84847b736b7b7373847b7b8c84848484847373735a63635a737373949494c6c69ce7e7a5ffff8cfff77bfff773ffff73ffff6bffff7bffff7bffff84ffff84
ffff8cffff8cffff94ffff8cffff8cffff8cffff8cffff84ffff84ffff7bffff84ffff7bffff84ffff84ffef94f7e794e7d6a5d6c6b5c6bdd6cebdf7d6c6ffce
c6f7cebdf7cebde7c6b5dec6add6c6add6ceb5c6c6add6ceb5efcebdffd6c6ffcebdffcebdf7ceb5f7cebde7ceb5e7debddedebde7debddeceb5e7ceade7c6ad
efd6bde7cebdefd6c6e7cebde7cebddeceb5efd6bde7cebde7ceb5d6bda5dec6adefceb5f7d6bdefceb5efd6bde7d6bde7d6bddeceb5e7ceb5efc6b5f7cebdef
ceb5e7ceb5d6c6add6c6adcec6a5d6c6addec6adefceb5efbda5e7bda5c69c7bb59c84fff7e7ffffffffffffffffffffefffffdee7c6948cad847bcead9cefde
ceffefe7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7f7f7ffffffffffffe7e7e78c8c8c5a5a5a4a4a4a5a5a5a5a5a5a7373737373736b6b6b5252525252525252525a5a5a5252525a5a5a5a5a5a5a
5a5a5252525a5a5a5a5a5a5a635a525a5a5a635a5a63638c8c8c5a5a5a5a5a5a5a5a5a5a5a5a5a52525a5a5a635a5a6b63636b63637363637b5a5ab5a59cffff
f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efef6b42427339397b52526b5252635a5a5a635a5a63635263635a6363
5a63636b63636b636373636b6b63636b635a635a5a5a635a525a5a5a635a525a5a525a5a425252426363396b6b52948c6bc6c684f7ef7bfff76bfff75afff763
ffff63ffff73ffff73ffff73ffff6bffff73ffff6bffff6bffff63ffff6bffff63ffff6bffff63ffff63ffff63ffff63ffff63fff76bffff6bffef7bf7e78ce7
d6add6cec6c6bde7c6bdefbdadefbdb5efc6b5e7c6b5d6bda5dec6a5d6c6add6c6adcebdaddec6addec6b5e7ceb5dec6b5dec6add6c6addec6add6c6a5dec6ad
dec6ade7c6ade7c6adf7cebde7c6b5e7ceb5dec6addec6b5debdaddec6add6bda5d6bda5debdaddec6add6bda5dec6ade7ceb5efceb5dec6addec6addec6ade7
c6b5e7bda5efbdadefbdadefc6ade7bda5dec6add6c6add6ceadcec6a5d6c6a5dec6adefceadefc6add6ad94ad8c73dec6bdfffffffffffffff7fffffffffff7
f7e7c6bda57b73b59c8cdec6bdf7e7defff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffb5b5b57b7b7b4a4a4a5a5a5a5a5a5a7373737373736b6b6b5252525252525252525a5a5a5a
5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a6363635a5a5a525a5a5a63638484847b7b7b6363635a5a5a6363636363636b6b6b736b6b7b7b7b7b737b847b
7b7b6b6b846363b59c9cfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ef734a427b4a4a7b525273635a6b635a
636b6b5a63635a6b6b5a63636b6b6b6b63636b636363525a6b5a5a6b5a5a635a5a52525252524a52524a635a5a635a5a635a5a525252525a5a395a5a39737352
a5a573d6d673f7ef6bfff763fff773ffff6bffff73ffff63ffff63ffff5affff5affff52ffff52ffff52ffff52ffff52ffff5affff52ffff5affff52ffff5aff
ff5affff63fff76bf7ef84f7e79ce7d6b5decebdcebdcebdadceb59ce7bdadefc6adefceb5e7c6adefceade7c6ade7c6add6c6addeceb5d6ceb5d6ceb5cebda5
cebda5ceb59cd6b59cd6ad9cdeb5a5e7b59cefbda5efbdadefc6b5e7c6adefc6b5efc6b5f7cebdefceb5efceb5e7c6ade7c6addec6addec6addec6a5e7ceb5e7
ceb5e7ceadd6bda5debdade7b5a5efb5a5efb5a5f7b5a5efb5a5efbdade7bda5e7c6addec6add6c6add6bda5dec6ade7c6ade7c6addebda5d6b59cad9484fff7
effffffffffffffffffffffffff7efe7c6a59ca5847bd6b5adefd6d6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6d6d69494945a5a5a5252525a5a5a7373737373736b6b6b52525252
52525a5a5a5a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a63635a63634a5252636b638c8c8c6363636363636b6b6b7373737b7b7b7b7b
7b8c8484847b7b847b7b736b6b7363636b4a4aad948cfff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efef734a4a
734242845a5a735a5a736363636363636b6b5a6363636b6b635a636b5a636b5a5a735a636b52526b5252634a4a634a4a634a426b4a4a6b424273424273394273
4a4a63424a63525a4a5252395a5a3173735ab5ad7bdede84fff773ffff73ffff6bffff63ffff52ffff52ffff42ffff42ffff42ffff4affff42ffff52ffff52ff
ff5affff52ffff52ffff4af7ff5aeff75adee76bdede73ded67bded684d6c694dec6a5ceb5bdc6adcebda5dec6ade7c6adefc6adefc6adefc6ade7bda5dec6ad
d6bda5d6ceb5d6ceb5cebdadc6ad9ccead9cce9c8cd69c8cd69484d6948cd6948cde9c94d6a594dead9cdeb59ce7bdadefc6adefceb5efceb5efceb5e7c6adef
ceb5e7c6addec6addeceade7ceb5d6bda5d6b59cd6ad94dead9cdea594efad9cefa594efad9cefb59cefb5a5e7b5a5debda5d6bda5dec6a5d6bda5dec6a5d6bd
9ce7c6addebda5b58c84d6b5b5fffffffff7f7fffffffffff7fffff7d6c6bda5847bc69c94e7c6c6ffdedefff7f7ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffadadad7373735252526363636b6b6b7b
7b7b6b6b6b5252525a5a5a5a5a5a6363635a5a5a5a5a5a5a5a5a6363635a5a5a6363635a5a5a6363635a5a5a6363635a63635a6363737373949c9c7373737b7b
7b8484848484847b7b7b7b7b7b737373736b736b63636b63636b5a526b524aa58c8cfffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff76b4a427b4a427b5a527b63637363636b6b6b636b6b6b6b6b6b6b6b736b6b7363637363636b525a6b5252634a4a6b42426339396b39396b
31317331317329318431397b31398439426b394263424a5a4a524a5252395a5a5a8c8c73bdbd84efef7bffff84ffff6bffff63ffff52ffff52ffff42ffff4aff
ff4affff52ffff52ffff5affff63ffff63ffff5af7ff5aefff5adee763cede63c6c66bbdbd6bbdb573c6bd73ceb584d6bd94d6bda5d6b5b5c6adc6c6add6bdad
efc6adefbdadf7c6b5e7bdaddec6addec6addec6adcead9ccea594c68c84c6847bbd736bc6736bc6736bce7b73c67b73ce8c84ce9484d6a594dead9ce7b5a5e7
bda5efc6ade7c6adefceb5efceb5efd6b5e7ceade7d6b5e7ceb5dec6adcead94cea58cc69484ce9484d69484de9484de9484efa594e7a594e7b59cdeb59ce7bd
a5debda5e7c6addec6a5debda5e7c6addebda5cea594bd948cffefe7fffffffffffffffffffffffff7efe7c6a59cbd9494deadadffdedeffeff7ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7e79494945a
5a5a5252527373737b7b7b6b6b6b5a5a5a5252525252525a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a5a6363635a5a5a6363635a5a5a636b6b7373
738c8c8c8c8c8c8c8c8c7373737b7b7b6363636b6b6b6363636363636b63636b6b6b6b63637363636b524aad948cfff7efffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffff7f7734a4a734242845a5a735a5a7363636b6b6b6b6b6b63636b6b6b6b6b63637363636b525a6b4a525a42425a
39395229295a21215a18186318186310186b18217318297b21317b21317329396b29316b394263424a634a525a4a524a636352949c73ced68cf7f78cffff73ff
ff63ffff5affff5affff52ffff52ffff52ffff63ffff63ffff6bffff6bf7ff6bf7ff5ae7ef63d6de6bbdc673adb563949463948c5a9c8c52ad9452bda563d6bd
73debd8cdec69ccebdbdc6b5cebdade7c6b5efbdadefc6ade7bdadefbdb5e7b5a5d6a594c6847bb5736ba55a52a5524a9c4a4aa5524aa55252ad635aad6b63bd
8473bd8c7bce9c84cea58cdead94deb59ce7bda5e7bda5e7c6addec6ade7ceade7ceade7ceb5d6bd9ccead94bd9484b58473ad7363b5736bb57363c67b6bce84
73d68c7bd69484dea594dea594deb59cdeb59ce7bda5debda5debda5deb5a5e7ad9cc69484e7bdb5fffff7fffffff7fffffffffffff7f7e7c6c6b58484ce9c9c
efc6ceffefeffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffb5b5b58484845252526b6b6b7b7b7b7373735252525a5a5a5252525a5a5a5a5a5a5a5a5a5a5a5a6363635a5a5a6363635a5a5a6363636363636b6b
6b6b6b6b7b7b7b7b7b7b848c8c8c9494737b7b7373736363636b6b6b6b6b6b6b6b6b6b6b6b6b6363736b6b6b636b6b6b6b6b5a5a735252a58c84fff7f7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b42427b4a4a7b52527b6363736b6b736b6b6b6b6b736b736b63637b6b6b6b
5a5a73525a634a4a5a3942735252a57b7bad8c8cbd9c9cb59494bd949cbd848cb5737b9c63637b39425a212963292963313173424a6b42426b424263525a4263
635a8c8c7bbdc684d6d694f7f77bf7f77bffff6bffff63ffff5affff5affff5affff6bffff6bffff6bffff63f7ff63efef63d6de8cd6de94b5bd7b7b846b6b6b
5a6363527b734a9c8c42b5a563dece6be7d684efde9cdedeadcec6bdc6b5d6c6b5dec6b5e7bdade7b5a5efada5de948cbd7b73bd7b73ce8c8cc68484c68c84ad
736b9c5a528c4242945a4a9c6352ad7363bd8473ce9c84ce9c84d6a58cd6ad94deb59cdeb59ce7c6a5e7c6ade7ceb5dec6a5d6bda5d6bda5c6ad949473638c63
528c5a4a945a4a9c5a52ad6b5abd736bc68473ce8c7bd69484ce9484e7ad9ce7b59ce7bda5d6ad94efc6ade7ad9cdea594cea594ffefe7fffff7fffffff7ffff
fffffff7e7e7c69c9cb5848ce7bdbdf7dedeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7f7f78c8c8c6363635252527b7b7b7373735252525252525a5a5a5a5a5a5252525252525252526363635a5a5a5a5a5a5a5a
5a6363636363637373737b7b7b8484847b7b7b7b7b7b7b84848c8c8c636363636b6b6363636b6b6b6363636b6b6b6b6b6b6b6b6b6b636b6b6b6b6b6363736363
6b524a9c847bf7e7deffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff6b4a427342427b52527b63637b736b6b6b6b73
6b73736b73736b73735a636b5252634a4a73525aa5848cd6c6c6f7e7e7fff7f7fff7f7fffffffffff7fff7f7f7e7deefded6ceb5b5b59c9c8c6b6b6339395a29
317339426b31396b4242524a525a636b63737b5a848c7bb5bd94efef84efef7bffff6bffff63ffff5affff5affff52ffff52ffff52f7f75affff5aefe76bded6
adefefdee7efcec6ceceb5bdb59ca5848c8c52847b429c9442bdad5aded66befef7bf7f784e7dea5deceadceb5bdc6b5ceb5addeb5adde9c9cd6948cce9494ef
ceceffe7deffe7e7f7e7deefded6d6b5b5cea5a5b57b739c6352945a4aa57363b57b6bb58473c69c84d6a594cea58cdebda5debda5debda5d6bd9cdebda5ceb5
94deceb5efded6d6c6bdc6b5a5b58c847b524a7342397b4231945242a55a52b57363c67b73ce8c84d69c8cd69c8cdead94deb59ce7b5a5e7ad9cd6a594ce9c8c
dec6b5fffff7f7fffffffffffffffffff7f7d6adb5b5848cd6adadf7d6d6fff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffd6d6d68484845a5a5a6363638484846363635252525252525a5a5a5a5a5a6363635a5a5a5a5a
5a5a5a5a6363636363637373737b7b7b8484848484848484847373736b6b6b636363848c847b7b7b636b6b636b6b6b6b6b6b6b6b6b6b6b6b6b6b7373736b6b6b
736b6b6b6b6b736b6b7b6b637b5a5a8c6b6bdecec6ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff735252734a427b
5252846b6b7b6b6b7b73737373737b7373736b6b7b6b736b525a7b6363ad949cf7efeffff7f7fffffffffffffffffff7fff7ffffffffffffeff7eff7ffffffff
fffffff7efe7e7ceadad9c7b7b73424a63293173394273424a7b5a636b5a63525a63526b73528c8c7bcece84efef84ffff6bffff63ffff4affff42ffff42ffff
42ffff4afff763fff76bded6b5f7efeffffffffffffff7fffff7f7dededea5b5b55a8c8c5aa5a55acece6bf7f752efef73ffff84ffe794efd69cd6c6b5c6bdc6
adadc69c9cce9c9cefd6d6fffffffffffffffffffffffffffffffffffffffff7f7e7d6dec6bdce9c8ca57363ad7b6bb58473bd947bbd947bce9c8cd6ad94deb5
9cd6b59cdeb5a5deb59cd6b5a5d6c6adffefe7fff7effff7e7f7e7d6decec6ceada5b5847b8c524a8c4a42944a42bd736bb57363ce847bd69484dea59cdead9c
deb59cdea594dead94c69c8cceb59cffffeffffffffffffffffffffff7ffefced6bd9494cea5a5efcecefff7efffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff9494947373735a5a5a8c8c8c6363635a5a5a5252525a5a5a5a5a
5a5a5a5a5a5a5a6363635a5a5a6363636b6b6b7b7b7b7b7b7b8484847b7b7b7373736363636363635a6363636b6b848c8c7373736363636b6b6b6363636b6b6b
6b6b6b6b6b6b6b6b6b737373736b6b736b73736b6b7b6b6b7b5a5a7b635ab5ada5ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffff8c6b6b734242845a5a7b63637b736b7b73737b737b6b636b73636b7b6b736352528c737bf7e7efffffffffffffffffffffffffffffffffffffeff7
efefffffe7fff7f7fffff7fffffffffffffffffffff7efdeded6c6c69c636b7b39427331427b4a527b525a5a424a52525239525a4a7b7b52a5a56bd6d67bffff
63ffff4affff42ffff39ffff31ffff4affff5af7ef73efde84d6d6d6ffffeff7f7fffffffff7f7ffffffefefef636b736b94a563bdc663dee74aeff752fff763
fff773ffef94f7e79cded6a5bdb59c9494cec6c6fff7f7fffffff7fffff7ffffeffff7f7fffff7fff7fffff7fffff7ffffefffe7d6e7d6cebd8c84b58473a57b
6bbd8c7bbd947bbd9484c69c8cdeb59cdeb59cdeb59cd6ad9cd6b5a5ded6c6fffff7fffff7fffff7fffff7fffff7f7e7dedecec6d6bdb5b57b73a55a5aad6b63
bd7b73bd847bce948cce9c8ccea594dead94dead94cea58cbd9c84f7e7d6fffff7fffffffffffffffffff7dee7c6a5adbd9c94efcec6f7e7deffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdedede8c8c8c5252528c8c8c7b7b7b5a5a
5a4a4a4a6363635a5a5a6363635a5a5a5a5a5a5a5a5a6b6b6b7b7b7b8484848484847b7b7b6b6b6b6b6b6b6363636b6b6b6363636b6b6b737373949c9c6b6b6b
6b6b6b6b6b6b7373736b6b6b7373737373737373737373737b73737373737b73737b6b6b846363735a52ad9c9cffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffb58c8c7342427b5a52846b6b84736b847b7b847b7b7b73737b6b736b5a636b5a63b5adadffffffffffffffffffffff
fffffffffffffffffffffffffff7f7f7ffffffefefeff7f7f7fffffffffffffffffffffffffffffff7d6ded6bdbd7b424a8452528c5a63634242634a52525252
42525a39636b428c8c52b5b573efef6bffff5affff4affff4affff5afff76bfff773f7ef6bdeceadfff7d6fffff7fffffffffffff7f7ffffff6b737b63848c5a
a5ad6bd6de63e7ef5affff52ffff5afff773ffef94f7ef94d6d68cb5b5bdd6d6f7fffff7fffff7ffffeffffff7fffff7fffffffffffff7effffff7fffff7ffff
effffff7f7efdee7c6bdb58c7ba57b6bb58c7bbd8c7bc69484c69c8cd6ad94dead9cd6ad9cc6a594e7d6cefffffffffffffffff7fffffffffffffffffffffff7
fffffff7e7deefcec6bd8484b57b73b57b7bc68c84c69484deb59cdeb59ce7bd9cd6ad8cbd9c84ceb5a5fffffffffffffffffffffffffff7ffc6adb5b59494e7
bdbdffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffb5b5b58484
846363638484846363635252525a5a5a5a5a5a5a5a5a5a5a5a5a5a5a6363637b7b7b7b7b7b8484847373736b6b6b6363636b6b6b6363636b6b6b6b6b6b636b6b
6363638484848c8c8c6b6b6b6363636b6b6b7373737373737373737373737373737b73737373737b737373737384736b7b635a735a52a5948cfffff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdebdbd7342397b52527b63638473737b7373847b84736b737b737b6b5a5a94848cefe7
e7fffffffffffffffffffff7f7ffffffffffffffffffffffffbdb5bd948c94948c8c8c8484948c8c847b7b8c7b84c6b5b5ffffffffffffffffffdececec69c9c
6b424263393963424a634a4a5a4a524a4a52425a5a396b6b398c8c63cece7bf7f773ffff6bffff73ffff73ffff6bf7f75aded68cefe7c6ffffeffffffffff7ff
ffffffffffc6cece426b6b5aa5a563c6c673dee763f7f74affff42fff75afff773fff78cefef7bc6c6addededeffffe7fffff7ffffffffffffffffffffffe7d6
d6c6b5adc6ada5c6ada5dec6b5ceb5a5ffe7d6ffffefefded6c6948cb5847bb5847bb57b73bd8c7bc69484d6a594d69c94cea59ce7c6c6fff7f7ffffffffffff
f7fff7fffffffffff7fffffffffff7fffff7fff7f7f7e7e7efd6d6cea5a5b58c84c69c8cd6ad9cdeb59ccead8cd6b58cbd9c7bbd9c8cfff7efffffffffffffff
fffffff7ffcebdbda58484debdb5f7ded6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffff9c9c9c7373738484846b6b6b6363635a5a5a6b6b6b5a5a5a5a5a5a6363636b6b6b8484848c8c8c8484846b6b6b6363636363636b6b6b636363
6363635a5a5a6b6b6b7373737373738c8c8c8484846b73736b73736b6b6b7b7b7b7373737b7b7b7373737b7b7b7b73737b7b7b7b7373847b7b8473738c6b6b73
5a5aa5948cf7efe7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7e7734a4273524a846b6b8c73737b7373847b7b7b73
7b736b73736b6b94848cffffffffffffffffffffffffffffffffffffffffffffffffb5a5ad73636b736363735a6384737373636373636b6b6363737373737b73
949c9cdee7deffffffffefefd6c6bd634a426b4242633942734a526b424a634a5252525a52636b4a737b63a5ad84d6de8cffff73ffff63ffff5aeff773e7ef84
d6d6d6fffff7fffffffffffffffffffff7f7f7f752736b52949463bdbd5ad6d663fff742fff74affff5affff63ffff6befef73d6d69cdededeffffefffffffff
ffffffffffffffffefefcea5a59c7373b5948cbda59cdec6b5c6a59ce7c6bddebdb5ffefe7f7efdeefc6b5c69484b57b73bd8473c68c84c68c7bd69c8cd6a59c
deb5b5efdedefffffffffffffffffff7ffffffffffffffffb5ada5ad9494ceb5b5f7d6d6fffff7ffefeff7efe7cea594d6ad9cd6b594ceb594d6b594cead8cce
9c8cffded6ffffffffffffffffffffffffcec6c6ad8c8cdeb5adf7e7def7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7ffffdeefef849c9c4a5a5a7b8c8c526363525a5a5a5a5a5a5a5a5252525a635a6b73738484847b7b7b6b6b6b5a5a5a636363
6b63636b6b636363636b63636b6b6b6b7373636b6b636b6b636b6b949c9c737373737b7b6b73736b73737b7b7b6b73737373737b7b7b7373737b7b7b7b73737b
7b7b7b7373847373846b6b7b635a94847be7dedeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff734242734a4a8463
638c7b7b7b6b6b847b847b73737b73736b63639c8c94ffffffffffffffffffffffffffffffffffffffffffc6b5bd735a636b5a5a7b636b7b636b736363736b6b
7373736b6b6b5a6363636b6b52636373847b9ca59cf7f7effff7f7dec6bd8c6b6b6b39396b313973424a734a526b4a525a4a5a5a5a634a5a635a7b8473b5bd7b
f7f763f7ff7bffff7be7ef84ceceaddedee7f7f7fffffffffffffffffffffff77b8c8c528c8452ada552cec652efe74afff74affff52ffff52f7f763f7ef6bde
d69ce7e7d6fffff7fffffff7fffffffffff7ffffd6d6b57b84b58484c6a59cceb5a5c6a59ce7cebdc6ad9cdebdaddebdadffe7d6fff7e7f7d6c6bd9484ad7b6b
ad736bc6847bc6847bc68484bd8c8ce7cecefffffffffffff7fffff7fffff7ffffffffff8c7b7b846b6b947b73ceada5d6bdb5f7d6cefffff7e7bdadd6ad94de
c6a5d6bd9cdebd9ccea584ce9c8cceada5ffffffffffffffffffffffffd6cecea58c84d6adadf7ded6f7f7f7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffdeffffceffff9ce7de6badad427373395a5a4a5a5a6363635a5a5a5a63637b8484848c8c737b7b
6b6b63635a526b635a73635a7b6b63736b63736b6b6b63636b6b6b636b6b636b735a6b6b7b848c848c8c7b84846b73736b7373737b737b84846b73737b7b7b73
7b7b7b7b7b7b7b7b847b7b7b7b7b847b7b8473738c737384736b8c7373c6bdbdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff845a5a634242947b7b7b6b6b847b73948484847b7b7b73737b7373948c8cffffffffffffffffffffffffffffffffffffffffffa594946b52526b5252
846b6b7b6b6b7b73736b6b6b737373636b6b63736b636b6b636b6b636b636b636394948cefdedeffffffefdede94737b5a39426339426b4a4a634a525a4a4a5a
5252636363525a5a526b6b4a848473cece9cf7f79cf7f784ded694deded6fffff7ffffffffffffffffffffffdedede4263635aa5a563cec65ae7de4afff74aff
ff52ffff5affff63f7ef73e7e784cecec6efeff7fffffffffffff7ffffffffe7c6c69c7373ad8c84cead9cd6b59cdebda5e7bda5e7c6addec6adcebda5bdbd9c
dee7c6ffffeff7efdecead9cb57b73bd7373ce7373c67b7bc68c8cd6b5b5f7f7efffffffffffffffffffffffffffffff9c7b7b8c635aad847bb59484dead9ce7
b5a5e7bda5efceb5e7ceb5e7c6a5e7c6a5debd9cd6ad94bd8c7bc6a594fff7efffffffffffffffffffe7d6cec6a59cd6adadf7dedef7f7f7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffceffffadffff9cffff84efe773c6c6428484315a5a4252526b7b7b
8c94947b84845a63635a5a5a636363736b6b6b635a73635a6b635a736b63736b63736b6b636b636b6b6b636b6b637373848c8c848c8c737b7b737b736b6b6b73
7b7b737b7b737b73737373737b7b737b7b7b7b7b7b7b7b847b7b847b7b8c847b8473737b6b63736363bdadadfffffffffffffffffffffffffffffffffffff7ff
ffffffffffffffffffffffffffffffff845a5a6b4a4a846b6b847373847373948484847b7b84737b7b6b6b9c9494ffffffffffffffffffffffffffffffffffff
f7e7e79c84846b4a52735a637b6b6b7b73737373736b737363736b637373636b6b6b736b6b6b6b736b6b7b7373847b7b8c7b7bbdadb5fff7f7f7efefad94945a
4242523139634a4a634a52634a526352526b5a5a5252524a5a5a426b6b63a5a58cd6d68ce7de84d6d6bdf7f7e7fffffffffffff7fffff7ffefdeef5a73735a94
945ab5ad52cec652f7ef4afff75affff5afff763ffef6be7de7bd6ceb5e7def7ffffffffffffffffffffffd6c6c68c7b7b948c7bad9484ceb59cdebda5efc6ad
debd9cdebd9ccebd9cc6c6a5a5ad8cd6dec6ffffeffff7efdebdadad6b6bb56b6bbd6b6bb57373bd948cded6cef7fff7f7fff7fffffffff7ffffffffb58c948c
5a5aa57b73ce9c8cd6a58cf7bd9ce7b594dec6a5deceadefd6b5efc6adefbdadd6a594bd9484bd9c8cf7e7defffff7ffffffffffffe7d6d6bd9c9cdeb5b5f7de
defff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffceffffadffff94ffff9cffff9cffff
8cded66ba5a5638c8c5a8484637b7b63636b6b6b6b635a6363635a63635a6b6b636b6b636b6b63636b636b736b6b6b6b737373736b6b7b737373737394949c84
8484737b7b737373737b7b7373737b847b737b7b7b7b7b7b7b7b8484847b7b7b8484847b7b7b8484848c84848c7b7b7b6b637b6363ad9494ffefefffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffa57b7b7352527b635a8c73738c7b7b8c7b7b9484848c7b7b7b73739c8c94ffeff7ffffff
ffffffffffffffffffffffffe7ced684636b6b5252735a63846b6b7b6b6b7b7b737373736b7b736b73736b73736b736b737373736b6b6b63637b7373ad9c9c7b
6b6bb5a5a5fff7f7fff7f7c6adad6b52525239395a424a635252634a526b5a5a635a5a4a525a42636321525231736b73b5b594d6d69ccecee7ffffffffffffff
ffffffffffffffa5b5b55a848463ada56bcece5ae7e75afff75affff5affff5afff76bf7ef73ded6adefefe7ffffffffffffffffffffffd6c6c6a5948c94948c
a5b59cadbda5c6bdadd6bda5e7c6ade7c6adefc6ade7bda5e7c6adbd9c84dec6b5ffffeffffff7e7d6cea57b7ba56b63ad736b9c6b63d6bdb5fffff7ffffffff
f7ffffffffffffffefced6845a5a946b63b58c7bce9c84deb594efc6a5d6bd9cdeceadefceb5ffd6bdf7c6b5e7b5a5c69c8cb59c8cd6c6b5fffffffffff7ffff
ffd6cec6bd9c9cdebdbdffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7ffffc6ffff
a5ffff8cffff84ffff94ffff9cffffb5ffff9ce7e763a5a531636342525a63636b6b6b735a63635a63635a6b6363736b5a6b63636b63636b6373736b73736b7b
73737b6b738473739c94948c8c8c6b6b6b7b7b7b7b7b7b737b7b7373737b7b7b7b7b7b8484847b7b7b8484847b7b7b848484847b7b8c84848c7b7b8c7b7b846b
6b947b7bdececeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd6b5b56b4a4a6b52528c73738c7b7b8c847b8c7b7b8c8484
7b73738c7b84c6bdc6ffffffffffffffffffffffffffffffe7d6d6846b6b63424a7b63637b63637b7373737373737b736b73736b73736b736b6b73736b6b6b73
73737b73738c84847b7373736363847373bdadadfff7f7ffeff7ad949c634a4a4a31395a4242634a5263525263525a6363634252524a6363396363295a5a396b
6b7b9c9cdeefeffffffffffffffff7ffffffffe7e7e7425252739c9c6bb5b56bdede63efef63ffff5afff75affff5af7ef6be7de8ce7decefffff7ffffffffff
ffffffefe7de948c8c8c9c9494bdb594cebd9cc6b5b5c6b5c6c6ade7cebde7bdadf7bdadffbdb5efbdadce9c8cd6bdadfff7e7fffff7e7decead8c7b9c635aa5
635aa57373e7cecefff7fffffffffff7f7ffffffffffffa584848c5a52a57363ce9c84cea58cdebd9cd6c6a5d6bd9cdec6a5e7c6adf7ceb5efc6adcead9cad8c
7bbdada5fffff7ffffffffffffd6c6bdb59494e7c6c6f7dee7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffefffffbdffff9cffff7bffff7bffff73ffff84ffff94ffffa5ffff84efef7bcece63848c526b6b4a636363737b6373735a736b526b6363736b63
736b73736b737373847b738473738473738c7373ad9c9c8c84847373737b7b7b8484847b7b7b847b7b7b7b7b8484848484848484848484848c8c8c8484848c8c
8c848484948c849484848c7b7384736bcec6c6fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ef634242735a5a846b6b
94847b9c84849484848c84848c84847b7373a5a5a5ffffffffffffffffffffffffffffffffffff947b7b6b4a4a7b6363846b73847373847b7b737373737b7b6b
73737373736b736b737373736b6b7b737384847ba59c9c6b63636b6363736363b5a5a5fff7f7fff7f7b59c9c634a525242425a424a634a4a6b5a5a5a52525a63
635a63634a635a526363425252394a4abdbdbdfffffffffffffff7f7fffffff7f7f78484846b7b7b73adad6bced66befef63f7ff63ffff5affff63fff76befe7
73d6d6ade7e7effffffffffffffffffffff784848463847b73b5ad73d6ce94efe79ce7d6add6c6bdbdb5e7bdb5efbdb5efb5adf7c6b5f7bdb5d6a594debdadff
ffefffffefefe7d6ce9c94a56b638c5252ceadadfffffffffffffffffff7ffffffffffe7bdbd9c635ab5736bd69c8cce9c8cd6b594dec6a5dec6a5d6bd9ce7bd
a5efc6adefc6b5d6b5a5bd9c8cb5a594fffff7ffffffffffffcebdbdbda5a5efceceffefefffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffe7ffffbdffff94ffff73ffff6bffff73ffff6bfff773ffff7bffff84ffff8cffff9ce7e773adad528484426b6b4a
6b6b4a6b6b5a736b636b6b73737373736b7b7b737b73737b73737b73738c7b849c94948c84847b7373847b7b847b7b847b7b847b7b8484848484848484848484
84848484848484848c8c8484848c8c848c848494848484737384736bbdb5adffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffff7b635a6b5252846b6b8c7b73a58c8c9484849484848c84847b73739c9494ffffffffffffffffffffffffffffffffffff94848c6342427b5a5a7b63638c
73737b73737b7b7b737373737b736b73737373736b6b6b73736b6b6b6b9494947b7b7b6b6b6b7b7373736b6b73636bada5a5fff7fffff7f7ad949c634a4a5a42
42634a4a6352526b63635a52525a5a5a5a5a525a5a5a5a5a5a5a5a5a4a4a4af7f7f7ffffffffffffffffffffffffe7dede6b6b6b73949c6bbdc663dee763f7f7
5affff5affff5afff76bf7f773d6d6a5e7e7deffffffffffffffffffffff8c9c9c5a84844aa5a55acec673efe78cffef9cefdeadded6b5c6bdc6c6bdd6bdb5e7
bdb5e7b5a5e7bdaddeb5a5dec6adfff7e7fffff7f7e7dece9c9484524aad8484efdedefffffff7ffffffffffffffffffefef9c6363b56b63b56b63d69c8cd6ad
94debda5dec6a5e7c6addebda5e7bda5debda5debda5c6a594b59c8cefe7d6fffffffff7efd6c6bdc6adadf7dedeffefefffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7ffffb5ffff8cffff6bffff63ffff63ffff6bffff6bffff6bffff5affff6bffff8c
ffff94ffff7bd6d65aa5a5427b7b527373637373737b7b7373737b73737b7373847b7b7b73737b7b7b8484849c9494848484847b7b847b84848484847b7b8c84
848484848c8c8c8484848c8c8c8484848c8c8c848c8c8c8c8c8c8c8c94948c94848494847b84736bad9494efdedeffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffad94946b5252846b6b947b7b9c8484a58c8c948484948c8c847b7b9c9494e7e7e7ffffffffffffffffffffffffffffffa5
94946b52526b4a52846b6b846b738c7b7b847b7b7b7b7b737373737b7b737373737b73737373737b738484849494946b6b637b73737373736b5a5a7b6b73cec6
c6fff7f7f7e7e79c8484634a4a634a4a6352525a4a4a736b63736363635a5a635252635a525a5252524a4ab5b5b5fffffffffffffffffffffff7f7efef847373
73848c63adb563d6de5aefef5affff52ffff63ffff6bfff784efefa5e7e7d6ffffeffffffffffff7ffffcee7de63948c42a5a539b5bd5ad6d673efef84ffff84
fff784f7e794d6cebdd6cec6bdb5e7c6bde7c6b5cead9cd6ad9cefceb5fff7e7fffff7f7e7deb59c946b4a4abdb5b5fffffff7fffffffffffffffffff7ffd6a5
a5a55a5ab5635ad68c84e7ad94deb59cdec6a5e7c6ade7ceaddebda5debda5d6b59cceb59cb59c8cdecebdfffff7f7efe7cebdb5dec6bdf7dedeffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdeffffb5ffff84ffff6bffff52ffff52ffff5affff63
ffff5affff5affff5affff63ffff73ffff8cffff8cf7f773c6c6528c8c5a7b8463737b6b73736b6b6b7b73737b7373737b73737b738c948c8c8c8c8484847b7b
7b848484847b7b8c84848c84848c84848c84848c8c8c8484848c8c8c848c8c8c8c8c848c8c8c8c8c948c8c9c948c948c848c7b738c7373d6c6c6fff7f7ffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7e7cece5a42428c6b6b8c6b6b9c84849c8c8c9c8c8c8c84848484848c8484bdbdbdffffffff
fffffffffffffffffff7f7bda5ad73525a6b4a528463638c6b73847373847b7b7b7b7b7b7b7b737373737b7b7373737b7b737b7b7b7b84848c948c7b7b7b6363
636b6363736b6b736b6b8c7b84ded6d6ffffffcebdbd7363635a42425a424a6352526352526352527363637b6363634a4a6b635a5a5252737373f7fff7f7ffff
f7fffffffffff7efefb5a5a563737363a5ad5abdc663dee75af7f75affff5affff6bffff7bf7f78ce7e7ade7e7e7fffff7fffff7ffffefffff6b8c94428c944a
adb552c6ce5ae7e75afff75afff763fff77bffef8ce7d6a5d6ceadbdb5c6bdb5d6bdaddeb5addead9ce7c6b5fff7e7fffffff7efe7a59c94b5adadf7f7f7ffff
ffffffffffffffffffffffefefad736bb56b6bce7b73d69484deb59cd6bd9cdec6a5debda5e7c6addebda5d6b59cc6a58cbda58ccebdadfffff7e7d6ceceb5b5
dec6c6f7e7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffdeffffadffff8cffff6b
ffff5affff52ffff5affff63ffff63ffff5affff5affff52ffff6bffff73ffff84ffff94ffff9cefef7bb5bd6b9494637b7b6b7b7b6b7373738484737b737b84
7b949c948c9494848484848484847b7b8c8c8c8c8c8c948c8c8c8484948c8c8c8c8c948c8c8c8c8c8c94948c948c8c94948c8c8c94949494948c9c8c8c94847b
847373c6b5b5ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefef5a42427b5a5a9c737b9c8484a58c8c9c94949494948c
8c8c848484a59c9cfff7ffffffffffffffffffffffffffe7ced68463636342427b5a5a846b6b8c737b8c7b7b8484847b7b7b7b7b7b7b7b7b7b7b7b7373737b7b
7b848c8c9494946b6b6b737373736b6b73736b6b6b63736363a59c9cf7efeffff7f7b5a5a55a424a634a52635252635a5a6b5a5273635a735a5a735a5a635a52
5a5a5a424a42deefefeffff7ffffffffffffffffffe7ded66b6b6b638c8c6bb5b563ced66bf7ef5af7f75affff5affff73ffff84f7f794dedebdefefefffffff
ffffffffffa5a5ad637b945a94ad52b5c64adede52ffff39f7ef52ffff4affef6bfff77bffe79ce7d6adcebdcec6b5ceb5add6b5adceada5e7cec6fff7efffff
fffffff7ffffffffffffffffffffffffffffffffffffffffffbda594ad7b6bbd7b6be79c94d6ad94debda5debda5e7c6a5debda5e7c6add6bd9cceb59cc6a58c
e7cebdffefe7dec6bdcebdb5efdedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffffffffff7
ffffd6ffffadffff84ffff63ffff5affff63ffff5afff763f7f763fff76bffff5afff75afff75affff6bffff6bfff784ffff8cffff94f7f784ced673b5b5638c
945a7b7b637b7b6b7b7b737b7b949494848c8c848c8c7b84848484848484848c8c8c8c848c948c8c8c8c8c948c8c948c8c9494948c8c8c8c94948c9494949494
94948c9c9c94948c8c9484848c7373ad9494e7dedefffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffff7b63637b525a846363a5
8484a58c8c9c9494948c8c8c8c8c7b7b7b9c9494cec6cefffffffffffffffffffffffffff7f7947b7b6b4a4a734a528c6b738c73738c7b7b847b7b847b7b7b7b
7b7b847b737b73737b73737b738c8c8c8c948c6b736b6b736b7373736b6b6b736b6b6b63637b6b6bbdb5b5ffffffdecece8c7b7b635252635a5a635a526b5a5a
6b5a5a735a5a6b5a52635a5a5a5252424a4284948ceffffff7fff7fffffffffffff7efefa59c9c4a5a5a5a848484cece6bded663efe75afff752fff75afff773
ffff7be7e79ce7e7cef7f7f7fffffff7fff7eff7848494738ca55a9cad52c6ce39d6d652ffff31f7ef42ffff4afff763fff77bf7e79cefdeaddeceb5cec6adbd
b5b5b5adbdadade7d6d6f7f7f7fffffffffffffffffffffffffff7fffff7f7ffffffffffeffffff7947b6bb58473de9c8cdead9cd6b59cdebda5debda5dec6a5
debda5debd9cceb594cead94debdadf7e7d6d6bdb5decec6efe7e7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffefffffdeffffadffff8cffff6bffff63ffff63fff773ffff7bffff7bf7f773efef73f7ef63efef6bfff76bfff76bffff6bffff7bff
ff84ffff8cffff8cefef84d6d66badad638c945a737b7b84849ca5a58c9494738484848c8c848c8c8c8c8c8c8c8c949494948c8c949494948c8c9c9494949494
949494949494949c9c949c94949c9c9c9c949c94949c8c8c9c8c8c8c7373d6c6c6ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffd6bdbd734a52946b6ba57b7ba584849c8c8c9c9c948c8c8c8c8c8c8c8c8cb5adadf7eff7ffffffffffffffffffffffffceb5b5735252845a5a845a639473
738c737b8c8484847b7b8484847b7b7b7b847b737b737b847b8c8c8c9494946b736b737b7373736b7373736b6b6b736b6b635a5a9c9494efe7e7ffefef9c8c8c
6b525a635a5a63635a635a5a6b635a6b5a5a6b635a635a5a5a5a5a4a525252635aeff7f7ffffffffffffffffffffffffd6c6c6423131525a5a638c8c73c6bd73
efe76bfff75affff5affff63ffff73ffff7be7e7ade7e7e7f7ffffffffffffffc6b5ce7b7b8c7b94ad63a5b55aced64aefe742fff739fff74affff5affff6bff
ff73fff784ffef84efde94ded6a5bdbdb5adadbdb5b5efefefffffffffffffffffffffffffffffffffffffffffffffffffffffefceceb5bd9c8ccea58cdeb59c
debda5debda5e7c6a5dec6a5dec6a5d6bd9cdebd9cd6b59cdebdadefcebddec6b5efded6ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffefffffd6ffffadffff84fff76bfff763fff773ffff7bf7f784e7e77bd6d67bd6d673cece73dede6be7
de73f7ef73fff773ffff63fff76bffff73ffff8cffff8cffff8ce7e784c6c6739ca5738c9494a5a57b8c8c738c8c7b8c8484948c848c8c8c94948c8c8c948c8c
948c8c9c9494948c8c949494949494949c9c8c9494949c94949c949ca59c9c948ca59c94a58c8c8c7b7bbda5a5fff7f7ffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7efef73424a8c5a639c737b9c84849c94949494949494948c94948c8c8c9c9494ded6d6fffffffffffffffffffffffff7e7
e78c6b6b734a527b525a8463638c73738c7b7b84847b7b7b7b7b84847b7b7b7b7b7b7b7b7b948c8c9494947373736b73737373736b6b6b73736b6b6b6b736b6b
6b6b63bdb5b5f7efefa594946352526b635a635a5a63635a635a5a6b635a635a5a635a5a5a5a52525a52525252bdc6bdffffffffffffffffffffffffefe7e794
7b7b422929424242527b7b73bdbd6bdede6bfff763ffff5affff5af7ef73efef8cdee7c6eff7eff7fffffffff7e7f7a59ca5737b8c7ba5ad63bdbd52cece52ef
e74afff74afff74affff4afff752fff75afff76bfff77befe794e7dea5c6c69cadb5b5ceceeff7fffff7ffffffffffffffe7d6d6cec6c6e7e7deeff7e7f7ffe7
ffffefbda58ccea58cdeb59cdebd9ce7c6a5debd9cdec6a5dec6a5dec6a5d6bd9cdebd9cdeb5a5efceb5debdb5f7e7deffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffd6ffffadffff8cffff73ffff6bfff773efe77be7de84cec684bd
bd7badad73b5b573c6c673d6d67be7e784ffff7bffff73ffff6bffff73ffff73ffff84ffff94ffffa5ffff9cdee794c6c68cadb57b9c9c738c8c7b948c7b8c8c
8494948c94949494948c8c8c9c94949c94949c94949494949c9c9c949c9c949c9c949c949ca59c9c9c94a59c9ca59c94ad94949c8484a5948ce7dedeffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7fff7f78c63638452529c7373a58c8ca594949c9c94949c9c949c9c8c8c8c948c8cbdadadf7ef
efffffffffffffffffffffffffbd9c9c7b4a527b52528c636b846b73947b7b847b7b8484847b847b8484847b7b7b848484948c8c9c9c9c7373737b7b7b737373
7373736b736b7373736b6b6b6b63638c8484e7dedea59c9c6b63636b63636b636363636363636363635a636363635a5a63635a5a5252635a5a736b6bffffffff
ffffffffffffffffffffffd6c6bd5a393142312942424242636363a5a57bd6d67bffff6bffff63fff76bf7f784f7f78cdedec6eff7efffffffffffe7dee77b8c
8c6b8c9473adad6bbdbd6bd6d663efef52ffff42ffff42ffff42ffff5affff5affff63ffff7bf7f79cefef94cece9cc6c6c6dedef7ffffffffffffffffc6bdb5
847b738c847bbdb5a5d6c6b5e7d6bddebda5deb59cdeb59cefc6a5e7c6a5dec6a5dec6a5decea5dec6a5dec6a5e7bd9cefc6ade7c6b5efcec6efe7deffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffcef7ffa5fff784fff77bfff763ef
de73ded67bcec67ba5ad6b8c8c94a5ada5c6ce73b5b573c6c68ce7e78cf7f78cffff7bffff7bffff73ffff7bffff7bffff8cffff9cffffa5ffff9cefefa5e7e7
84b5b57ba59c73948c738c8c7b8c8c8c94949494949c9c9c9494949c94949c94949c9c9c949494949c9c949c9c9ca59c949c9c9ca59ca59c9cad9c9ca5948ca5
8c8c947b7bcebdbdfff7f7fffffffffffffffffffffffffffffffffffffffffff7fff7fffffffff7f7d6b5bd7342429c6b6b9c7b7ba59494949494949c9c8c94
949c9c9c8c84849c8c94cec6c6f7fffffffffffffffffffffff7e7e78c636b734a527b525a846b6b8473738c7b7b847b7b8484847b847b848484847b7b9c9494
9c94947b73737373737373736b736b6b73736b6b6b73737373736b6b6b6b9c9494948c8c6b5a5a6b63636363636363635a5a5a5a63635a5a5a636363635a5a6b
5a5a6b525a5a4a4ae7d6d6fffffffffffffffffffffff7f7efde9c7b734a29214a29294a39394a525a5a848c63bdbd73efef6bffff63ffff63f7ef73e7e78ce7
e7c6ffffe7ffffffffffadc6bd6b8c84739ca563a5a563bdc66bdee74aefef4affff42ffff4affff4affff52ffff52ffff6bffff7bfff78cf7ef8cd6d69ccece
d6efefffffffffffffffffffc6b5ad735a528c635aad7b6bb5846be7ad9ce7b59cefbda5e7bda5e7c6a5debd9cdec6a5dec6a5dec6a5debd9ce7bda5e7bda5ef
c6b5e7cebdf7efe7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefffffbdef
e794e7de94ffef73efde73e7de6bc6bd63a59c738c8ca5adb5d6dedee7f7f76b9ca57bc6c694dede9cf7f794ffff94ffff84ffff84ffff7bffff8cffff84ffff
94ffff94ffff9cffffadffffadefefa5d6ce8cb5b57b9c947b9494849494949c9c949c9c9c9c9c9c9494a59c9c9c9c9ca59c9c9c9c9c9ca5a59ca5a59cada59c
a59cadada5a59c94b5a59cad94949c8484a59494efe7e7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7e7ef8452528c63639c7b
7b9c8c8ca59c9c9494949c9c9c9c9c9c9c949c94848c9c9c9cd6dedeffffffffffffffffffffffffbd9c9c73424a7b525a8463638c737b8c7b7b8c8484848484
8484848484848c84849494949c9c9c7373737b7b7b7373737373737373737373737373737373736b63637b7373736b6b73636b6b63636b6b6b6363636363635a
6363636363635a5a6b6363735a5a73525a73525aad9494fffffffffffffffffffffffffffff7decebd6b42396329296b31396339424a424a5a7b8452a5a55ad6
d66bf7f76bfff76bf7f773f7ef8cefefc6ffffdefff7e7fff7adc6bd7b94946394946bb5bd63c6ce5adee752efef52ffff4affff52ffff52ffff63ffff5affff
63ffff73ffff94f7f794d6d6b5d6dedef7f7fffffffffffffff7efbd9c8c9c635ab57363d68c7befa58cf7b59cefbda5e7c6addec6a5dec6a5d6c6a5decea5de
c6a5e7c6a5efbda5efc6ade7bdadefcec6f7efe7fffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7fff7adcebd9cceb594d6b59cdec694cebd739c94526b63bdc6c6efefefffffffc6d6de6b9c9c7bbdbd9ce7e79cf7f7a5ffff94ffff8cffff
8cffff8cffff8cffff94ffff94ffff9cffff94ffffa5ffffadffffb5ffffa5e7e79ccece8cb5b58cadad8ca5a59cadada5adadadadadada5a5b5adadb5adadbd
b5b5b5adadb5b5b5adb5adadb5adadb5adb5b5adbdadadb5ada5a594949c8c8cded6cefffffffffffffffffffffffffffffffffffffffffffffffffffffffff7
f7fff7f79c7b7b845a5a9c7b7bb59494bda5a5b5a5a5b5adadb5adadb5adada5a5a58c9494b5bdbdefefeffffffffff7ffffffffe7d6de8c636b7b52528c6b6b
8c73739c8c8c9c94949c94949c9c949494949494949c9c9ca5a5a58c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8c84848c8c8c8484848c84847b7b7b847b7b847b7b8c
8484847b7b847b7b7b7b7b7b7b7b7b7b7b7b7b7b7b73738473737b636b847373846b73fffffffffffffffffffffffffffff7f7e7deb5948c6b31317339397342
4273525a736b735a7b7b5294946bc6c673e7de84fff77bf7ef7befe79cefe7bdf7efd6ffffe7ffff9cadb57b949c7b9ca573adb573c6ce73dee76befef63ffff
5affff63ffff6bffff6bffff63ffff73ffff7bffff8ceff78cd6d6bddee7eff7f7fffffffffff7ffe7de9c736b9c5a52d6847bf7ad9cefad9cefc6ade7ceadde
ceadd6ceadded6b5e7d6b5efd6b5efc6adf7ceb5f7c6b5f7c6bde7cebdf7efe7fffffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7bdcead9cb58c9cad84949c7b9ca5847b846bbdc6bdf7f7effffffff7ffffa5bdbd6ba5a58cd6ce9cefe7
a5ffff9cffff94ffff94ffff9cffff94ffff9cffff9cffffa5ffffa5ffffa5ffffa5ffffa5ffffa5ffffb5ffffadffffadefef9cd6d694bdbd8cadad9cb5b5a5
adadb5b5b5b5b5b5bdb5b5bdb5adc6b5b5b5b5b5b5bdb5adb5adb5bdb5b5b5b5bdbdb5b5adadb5ada59c948ccebdbdf7efefffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7f7dec6c67b5a529c7373b58c8cc6a59cc6a5a5c6b5adb5ada5adb5ad9cadad94a5a594a59cced6d6f7f7f7ffffffffffff
ffffffc6a5a5845a5a845a639473739c7b84ad9494a59494a59c9c9c9c9c9c9c9c949c9ca5adad8c8c8c9494948c8c8c948c948c8c8c8c8c8c8c84848c8c8c84
848484848c8484848484848484848c8484847b7b84847b847b7b847b7b7b7b737b7b7b7b73737b73737b7373736b6bcec6c6ffffffffffffffffffffffffffff
f7efd6d6a573736b31317b42427b4a528c6b6b847373636b6b4a736b5a9c946bc6bd84e7de8cf7f794f7efa5efefceffffdeffffe7eff7b5b5bd8c949c849ca5
84b5bd7bc6c673dede6befe76bf7f76bffff73ffff73ffff84ffff73ffff6bffff7bffff84e7ef9cd6d6def7f7f7ffffffffffffffffd6b5ad94635ace8c7bd6
8c84efb5a5e7c6addeceaddeceadded6b5ded6b5e7debde7ceb5efceb5f7c6b5ffcebdefc6bde7cec6efe7e7fffffff7ffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7bdc6a5a5ad84848c5a7b73526b634acec6b5fffff7fffff7ffffffefefef
7b9c9c6badad84d6d69cf7f794f7f794ffff8cffff8cffff8cffff94ffff94ffff9cffff9cffffa5ffff9cffffa5ffff9cffff9cffff9cffffadffffb5ffffb5
f7f79cd6d694bdbd84a5a594a5a5949c9ca5a5a5a5a5a5adada5ada5a5adada5a5ada5a5ada5adada5b5adadada5a5ada5a5ad9c9ca594949c8c8ce7d6d6ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7e7e7947b737b5a52a57b73b58c84bd9c9cbdada5ada5a5949c9494a59c8c9c9c8c9494
a5a5a5d6d6d6f7f7f7fffffffff7f7f7e7ef8c6b737b52527b525a8c6b6b846b6ba58c8c847373948c8c848c8c8c948c9494947b7b7b7b7b7b7b7b7b7373737b
73737373737b73736b636b736b6b7373736b6b6b6b6b6b73736b6b6b6b6b6b6b6b63636b6b6b6363636363635a5a5a63636363635a635a5a525252847b7bffff
fffffffffffffffffffffff7f7fffff7d6b5b5734a4a5a29216331317b52528463635a4a4a42524a315252316b6b42948c6bc6bd8ce7e78ce7e7adefefd6ffff
deffffdeeff7a5b5bd7b9c9c6ba5a563b5b55ac6bd5aded65ae7e75af7ef5af7f76bffff6bffff6bffff63ffff6bffff73efe78cdedeb5e7e7efffffffffffff
ffffffefef9c7b73a57363b57b73d6a594deb59cdebda5dec6addec6a5dec6addec6a5dec6addec6a5dec6addebdaddec6b5d6c6bdf7efdeffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefc6ceada5a57b84845a6b6b4aa59c84fff7e7
ffffffffffffffffffefefef7b94947bb5b58cdede94f7ef94ffff8cffff8cffff7bffff84ffff8cffff94ffff94ffff9cffff9cffffa5ffff9cffffa5ffff9c
ffffa5ffffa5ffffb5ffffb5ffffc6ffffc6efefb5d6d69cbdbd94adad94a59c9cadada5adadadadada5ada5adadadadada5b5b5adb5adadbdadadbda5a5bda5
a5ad9c9ca58c8cc6b5b5fff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ceb5ad73524a946b6bad8484b5948cbda5a5ada5a5
a5a59c94a59c9ca5a58c94949c9c9cadada5efe7e7ffffffffffffffffffdec6c67b5a5a7352527b5a5a94737b8c737b947b848c7b7b948c8c8c948c9ca5a57b
7b7b8484847b7b7b7b7b7b7b7b7b7b7b7b7b7373736b736b6b6b736b6b6b6363736b6b6b6b6b6b6b6b6b6b6b6b6b6b6363636b6b6b6363636363636363636363
635a5252635a5a636363fff7f7fffffffffffffffffffffffffffffffff7efad94946339395a3131734a4a735252634a4a525252425a5229524a295a5a296b6b
4a949484d6d69ce7e7a5dedeceffffdeffffcef7f784b5ad63a59c52a5a552bdbd52cece52dede4ae7de52f7ef5af7f763ffff63ffff63ffff63ffff6bf7f773
e7de8cdeded6f7f7ffffffffffffffffffbda5a58c6b63a57b73c6a594d6ad9cdebda5e7c6adefc6ade7c6a5e7ceaddec6a5deceadd6c6a5d6ceadcec6add6ce
bdefefdeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffe7c6c6a59c9c73
73734a847b5ae7e7cefff7e7fffff7ffffffffffffefefe77b8c8c8cc6c68ce7de94f7ef84f7f784ffff7bffff7bffff7bffff84ffff84ffff94ffff94ffffa5
ffff9cfff7a5ffff9cffff9cffff9cffffa5ffffa5ffffb5ffffbdffffceffffc6f7f7bde7efadcece9cbdbd8cadad94adad94adada5b5b5adadadb5b5adb5ad
adbdadadbdadadc6adadbda5a5bda5a5ad9c9cad9c9cd6cecefffffffffffff7fffff7fffffffffffffffffffffffffffffffffffff7efefe7de84635a84635a
9c7b73ad8c8cad9494ada5a5a5a59c9ca59c949c9c9c9c9c9494949c9494b5adadefe7e7fff7fffffffffff7f7b59c9c634a4a73525a84636b8c6b73947b7b94
7b7b8c8484949494a59c9c8484847b7b7b7b7b7b7b7b7b7b7b7b7373736b6b6b736b6b7b737373636b736b6b6b5a636b6363636363636b63636363636b6b5a63
636363635a5a5a5a5a5a5252526363635a5a5a5a5252b5adadfffffffffffffffffffffffffffffffff7f7efded6947b735229296b42427352525a42425a4a4a
4a4a4a4a52524252523152523163633973736b9c9c9cceceb5deded6ffffcef7f7c6efef7bb5b56badad52a5a552b5b54ac6c652d6d64ae7de52efef52f7ef5a
ffff63fff763ffff5afff763f7e763d6ceb5efefefffffffffffffffffefe7e7847b7b948c84a5948cbdada5ceb5a5debdade7bda5efc6a5efc6a5efcea5d6c6
9cd6cea5c6cea5ceceadceceb5efefdefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7ffffe7cec6a58c8463736b4acec6adfffff7fffff7fffffffffffffffff7c6c6bd6b7b737bb5ad94efde9cfff794ffff84ffff7bffff7bffff84ffff84
ffff8cffff8cffff9cffff9cffffa5ffffa5ffff9cffff9cffff9cffffa5ffffadffffadffffb5ffffb5ffffc6ffffc6ffffcef7ffb5e7e7a5cece94b5b58cb5
b594adadadb5b5b5adadbdb5b5bdadadc6b5b5c6adb5ceadb5c6a5a5c6adadad9494bdadadf7efeffffffff7fffff7fffffffffffffffffffffffffffffffff7
fffffffff7efc6a5a573524a94736bb5948cb59c9cad9c9cadada5a5a5a5a5a5a59c9c9ca59c9c9494949c9c94b5adadf7efefffffffffffffefe7ef8c737b6b
525273525a8c636b8c6b6b9c7b849484849c8c8cada5a5847b7b847b7b7b7b7b7b7b7b737b7b7b7b7b6b6b6b7b73736b63636b5a5a6b5a5a7363636b63636b6b
636b63636b6b6b6b6b6b6b6b6b636363636b6b5a5a5a5a5a5a635a5a635a5a5a52527b7373fff7f7ffffffffffffffffffffffffffffffffffffe7d6d684635a
6b4a4a734a4a6342425a42425a424252424a5a525a4a4a4a4a525a39525242636352737394b5b5c6e7e7d6f7f7e7ffffcef7efa5cece73adad529c9c5ab5b55a
c6c652d6d64aded64aefef52f7ef6bffff5afff752fff752ffef5ae7de84cecedef7ffffffffffffffffffff9cadad7b948c9cb5ada5b5adbdbdb5c6bdb5debd
ade7bdadefceade7c6a5dece9ccece9ccecea5c6ceadd6debdefefdeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7e7ffffe7bdb59c847b63948c73f7f7defffff7fff7effffff7fffffff7e7debdada5636b5a6b9c848cceb5a5f7de9cffef94
ffff84ffff7bffff7bffff84ffff8cffff94ffff94ffff9cffff9cffffa5ffff9cffff9cffff94ffff9cffff9cffffadffffb5ffffbdffffbdffffbdffffbdff
ffc6ffffbdf7f7ade7e794c6c69cbdbda5b5b5adb5b5b5b5b5bdb5b5c6b5b5ceb5b5ceadb5ceadb5ceb5b5bda5ada59494e7dedefffffffffffff7ffffffffff
f7f7f7ffffffffffffffffffffffffffffffe7d6d684635a735252a5847bad948cad9c94ada59cadada5a5a5a5a5a5a5a59c9ca5a5a59494949c9c9cc6c6bdf7
f7f7fff7f7ffffffe7d6d67b6363846363734a52946b739c7373947b7ba58c94ad9c9c8c7b7b847b7b8484847b7b7b737b7b7373737373736b6363736b6b7363
636b52526b4a526b5a5a635a5a6b63636363636b63636363636363635a635a6b6b6b635a5a5a52525a52526b5a5a6b5a5af7e7e7fffffffffffff7ffffffffff
fffff7fffffffff7f7d6c6c68c6b6b6342425a31316b424a63394263424a6b4a5263425252424a5a525a424a4a4a5a5a425a5a5a7b73b5ceced6efefefffffe7
f7f7b5ced68cb5b56ba5a563b5b552b5b54ac6c642d6ce52dede63efe75af7ef4af7e74affef52efde6bc6c6bde7effffffffff7ffffffff9cbdbd6ba5a58cd6
ce8cd6d694d6ceadd6cebdcebdcec6b5d6c6a5e7c6a5dec69cd6cea5cec6a5ced6b5d6d6c6f7f7e7ffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffeffff7e7b5a5948c7b63e7dec6ffffeffffff7fffff7fffffffffff7fff7ef8c7b6b737b5a7b
9c7384bd948ccea594e7ce9cffef9cffff8cffff8cffff8cffff94ffff94ffff9cffff9cffffa5ffff9cffff9cffff94ffffa5ffffa5ffffa5ffffa5ffffadff
ffadffffb5ffffb5ffffbdffffbdffffc6ffffbdf7f7b5f7f7addedea5c6bda5bdb5adbdbdb5b5b5bdbdbdc6b5b5ceb5bdceb5b5debdc6c6adada59494b5a5a5
f7f7f7fffffffffffffffffffffffffffffffff7f7fffffff7f7effffffffff7f7b59c94735a528c736bad948cad9c94bdada5b5a5a5adada5ada5a5ada5a5a5
a5a5a5a5a59494949c9c9cbdbdbdffffffffffffffffffceb5b56b4a52845a639c6b738c5a639c7b7b9c8484ad9c9c847b7b8c8484848484848484737b73847b
7b7373737b6b6bbdadade7cece9c7b7b6b4a526b4a52735a5a736363736b6b6b6363736b6b6b63636b6b6b635a5a6b63635a52526b5a5a5a4a4a6b525ad6bdbd
ffffffffffffffffffffffffffffffbdb5adada59cfff7f7cebdbd7b5a5a5a39395a3939633942633939734a526b424a734a525a424a5a4a524a4a4a42524a39
52525a6b6b849494d6ded6f7fffff7ffffc6dede8cb5b56ba5a563b5b552bdb552c6bd52cec66be7de5ae7de4ae7de4aefe75aefe773d6d6bdeff7f7ffffffff
fff7ffffa5ced65aadad6bd6ce73efef84f7f794efe79cded6adceb5bdc6adcec6a5deceaddec6a5deceadded6b5e7e7cef7f7efffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efffefdeb59c8c948473efe7defffff7fffff7fffffffffff7ff
fffff7efde7b6352847b5a94a56b94b57394c68c84c69c84d6b58ce7d69cfff79cffff94ffff94ffff9cffff9cffffa5ffff9cffff9cffff9cffff9cffff9cff
ff9cffff9cffffa5ffffa5ffffadffffadffffb5ffffadffffb5ffffb5ffffbdffffbdffffc6ffffbdefefadded69cbdbda5bdbdb5bdbdc6bdbdbdb5b5d6bdbd
d6bdbdceb5bdad9c9ca59494efdedeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffded6ce7b635a8c6b6b9c847bb59c94b59c9cb5
a5a5ada5a5b5ada5ada5a5ada5a59ca59c9c9c9c8c9494949c94adb5adf7efeffffffffff7f7a584848c6b6b7b525a8c63638c6b6ba58484ad949494847b8473
738c8484847b7b8c8484847b7b7b6b6b736363ceb5b5ffefefceb5b5845a636b4a4a6b4a52735a5a7b63637363636352527363636b5a5a63525a736b6b634a4a
5a424a6b4a52523939947373fff7ffffffffffffffffffffffffffada5a55a4242c6b5b5ffe7e7ceb5b57352525231315a31396339426b39426b424a6b424a63
424a5242424a5252425252395a4a314a424252525a635aadb5ade7efefefffffceefef9ccece63a5a56badad63b5ad63b5b55abdbd52cec64acec652ded65ade
ce6bcece84c6c6e7f7f7fffffff7ffffadd6de4ab5b54ad6d65af7f75af7ff73ffff7bf7ef94e7d69cd6bdadceb5bdc6a5d6c6addec6adefd6c6efd6ceffefef
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7eff7ded6bda594b59c8cfff7efff
fff7ffffffffffffffffffffffffffefde7b634a94845aa5a563adbd73a5c68494c6948cc69c8cdebd8ce7ce9cf7efa5ffffadffffa5ffffa5ffff9cffffa5ff
ffa5ffffa5ffffa5ffffa5ffffa5ffffadffffa5ffffadffffa5ffffadffffadffffb5ffffb5ffffbdffffbdffffbdffffbdffffc6ffffc6fff7bdefefadd6d6
adc6c6adb5bdc6c6c6bdb5b5d6c6cedececec6b5b5ad9494ad9494f7e7e7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefb59c9c73
52529c7b7ba58c84bda59cbda5a5bdada5b5a5a5adadada5a5a5a5a5a59ca59c9ca59c8c94949c9c9c9c9c9cf7efeffffffffff7f7947373845a5a845a638463
638c73739c84848c73738c7b7b8c7b7b8473737b736b8473738473738c7373846b6bd6c6c6fff7f7a5848c6b4242734a527b525a7b5a5a7b63637b636b7b636b
7363637363635a4a4a6b5252634a4a5a39425a39397b5a5affffffffffffffffffffffffffffffc6b5b55a42425a4242cebdbdfffff7cebdb57352526342425a
39395a39425229316b424a634242524242424239394a42314239394a4242524a5a5a524a4a4a737373b5bdbdefffffd6ffffb5e7e78cbdbd7ba5a5639c9c63b5
b563c6bd5ac6bd52c6bd63cec663bdbd73adadbdd6deeff7fff7ffffa5d6d663d6ce52e7e74aeff752f7ff5affff73ffff84ffef94f7e7a5e7ceb5d6bdbdbdad
decebdf7d6d6f7dedeffe7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7e7e7ef
d6ceb5948cdec6bdfff7f7fffffffffffffffffffffffffffff7f7e7d67b634a948452b5ad63b5bd6bb5c684a5c68494c68c8cc69c84cead84ceb59ce7d6a5f7
efb5ffffadffffadffffa5ffffa5ffffa5ffffa5ffffa5ffffadffffa5ffffadffffa5ffffa5ffffa5ffffadffffadffffb5ffffb5ffffbdffffbdffffbdffff
bdffffc6ffffc6ffffc6f7f7b5dedeb5ceceb5c6c6bdc6c6cec6ced6c6c6c6adb5bda5a5a58484e7c6c6fff7f7fffffffffffffffffffffff7ffffffffffffff
ffffffffffffffffdecece84636384635aa5847bb59494bda59cb5a59cb5ada5a5a5a5ada5a5a5a5a5a5a5a59c9c9c9c9c9c8c8c8c9494949c9494fff7f7ffff
fffff7f79c7b7b8463637b5a5a846b6b8c7373846b6b7b63638c73738c737394847b847373846b6b7b63636b5252b5949cffefefe7c6c68c5a5a73424a6b4242
7b52527b5a5a7b6363846b6b6b5a5a6b5a5a735a5a6b52525239395a39394a29296b4a4aefd6defffffffff7ffffffffffffffffeff79c84844229296b4a4ad6
bdb5fff7efe7d6ce7352524a31315a39426342425a31315a3939634242634a4a524a424a42424a42395242424231295242425a4a4a635a5a848484ced6deefff
ffeff7ffced6d694b5b56ba5a563adad5aa5a55aada563adad73bdb573adada5c6c6e7f7f7f7ffff84adb563cec642c6c64adee742dee74aefef52efef6bffef
73efe78cefdea5decebdcec6c6bdb5d6bdbde7c6c6ffdee7ffeff7fff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7ffefe7e7cec6b59c94efdedefffffffffffffffffffffffffffffffffff7ffefd67b63429c8c5ab5ad63bdbd73b5c67badce84a5c68c9cce
948cc6948cc69c8cc6ad9cdec6adefdebdffffbdffffb5ffffa5fff7adffffa5ffffadffffadffffadffffadffffb5ffffadffffb5ffffadffffb5ffffb5ffff
bdffffbdffffc6ffffc6ffffc6ffffbdffffbdffffceffffd6ffffc6f7f7bddedeb5cecec6cececececed6cecebdadadbda5a5bd9c9cffefefffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffefefc6a5a57b52529c7373ad8c84b59494bda5a5b5a5a5adadada5a5a5adada5a5a5a5a5a5a59ca59c9c9c
9c9c9494ada5a58c8484efdedeffffffffffffb59c9c7b63637b63638c73738463638463637b5a5a7b5a5a7b5a5a8463638c6b6b735252735252ad8c8cefd6d6
ffffffb58c947339426b313984525a7b525a7b6363735a5a7363636b5a5ab5a5a5decece84737363424a5a3942634a4affffffffffffffffffffffffffffffff
ffffbdadad5239396b4a4a735252bda5a5f7efeff7e7e77b6b634a39393921295a31396331316331315a31315a31315229295a31315a39316b42426342395a42
425a424252424a6b6363b5b5b5e7e7e7ffffffe7f7f7add6d67bb5b573adad6b9c9c639c9c5a948c6b9c9c7b9c9ce7f7f7bdced684a5ad63b5b55ac6c65aced6
52cede4aced652d6d652d6d663ded673d6ce94deceadcec6adb5adb5a5a5debdbdffdedeffeff7ffeff7ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffff7f7e7dee7cec6b59494f7efeffffffffffffffffffffffffffffffffffff7f7e7ce7b63429c8452adad6badb5
6badc67badc684adce8ca5ce8ca5ce949cce94a5d6a59ccea59cd6b5a5dec6b5f7e7b5ffefbdffffb5ffffb5ffffadffffadffffadffffb5ffffadffffb5ffff
b5ffffb5ffffb5ffffbdffffbdffffc6ffffc6ffffc6ffffbdffffc6ffffc6ffffceffffc6ffffceffffcef7f7c6efe7c6ded6c6d6d6c6c6c6c6b5b5c6adadad
9494ceadadfffff7fffffffffffffffff7fffffff7fffffffffffffffffffffffff7f7e7d6d68c6b6b8c635a9c7373b58c8cb5a59cb5ada5ada5a5adadada5a5
a5a5a5a5a5a59ca5a5a59c9494a5a5a5948c8c948c8c8c8484d6c6c6f7efefffffffbdadad94847b735a5a634a4a735252845a5a7b52527b5252734a4a734a4a
734a4a6b4a4a634242c6b5adfff7f7ffdede7b424a73424a6b39427b525a7b5a636b5a5a736b6b635252efdedefffffffffffff7e7e7e7ceceffe7efffffffff
fffffff7ffffffffffffffffffffd6c6c67b63636b4a4a735252634a4aad9c94f7e7e7ffffffa59c9c5a4a4a5231315a29295218216329296b29297331316b29
296b31295a29296339315231316342426b4a4a5a424a5a424a846b73bdadb5e7eff7e7ffffceffffb5e7de9cc6c684a5a57b949c738c94738c949cb5bd738c94
6b8c945a8c8c529494529ca5529ca55aadad52a5a552ada552a5a563ada573a5a58ca5a5949c9ca59c9cbda5a5d6b5b5e7b5b5f7ceceffe7e7fff7f7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7efe7c6c6c6a5a5f7efeffffffffffffffffffff7fffffffffffffff7f7e7
ce7b5a399c8c639ca573a5bd7ba5bd84adce8ca5ce8cadd68cadce8cadd694add694b5d6a5a5cea5a5cead9cd6b5adefcebdffe7c6ffffbdffffbdffffb5ffff
b5ffffb5ffffb5ffffb5ffffbdffffbdffffc6ffffbdffffc6ffffc6ffffceffffc6ffffc6ffffc6ffffceffffc6ffffc6ffffc6ffffceffffd6ffffdeffffce
e7dec6ceced6cecec6b5b5c6adadad948ce7d6cefffff7fffffffffffff7ffffffffffffffffffffffffffffffffffffefefd6b5b5845a52946b6bad847bbda5
9cada5a5b5adadadadadb5adadada5a5ada5a5ada5a5ada5a59c9494a59c9ca59c9c9494948c8484b5b5b5efe7e7ffffffefdedebda5a5846b63735252734242
7342427342427b424a6331316339395231315a3939c6b5b5ffffffffffffd6adad6b313963394263424a735a5a7363636b636373736b4a42427b7b7be7dedef7
efeffffffffffffffffffffff7ffffffffffffffffffffffffffffefef9c84846b524a6342425a3939634a42ad9c94efdedeffffffffefef9c84847b5a526b39
395a21216321216318186321215a21215a2929634239634a424231295a4242634a4a5a424a5242426b636b949ca5bdd6d6ceeff7deffffd6f7f7d6eff7bdcece
9ca5ad8c9c9c73949463847b7394946b8484637b7b5273735a84845a8484638c8c638484638484637b7b6b7b7b6b7373737b7b7b6b6b9c8c84b5948cd6ada5ef
cec6ffe7e7f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffefe7e7c6c6c6a5a5ffeff7fffffffffffff7ff
fff7fffff7fffffffff7efdec67b633994845a9cad7b94b584a5c68c9cc684a5ce8ca5ce84b5d68cadce84b5d68cb5d694b5d69ca5ce9ca5d6a59cd6ada5e7c6
adf7deb5fff7bdfff7bdffffb5ffffbdffffb5ffffbdffffbdffffbdffffbdffffc6ffffc6ffffceffffceffffd6ffffceffffceffffc6ffffc6ffffc6ffffc6
ffffc6ffffc6ffffceffffe7ffffdef7f7dee7deb5b5b5cebdbdb5a5a5b5a5a5efdedefffffffffffff7fffff7fffffffffffffffffffffffff7fffff7f7efde
dead8c84845a529c7373ad948ca5a59ca5a5a5b5adadada5a5b5adadada5a5ada5a5ada5a5ad9c9ca59c9c9c9c9ca59c9c94948c8c8c8c949494e7d6d6fff7f7
fff7f7efd6d6bd9c9ca5737b84525a7b424a733942844a4a6339396b4a4a9c7b7befdedefff7f7fffffffff7f78c6b6b5a39395a39425a4a4a6b63635a5a5a52
5a526b736b6363635a5a526b6b63c6bdbdf7f7f7fff7fff7fffff7fffffffffffffffffffffffff7f7ad948c5a42396b4a4a634a425a42394a31319c8c84ded6
d6fffffffffffff7f7efcebdb5b5948cad7b73b57b7bbd8c84cea59cbd9c943929213129294242394242394a42425242425a525a52525a636b6b5a6b6b7b9c9c
a5d6cecef7f7e7ffffffffffffffffeff7f7b5cece94bdb58ca5a58c8c94847b7b7b8c846b7b736b736b73636b846b6b7b636b7b636b735a636b5a636b636373
6b638c847ba59484ad947bd6b5a5e7d6ceefefeff7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7efe7c6bdd6b5
b5f7efeffffffffffffffffffff7fffffffffffffff7f7e7ce7b63429c8c6394a57b9cbd8ca5c68ca5ce94a5ce8cadd694add68cbdde94bdd694bdd694b5d694
b5dea5b5dea5addeada5d6adb5e7ceb5efdebdffefc6fff7ceffffc6ffffc6ffffc6ffffc6ffffc6ffffceffffc6ffffceffffceffffd6ffffd6ffffd6ffffce
ffffceffffceffffceffffc6ffffc6ffffceffffceffffceffffe7ffffd6efefe7fff7c6ceceb5bdb5948c8cd6cec6fffff7ffffffffffffffffffffffffffff
fffffffffff7f7ffffffffffffd6bdbd84635a8c6363a58c84ad9494b5a5a5adada5b5b5adadada5adadada5a5a5ada5a5ad9ca5a59c9c9c949c9c9c9c9c9c9c
9494948484848c8c8cc6bdbdf7f7f7f7f7f7ffffffffffffffffffffefefffd6d6e7c6c6f7e7e7fffffffffffffffff7fffffffff7ffffffffe7ced65a39425a
42426b5a5a524a4a6b6b6b636b636363635a5a5a6363636363635a5a5a736b6bdededee7efefffffffffffffffffffffffffffffffc6b5b5735a5a5a4242634a
4a634a4a6b52525242426b5a5acecec6ffffffffffffffffffffffffffffffffffffffffffffffffefefe74a4a42313931424a424a4a4a524a4a4a42424a424a
6b63636b73734a5a5231524a52847b7badadb5dedeceefe7e7ffffe7ffffe7ffffdeffffeffffffffffffffffffffffff7efefdececedec6cee7bdc6efc6d6e7
bdcee7ced6f7e7efffffffffffffffffffe7d6cec6ad9cceada5e7d6ceefe7e7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7ffefe7efcecebd9494f7efeffffffffffffff7fffff7fffffffffffffff7e7d6bd9c7b5a9c8c639cad739cbd84a5c68c9cc68ca5ce8ca5ce8cadd694
b5d694b5d69cb5ce94bdd69cb5d6a5bddeadb5d6adb5deb5bde7c6bde7ceb5dec6c6efd6d6ffefdeffffcefff7cefff7cefff7ceffffc6ffffceffffc6ffffce
ffffceffffd6ffffceffffd6ffffceffffd6ffffceffffceffffceffffceffffd6ffffd6ffffceffffd6ffffd6ffffcef7f7bdd6d6bdb5bda59494d6ceceffff
fffffffffffffffffffffffffffffffffff7f7fffffffffffffff7efad948c7b5a529c7b73ad8c7bb59c8cb5ad9ca5a59c9cada59cada59cada59c9c9ca59ca5
ad9c9cad9c9ca594949c949c949494949c9494948c9c9494a5a5a5b5b5b5e7e7e7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff948484634a5252424a5a52526b63636b6363635a63636363635a5a6363635a5a5a5a5a5a5a5a5a847b84d6d6d6f7efefffffffffffffffff
ffded6de84737b5a4a4a52424a5a4a4a5a4a4a5a5252524a4a524a4ab5b5b5e7e7e7ffffffffffffffffffffffffffffffffffffffffffd6cece313131424242
4242424a4a4a4a4242524a4a73636373736b42524a31524a104a4221635a529c9484cec68cd6ceb5f7f7c6f7f7cef7f7d6eff7fffffff7ffffffffffffffffff
fffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffe7ceced6b5b5e7ceceefefeff7f7f7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7f7fff7eff7d6cecea5a5f7efeffffffffffffffffffff7fffffffffffffff7f7e7ce8c6b52ad946ba5b57ba5c68c9cbd84
a5ce8cadd694add69ca5ce8cadd69cb5d69cbdd6a5bdd6a5c6deadbdd6adbddeb5bddeb5ceefc6c6e7c6c6dec6c6e7c6cef7decef7ded6ffefd6fff7d6ffffd6
ffffd6ffffceffffceffffceffffd6ffffceffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffceffffdeffffceffffcef7
f7d6dedec6bdbdb5adadf7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffe7d6ce947b738c635aad8473b5948cad9c8cadb5a59cada5
9cb5ad9cadada5a5a5a59ca5ad9ca5a59c9ca59c9c9c94949c9c9c9494949494949494949c9c9c8484849c9c9cbdbdbde7e7e7f7f7f7ffffffffffffffffffff
fffffffffffffffffffffffff7fffffffffff7fffff7f77b6b6b63525263525a635a5a6b63636b63636363636b63636363636363635a5a5a635a5a635a5a6b63
63948c8ce7dedefff7f7fffffffff7f7a59c9c5a4a4a5a4a52524a4a5a52525a4a525a4a52524a4a4a4242847b7bd6cecef7efeffff7f7ffffffffffffffffff
ffffffded6d6524a524242424a424a524a4a524a4a4a4242736b63736b6b52525242524a39524a214a42295a5239737373b5b594d6d69cdede84c6cebdffffc6
ffffbdf7ffcef7f7e7ffffefffffeffffff7f7fffffffffffffffffffff7ffffffffffffffffffffffffffffefdedee7c6c6f7e7e7efefefffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7d6d6ceadadf7e7e7fffffffffffffffffff7fffffffffffffffff7e7d67b6342
a58c6bb5bd84adc68cadc68c9cc68ca5ce94a5ce94add694add694b5d69cbdd69cc6d6a5bdd6a5c6deadbdd6adbddeb5c6debdcee7c6c6dec6c6e7c6bddec6c6
efcec6f7ded6ffefd6fff7d6ffffceffffd6ffffceffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffdeffffd6ffffd6ffffd6ffffd6ffffd6ffffd6ffffceff
ffd6ffffd6ffffd6ffffd6ffffefffffd6d6d6bdbdbdb5bdbdf7f7f7fffffffffffffffffffffffffffffffffffffffffffffffffff7efc6b5ad84635a947363
a5847bad948cada59cadada5a5a5a5a5adad9ca5a5a5a5a5a59c9ca59c9c9c9c9c9c9c9c9494949494948c8c8ca5a5a5adadad8c8c8c8484848484848c8c8cad
adaddededee7e7e7efefefffffffffffffffffffffffffffffffffffffffffffffffffbdadad635a5a7b6b6b635a5a6b6363636363636363635a5a6363635a5a
5a5a5a5a5252525a52525a5a5a5a52527b7373bdb5b5e7e7e7f7f7f79c94945a5252524a4a5a5252524a4a5a5252524a4a524a52524a524a42425a5252ada5a5
d6ceceefefeff7f7f7ffffffffffffefe7e76b6b6b424242423939524a4a524a4a52524a6b6b636b6b635242425242425a424a5a424a4a3942424242394a5252
84847bc6c684dede7befef73fff763e7de73dede94efefb5ffffbdfff7c6f7f7c6efefd6f7f7e7f7f7f7ffffffffffffffffffffffffffffefe7e7e7dedef7ef
effff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7ded6debdb5efd6d6fffffffffffffffffff7ffff
fffffffffff7fff7e77352399c8c63a5ad7bb5ce94bdd69cb5d69cadd694a5d694a5ce94b5d69cb5d69cbdd6a5bdd6a5c6deadc6d6adc6deb5bddeb5cee7c6d6
e7c6d6efcecee7cecee7cebde7c6c6efd6c6efd6d6ffefceffefd6ffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffd6ffffdeff
ffd6ffffdeffffd6ffffd6ffffceffffd6ffffd6ffffdeffffdef7f7efffffced6d6bdcec6cececeffffffffffffffffffffffffffffffffffffffffffffffff
ffffffefe7e7b5948c845a529c7b6bad9484b59c94b5a5a5b5ada5a5a5a5a5a5a5a5a5a5a5a5a59c9c9c9c9c9c9c9c9c9c9c9c9494949c9c9ca5a5a5adadad84
84848c8c8c8484848484847b7b7b848484949494b5b5b5cececee7e7e7e7e7e7efefeffff7f7fffffffffffffffffffff7f79c949473636b635a5a6b63636b6b
6b6363636363636363636363635a5a5a5a5a5a635a5a6b6363635a5a635a5a5a52528c8c8ccec6c69c94945252525a525a5252525a5252524a525a5252524a52
4a424a524a4a5a52524a42425a5a5a948c8cc6c6c6cecececececebdbdbd7b7373524a4a524a4a4a4a4a524a4a5252526b736b6363635a4a4a5a424263424a6b
424a734a525a424a4a424a29424a21525a4aa59c6bded66bfff76bfff773fff773f7ef73efe77bf7ef7be7e784dede9cdedebdefefdefffff7ffffffffffffff
fffffffff7f7f7efefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efffe7ded6bdb5dec6c6
ffeff7fffffffffffffffffffffffffffffff7f7e77b5a428473529c9c6ba5b584bdce9cbdd69cbddea5add694add694add694b5d69cb5ce9cbdd6a5bdd6a5c6
deb5bddeb5c6deb5cee7bdd6e7c6d6e7c6d6e7cecee7c6cee7cec6e7cec6e7d6c6efd6cef7e7d6f7efdefff7deffffe7ffffdeffffe7ffffdeffffdeffffdeff
ffdeffffdeffffdeffffdeffffdeffffd6ffffdeffffd6ffffd6ffffd6ffffd6ffffd6ffffdeffffdef7f7def7f7bdd6ceb5c6c6d6ded6ffffffffffffffffff
fffffffffffffffffffffffffffff7ffffffe7d6ce94736b7b5a52a5847bad8c84bda59cb59c9cb5a5a5a5a5a59ca5a5949c9c94a59c949c9c949c9c9c94949c
9c94949494a5a5a5a5a5a58c8c8c8c8c8c8c8c8c8484848484848484847b7b7b7b7b7b8484848484848c8c8c9c9494bdbdbdc6c6c6cec6c6cec6c6cececea59c
9c6363636b63636b6b6b6363636363635a63636363635a5a5a5a5a5a525a5a5a5a5a5252525a52525a5a5a5a52525a52528c84847b73735a52525252525a5252
524a52525252524a4a5252525252525a5252524a4a5252524a4a4a524a4a4a4a4a5252525252525252524a42424a4a4a524a4a524a4a4a424a5a63635a6b6b52
5a5a4a4a4a5a4a4a5242425a424a5a39425a424a4a424a394a4a21424a215a6331848463c6c673dede73fff763f7f763fff763fff76bfff773f7ef8cf7f7a5ef
efbdefefd6eff7eff7fff7f7f7fffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7ffe7e7e7cec6ceb5b5fff7f7ffffffffffffffffffffffffffffffffffef8c735a8473529c9c6ba5b57ba5bd84adce94b5d69cbddea5b5dea5bde7adbd
dea5c6dea5bdd6a5c6deadc6deadc6e7bdc6debdd6e7c6dee7c6deefced6e7c6d6e7ced6efced6efd6ceefd6d6efdeceefded6f7e7deffefe7ffffe7ffffefff
ffe7ffffe7ffffe7ffffe7ffffdeffffe7ffffdeffffe7ffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffdeffffd6ffffdefff7d6efefbdcece
bdcec6e7e7e7fffffffffffffffffffffffffffffffffffffffffffffffffffff7ceb5ad8c6b63946363b58484bd9494bd9c9cbda5a5adadad9ca5a59ca5a594
a59c94a59c949c9ca59c9c9c94949c9c9ca5a5a5adadad8c8c8c8c8c8c8484848c8c8c8484848484847b7b7b8484847b7b7b7b7b7b737373737373736b6b6b63
636b63636b6b6b6b6b6b736b6b635a5a7373736b6b6b6b6b6b636363636b635a63635a63635a5a5a5a63635a5a5a5252525a5a5a6363635a5a5a636363737373
6b6b6b5252525a5a5a5252525252524a4a4a525252525252524a525252525a52524a424a4a4a4a5252525a52524a4a4a5252524a4242525252524a4a5252524a
42424a4a4a636b6b637373394a4a424a4a424a4a4a4a4a4a4a4a4a4a4a4239424a4a52424a525a6b735a737b52737b315a5a42848452bdb563e7e76bffff63ff
ff5af7ef6bfff77bfff79cffffb5f7f7deffffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7efffefefe7cecec6b5adf7efeffffffffffffffffffffffffffffffffff7efad94847b6b4a9c946ba5ad7badbd8cadc68cb5
d69cb5d69cbddea5bddea5c6e7adc6deadc6deadbdd6adc6deb5c6deb5cee7bdcedebddeefc6deefcedeefced6e7c6deefced6efd6deefd6d6efd6deefded6ef
dedef7e7def7e7e7ffefe7fff7efffffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffe7ffffdeffffdeffffdeffffdeffffdeffffdeffffd6ffffd6ffff
d6ffffcefff7d6f7f7ceefe7bdcecebdc6c6efefeffffffffffffffffffffffffffffffffffffffffffffffffff7efe7ad948c8c5a5a9c6b6bb58484bd8c94bd
9c9cada59ca5a5a594a59c8ca59c8c9c9c9c9c9c9c94949c9494949494a5a5a5a5a5a58c8c8c8c8c8c8c8c8c8c8c8c8c8c8c8484848484847b7b7b8484847b7b
7b7b7b7b7373737b73737373737b73736b6b6b736b6b6b6b6b6b63636b6b6b6b6b6b6363636363635a63636363635a635a5a635a525a525a5a5a5a5a5a5a6363
5252525a5a5a5a63637b7b7b6b6b6b525a5a5252525252524a4a4a4a4a4a4a4a4a525252524a4a525252524a4a525252524a4a525252524a4a524a4a4a4a4a4a
4242524a4a524a4a4a4242524a4a4a4a4a7373735a6b63394a4a394a4a39524a314a42395252394a4a4252525263636b6b7363636b635a635a4a5252424a4242
4a215a63298c8c52cece63efef6bffff63ffff73ffff8cffffb5ffffd6fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefded6cebdbdefe7e7fffffffffffffffffffffffffffff7ffffffcec6b5736b4a8c
845aadad7bb5bd8cbdce9cadce94b5d69cb5d69cbddea5c6deadcee7b5cee7b5cee7bdcedeb5cee7bdc6debdd6e7bddee7c6eff7d6e7efcee7efcedee7cee7ef
d6deefd6e7f7dedeefdee7f7e7deefdee7f7e7e7f7e7efffefe7fff7efffffe7ffffefffffefffffefffffe7ffffefffffe7ffffe7ffffdeffffe7ffffdeffff
deffffdeffffdeffffceffffd6ffffd6ffffd6fff7deffffc6dedeb5c6c6ced6d6f7f7f7fffffffffffffffffffffff7ffffffffffffffffffffffffe7ded69c
7373945a5aad6b6bbd8c8cbd9494b5a59c9c9c9c9ca5a594a59c94a59c949c9ca59c9c9c94949c9c9ca5a5a5adadad8c8c8c9494948c8c8c8c8c8c8484848484
848484848484847b7b7b7b7b7b7b7b7b7b7b7b7373737b7b7b7373737373736b6b6b7373736363636b7373636363636b6b6363636363635a63636363635a5a5a
5a5a5a5a5a5a5a63635a5a5a525a5a525a5a737373737b7b6363635252525a5a5a5252525252524a4a4a5252525252525a5a5a524a4a5252525252525252524a
4242524a4a5252525252524a4a4a5252524a4a4a5252525252525a525a7373736363634a524a4a5252394a4a394a4a425a5a5a6b6b5a6b6b636b6b525a5a4a4a
52524a5252424a52394a5a4a5229424a295a63186b6b31a59c52ded67bffff7bfff79cffffbdffffdefffff7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efded6decec6d6c6c6ffffffffffffffffffffffffff
ffffffffffefefe76b5a4294845aada573b5b584b5c694b5ce94adce94b5dea5b5d69cbddea5c6deadcee7b5cee7bdd6efc6cee7bdcee7c6cee7bddeefcee7ef
cee7efd6e7efcee7efd6dee7d6e7efdee7efd6e7f7dee7efdee7f7e7e7efe7e7f7e7e7efe7e7f7efe7f7efeffff7effff7efffffefffffefffffe7ffffe7ffff
e7ffffe7ffffe7ffffe7ffffdeffffe7ffffd6ffffd6ffffceffffd6ffffd6ffffdeffffceefe7c6dedebdcececed6d6f7f7f7ffffffffffffffffffffffffff
fffffffffffffffffff7f7dec6c6946363945a5aa56b73ad8484ad9494ada59c9ca59c94a59c8c9c949c9c9c9c9c9c9c94949494949c9c9cadadad8c8c8c8484
848c8c8c8484848484848484848484847b7b7b8484847b7b7b7b7b7b7373737373737373737373736b6b6b6b7373636b6b6b6b6b636b6b6b6b6b5a6363636363
5a63636363635a5a5a5a635a525a5a5a5a5a525a5a5a6363525a5a5a5a5a6b6b6b7b7b7b5a5a5a525a5a5252525252524a52525252524a4a4a5252524a4a4a52
5252524a4a5252524a4a4a524a4a4a4a4a4a4a4a4a42425252524a42424a4a4a4a4a4a4a4a4a5a525a7b73735a52525a4a52524a4a635a5a6363636b6b6b5a63
63525a5a424a4a424a4a42424a4a4a5242424a4a424a4a424a4a424a394a52214a4a105252429c9463cec684e7deadffffd6ffffe7ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efe7d6cec6c6b5b5f7
efefffffffffffffffffffffffffffffffefefe77b6b528c7b52ada573adad7bb5c694b5ce94b5d69cb5d6a5bddea5bdd6a5c6deadc6deadcee7bdcee7bdd6ef
c6d6efc6deefcedeefcee7f7d6e7efd6efefd6e7efd6efefd6e7efd6efefdee7efdeeff7e7eff7e7eff7efeff7e7efffefe7f7efeffff7e7ffefeffff7effff7
f7ffffefffffefffffefffffefffffe7ffffefffffe7ffffe7ffffdeffffdeffffd6ffffd6ffffd6ffffdeffffdeffffdeffffceefe7c6dedeb5c6c6dee7e7ef
fff7fffffffffffffffffffffffffffffffffffffffffffff7f7d6b5b58c5a5a9463639c736bad8c8cad9c9cada5a59c9c949c9c9c9c9c9ca59ca59c94949c9c
9c9c9c9cadadad8c8c8c8c8c8c8c8c8c8c8c8c8484848484848484848484847b7b7b7b7b7b7b7b7b7b7b7b7373737373737373737373736b6b6b6b6b6b6b6b6b
6b6b6b636b6b636b6b6363636363636363636363635a5a5a5a63635a5a5a5a63635a5a5a5a5a5a5a5a5a7373737373735a6363525252525a5a5252525252524a
52525252524a52525252525252525252525252525252524a4a4a5252524a4a4a5a5a5a5252524a4a4a4242425252525252526b6b6b6b636363525a7363638473
737b6b7373636b5a5252524a52424a4a4a4a4a424a4a4a524a424a4a424a4a39424a4a4a4a52424a52425242424a426363527b7b42737373a5a5bde7e7efffff
fffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7f7efe7ded6c6b5b5efdedefffffffffffffffffffffffffffffff7f7ef8c846b846b4aa5946bb5ad7bb5bd84b5ce94b5ce94b5d6a5b5d69cbdd6a5bdd6
a5c6deadc6deb5cee7bdcee7c6d6efced6e7c6deefcee7efd6e7f7dee7efd6e7efd6e7efd6eff7deefefd6efefdeefefdeeff7e7eff7e7eff7efeff7efefffef
e7f7e7eff7efeff7efeffff7effff7efffffefffffefffffe7ffffefffffe7ffffefffffe7ffffe7ffffdeffffdeffffd6ffffd6ffffd6ffffdeffffd6ffffd6
fff7ceefefc6ded6b5c6c6d6e7def7fffffffffffffffffffffffffffffffffffffffffff7f7ffe7e7bd9c9c7b524a946b639c7b73a58c8ca59494ada59ca5a5
9c9c9c9c8c8c8c9c9c9c949494a5a5a5a5a5a58c8c8c8c8c8c8c8c8c8484848484848484848484847b7b7b7b7b7b7b7b7b7b7b7b7373737373736b7373737373
6b6b6b6b6b6b6b6b6b6b6b6b6363636b6b6b6363636363635a5a5a6363635a5a5a5a6363525a5a5a5a5a5a5a5a5a5a5a525252636363737b7b73737352525252
5a5a5252525252524a4a4a5252524a4a4a5252524a4a4a5252524a4a4a5252524a4a4a4a4a4a4a4a4a5252524242424a4a4a4a4a4a4a4a4a4a4a4a5a5a5a7b7b
7b7b73737363637b6b6b736363635a5a52424a4a42424a42424a4a4a4242424a4a4a394a42394a4a394242394a4a424a4a52424a5a4252524a526b6b73636b6b
4a52528c9494d6dedeffffffffffffffffffffffffffffffefffffeffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7fffff7efefdedececed6c6c6fff7fffffffffffffffffffffffffffffff7bdb59c735a399c8c63b5a57bbdbd8cb5c694b5d6
9cb5d69cbddea5bdd6a5c6deadc6deadcedeb5cedebdcee7c6cee7c6d6efced6efcee7f7dee7f7deeff7deeff7def7f7e7eff7def7f7e7f7f7e7f7ffeff7f7ef
f7ffefeff7eff7ffefefffeff7ffefeff7eff7ffefeff7eff7fff7effff7f7ffffeffffff7ffffefffffefffffefffffefffffe7ffffe7ffffdeffffdeffffd6
ffffdeffffd6ffffdeffffd6ffffd6ffffceefe7bdd6d6b5c6c6d6e7e7fffffffffffffffffffffffffffffffffffffff7f7fffffff7e7e79c847b73524a9473
6b9c7b7ba58c84ad9494b5a5a59c9c94949494949c949c9c9c9c9c9cadadad8c8c8c8c8c8c8c8c8c8c8c8c8484848c8c8c8484848484847b7b7b8484847b7b7b
7b7b7b7373737373737373737373736b6b6b6b73736b6b6b6b6b6b636b6b6b6b6b6363636363636363636363635a5a5a5a5a5a5a5a5a6363635a5a5a5a5a5a6b
6b6b8484846b6b6b5a5a5a5252525a5a5a5252525252525252525252525252525252524a4a4a5252525252525252524a4a4a5252524a4a4a4a4a4a4a4a4a5a5a
5a6363636b6b6b7373738484846b63636b63635a5252524a4a4a42424a4a4a4a4a4a4a4a4a4a4a4a4a524a424a4a424a4a4242424a4a4a4a4a4a524a4a4a4242
6352527b737373636b52424a7b6b73ad9ca5fffffffffffffffffffffffffffffffffffff7ffffefffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7d6cecebdbdefd6defffffffffffffffffffff7f7ffffffded6c6846b4a8c73
4aada573b5b58cbdce94b5ce94b5d69cb5d6a5bdd6adbdd6a5c6deb5c6deb5cee7bdc6debdcee7c6cee7c6d6efd6d6efd6e7f7dee7f7deeff7e7eff7def7f7e7
f7f7e7f7f7eff7f7e7f7ffefeff7eff7ffefeff7eff7ffeff7ffeff7ffefeff7eff7ffefeff7efeffff7eff7efeffff7efffffefffffe7ffffefffffe7ffffef
ffffe7ffffe7ffffe7ffffe7ffffd6ffffdeffffd6ffffd6ffffcefff7cef7efceefefb5ceceb5c6bddee7e7ffffffffffffffffffffffffffffffffffffffff
fffffff7e7d6ce94737373524a8c6363a57b7bb58c8c9c8c8ca59c9c949c9c8c94949494949c9c9cadadad8c8c8c8484848c8c8c848484848484848484848484
7b7b7b8484847b7b7b7b7b7b7373737373737373737373736b6b6b7373736b6b6b6b6b6b6b6b6b6b6b6b6363636363636363636363635a5a5a635a5a5a5a5a5a
5a5a5a5a5a5a5a5a5a52527373737b7b7b6363635252525a5a5a525252525252525252525252524a4a5252524a4a4a5252524a4a4a5252524a4a4a5252525252
525a5a5a6b6b6b7373737373737373736b6b6b7373736b6b6b525252424a4a424a4a394242424a4a424a4a4a4a4a424242424a4a4242424a4a4a4242424a4a4a
4a4242524a4a4a42424a42426b636384737b5a5252635252948484e7d6d6fffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efefe7ded6c6c6d6bdc6ffffffffffffffffffffff
fffffffffff7e7ad8c6b8c734a9c9463b5b584b5c68cbdd69cb5d69cbddea5bdd6a5c6deadc6deadcee7bdcee7bdcee7c6cee7c6d6efced6efcedeefd6deefde
eff7e7eff7e7f7f7e7f7f7e7ffffeff7f7efffffeff7ffeffffff7f7ffeff7fff7f7ffeffffff7ffffeffffff7f7ffeff7fff7efffefeffff7effff7efffffef
ffffefffffefffffefffffefffffefffffefffffefffffe7ffffe7ffffd6ffffd6ffffceffffd6ffffcefff7d6fff7d6efefc6d6cec6c6c6f7efefffffffffff
fffffffffffffff7fffffffffffffff7ffffffe7cec69463637b4a4aa5736bb584849c8484948c8c9ca5a5849494949c9c9c9c9cadadad8c8c8c8c8c8c8c8c8c
8c8c8c8484848484848484848484847b7b7b7b7b7b7b7b7b7b7b7b7373737373737373737373736b6b6b736b6b6b6b6b6b6b6b6b6b6b6b6b6b6363636b636363
6363636363635a5a635a635a5a5a635a5a5a5a5a6363637373737b7b7b635a5a635a5a5a52525a5a5a5252525a52525252525252525252525252524a4a4a5252
525252525a5a5a636363737373737b7b6b73736363635a5a5a4a5252636363737373636363424a4a394a4a394a4a42524a424a4a4a4a4a4a424252424a4a4242
5242424a4242524a4a4a4a4a4a4a4a424a424a524a6b6b6b7b7b7b4a42425242427b6b6bada5a5fff7f7fffffff7fffffffffff7ffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efe7efd6debdad
b5fff7fffff7fffffffffffffffffffffff7efd6bd9c8c6b4a9c8c63a5a57badbd8cb5ce9cbdd69cb5d69cbddeadbddeadc6deb5c6deb5cee7bdcedebdcee7c6
cee7ced6efd6d6efd6e7f7dee7efdeeff7e7eff7def7f7e7eff7e7f7f7eff7f7eff7fff7f7ffeff7fff7f7fff7fffff7f7ffeffffff7f7ffeffffff7eff7eff7
fff7eff7efeffff7e7f7efeffff7e7fff7efffffe7ffffefffffefffffefffffe7ffffe7ffffdeffffd6ffffceffffceffffceffffd6ffffcef7f7d6f7f7d6ef
e7ced6d6c6bdc6e7e7e7fffffffffffff7fffff7fffff7fffffffffffffff7fffff7e7bdbd94635a734242a573739c7b7b9c8c849c94948c948c949494a5a5a5
ada5a58c8c8c8c8c8c8c8c8c8484848c84848484848484847b7b7b847b7b7b7b7b7b7b7b7373737b73737373737b7373736b6b736b6b6b6b6b736b6b6b63636b
6b6b6363636b6363635a63636363635a63635a635a5a5a5a5a5a5a5a52635a5a635a5a7b7373737373635a5a5a525a5a525a5a52525a5252524a4a525252524a
525252525a5a5a6b6b6b7373738484847373736b6b6b5a5a5a5a5a5a4a52524a5252424a4a4a4a4a525a5a7373734a5252394a4a314a4a39524a394a42424a4a
424242524a4a5242425a4a4a524242524242524a424a4a4a394239424a4a525a527b7b7352524a524a425a4a4a8c847bd6cec6efe7deefefefefefefe7efe7f7
f7effff7effffff7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7e7efcec6c6c6bdbdffffffffffffffffffffffffffffffe7dece846352947b63a5a57ba5ad84bdce9cbdd69cbddea5bddea5cee7adc6dead
cee7b5cee7bdd6efced6e7cedeefd6dee7cedeefd6e7efd6eff7deeff7def7ffe7f7f7e7f7ffeff7f7eff7fff7f7fff7fffff7f7fff7fffffffffff7ffffffff
fff7fffffffffff7fffffff7fff7fffff7f7fff7f7fff7eff7efeffff7eff7f7effff7effff7f7fffff7ffffefffffe7ffffdeffffd6ffffceffffc6ffffceff
ffc6ffffceffffc6fff7d6fff7cee7e7c6d6debdcecee7efeff7fffffffffffffffffffffffffffffffffffffffffffff7c6a5a58c63637b52528c6363a57b7b
ad94949c8484a59c9ca5a5a5adadad848484948c8c94948c8c8c8c847b7b8c848484847b8484847b7b7b7b7b7b7b73737b7b7b7b73738473737b73737b737373
6b6b736b6b6b6b6b736b6b6b6b6b6b6b7363636b63636b5a5a6363636b5a5a635a63635a5a5a63635a5a5a5a6b63637b7b7373736b5a5252635a5a5a5252635a
636b5a63736b6b7b6b73847b7b847b7b7b73736b6b6b6b6b6b635a5a5a525a524a525252524a4a524a4a4a4a52524a52524a5252636b6b636b6b424a4a394a4a
39524a39524a42524a424a42424a42424242524a4a524a4a524a424a4242524a424a4242524a42635252847b7363524a634a39634a428c6b63bd9c94efcec6e7
cec6e7cec6e7cec6efcec6efd6ceffe7deffefe7fff7f7fff7effffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7fffff7f7d6cececec6c6ded6d6fffffffffffffffffffffffffff7f7bd9c947b63529c8c73b5ad8cb5bd8cc6d69c
bdce94c6dea5c6dea5c6e7adc6deadcee7bdcedebdd6e7c6dee7cedeefd6dee7d6e7efdee7efdeeff7e7eff7e7f7f7efeff7eff7ffeff7f7eff7fff7f7f7f7ff
fffff7f7f7fffffffffff7fffffffffff7fffffffffff7fffffff7f7f7f7fff7f7f7f7f7fff7eff7efefffefeff7eff7fff7eff7f7efffffefffffe7ffffdeff
ffdeffffceffffceffffc6ffffc6ffffc6ffffceffffc6ffffcef7f7c6e7e7bddedeb5cecedee7e7f7fffffffffff7fffffffffffffffffffffffff7f7fff7f7
c6ada584635a7b52528c6363a573739c7b7b94847bada5a5bdb5b594948c8c84848484848484848c8c8c8c84848c848484847b84847b7b7b737b7b7b7b737384
7b7b7b73738473737b6b6b7b7373736b6b736b6b6b6b6b6b636b5a5a6363636b5a5a6363636b5a5a635a5a6b5a5a5a5a5a52525a5263635a6b6b6384847b736b
6b6b63637b73738c8484847b7b84737b736b6b736b6b6b5a636b5a63635a5a5a5a5a5252524a4a4a4a424a4a4a4a4a4a4a4a52524a4a4a4a5252424a4a5a5a5a
6b7373525a5a424a4a424a4a394a42394a423942394a4a4a4a4a4a4a4a424239394239395242395a4a425239395a42426b52527b635a73524a6b4a425a312963
39318c635abd948cce9c94c6948cb58c84c69c8cc69c94d6ad9cdeb5a5f7c6bdffd6ceffefe7ffefeffffffffffffffffffffffffffffffff7f7f7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efefe7dedebdb5b5f7f7f7ffffffffffffffffffffffffdedece6b5a4a
8c735ab5a584c6bd94c6ce94c6d69cbdd69cc6e7adbde7adc6e7b5c6e7b5d6e7c6d6e7c6e7efd6deefd6e7efd6e7efd6eff7e7eff7e7f7ffeff7f7eff7fff7f7
f7eff7fff7f7fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7fff7f7fff7f7ffeff7fff7efffeff7fff7eff7efefff
f7e7f7f7efffffe7ffffe7ffffdeffffdeffffd6ffffceffffc6ffffceffffceffffd6ffffceffffceffffc6efefbdd6debdc6cedee7eff7ffffffffffffffff
f7ffffffffffffffffffffffffffffc6adad8463638c6363946b6b9c7b7ba58c8ca59c9cada5a58c8484948c8c8c848494948c8c8c8c8484847b7b7b84847b7b
7b737b7b737373737b73737373737b7373736b6b7373736b6b6b6b6b6b6b636b6b6b6b6b636b6b6b6b63636b6b6b6b63636b635a6b5a525a63636b7b7b7b8484
7b847b7b949494949494848484847b7b7b73736b63636363635a5a5a5a5a5a5252525252524a4a525252524a524a4a52524a4a4a5252524a4a4a5252524a4a4a
5252524a4a4a5252526b6b6b7373734a4a4a525252524a4a5a5a52524a4a524a424a4242524a42524a425a4a4a5239395a42425a42425a39396342427b5a5a6b
4a4a5229295231296342317b524a946b639c736b9c736b946b639c736b9c736b946b639c736bbd948cce9c94deada5e7bdb5f7d6d6ffe7e7ffefefffefe7fff7
f7fffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffffffefe7e7c6bdbdd6ceceffffffffffff
fffffffffff7efefe7a59484735a42ad8c73c6ad84d6c69cc6ce9cbdd69cb5dea5b5e7adb5deadcee7bdd6e7c6e7e7cedee7cee7efd6e7efd6eff7dee7efdeef
f7e7eff7e7f7ffefeff7eff7ffeff7f7f7fffff7f7fff7fffffff7fffffffffffffffffffffffffff7fffffff7fff7fffff7f7fff7f7fff7f7ffeff7fff7f7ff
eff7ffefeff7efeff7efe7f7e7e7f7efdeefefe7fff7defff7deffffd6fff7d6ffffd6ffffd6ffffceffffceffffceffffd6ffffceffffcef7ffceefefcedee7
b5c6cecedee7effffff7fffff7fffffffffffffffffffffffffff7ffffffcebdb5846b639473738c7373846b6b9c8c8ca594948c8484948c8c8484847b7b7b84
84847b847b7b84847b7b7b7b7b7b7b7b7b847b7b7b7b737b7b7b7373737373736b736b7373736b6b6b6b6b736b6b6b7b7b7b7b7b7b8c848c8c848c948c94948c
949c949c948c8c7b73736b6b6b73736b7b7b7b7373735a5a525a5a5a4a52525252524a524a4a5252424a4a4a524a424a4a4a5252424a4a4a52524a524a4a5252
4a4a4a4a52524a4a4a52524a524a4a524a4a5a525284737b63525a524a4a5242425242424a39315a4242634a426342425239315239315231316342425a393152
3131633939734a4a6339395a31315229294221184a29295a393173524abd9c94f7ded6fff7eff7f7effff7f7efd6d6b58c8c7b5252946b6bbd948cc69c94d6a5
a5efc6c6f7c6ceffd6deffefeffff7f7ffefe7f7efeffff7f7fffffff7fffff7ffffefffffefffffe7ffffeffffff7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffefe7e7
efdee7c6bdbdefe7e7fffffffffffffffffffffff7e7dece9c73638c634abd9473d6bd94d6cea5c6d6a5bde7adaddeadbde7b5c6e7bddeefcedee7c6e7efcede
efcee7f7dee7f7deeff7deeff7def7ffeff7ffeff7ffeff7ffeffffff7f7fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7ffff
f7f7fff7f7fff7f7ffeff7fff7efffefefffefeff7e7efffefe7efe7e7f7e7deefe7def7efdef7efdefff7defff7deffffdeffffdeffffceffffceffffceffff
ceffffc6ffffd6ffffceefefc6e7efb5cecebdced6e7f7f7fffffffffffffffffffff7f7ffffffffffffffffffd6c6c673635a7b6b6b9c8c8ca59494ad9c9c8c
7b7b9c9c9c9494948c8c8c848c8c949c9c8c9c94949c94949494949c949494949c9494949c9c9ca59c949c9c949c9c949494949c9c94949494949484848c8c84
8c7b7b7b7373736b636b6b63635a5a5a635a636b636b6363636b636384848473736b5a635a5a5a5a5a635a52635a5a635a525a524a5a524252524a5a5242524a
4a52524a524a4a52524a4a4a4a524a4a4a42524a4a524a4a5a4a4a5a4a4a846b6b7b6b6b634a4a63424a6342426b4a4a734a4a6339396339396339396b394263
39396339395229295229296331397b52526331393908103910106b4242ceb5adffefe7fffff7fffff7fff7effffffffffff7fffff7fffff7fffffffffff7efe7
dea58c8473524a84635aad7b7bc68484d69c9cdea5a5efbdbdefc6c6f7d6d6ffefefffefeff7efeffffff7f7fff7f7ffffeffff7efffffeffffffffffff7ffff
fffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7f7fff7fff7efefded6d6c6bdbdfffffffffffffffffffffffffff7efcead9c8452429c6b52c6a584c6bd94ced6adbddeadb5deb5b5deb5c6
e7bdcee7bddee7c6dee7c6e7efd6e7efd6eff7dee7efdeeff7deeff7e7f7ffeff7ffeff7fff7f7fff7fffffffffff7ffffffffffffffffffffffffffffffffff
f7fffffffffff7fffff7f7f7eff7fff7f7ffeff7fff7eff7efefffefeff7e7eff7efe7f7e7e7f7e7deefdedeefded6e7ded6efded6efe7def7efd6f7efe7ffff
deffffd6ffffceffffceffffc6ffffc6ffffbdf7f7ceffffc6eff7b5dedea5c6ceadc6cedeefeffffffff7fffffffffff7f7f7fffffffffffffff7f7cec6bd7b
6b6b947b7b9c8484ad949c9c8c8c9494949c9c9c94a59c94a59c8494948c949484948c8c948c848c848c8c848484847b7b7b6b73736b73736b73736b7373636b
6b6b6b6b6b6b6b63636b635a63635a63635a5a635a63635a63636363635a635a5a5a5252526363637373736b6b6b525a52525a5a4a52524a524a42524a4a524a
42524a4a5a4a42524a4a5a524a524a52524a4a4a4a524a4a4a4a42524a4a524a425a4a4a5a4a426b52528c73736b4a4a6339396b42426339396331396329316b
31396329316329315a21295a29295229295a3131522929633939a5737bf7cecefff7f7fffffffffffffffffffff7f7fff7effff7f7ffffffffffffffffffffff
fffffffffffffffffffffffffffffffff7efefd6bdb59c73739c6363a5636bad7373bd8484c69494ce9c9cd6adade7c6c6efd6ceefded6f7e7e7f7e7e7fff7ef
fff7f7fffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7fff7e7e7d6c6c6efdedefff7f7ffffffffffffffffeff7e7dead84738c634aa5846bbdad8cc6
c69cc6deadc6deb5c6e7bdc6deb5cee7bdd6e7bddeefcedeefcee7f7d6e7efd6eff7dee7f7def7ffe7f7ffeffffff7f7fff7fffff7fffff7ffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7fffff7f7ffeff7fff7f7ffeff7ffefeff7e7efffefeff7e7efffefe7f7dee7f7dedeefd6deefdedeefd6
deefdedeefdedef7e7d6f7efdefff7d6ffffd6ffffceffffceffffbdffffc6ffffb5f7f7bdffffbdf7f7b5e7e7a5ceceadced6d6efeff7fffff7f7ffffffffff
fffffff7f7ffffffffffffc6bdb57b63637b6363b5a5a5b5a5a59c94947b8484848c8c7b8c84738c846b847b73847b737b73737b737373737373736b73736b73
736b6b6b6b7373636b6b6b6b6b6363636b6b6b6b6b6b6b6b6b63636363636b5a5a635a5a635a5a5a5a5a635a5a636363637373737b7b7b5a63635a5a5a525a52
6363635a5a5a5a5a5a525a525a5a5252524a52524a5252425a524a5a524a5a524a5a4a42634a4a5a4a42634a4a5a4242634a4a6b4a4a7b5a5a6339396339395a
31316331395a29296331316329315a29295218216331398c6363c69c9cefc6ceffefeffffffffffffffff7f7fff7f7fff7f7ffffffffffffffffffffffffffff
fffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdeded6a5a59c6b6b9463639c6b6bad7b7bb58484c69494ce9c9c
deadade7b5b5f7bdbdffc6c6ffd6d6ffdedefff7eff7f7effffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efefefdedecebdbdefe7e7ffffffffffffffffffffffefde
c6b584634a84634aa58c73bdb594cecea5d6debdcedeb5cee7bdc6e7bdd6efc6d6e7c6deefcee7efd6e7f7d6e7efd6e7f7deeff7def7ffeff7ffeff7fff7f7ff
f7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7ffeff7fff7f7ffeff7ffefeff7e7eff7efeff7e7efffefeff7e7e7f7de
deefd6e7f7dedeefd6e7efd6dee7d6dee7d6d6e7d6d6e7deceefded6ffefd6fff7ceffffc6ffffbdffffb5ffffb5ffffadfff7b5ffffbdf7ffb5efefa5ced6a5
c6c6cedee7effffff7fffffffffffffffffffff7fff7f7fffffff7dede947b7b7b6363948c8ca5a5a5a5ada584948c6b7b7b6b847b6b847b6b7b73737b7b6b73
73737b7373736b7373737373737373736b6b6b6b6b6b6b6b6b6b6b6b6363636363635a63636363635a63635a6363525a5a5a5a6352525a525a5a5a5a637b8484
7373735a5a5a5252525a52525a5a525a5a525a524a5a524a5a4a425a524a5a4a42634a42634a426b4a426342426b4a425a42396339395a39315a393963393973
4a4a5a31316339394a21215a31315a31315a31316339429c737bd6adb5ffdee7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7eff7ded6d6b5ad
a57b7b9463639c6b6bad7373b57373c68484ce8c8ce79c9cefa5a5efbdbdefcec6efded6f7dedeffefeffff7effffff7fff7f7ffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffeff7deced6d6c6c6f7
e7e7fffffffff7f7fffff7fff7efc6b5a5735a4a8c7363ad947bceb59cd6c6a5dedeb5d6e7bdceefc6c6e7bdd6efc6dee7c6e7efd6e7efd6eff7dee7f7deeff7
e7eff7def7ffeff7ffeffffff7f7fff7fffffffffff7fffffffffffffffffffffffffffffffffff7fffffff7fff7fffff7f7ffeff7ffefeff7eff7ffefeff7e7
eff7e7e7f7e7efffe7e7f7dee7f7dedeefd6e7efd6e7efd6e7efd6dee7d6dee7d6cee7cecee7d6c6e7d6c6f7e7c6fff7ceffffbdfff7b5ffffa5ffffadffffad
ffffbdffffbdffffb5efefadd6dea5c6cec6dedeeffffff7fffffffffffffffffffffffffffffffffff7dede9c8c8c7b73738c8484a5a5a5b5bdbd94a59c8494
946b847b6b7b7b6b7b7b737b7b6b73736b73737373737b737b736b6b736b6b6b6b6b7373736b6b6b6b6b6b6363636363635a63635a6363525a5a526363525a5a
52635a525a5a636b6b8484846b6b6b5a5a5a635a5a5a52526b5a5a63524a6b524a6b4a4a6b524a6b4a426b4a426b42396b42426b39397342426b39396b393963
31316331315a31316b4a426b42396b42426342427b5a5aa58484d6b5b5f7e7e7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7fff7efefcececea59cad7b7ba56b6bad6b6bb57373c67b7bc68484cea59cceada5debdbdefceceffe7deffe7e7ffeff7ff
f7f7fffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7f7f7e7e7dececee7cecef7dedeffffffffffffffffffdedece9c8c7b7b63529c7363b58c73ceb59cd6ceaddee7bdc6e7bdceefc6d6efc6deefcedee7
cee7efd6e7efd6eff7dee7f7deeff7e7eff7e7f7ffeff7f7eff7fff7f7fff7fffffff7fff7fffffffffffffffffffffff7fffffffffff7fffff7f7ffeff7ffef
eff7eff7ffefeff7e7eff7e7e7f7deeff7e7e7efdee7f7dee7f7d6e7efd6deefcee7efd6e7e7cee7e7d6d6e7ced6e7d6cedecec6e7ceb5e7cebdefd6bdf7debd
ffefb5fff7adffffadfff7adffffadfff7b5ffffb5f7f7bdf7f7b5e7e7a5ceceadc6c6d6efeff7ffffffffffffffffffffffffffffffffffefefef9494946b6b
6b7b84848c9494b5c6bda5adad8494947b8c846b7b7b5a6b63737b7b6b73736b6b6b6b6363736b6b736b6b736b6b6b63636b63636363636363635a63635a6363
5a635a5a6363525a5a52635a525a5a5a5a5a736b6b847b7b5a52525a5252635252635252634a4a6b4a4a6b4a42734a4a6b42396b42396b39397342426b393173
31396b29316331316329316b31316339396b4242846363ad948cdebdbdffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffffffff7efe7bdbdbd9494a57373a573739c6b6ba57373b58484ce
a59cd6adade7bdbdf7dedeffeff7ffeff7fffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffff7f7f7e7e7e7c6cee7cecefff7f7ffffffffffffffffffdedece9c847b845a4aa57363c69c84d6bd9ccec6a5cee7
bdceefc6deefcedeefcee7efd6e7efd6eff7dee7f7deeff7deeff7def7ffeff7ffeff7fff7f7fff7fffff7fffff7fffffffffff7fffffffffff7fffffffffff7
fffff7f7fff7f7fff7f7ffeff7ffefeff7efefffefe7f7e7eff7e7e7efdee7f7dee7f7dee7f7dee7efd6e7efd6deefcee7efd6dee7cedee7ced6e7ced6e7cec6
e7cebde7c6b5dec6b5e7ceb5f7d6b5ffe7adffefb5fff7b5ffffb5ffffb5fff7b5ffffb5ffffb5f7f7b5e7e7a5d6d6a5c6c6cee7e7efffffffffffffffffffff
fffffffffffffff7f7f7b5b5ad7373737b7b7b848484a5adadbdc6c6adbdb57b8c84637b736373736b7b737373737b7373736b6b736b73736b6b6b6b6b636363
6b6b6b63636363636363635a6363635a635a5a635a5a5a5a5a5a5a635a5a8c7b7b7b6b6b63525263524a735a5a6b524a7352526b4a4a6b42426339396b393963
31316331315a2121632931733939844a527b52528c636bbd9494ffdedeffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffff7efef
d6cebd9c9cad8484ad7b7bad7b7bb5848cc69494deadadefc6c6ffdedeffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefffdee7dec6c6ded6d6efefefffffffffffffffffffd6c6bd94736b8c5a
52a57b6bbd9c84c6bd94c6cea5cee7b5d6e7bddeefcedeefcee7f7d6deefd6e7efd6e7efdeeff7deeff7e7eff7efeff7eff7fff7f7f7eff7fff7f7fff7fffff7
fffff7fffff7fffff7fffff7f7ffeff7ffeff7f7eff7ffefeff7e7eff7e7e7f7e7e7f7e7deefdee7efdedeefd6e7f7dedeefd6e7efd6deefcedeefcedee7cede
e7ced6e7c6cedec6cedec6cee7c6c6dec6bddebdb5debdb5e7c6ade7c6adf7d6adf7debdfff7bdfff7bdffffadffffadffffadffffb5f7f7b5efefaddede9cc6
c6b5ded6d6efefeffffff7ffffeff7f7f7fffffffffffffff7cecece7b7b7b7373737b847b949c9ca5b5adb5c6bd9cada5738c8c5a736b6b73736b6b6b6b6b6b
6b6b6b6b6b6b6363636b63636b63636b6363635a5a6b635a635a52635a5a635a52635a526352527b63638c7b73735a5a5a42426342426342426342395a313163
39395a31315a31295229296339397b524a8c6363845a63b58c94f7ced6fffffffffffffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffff7fffffffffff7ffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7ffffeffff7f7fff7f7fffffffffff7fff7f7
fff7f7fff7fffffffffffffffffffffff7fff7f7e7c6c6b58c8c9c7373ad7b7bad8484c69c9cd6b5b5efd6d6ffe7e7fff7f7fffff7ffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7e7e7d6cecee7e7e7eff7f7ffff
fffffff7ffffffcebdb59473638c6352a5846bb5a57bcec69ccecea5d6debdd6e7c6e7efcee7efd6e7f7d6e7efd6eff7deeff7deeff7e7eff7e7f7ffeff7f7ef
f7fff7f7fff7fffff7f7fff7fffff7f7ffeffffff7f7ffeff7fff7f7f7eff7ffefeff7efefffefeff7e7eff7e7e7efdee7efdedeefd6e7f7dee7efd6e7f7dede
efd6e7efd6deefcedeefced6e7c6deefcecee7c6cee7c6cee7bdcee7c6c6e7bdc6e7bdbddeb5bddebdb5debdb5efceb5f7debdffefbdfff7b5ffffadffffadff
ffa5ffffadfff7a5efefa5e7e794cecea5d6cec6efe7def7f7f7fffff7ffffffffffffffffffffffefe7e7a59c9c847b7b7373738c94949cada5adbdbda5c6bd
8ca59c637b736373735a6b6b63736b636b6b636b6b6363636b6b6b6b635a7363636b5a5a735a5a6b5252735a526b524a7352527b5a528c63636b42426b424263
39396339395a39315231295a3931735252846363846b6ba58c84e7c6c6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffff7fffffffffff7fff7e7e7bda5a5a57b7b9c7373b58c8cc6a5a5e7cec6f7dedefff7
f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffef
efe7deded6ceced6d6d6f7f7f7fffffffff7f7fffff7cebdb5846b5a84634a9c8463a5946bcebd94cecea5cedebdd6dec6deefcee7efd6e7f7d6e7efdeeff7e7
e7efdeeff7e7efefe7eff7efeff7eff7fff7eff7eff7f7eff7f7eff7ffeff7f7eff7ffefeff7e7f7f7efeff7e7eff7e7e7f7e7eff7e7e7efdee7efdedeefd6e7
efdedeefd6e7efd6deefd6e7f7d6d6e7ced6efcecee7c6d6efcecee7c6d6e7c6cee7bdcee7bdc6deb5cee7bdcedeb5cedebdc6d6b5c6d6b5bdd6b5b5dec6ade7
ceadf7e7a5ffefa5ffff9cffff9cfff79cfff7a5ffff9cf7efa5efef9ce7de94cec69cc6bdd6efefeffffff7fffffffffffffffffffffff7f7f7c6bdbd948c8c
6b736b73847b7b949494b5ada5c6bd94b5b5739494637b7b4a6363526b635a6b63636b635a5a5a6b5a5a6b5252735252734a4a734a4a7342427342427342428c
52527b42426331315a2929633931734a428c6b63846b6b9c8c84cebdbdfff7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ff
f7f7f7e7e7f7e7e7f7e7e7f7efeff7e7eff7efeff7e7e7f7efe7f7efeffff7f7fffffffffffffffffffffffffffffffffffffffffffff7f7e7cecebda5a5a57b
7ba58484bd9494debdbdf7ded6fff7effffff7ffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7efefe7dedecececee7dedefffff7ffffffffffffffffffcec6b5947b63846b4a9c7b5aad9473bdb594bdc6a5ced6b5d6dec6
e7efcee7efd6eff7deeff7deeff7dee7efdeeff7e7eff7e7f7ffefeff7eff7ffefeff7eff7f7efeff7eff7f7efeff7e7f7f7efeff7e7eff7e7e7f7e7eff7e7e7
f7dee7f7dedeefd6e7f7dedeefd6e7efdedeefd6e7f7dedeefd6deefd6d6e7ced6efcecee7c6d6efcecee7c6d6e7c6cedebdcee7bdcedeb5d6e7b5cedeb5d6de
b5ced6adcedeb5b5d6b5add6bd9cdec69cefde94f7e79cfff79cffff9cffff94fff7a5ffffa5ffff9cf7ef9ce7dea5d6ce9cc6bdc6e7e7def7efffffffffffff
ffffffffffffffffffdededeadada5737b7b637b73738c8484ada594bdb594bdbd84ada56b8c84526b635a63635a635a635a5a6352526b52526b4a4a73424273
39397339396b31317339397b42428c524a8c5a5a9c736ba58484d6bdbdffe7e7fffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffff
fff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7f7f7efe7e7f7efefef
e7e7f7efeff7e7e7f7dee7efd6d6e7ced6dececee7ced6e7cecee7cecee7cecef7d6dee7ceceefced6f7d6deffe7efefe7e7efefefeff7f7ffffffffffffffff
fffffffffffffff7e7e7d6bdbdad8c84a5847bbd9c94e7c6bdf7ded6fff7efffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefe7ded6d6cec6c6efe7e7f7f7effffffffffff7fffff7d6c6b5947b6b846b528c735a
a58c73b5ad8cc6bd9cd6d6b5d6debddee7cedeefcee7f7dedeefd6e7f7dee7efdee7f7dee7efdef7f7e7f7f7e7f7f7e7e7efdee7f7e7e7f7e7eff7e7e7f7dee7
f7e7e7f7dee7f7dedeefdee7f7dedeefd6deefd6d6efd6deefd6deefd6deefd6deefd6e7efd6d6e7ced6e7cecee7c6d6e7c6cee7c6d6e7c6cedebdd6e7bdcede
b5d6deb5ced6adcedeb5ced6add6deadc6d6a5bdd6adadcea5a5d6ad94d6b594debd9cefd6a5ffe7a5fff7adffff9cffff94f7f794f7f7a5ffff9cefe794d6ce
8cc6c6a5d6d6ceefefe7f7f7efffffffffffffffffffffffeff7efc6cece848c8c6373735a736b738c8c84a59c9cbdb594a5a57b848463635a635252634a4a63
42426339396b39396329296b31317b42429c6363a57373ad948cceb5b5ffe7e7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7fffff7ffffeffffff7fffff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefefefefe7e7e7efe7e7e7dedee7
dededed6d6ded6d6dececeded6d6ded6d6e7dedee7d6d6efdedeefdedef7e7e7f7e7e7ffe7e7f7dee7ffefefffe7e7f7e7e7efd6deefd6dee7ced6e7ceced6ce
ceded6d6dededeefefeff7f7f7ffffffffffffffffffffefefe7cec6b5948cb58484c69494efc6c6ffdedefff7f7ffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efe7e7e7deded6cecee7e7defff7f7ffffffffffff
ffffffe7d6cead948c7b63528c6b5aa5846bbda58cceb59cd6ceadd6d6bddee7cedeefcedeefd6e7f7deefffe7e7f7deeff7deeff7def7ffe7eff7dee7f7dede
f7dee7f7dedef7dee7f7dedef7dee7f7dedef7d6def7dedeefd6def7d6d6efd6deefd6d6efcedeefd6d6e7cee7efdedeefd6deefd6d6deced6e7ced6e7c6d6e7
c6cedebdd6e7bdcedebdcee7bdcedeb5cedeb5c6deadcedeadc6dea5c6dea5bdd69cbddea5b5d6a5add6a59ccea59cd6b59cdebdadf7deadffefadffff9cffff
9cffff94ffff9cffff94f7ef94e7e78cd6ce94ceceadd6d6ceefefe7f7f7ffffffffffffffffffffffffefefe7b5b5b58c8c8c6b736b6b7b73848c849494949c
8c8c8c73737352526339395a29317b4a4a946363ad7b7bb58c94ceb5b5efd6d6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7eff7efefefe7e7efe7e7e7d6dee7d6d6de
ceceded6d6deced6e7d6d6e7d6d6efe7e7f7e7e7ffefeff7efeffff7f7f7f7f7fff7f7fff7f7fffffffffff7fffffffffff7fffffffffffffffffffff7f7ffff
f7fff7effff7f7ffefefffe7e7efdededed6d6d6cecedededeefefeffffffffffffffffffffff7f7efd6d6bd8c94b58484d6adadf7d6d6ffefefffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efe7e7e7ded6
dececeefe7defff7f7fffffffff7f7ffffffefe7dec6ada5946b5a946b529c735ab5947bc6a58cd6c6add6ceb5dedebdd6dec6deefcee7f7d6efffdee7f7dee7
f7dee7f7deeff7dee7efd6e7f7dee7efd6e7efd6e7efd6e7f7d6e7efd6e7efd6deefcee7efd6deefcedeefcedee7cedeefced6e7c6d6e7ced6e7cedeefd6d6e7
ced6e7cecedec6cee7c6cedebdcedebdc6deb5cedebdc6deb5c6deb5c6deadc6deadbddeadbddea5b5de9cb5dea5b5d69cb5d69cadd69ca5d69c9cce9c94d6a5
8ccead94e7c69cefdea5fff7a5ffffa5ffff9cfff7a5fff7a5efef9ce7de94cece9cc6c6a5c6c6c6d6d6e7efefffffffffffffffffffffffffffffffe7dedebd
b5b58c84846b635a6b5a52846b6b8c6b739c7b7bad8484b59c9cc6adade7d6d6ffefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefefe7e7dededededededed6d6ded6d6dececede
ced6d6cecee7d6d6efdedef7efeff7efefffeff7f7efeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7efefe7dedecec6c6cecec6e7dedefff7f7fffffffffffffff7f7efcecead848cbd949c
debdbdf7e7e7fff7f7ffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7f7e7e7e7ded6dececeefe7defff7f7fffffffffff7fffffffffff7e7c6bdb58c7b946352946352ad8473bd9484cead9cdec6ade7d6bdde
d6bddedec6dee7cedef7d6def7d6deffdee7f7deeff7deefefd6eff7dee7efd6efefd6e7efd6efefd6e7efceefefd6e7efcee7efcedee7cee7efcedee7c6dee7
ced6e7c6cee7cecee7cedeefd6d6efcecee7c6c6debdcee7c6c6debdcee7bdc6deb5c6e7b5c6deadc6e7b5bddeadbddeadb5dea5b5deadadd6a5b5dea5add69c
add69ca5d694a5d69c9cce9494ce9c84c69c8cd6b594e7c6adf7deadffefb5ffefadefe7b5efe7ade7deb5ded6a5c6bd9cadad949c9cadadadcec6c6fff7f7ff
ffffffffffffffffffffffffffffe7dedebdadadbdadadc6b5b5d6c6c6e7d6d6fff7f7fffffffffffffffffffffffffffffff7fffff7ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efefefe7e7ded6d6e7dedee7d6d6e7d6d6dececeded6d6de
d6d6e7dedeefe7e7f7efeff7efeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffff7f7efe7e7d6cececebdbdded6cefff7f7ffffff
fffffffff7f7ceb5b5b59494d6b5b5efd6defff7f7ffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffff7fffffffffffffffff7f7efefe7ded6d6c6c6efdedefff7effffffffffffffff7f7fff7efefded6cea59ca573638c524a9c
6b5ab58473c69c8cd6b5a5dec6add6c6add6d6bdcedebdd6efcecee7ced6efcee7efd6eff7d6e7efd6e7efd6dee7cedeefcedeefcedeefcedeefcedeefcedeef
cedeefced6e7c6d6e7c6cee7c6d6e7c6c6debdcee7c6d6efced6efcec6debdc6debdc6e7bdc6e7b5bddeadc6deb5bddeadc6deadbddeadbddeadb5d6adb5d6ad
adcea5b5d6a5adce9cb5d69cadce94adce94a5c68cadce8ca5c68c9cc6948cbd8c94bd9494c69ca5d6b5addeceadded6a5cec6a5c6bd9cb5ad9cada59494948c
8484736b6b7b737394848cd6cecefff7f7fffffffff7f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7ff
fff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7e7d6cecebdb5b5cec6c6ded6d6e7dededeced6ded6d6e7d6d6ef
e7e7f7e7e7f7e7eff7e7e7fff7f7fff7f7fffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffefefefdede
c6b5b5c6b5b5e7dedefffffffffffffffffff7e7e7b59c9cbda5a5e7d6d6efe7efffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7eff7e7e7dececedececeefe7e7fffffffffff7ffffffff
fff7fff7efe7d6cece9c94946352945a52ad7363ad7b6bbd9484d6b59ccebda5ceceb5ced6b5d6dec6d6dec6deefcedeefcee7f7d6deefcedeefcedeefcedef7
ced6efced6efced6efc6d6efced6efc6d6efc6cee7bdcee7c6cee7c6cee7bdcee7bddeefced6efc6d6efbdcee7b5cee7bdc6deb5c6e7b5c6deadc6deadc6dead
c6deadbdd6a5bdd6adb5cea5bdcea5b5ce9cbdce9cbdce94bdce94bdc68cbdc68cb5bd84b5bd84adb57ba5b57b94a57394a573849c738ca59494a5a59cada58c
9c948c8c8c7b7b7b7b736b6b63637b6b739c8c94c6b5b5e7dee7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefe7e7bdadad948c8c847b7b948484948484ad9c9ccebdbdefdedef7
e7e7ffefefffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffff
fffffffff7f7fff7f7ffe7e7dec6c6b59c9cd6cecefffffff7fff7fff7f7ffffffb5a5a5bda5a5dececef7efefffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fff7efefdeded6cec6e7
d6d6f7e7e7fffffff7fff7fffffffffffffffff7ffefe7e7d6cebd948c84524a9463529c6b5aa57363bd9484c6a58cc6ad9cceb5a5d6ceb5ceceb5d6debdd6de
c6dee7c6d6e7c6dee7c6d6e7c6d6e7c6cee7c6d6efc6cee7c6ceefc6cee7bdcee7bdc6deb5cedebdcedeb5d6e7bdcedeb5d6e7bdd6e7bdd6e7bdcedeadcedeb5
c6d6adcedeadc6d6a5c6d6a5bdce9cc6d6a5bdc69cc6c6a5bdbd9cc6bd94bdb58cc6b58cbdb584bdb57bbdad7bbda573ad9463a5945a9c84529c845a8c7b4a7b
73526b6b52636b5a5a5a52635a5a7b736bada5a5cebdbdd6c6c6d6ceceefe7effff7f7fffffffffffffff7fffffffffffffff7fffff7ffffeffff7efffffefff
fff7ffffeffff7f7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffff7fffffffffffffffffffffffffffffffffffffffffff7fffff7f7ffffffded6d6b5adad8c8484847b7b7b6b6b635a5a4a42425a4a4a847373bd
adade7d6defff7f7fff7f7fff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffeffffff7ffffffffffffffffffeff7ffdee7d6b5b5ad9494cec6bdfffffff7fff7ffffffffffffbda5a5bd9c9ce7ced6efe7e7ffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffff7efeff7efe7ded6ceded6ceefe7e7fffffffffffffffffffffff7fffffffffffffff7efdecec6deada59c6b5a7b4a42946352b57b73ad7b6bbd8c
7bbd9c8cbdad94bdbd9cceceadceceadd6d6b5d6d6b5d6d6bdd6debddee7c6dee7bddee7c6d6e7bdd6e7bdcedeb5d6debdced6addedeb5d6d6b5d6d6add6d6b5
dee7bdd6deb5d6d6adcecea5cecea5c6c69cc6ce9cbdc694bdc694bdbd94c6bd94bdad8cc6ad8cbda584bd9c7bb59473b5946bad8c63ad845aa57b529c7b5294
6b428c6b42845a317b5a316b5231948473ada59cd6cec6cecec6e7ded6f7efe7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7fffffffffff7fffff7ffffeffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffe7dedea59c9c8c7b7b84737b736b6b5a52525242424a424252424252
4a4a6b63639c9494ded6d6f7efefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffff7ffffeffffff7fffffffffffff7f7ffe7e7f7c6ced6adadbd9c9cded6d6ffffffffffffffffffffffffc6adadc6a5a5e7
cecef7efefffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7f7efefe7ded6d6d6d6d6dededeeff7f7f7fffffffffffffffffffffffffffffffffffff7efefded6d6b5
a5b58c7b945a528c524a945a4aa56b63a57b63ad8c73bd9484c6a58cc6a58ccead9cd6b59cd6bda5d6b59cd6bda5d6c6a5deceaddec6addeceaddeceadd6c6a5
cebd9cd6c6a5cebd9cd6c6a5cebd9cd6c6a5cebd9ccebd9cbdb58cbdad8cb5a57bb5a57bad9c73ada57bad9473ad8c73a5846ba584639c7352946b528c63428c
63427b52317b5231845a399c735abd947be7bda5deceb5ded6c6efe7defff7effffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffe7e7e7b5adad847b7b7b73736352525a5252524a4a4a42424a424242
39394242425a52525a5252736b6bada5a5e7dedefffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffefefffe7e7ffced6efb5b5bd8c8cc6a5a5f7e7e7fffffffffff7ff
ffffffffffceb5b5c6a5a5e7d6d6f7efefffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efefe7deded6ced6dededefffffffffffffffffff7ffffffff
fffffffffffff7fffff7fffff7f7efdeefd6c6e7ada5ce8c84a56b5a8452428c524a9c6b5aa57363ad7b6bad7b6bb58473bd8c7bc69484bd947bce9c84c69c84
cea58ccea58ccead94cead94ceb594c6ad8cc6ad8cc6a58cc6a58cbda584bda5849c846ba58c6ba58c6ba58c6b9c8463947b5a846b4a846b4a7b63427b5a4273
52317b523984634aad8473bd9c84e7c6b5e7cebdefdeceefe7d6fff7effffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefc6b5b59c8c847363636b635a5242425a4a4a5a5252524a4a4a
4242524a4a423939524a4a4a42424a4a4a5a5a5a8c8484bdbdbdefefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7fffffffffff7fffffffffffffffffffffffffffffffffff7fffffffffffffffffffffff7fffffffffff7efefffefefffd6d6e7adb5ce8c94c69494d6
bdbdffffffffffffffffffffffffffffffceadb5d6adadefd6d6fff7f7ffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7f7e7d6dee7ced6e7d6
d6f7e7e7fff7f7fffffff7fffff7fffff7fffffffffffffffffffffffffff7fffff7ffe7e7f7ded6efd6cedeada5ad7b7394635a84524a8c5a52845a4a8c6352
8c635294635a9463529c6b5a9c6b5aa573639c73639c736394735a94736394735a94736394735a9c7b6394735a9c73638463527b5a426b4a3973524284634a94
7b639c846bb59c8cc6b59ce7d6bde7deceefefdef7efe7fff7e7ffefe7fffff7fffffffffffffffffffffffff7f7ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffff7fffffffffffffffffffffffffffff7fffff7f7fffffffffffffffffffff7ffefd6d6c69ca5ad8c8c845a5a6b42426b4242634a4a5a424252
42424a39394a42424239394a42424a4242524a4a4a42425a52526b6b6ba59c9cd6d6cef7f7f7ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efe7deefdedee7c6c6de
b5b5bd8c8cb57b84d6b5bdfff7f7fffffffffffffffffffffffffff7f7d6b5b5d6adb5f7dedef7efefffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7ffffffffffe7efefced6dec6ceefe7e7fff7f7fffffff7fffff7fffff7fffffffffff7fff7fffffffffffffffffffffffffffffffffff7fff7eff7efe7
f7efe7f7decee7c6bdbd9c94b59484a5847b9c7b6b8c6b5a8c635a7b5a4a7b5a4a845a5284635a8463528c6b5a8c6b5a94736b94736ba58473b58c84cead9cde
bdb5f7decef7e7def7f7e7f7efe7fff7e7fff7effffff7ffffeffffff7fffff7fffffffffffffffffffffffffffffff7fffffffffff7fffff7ffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffdee7b5949c734a5273424a6b393963313963
31316b39395221295239395242425a4a4a524242635252524a4a5242424a4242635a5a847b7bc6bdbdefefefffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7f7e7e7ef
dedeefd6d6d6bdbdc6a5a59c737bad7b84debdbdfff7f7fffff7fffffffffffffffffffffffff7e7e7d6adade7c6c6f7e7e7fff7ffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7ffffe7efefdededec6ceded6d6efe7e7fffffffffffffffffff7ffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffeffffff7fff7effffff7fff7effffff7f7f7effff7eff7f7effff7eff7f7effff7eff7f7effff7eff7f7efff
f7f7fff7effffff7fff7f7fffff7fffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffefffffefffffe7ff
ffefffffeffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffeffffff7ffff
f7fffff7fffff7fffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffe7ffffe7ffffeffffff7ffffeff7fff7f7fffffffffffffffff7f7f7
e7e7c6a5a57b52524a21295229215a29296b42425231315a42425a42425239424a3139524242635252847373a59c9ce7d6d6fff7f7ffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefefff
efefffdedef7dedeefcecee7bdbdbd949cad8c8c8c6b6bad8c8cefced6fff7f7fff7f7fffffffffffffffffffff7f7ffffffc6b5b5d6b5b5efd6d6ffefeffff7
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffeff7f7e7e7ded6d6e7d6d6ded6d6ffffffffffffffffffffffff
fffffff7fffffffffff7fffffffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7fffff7fffff7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffff7fffff7fffff7fffff7fffff7fffffffffff7ffffffffffeffffff7ffffefffffe7ffffd6ffffbdefe78cc6bd7bb5b594d6ceb5f7f7ceffffe7ffffe7
fffff7fffffffffffffffffffffffffffffffff7fff7efbda5a56b524a4229215231314a29294a29314a31315a39426b5252947b7bb59c9cf7dee7ffeff7ffff
fffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ff
f7effff7efffdedeffd6d6f7ceceffd6cee7b5b5ce9c94ad7b7bad7b7b9c6b6bceadb5fff7f7fffffffffffffffffffffffffffffffffffffffffff7efefceb5
b5d6bdbdffe7e7fff7f7ffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7efdedee7c6ce
dec6cef7dee7fff7fffffffffffffffffffff7fffffffffff7fffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffe7f7f7e7ffffc6efef94d6ce73bdb563c6b55ac6bd63d6ce6bdece73
e7de73d6ce7bded694e7debdfff7ceffffdeffffe7fffff7ffffeffff7fffffffffffffffffff7fff7ffffffc6adad8c6b6b6342426b424a6b4a4a947373c6a5
a5e7c6ceefced6e7cecee7ced6ffe7efffe7e7f7e7e7f7e7e7fff7f7ffefeffff7f7fff7f7fff7f7fff7f7fffffffff7f7fffffffff7f7fffffffff7f7ffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7f7fffffffff7effff7effff7efff
f7eff7e7def7e7def7d6d6f7d6d6e7c6bde7bdbdd6a5a5ce9c94b57b7bad7373a56b6bad7373dea5adffeff7fffffffffffffffffff7ffffeffff7f7fff7ffff
ffffffffffefefd6c6c6d6bdbdefdedeffefefffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffff
fffffffffffffff7ffffefeff7d6dee7ceceefd6def7e7efffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7fff7e7f7f7b5d6ce8cbdbd7bbdb56bc6c663cec663ded663
e7de63f7ef5af7ef63f7f763f7ef6bf7ef6befef7bf7ef7befe784efe78cefe7b5fff7c6ffffd6ffffdeffffe7ffffeffffff7fffff7fffffffffffff7f7fff7
f7ffeff7dec6c6b5949cbd9ca5b59c9cc6a5adc6adb5ceb5bdceb5bddec6c6dececee7ced6e7cecef7dedeefded6f7dedef7dedef7e7e7f7dedeffe7e7f7e7de
ffefe7ffe7e7ffefefffefe7ffefefffefeffff7f7fff7f7fff7f7fff7f7fff7f7fff7f7fff7f7fff7f7fff7f7ffefeffff7f7ffefefffefeff7e7e7f7efeff7
e7e7ffe7deffded6ffded6f7ceceefcec6e7bdb5deb5b5d6ada5bd9494bd8c8cb584849c6b6b9c6b6bb58c84ffceceffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7f7f7ded6d6bdadade7d6d6fff7f7ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffefefffefefefdedee7ced6dececeefdee7fff7f7ffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fff7fffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffefffffeff7f7def7f7def7efcec6c69c848c6b7b9c848cc6ad84dec673dece63
e7d65aefe75af7f74aeff74af7ff4af7ff52ffff52f7ff5affff5affff63ffff5affff5affff5af7f763f7f763efe773efe78cefefadf7f7c6f7ffdeffffe7ff
fff7ffffffffffffffffffffffffffffffffffffffffffeff7ffefefd6c6c6c6adb5ad949cad9c9cb59c9cbda5adb59ca5bda5a5c6a5a5d6adadd6adaddeb5b5
d6adadd6adadd6adaddeb5b5deb5b5efbdbdefbdc6efc6c6efbdbdf7cecef7cecef7d6d6efd6cef7ded6f7d6d6f7ded6f7d6cef7ded6f7d6ceefd6cee7cec6ef
cec6e7c6c6e7c6c6d6bdb5debdb5e7adadefadadefa5a5e79ca5ce8c8cbd8484ad7373ad7b7b9c6b6b946b6b9c7b7bd6bdbdffefefffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffefe7efdecececec6c6e7dedef7e7effff7f7ffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7e7e7efdedee7ced6e7d6d6efdedefff7f7ff
fff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7ffe7f7f7deefefd6e7e7c6bdbd9c9c9c738c8c5a8c8c52737b42738c5273
a57373bd8c6bcea57bf7d66bf7de6bfff763ffff52ffff4affff4affff4affff52ffff4affff52ffff52ffff52ffff4affff52ffff52ffff63ffff6bfff77bf7
f78ce7e7a5e7e7bde7efd6f7ffeff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7e7e7d6c6c6bdadadad9494
b58c8cb58484b58c8cad8484b58484b58484bd8c8cb58484b58c84bd8c84bd8c8cbd8c8cc69494c69494ce9c9cd6a5a5deada5d6a5a5deada5d6a5a5deada5d6
a5a5deada5cea59ccea59cc69c94c69c94bd8c8cbd8c84b58484c68484c67b84bd7b84ad7373ad7373ad737bbd8c8cbd9494ffe7e7ffefefffffffffffffffff
fffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffefdee7dececed6c6c6e7d6def7efefffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffefeff7
e7e7e7d6d6decececececee7dedeefefefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7f7ffe7f7f7e7e7efd6dee7c6c6cea5adb58c8c9c6b7b8c5a737b4a7b84527b8c527b
8c4a738c42849c5284ad6384b57363a56352a56b5ac68c84f7ce73ffd66bffe763ffef63ffff52ffff52ffff42ffff4affff4affff4affff4affff4affff4aff
ff5affff63ffff7bffff8cf7f79cf7f7adeff7c6f7f7ceeff7deeff7efefeff7f7f7f7efeffff7f7fff7ffffffffffffffffffffffffffffffffffffffffffff
fff7fffffffffff7fffff7f7ffefefffe7e7e7ceced6bdb5bd9c9ca58c8c94737394737394736b9c737394736b9c73739c7373a57b7ba57b7bbd7b7bbd7b7bbd
7b7bb57373bd7b7bb57b73bd7b7bbd7b7bc68484bd7b7bbd7b7bb57373ad7373a56b6ba57373a57373ad8c8cbda5a5dec6c6efd6d6ffefeffffff7ffffffffff
f7fffffffffffffffffff7fff7fffffffffffffffffffffffffffffffffffffffffffff7fff7efefded6d6cec6c6d6c6ceefdee7ffefefffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffff7f7f7e7efefe7e7ded6d6ded6d6d6d6d6e7e7def7efefffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffeff7f7dee7efcedeefc6cedeb5c6d6a5a5b584849c636b844a73844a738c4a7b945273
8c4a7b944a7b944a7b9c52739c4a84b55a8cbd6b8cc66b7bb55a73ad5a5aa55252a55a52b5736bd69c7bf7c67bffe76bffe75affef52fff75affff52ffff52ff
ff52ffff52ffff52ffff63ffff6bfff77bffff8cffffadffffbdffffd6ffffe7ffffefffffeff7fff7f7fff7f7f7f7f7f7f7eff7fff7f7fff7f7fffffffff7ff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffefe7f7dedee7cecedec6c6d6
bdb5d6b5b5d6adaddeb5add6adadd6adadd6a5a5d6adadd6adaddeadaddeadade7bdbdefbdbdffceceffded6ffefeffff7f7ffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7fffffffffffffffffff7efefe7d6decebdc6dececee7dedef7efeffff7ff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7efe7e7e7dededed6d6e7d6d6e7d6d6efe7e7efe7e7f7efeff7f7
f7fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7fffffffffffffffffffffff7fffffffffff7fffff7efefdee7e7d6d6deced6dec6c6ceb5bdcea59cb57b8cad6b73944a6b8c426b844273944a73944a73
9c4a739c4a7b9c4a7394427b9c4a7ba54a84ad527bad527bb55a7bbd5a84c6637bb55273ad4a7bad527bb55a639c4a5a9c4a52ad636bce8c73efb57bffde73ff
e76bffef5affef63ffff5afff763ffff6bfff773ffff84ffff94ffff9cffffb5ffffc6ffffd6ffffe7fffff7fffff7ffffffffffffffffffffffffffffffffff
f7f7f7f7f7f7f7efeff7efefffeff7fff7f7ffeff7fff7fffff7fffffffffffffffffffffffffffffffffffff7fffff7fffff7ffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffffffffffffffffffffff7fffffffffff7ffffffffffffffffffffff
fffffffff7fffff7fffff7fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7eff7f7f7e7deded6ceced6c6c6e7dede
efe7e7f7efeffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7efe7e7efe7
e7ded6d6d6ceced6cecee7dedeefdedeefe7e7e7dedee7e7e7f7efeffffff7fffff7fffffffffffffffffffffff7fffff7fffff7fffffffffff7fffffffffff7
fffff7ffffeffffff7ffffefffffe7efefd6efefd6dedebdd6d6bdced6b5d6deb5c6cea5adbd8c849c6b738c5a6b7b4a6b844a6b84427b9c5284ad5a8cb5637b
a55273a54a73a5427bad527ba54a7bad4a7bad4a84ad527ba54a7bad4a7bad4a84b55284c6637bc66373b5527bb55273a5427bad4a84ad4a84ad4a84b55a7bb5
636bb57363c68c63d69c6befbd73ffd67bfff77bfff78cffff8cffff9cffffa5ffffb5ffffbdffffceffffdeffffefffffefffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffff7f7fff7f7f7e7eff7e7e7efe7e7f7efeff7e7eff7efeff7efeff7f7f7fffff7ffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffff7fff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7efeff7efe7efe7e7e7deded6cece
d6cecee7dedeffefefffeff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffff7f7fff7f7f7efeff7e7e7e7dedee7d6d6cec6c6c6bdbdb5adadd6d6c6d6d6bdd6d6bdd6d6bddedec6d6d6bdd6d6bdceceadd6d6b5
d6d6b5dedebdd6d6b5d6deb5ced6adced6adced6a5cece9cbdc68cb5bd849cad7384945a6b7b426b7b396b8439738c427394427b9c527b9c4a7ba54a739c4a73
a54a73a54284bd5a84bd5a7bad4a6b9c3973a54273ad4a7bad4a73ad427bad4a73ad4a7bad4a7bad4a84bd5a8cbd6384bd6363ad4a6bad4a73ad4a7ba54a7ba5
429cbd5a94b55a9cbd6b8cb5637bb57363ad6b52a57b52b58c7bdebd94f7e7adffffb5ffffbdffffceffffd6ffffdeffffefffffefffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7ffeff7efe7e7efdededececed6ceced6d6d6e7
e7e7efefe7efefe7efe7e7efefe7efefe7fff7f7fffff7fffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7f7efefe7e7f7efe7f7e7e7e7d6d6
d6c6c6d6c6c6dececeefe7e7f7efeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fff7f7f7efeff7efe7e7e7d6dedec6c6c6adbdbd9cadad8c
a5a5849494738c946b8c946b94946b8c946394946b8c9463949c6b84945a8494527b8c4a849452849c5294ad638cad5a8cad5a8cad5284ad527ba54a7ba54a73
a5427bad4273a5427bad4a7bad4a7bb5528cbd5a94c6637bb5527bad4a73ad4a7bb55273ad4a7bad5273a54a7bad5284b55a94c66b8cbd6384bd6373ad5a73a5
5a7bad638cbd6b8cb56394bd639cbd6ba5c6739cbd7394b57384a56b84b5848cbd9c9cd6bda5decebdefe7d6ffffdeffffe7fffff7fffff7ffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
f7f7fff7f7f7efefefefefe7e7e7e7e7ded6d6ced6d6ced6ceceded6d6e7dedeefefe7efefe7f7efefefefe7f7efefefefe7f7efeff7e7e7ffefeff7efeffff7
f7fff7f7fffffffff7fffffffffffffffffffffffffffffffffff7fffffffffff7f7fff7f7f7efefffefeff7e7e7f7e7e7efe7e7f7efeff7e7e7ffe7e7e7d6d6
dec6c6dec6c6efd6d6efdedeffe7e7ffefeffff7fffff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7
ffffefffffeff7f7deefefd6dedebdced6b5c6ceadceceadadb58c9ca57b9ca57ba5ad84a5ad84a5b5849cad7394ad6b94ad6394ad638cad5a8cb5638cad6394
bd6384b55a84b55a7bad4a7bad4a73ad4273ad4a73ad4273ad4a73ad4a8cbd638cbd637bb55a73a54a7bad5273a5527bad527bad5a8cbd6b8cbd6b8cbd6b84b5
6384b5637bad638cad7384ad7394b5849cbd84adce8c9cbd7b9cb57394b573b5d694bddea5c6deb5c6debdd6efdee7ffeff7ffffeffffff7fffff7ffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffff7f7fffff7f7f7eff7f7efefefe7efefe7efe7e7e7e7dee7ded6e7dededed6d6e7d6d6dececeded6cedece
cee7cecee7c6ceefced6efd6d6f7dedef7dedeffdee7f7dee7ffefeff7e7e7ffe7efffe7e7ffe7e7f7dedef7dedeefd6d6efd6d6e7c6cee7cecedec6c6e7cece
e7ceceefd6d6efdedef7e7e7f7e7e7ffefefffefeffff7f7fff7f7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffeff7f7e7efefdededec6d6dec6d6d6bdced6b5c6c6a5b5c69cadbd8cadc68c9c
bd7b9cbd7b94b5739cbd7b9cbd7b9cc67b94c6738cbd7384b56384b5637bad5273ad5273a5527bad5a8cb56b8cbd737bad637ba5637bad638cb56b84b56b94bd
7b94c6849cc6848cb57b8cb5738cb5739cbd84a5bd94adbd9cadc69cc6d6b5c6deb5cee7bdc6deb5cee7bddef7d6f7ffe7f7ffefffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fff7f7fff7effff7
f7ffefefffefeff7efefffefeff7e7e7f7e7e7f7e7e7f7e7e7f7e7e7f7e7e7f7dee7f7e7e7efdee7f7e7e7f7dee7f7e7e7f7e7e7f7e7e7efdedef7e7e7f7dee7
ffe7e7f7e7e7ffefefffefefffeff7ffefeffff7f7fff7f7fffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7f7f7efef
f7e7dee7ced6dec6cedebdcedebdc6deb5c6deb5bdd6adb5d6a5adce9cadce9c9cc68c9cc68c8cb57b8cb57b84ad738cad7384ad7394bd8494b58494b57b8cad
7b94b5849cbd8ca5c694adce9cadce9cadce9cbdd6adbddeadc6e7b5c6deb5d6e7c6dedecee7e7d6e7efdef7ffefefffe7efffefeffff7f7fff7f7fff7ffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffefffffe7ffffefffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffff7f7fffffffff7f7fffffffff7f7fffffffffff7fffffffff7f7fff7fffff7f7fffffffff7f7ffffff
fff7f7fffffffff7f7fff7fffff7f7fffffffffffffffffffffffffffffffffffffffffff7fffffffffff7fffff7fffff7ffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffff7ffeffffff7f7fff7f7fff7efffe7efffe7e7efdee7efdedeefd6deefd6d6e7ced6e7cecee7c6cee7c6cee7bdc6de
bdcee7bdd6efc6cee7bdcee7c6cee7c6d6efced6efcedeefd6e7f7d6efffe7efffe7efffe7efffe7f7ffeffffff7fffffffffff7fffffffffffffffffff7ffff
fffffff7fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7ffffef
ffffefffffefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fffff7fffff7fffff7ffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7fff7fffffffffffffffffffffff7ffffffffff
f7fffff7f7fff7fffff7efffe7f7ffeff7ffeffffff7f7fff7fffff7f7fff7fffff7f7fff7fffff7f7ffeffffffffffffffffffff7fff7fffff7fffff7ffffff
fffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffff7fffffffffff7fffff7fffff7fffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffff7ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
fffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffff
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
fffffffffffffffffffffffffffffffffffffffff7fffffffffffffffffffffffffffffffffffffffffffff7ffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000ffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
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
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffff0000ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff0000040000002701ffff030000000000}}}{\b\insrsid13119378 
\par }\pard \qc \fi720\li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp620 \brdrl\brdrtnthtnmg\brdrw60 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid13119378 {\b\insrsid13119378 LICENCE GRANTED UNDER
\par }\pard \qc \li0\ri0\sl360\slmult1\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp620 \brdrl\brdrtnthtnmg\brdrw60 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 
\aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid13119378 {\b\insrsid13119378 
\par THE TANZANIA COMMUNICATONS ACT, 1993 AND THE TANZANIA COMMUNICATION REGULATORY AUTHORITY ACT, 2003
\par 
\par BY THE TANZANIA COMMUNICATIONS REGULATORY AUTHORITY
\par 
\par 
\par TO
\par 
\par 
\par }{\b\insrsid6443863 <?php echo $name; ?>}{\b\insrsid13119378 
\par }{\b\insrsid11487367 
\par }{\b\insrsid13119378 FOR
\par 
\par 
\par THE PROVISION OF NATIONAL APPLICATION SERVICES
\par  IN THE UNITED REPUBLIC OF TANZANIA
\par 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp620 \brdrl\brdrtnthtnmg\brdrw60 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid13119378 {
\insrsid13119378 
\par 
\par 
\par }\pard \ql \fi720\li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp620 \brdrl\brdrtnthtnmg\brdrw60 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid13119378 {
\b\insrsid13119378                                DATE: }{\b\insrsid6443863 <?php echo $issue_date; ?>}{\b\insrsid13119378 
\par }\pard \ql \li0\ri0\widctlpar\brdrt\brdrtnthtnmg\brdrw60\brsp620 \brdrl\brdrtnthtnmg\brdrw60 \brdrb\brdrtnthtnmg\brdrw60\brsp40 \brdrr\brdrtnthtnmg\brdrw60\brsp80 \aspalpha\aspnum\faauto\adjustright\rin0\lin0\rtlgutter\itap0\pararsid13119378 {
\b\insrsid13119378 
\par 
\par 
\par 
\par }\pard\plain \s16\qj \li0\ri0\sl440\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid13119378 
LICENCE GRANTED BY TANZANIA COMMUNICATIONS REGULATORY AUTHORITY TO }{\b\fs28\insrsid6443863 <?php echo $name; ?>}{\b\fs24\insrsid13119378  FOR PROVISION OF NATIONAL APPLICATION SERVICES IN THE UNITED REPUBLIC OF TANZANIA
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid13119378 
\par 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 1.0\tab}}\pard \qj \fi-120\li120\ri0\sl360\slmult0\widctlpar\jclisttab\tx0\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin120\itap0\pararsid13119378 {
\b\ul\insrsid13119378 DEFINITION
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }\pard\plain \s16\qj \li720\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid13119378 
In this licence, unless stated otherwise or the context otherwise requires: 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s16\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 1.1.\tab }{\b\fs24\insrsid13119378 \'93Acts\'94 }{\fs24\insrsid13119378 
means the Tanzania Communications Regulatory Authority Act No.12 of 2003 and the Tanzania Communications Act No.18 of 1993;
\par 
\par 1.2.\tab \'93}{\b\fs24\insrsid13119378 Application Services}{\fs24\insrsid13119378 \'94 means the reselling of electronic communication services to end users;
\par }\pard \s16\qj \fi-1560\li1560\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1560\itap0\pararsid13119378 {\fs24\insrsid13119378  
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 1.3}{\b\fs24\insrsid13119378 \tab \'93Authority\'94}{\fs24\insrsid13119378  means the Tanz
ania Communications Regulatory Authority;
\par 
\par 1.4.\tab }{\b\fs24\insrsid13119378 \'93Licence\'94 }{\fs24\insrsid13119378 means authority to provide application services;}{\fs24\ul\insrsid13119378 
\par }\pard \s16\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 1.5\tab}}\pard \s16\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls9\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {
\b\fs24\insrsid13119378 \'93Licensee\'94}{\fs24\insrsid13119378  means }{\b\fs24\insrsid6443863 <?php echo $name; ?>}{\b\fs24\insrsid13119378 
\par }\pard \s16\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\fs24\insrsid13119378 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 2.0\tab}}\pard\plain \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin720\itap0\pararsid13119378 
\f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\ul\insrsid13119378  SCOPE OF THE LICENCE}{\b\ul\insrsid13119378\charrsid2449985 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 2.1\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {
\insrsid13119378 In accordance with Section 6 of the Tanzania Communications Regulatory Authority Act, 2003 and Section 11 of the Tanzania Communications Act, 1993, the Authority hereby grants a licence to }{\b\insrsid6443863 <?php echo $name; ?>}{\insrsid13119378  }{
\cf1\insrsid13119378 to provide National Application Services in the United Republic of Tanzania.}{\insrsid13119378 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 2.2\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {
\insrsid13119378 The Licensee is authorized to operate in the United Republic of Tanzania and provide National Application services as contained in}{\cf1\insrsid13119378  }{\b\cf1\insrsid13119378 Appendix I }{\b\insrsid13119378 - Roll out Plan \endash 
 National Application Services.}{\insrsid13119378 
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 2.3\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {
\insrsid13119378 The Licensee shall be required to submit annually to the Authority updated roll out plans on the provision of its services provided in terms of this licence.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 3.0\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\adjustright\rin0\lin720\itap0\pararsid13119378 {
\b\ul\insrsid13119378 DURATION AND RENEWAL OF THE LICENCE
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\cf1\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 3.1\tab}}\pard \qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls1\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {
\cf1\insrsid13119378 This Licence is granted on }{\b\cf1\insrsid6443863 <?php echo $effective_date; ?>}{\cf1\insrsid13119378  (the E}{\cf1\insrsid6443863 ffective Date) for a period of <?php echo $duration;?>}{\cf1\insrsid13119378  years (\'93the licence period\'94
) renewable up to a total of 25 years.
\par }\pard\plain \s21\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 \f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\cf1\insrsid13119378 
\par }\pard\plain \s22\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cf1\insrsid13119378 3.2\tab 
One year prior to the expiry of the Licence period, the Licensee shall apply to the Authority for the renewal of this Licence.
\par }\pard \s22\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\cf1\insrsid13119378 
\par }\pard \s22\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\cf1\insrsid13119378 3.3\tab The Authority
 shall renew the licence in accordance with the Tanzania Communications Regulatory Authority Act, 2003 on substantially the same terms and conditions as those applicable to the Licensee during the preceding licence period provided that the licensee has no
t been in material breach of the Licence conditions.
\par }\pard \s22\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\cf1\insrsid13119378  
\par {\listtext\pard\plain\s22 \f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 3.4\tab}}\pard \s22\qj \fi-720\li720\ri0\widctlpar\jclisttab\tx720\aspalpha\aspnum\faauto\ls6\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {
\insrsid13119378 The licence shall terminate upon expiry of the licence period if it is not renewed.
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid13119378 
\par }\pard \qj \li0\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\insrsid13119378 4.0    }{\b\ul\insrsid13119378 OWNERSHIP AND CORPORATE OBLIGATION
\par }\pard\plain \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid13119378 
\par }\pard \s16\qj \fi-720\li720\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 4.1 \tab The Licensee\rquote s shareholding structure shall be as contained in }{\b\fs24\insrsid13119378 
Appendix II:  Share holding Structure}{\fs24\insrsid13119378 .
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s16\qj \fi-720\li720\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 4.2\tab The Licensee shall comply with the following conditions on ownership:-
\par }\pard \s16\qj \li720\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 4.2.1\tab}}\pard \s16\qj \fi-720\li1440\ri0\sl260\slmult0
\widctlpar\aspalpha\aspnum\faauto\ls3\ilvl2\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 to notify the Authority in writing of any changes to its ownership and control structure;
\par }\pard \s16\qj \li1440\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 4.2.2\tab}}\pard \s16\qj \fi-1440\li2160\ri0\sl260\slmult0
\widctlpar\aspalpha\aspnum\faauto\ls3\ilvl2\adjustright\rin0\lin2160\itap0\pararsid13119378 {\fs24\insrsid13119378 to notify the Authority of any joint venture into which it enters with
\par }\pard \s16\qj \fi720\li720\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 any:-
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 (a)\tab}}\pard \s16\qj \fi-720\li2160\ri0\sl260\slmult0\widctlpar
\jclisttab\tx2160\aspalpha\aspnum\faauto\ls2\adjustright\rin0\lin2160\itap0\pararsid13119378 {\fs24\insrsid13119378 person; or 
\par }\pard \s16\qj \li1080\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1080\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par {\listtext\pard\plain\s16 \f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 (b)\tab}}\pard \s16\qj \fi-720\li2160\ri0\sl260\slmult0\widctlpar
\jclisttab\tx2160\aspalpha\aspnum\faauto\ls2\adjustright\rin0\lin2160\itap0\pararsid13119378 {\fs24\insrsid13119378 entity holding a licence issued by the Authority.
\par }\pard \s16\qj \li0\ri0\sl260\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid13119378 5.0\tab }{\b\ul\insrsid13119378 LICENCE FEES}{\b\insrsid13119378 

\par }{\cf1\insrsid13119378 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 The Licensee shall in respect of the National Application Services Licence be required to pay the Authority the following:-
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par 5.1\tab Application fee of }{\b\insrsid13119378\charrsid16599735 USD <?php echo number_format($fee->application_fee,2); ?>.
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 5.2\tab Initial licence fee of }{\b\insrsid13119378\charrsid16599735 USD <?php echo number_format($fee->initial_fee,2); ?>;.
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 5.3\tab }{\insrsid13119378\charrsid11617977 <?php echo $annualFee; ?>
\par }\pard\plain \s20\qj \fi-840\li2280\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin2280\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid13119378 
\par {\listtext\pard\plain\s20 \b\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 6.0\tab}}\pard \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\tx2280\aspalpha\aspnum\faauto\ls5\adjustright\rin0\lin720\itap0\pararsid13119378 {\b\fs24\ul\insrsid13119378 AUDITED  ACCOUNTS
\par }\pard \s20\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s20\qj \li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 
The Licensee shall be required to prepare and submit to the Authority audited accounts on an annual basis within ninety (90) days immediately after end of the financial year of the Licensee.}{\fs24\insrsid13119378\charrsid7488377 
\par }\pard \s20\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\fs24\insrsid13119378 
\par 7.0     }{\b\fs24\ul\insrsid13119378 COMPLIANCE WITH THE LAW}{\b\fs24\insrsid13119378 
\par 
\par }\pard \s20\qj \li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 The Licensee shall comply with the provision of the Acts and other laws of the United Republic of Tanzania.
\par }\pard \s20\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378\charrsid10882457 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 8.0\tab}}\pard\plain \qj \fi-720\li720\ri0\sl360\slmult0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls10\adjustright\rin0\lin720\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\ul\insrsid13119378 COMPLIANCE WITH REGULATORY REQUIREMENTS
\par }\pard \qj \li0\ri0\sl360\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\ul\insrsid13119378\charrsid7488377 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 
The Licensee shall comply with all conditions stipulated in this licence and other regulatory requirements provided under Regulations and Rules issued under the Acts.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }{\b\insrsid13119378 9.0    }{\b\ul\insrsid13119378 PROVISION OF APPLICATION SERVICES
\par }\pard\plain \s19\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid13119378 
\par }\pard \s19\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 9.1   The Licensee shall provide application s
ervices in accordance with the applicable recommendations of National and International standards. 
\par }\pard \s19\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378   
\par }\pard \s19\qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 9.2   The Licensee shall not be required to provide application services where in the Authority\rquote 
s view it is not reasonable to require the Licensee to provide the services, including, but not limited to the following circumstances:
\par }\pard \s19\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s19\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 9.2.1  where it is beyond the Licensee\rquote s control;
\par 
\par }\pard \s19\qj \fi-720\li1440\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 
9.2.2 where it would expose any person engaged in provision of the application services to undue risk to health or safety; or
\par }\pard \s19\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s19\qj \fi-720\li1440\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 9.2.3   where it is not reasonably practicable.
\par }\pard \s19\qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid13119378 10.0   }{\b\ul\insrsid13119378 INDEMNITY
\par }\pard\plain \s19\qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid13119378 
\par The Licensee shall indemnify the Authority against any claims or proceedings arising from any breach or failings on the part of the Licensee in relation to this Licence.
\par }\pard\plain \s20\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid13119378 
\par }\pard \s20\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\fs24\insrsid13119378 11.0   }{\b\fs24\ul\insrsid13119378 REQUIREMENT TO PROVIDE INFORMATION}{\b\fs24\insrsid13119378 
\par }{\fs24\insrsid13119378 
\par }\pard \s20\qj \fi-720\li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 11.1\tab 
The Licensee shall be required to maintain financial records in accordance with good accounting practices and shall make the books and records of accounts available for inspection by the Authority.
\par }\pard \s20\qj \li750\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin750\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s20\qj \fi-720\li720\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\insrsid13119378 11.2.\tab The Licens
ee shall be required to submit to the Authority on an annual basis within 90 days immediately after the end of the financial year of the Licensee the following information:-
\par }\pard \s20\qj \li750\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin750\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s20\qj \fi-1440\li1440\ri0\widctlpar\tx720\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 \tab 11.2.1 annual reports;
\par }\pard \s20\qj \fi-720\li1440\ri0\widctlpar\tx720\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s20\qj \fi-1440\li1440\ri0\widctlpar\tx720\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 \tab 11.2.2 audited financial statements;
\par }\pard \s20\qj \fi-720\li1440\ri0\widctlpar\tx720\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 
\par }\pard \s20\qj \fi-1440\li1440\ri0\widctlpar\tx720\tx2520\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\fs24\insrsid13119378 \tab 11.2.3 geographical and population coverage.
\par }\pard \s20\qj \li0\ri0\widctlpar\tx720\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\fs24\ul\insrsid13119378 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\insrsid13119378 12.0  }{\b\ul\insrsid13119378 SAFETY MEASURES
\par }{\insrsid13119378 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 
The Licensee shall in respect of services operated, maintained or offered under this licence take proper and adequate safety measures to safeguard life or property, including exposure to any electrical e
missions or radiations emanating from equipment or installation from such operations.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }{\b\insrsid13119378 13.0  }{\b\ul\insrsid13119378\charrsid13637875 UNIVERSAL S}{\b\ul\insrsid13119378 ERVICE OBLIGATION}{\b\insrsid13119378 
\par }{\insrsid13119378 
\par }\pard \qj \li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 The Licensee shall co
mply with the Universal Service/access obligations as may be provided for under the laws of the United Republic of Tanzania.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }{\b\insrsid13119378 14.0  }{\b\ul\insrsid13119378 HUMAN RESOURCE DEVELOPMENT
\par }{\insrsid13119378 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 14.1 \tab The Licensee shall submit to the Authority the Human Resource Development Plan outlining s
trategies towards   empowerment of its local staff.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 14.2 The Licensee shall annually furnish the Authority the report of  implementation of the Human Resource Development Plan.

\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }\pard \qj \fi-720\li720\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 14.3  The Licensee shall facilitate participation of its technical staff in t
raining within or outside the United Republic of Tanzania.
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\b\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 15.0\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls7\adjustright\rin0\lin720\itap0\pararsid13119378 {\b\ul\insrsid13119378 CONFIDENTIALITY OF CUSTOMER INFORMATION
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }\pard\plain \s21\qj \li720\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 \f35\fs25\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\fs24\insrsid13119378 
The Licensee shall not disclose any information about any of its customers to any third party except to the extent that such information is required:-
\par }\pard\plain \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\insrsid13119378 
\par }\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 15.1\tab for the purposes of debt collection by the Licensee from the customer concerned;
\par }\pard \qj \li720\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 15.2\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls8\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 for statistical or research purpose provided the information is in such a way that it does not link to a particular customer; 
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 15.3\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls8\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 by the Licensee\rquote s auditors for the purpose of auditing the Licensee\rquote s accounts;
\par }\pard \qj \li720\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 15.4\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls8\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 by the Licensee\rquote 
s attorney(s) in connection with any potential, threatened or actual litigation between the Licensee and the customer concerned;
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 15.5\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls8\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 by the Authority for the purpose of performing its functions under the Acts;
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 15.6\tab}}\pard \qj \fi-720\li720\ri0\sl320\slmult0\widctlpar
\jclisttab\tx720\aspalpha\aspnum\faauto\ls8\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {\insrsid13119378 by an order of the court in respect of legal proceedings between the customer and another party pending in court.
\par }\pard \qj \li0\ri0\sl320\slmult0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par {\listtext\pard\plain\s20 \b\f35\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 16.0\tab}}\pard\plain \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\tx2280\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid13119378 \f35\fs26\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\b\fs24\insrsid13119378  }{\b\fs24\ul\insrsid13119378 MODIFICATION OF LICENCE
\par }\pard \s20\qj \li0\ri0\widctlpar\tx1440\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\fs24\ul\insrsid13119378 
\par {\listtext\pard\plain\s20 \f35\cf1\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 16.1\tab}}\pard \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\tx2280\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 Modification of the terms and conditions of this Licence 
together with its Appendices may only be made by written agreement between the Licensee and the Authority.
\par }\pard \s20\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 
\par {\listtext\pard\plain\s20 \f35\cf1\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 16.2\tab}}\pard \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\tx2280\aspalpha\aspnum\faauto\ls4\ilvl1\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 Each party shall give due consideration to the request for an amendment by the other party.}{
\b\fs24\cf1\insrsid13119378\charrsid3556907 
\par }\pard \s20\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\fs24\cf1\insrsid13119378 
\par {\listtext\pard\plain\s20 \b\f35\cf1\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 17.0\tab}}\pard \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\tx2280\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid13119378 {\b\fs24\ul\cf1\insrsid13119378 MAJORITY OW}{\b\fs24\ul\cf1\insrsid13119378\charrsid4478843 NERSHIP
\par }\pard \s20\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 
\par }\pard \s20\qj \li720\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 
The Majority Shareholder of the Licensee shall not transfer, assign any beneficial interest in dispose of or in any manner alienate its share ownership in the Licence for a period of five (5) years after the commencement of the licensed services without t
he prior written consent of the Regulatory Authority.
\par }\pard \s20\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 
\par {\listtext\pard\plain\s20 \b\f35\cf1\lang2057\langfe1033\langnp2057\insrsid13119378 \hich\af35\dbch\af0\loch\f35 18.0\tab}}\pard \s20\qj \fi-720\li720\ri0\widctlpar
\jclisttab\tx720\tx2280\aspalpha\aspnum\faauto\ls4\adjustright\rin0\lin720\itap0\pararsid13119378 {\b\fs24\ul\cf1\insrsid13119378 GUARANTEE OF PERFORMANCE}{\b\fs24\ul\cf1\insrsid13119378\charrsid4478843 
\par }\pard \s20\qj \li0\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 
\par }\pard \s20\qj \li720\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin720\itap0\pararsid13119378 {\fs24\cf1\insrsid13119378 
The majority shareholder hereby guarantees the performance of the Licensee in accordance with the terms and conditions of this Licence, for the duration of the Licence and shall execute a guarantee agreement with the  Authority.}{
\fs24\cf1\insrsid13119378\charrsid3556907 
\par }\pard \s20\qj \li1440\ri0\widctlpar\tx2280\aspalpha\aspnum\faauto\adjustright\rin0\lin1440\itap0\pararsid13119378 {\b\fs24\cf1\insrsid13119378 
\par }\pard\plain \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 \f35\fs24\lang2057\langfe1033\cgrid\langnp2057\langfenp1033 {\cf1\insrsid13119378 
\par }{\b\cf1\insrsid13119378 ISSUED AT }{\b\insrsid13119378 DAR ES SALAAM ON THIS }{\b\insrsid6443863 <?php echo $issue_day; ?> DAY OF <?php echo $issue_month; ?>, <?php echo $issue_year; ?>}{\b\insrsid13119378 
\par 
\par 
\par 
\par \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85.
\par PROF. JOHN S. NKOMA
\par DIRECTOR GENERAL
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\insrsid13119378 TANZANIA COMMUNICATIONS REGULATORY AUTHORITY
\par 
\par 
\par 
\par 
\par \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85.
\par IN THE PRESENCE OF THE SECRETARY TO THE BOARD
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
\par }{\b\insrsid13119378\charrsid7738871 APPENDIX I: }{\b\insrsid11487367 \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85..}{\b\insrsid13119378\charrsid7738871 ROLL OUT PLAN \endash  NATIONAL APPLICATION SERVICES}{
\b\insrsid13119378 
\par }{\b\insrsid13119378\charrsid7738871 
\par }\trowd \irow0\irowband0\ts11\trgaph108\trrh1001\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1872\clshdrawnil \cellx5226
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\b\insrsid13119378\charrsid16610451 Type of Services\cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\b\insrsid13119378\charrsid16610451 Status\cell *}{\b\insrsid13119378 Capacity
\par }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\b\fs18\insrsid13119378\charrsid15742151 Bandwidth  Subscriber}{\b\fs18\insrsid13119378 s}{\b\insrsid13119378\charrsid16610451 \cell Plan/Time Frame\cell 
Area\cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\b\insrsid13119378\charrsid16610451 \trowd \irow0\irowband0\ts11\trgaph108\trrh1001\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 
\trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1872\clshdrawnil \cellx5226
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\row }\trowd \irow1\irowband1\ts11\trgaph108\trrh773\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 Multi-Media
\par 
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 \cell \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\lang1053\langfe1033\langnp1053\insrsid13119378\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {
\fs18\lang1053\langfe1033\langnp1053\insrsid13119378\charrsid16610451 \trowd \irow1\irowband1\ts11\trgaph108\trrh773\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 
\trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 \trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\row }\trowd \irow2\irowband2\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl
\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 VoIP
\par }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid11487367 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell \cell }\pard 
\qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid13119378\charrsid16610451 \trowd \irow2\irowband2\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 
\trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\row }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 Internet
\par }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid11487367 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell \cell }\pard 
\qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {\fs18\insrsid13119378\charrsid16610451 \trowd \irow3\irowband3\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 
\trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 
\trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\row }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 Payphone
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 \cell \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {
\fs18\insrsid13119378\charrsid16610451 \trowd \irow4\irowband4\ts11\trgaph108\trrh890\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 
\trbrdrv\brdrs\brdrw10\brdrcf1 \trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb
\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\row }\trowd \irow5\irowband5\lastrow \ts11\trgaph108\trrh1850\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr
\brdrs\brdrw10\brdrcf1 \trbrdrh\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 \trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt
\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb
\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 Video Conference
\par \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \qr \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {
\fs18\insrsid13119378\charrsid16610451 \cell \cell }\pard \qc \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard 
\ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0\pararsid13119378 {\fs18\insrsid13119378\charrsid16610451 \cell }\pard \ql \li0\ri0\widctlpar\intbl\aspalpha\aspnum\faauto\adjustright\rin0\lin0 {
\fs18\insrsid13119378\charrsid16610451 \trowd \irow5\irowband5\lastrow \ts11\trgaph108\trrh1850\trleft-108\trbrdrt\brdrs\brdrw10\brdrcf1 \trbrdrl\brdrs\brdrw10\brdrcf1 \trbrdrb\brdrs\brdrw10\brdrcf1 \trbrdrr\brdrs\brdrw10\brdrcf1 \trbrdrh
\brdrs\brdrw10\brdrcf1 \trbrdrv\brdrs\brdrw10\brdrcf1 \trftsWidth3\trwWidth9481\trftsWidthB3\trftsWidthA3\trpaddl108\trpaddr108\trpaddfl3\trpaddft3\trpaddfb3\trpaddfr3\tbllkhdrrows\tbllkhdrcols \clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2499\clshdrawnil \cellx2391\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr
\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth963\clshdrawnil \cellx3354\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 
\cltxlrtb\clftsWidth3\clwWidth932\clshdrawnil \cellx4286\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth940\clshdrawnil \cellx5226
\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth1743\clshdrawnil \cellx6969\clvertalt\clbrdrt\brdrs\brdrw10\brdrcf1 \clbrdrl
\brdrs\brdrw10\brdrcf1 \clbrdrb\brdrs\brdrw10\brdrcf1 \clbrdrr\brdrs\brdrw10\brdrcf1 \cltxlrtb\clftsWidth3\clwWidth2404\clshdrawnil \cellx9373\row }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {
\i\fs16\insrsid13119378\charrsid3692134 
\par }{\insrsid13119378 
\par \page 
\par }\pard \qj \fi-2160\li2160\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin2160\itap0\pararsid13119378 {\b\fs32\insrsid13119378 
\par 
\par }\pard \ql \fi-2160\li2160\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin2160\itap0\pararsid13119378 {\b\insrsid13119378 APPENDIX II: \tab }{\b\insrsid11487367 \'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85\'85 }{\b\insrsid13119378 
 SHAREHOLDING STRUCTURE
\par }\pard \qj \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\b\insrsid13119378 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0\pararsid13119378 {\insrsid13119378 
\par }{\lang1036\langfe1033\langnp1036\insrsid13119378\charrsid11098193 
\par }{\lang1036\langfe1033\langnp1036\insrsid13119378\charrsid3635960 
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
\par 
\par 
\par 
\par 
\par 
\par 
\par 
\par }\pard \qj \li0\ri0\widctlpar\faauto\rin0\lin0\itap0\pararsid13119378 {\lang1036\langfe1033\langnp1036\insrsid13119378\charrsid3635960 
\par }{\b\lang1036\langfe1033\langnp1036\insrsid13119378\charrsid3635960 
\par }\pard \ql \li0\ri0\widctlpar\aspalpha\aspnum\faauto\adjustright\rin0\lin0\itap0 {\lang1036\langfe1033\langnp1036\insrsid13119378\charrsid11487367 
\par }}
