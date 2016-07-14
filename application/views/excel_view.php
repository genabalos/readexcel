
			
							<table class="table table-hover table-sm">
								<tr>
									<th>Student No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Course</th>
								</tr>
								<?php
								if ($query->result()){
								foreach($query->result() as $row){ ?>
									<tr>
										<td> 
											
												<?php echo $row->student_no; ?>
											
										</td>
										<td> 
											
												<?php echo $row->first_name; ?>
											
										</td>
										<td> 
											
												<?php echo $row->last_name; ?>
											
										</td>
										<td> 
											
												<?php echo $row->course; ?>
											
										</td>
									</tr>
								<?php }
								}?>
									
								
								
								</table>
								
								<?php $attributes = array('name' => 'homeButoon'//, 
												//'onsubmit' => 'isEmpty()'
												);
										echo form_open(site_url('excel'), $attributes);?>
									<br>
									<div style="text-align:center;">
										<button class="btn btn-primary" value="backHome" name="excel" type="submit" style="text-align:center;  background-color: #00BFFF; font-size: 20px;">
											 <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
										</button>
									</div>
								</form>
							
						</div>

					</div>
				</div>
			</div>
			<div class="col-xs-1 col-sm-2 col-md-3 col-lg-4"></div>
			 
			