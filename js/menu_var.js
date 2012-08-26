/***********************************************************************************
*	(c) Ger Versluis 2000 version 5.411 24 December 2001 (updated Jan 31st, 2003 by Dynamic Drive for Opera7)
*	For info write to menus@burmees.nl		          *
*	You may remove all comments for faster loading	          *		
***********************************************************************************/

	var NoOffFirstLineMenus=9;			// Number of first level items
	var LowBgColor='#dAe4f0';			// Background color when mouse is not over
	var LowSubBgColor='#dAe4f0';			// Background color when mouse is not over on subs
	var HighBgColor='black';			// Background color when mouse is over
	var HighSubBgColor='black';			// Background color when mouse is over on subs
	var FontLowColor='black';			// Font color when mouse is not over
	var FontSubLowColor='black';			// Font color subs when mouse is not over
	var FontHighColor='white';			// Font color when mouse is over
	var FontSubHighColor='white';			// Font color subs when mouse is over
	var BorderColor='white';			// Border color
	var BorderSubColor='white';			// Border color for subs
	var BorderWidth=1;				// Border width
	var BorderBtwnElmnts=1;			// Border between elements 1 or 0
	var FontFamily="arial,comic sans ms,technical"	// Font family menu items
	var FontSize=10;				// Font size menu items
	var FontBold=0;				// Bold menu items 1 or 0
	var FontItalic=0;				// Italic menu items 1 or 0
	var MenuTextCentered='left';			// Item text position 'left', 'center' or 'right'
	var MenuCentered='left';			// Menu horizontal position 'left', 'center' or 'right'
	var MenuVerticalCentered='top';		// Menu vertical position 'top', 'middle','bottom' or static
	var ChildOverlap=.2;				// horizontal overlap child/ parent
	var ChildVerticalOverlap=.2;			// vertical overlap child/ parent
	var StartTop=140;				// Menu offset x coordinate
	var StartLeft=1;				// Menu offset y coordinate
	var VerCorrect=0;				// Multiple frames y correction
	var HorCorrect=0;				// Multiple frames x correction
	var LeftPaddng=3;				// Left padding
	var TopPaddng=2;				// Top padding
	var FirstLineHorizontal=0;			// SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL
	var MenuFramesVertical=1;			// Frames in cols or rows 1 or 0
	var DissapearDelay=300;			// delay before menu folds in
	var TakeOverBgColor=1;			// Menu frame takes over background color subitem frame
	var FirstLineFrame='leftFrame';			// Frame where first level appears
	var SecLineFrame='mainFrame';			// Frame where sub levels appear
	var DocTargetFrame='mainFrame';			// Frame where target documents appear
	var TargetLoc='';				// span id for relative positioning
	var HideTop=0;				// Hide first level when loading new document 1 or 0
	var MenuWrap=1;				// enables/ disables menu wrap 1 or 0
	var RightToLeft=0;				// enables/ disables right to left unfold 1 or 0
	var UnfoldsOnClick=0;			// Level 1 unfolds onclick/ onmouseover
	var WebMasterCheck=0;			// menu tree checking on or off 1 or 0
	var ShowArrow=1;				// Uses arrow gifs when 1
	var KeepHilite=1;				// Keep selected path highligthed
	var Arrws=['images/tri.gif',5,10,'images/tridown.gif',10,5,'images/trileft.gif',5,10];	// Arrow source, width and height

function BeforeStart(){return}
function AfterBuild(){return}
function BeforeFirstOpen(){return}
function AfterCloseAll(){return}


// Menu tree
//	MenuX=new Array(Text to show, Link, background image (optional), number of sub elements, height, width);
//	For rollover images set "Text to show" to:  "rollover:Image1.jpg:Image2.jpg"

