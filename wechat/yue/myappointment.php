<?php include 'includes/settings.php';
include '../../Util/DB/connector.php';
include '../yuechang_config.php';
$openid = isset($_COOKIE['OPENID']) ? $_COOKIE['OPENID'] : 0;
?>
<?php $CURRENT_PAGE = 'index';?>
<?php //var_dump($_POST);
if(isset($_POST['username']) && isset($_POST['gender'])&& isset($_POST['day']) && isset($_POST['year'])&& isset($_POST['month']))
{
	$username = $_POST['username'];
	$gender = $_POST['gender'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$time = strtotime("$month/$day/$year");
    $birthday = date('Y-m-d',$time);
	$db = new DBHelper($config);
    $db_instance = $db->getInstance();
    $sql_insert_user = "insert into user (name,gender,birthday,openid) values 
    ('$username', '$gender','$birthday', '$openid');";
    
    $db_instance->exec($sql_insert_user);
    $uid = $db_instance->lastInsertId ();
    setcookie('uid',$uid);   
    
    //header("location:index.php");
}
$appointmentList = array(
array('id'=>'1','name'=>'测试约唱','timestamp'=>'2013-01-01','date'=>'2014-05-21','time'=>'14:30','address'=>'大宁','room'=>'203','creator'=>'Andy',),
array('id'=>'1','name'=>'测试约唱','timestamp'=>'2013-01-01','date'=>'2014-05-21','time'=>'14:30','address'=>'大宁','room'=>'203','creator'=>'Andy',),
array('id'=>'1','name'=>'测试约唱','timestamp'=>'2013-01-01','date'=>'2014-05-21','time'=>'14:30','address'=>'大宁','room'=>'203','creator'=>'Andy',),
array('id'=>'1','name'=>'测试约唱','timestamp'=>'2013-01-01','date'=>'2014-05-21','time'=>'14:30','address'=>'大宁','room'=>'203','creator'=>'Andy',),
);
?>
<?php include 'includes/header.php'; ?>
<div class="container theme-showcase">
<div class="control-group" style='display:none;'>
          <!-- Button -->  
          <div class="controls col-xs-6 col-sm-6 col-md-4">
            <button id='newApt' class="btn btn-success">发起约唱</button>
          </div>
           
          <div class="controls col-xs-6 col-sm-6 col-md-4">
            <a href='myappointment.php'><button id='myApt' class="btn btn-success">我的约唱</button></a>
          </div>
        </div>
	</div>
<fieldset>
 <legend class="">我发起的约唱</legend>
 <?php foreach($appointmentList as $appointment){?>
 <div class='appointment-item col-xs-10 col-sm-6 col-md-4' id='appointment<?php echo $appointment["id"];?>'>
 
<div class="new-tile primary-tile">
	<span class='item-title'><?php echo $appointment['name']?></span><span class='item-sub'><?php echo $appointment['creator']?> 发起于<?php echo $appointment['timestamp']?> </span>
</div>
  <div class="tile-plaque">
    <div class='appointment-address col-sm-4 col-md-4' >
    	<div>门店：<?php echo $appointment['address']?></div>
    	<div>房间：<?php echo $appointment['room']?></div>
    </div>
    <div class='appointment-address col-sm-4 col-md-4' >
    	<div>日期：<?php echo $appointment['date']?></div>
    	<div>时间：<?php echo $appointment['time']?></div>
    </div>
    <div class='appointment-time col-sm-4 col-md-4' ></div>
    <div class='clear'></div>
  </div>

 </div>
 <?php }?>
 </fieldset>
	<form class="form-horizontal" id=filter method='POST' style='display:none'>
	<input type='hidden' name='postback' value='1' />
    <fieldset>
      <div id="legend" class="">
        <legend class="">约唱列表</legend>
    <div class="control-group">
          <!-- Text input-->
          <label class="control-label" for="username">客官雅号</label>
          <div class="controls">
            <input type="text" placeholder="尊姓大名" class="input-xlarge" name='username' id='username'>
          </div>

          <!-- Select Basic -->
          <label class="control-label">一決雌雄</label>
          <div class="controls">
            <select class="input-xlarge" name='gender' id='gender'>
              <option value=''></option>
              <option value='male'>壯士</option>
              <option value='female'>女俠</option>
            </select>
          </div>

		<label class="control-label">生辰八字</label>
          <div class="controls">
            <select class="input-xlarge" name='year' id='year'>
            <option value=''></option>
              <?php for($i = 1970 ; $i < 2014 ; $i++)
              {
              	echo "<option value='$i'>$i</option>";
              }?>
            </select>
            <select class="input-xlarge" name='month' id='month'>
            <option value=''></option>
              <?php for($i = 1 ; $i < 13 ; $i++)
              {
              	echo "<option value='$i'>$i</option>";
              }?>
            </select>
            <select class="input-xlarge" name='day' id='day'>
            <option value=''></option>
              <?php for($i = 1 ; $i < 32 ; $i++)
              {
              	echo "<option value='$i'>$i</option>";
              }?>
            </select>
          </div>
    </div>
        
    <div class="control-group">
          <!-- Button -->
          <div class="controls">
            <button id='submit' class="btn btn-success">踏入江湖</button>
          </div>
        </div>
	</div>
    </fieldset>
  </form>

</div>
<!-- /container -->

<script type='text/javascript'>
function validate(event)
{
	
	var isValid = true;
	
  if(!$('#username').val())
  {
	  $('#username').addClass('my-error');
	  isValid = false;
	  }
  else
  {
	  $('#username').removeClass('my-error');
	  }
  if(!$('#gender').val())
  {
	  $('#gender').addClass('my-error');
	  isValid = false;
	  }
  else
  {
	  $('#gender').removeClass('my-error');
	  }
  if(!$('#year').val())
  {
	  $('#year').addClass('my-error');
	  isValid = false;
	  }
  else
  {
	  $('#year').removeClass('my-error');
	  }
  if(!$('#month').val())
  {
	  $('#month').addClass('my-error');
	  isValid = false;
	  }
  else
  {
	  $('#month').removeClass('my-error');
	  }
  if(!$('#day').val())
  {
	  $('#day').addClass('my-error');
	  isValid = false;
	  }
  else
  {
	  $('#day').removeClass('my-error');
	  }
  if(isValid)
  {
	  $('#register').submit();
	  }
  else
  {
	  event.preventDefault();
	  }
}

$(document).ready(function() {
	$('#submit').click(function(e){
		validate(e);
		});
});</script>
<?php include 'includes/footer.php';?>
