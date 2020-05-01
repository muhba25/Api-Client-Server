<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>POST-AEI</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body style="font-size: 12px;" id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">POST-AEI</a>
     <!--  <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <!--   <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li> -->
         <!--  <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav><br><br>
  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-2">
                <select style="font-size: 12px;" class="form-control" name="req" id="">
                  <option <?php if (@$_POST['req']=='GET'): ?>
                  	<?php echo 'selected' ?><?php else: ?>
                  <?php endif ?> value="GET">GET</option>
                  <option <?php if (@$_POST['req']=='POST'): ?>
                  	<?php echo 'selected' ?><?php else: ?>
                  <?php endif ?> value="POST">POST</option>
                  <option <?php if (@$_POST['req']=='PUT'): ?>
                  	<?php echo 'selected' ?><?php else: ?>
                  <?php endif ?> value="PUT">PUT</option>
                  <option <?php if (@$_POST['req']=='DELETE'): ?>
                  	<?php echo 'selected' ?><?php else: ?>
                  <?php endif ?> value="DELETE">DELETE</option>
                </select>
              </div>
              <div class="col-md-8">
                <input style="font-size: 12px;" name="url" type="text" class="form-control" id="url" value="<?php if (empty($_POST['url'])){}else{echo $_POST['url'];} ?>" placeholder="Ente Request URL">
              </div>
              <div class="col-md-2">
                <input style="font-size: 12px;" type="submit" class="btn btn-primary" name="submit" value="SEND">
              </div>
            </div><br>

            <div class="row">
             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a style="font-size: 12px;" class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#params" role="tab" aria-controls="pills-home" aria-selected="true">Params</a>
              </li>
              <li class="nav-item">
                <a style="font-size: 12px;" class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#headers" role="tab" aria-controls="pills-profile" aria-selected="false">Headers</a>
              </li>
              <li class="nav-item">
                <a style="font-size: 12px;" class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#body" role="tab" aria-controls="pills-contact" aria-selected="false">Body</a>
              </li>
            </ul>
              </div>

              <div class="row">
              <div class="col-md-12">
              <div class="tab-content">
                <div id="params" class="tab-pane fade show active">
                  

                  <table id="myTable" class="table table-bordered">
                    <thead>
                    <th>Key</th>
                    <th>Value</th>
                    <!-- <th>Description</th> -->
                    </thead>
                    <tbody>
                    	<?php if (!empty($_POST['parkey']) && !empty($_POST['parvalue'])): ?>
                    	<?php $counpk = count($_POST['parkey']); ?>
                    		<?php for ($i=0; $i < $counpk; $i++) { ?>
                    		<tr>
                    			<td><input class="form-control" ondblclick="addtable()" value="<?= $_POST['parkey'][$i] ?>" name="parkey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                    			<td><input class="form-control" ondblclick="addtable()" value="<?= $_POST['parvalue'][$i] ?>" name="parvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                    			<!-- <td><input class="form-control" ondblclick="addtable()" name="pardesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                    		</tr>
                    		<?php } ?>
                    	<?php else: ?>
                    		<tr>
                    			<td><input class="form-control" ondblclick="addtable()" name="parkey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                    			<td><input class="form-control" ondblclick="addtable()" name="parvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                    			<!-- <td><input class="form-control" ondblclick="addtable()" name="pardesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                    		</tr>
                    	<?php endif ?>
                    </tbody>
                  </table> 
                
                </div>

                <div id="headers" class="tab-pane fade">
                 
                
                  <table id="myTables" class="table table-bordered">
                    <thead>
                    <th>Key</th>
                    <th>Value</th>
                    <!-- <th>Description</th> -->
                    </thead>
                    <tbody>
                   
                    		<?php if (!empty($_POST['headkey']) && !empty($_POST['headvalue'])): ?>
                    	<?php $counhk = count($_POST['headkey']); ?>
                    		<?php for ($i=0; $i < $counhk; $i++) { ?>

                    			<tr>
                    			<td><input class="form-control" ondblclick="addtables()" value="<?= $_POST['headkey'][$i] ?>" name="headkey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                    			<td><input class="form-control" value="<?= $_POST['headvalue'][$i] ?>" ondblclick="addtables()" name="headvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                    			<!-- <td><input class="form-control" ondblclick="addtables()" name="headdesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                    			</tr>

                    		<?php } ?>
                    	<?php else: ?>

                    		<tr>
                    			<td><input class="form-control" ondblclick="addtables()" name="headkey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                    			<td><input class="form-control" ondblclick="addtables()" name="headvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                    			<!-- <td><input class="form-control" ondblclick="addtables()" name="headdesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                    		</tr>

                    	<?php endif ?>
                     
                    </tbody>
                  </table> 

                </div>


                <div id="body" class="tab-pane fade">
					
                	<div class="row">
                		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                			<li class="nav-item">
                				<a style="font-size: 12px;" class="nav-link " id="pills-home-tab" data-toggle="pill" href="#none" role="tab" aria-controls="pills-home" aria-selected="true">none</a>
                			</li>
                			<li class="nav-item">
                				<a style="font-size: 12px;" class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#formdata" role="tab" aria-controls="pills-profile" aria-selected="false">form-data</a>
                			</li>
                			<li class="nav-item">
                				<a style="font-size: 12px;" class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#xwww" role="tab" aria-controls="pills-contact" aria-selected="false">x-www-form-urlencoded</a>
                			</li>
                			<li class="nav-item">
                				<a style="font-size: 12px;" class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#raw" role="tab" aria-controls="pills-contact" aria-selected="false">raw</a>
                			</li>
                		</ul>
                	</div>
					
                	<div class="row">
                		<div class="col-md-12">
                			<div class="tab-content">

                				<div id="none" class="tab-pane fade">
                					<p>This request does not have a body</p>
                				</div>

                				<div id="formdata" class="tab-pane fade show active">
                					<table id="myTabless" class="table table-bordered">
                						<thead>
                							<th>Key</th>
                							<th>Value</th>
                							<!-- <th>Description</th> -->
                						</thead>
                						<tbody>
                							<?php if (!empty($_POST['bodykey']) && !empty($_POST['bodyvalue'])): ?>
                								<?php $counbd = count($_POST['bodykey']); ?>
                								<?php for ($i=0; $i < $counbd; $i++) { ?>
                								<tr>
                									<td><input class="form-control" ondblclick="addtabless()" value="<?= $_POST['bodykey'][$i] ?>" name="bodykey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                									<td><input class="form-control" ondblclick="addtabless()" value="<?= $_POST['bodyvalue'][$i] ?>" name="bodyvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                									<!-- <td><input class="form-control" ondblclick="addtabless()" name="bodydesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                								</tr>

                								<?php } ?>
                							<?php else: ?>
                								<tr>
                									<td><input class="form-control" ondblclick="addtabless()" name="bodykey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                									<td><input class="form-control" ondblclick="addtabless()" name="bodyvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                									<!-- <td><input class="form-control" ondblclick="addtabless()" name="bodydesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                								</tr>
                							<?php endif ?>

                						</tbody>
                					</table> 
                				</div>

                				<div id="xwww" class="tab-pane fade">
                					<table id="myTablessxw" class="table table-bordered">
                						<thead>
                							<th>Key</th>
                							<th>Value</th>
                							<!-- <th>Description</th> -->
                						</thead>
                						<tbody>

                							<?php if (!empty($_POST['xwbodykey']) && !empty($_POST['xwbodyvalue'])): ?>
                								<?php $counxw = count($_POST['xwbodykey']); ?>
                								<?php for ($i=0; $i < $counxw; $i++) { ?>
                								<tr>
                									<td><input class="form-control" ondblclick="addtablessxw()" value="<?= $_POST['xwbodykey'][$i] ?>" name="xwbodykey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                									<td><input class="form-control" ondblclick="addtablessxw()" value="<?= $_POST['xwbodyvalue'][$i] ?>" name="xwbodyvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                									<!-- <td><input class="form-control" ondblclick="addtablessxw()" name="xwbodydesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                								</tr>
                								<?php } ?>
                							<?php else: ?>
                								<tr>
                									<td><input class="form-control" ondblclick="addtablessxw()" name="xwbodykey[]" style="font-size: 12px;" type="text" placeholder="Key (double click if you add row)"></td>
                									<td><input class="form-control" ondblclick="addtablessxw()" name="xwbodyvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td>
                									<!-- <td><input class="form-control" ondblclick="addtablessxw()" name="xwbodydesc[]" style="font-size: 12px;" type="text" placeholder="Description"></td> -->
                								</tr>
                							<?php endif ?>
                						</tbody>
                					</table> 
                				</div>

                				<div id="raw" class="tab-pane fade">
                					<table class="table table-bordered">
                						<thead>
                							<th>Raw</th>
                						</thead>
                						<tbody>
                							<tr>
                								<td><textarea style="font-size: 12px;" name="raw" id="" class="form-control" rows="10"> <?php if (!empty(@$_POST['raw'])): ?>
                  	<?php echo @$_POST['raw'] ?><?php else: ?>
                  <?php endif ?></textarea></td>
                							</tr>
                						</tbody>
                					</table> 
                				</div>

                			</div>
                		</div>
                	</div>





                </div>
              </div>
              </div>
              </div>


        </form>
      </div>
    </div>


