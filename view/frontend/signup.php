<!-- The Modal (contains the Sign Up form) -->
<div id="signup" class="modal">
      <div class="container">    
        <div id="signupbox" style="margin-top:20px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                          <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <div class="panel-title">Sign Up</div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" method="post"  action="index.php?action=addUser">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="company" class="col-md-3 control-label">Company</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="company" placeholder="Company">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="category" class="col-md-3 control-label">Category</label>
                                    <div class="col-md-9">
                                        <div class="radio-inline">
                                            <input type="radio" name="category" value="owner">Yacht owner or representative
                                        </div>
                                        <div class="radio-inline">
                                            <input type="radio" name="category" value="skipper">Skipper
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                    <label for="passwordconfirm" class="col-md-3 control-label">Confirm password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwdconfirm" placeholder="Confirm password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <input id="btn-signup" type="submit" class="btn btn-info pull-right" value='Sign Up'>
                                    </div>
                                </div>
                                
<!-- TO DO : Hash password -->
                                
                                
                                
                            </form>
                         </div>
                    </div>     
         </div> 
    </div>
    
</div>