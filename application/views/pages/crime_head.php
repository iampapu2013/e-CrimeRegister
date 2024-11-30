<div style="margin:30px 45px">
	
		<div class="row shadow bg-white rounded">
			<!-- Form For Crime Head Entry -->
			  	<div class="column col-md-6 border text-center ">
			  		<h4 class="mt-5 mb-4"><u>Add Crime Head </u></h4>
			  		<form action="<?php echo site_url('welcome/crimehead_entry');?>" method="post">
			  		<div class="form-gp">
                            <label for="crimehead">ADD CRIME HEAD..</label>
                            <input type="text" name="crimehead" id="crimehead">
                            
                            
                    </div>
                    
                    <div style="color:red;"><?php echo validation_errors();
                      echo $this->session->flashdata('crimehead_display');?> </div>



					<div class="form-group" style="text-align:right">
						<div class="form-group">
							<button type="submit" class="btn btn-primary" style="width: 100px">Add</button>
						</div>
					</div>
				 </form>
			  </div>

<!-- Form For Crime Method Head Entry -->
			 
			  <div class="column col-md-6 border text-center ">
			  		<h4 class="mt-5 mb-4"><u>Add Crime Method </u></h4>
			  		<form action="<?php echo site_url('welcome/crimemethod_entry');?>" method="post">

			  		<div class="form-gp">
                            <select for="crimemethod" class="form-control" style="height: auto" name="crime_head_id" id="crime_head_id">
								<option value="">Select Crime Head.. </option>
								<?php 
								foreach($get_crime_head as $row){echo '<option value="'.$row->crime_head_id.'">'.$row->crimehead.'</option>';}
								?>
							</select>
                            
                            
                            <div class="text-danger"></div>
                    </div>
			  		<div class="form-gp">
                            <label for="crimemethod">ADD CRIME METHOD..</label>
                            <input type="text" name="crimemethod" id="crimemethod"> 
                    </div>
                    <div style="color:red;">
                    	<?php echo validation_errors();?> 
                </div>
					<div class="form-group" style="text-align:right">
						<div class="form-group">
							<button type="submit" class="btn btn-primary" style="width: 100px">Add</button>
						</div>
					</div>
				 </form>
			  </div>
			 
			</div>
		
	</div>
