<!DOCTYPE html>
<html lang="en">
  <?php
require_once('databaseCon.php');
$Tasks              = $_SESSION['results']; //data retrived from database
$updateStatusString = "http://localhost/demo/databaseCon.php?updateStatus=";
?>
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task manger
    </title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script>
      
    </script>
  </head>
  <body>
    <div class="grid">
      <!--  Page header start -->
      <div class="header">
        <img src="img/logo.jpg">
      </div>
      <!-- Page header  end-->
      
      <!-- Group A side start-->
      <div class="rightSide">
        <h3>Group A
        </h3>
        <table  id="A" style="width:100%" ondragenter="allowDrop(this)">
          <tr>
            <th>
            </th>
            <th>
            </th>
            <th>
            </th>
            <th>Date 
            </th>
            <th>Status
            </th>
          </tr>
            <?php
$i = 1;
foreach ($Tasks as $row) {
?>   
            <tr draggable="true" ondragstart="saveNode(this,<?php
    echo $row['ID'];
?>)" ondragend="release(this)" >
              <?php
    if (strtolower($row['Group']) == "a") {
?>
             <td style="font-size: 17px">
                <?php
        echo $i . '-';
?>
             </td>
              <td style="font-size: 17px">
                <input type="text" style="border: none; width: 75%;" name="taskTitleA" id="taskTitleA" value="<?php
        echo $row['Title'];
?>">
                <input type="hidden" name="taskIdA" id="taskIdA" value="<?php
        echo $row['ID'];
?>">
              </td> 
              <td>
                <div class="edit_hover_class">
                 <a href='#' class="deleteData" data-id="<?php
        echo $row['ID'];
?>" data-toggle="modal" data-target="#deleteModal" >
                    <img src="img/trash.jpg"  />
                 </a>
                </div>
              </td>
              <td>
                <input type="Date" style="border: none;" id="taskDateA" name="taskDateA" value="<?php
        echo $row['Date'];
?>">
                <input type="hidden" name="taskIdA" id="taskIdA" value="<?php
        echo $row['ID'];
?>">
              </td>
              <?php
        if (strtolower($row['Status']) == "done") {
?>
           <td>
               <div class="dropdown" style="display:inline-block; text-align: center;">
             <button class="btn btn-primary" data-toggle="dropdown" style="border: none;color: #51ce55; font-size: 14px; font-weight: bold; background-color: transparent;"> <?php
            echo strtoupper($row['Status']);
?></button>
            <?php
        }
?>
           <?php
        if (strtolower($row['Status']) == "pending") {
?>
           <td>
             <div class="dropdown" style="display:inline-block; text-align: center;">
             <button class="btn btn-primary" data-toggle="dropdown" style="border: none;color: #e89d00; font-size: 14px; font-weight: bold; background-color: transparent;"> <?php
            echo strtoupper($row['Status']);
?></button>
            <?php
        }
?>
           <?php
        if (strtolower($row['Status']) == "delayed") {
?>
           <td >
               <div class="dropdown" style="display:inline-block; text-align: center;">
             <button class="btn btn-primary" data-toggle="dropdown" style="border: none;color: #c60903; font-size: 14px; font-weight: bold; background-color: transparent;"> <?php
            echo strtoupper($row['Status']);
?></button>
            <?php
        }
?>
<ul class="dropdown-menu">
  <li><a href="<?php
        echo $updateStatusString;
?>Done$<?php
        echo $row['ID'];
?>" style="color: #51ce55; font-size: 14px; font-weight: bold;">DONE</a></li>
  <li><a href="<?php
        echo $updateStatusString;
?>DELAYED$<?php
        echo $row['ID'];
?>" style="color: #c60903; font-size: 14px; font-weight: bold;" >DELAYED</a></li>
  <li><a href="<?php
        echo $updateStatusString;
?>PENDING$<?php
        echo $row['ID'];
?>" style="color: #e89d00; font-size: 14px; font-weight: bold;">PENDING</a></li>
</ul>
              </div>
            </td>
          </tr>
          <?php
        $i++;
    }