Menu1=new Array("Home","?page=home.php","",0,30,160);
Menu2=new Array("Licencing Affairs","","",4,30,160);	
	Menu2_1=new Array("Applications","","",8,25,160);
			Menu2_1_1=new Array("New Application","?page=licencing/new.php","",0,25,160);
			Menu2_1_2=new Array("Edit Application","?page=licencing/edit_list.php","",0,25,160);
			Menu2_1_3=new Array("Evaluation of Application","?page=licencing/evaluate_list.php","",0,25,160);
			Menu2_1_4=new Array("Approval of Application","?page=licencing/approve_list.php","",0,25,160);
			Menu2_1_5=new Array("Print Invoice","?page=licencing/invoice_list.php","",0,25,160);
			Menu2_1_6=new Array("Prepare Licence","?page=licencing/issue_list.php","",0,25,160);
			Menu2_1_7=new Array("Issuance of Licence","?page=licencing/dispatch_list.php","",0,25,160);
			Menu2_1_8=new Array("View Applications","?page=licencing/view_list.php","",0,25,160);

	Menu2_2=new Array("Licences","","",4,25,160);
			Menu2_2_1=new Array("View All Licences","?page=licencing/licence_list.php","",0,25,160);
			Menu2_2_2=new Array("Licencee's Details","?page=licencing/licencee_list.php","",0,25,160);
			Menu2_2_3=new Array("Generate Annual Fee","?page=licencing/annual_fee_list.php","",0,25,160);
			Menu2_2_4=new Array("Cancel Licence","?page=licencing/cancel_list.php","",0,25,160);

	Menu2_3=new Array("Settings","","",4,25,160);
			Menu2_3_1=new Array("Fees","?page=licencing/settings/licence_fee_list.php","",0,25,160);
			Menu2_3_2=new Array("Market Segment","?page=licencing/settings/segment_list.php","",0,25,160);
			Menu2_3_3=new Array("Types of Aircraft","?page=licencing/settings/aircraft_type_list.php","",0,25,160);
			Menu2_3_4=new Array("Types of Ship","?page=licencing/settings/ship_type_list.php","",0,25,160);
	Menu2_4=new Array("Reports","?page=report/list.php","",0,25,160);
                
Menu3=new Array("Frequency Management","","",2,30,160);
	Menu3_1=new Array("Spectrum","","",6,25,160);
		//Menu3_1_1=new Array("Applications","","",0,25,160);
			//Menu3_1_1_1=new Array("New Application","?page=frequency/applications/new.php","",0,25,160);
			//Menu3_1_1_2=new Array("Evaluation of  Application","?page=frequency/evaluate_list.php","",0,25,160);
			//Menu3_1_1_3=new Array("Approval of Application","?page=frequency/approve_list.php","",0,25,160);
			//Menu3_1_1_4=new Array("Print Certificate/Licence","?page=frequency/print_list.php","",0,25,160);
			//Menu3_1_1_5=new Array("View Applications","?page=frequency/list.php","",0,25,160);
		Menu3_1_1=new Array("Frequency Assignment","","",3,25,160);
			Menu3_1_1_1=new Array("New","?page=frequency/new.php","",0,25,160);
			Menu3_1_1_2=new Array("Update","?page=frequency/assignment_list.php","",0,25,160);
			Menu3_1_1_3=new Array("Cancel Assigment","?page=frequency/assignment_cancel_list.php","",0,25,160);
		Menu3_1_2=new Array("Stations","?page=frequency/stations/station_list.php","",0,25,160);

		Menu3_1_3=new Array("Links","","",3,25,160);
			Menu3_1_3_1=new Array("New","?page=frequency/link_new.php","",0,25,160);
			Menu3_1_3_2=new Array("Update","?page=frequency/link_update_list.php","",0,25,160);
			Menu3_1_3_3=new Array("Cancel","?page=frequency/link_cancel_list.php","",0,25,160);
		Menu3_1_4=new Array("Settings","","",5,25,160);
			Menu3_1_4_1=new Array("Frequency Types","?page=frequency/settings/type_list.php","",0,25,160);
			Menu3_1_4_2=new Array("Frequency Sub Types","?page=frequency/settings/sub_type_list.php","",0,25,160);
			Menu3_1_4_3=new Array("Frequency Trans. System","?page=frequency/settings/trans_list.php","",0,25,160);
			Menu3_1_4_4=new Array("Station Types","?page=frequency/settings/station_type_list.php","",0,25,160);
			Menu3_1_4_5=new Array("Station sub Types","?page=frequency/settings/station_sub_type_list.php","",0,25,160);
		Menu3_1_5=new Array("Operator Details","?page=frequency/licencee_list.php","",0,25,160);
		Menu3_1_6=new Array("Annual Fee","?page=frequency/annual_fee_list.php","",0,25,160);


	Menu3_2=new Array("Broadcasting","","",5,30,160);
		Menu3_2_1=new Array("Frequency Assigment","","",3,25,160);
			Menu3_2_1_1=new Array("New","?page=broadcasting/new.php","",0,25,160);
			Menu3_2_1_2=new Array("Update","?page=broadcasting/assignment_list.php","",0,25,160);
			Menu3_2_1_3=new Array("Cancel Assigment","?page=broadcasting/assignment_cancel_list.php","",0,25,160);
		Menu3_2_2=new Array("Stations","?page=broadcasting/stations/station_list.php","",0,25,160);
		Menu3_2_3=new Array("Settings","","",1,25,160);
			Menu3_2_3_1=new Array("Stations","?page=broadcasting/settings/station_type_list.php","",0,25,160);
		Menu3_2_4=new Array("Operator Details","?page=broadcasting/licencee_list.php","",0,25,160);
		Menu3_2_5=new Array("Annual Fee","?page=broadcasting/annual_fee_list.php","",0,25,160);

