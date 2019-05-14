<div style="border: 1px solid;" style="background-color: #6e6e6e">
        <table  class="display table table-bordered table-striped">
            <thead>
            <tr>
                <th class="hidden">task_ID</th>
                <th style="text-align: center">Inclusive Conditions</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $get_condition = mysqli_query($connection,"SELECT * FROM `t_zoning_issuance_conditions` AS ZIC
                                                            INNER JOIN `r_zoning_conditions` AS ZC
                                                            ON ZIC.zic_zc_no = ZC.zc_ID
                                                            WHERE ZIC.zic_dec_no = '$zdec_ID'
                                                            ORDER BY ZIC.zic_zc_no ASC");
                while($row3 = mysqli_fetch_assoc($get_condition))
                {
                    $zc_ID = $row3["zc_ID"];
                    $zc_type = $row3["zc_type"];
                    $zc_desc = $row3["zc_desc"];
                    
                        echo 
                        '
                            <tr class="gradeX">
                                <td class="hidden">'.$zc_ID.'</td>
                                <td style="text-align:left; color:black; font-size: 13px">'.$zc_desc.'</td>
                            </tr>  
                        ';  
                    
                }         
            ?>      
            </tbody>
        </table>
</div>