?>
         <?php
}
?>
        </table>
        <span class="newTask glyphicon glyphicon-plus-sign" style="color: #0059ca; margin: 5px;" data-id="A"   data-toggle="modal" data-target="#taskModal" >New`Task
        </span>
      </div>
      <!-- Group A side end-->
      
      <!-- Group B side start -->
      <div class="leftSide">
        <h3>Group B
        </h3>
        <table  id="B" style="width:100%" ondragenter="allowDrop(this)" >
          <tr>
            <th>
            </th>
            <th>
            </th>
            <th>
            </th>
            <th>Date
            </th>
            <th>  Status
            </th>
          </tr>
          <?php
$i = 1;
foreach ($Tasks as $row) {
?>   
          <tr style="text-align: left;" draggable="true" ondragstart="saveNode(this , <?php
    echo $row['ID'];
?>)" ondragend="release(this)" >
            <?php
    if (strtolower($row['Group']) == "b") {
?>
           <td style="font-size: 17px">
              <?php
        echo $i . '-';
?>
           </td>
            <td style="font-size: 17px">  
              <input type="text" style="border: none; width: 75%;" name="taskTitleA" id=" taskTitleA" value="<?php
        echo $row['Title'];
?>">
              <input type="hidden" name="taskIdA" id="taskIdA" value="<?php
        echo $row['ID'];
?>">  
            </td>
            <td>
              <div class="edit_hover_class">
                <a href='#' class="deleteData" data-id="<?php
        echo $row['ID'];
?>" data-toggle="modal" data-target="#deleteModal" >
                  <img src="img/trash.jpg"   />
                </a>
              </div>
            </td>
            <td>
              <input type="Date" style="border: none;" id="taskDateA" name="taskDateA" value="<?php
        echo $row['Date'];
?>">
              <input type="hidden" name="taskIdA" id="taskIdA" value="<?php
        echo $row['ID'];
?>">
            </td>
            <?php
        if (strtolower($row['Status']) == "done") {
?>
           <td>
               <div class="dropdown" style="display:inline-block; text-align: center;">
             <button class="btn btn-primary" data-toggle="dropdown" style="border: none;color: #51ce55; font-size: 14px; font-weight: bold; background-color: transparent;"> <?php
            echo strtoupper($row['Status']);
?></button>
            <?php
        }
?>
           <?php
        if (strtolower($row['Status']) == "pending") {
?>
           <td>
             <div class="dropdown" style="display:inline-block; text-align: center;">
             <button class="btn btn-primary" data-toggle="dropdown" style="border: none;color: #e89d00; font-size: 14px; font-weight: bold; background-color: transparent;"> <?php
            echo strtoupper($row['Status']);
?></button>
            <?php
        }
?>
           <?php
        if (strtolower($row['Status']) == "delayed") {
?>
           <td >
               <div class="dropdown" style="display:inline-block; text-align: center;">
             <button class="btn btn-primary" data-toggle="dropdown" style="border: none;color: #c60903; font-size: 14px; font-weight: bold; background-color: transparent;"> <?php
            echo strtoupper($row['Status']);
?></button>
            <?php
        }
?>
<ul class="dropdown-menu">
  <li><a href="<?php
        echo $updateStatusString;
?>Done$<?php
        echo $row['ID'];
?>" style="color: #51ce55; font-size: 14px; font-weight: bold;">DONE</a></li>
  <li><a href="<?php
        echo $updateStatusString;
?>DELAYED$<?php
        echo $row['ID'];
?>" style="color: #c60903; font-size: 14px; font-weight: bold;" >DELAYED</a></li>
  <li><a href="<?php
        echo $updateStatusString;
?>PENDING$<?php
        echo $row['ID'];
?>" style="color: #e89d00; font-size: 14px; font-weight: bold;">PENDING</a></li>
</ul>
              </div>
            </td>
          </tr>
          <?php
        $i++;
    }
?>
         <?php
}
?>
       </table>
        <!-- Button trigger modal -->
        <span class="newTask glyphicon glyphicon-plus-sign" style="color : #0059ca; margin: 5px;" data-id="B" data-toggle="modal" data-target="#taskModal">New`Task
        </span>
        <!-- task screen Modal  start-->
        <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  <div class="center-block">
                    <img src="img/logo.jpg">
                  </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="databaseCon.php">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="taskTitle" placeholder="Enter Task Title" required>
                    <label for="title">Descripsion:</label>
                    <input type="text" class="form-control" name="taskDescripsion" placeholder="Enter Task Descripsion" required>
                    <label for="Date">Date:</label>
                    <input type="Date" class="form-control" name="taskDate"  required>
                    <label for="Date">Status:</label>
                    <input type="text" class="form-control"  onfocusout="Validation()" name="taskStatus" placeholder="Done or Delayed or Pending" required>
                    <input type="hidden" name="TaskGroup" id="TaskGroup">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button type="submit" name="save" class="btn btn-primary">Save
                </button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Task screen Modal  end-->
        
        <!-- Group B side end -->
        
        <!-- Page footer start-->
      </div>
      <div class="footer">
        Copyrights &copy; 2018 Black Square Solutions
      </div>
    </div>
    <!-- Page footer end -->
    
    <!-- task view screen Modal  start-->
        <div class="modal fade" id="taskViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  <div class="center-block">
                    <img src="img/logo.jpg">
                  </div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;
                  </span>
                </button>
              </div>
              <div class="modal-body">
                    <label for="title">Comment:</label>
                    <input type="text" class="form-control" name="taskComment" placeholder="Enter Task Title">
                    <label for="title">Descripsion:</label>
                    <input type="text" class="form-control" name="taskDescripsion" placeholder="Enter Task Descripsion" >
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button type="submit" name="save" class="btn btn-primary">Save
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Task  view screen Modal  end-->


    <!-- Delete screen Modal Start -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center; color : red;">Delete Confirmation
            </h5>
            <input type="hidden" name="TaskId" id="TaskId" value=""/>
          </div>
          <div class="modal-footer" >  
          <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close
            </button>
            <button type="button" class="btn btn-primary" onclick="MyDeleteFunction()" >Delete
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Delete screen Modal End -->

    <!-- Bootstrap & Core Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script> 
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js">
    </script> 
    <script src="https://getbootstrap.com/dist/js/bootstrap.min.js">
    </script>
    
    <script>
      // table body sort
      $('tbody').sortable();
      
      // transfare data from table to delete modal
      $(document).on("click", ".deleteData", function () {
        var myTaskId = $(this).data('id');
        $(".modal-header #TaskId").val( myTaskId );
      });

      // transfare data from table to new task modal
      $(document).on("click", ".newTask", function () {
        var myTaskGroup = $(this).data('id');
        $(".modal-body #TaskGroup").val( myTaskGroup );
      });

      // delete buton click function 
      function  MyDeleteFunction() {
           var id = document.getElementById("TaskId").value;
           var query = "http://localhost/demo/databaseCon.php?del=" + id;
           document.location.href=query ;
      }

      // validation of status field in create new task 
      function  Validation() {
          var status = document.getElementById("taskStatus").value;
          status = status. toLowerCase();
          if(status != "done" && status != "pending" &&status != "delayed" )
              alert('please enter right status!!');
      } 

      //change task title
      $(document).keyup(function (e) {
        if ( e.target.type == "text" && (e.keyCode === 13)) {
          //alert(e.target.type);
          var id = $(e.target).next('input')[0].value;
          var newTitle = e.target.value;
           var query = "http://localhost/demo/databaseCon.php?updateTitle=" + id +'$'+newTitle;
           //alert(query);
            document.location.href=query ;
        }
      });
      //change task date
      $(document).keyup(function (e) {
        if (e.target.type == "date" &&(e.keyCode === 13)) {
          var id = $(e.target).next('input')[0].value;
          var newDate = e.target.value;
           var query = "http://localhost/demo/databaseCon.php?updateDate=" + id +'$'+ newDate;
           //alert(query);
           document.location.href=query ;
        }
      });
      let saveNodeElement;
      let parent;
      let allowDropElement = false;
      let taskID;

      const saveNode=(element,id)=>{
        saveNodeElement=element;
        taskID = id;
        console.log(id + "  -  ");
      }
      const allowDrop=(element)=>{
        parent=element
        console.log(parent.target);
        allowDropElement=true;
      }
      const release=(element)=>{
        if (allowDropElement) {
            parent.appendChild(saveNodeElement);
            //console.log(parent.id+ "    aaaaa");
            var query = "http://localhost/demo/databaseCon.php?updateGroup=" + taskID +'$'+ parent.id;
           //alert(query);
           document.location.href=query ;

        }
      }
    </script>
    <script src="js/bootstrap.min.js">
    </script>
    <script src="js/jquery-3.3.1.js">
    </script>
  </body>
</html>