Menu4=new Array("Numbering Resources","","",4,30,160);	
	Menu4_1=new Array("Applications","","",8,25,160);
			Menu4_1_8=new Array("View Applications","?page=numbering/view_list.php","",0,25,160);
			Menu4_1_2=new Array("Edit Application","?page=numbering/edit_list.php","",0,25,160);
			Menu4_1_1=new Array("New Application","?page=numbering/new.php","",0,25,160);
			Menu4_1_3=new Array("Evaluation of  Application","?page=numbering/evaluate_list.php","",0,25,160);
			Menu4_1_4=new Array("Approval of Application","?page=numbering/approve_list.php","",0,25,160);
			Menu4_1_5=new Array("Print Invoice","?page=numbering/invoice_list.php","",0,25,160);
			Menu4_1_6=new Array("Print Certificate","?page=numbering/issue_list.php","",0,25,160);
			Menu4_1_7=new Array("Dispatch Certificate","?page=numbering/dispatch_list.php","",0,25,160);

	Menu4_2=new Array("Numbering Resources","","",2,25,160);
			Menu4_2_1=new Array("View Resources","?page=numbering/numbering_list.php","",0,25,160);
			Menu4_2_2=new Array("Licencee's Details","?page=numbering/licencee_list.php","",0,25,160);

	Menu4_3=new Array("Settings","","",3,25,160);
			Menu4_3_1=new Array("Fees","?page=numbering/settings/numbering_fee_list.php","",0,25,160);
			Menu4_3_2=new Array("Fee Types","?page=numbering/settings/fee_type_list.php","",0,25,160);
			Menu4_3_3=new Array("Resource Types","?page=numbering/settings/resource_list.php","",0,25,160);
	Menu4_4=new Array("Reports","?page=report/list.php","",0,25,160);
	
	

Menu5=new Array("Consumer Complaints","","",3,30,160);
	Menu5_1=new Array("Management","","",5,25,160);
		Menu5_1_1=new Array("New Complaint","?page=complaints/new.php","",0,25,160);
		Menu5_1_2=new Array("Edit Complaints","?page=complaints/edit_list.php","",0,25,160);
		Menu5_1_3=new Array("TCRA Committe","?page=complaints/committee_list.php","",0,25,160);
		Menu5_1_4=new Array("Competition Tribunal","?page=complaints/tribunal_list.php","",0,25,160);
		Menu5_1_5=new Array("View Complaints","?page=complaints/view_list.php","",0,25,160);
	Menu5_2=new Array("Settings","","",1,25,160);
		Menu5_2_1=new Array("Complaint Type","?page=complaints/complaint_type_list.php","",0,25,160);
	Menu5_3=new Array("Reports","?page=report/list.php","",0,25,160);

Menu6=new Array("Payments","","",2,30,160);
	Menu6_1=new Array("Management","","",2,25,160);
		Menu6_1_1=new Array("Edit Invoice","?page=payment/edit_invoice_list.php","",0,25,160);
		Menu6_1_2=new Array("Copy Invoice to Epicor","?page=payment/copy_to_epicor_list.php","",0,25,160);
	Menu6_2=new Array("Reports","?page=report/list.php","",0,25,160);

