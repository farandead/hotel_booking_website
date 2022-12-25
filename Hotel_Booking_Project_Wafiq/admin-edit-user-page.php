<?php 

session_start();
$host = "localhost";
$user = "root";
$password = '';
$db_name = "wafiq_project";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

$user = $_GET['edit-user'];


$user = stripcslashes($user);

$user = mysqli_real_escape_string($con, $user);


$sql = "SELECT * from `customers`  where customer_id = '$user' ";
$result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);


if ($count >= 1) {
    $row = mysqli_fetch_assoc($result);
    $row["customer_id"];   
    $row["first_name"];
    $row["last_name"];
    $row["phone_number"];
    $row["email"];
    $row["user_type"];
    
} else {
    echo "<script>alert('Something Went Wrong')</script>";
    include 'main-admin.php';
}

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Staatliches&display=swap');

    *{
        font-family: 'Staatliches', cursive; 
        transition: 0.2s all ease-in-out;
    }
    .input-container{
        text-align: left;
    }
    .input-container input{
        width: 15vmax;
    }
    .edit-user-main-container{
        display: flex;
        align-items: center;
        align-content: center;
        justify-items: center;
        justify-content: center;
        box-shadow: 0px 0px 10px rgb(77, 76, 76);
        padding-top: 3vmax;
        padding-bottom:3vmax ;
        min-width: fit-content;
        max-width: 30vmax;
        margin: auto;
        border-radius: 12px;
        margin-top: 5vmax;
    }
    #input-container-button{
        margin-top: 2vmax;
    }
    #input-container-button button{
        width: 8vmax;
        height: 2vmax;
        border-radius: 6px;
        background-color: #0885f2;
        color: white;
        border: none;
    }
    #input-container-button button:hover{

        color: #0885f2;
        background-color: white;
     
    }
</style>

<div class="edit-user-main-container">
    <form action="update-user-inc.php" method="POST">
    <center>
    <div class="input-container">
        <p for="firstname">First Name</p>
        <input name="firstname" id="first-name" type="text" value="<?php echo $row["first_name"];  ?>" placeholder="First Name">
    </div>
    <div class="input-container">
        <p for="lastname">Last Name</p>
        <input name="lastname" id="lastname" type="text"  value="<?php echo $row["last_name"];  ?>"placeholder="Last Name">
    </div>
    
    <div class="input-container">
        <p for="contact-no">Contact No</p>
        <input name="number" id="contact-no" value="<?php echo $row["phone_number"];  ?>" type="number" placeholder="Contact Name">
    </div>
    <div class="input-container">
        <p for="email">Email</p>
        <input name="email" id="email" type="email" value="<?php echo $row["email"];  ?>"placeholder="Email ">
    </div>

    <div class="input-container">
        <p>User Type</p>
        <select name="user-type" id="user-type" value="admin">
            <option value="<?php echo $row["user_type"];  ?>" disabled><?php echo $row["user_type"];  ?></option>
            <option value="admin">admin</option>
            <option value="user">user</option>
          

        </select>
    </div>
    
    <div class="input-container" id="input-container-button">
        <button name="user_id" value="<?php echo $row["customer_id"];  ?>">Update</button>
    </form>
        <a href="main-admin.php"> <button>Back</button></a>   
    </div>

</center>
</div>