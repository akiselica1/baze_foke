<br><br><br><br><br>
<div>
<?php 
      require_once('../WebApp/brains/konekcija.php');
      //session_start();

      if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        //echo $username;
        //echo "<br><a href='index.php'>Index</a>";
      }

      else if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) 
          $username = $_REQUEST['username'];
          $user_data = $db->query("SELECT credentials.username as username,
                                          credentials.password as password,
                                          osoba.ime as ime, 
                                          osoba.prezime as prezime,
                                          osoba.id as id,
                                          osoba.titula as titula
                                  FROM credentials, osoba 
                                  WHERE credentials.osoba_id=osoba.id
                                  AND   username='".$username."'")->fetch_assoc();
          
          if($user_data['password']==$_REQUEST['password'] && count($user_data['password'])!=0){
              $_SESSION['username'] = $username;
              $_SESSION['id'] = $user_data['id'];
              $_SESSION['titula'] = $user_data['titula'];
              $_SESSION['ime'] = $user_data['ime'];
              $_SESSION['prezime'] = $user_data['prezime'];
              //echo $_SESSION['ime']." ".$_SESSION['prezime'];
              //echo "<br><a href='index.php'>Index</a>";
              header("location: index.php");
          }
          else{
              header("location: login.php");
          }
      }

      else{ 
          echo header("location: login.php"); 
      }
  ?>
</div>