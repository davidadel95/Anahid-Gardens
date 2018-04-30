<?php

    include_once "includes.php";
			$q = $_REQUEST["q"];
            if($q != "SelectPaymentType")
            {
			$PaymentEAVModel = new PaymentEAVModel;
            $OptionsTypeModel = new OptionsTypeModel;
             $POptionsModel = new POptionsModel;
             $db = dbconnect::getInstance();
             $mysqli = $db->getConnection();
             $sql_query = "SELECT poptions.Name, poptions.TypeID FROM paymentmethods INNER JOIN paymentoptions ON paymentoptions.PaymentMethodID = paymentmethods.ID INNER JOIN poptions ON poptions.ID = paymentoptions.POptionID WHERE paymentmethods.ID = ".$PaymentEAVModel->GetID($q)[0];
            $result = $mysqli->query($sql_query);
            $i = 0;
            while($row =mysqli_fetch_array($result)){
            
            
											echo "<label>".$row["Name"]."</label>
                                            <br/>";
                    echo '<input type="'.$OptionsTypeModel->GetOptionName($row["TypeID"]).'" name="'.$row["Name"].'" class="form-control" required> <br/>';
                                            

                $i++;
                
            }
										
            
            
            }
 
            ?>
