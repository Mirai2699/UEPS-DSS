<?php 
    include('../../../db_con.php'); 
    $id = $_GET['id'];
    $zoning_query = @mysqli_query($connection,"
            
SELECT
        tzc.zcoor_id id, 
        tzc.zcoor_name 'name',
        tzc.zcoor_type type,
        tzc.zcoor_address address,
        tzc.zcoor_desc 'desc',
        tzc.zcoor_area area,
        tzc.zcoor_buffer buffer,
        tzc.zcoor_buffer_unit buffer_unit,
        tzc.zcoor_remarks remarks,
        tzc.zcoor_terrain_year_tenure terrainYear,
        tzc.zcoor_terrain_hazard terrainHazard,
        tzc.inf_id infra,
        rlu.lu_color,
        ri.inf_name infratext 
            FROM
        t_zoning_coordinates tzc
        INNER JOIN r_infrastructures ri ON tzc.inf_id = ri.inf_id 
				INNER JOIN t_zoning_application tza ON tza.za_ID = tzc.za_ID
				INNER JOIN r_land_use rlu ON rlu.lu_ID = tza.za_land_use_ID
        WHERE tzc.za_id = $id
    ");
    $container = array();
    while($zoning_row = @mysqli_fetch_assoc($zoning_query)){
        $coordinates_collection = array();
        $haz_desc = @mysqli_fetch_array(mysqli_query($connection,"SELECT haz_desc FROM r_terrain_hazard where haz_ID = $zoning_row[terrainHazard]"))[0]or die(0); 
        $coordinates_query = @mysqli_query($connection,"SELECT coor_id,layt_type,zcoor_type,coor_lat,coor_long FROM 
(
	SELECT cordet.coor_id coor_id, layt.layt_type  layt_type, zc.zcoor_type zcoor_type, coor_lat,coor_long FROM t_coordinates_details cordet
	RIGHT JOIN t_layers_type layt on cordet.layt_id = layt.layt_id 
	RIGHT JOIN t_zoning_coordinates zc on cordet.zcoor_id = zc.zcoor_id
	WHERE cordet.zcoor_id=$zoning_row[id]  and isnull(cordet.layt_id) 
	UNION ALL
	SELECT cordet.coor_id coor_id, layt.layt_type  layt_type, zc.zcoor_type zcoor_type, coor_lat,coor_long FROM t_coordinates_details cordet
	LEFT JOIN t_layers_type layt on cordet.layt_id = layt.layt_id 
	LEFT JOIN t_zoning_coordinates zc on cordet.zcoor_id = zc.zcoor_id 
	WHERE cordet.zcoor_id=$zoning_row[id]  and isnull(cordet.layt_id) 
) zcoor_layers order by coor_id asc");
        
                $coordinates_list = array();
        
                while($coordinates_row = @mysqli_fetch_assoc($coordinates_query)){
                if(strtolower($coordinates_row['zcoor_type'])=='polygon'){
                $coordinates = array($coordinates_row['coor_lat'],$coordinates_row['coor_long']);
                array_push($coordinates_list,$coordinates);
                }

                if(strtolower($coordinates_row['zcoor_type'])=='point'){
                    
                $coordinates_collection = array($coordinates_row['coor_lat'],$coordinates_row['coor_long']);
                }


                if(strtolower($coordinates_row['zcoor_type'])=='linestring'){
                    
                    $coordinates_list = array($coordinates_row['coor_lat'],$coordinates_row['coor_long']);
                    array_push($coordinates_collection,$coordinates_list);
                
                }

                } 
            
                array_push($coordinates_collection,$coordinates_list); 
            
        $features = array(
            "type"=>"Feature",
            "properties"=>array(
                "zaid"=>$id,
                "zcoor"=>$zoning_row['id'],
                "name"=>$zoning_row['name'],
                "type"=>$zoning_row['type'],
                "address"=>$zoning_row['address'],
                "color"=>$zoning_row['lu_color'],
                "desc"=>$zoning_row['desc'],
                "area"=>$zoning_row['area'],
                "buffer"=>$zoning_row['buffer'],
                "buffer_unit"=>$zoning_row['buffer_unit'],
                "remarks"=>$zoning_row['remarks'],
                "infra"=>$zoning_row['infra'],
                "infratext"=>$zoning_row['infratext'],
                "terrainYear"=>$zoning_row['terrainYear'],
                "terrainHazard"=>$zoning_row['terrainHazard'],
                "terrainHazardText"=>$haz_desc,
            ),
            "geometry"=>array(
                "type"=>$zoning_row['type'],
                "coordinates"=>$coordinates_collection
            )
        );
         
        array_push($container,$features);
    }
    echo json_encode($container);
?>
