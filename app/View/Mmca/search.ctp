
<?php  echo $this->Html->script('pagination.js');
  echo $this->Html->css('pagination.css');

?>

<div id="viewinfocontent">
    <form method="get" action="<?php echo $base_url ?>/mmca/search">
        <input type="radio" name="searchfield" value="rollno" <?php if($searchfieldval == "rollno" || $searchfieldval=="") echo "checked"; ?>/>ROLLNO
        <input type="radio" name="searchfield" value="name" <?php if($searchfieldval == "name") echo "checked"; ?>/>NAME
        <input type="radio" name="searchfield" value="fathername" <?php if($searchfieldval == "fathername") echo "checked"; ?>/>FATHER NAME
        <input type="radio" name="searchfield" value="mobileno" <?php if($searchfieldval == "mobileno") echo "checked"; ?>/>MOBILE NO.
        <input type="radio" name="searchfield" value="bloodgroup" <?php if($searchfieldval == "bloodgroup") echo "checked"; ?>/>BLOOD GROUP
    <input type="text" name="textfield" value="<?php echo $textfieldval; ?>" />
    <input type="submit" name="search" value="search" /><p />
    </form>
    
    <style>
    #pageno
    {
        text-align: center;
        margin-left: 20%;
    }
   
    #contenttable
    {
        margin-top: 10px;
        margin-left: 20%;
    }
    #contenttable table
    {
        border-collapse: collapse;
    }
    .validation1
    {
        background-color: gray;
        color: white;
    }
     .validation2
    {
        background-color: red;
        color: white;
    }
    .validation1 td a
    {
        color: white;
    }
    
</style>
<div id="validationdiv">
    <?php if($noofpages!=0){ ?>    
    <div id="pageno">
   
        <script type="text/javascript"> 
        $(function() {
    $('#pageno').pagination({
      pages :<?php echo $noofpages ?>,
        cssStyle: 'light-theme',
        displayedPages:10,
        edges:1,
        currentPage: <?php echo $currentpage ?>,
        
        hrefTextPrefix:"<?php echo "$base_url/mmca/search?search=search&textfield=$textfieldval&searchfield=$searchfieldval&pageno=" ?>"
    });
});    

        </script>
        
    
   
    </div>
        <?php } ?>
    <div id="contenttable">
        <table border ="1" width="600px" style="text-align: center;">
            <thead>
                <tr>
                    <th>
                        rollno
                    </th>
                    <th>
                        name
                    </th>
                    <th>
                        room no.
                    </th>
                     <th>
                        viewinfo
                    </th>
                     <th>
                        status
                    </th>
                </tr>
            </thead>
            <?php 
            if(!empty($valuserlist))
            {
                foreach($valuserlist as $data)
                {
                
                $rollno = $data['users']['rollno'];
                $validation = $data['users']['validation'];
                $name = $data['users']['name'];
                $room=$data['rooms']['room_no'];
                echo "<tr  class='validation$validation'><td  >$rollno</td>";
                if(empty ($name))
                    $name='empty';
               
                echo  "<td>$name</td>"; 
                echo  "<td>$room</td>"; 
                echo "<td><a href='$base_url/mmca/viewinformation?pageno=$currentpage&search=search&textfield=$textfieldval&searchfield=$searchfieldval&rollno=$rollno'>view more </a></td>";
               
                echo "<td>";
                
               
                
                if($validation==1)
                {
                    echo "validated";
                }
                elseif ($validation==2) 
                {
                    echo "not validate";    
                }
                else
                    echo "yet to vaidate";
                echo '</td>';
                echo"</tr>";
                }
            }
            
            ?>
            
        </table>
    </div>
</div>