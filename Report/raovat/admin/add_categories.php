 <?php include('../includes/header.php');?>
  <?php include('../includes/mysqli_connect.php');?>
  <?php include('../includes/functions.php');?>
 <?php include('../includes/sidebar-admin.php');?>
    
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ //gia tri ton tai, xu ly form
        $errors = array();
        if(empty($_POST['category'])){
            $errors[] = "category";
        } else{
        $cat_name = mysqli_real_escape_string($dbc,strip_tags($_POST['category']));
        }
        if(isset($_POST['position']) && filter_var($_POST['position'],FILTER_VALIDATE_INT,array('min_range' => 1))){
        $position = $_POST['position'];
        }else{
            $errors[] = "position";
        }
        if(empty($errors)){
        $user_id = $_SESSION['user_id'];
        $q = "INSERT INTO categories (user_id,cat_name,position) VALUES ({$user_id},'{$cat_name}',$position)";
        $r = mysqli_query($dbc,$q) or die("Query {$q} \n <br/> MySQL error: " .mysqli_error($dbc));
        if(mysqli_affected_rows($dbc) == 1){
            $message = "<p class='success'>The category was added successfully.</p>";
        } else{
            $message = "<p class='warning'>Could not added to the database due to a system error.</p>";
        }
        }else{
            $message = "<p class='warning'>Please fill all the required feilds</p>";
        }
        
    } //end Main IF condition
    ?>
    <div id="content">
    <h2>Create a category</h2>
    <?php
    if(!empty($message)){
    echo $message;
    }
    ?>
    <form id="add_cat" action="" method="post">
    <fieldset>
    <legend>Add category</legend>
    <div>
    <label for="category">Category name: <span class="required">*</span>
    <?php
    if(isset($errors) && in_array('category',$errors)){
        echo "<p class='warning'>Please fill in the category name</p>";
    }
    ?>
    </label>
    <input type="text" name="category" id="category" value="<?php if(isset($_POST['category'])) echo strip_tags($_POST['category']); ?>" size="20" maxlength="160" tabindex="1" />
    </div>
    <div>
    <label for="position">Position: <span class="required">*</span>
    <?php
    if(isset($errors) && in_array('position',$errors)){
        echo "<p class='warning'>Please pick a position</p>";
    }
    ?>
    </label>
    <select name="position" tabindex="2">
    <?php
       $q = "SELECT count(cat_id) AS count FROM categories";
       $r = mysqli_query($dbc, $q) or die("Query {$q} \n <br/> MySQL error: " .mysqli_error($dbc));
       if(mysqli_num_rows($r) == 1){
        list($num) = mysqli_fetch_array($r,MYSQLI_NUM);
        for($i = 1; $i <= $num + 1; $i++){
            echo "<option value='{$i}'";
                if(isset($_POST['position'])&& $_POST['position'] ==  $i){
                    echo "selected='selected'";
                }
            echo ">".$i."</option>";
            
        }
       }
    ?>
    </select>
    </div>
    </fieldset>
    <p><input type="submit" name="submit" value="Add Category"/></p>
    </form>
    </div><!--end content-->
<?php include('../includes/sidebar-b.php');?>
 <?php include('../includes/footer.php');?>
    