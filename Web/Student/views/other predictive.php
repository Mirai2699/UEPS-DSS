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
			//$zcoor_terrain_hazard = 2;

			$inf_name = $row2['inf_name'];
			$haz_desc = $row2['haz_desc'];

			$first_filter = mysqli_query($connection, "SELECT inf_id, inf_name FROM `r_infrastructures` WHERE inf_id = '$zcoor_inf_id' 
														and (inf_name like '%Residential%'  
														or inf_name like '%Education%' 
														or inf_name like '%Health%'
														or inf_name like '%Economic%'
														or inf_name like '%Culture%'
														or inf_name like '%Technology%'
														or inf_name like '%Public%'
														or inf_name like '%Financial%')");
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
					if($haz_desc == 'Chemical Factory')	 
					{
						echo 
						'	
							<!--FIRST LEVEL-->
							
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/biohazard.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Evaluation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
							        	&nbsp;&nbsp;&nbsp;
							        	You cannot establish an infrastructure that is classified as 
							        	'.$inf_name.' building near the '.$haz_desc.' with buffer zone radius of
							        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
							        </p>
							      </div>
							    </div>
							</div>
							<!-- FIRST LEVEL-->

							<!--SECOND LEVEL-->
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/relocate.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Recommendation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
							        	&nbsp;&nbsp;&nbsp;
							        	Relocate to another location which is near to a population that engages community activities
							        	(Schools, Parks, Health and Wellness Centers), far from  a '.$haz_desc.'.
							        	<br>
							        	&nbsp;&nbsp;&nbsp;
							        	Also take note that you must choose an available location for zoning clearance. 
							        </p>
							      </div>
							    </div>
							</div>
							<!-- SECOND LEVEL-->	
						';
					}
					else if($haz_desc == 'Slopes')
					{
						echo 
						'	
							<!--FIRST LEVEL-->
							
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/landslide.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Evaluation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
							        	&nbsp;&nbsp;&nbsp;
							        	You cannot establish an infrastructure that is classified as 
							        	'.$inf_name.' building near the '.$haz_desc.' with buffer zone radius of
							        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
							        </p>
							      </div>
							    </div>
							</div>
							<!-- FIRST LEVEL-->

							<!--SECOND LEVEL-->
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/relocate.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Recommendation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
							        	&nbsp;&nbsp;&nbsp;
							        	Relocate to another location which is near to a population that engages community activities
							        	(Schools, Parks, Health and Wellness Centers), far from  a '.$haz_desc.'.
							        	<br>
							        	&nbsp;&nbsp;&nbsp;
							        	Also take note that you must choose an available location for zoning clearance. 
							        </p>
							      </div>
							    </div>
							</div>
							<!-- SECOND LEVEL-->	
						';
					}
					else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
					{
						echo 
						'	
							<!--FIRST LEVEL-->
							
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/creek.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Evaluation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
							        	&nbsp;&nbsp;&nbsp;
							        	It is not recommended to build an infrastructure that is classified as 
							        	'.$inf_name.' building near the '.$haz_desc.' with buffer zone radius of
							        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. <br>
							        	&nbsp;&nbsp;&nbsp;
							        	Though not recommended, but is allowed to construct one but with the right precautions and physical location inspection.
							        </p>
							      </div>
							    </div>
							</div>
							<!-- FIRST LEVEL-->

							<!--SECOND LEVEL-->
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/warning.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Recommendation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
							        	&nbsp;&nbsp;&nbsp;
							        	Be careful on building establishments near '.$haz_desc.'s, land hold and stability will loose as the time passes by,
							        	that can contribute to weaken the foundation of the establishments.
							        	It is recommended to conduct a physical location inspection  for assurance.
							        </p>
							      </div>
							    </div>
							</div>
							<!-- SECOND LEVEL-->	
						';
					}
					else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
					{
						echo 
						'	
							<!--FIRST LEVEL-->
							
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/forest.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Evaluation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
							        	&nbsp;&nbsp;&nbsp;
							        	It is not recommended to build an infrastructure that is classified as 
							        	'.$inf_name.' building near the '.$haz_desc.' with buffer zone radius of
							        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. <br>
							        	&nbsp;&nbsp;&nbsp;
							        	Though not recommended, but is allowed to construct one but with the right precautions and physical location inspection.
							        </p>
							      </div>
							    </div>
							</div>
							<!-- FIRST LEVEL-->

							<!--SECOND LEVEL-->
							<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
							    <div class="row" style="margin: 10px">
							      
							      <div class="col-md-3" style="margin-top: 10px">
							        <img src="../../../resources/images/Land-icons/warning.png" style="width:80px" />
							      </div>
							      <div class="col-md-9">
							      	<p style="font-size:14px;">Recommendation:</p>
							        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
							        	&nbsp;&nbsp;&nbsp;
							        	Be careful on building establishments near '.$haz_desc.'s, because some factors that may affect the people inside the
							        	building like distrction from wild animals, insects, and falling branches from trees.
							        	It is recommended to conduct a physical location inspection  for assurance.
							        </p>
							      </div>
							    </div>
							</div>
							<!-- SECOND LEVEL-->	
						';
					}
					else if($haz_desc == 'None')	 
					{
					  echo 
					  '	
					  	<!--FIRST LEVEL-->
					  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
					  	    <div class="row" style="margin: 10px">
					  	      
					  	      <div class="col-md-3" style="margin-top: 10px">
					  	        <img src="../../../resources/images/Land-icons/survey.png" style="width:80px" />
					  	      </div>
					  	      <div class="col-md-9">
					  	      	<p style="font-size:14px;">Evaluation:</p>
					  	        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
					  	        	&nbsp;&nbsp;&nbsp;
					  	        	It is safe to establish an infrastructure that is classified as 
					  	        	"'.$inf_name.'", with buffer zone radius of
					  	        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
					  	        	<br>
					  	        	&nbsp;&nbsp;&nbsp;
					  	        	Despite the status of being safe, surveying and further study about the location is still recommended.
					  	        </p>
					  	      </div>
					  	    </div>
					  	</div>
					  	<!-- FIRST LEVEL-->

					  	<!--SECOND LEVEL-->
					  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
					  	    <div class="row" style="margin: 10px">
					  	      
					  	      <div class="col-md-3" style="margin-top: 10px">
					  	        <img src="../../../resources/images/Land-icons/approved.png" style="width:80px" />
					  	      </div>
					  	      <div class="col-md-9">
					  	      	<p style="font-size:14px;">Recommendation:</p>
					  	        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
					  	        	&nbsp;&nbsp;&nbsp;
					  	        	Based on the evaluation, the perimeter of the said location is free from any hazards.
					  	        	<br>
					  	        	&nbsp;&nbsp;&nbsp;
					  	        	It is still recommended to conduct physical location inspection for assurance. 
					  	        </p>
					  	      </div>
					  	    </div>
					  	</div>
					  	<!-- SECOND LEVEL-->	
					  ';
					}
				}
				else
				{
				  echo 
				  '	
				  	<!--FIRST LEVEL-->
				  
				  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
				  	    <div class="row" style="margin: 10px">
				  	      
				  	      <div class="col-md-3" style="margin-top: 10px">
				  	        <img src="../../../resources/images/Land-icons/survey.png" style="width:80px" />
				  	      </div>
				  	      <div class="col-md-9">
				  	      	<p style="font-size:14px;">Evaluation:</p>
				  	        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
				  	        	&nbsp;&nbsp;&nbsp;
				  	        	It is safe to establish an infrastructure that is classified as 
				  	        	"'.$inf_name.'", with buffer zone radius of
				  	        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
				  	        	<br>
				  	        	&nbsp;&nbsp;&nbsp;
				  	        	Despite the status of being safe, surveying and further study about the location is still recommended.
				  	        </p>
				  	      </div>
				  	    </div>
				  	</div>
				  	<!-- FIRST LEVEL-->

				  	<!--SECOND LEVEL-->
				  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
				  	    <div class="row" style="margin: 10px">
				  	      
				  	      <div class="col-md-3" style="margin-top: 10px">
				  	        <img src="../../../resources/images/Land-icons/approved.png" style="width:80px" />
				  	      </div>
				  	      <div class="col-md-9">
				  	      	<p style="font-size:14px;">Recommendation:</p>
				  	        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
				  	        	&nbsp;&nbsp;&nbsp;
				  	        	Based on the evaluation, the perimeter of the said location is free from any hazards.
				  	        	<br>
				  	        	&nbsp;&nbsp;&nbsp;
				  	        	It is still recommended to conduct physical location inspection for assurance. 
				  	        </p>
				  	      </div>
				  	    </div>
				  	</div>
				  	<!-- SECOND LEVEL-->	
				  ';
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
							if($haz_desc == 'Chemical Factory')	 
							{
								echo 
								'	
									<!--FIRST LEVEL-->
									 
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/biohazard.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Evaluation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
									        	&nbsp;&nbsp;&nbsp;
									        	You cannot establish an infrastructure that is classified as 
									        	"'.$inf_name.'", near the '.$haz_desc.' with buffer zone radius of
									        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
									        </p>
									      </div>
									    </div>
									</div>
									<!-- FIRST LEVEL-->



									<!--SECOND LEVEL-->
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/relocate.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Recommendation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
									        	&nbsp;&nbsp;&nbsp;
									        	Relocate to another location which is far from a crowded population and less human interaction to lessen contamination and to avoid destruction from '.$haz_desc.'.
									        	<br>
									        	&nbsp;&nbsp;&nbsp;
									        	Also take note that you must choose an available location for zoning clearance. 
									        </p>
									      </div>
									    </div>
									</div>
									<!-- SECOND LEVEL-->	
								';
							}
							else if($haz_desc == 'Slopes')
							{
								echo 
								'	
									<!--FIRST LEVEL-->
									 
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/landslide.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Evaluation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
									        	&nbsp;&nbsp;&nbsp;
									        	You cannot establish an infrastructure that is classified as 
									        	"'.$inf_name.'" near the '.$haz_desc.' with buffer zone radius of
									        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
									        </p>
									      </div>
									    </div>
									</div>
									<!-- FIRST LEVEL-->



									<!--SECOND LEVEL-->
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/relocate.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Recommendation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
									        	&nbsp;&nbsp;&nbsp;
									        	Relocate to another location which is far from a crowded population and less human interaction to lessen contamination and to avoid destruction from '.$haz_desc.'.<br>
									        	&nbsp;&nbsp;&nbsp;
									        	Also take note that you must choose an available location for zoning clearance. 
									        </p>
									      </div>
									    </div>
									</div>
									<!-- SECOND LEVEL-->	
								';
							}
							else if($haz_desc == 'River' || $haz_desc == 'Creek')	 
							{
								echo 
								'	
									<!--FIRST LEVEL-->
									 
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/creek.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Evaluation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
									        	&nbsp;&nbsp;&nbsp;
									        	Depending on the size of the '.$haz_desc.', the status if it is clean or not,
									        	will be the basis for recommenation to build an infrastructure that is classified as 
									        	'.$inf_name.', with buffer zone radius of
									        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. <br>
									        	&nbsp;&nbsp;&nbsp;
									        	
									        </p>
									      </div>
									    </div>
									</div>
									<!-- FIRST LEVEL-->

									<!--SECOND LEVEL-->
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/warning.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Recommendation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
									        	&nbsp;&nbsp;&nbsp;
									        	If it is clean and safe, then it is recommended for agricultural irrigation, environmental farms and parks, or water treatment facility.<br>
									        	&nbsp;&nbsp;&nbsp;
									        	It is recommended to conduct a physical location inspection  for assurance.
									        </p>
									      </div>
									    </div>
									</div>
									<!-- SECOND LEVEL-->	
								';
							}
							else if($haz_desc == 'Forest' || $haz_desc == 'Grassy')	 
							{
								echo 
								'	
									<!--FIRST LEVEL-->
									 
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/forest.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Evaluation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
									        	&nbsp;&nbsp;&nbsp;
									        	Infrastructures like '.$inf_name.', can occupy a large space, considering also the project area of '.$za_project_area .' Sq m<sup>2</sup>, with buffer zone radius of
									        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. <br>
									        	&nbsp;&nbsp;&nbsp;
									        	With these given details, it is safe to build one, but consider the environmental guidelines and the section in the national building code that protects the forestries.
									        </p>
									      </div>
									    </div>
									</div>
									<!-- FIRST LEVEL-->

									<!--SECOND LEVEL-->
									<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
									    <div class="row" style="margin: 10px">
									      
									      <div class="col-md-3" style="margin-top: 10px">
									        <img src="../../../resources/images/Land-icons/warning.png" style="width:80px" />
									      </div>
									      <div class="col-md-9">
									      	<p style="font-size:14px;">Recommendation:</p>
									        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
									        	&nbsp;&nbsp;&nbsp;
									        	Take caution of building infrastructures like '.$inf_name.' facilities, near 
									        	'.$haz_desc.', as it may contiminate and disrupt the facility depending on the status of the surroundings.<br>
									        	&nbsp;&nbsp;&nbsp;
									        	It is recommended to conduct a physical location inspection  for assurance.
									        </p>
									      </div>
									    </div>
									</div>
									<!-- SECOND LEVEL-->	
								';
							}
							else if($haz_desc == 'None')	 
							{
							  echo 
							  '	
							  	<!--FIRST LEVEL-->
							  	
							  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
							  	    <div class="row" style="margin: 10px">
							  	      
							  	      <div class="col-md-3" style="margin-top: 10px">
							  	        <img src="../../../resources/images/Land-icons/survey.png" style="width:80px" />
							  	      </div>
							  	      <div class="col-md-9">
							  	      	<p style="font-size:14px;">Evaluation:</p>
							  	        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	It is safe to establish an infrastructure that is classified as 
							  	        	"'.$inf_name.'", with buffer zone radius of
							  	        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
							  	        	<br>
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	Despite the status of being safe, surveying and further study about the location is still recommended.
							  	        </p>
							  	      </div>
							  	    </div>
							  	</div>
							  	<!-- FIRST LEVEL-->

							  	<!--SECOND LEVEL-->
							  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
							  	    <div class="row" style="margin: 10px">
							  	      
							  	      <div class="col-md-3" style="margin-top: 10px">
							  	        <img src="../../../resources/images/Land-icons/approved.png" style="width:80px" />
							  	      </div>
							  	      <div class="col-md-9">
							  	      	<p style="font-size:14px;">Recommendation:</p>
							  	        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	Based on the evaluation, the perimeter of the said location is free from any hazards.
							  	        	<br>
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	It is still recommended to conduct physical location inspection for assurance. 
							  	        </p>
							  	      </div>
							  	    </div>
							  	</div>
							  	<!-- SECOND LEVEL-->	
							  ';
							}
							else if($haz_desc == 'None')	 
							{
							  echo 
							  '	
							  	<!--FIRST LEVEL-->
							  	
							  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
							  	    <div class="row" style="margin: 10px">
							  	      
							  	      <div class="col-md-3" style="margin-top: 10px">
							  	        <img src="../../../resources/images/Land-icons/survey.png" style="width:80px" />
							  	      </div>
							  	      <div class="col-md-9">
							  	      	<p style="font-size:14px;">Evaluation:</p>
							  	        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	It is safe to establish an infrastructure that is classified as 
							  	        	"'.$inf_name.'", with buffer zone radius of
							  	        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
							  	        	<br>
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	Despite the status of being safe, surveying and further study about the location is still recommended.
							  	        </p>
							  	      </div>
							  	    </div>
							  	</div>
							  	<!-- FIRST LEVEL-->

							  	<!--SECOND LEVEL-->
							  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
							  	    <div class="row" style="margin: 10px">
							  	      
							  	      <div class="col-md-3" style="margin-top: 10px">
							  	        <img src="../../../resources/images/Land-icons/approved.png" style="width:80px" />
							  	      </div>
							  	      <div class="col-md-9">
							  	      	<p style="font-size:14px;">Recommendation:</p>
							  	        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	Based on the evaluation, the perimeter of the said location is free from any hazards.
							  	        	<br>
							  	        	&nbsp;&nbsp;&nbsp;
							  	        	It is still recommended to conduct physical location inspection for assurance. 
							  	        </p>
							  	      </div>
							  	    </div>
							  	</div>
							  	<!-- SECOND LEVEL-->	
							  ';
							}
						}
						else
						{
						  echo 
						  '	
						  	<!--FIRST LEVEL-->
						  	
						  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
						  	    <div class="row" style="margin: 10px">
						  	      
						  	      <div class="col-md-3" style="margin-top: 10px">
						  	        <img src="../../../resources/images/Land-icons/survey.png" style="width:80px" />
						  	      </div>
						  	      <div class="col-md-9">
						  	      	<p style="font-size:14px;">Evaluation:</p>
						  	        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
						  	        	&nbsp;&nbsp;&nbsp;
						  	        	It is safe to establish an infrastructure that is classified as 
						  	        	"'.$inf_name.'", with buffer zone radius of
						  	        	'.$zcoor_buffer.' '.$zcoor_buffer_unit.'s. 
						  	        	<br>
						  	        	&nbsp;&nbsp;&nbsp;
						  	        	Despite the status of being safe, surveying and further study about the location is still recommended.
						  	        </p>
						  	      </div>
						  	    </div>
						  	</div>
						  	<!-- FIRST LEVEL-->

						  	<!--SECOND LEVEL-->
						  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px; margin-top: 10px">
						  	    <div class="row" style="margin: 10px">
						  	      
						  	      <div class="col-md-3" style="margin-top: 10px">
						  	        <img src="../../../resources/images/Land-icons/approved.png" style="width:80px" />
						  	      </div>
						  	      <div class="col-md-9">
						  	      	<p style="font-size:14px;">Recommendation:</p>
						  	        <p style="font-size: 13px; text-align: justify; font-weight: normal;">
						  	        	&nbsp;&nbsp;&nbsp;
						  	        	Based on the evaluation, the perimeter of the said location is free from any hazards.
						  	        	<br>
						  	        	&nbsp;&nbsp;&nbsp;
						  	        	It is still recommended to conduct physical location inspection for assurance. 
						  	        </p>
						  	      </div>
						  	    </div>
						  	</div>
						  	<!-- SECOND LEVEL-->	
						  ';
						}
				}
				else
				{
					  echo 
					  '	
					  	<!--FIRST LEVEL-->
					  	
					  	<div class="col-md-12" style="border: 1px solid white; border-radius:15px">
					  	    <div class="row" style="margin: 10px">
					  	      
					  	      <div class="col-md-3" style="margin-top: 10px">
					  	        <img src="../../../resources/images/Land-icons/construction.png" style="width:90px" />
					  	      </div>
					  	      <div class="col-md-9">
					  	      	<p style="font-size:14px;">Evaluation and Recommendation:</p>
					  	        <p style="font-size: 13px; text-align: justify; font-weight: normal; color: white">
					  	        	&nbsp;&nbsp;&nbsp;
					  	        	Sorry, but this kind of scenario still has a little problem in terms of analyzing the exact problems 
					  	        	which makes the system have its difficulty in providing solutions and recommendation. 
					  	        	<br>
					  	        	&nbsp;&nbsp;&nbsp;
					  	        	It is recommended to do surveying and further study about the said location and infrastructure.
					  	        </p>
					  	      </div>
					  	    </div>
					  	</div>
					  	<!-- FIRST LEVEL-->

					  	
					  ';
			
				}
			}


			

		}
		//echo $zcoor_inf_id;
	}
?>