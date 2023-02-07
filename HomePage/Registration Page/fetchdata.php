<?php
            require('db.php');
            session_start();
            $query="SELECT * FROM  student_registration where Enrollnment_No=$Enroll"; 
             $result = mysqli_query($con, $query);
             $nums = mysqli_num_rows($result );
             //$rows=mysql_fetch_array($result);
              while($rows=mysqli_fetch_assoc($result)) {
           

                      echo "    
                     
                    <tr> <td>" .$rows['Name']."</td> 
                    <td>".$rows['Email']."</td> 
                    <td>" .$rows['Password']."</td>
                    <td>" .$rows['Phone']."</td>
                    <td>" .$rows['Enrollnment_No']."</td>
                    
                    </tr> 
                   "; 
                }
               
          ?>