<div style="border: 1px solid;" style="background-color: #6e6e6e">
        <input type="hidden" name="pro_ID" value="<?php echo $pd_ID?>">
        <table  class="display table table-bordered table-striped">
            <thead>
                <script language="JavaScript">
                    function selectAll(source) {
                        checkboxes = document.getElementsByName('checkstat[]');
                        for(var i in checkboxes)
                            checkboxes[i].checked = source.checked;
                    }
                </script>
            <tr>
                <th class="hidden">task_ID</th>
                <th style="text-align: center">
                    <div class="checkbox">
                        <input  type="checkbox" id="selectall" onClick="selectAll(this)" style="width: 30px; height: 20px" />
                        <label>Select All</label>
                    </div>
                </th>
                <th style="text-align: center">Condition Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $get_condiotion = mysqli_query($connection,"SELECT * FROM `r_zoning_conditions` 
                                                        ORDER BY zc_ID ASC");
                while($row3 = mysqli_fetch_assoc($get_condiotion))
                {
                    $zc_ID = $row3["zc_ID"];
                    $zc_type = $row3["zc_type"];
                    $zc_desc = $row3["zc_desc"];
                    $zc_stat = $row3["zc_stat"];
                    $zc_timestamp = new datetime($row3["zc_timestamp"]); 
                    
                    $new_date = $zc_timestamp->format('F d, Y');
                    
                    
                        echo 
                        '
                            <tr class="gradeX">
                                <td class="hidden">'.$zc_ID.'</td>
                                <td style="text-align: center">
                                    <div class="square-green single-row" >
                                        <div class="checkbox">
                                            <input id="select-all" type="checkbox" name="checkstat[]" value="'.$zc_ID.'" style="width: 30px; height: 20px" />
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align:left; color:black">'.$zc_desc.'</td>
                            </tr>  
                        ';  
                    
                }         
            ?>      
            </tbody>
        </table>
</div>