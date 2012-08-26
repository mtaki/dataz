<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-5 last">
		<div id="sidebar">
			<div id="menu">
						  <ul><!-- Topest branch (grand parent) 1-->
						  <li><h2>Main Menu</h2><!-- Topest item -->
							 <ul><!-- level 1 -->
								<li><a href="<?php echo Yii::app()->homeUrl; ?>" title="Home page">Home</a></li><!-- Level 1 item -->
								<li><a href="#">Licencing</a><!-- fully working sample -->
								  <ul><!-- level 2 -->
									 <li><a href="#" title="Applications">Applications</a>
										<ul><!-- level 3 -->
										 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/new'); ?>" title="New">New</a></li>
										 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/editList'); ?>" title="Edit Application">Edit Application</a></li>			
										 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/evaluationList'); ?>" title="Evaluation of Application">Evaluation of Application</a></li>
										 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/approvalList'); ?>" title="Approval of Application">Approval of Application</a></li>
										 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/printList'); ?>" title="Preview Invoice">Preview Invoice</a></li>			
										 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/prepareList'); ?>" title="Prepare Licence">Prepare Licence</a></li>
									  	 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/issueList'); ?>" title="Issuance of Licence">Issuance of Licence</a></li>
									  	 <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/viewList'); ?>" title="View Applications">View Applications</a></li>
										</ul>
									 </li>
								  
								  <li><a href="#" title="licenses">licenses</a>
										<ul><!-- level 3 -->
										  <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/licenceList'); ?>" title="View All Licences">View All Licences</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/licenceeList'); ?>" title="Licencee's Details">Licencee's Details</a></li>			
										  
										  <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/cancelList'); ?>" title="Cancel Licence">Cancel Licence</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('licenceApplication/renewList'); ?>" title="Renew Licence">Renew Licence</a></li>
										</ul>
									 </li>
								  
								  
								  <li><a href="#" title="Settings">Settings</a>
										<ul><!-- level 3 -->
										  <li><a href="<?php echo Yii::app()->createUrl('licenceFee/admin');?>" title="Fees">Fees</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('marketSegment/admin'); ?>" title="Market Segment">Market Segment</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('licenceSubCategory/admin'); ?>" title="Licence Categories">Licence Categories</a></li>
										</ul>
									 </li>
	
									
									<li><a href="<?php echo Yii::app()->createUrl('report/licencingList'); ?>" title="Reports">Reports</a></li>


								  </ul>
								</li>
			
							  
							  <li><a href="#">Frequency Management</a></li><!-- fully working sample -->
				
								<li><a href="#" title="Spectrum">&nbsp;&nbsp; &raquo;Spectrum</a>
										<ul><!-- level 3 -->
										<li><a href="#" title="">Applications</a>
											<ul>
											<li><a href="<?php echo Yii::app()->createUrl('frequencyApplication/new'); ?>" title="">New Application</a></li>