Menu7=new Array("Periodic Statistics","","",3,30,160);
	Menu7_1=new Array("Management","","",5,25,160);
		Menu7_1_1=new Array("Telecom","","",2,25,160);
			Menu7_1_1_1=new Array("New","?page=statistics/telecom_new.php","",0,25,160);
			Menu7_1_1_2=new Array("Update","?page=statistics/telecom_base_list.php","",0,25,160);
		Menu7_1_2=new Array("Postal","","",2,25,160);
			Menu7_1_2_1=new Array("New","?page=statistics/postal_new.php","",0,25,160);
			Menu7_1_2_2=new Array("Update","?page=statistics/postal_base_list.php","",0,25,160);
		Menu7_1_3=new Array("Internet","","",2,25,160);
			Menu7_1_3_1=new Array("New","?page=statistics/internet_new.php","",0,25,160);
			Menu7_1_3_2=new Array("Update","?page=statistics/internet_list.php","",0,25,160);
		Menu7_1_4=new Array("Cable Tv","","",2,25,160);
			Menu7_1_4_1=new Array("New","?page=statistics/cable_new.php","",0,25,160);
			Menu7_1_4_2=new Array("Update","?page=statistics/cable_list.php","",0,25,160);

		Menu7_1_5=new Array("Employment","","",2,25,160);
			Menu7_1_5_1=new Array("New","?page=statistics/employment_new.php","",0,25,160);
			Menu7_1_5_2=new Array("Update","?page=statistics/employment_list.php","",0,25,160);

	Menu7_2=new Array("Settings","","",4,25,160);
			Menu7_2_1=new Array("Subscription Service","?page=statistics/settings/subscription_service_list.php","",0,25,160);
			Menu7_2_2=new Array("Air Time Destination","?page=statistics/settings/air_time_destination_list.php","",0,25,160);
			Menu7_2_3=new Array("Air Time Movement","?page=statistics/settings/air_time_movement_list.php","",0,25,160);
			Menu7_2_4=new Array("Message Movement","?page=statistics/settings/message_movement_list.php","",0,25,160);
	Menu7_3=new Array("Reports","?page=report/list.php","",0,25,160);

Menu8=new Array("Operators","","",2,30,160);
	Menu8_1=new Array("View Operators","?page=operator/view_list.php","",0,25,160);
	Menu8_2=new Array("Update Operators","?page=operator/update_list.php","",0,25,160);

Menu9=new Array("Administration","","",4,30,160);
	Menu9_1=new Array("Manage Locations","","",3,25,160);
			Menu9_1_1=new Array("Regions","?page=location/region_list.php","",0,25,160);
			Menu9_1_2=new Array("Districts","?page=location/district_list.php","",0,25,160);
			Menu9_1_3=new Array("Locations","?page=location/location_list.php","",0,25,160);
	
	Menu9_2=new Array("Settings","","",4,25,160);
			Menu9_2_1=new Array("Citizenship","?page=settings/citizenship_list.php","",0,25,160);
			Menu9_2_2=new Array("Currency","?page=settings/currency_list.php","",0,25,160);
			Menu9_2_3=new Array("Organization","?page=settings/organization_list.php","",0,25,160);
			Menu9_2_4=new Array("Operator Types","?page=settings/operator_type_list.php","",0,25,160);
	
	Menu9_3=new Array("Security","","",3,25,160);
		Menu9_3_1=new Array("Users","?page=security/user_list.php","",0,25,160);
		Menu9_3_2=new Array("Groups","?page=security/group_list.php","",0,25,160);
		Menu9_3_3=new Array("Roles","?page=security/role_list.php","",0,25,160);
	Menu9_4=new Array("Reports","","",3,25,160);
		Menu9_4_1=new Array("Reports","?page=report/report_list.php","",0,25,160);
		Menu9_4_2=new Array("Report Groups","?page=report/group_list.php","",0,25,160);
		Menu9_4_3=new Array("Report Parameters","?page=report/parameter_list.php","",0,25,160);