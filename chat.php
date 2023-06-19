<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <link rel="stylesheet" href="index.css">
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" id="input-field" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>

      <div class="wrapper">
    <div class="search-bar">
         <img src="img/emoji.jpg" onclick="show_emoji()" >
    </div> 
     <div class="emoji">
     <span id="emoji1" onclick="emoji(this.id)">&#128512;</span>
     <span id="emoji2" onclick="emoji(this.id)">&#128513;</span>
     <span id="emoji3" onclick="emoji(this.id)">&#128514;</span>
     <span id="emoji4" onclick="emoji(this.id)">&#128515;</span>
     <span id="emoji5" onclick="emoji(this.id)">&#128516;</span>
     <span id="emoji6" onclick="emoji(this.id)">&#128517;</span>
     <span id="emoji7" onclick="emoji(this.id)">&#128518;</span>
     <span id="emoji8" onclick="emoji(this.id)">&#128519;</span>
     <span id="emoji9" onclick="emoji(this.id)">&#128520;</span>
     <span id="emoji10" onclick="emoji(this.id)">&#128521;</span>
     <span id="emoji11" onclick="emoji(this.id)">&#128522;</span>
     <span id="emoji12" onclick="emoji(this.id)">&#128523;</span>
     <span id="emoji13" onclick="emoji(this.id)">&#128524;</span>
     <span id="emoji14" onclick="emoji(this.id)">&#128525;</span>
     <span id="emoji15" onclick="emoji(this.id)">&#128526;</span>
     <span id="emoji16" onclick="emoji(this.id)">&#128527;</span>
     <span id="emoji17" onclick="emoji(this.id)">&#128528;</span>
     <span id="emoji18" onclick="emoji(this.id)">&#128529;</span>
     <span id="emoji19" onclick="emoji(this.id)">&#128530;</span>
     <span id="emoji20" onclick="emoji(this.id)">&#128531;</span>
     <span id="emoji21" onclick="emoji(this.id)">&#128532;</span>
     <span id="emoji22" onclick="emoji(this.id)">&#128533;</span>
     <span id="emoji23" onclick="emoji(this.id)">&#128534;</span>
     <span id="emoji24" onclick="emoji(this.id)">&#128535;</span>
</div>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
  <script>
    click = false;
    function show_emoji() {
        if (click == false) {
            document.getElementsByClassName("emoji")[0].style.height = "142px";
            document.getElementsByClassName("emoji")[0].style.padding = "8px 0px";
            click = true;
        }
        else{
            document.getElementsByClassName("emoji")[0].style.height = "0px";
            document.getElementsByClassName("emoji")[0].style.padding = "0px";
            click = false;
        }
    }
    function emoji(emoji) {
       document.getElementById("input-field").value += document.getElementById(emoji).innerHTML;
    }
 </script>

</body>
</html>