<li><a href="<?php echo Yii::app()->createUrl('frequencyApplication/editList'); ?>" title="">Update</a></li>											
											<li><a href="<?php echo Yii::app()->createUrl('frequencyApplication/evaluationList'); ?>" title="">Evaluation</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('frequencyApplication/approvalList'); ?>" title="">Approval</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('frequencyApplication/assignmentList'); ?>" title="">Assignment</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('frequencyApplication/dispatchList'); ?>" title="">Dispatch</a></li>
											</ul>
										</li>
										<li><a href="<?php echo Yii::app()->createUrl('frequency/admin'); ?>" title="">Frequency</a>
											
										</li>
										<li><a href="<?php echo Yii::app()->createUrl('frequencyLink/admin'); ?>" title="Links">Links</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('frequencyStation/admin'); ?>" title="">Stations</a></li>
										  	<li><a href="<?php echo Yii::app()->createUrl('frequency/operatorList'); ?>" title="">Operator Details</a>
											<ul>
						
											</ul>
										</li>
										<li><a href="#"title="">Settings</a>
											<ul>
												<li><a href="<?php echo Yii::app()->createUrl('frequencyType/admin'); ?>" title="Frequency Types">Frequency Types</a></li>
										  		<li><a href="<?php echo Yii::app()->createUrl('frequencyTrans/admin'); ?>" title="Frequency Trans. System">Frequency Trans. System</a></li>	
										  		<li><a href="<?php echo Yii::app()->createUrl('frequencyLinkType/admin'); ?>" title="Frequency Link Types">Frequency Link Types</a></li>	
											</ul>
											</li>
										
										<li><a href="<?php echo Yii::app()->createUrl('report/spectrumList'); ?>" title="Reports">Reports</a></li>
									</ul>
									
							</li>

							<li><a href="#" title="Broadcasting">&nbsp;&nbsp; &raquo;Broadcasting</a>
										<ul><!-- level 3 -->
										
									  <li><a href="<?php echo Yii::app()->createUrl('broadcastingStation/admin'); ?>" title="Stations">Stations</a>
									  <li><a href="<?php echo Yii::app()->createUrl('broadcastingTransmitter/admin'); ?>" title="Transmitters">Transmitters</a>
									  	
									  </li>
									  <li><a href="<?php echo Yii::app()->createUrl('broadcasting/operatorList'); ?>" title="Operator Details">Operator Details</a>
									
									  </li>
									  <li><a href="#" title="Settings">Settings</a>
									  	<ul>
										<li><a href="<?php echo Yii::app()->createUrl('broadcastingStationType/admin'); ?>"title="">Station Types</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('broadcastingTransmitterType/admin'); ?>"title="">Transmitter Types</a></li>
										</ul>
									  </li>
										<li><a href="<?php echo Yii::app()->createUrl('report/broadcastingList'); ?>" title="Reports">Reports</a></li>
										</ul>
									 </li>
								  
								  <li><a href="#">Numbering Resources</a><!--Numbering resources begin -->
									  <ul><!-- level 2 -->
										<li><a href="#" title="Applications">Applications</a>
										 <ul><!-- level 3 -->		
										  <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/new'); ?>" title="New Application">New Application</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/editList'); ?>" title="Edit Application">Edit Application</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/evaluationList'); ?>" title="Evaluation of  Application">Evaluation of  Application</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/approvalList'); ?>" title="Approval of Application">Approval of Application</a></li>			
										  <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/prepareList'); ?>" title="Prepare Certificate">Prepare Certificate</a></li>
									      <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/dispatchList'); ?>" title="Dispatch Certificate">Dispatch Certificate</a></li>
									      <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/viewList'); ?>" title="View Applications">View Application</a></li>
										  
										</ul>
									 </li>
								  
								  
										  <li><a href="<?php echo Yii::app()->createUrl('numberingResource/admin'); ?>" title="View resources">View resources</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('numberingApplication/licenceeList'); ?>" title="Licencee's Details">Licencee's Details</a></li>			
										
								  
								  
								  <li><a href="#" title="Settings">Settings</a>
										<ul><!-- level 3 -->
										  <li><a href="<?php echo Yii::app()->createUrl('numberingFee/admin'); ?>" title="Fees">Fees</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('numberingFeeType/admin'); ?>" title="">Fee type</a></li>			
										  <li><a href="<?php echo Yii::app()->createUrl('numberingResourceType/admin'); ?>" title="Resource type">Resource type</a></li>
										</ul>
									 </li>
								  
								
								  <li><a href="<?php echo Yii::app()->createUrl('report/numberingList'); ?>" title="Reports">Reports</a>
									 </li>
									</ul><!-- level 1 numbering resources end -->
								 </li>
								  
 
								 <li><a href="#">Consumer Complaints</a><!--Numbering resources begin -->
									  <ul><!-- level 2 -->
										<li><a href="#" title="Complaints">Complaints</a>
										 <ul><!-- level 3 -->
										  <li><a href="<?php echo Yii::app()->createUrl('complaint/create'); ?>" title="New Complaint">New Complaint</a></li>		
										  <li><a href="<?php echo Yii::app()->createUrl('complaint/admin'); ?>" title="Edit Complaint">Edit Complaint</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('complaint/tcraList'); ?>" title="TCRA Action">TCRA Action</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('complaint/committeeList'); ?>" title="TCRA Committee">TCRA Committee</a></li>
										  <li><a href="<?php echo Yii::app()->createUrl('complaint/tribunalList'); ?>" title="Competition Tribunal">Competition Tribunal</a></li>
									  	  <li><a href="<?php echo Yii::app()->createUrl('complaint/viewList'); ?>" title="View">View Complaint</a></li>
										</ul>
									 </li>
								  
								  <li><a href="#" title="Settings">Settings</a>
										<ul><!-- level 3 -->
										  <li><a href="<?php echo Yii::app()->createUrl('complaintType/admin'); ?>" title="Complaint Type">Complaint Type</a></li>	
										  <li><a href="<?php echo Yii::app()->createUrl('reliefType/admin'); ?>" title="Relief Type">Relief Type</a></li>		
										</ul>
									 </li>
								
								  <li><a href="<?php echo Yii::app()->createUrl('report/complaintList'); ?>" title="Reports">Reports</a></li>
									</ul><!-- level 1 numbering resources end -->
								 </li> 
			
			
								 

	
						  <li><a href="#">Periodic Statistics</a></li><!-- fully working sample -->
				
								<li><a href="#" title="Data Entry">&nbsp;&nbsp; &raquo;Data Entry</a>
										<ul><!-- level 3 -->
										<li><a href="#" title="">Telecom</a>
											<ul>
												<li><a href="<?php echo Yii::app()->createUrl('statisticsTelecomMain/create'); ?>" title="New">Add New Record</a></li>			
										  		<li><a href="<?php echo Yii::app()->createUrl('statisticsTelecomMain/admin'); ?>" title="Update">Find Record</a></li>
											</ul>
										</li>
										<li><a href="#" title="Postal">Postal</a>
				
											<ul>
												<li><a href="<?php echo Yii::app()->createUrl('statisticsPostalMain/create'); ?>" title="New">Add New Record</a></li>			
										  			<li><a href="<?php echo Yii::app()->createUrl('statisticsPostalMain/admin'); ?>" title="Update">Find Record</a></li>
											</ul>
										</li>
				
										  	<li><a href="#" title="">Internet</a>
											<ul>
												<li><a href="<?php echo Yii::app()->createUrl('statisticsInternetMain/create'); ?>" title="New">Add New Record</a></li>			
										  			<li><a href="<?php echo Yii::app()->createUrl('statisticsInternetMain/admin'); ?>" title="Update">Find Record</a></li>
											</ul>
										</li>
							
										  	<li><a href="#"title="">Broadcasting</a>
											<ul>
												<li><a href="<?php echo Yii::app()->createUrl('statisticsCableTvMain/create'); ?>" title="New">Add New Record</a></li>			
										  		<li><a href="<?php echo Yii::app()->createUrl('statisticsCableTvMain/admin'); ?>"title="Update">Find Record</a></li>	
											</ul>
										</li>
				
										<li><a href="#"title="">Employment</a>
											<ul>
												<li><a href="<?php echo Yii::app()->createUrl('statisticsEmploymentMain/create'); ?>" title="New">Add New Record</a></li>			
										  			<li><a href="<?php echo Yii::app()->createUrl('statisticsEmploymentMain/admin'); ?>" title="Update">Find Record</a></li>		
											</ul>
										</li>
				
	
									</ul>
								</li>

								
	
		
								<li><a href="<?php echo Yii::app()->createUrl('report/statisticsList'); ?>" title="Reports">&nbsp;&nbsp; &raquo;Reports</a>
									 
								 </li>
			
								 <li><a href="<?php echo Yii::app()->createUrl('operator/admin'); ?>" >Operators</a> </li> 
			
			
							<li><a href="#">Accounts</a><!--Payments begin -->
								  <ul><!-- level 2 -->
								  		<li><a href="<?php echo Yii::app()->createUrl('invoice/admin'); ?>" title="Payments">Invoices</a></li>
										<li><a href="<?php echo Yii::app()->createUrl('licenceApplication/annualFeeList'); ?>" title="Generate Annual Fee">Generate Annual Fee</a></li>	
										<li><a href="<?php echo Yii::app()->createUrl('report/accountsList'); ?>" title="">Reports</a></li>
												
								  </ul>
							</li>  
			
							<li><a href="<?php echo Yii::app()->createUrl('report/systemUnitList'); ?>" title="">General Reports</a>
								  
							</li>  
			
			
			
							 <li><a href="#">Administration</a><!--Payments begin -->
								  <ul><!-- level 2 -->
										
			
								  	<li><a href="#" title="Settings">Settings</a>
										<ul><!-- level 3 -->
											<li><a href="<?php echo Yii::app()->createUrl('citizenship/admin'); ?>" title="">Citizenship</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('currency/admin'); ?>" title="">Currency</a></li>	
											<li><a href="<?php echo Yii::app()->createUrl('region/admin'); ?>" title="Regions">Regions</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('district/admin'); ?>" title="Districts">Districts</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('department/admin'); ?>" title="">Departments</a></li>	
												
											</ul>
										</li>
					
									<li><a href="#" title="Security">Security</a>
										<ul><!-- level 3 -->
											<li><a href="<?php echo Yii::app()->createUrl('user/admin'); ?>" title="Users">Users</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('groups/admin'); ?>" title="Groups">Groups</a></li>	
										<li><a href="<?php echo Yii::app()->createUrl('roles/admin'); ?>" title="">Roles</a></li>									<li><a href="<?php echo Yii::app()->createUrl('activeRecordLog/admin'); ?>" title="Logs">Action Log</a></li>
											</ul>
										</li>
			
									<li><a href='#' title="Rets">Reports</a>
										<ul><!-- level 3 -->
										<li><a href="<?php echo Yii::app()->createUrl('report/admin'); ?>" title="">Reports</a></li>
											<li><a href="<?php echo Yii::app()->createUrl('reportGroup/admin'); ?>" title="Report Groups">Report Groups</a></li>		
											</ul>
									</li>
									
								  </ul>
								</li>  
								<li><a href="<?php echo Yii::app()->createUrl('user/changePassword'); ?>">Change Password</a></li>
								<li><a href="#">&nbsp;</a></li>
								<li><a href="#">&nbsp;</a></li>
								<li><a href="#">&nbsp;</a></li>
								<li><a href="#">&nbsp;</a></li>
								<li><a href="#">&nbsp;</a></li>
								 	  
						  </ul>
						  </li><!-- Topest branch item 1-->
						  
						</ul><!-- Topest branch (grand parent) 1-->
				
		</div>
		</div><!-- sidebar -->
	</div>
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
			
		</div><!-- content -->
	</div>
	
</div>
<?php $this->endContent(); ?>