<script>
//   $("#tambahtabel").click(function() {
//     $('#myTable > tbody:last-child').append(' <tr><td><input class="form-control" id="tambahtabel" style="font-size: 12px;" type="text" placeholder="Key"></td><td><input class="form-control" id="tambahtabel" style="font-size: 12px;" type="text" placeholder="Value"></td><td><input class="form-control" id="tambahtabel" style="font-size: 12px;" type="text" placeholder="Description"></td></tr>');
// });

function addtable() {
         $('#myTable > tbody:last-child').append(' <tr><td><input class="form-control" ondblclick="addtable()" name="parkey[]" style="font-size: 12px;" type="text" placeholder="Key"></td><td><input class="form-control" ondblclick="addtable()" name="parvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td></tr>');
    }
 
</script>

  <script>
function addtables() {
         $('#myTables > tbody:last-child').append(' <tr><td><input class="form-control" ondblclick="addtables()" name="headkey[]" style="font-size: 12px;" type="text" placeholder="Key"></td><td><input class="form-control" ondblclick="addtables()" name="headvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td></tr>');
    }
 
</script>

 <script>
function addtabless() {
         $('#myTabless > tbody:last-child').append(' <tr><td><input class="form-control" ondblclick="addtabless()" name="bodykey[]" style="font-size: 12px;" type="text" placeholder="Key"></td><td><input class="form-control" ondblclick="addtabless()" name="bodyvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td></tr>');
    }
 
