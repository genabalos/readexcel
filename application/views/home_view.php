
			
						
							<?php 	$attributes = array('name' => 'sendForm'//, 
											//'onsubmit' => 'isEmpty()'
											);
									echo form_open(site_url('email'), $attributes);?>
							<?php //echo form_open('email'); ?>
								<br>
								<p>Subject:</p>
								<label for="subject" class="sr-only">Subject</label>
								<input type="input" name="subject" class="form-control" placeholder="Type subject here" autofocus>
								<br>
								<p>Recipient/s: <i>(Please seperate email addresses with comma)</i></p>
								<label for="recipients" class="sr-only">Recipients</label>
								<input type="input" name="recipients" class="form-control" placeholder="Recipients" required autofocus>
								<br>
								<p>Message:</p>
								<label for="message" class="sr-only">Message</label>
								<textarea name="message" class="form-control" placeholder="Type your mesage here" autofocus rows="4" cols="50"></textarea>
								<br>
								<div style="text-align:center;">
									<button class="btn btn-primary" value="send" name="email" type="submit" style="text-align:center;  background-color: #00BFFF; font-size: 20px;" onclick="return isEmpty()">Send My Mail</button>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-1 col-sm-2 col-md-2 col-lg-3"></div>
			 
			 <script> //To check if the user has inputs on subject and message fields
				function isEmpty() {
					var subjectEmpty = document.forms["sendForm"]["subject"].value;  
					var messageEmpty = document.forms["sendForm"]["message"].value;
					var recipientsEmpty = document.forms["sendForm"]["recipients"].value;
					
					if ((subjectEmpty=="" && messageEmpty=="") || (subjectEmpty=="") || (messageEmpty=="")){
						var ask = confirm("Send this message without a subject or text in the body?");
							if(ask){
								return true;
							}
							else{
								return false;
							}
					}
				}
			</script>
			