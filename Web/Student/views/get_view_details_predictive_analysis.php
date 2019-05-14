<?php
	include("../../../db_con.php");
	//$zapplication_ID = 4;

	$get_za = mysqli_query($connection, "SELECT * FROM `t_zoning_application` WHERE za_ID = '$zapplication_ID'");
	while($row1 = mysqli_fetch_assoc($get_za))
	{
		$za_curr_ID = $row1['za_ID'];
		$za_project_type = $row1['za_project_type'];
		$za_project_area = $row1['za_project_area'];
		$za_land_use = $row1['za_land_use_ID'];
		$za_project_nature = $row1['za_project_nature'];

		$get_zcoor = mysqli_query($connection, "SELECT * FROM `t_zoning_coordinates` AS ZCOR
													     INNER JOIN `r_infrastructures` AS INF
													     ON ZCOR.inf_id = INF.inf_id
													     INNER JOIN `r_terrain_hazard` AS HAZ 
													     ON ZCOR.zcoor_terrain_hazard = HAZ.haz_ID
											    WHERE za_id = '$za_curr_ID'");
		while($row2 = mysqli_fetch_assoc($get_zcoor))
		{
			$zcoor_inf_id = $row2['inf_id'];
			$zcoor_buffer = $row2['zcoor_buffer'];
			$zcoor_buffer_unit = $row2['zcoor_buffer_unit'];
			$zcoor_terrain_year_tenure = $row2['zcoor_terrain_year_tenure'];
			$zcoor_terrain_hazard = $row2['zcoor_terrain_hazard'];
			
			$inf_name = $row2['inf_name'];
			$inf_desc = $row2['inf_desc'];
			$haz_desc = $row2['haz_desc'];
			

			
			$first_filter = mysqli_query($connection, "SELECT inf_id, inf_name FROM `r_infrastructures` WHERE inf_id = '$zcoor_inf_id' 
														and (inf_name like '%Residential%'  
														or inf_name like '%Education%' 
														or inf_name like '%Health%'
														or inf_name like '%Economic%'
														or inf_name like '%Culture%'
														or inf_name like '%Technology%'
														or inf_name like '%Public%'
														or inf_name like '%Financial%'
														or inf_name like '%Shelter%')");
			if(mysqli_num_rows($first_filter) > 0)
			{
				
				$first_hazard = mysqli_query($connection,"SELECT haz_ID, haz_desc FROM `r_terrain_hazard` WHERE haz_id = '$zcoor_terrain_hazard'
															and (haz_desc like '%Chemical%'
															or haz_desc like '%Slope%'
															or haz_desc like '%Factory%'
															or haz_desc like '%forest%'
														    or haz_desc like '%grass%'
														    or haz_desc like '%river%'
															or haz_desc like '%creek%'
															or haz_desc like '%None%')");

				if(mysqli_num_rows($first_hazard) > 0)
				{	
					//Children Function
					function hazardPic($Pic)
					{
						if($Pic == 'Chemical Factory')
						{
							return('<img src="../../../resources/images/Land-icons/biohazard.png" style="width:100px" />');
						}
						else if($Pic == 'Slopes')
						{
							return('<img src="../../../resources/images/Land-icons/landslide.png" style="width:100px" />');
						}
						else if($Pic == 'River')	 
						{
							return('<img src="../../../resources/images/Land-icons/creek.png" style="width:100px" />');
						}
						else if($Pic == 'Forest')	 
						{
							return('<img src="../../../resources/images/Land-icons/forest.png" style="width:100px" />');
						}
						else if($Pic == 'None')	 
						{
						  	return('<img src="../../../resources/images/Land-icons/survey.png" style="width:100px" />');
						}
					}
					//Children Function
					function hazardPic2($Pic2)
					{
						if($Pic2 == 'Chemical Factory')
						{   
							return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
						}
						else if($Pic2 == 'Slopes')
						{
							return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
						}
						else if($Pic2 == 'River')	 
						{
							return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
						}
						else if($Pic2 == 'Forest')	 
						{
							return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
						}
						else if($Pic2 == 'None')	 
						{
						  	return('<img src="../../../resources/images/Land-icons/approved.png" style="width:100px" />');
						}
					}
					//Children Function
					function hazardVerdict($hd_text)
					{
						if($hd_text == 'Chemical Factory')
						{
							$verdict = 'You cannot establish an infrastructure that is classified as ';
						}
						else if($hd_text == 'Slopes')
						{
							$verdict = 'You cannot establish an infrastructure that is classified as ';
						}
						else if($hd_text == 'River')	 
						{
							$verdict = 'You cannot establish an infrastructure that is classified as ';
						}
						else if($hd_text == 'Forest')	 
						{
							$verdict = 'You cannot establish an infrastructure that is classified as ';
						}
						else if($hd_text == 'None')	 
						{
						  	$verdict = 'You can proceed to establish an infrastructure that is classified as ';
						}
						return($verdict);
					}
					//Parent Function
					//Children Function
					function hazardDesc($hd_text)
					{
						if($hd_text == 'Chemical Factory')
						{
							$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
								        	&nbsp;&nbsp;&nbsp;
								        	Relocate to another location which is near to a population that engages community activities
								        	(Schools, Parks, Health and Wellness Centers), far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span>.
								        	<br>
								        	&nbsp;&nbsp;&nbsp;
								        	Also take note that you must choose an available location for zoning clearance. 
								        </p>';
						}
						else if($hd_text == 'Slopes')
						{
							$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
								        	&nbsp;&nbsp;&nbsp;
								        	Relocate to another location which is near to a population that engages community activities
								        	(Schools, Parks, Health and Wellness Centers), far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span>, to avoid collateral 
								        	destruction from unexpected landslides.
								        	<br>
								        	&nbsp;&nbsp;&nbsp;
								        	Also take note that you must choose an available location for zoning clearance. 
								        </p>';
						}
						else if($hd_text == 'River')	 
						{
							$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
								        	&nbsp;&nbsp;&nbsp;
								        	Relocate to another location which is near to a population that engages community activities
								        	(Schools, Parks, Health and Wellness Centers), far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span>, to avoid pollutants to the Water
								        	resource.
								        	<br>
								        	&nbsp;&nbsp;&nbsp;
								        	Also take note that you must choose an available location for zoning clearance. 
								        </p>';
						}
						else if($hd_text == 'Forest')	 
						{
							$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
								        	&nbsp;&nbsp;&nbsp;
								        	Relocate to another location which is near to a population that engages community activities
								        	(Schools, Parks, Health and Wellness Centers), far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span>, to avoid pollutants to the Forest resorvoir and unwanted distraction from wild animals and other wild entities.
								        	<br>
								        	&nbsp;&nbsp;&nbsp;
								        	Also take note that you must choose an available location for zoning clearance. 
								        </p>';
						}
						else if($hd_text == 'None')	 
						{
						  	$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
						  		        	&nbsp;&nbsp;&nbsp;
						  		        	Since there are no hazards near the location, it is clear to proceed in establishing the infrastructure.
						  		        	
						  		        	<br>
						  		        	&nbsp;&nbsp;&nbsp;
						  		        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
						  		        </p>';
						}
						return($text);
					}
					//Parent Function
					function hazard($hazard,$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer)
					{
						
					    if($hazard == 'Chemical Factory')	 
					    {
					    	$Pic = hazardPic('Chemical Factory');
					    	$Pic2 = hazardPic2('Chemical Factory');
					    	$Verdict = hazardVerdict('Chemical Factory');
					    	$Desc = hazardDesc('Chemical Factory');
					    }
					    else if($hazard == 'Slopes')	 
					    {
					         $Pic = hazardPic('Slopes');
					         $Pic2 = hazardPic2('Slopes');
					         $Verdict = hazardVerdict('Slopes');
					         $Desc = hazardDesc('Slopes');
					    }
					    else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
					    {
					    	$Pic = hazardPic('River');
					    	$Pic2 = hazardPic2('River');
					    	$Verdict = hazardVerdict('River');
					    	$Desc = hazardDesc('River');
					    }
					    else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
					    {
					    	$Pic = hazardPic('Forest');
					    	$Pic2 = hazardPic2('Forest');
					    	$Verdict = hazardVerdict('Forest');
					    	$Desc = hazardDesc('Forest');
					    }
					    else if($haz_desc == 'None')	 
					    {
					      	$Pic = hazardPic('None');
					      	$Pic2 = hazardPic2('None');
					      	$Verdict = hazardVerdict('None');
					      	$Desc = hazardDesc('None');
					    }
					    $statement = 
						'	
							<!--FIRST LEVEL-->
							<div class="row" style=" margin-top: 10px; color: white">
								<div class="col-md-5" style="border: 1px solid white; border-radius:15px; margin: 15px">
								    <div class="row" style="margin: 10px">
								      <div class="col-md-3" style="margin-top: 10px">
								      '.$Pic.'
								      </div>
								      <div class="col-md-9">
								      	<p style="font-size:16px; font-weight: bold">Evaluation:</p>
								        <p style="font-size: 14px; text-align: justify; font-weight: normal; color: white">
								        	&nbsp;&nbsp;&nbsp;
								        	'.$Verdict.'

								        	<span style="font-size:20px; color:#33ff33;" data-toggle="tooltip" title="'.$inf_desc.'">'.$inf_name.', </span>
								        	building near the '.$haz_desc.' with buffer zone radius of
								        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'. 
								        </p>

								      </div>
								    </div>
								</div>
								<!-- FIRST LEVEL-->

								<!--SECOND LEVEL-->
								<div class="col-md-6" style="border: 1px solid white; border-radius:15px; margin: 15px">
								    <div class="row" style="margin: 10px">
								      
								      <div class="col-md-3" style="margin-top: 10px">
								        '.$Pic2.'
								      </div>
								      <div class="col-md-9">
								      	<p style="font-size:16px; font-weight: bold">Recommendation:</p>
								        '.$Desc.'
								      </div>
								    </div>
								</div>
							</div>
							<!-- SECOND LEVEL-->	
						';
						return($statement);
					}
					
					if($haz_desc == 'Chemical Factory')	 
					{
						$echoString = hazard('Chemical Factory',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
						echo $echoString;
						// echo $statement;
					}
					else if($haz_desc == 'Slopes')
					{
						$echoString = hazard('Slopes',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
						echo $echoString;
					}
					else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
					{
						$echoString = hazard('River',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
						echo $echoString;
					}
					else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
					{
						$echoString = hazard('Forest',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
						echo $echoString;
					}
					else if($haz_desc == 'None')	 
					{
					    $echoString = hazard('None',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
						echo $echoString;
					}
				}
				else
				{
				 
				}
			}

			else
			{	
				$second_filter = mysqli_query($connection, "SELECT inf_id, inf_name FROM `r_infrastructures` WHERE inf_id = '$zcoor_inf_id' 
														and (inf_name like '%Environment%'
														or inf_name like '%Water%'
														or inf_name like '%Agricultural%'
														or inf_name like '%Energy%')");
				
				if(mysqli_num_rows($second_filter) > 0)
				{
					$second_hazard = mysqli_query($connection,"SELECT haz_ID, haz_desc FROM `r_terrain_hazard` WHERE haz_id = '$zcoor_terrain_hazard'
															and (haz_desc like '%Chemical%'
															or haz_desc like '%Slope%'
															or haz_desc like '%Factory%'
															or haz_desc like '%forest%'
														    or haz_desc like '%grass%'
														    or haz_desc like '%river%'
															or haz_desc like '%creek%'
															or haz_desc like '%None%')");

						if(mysqli_num_rows($second_hazard) > 0)
						{	
							//Children Function
							function hazardPic($Pic)
							{
								if($Pic == 'Chemical Factory')
								{
									return('<img src="../../../resources/images/Land-icons/biohazard.png" style="width:100px" />');
								}
								else if($Pic == 'Slopes')
								{
									return('<img src="../../../resources/images/Land-icons/landslide.png" style="width:100px" />');
								}
								else if($Pic == 'River')	 
								{
									return('<img src="../../../resources/images/Land-icons/creek.png" style="width:100px" />');
								}
								else if($Pic == 'Forest')	 
								{
									return('<img src="../../../resources/images/Land-icons/forest.png" style="width:100px" />');
								}
								else if($Pic == 'None')	 
								{
								  	return('<img src="../../../resources/images/Land-icons/survey.png" style="width:100px" />');
								}
							}
							//Children Function
							function hazardPic2($Pic2)
							{
								if($Pic2 == 'Chemical Factory')
								{   
									return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
								}
								else if($Pic2 == 'Slopes')
								{
									return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
								}
								else if($Pic2 == 'River')	 
								{
									return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
								}
								else if($Pic2 == 'Forest')	 
								{
									return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
								}
								else if($Pic2 == 'None')	 
								{
								  	return('<img src="../../../resources/images/Land-icons/approved.png" style="width:100px" />');
								}
							}
							//Children Function
							function hazardVerdict($hd_text)
							{
								if($hd_text == 'Chemical Factory')
								{
									$verdict = 'You cannot establish an infrastructure that is classified as ';
								}
								else if($hd_text == 'Slopes')
								{
									$verdict = 'You cannot establish an infrastructure that is classified as ';
								}
								else if($hd_text == 'River')	 
								{
									$verdict = 'You may establish but with caution, an infrastructure that is classified as ';
								}
								else if($hd_text == 'Forest')	 
								{
									$verdict = 'You may establish but with caution, an infrastructure that is classified as ';
								}
								else if($hd_text == 'None')	 
								{
								  	$verdict = 'You can proceed to establish an infrastructure that is classified as ';
								}
								return($verdict);
							}
							//Parent Function
							//Children Function
							function hazardDesc($hd_text)
							{
								if($hd_text == 'Chemical Factory')
								{
									$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
										        	&nbsp;&nbsp;&nbsp;
										        	Relocate to another location which is far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid contamition from Factory waste and other harmful foreign particles.
										        	<br>
										        	&nbsp;&nbsp;&nbsp;
										        	Also take note that you must choose an available location for zoning clearance and with better potential to build that kind of infrastructure. 
										        </p>';
								}
								else if($hd_text == 'Slopes')
								{
									$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
										        	&nbsp;&nbsp;&nbsp;
										        	Relocate to another location which is far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid collateral destruction and contamination from unexpected landslides.
										        	<br>
										        	&nbsp;&nbsp;&nbsp;
										        	It is also advised to avoid areas where residential and commercial infrstructure arises.
										        	<br>
										        	&nbsp;&nbsp;&nbsp;
										        	Also take note that you must choose an available location for zoning clearance and with better potential to build that kind of infrastructure. 
										        </p>';
								}
								else if($hd_text == 'River')	 
								{
									$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
										        	&nbsp;&nbsp;&nbsp;
										        	It is not recommended to build the infrastructure near a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid soil errosion due to the water absorption of the land, that may result to soften the foundation of the infrastructure. Also, it can cause flood in the future. You may establish an infrastructure, but proceed with caution.
										        	<br><br>
										        	&nbsp;&nbsp;&nbsp;
										        	It is also advised to avoid areas where residential and commercial infrstructure arises.
										        	<br><br>
										        	&nbsp;&nbsp;&nbsp;
										        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
										        </p>';
								}
								else if($hd_text == 'Forest')	 
								{
									$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
										        	&nbsp;&nbsp;&nbsp;
										        	It is not recommended to build the infrastructure near a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid pollutants to the Forest resorvoir and unwanted distraction from wild animals and other wild entities. You may establish an infrastructure, but proceed with caution.
										        	<br><br>
										        	&nbsp;&nbsp;&nbsp;
										        	It is also advised to avoid areas where residential and commercial infrstructure arises.
										        	<br><br>
										        	&nbsp;&nbsp;&nbsp;
										        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
										        </p>';
								}
								else if($hd_text == 'None')	 
								{
								  	$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
								  		        	&nbsp;&nbsp;&nbsp;
								  		        	Since there are no hazards near the location, it is clear to proceed in establishing the infrastructure.
								  		        	
								  		        	<br>
								  		        	&nbsp;&nbsp;&nbsp;
								  		        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
								  		        </p>';
								}
								return($text);
							}
							//Parent Function
							function hazard($hazard,$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer)
							{
								
							    if($hazard == 'Chemical Factory')	 
							    {
							    	$Pic = hazardPic('Chemical Factory');
							    	$Pic2 = hazardPic2('Chemical Factory');
							    	$Verdict = hazardVerdict('Chemical Factory');
							    	$Desc = hazardDesc('Chemical Factory');
							    }
							    else if($hazard == 'Slopes')	 
							    {
							         $Pic = hazardPic('Slopes');
							         $Pic2 = hazardPic2('Slopes');
							         $Verdict = hazardVerdict('Slopes');
							         $Desc = hazardDesc('Slopes');
							    }
							    else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
							    {
							    	$Pic = hazardPic('River');
							    	$Pic2 = hazardPic2('River');
							    	$Verdict = hazardVerdict('River');
							    	$Desc = hazardDesc('River');
							    }
							    else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
							    {
							    	$Pic = hazardPic('Forest');
							    	$Pic2 = hazardPic2('Forest');
							    	$Verdict = hazardVerdict('Forest');
							    	$Desc = hazardDesc('Forest');
							    }
							    else if($haz_desc == 'None')	 
							    {
							      	$Pic = hazardPic('None');
							      	$Pic2 = hazardPic2('None');
							      	$Verdict = hazardVerdict('None');
							      	$Desc = hazardDesc('None');
							      	
							    }
							    $statement = 
								'	
									<!--FIRST LEVEL-->
									<div class="row" style=" margin-top: 10px; color: white">
										<div class="col-md-5" style="border: 1px solid white; border-radius:15px; margin: 15px">
										    <div class="row" style="margin: 10px">
										      <div class="col-md-3" style="margin-top: 10px">
										      '.$Pic.'
										      </div>
										      <div class="col-md-9">
										      	<p style="font-size:16px; font-weight: bold">Evaluation:</p>
										        <p style="font-size: 14px; text-align: justify; font-weight: normal; color: white">
										        	&nbsp;&nbsp;&nbsp;
										        	'.$Verdict.'

										        	<span style="font-size:20px; color:#33ff33;" data-toggle="tooltip" title="'.$inf_desc.'">'.$inf_name.', </span>
										             near the '.$haz_desc.' with buffer zone radius of
										        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'. 
										        </p>

										      </div>
										    </div>
										</div>
										<!-- FIRST LEVEL-->

										<!--SECOND LEVEL-->
										<div class="col-md-6" style="border: 1px solid white; border-radius:15px; margin: 15px">
										    <div class="row" style="margin: 10px">
										      
										      <div class="col-md-3" style="margin-top: 10px">
										        '.$Pic2.'
										      </div>
										      <div class="col-md-9">
										      	<p style="font-size:16px; font-weight: bold">Recommendation:</p>
										        '.$Desc.'
										      </div>
										    </div>
										</div>
									</div>
									<!-- SECOND LEVEL-->	
								';
								return($statement);
							}
							if($haz_desc == 'Chemical Factory')	 
							{
								$echoString = hazard('Chemical Factory',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
								echo $echoString;
								// echo $statement;
							}
							else if($haz_desc == 'Slopes')
							{
								$echoString = hazard('Slopes',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
								echo $echoString;
							}
							else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
							{
								$echoString = hazard('River',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
								echo $echoString;
							}
							else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
							{
								$echoString = hazard('Forest',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
								echo $echoString;
							}
							else if($haz_desc == 'None')	 
							{
							    $echoString = hazard('None',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
								echo $echoString;
							}
						}
						else
						{
						  echo 
						  '	
						  	
						  ';
						}
				}
				else
				{
				
					$third_filter = mysqli_query($connection, "SELECT inf_id, inf_name FROM `r_infrastructures` WHERE inf_id = '$zcoor_inf_id' 
															and (inf_name like '%Farm%'
															or inf_name like '%Poultry%'
															or inf_name like '%Treatment%'
															or inf_name like '%Factory%'
															or inf_name like '%Industrial%'
															or inf_name like '%Landfill%'
															or inf_name like '%Waste%')");
					
					if(mysqli_num_rows($third_filter) > 0)
					{
						$third_hazard = mysqli_query($connection,"SELECT haz_ID, haz_desc FROM `r_terrain_hazard` WHERE haz_id = '$zcoor_terrain_hazard'
																and (haz_desc like '%Chemical%'
																or haz_desc like '%Slope%'
																or haz_desc like '%Factory%'
																or haz_desc like '%forest%'
															    or haz_desc like '%grass%'
															    or haz_desc like '%river%'
																or haz_desc like '%creek%'
																or haz_desc like '%None%')");

							if(mysqli_num_rows($third_hazard) > 0)
							{	
								//Children Function
								function hazardPic($Pic)
								{
									if($Pic == 'Chemical Factory')
									{
										return('<img src="../../../resources/images/Land-icons/biohazard.png" style="width:100px" />');
									}
									else if($Pic == 'Slopes')
									{
										return('<img src="../../../resources/images/Land-icons/landslide.png" style="width:100px" />');
									}
									else if($Pic == 'River')	 
									{
										return('<img src="../../../resources/images/Land-icons/creek.png" style="width:100px" />');
									}
									else if($Pic == 'Forest')	 
									{
										return('<img src="../../../resources/images/Land-icons/forest.png" style="width:100px" />');
									}
									else if($Pic == 'None')	 
									{
									  	return('<img src="../../../resources/images/Land-icons/survey.png" style="width:100px" />');
									}
								}
								//Children Function
								function hazardPic2($Pic2)
								{
									if($Pic2 == 'Chemical Factory')
									{   
										return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
									}
									else if($Pic2 == 'Slopes')
									{
										return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
									}
									else if($Pic2 == 'River')	 
									{
										return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
									}
									else if($Pic2 == 'Forest')	 
									{
										return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
									}
									else if($Pic2 == 'None')	 
									{
									  	return('<img src="../../../resources/images/Land-icons/approved.png" style="width:100px" />');
									}
								}
								//Children Function
								function hazardVerdict($hd_text)
								{
									if($hd_text == 'Chemical Factory')
									{
										$verdict = 'You cannot establish an infrastructure that is classified as ';
									}
									else if($hd_text == 'Slopes')
									{
										$verdict = 'You cannot establish an infrastructure that is classified as ';
									}
									else if($hd_text == 'River')	 
									{
										$verdict = 'You may establish but with caution, an infrastructure that is classified as ';
									}
									else if($hd_text == 'Forest')	 
									{
										$verdict = 'You may establish but with caution, an infrastructure that is classified as ';
									}
									else if($hd_text == 'None')	 
									{
									  	$verdict = 'You can proceed to establish an infrastructure that is classified as ';
									}
									return($verdict);
								}
								//Parent Function
								//Children Function
								function hazardDesc($hd_text)
								{
									if($hd_text == 'Chemical Factory')
									{
										$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
											        	&nbsp;&nbsp;&nbsp;
											        	It is not recommended to establish  an infrastructure near a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> because of the pollutants that may produced by the neighbouring factories, contamination and hazards within the radius is possible in a dangerous level.
											        	<br>
											        	&nbsp;&nbsp;&nbsp;
											        	Also take note that you must choose an available location for zoning clearance and with better potential to build that kind of infrastructure. 
											        </p>';
									}
									else if($hd_text == 'Slopes')
									{
										$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
											        	&nbsp;&nbsp;&nbsp;
											        	Relocate to another location which is far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid collateral destruction and contamination from unexpected landslides.
											        	<br><br.
											        	&nbsp;&nbsp;&nbsp;
											        	It is also advised to avoid areas where residential and commercial infrstructure arises.
											        	<br><br>
											        	&nbsp;&nbsp;&nbsp;
											        	You may proceed to build one, but please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
											        </p>';
									}
									else if($hd_text == 'River')	 
									{
										$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
											        	&nbsp;&nbsp;&nbsp;
											        	It is not recommended to build the infrastructure near a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid soil errosion due to the water absorption of the land, that may result to soften the foundation of the infrastructure. Contamination and hazards within the radius is possible in a dangerous level.
											        	<br><br>
											        	&nbsp;&nbsp;&nbsp;
											        	It is also advised to avoid areas where residential and commercial infrastructure arises.
											        	<br><br>
											        	&nbsp;&nbsp;&nbsp;
											        	Relocation of the  project site is highly recommended.
											        	<br><br>
											        	&nbsp;&nbsp;&nbsp;
											        	Also take note that you must choose an available location for zoning clearance and with better potential to build that kind of infrastructure. 
											        </p>';
									}
									else if($hd_text == 'Forest')	 
									{
										$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
											        	&nbsp;&nbsp;&nbsp;
											        	It is not recommended to build the infrastructure near a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid pollutants to the Forest resorvoir and unwanted distraction from wild animals and other wild entities. 
											        	<br><br>
											        	&nbsp;&nbsp;&nbsp;
											        	It is also advised to avoid areas where residential and commercial infrastructure arises.
											        	<br><br>
											        	&nbsp;&nbsp;&nbsp;
											        	Relocation of the  project site is highly recommended.
											        	<br><br>
											        	&nbsp;&nbsp;&nbsp;
											        	Also take note that you must choose an available location for zoning clearance and with better potential to build that kind of infrastructure. 
											        </p>';
									}
									else if($hd_text == 'None')	 
									{
									  	$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
									  		        	&nbsp;&nbsp;&nbsp;
									  		        	Since there are no hazards near the location, it is clear to proceed in establishing the infrastructure.
									  		        	
									  		        	<br>
									  		        	&nbsp;&nbsp;&nbsp;
									  		        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
									  		        </p>';
									}
									return($text);
								}
								//Parent Function
								function hazard($hazard,$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer)
								{
									
								    if($hazard == 'Chemical Factory')	 
								    {
								    	$Pic = hazardPic('Chemical Factory');
								    	$Pic2 = hazardPic2('Chemical Factory');
								    	$Verdict = hazardVerdict('Chemical Factory');
								    	$Desc = hazardDesc('Chemical Factory');
								    }
								    else if($hazard == 'Slopes')	 
								    {
								         $Pic = hazardPic('Slopes');
								         $Pic2 = hazardPic2('Slopes');
								         $Verdict = hazardVerdict('Slopes');
								         $Desc = hazardDesc('Slopes');
								    }
								    else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
								    {
								    	$Pic = hazardPic('River');
								    	$Pic2 = hazardPic2('River');
								    	$Verdict = hazardVerdict('River');
								    	$Desc = hazardDesc('River');
								    }
								    else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
								    {
								    	$Pic = hazardPic('Forest');
								    	$Pic2 = hazardPic2('Forest');
								    	$Verdict = hazardVerdict('Forest');
								    	$Desc = hazardDesc('Forest');
								    }
								    else if($haz_desc == 'None')	 
								    {
								      	$Pic = hazardPic('None');
								      	$Pic2 = hazardPic2('None');
								      	$Verdict = hazardVerdict('None');
								      	$Desc = hazardDesc('None');
								      	
								    }
								    $statement = 
									'	
										<!--FIRST LEVEL-->
										<div class="row" style=" margin-top: 10px; color: white">
											<div class="col-md-5" style="border: 1px solid white; border-radius:15px; margin: 15px">
											    <div class="row" style="margin: 10px">
											      <div class="col-md-3" style="margin-top: 10px">
											      '.$Pic.'
											      </div>
											      <div class="col-md-9">
											      	<p style="font-size:16px; font-weight: bold">Evaluation:</p>
											        <p style="font-size: 14px; text-align: justify; font-weight: normal; color: white">
											        	&nbsp;&nbsp;&nbsp;
											        	'.$Verdict.'

											        	<span style="font-size:20px; color:#33ff33;" data-toggle="tooltip" title="'.$inf_desc.'">'.$inf_name.', </span>
											             near the '.$haz_desc.' with buffer zone radius of
											        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'. 
											        </p>

											      </div>
											    </div>
											</div>
											<!-- FIRST LEVEL-->

											<!--SECOND LEVEL-->
											<div class="col-md-6" style="border: 1px solid white; border-radius:15px; margin: 15px">
											    <div class="row" style="margin: 10px">
											      
											      <div class="col-md-3" style="margin-top: 10px">
											        '.$Pic2.'
											      </div>
											      <div class="col-md-9">
											      	<p style="font-size:16px; font-weight: bold">Recommendation:</p>
											        '.$Desc.'
											      </div>
											    </div>
											</div>
										</div>
										<!-- SECOND LEVEL-->	
									';
									return($statement);
								}
								if($haz_desc == 'Chemical Factory')	 
								{
									$echoString = hazard('Chemical Factory',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
									echo $echoString;
									// echo $statement;
								}
								else if($haz_desc == 'Slopes')
								{
									$echoString = hazard('Slopes',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
									echo $echoString;
								}
								else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
								{
									$echoString = hazard('River',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
									echo $echoString;
								}
								else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
								{
									$echoString = hazard('Forest',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
									echo $echoString;
								}
								else if($haz_desc == 'None')	 
								{
								    $echoString = hazard('None',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
									echo $echoString;
								}
							}
							else
							{
							}
					}
					else
					{

						$fourth_filter = mysqli_query($connection, "SELECT inf_id, inf_name FROM `r_infrastructures` WHERE inf_id = '$zcoor_inf_id' 
																and (inf_name like '%Transportation%'
																or inf_name like '%Roads%')");
						
						if(mysqli_num_rows($fourth_filter) > 0)
						{
							$fourth_hazard = mysqli_query($connection,"SELECT haz_ID, haz_desc FROM `r_terrain_hazard` WHERE haz_id = '$zcoor_terrain_hazard'
																	and (haz_desc like '%Chemical%'
																	or haz_desc like '%Slope%'
																	or haz_desc like '%Factory%'
																	or haz_desc like '%forest%'
																    or haz_desc like '%grass%'
																    or haz_desc like '%river%'
																	or haz_desc like '%creek%'
																	or haz_desc like '%None%')");

								if(mysqli_num_rows($fourth_hazard) > 0)
								{	
									//Children Function
									function hazardPic($Pic)
									{
										if($Pic == 'Chemical Factory')
										{
											return('<img src="../../../resources/images/Land-icons/biohazard.png" style="width:100px" />');
										}
										else if($Pic == 'Slopes')
										{
											return('<img src="../../../resources/images/Land-icons/landslide.png" style="width:100px" />');
										}
										else if($Pic == 'River')	 
										{
											return('<img src="../../../resources/images/Land-icons/creek.png" style="width:100px" />');
										}
										else if($Pic == 'Forest')	 
										{
											return('<img src="../../../resources/images/Land-icons/forest.png" style="width:100px" />');
										}
										else if($Pic == 'None')	 
										{
										  	return('<img src="../../../resources/images/Land-icons/survey.png" style="width:100px" />');
										}
									}
									//Children Function
									function hazardPic2($Pic2)
									{
										if($Pic2 == 'Chemical Factory')
										{   
											return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
										}
										else if($Pic2 == 'Slopes')
										{
											return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
										}
										else if($Pic2 == 'River')	 
										{
											return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
										}
										else if($Pic2 == 'Forest')	 
										{
											return('<img src="../../../resources/images/Land-icons/relocate.png" style="width:100px" />');
										}
										else if($Pic2 == 'None')	 
										{
										  	return('<img src="../../../resources/images/Land-icons/approved.png" style="width:100px" />');
										}
									}
									//Children Function
									function hazardVerdict($hd_text)
									{
										if($hd_text == 'Chemical Factory')
										{
											$verdict = 'You may establish an infrastructure that is classified as ';
										}
										else if($hd_text == 'Slopes')
										{
											$verdict = 'You may establish an infrastructure that is classified as ';
										}
										else if($hd_text == 'River')	 
										{
											$verdict = 'You may establish but with caution, an infrastructure that is classified as ';
										}
										else if($hd_text == 'Forest')	 
										{
											$verdict = 'You may establish but with caution, an infrastructure that is classified as ';
										}
										else if($hd_text == 'None')	 
										{
										  	$verdict = 'You can proceed to establish an infrastructure that is classified as ';
										}
										return($verdict);
									}
									//Parent Function
									//Children Function
									function hazardDesc($hd_text)
									{
										if($hd_text == 'Chemical Factory')
										{
											$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
												        	&nbsp;&nbsp;&nbsp;
												        	There are no critical factors that may affect the construction near a <span style="color: #ff6666; font-size:20px;">'.$hd_text.'.</span> 
												        	<br>
												        	&nbsp;&nbsp;&nbsp;
												        	You may proceed to the construction, but please be advised that it is still recommended to inspect the physical location and the perimeter buildings near the infrastructure for assurance before issuing the location ground clearance. 
												        </p>';
										}
										else if($hd_text == 'Slopes')
										{
											$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
												        	&nbsp;&nbsp;&nbsp;
												        	It is recommended to relocate to another location which is far from  a <span style="color: #ff6666; font-size:20px;">'.$hd_text.',</span> to avoid collateral damage and road blocks from unexpected landslides.
												        	<br><br.
												        	&nbsp;&nbsp;&nbsp;
												        	It is also advised to avoid areas where residential and commercial infrstructure arises.
												        	<br><br>
												        	&nbsp;&nbsp;&nbsp;
												        	You may proceed to the construction, but please be advised that it is still recommended to inspect the physical location and the perimeter buildings near the infrastructure for assurance before issuing the location ground clearance. 
												        </p>';
										}
										else if($hd_text == 'River')	 
										{
											$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
												        	&nbsp;&nbsp;&nbsp;
												        	Specifications will depend on the physical structure of the infrastructure and the location of the <span style="color: #ff6666; font-size:20px;">'.$hd_text.'.</span>
												        	<br><br>
												        	&nbsp;&nbsp;&nbsp;
												        	If the infrsatructure is to be constructed across the <span style="color: #ff6666; font-size:20px;">'.$hd_text.'.</span>, it is recommended to buid a BRIDGE. 
												        	<br><br>
												        	&nbsp;&nbsp;&nbsp;
												        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
												        </p>';
										}
										else if($hd_text == 'Forest')	 
										{
											$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
												        	&nbsp;&nbsp;&nbsp;
												        	There are no critical factors that may affect the construction near a <span style="color: #ff6666; font-size:20px;">'.$hd_text.'.</span> 
												        	<br>
												        	&nbsp;&nbsp;&nbsp;
												        	Please be guided to strictly follow the laws about cutting trees and environment preservation.
												        	<br><br>
												        	&nbsp;&nbsp;&nbsp;
												        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
												        </p>';
										}
										else if($hd_text == 'None')	 
										{
										  	$text = '<p style="font-size: 14px; text-align: justify; font-weight: normal;">
										  		        	&nbsp;&nbsp;&nbsp;
										  		        	Since there are no hazards near the location, it is clear to proceed in establishing the infrastructure.
										  		        	
										  		        	<br>
										  		        	&nbsp;&nbsp;&nbsp;
										  		        	But please be advised that it is still recommended to inspect the physical location for assurance before issuing the location ground clearance. 
										  		        </p>';
										}
										return($text);
									}
									//Parent Function
									function hazard($hazard,$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer)
									{
										
									    if($hazard == 'Chemical Factory')	 
									    {
									    	$Pic = hazardPic('Chemical Factory');
									    	$Pic2 = hazardPic2('Chemical Factory');
									    	$Verdict = hazardVerdict('Chemical Factory');
									    	$Desc = hazardDesc('Chemical Factory');
									    }
									    else if($hazard == 'Slopes')	 
									    {
									         $Pic = hazardPic('Slopes');
									         $Pic2 = hazardPic2('Slopes');
									         $Verdict = hazardVerdict('Slopes');
									         $Desc = hazardDesc('Slopes');
									    }
									    else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
									    {
									    	$Pic = hazardPic('River');
									    	$Pic2 = hazardPic2('River');
									    	$Verdict = hazardVerdict('River');
									    	$Desc = hazardDesc('River');
									    }
									    else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
									    {
									    	$Pic = hazardPic('Forest');
									    	$Pic2 = hazardPic2('Forest');
									    	$Verdict = hazardVerdict('Forest');
									    	$Desc = hazardDesc('Forest');
									    }
									    else if($haz_desc == 'None')	 
									    {
									      	$Pic = hazardPic('None');
									      	$Pic2 = hazardPic2('None');
									      	$Verdict = hazardVerdict('None');
									      	$Desc = hazardDesc('None');
									      	
									    }
									    $statement = 
										'	
											<!--FIRST LEVEL-->
											<div class="row" style=" margin-top: 10px; color: white">
												<div class="col-md-5" style="border: 1px solid white; border-radius:15px; margin: 15px">
												    <div class="row" style="margin: 10px">
												      <div class="col-md-3" style="margin-top: 10px">
												      '.$Pic.'
												      </div>
												      <div class="col-md-9">
												      	<p style="font-size:16px; font-weight: bold">Evaluation:</p>
												        <p style="font-size: 14px; text-align: justify; font-weight: normal; color: white">
												        	&nbsp;&nbsp;&nbsp;
												        	'.$Verdict.'

												        	<span style="font-size:20px; color:#33ff33;" data-toggle="tooltip" title="'.$inf_desc.'">'.$inf_name.', </span>
												             near the '.$haz_desc.' with buffer zone radius of
												        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'. 
												        </p>

												      </div>
												    </div>
												</div>
												<!-- FIRST LEVEL-->

												<!--SECOND LEVEL-->
												<div class="col-md-6" style="border: 1px solid white; border-radius:15px; margin: 15px">
												    <div class="row" style="margin: 10px">
												      
												      <div class="col-md-3" style="margin-top: 10px">
												        '.$Pic2.'
												      </div>
												      <div class="col-md-9">
												      	<p style="font-size:16px; font-weight: bold">Recommendation:</p>
												        '.$Desc.'
												      </div>
												    </div>
												</div>
											</div>
											<!-- SECOND LEVEL-->	
										';
										return($statement);
									}
									if($haz_desc == 'Chemical Factory')	 
									{
										$echoString = hazard('Chemical Factory',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
										echo $echoString;
										// echo $statement;
									}
									else if($haz_desc == 'Slopes')
									{
										$echoString = hazard('Slopes',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
										echo $echoString;
									}
									else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
									{
										$echoString = hazard('River',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
										echo $echoString;
									}
									else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
									{
										$echoString = hazard('Forest',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
										echo $echoString;
									}
									else if($haz_desc == 'None')	 
									{
									    $echoString = hazard('None',$haz_desc,$inf_desc,$inf_name,$zcoor_buffer_unit,$zcoor_buffer);
										echo $echoString;
									}
								}
						}
					}
			
				}
			}


			

		}
		//echo $zcoor_inf_id;
	}
?>