</script>

 <script>
function addtablessxw() {
         $('#myTablessxw > tbody:last-child').append(' <tr><td><input class="form-control" ondblclick="addtablessxw()" name="xwbodykey[]" style="font-size: 12px;" type="text" placeholder="Key"></td><td><input class="form-control" ondblclick="addtablessxw()" name="xwbodyvalue[]" style="font-size: 12px;" type="text" placeholder="Value"></td></tr>');
    }
 
</script>


    <div class="row">
    	<div class="col-lg-8 mx-auto">
    		<div class="card card-primary">
    			<div class="card-header">Response</div>
    			<div style="font-size: 14px;height: 400px;overflow-y:scroll;overflow-x: hidden;" class="panel-body">
    				<div class="col-md-12">
    				<?php 
    				if (@$_POST['submit']) {
    					$url = @$_POST['url'];
    					if (@$_POST['req']=='GET') {

    						function http_request($url){
    						$ch = curl_init(); 
    						curl_setopt($ch, CURLOPT_URL, $url);
    						curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    							// Bagian HEAD
		    						if (!empty($_POST['headkey']) && !empty($_POST['headvalue'])) {
		    							$countheadkey = count($_POST['headkey']);
		    							$countheadvalue = count($_POST['headvalue']);

		    							if ($countheadvalue!=0 && $countheadkey!=0) {
		    								
		    								$oke = '';
		    								for ($i=0; $i < $countheadkey; $i++) {
		    									if (empty($_POST['headkey'][$i]) || empty($_POST['headvalue'][$i])) {
		    									 	
		    									 }else{
		    									 	$oke .= $_POST['headkey'][$i].': '.$_POST['headvalue'][$i].',';
		    									 } 
			    								
		    								}

		    								$okesip = rtrim($oke,',');
		    								$okerrr = explode(',', $okesip);
		    								$heapar= $okerrr; 

		    								// print_r($heapar);die;
		    								curl_setopt($ch, CURLOPT_HTTPHEADER, $heapar);

		    							}else{

		    							}



		    						} else {

		    						}

    					


    						$output = curl_exec($ch); 
    						curl_close($ch);   
    						return $output;
    						}

    						// Bagian PARAMS
		    						if (!empty($_POST['parkey']) && !empty($_POST['parvalue'])) {
		    							$countparkey = count($_POST['parkey']);
		    							$countparvalue = count($_POST['parvalue']);

		    							// print_r($url);die;

		    							if ($countparvalue!=0 && $countparkey!=0) {
		    								$geturl = $url;
		    								for ($i=0; $i < $countparkey; $i++) { 
		    									if ($i>=1) {
		    										$geturl .= "&".$_POST['parkey'][$i];
		    									$geturl .= "=".$_POST['parvalue'][$i];
		    									}else{
		    										$geturl .= "?".$_POST['parkey'][$i];
		    									$geturl .= "=".$_POST['parvalue'][$i];
		    									}
		    									
		    								}

		    								// print_r($geturl);die;
		    								$profile = http_request($geturl);
		    							}else{

		    							}

		    							

		    						} else {

		    						}
    					

				// ubah string JSON menjadi array
    								$profiles = json_decode($profile, TRUE);

    								echo "<p class='card-text'><pre>";
    								echo json_encode($profiles, JSON_PRETTY_PRINT);
    								echo "</pre></p>";
    					


    					} else if (@$_POST['req']=='POST') {

    						$url = @$_POST['url'];

    						// print_r($url);


    						$che = curl_init(); 
    						curl_setopt($che, CURLOPT_URL, $url);
    						curl_setopt($che, CURLOPT_RETURNTRANSFER, true);
    						curl_setopt($che, CURLINFO_HEADER_OUT, true);
    						curl_setopt($che, CURLOPT_SSL_VERIFYPEER, false);
    						curl_setopt($che, CURLOPT_POST, true);

    							if (!empty($_POST['headkey']) && !empty($_POST['headvalue'])) {
		    							$countheadkey = count($_POST['headkey']);
		    							$countheadvalue = count($_POST['headvalue']);

		    							if ($countheadvalue!=0 && $countheadkey!=0) {
		    								
		    								$oke = '';
		    								for ($i=0; $i < $countheadkey; $i++) {
		    									if (empty($_POST['headkey'][$i]) || empty($_POST['headvalue'][$i])) {
		    									 	
		    									 }else{
		    									 	$oke .= $_POST['headkey'][$i].': '.$_POST['headvalue'][$i].',';
		    									 } 
			    								
		    								}

		    								$okesip = rtrim($oke,',');
		    								$okerrs = explode(',', $okesip); 


		    									// print_r($okerrs);die;

		    								
		    								curl_setopt($che, CURLOPT_HTTPHEADER, $okerrs);
		    								// print_r($heads);die;

		    							}else{

		    							}



		    						} else {

		    						}

		    						// print_r($heads);die;
    						

    						if (!empty($_POST['bodykey']) && !empty($_POST['bodyvalue'])) {
		    							$countbodykey = count($_POST['bodykey']);
		    							$countbodyvalue = count($_POST['bodyvalue']);

		    							if ($countbodyvalue!=0 && $countbodykey!=0) {
		    								$okers='{';

		    								for ($i=0; $i < $countbodykey; $i++) {
		    									if (empty($_POST['bodykey'][$i]) || empty($_POST['bodyvalue'][$i])) {
		    									 	
		    									 }else{
		    									 	$okers .= '"'.$_POST['bodykey'][$i].'"'.':'.'"'.$_POST['bodyvalue'][$i].'"'.',';
		    									 } 
			    								
		    								}

		    								$okesipt = rtrim($okers,',');
		    								$okesipt .= "}";
		    								$bodypost = json_decode($okesipt,TRUE); 
											

											// $payload = json_encode($okesip);
		    								// print_r($bodypost);die;
		    								// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
		    								curl_setopt($che, CURLOPT_POSTFIELDS,$bodypost);


		    							}else{

		    							}



		    						} else {} 

		    						if(!empty($_POST['xwbodykey']) && !empty($_POST['xwbodyvalue'])) {
										$countxbodykey = count($_POST['xwbodykey']);
		    							$countxbodyvalue = count($_POST['xwbodyvalue']);

		    							if ($countxbodyvalue!=0 && $countxbodykey!=0) {
		    								$okerw='';
		    								for ($i=0; $i < $countxbodykey; $i++) {
		    									if (empty($_POST['xwbodykey'][$i]) || empty($_POST['xwbodyvalue'][$i])) {
		    									 	
		    									 }else{
		    									 	$okerw .= $_POST['xwbodykey'][$i].'='.$_POST['xwbodyvalue'][$i].'&';
		    									 } 
			    								
		    								}

		    								$okesiw = rtrim($okerw,'&');
		    								// $okewe = explode(',', $okesiw);


		    									// $payload = json_encode($okesip);
		    								// print_r($okesiw);die;
		    								// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
		    								curl_setopt($che, CURLOPT_POSTFIELDS,$okesiw);	

		    								}							
		    						} else {}

		    						if (!empty($_POST['raw'])) {
		    							
		    							$rawpost = json_encode(json_decode($_POST['raw'],TRUE)); 
											

											// $payload = json_encode($okesip);
		    								// print_r($rawpost);die;
		    								// curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
		    								curl_setopt($che, CURLOPT_POSTFIELDS,$rawpost);

		    						} else{}


		    				$outputs = curl_exec($che); 
    						// curl_close($che); 

//     					   $context  = stream_context_create($opts);

// $result = file_get_contents('http://10.0.12.89/mahasiswa/insert.php', false, $context);

				// ubah string JSON menjadi array
    				$profiles = json_decode($outputs, TRUE);

    								echo "<p class='card-text'><pre>";
    								echo json_encode($profiles, JSON_PRETTY_PRINT);
    								echo "</pre></p>";
    						
    					} else if (@$_POST['req']=='PUT') {
    						# code...
    					} else if (@$_POST['req']=='DELETE') {
    						# code...
    					} else {

    					}

    					


    				} else {
    					// echo "<pre>";
    					// echo json_encode("gagal put");
    					// echo "</pre>";
    				}

    				?>
					</div>
    			</div>
    		</div>
    	</div>
    </div>



  </div>
</section>




  <!-- Copyright Section -->
  <footer class="copyright py-4 text-center text-white footer" style="font-size: 16px;bottom: 0;width: 100%;">
    
      <small>Copyright &copy; POST-AEI (Andy,Eka,Ivana) 2020</small>
    
  </footer>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

   <script src="js/jquery-3.3.1.min"></script>

<!--    <script>
function getparkey() {
  var x = document.getElementById("parkey");
  var y = document.getElementById("url");
  var w = '?';
  y.value = y.value+x.value;
}
</script>
 <script>
function getparvalue() {
  var x = document.getElementById("parvalue");
  var y = document.getElementById("url");
  var w = '=';
  y.value = y.value+x.value;
}
</script>
 -->
  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>


</body>

</html>
